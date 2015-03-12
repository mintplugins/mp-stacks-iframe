<?php
/**
 * This page contains functions for modifying the metabox for iframe as a media type
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    MP Stacks iFrame
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Add PostGrid as a Media Type to the dropdown
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @param    array $args See link for description.
 * @return   void
 */
function mp_stacks_iframe_create_meta_box(){	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_stacks_iframe_add_meta_box = array(
		'metabox_id' => 'mp_stacks_iframe_metabox', 
		'metabox_title' => __( '"iFrame" Content-Type', 'mp_stacks_iframe'), 
		'metabox_posttype' => 'mp_brick', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low' 
	);
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_stacks_iframe_items_array = array(
		
			array(
					'field_id'			=> 'iframe_notice',
					'field_title' 	=> __( 'Please Note:', 'mp_stacks_iframe'),
					'field_description' 	=> __( 'Some websites (like Facebook, YouTube, and Google don\'t allow their pages to be loaded in iFrames and won\t work here.', 'mp_stacks_iframe' ) ,
					'field_type' 	=> 'basictext',
					'field_value' 	=> '0',
			),
			array(
					'field_id'			=> 'iframe_src_url',
					'field_title' 	=> __( 'URL', 'mp_stacks_iframe'),
					'field_description' 	=> __( 'What URL should be displayed in the iFrame?', 'mp_stacks_iframe' ) ,
					'field_type' 	=> 'url',
					'field_value' 	=> '',
			),
			array(
					'field_id'			=> 'iframe_height',
					'field_title' 	=> __( 'iFrame Height', 'mp_stacks_iframe'),
					'field_description' 	=> __( 'How many pixels high should the iFrame be? Default: 500. Note: The Width is always controlled under "Brick Size Settings"', 'mp_stacks_iframe' ) ,
					'field_type' 	=> 'number',
					'field_value' 	=> '500',
			),
			array(
					'field_id'			=> 'iframe_allow_scrollbar',
					'field_title' 	=> __( 'Allow Scroll Bar?', 'mp_stacks_iframe'),
					'field_description' 	=> __( 'If the URL loaded is higher than your iFrame Height, so you want a scroll bar to appear? ', 'mp_stacks_iframe' ) ,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
			),
			array(
					'field_id'			=> 'iframe_full_brick_tip',
					'field_title' 	=> __( 'Full-Brick Tip:', 'mp_stacks_iframe'),
					'field_description' 	=> __( 'If you want this iFrame to fill up the ENTIRE brick, make sure the Brick Alignment is set to "Centered". Then, on the right side under "Brick Size Settings" > "Maximum Content Width", set it to be "999999999999". Then check the option listed under "Content-Type Margins" > "Full Width Content-Types".', 'mp_stacks_iframe' ) ,
					'field_type' 	=> 'basictext',
					'field_value' 	=> '0',
			),
		
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_stacks_iframe_add_meta_box = has_filter('mp_stacks_iframe_meta_box_array') ? apply_filters( 'mp_stacks_iframe_meta_box_array', $mp_stacks_iframe_add_meta_box) : $mp_stacks_iframe_add_meta_box;
	
	//Globalize the and populate mp_stacks_features_items_array (do this before filter hooks are run)
	global $global_mp_stacks_iframe_items_array;
	$global_mp_stacks_iframe_items_array = $mp_stacks_iframe_items_array;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_stacks_iframe_items_array = has_filter('mp_stacks_iframe_items_array') ? apply_filters( 'mp_stacks_iframe_items_array', $mp_stacks_iframe_items_array) : $mp_stacks_iframe_items_array;
	
	/**
	 * Create Metabox class
	 */
	global $mp_stacks_iframe_meta_box;
	$mp_stacks_iframe_meta_box = new MP_CORE_Metabox($mp_stacks_iframe_add_meta_box, $mp_stacks_iframe_items_array);
}
add_action('mp_brick_metabox', 'mp_stacks_iframe_create_meta_box');