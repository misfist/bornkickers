<?php
/**
 * Home Content Area - About
 */
?>

		<?php
        // About
        if( $benefits = carbon_get_post_meta( $post->ID, 'benefits' ) ) : ?>

            <div class="red-wrap">

                <h2><?php echo esc_attr( get_post_meta( $post->ID, '_benefits_section_heading', true ) ); ?></h2>

                <?php echo wpautop( esc_attr( get_post_meta( $post->ID, '_benefits_section_content', true ) ) ); ?>

                <?php if( $benefits = carbon_get_post_meta( $post->ID, 'benefits' ) ) : 
                    $counter = 0; ?>

                    <div class="benefits">

                        <div class="benefits__row">

                            <?php foreach( $benefits as $benefit ) : ?>
        
                                <div class="benefits__column">
                                    <a href="<?php echo esc_url( $benefit['link']['url'] ); ?>">
                                        <span class="benefits__column__img-wrap"><img src="<?php echo esc_url( $benefit['image']); ?>"/></span>
                                        <span><?php echo esc_attr( $benefit['text'] ); ?></span>
                                    </a>
                                </div><!-- .benefits__column -->

                                <?php if( ( $counter + 1 ) % 4 == 0 && $counter != count( $benefits ) - 1 ) : ?>
                                    </div><!-- .benefits__row -->
                                    <div class="benefits__row">
                                <?php endif; ?>

                            <?php 
                            $counter++;
                            endforeach; ?>
                            
                        </div><!-- .benefits__row -->
                    </div><!-- .benefits -->
                <?php endif; ?>

            </div><!-- .red-wrap -->

        <?php endif; ?>