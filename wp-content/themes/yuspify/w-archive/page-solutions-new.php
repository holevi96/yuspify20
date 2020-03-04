<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="solutions-page" class="body row">

    <div id="solution-list-wrapper" class="row">

        <?php
        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'solution'
        ));
        
        if( $posts ): ?>

            <div id="solution-list" class="col-lg-4">
                <ul class="list">
                    <?php foreach( $posts as $post ):setup_postdata( $post ); ?>

                        <li class="solution-wrapper row">
                            <div class="solution-item">
                                <h2 class="solution-name"><?php the_title(); ?></h2>
                            </div>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>

    <?php the_post()?>

</section>

<?php get_footer(); ?>
