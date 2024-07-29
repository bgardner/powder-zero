<?php
/**
 * Functions for the Powder Zero WordPress theme.
 *
 * @package	Powder Zero
 * @author	Brian Gardner
 * @license	GNU General Public License v3
 * @link	https://powderwp.com/
 */

if ( ! function_exists( 'powder_zero_setup' ) ) {

	/**
	 * Initialize theme defaults and add support for WordPress features.
	 */
	function powder_zero_setup() {

		// Enqueue editor stylesheet.
		add_editor_style( get_template_directory_uri() . '/style.css' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

	}
}
add_action( 'after_setup_theme', 'powder_zero_setup' );

/**
 * Enqueue theme stylesheet and script.
 */
function powder_zero_enqueue_stylesheet_script() {

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'powder-zero', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );


}
add_action( 'wp_enqueue_scripts', 'powder_zero_enqueue_stylesheet_script' );

/**
 * Register block styles.
 */
function powder_zero_block_styles() {

	$block_styles = array(
		'core/social-links' => array(
			'outline' => __( 'Outline', 'powder-zero' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}

}
add_action( 'init', 'powder_zero_block_styles' );
