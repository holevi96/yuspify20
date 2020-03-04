<?php get_header();?>
<?php include('w-components/menu/menu-general.php'); ?>

<section id="solution-archive-page" class="body row">
    <?php if ( have_posts() ) : ?>

        <h1 class="huge-display-title">Solutions</h1>
        <div class="single-solution-block row">

            <div id="" class="fluid-container">
                <?php
                $posts = get_posts(array(
                    'posts_per_page'	=> -1,
                    'post_type'			=> 'solution'
                ));

                if( $posts ): ?>

                    <ul class="row">
                        <?php foreach( $posts as $post ):
                            setup_postdata( $post );
                            $link = get_permalink( $solution->ID );
                            ?>

                            <li class="solution-wrapper col-sm-12 col-md-6 col-lg-4">
                                <a class="solution-box row" href="<?php echo $link; ?>">
                                    <div class="text-wrapper row">
                                        <h2 class="row"><?php the_title(); ?></h2>
                                        <p class="solution-desc"><?php echo get_the_content(); ?></p>
                                    </div>

                                </a>
                            </li>

                        <?php endforeach; ?>
                    </ul>

                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
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