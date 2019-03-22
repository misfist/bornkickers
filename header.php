<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container">
    <header class="site-header">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?>

        <nav class="mobile"></nav>

        <nav class="header-nav">
            <?php get_template_part( 'template-parts/navigation/header', 'nav' ); ?>
        </nav>
    </header>

        <?php get_template_part( 'template-parts/navigation/mobile', 'nav' ); ?> 

    <main>