
    <?php if( have_rows('start-now-ups') ): ?>

    <!-- DESKTOP -->
    <section id="grid-with-icons" class="row">
        <ul class="grid-listing">
            <h2 class=""><?php echo get_field('usp-for-install-title'); ?> </h2><br>

            <?php while( have_rows('start-now-ups') ): the_row();

                // vars
                $i = get_sub_field('icon_name');
                $h2 = get_sub_field('title');
                $p = get_sub_field('description');
                ?>

                <li class="feature-col">
                    <i class="material-icons"><?php echo $i; ?></i>
                    <h2><?php echo $h2; ?></h2>
                    <p class=""><?php echo $p; ?></p>
                </li>

            <?php endwhile; ?>
        </ul>
    </section>


    <!-- MOBILE -->
    <!--
    <div class="mobile fluid-container">
        <div class="install start-free-trial">
            <h2 class="text t-24 blue mgT32">Start your 30-day free trial</h2><br>

            <?php while( have_rows('start-now-ups') ): the_row();

            // vars
            $p = get_sub_field('description');
            $i = get_sub_field('icon-name');
            ?>

                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 install-icon">
                    <i class="material-icons"><?php echo $i; ?></i>
                </div>

                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <p class="text t-18 gray mgT8"><?php echo $p; ?></p>
                </div>
            <?php endwhile; ?>
            
        </div>
    </div>
    -->

    <?php endif; ?>

