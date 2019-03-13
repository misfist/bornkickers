<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" /> -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container">
    <header class="site-header">
        <a href="<?php echo home_url(); ?>" class="logo">
            <img src="/wp-content/themes/bornkickers/assets/img/logo.svg" />
        </a>

        <nav class="mobile"></nav>

        <nav>
            <?php wp_nav_menu( array(
                'theme_location'    => 'top-menu',
                'menu'              => 'top-menu',
                'menu_class'        => 'top-nav',
                'container'         => '',
                'fallback_cb'       => false
            ) ); ?>

            <ul class="general-nav">
                <?php bornkickers_dropdown_menu( 'main-menu' ); ?>
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