<?php
class GoogleImageOptimizer
{	
	public static function create_unique_html_for_image($filename, $src, $width, $height, $with_month = false, $theme_image = false, $plugin_image = false)
	{
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: create_unique_html_for_image');
		
		if($theme_image === true)
		{
			$log->lwrite('Create html for theme image');
			$themeroot = get_theme_root();
			$htmlfile = fopen($themeroot."/".$filename.".html", "w") or die("Unable to open file!");
			$html = '<img src= "'.$src.'" width="' . $width . '" height="' . $height . '" />';
		}
		elseif($plugin_image === true)
		{
			$log->lwrite('Create html for plugin image, File: '.$filename);
			$pluginroot = realpath(__DIR__ . '/..');
			$htmlfile = fopen($pluginroot."/".$filename.".html", "w") or die("Unable to open file!");
			$html = '<img src= "'.$src.'" width="' . $width . '" height="' . $height . '" />';
		}
		elseif($with_month === true)
		{
			$log->lwrite('Create html for uploaded image set on months and year, File: '.$filename);
			$htmlfile = fopen(WPGIO_UPLOAD_PATH."/".$filename.".html", "w") or die("Unable to open file!");
			$html = '<img src= "'.WPGIO_UPLOAD_URL.'/'. $src.'" width="' . $width . '" height="' . $height . '" />';
		}
		else
		{
			$log->lwrite('Create html for uploaded image set on uploads, File: '.$filename);
			$htmlfile = fopen(WPGIO_UPLOAD_PATH."/".$filename.".html", "w") or die("Unable to open file!");
			$html = '<img src= "'.WPGIO_UPLOAD_BASEURL.'/'. $src.'" width="' . $width . '" height="' . $height . '" />';
		}
		if(fwrite($htmlfile, $html))
		{
			$log->lwrite('HTML file was succesfuly created');
		}
		else
		{
			$log->lwrite('ERROR: HTML file was not created');
		}
		fclose($htmlfile);
		
		$log->lwrite('END FUNCTION: create_unique_html_for_image'."\n\r");
		$log->lclose();
	}
	
	public static function google_image_optimizer_delete_backups($attachmentID)
	{
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: google_image_optimizer_delete_backups');
		
		$fullSizeFilename = basename( get_attached_file( $attachmentID ) );
		if(isset($fullSizeFilename))
		{
			if(file_exists(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$fullSizeFilename))
			{
				$log->lwrite('Main image does exsist, deleting backup if backup is available');
				if(!unlink(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$fullSizeFilename))
				{
					$log->lwrite('ERROR: Could not remove backup (probably does not exsist, '.WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$fullSizeFilename);
				}
				else
				{
					$log->lwrite('Deleted backup, '.WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$fullSizeFilename);
				}
			}
		}
		
		$thumbnailData = wp_get_attachment_metadata($attachmentID);
		$thumbnailData = $thumbnailData['sizes'];		
		$thumbs = wp_list_pluck($thumbnailData,'file');		
		$log->lwrite('Check for thumbnails');
		if(isset($thumbs))
		{
			$log->lwrite('Thumbnails do exsist, deleting thumbnails backup if backup thumbnails are available');
			foreach($thumbs as $thumb)
			{
				if(file_exists(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.basename($thumb)))
				{
					if(!unlink(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.basename($thumb)))
					{
						$log->lwrite('ERROR: Could not remove backup (probably does not exsist, '.WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.basename($thumb));
					}
					else
					{
						$log->lwrite('Deleted backup, '.WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.basename($thumb));
					}
				}
			}
		}
		$log->lwrite('END FUNCTION: google_image_optimizer_delete_backups'."\n\r");
		$log->lclose();
	}
	
