<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#main-content" class="skip-link sr-only">Skip to content</a>
<header class="site-header">
    <div class="header-container">
        <div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title">
                DevPortfolio
            </a>
        </div>

        <button class="menu-toggle" aria-label="Otwórz menu" aria-expanded="false">
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
        </button>

        <nav class="site-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'primary-menu-list',
                'fallback_cb'    => false, 
            ) );
            ?>
        </nav>
    </div>
</header>