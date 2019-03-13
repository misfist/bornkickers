<?php

@ini_set( 'upload_max_size', '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );

define( "TEMPLATE_DIR", get_template_directory_uri() );

add_image_size( 'trainer', 400, 400 );


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



if ( ! function_exists( 'bk_styles_scripts' ) ) {
	function bk_styles_scripts() {
		wp_enqueue_style( 'bornkickers', get_template_directory_uri(). '/assets/css/bornkickers.css' );
		wp_enqueue_script( 'bornkickers', get_template_directory_uri() . '/assets/js/bornkickers.js', array( 'jquery' ), false, true );
	}

	add_action( 'wp_enqueue_scripts', 'bk_styles_scripts' );
}


add_filter( 'mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor' );
function jivedig_remove_tiny_mce_buttons_from_editor( $buttons ) {
	$remove_buttons = array(
		'strikethrough',
		'numlist',
		'hr', // horizontal line
//		'alignleft',
//		'aligncenter',
//		'alignright',
		'wp_more', // read more link
//		'spellchecker',
		'dfw', // distraction free writing mode
//		'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
	);
	foreach ( $buttons as $button_key => $button_value ) {
		if ( in_array( $button_value, $remove_buttons ) ) {
			unset( $buttons[ $button_key ] );
		}
	}

	return $buttons;
}

/**
 * Removes buttons from the second row (kitchen sink) of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array $buttons The default array of buttons in the kitchen sink
 *
 * @return   array                The updated array of buttons that exludes some items
 */
add_filter( 'mce_buttons_2', 'jivedig_remove_tiny_mce_buttons_from_kitchen_sink' );
function jivedig_remove_tiny_mce_buttons_from_kitchen_sink( $buttons ) {
	$remove_buttons = array(
		'strikethrough',
		'hr', // horizontal line
//		'formatselect', // format dropdown menu for <p>, headings, etc
//		'underline',
//		'alignjustify',
//		'forecolor', // text color
//		'pastetext', // paste as text
//		'removeformat', // clear formatting
//		'charmap', // special characters
		'outdent',
		'indent',
//		'undo',
//		'redo',
//		'wp_help', // keyboard shortcuts
	);
	foreach ( $buttons as $button_key => $button_value ) {
		if ( in_array( $button_value, $remove_buttons ) ) {
			unset( $buttons[ $button_key ] );
		}
	}

	return $buttons;
}

add_filter( 'tiny_mce_before_init', 'remove_h1_from_editor' );
function remove_h1_from_editor( $settings ) {
	$settings['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;';

	return $settings;
}

