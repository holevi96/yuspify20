<?php if( have_rows('few-steps-to-start') ): ?>

<section id="few-steps-to-start" class="row mgT40">
    <h2 class="text t-24 blue center uppercase mgT24 mgB48"><?php  echo (get_field('few-steps-to-start-title'))?get_field('few-steps-to-start-title'):get_sub_field('few-steps-to-start-title'); ?></h2>
    <div class="wrapper fluid-container">

    <?php while( have_rows('few-steps-to-start') ): the_row();

        // vars
        $h2 = get_sub_field('step-name');
        $h3 = get_sub_field('description');
        ?>

        <div class="col-md-12 col-lg-4">
            <h2><?php echo $h2; ?></h2>
            <h3><?php echo $h3; ?></h3>
        </div>

    <?php endwhile; ?>

    </div>
</section>

<?php endif; ?>
