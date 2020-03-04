<?php
/** Template Name: Sme Case Studies*/
get_header();the_post()?>
<?php include('w-components/menu/sme-menu.php'); ?>

<section id="case-studies-listing" class="body row">

    <div class="row">
<!--        <h2 class="title">Case Studies</h2>-->

        <ul id="case-studies-grid">

            <?php while (have_rows('sme_case_studies')): the_row();
                // vars
                $link = get_sub_field('cs_link');
                $title = get_sub_field('cs_title');
                $image = get_sub_field('cs_logo');
                $p = get_sub_field('cs_description');
                ?>

                <li class="case-study-wrapper">
                    <a href="<?php echo $link ?>" class="row wrapper">
                        <div class="image-wrapper">
                            <img class="row" src="<?php echo $image ?>" alt="">
                        </div>
                        <h2 class="row"><?php echo $title ?></h2>
                        <div class="p-wrapper row">
                            <p class="row">
                                <?php echo $p ?>
                            </p>
                        </div>
                    </a>
                </li>

            <?php endwhile; ?>
        </ul>

    </div>

</section>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php the_post()?>
<?php get_footer(); ?>
