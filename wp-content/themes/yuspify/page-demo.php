<?php get_header();the_post()?>
<?php //include('w-components/menu/sme-menu.php'); ?>
<?php //include('w-components/landing-components/classic-pricing-section.php'); ?>

<div id="demo" class="">
    <?php the_content(); ?>
    <a class="logo" href="<?php echo get_home_url(); ?>">
        <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/yuspify-logo.svg" alt=""/>
    </a>

    <section class="greetings-section">
        <div class="greetings-hero-bg"></div>
        <div class="yfy-container">
            <div class="greetings">
                <div class="text-wrapper">
                    <h1>Dear John</h1>
                    <h2>Here is a short list about your personalized offer</h2>

                    <p>
                        based on your <span>shopifyshop.com</span> traffic estimation <br>
                        the aproximate pageview is around<span> 75.000 / month</span> <br>
                        which impact a <span>$80/month</span> price for <span>$380</span> generated extra revenue <br>
                        now with exlusive <span>$300</span> discount for Traffic & Conversion visitors <br>
                    </p>
                    <div>
                        <a href="https://apps.shopify.com/yuspify-personalization-engine" class="button large green">Get the app now!</a>
                    </div>
                </div>
            </div>
    </section>

    <section class="video">
        <div class="yfy-container">
            <h2 class="section-title blue">How to start</h2>
            <div class="video-wrapper">

                <div class="video">
                    <iframe width="auto" height="auto" src="https://www.youtube.com/embed/oVkTlE1vAv0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div class="steps">
                    <ul>
                        <li>
                            <span>1</span>
                            <div>
                                <h2>Integration</h2>
                                <p>With a one-click fully automated integration you will easily activate the behaviour tracking engine, and synchronize your product catalogue</p>
                            </div>
                        </li>

                        <li>
                            <span>2</span>
                            <div>
                                <h2>Design your widget</h2>
                                <p>Before you place widgets to your page you will be able to design a generic template for your recommendation widgets. </p>
                            </div>
                        </li>

                        <li>
                            <span>3</span>
                            <div>
                                <h2>Insert widgets</h2>
                                <p>In the final step you will be able to insert the recommendation widgets where you want</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="row proofing">
        <div class="proofing-hero-bg"></div>
        <div class="yfy-container">
            <div class="description">
                <h2 class="section-title purple">
                    300$ Exlusive offer
                </h2>
                <h3>for Traffic and Conversion visitors</h3>
                <a href="https://apps.shopify.com/yuspify-personalization-engine" class="button large blue">Get the discount</a>
                <p class="param">
                    Discout conditions: Please activate your discount by installing yuspify app to your shopify store,
                    at latest 7 days after the Traffic and Conversion Conference,
                    And you will get the $300 discount for this year.
                </p>
                <img class="logos" src="<?php echo get_stylesheet_directory_uri(); ?>/img/png/yusp-references.png" alt=""/>
                <div class="logos">

                </div>
            </div>
        </div>
    </section>

    <section class="row pages">
        <div class="pages-hero-bg"></div>
        <div class="yfy-container">
            <h2 class="section-title purple">
                How yuspify will enhance your conversion
            </h2>
            <ul>
                <li>

                </li>
            </ul>
        </div>
    </section>

</div>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer() ;?>
