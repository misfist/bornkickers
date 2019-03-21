<?php
get_header(); ?>

<div class="content content_template_base1">

	<?php
	if ( have_posts() ):
		while ( have_posts() ):
			the_post();
			?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php
		endwhile;

	else :
		get_template_part( 'template-parts/content/content', 'none' );
	endif; ?>

</div>

<?php
get_footer();