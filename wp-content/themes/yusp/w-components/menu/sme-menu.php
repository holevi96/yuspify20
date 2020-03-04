<nav id="sme-menu" class="menu-row">
    <div class="fluid-container">
        <a href="<?php echo get_home_url(); ?>" id="logo" class="sme"></a>
        <?php  wp_nav_menu( array( 'container' => '','theme_location' => 'sme-menu',"menu_class"=>'menu' ) ); ?>

    </div>

    <div id="resources-mega-menu-wrapper" class="">
        <div class="row">
            
            <?php while ( have_rows('resources_menu', 'option') ): the_row();
                $menu_link = get_sub_field('menu_link');
                $menu_title = get_sub_field('menu_title');
                $menu_description = get_sub_field('menu_description');
            ?>

            <a href="<?php echo $menu_link; ?>" class="col-lg-6">
                <div class="resource-blocks col">
                    <h2><?php echo $menu_title; ?></h2>
                    <p><?php echo $menu_description; ?></p>
                </div>
            </a>

            <?php endwhile; ?>

        </div>
    </div>
</nav>

<!--MOBILE -->
<section id="mobile-menu" class="sme row mobile">

    <div id="mobile-top-menu" class="row">
        <div class="fluid-container">
            
            <a class="col" id="mobile-logo" href="<?php echo get_home_url(); ?>">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-SME-logo-standard.svg" alt=""/>
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
        <?php  wp_nav_menu( array( 'container' => '','theme_location' => 'sme-mobile', 'menu_class'=>'mobile-menu', 'menu_id'=>'sme-mobile') ); ?>
    </div>
</section>

<section id="overlay">
</section>


