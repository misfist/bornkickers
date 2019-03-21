<?php
/**
 * Terms Menu
 */
?>

<?php
    wp_nav_menu( array(
        'theme_location'    => 'terms-menu',
        'menu'              => 'terms-menu',
        'menu_class'        => 'terms-menu',
        'container'         => '',
        'fallback_cb'       => false,
    ) ); 
?>