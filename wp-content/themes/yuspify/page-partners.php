<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<div id="partner-landing-2" class="partner-landing">
<?php the_content(); ?>
    
<!-- HomeWelcomeSectionWidget goes here -->

<!-- Partner Landing - above the fold -->
<section id="yusp-partner-menu" class="">

    <a class="logo col-offset-lg-1 col-lg-4" href="/">
        <div class="yusp-logo row">
            <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-logo-white.svg" alt=""/>
            <p class="col-lg-6">yusp</p>
        </div>
    </a>

    <a href="javascript:void(0)" class="become-a-partner flip-button">
        <div class="cube flip-to-top">
            <div class="default-state">
                <span>Become a partner</span>
                <i class="material-icons">done</i>
            </div>
            <div class="active-state">
                <span>Start today!</span>
                <i class="material-icons">attach_money</i>
            </div>
        </div>
    </a>
</section>

<section class="partner-above-fold row">

    <div class="button-wrapper col-lg-7">
        <a href="javascript:void(0)" class="become-a-partner flip-button">
            <div class="cube flip-to-top">
                <div class="default-state">
                    <span>Become a partner</span>
                    <i class="material-icons">done</i>
                </div>
                <div class="active-state">
                    <span>Start today!</span>
                    <i class="material-icons">attach_money</i>
                </div>
            </div>
        </a>
    </div>

    <div class="partner-landing-wrapper row">

        <div class="col-offset-lg-1 col-lg-5 partner-title-wrapper">
            <h1 id="partners-title" class="">
                Become<br/>
                a partner
            </h1>

            <h2 class="col-md-12 col-lg-11 mgT40">
                We offer our knowledge and resources for you<br/>
                to help your clients grow their revenues with <br/>
                personalized recommendations.
            </h2>
        </div>

        <form action="" class="partner-contact-short-form col-offset-lg-1 col-lg-3"">
            <input class="form-input name white row large-margin" action="" placeholder="name">
            <input class="form-input email white row mgT24" action="" placeholder="e-mail address">
            <button type="button" class="form-button green mgT24">Contact me!</button>
        </form>

    </div>
</section>


<!-- Who We are -->
<section id="who-we-are" class="row">

    <div class="fluid-container slim mgB16">
        <div class="netflix row">

            <div class="badge-wrapper">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/netflix-badge.png" alt=""/>
            </div>
            <div class="col-offset-lg-1 col-lg-8">
                <h2>Netflix award winning team</h2>
                <p>
                    Gravity R&D, the team behind Yusp have first been recognized in the $1M Netflix Prize competition, where the they have achieved the highest results of all the 18,000 competing teams. Since then, the company provides recommendation and personalization solutions in over 20 countries on 5 continents.
                </p>
            </div>
        </div>
    </div>

    <div class="fluid-container slim">
        
        <div class="col-lg-4 stnd center">
            <img class="mgB16" width="250" src="<?php echo get_stylesheet_directory_uri(); ?>/img/build-your-own-logic.png" alt="">
            <h3 class="text block t-22 blue center ttl">Ease of use </h3>
            <p class="stnd s-18 gray center">
                Yusp integrates with any major eCommerce platform and CMS through an intuitive, quick, and largely automated process that requires minimal technical skills.
            </p>
        </div>

        <div class="col-lg-4 stnd center">
            <img class="mgB16" width="250" src="<?php echo get_stylesheet_directory_uri(); ?>/img/personalized-user-jurneys.png" alt="">
            <h3 class="text block t-22 blue center ttl">Personalize the user journey</h3>
            <p class="stnd s-18 gray center">
                Like a good bartender, Yusp knows what you want before you even ask for it. Yusp enables your business to take that personal touch into the online experience and build a closer relationship with your customers.
            </p>
        </div>

        <div class="col-lg-4 stnd center">
            <img class="mgB16" width="250" src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-dashboard.png" alt="">
            <h3 class="text block t-22 blue center ttl">Tracking and analytics</h3>
            <p class="stnd s-18 gray center">
                Clients can track every important metric and KPI of their recommendations, such as CTRs, conversion rates, and revenues through recommendations, on the Yusp analytics dashboard screen.
            </p>
        </div>
    </div>

</section>

<!-- Why partner whit us -->
<div class="partner-with-us row">

    <div class="fluid-container">
        <div class="col-offset-lg-2 col-lg-8">
            <h2 class="text t-24 green center bold uppercase mgB16">
                Why partner with us
            </h2>
            <p class="stnd s-18 center mgT8">
                The Yusp Partner Program enables you to provide a unique value proposition for your customers and extend your current product portfolio with a world-class recommendation engine.
            </p>
            <p class="stnd s-18 center mgB24">
                Gravity R&D has several partners that the company has worked with on numerous projects. Our existing partner network includes e-commerce and front-end developers, research companies, media groups, SEO-SEM consultants, and agencies.
            </p>
        </div>
    </div>
    
</div>

