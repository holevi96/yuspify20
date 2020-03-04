<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="case-studies-listing-page" class="body light row">

    <section id="general-industries" class="row">
        <div class="row">
            <h2 class="mgT24 general-title fluid-container">Industries</h2>
            <h2 class="mgT24 mgB24 huge-display-title">Industries</h2>

            <?php
            $posts = get_posts(array(
                'posts_per_page'	=> -1,
                'post_type'			=> 'industries'
            ));

            if( $posts ): ?>
                <div class="fluid-container">
                    
                    <ul id="industries-list" class="dark-grid">

                        <?php foreach( $posts as $post ):
                            setup_postdata( $post );
                            ?>

                            <li class="grid-element-wrapper">
                                <a class="grid-box row" href="<?php the_permalink(); ?>">
                                    
                                    <div class="image-wrapper row">
<!--                                        <img class="row illustration inverse" src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/svg/dummy-illustration.svg" alt="">-->
<!--                                        <img class="row illustration normal" src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/svg/dummy-illustration-2.svg" alt="">-->

                                        <img class="row" src="<?php the_post_thumbnail_url(); ?>" alt=""/>
                                    </div>

                                    <div class="text-wrapper row">
                                        <h2 class=""><?php the_title(); ?></h2>
                                        <div class="solution-desc">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>

                                </a>
                            </li>

                        <?php endforeach; ?>

                    </ul>

                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </section>

    <section id="general-case-stuides" class="row">

        <h2 class="mgT8 green general-title fluid-container">Case studies</h2>
        <h2 class="mgT24 mgB24 huge-display-title">Case studies</h2>
        <ul class="cats fluid-container">
            <?php
            $terms = get_terms([
                'taxonomy' => 'casestudy_cats',
                'hide_empty' => true,
            ]);
            foreach( $terms as $term ):
                ?>
                <a class="cat-filter-button" data-filter="<?php echo $term->term_id; ?>" href="javascript:void(0);">
                    <li class="col-lg-3" class="casestudy_cat"><?php echo $term->name; ?></li>
                </a>

            <?php endforeach; ?>
        </ul>

        <?php
        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'casestudies'
        ));

        if( $posts ): ?>

            <div class="fluid-container">
                <ul id="case-studies" class="filtr-container grid">

                    <?php foreach( $posts as $post ):
                        setup_postdata( $post );
                        $case_study_cats_post = get_the_terms($post->ID, 'casestudy_cats');
                        $cat_ids_array = "";
                        foreach ($case_study_cats_post as $cat) {
                            $cat_ids_array = $cat_ids_array . (string)$cat->term_taxonomy_id;
                        }
                        ?>

                        <li data-category="<?php echo $cat_ids_array; ?>" class="filtr-item case-study-wrapper col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <a class="case-study row wrapper" href="<?php the_permalink(); ?>">

                                <div class="image-wrapper">
                                    <img class="row" src="<?php the_post_thumbnail_url(); ?>" alt=""/>
                                </div>
                                <h2 class="row"><?php the_title(); ?></h2>

                                <!--
                        <div class="p-wrapper row">
                            <p class="row">
                                <?php echo get_the_content(); ?>
                            </p>
                        </div>
                        -->
                            </a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </section>

</section>


<?php include('w-components/footer/general-footer.php'); ?>
<?php the_post()?>
<?php get_footer(); ?>

