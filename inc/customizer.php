<?php
/**
 * Theme Customizer
 *
 * @package bornkickers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function bornkickers_customize_register( $wp_customize ) {

    /* Location Header */
    $wp_customize->add_setting( 'location_archive_header_image' , array(
        'default'       => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-locations.jpg',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'location_archive_header_image',
            array(
                'label'      => __( 'Locations Header Image', 'bornkickers' ),
                'section'    => 'header_image',
                'settings'   => 'location_archive_header_image',
            )
        )
    );

    /* Default Coach Image - Displays when no coach image has been attached */
    $wp_customize->add_setting( 'default_coach_image' , array(
        'default'       => trailingslashit( get_template_directory_uri() ) . 'assets/img/coach-default.jpg',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'default_coach_image',
            array(
                'label'      => __( 'Coach Default Image', 'bornkickers' ),
                'section'    => 'header_image',
                'settings'   => 'default_coach_image',
            )
        )
    );
    
            
}
add_action( 'customize_register', 'bornkickers_customize_register' );