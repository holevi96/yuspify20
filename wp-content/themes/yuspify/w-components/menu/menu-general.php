<!-- STANDARD MENU -->
<nav id="general-menu" class="menu-row <?php echo (get_field('choose_menu_style'))?get_field('choose_menu_style'):"";?>">
	<div class="fluid-container yfy-general-menu">
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

<!--MOBILE -->
<section id="mobile-menu" class="general row mobile <?php echo (get_field('choose_menu_style'))?get_field('choose_menu_style'):"";?>">

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