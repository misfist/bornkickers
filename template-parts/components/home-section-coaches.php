<?php
/**
 * Home Content Section - Coaches
 */
?>

        <?php 
        // Coaches
        if( $coaches = carbon_get_post_meta( $post->ID, 'born_coaches' ) ) : ?>

            <div class="white-wrap">
                <h2><?php echo esc_attr( get_post_meta( $post->ID, '_coaches_section_heading', true ) ); ?></h2>
                <?php echo wpautop( esc_attr( get_post_meta( $post->ID, 'c_oaches_section_content', true ) ) ); ?>
            </div><!-- .white-wrap -->

            <div class="coaches">
                <ul class="coaches__gallery">

                    <?php foreach ( $coaches as $coach ) : ?>

                        <li class="coaches__gallery-item">
                            <a href="<?php echo esc_url( $coach['link']['url'] ); ?>">
                                <img src="<?php echo esc_url( $coach['image'] ); ?>">
                                <span><?php echo esc_attr( $coach['text'] ); ?></span>
                            </a>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div><!-- .coaches -->

            <?php if( $coach_link = carbon_get_post_meta( $post->ID, 'benefits_section_link' ) ) : ?>

                <div class="button-link">
                    <a href="<?php echo esc_url( $coach_link['url'] ); ?>"><?php echo esc_attr( $coach_link['content'] ); ?>"</a>
                </div><!-- .button-link -->

            <?php endif; ?>

        <?php endif; ?>
