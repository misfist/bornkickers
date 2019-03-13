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

if ( have_posts() ):
    while ( have_posts() ):
        the_post();

        $top_image = carbon_get_the_post_meta( 'crb_basic_top_image' );

        ?>

        <div class="content">

            <div class="top-image" style="background-image: url(<?php echo $top_image ?>)">
<!--                <div class="corners"></div>-->
                <h1><?php the_title(); ?></h1>
            </div>

        </div>

        <div class="content content_template_base2">
			<div class="grid">
			<?php
			if( have_posts()  ) :
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

				else :

				endif;
						
			?>
		  <div>
        </div>
    <?php
    endwhile;
endif;

get_footer();
