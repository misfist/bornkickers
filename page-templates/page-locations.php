<?php 
/* 
Template Name: Locations
*/
get_header();

if ( have_posts() ):
    while ( have_posts() ):
        the_post();

        $top_image = get_the_post_thumbnail_url( $post->ID, 'top-image' );
        ?>

        <div class="content">

            <div class="top-image" style="background-image: url(<?php echo $top_image ?>)">
                <!-- <div class="corners"></div>-->
                <h1><?php the_title(); ?></h1>
            </div>

        </div>

        <div class="content content_template_base2">
          <?php the_content(); ?>

          <div class="csRow">

            <?php
            /**
            * Locations Query
            */

            $args = array(  
                'post_type'     => 'location',
                'post_per_page' => 100,
                'pagination'    => false
            );

            $query = new WP_Query( $args );

            if( $query->have_posts() ) :

                while( $query->have_posts() ) : $query->the_post(); ?>

                    <?php get_template_part( 'template-parts/content/content', get_post_type() ); ?>

                <?php
                endwhile;

            endif; // End loop
            ?>

            </div>

        </div>
    <?php
    endwhile;
endif;

get_footer();
