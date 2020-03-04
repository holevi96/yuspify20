<section id="above-the-fold-animation" class="row">
    <!-- mobile -->
    <div class="mobile fluid-container">

        <?php if( have_rows('select_scroll_items') ): ?>



            <div class="text">
                <h1>
                    <?php echo (get_field('headline'))?get_field('headline'):get_sub_field('headline'); ?>
                </h1>
                <h2>
                    <?php echo (get_field('description'))?get_field('headline'):get_sub_field('description'); ?>
                </h2>

                <div id="mobile-illustration" class="row">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/all-together.svg" alt="">
                </div>

                <!--
                <div id="mobile-breakdown" class="row">

                    <ul class="steps">

                        <?php while( have_rows('select_scroll_items') ): the_row();
                            $tab_content = get_sub_field('tab_content');
                            $menu_text = get_sub_field('menu_text');
                            ?>

                            <li class="row">
                                <h2><?php echo $menu_text; ?></h2>
                                <p>

                                    <?php echo $tab_content; ?>
                                </p>
                            </li>

                        <?php endwhile; ?>

                    </ul>
                </div>
                -->

                <div class="row">
                    <a href="https://account.yusp.com/checkout/?code=yusp20" class="start-free-trial mgT36">free trial</a>
                </div>
            </div>

        <?php endif; ?>

    </div>
</section>