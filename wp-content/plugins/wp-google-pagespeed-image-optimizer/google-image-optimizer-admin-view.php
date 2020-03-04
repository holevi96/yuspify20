<?php

require_once('google-image-optimizer-functions.php');

class GoogleImageOptimizerAdminView extends GoogleImageOptimizer
{		
	public static function restore_backup_ajax()
	{
		$attachmentID = $_GET['attachment_id'];
		if($attachmentID)
		{
			$backupPathMainFile = get_attached_file( $attachmentID );
			$filename = basename($backupPathMainFile);
			
			if(file_exists(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$filename))
			{
				copy(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$filename,$backupPathMainFile);
				unlink(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$filename);

				$pathInfo = pathinfo($backupPathMainFile);
				$thumbnailData = wp_get_attachment_metadata($attachmentID);
				$thumbnailDataSizes = $thumbnailData['sizes'];		
				$thumbs = wp_list_pluck($thumbnailDataSizes,'file');		
				if(isset($thumbs))
				{
					foreach($thumbs as $thumb)
					{
						$filename = basename($thumb);
						if(file_exists(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$filename))
						{
							copy(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$filename,$pathInfo['dirname'].'/'.$thumb);
							unlink(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$filename);
						}
					}
				}

				$sizes = get_intermediate_image_sizes();
				$sizesToCrop = array();
				if($sizes)
				{
					foreach($sizes as $size)
					{
						if(get_option('google_image_optimizer_size_'.$size) == 1)
						{
							array_push($sizesToCrop,$size);
						}
					}
				}

				unset($thumbnailData['original_file_size']);
				unset($thumbnailData['new_file_size']);
				
				foreach($thumbnailData['sizes'] as $key => $size)
				{
					if(in_array($key,$sizesToCrop))
					{
						unset($thumbnailData['sizes'][$key]['original_file_size']);
					}
				}
				wp_update_attachment_metadata($attachmentID, $thumbnailData);
			}
		}
		wp_die();
	}
	
	public static function bulk_optimize_single_image_ajax()
	{
		$attachmentID = $_GET['attachment_id'];
		if($attachmentID)
		{
			self::google_image_optimizer_bulk_replace_uploaded_image($attachmentID);
		}	
		
		$filename = basename(get_attached_file($attachmentID));
		$info = wp_get_attachment_metadata($attachmentID);	
		$optimized = '';
		
		
		if(empty($info['original_file_size']) || !array_key_exists('original_file_size',$info))
		{
			$filebasename = pathinfo(WPGIO_UPLOAD_PATH . '/' . $info['file']);
			$info['original_file_size'] = (filesize(WPGIO_UPLOAD_PATH.'/'.$filebasename['basename']));
			wp_update_attachment_metadata($attachmentID, $info);
			$info = wp_get_attachment_metadata($attachmentID);
		}
		
		if(empty($info['new_file_size']) || !array_key_exists('new_file_size',$info))
		{
			$info['new_file_size'] = $info['original_file_size'];
			wp_update_attachment_metadata($attachmentID, $info);
			$info = wp_get_attachment_metadata($attachmentID);
		}
		
		$totalSavings = floatval($info['original_file_size']) - floatval($info['new_file_size']);
		
		$savings = 'Savings: '.round(((floatval($info['original_file_size']) - floatval($info['new_file_size'])) / floatval($info['original_file_size']) * 100),2).'%';
		
		$sizesOptimized = 0;
		foreach($info['sizes'] as $size)
		{
			if($size['original_file_size'] > $size['new_file_size'] && $size['original_file_size'] && $size['new_file_size'])
			{
				$sizesOptimized++;
				$totalSavings += floatval($size['original_file_size']) - floatval($size['new_file_size']);
			}
			
		}
		
		/*FIX, checken of de sizes wel een waarde hebben*/
		
		
		$data = json_encode(
			array(
				'filename' 		=> $filename,
				'savings' 		=> $savings, 
				'original' 		=> google_image_optimizer_humanFileSize($info['original_file_size']),
				'optimized' 	=> google_image_optimizer_humanFileSize($info['new_file_size']),
				'sizes' 		=> $sizesOptimized,
				'totalsavings' 	=> google_image_optimizer_humanFileSize($totalSavings)
			)
		);
		
		echo $data;
		
		wp_die();
	}
	
