<?php
/**
 * Template Name: Flexible content - Landing components
 */
get_header();the_post();
?>

<div id="<?php echo get_field('custom_id'); ?>" class="body row">
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
        elseif( get_row_layout() == 'horizontal_tabulator' ):
            include('w-components/landing-components/horizontal-tabulator.php');
        elseif( get_row_layout() == 'testimonials_widget' ):
            include('w-components/landing-components/testimonial-widget.php');
        elseif( get_row_layout() == 'sticky_menu' ):
            include('w-components/landing-components/sticky-menu.php');
        elseif( get_row_layout() == 'few_steps_to_start' ):
            include('w-components/landing-components/few-steps-to-start.php');
        elseif( get_row_layout() == 'simple_pricing' ):
            include('w-components/landing-components/simple-pricing.php');
        elseif( get_row_layout() == 'grid_with_icons' ):
            include('w-components/landing-components/grid_with_icons.php');
        elseif( get_row_layout() == 'platforms_and_modules' ):
            include('w-components/landing-components/platforms-and-modules.php');
        elseif( get_row_layout() == 'mobile_first_screen' ):
            include('w-components/landing-components/mobile-first-screen.php');
        elseif( get_row_layout() == 'flexible_client_kpis' ):
            include('w-components/landing-components/flexible_client_kpis.php');
		elseif( get_row_layout() == 'sme_call_to_action' ):
            include('w-components/landing-components/sme-call-to-action.php');
        elseif( get_row_layout() == 'recent_blog_posts' ):
            include('w-components/landing-components/recent-blogposts.php');
        elseif( get_row_layout() == 'pricing_section' ):
            include('w-components/landing-components/pricing-section.php');
        elseif( get_row_layout() == 'accordion' ):
            include('w-components/landing-components/accordion.php');
        elseif( get_row_layout() == 'engage_your_users_section' ):
            include('w-components/landing-components/product_tour_engage_your_users_section.php');
        elseif( get_row_layout() == 'collect_data_section' ):
            include('w-components/landing-components/product_tour_collect_data_section.php');
        elseif( get_row_layout() == 'automate-analyze_section' ):
            include('w-components/landing-components/product_tour_automate_analyze_section.php');
        elseif( get_row_layout() == 'engage_section' ):
            include('w-components/landing-components/product_tour_engage_section.php');
        elseif( get_row_layout() == 'measure_and_optimize_section' ):
            include('w-components/landing-components/product_tour_measure_and_optimize_section.php');
        elseif( get_row_layout() == 'grid_with_images' ):
            include('w-components/landing-components/grid_with_images.php');
        elseif( get_row_layout() == 'title_section.php' ):
            include('w-components/landing-components/title_section.php');
        endif;

    endwhile;

elseif(have_rows('tartalom_features')) :

    // no layouts found
endif;

?>
</div>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer(); ?>


