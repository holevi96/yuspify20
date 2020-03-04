<section id="collect-data" class="row">
    <div class="yfy-container">
        <ul>
            <li class="text">
                <h2 class="section-title purple">
                    <?php echo get_sub_field('h2'); ?>
                </h2>
                <p class="param">
                    <?php echo get_sub_field('p'); ?>
                </p>

                <ul class="data-types">
                    <?php while( have_rows('data_types') ): the_row(); ?>
                        <li><?php echo get_sub_field('data_type'); ?></li>
                    <?php endwhile; ?>
                </ul>
            </li>
            <li class="image">
                <div class="product-box">
                    <div class="image-wrapper">
                        <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/product-discount.svg" alt=""/>
                    </div>
                    <div class="text-wrapper">
                        <h2>Cross sale product</h2>
                        <h3>$148</h3>
                        <div class="yfy-button blue medium">Add to cart</div>
                    </div>
                    <img class="figure-love-product" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/figure-like-a-product.svg" alt=""/>
                </div>
            </li>
        </ul>
    </div>
</section>