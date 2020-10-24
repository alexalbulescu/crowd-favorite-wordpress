<?php
/**
* Plugin Name:Test Crowd Favorite
* Description: This is the plugin created as test homework for Crowd Favorite Company.
* Version: 1.0
* Author: Albulescu Victor-Alexandru
**/

/** Declare plugin directory constant */
define( 'CFAV_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( CFAV_PLUGIN_DIR . 'class.cfav-menu-walker.php' );

// example of an action
function cfav_action_example() { 
    echo '<div style="background: #0073aa; color: white; text-align: center;">Example of action.</div>'; 
}

add_action('wp_footer', 'cfav_action_example'); 

// example of a filter
function cfav_css_body_class( $classes ) {
    if ( ! is_admin() ) {
        $classes[] = 'cfav-test-class';
    }
    return $classes;
}
add_filter( 'body_class', 'cfav_css_body_class' );