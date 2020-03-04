<section id="engage" class="row">
    <div class="yfy-container">
        <div class="description">
            <h2 class="section-title purple">
                <?php echo get_sub_field('h2'); ?>
            </h2>
            <?php if(get_sub_field('p')): ?>
                <p class="param">
                    <?php echo get_sub_field('p'); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
<section id="horizontal-tabulator-wrapper" class="row">
    <div class="wrapper desktop">

        <div id="horizontal-tabulator" class="vertical-tabulator">
            <ul class="tab-header">
                <?php $i=0; ?>
                <?php while( have_rows('placement_types') ): the_row();

                    // vars
                    $title = get_sub_field('title');
                    ?>

                    <li data-tab="<?php echo $i; ?>" class="placement-type-tab vertical-tab <?php echo ($i==0)?'selected':''; ?>">
                        <h3><?php echo $title; ?></h3>
                    </li>
                    <?php $i++; ?>

                <?php endwhile; ?>
            </ul>

            <div class="leftside">
                <ul class="">
                    <?php $i=0; ?>
                    <?php while( have_rows('placement_types') ): the_row(); ?>
                        <li data-tab="<?php echo $i; ?>" class="vertical-tab-content <?php echo ($i==0)?'visible':''; ?>">
                            <h3><?php echo get_sub_field('title'); ?></h3>
                            <p><?php echo get_sub_field('description'); ?></p>
                            <h2><?php echo get_sub_field('kpi'); ?></h2>
                            <p><?php echo get_sub_field('kpi_text'); ?></p>
                            <p><?php echo get_sub_field('clients_name'); ?></p>
                        </li>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </ul>
            </div>

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

            <ul class='bullets'>
                <?php $i=0; while( have_rows('placement_types') ): the_row(); ?>
                    <li class='<?php echo ($i==0)?'active':'';?>' data-tab="<?php echo $i; ?>">

                    </li>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </ul>
        </div>

    </div>
    <div class="wrapper mobile flickity-mobile-slider">

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
                    <div class="content-wrapper">
                        <p><?php echo get_sub_field('description'); ?></p>
                        <h2><?php echo get_sub_field('kpi'); ?></h2>
                        <p><?php echo get_sub_field('kpi_text'); ?></p>
                        <img src="<?php echo get_sub_field('image_url'); ?>" alt="">
                    </div>
                </div>
                <?php $i++; ?>
            <?php endwhile; ?>
        </div>
    </div>

</section>