<?php
/**
 * Home Content Area - Partners
 */
?>

        <?php
        // Partners
        if( $logos = carbon_get_post_meta( $post->ID, 'born_logos' ) ) : ?>

            <div class="white-wrap">
                <h2><?php echo esc_attr( get_post_meta( $post->ID, '_partners_section_heading', true ) ); ?></h2>
                <?php echo wpautop( esc_attr( get_post_meta( $post->ID, '_partners_section_content', true ) ) ); ?>
            </div>

            <div class="partners">
                <ul class="partners__gallery">

                    <?php foreach( $logos as $logo ) : ?>

                        <li class="partners__image">
                            <div class="partners__image__pic">
                                <a href="<?php echo esc_url( $logo['link']['url'] ); ?>" target="_blank">
                                    <img src="<?php echo esc_url( $logo['image'] ); ?>" alt="<? echo esc_attr( $logo['text'] ); ?>" />
                                </a>
                            </div>
                            <div class="partners__image__title"><?php echo esc_attr( $logo['text'] ); ?></div>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>

        <?php endif; ?>