<style>
    <?php   ?>
</style>

<div id="transition" class="row">
    <section id="above-the-fold" class="row">
        <div class="circle grad1"></div>

        <div class="wrapper">
            <div class="text-box">
<!--                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/img/svg/yuspify-logo.svg" alt="">-->

                <h1>
                    <?php echo (get_field('headline'))?get_field('headline'):get_sub_field('headline'); ?>
                </h1>
                <h2>
                    <?php echo (get_field('description'))?get_field('description'):get_sub_field('description'); ?>
                </h2>
                <a href="<?php echo get_home_url(); ?>/start-free-trial/" class="button large purple">Get the app</a>


                <!-- simple button mode: -->
                <?php if(get_sub_field('choose_mode') == 'one'){
                    $btext = get_sub_field('button_text_1');
                    $blink = get_sub_field('button_link_1'); ?>
                    <a href="<?php echo $blink; ?>" class="button medium ghost"><?php echo $btext; ?></a>
                <?php } ?>

                <!-- double button  mode: -->

                <?php if(get_sub_field('choose_mode') == 'two'){
                    $btext1 = get_sub_field('button_text_1');
                    $blink1 = get_sub_field('button_link_1');
                    $blink2 = get_sub_field('button_text_2');
                    $blink2 = get_sub_field('button_link_2'); ?>
                    <div id="double-button-wrapper">
                        <a class="first" href="<?php echo $btext1 ?>0">
                            <span>1</span>
                            <?php echo $blink1 ?>
                        </a>
                        <a class="second" href="<?php echo $btext2 ?>">
                            <span>2</span>
                            <?php echo $blink2 ?>
                        </a>
                    </div>
                <?php }
                ?>
            </div>

            <!-- register now mode: -->
            <?php if(get_sub_field('choose_mode') == 'register'){ ?>
                <form id="register-now-side" action="">
                    <h2>Register now!</h2>
                    <label for="register-now-email">Your corporate e-mail address</label>
                    <input id="register-now-email" class="yfy-form-input large white" type="text" placeholder="example: hello@yuspify.com">
                    <label for="register-now-domain">your domain name</label>
                    <input id="register-now-domain" class="yfy-form-input large white" type="text" placeholder="example: yuspify.com">
                    <input type="submit" class="yfy-form-input large white-submit" placeholder="register">
                </form>
            <?php } ?>

        </div>

        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/light-round.svg" alt="" class="center-circle">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/light-round.svg" alt="" class="middle-left">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/light-round.svg" alt="" class="middle-right">

        <img class="cloud" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/cloud-fletyasz-lowcolor.svg" alt="">
        <img class="mask" src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/abtf-bg-mask.svg" alt="">
    </section>
</div>

<?php //include "improve-performance.php"; ?>

