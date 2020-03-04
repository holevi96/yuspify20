<section id="floating-menu"class="row <?php echo (get_field('choose_menu_style'))?get_field('choose_menu_style'):"";?>">

    <div id="free-trial" class="row">
        <?php while ( have_rows('sticky_header') ): the_row();
            // VARS
            $start_free = get_sub_field('start_free');
            $sticky_discount = get_sub_field('sticky_discount');
            $sticky_months = get_sub_field('sticky_months');
            $sticky_coupon = get_sub_field('sticky_coupon');
            $sticky_demo = get_sub_field('sticky_demo');

            $h3 = get_sub_field('h3');
            $h2 = get_sub_field('h2');
            ?>

            <section id="request-demo-form" class="row">
                <div class="fluid-container">

                    <div class="interface-elements col-lg-7">
                        <h3><?php echo $h3; ?></h3>
                        <h2><?php echo $h2; ?></h2>
                        <div class="image-wrapper">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-SME-logo-standard.svg">
                        </div>
                    </div>

                    <div class="form-wrapper col-lg-5">
                        <?php echo do_shortcode('[mc4wp_form id="2316"]') ?>
                    </div>

                </div>
            </section>

            <div class="fluid-container">

                <div class="logo col">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-SME-logo-standard.svg">
                </div>

                <div id="call-to-action" class="col">
                    <a class="start-free-trial-floating col" href="https://account.yusp.com/checkout/?code=yusp20&_ga=1.181848679.1526143802.1467020999"><?php echo $start_free; ?></a>

                    <div class="discount col">
                        <p>
                            <?php echo $sticky_discount; ?>
                            <br>
                            <?php echo $sticky_months; ?>
                        </p>
                    </div>

                    <div class="coupon-code col">
                <span>
                    coupon code
                </span>
                        <p>
                            <?php echo $sticky_coupon; ?>
                        </p>
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
                        <span class="col"><?php echo $sticky_demo; ?></span>
                    </button>
                </div>
            </div>

        <?php endwhile; ?>
    </div>

    <div id="opt-in" class="row">
        <div class="fluid-container">

        </div>
    </div>
    
</section>