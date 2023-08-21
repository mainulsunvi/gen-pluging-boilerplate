<?php

/**
 *
 * @link              https://https://profiles.wordpress.org/mainulsunvi/
 * @since             1.0.0
 * @package           Gen_Plug
 *
 * @wordpress-plugin
 * Plugin Name:       Gen Plug
 * Plugin URI:        https://msunvi.com
 * Description:       Test Plugin Generator Tools
 * Version:           1.0.0
 * Author:            Mainul Sunvi
 * Author URI:        https://profiles.wordpress.org/mainulsunvi/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gen_plug
 * Domain Path:       /languages
 */

use Inc\Gen_Plug;
use Inc\Gen_Plug_Loader;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

require plugin_dir_path( __FILE__ ) . 'loader/autoload.php';

define( 'GEN_PLUG_DATA', get_plugin_data( __FILE__ ) );
define( "GEN_PLUG_ROOT", plugin_dir_path( __FILE__ ) );
define( "GEN_PLUG_ROOT_URL", plugin_dir_url( __FILE__ ) );

( function () {
	$loader = new Gen_Plug_Loader();
	$plugin = new Gen_Plug( $loader );
	$plugin -> run();
} )();
