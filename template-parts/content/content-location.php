<?php
/**
 * Template part for displaying locations
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h3 class="entry-title">', '</h3>' );
		?>

		<div class="entry-meta">
		<?php 
		$seasons = get_the_terms( $post->ID, 'season');
		if( !empty( $seasons ) ) { ?>

			<ul class="cat-seasons">
			<?php

			foreach( $seasons as $season ) {

				$image_id = get_term_meta( $season->term_id, 'image', true );

				if ( ! empty( $image_id ) ) { 
				?>

					<li><?php echo wp_get_attachment_image( $image_id, 'full', true, array( 'class' => 'season' ) ); ?></li>

				<?php
				}

			}

			?>
			</ul>

		<?php
		}
		?>
		</div>
	</header><!-- .entry-header -->

	<?php the_post_thumbnail(); ?>

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
