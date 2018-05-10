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

/**
 * iBinex Plugin class.
 * @package 
 * @author 
 */
     
class Ibinex_Forms_Admin {
    
    protected static $instance = null;
    
    public function register_admin_page(){
        // Add an item to the menu.
        add_menu_page(
            __( "iBinex Forms", "textdomain" ),
            __( "iBinex Forms", "textdomain" ),
            "manage_options",
            "my-page",
            "",
            "dashicons-smiley"
        );
    }
    
    private function __construct() {
        
        // Add Admin menu page
		add_action( 'admin_menu', array( $this, 'register_admin_page' ), 9 );
        add_action( 'admin_menu', 'register_admin_page' , 9 );
    }
    
    public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}