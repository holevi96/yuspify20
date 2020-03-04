<section id="measure" class="row">
    <div class="yfy-container">
        <div class="description">
            <h2 class="section-title purple">
                <?php echo get_sub_field('title'); ?>
            </h2>
            <?php if(get_sub_field('description')): ?>
                <p class="param">
                    <?php echo get_sub_field('description'); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="placement-type-tabulator-section" class="measure row">
    <div class="yfy-container desktop">
        <div class="vertical-tabulator">
            <div class="rightside">
                <?php $i=0; ?>
                <div class="visible-placement ">

                    <?php while( have_rows('placement_types') ): the_row(); ?>
                        <li data-tab="<?php echo $i; ?>" class="vertical-tab-content <?php echo ($i==0)?'visible':''; ?>">
                            <img src="<?php echo get_sub_field('image_url'); ?>" alt="">
                        </li>
                        <?php $i++; ?>
                    <?php endwhile; ?>

                </div>
            </div>
            <div class="leftside">
                <ul class="">
                    <?php $i=0; ?>
                    <?php while( have_rows('placement_types') ): the_row();

                        // vars
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        ?>

                        <li data-tab="<?php echo $i; ?>" class="placement-type-tab vertical-tab <?php echo ($i==0)?'selected':''; ?>">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $description; ?></p>
                        </li>
                        <?php $i++; ?>


                    <?php endwhile; ?>
                </ul>
            </div>


        </div>
        <ul class='bullets'>
            <?php $i=0; while( have_rows('placement_types') ): the_row(); ?>
                <li class='<?php echo ($i==0)?'active':'';?>' data-tab="<?php echo $i; ?>">

                </li>
                <?php $i++; ?>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="yfy-container mobile flickity-mobile-slider">
        <div class="button-row">
            <div class="button-group button-group--cells">
                <?php $i=0; while( have_rows('placement_types') ): the_row();
                    $title = get_sub_field('title'); ?>
                    <button class="slider-title <?php echo ($i==0)?'selected':''; ?>"><?php echo $title; ?></button>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </div>

        </div>
        <div class="carousel">
            <?php $i=0; ?>
            <?php while( have_rows('placement_types') ): the_row(); ?>
                <div class="carousel-cell">
                    <p><?php echo get_sub_field('description'); ?></p>
                    <img src="<?php echo get_sub_field('image_url'); ?>" alt="">
                </div>
                <?php $i++; ?>
            <?php endwhile; ?>
        </div>
    </div>

</section>