	public static function downloadZipFile($url, $filepath, $theme_image = false, $plugin_image = false)
	{
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: downloadZipFile');
		
		if($theme_image === true)
		{
			$themeroot = get_theme_root();
			$log->lwrite('Download zipfile for theme image, '.$themeroot."/zipfile.zip");
			$zipFile = $themeroot."/zipfile.zip";
		}
		elseif($plugin_image === true)
		{
			$pluginroot = realpath(__DIR__ . '/..');
			$log->lwrite('Download zipfile for plugin image, '.$pluginroot."/zipfile.zip");
			$zipFile = $pluginroot."/zipfile.zip";
		}
		else
		{
			$log->lwrite('Download zipfile image,'.WPGIO_UPLOAD_PATH."/zipfile.zip");
			$zipFile = WPGIO_UPLOAD_PATH."/zipfile.zip";
		}
		
		if($zipResource = fopen($zipFile, "w"))
		{
			$log->lwrite('Created empty zipfile, '.$zipFile);
		}
		else
		{
			$log->lwrite('ERROR: Could not create empty zipfile, '.$zipFile);
		}
		
		$domain = get_option('siteurl');
		$domain = parse_url($domain);
		$domain = str_replace('www.','',$domain['host']);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($ch, CURLOPT_REFERER, $domain);
		curl_setopt($ch, CURLOPT_FILE, $zipResource);
		if($raw_file_data = curl_exec($ch))
		{
			$log->lwrite('CURL was succesful, '.$zipResource);
		}
		else
		{
			$log->lwrite('ERROR: CURL was not succesful, '.$zipResource);
		}

		if(curl_errno($ch))
		{
			$log->lwrite('ERROR: CURL response, '.curl_errno($ch));
			false;
		}
		curl_close($ch);
		
		$log->lwrite('END FUNCTION: downloadZipFile'."\n\r");
		$log->lclose();
		
		return true;
	 }
	
	public static function download_optimized_image($filename, $theme_image = false, $plugin_image = false)
	{
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: download_optimized_image');
		
		$optimizations_done_today = (int)get_option('google_image_optimizer_optimizations_today');
		
		$log->lwrite('Check optimizations done today');
		if($optimizations_done_today <= 25000)
		{		
			$log->lwrite('Optimizations done today are below 25000, continue');
			$downloadURL = '';
			if($theme_image === true)
			{
				$log->lwrite('Download zipfile for theme image, '.get_theme_root_uri().'/'.$filename.'.html');
				$downloadURL = WPGIO_GOOGLE_OPTIMIZE_URL.get_theme_root_uri().'/'.$filename.'.html'.WPGIO_GOOGLE_STRATEGY;
				$themeroot = get_theme_root();
				$savePath = $themeroot;
			}
			elseif($plugin_image === true)
			{
				$log->lwrite('Download zipfile for plugin image, '.plugins_url().'/'.$filename.'.html');
				$downloadURL = WPGIO_GOOGLE_OPTIMIZE_URL.plugins_url().'/'.$filename.'.html'.WPGIO_GOOGLE_STRATEGY;
				$pluginroot = realpath(__DIR__ . '/..');
				$savePath = $pluginroot;
			}
			else
			{
				$log->lwrite('Download zipfile for image, '.WPGIO_UPLOAD_URL.'/'.$filename.'.html');
				$downloadURL = WPGIO_GOOGLE_OPTIMIZE_URL.WPGIO_UPLOAD_URL.'/'.$filename.'.html'.WPGIO_GOOGLE_STRATEGY;
				$savePath = WPGIO_UPLOAD_PATH;
			}
			
			
			if(!self::downloadZipFile($downloadURL,$savePath,$theme_image,$plugin_image))
			{
				$log->lwrite('ERROR: Could not download zipfile');
			}
			else
			{
				$log->lwrite('Download zipfile succesful');
				if(get_option('google_image_optimizer_last_day') == date('Ymd'))
				{
					update_option('google_image_optimizer_optimizations_today',$optimizations_done_today + 1);
				}
				else
				{
					update_option('google_image_optimizer_last_day',date('Ymd'));
					update_option('google_image_optimizer_optimizations_today',1);
				}
			}
		}
		else
		{
			$log->lwrite('ERROR: Optimizations done today are 25000 or more, stop');
		}
		$log->lwrite('END FUNCTION: download_optimized_image'."\n\r");
		$log->lclose();
	}
	
