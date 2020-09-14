<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/WPPBoss
 * @since      1.0.0
 *
 * @package    Coupon_Simply
 * @subpackage Coupon_Simply/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Coupon_Simply
 * @subpackage Coupon_Simply/admin
 * @author     WP Plugin Boss <dev.bcdestiller@gmail.com>
 */
class Coupon_Simply_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/coupon-simply-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/coupon-simply-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function csimply_menu() {

		//Add main page
		add_menu_page( 'Coupon Simply', 'Coupon Simply', 'manage_options', 'coupon-simply', array( $this, 'csimply_dashboard' ), 'dashicons-tickets-alt', 21 );
		
		//Add dashboard submenu
		add_submenu_page( 'coupon-simply', 'Coupon Simply', 'Dashboard', 'manage_options', 'coupon-simply', array($this, 'csimply_dashboard' ) );
		
		//Add new coupon submenu
		add_submenu_page( 'coupon-simply', 'Coupon Simply', 'Add Coupon', 'manage_options', 'cs-add-new', array($this, 'csimply_new_coupon' ) );
		
		//Add plugin options submenu
		add_submenu_page( 'coupon-simply', 'Coupon Simply', 'Options', 'manage_options', 'cs-options', array($this, 'csimply_options' ) );
	}

	//Function to display dashboard menu
	public function csimply_dashboard() {
		
		ob_start();
		include_once( 'partials/cs-admin-dashboard.php' );
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;

	}

	//Function to display new coupon menu
	public function csimply_new_coupon() {

		ob_start();
		include_once( 'partials/cs-admin-add.php' );
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;

	}

	//Function to display options menu
	public function csimply_options() {

	}

}