<!-- partner-examples -->
<section id="partner-examples" class="row">

    <div class="landing-row-wrapper row">
        <div class="picto col-lg-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
            <i class="material-icons">insert_chart</i>
            <img class="flipped" src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
        </div>

        <div class="landing-row col-offset-lg-2">
            <h2>Digital Marketing Agencies</h2>
            <p>Delight your customers with exceptional personalized recommendations. With your expertise and the dedicated support we provide to our partners, you can ensure that your clients get the most out of Yusp recommendations.
            </p>
        </div>
    </div>

    <div class="landing-row-wrapper row">
        <div class="picto col-lg-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
            <i class="material-icons">shopping_cart</i>
            <img class="flipped" src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
        </div>

        <div class="landing-row col-offset-lg-2">
            <h2>e-Commerce Platform Providers</h2>
            <p>Improve your customers' user experience with personalized recommendations and boost CTRs and revenues on their site. This way you can increase their trust and loyalty towards your company and your platform.
            </p>
        </div>
    </div>

    <div class="landing-row-wrapper row">
        <div class="picto col-lg-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
            <i class="material-icons">brush</i>
            <img class="flipped" src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
        </div>

        <div class="landing-row col-offset-lg-2">
            <h2>Webdesign and Developer Companies</h2>
            <p>Extend your portfolio by adding Yusp personalized recommendations to the palette of your services.
                Yusp will set you apart from your competition and let you introduce your clients to new ways of capitalizing on their data.
            </p>
        </div>
    </div>

    <div class="landing-row-wrapper row mgB32">
        <div class="picto col-lg-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
            <i class="material-icons">build</i>
            <img class="flipped" src="<?php echo get_stylesheet_directory_uri(); ?>/img/open-tag.svg" alt="">
        </div>

        <div class="landing-row col-offset-lg-2">
            <h2>Technology Solution Providers</h2>
            <p>Recommend Yusp to companies currently in your client network. Apart from introducing them to a world-calss service, this can also be a way to renew communications with some old-time clients of yours and in the meantime, upsell some of your own solutions as well.
            </p>
        </div>
    </div>

</section>

<section id="temporary-user-story" class="row">
    
    <div class="fluid-container">
        
        <div class="col-offset-lg-1 col-lg-3 image-wrapper">
            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/stephen_tasker.png" alt="">
        </div>

        <div class="col-lg-7 testimonial">
            <p class="row">
                Working with Gravity has helped us take our digital offerings to the next level. We are now able to offer more reliable results for our clients which has helped us immensely.
            </p>
            <h2>
                Stephen Tasker <br>
            </h2>
            <h3>
                Marketing Director <br>
                Supersize Digital <br>
            </h3>

        </div>
    </div>
</section>


<!-- partner stories -->
<!--
<section id="partner-stories" class="row">
    <div class="fluid-container">

        <div class="col-lg-12 col-offset-xxl-2 col-xxl-8 bhoechie-tab-container">

            <div class="col-md-12 col-lg-3 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">
                        Super Size Digital
                    </a>
                    <a href="#" class="list-group-item text-center">
                        Train
                    </a>
                    <a href="#" class="list-group-item text-center">
                        Hotel
                    </a>
                    <a href="#" class="list-group-item text-center">
                        Restaurant
                    </a>
                    <a href="#" class="list-group-item text-center">
                        Credit Card
                    </a>
                </div>
            </div>

            <div class="col-md-12 col-lg-9 bhoechie-tab">
                <div class="bhoechie-tab-content active">
                    <center>
                        <div class="row mgB16">
                            <div class="col-lg-1 landing-quotation">
                                <b class="text t-80 blue">"</b>
                            </div>
                            <div class="col-lg-10">
                                <p class="stnd s-gray s-18">
                                    Working with Gravity has helped us take our digital offerings to the next level. We are now able to offer more reliable results for our clients which has helped us immensely.</p>
                            </div>
                        </div>
                        <div class="col-offset-lg-1 col-lg-8">
                            <div class="no-gutter col-lg-4">
                                <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/stephen_tasker.png" alt="">
                            </div>
                            <div class="col-lg-8">
                                <p class="stnd s-gray s-16 mgT8"><b>Stephen Tasker</b><br>Marketing Director<br>Supersize Digital</p>
                            </div>
                        </div>
                    </center>
                    </div>

                <div class="bhoechie-tab-content">
                    <center>
                        <p class="stnd s-gray s-16">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget.
                        </p>
                        <div class="tab-content-image-wrapper">
                            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Dimitri-Gregorjev-yusp-parnership-manager.jpg" alt="">
                        </div>
                    </center>
                </div>

                <div class="bhoechie-tab-content">
                    <center>
                        <p class="stnd s-gray s-16">
                            Duis ullamcorper ipsum a risus condimentum, sit amet dapibus ante lobortis. Mauris blandit erat ac massa placerat, id pretium est dictum. Pellentesque sed mauris rutrum, malesuada ante at, consequat ligula. Ut rutrum sapien varius pretium ullamcorper.                         </p>
                        <div class="tab-content-image-wrapper">
                            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Dimitri-Gregorjev-yusp-parnership-manager.jpg" alt="">
                        </div>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                        <p class="stnd s-gray s-16">
                            Pellentesque lacinia mauris nibh, semper varius augue ultrices vitae. Aliquam hendrerit arcu nec leo finibus lobortis. Morbi finibus aliquet dui,                        </p>
                        <div class="tab-content-image-wrapper">
                            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Dimitri-Gregorjev-yusp-parnership-manager.jpg" alt="">
                        </div>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                        <p class="stnd s-gray s-16">
                            Pellentesque fermentum arcu id enim consectetur, vitae pharetra orci gravida. Donec quam est, feugiat vel fermentum sit amet,                        </p>
                        <div class="tab-content-image-wrapper">
                            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Dimitri-Gregorjev-yusp-parnership-manager.jpg" alt="">
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
-->

