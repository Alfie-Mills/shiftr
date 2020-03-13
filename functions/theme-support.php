<?php

    /*  ////  --|    Theme Support

    */


/**  
 *  shiftr_theme_support
 *
 *  The fundamental theme support 
 *
 *  @since 1.0
 */

function shiftr_theme_support() {

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'is_woocommerce' ) ) {
        add_theme_support( 'woocommerce' );
    }
}

add_action( 'after_setup_theme', 'shiftr_theme_support' );


/**  
 *  shiftr_filter_the_content
 *
 *  Filter and remove <p> tags surrounding images in content
 *
 *  @since 1.0
 */

function shiftr_filter_the_content( $content ) {

    // Remove <p> tags wrapped around <img>
    $content = preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );

    // Add Shiftr Lazy Loader
    $regex = array(
        'patterns' => array(
            '/<img([^>]*)\sclass="([^"]*)"\s([^>]*)\s?>/',
            '/<img([^>]*)\ssrc="([^"]*)"\s([^>]*)\s?>/',
            '/<img([^>]*)\ssrcset="([^"]*)"\s([^>]*)\s?>/'
        ),
        'replacements' => array(
            '<img \1 class="lazy \2" \3>',
            '<img \1 data-src="\2" \3>',
            '<img \1 data-srcset="\2" \3>'
        )
    );

    $content = preg_replace( $regex['patterns'], $regex['replacements'], $content );

    // Remove p tag surrounding anchor buttons
    $content = preg_replace( '/<p\s?(?:style)?[=]?[\"]?([^\">]*)[\"]?>\s*(<a\sclass="[^"]*(?:button\-)[^"]*".*>[a-zA-z0-9\-_&!\?£%\(\)>\s]*<\/a>)\s*<\/p>/', '<div class="content-button-wrapper" data-style="\1">\2</div>', $content );

    return $content;
}

add_filter( 'the_content', 'shiftr_filter_the_content' );
add_filter( 'acf_the_content', 'shiftr_filter_the_content' );


// Remove [...] from end of returned excerpt
add_filter( 'excerpt_more', '__return_empty_string' );


/**  
 *  shiftr_fonts
 *
 *  Output the font associated link tags
 *
 *  @since 1.0
 */

function shiftr_fonts() {

    global $shiftr;

    $preconnect_attr = array(
        'rel' => 'preconnect',
        'href' => $shiftr->font_host
    );
    echo '<link ' . shiftr_output_attr( $preconnect_attr ) . '>';

    $stylesheet_attr = array(
        'rel' => 'stylesheet',
        'href' => $shiftr->font_url
    );
    echo '<link ' . shiftr_output_attr( $stylesheet_attr ) . '>';
}

add_action( 'wp_head', 'shiftr_fonts', 1 );