	public static function google_image_optimizer_bulk_optimize_view()
	{		
		?>
		<div class="wrap"><h1>Google Bulk Image Optimizer</h1>
		<div class="postbox "><div class="inside">
		
		<form id="bulk_optimize" method="POST" action="<?php echo get_admin_url();?>upload.php?page=bulk-image-optimizer">
		<table class="form-table">
		
		<tr valign="top">
		<td>		
		<input type="checkbox" name="only_unoptimized" id="only_unoptimized" checked="checked" /> Reoptimize	
		<p class="description">Unheck this if you only want to optimize un-optimized images.</p></td>
		</tr>
		
		<tr valign="top">
		<td>		
		<input type="checkbox" name="only_zero_percent" id="only_zero_percent" /> Only 0% images	
		<p class="description">Check this to reoptimize only images with 0% in the back-end (Sometimes because of Google API limitations and sometimes your image is already OK!).</p></td>
		</tr>
		
		
		<tr valign="top">
		<td>
		<input type="submit" class="optimize-this-button" name="bulk_optimize_images" value="Optimize images" />
		</td>
		</tr>
		
		</table>		
		</form>
		
		<span id="percentagedone"><div class="loader"></div><div id="percentagebarholder"><div id="percentagebar"><span>0%</span></div></div></span>
		<div id="bulk_results">
			<table>
				<thead>
					<tr>
						<th>
							Filename
						</th>
						<th>
							Original
						</th>
						<th>
							Optimized
						</th>
						<th>
							Percentage
						</th>
						<th>
							Thumbnails optimized
						</th>
						<th>
							Total savings
						</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		</div>
		</div>
		</div>
		<script>
			jQuery('#only_zero_percent').on('change',this,function(){
				if(jQuery(this).is(':checked'))
				{
					jQuery("#only_unoptimized").prop('disabled',true);
					jQuery("#only_unoptimized").prop('checked',false).change();
				}
				else
				{
					jQuery("#only_unoptimized").prop('disabled',false);
				}
			});
			
			jQuery("#bulk_optimize").submit(function(e){
			e.preventDefault();
				
			var unOptimized = ( jQuery("#only_unoptimized").is(':checked') ) ? 1 : 0;
			var onlyZeroPercent = ( jQuery("#only_zero_percent").is(':checked') ) ? 1 : 0;
				
			jQuery('.loader').show();
			jQuery.ajax({
					type : "get",
					dataType : "html",
					url : ajaxurl,
					data : {action: "google_image_optimizer_get_all_attachment_ids", only_unoptimized: unOptimized, only_zero_percent: onlyZeroPercent},
					success: function(data)
					{
						var obj = JSON.parse(data);
						
						jQuery("h1").after("<div class=\"notice notice-info\"><p>Important: Please do not close this window in order to let all images be (re)optimized.</div>");
						
						var percentage_per_step = (1 / obj.length) * 100;
						var current_percentate = 0;
						
						<?php
						$sizeCounter = 0;
						$sizes = get_intermediate_image_sizes();
						if($sizes)
						{							
							foreach($sizes as $size)
							{
								if(get_option('google_image_optimizer_size_'.$size) == 1)
								{
									$sizeCounter++;
								}
							}
						}
						?>
						
						jQuery.each(obj, function(index){
							
							setTimeout(function(){
							current_percentate = current_percentate + percentage_per_step;
								
								var attachmentid = obj[index];
								
								jQuery.ajax({
									type : "get",
									dataType : "html",
									url : ajaxurl,
									data : {action: "bulk_optimize_single_image_ajax", attachment_id: attachmentid},
									success: function(data)
									{
										var res = JSON.parse(data)
										jQuery("#bulk_results tbody").prepend("<tr><td>" + res.filename + "</td><td>" + res.original + "</td><td>" + res.optimized + "</td><td>" + res.savings + "</td><td>" + res.sizes + "</td><td>" + res.totalsavings + "</td></tr>");
										jQuery("#percentagedone span").html(Math.round(current_percentate) + "%");
										jQuery("#percentagebar").css("width",current_percentate + "%");
										if(index == obj.length - 1)
										{
											jQuery("#bulk_results").prepend("<div class=\"notice notice-info\"><p>Bulk optimize has finished.</p></div>");
											jQuery('.loader').hide();
										}
									}
								});
								
								
							},<?php echo ($sizeCounter * 1000)*1.2;?>*(index+1));
						});
						
					}
				});
				
			});
		</script>
		<?php
	}
	
