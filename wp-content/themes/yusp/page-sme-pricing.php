<?php get_header();the_post()?>
<?php include('w-components/menu/sme-menu.php'); ?>

<div id="pricing" class="pricing-wrapper pricing-overview row body">

    <!--
    <div id="digital-or-digical" class="">
        <div class="col-sm-12 col-lg-6 digital button">
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-digital.svg" alt="">
            <p>
                Standard Yusp Digital pricing is based on monthly page view count.
            </p>
        </div>

        <div class="col-sm-12 col-lg-6 digical button">
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-digical.svg" alt="">
            <p>
                Yusp Digical solutions use custom pricing. Contact us for details.
            </p>
        </div>
    </div>
    -->

    <!-- YUSP DIGITAL -->
    <div id="yusp-digital" class="active">
        <div id="pricing-calculator" class="pageview-mode row">
            <!-- TRAFFIC -->
            <div id="pricing-traffic-box" class="row domain-crawl selected">
                <h1 class="text t-26 white bold uppercase center mgT32">Personal Pricing</h1>


                <p class="stnd s-16 s-white center">Use the slider to get your price estimation</p>
                <!--
                <form id="domain-form" class="" action="#" method="GET">
                    <input id="domain-input" class="form-input white col-xs-12 col-md-8 col-lg-8" placeholder="type your domain name here" type="text" name="site"/>
                    <button id="actionButton" class="progress-button form-button white col-xs-8 col-md-4 col-lg-4 mgB16" href="#" class="progress-button green" data-loading="Working.." data-finished="Submit">Submit</button>
                    <div class="captcha-container row">

                    </div>
                </form>
                -->

                <!-- CALCULATIONS -->
                <div class="calculations row no-gutter">
                    <div class="col-xs-12 col-md-12 col-offset-lg-3 col-lg-8 basic-numbers">
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <span class="price-description">Page view count:</span><br>
                            <h3 class="pricing-values pageview-count">0</h3>
                        </div>
                        <div class="calculated-price col-xs-6 col-md-6  col-lg-6">
                            <span class="price-description">Price per 1000 impressions:</span><br>
                            <h3 class="price-per-reco">0</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDER -->
            <div id="pricing-slider-box" class="fluid-container manual mgT24">
                <div id="price-slider" class="row mgB24"></div>
            </div>
        </div>

        <div id="plans-wrapper" class="">
                <div class="fluid-container">

                <!-- PLANS -->
                <div id="plans" class="row plans">

                    <h2 class="text t-24 white bold uppercase mgB24 yusp-starter-title">Yusp starter</h2>

                    <div id="plan-1" class="plan-wrapper mobile-selected col-sm-12 col-md-12 col-lg-4">
                        <div class="plan col-xs-12 col-md-12">
                            <div class="basic-info row">
                                <h3 class="plan-name">STARTER<br>BRONZE</h3>
                                <p>your price</p>
                                <h2 class="price">$49</h2>
                                <p>for</p>
                                <h4 class="tertiary">
                                    <span class="value">50.000</span><br>
                                    <span>impressions</span>
                                    <i href="" data-toggle="tooltip" data-placement="top" title="" class="material-icons md-18">help
                                        <span>
                                            An impression is when a recommender box is displayed. You use up an impression from your monthly quota, when a user opens a page on your site with a recommender box on it.
                                        </span>
                                    </i>
                                </h4>
                            </div>

                            <div class="estimated-info row">

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <span class="stnd s-12 s-gray">plan / month</span>
                                    <span class="base-price"></span>
                                </div>
                                <div class="plus col-xs-12 col-md-1 col-lg-1">+</div>

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <span class="stnd s-12 s-gray">traffic price</span>
                                    <span class="overuse"></span>
                                </div>
                                <div class="equals col-xs-12 col-md-1 col-lg-1">=</div>

                                <div class="col-xs-12 col-md-3">
                                    <span class="stnd s-12 s-gray">total price</span>
                                    <span class="total"></span>
                                </div>
                                <div class="row">
                                    <div class="trial">Start free trial</div>
                                </div>

                            </div>
                         </div>
                    </div>

                    <div id="plan-2" class="plan-wrapper col-sm-12 col-md-12 col-lg-4">
                        <div class="plan col-xs-12 col-md-12">

                            <div class="basic-info row">
                                <h3 class="plan-name">STARTER<br>SILVER</h3>
                                <p>your price</p>
                                <h2 class="price">$299</h2>
                                <p>for</p>
                                <h4 class="tertiary"><span class="value">500,000</span><br>
                                    <span>impressions</span>
                                    <i href="" data-toggle="tooltip" data-placement="top" class="material-icons md-18">help
                                        <span>
                                            An impression is when a recommender box is displayed. You use up an impression from your monthly quota, when a user opens a page on your site with a recommender box on it.
                                        </span>
                                    </i>
                                </h4>
                            </div>

                            <div class="estimated-info row">

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <span class="stnd s-12 s-gray">plan / month</span>
                                    <span class="base-price"></span>
                                </div>
                                <div class="plus col-xs-12 col-md-1 col-lg-1">+</div>

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <span class="stnd s-12 s-gray">traffic price</span>
                                    <span class="overuse"></span>
                                </div>
                                <div class="equals col-xs-12 col-md-1 col-lg-1">=</div>

                                <div class="col-xs-12 col-md-3">
                                    <span class="stnd s-12 s-gray">total price</span>
                                    <span class="total"></span>
                                </div>
                                <div class="row">
                                    <div class="trial">Start free trial</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="plan-3" class="plan-wrapper col-sm-12 col-md-12 col-lg-4">
                        <div class="plan col-xs-12 col-md-12">
                            <div class="basic-info row">
                                <h3 class="plan-name">STARTER<br>GOLD</h3>
                                <p>your price</p>
                                <h2 class="price">$799</h2>
                                <p>for</p>
                                <h4 class="tertiary"><span class="value">1.500,000</span><br>
                                    <span>impressions</span>
                                    <i href="" data-toggle="tooltip" data-placement="top" class="material-icons md-18">help
                                        <span>
                                            An impression is when a recommender box is displayed. You use up an impression from your monthly quota, when a user opens a page on your site with a recommender box on it.
                                        </span>
                                    </i>
                                </h4>
                            </div>

                            <div class="estimated-info row">

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <span class="stnd s-12 s-gray">plan / month</span>
                                    <span class="base-price"></span>
                                </div>
                                <div class="plus col-xs-12 col-md-1 col-lg-1">+</div>

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <span class="stnd s-12 s-gray">traffic price</span>
                                    <span class="overuse"></span>
                                </div>
                                <div class="equals col-xs-12 col-md-1 col-lg-1">=</div>

                                <div class="col-xs-12 col-md-3">
                                    <span class="stnd s-12 s-gray">total price</span>
                                    <span class="total"></span>
                                </div>
                                <div class="row">
                                    <div class="trial">Start free trial</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- FREE TRIAL BOX -->
                <div id="free-trial-box" class="modal">

                    <div class="modal-wrapper">
                        <div class="decor-line"></div>
                        <div id="close-trial" data-bind="click: closeTrial">
                            <i class="material-icons md-18 md-blue">close</i>
                        </div>
                        <div id="trial-form" class="row">
                            <h2 class="row mgT16 mgB16">Get started with your 30-day free trial!</h2>
                            <input id="e-mail-address" class="form-input blue mgT16" placeholder="type your mail address here" type="email" name="site" required/><br>
                            <input id="domain-input-trial" class="form-input blue mgT16" placeholder="type your domain name here" type="text" name="site" required/><br>
                            <button id="free-trial-button" class="form-button blue mgT16 progress-button green" href="#" data-loading="Working.." data-finished="Submit">Start free trial</button>
                            <p class="error-msg form-error col-xs-12 col-lg-12">Fill out the form correctly!</p>
                            <div class="captcha-container">
                                <div class="captcha-placeholder row">
                                    <!--<div class="row g-recaptcha" data-sitekey="6Lf72hkTAAAAAKVY7GUW3BGVthmR6JQmdVOrqSCe" data-callback="captchaCallback"></div>-->
                                </div>
                            </div>
                        </div>
                        <div id="trial-thanks" class="col-xs-12 col-lg-12">
                            <p>
                                Your registration has been sent.<br>
                                Check your inbox for further instructions on getting started with your new account.
                            </p>
                        </div>
                        <div class="row">
                            <p class="free-trial-reasons">
                                <i class="material-icons md-18 filled blue">done</i>Start monetizing from day one during your 30-day trial with Yusp.
                                <br>
                                <br>
                            </p>
                            <p class="free-trial-reasons">
                                <i class="material-icons md-18 filled blue">done</i>Harvest the power of our state-of-the-art machine learning solution without any risks.
                                <br>
                                <br>
                            </p>
                            <p class="free-trial-reasons">
                                <i class="material-icons md-18 filled blue">done</i>No commitment, no credit card required.
                                <br>
                                <br>
                            </p>
                            <p class="free-trial-reasons">
                                <i class="material-icons md-18 filled blue">done</i>Free installation support is provided to all new registrants.
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>

                </div>

                <!-- YUSP PRO -->
                <div id="yusp-pro" class="row no-gutter">

                    <div class="enterprise-sidebar col-md-12 col-lg-4">

                        <h2 class="text t-24 white bold uppercase mgT16 mgB24">Yusp Pro</h2>
                        <div class="price-box basic-info">
                            <h2 class="price">$990</h2>
                            <h4 class="tertiary">3.000.000<br>
                                <span>impressions</span>
                            </h4>
                        </div>

                        <div id="pro-form" class="pro-contact-us" data-url="<?php echo get_template_directory_uri(); ?>/submit-enterprise.php">
                            <input id="e-mail-address" class="form-input mgT16 col-xs-12 col-lg-12" placeholder="e-mail address" type="text" name="site" required/><br>
                            <input id="company-name" class="form-input mgT16 col-xs-12 col-lg-12" placeholder="company name" type="text" name="site" required/><br>
                            <button id="submit-pro" class="form-button mgT16 col-xs-6 col-lg-6 progress-button green" href="#" data-loading="Working.." data-finished="Submit">Submit</button>
                            <p class="error-msg col-xs-12 col-lg-12">E-mail cannot be sent! Please contact us at hello@gravityrd.com</p>
                            <p class="error-msg form-error col-xs-12 col-lg-12">Fill out the form correctly!</p>
                        </div>
                        <div id="pro-thanks">
                            <p>
                                Thank you for reaching out to us!<br>
                                We will be in contact shortly.
                            </p>
                        </div>

                        <div class="why-register row">
                            <p>
                                Start monetizing from day one during your 30-day trial with Yusp.
                                <br>
                                <br>
                                Harvest the power of our state-of-the-art machine learning solution without any risks.
                                <br>
                                <br>
                                Free, dedicated installation support is provided to all new Pro registrants.
                                <br>
                            </p>
                        </div>

                    </div>

                    <div class="enterpise-full-feature-list col-lg-8">
                        <h2 class="text t-24 white bold uppercase mgB24">Full feature list</h2>
                        <li>Advanced integration support</li>
                        <li>Installation through eCommerce plugins</li>
                        <li>Dedicated account manager</li>
                        <li>11 recommendation logics & optimization</li>
                        <li>SmartMail: e-mail personalization</li>
                        <li>Google Analytics & Mobile app integration</li>
                        <li>Track performance metrics on Dashboard analytics</li>
                        <li>WYSIWYG design editor</li>
                        <li>A/B testing campaigns</li>
                    </div>
                </div>
                <div id="feature-based-pricing">
                    <div class="features-sidebar col-lg-3">

                    </div>
                    <div id="tire1" class="tires col-lg-3">

                    </div>
                    <div id="tire2" class="tiers col-lg-3">

                    </div>
                    <div id="tire3" class="tiers col-lg-3">
                    </div>
                </div>

                <!-- YUSP ENTERPRISE -->
                <div id="yusp-plus" class="row mgB8">

                    <div class="enterprise-sidebar col-xs-12 col-lg-4 no-gutter">
                    <h2 class="text t-24 white bold uppercase mgT16 mgB24">Yusp Enterprise</h2>
                        <p class="text t-18 white mgB24">Contact us for Enterprise pricing.</p>

                        <div id="enterprise-form" class="enterprise-contact-us" data-url="<?php echo get_template_directory_uri(); ?>/submit-enterprise.php">
                            <input id="e-mail-address" class="form-input white mgT16 col-xs-12 col-lg-12" placeholder="e-mail address" type="text" name="site" required/><br>
                            <input id="company-name" class="form-input white mgT16 col-xs-12 col-lg-12" placeholder="company name" type="text" name="site" required/><br>
                            <button id="submit-enterprise" class="form-button blue mgT16 col-xs-6 col-lg-6 progress-button green" href="#" data-loading="Working.." data-finished="Submit">Submit</button>
                            <p class="error-msg col-xs-12 col-lg-12">E-mail cannot be sent! Please contact us at sales@gravityrd.com</p>
                            <p class="error-msg form-error col-xs-12 col-lg-12">Fill out the form correctly!</p>
                        </div>
                        <div id="enterprise-thanks">
                            <p>
                                Thank you for reaching out to us!<br>
                                We will be in contact shortly.
                            </p>
                        </div>

                        <div class="row">
                            <p class="text t-24 white bold mgB24 mgT24">sales@gravityrd.com</p>
                        </div>
                    </div>

                    <div class="enterpise-full-feature-list col-lg-8">
                        <h2 class="text t-24 white bold uppercase mgB24">Full feature list</h2>
                        <li>Full onboarding support</li>
                        <li>Dedicated technical support & account manager</li>
                        <li>Custom recommendation logics & developments </li>
                        <li>Omni-channel recommendations, SmartSearch, SmartMail, O2O, Mobile app integration and more custom features</li>
                        <li>Track performance metrics on Dashboard analytics</li>
                        <li>Custom developed recommender box designs</li>
                        <li>A/B testing campaigns</li>
                        <li>Custom payment options</li>
                    </div>
                </div>
                <div id="feature-based-pricing">

                    <div class="features-sidebar col-lg-3">

                    </div>
                    <div id="tire1" class="tires col-lg-3">

                    </div>
                    <div id="tire2" class="tiers col-lg-3">

                    </div>
                    <div id="tire3" class="tiers col-lg-3">

                    </div>
                </div>

                </div>
            </div>

        <!-- OVERVIEW - FEATURE LIST -->
        <div id="feature-based-pricing" class="row">

            <div class="desktop">
                <div class="fluid-container">
                    <h2 class="text t-24 blue bold uppercase center mgB24 mgT40">Pricing Overview</h2>

                    <div class="features-sidebar col-md-12 col-lg-3">
                        <div class="feature-content" id="plan-info-bar">
                            <div class="feature-unit">
                                <h3 class="plan-name"></h3>
                            </div>
                            <div class="feature-unit">
                                <h2 class="plan-price">Price from</h2>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-traffic">Number of</h3>
                                <p class="plan-smalltext">impressions</p>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-support">Support</h3>
                            </div>
                            <div class="feature-unit-features borderless">
                                <h3 class="plan-features">Features</h3>
                            </div>
                        </div>
                    </div>

                    <div class="features-sidebar col-md-12 col-lg-3">
                        <div class="feature-content">
                            <div class="feature-unit">
                                <h3 class="plan-name">Starter</h3>
                            </div>
                            <div class="feature-unit">
                                <h2 class="plan-price">$49</h2>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-traffic">50,000 +</h3>
                                <p class="plan-smalltext">impressions</p>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-support">Mail</h3>
                            </div>
                            <div class="feature-unit-features borderless">
                                <h3 class="plan-features">Basic features</h3>
                                <div class="feature-list">
                                    <p><i class="material-icons md-18 md-blue">done</i> Automated integration</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Available eCommerce plugins</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> 11 predefined recommendation logics</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Google Analytics integration</p>
                                    <p class="text blue bold"><i class="material-icons md-18 md-blue">done</i> 30-day free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="features-sidebar col-md-12 col-lg-3">
                        <div class="feature-content">
                            <div class="feature-unit">
                                <h3 class="plan-name">Pro</h3>
                            </div>
                            <div class="feature-unit">
                                <h2 class="plan-price">$990</h2>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-traffic">3,000,000 +</h3>
                                <p class="plan-smalltext">impressions</p>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-support">Mail & phone</h3>
                            </div>
                            <div class="feature-unit-features border">
                                <div class="plan-features row">
                                    <div class="col-lg-10">
                                        <h3 class="plan-features">Basic features<p>included</p></h3>
                                    </div>
                                    <div class="col-lg-1">
                                        <h3 class="plan-features plus">+<h3>
                                    </div>
                                </div>
                                <div class="feature-list">
                                    <p><i class="material-icons md-18 md-blue">done</i> Advanced integration support</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Recommendation logic optimization</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Email personalization</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Mobile app integration</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Dedicated account manager</p>
                                    <p class="text blue bold"><i class="material-icons md-18 md-blue">done</i> 30-day free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="features-sidebar col-md-12 col-lg-3">
                        <div class="feature-content">
                            <div class="feature-unit">
                                <h3 class="plan-name">Enterprise</h3>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-custom-price">Contact us<br>for pricing</h3>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-traffic">6,000,000 +</h3>
                                <p class="plan-smalltext">impressions</p>
                            </div>
                            <div class="feature-unit">
                                <h3 class="plan-support">Dedicated support</h3>
                            </div>
                            <div class="feature-unit-features border">
                                <div class="plan-features row">
                                    <div class="col-lg-10">
                                        <h3 class="plan-features">Pro features<p>included</p></h3>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 class="plan-features plus">+<h3>
                                    </div>
                                </div>
                                <div class="feature-list">
                                    <p><i class="material-icons md-18 md-blue">done</i> Dedicated technical support and account manager</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Custom recommendation logic development</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Omni-channel solutions, SmartSearh, O2O</p>
                                    <p><i class="material-icons md-18 md-blue">done</i> Custom payment options</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mobile row">

                <div class="overview-mobile-header">
                    <div class="col-xs-4">
                        <h2 class="header-title">Prices</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="header-title">Impressions</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="header-title">Support</h2>
                    </div>
                </div>

                <h2 class="table-plan-name row">Starter</h2>
                <div class="table-row">
                    <div class="col-xs-4">
                        <h2 class="table-value price">$49</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="table-value impression">50.000 - 1.500.0000</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="table-value support">ticket</h2>
                    </div>
                </div>

                <h2 class="table-plan-name row">Pro</h2>
                <div class="table-row">
                    <div class="col-xs-4">
                        <h2 class="table-value price">$990</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="table-value impression">3.000.000</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="table-value support">Ticket / phone</h2>
                    </div>
                </div>

                <h2 class="table-plan-name row">Enterprise</h2>
                <div class="table-row">
                    <div class="col-xs-4">
                        <h2 class="table-value price">contact us</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="table-value impression">3.000.000 +</h2>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="table-value support">phone</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-- YUSP DIGICAL -->
    <div id="yusp-digical" class="row">
        <div class="yusp-digical-wrapper">
             <div class="enterprise-sidebar col-xs-12 col-lg-6 no-gutter">f
                    <h2 class="text t-24 white bold uppercase mgT16 mgB24">Yusp Digical</h2>
                    <p class="text t-18 white mgB24">Contact us for Yusp Digical pricing.</p>

                    <div id="enterprise-form" class="enterprise-contact-us" data-url="<?php echo get_template_directory_uri(); ?>/submit-enterprise.php">
                        <input id="e-mail-address" class="form-input white mgT16 col-xs-12 col-lg-10" placeholder="e-mail address" type="text" name="site" required/><br>
                        <input id="company-name" class="form-input white mgT16 col-xs-12 col-lg-10" placeholder="company name" type="text" name="site" required/><br>
                        <button id="submit-enterprise" class="form-button blue mgT16 col-xs-6 col-lg-4 progress-button green" href="#" data-loading="Working.." data-finished="Submit">Submit</button>
                        <p class="error-msg col-xs-12 col-lg-12">E-mail cannot be sent! Please contact us at sales@gravityrd.com</p>
                        <p class="error-msg form-error col-xs-12 col-lg-12">Fill out the form correctly!</p>
                    </div>
                    <div id="enterprise-thanks">
                        <p>
                            Thank you for reaching out to us!<br>
                            We will be in contact shortly.
                        </p>
                    </div>
             </div>

             <div class="col-xs-12 col-lg-6">
                <h2 class="text t-24 white bold uppercase mgT16 mgB24">Yusp Digical solutions</h2>
                <p class="text t-18 white mgB24">
                    Yusp Digical solutions are tailored and integrated according to the client's needs,
                    therefore, custom pricing arrangements apply for all our clients.
                    To see the capabilities of the platform, see our Yusp Digical features page.
                </p>
                 <a href="/yusp-digical" class="free-trial-button outlined-white mgT24">Yusp Digical features</a>
             </div>
        </div>
    </div>

</div>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer() ;?>