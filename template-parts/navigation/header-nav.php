<?php
/**
 * Main Navigation Markup
 */

?>

<nav class="header-navigation" role="navigation">
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
    wp_nav_menu( array(
        'theme_location'    => 'primary',
        'menu'              => 'main-menu',
        'menu_class'        => 'general-nav',
        'container'         => '',
        'fallback_cb'       => false,
        'depth'             => 2,
        'walker'            => new Bornkickers_Walker_Nav_Menu()
    ) );
    ?>
</nav>