<?php
/*
Plugin Name: Booster Plus for WooCommerce
Plugin URI: http://boostwoo.com/plus/
Description: Unlock all Booster for WooCommerce features and supercharge your WooCommerce site even more.
Version: 1.0.5
Author: Algoritmika Ltd
Author URI: http://boostwoo.com
Copyright: © 2015 Algoritmika Ltd.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Check if WooCommerce is active
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return;

if ( ! class_exists( 'WC_Jetpack_Plus' ) ) :

/**
 * Main WC_Jetpack_Plus Class
 *
 * @class WC_Jetpack_Plus
 */
final class WC_Jetpack_Plus {

	/**
	 * @var WC_Jetpack_Plus The single instance of the class
	 */
	protected static $_instance = null;

	/**
	 * Main WC_Jetpack_Plus Instance
	 *
	 * Ensures only one instance of WC_Jetpack_Plus is loaded or can be loaded.
	 *
	 * @static
	 * @see WCJP()
	 * @return WC_Jetpack_Plus - Main instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * WC_Jetpack_Plus Constructor.
	 * @access public
	 */
	public function __construct() {
		add_filter( 'get_wc_jetpack_plus_message', array( $this, 'remove_plus_message' ), 101 );
		add_filter( 'wcj_get_option_filter',       array( $this, 'wcj_get_option' ),      101, 2 );
	}

	/**
	 * wcj_get_option.
	 */
	public function wcj_get_option( $value1, $value2 ) {
		return $value2;
	}

	/**
	 * remove_plus_message.
	 */
	public function remove_plus_message() {
		return '';
	}
}

endif;

/**
 * Returns the main instance of WCJP to prevent the need to use globals.
 *
 * @return WC_Jetpack_Plus
 */
function WCJP() {
	return WC_Jetpack_Plus::instance();
}

WCJP();
