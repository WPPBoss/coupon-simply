<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/WPPBoss
 * @since      1.0.0
 *
 * @package    Coupon_Simply
 * @subpackage Coupon_Simply/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Coupon_Simply
 * @subpackage Coupon_Simply/includes
 * @author     WP Plugin Boss <dev.bcdestiller@gmail.com>
 */
class Coupon_Simply_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'coupon-simply',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
