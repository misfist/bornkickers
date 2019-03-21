<?php

$args_neighborhoods = array(
	'show_option_all'    => __( 'All Neighborhoods', 'bornkickers' ),
	'orderby'            => 'name',
	'order'              => 'DESC',
	'show_count'         => 1,
	'hide_empty'         => 1,
	'name'               => 'neighborhood',
	'id'                 => 'locations',
	'class'              => 'js-neighborhood-filter neighborhoods',
	'depth'              => 1,
	'tab_index'          => 1,
	'taxonomy'           => 'neighborhood',
	'hide_if_empty'      => true,
	'value_field'	     => 'term_id',
);

$args_seasons = array(
	'show_option_all'    => __( 'All Seasons', 'bornkickers' ),
	'orderby'            => 'name',
	'order'              => 'DESC',
	'show_count'         => 1,
	'hide_empty'         => 1,
	'name'               => 'season',
	'id'                 => 'seasons',
	'class'              => 'js-season-filter seasons',
	'depth'              => 1,
	'tab_index'          => 2,
	'taxonomy'           => 'season',
	'hide_if_empty'      => false,
	'value_field'	     => 'term_id',
);
?>

<form role="search" method="get" class="js-filters location-filters">

    <?php wp_dropdown_categories( $args_neighborhoods ); ?>

    <?php wp_dropdown_categories( $args_seasons ); ?>

    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"
            tabindex="3" />
		<!-- <button class="button" type="button"><?php _e( 'Search', 'bornkickers' ); ?></button> -->
    </label>

</form>

