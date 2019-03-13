<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

if ( ! function_exists( 'bornkickers_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bornkickers_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			'',
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'bornkickers_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function bornkickers_posted_by() {
		printf(
			/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			'',
			__( 'Posted by', 'bornkickers' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'bornkickers_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function bornkickers_post_thumbnail() {

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

			<?php
		else :
			?>

		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail' ); ?>
			</a>
		</figure>

			<?php
		endif; // End is_singular().
	}
endif;

function bornkickers_dropdown_menu( $menu ) {

	$menu_name = $menu;
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	
		$menu_items = wp_get_nav_menu_items( $menu->term_id );
		$menu_list = '';
		$count = 0;
		$submenu = false;
		$cpi = get_the_id();
		foreach( $menu_items as $current ) {
			if( $cpi == $current->object_id ){
				if ( !$current->menu_item_parent ) {
					$cpi = $current->ID;
				} else {
					$cpi =  $current->menu_item_parent;
				}
				$cai = $current->ID;
				break;
			}
		}
		foreach( $menu_items as $menu_item ) {
			$link = $menu_item->url;
			$title = $menu_item->title;
			$menu_item->ID == $cai ? $ac2 = 'current-menu' : $ac2 = '';
			if ( !$menu_item->menu_item_parent ) {
				$parent_id = $menu_item->ID;
				$parent_id == $cpi ? $ac = ' current brackets' : $ac = '';
				if( !empty( $menu_items[$count + 1] ) && $menu_items[ $count + 1 ]->menu_item_parent == $parent_id ) { //Checking has child
					$menu_list .= '<li class="dropdown has-child' . $ac .' "><a href="' . $link . '" class="dropdown-toggle'. $ac2 . '" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="nav-span"></span>' . $title . '</a>';
				} else {
					$menu_list .= '<li class="'. $ac . '">' ."\n";
					$menu_list .= '<a href="' . $link . '" class="' . $ac2 . '">' . $title . '</a>' . "\n";
				}
				
			}
			if ( $parent_id == $menu_item->menu_item_parent ) {
				if ( !$submenu ) {
					$submenu = true;
					$menu_list .= '<ul class="dropdown-menu">' . "\n";
					$menu_list .= '<li class="top-hidden"></li>'. "\n";
					$menu_list .= '<li class="top-white"></li>'. "\n";
				}
				$menu_list .= '<li class="item">' ."\n";
				$menu_list .= '<a href="' . $link . '" class="' . $ac2 . '">' . $title . '</a>' ."\n";
				$menu_list .= '</li>' ."\n";
				if( empty( $menu_items[$count + 1] ) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ) {
					$menu_list .= '</ul>' ."\n";
					$submenu = false;
				}
			}
			if ( empty( $menu_items[$count + 1] ) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
				$menu_list .= '</li>' ."\n";      
				$submenu = false;
			}
			$count++;
		}
	} else {
		$menu_list = '<li>Menu "' . $menu_name . '" not defined.</li>';
	}

	echo $menu_list;

}

function bornkickers_social_menu( $menu ) {
	$menu_name = $menu;
 
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	 
		$menu_items = wp_get_nav_menu_items($menu->term_id);
	 
		$menu_list = '<ul id="menu-' . $menu_name . '">';
	 
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= '<li><a href="' . $url . '"><class="screen-reader-text"' . $title . '</a></li>';
		}
		$menu_list .= '</ul>';
	} else {
		$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
	}
	
	echo $menu_list;
}