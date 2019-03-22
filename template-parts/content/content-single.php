<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

?>

<div <?php post_class( array( 'content', 'content_template_base1' ) ); ?> >

	<h1><?php the_title(); ?></h1>
	<div class="entry-meta">
		<?php get_the_term_list( $post->ID, 'category', '<span class="screen-reader-text">Categories</span>', ', ', '' ); ?>
	</div>

	<?php the_content(); ?>

</div><!-- #post-${ID} -->