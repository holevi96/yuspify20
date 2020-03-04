<section id="patents" class="row">
    <div class="fluid-container">

        <h2 class="general-title">Patents</h2>
        <ul id="patents" class="unit-listing">
            <?php while( have_rows('patent-listing') ): the_row();

                // vars
                $a= get_sub_field('patent-link');
                $a_text = get_sub_field('patent-number');
                $h2 = get_sub_field('patent-description');
                ?>

                <li class="patent-row row unit-row">
                    <a class="col" href="<?php echo $a ?>">
                        <?php echo $a_text ?>
                    </a>
                    <h2 class="col">
                        <?php echo $h2 ?>
                    </h2>
                </li>
                
            <?php endwhile; ?>
        </ul>

    </div>
</section>
