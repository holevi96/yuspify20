<section id="platforms-and-modules" class="row">
    <div class="fluid-container">
        <h2>Supported Platforms</h2>

        <ul class="row">
            <?php while( have_rows('platform_and_modules') ): the_row();
                // vars
                $logo = get_sub_field('logo');
                $link = get_sub_field('link');
                ?>

                <li class="col-lg-3 col-md-6 col-xs-12 platform">
                    <a href="<?php echo $link; ?>" class="row">
                        <img class="row" src="<?php echo $logo; ?>" alt="">
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <h3>And any custom build online stores</h3>

    </div>
</section>