(function($) {

  /**
   * Variables
   */
  var contentEl = $( '.js-post-list' );

  var searchForm = $( '.js-filters' );
  var searchSubmit = $( '.js-filters :button' );
  var filterEl = $( '.js-filters select' );

  var searchField = $( '.js-filters input[type="search"]' );
  var filterOptions = $( '.js-filters select' );

  var page = 1;
  var args = {};

  console.log( 'Loaded' );

  /**
   * Search
   */
  // searchSubmit.click(function(event) {
  //   event.preventDefault();

  //   args['s'] = searchField.val();

  //   filterOptions.each( function( i, value ) {
  //     var value = $(this).val();
  //     if( value.length !== 0 ) {
  //       args[$(this).closest('select').attr('name')] = value;
  //     }

  //   } );

  //   get_posts(args);

  // });

  /**
   * Filter Event
   */
  filterEl.change(function(event) {
    event.preventDefault();

    args['s'] = searchField.val();

    filterOptions.each( function( i, value ) {
      var value = $(this).val();
      if( value.length !== 0 ) {
        args[$(this).closest('select').attr('name')] = value;
      }

    } );

    get_posts(args);

  });

  searchField.keyup(function(event) {

    args['s'] = searchField.val();

    filterOptions.each( function( i, value ) {
      var value = $(this).val();
      if( value.length !== 0 ) {
        args[$(this).closest('select').attr('name')] = value;
      }

    } );

    get_posts(args);

  });

  /**
   * Get Posts
   * @param  obj args
   * @return obj response
   */
  function get_posts(args) {

    $.ajax({
      url: location_filters.ajax_url,
      data: {
        action: 'do_location_filters',
        /* Action corresponds to `wp_ajax_do_` and `wp_ajax_nopriv_` actions */
        nonce: location_filters.nonce,
        args: args
      },
      type: 'POST',
      success: function(response, textStatus, XMLHttpRequest) {

        console.log( response, textStatus, XMLHttpRequest );

        contentEl.html( response.content );

      },
      error: function(response) {

      },
      complete: function(response) {

      }
    });

  }

})(jQuery);
