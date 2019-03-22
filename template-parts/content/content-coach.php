<?php
/**
 * Template part for displaying coach posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( $post->ID, 'trainer' ); ?>
	<?php else : ?>
		<img src="<?php echo get_theme_mod( 'default_coach_image' ); ?>" >
	<?php endif; ?>

	<div class="entry-header">
		<?php
		the_title( '<h3 class="entry-title">', '</h3>' );
		?>

		<div class="entry-meta"></div>
	</div><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bornkickers' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bornkickers' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
