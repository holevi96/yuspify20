<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="single-solutions" class="body row">

    <section class="row mgT24">
        <div class="row">
            <h1 class="general-title fluid-container"><?php the_title(); ?>
            </h1>
        </div>
        <div class="fluid-container">

            <div id="solution" class="row">
                <div class="col-lg-7">
                    <p class="row"><?php the_content(); ?></p>
                </div>

                <ul class="grid row">
                    
                </ul>
                <li class="solution-illustration col-lg-7">
                    <img class="solution-img" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>" alt=""/>
                    <?php
                    while( have_rows('solutions_list') ): the_row();
                        $positions = explode(" ",get_sub_field('solution_position'));
                        ?>

                        <div left="<?php echo $positions[0]; ?>" top="<?php echo $positions[1]; ?>" style="position:absolute;" solDesc="<?php echo get_sub_field('solution_description'); ?>" class="solution-label">
                            <h4><?php echo get_sub_field('solution_name') ?></h4>
                        </div>
                    <?php endwhile;
                    ?>
                </li>

                <div class="description-wrapper col-lg-4">
                    <p>
                        <span default="Hover over on a label to see the description!" class="solution-desc"><?php echo "Hover over on a label to see the description!"; ?></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="fluid-container">
            <section id="solution-key-benefits" class="col-xs-12 col-md-6 col-lg-8 mgT24">
                <!--
        <div class="fluid-container">
            <?php the_field('key_benefits'); ?>
        </div>
        -->
                <h2 class="general-title">Key Benefits</h2>

                <ul class="row">

                    <?php while( have_rows('key_benefits_list') ): the_row();
                        // vars
                        $icon = get_sub_field('icon_name');
                        $row = get_sub_field('row');
                        ?>


                        <li class="row">
                            <i class="material-icons col"><?php echo $icon; ?></i>
                            <p class="col">
                                <?php echo $row; ?>
                            </p>
                        </li>

                    <?php endwhile; ?>
                </ul>


            </section>

            <section class="coé-xs-12 col-md-6 col-lg-4">
                <h2 class="general-title mgT24">Contact us</h2>

                <div id="solution-form" class="row">
                    <?php echo do_shortcode('[contact-form-7 id="2764" title="Solution form"]'); ?>
                </div>
            </section>
        </div>
    </div>


    <section id="related-case-studies" class="row">
        <div class="fluid-container">

            <h2 class="general-title">Related case studies</h2>
            <ul class="row grid mgT24">
            <?php $studies = get_field("related_case_study");
            if(get_field("related_case_study")):
                foreach ($studies as $study) { ?>

                    <li class="case-study-wrapper col-4">
                        <a class="row wrapper" href="<?php get_permalink($study->ID); ?>">

                            <div class="image-wrapper">
                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($study->ID), 'full' ); ?>" alt=""/>
                            </div>

                            <h2>
                                <?php echo get_post($study->ID)->post_title; ?>
                            </h2>

                            <ul class="row">
                                <?php
                                if( have_rows('kpi_block',$study->ID) ):
                                    while ( have_rows('kpi_block',$study->ID) ) : the_row();?>

                                        <li class="kpi-wrapper">
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

                <?php }
            endif;
            ?>
        </ul>
    </div>
    </section>

    <section id="related-industries" class="row">
        <div class="fluid-container">
        <h2 class="general-title">Related industries</h2>

            <?php
            $posts = get_field('related_industries');
            if( $posts ): ?>
                <div class="fluid-container">
                    <ul id="case-studies" class=" grid">

                        <?php foreach( $posts as $post): ?>
                            <?php setup_postdata($post); ?>
                            <li class="case-study-wrapper col-4">
                                <a class="row wrapper" href="<?php the_permalink(); ?>">

                                    <div class="image-wrapper">
                                        <img class="row" src="<?php the_post_thumbnail_url(); ?>" alt=""/>
                                    </div>

                                    <h2 class="row">
                                        <?php the_title(); ?>
                                    </h2>

                                    <div class="p-wrapper">
                                        <p>
                                            <?php the_content(); ?>
                                        </p>
                                    </div>
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
<?php get_footer(); ?>
