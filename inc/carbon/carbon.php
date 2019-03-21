<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Register Carbon Fields
 */
function born_carbon_fields() {

	// Container::make( 'post_meta', __( 'Top Image', 'bornkickers' ) )
	// 		 ->where( 'post_id', '!=', get_option( 'page_on_front' ) )
	//          ->set_context( 'normal' )
	//          ->set_priority( 'low' )
	//          ->add_fields(
	// 	         array(
	// 		         Field::make( 'image', 'crb_basic_top_image', 'Photo' )
	// 		              ->set_value_type( 'url' ),
	// 	         )
	//          );

	Container::make( 'post_meta', __( 'Top Slider' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields(
		         array(
			         Field::make( 'complex', 'born_top_slider', __( 'Top Slider' ) )
			              ->set_layout( 'tabbed-vertical' )
			              ->add_fields( array(
					              Field::make( 'text', 'text1', __( 'Heading', 'bornkickers' ) ),
					              Field::make( 'text', 'text2', __( 'Text', 'bornkickers' ) ),
								  Field::make( 'image', 'image', __( 'Image', 'bornkickers' ) )
									->set_value_type( 'url' ),
								//   Field::make( 'text', 'link', __( 'Link', 'bornkickers' ) ),
								  Field::make( 'urlpicker', 'link', __( 'Link', 'bornkickers' ) )
									->set_help_text(  __( 'Select the link', 'bornkickers' ) ),
				              )
			              ),
		         )
			 );

	Container::make( 'post_meta', __( 'About', 'bornkickers' ) )
		->where( 'post_id', '=', get_option( 'page_on_front' ) )
		->add_fields(
			array(
			Field::make( 'text', 'benefits_section_heading', __( 'Section Heading', 'bornkickers' ) ),
			Field::make( 'text', 'benefits_section_content', __( 'Text', 'bornkickers' ) ),
			Field::make( 'complex', 'benefits', __( 'Benefits', 'bornkickers' ) )
					->set_layout( 'tabbed-vertical' )
					->add_fields( array(
							Field::make( 'text', 'text', __( 'Name', 'bornkickers' ) ),
							Field::make( 'image', 'image', __( 'Image', 'bornkickers' ) )
								->set_value_type( 'url' ),
							Field::make( 'urlpicker', 'link', __( 'Link', 'bornkickers' ) )
								->set_help_text(  __( 'Select the link', 'bornkickers' ) ),
						)
					)
			)
		);

	Container::make( 'post_meta', __( 'Map', 'bornkickers' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields(
		         array(
					//  Field::make( 'text', 'born_map_url', __( 'Map URL', 'bornkickers' ) ),
					Field::make( 'text', 'map_section_heading', __( 'Section Heading', 'bornkickers' ) ),
					Field::make( 'text', 'map_section_content', __( 'Text', 'bornkickers' ) ),
					Field::make( 'image', 'born_map_image', __( 'Map Image', 'bornkickers' ) )
						->set_value_type( 'url' ),
					Field::make( 'urlpicker', 'born_map_url', __( 'Link', 'bornkickers' ) )
						->set_help_text(  __( 'Select the link', 'bornkickers' ) ),
		         )
	         );

	Container::make( 'post_meta', __( 'Coaches' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields(
		         array(
					Field::make( 'text', 'coaches_section_heading', __( 'Section Heading', 'bornkickers' ) ),
					Field::make( 'text', 'coaches_section_content', __( 'Text', 'bornkickers' ) ),
					Field::make( 'complex', 'born_coaches', __( 'Coaches', 'bornkickers' ) )
			              ->set_layout( 'tabbed-vertical' )
			              ->add_fields( array(
					              Field::make( 'text', 'text', __( 'Name', 'bornkickers' ) ),
								  Field::make( 'image', 'image', __( 'Image', 'bornkickers' ) )
									->set_value_type( 'url' ),
								  Field::make( 'urlpicker', 'link', __( 'Link', 'bornkickers' ) )
									->set_help_text(  __( 'Select the link', 'bornkickers' ) ),
					            //   Field::make( 'text', 'link', __( 'Link', 'bornkickers' ) )
				              )
						  ),
					Field::make( 'urlpicker', 'coaches_section_link', __( 'Section Link', 'bornkickers' ) )
							->set_help_text(  __( 'Select the link', 'bornkickers' ) ),
		         )
			 );
			 
	Container::make( 'post_meta', __( 'Stories', 'bornkickers' ) )
			 ->where( 'post_id', '=', get_option( 'page_on_front' ) )
			 ->add_fields(
				 array(
					Field::make( 'text', 'stories_section_heading', __( 'Section Heading', 'bornkickers' ) ),
					Field::make( 'image', 'stories_video', __( 'Video', 'bornkickers' ) )
						->set_value_type( 'url' ),
					Field::make( 'text', 'stories_section_content', __( 'Text', 'bornkickers' ) ),
					Field::make( 'image', 'stories_image_a', __( 'Image 1', 'bornkickers' ) )
						->set_value_type( 'url' ),
					Field::make( 'image', 'stories_image_b', __( 'Image 2', 'bornkickers' ) )
						->set_value_type( 'url' ),
					Field::make( 'urlpicker', 'stories_section_link', __( 'Section Link', 'bornkickers' ) )
						->set_help_text(  __( 'Select the link', 'bornkickers' ) ),
					Field::make( 'rich_text', 'stories_quote_content', __( 'Quote Content', 'bornkickers' ) ),
					Field::make( 'text', 'stories_quote_citation', __( 'Quote Citation', 'bornkickers' ) ),
				 )
			 );

	Container::make( 'post_meta', __( 'Partners' ) )
	         ->where( 'post_id', '=', get_option( 'page_on_front' ) )
	         ->add_fields( array(
				Field::make( 'text', 'partners_section_heading', __( 'Section Heading', 'bornkickers' ) ),
				Field::make( 'text', 'partners_section_content', __( 'Text', 'bornkickers' ) ),
				Field::make( 'complex', 'born_logos', __( 'Logos', 'bornkickers' ) )
		              ->set_layout( 'tabbed-vertical' )
		              ->add_fields( array(
							  Field::make( 'image', 'image', __( 'Image', 'bornkickers' ) )
								->set_value_type( 'url' ),
							  Field::make( 'text', 'text', __( 'Text', 'bornkickers' ) ),
							  Field::make( 'urlpicker', 'link', __( 'Link', 'bornkickers' ) )
								->set_help_text(  __( 'Select the link', 'bornkickers' ) ),
							//   Field::make( 'text', 'link', __( 'Link', 'bornkickers' ) )
			              )
		              )
			 ) );

}
add_action( 'carbon_fields_register_fields', 'born_carbon_fields' );

/**
 * Load Carbon Fields Library
 */
function bornkickers_carbon_fields_load() {
	require_once( get_template_directory() . '/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', 'bornkickers_carbon_fields_load' );