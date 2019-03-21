<?php
/**
 * Utility Navigation Markup
 */
?>


<div class="menu-overlay">
    <div>
        <a href="<?php echo home_url(); ?>" class="logo">
            <?php if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            } ?>
        </a>

        <span id="close_menu" class="close"></span>
    </div>
    <ul class="main-mobile-nav">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="https://bornkickers.leagueapps.com/events" target="_blank">Enroll</a>
        </li>
        <li>
            <a href="https://bornkickers.leagueapps.com/dashboard" target="_blank">My Account</a>
        </li>
        <li>
            <a href="/locations">Locations</a>
        </li>
        <li>
            <a href="#" class="has-sub-mobile-nav">Program</a>
            <ul class="sub-mobile-nav">
                <li class="back-mobile-nav"><a href="#">back</a></li>
                <li>
                    <a href="/about-us">Born Basics</a>
                </li>
                <li>
                    <a href="/uniforms">Uniforms</a>
                </li>
                <li>
                    <a href="/affiliates">Affiliates</a>
                </li>
                <li>
                    <a href="/faq">FAQ</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="has-sub-mobile-nav">About</a>
            <ul class="sub-mobile-nav">
                <li class="back-mobile-nav"><a href="#">back</a></li>
                <li>
                    <a href="/benefits">Who we are</a>
                </li>
                <li>
                    <a href="/coaches">Coaches</a>
                </li>
                <li>
                    <a href="/success-stories">Stories</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/contact-us">Contact</a>
        </li>
    </ul>
</div>