<?php
/**  Template Name: Landing components  */
get_header();the_post()?>
<?php include('w-components/menu/sme-menu.php'); ?>
<section id="feed-campaign" class="row feed-campaign">
    <div class="desktop">
        <!--        --><?php //include ('w-components/landing-components/scroller-rows.php') ?>
        <?php include ('w-components/landing-components/above-the-fold-animation.php') ?>
    </div>
    <div class="mobile">
        <?php include ('w-components/landing-components/mobile-first-screen.php') ?>
    </div>
    <?php include ('w-components/landing-components/usp-for-install.php') ?>
    <?php include ('w-components/landing-components/few-steps-to-start.php') ?>
    <?php include ('w-components/landing-components/how-it-works-tab.php') ?>
    <?php include ('w-components/landing-components/placement-type-tabulator-section.php') ?>
    <?php include ('w-components/landing-components/signup-form.php') ?>
    <?php include ('w-components/landing-components/netflix-badge.php') ?>
    <?php include ('w-components/landing-components/proofing-numbers.php') ?>
    <?php //include ('w-components/landing-components/key-clients.php') ?>
    <?php include ('w-components/landing-components/simple-pricing.php') ?>
</section>
<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer();?>


