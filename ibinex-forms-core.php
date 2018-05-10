<?php
/**
 * Plugin Name
 *
 * @package     PluginPackage
 * @author      Your Name
 * @copyright   2016 Your Name or Company Name
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: iBinex Forms
 * Plugin URI:  https://example.com/plugin-name
 * Description: Description of the plugin.
 * Version:     0.0.0
 * Author:      Abry Sean Joel
 * Author URI:  https://example.com
 * Text Domain: plugin-name
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('IFCORE_PATH', plugin_dir_path(__FILE__));
define('IFCORE_URL', plugin_dir_url(__FILE__));
define( 'IFCORE_VER', '0.0.0.0' );
define('IFCORE_BASENAME', plugin_basename( __FILE__ ));

// load system
add_action( 'plugins_loaded', 'ibinex_forms_load', 0 );
function ibinex_forms_load(){
    include_once IFCORE_PATH . 'classes/autoloader.php';
	Ibinex_Forms_Autoloader::add_root( 'Ibinex_Forms_Admin', IFCORE_PATH . 'classes/admin' );
    Ibinex_Forms_Autoloader::add_root( 'Ibinex_Forms', IFCORE_PATH . 'classes' );
    
    Ibinex_Forms_Autoloader::register();
    
    
}

add_action( 'plugins_loaded', array( 'Ibinex_Forms_Admin', 'get_instance' ) );