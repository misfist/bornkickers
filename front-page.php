<?php
get_header();

if ( have_posts() ):
	while ( have_posts() ):
		the_post();
		?>


        <!--      <script type='text/javascript' src='https://bornkickers.leagueapps.com/widgets/login'></script>-->

		<?php
		$slides = carbon_get_post_meta( get_the_ID(), 'born_top_slider' );
		?>
        <div class="home-slider">
	        <?php foreach ($slides as $slide):

		        $text1 =  $slide['text1'];
		        $text2 =  $slide['text2'];
		        $image = wp_get_attachment_image_url($slide['image'], 'full');
		        $link = $slide['link'];
		        ?>

                <div class="home-slide" style="background-image: url(<?php echo $image ?>)">
<!--                    <div class="corners"></div>-->
                    <a href="<?php echo $link ?>">
                        <div class="text">
                                <h2><?php echo $text1 ?></h2>
                        </div>
                            <p><?php echo $text2 ?></p>
                    </a>
                </div>

	        <?php endforeach; ?>
        </div>

        <div class="red-wrap">
            <h2>ABOUT</h2>
            <p>More than just a soccer class</p>

            <div class="benefits">
                <div class="benefits__row">
                    <div class="benefits__column">
                        <a href="/benefits#Development">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/Development.png"/></span>
                            <span>Development</span>
                        </a>
                    </div>
                    <div class="benefits__column">
                        <a href="/benefits#Fitness">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/Fitness.png"/></span>
                            <span>Fitness</span>
                        </a>
                    </div>
                    <div class="benefits__column">
                        <a href="/benefits#Friendship">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/Friendship.png"/></span>
                            <span>Friendship</span>
                        </a>
                    </div>
                    <div class="benefits__column">
                        <a href="/benefits#Independence">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/n1.png"/></span>
                            <span>Independence</span>
                        </a>
                    </div>
                </div>
                <div class="benefits__row">
                    <div class="benefits__column">
                        <a href="/benefits#Testimonials">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/Testimonials.png"/></span>
                            <span>Testimonials</span>
                        </a>
                    </div>
                    <div class="benefits__column">
                        <a href="/benefits#Teamwork">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/Teamwork3.png"/></span>
                            <span>Teamwork</span>
                        </a>
                    </div>
                    <div class="benefits__column">
                        <a href="/benefits#Community">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/Community.png"/></span>
                            <span>Community</span>
                        </a>
                    </div>
                    <div class="benefits__column">
                        <a href="/benefits#Focus">
                            <span class="benefits__column__img-wrap"><img
                                        src="/wp-content/themes/bornkickers/assets/img/Focus.png"/></span>
                            <span>Focus</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="white-wrap">
            <h2 class="mobile-visible">NYC LOCATIONS</h2>
            <h2 class="mobile-invisible">NEW YORK CITY LOCATIONS</h2>
            <p>Find our dedicated soccer spaces in Manhattan and Queens</p>
        </div>

        <?php
            $image_id = carbon_get_post_meta( get_the_ID(), 'born_map_image' );
            $image_url = wp_get_attachment_image_url( $image_id, 'full' );
        ?>

        <div class="image-link">
            <a href="<?php echo carbon_get_post_meta( get_the_ID(), 'born_map_url' ) ?>">
                <img class="only-desktop" src="<?php echo $image_url ?>">
                <img class="only-table-and-mobile" src="<?php echo $image_url ?>">
            </a>
        </div>

		<?php
		$coaches = carbon_get_post_meta( get_the_ID(), 'born_coaches' );
		?>

        <div class="white-wrap">
            <h2>COACHES</h2>
            <p>Meet our team</p>
        </div>


        <div class="coaches">
            <ul class="coaches__gallery">

                <?php foreach ($coaches as $coach):

	                $name = $coach['text'];
	                $image = wp_get_attachment_image_url( $coach['image'], 'full' );
	                $link  = $coach['link'];
                  ?>

                <li class="coaches__gallery-item">
                    <a href="<?php echo $link ?>">
                        <img src="<?php echo $image ?>">
                        <span><?php echo $name ?></span>
                    </a>
                </li>

                <?php endforeach; ?>

            </ul>
        </div>

        <div class="button-link">
            <a href="/coaches">Meet our team</a>
        </div>

        <div class="white-wrap white-wrap__before-story">
            <h2>STORIES</h2>
            <p>What Parents Say</p>
        </div>

        <div class="story">
            <div class="story__video-link">
                <img src="/wp-content/themes/bornkickers/assets/img/kid2.gif" style="width:100%;">
                <!--                <a href="#">-->
                <!--                    <img src="/wp-content/themes/bornkickers/assets/img/play.svg">-->
                <!--                </a>-->
                <div class="story__corners"></div>
                <div class="story__horizontal-image">
                    <div class="story__horizontal-image__content">
                        <img src="/wp-content/themes/bornkickers/assets/img/story-horizontal.png">
                    </div>
                </div>
                <div class="story__vertical-image">
                    <div class="story__vertical-image__content">
                        <img src="/wp-content/themes/bornkickers/assets/img/story-vertical.png">
                    </div>
                </div>
                <div class="story__blockqueue">
                    <div class="story__blockqueue__queue">
                        &#8220;His enjoyment of the program motivated him to play more, it's amazing.&#8221;
                    </div>
                    <div class="story__blockqueue__author">
                        Natasha, Mother of Silas.
                    </div>
                </div>
            </div>
        </div>

        <div class="button-link button-link_extra-margin">
            <a href="/success-stories">More Stories</a>
        </div>


		<?php
		$logos = carbon_get_post_meta( get_the_ID(), 'born_logos' );
		?>

        <div class="white-wrap">
            <h2>PARTNERS</h2>
        </div>

        <div class="partners">
            <ul class="partners__gallery">

                <?php foreach ($logos as $logo):

                    $text = $logo['text'];
                    $image = wp_get_attachment_image_url( $logo['image'], 'full' );
                    ?>

                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="<?php echo $image ?>">
                    </div>
                    <div class="partners__image__title"><?php echo $text ?></div>
                </li>

                <?php endforeach; ?>

            </ul>
        </div>

	<?php
	endwhile;
endif;

get_footer();