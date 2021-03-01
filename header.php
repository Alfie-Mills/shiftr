<?php

    global $shiftr;

?>


<!DOCTYPE html>

<html <?php language_attributes(); ?>>
    
    <head>
        <?php shiftr_head_open(); ?>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="<?php $shiftr->the( 'primary_color' ); ?>"> 
        
        <link rel="icon" type="image/png" href="<?php shiftr_get_asset_url( 'sr@32.png', '_shiftr' ); ?>" sizes="32x32">
        <link rel="apple-touch-icon" href="<?php shiftr_get_asset_url( 'sr@128.png', '_shiftr' ); ?>" />
        <script>document.documentElement.classList.add('js');</script>

        <?php wp_head(); ?>
    </head>
    
    <body <?php shiftr_body_class(); ?>>
        <?php wp_body_open(); ?>

        <div class="header-wrapper">
            <header class="site-header">
                <div class="container">

                    <a href="<?php echo home_url(); ?>" class="site-logo" aria-label="<?php echo bloginfo( 'name' ); ?> home">
                        <?php shiftr_inline_svg( 'shiftr-full', '/assets/_shiftr/' ); ?>
                    </a>

                    <?php shiftr_nav_primary(); ?>
    
                    <button id="mobile-menu-trigger">
                        <svg width="18" height="16" viewBox="0 0 18 16">
                            <title>Open mobile navigation</title>
                            <g fill="#000">
                                <rect width="18" height="1" y="3" />
                                <rect width="18" height="1" y="12" />
                            </g>
                        </svg>
                    </button>
                </div>
            </header>

            <div class="mobile-menu">
                <button id="mobile-menu-close" aria-label="Close menu">
                    <svg width="18" height="15" viewBox="0 0 18 15">
                        <title>Close mobile navigation</title>
                        <g fill="#000">
                            <rect width="18" height="1" y="7" transform="rotate(45,9,8)" />
                            <rect width="18" height="1" y="7" transform="rotate(-45,9,8)" />
                        </g>
                    </svg>
                </button>
                <?php shiftr_nav_primary_mobile(); ?>
            </div>
            <div class="mobile-menu-overlay"></div>
        </div>