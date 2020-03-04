<section id="netflix-badge" class="row">
    <div class="fluid-container slim mgB16">

        <?php if( have_rows('netflix-badge') ): ?>
        <div class="netflix row">

            <?php while( have_rows('netflix-badge') ): the_row();

                // vars
                $h2 = get_sub_field('title');
                $p = get_sub_field('description');
                ?>

            <div class="badge-wrapper col-lg-1">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/png/netflix-badge.png" alt=""/>
            </div>
            <div class="col-md-12 col-offset-lg-2 col-lg-8">
                <h2><?php echo $h2; ?></h2>
                <p><?php echo $p; ?></p>
            </div>

            <?php endwhile; ?>

        </div>
        <?php endif; ?>

    </div>
</section>