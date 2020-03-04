<section id="benefits" class="row">
    <div class="fluid-container">
        <h2><?php echo (get_field('benefits_widget_title'))?get_field('benefits_widget_title'):get_sub_field('benefits_widget_title'); ?></h2>
            <ul class="row">
            <?php while( have_rows('benefits') ): the_row();
                $h2 = get_sub_field('title');
                $p = get_sub_field('description');
                $img = get_sub_field('illustration');
                ?>

                <li class="row">

                    <div class="text-wrapper">
                        <div class="text-cell">
                            <h2 class="row"><?php echo $h2; ?></h2>
                            <p class="row">
                                <?php echo $p; ?>
                            </p>
                        </div>
                    </div>

                    <div class="illustration-wrapper">
                        <img src="<?php echo $img; ?>" alt="">
                    </div>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
</section>

