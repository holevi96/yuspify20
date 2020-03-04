<section id="case-studies" class="row">
    <div class="wrapper">
        <ul>
            <?php $cnt=0;  while( have_rows('studies') ): the_row();
            if($cnt%2 == 0){ ?>
                
            <li>
                <div class="text">
                    <h2>
                        <?php echo get_sub_field('percentage'); ?>
                    </h2>
                    <h3>
                        <?php echo get_sub_field('title'); ?>
                    </h3>
                    <p>
                        <?php echo get_sub_field('description'); ?>
                    </p>
                </div>

                <div class="image">
                    <img class="browser" src="<?php echo get_sub_field('image'); ?>" alt="">
                    <img class="figure" src="<?php echo get_sub_field('figure'); ?>" alt="">
                </div>
            </li>


            <?php }else{ ?>
                
            <li>
                <div class="image">
                    <img class="browser" src="<?php echo get_sub_field('image'); ?>" alt="">
                    <img class="figure" src="<?php echo get_sub_field('figure'); ?>" alt="">

                </div>

                <div class="text">
                    <h2>
                        <?php echo get_sub_field('percentage'); ?>
                    </h2>
                    <h3>
                        <?php echo get_sub_field('title'); ?>
                    </h3>
                    <p>
                        <?php echo get_sub_field('description'); ?>
                    </p>
                </div>
            </li>


           <?php }
            ?>

            <?php endwhile; ?>

        </ul>
    </div>
</section>
