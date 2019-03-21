<?php
/**
 * The template for displaying all single pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 * 
 * @package WordPress
 * @subpackage bornkickers
 * @since 1.0.0
 */

get_header();

if ( have_posts() ):
    while ( have_posts() ):
        the_post();

        $top_image = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( $post->ID, 'top-image' ) : null;
        $class = ( has_post_thumbnail() ) ? 'content_template_base2' : 'content_template_base1' ;
	    ?>

        <?php if( $top_image ) : ?>
            <div class="content">

                <div class="top-image" style="background-image: url(<?php echo $top_image ?>)">
                    <h1><?php the_title(); ?></h1>
                </div>

            </div>
        <?php endif; ?>

        <div class="content <?php echo esc_attr( $class ); ?>">

            <?php if( !$top_image ) : ?>
                <h1><?php the_title(); ?></h1>
            <?php endif; ?>

            <?php the_content(); ?>
        </div>
    <?php
    endwhile;
endif;

get_footer();