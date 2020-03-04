<?php
/** Template Name: Whitepaper single*/
get_header();the_post()?>

<?php include('w-components/menu/sticky-menu.php'); ?>
<section id="ebook-template-container" class="body row">

    <div class="title-wrapper row">
        <div class="fluid-container">
            <div class="logo col-lg-1">
                <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-SME-logo-standard.svg" alt=""/>
            </div>

            <div class="col-lg-6">
                <h1 class="content-title"><?php the_title(); ?>
                    <span class="sub-headline">
                        <?php the_field('whitepaper_subtitle'); ?>
                    </span>
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="sign-up">

            <div class="col-lg-4 whitepaper-sign-up-form">
                <div class="download-icon">
                    <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/png/download-icon-for-white-papers.png" alt=""/>
                </div>

                <h2  class="text t-24 blue bold center">Get the whitepaper today!</h2>

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
            </div>

            <div class="whitepaper-descirpion col-lg-5">
                <h2 class="text t-24 white bold mgB32">What is in the whitepaper?</h2>
                <?php the_field('what_is_in'); ?>
            </div>

            <div class="col-lg-3 whitepaper-cover">
                <img class="col" src="<?php the_post_thumbnail_url(); ?>" alt=""/>

            </div>
        </div>
    </div>

    
    <div class="row about-us">
        <div class="fluid-container">
            <div id="yusp-line">
                <span class="one"></span>
                <span class="two"></span>
                <span class="three"></span>
            </div>
            <h2 class="text t-22 bold blue mgT40">About yusp</h2>

            <p class="row stnd s-18 s-gray mgB24">
                Yusp is a scalable SaaS recommendation engine that brings Gravity R&D's machine learning power from SMEs at an affordable price to customized solutions for Enterprise needs. It integrates with any major eCommerce platform and CMS, users can easily import their product catalogs, customize and insert recommender boxes, track the performance of their recommendations, set up custom logics and campaigns, and perform A/B tests.
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

