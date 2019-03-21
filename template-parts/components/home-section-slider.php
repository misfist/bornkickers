<?php
/**
 * Home Content Section - Slider
 */
?>

        <?php
        // Slider
        if( $slider = carbon_get_post_meta( $post->ID, 'born_top_slider' ) ) : ?>

            <div class="home-slider">

                <?php foreach( $slider as $slide ) : ?>

                    <div class="home-slide" style="background-image: url(<?php echo esc_url( $slide['image'] ); ?>)">
                        <a href="<?php echo esc_url( $slide['link']['url'] ); ?>">
                            <div class="text"><h2><?php echo esc_attr( $slide['text1'] ); ?></h2></div>
                            <?php echo wpautop( esc_attr( $slide['text2'] ) ); ?>
                        </a>
                    </div>

                <?php endforeach; ?>

            </div><!-- .home-slider -->

        <?php endif; ?>
