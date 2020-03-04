<?php
/** Template Name: Whitepaper single*/
get_header();the_post()?>

<?php include('w-components/menu/sticky-menu.php'); ?>
<section id="ebook-template-container" class="body row">

    <div class="title-wrapper">
        <div class="yfy-container">
            <!--                 <img class="" src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/svg/yuspify-logo.svg" alt=""/>-->
            <div class="inner-wrapper">
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>

                <h2>
                    <?php the_field('whitepaper_subtitle'); ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="yfy-container">
        <ul class="sign-up">
            <li class="whitepaper-sign-up-form">
                <div class="download-icon">
                    <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/png/download-icon-for-white-papers.png" alt=""/>
                </div>
                <h2  class="section-title purple">Get the whitepaper today!</h2>
                <div>
                    <?php
                    $p = get_field('mailchimp_shortcode')[0];

                    if( $posts ): ?>
                        <ul class="careers">
                            <?php echo do_shortcode('[mc4wp_form id="' . $p->ID . '"]'); ?>
                        </ul>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <ul class="form-wrapper">
                        <?php the_content(); ?>
                    </ul>
                </div>
            </li>
            <li class="whitepaper-descirpion">
                <h2 class="">What is in the whitepaper?</h2>
                <p>
                    <?php the_field('what_is_in'); ?>
                </p>
            </li>
            <li class="whitepaper-cover">
                <img class="" src="<?php the_post_thumbnail_url(); ?>" alt=""/>
            </li>
        </ul>
    </div>

    <div class="whitepaper-descirpion-small yfy-container">
        <h2 class="">What is in the whitepaper?</h2>
        <p>
            <?php the_field('what_is_in'); ?>
        </p>
    </div>

    <div class="row about-us">
        <div class="yfy-container">
            <h2 class="title-lg purple">About yuspify</h2>
            <p class="paragraph gray">
                Yuspify is a scalable SaaS recommendation engine that brings Gravity R&D's machine learning power from SMEs at an affordable price to customized solutions for Enterprise needs. It integrates with any major eCommerce platform and CMS, users can easily import their product catalogs, customize and insert recommender boxes, track the performance of their recommendations, set up custom logics and campaigns, and perform A/B tests.
            </p>
            <a class="free-trial-button blue google-conversion-tracking-head" href="https://account.yusp.com/checkout/?_ga=1.162068606.397905464.1447264329">Start 30 days free trial</a>
            <p class="stnd s-18 s-gray center mgT24">Some of our key clients</p>
            <img class="logos" src="<?php echo get_stylesheet_directory_uri(); ?>/img/png/yusp-references.png" alt=""/>
        </div>
    </div>
    <!--
    <div>
        <p><?php next_post_link('%link', 'next post'); ?></p>
        <p><?php previous_post_link('%link', 'previous post'); ?></p>
    </div>
    -->
</section>
<?php include('w-components/footer/sme-footer.php'); ?>

<?php get_footer();?>

