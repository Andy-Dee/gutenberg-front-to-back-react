<?php
/**
 * Plugin Name: ImmoCalc
 * Plugin URI: #
 * Description: ImmoCalc Gutenberg Block.
 * Version: 1.0.0
 * Author: Ivan Jeremic
 *
 * @package gutenberg-user-card
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.
*/
add_action( 'init', 'immocalc_load_texdomain' );
function immocalc_load_texdomain() {
	load_plugin_textdomain( 'gutenberg-user-card', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function immocalc_register_block() {
	// automatically load dependencies and version
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	wp_register_script(
		'gutenberg-user-card-scripts',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	wp_register_style(
		'gutenberg-user-card-styles',
		plugins_url( 'build/style.css', __FILE__ )
	);

	register_block_type( 'mt/gutenberg-user-card', array(
		'editor_script' => 'gutenberg-user-card-scripts',
		'style' => 'gutenberg-user-card-styles'
	) );

	/**
	 * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
	 * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
	 * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
	 */
	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'gutenberg-user-card', 'mt' );
	}

}
add_action( 'init', 'immocalc_register_block' );

/**
 * Registers front-end hydration scripts for block
 */
function immocalc_register_front() {

	$asset_file_front = include( plugin_dir_path( __FILE__ ) . 'build/front.asset.php');
	wp_enqueue_script(
		'gutenberg-user-card-scripts-front',
		plugins_url( 'build/front.js', __FILE__ ),
		$asset_file_front['dependencies'],
		$asset_file_front['version']
	);

}
add_action( 'wp_enqueue_scripts', 'immocalc_register_front' );
