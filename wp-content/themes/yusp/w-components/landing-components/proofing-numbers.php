<section id="numbers" class="row">
    <?php if( have_rows('proofing-numbers') ): ?>
    
    <h2 class="text t-24 blue center uppercase mgT24 mgB24"><?php echo get_field('company-numbers-title'); ?></h2>
    <div class="fluid-container">
        <?php while( have_rows('proofing-numbers') ): the_row();
        // vars
        $h2 = get_sub_field('number');
        $h3 = get_sub_field('title');
        $p = get_sub_field('description');
        $logo_url = get_sub_field('logo_url');
        ?>

        <div class="col-md-12 col-lg-4 examples">
            <h2><?php echo $h2; ?></h2>
            <h3>
                <?php echo $h3; ?>
            </h3>
            <p>
                <?php echo $p; ?>
            </p>
<!--            <img class="logo" src=--><?php //echo $logo_url; ?><!-- alt="">-->
<!--            <img class="logo" src="--><?php //get_sub_field('logo_url'); ?><!--" alt="">-->
            <img class="logo" src="<?php echo $logo_url; ?>" alt="">
        </div>
        <?php endwhile; ?>
    </div>
    
    <?php endif; ?>
</section>
