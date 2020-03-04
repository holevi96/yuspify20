<!--
<section id="" class="row">
    <div class="yfy-container">
        <h2 class="section-title">How it works</h2>
        <ul>
            <li class="text-wrapper">
                <h2></h2>
                <p></p>
            </li>
            <li class="image-wrapper">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/dekor-line.svg">
            </li>
        </ul>
    </div>
</section>
->

<?php if( have_rows('grid-with-images') ): ?>

<!-- DESKTOP -->
<section id="grid-with-images" class="row">

    <div class="yfy-container">
        <h2 class=""><?php echo get_field('grid-with-images-title'); ?> </h2>
        <ul class="row">

            <?php while( have_rows('grid-with-images') ): the_row();

                // vars
                $image = get_sub_field('image');
                $h2 = get_sub_field('title');
                $p = get_sub_field('description');
                ?>

                <li class="grid-unit">
                    <div class="text-wrapper">
                        <h2><?php echo $h2; ?></h2>
                        <p class=""><?php echo $p; ?></p>
                    </div>
                    <div class="image-wrapper">
                        <img src="<?php echo $image; ?>">
                    </div>
                </li>

                
            <?php endwhile; ?>
        </ul>
    </div>

</section>
<?php endif; ?>
