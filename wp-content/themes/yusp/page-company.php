<?php
/** Template Name: Company Page*/
get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

    <div id="company-page" class="row">

        <section id="about-us" class="row"><a name="about"></a>
			<div class="fluid-container">
                <?php the_content(); ?>
            </div>
        </section>

        <section id="in-the-press" class="row">
            <div class="fluid-container">

                <h2 class="general-title">In the press</h2>

                <ul class="grid-listing row">
                    <?php while( have_rows('press-grid') ): the_row();

                        // vars
                        $a= get_sub_field('press-link');
                        $h2 = get_sub_field('press-title');
                        $p = get_sub_field('press-description');
                        $img = get_sub_field('press-image');
                        ?>

                        <li class="list-element col-xs-12 col-md-6 col-lg-3">
                            <a class="row" href="<?php echo $a; ?>">
                                <img src="<?php echo $img; ?>" alt="">
                                <div class="text-wrapper">
                                    <h3 class="text t-18 gray mgT8"><?php echo $h2; ?></h3>
                                    <p class=""><?php echo $p; ?></p>
                                </div>
                            </a>
                        </li>

                    <?php endwhile; ?>
                </ul>

            </div>
        </section>

        <section id="partners" class="row">
            <div class="fluid-container">
                <h2 class="general-title mgT24 mgB24">Partners</h2><a name="partners"></a>

                <?php if( have_rows('company_partners') ): ?>

                    <ul class="partner-row row">
                    <?php
                    $i = 0;
                    $field_num = get_field_object('company_partners');
                    $count = (count($field_num['value']));
                    while( have_rows('company_partners') ): the_row();
                        // vars
                        $i++;
                        $image = get_sub_field('partner_image');
                        $link = get_sub_field('partner_link');
                        $num_row = 6;
                        ?>

                        <li class="partner col-lg-2 col-sm-6 col-xs-12">
                            <a href="<?php echo $link; ?>">
                                <img class="" src="<?php echo $image; ?>" alt=""/>
                            </a>
                        </li>

                        <?php if($i % $num_row == 0 && $count != $i): ?>
                            </ul>
                            <ul class="partner-row row">
                        <?php endif; ?>

                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div
        </section>

        <section id="team" class="row">
            <ul class="row">
                <div class="fluid-container">
                    <h2 class="general-title mgT24 mgB24">Team</h2>
					<?php
					$cnt = 0;
					if( have_rows('team_members') ):
						while ( have_rows('team_members') ) : the_row(); 
						if($cnt < 4):
						?>
							
							<li class="team-member">
								<img class="member" src="<?php the_sub_field('image'); ?>" alt=""/>
								<div class="row">
									<h2 class="name row"><?php the_sub_field('name'); ?></h2>
									<h3 class="member-position"><?php the_sub_field('position'); ?></h3>
								</div>
							</li>
					<?php  endif; $cnt++; endwhile; endif; ?>					

                </div>
            </ul>

            <div id="team-member-details" class="row">
				<?php
					if( have_rows('team_members') ):
						while ( have_rows('team_members') ) : the_row(); ?>
						<div class="detail-box fluid-container"><?php the_sub_field('description'); ?></div>	
					<?php  endwhile; endif; ?>
            </div>

            <ul class="row">
                <div class="fluid-container">
					<?php
					$cnt = 0;
					if( have_rows('team_members') ):
						while ( have_rows('team_members') ) : the_row(); 
						if($cnt > 3):
						?>
							
							<li class="team-member">
								<img class="member" src="<?php the_sub_field('image'); ?>" alt=""/>
								<div class="row">
									<h2 class="name row"><?php the_sub_field('name'); ?></h2>
									<h3 class="member-position"><?php the_sub_field('position'); ?></h3>
								</div>
							</li>
					<?php  endif; $cnt++; endwhile; endif; ?>					
                </div>
            </ul>
        </section>

        <section id="careers" class="row">

            <div class="fluid-container">
                <div class="col-lg-7 careers-list">
                    <h2 class="general-title mgT24 mgB24">Careers</h2>
                    <div class="description row">
                        Gravity R&D has developers working out of Budapest, Hungary and is fortunate to have attracted some of the top data mining and machine learning talent from the region. What's more important - and this is great news - our data miners and developers stay. Why do they love this company? Some reasons for their satisfaction are: daily contact with bright minds, exciting projects, the innovative but relaxed atmosphere, and the rewarding feeling of working on a great product.
                    </div>

                    <div class="careers-listsing">
                        <?php

                        $posts = get_field('careers_relationship');

                        if( $posts ): ?>
                            <ul class="careers">
                                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>
                                    <li class="career">
                                        <a href="<?php the_permalink(); ?>">
                                            <i class="material-icons col">person_add</i>
                                            <p class="col">
                                            <?php the_title(); ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-5 benefits-wrapper">
                    <div class="benefits">
                        <h2 class="general-title mgT24 mgB24">Benefits</h2>
                        <ul class="benefits-list">
                            <li>Inspiring startup atmosphere</li>
                            <li>Participation in creating a unique state-of-the-art technology</li>
                            <li>Comfortable working conditions (no dress code, free snacks and beverages, foosball, table tennis etc.)</li>
                            <li>Flexible working hours</li>
                            <li>Experienced, creative colleagues</li>
                        </ul>
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/lk7-qMpHCWE" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </section>

        <section id="grants-widget" class="row">
            <div class="fluid-container">

                <h2 class="general-title mgT24 mgB24">Grants</h2>

                <?php if( have_rows('grants_widget') ): ?>
                    <div id="accordion" class="row mgT24">
                        <?php while( have_rows('grants_widget') ): the_row();

                            // vars
                            $h3 = get_sub_field('grants_title');
                            $p = get_sub_field('grants_editor');
                            $img = get_sub_field('grants_images');
                            ?>

                            <h4 class="accordion-toggle row"><?php echo $h3; ?></h4>
                            <div class="accordion-content row">
                                <div class="row">
                                    <img class="row" src="<?php echo $img; ?>" alt="">
                                </div>
                                <p class="col-lg-8">
                                    <?php echo $p; ?>
                                </p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>

    </div>

    <script>
        // Click event on team member containers
        jQuery(".team-member").click(function(){

            // If selected member is clicked again, remove selection and select none
            // If new member is clicked, move active selection to that member
            if(jQuery(this).hasClass(".selected")){
                jQuery(this).removeClass(".selected");
            }
            else{
                jQuery(".team-member.selected").removeClass("selected");
                jQuery(this).addClass("selected");
            }

            var index = jQuery(".team-member").index(this);

            var $detailsBox = jQuery(jQuery(".detail-box")[index]);

            if($detailsBox.hasClass("selected")){
                $detailsBox.removeClass("selected");
            }
            else{
                jQuery(".detail-box.selected").removeClass("selected");
                $detailsBox.addClass("selected");
            }
        })

    </script>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer();?>