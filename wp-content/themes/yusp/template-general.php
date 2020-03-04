<?php
/** Template Name: general single*/
get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>
<section id="general-contianer" class="body row">
    <div class="fluid-container container">
        <?php the_content(); ?>
    </div>
</section>
<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer();?>

