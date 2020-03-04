<nav id="mobile-menu" class="row <?php echo (get_field('choose_menu_style'))?get_field('choose_menu_style'):"";?>">
    <?php  wp_nav_menu( array( 'container' => '','theme_location' => 'primary-menu','menu_id'=>'main-menu',"menu_class"=>'clearfix' ) ); ?>
</nav>