	public static function google_image_optimizer_bulk_replace_uploaded_image($attachmentID)
	{
		$image_data = wp_get_attachment_metadata($attachmentID);
		self::google_image_optimizer_replace_uploaded_image($image_data, true, $attachmentID);
	}
	
	public static function google_image_optimizer_settings_view()
	{
		$domain = get_option('siteurl');
		$domain = parse_url($domain);
		$domain = str_replace('www.','',$domain['host']);
		
		?>
		<div class="wrap">
		<h1>Google Image Optimizer Settings</h1>
		<div class="postbox "><div class="inside">
	
		<form method="post" action="options.php">
			<?php settings_fields( 'google-image-optimizer-settings' ); ?>
			<?php do_settings_sections( 'google-image-optimizer-settings' ); ?>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Google PageSpeed API Key</th>
				<td><input type="text" name="google_image_optimizer_api_key" value="<?php echo esc_attr( get_option('google_image_optimizer_api_key') ); ?>" /><p class="description">Request your <a href="https://console.developers.google.com/" target="_blank">Google PageSpeed Insights API key</a><br>Please read the documentation of the plugin.<br />Your API restriction HTTP referrer is: <strong><?php echo $domain;?></strong></p></td>
				</tr>
				
				<tr valign="top">
				<th scope="row">Make backups</th>
				<td><input type="checkbox" name="google_image_optimizer_backups" value="1" <?php echo checked( 1, get_option('google_image_optimizer_backups'), false );?> /></td>
				</tr>
				
				<tr valign="top">
				<th scope="row">Restore backups</th>
				<td><input id="restore-all-backups" class="optimize-this-button restore-backup-button" type="button" value="Restore all backups"><p class="description">Depending on how many images are in your media library, this could take a while.</p></td>
				</tr>
				
				<?php
				$sizes = get_intermediate_image_sizes();
				if($sizes)
				{
					?>
					<th scope="row">Image sizes</th>
					<td>
					<?php
					foreach($sizes as $size)
					{
						?>						
						<label><input type="checkbox" name="google_image_optimizer_size_<?php echo $size;?>" value="1" <?php echo checked( 1, get_option('google_image_optimizer_size_'.$size), false );?> /> <?php echo $size;?></label>
						<?php
					}
					?>
					<p class="description">Select image sizes to optimize</p>
					</td>
					</tr>
					<?php
				}
				?>
				
				<tr valign="top">
				<th scope="row">Optimize theme images</th>
				<td><input id="optimize-theme-images" type="button" value="Optimize theme images"><p class="description">This will scan the themes directory and optimize the images. Depending on how many images are in your themes, this could take a while.</p></td>
				</tr>
				
				<tr valign="top">
				<th scope="row">Optimize plugin images</th>
				<td><input id="optimize-plugin-images" type="button" value="Optimize plugin images"><p class="description">This will scan the plugins directory and optimize the images. Depending on how many images are in the plugins, this could take a while.</p></td>
				</tr>
				
				<tr valign="top">
				<th scope="row">Optimizations done today</th>
				<td><?php echo get_option('google_image_optimizer_optimizations_today');?> / 25000<p class="description">Because of Google's API you can not optimize more than 25000 images (including cropped versions) per day.</p></td>
				</tr>
			</table>

			<?php submit_button(); ?>

		</form>
		</div>
		</div>
		</div>
		<script>
			jQuery(document).ready(function(){
				jQuery('#optimize-theme-images').on('click',this,function(){
					
					var button = jQuery(this);
					button.prop('value','Optimizing theme images, leave this page open...').prop('disabled',true);
					
					jQuery.ajax({
						type : "get",
						dataType : "html",
						url : ajaxurl,
						data : {action: "google_image_optimizer_scan_themes"},
						success: function(data)
						{
							var theme_images = JSON.parse(data);
							jQuery.each(theme_images, function(index){

								setTimeout(function(){
									jQuery.ajax({
										type : "post",
										dataType : "html",
										url : ajaxurl,
										data : {action: "google_image_optimizer_optimize_theme_images", theme_image_url: theme_images[index]},
										success: function(data)
										{	
											if(index == theme_images.length - 1)
											{
												button.prop('value','Optimization is done.').prop('disabled',false);
											}
										}
									});


								},10000*(index+1));
							});
						}
					});
				});
				
				jQuery('#optimize-plugin-images').on('click',this,function(){
					
					var button = jQuery(this);
					button.prop('value','Optimizing plugin images, leave this page open...').prop('disabled',true);
					
					jQuery.ajax({
						type : "get",
						dataType : "html",
						url : ajaxurl,
						data : {action: "google_image_optimizer_scan_plugins"},
						success: function(data)
						{
							var plugin_images = JSON.parse(data);
							jQuery.each(plugin_images, function(index){

								setTimeout(function(){
									jQuery.ajax({
										type : "post",
										dataType : "html",
										url : ajaxurl,
										data : {action: "google_image_optimizer_optimize_plugin_images", plugin_image_url: plugin_images[index]},
										success: function(data)
										{	
											console.log(data);
											if(index == plugin_images.length - 1)
											{
												button.prop('value','Optimization is done.').prop('disabled',false);
											}
										}
									});


								},10000*(index+1));
							});
						}
					});
				});
				
				jQuery('#restore-all-backups').on('click',this,function(){
					var button = jQuery(this);
					
					var restorebackups = confirm("Do you realy want to restore all backups?");
					if(restorebackups == true)
					{
						button.prop('value','Restoring all backups, leave this page open...').prop('disabled',true);
						jQuery.ajax({
							type : "get",
							dataType : "html",
							url : ajaxurl,
							data : {action: "google_image_optimizer_get_all_attachment_ids", restore: 'yes'},
							success: function(data)
							{
								var attachment_ids = JSON.parse(data);
								console.log(attachment_ids);
								jQuery.each(attachment_ids, function(index){
									jQuery.ajax({
										type : "get",
										dataType : "html",
										url : ajaxurl,
										data : {action: "restore_backup_ajax", attachment_id: attachment_ids[index]},
										success: function(data)
										{											
											if(index == attachment_ids.length - 1)
											{
												button.prop('value','Restoring backups is done.').prop('disabled',false);
											}
										}
									});
								});
							}
						});
					}
				});
			});
		</script>
		<?php
	}
	
