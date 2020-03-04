<?php get_header()?>

<?php the_post()?>

<section class="row">
    <div class="fluid-container">

        <div id="price-list" class="">

            <div class="col-sm-12 col-md-4 col-lg-4 price-wrapper">
                <div class="ingyenes">
                    <h3>Ingyenes</h3>

                    <h2 class="rpice">0</h2>

                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 price-wrapper">
                <div class="alap">
                    <h3>Alapszolgáltatás</h3>

                    <h2 class="rpice">20.000 Ft/hó</h2>

                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 price-wrapper">
                <div class="extra">
                    <h3>Extra szolgáltatás</h3>

                    <h2 class="rpice">55.000 Ft/hó</h2>

                </div>
            </div>


        </div>

    </div>
</section>

<?php get_footer(); ?>