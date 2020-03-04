<section id="improove-performance" class="row">
    <div class="wrapper">
        <ul>
            <?php while( have_rows('improve_performance') ): the_row();

                // vars
                $image = get_sub_field('image');
                $icon = get_sub_field('icon');
                $h2 = get_sub_field('title');
                $p = get_sub_field('description');
                ?>

                <li class="grid-unit">
<!--                    <i class="material-icons">--><?php //echo $icon ?><!--</i>-->
                    <img src="<?php echo $image ?>" alt="">
                    <h2><?php echo $h2; ?></h2>
                    <p class=""><?php echo $p; ?></p>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
</section>