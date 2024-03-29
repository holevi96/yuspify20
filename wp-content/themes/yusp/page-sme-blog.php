<?php
/**
 * Template Name: Blog Archive
 */
get_header();?>

<?php include('w-components/menu/sme-menu.php'); ?>
<?php include('w-components/menu/sticky-menu.php'); ?>

<section id="blog-archive-page" class="body row">
    <?php if ( have_posts() ) : ?>

        <div class="fluid-container">

            <div id="recent-potst" class="col-xs-12 col-lg-4 col-push-lg-8">

                <h2 class="">Recent posts</h2>

                <ul class="recent-post-wrapper">
                    <?php
                    $recent_blogs = get_posts(array(
                        'post_type' => 'blog',
                        'exclude' => get_the_ID(),
                        'numberposts' => 9,
//                        'category_name' => ''
                    ));
                    foreach ($recent_blogs as $blog) { ?>

                        <a class="" href="<?php echo get_permalink($blog->ID) ?>">
                            <li class="recent-post-element row">
                                <h3 class="col-lg-8"><?php echo $blog->post_title; ?></h3>
                                <div class="col-lg-4"><?php echo get_the_post_thumbnail($blog->ID, 'full'); ?></div>
                            </li>
                        </a>

                    <?php }
                    ?>
                </ul>

                <div id="archive-sidebar" class="row">
                    <?php dynamic_sidebar('blog-sidebar'); ?>
                </div>
            </div>

            <ul id="blog-posts" class="col-xs-12 col-lg-8 col-pull-lg-4">

                <?php while (have_posts()) : the_post(); ?>


                    <a href="<?php echo  get_permalink(get_the_ID()); ?>"><li class="blog-post row">

                            <div class="date-and-author row">
                                <div class="col avatar-wrapper">
                                    <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                </div>

                                <div class="col date-wrapper">
                                    <p class="row">
                                        <?php echo '<span class="year">' . get_the_date( 'Y' ) . '</span>'; ?>
                                        <?php echo '<span class="dayAndMonth">' . get_the_date( 'd, m' ) . '</span>'; ?>
                                    </p>
                                    <p class="row author"><span>posted by</span>
                                        <?php the_author(); ?>
                                    </p>
                                </div>
                            </div>

                            <div class="image-wrapper">
                                <?php the_post_thumbnail('full'); ?>
                            </div>

                            <div class="text-content">

                                <a class="row" href="
                                <?php echo  get_permalink(get_the_ID()); ?>">
                                    <h2 class="blog-list-title"><?php the_title(); ?></h2>
                                </a>

                                <div class="excrept">
                                    <?php the_excerpt(); ?>
                                </div>

                                <a class="read-more" href="<?php echo get_permalink(get_the_ID()); ?>">Read More</a>

                            </div>
                        </li></a>

                <?php endwhile; ?>
            </ul>

            <div class="paginator">
                <!--                --><?php //wp_pagenavi(); ?>
            </div>
        </div>

        </div>


    <?php // If no content, include the "No posts found" template.
    else :
        echo 'nocontent';

    endif;
    ?>

</section>

<?php get_footer(); ?>


