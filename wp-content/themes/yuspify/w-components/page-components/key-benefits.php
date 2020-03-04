        <?php

        if( have_rows('key_benefits_flexible_content') ):
            while ( have_rows('key_benefits_flexible_content') ) : the_row();
                if( get_row_layout() == 'vertical_tabulator' ):
                    if( have_rows('key_benefits_list') ): ?>

                            <div class="vertical-tabulator desktop row">

                                <div class="fluid-container">

                                    <ul class="col-xs-12 col-md-12 col-lg-5">

                                        <?php $i=0; ?>
                                        <?php while( have_rows('key_benefits_list') ): the_row();

                                            // vars
                                            $title = get_sub_field('title');
                                            //$description = get_sub_field('description');
                                            ?>

                                            <li data-tab="<?php echo $i; ?>" class="placement-type-tab vertical-tab <?php echo ($i==0)?"selected":""; ?>">
                                                <h3><?php echo $title; ?></h3>
                                            </li>
                                            <?php $i++; ?>


                                        <?php endwhile; ?>
                                    </ul>

                                    <div class="col-xs-12 col-md-12 col-lg-7">
                                        <?php $i=0; ?>
                                        <div class="visible-placement ">

                                            <?php while( have_rows('key_benefits_list') ): the_row(); ?>
                                                <li data-tab="<?php echo $i; ?>" class="vertical-tab-content <?php echo ($i==0)?"visible":""; ?>">
                                                    <p><?php echo get_sub_field('description'); ?></p>
                                                </li>
                                                <?php $i++; ?>
                                            <?php endwhile; ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="features mobile">
                                    <ul class="row">

                                        <?php $i=0; ?>
                                        <?php while( have_rows('key_benefits_list') ): the_row();

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
                            </div>

                        <?php
                    endif;
                endif;
                if( get_row_layout() == 'horizontal_tabulator' ):
                    $tab_number = count(get_sub_field('key_benefits_list'));
                    $tab_grid_class_number = ($tab_number == 4)? 6 : 12 / $tab_number;

                    if( have_rows('key_benefits_list') ): ?>

                                <div id="horizontal" class="vertical-tabulator desktop row">
                                    <div class="fluid-container">

                                        <ul class="col-xs-12 col-md-12 col-lg-12">
                                            <div class="row">
                                            <?php $i=0;


                                            ?>
                                            <?php while( have_rows('key_benefits_list') ): the_row();

                                                // vars
                                                $title = get_sub_field('title');
                                                //$description = get_sub_field('description');
                                                ?>
                                                <div class="col-lg-<?php echo $tab_grid_class_number; ?>">
                                                <li data-tab="<?php echo $i; ?>" class="placement-type-tab vertical-tab horizontal <?php echo ($i==0)?"selected":""; ?>">
                                                    <h3><?php echo $title; ?></h3>
                                                </li>
                                                </div>
                                                <?php $i++; ?>


                                            <?php endwhile; ?>
                                            </div>
                                        </ul>

                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <?php $i=0; ?>
                                            <div class="visible-placement horizontal ">

                                                <?php while( have_rows('key_benefits_list') ): the_row(); ?>
                                                    <li data-tab="<?php echo $i; ?>" class="vertical-tab-content <?php echo ($i==0)?"visible":""; ?>">
                                                        <p><?php echo get_sub_field('description'); ?></p>
                                                    </li>
                                                    <?php $i++; ?>
                                                <?php endwhile; ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="features mobile">
                                    <ul class="row">

                                        <?php $i=0; ?>
                                        <?php while( have_rows('key_benefits_list') ): the_row();

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

                        <?php
                    endif;
                endif;
                ?>

                <div class="key-benefits-gird row">

                    <ul class="fluid-container">
                        <?php
                        if( get_row_layout() == 'grid' ):
							$tab_number = count(get_sub_field('key_benefits_list'));
							$tab_grid_class_number = ($tab_number >= 4)? 6 : 12 / $tab_number;
							$offset = false;
							if($tab_number % 2 == 1){
								$offset = true;
							}
                            if( have_rows('key_benefits_list') ):

									$cnt = 1;
                                while ( have_rows('key_benefits_list') ) : the_row();
                                        $icon = get_sub_field('icon_name');
                                        $row = get_sub_field('row');
                                ?>

                                    <li class="key-beneftis-list-unit col-lg-<?php echo $tab_grid_class_number ?> <?php echo ($cnt==$tab_number && $offset==true)?"col-offset-lg-3":"";?>">
                                        <i class="material-icons col"><?php echo $icon; ?></i>
                                        <p class="col">
                                            <?php echo $row; ?>
                                        </p>
                                    </li>


                                <?php $cnt++; endwhile;

                            endif;
                        endif;
                        ?>
                    </ul>
                </div>

            <?php
            endwhile;

        else :

            // no layouts found

        endif;
        ?>