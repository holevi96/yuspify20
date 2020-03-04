<?php get_header();the_post();?>
<?php include('w-components/menu/sme-menu.php'); ?>

<div id="support-content-container" class="body row result-page">
    <div class="yfy-container">

        <div class="post-wrapper">
            <div class="left">
                <?php
                $termid = get_the_terms(  get_the_ID(), 'support_plugins' )[0]->term_taxonomy_id;
                $top_level_posts = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'site_support',
                        'post_parent' => 0,
                        'tax_query' => array(
                            array(

                                'taxonomy' => 'support_plugins',
                                'field' => 'term_id',
                                'terms' => $termid,
                            )
                        )
                    )

                );

                foreach($top_level_posts as $p){ ?>
                    <div class="group">

                        <h3><?php echo $p->post_title; ?></h3>
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
                                        'terms' => $termid,
                                    )
                                )
                            )

                        );?>

                        <ul>
                            <?php foreach($second_level_posts as $s){ ?>
                                <li class="<?php echo ($s->ID == get_the_ID())?'active':''; ?>"><a href='<?php echo get_permalink($s->ID); ?>'><?php echo $s->post_title; ?></a></li>
                            <?php }
                            ?>
                        </ul>
                    </div>

                <?php }; ?>
            </div>
            <div class="right">
                <h1 id="the-title"><?php echo get_post(wp_get_post_parent_id( get_the_ID() ))->post_title; ?></h1>
                <div id="the-content">
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    
</div>



<?php get_footer(); ?>
<?php include('w-components/footer/sme-footer.php'); ?>


