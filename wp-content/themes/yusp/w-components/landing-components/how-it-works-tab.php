<section id="how-it-works" class="row">

    <h2 class="text t-24 blue center uppercase mgT64 mgB24">
        <?php echo get_field('screen-tabs-title'); ?>
    </h2>
    <div class="hider"></div>

    <div class="form-control">
        <div class="row">
            <ul class="tabs row">
                <li class="tab current" id="1" data-tab="tab-1"><?php echo get_field('screen-tab-1'); ?></li>
                <li class="tab" id="2" data-tab="tab-2"><?php echo get_field('screen-tab-2'); ?></li>
                <li class="tab" id="3" data-tab="tab-3"><?php echo get_field('screen-tab-3'); ?></li>
                <li class="tab" id="4" data-tab="tab-4"><?php echo get_field('screen-tab-4'); ?></li>
                <li class="tab" id="5" data-tab="tab-5"><?php echo get_field('screen-tab-5'); ?></li>
            </ul>
        </div>
    </div>

    <div class="fluid-container">
        <div class="tab-content-container row">

            <div data-tab="1" id="tab-1" class="tab-content row show">
                <div id="item-page" class="image-wrapper mgB64">
                    <h3><?php echo get_field('screen-tab-1'); ?></h3>
                    <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/product-page.svg" alt="">

                    <ul class="reco-row">

                        <div class="help-button item-page">
                            <p>?</p>
                        </div>

                        <div class="tooltip">
                            <h4><?php echo get_field('screen-tab-1'); ?></h4>
                            <p>
                                <?php echo get_field('screen-tab-content-1'); ?>
                            </p>
                        </div>

                        <div class="recommended-for-you">
                            Recommended for you
                        </div>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-1.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-2.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-3.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-4.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div data-tab="2" id="tab-2" class="tab-content row">
                <div id="cart-page" class="image-wrapper mgB64">
                    <h3><?php echo get_field('screen-tab-2'); ?></h3>
                    <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/cart-page.svg" alt="">

                    <ul class="reco-row">

                        <div class="help-button cart-page">
                            <p>?</p>
                        </div>

                        <div class="tooltip">
                            <h4><?php echo get_field('screen-tab-2'); ?></h4>
                            <p>
                                <?php echo get_field('screen-tab-content-2'); ?>
                            </p>
                        </div>

                        <div class="recommended-for-you">
                            Frequently bought together
                        </div>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-20.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-21.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-22.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-23.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

            <div data-tab="3" id="tab-3" class="tab-content row">
                <div id="home-page" class="image-wrapper mgB64">
                    <h3><?php echo get_field('screen-tab-3'); ?></h3>
                    <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/home.svg" alt="">

                    <ul class="reco-row">

                        <div class="help-button home-page">
                            <p>?</p>
                        </div>

                        <div class="tooltip">
                            <h4><?php echo get_field('screen-tab-3'); ?></h4>
                            <p><?php echo get_field('screen-tab-content-3'); ?></p>
                        </div>

                        <div class="recommended-for-you">
                            Summer deals for you
                        </div>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-24.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-25.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-26.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-27.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div data-tab="4" id="tab-4" class="tab-content row">
                <div id="catergory-page" class="image-wrapper mgB64">

                    <h3><?php echo get_field('screen-tab-4'); ?></h3>
                    <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/browser.svg" alt="">

                    <ul class="reco-row">

                        <div class="help-button category-page">
                            <p>?</p>
                        </div>

                        <div class="tooltip">
                            <h4><?php echo get_field('screen-tab-4'); ?></h4>
                            <p><?php echo get_field('screen-tab-content-4'); ?></p>
                        </div>


                        <div class="recommended-for-you">Popular in the category</div>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-28.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-29.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-30.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>

                        <li class="product">
                            <div class="product-wrapper">
                                <div class="image col">
                                    <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/item-31.svg" alt="">
                                </div>
                                <div class="content">
                                    <h2>Product Title</h2>
                                    <p>price</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <img class="mgT56" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/category-page.svg" alt="">
                </div>
            </div>

            <div data-tab="5" id="tab-5" class="tab-content row">
                <div id="download-white-paper">
                    <div class="white-paper-cover col-sm-12 col-lg-6">
                        <img class="col" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/18-recommendation-types-whitepaper_cover.jpg" alt="">
                    </div>
                    <div class="white-paper-synopsis col-sm-12 col-lg-6">
                        <h2>What's in the whitepaper?</h2>

                        <p>
                            <br>
                            Nowadays nearly every online shop utilizes some sort of a product recommendation engine which is no wonder, as these systems can significantly boost revenues, CTRs, and improve customer experience.
                            <br>
                            <br>
                            In this whitepaper you will get 18 practical, best-performing eCommerce recommendation methods that you can use for your:
                            <br>
                            <br>
                            – Product page
                            <br>
                            – Cart Page
                            <br>
                            – Home page
                            <br>
                            – Category page
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="sing-up-form" class="row">
        <div class="test-form mgT32">
            <h2 class="text t24 center bold blue">Download the free white paper</h2>
             <?php echo do_shortcode('[mc4wp_form id="2650"]') ?>
        </div>
    </div>
    
</section>



