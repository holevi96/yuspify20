<!-- STANDARD MENU -->
<nav id="general-menu" class="menu-row">
    <div class="fluid-container">
        <a href="<?php echo get_home_url(); ?>" id="logo" class="general"></a>
        <?php  wp_nav_menu( array( 'container' => '','theme_location' => 'general-menu',"menu_class"=>'menu' ) ); ?>
    </div>
    <div id="nav-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

<!-- MEGA MENU -->
<!--
<div id="mega-menu" class="row">

    <div class="fluid-container">

        <ul id="mega-menu-listing" class="row">
            <i class="closer material-icons">close</i>
			
			
			<?php 
				$columns = get_field('columns','options');
				$i = 0;
				foreach($columns as $col): ?>
					<li class="column large">
						<h2 class="col-title"><?php echo $col["menu_title"]; ?></h2>
						<ul class="row">
									<?php $items = $col['column_menu_items'];
									
									?>
								
									<?php foreach($items as $item): 
										if($item['in_page_link_or_external_link'] == 'in'){
											$IDs = $item['menu_post']; 
											
											foreach($IDs as $p){?>
												<li menu-number="<?php echo $i; ?>" class="mega-menu-items"><a href="<?php echo get_permalink($p); ?>"><?php echo get_post($p)->post_title; ?></a></li>
											<?php $i++; } ?>
										<?php }else { ?>
											<li menu-number="<?php echo $i; ?>" class="mega-menu-items"><a href="<?php echo $item['menu_link']; ?>"><?php echo $item['menu_title']; ?></a></li>
										<?php } 
										endforeach; ?>
						</ul>
					</li>
				<?php endforeach;?>
            
        </ul>
		<div class="item-hover-contents row" >
			<ul>
			<?php 
				$columns = get_field('columns','options');
				$i = 0;
				foreach($columns as $col): ?>
				<?php
				
				$items = $col['column_menu_items'];
				foreach($items as $item): 
					if($item['in_page_link_or_external_link'] == 'in'){
					$IDs = $item['menu_post']; 
					foreach($IDs as $p){?>
						<li menu-number="<?php echo $i; ?>">
							<p><?php echo get_post($p)->post_content; ?></p>
							<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($p), 'full' )[0]; ?>" />
						</li>
					<?php $i++; } ?>
						<?php }else { ?>
							<li menu-number="<?php echo $i; ?>">
							
							</li>
						<?php } 
				endforeach; ?>
				<?php endforeach;?>
			</ul>
		</div>
		
		<div class="row case-study-caroussel">
			<h2>Case studies</h2>
			<ul class="testimonial-carousel fluid-container" data-flickity='{ "wrapAround": true, "imagesLoaded": true }'>

            <?php	
				$case_studies = get_posts(array(
					'post_type' => "casestudies",
					'numberposts' => -1
				));
				foreach($case_studies as $cs):
			?>

                <li class="carousel-cell">
					<h3><?php echo $cs->post_title; ?></h3>
					<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($cs->ID), 'full' )[0]; ?>" />
                </li>

            <?php endforeach; ?>

        </ul>
		</div>

    </div>
</div>
-->


<!--MOBILE -->
<section id="mobile-menu" class="general row mobile">

    <div id="mobile-top-menu" class="row">
        <div class="fluid-container">

            <a class="col" id="mobile-logo" href="<?php echo get_home_url(); ?>">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-logo-green.svg" alt=""/>
            </a>

            <div id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>
    </div>

    <div class="row menu-wrapper">
        <?php  wp_nav_menu( array( 'container' => '','theme_location' => 'general-mobile', 'menu_class'=>'mobile-menu', 'menu_id'=>'general-mobile') ); ?>
    </div>

    <section id="overlay">
    </section>
    
</section>
<?php 
global $post;

if(get_post_type( $post ) === "page" && is_singular() && get_field('magic_menu') != false): 
?>
		
		<nav id="technology-menu" class="menu-row">
		<div class="fluid-container">
			<ul id="menu-technology-menu" class="menu">
			<?php $menu_items = get_field('magic_menu');
			foreach($menu_items as $item): ?>
                <li><a href="#<?php echo $item['section_id']; ?>"><?php echo $item['menu_name']; ?></a></li>
			<?php endforeach; ?>
			</ul>   
		</div>
</nav>
		
		
<?php endif; 

if(get_post_type( $post ) != "page" && is_singular() && get_field('magic_menu','option')){
	
	$custom_menus = get_field('magic_menu','option');
	foreach($custom_menus as $menu){
		if($menu['post_type'] == get_post_type( $post )){ 
			$thismenu = $menu['menu_content'];
		?>
			<nav id="technology-menu" class="menu-row">
				<div class="fluid-container">
				<ul id="menu-technology-menu" class="menu">
				
					<?php foreach($thismenu as $item): ?>
						<li><a href="#<?php echo $item['section_id']; ?>"><?php echo $item['title']; ?></a></li>
					<?php endforeach; ?>
				</ul>   
		</div>
</nav>
		<?php }
	}
	
}
 ?>