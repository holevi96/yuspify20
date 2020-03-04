<?php get_header();the_post()?>
<?php include('w-components/menu/sme-menu.php'); ?>
<?php include('w-components/menu/sticky-menu.php'); ?>

<section id="sme" class="body light row">

    <section id="feed-campaign" class="row feed-campaign">
        <div class="desktop">
            <?php include ('w-components/landing-components/above-the-fold-animation.php') ?>
        </div>
        <div class="mobile">
            <?php include ('w-components/landing-components/mobile-first-screen.php') ?>
        </div>
<!--        --><?php //include ('w-components/landing-components/usp-for-install.php') ?>
<!--        --><?php //include ('w-components/landing-components/few-steps-to-start.php') ?>
<!--        --><?php //include ('w-components/landing-components/how-it-works-tab.php') ?>
        <?php include ('w-components/landing-components/benefits-widget.php') ?>
        <?php include ('w-components/landing-components/netflix-badge.php') ?>
        <?php include ('w-components/landing-components/proofing-numbers.php') ?>
        <?php include ('w-components/landing-components/platforms-and-modules.php') ?>
<!--        --><?php //include ('w-components/landing-components/key-clients.php') ?>
<!--        --><?php //include ('w-components/landing-components/simple-pricing.php') ?>
        <?php include ('w-components/landing-components/recent-blogposts.php') ?>
        <?php include ('w-components/landing-components/sme-call-to-action.php') ?>
    </section>

</section>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php the_post()?>
<?php get_footer(); ?>

