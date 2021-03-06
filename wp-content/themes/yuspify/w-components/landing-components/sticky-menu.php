<?php $option = (get_field('which_option'))?get_field('which_option'):get_sub_field('which_option');
if($option == "free_trial"):
    ?>

    <section id="floating-menu"class="desktop row">
        <section id="request-demo-form" class="row">
            <div class="fluid-container">

                <div class="interface-elements col-lg-7">
                    <h3>Want to see how your business can benefit Yusp?</h3>
                    <h2>Request a demo call now!</h2>
                    <div class="image-wrapper">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-interface-for-demo.jpg">
                    </div>
                </div>

                <div class="form-wrapper col-lg-5">
                    <!--                --><?php //echo do_shortcode('[mc4wp_form id="2275"]') ?>
                    <?php echo do_shortcode('[mc4wp_form id="2316"]') ?>
                </div>

            </div>
        </section>
        <div class="fluid-container">

            <div class="logo col">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-SME-logo-standard.svg">
            </div>

            <div id="call-to-action" class="col">
                <a class="start-free-trial-floating col" href="https://account.yusp.com/checkout/?code=yusp20&_ga=1.181848679.1526143802.1467020999">Start Free Trial</a>

                <div class="discount col">
                    <p>20% discount <br>
                        for 3 months
                    </p>
                </div>

                <div class="coupon-code col">
                    <span>coupon code</span>
                    <p>yusp20</p>
                </div>
            </div>

            <!--
            <table class="contact-table">
                <tr>
                    <td class="mail-address">
                        <span>Contact us:</span>
                        <a href="mailto:help@yusp.com?Subject=Hello%20again" target="_top">help@yusp.com</a>
                    </td>

                    <td class="skype-image">
                        <script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
                        <div class="skype-wrapper col" id="SkypeButton_Call_live:help_2904_1">
                            <script type="text/javascript">
                                Skype.ui({
                                    "name": "chat",
                                    "element": "SkypeButton_Call_live:help_2904_1",
                                    "participants": ["live:help_2904"],
                                    "imageSize": 24
                                });
                            </script>
                        </div>
                    </td>
                </tr>
            </table>
            -->

            <div id="request-a-demo">
                <button class="request-a-demo-button col">
                    <i class="material-icons col">school</i>
                    <span class="col">Request a demo</span>
                </button>
            </div>

        </div>
    </section>

    <?php else: ?>
    <section id="floating-menu"class="desktop row">
        <div id="navigation" class="yfy-container yfy-general-menu">
            <a id="mobile-logo" href="<?php echo get_home_url(); ?>">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/yuspify-logo.svg" alt=""/>
            </a>
            <ul class="sticky-navigaiton">
                <?php while( have_rows('navigation_links') ): the_row(); ?>
                    <li class="">
                        <a class="" href="#<?php echo get_sub_field('section_link'); ?>"><?php echo get_sub_field('label'); ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>