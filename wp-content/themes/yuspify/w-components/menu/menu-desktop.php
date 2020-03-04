<nav id="desktop-menu" class="menu-row <?php echo (get_field('choose_menu_style'))?get_field('choose_menu_style'):"";?>">

    <div class="fluid-container">
        <a href="#" id="logo" class="col">
<!--            <img class="logo" src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/yusp-logo_generic_version.svg" alt="">-->
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-logo-for-dark-bg.svg" alt="">
        </a>
        <?php  wp_nav_menu( array( 'container' => '','theme_location' => 'main-menu','menu_id'=>'main-menu',"menu_class"=>'desktop-menu' ) ); ?>
    </div>
    
    <div id="mega-menu-wrapper" class="row">

        <div class="fluid-container">
            <div class="one col-lg-3">
                <div class="product-line-footer">
                    <h3>yusp digital</h3>
                </div>
            </div>

            <div class="two col-lg-3">
                <div class="product-line-footer">
                    <h3>yusp digical</h3>
                </div>
            </div>

            <div class="three col-lg-3">
                <div class="product-line-footer">
                    <h3>yusp b2b</h3>
                </div>
            </div>

            <div class="four col-lg-3">
                <div class="product-line-footer">
                    <h3>yusp manufacturing</h3>
                </div>
            </div>
        </div>
        
    </div>

</nav>
