<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

	$class = 'content_template_base1';
	?>
	
	<?php 
	if( is_post_type_archive( 'location' ) && get_theme_mod( 'location_archive_header_image' ) ) : 
		$top_image = ( get_theme_mod( 'location_archive_header_image' ) ) ? get_theme_mod( 'location_archive_header_image' ) : get_header_image();
		$class = 'content_template_base2';
		?>
        <div class="content">

            <div class="top-image" style="background-image: url(<?php echo esc_url( $top_image ) ?>)">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
            </div>

        </div>
	<?php endif; ?>

	<div class="content <?php echo esc_attr( $class ) ?>">

		<?php if( !get_theme_mod( 'location_archive_header_image' ) || !is_post_type_archive( 'location' ) ) : ?>
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php endif; ?>

		<?php if( is_post_type_archive( 'location' ) ) : ?>

			<?php get_template_part( 'template-parts/components/location-filters' ); ?>
		
		<?php endif; ?>
		
		<div class="js-post-list row grid">
			<?php
			if ( have_posts() ):
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content/content', get_post_type() );

					// End the loop.

				endwhile;

			endif;
					
			?>
		<div>

		<div class="pagination">
			<?php 
			// Previous/next page navigation.
			echo paginate_links();
			?>
		</div>
	</div>
    <?php

get_footer();
