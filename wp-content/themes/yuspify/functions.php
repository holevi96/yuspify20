<?php
/**
 * Created by PhpStorm.
 * User: Gyuri
 * Date: 7/23/2015
 * Time: 2:06 PM
 */

register_nav_menus(
    array(
        'general-menu' => esc_attr__('general-menu'),
        'sme-menu' => esc_attr__('sme-menu'),
        'general-mobile' => esc_attr__('general-mobile'),
        'sme-mobile-left' => esc_attr__('sme-mobile-left'),
        'sme-mobile-right' => esc_attr__('sme-mobile-right'),
        'technology-menu' => esc_attr__('technology-menu')
    )
);

//show_admin_bar(false);
function custom_theme_setup() {
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'custom_theme_setup' );

add_action('wp_ajax_add_new_relation_post','add_new_relation_post');
function add_new_relation_post(){

    $title = $_POST['title'];
    $post_type = $_POST['posttype'];
    // Create post object
    $my_post = array(
        'post_title'    => $title,
        'post_content'  => '',
        'post_status'   => 'draft',
        'post_type' => $post_type
    );

// Insert the post into the database
    $post_id = wp_insert_post( $my_post );
    echo $post_id;
    exit();
}

/*
//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
*/

//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


// creating image caption
function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();
    acf_add_options_sub_page('header');
    acf_add_options_sub_page('footer');
    acf_add_options_sub_page('Blog settings');
    acf_add_options_sub_page('In page sliding menus - for custom post types');

}



function my_relationship_result( $title, $post, $field, $post_id ) {

    // load a custom field from this $object and show it in the $result
    $page_views = get_field('page_views', $post->ID);


    // append to title
    $title .= ' [' . $page_views .  ']';


    // return
    return $title;

}


// filter for every field
add_filter('acf/fields/relationship/result', 'my_relationship_result', 10, 4);



// Breadcrumbs
function custom_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}

// enqueue own scripts
function yusp_scripts() {
    global $post;
wp_deregister_script('jquery');
wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(  ), null, true );
//    wp_enqueue_script('filterizr', get_template_directory_uri() . '/js/jquery.filterizr.min.js', array('jquery'), false, false);
//    wp_enqueue_script('filter-case-studies', get_template_directory_uri() . '/js/filter-case-studies.js', array('jquery'), false, false);
   if( get_post_type( $post ) === "solution" && is_singular()){
       wp_enqueue_script( 'solutions.js', get_stylesheet_directory_uri() . '/js/solutions.js', array( 'jquery' ), false, true );

   }
    if( $post->post_name == 'blog'){
		
			wp_enqueue_script( 'pentafilter.js', get_stylesheet_directory_uri() . '/js/pentafilter.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'velocity.min.js', get_stylesheet_directory_uri() . '/js/velocity.min.js', array( 'jquery' ), false, true );
			
		
		wp_enqueue_script( 'inifinite-scroll-controller.js', get_stylesheet_directory_uri() . '/js/inifinite-scroll-controller.js', array( 'jquery' ), false, true );
		
	
		 wp_localize_script( 'inifinite-scroll-controller.js', 'my_ajax_object',
            array( 
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'main_url' => get_home_url()
			) 
		);
	}


	wp_enqueue_script( 'jquery.smoothscroll.min.js', get_stylesheet_directory_uri() . '/js/jquery.smoothscroll.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'appear.min.js', get_stylesheet_directory_uri() . '/js/appear.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'yuspify.min.js', get_stylesheet_directory_uri() . '/dist/yuspify.min.js', array( 'jquery' ), false, true );
    wp_localize_script( 'yuspify.min.js', 'my_ajax_object',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'main_url' => get_home_url()
        )
    );
	wp_enqueue_script( 'flickity', get_stylesheet_directory_uri() . '/js/lib/flickity/flickity.pkgd.min.js', array( 'jquery' ), false, true );
	wp_enqueue_style( 'flickity.min.css', get_stylesheet_directory_uri() . '/js/lib/flickity/flickity.min.css', array(), false, true );
	wp_enqueue_script( 'nouislider', get_stylesheet_directory_uri() . '/js/nouislider.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'dragdealer.min.js', get_stylesheet_directory_uri() . '/js/dragdealer.min.js', array( 'jquery' ), false, true );






}
add_action ('wp_enqueue_scripts', 'yusp_scripts');


add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
function wsds_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'jquery.smoothscroll.min.js',
		'yuspify.min.js',
		'flickity',
		'nouislider',
		'contact-form-7',
		
	);

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    
    return $tag;
} 


include('functions-levi.php');

add_action( 'wp_ajax_add_foobar', 'prefix_ajax_add_foobar' );
add_action( 'wp_ajax_nopriv_add_foobar', 'prefix_ajax_add_foobar' );

function prefix_ajax_add_foobar() {
    // Handle request then generate response using WP_Ajax_Response
	$paged = intval( $_POST['data'] ); 
	$the_query = new WP_Query( array(
					'post_type' => 'post',
					'paged' => $paged+1,
					'posts_per_page'=>6,
					'post_status' => 'publish'
				) );?>
				
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

				<?php get_template_part( 'template_parts/blog', 'grid-element' ); ?>
        
                <?php  endwhile; ?>
				<div class="row">
				<button page="<?php echo $paged+1; ?>"  class='more-blogs'>Load more...</button>
				</div>
				
    <?php // Don't forget to stop execution afterward.
    wp_die();
}

function get_terms_by_custom_post_type( $post_type, $taxonomy ){
  $args = array( 'post_type' => $post_type,'posts_per_page'=>-1);
  $loop = new WP_Query( $args );
  $postids = array();
  // build an array of post IDs
  while ( $loop->have_posts() ) : $loop->the_post();
    array_push($postids, get_the_ID());
  endwhile;
  // get taxonomy values based on array of IDs
  $regions = wp_get_object_terms( $postids,  $taxonomy );
  return $regions;
}

/*add_filter( 'wp_default_scripts', $af = static function( &$scripts) {
    $scripts->remove( 'jquery-migrate');
} );
unset( $af );*/


/*function wpb_adding_scripts() {
 
wp_register_script('yuspify.min.js', get_stylesheet_directory_uri() . '/dist/yusp.min.js', array('jquery'),'1.1', true);

wp_enqueue_script('my_amazing_script');
}
  
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); */


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'site_support'; // change to your post type
	$taxonomy  = 'support_plugins'; // change to your taxonomy
	$taxonomy2  = 'support_types'; // change to your taxonomy
	if ($typenow == $post_type) {
		
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
				$selected2      = isset($_GET[$taxonomy2]) ? $_GET[$taxonomy2] : '';
		$info_taxonomy2 = get_taxonomy($taxonomy2);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy2->label}"),
			'taxonomy'        => $taxonomy2,
			'name'            => $taxonomy2,
			'orderby'         => 'name',
			'selected'        => $selected2,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */


add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'site_support'; // change to your post type
	$taxonomy  = 'support_plugins'; // change to your taxonomy
	$taxonomy2  = 'support_types'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy2]) && is_numeric($q_vars[$taxonomy2]) && $q_vars[$taxonomy2] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy2], $taxonomy2);
		$q_vars[$taxonomy2] = $term->slug;
	}
}



