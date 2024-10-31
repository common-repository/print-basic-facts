<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/paranoia1906/
 * @since      1.0.0
 *
 * @package    Wp_Pbf
 * @subpackage Wp_Pbf/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, hooks to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Pbf
 * @subpackage Wp_Pbf/admin
 * @author     Anthony Ledesma
 */
class Wp_Pbf_Admin {

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
	public function enqueue_styles($hook) {
	
		if($hook != 'tools_page_wp-pbf') {
			return;
		}
		wp_enqueue_style( 'pbf_fawesome_stylesheet', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'pbf_materialize_stylesheet', plugin_dir_url( __FILE__ ) . 'css/materialize.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-pbf-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {
		if($hook != 'tools_page_wp-pbf') {
			return;
		}
		wp_enqueue_script( 'pbf_materialize_script_file', plugin_dir_url( __FILE__ ) . 'js/materialize.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'pbf_clipboard_script_file', plugin_dir_url( __FILE__ ) . 'js/clipboard.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-pbf-admin.js', array( 'jquery' ), $this->version, false );
		wp_add_inline_script( 'pbf_clipboard_script_file' , "var clipboard = new Clipboard('.cpy-button');
    clipboard.on('success', function(e) {
        Materialize.toast('Copied!', 4000);
    });
    clipboard.on('error', function(e) {
        Materialize.toast('Press Ctrl + C to Copy!', 4500);
    });" );
	}


public function add_plugin_admin_menu() {

    /*
     * Add a settings page for this plugin to the primary WP menu
     */
    add_submenu_page( 'tools.php', 'Print Basic Facts', 'Print Basic Facts', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
}

 /**
 * Add settings action link to the plugins page.
 *
 * @since    1.0.0
 */

public function add_action_links( $links ) {
    /*
    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
    */
   $settings_link = array(
    '<a href="' . admin_url( 'tools.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
   );
   return array_merge(  $settings_link, $links );

}

/**
 * Render the settings page for this plugin.
 *
 * @since    1.0.0
 */

public function display_plugin_setup_page() {
    include_once( 'partials/wp-pbf-admin-display.php' );
}
}
