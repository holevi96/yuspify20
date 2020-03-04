<div id="mega-menu-wrapper" class="visible <?php echo (get_field('choose_menu_style'))?get_field('choose_menu_style'):"";?>">
    <div class="row">

        <?php $a=0; ?>
        <?php while ( have_rows('product_menu', 'option') ): the_row();
            $product_menu_link = get_sub_field('product_menu_link');
            $product_menu_id = get_sub_field('product_menu_id');
            $product_menu_title = get_sub_field('product_menu_title');
            $product_menu_description = get_sub_field('product_menu_description');
            $product_menu_illustration = get_sub_field('product_menu_illustration');
            ?>

            <a href="<?php echo $product_menu_link ?>">
                <div data-id="<?php echo $a; ?>" id="<?php echo $product_menu_id ?>" class="products col-lg-4">
                    <div class="feature-wrapper">

                        <?php if( have_rows('product_menu_listing', 'option') ): ?>

                            <?php $i=0; ?>
                            <?php while ( have_rows('product_menu_listing', 'option') ): the_row(); ?>

                                <ul class="product-features">
                                    <li data-tab="<?php echo $i; ?>" class="feature"><?php echo get_sub_field('product_menu_list_units'); ?></li>
                                    <li data-tab="<?php echo $i; ?>" class="feature-content"><?php echo get_sub_field('product_menu_list_description'); ?></li>
                                </ul>

                                <?php $i++; ?>
                            <?php endwhile; ?>

                        <?php endif; ?>



                    </div>



                    <div class="title-wrapper">
                        <h2><?php echo $product_menu_title ?></h2>
                        <p><?php echo $product_menu_description ?></p>
                    </div>
                </div>
            </a>
            <?php $a++; ?>

        <?php endwhile; ?>

    </div>
</div>
