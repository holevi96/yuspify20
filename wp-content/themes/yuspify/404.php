<?php get_header();the_post()?>
<?php include('w-components/menu/sme-menu.php'); ?>
<div id="page-404">

    <h1>404!</h1>

    <section>
        <a class="back-to-home" href="<?php echo get_home_url(); ?>">
            <span>Back to home</span>
            <i class="material-icons">keyboard_backspace</i>
        </a>
        <h2>These are not the search terms you are looking for</h2>
    </section>

</div>
<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer() ;?>