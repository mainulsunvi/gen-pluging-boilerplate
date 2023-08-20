<?php

/**
 *
 * @link              https://https://profiles.wordpress.org/mainulsunvi/
 * @since             1.0.0
 * @package           Gen_Plug
 *
 * @wordpress-plugin
 * Plugin Name:       Gen Plugger
 * Plugin URI:        https://msunvi.com
 * Description:       Test Plugin Generator Tools
 * Version:           1.0.0
 * Author:            Mainul Sunvi
 * Author URI:        https://profiles.wordpress.org/mainulsunvi/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gen-plug
 * Domain Path:       /languages
 */

if ( !defined( 'WPINC' ) ) {
    die;
}

require plugin_dir_path( __FILE__ ) . 'loader/autoload.php';

use Inc\Gen_Plug;
use Inc\Gen_Plug_Activator;
use Inc\Gen_Plug_Deactivator;

define( 'GEN_PLUG_VERSION', '1.0.0' );

define( "GEN_PLUG_ROOT", plugin_dir_path( __FILE__ ) );
define( "GEN_PLUG_ROOT_URL", plugin_dir_url( __FILE__ ) );

function activate_gen_plug() {
    ( new Gen_Plug_Activator() )->activate();
}

function deactivate_gen_plug() {
    Gen_Plug_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gen_plug' );
register_deactivation_hook( __FILE__, 'deactivate_gen_plug' );

( function () {

    $plugin = new Gen_Plug();
    $plugin->run();

} )();
