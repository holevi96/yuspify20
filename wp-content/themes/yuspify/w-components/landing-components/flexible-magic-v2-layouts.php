<?php

// check if the flexible content field has rows of data
if( have_rows('sections_groups') ):

    // loop through the rows of data
    while ( have_rows('sections_groups') ) : the_row();
        while ( have_rows('tartalom_landing') ) : the_row();
            if( get_row_layout() == 'above_the_fold_animation' ):
                include('above-the-fold-animation.php');
            elseif( get_row_layout() == 'title_section' ):
                include('title_section.php');
            elseif( get_row_layout() == 'benefits_widget' ):
                include('benefits-widget.php');
            elseif( get_row_layout() == 'key_clients' ):
                include('key-clients.php');
            elseif( get_row_layout() == 'netflix_badge' ):
                include('netflix-badge.php');
            elseif( get_row_layout() == 'placement_type_tabulator_section' ):
                include('placement-type-tabulator-section.php');
            elseif( get_row_layout() == 'horizontal_tabulator' ):
                include('horizontal-tabulator.php');
            elseif( get_row_layout() == 'testimonials_widget' ):
                include('testimonial-widget.php');
            elseif( get_row_layout() == 'sticky_menu' ):
                include('sticky-menu.php');
            elseif( get_row_layout() == 'few_steps_to_start' ):
                include('few-steps-to-start.php');
            elseif( get_row_layout() == 'simple_pricing' ):
                include('simple-pricing.php');
            elseif( get_row_layout() == 'grid_with_icons' ):
                include('grid_with_icons.php');
            elseif( get_row_layout() == 'platforms_and_modules' ):
                include('platforms-and-modules.php');
            elseif( get_row_layout() == 'mobile_first_screen' ):
                include('mobile-first-screen.php');
            elseif( get_row_layout() == 'flexible_client_kpis' ):
                include('flexible_client_kpis.php');
            elseif( get_row_layout() == 'sme_call_to_action' ):
                include('sme-call-to-action.php');
            elseif( get_row_layout() == 'recent_blog_posts' ):
                include('recent-blogposts.php');
            elseif( get_row_layout() == 'classic_pricing_section' ):
                include('classic-pricing-section.php');
            elseif( get_row_layout() == 'yuspify_pricing_section' ):
                include('yuspify-pricing-section.php');
            elseif( get_row_layout() == 'accordion' ):
                include('accordion.php');
            elseif( get_row_layout() == 'engage_your_users_section' ):
                include('product_tour_engage_your_users_section.php');
            elseif( get_row_layout() == 'collect_data_section' ):
                include('product_tour_collect_data_section.php');
            elseif( get_row_layout() == 'automate-analyze_section' ):
                include('product_tour_automate_analyze_section.php');
            elseif( get_row_layout() == 'engage_section' ):
                include('product_tour_engage_section.php');
            elseif( get_row_layout() == 'measure_and_optimize_section' ):
                include('product_tour_measure_and_optimize_section.php');
            elseif( get_row_layout() == 'grid_with_images' ):
                include('grid_with_images.php');
            elseif( get_row_layout() == 'app_integration_selector' ):
                include('app-integration-selector.php');
            elseif( get_row_layout() == 'company-in-numbers-horizontal' ):
                include('company-in-numbers-horizontal.php');
            elseif( get_row_layout() == 'horizontal-timeline' ):
                include('horizontal-timeline.php');
            elseif( get_row_layout() == 'case-studies' ):
                include('case-studies.php');
            elseif( get_row_layout() == 'improve_performance' ):
                include('improve_performance.php');
            elseif( get_row_layout() == 'app_landing_above_the_fold' ):
                include('app-landing-atf.php');
            elseif( get_row_layout() == 'shopify_plugin' ):
                include('shopify-plugin.php');
			elseif( get_row_layout() == '1-2-3_steps' ):
                include('1-2-3-steps.php');
				
            endif;
        endwhile;
    endwhile;

elseif(have_rows('tartalom_features')) :

    // no layouts found
endif;