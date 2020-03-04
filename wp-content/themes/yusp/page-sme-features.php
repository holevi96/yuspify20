<?php get_header();the_post()?>

<section id="sme-features" class="row body">
    <?php include('w-components/menu/sme-menu.php'); ?>
    <?php include('w-components/menu/sticky-menu.php'); ?>
    <header class="header row">
        <div class="fluid-container">
            <div class="logo col-md-12 col-xl-4">
                <a href="<?php echo get_home_url(); ?>/sme" class="col">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-SME-logo-standard.svg" alt="">
                </a>
            </div>
            <div class="intro col-md-12 col-xl-8">
                <h1>
                    Online personalization for businesses of all sizes
                </h1>
                <h3>
                    Yusp Digital is a is a scalable recommender and personalization solution serving clients from SMEs to large enterprise websites with millions of monthly traffic. We have a proven track record in online personalization, serving 5 billion recommendations a month, resulting in $40 million in extra revenues for our clients on f continents.
                </h3>

            </div>
        </div>
    </header>
</section>

<section id="main-feature" class="row">
    <div class="rotate-1"></div>
    <div class="rotate-2"></div>
    <div class="fluid-container">
        
        <div class="illustration">
            <img class="col" src="<?php echo get_field('feature-illustration') ?>" alt="">
        </div>

        <h2 class="title"><?php echo get_field('features-title'); ?> </h2>
        <ul class="features-description row">

            <?php while( have_rows('features-description') ): the_row();

                // vars
                $h2 = get_sub_field('title');
                $p = get_sub_field('description');
                $i = get_sub_field('icon-name');
                ?>

                <li class="col-sm-12 col-lg-4 description">
                    <i class="material-icons"><?php echo $i; ?></i>
                    <h2><?php echo $h2; ?></h2>
                    <p><?php echo $p; ?></p>
                </li>

            <?php endwhile; ?>

        </ul>

    </div>
</section>

<?php include('w-components/landing-components/placement-type-tabulator-section.php'); ?>

<section id="beta-features" class="row">
    <div class="">
        <h2 class="title">Beta Features</h2>
        <ul class="row">

            <?php while( have_rows('beta-features') ): the_row();
                $img = get_sub_field('image');
                $h2 = get_sub_field('title');
                $p = get_sub_field('description');
                $class = get_sub_field('class');
            ?>


            <li class="col-sm-12 col-lg-6 beta-feature <?php echo $class ?>">
                <div class="text-wrapper">
                    <h2><?php echo $h2 ?></h2>
                    <p><?php echo $p ?></p>
                </div>
                <img src="<?php echo $img ?>" alt="">
            </li>
            
            <?php endwhile; ?>
        </ul>
    </div>
</section>

<section id="call-to-action" class="sme-features row">
    <div class="fluid-container">
        <div class="wrapper">
            <h2 class="row mgB24">Get started today</h2>

            <div class="subtext row mgB24">
                Monetize Yusp's affordable machine learning technology <br>
                for your eCommerce store without any risk.
            </div>

            <a class="free-trial-call-to-action" href="https://account.yusp.com/checkout/?_ga=2.181529703.1969713503.1510756639-1597021942.1473872329">
                Start 30-Day Free Trial Now!
            </a>
        </div>
    </div>
</section>
<?php include('w-components/footer/sme-footer.php'); ?>
<?php the_post()?>
<?php get_footer(); ?>
