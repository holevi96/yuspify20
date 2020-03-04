<section id="app-landing-above-the-fold" class="row">

    <div class="row">
        <div id="product-tour" class="yfy-container">
            <section id="engage-your-users" class="">
                <img class="app-logo" src="<?php echo get_sub_field('app-logo'); ?>" alt=""/>
                <h1><?php echo get_sub_field('h1'); ?></h1>
                <h2><?php echo get_sub_field('h2'); ?>
                </h2>
                <img class="personalization" src="<?php echo get_sub_field('image'); ?>" alt=""/>

                <div class="register-now">
                    <!--
                    <form action="" class="yfy-form-input">
                        <input id="register-now-email" class="" type="text" placeholder="hello@yuspify.com">
                        <input type="submit" class="" placeholder="register">
                    </form>
                    -->
                    <ul class="benefits">
                        <li>30 days free</li>
                        <li>Easy set up </li>
                        <li>No credit card required</li>
                    </ul>
                    <a href="<?php echo get_sub_field('call-to-action-link'); ?>" class="yfy-button medium purple">Start free trial</a>
                </div>
            </section>
        </div>
    </div>
	
    <div id="app-integration-selector" class="row">

        <h2 class="section-title purple"><?php echo get_sub_field('section_title'); ?></h2>

        <ul class="app-integration-steps yfy-container">
            
                <?php $cnt = 0; while( have_rows('sections') ): the_row(); ?>
					<li class="vertical-tab-content"><?php include("flexible-magic-v2-layouts.php"); ?></li>
				<?php $cnt++; endwhile; ?>
            
        </ul>

    </div>
	

	
	
	
    <div id="app-interface-details" class="row">
        <div class="wrapper">
            <ul>
                <li>
                    <h2 class="section-title purple"><?php echo get_sub_field('app_description_title'); ?></h2>
                    <p><?php echo get_sub_field('app_description_text'); ?></p>
                    <a href="<?php echo get_sub_field('app_description_button_link'); ?>" class="button medium blue"><?php echo get_sub_field('app_description_button_text'); ?></a>
                </li>
                <li>
                    <img class="ipad" src="<?php echo get_sub_field('app_description_image'); ?>" alt="">
                </li>
            </ul>
        </div>
    </div>
</section>

