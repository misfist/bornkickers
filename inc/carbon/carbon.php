<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'born_carbon_fields' );

function born_carbon_fields() {

	Container::make( 'post_meta', __( 'Top Image' ) )
			 ->where( 'post_id', '!=', get_option( 'page_on_front' ) )
	         ->set_context( 'normal' )
	         ->set_priority( 'low' )
	         ->add_fields(
		         array(
			         Field::make( 'image', 'crb_basic_top_image', 'Photo' )
			              ->set_value_type( 'url' ),
		         )
	         );

	Container::make( 'post_meta', __( 'Top Slider' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields(
		         array(
			         Field::make( 'complex', 'born_top_slider', __( 'Top Slider' ) )
			              ->set_layout( 'tabbed-vertical' )
			              ->add_fields( array(
					              Field::make( 'text', 'text1', __( 'Text 1' ) ),
					              Field::make( 'text', 'text2', __( 'Text 2' ) ),
					              Field::make( 'image', 'image', __( 'Image' ) ),
					              Field::make( 'text', 'link', __( 'Link' ) )
				              )
			              ),
		         )
	         );

	Container::make( 'post_meta', __( 'Map' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields(
		         array(
			         Field::make( 'text', 'born_map_url', __( 'Map URL' ) ),
			         Field::make( 'image', 'born_map_image', __( 'Map Image' ) )
		         )
	         );

	Container::make( 'post_meta', __( 'Coaches' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields(
		         array(
			         Field::make( 'complex', 'born_coaches', __( 'Coaches' ) )
			              ->set_layout( 'tabbed-vertical' )
			              ->add_fields( array(
					              Field::make( 'text', 'text', __( 'Name' ) ),
					              Field::make( 'image', 'image', __( 'Image' ) ),
					              Field::make( 'text', 'link', __( 'Link' ) )
				              )
			              )
		         )
	         );

	Container::make( 'post_meta', __( 'Logos' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields( array(
		         Field::make( 'complex', 'born_logos', __( 'Logos' ) )
		              ->set_layout( 'tabbed-vertical' )
		              ->add_fields( array(
				              Field::make( 'image', 'image', __( 'Image' ) ),
				              Field::make( 'text', 'text', __( 'Text' ) ),
			              )
		              )
	         ) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( get_template_directory() . '/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}