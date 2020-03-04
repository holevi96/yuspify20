<?php
/** Template Name: Technology Pages*/
get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>
<?php include('w-components/menu/technology-menu.php'); ?>

<section id="general-contianer" class="body row">

        <?php
        // flexible content wrapper
        if( have_rows('technology-content-builder') ):
        // loop through the rows of data
            while ( have_rows('technology-content-builder') ) : the_row();

                if( get_row_layout() == 'add_patent_list' ):
                    include('w-components/page-components/patent-repeater.php');
                elseif( get_row_layout() == 'simple_text_row' ):
                    include('w-components/page-components/simple-text.php');
                elseif( get_row_layout() == 'add_a_list_of_publications' ):
                    include('w-components/page-components/publication-repeater.php');
                endif;

            endwhile;

        elseif(have_rows('tartalom_features')) :
            // no layouts found
        endif;
        ?>

</section>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer(); ?>

