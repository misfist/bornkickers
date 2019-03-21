<?php
/**
 * Home Content Section - Locations
 */
?>

        <?php
        // Locations
        if( $map = carbon_get_post_meta( $post->ID, 'born_map_image' ) ) : ?>

            <div class="white-wrap">

                <h2><?php echo esc_attr( get_post_meta( $post->ID, '_map_section_heading', true ) ); ?></h2>

                <?php echo wpautop( esc_attr( get_post_meta( $post->ID, '_map_section_content', true ) ) ); ?>

            </div><!-- .white-wrap -->

            <?php $link = carbon_get_post_meta( $post->ID, 'born_map_url' ); ?>

            <div class="image-link">
                <a href="<?php echo esc_url( $link['url'] ); ?>">
                    <img class="only-desktop" src="<?php echo esc_url( $map ); ?>">
                    <img class="only-table-and-mobile" src="<?php echo esc_url( $map ); ?>">
                </a>
            </div><!-- .image-link -->

        <?php endif; ?>
