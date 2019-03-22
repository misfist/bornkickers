<?php
/**
 * The template for displaying all single posta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

get_header();

if ( have_posts() ):
    while ( have_posts() ):
        the_post();
	    ?>

        <?php get_template_part( 'template-parts/content/content', 'single' ); ?>

    <?php
    endwhile;
endif;

get_footer();
