<?php 
/**
 * This file contains the function which hooks to a brick's content output
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
 * This function hooks to the brick output. If it is supposed to be a 'iframe', then it will output the iframe
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
function mp_stacks_brick_content_output_iframe($default_content_output, $mp_stacks_content_type, $post_id){
	
	//If this stack content type is set to be an image	
	if ($mp_stacks_content_type != 'iframe'){
		
		//Return Default
		return $default_content_output;
	}
	
	$iframe_output = NULL;
		
	//Get the URL to display in the iFrame
	$iframe_src_url = mp_core_get_post_meta( $post_id, 'iframe_src_url' );
	
	//Get the height of the iFrame
	$iframe_height = mp_core_get_post_meta( $post_id, 'iframe_height', 500 );
	
	//Get whether to display scroll bars
	$iframe_display_scroll_bars = mp_core_get_post_meta_checkbox( $post_id, 'iframe_allow_scrollbar', false );
	
	if ( !empty( $iframe_src_url ) ){
		
		$iframe_output = '
		<iframe id="mp-stacks-iframe-' . $post_id . '" class="mp-stacks-iframe" src="' . $iframe_src_url . '" width="100%" height="' . $iframe_height . 'px" ' . 'scrolling="' . ( $iframe_display_scroll_bars ? 'yes' : 'no' ) . '"></iframe>'	;
	}
	
	//Return
	return $iframe_output;
	
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_iframe', 10, 3);