<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>
<?php    
if( have_rows('industries_subpage') ):
while ( have_rows('industries_subpage') ) : the_row();
$rel_case = get_sub_field("relevant_case_studies");
$rel_sol = get_sub_field("relevant_solutions");
										  	
?>

<section id="single-industries" class="body row">

    <section class="row">
        
        <div class="fluid-container">

            <div class="intro col-md-12 col-lg-6">
                <h1 class="general-title fluid-container"><?php the_title(); ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>
            </div>

            <div id="industry" class="col-md-12 col-lg-6">

                <h2>Description</h2>
                <div class="text-wrapper row">
                    <?php the_sub_field('description'); ?>
                </div>
            </div>
        </div>

        <!--
        <div id="key-benefits" class="row">
            <div class="fluid-container">
                <h2 class="general-title">Key Benefits</h2>
                <div class="text-wrapper row">
                    <?php include('w-components/page-components/key-benefits.php'); ?>
                </div>
            </div>
        </div>
        -->


    </section>

    <section id="related-case-studies" class="row mgT24">
        <div class="fluid-container">

            <h2 class="general-title">Related case studies</h2>
            <ul class="row grid mgT24">
            <?php
            if($rel_case):
                foreach ($rel_case as $study) { ?>

                    <li class="case-study-wrapper col-xs-12 col-sm-6 col-md-4 col-lg-3">
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

    <!--
    <section id="related-solutions" class="row">
        <div class="fluid-container">
        <h2 class="general-title">Related solutions</h2>

        <?php
            if( $rel_sol ): ?>
            <ul id="solutions-list" class="grid">

                <?php foreach($rel_sol as $study) :
                ?>

                <li class="case-study-wrapper col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="row wrapper" href="<?php get_permalink($study->ID); ?>">

                        <div class="image-wrapper">
                            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($study->ID), 'full' ); ?>" alt=""/>
                        </div>

                        <h2>
                            <?php echo get_post($study->ID)->post_title; ?>
                        </h2>
                    </a>
                </li>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </div>
    </section>
    -->

</section>
<?php endwhile;
    else :

        // no rows found

    endif; ?>
<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer(); ?>
