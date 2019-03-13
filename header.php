<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php echo wp_title(); ?>
	</title>
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
	<?php wp_head(); ?>
</head>
<body>

<div class="container">
<header>
    <a href="/" class="logo">
        <img src="/wp-content/themes/bornkickers/assets/img/logo.svg" />
    </a>

    <nav class="mobile"></nav>

    <ul class="general-nav">
    <?php bornkickers_dropdown_menu( 'main-menu' ); ?>
    </ul>

    <?php wp_nav_menu( array(
        'theme_location'    => 'top-menu',
        'menu'              => 'top-menu',
        'menu_class'        => 'top-nav',
        'container'         => 'nav',
        'fallback_cb'       => false
    ) ); ?>


    <nav>
        <ul class="top-nav">
        
            <li>
                <a href="https://bornkickers.leagueapps.com/dashboard" target="_blank">My Account</a>
            </li>
            <li>
                <a href="https://bornkickers.leagueapps.com/login" target="_blank">Sign In</a>
            </li>
        </ul>
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
            <li class="<?php echo ( in_array($post_slug, ['about-us', 'faq', 'affiliates', 'uniforms']) ? 'brackets' : '' ) ?>">
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
            <li class="<?php echo ( in_array($post_slug, ['benefits', 'coaches', 'success-stories']) ? 'brackets' : '' ) ?>">
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
</header>

<div class="menu-overlay">
    <div>
        <a href="/" class="logo">
            <img src="/wp-content/themes/bornkickers/assets/img/logo.svg" />
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

<main>