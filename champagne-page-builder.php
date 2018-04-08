<?php
/**
 * Plugin Name: Champagne Page Builder 
 * Plugin URI: http://virtuentmedia.com/
 * Description: Simple Wordpress Page Builder.
 * Version: 1.0.0
 * Author: Adam Champagne
 * Author URI: http://adamchampagne.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @author Adam Champagne <adam@virtuentmedia.com>
 * @copyright Copyright (c) 2018, Virtuent Media
**/


/* Do not access this file directly */
if ( ! defined( 'WPINC' ) ) { die; }

/* Constants
------------------------------------------ */

/* Set plugin version constant. */
define( 'ACPB_VERSION', '1.0.0' );

/* Set constant path to the plugin directory. */
define( 'ACPB_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );

/* Set the constant path to the plugin directory URI. */
define( 'ACPB_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );


/* Includes
------------------------------------------ */

/* Page Builder */
if( is_admin() ){
	require_once( ACPB_PATH . 'includes/page-builder.php' );
}
