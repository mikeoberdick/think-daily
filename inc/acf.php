<?php
/**
 * Setup Advanced Custom Fields
 *
 * @package understrap
 */

//Add the ACF options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Company Profile',
		'menu_title'	=> 'Company Profile',
		'menu_slug' 	=> 'company-profile'
	));
    
}

//Register the Google Maps API for use with ACF
function google_maps_scripts () {
	if (is_page('contact')) {
	   		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB_LlgIpFpelPIbA25yjUi_dhCywFKKYco', array(), '3', true );
			wp_enqueue_script( 'google-map-init', get_stylesheet_directory_uri() . '/js/google-maps.js', array('google-map', 'jquery'), '0.1', true );
		}
	}
	
add_action( 'wp_enqueue_scripts', 'google_maps_scripts' );

function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyB_LlgIpFpelPIbA25yjUi_dhCywFKKYco';
	return $api;	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
