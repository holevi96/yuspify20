<?php
/** Template Name: Sme Case Studies Single Template*/
get_header();the_post()?>

<?php include('w-components/menu/sme-menu.php'); ?>
<?php include('w-components/page-components/single-case-study-components.php'); ?>
<?php include('w-components/footer/sme-footer.php'); ?>

<?php the_post()?>
<?php get_footer(); ?>
