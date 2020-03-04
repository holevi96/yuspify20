<?php
/** Template Name: Support page*/
get_header();the_post();?>
<?php include('w-components/menu/sme-menu.php'); ?>

<div id="support-content-container" class="body row listing-page">
    <div class="search-wrapper">
        
    </div>
    <div class="yfy-container">

        <div id="support-listing">

            <ul class="platform-wrapper">
                <?php
                $terms = get_terms( 'support_plugins', array(
                    'hide_empty' => false,
                ) );
                foreach($terms as $term){ ?>

                <li class="platform-group">
                    <h2 class="platform-divider"><?php echo $term->name;?></h2>

                    <ul class="platform-group-wrapper">
                    <?php $top_level_posts = get_posts(
                        array(
                            'posts_per_page' => -1,
                            'post_type' => 'site_support',
                            'post_parent' => 0,
                            'tax_query' => array(
                                array(

                                    'taxonomy' => 'support_plugins',
                                    'field' => 'term_id',
                                    'terms' => $term->term_taxonomy_id,
                                )
                            )
                        )
                    );

                    foreach($top_level_posts as $p){ ?>
                        <?php
                        $second_level_posts = get_posts(
                            array(
                                'posts_per_page' => -1,
                                'post_type' => 'site_support',
                                'post_parent' => $p->ID,
                                'tax_query' => array(
                                    array(

                                        'taxonomy' => 'support_plugins',
                                        'field' => 'term_id',
                                        'terms' => $term->term_taxonomy_id,
                                    )
                                )
                            )
                        );?>

                        <li class="support-topic-group">
                            <a class="" href="<?php echo get_permalink($second_level_posts[0]->ID); ?>">
                                <h3><?php echo $p->post_title; ?></h3>

                                <ul>
                                    <?php foreach($second_level_posts as $s){ ?>
                                        <li><?php echo $s->post_title; ?></li>
                                    <?php } ?>
                                </ul>
                            </a>
                        </li>


                    <?php }; ?>
                    </ul>

                <?php } ?>
                </li>

            </ul>

        </div>

    </div>
</div>


<?php get_footer() ;?>
<?php include('w-components/footer/sme-footer.php'); ?>
