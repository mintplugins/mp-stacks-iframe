<?php
/**
 * This file contains the function keeps the MP Stacks iFrame plugin up to date.
 *
 * @since 1.0.0
 *
 * @package    MP Stacks iFrame
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Check for updates for the MP Stacks iFrame Plugin by creating a new instance of the MP_CORE_Plugin_Updater class.
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
 if (!function_exists('mp_stacks_iframe_update')){
	function mp_stacks_iframe_update() {
		$args = array(
			'software_name' => 'MP Stacks + iFrame', //<- The exact name of this Plugin.
			'software_api_url' => 'http://mintplugins.com',//The URL where PostGrid and mp_repo are installed and checked
			'software_filename' => 'mp-stacks-iframe.php',
			'software_licensed' => false, //<-Boolean
		);
		
		//Since this is a plugin, call the Plugin Updater class
		$mp_stacks_features_plugin_updater = new MP_CORE_Plugin_Updater($args);
	}
 }
add_action( 'init', 'mp_stacks_iframe_update' );
