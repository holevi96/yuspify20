<?php
/** Template Name: sme single*/
get_header();the_post()?>
<?php include('w-components/menu/sme-menu.php'); ?>
<section id="sme-contianer" class="body row rich-text-wrapper">
    <div class="fluid-container container">
        <?php the_content(); ?>
    </div>
</section>
<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer();?>

