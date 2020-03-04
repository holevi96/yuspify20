
<div id="sme-footer" class="row">
    
</div>

<div id="general-footer" class="row">
    <div id="footer-wrapper" class="footer row clearfix">
        <section id="footer" class="fluid-container">
            <div class="footer_logo clearfix mgB16">
<!--                <img width="45" src="--><?php //echo get_field('footer_image',182); ?><!--" alt="">-->
                <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-logo-green.svg" alt="">
            </div>
            <?php

            $menus = get_field('footer_menus',182); ?>

            <div class="row mgT24">
                <div class="no-gutter col-xs-12 col-lg-4">
                    <div class="footer-columns">
                        <h2>Our mission</h2>
                        <p>To enable businesses to be relevant and not forgotten.</p>
                        <p class="footer-content"><?php echo get_field('footer-content'); ?></p>
                    </div>
                </div>
            </div>


            <!--
            <div id="partnership-program" class="col-lg-4 footer-columns">
                <h2>Partner program</h2>
                <p>
                    We are always looking for mutually beneficial collaboration with companies from the fields of e-commerce, digital marketing, web, and app development.
                </p>
                <p><a href="/partner-program">Become a partner</a></p>
            </div>
            -->

            <div class="footer-menu row">
                <nav class="footer-menu left col-md-8 col-xs-12 col-sm-12">
                    <!--<li><a href="/pricing">pricing</a></li>-->
                    <!--
                        <li><a href="/how-it-works">how it works</a></li>
                    -->
                    <li><a href="<?php echo get_home_url(); ?>/case-studies">case studies</a></li>
                    <!--<li><a href="/partner-program">partner program</a></li>-->
                    <li><a href="<?php echo get_home_url(); ?>/technology/about-personalization/">technology</a></li>
                    <li><a href="<?php echo get_home_url(); ?>/contact">contact</a></li>
                </nav>
                <nav class="footer-menu r col-md-4 col-xs-12 col-sm-12">
                    <!--<li><a href="https://account.yusp.com/terms/">Terms & Conditions</a></li>-->
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