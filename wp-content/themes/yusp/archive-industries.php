<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="industries" class="body row light">
<!--    <h2 class="mgT24 mgB24 fluid-container">Industries</h2>-->
    
<!--    <button class="color-switcher">swithcer</button>-->
    
    <div id="industries-block" class="">
        <?php
        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'industries'
        ));

        if( $posts ): ?>

            <ul id="industries-list" class="">
                <?php foreach( $posts as $post ):
                    setup_postdata( $post );
                    ?>

                    <li class="industry-wrapper row" id="<?php echo get_the_ID(); ?>">
                        <h2 class=""><?php the_title(); ?></h2>
                    </li>

                <?php endforeach; ?>
            </ul>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>

    <div id="selected-industries" class="">

        <div class="empty-state-design">
            <h3> Select your industry and see our related case studies!</h3>
            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/factory.svg" alt="">
        </div>

        <?php
        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'industries'
        ));

        if( $posts ): ?>

            <ul id="industries-list" class="">

                <?php foreach( $posts as $post ):
                    setup_postdata( $post );
                    ?>

                    <!-- SELECTED INDUSTRY -->
                    <div class="selected-industry" data-tab="<?php echo get_the_ID(); ?>">
                        <?php if ( have_rows('industries_subpage') ): ?>

                            <ul class="">

                                <?php while ( have_rows('industries_subpage') ): the_row();
                                    // VARS
                                    $industry_name = get_sub_field('industry_name');
                                    $key_benefits = get_sub_field('key_benefits');
                                    ?>

                                    <h2 class="large-title"><?php echo $industry_name; ?></h2>

                                    <div class="industries-row col-lg-6">
                                        
                                        <div class="intro">
                                            <h2><?php echo $industry_name; ?></h2>
                                            <h3><?php echo $key_benefits; ?></h3>
                                            <p></p>
                                        </div>

                                        <ul class="relevant-solution row">

                                            <?php $solutions = get_sub_field('relevant_solutions');
                                            if( $solutions ): ?>
                                                <ul class=" row">
                                                    <?php foreach( $solutions as $solution ): ?>
                                                        <?php setup_postdata( $solution );
                                                        $title = get_the_title( $solution->ID );
                                                        $link = get_permalink( $solution->ID );
                                                        ?>

                                                        <li>
                                                            <a class="solution-row row" href="<?php echo $link; ?>">
                                                                <h3 class="title"><?php echo $title; ?></h3>
                                                            </a>
                                                        </li>

                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>

                                        </ul>
                                    </div>

                                    <ul class="case-studies-wrapper col-lg-6">

                                        <?php $casestudies = get_sub_field('relevant_case_studies');
                                        if( $casestudies ): ?>
                                            <ul class="related-case-studies row">
                                                <?php foreach( $casestudies as $p ): ?>
                                                    <?php setup_postdata( $p );
                                                    $title = get_the_title( $p->ID );
                                                    $link = get_permalink( $p->ID );
                                                    $logo_url = get_field( "logo", $p );
                                                    $kpi_row = get_field( "kpi_row", $p->ID );
                                                    $kpi_number = get_field( "kpi_number", $p->ID );
                                                    $description = get_field( "description", $p->ID );
                                                    ?>

                                                    <a class="case-study row" href="<?php echo $link; ?>">
                                                        <li class="case-study-inner">
                                                            <h3 class="title"><?php echo $title; ?></h3>
                                                            <h2 class="description"><?php echo $description; ?></h2>
                                                            <img src="<?php echo $logo_url; ?>" alt="">
                                                        </li>
                                                    </a>

                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </ul>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

            </ul>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>
    
</section>

<?php the_post()?>
<?php get_footer(); ?>

