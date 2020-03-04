<?php get_header()?>

    <section id="page-digital" class="body row">
        <?php include('w-components/menu/sme-menu.php'); ?>

        <?php include('w-components/page-components/above-the-fold.php'); ?>

        <?php the_post()?>

        <div class="content">
            <div class="fluid-container">
                <h1 class="the-title"><?php the_title()?></h1>
                <h2>yusp digital</h2>
            </div>
        </div>

    </section>

<?php get_footer(); ?>