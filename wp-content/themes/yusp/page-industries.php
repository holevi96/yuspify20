<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="industries" class="body dark row">
    <h2 class="mgT24 mgB24 fluid-container">Case studies</h2>
    
    <?php
    $posts = get_posts(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'industries'
    ));

    if( $posts ): ?>

        <ul id="industries-list" class="fluid-container">

            <?php foreach( $posts as $post ):
                setup_postdata( $post );
                ?>

                <li class="industry-wrapper col-lg-4">
                    <a class="industry-row row" href="<?php the_permalink(); ?>">
                        <h2 class=""><?php the_title(); ?></h2>
                    </a>
                </li>

            <?php endforeach; ?>

        </ul>

        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

</section>

<?php the_post()?>
<?php get_footer(); ?>

