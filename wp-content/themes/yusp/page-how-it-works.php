<?php get_header()?>

<section id="how-it-works" class="body row">
    <?php include('w-components/menu/menu-general.php'); ?>

    <?php the_post()?>

    <div class="content">
        <div class="fluid-container">
        <h1 class="the-title"><?php the_title()?></h1>
        <h2>how it works menu test</h2>
    </div>

</section>

<?php get_footer(); ?>