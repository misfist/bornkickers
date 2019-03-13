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
		wp_enqueue_style( 'google-fonts', esc_url( 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' ) );
		wp_enqueue_style( 'simplebar-style', esc_url( 'https://unpkg.com/simplebar@latest/dist/simplebar.css' ) );
		wp_enqueue_script( 'simplebar-script', esc_url( 'https://unpkg.com/simplebar@latest/dist/simplebar.js' ), null, false, true );
		// wp_enqueue_style( 'bornkickers', get_template_directory_uri(). '/assets/css/bornkickers.css' );
		wp_enqueue_style( 'bornkickers', get_template_directory_uri(). '/assets/css/style.min.css', array( 'google-fonts' ) );
		wp_enqueue_script( 'bornkickers', get_template_directory_uri() . '/assets/js/bornkickers.js', array( 'jquery' ), false, true );
	}

	add_action( 'wp_enqueue_scripts', 'bk_styles_scripts' );
}