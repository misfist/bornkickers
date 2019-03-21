<?php
/**
 * Home Content Area - Stories
 */
?>

        <?php
        // Stories
        if( get_post_meta( $post->ID, '_stories_section_heading', true ) || get_post_meta( $post->ID, '_stories_section_content', true ) ) : ?>

            <div class="white-wrap white-wrap__before-story">
                <?php if( $heading = get_post_meta( $post->ID, '_stories_section_heading', true ) ) : ?>
                    <h2><?php echo esc_attr( $heading ); ?></h2>
                <?php endif; ?>

                <?php if( $text = get_post_meta( $post->ID, '_stories_section_content', true ) ) : ?>
                    <?php echo wpautop( esc_attr( $text ) ); ?>
                <?php endif; ?> 
            </div>

            <div class="story">
                <div class="story__video-link">
                    <?php if( $video = get_post_meta( $post->ID, '_stories_video', true ) ) : ?>
                        <img src="<?php echo esc_url( $video ); ?>" style="width:100%;">
                    <?php endif; ?>

                    <div class="story__corners"></div>
                    <div class="story__horizontal-image">
                        <div class="story__horizontal-image__content">
                            <?php if( $image1 = get_post_meta( $post->ID, '_stories_image_a', true ) ) : ?>
                                <img src="<?php echo esc_url( $image1 ); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="story__vertical-image">
                        <div class="story__vertical-image__content">
                            <?php if( $image2 = get_post_meta( $post->ID, '_stories_image_b', true ) ) : ?>
                                <img src="<?php echo esc_url( $image2 ); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if( carbon_get_post_meta( $post->ID, 'stories_quote_content' ) || carbon_get_post_meta( $post->ID, 'stories_quote_citation' ) ) : ?>
                        <div class="story__blockqueue">
                            <?php if( $quote = carbon_get_post_meta( $post->ID, 'stories_quote_content' ) ) : ?>
                                <div class="story__blockqueue__queue">
                                    <?php echo apply_filters( 'the_content', '&#8220;' . $quote . '&#8221;' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( $citation = carbon_get_post_meta( $post->ID, 'stories_quote_citation' ) ) : ?>
                                <div class="story__blockqueue__author">
                                    <?php echo esc_html( $citation ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if( $stories_link = carbon_get_post_meta( $post->ID, 'stories_section_link' ) ) : ?>

                <div class="button-link button-link_extra-margin">
                    <a href="<?php echo esc_url( $stories_link['url'] ); ?>"><?php echo esc_attr( $stories_link['anchor'] ); ?></a>
                </div><!-- .button-link -->

            <?php endif; ?>

        <?php endif; ?>