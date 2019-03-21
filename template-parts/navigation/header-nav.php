<?php
/**
 * Main Navigation Markup
 */
?>

<nav>
    <?php 
    wp_nav_menu( array(
        'theme_location'    => 'top-menu',
        'menu'              => 'top-menu',
        'menu_class'        => 'top-nav',
        'container'         => '',
        'fallback_cb'       => false
    ) ); 
    ?>
    <?php
        global $post;
        $post_slug = $post->post_name;
    ?>
    <ul class="general-nav">
        <li>
            <a href="https://bornkickers.leagueapps.com/events" target="_blank">Enroll</a>
        </li>
        <li class="<?php echo ( $post_slug === 'locations' ? 'brackets' : '' ) ?>">
            <a href="/locations">Locations</a>
        </li>
        <li class="<?php echo ( in_array( $post_slug, ['about-us', 'faq', 'affiliates', 'uniforms']) ? 'brackets' : '' ) ?>">
            <a href="/about-us">Program</a>
            <ul>
                <li class="top-hidden"></li>
                <li class="top-white"></li>
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
        <li class="<?php echo ( in_array( $post_slug, ['benefits', 'coaches', 'success-stories'] ) ? 'brackets' : '' ) ?>">
            <a href="/benefits">About</a>
            <ul>
                <li class="top-hidden"></li>
                <li class="top-white"></li>
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
        <li class="<?php echo ( $post_slug === 'contact-us' ? 'brackets' : '' ) ?>">
            <a href="/contact-us">Contact</a>
        </li>
    </ul>
</nav>