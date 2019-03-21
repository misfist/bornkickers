<?php 
/* 
Template Name: Locations
*/
get_header();

if ( have_posts() ):
    while ( have_posts() ):
        the_post();

		$top_image = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( get_the_ID(), 'top-image' ) : get_header_image();
        ?>

        <div class="content">

            <div class="top-image" style="background-image: url(<?php echo $top_image ?>)">
                <!-- <div class="corners"></div>-->
                <h1><?php the_title(); ?></h1>
            </div>

        </div>

        <div class="content content_template_base2">
          <?php the_content(); ?>

          <?php get_template_part( 'template-parts/components/location-filters' ); ?>

          <div class="row grid">

            <?php
            /**
            * Locations Query
            */
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;


            $args = array(  
                'post_type'     => 'location',
                'post_per_page' => 100,
                'paged'         => $paged,
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
