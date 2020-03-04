<section id="above-the-fold-animation" class="row">

    <div class="fluid-container">
        <div class="text">
            <h1>
                <?php echo get_field('headline'); ?>
            </h1>
            <h2>
                <?php echo get_field('description'); ?>
            </h2>

            <div class="cat-button-wrapper">
                <a class="start-free-trial mgT36" href="https://account.yusp.com/checkout/?code=yusp20">Kezdje meg a 30 napos próbaidőszakot!</a>
                <?php include ('cat-elements.php') ?>
            </div>

        </div>
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