<?php
get_header(); ?>

<div class="content content_template_base1">

<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );
			}

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

		<div class="pagination">
			<?php 
			// Previous/next page navigation.
			echo paginate_links();
			?>
		</div>

</div>

<?php
get_footer();