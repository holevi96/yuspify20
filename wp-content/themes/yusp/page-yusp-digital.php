<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<div id="yusp-digital-page" class="body row">

    <section id="introduction" class="row">
        <div class="wrapper fluid-container">
            <div class="logo col-md-12 col-xl-4">
                <img class="yusp col-md-6 col-xl-12" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-digital.svg" alt="">

            </div>

            <div class="intro-text col-md-12 col-xl-8">
                <h1 class="">
                    Online personalization for businesses of all sizes
                </h1>

                <p>
                    Yusp Digital is a is a scalable recommender and personalization solution serving clients
                    from SMEs to large enterprise websites with millions of monthly traffic. We have a proven track record
                    in online personalization, serving 5 billion recommendations a month, resulting in $40 million in
                    extra revenues for our clients on f continents.
                </p>
            </div>
        </div>
    </section>

    <div class="fluid-container">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 features image">
            <img class="feature" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/features-onsite-recommendations.svg" alt="">
        </div>
        <div class="col-lg-6 features text">
            <h2>On site recommendations</h2>
            <p>
                Our system can display personalized recommendations across all touch points (desktop, mobile web, apps, call center). Businesses of all sizes can use Yusp Dashboard to set up recommendation boxes to reach important KPIs.
            </p>
        </div>
    </div>

    <div class="fluid-container">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 features text">
            <h2>Smart Mail</h2>
            <p>
                Integrating our recommendations into your email marketing software will let your business send personalized emails exactly when your customers are most likely to read them and with the content they will be interested in.
            </p>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 features image">
            <img class="feature" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/features-smart-mail.svg" alt="">
        </div>
    </div>

    <div class="fluid-container">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 features image">
            <img class="feature" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/features-smart-search.svg" alt="">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 features text">
            <h2>Smart Search</h2>
            <p>
                SmartSearch helps visitors to quickly find the exact content they are looking for by combining query-based searches and adaptively learning algorithms. The feature also offers tools such as autocomplete, and autocorrect.
            </p>
        </div>
    </div>


</div>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer()?>


