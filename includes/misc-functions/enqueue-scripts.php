<?php
/**
 * This file contains the enqueue scripts function for the iframe plugin
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
 * Enqueue JS and CSS for iframe 
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_iframe_css_location
 */
function mp_stacks_iframe_enqueue_scripts(){
			
	//Enqueue iframe CSS
	wp_enqueue_style( 'mp_stacks_iframe_css', plugins_url( 'css/iframe.css', dirname( __FILE__ ) ) );
	
	//Enqueue iframe ajax js
	wp_enqueue_script( 'mp_stacks_iframe_js', plugins_url( 'js/iframe.js', dirname( __FILE__ ) ), array( 'jquery', 'mp_stacks_front_end_js' ) );

}
 
/**
 * Enqueue css face for iframe
 */
add_action( 'wp_enqueue_scripts', 'mp_stacks_iframe_enqueue_scripts' );