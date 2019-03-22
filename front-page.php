<?php
get_header();

if ( have_posts() ):
	while ( have_posts() ):
        the_post();

        if( !function_exists( 'carbon_get_post_meta' ) ) {
            exit;
        }
        ?>

        <?php get_template_part( 'template-parts/components/home-section', 'slider' ); ?>

        <?php get_template_part( 'template-parts/components/home-section', 'about' ); ?>

        <?php get_template_part( 'template-parts/components/home-section', 'locations' ); ?>

        <?php get_template_part( 'template-parts/components/home-section', 'coaches' ); ?>

        <?php get_template_part( 'template-parts/components/home-section', 'stories' ); ?>

        <?php get_template_part( 'template-parts/components/home-section', 'partners' ); ?>

	<?php
	endwhile;
endif;

get_footer();