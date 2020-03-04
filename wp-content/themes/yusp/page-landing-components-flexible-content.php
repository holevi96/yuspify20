<?php
/**
 * Template Name: Flexible content - Landing components
 */
get_header();the_post();
?>

<div id="dynamic-landing-components" class="row <?php echo get_field('component-class'); ?>">
<?php include('w-components/menu/sme-menu.php'); ?>

<?php
/*echo get_the_ID();
$groups = acf_get_field_groups(array('post_id' => get_the_ID()));
foreach($groups as $g){
    var_dump($g);
}*/

// check if the flexible content field has rows of data
if( have_rows('tartalom_landing') ):

    // loop through the rows of data
    while ( have_rows('tartalom_landing') ) : the_row();

        if( get_row_layout() == 'above_the_fold_animation' ):
            include('w-components/landing-components/above-the-fold-animation.php');
        elseif( get_row_layout() == 'benefits_widget' ):
            include('w-components/landing-components/benefits-widget.php');
        elseif( get_row_layout() == 'key_clients' ):
            include('w-components/landing-components/key-clients.php');
        elseif( get_row_layout() == 'netflix_badge' ):
            include('w-components/landing-components/netflix-badge.php');
        elseif( get_row_layout() == 'placement_type_tabulator_section' ):
            include('w-components/landing-components/placement-type-tabulator-section.php');
        elseif( get_row_layout() == 'testimonials_widget' ):
            include('w-components/landing-components/testimonial-widget.php');
        elseif( get_row_layout() == 'sticky_menu' ):
            include('w-components/landing-components/sticky-menu.php');
        elseif( get_row_layout() == 'few_steps_to_start' ):
            include('w-components/landing-components/few-steps-to-start.php');
        elseif( get_row_layout() == 'simple_pricing' ):
            include('w-components/landing-components/simple-pricing.php');
        elseif( get_row_layout() == 'usp_for_install' ):
            include('w-components/landing-components/usp-for-install.php');
        elseif( get_row_layout() == 'platforms_and_modules' ):
            include('w-components/landing-components/platforms-and-modules.php');
        elseif( get_row_layout() == 'mobile_first_screen' ):
            include('w-components/landing-components/mobile-first-screen.php');
        elseif( get_row_layout() == 'proofing_numbers_content' ):
            include('w-components/landing-components/proofing-numbers.php');
		elseif( get_row_layout() == 'sme_call_to_action' ):
            include('w-components/landing-components/sme-call-to-action.php');
        elseif( get_row_layout() == 'recent_blog_posts' ):
            include('w-components/landing-components/recent-blogposts.php');
        elseif( get_row_layout() == 'pricing_section' ):
            include('w-components/landing-components/pricing-section.php');
        endif;

    endwhile;

elseif(have_rows('tartalom_features')) :

    // no layouts found
endif;

?>
</div>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer(); ?>


