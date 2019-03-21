<?php

 /**
  * Enqueue Research Filter Scripts
  *
  * @since 0.1.0
  *
  * @uses wp_localize_script()
  *
  * @return void
  */
  function bornkickers_location_filters_enqueue_scripts() {
    /**
     * Frontend AJAX requests.
     */
     if( is_page( 'Locations' ) || is_post_type_archive( 'location' ) ) {
       wp_deregister_script( 'jquery-slim' );
       wp_enqueue_script( 'bornkickers-location-filters', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/location-filters.js', array( 'jquery' ), null, true );
       wp_localize_script( 'bornkickers-location-filters', 'location_filters',
         array(
           'nonce'         => wp_create_nonce( 'bornkickers_location_filters' ),
           'ajax_url'      => admin_url( 'admin-ajax.php' ),
         )
       );
     }
   }
   add_action( 'wp_enqueue_scripts', 'bornkickers_location_filters_enqueue_scripts' );
 
  /**
   * Get Posts
   * Get $_POST values and return content
   *
   * @since 0.1.0
   *
   * @uses do_location_filters action
   * @uses wp_ajax_ action hook
   * @uses WP_Query()
   * @uses wp_verify_nonce()
   *
   * @link https://codex.wordpress.org/Class_Reference/WP_Query
   * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
   *
   * @return void
   */
   function bornkickers_filter_posts() {
 
     if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'bornkickers_location_filters' ) ) {
       die( 'Permission denied' );
     }
 
     $args = array(
       'post_type'    => 'location',
       'order'        => 'ASC',
       'orderby'      => 'title',
     );
 
     if( $_POST['args']['s'] ) {
       $args['s'] = sanitize_text_field( $_POST['args']['s'] );
     }

     if( $_POST['args']['neighborhood'] ) {
       $args['tax_query'][] = array(
         'taxonomy'      => 'neighborhood',
         'field'         => 'id',
         'terms'         => array( absint( $_POST['args']['neighborhood'] ) )
       );
     }
 
     if( $_POST['args']['season'] ) {
       $args['tax_query'][] = array(
         'taxonomy'      => 'season',
         'field'         => 'id',
         'terms'         => array( absint( $_POST['args']['season'] ) )
       );
     }
 
     $posts_query = new WP_Query( $args );
 
     ob_start();
 
     if( $posts_query->have_posts() ) {
 
       while( $posts_query->have_posts() ) :
         $posts_query->the_post();
 
         get_template_part( 'template-parts/content/content', 'location' );
 
       endwhile;
 
     } else {
 
        _e( 'No locations found', 'bornkickers' );
 
     }
 
     $response = array(
       'content'         => ob_get_clean(),
       'posts_found'     => intval( $posts_query->found_posts ),
     );
 
     wp_send_json( $response );
 
     die();
 
   }
   add_action( 'wp_ajax_do_location_filters', 'bornkickers_filter_posts' ); // part after `wp_ajax_` corresponds to action called in JS
   add_action( 'wp_ajax_nopriv_do_location_filters', 'bornkickers_filter_posts' ); // part after `wp_ajax_nopriv_` corresponds to action called in JS
 