<?php
/**
 * Enqueue functions for this theme
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

 if ( ! function_exists( 'bk_styles_scripts' ) ) {
	function bk_styles_scripts() {
		wp_enqueue_style( 'bornkickers', get_template_directory_uri(). '/assets/css/bornkickers.css' );
		wp_enqueue_script( 'bornkickers', get_template_directory_uri() . '/assets/js/bornkickers.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'simplebar', esc_url( 'https://unpkg.com/simplebar@latest/dist/simplebar.js' ), null, false, true );
	}

	add_action( 'wp_enqueue_scripts', 'bk_styles_scripts' );
}