	public static function unzip_and_get_filename($filename, $theme_image = false, $plugin_image = false)
	{
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: unzip_and_get_filename');
		
		$zip = new ZipArchive;
		if($theme_image === true)
		{
			$log->lwrite('Unzip theme image');
			$path = get_theme_root();
		}
		elseif($plugin_image === true)
		{
			$log->lwrite('Unzip plugin image');
			$path = realpath(__DIR__ . '/..');
		}
		else
		{
			$log->lwrite('Unzip image');
			$path = WPGIO_UPLOAD_PATH;
		}
		if($zip->open($path.'/zipfile.zip'))
		{
			$log->lwrite('Opened zipfile succesful');
		}
		else
		{
			$log->lwrite('ERROR: Could not open zipfile');
		}
		
		$log->lwrite('Check if first file is an image');
		if($zip->getNameIndex(0) !== 'MANIFEST')
		{
			$log->lwrite('First file is an image, continue');
			$zip->extractTo($path.'/');
			$oldname = explode('/',$zip->getNameIndex(0));
			$log->lwrite('Image in zipfile, '.$oldname);
			$zip->close();
			
			$log->lwrite('END FUNCTION: unzip_and_get_filename'."\n\r");
			$log->lclose();

			return end($oldname);
		}
		else
		{
			$log->lwrite('ERROR: First file is not an image, STOP');
			$zip->close();
			
			$log->lwrite('END FUNCTION: unzip_and_get_filename'."\n\r");
			$log->lclose();
			
			return false;
		}
	}
	
	public static function cleanup_temp_files($filename, $theme_image = false, $plugin_image = false)
	{
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: cleanup_temp_files');
		
		if($theme_image === true)
		{
			$log->lwrite('Cleanup theme image unzipped files');
			$path = get_theme_root();
		}
		elseif($plugin_image === true)
		{
			$log->lwrite('Cleanup plugin image unzipped files');
			$path = realpath(__DIR__ . '/..');
		}
		else
		{
			$log->lwrite('Cleanup image unzipped files');
			$path = WPGIO_UPLOAD_PATH;
		}
		if(file_exists($path.'/MANIFEST'))
		{
			unlink($path.'/MANIFEST');
			$log->lwrite('CLEANUP: '.$path.'/MANIFEST');
		}
		else
		{
			$log->lwrite('ERROR: Could not cleanup '.$path.'/MANIFEST');
		}
		
		if(file_exists($path.'/zipfile.zip'))
		{
			unlink($path.'/zipfile.zip');
			$log->lwrite('CLEANUP: '.$path.'/zipfile.zip');
		}
		else
		{
			$log->lwrite('ERROR: Could not cleanup '.$path.'/zipfile.zip');
		}
		
		if(file_exists($path.'/'.$filename.'.html'))
		{
			unlink($path.'/'.$filename.'.html');
			$log->lwrite('CLEANUP: '.$path.'/'.$filename.'.html');
		}
		else
		{
			$log->lwrite('ERROR: Could not cleanup '.$path.'/'.$filename.'.html');
		}
		
		if(file_exists($path.'/image/'))
		{
			rmdir($path.'/image/');
			$log->lwrite('CLEANUP: '.$path.'/image/');
		}
		else
		{
			$log->lwrite('ERROR: Could not cleanup '.$path.'/image/');
		}
		
		$log->lwrite('END FUNCTION: cleanup_temp_files'."\n\r");
		$log->lclose();
	}
	
