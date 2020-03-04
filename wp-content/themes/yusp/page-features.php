<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="features" class="body row">

    <div id="solution-list-wrapper" class="row">

        <?php

        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'solution'
        ));

        if( $posts ): ?>

            <ul id="features-list" class="fluid-container">
                <?php foreach( $posts as $post ):

                    setup_postdata( $post );
                    $feature_icon = get_field('feature_icon', $post->ID);
                    $feature_description = get_field('feature_short_description', $post->ID);
                    ?>
                    <li class="feature-box col-lg-3">

                        <a class="row" href="<?php the_permalink(); ?>">
                        

                        <div class="">
                            <div class="">
                                <img src="<?php echo $feature_icon['url']; ?>" alt="" class="feature_icon">
                                <h2 class=""><?php the_title(); ?></h2>
                                <h3 class="">
                                    <?php echo $feature_description; ?>
                                </h3>
                            </div>
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
