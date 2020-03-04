<?php get_header();?>
<?php include('w-components/menu/menu-general.php'); ?>
<?php include('w-components/menu/technology-menu.php'); ?>

<section id="why-us" class="body row">

    <section id="the-team" class="row">
        <div class="fluid-container">

            <?php while ( have_rows('team_block')): the_row();
            ?>

            <div class="col-xs-12 col-md-12 col-lg-7">
                <h2><?php echo get_sub_field('team_title'); ?></h2>
                <p><?php echo get_sub_field('team_description'); ?></p>
            </div>
            <div class="col-xs-12 col-md-12 col-offset-lg-2 col-lg-3">
                <img class="badge" src="<?php echo get_sub_field('team_badge'); ?>" alt="">
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    
    <section id="awards" class="row">
        <div class="fluid-container">
            <h2 class="title">Awards</h2>

            <ul class="grid-listing row">
                <?php while( have_rows('awards-grid') ): the_row();

                    // vars
                    $a= get_sub_field('awards-link');
                    $h2 = get_sub_field('awards-title');
                    $p = get_sub_field('awards-description');
                    $img = get_sub_field('awards-image');
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

    <!--
    <section id="patents" class="row">
        <div class="fluid-container">

            <h2 class="title">Patents</h2>
            
            <ul class="unit-listing">

                <?php while( have_rows('patent-listing') ): the_row();

                // vars
                $a= get_sub_field('patent-link');
                $a_text = get_sub_field('patent-number');
                $h2 = get_sub_field('patent-description');
                ?>
                
                <li class="patent-row row unit-row">
                    <a class="col" href="<?php echo $a ?>">
                        <?php echo $a_text ?>
                    </a>
                    <h2 class="col">
                        <?php echo $h2 ?>
                    </h2>
                </li>

                <?php endwhile; ?>

            </ul>

        </div>
    </section>
    -->

    <!--
    <section id="publications" class="row">
        <div class="fluid-container">

            <h2 class="title">Publications</h2>
            
            <ul class="unit-listing">

                <?php while( have_rows('publications-listing') ): the_row();
                // vars
                $free_text= get_sub_field('free-text');
                ?>
                
                    <li class="publication-row unit-row">
                        <div class="free-text"><?php echo $free_text ?></div>
                    </li>
                
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
    -->



</section>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer(); ?>

