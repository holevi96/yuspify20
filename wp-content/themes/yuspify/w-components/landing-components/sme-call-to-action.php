<section id="call-to-action" class="sme-features row ">

    <!-- button&text mode: -->
    <?php if(get_sub_field('choose_type') == 'button'){
        $title = get_sub_field('title');
        $link =  get_sub_field('call_to_action_link');
        $text = get_sub_field('call_to_action_text');
        $p =  get_sub_field('paragraph'); ?>
        <div class="wrapper row">
            <div id="button-and-text">
                <div class="text-wrapper">
                    <h2><?php echo  $title; ?></h2>
                    <p>
                        <?php echo $p; ?>
                    </p>
                    <a class="yfy-button  large" href="<?php echo $link ;?>">
                        <?php echo $text;?>
                    </a>
                </div>

                <form action="" class="form-wrapper">
                    <img class="free-trial-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/free-trial-to-blue-background.svg">
                    
                    <!--
                    <input class="yfy-form-input small white-filled" type="text" placeholder="enter your email">
                    -->
                    <div class="row">
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <!-- start trial  mode: -->
    <?php if(get_sub_field('choose_type') == 'start'){
        $title =  get_sub_field('title');
        $p =  get_sub_field('paragraph'); ?>
        <div id="start-free-trial" class="row">

            <img class="dekor-line" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/dekor-line.svg">

            <div class="container">
                <div class="call-to-action-box">
                    <h2><?php echo $title ?></h2>
                    <p>
                        <?php echo  $p; ?>
                    </p>
                    <div class="form-wrapper">
                        <form action="">
                            <input class="yfy-form-input small blue" type="text" placeholder="enter your email">
                            <input class="yfy-form-input small blue" type="text" placeholder="enter domain">
                            <input class="yfy-form-input small blue" type="text" placeholder="enter your shopify admin ID">
                            <input class="button blue medium" type="submit" placeholder="start free trial now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php  } ?>
    
    <!-- whitepaper  mode: -->
    <div id="whitepaper-mode">
        <?php if(get_sub_field('choose_type') == 'whitepaper'){
            $title =  get_sub_field('title');
            $p =  get_sub_field('paragraph');
            $image_url =  get_sub_field('related_whitepaper_image'); //ez az URL-je a k�pnek
            $submit_text =  get_sub_field('submit_text');?>
            <h2>Here is a mailchimp form</h2>
            <?php echo do_shortcode("[mc4wp_form id='" . get_sub_field("mailchimp_form")[0] . "']") ?>
        <?php  } ?>
    </div>

</section>
