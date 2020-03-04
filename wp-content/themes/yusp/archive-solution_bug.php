<?php get_header();?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="solution-archive-page" class="body row">
    <?php if ( have_posts() ) : ?>

        <div class="single-solution-block">
            <?php while (have_posts()) : the_post(); ?>
            <?php if(get_post_thumbnail_id(get_the_ID())): ?>

                <div class="row mgT32 mgB32">
                    <h1 class="general-title row"><?php the_title(); ?></h1>
					<div>
                    <p class="solution-desc" default="<?php echo get_the_content(); ?>"><?php echo get_the_content(); ?></p>
					</div>
                    <div style="position:relative;">
                        <img class="solution-img" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>" alt=""/>
                        <?php

                        while( have_rows('solutions_list') ): the_row();
                            $positions = explode(" ",get_sub_field('solution_position'));
                            ?>

                            <div style="position:absolute;left:<?php echo $positions[0]; ?>px;top:<?php echo $positions[1]; ?>px" solDesc="<?php echo get_sub_field('solution_description'); ?>" class="solution-label">
                                <h4><?php echo get_sub_field('solution_name') ?></h4>
                            </div>
                        <?PHP endwhile;

                        ?>
                        <div class="related-case-studies row mgT24">
                            <?php $studies = get_field("related_case_study");
                            foreach ($studies as $study) { ?>

                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($study->ID), 'full' ); ?>" alt=""/>

                            <?php }

                            ?>
                        </div>
                    </div>
                </div>

            <?php endif; endwhile; ?>

            <div class="paginator row mgB24">
                <?php wp_pagenavi(); ?>
            </div>

        </div>


    <?php // If no content, include the "No posts found" template.
    else :
        echo 'nocontent';

    endif;
    ?>
</section>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer(); ?>


