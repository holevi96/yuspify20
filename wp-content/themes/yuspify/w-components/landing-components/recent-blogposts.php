<section id="recent-blogposts-widget" class="row">
    <div class="fluid-container">
        <h2 class="the-title mgB24 row">Recent blogposts</h2>

        <?php
        $posts = get_posts(array(
            'posts_per_page'	=> 4,
            'post_type'			=> 'post'
        ));
        if( $posts ): ?>

            <ul id="recent-blogpost-grid" class="post-grid row">
                <?php foreach( $posts as $post ):
                    setup_postdata( $post );
                    ?>
                    <li class="col-xs-12 col-sm-6 col-lg-3">
                        <a class="blogpost-row row" href="<?php the_permalink(); ?>">
                            <div class="image-wrapper row">
                                <?php the_post_thumbnail('medium') ?>
                            </div>
                            <h2 class="row"><?php the_title(); ?></h2>
                            <p class="row"><?php get_the_excerpt(); ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        
    </div>
</section>