<section id="half-test" class="row">
    <div class="wrapper">
        <h2 class="mgT32">
            Yusp partner programs
        </h2>
        <p>
            We are looking for Reseller and Referral partners worldwide!<br>
            <a href="/pricing">Click here</a> to see our pricing plans.
        </p>
    </div>

    <div class="left type-of-partners col-lg-6">
        <div class="col-offset-lg-3 col-lg-9 col-offset-xl-6 col-xl-6">
            <h3 class="">Reseller Program</h3>
            <p class="">
                Take the wheel and utilize Yusp to your advantage: upsell Yusp recommender solutions to your clients and deepen your strategic relationships with them.
            </p>
            <ul class="row">
                <li>
                    <i class="material-icons md-18 md-green">done</i>
                    progressive commission
                </li>
                <li>
                    <i class="material-icons md-18 md-green">done</i>
                    provide discount to your clients
                </li>
                <li>
                    <i class="material-icons md-18 md-green">done</i>
                    full support package
                </li>
                <li>
                    <i class="material-icons md-18 md-green">done</i>
                    include Yusp in your product portfolio
                </li>
                <li>
                    <i class="material-icons md-18 md-green">done</i>
                    integration support for clients
                </li>
                <li>
                    <i class="material-icons md-18 md-green">done</i>
                    dedicated account manager
                </li>
            </ul>
        </div>
    </div>

    <div class="right type-of-partners col-lg-6">
        <div class="col-lg-9 col-xl-6">
            <h3 class="">Referral Program</h3>
            <p class="">
                As simple as it sounds: refer Yusp to entrepreneurs and companies you know could be interested and earn regular monthly commissions after Yusp users recommended by you.
            </p>
            <ul class="row">
                <li>
                    <i class="material-icons md-18 md-blue">done</i>
                    fixed commission
                </li>
                <li>
                    <i class="material-icons md-18 md-blue">done</i>
                    provide discount to your clients
                </li>
                <li>
                    <i class="material-icons md-18 md-blue">done</i>
                    recommend through partner code
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="partner-form" class="row">
    <div class="fluid-container">
        <h2 class="text t-24 white bold center">Get in contact to start partneship</h2>

        <div class="row">

            <form name="contact-form" class="partner-contact-form" data-url="<?php echo get_template_directory_uri(); ?>/submit-partner.php">

                <div class="row">
                    <p class="stnd s-16 s-white col-lg-8">Need further Information? Reach out to us to know more about Yusp partership and commission plans</p>
                    <p class="stnd s-16 s-white col-lg-8"><b>Give your clients 20% discount from their Yusp monthly fees! Hurry up, the discount only applies for the first 100 Yusp clients provided by partners!</b></p>
                    <p class="stnd s-16 col-lg-8 error-msg">Information cannot be send! Please try again later, or contact us at dimitri.grigoriev@gravityrd.com</p>
                    <p class="stnd s-16 col-lg-8 success-msg">Information successfully sent!</p>
                </div>

                <div class="col-md-12 col-lg-4">
                    <input id="partner-contact-name" name="partner-contact-name" class="form-input partner-landing white row mgT32" placeholder="name" required>
                    <input id="partner-contact-email" name="partner-contact-email" type="email" class="form-input partner-landing white row mgT24" placeholder="e-mail address" required>
                    <input id="partner-contact-phone" name="partner-contact-phone" class="form-input partner-landing white row mgT24" placeholder="phone number" required>
                    <input id="partner-contact-website" name="partner-contact-website" class="form-input partner-landing white row mgT24" placeholder="website" required>

                    <div id="partner-contact-dropdown" name="partner-contact-dropdown" class="form-dropdown partner-landing white row mgT24" data-value="">
                        <span class="selected-value">reseller</span>
                        <i class="material-icons md-24 down">keyboard_arrow_down</i>
                        <ul class="form-dropdown-options" data-bind="foreach: $root.tagTypes">
                            <li>reseller</li>
                            <li>referral</li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12 col-lg-4">
                    <textarea class="form-input white row" id="partner-contact-msg" name="partner-contact-msg" placeholder="Enter text here..."></textarea>
                    <button id="submit-partner-form" type="button" class="form-button green col-lg-6 mgT24">Contact me!</button>
                </div>

                <div class="col-lg-4">
                </div>

            </form>
        </div>
    </div>
</section>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer();?>

