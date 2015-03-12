<?php
/**
 * Installaion hooks for MP Stacks + iFrame
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package     MP Stacks + iFrame
 * @subpackage  Functions
 *
 * @copyright   Copyright (c) 2015, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Install
 *
 * Runs on plugin install by setting up the sample stack page,
 * flushing rewrite rules to initiate the new 'stacks' slug.<br />
 * After successful install, the user is redirected to the MP Stacks Welcome
 * screen.
 *
 * @since 1.0
 * @global $wpdb
 * @global $mp_stacks_iframe_options
 * @global $wp_version
 * @return void
 */
function mp_stacks_iframe_install() {
	global $wp_version, $mp_stacks_iframe_activation;
	
	$active_theme = wp_get_theme();
	
	//Notify
	wp_remote_post( 'http://tracking.mintplugins.com', array(
		'method' => 'POST',
		'timeout' => 1,
		'redirection' => 5,
		'httpversion' => '1.0',
		'blocking' => true,
		'headers' => array(),
		'body' => array( 
			'mp_track_event' => true, 
			'event_product_title' => 'MP Stacks + iFrame', 
			'event_action' => 'activation', 
			'event_url' => get_bloginfo( 'wpurl'),
			'wp_version' => $wp_version,
			'active_plugins' => json_encode( get_option('active_plugins') ),
			'active_theme' => $active_theme->get( 'Name' ),
		),
		'cookies' => array()
		)
	);
	
	$mp_stacks_iframe_activation = true;

}
register_activation_hook( MP_STACKS_IFRAME_PLUGIN_FILE, 'mp_stacks_iframe_install' );

/**
 * Runs in the shutdown function upon activation so we can flush the rewrite rules after the new ones have been added.
 *
 * @since 1.0
 * @global $wpdb
 * @global $mp_stacks_iframe_activation
 * @return void
 */
function mp_stacks_iframe_activation_shutdown(){
	
	global $mp_stacks_iframe_activation;
	
	if ( $mp_stacks_iframe_activation ){
		//Flush the rewrite rules
		flush_rewrite_rules();
	}
	
}
add_action( 'shutdown', 'mp_stacks_iframe_activation_shutdown' );