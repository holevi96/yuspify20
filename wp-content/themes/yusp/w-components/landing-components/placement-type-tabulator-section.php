<section id="placement-type-tabulator-section" class="row">
    <div class="fluid-container">
        <h2 class="row text t-24 blue center uppercase mgB24 mgT24"><?php echo (get_field('section-title'))?get_field('section-title'):get_sub_field('section-title');?></h2>
        
        <div class="vertical-tabulator desktop">
		<div class="leftside">
            <ul class="">

                <?php $i=0; ?>
                <?php while( have_rows('placement_types') ): the_row();

                    // vars
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    ?>

                    <li data-tab="<?php echo $i; ?>" class="placement-type-tab vertical-tab">
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $description; ?></p>
                    </li>
                    <?php $i++; ?>


                <?php endwhile; ?>
            </ul>
		</div>
            <div class="rightside">
                <?php $i=0; ?>
                <div class="visible-placement ">

                    <?php while( have_rows('placement_types') ): the_row(); ?>
                        <li data-tab="<?php echo $i; ?>" class="vertical-tab-content">
                            <img src="<?php echo get_sub_field('image_url'); ?>" alt="">
                        </li>
                        <?php $i++; ?>
                    <?php endwhile; ?>

                </div>
            </div>
		
        </div>
		<div class="row">
				<ul class='bullets'>
				<?php $i=0; while( have_rows('placement_types') ): the_row(); ?>
                        <li class='<?php echo ($i==0)?'active':'';?>' data-tab="<?php echo $i; ?>">
                           
                        </li>
                        <?php $i++; ?>
                <?php endwhile; ?>
			</ul>
		</div>
        

    </div>
	<div class="">
		<div class="features mobile">
            <ul class="row">

                <?php $i=0; ?>
                <?php while( have_rows('placement_types') ): the_row();

                    // vars
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    ?>

                    <li data-tab="<?php echo $i; ?>" class="placement-type-tab vertical-tab">
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $description; ?></p>
                        <img src="<?php echo get_sub_field('image_url'); ?>" alt="">
                    </li>
                    <?php $i++; ?>


                <?php endwhile; ?>
            </ul>
        </div>
	</div>
</section>