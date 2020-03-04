
<div id="sme-footer" class="row">
    <div id="footer-wrapper" class="footer row clearfix">
        <section id="footer" class="fluid-container">

            <div class="footer_logo clearfix mgB16">
                <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-SME-logo-standard.svg" alt="">
            </div>
            
            <div id="footer-social-links" class="">
                <div class="text col-lg-7">
                    <p>Stay connected</p>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/stay-connected.svg">
                </div>
                <ul class="col-lg-5 social-logos">
                    <li class="col fb">
                        <a href="https://www.facebook.com/YuspPersonalization/" class="col" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/facebook-logo.svg">

                        </a>
                    </li>

                    <li class="col linkedin">
                        <a href="https://www.linkedin.com/company/gravityrd" class="col" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/linkedin-logo.svg">

                        </a>
                    </li>

                    <li class="col twitter">
                        <a href="https://twitter.com/Gravityrd" class="col" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/twitter-logo.svg">
                        </a>
                    </li>
                    
                </ul>
            </div>

            <?php $menus = get_field('footer_menus',182); ?>
            <div class="row mgT24">

                <div class="col-xs-12 col-lg-4">
                    <div class="footer-columns">
                        <h2>About Yusp</h2>
                        <p>Yusp is an SaaS platform that integrates omnichannel recommendations across various desktop and mobile environments.</p>
                        <p class="footer-content"><?php echo get_field('footer-content'); ?></p>
                    </div>
                </div>

                <div id="footer-call-to-action" class="col-xs-12 col-lg-4">
                    <div class="test-form mgT32">
                        <h2 class="">Subscribe for regular e-commerce tips and product updates</h2>
                        <h3>Get instant 10% discount for a month now!</h3>
                        <?php echo do_shortcode('[mc4wp_form id="2763"]') ?>
                    </div>
                </div>
            </div>

            <div class="footer-menu row">
                <nav class="footer-menu left col-lg-8">
                    <li><a href="/case-studies">case studies</a></li>
                    <li><a href="/why-us">why us</a></li>
                    <li><a href="/contact">contact</a></li>
                </nav>
                <nav class="footer-menu right col-lg-4">
                    <li><a href="https://account.yusp.com/terms/">Terms & Conditions</a></li>
                    <li><a href="http://www.yusp.com/privacy-policy/">Privacy Policy</a></li>
                </nav>
            </div>


            <div class="copyright row">
                <p>
                    © 2017 - All rights reserved by Gravity Research & Development Ltd
                </p>
            </div>
        </section>
    </div>
    
</div>

