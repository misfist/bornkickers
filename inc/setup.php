<?php
/**
 * Setup functions for this theme
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

 @ini_set( 'upload_max_size', '64M' );
 @ini_set( 'post_max_size', '64M' );
 @ini_set( 'max_execution_time', '300' );
 
 define( "TEMPLATE_DIR", get_template_directory_uri() );
 
 add_image_size( 'trainer', 400, 400 );

 if ( ! function_exists( 'bornkickers_menus' ) ) {

	// Register Navigation Menus
	function bornkickers_menus() {
	
		$locations = array(
			'main-menu' => __( 'Main Menu', 'bornkickers' ),
			'top-menu' => __( 'Top Menu', 'bornkickers' ),
			'footer-menu' => __( 'Footer Menu', 'bornkickers' ),
			'social-menu' => __( 'Social Menu', 'bornkickers' ),
			'terms-menu' => __( 'Terms of Use Menu', 'bornkickers' ),
		);
		register_nav_menus( $locations );
	
	}
	add_action( 'init', 'bornkickers_menus' );
	
	}
 
 
 add_action( 'init', 'init_remove_support', 100 );
 function init_remove_support() {
	 $post_id   = isset( $_GET['post'] ) ? $_GET['post'] : null;
	 if ($post_id && is_admin() && $post_id == get_option( 'page_on_front' )){
		 $post_type = 'page';
		 remove_post_type_support( $post_type, 'editor' );
	 }
 
 }
 
 $carbon_location = get_stylesheet_directory() . '/inc/carbon/carbon.php';
 
 if( file_exists( $carbon_location ) ) {
	 include_once $carbon_location;
 }
 
 