<div id="sme-footer" class="row">
    <div id="footer-wrapper" class="footer row clearfix">
        <section id="footer" class="fluid-container">

            <div class="footer_logo clearfix mgB16">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/yuspify-logo.svg" alt="">
            </div>


            <div id="footer-social-links" class="col-md-4 col-md-offset-8 col-sm-12">
                <div class="text col-lg-5">
<!--                    <p>Stay connected</p>-->
<!--                    <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/svg/stay-connected.svg">-->
                </div>

                <ul class="col-lg-7 social-logos">
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
                        <h2>About Yuspify</h2>
                        <p>Yuspify is an SaaS platform that integrates omnichannel recommendations across various desktop and mobile environments.</p>
                        <p class="footer-content"><?php echo get_field('footer-content'); ?></p>
                    </div>
                </div>
                <!--
                <div id="footer-call-to-action" class="col-xs-12 col-lg-4">
                    <div class="test-form mgT32">
                        <ul>
                            <li><a href="<?php ?>"></a></li>
                        </ul>
                    </div>
                </div>
                -->
            </div>

            <div class="footer-menu row">
                <nav class="footer-menu left col-lg-8">
                    <li><a href="<?php get_theme_root_uri();?>/privacy-policy/">Privacy Policy</a></li>
                    <li><a href="<?php get_theme_root_uri();?>/terms-and-conditions">Terms & Conditions</a></li>
                    <li><a href="<?php get_theme_root_uri();?>/data-processing-agreement/">Data Processing Agreement</a></li>
                    <li><a href="<?php get_theme_root_uri();?>/cookie-policy//">Cookie Policy</a></li>
                </nav>

                <nav class="footer-menu right col-lg-4">
                    <li><a href="<?php get_theme_root_uri();?>/yuspify-for-shopify//">Shopify plugin</a></li>
                    <li><a href="<?php get_theme_root_uri();?>/yuspify-for-woocommerce/">Woocommerce plugin</a></li>
                    <li><a href="<?php get_theme_root_uri();?>/yuspify-for-prestashop/">Prestashop plugin</a></li>
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

