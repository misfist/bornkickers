<?php
/**
 * Social Menu
 */
?>

<?php
    wp_nav_menu( array(
        'theme_location'    => 'social-menu',
        'menu'              => 'social-menu',
        'menu_class'        => 'footer-social',
        'container'         => 'nav',
        'fallback_cb'       => false,
        'link_before'       => '<span class="screen-reader-text">',
        'link_after'        => '</span>'
    ) ); 
?>