	public static function register_google_image_optimizer_settings() {
		$sizes = get_intermediate_image_sizes();
		if($sizes)
		{
			foreach($sizes as $size)
			{
				register_setting( 'google-image-optimizer-settings', 'google_image_optimizer_size_'.$size );
			}
		}
		
		register_setting( 'google-image-optimizer-settings', 'google_image_optimizer_api_key' );
		register_setting( 'google-image-optimizer-settings', 'google_image_optimizer_backups' );	
		
		if(!get_option('google_image_optimizer_last_day'))
		{
			register_setting( 'google-image-optimizer-settings', 'google_image_optimizer_last_day' );
		}	
		if(!get_option('google_image_optimizer_optimizations_today'))
		{
			register_setting( 'google-image-optimizer-settings', 'google_image_optimizer_optimizations_today' );
		}		
	}
	
	public static function google_image_optimizer_column_id($columns)
	{
		$columns['col_space_saved'] = __('Space saved');
		return $columns;
	}
	
	public static function google_image_optimizer_column_id_row($columnName, $attachmentID)
	{
		if($columnName == 'col_space_saved')
		{
			$create_backups = get_option('google_image_optimizer_backups');
			$info = wp_get_attachment_metadata($attachmentID);
			//print_r($info);
			$ext = pathinfo(get_attached_file($attachmentID), PATHINFO_EXTENSION);
			if($ext != 'jpg' && $ext != 'png')
			{
				echo '<span>For now this file can\'t be optimized.</span>';
			}
			elseif(array_key_exists('original_file_size',$info) && isset($info['original_file_size']) && array_key_exists('new_file_size',$info) && isset($info['new_file_size']))
			{
				if(array_key_exists('original_file_size',$info) && isset($info['original_file_size']) && !empty($info['original_file_size']))
				{
					echo '<span>Original file: '.google_image_optimizer_humanFileSize($info['original_file_size']).'</span><br>';
				}
				else
				{
					$info['original_file_size'] = (filesize(get_attached_file($attachmentID)));
					wp_update_attachment_metadata($attachmentID, $info);
					$info = wp_get_attachment_metadata($attachmentID);
					
					echo '<span>Original file: '.google_image_optimizer_humanFileSize(filesize(get_attached_file($attachmentID))).'<br>';
				}
				
				if(array_key_exists('new_file_size',$info) && isset($info['new_file_size']) && !empty($info['new_file_size']))
				{
					echo '<span>Optimized file: '.google_image_optimizer_humanFileSize($info['new_file_size']).'</span><br>';
				}
				else
				{
					$info['new_file_size'] = $info['original_file_size'];
					wp_update_attachment_metadata($attachmentID, $info);
					$info = wp_get_attachment_metadata($attachmentID);
					echo '<span>Optimized file: '.google_image_optimizer_humanFileSize($info['new_file_size']).'</span><br>';
				}
				
				if(array_key_exists('original_file_size',$info) && isset($info['original_file_size']) && !empty($info['original_file_size']) && array_key_exists('new_file_size',$info) && isset($info['new_file_size']) && !empty($info['new_file_size']))
				{
					echo '<span>Savings: '.round(((floatval($info['original_file_size']) - floatval($info['new_file_size'])) / floatval($info['original_file_size']) * 100),2).'%</span>';
				}
				else
				{					
					echo '<span>Savings: '.round(((floatval(filesize(get_attached_file($attachmentID))) - floatval($info['new_file_size'])) / floatval(filesize(get_attached_file($attachmentID))) * 100),2).'%</span>';
				}
				
				if($create_backups == 1)
				{
					$ajax_url = add_query_arg( 
						array( 
							'action' => 'get_before_and_after', 
							'attachent_id' => $attachmentID,
						), 
						'admin-ajax.php'
					); 
					
					if($info['original_file_size'] !== $info['new_file_size'])
					{
						echo '<br><span><a class="optimize-this-button restore-backup-button" href="#" data-restore-backup="'.$attachmentID.'">Restore backup</a></span>';
					}
					elseif($ext == 'jpg' || $ext == 'png')
					{
						echo '<br><span>GOOD JOB! Could not optimize further.</span><br>';
					}
					
					if($info['original_file_size'] !== $info['new_file_size'])
					{
						?>
						<script>
							jQuery('#post-<?php echo $attachmentID;?> .row-actions').append('<span> | <a title="Before and after compression" href="<?php echo $ajax_url;?>" class="thickbox">Compare before and after compression</a></span>');
						</script>
						<?php
					}					
				}
			}
			else
			{
				$info['original_file_size'] = (filesize(get_attached_file($attachmentID)));
				wp_update_attachment_metadata($attachmentID, $info);
				$info = wp_get_attachment_metadata($attachmentID);
				
				echo '<span>Original file: '.google_image_optimizer_humanFileSize(filesize(get_attached_file($attachmentID))).'</span><br>';
				echo '<span>Optimized file: File not yet optimized.</span><br>';
				echo '<span><a href="#" class="optimize-this-button" data-optimize-single="'.$attachmentID.'">Optimize this file only</a></span>';				
			}
		}
	}
	
