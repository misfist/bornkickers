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
 add_image_size( 'top-image', 1440, 760, true );

/**
 * Register Nav Menus
 * 
 * @see https://developer.wordpress.org/reference/functions/register_nav_menus/
 *
 * @return void
 */
function bornkickers_menus() {

	register_nav_menus( array(
		'main-menu' 		=> __( 'Main Menu', 'bornkickers' ),
		'top-menu' 			=> __( 'Top Menu', 'bornkickers' ),
		'footer-menu' 		=> __( 'Footer Menu', 'bornkickers' ),
		'social-menu' 		=> __( 'Social Menu', 'bornkickers' ),
		'terms-menu' 		=> __( 'Terms of Use Menu', 'bornkickers' ),
	) );

}
add_action( 'init', 'bornkickers_menus' );

/**
 * Add Basic Theme Support
 * 
 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
 *
 * @return void
 */
function bornkickers_add_theme_support() {
	add_theme_support( 'custom-logo', array(
		'default-image'      => trailingslashit( get_template_directory_uri() ) . 'assets/img/logo.svg',
		'height'      => 90,
		'width'       => 100,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	add_theme_support( 'custom-header', array(
        'default-image'      => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-default.jpg',
        'default-text-color' => '000',
        'width'              => 1400,
        'height'             => 760,
        'flex-width'         => true,
        'flex-height'        => true,
	) );
	
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'title-tag' );

	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'bornkickers_add_theme_support' );

/**
 * Modify Archive Title
 * 
 * @see https://developer.wordpress.org/reference/functions/get_the_archive_title/
 *
 * @param string $title
 * @return string $title
 */
function bornkickers_get_the_archive_title( $title ) {
	if( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'bornkickers_get_the_archive_title' );

/**
 * Templates to Disable
 * 
 * @param int $id
 * @return boolean
 */
function bornkickers_disable_editor( $id = false ) {

	$excluded_templates = array(
		'front-page.php'
	);

	$excluded_ids = array(
		get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg for Templates
 *
 * @param boolean $can_edit
 * @param string $post_type
 * @return boolean $can_edit
 */
function bornkickers_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) ) {
		return $can_edit;
	}
		
	if( bornkickers_disable_editor( $_GET['post'] ) ) {
		$can_edit = false;
	}
	
	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'bornkickers_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'bornkickers_disable_gutenberg', 10, 2 );

/**
 * Remove Editor from Home Page
 */
function bornkickers_remove_content_editor() {
    if( (int) get_option( 'page_on_front' ) == get_the_ID() ) {
        remove_post_type_support( 'page', 'editor' );
    }
}
add_action( 'admin_head', 'bornkickers_remove_content_editor' );

/**
 * Filter archive page display
 *
 * @param obj $query
 * @return void
 */
function bornkickers_pre_get_posts( $query ) {
	if ( is_admin() || !$query->is_main_query() ) {
		return;
	}

	if ( $query->is_search ) {
		$query->set( 'post__not_in', array( get_option( 'page_on_front' ) ) );
	}

	if ( is_post_type_archive( array( 'location' ) ) ) {
		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'title' );
	}
}
add_action( 'pre_get_posts', 'bornkickers_pre_get_posts' ); 