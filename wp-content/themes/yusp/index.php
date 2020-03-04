<?php get_header();the_post()?>

<section id="" class="body row">
    <?php include('w-components/menu/menu-general.php'); ?>

    <?php the_post()?>

    <div class="content">
        <div class="fluid-container">
            <h1 class="the-title"><?php the_title()?></h1>
            <h1>Home page</h1>
            <h2>general page test</h2>
            <?php get_the_content(); ?>
        </div>
    </div>
    
</section>

<?php get_footer(); ?>
