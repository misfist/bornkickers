<?php /* Template Name: Base Template 2 */
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
          <?php the_content(); ?>
        </div>
    <?php
    endwhile;
endif;

get_footer();