<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#main-content" class="skip-link">Skip to content</a>

<button id="a11y-trigger" class="a11y-trigger-btn" aria-label="Otwórz ustawienia dostępności" aria-expanded="false" aria-controls="a11y-panel">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 7v8"/><path d="m9 10 3-1 3 1"/><path d="m9 18 3-3 3 3"/></svg>
</button>

<div id="a11y-panel" class="a11y-panel" aria-hidden="true" role="dialog" aria-labelledby="a11y-panel-title">
    <div class="a11y-panel-inner">
        <header class="a11y-panel-header">
            <h2 id="a11y-panel-title">Accessibility Settings</h2>
            <button id="a11y-close" class="a11y-close-btn" aria-label="Close accessibility panel">&times;</button>
        </header>
        
        <div class="a11y-panel-body">
            <div class="a11y-option-item">
                <div class="a11y-option-info">
                    <span class="a11y-option-title">Light Theme</span>
                    <span class="a11y-option-desc">Higher contrast for readable text</span>
                </div>
                <button id="toggle-theme" class="a11y-toggle" aria-pressed="false">On</button>
            </div>

            <div class="a11y-option-item">
                <div class="a11y-option-info">
                    <span class="a11y-option-title">Large Text</span>
                    <span class="a11y-option-desc">Increases overall font sizes</span>
                </div>
                <button id="toggle-font-size" class="a11y-toggle" aria-pressed="false">On</button>
            </div>

            <div class="a11y-option-item">
                <div class="a11y-option-info">
                    <span class="a11y-option-title">Dyslexia Font</span>
                    <span class="a11y-option-desc">Improves readability for articles</span>
                </div>
                <button id="toggle-dyslexia" class="a11y-toggle" aria-pressed="false">On</button>
            </div>
        </div>
    </div>
</div>


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