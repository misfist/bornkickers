<?php
get_header();

if ( have_posts() ):
	while ( have_posts() ):
		the_post();
		?>


<!--      <script type='text/javascript' src='https://bornkickers.leagueapps.com/widgets/login'></script>-->

        <?php
		$slides = carbon_get_theme_option( 'born_top_slider' );
        ?>
      <div class="home-slider">

	      <?php foreach ($slides as $slide):

		      $text1 =  $slide['text1'];
		      $text2 =  $slide['text2'];
		      $image = wp_get_attachment_image_url($slide['image'], 'full');
		      $link = $slide['link'];
		      ?>

              <div class="home-slide" style="background-image: url(<?php echo $image ?>)">
                  <div class="corners"></div>
                  <a href="<?php echo $link ?>">
                      <div class="text">
                          <div class="text-wrap">
                              <h2><?php echo $text1 ?></h2>
                              <p><?php echo $text2 ?></p>
                          </div>
                      </div>
                  </a>
              </div>

	      <?php endforeach; ?>


        <div class="home-slide" style="background-image: url(/wp-content/themes/bornkickers/assets/img/home.jpg)">
            <div class="corners"></div>
            <a href="https://bornkickers.leagueapps.com/signup" target="_blank">
                <div class="text">
                    <div class="text-wrap">
                        <h2>For The Game</h2>
                        <p>Enroll Now: Inspire the love of soccer in your 3-6 year-old</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="home-slide" style="background-image: url(/wp-content/themes/bornkickers/assets/img/SLIDER2.jpg)">
            <div class="corners"></div>
            <a href="/benefits">
                <div class="text">
                    <div class="text-wrap">
                        <h2>For the Future</h2>
                        <p>More than a soccer class</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="home-slide" style="background-image: url(/wp-content/themes/bornkickers/assets/img/SLIDER3.jpg)">
            <div class="corners"></div>
            <a href="/about-us">
                <div class="text">
                    <div class="text-wrap">
                        <h2>For the Passion</h2>
                        <p>About Us</p>
                    </div>
                </div>
            </a>
        </div>
      </div>

      <div class="red-wrap">
          <h2>WHY US?</h2>
          <p>More than just a soccer class</p>

          <div class="benefits">
              <div class="benefits__row">
                  <div class="benefits__column">
                      <a href="/benefits#Development">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Development.png" /></span>
                          <span>Development</span>
                      </a>
                  </div>
                  <div class="benefits__column">
                      <a href="/benefits#Fitness">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Fitness.png" /></span>
                          <span>Fitness</span>
                      </a>
                  </div>
                  <div class="benefits__column">
                      <a href="/benefits#Friendship">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Friendship.png" /></span>
                          <span>Friendship</span>
                      </a>
                  </div>
                  <div class="benefits__column">
                      <a href="/benefits#Independence">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Independence.png" /></span>
                          <span>Independence</span>
                      </a>
                  </div>
              </div>
              <div class="benefits__row">
                  <div class="benefits__column">
                      <a href="/benefits#Testimonials">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Testimonials.png" /></span>
                          <span>Testimonials</span>
                      </a>
                  </div>
                  <div class="benefits__column">
                      <a href="/benefits#Teamwork">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Teamwork.png" /></span>
                          <span>Teamwork</span>
                      </a>
                  </div>
                  <div class="benefits__column">
                      <a href="/benefits#Community">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Community.png" /></span>
                          <span>Community</span>
                      </a>
                  </div>
                  <div class="benefits__column">
                      <a href="/benefits#Focus">
                          <span class="benefits__column__img-wrap"><img src="/wp-content/themes/bornkickers/assets/img/Focus.png" /></span>
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

        <div class="image-link">
            <a href="/locations">
                <img class="only-desktop" src="/wp-content/themes/bornkickers/assets/img/map_image.png">
                <img class="only-table-and-mobile" src="/wp-content/themes/bornkickers/assets/img/map-mobile.png">
            </a>
        </div>

        <div class="white-wrap">
            <h2>COACHES</h2>
            <p>Meet our team</p>
        </div>

        <div class="coaches">
            <ul class="coaches__gallery">
                <li class="coaches__gallery-item">
                    <a href="/coaches">
                        <img src="/wp-content/themes/bornkickers/assets/img/coaches/coatch-3.png">
                        <span>Evan Rosenthal</span>
                    </a>
                </li>
                <li class="coaches__gallery-item">
                    <a href="/coaches">
                        <img src="/wp-content/themes/bornkickers/assets/img/coaches/DO8V3103.jpg">
                        <span>Admir Nezaj</span>
                    </a>
                </li>
                <li class="coaches__gallery-item">
                    <a href="/coaches">
                        <img src="/wp-content/themes/bornkickers/assets/img/coaches/KashifWebsitePicture.jpg">
                        <span>Kashif Anthony</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="button-link">
            <a href="/coaches">Meet our team</a>
        </div>

        <div class="white-wrap white-wrap__before-story">
            <h2>SUCCESS STORIES</h2>
            <p>Our parents view</p>
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
            <a href="/success-stories">See other impact stories</a>
        </div>

        <div class="white-wrap">
            <h2>PARTNERS</h2>
        </div>

        <div class="partners">
            <ul class="partners__gallery">
                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/Williamsburg Northside School.png">
                    </div>
                    <div class="partners__image__title">Williamsburg Northside School</div>
                </li>
                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/PS281-River-School-Logo.png">
                    </div>
                    <div class="partners__image__title">PS281 River School</div>
                </li>
                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/MKFC LOGO NO BACKGROUND.png">
                    </div>
                    <div class="partners__image__title">Manhattan Kickers FC</div>
                </li>
                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/met oval logo new.png">
                    </div>
                    <div class="partners__image__title">Metropolitan Oval Academy</div>
                </li>
                <li  class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/US Club Soccer Logo.png">
                    </div>
                    <div class="partners__image__title">US Club Soccer</div>
                </li>
<!--                <li class="partners__image">-->
<!--                    <div class="partners__image__pic">-->
<!--                        <img src="/wp-content/themes/bornkickers/assets/img/partners/0518f40223f00ba45420d668c5c3200621378254.png">-->
<!--                    </div>-->
<!--                    <div class="partners__image__title">Upper 90</div>-->
<!--                </li>-->
<!--                <li class="partners__image">-->
<!--                    <div class="partners__image__pic">-->
<!--                        <img src="/wp-content/themes/bornkickers/assets/img/partners/Peck Slip School Logo.png">-->
<!--                    </div>-->
<!--                    <div class="partners__image__title">Peck Slip School</div>-->
<!--                </li>-->
                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/Mosaic Prep Logo.png">
                    </div>
                    <div class="partners__image__title">Mosaic Preparatory Academy</div>
                </li>
                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/Leman Prep Logo.png">
                    </div>
                    <div class="partners__image__title">Leman Manhattan Preparatory School</div>
                </li>
                <li class="partners__image">
                    <div class="partners__image__pic">
                        <img src="/wp-content/themes/bornkickers/assets/img/partners/League Apps Logo.png">
                    </div>
                    <div class="partners__image__title">LeagueApps</div>
                </li>
            </ul>
        </div>

	<?php
	endwhile;
endif;

get_footer();