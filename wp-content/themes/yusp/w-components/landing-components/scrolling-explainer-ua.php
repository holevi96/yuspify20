<section id="scrolling-explainer" class="row fixed">
    
    <div class="fluid-container">
        <div class="wrapper">
            <div class="col-lg-4 col-xxl-3">

                <ul class="steps">
                    <li id="selector-1" class="tab-link" data-tab="tab-1">
                        Інтеграція
                        <span>1</span>
                    </li>
                    <li id="selector-2" class="tab-link" data-tab="tab-2">
                        Machine learning в дії
                        <span>2</span>
                    </li>
                    <li id="selector-3" class="tab-link" data-tab="tab-3">
                        Відображення рекомендацій
                        <span>3</span>
                    </li>
                    <li id="selector-4" class="tab-link" data-tab="tab-4">
                        Концентрація на даних
                        <span>4</span>
                    </li>
                    <li id="selector-5" class="tab-link" data-tab="tab-5">
                        Отримання результатів
                        <span>5</span>
                    </li>
                </ul>

            </div>
            <div class="col-lg-5 col-xxl-4">

                <div id="tab-1" class="description">
                    Інтегруйте Yusp з вашим інтернет-магазином, вставивши фрагмент коду відстеження або використовуючи один із доступних CMS плагінів
                </div>

                <div id="tab-2" class="description">
                    Система Yusp відстежує та аналізує поведінку користувачів на вашому сайті, і використовує ці дані для автоматичного визначення подібності товарів і вподобань користувачів
                </div>

                <div id="tab-3" class="description">
                    Ви можете використовувати Yusp для відображення рекомендацій на веб-сторінці товару, у кошику покупця, у категоріях чи на головній сторінці вашого онлайн-магазину
                </div>

                <div id="tab-4" class="description">
                    Система збирає та аналізує дані про поведінку користувачів на вашому сайті, щоб рекомендувати найбільш релевантні товари для кожного користувача індивідуально
                </div>

                <div id="tab-5" class="description">
                    Допомагаючи користувачам знайти товари, які вони шукають, ви можете максимізувати коефіцієнт конверсій та покращити досвід користувачів у вашому інтернет-магазині
                </div>

            </div>
        </div>
        
        <h2 id="headline-text">
            <?php echo get_field('headline'); ?>
            <br>
            <br>
            <?php echo get_field('description'); ?>
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

<script>
    
    jQuery('ul.steps li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');

        jQuery('ul.steps li').removeClass('selected');
        jQuery('.description').removeClass('selected');

        jQuery(this).addClass('selected');
        jQuery("#"+tab_id).addClass('selected');
    });
    
</script>


