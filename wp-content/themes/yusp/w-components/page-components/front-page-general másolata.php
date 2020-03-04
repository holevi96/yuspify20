<section id="general" class="body row">

    <!--
    <section id="front-page-menu" class="row visible">
        <div class="fluid-container">
            <a id="main-menu-logo" class="col" href="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-logo-vertical.svg" alt="">
            </a>
            <nav>
                <?php  wp_nav_menu( array( 'container' => '','theme_location' => 'general-menu',"menu_class"=>'menu-row' ) ); ?>
            </nav>
        </div>
    </section>
    -->

    <section class="starter row">
        <ul class="wrapper fluid-container">
            <?php while( have_rows('above_the_fold') ): the_row();
                // vars
                $h1 = get_sub_field('headline1');
                $h2 = get_sub_field('headline2');
                ?>

                <div class="text-wrapper col-lg-6">
                    <h1 class="the-headline">
                        <?php echo $h1; ?>
                    </h1>
                    <h2>
                        <?php echo $h2; ?>
                    </h2>
                </div>
                
                <div class="illustration-wrapper col-lg-6">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/all-together-light.svg" alt="">
                </div>

            <?php endwhile; ?>
        </ul>
    </section>

    <section id="key-clients" class="row">
        <ul class="clients-wrapper fluid-container">
            <?php while( have_rows('clients_logos') ): the_row();
                // vars
                $logo = get_sub_field('logo');
				$url = get_permalink(get_sub_field('related_client')[0]);
                ?>

                <li class="client-logo">
                    <a class="row" href="<?php echo $url; ?>">
                        <img src="<?php echo $logo; ?>" alt="">
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <section id="video" class="row">
        <div class="fluid-container">

            <?php while( have_rows('video_section')): the_row();
                // vars
                $h1 = get_sub_field('headline');
                $p = get_sub_field('text');
                ?>

                <div class="col-xs-12 col-md-12 col-lg-5">
                    <h2 class="general-title"><?php echo $h1; ?></h2>
                    <h3 class="param mgT24">
                        <?php echo $p; ?>
                    </h3>
                </div>
                <div class="col-xs-12 col-md-12 col-offset-lg-1 col-lg-6">
                    <div class="video-wrapper">
                        <iframe width="100%" height="100%" src="http://www.youtube.com/embed/KWgeyCkF5Xs?enablejsapi=1&amp;origin=http:%2F%2Fwww.yusp.com" frameborder="0" allowfullscreen="" id="widget2"></iframe>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </section>

    <section id="front-page-case-studies" class="row">

        <?php
        $posts = get_field('related_case_studies');
        if( $posts ): ?>
            <div class="fluid-container">
                <h2 class="general-title mgT24 mgB24">Case Studies</h2>
                <ul id="case-studies" class=" grid">

                    <?php foreach( $posts as $post): ?>
                        <?php setup_postdata($post); ?>
                        <li class="case-study-wrapper col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <a class="row wrapper" href="<?php the_permalink(); ?>">

                                <div class="image-wrapper">
                                    <img class="row" src="<?php the_post_thumbnail_url(); ?>" alt=""/>
                                </div>

                                <h2 class="row">
                                    <?php the_title(); ?>
                                </h2>

                                <ul class="row">
                                    <?php
                                    if( have_rows('kpi_block',$post->ID) ):
                                        while ( have_rows('kpi_block',$post->ID) ) : the_row();?>

                                            <li class="kpi-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                <h3><?php the_sub_field('kpi_number'); ?></h3>
                                                <h4><?php the_sub_field('kpi_text'); ?></h4>
                                            </li>

                                        <?php endwhile;
                                    else :

                                        // no rows found

                                    endif; ?>

                                </ul>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        
    </section>

    <section id="deloitte-row" class="row">
        <div class="fluid-container">
            <div class="logo col-lg-6">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/deloitte-logo_black.svg" alt="">
            </div>
            <div class="text col-lg-6">
                <h2 class="general-title">
                    Be relevant or be forgotten
                </h2>
                <p class="param">
                    Gravity and Deloitte Digital are closely cooperating professionally and commercially in the joint implementation of personalization solutions to Digital Retailers, Physical Retailers, Supermarket Chains, Telecommunications companies and Retail Banks worldwide.
                </p>
            </div>
        </div>
    </section>


</section>