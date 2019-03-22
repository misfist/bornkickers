<?php
/**
 * Load functions for this theme
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

/**
 * Load setup functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'inc/setup.php';

/**
 * Load carbon fields functions
 */
$carbon_location = trailingslashit( get_stylesheet_directory() ). 'inc/carbon/carbon.php';
 
if( file_exists( $carbon_location ) ) {
	include_once $carbon_location;
}

/**
 * Enqueue scripts and styles
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'inc/enqueue.php';

/**
 * Customizer
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'inc/customizer.php';

/**
 * Enqueue template tag functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'inc/template-tags.php';

/**
 * Enqueue template tag functions
 */
 include_once trailingslashit( get_stylesheet_directory() ) . 'inc/location-filters.php';

/**
 * Custom Nav Walker Class
 */
 include_once trailingslashit( get_stylesheet_directory() ) . 'inc/class-nav-walker.php';
  