	public static function create_backup_files($fileToCopy)
	{
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: create_backup_files');
		
		$log->lwrite('Create backup of '.$fileToCopy);
		if(file_exists(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'))
		{
			$log->lwrite('Backup directory does exsist');
			if(!file_exists(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$fileToCopy))
			{
				$log->lwrite('Backing up '.$fileToCopy);
				if(!copy(WPGIO_UPLOAD_PATH . '/' . $fileToCopy, WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/'.$fileToCopy))
				{
					$log->lwrite('ERROR: Could not copy backup '.$fileToCopy);
				}
				else
				{
					$log->lwrite('Backup done '.$fileToCopy);
				}
			}
		}
		else
		{
			$log->lwrite('Backup directory does not exsist');
			$log->lwrite('Create backup directory');
			if(!mkdir(WPGIO_UPLOAD_BASEDIR . '/google-image-optimizer-backups/',0755))
			{
				$log->lwrite('ERROR: Could not create backup directory');
			}
			else
			{
				$log->lwrite('Created backup directory');
				self::create_backup_files($fileToCopy);
			}
		}
		$log->lwrite('END FUNCTION: create_backup_files'."\n\r");
		$log->lclose();
	}
	
	public static function google_image_optimizer_replace_uploaded_image($image_data, $bulk = false, $attachmentID = false)
	{			
		$log = new Logging(); 
		$log->lfile(dirname(__FILE__).'/vendor/log.txt');
		$log->lwrite('START FUNCTION: google_image_optimizer_replace_uploaded_image');
		
		$create_backups = get_option('google_image_optimizer_backups');
		if(google_image_optimizer_getExt($image_data['file']) == "jpg" || google_image_optimizer_getExt($image_data['file']) == "png")
		{
			$log->lwrite('Uploaded file is PNG or JPG, now try to optimize!');
			$filebasename = pathinfo(WPGIO_UPLOAD_PATH . '/' . $image_data['file']);
			
			self::create_unique_html_for_image($filebasename['filename'], $image_data['file'], $image_data['width'], $image_data['height'], false);
			self::download_optimized_image($filebasename['filename']);	
			
			if(!$image_data['original_file_size'])
			{
				$image_data['original_file_size'] = (filesize(WPGIO_UPLOAD_PATH.'/'.$filebasename['basename']));
			}
			
			$oldname = self::unzip_and_get_filename($filebasename['filename']);
			if($oldname !== false)
			{
				if($create_backups == 1)
				{
					self::create_backup_files($filebasename['basename']);
				}
				
				rename(WPGIO_UPLOAD_PATH.'/image/'.$oldname, WPGIO_UPLOAD_PATH.'/'.$filebasename['basename']);	
				$image_data['new_file_size'] = (filesize(WPGIO_UPLOAD_PATH.'/'.$filebasename['basename']));
			}

			self::cleanup_temp_files($filebasename['filename']);
			
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
			
			foreach($image_data['sizes'] as $key => $size)
			{
				if(in_array($key,$sizesToCrop))
				{
					$filebasename = pathinfo(WPGIO_UPLOAD_BASEDIR . '/' . $size['file']);
					$filebasenameWithMonth = pathinfo(WPGIO_UPLOAD_PATH . '/' . $size['file']);

					self::create_unique_html_for_image($filebasename['filename'], $size['file'], $size['width'], $size['height'], true);

					self::download_optimized_image($filebasenameWithMonth['filename']);
					
					if(!$image_data['sizes'][$key]['original_file_size'])
					{
						$image_data['sizes'][$key]['original_file_size'] = (filesize(WPGIO_UPLOAD_PATH.'/'.$size['file']));
					}
					
					$oldname = self::unzip_and_get_filename($filebasenameWithMonth['filename']);
					if($oldname !== false)
					{
						if($create_backups == 1)
						{
							self::create_backup_files($filebasename['basename']);
						}
						
						rename(WPGIO_UPLOAD_PATH.'/image/'.$oldname,WPGIO_UPLOAD_PATH.'/'.$size['file']);
						$image_data['sizes'][$key]['new_file_size'] = (filesize(WPGIO_UPLOAD_PATH.'/'.$size['file']));
					}

					self::cleanup_temp_files($filebasename['filename']);
				}
			}
		}
		if($bulk === true && $attachmentID !== 0)
		{
			wp_update_attachment_metadata($attachmentID, $image_data);
			
			$log->lwrite('END FUNCTION: google_image_optimizer_replace_uploaded_image'."\n\r");
			$log->lclose();
		}
		else
		{
			$log->lwrite('END FUNCTION: google_image_optimizer_replace_uploaded_image'."\n\r");
			$log->lclose();
			
			return $image_data;
		}
	}
	
	public static function google_image_optimizer_scan_themes()
	{
		$themeroot = get_theme_root();		
		$files = self::find_recursive_images($themeroot);
		
		echo json_encode($files);
		
		wp_die();
	}
	
	public static function google_image_optimizer_scan_plugins()
	{
		$plugin_root = realpath(__DIR__ . '/..');
		$files = self::find_recursive_images($plugin_root);
		
		echo json_encode($files);
		
		wp_die();
	}
	
	public static function google_image_optimizer_optimize_theme_images()
	{		
		$img_info = pathinfo($_POST['theme_image_url']);		
		$img_size = getimagesize($_POST['theme_image_url']);		
		$src = str_replace(ABSPATH,'',$_POST['theme_image_url']);
		$src = get_site_url().'/'.$src;
		
		self::create_unique_html_for_image($img_info['filename'], $src, $img_size[0], $img_size[1], false, true, false);
		
		self::download_optimized_image($img_info['filename'],true, false);	
		
		$oldname = self::unzip_and_get_filename($img_info['filename'], true, false);
		
		$theme_root = get_theme_root();
		
		rename($theme_root.'/image/'.$oldname, $img_info['dirname'].'/'.$img_info['basename']);	
		
		self::cleanup_temp_files($img_info['filename'],true);
		
		wp_die();
	}
	
	public static function google_image_optimizer_optimize_plugin_images()
	{		
		$img_info = pathinfo($_POST['plugin_image_url']);	
		$img_size = getimagesize($_POST['plugin_image_url']);
		$src = str_replace(ABSPATH,'',$_POST['plugin_image_url']);
		$src = get_site_url().'/'.$src;
		
		self::create_unique_html_for_image($img_info['filename'], $src, $img_size[0], $img_size[1], false, false , true);
		
		self::download_optimized_image($img_info['filename'],false, true);	
		
		$oldname = self::unzip_and_get_filename($img_info['filename'], false, true);
		
		$plugin_root = realpath(__DIR__ . '/..');
		
		rename($plugin_root.'/image/'.$oldname, $img_info['dirname'].'/'.$img_info['basename']);	
		
		self::cleanup_temp_files($img_info['filename'],true);
		
		wp_die();
	}
	
	public static function find_recursive_images($path) {
		$iterator = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($path),RecursiveIteratorIterator::CHILD_FIRST
		);
		foreach ($iterator as $path)
		{
			$extension = pathinfo($path, PATHINFO_EXTENSION);			
			if($path->isDir())
			{
				continue;
			}
			elseif($extension == 'jpg' || $extension == 'png')
			{
				$files[] = $path->__toString();
			}
		}
		return $files;
	}
	
	public static function google_image_optimizer_get_all_attachment_ids()
	{
		if($_GET['only_unoptimized'] == 1 || $_GET['restore'] == 'yes')
		{
			$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' => 'any', 'post_parent' => null, 'fields' => 'ids' );
			$attachments = get_posts( $args );
		}
		elseif($_GET['only_zero_percent'] == 1)
		{
			$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' => 'any', 'post_parent' => null, 'fields' => 'ids' );
			$attachmentsbefore = get_posts( $args );
			$attachments = array();
			foreach($attachmentsbefore as $attachment)
			{				
				$attchmentinfo = wp_get_attachment_metadata($attachment);
				if(array_key_exists('original_file_size',$attchmentinfo) && array_key_exists('new_file_size',$attchmentinfo) && $attchmentinfo['original_file_size'] === $attchmentinfo['new_file_size'])
				{
					array_push($attachments,$attachment);
				}				
			}
			
		}
		elseif($_GET['only_unoptimized'] == 0)
		{
			$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' => 'any', 'post_parent' => null, 'fields' => 'ids' );
			$attachmentsbefore = get_posts( $args );
			$attachments = array();
			foreach($attachmentsbefore as $attachment)
			{				
				$attchmentinfo = wp_get_attachment_metadata($attachment);
				if(array_key_exists('original_file_size',$attchmentinfo) && array_key_exists('new_file_size',$attchmentinfo) && $attchmentinfo['original_file_size'] == $attchmentinfo['new_file_size'] || array_key_exists('original_file_size',$attchmentinfo) && !array_key_exists('new_file_size',$attchmentinfo))
				{
					array_push($attachments,$attachment);
				}
			}
		}
		echo json_encode($attachments);
		wp_die();
	}
	
	public static function admin_notice_google_image_optimizer_api_key()
	{
		if(!get_option('google_image_optimizer_api_key'))
		{
			?>
			<div class="notice notice-info">
				<p>An Google PageSpeed Ingsight API key is required. Save it <a href="upload.php?page=google-image-optimizer-settings">here</a>. If you do not save this, the plugin will not work.</p>
			</div>
			<?php
		}
	}
}