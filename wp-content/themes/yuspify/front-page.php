<?php
/**
 * Template Name: Flexible content magic v2
 */
get_header();the_post();
?>

<div id="<?php echo get_field('custom_id'); ?>" class="<?php echo get_field('custom_class'); ?> body row">
    <?php include('w-components/menu/sme-menu.php'); ?>

    <?php
        the_content();
    ?>
</div>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer(); ?>


