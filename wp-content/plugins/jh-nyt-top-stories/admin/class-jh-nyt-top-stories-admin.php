<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.janushenderson.com/
 * @since      1.0.0
 *
 * @package    Jh_Nyt_Top_Stories
 * @subpackage Jh_Nyt_Top_Stories/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jh_Nyt_Top_Stories
 * @subpackage Jh_Nyt_Top_Stories/admin
 * @author     Janus Henderson <webtechteam@janushenderson.com>
 */
class Jh_Nyt_Top_Stories_Admin {

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
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jh_Nyt_Top_Stories_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jh_Nyt_Top_Stories_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jh-nyt-top-stories-admin.css', [], $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jh_Nyt_Top_Stories_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jh_Nyt_Top_Stories_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jh-nyt-top-stories-admin.js', [ 'jquery' ], $this->version, false );

	}

	/**
	 * Add an options page under settings submenu
	 * @since 1.0.0
	 */

	public function add_options_page() {
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'NYT Top Stories Settings', 'jh-nyt-top-stories' ),
			__( 'NYT Top Stories', 'jh-nyt-top-stories' ),
			'manage_options',
			$this->plugin_name,
			[ $this, 'display_options_page' ]
		);
	}

	/**Render the options page
	 * @since 1.0.0
	 */

	public function display_options_page() {
		include_once 'partials/jh-nyt-top-stories-admin-display.php';
	}

}
