<?php

/*
Plugin Name: RECO Customs
Description: Customizations for recoplatform.com
Version:     1.0
Author:      Földesi Zsolt
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No tinmkering around!' );

add_filter('the_content', 'capitalize_reco');

function capitalize_reco($original_content){
    return str_replace(" recommendation", " <b>RECO</b>mmendation", $original_content);
}

add_filter('the_excerpt', 'do_shortcode');
add_filter('get_the_excerpt', 'do_shortcode');

