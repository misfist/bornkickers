<?php
get_header();

if ( have_posts() ):
	while ( have_posts() ):
        the_post();

        if( !function_exists( 'carbon_get_post_meta' ) ) {
            exit;
        }
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
                                </div><!-- .benefits__column" -->

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

	<?php
	endwhile;
endif;

get_footer();