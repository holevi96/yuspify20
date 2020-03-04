<section id="yfy-flexible-client-kpis" class="row">
    <?php if( have_rows('proofing-numbers') ): ?>
    
    <h2 class=""><?php echo get_field('company-numbers-title'); ?></h2>
    <ul class="">
        <?php while( have_rows('proofing-numbers') ): the_row();
        // vars
        $h2 = get_sub_field('number');
        $h3 = get_sub_field('title');
        $p = get_sub_field('description');
        $logo_url = get_sub_field('logo_url');
        ?>

        <li>
            <div>
                <h2><?php echo $h2; ?></h2>
                <h3>
                    <?php echo $h3; ?>
                </h3>
                <p>
                    <?php echo $p; ?>
                </p>
                <img class="logo" src="<?php echo $logo_url; ?>" alt="">
            </div>
        </li>

        <?php endwhile; ?>
    </ul>
    
    <?php endif; ?>
</section>
