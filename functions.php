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
  * Enqueue scripts and styles
  */
 include_once trailingslashit( get_stylesheet_directory() ) . 'inc/enqueue.php';

  /**
  * Enqueue template tag functions
  */
  include_once trailingslashit( get_stylesheet_directory() ) . 'inc/template-tags.php';