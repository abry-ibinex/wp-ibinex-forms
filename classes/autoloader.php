<?php

class Ibinex_Forms_Autoloader {

	/**
	 * Prefixes for our psuedo-namespaces
	 *
	 * 'prefix' => 'path'
	 *
	 * @var array
	 */
	protected static $roots = array();

	/**
	 * Add a route path and prefix
	 *
	 * @param string $dir Full path to directory
	 */
	public static function add_root( $prefix, $dir ){
		self::$roots[ $prefix ] = $dir;
	}
    
    /**
	 * Handles autoloading of Ibinex Forms and iBinex Forms add-on classes.
	 *
	 * @param string $class
	 */
	public static function autoload( $class) {
        $class = "Ibinex_Forms_Admin";
		if ( 0 === strpos( $class, 'Ibinex_Forms' ) || 0 === strpos( $class, 'IF_' )  ) {
            

			if( 'Ibinex_Forms_Admin' === $class ){
				$file = IFCORE_PATH . 'classes/admin.php';
			}

			if ( is_file( $file ) ) {
				require_once $file;
			}
		}

	}
    
    /**
	 * Get the root prefix for a class
	 *
	 * @param string $class Class name
	 *
	 * @return string|void
	 */
	protected static function find_root( $class ){
		foreach( self::$roots as $root => $dir ){
			if( 0 === strpos( $class, $root ) ){
				return $root;
			}
		}
	}

	/**
	 * Get the directory for a prefix
	 *
	 * @param string $root Prefix root
	 *
	 * @return string|void
	 */
	protected static function get_dir( $root ){
		if( 'Ibinex_Forms_Fields')
		if( array_key_exists( $root, self::$roots ) ){
			return trailingslashit( self::$roots[ $root ] );
		}
	}
    
    /**
	 * Registers Ibinex_Forms_Autoloader as an SPL autoloader.

	 */
	public static function register( ) {
		if ( version_compare( phpversion(), '5.3.0', '>=' ) ) {
			spl_autoload_register( array( new self(), 'autoload' ), true, false );
		} else {
			spl_autoload_register( array( new self(), 'autoload' ) );
		}

	}
}