	public static function get_before_and_after()
	{
		$attachment_id = $_GET['attachent_id'];
		$filename = basename(wp_get_attachment_url($attachment_id));
		$info = wp_get_attachment_metadata($attachment_id);
		
		?>
		<link href="<?php echo plugins_url('assets/css/twentytwenty-no-compass.css',__FILE__);?>" rel="stylesheet" type="text/css" />
		
		<div id="wp-google-image-optimize-ba-slider" class="twentytwenty-container">
		<img src="<?php echo WPGIO_UPLOAD_BASEURL . '/google-image-optimizer-backups/'.$filename;?>" />
		<img src="<?php echo wp_get_attachment_url($attachment_id);?>" />
		</div>
		
		<script>
		  setTimeout(function(){
			  jQuery("#wp-google-image-optimize-ba-slider").twentytwenty(
				  {
					  before_label: 'Before: <?php echo google_image_optimizer_humanFileSize(floatval($info['original_file_size']));?>',
					  after_label: 'After: <?php echo google_image_optimizer_humanFileSize(floatval($info['new_file_size']));?>',
				  }
			  );
		  },500);
		</script>
		<?php
		wp_die();
	}
	
	public static function register_google_image_optimizer_submenus()
	{
		add_submenu_page(
			'upload.php',
			'Bulk Image Optimizer',
			'Bulk Image Optimizer',
			'manage_options',
			'bulk-image-optimizer',
			'GoogleImageOptimizerAdminView::google_image_optimizer_bulk_optimize_view'
		);
		
		add_submenu_page(
			'upload.php',
			'Google Image Optimizer Settings',
			'Google Image Optimizer Settings',
			'manage_options',
			'google-image-optimizer-settings',
			'GoogleImageOptimizerAdminView::google_image_optimizer_settings_view'
		);
	}
}