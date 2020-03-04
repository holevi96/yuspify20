<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="" class="body row">

    <div id="solution-list-wrapper" class="row">

	
        <?php

        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'blog'
        ));

        if( $posts ): ?>

            <ul id="solution-list" class="row">
                <h2>Solutions</h2>

                <?php foreach( $posts as $post ):

                    setup_postdata( $post );

                    ?>
                    <li class="solution">

                        <a class="row" href="<?php the_permalink(); ?>">


                        <div class="col-lg-4 solutions-wrapper">
                            <div class="solutions-list">
                                <h2 class="solution-name"><?php the_title(); ?></h2>
                            </div>
                        </div>

                        <div class="features-wrapper">
                            <?php if ( have_rows('solutions_list') ): ?>

                                <ul class="features-list">

                                    <?php while ( have_rows('solutions_list') ): the_row();
                                        // VARS
                                        $solution_name = get_sub_field('solution_name');
                                        $solution_desc = get_sub_field('solution_description');
                                        ?>

                                        <li class="col-lg-4 feature-row">
                                            <h3><?php echo $solution_name; ?></h3>
                                        </li>

                                        <li class="col-lg-4">
                                            <p><?php echo $solution_desc; ?></p>
                                        </li>

                                    <?php endwhile; ?>
                                </ul>

                            <?php endif; ?>
                        </div>

                        </a>
                    </li>

                <?php endforeach; ?>

            </ul>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>
    </div>
    <?php the_post()?>

</section>

<?php get_footer(); ?>
