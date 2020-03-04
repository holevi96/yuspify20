<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="" class="body row">

    <div id="solution-list-wrapper" class="row">

        <?php

        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'solution'
        ));

        if( $posts ): ?>

            <ul id="solution-list" class="row">
                <?php foreach( $posts as $post ):

                    setup_postdata( $post );

                    ?>
                    <li class="solution">

                        <!--<a class="row" href="">-->
                        <?php //the_permalink(); ?>

                        <div class="col-lg-4 solutions-wrapper">
                            <div class="solutions-list">
                                <h2 class="solution-name"><?php the_title(); ?></h2>
                                <h3 class="description">
                                    Quisque quis leo egestas, commodo eros eu, vestibulum ex. Morbi et felis vitae justo congue laoreet. Etiam et porttitor sapien.
                                </h3>
                            </div>
                        </div>

                        <div class="features-wrapper col-lg-4">
                            <?php if ( have_rows('solutions_list') ): ?>

                             <ul class="features-list">

                                 <?php while ( have_rows('solutions_list') ): the_row();
                                     // VARS
                                     $solution_name = get_sub_field('solution_name');
                                     $solution_desc = get_sub_field('solution_description');
                                     ?>

                                     <li class="feature-row row">
                                         <h3><?php echo $solution_name; ?></h3>
                                     </li>
                                 <?php endwhile; ?>
                             </ul>

                            <?php endif; ?>
                        </div>

                        <div class="features col-lg-4">

                            <?php if ( have_rows('solutions_list') ): ?>

                                <ul class="features-list">

                                    <?php while ( have_rows('solutions_list') ): the_row();
                                        // VARS
                                        $solution_name = get_sub_field('solution_name');
                                        $solution_desc = get_sub_field('solution_description');
                                        ?>

                                        <li class="description-row row">
                                            <h3><?php echo $solution_desc; ?></h3>
                                        </li>


                                    <?php endwhile; ?>
                                </ul>

                            <?php endif; ?>

                        </div>

                        <!--</a>-->
                    </li>

                <?php endforeach; ?>

            </ul>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>
    </div>
    <?php the_post()?>
    
</section>

<?php get_footer(); ?>
