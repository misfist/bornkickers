<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */


/**
 * Filter `the_custom_logo`
 * @see https://developer.wordpress.org/reference/hooks/get_custom_logo/
 */
function bornkicker_sget_custom_logo() {
	 $custom_logo_id = get_theme_mod( 'custom_logo' );
	 $html = sprintf( '<a href="%1$s" class="custom-logo-link logo" rel="home" itemprop="url">%2$s</a>',
			 esc_url( home_url( '/' ) ),
			 wp_get_attachment_image( $custom_logo_id, 'full', false, array(
				 'class'    => 'custom-logo',
			 ) )
		 );
	 return $html;   
 }
 add_filter( 'get_custom_logo', 'bornkicker_sget_custom_logo' );