<?php
/**
 * Plugin Name: WP Create Multiple Posts & Pages
 * Plugin URI:  https://github.com/Sajjad-Hossain-Sagor/WP-Create-Multiple-Posts-Pages
 * Description: Create Multiple Wordpress Posts & Pages At Once With a Single Click.
 * Author:      Sajjadur Rahman Sagor
 * Author URI:  http://profiles.wordpress.org/sajjad67
 * Version:     1.0.0
 * License:     GPL
 * Text Domain: wpcmp
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

// ---------------------------------------------------------
// Define Plugin Folders Path
// ---------------------------------------------------------
define("WPCMP_PLUGIN_PATH", plugin_dir_path( __FILE__ ));
define("WPCMP_PLUGIN_URL", plugin_dir_url( __FILE__ ));

add_action( "init", "wpcmp_add_plugin_core_file" );

function wpcmp_add_plugin_core_file(){

	require_once WPCMP_PLUGIN_PATH . 'includes/inc.php';

}

?>