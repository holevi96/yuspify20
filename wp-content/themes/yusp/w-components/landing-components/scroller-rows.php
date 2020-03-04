<!-- fake row to scroll -->
<div class="kamu row"></div>

<section id="scrolling-explainer" class="row fixed">

    <!-- desktop -->
    <div class="desktop fluid-container">
        <div class="wrapper">
            <div class="col-lg-4 col-xxl-3">

                <?php
                $decide = 0;

                $repeater = get_field('select_scroll_items');

                if (sizeof($repeater) == 3) {
                    $decide = 'three';
                }
                elseif (sizeof($repeater) == 5) {
                    $decide = 'five';
                };
                ?>

                <ul class="steps">
                    <ul class="slides">
                        <?php if( have_rows('select_scroll_items') ): ?>
                        <?php
                        $i = 0;
                        while( have_rows('select_scroll_items') ): the_row();
                            $i += 1;
                            $menu_text = get_sub_field('menu_text');
                            ?>

                            <li id="selector-<?php echo $i; ?>" id="<?php echo $decide; ?>" class="tab-link" data-tab="tab-1">
                                <?php echo $menu_text; ?>
                                <span><?php echo $i; ?></span>
                                <div class="pipe"></div>
                            </li>

                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </ul>
            </div>

            <div id="initial-slide" class="description selected">
                <div class="row">
                    <p>
                        Dear heureka.cz partner,<br><br>Scroll down to get to know our offer!
                    </p>
                </div>
                
                <div class="mouse-scroll-animation col">
                    <img class="mouse col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/mouse.svg" alt="">
                    <img class="arrow col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow.svg" alt="">
                </div>
                
            </div>
            
            <div class="col-lg-5 col-xxl-4">
                <?php if( have_rows('select_scroll_items') ): ?>

                    <?php
                    $i = 0;
                    while( have_rows('select_scroll_items') ): the_row();
                        $i += 1;
                        $tab_content = get_sub_field('tab_content');
                        ?>
                        <div id="tab-<?php echo $i; ?>" class="description">
                            <?php echo $tab_content; ?>
                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>

        <h2 id="headline-text" class="initial">
            <?php echo get_field('headline'); ?>
            <br>
            <br>
            <?php echo get_field('description'); ?>
            <br>
            <br>
            <a class="start-free-trial mgT36" href="https://account.yusp.com/checkout/?code=yusp20&amp;_ga=1.151949305.1526143802.1467020999">Start free trial!</a>
        </h2>
    </div>

    <div id="animation">

        <!DOCTYPE html>
        <html>
        <head>
            <!-- IMPORTANT -->
            <base href="<?php echo get_stylesheet_directory_uri(); ?>/animations/recommendations-on-site/">

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
            <title>Untitled</title>
            <!--Adobe Edge Runtime-->
            <script type="text/javascript" charset="utf-8" src="http://animate.adobe.com/runtime/6.0.0/edge.6.0.0.min.js"></script>
            <style>
                .edgeLoad-EDGE-64815824 { visibility:hidden; }
            </style>
            <script>
                AdobeEdge.loadComposition('yusp-recommendations-animation', 'EDGE-64815824', {
                    scaleToFit: "none",
                    centerStage: "none",
                    minW: "0px",
                    maxW: "undefined",
                    width: "1980px",
                    height: "1020px"
                }, {dom: [ ]}, {dom: [ ]});
            </script>
            <!--Adobe Edge Runtime End-->

        </head>
        <body style="margin:0;padding:0;background: transparent;">
        <div id="Stage" class="EDGE-64815824">
        </div>
        </body>
        </html>
    </div>

</section>

<!--
<script>
    jQuery('ul.steps li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');

        jQuery('ul.steps li').removeClass('selected');
        jQuery('.description').removeClass('selected');

        jQuery(this).addClass('selected');
        jQuery("#"+tab_id).addClass('selected');
    });
</script>

<a href="http://trendmakerhu.yusp.com/grrec-trendmakerhu-war/AdServlet?action=renderrd&amp;scenarioId=EMAIL_57&amp;templateId=CP2Template_Email%20recommendation%20test&amp;uid=%5Bemail%5D&amp;pos=1" target="_blank" style="margin-right: 25px; text-decoration: none;">
	<img src="http://trendmakerhu.yusp.com/grrec-trendmakerhu-war/AdServlet?action=renderrec&amp;scenarioId=EMAIL_57&amp;templateId=CP2Template_Email%20recommendation%20test&amp;uid=%5Bemail%5D&amp;pos=1" style="width: 160px;">
</a>

-->

