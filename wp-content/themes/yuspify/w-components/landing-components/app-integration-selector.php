<section id="app-integration-selector" class="row">
    <div class="yfy-container">
        <h2 class="section-title white"><?php echo get_sub_field('app_integration_title');?></h2>
        <img class="modul-integration" src="<?php echo get_sub_field('app_selector_image'); ?>" alt="">
        <div id="horizontal-tabulator" class="vertical-tabulator">

            <ul class="list-of-apps">
                <?php
                $cnt = 0;
                while( have_rows('plugins') ): the_row(); ?>
                    <li class="vertical-tab" data-tab="<?php echo $cnt; ?>" tab-slug="<?php echo get_sub_field('tab_slug_name'); ?>">
                        <img class="logos" src="<?php echo get_sub_field('tab_image'); ?>" alt="">
                        <p><?php echo get_sub_field('tab_description'); ?></p>
                    </li>
                <?php $cnt++; endwhile; ?>
            </ul>

            <ul class="app-integration-steps">
                <?php $cnt = 0; while( have_rows('plugins') ): the_row(); ?>
                    <li class="vertical-tab-content" data-tab="<?php echo $cnt; ?>">

                        <?php include("flexible-magic-v2-layouts.php"); ?>
                    </li>
                <?php $cnt++; endwhile; ?>

            </ul>
        </div>
    </div>
</section>