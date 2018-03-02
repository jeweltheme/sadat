<?php

// Google Fonts
function sadat_wp_google_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'videostories' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Lato:400,700|Poppins:400,700|Raleway' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


/**
 * Enqueue scripts and styles.
 */

function sadat_wp_scripts() {

    //CSS
    wp_enqueue_style( 'sadat_wp-style', get_stylesheet_uri() );
    wp_enqueue_style( 'font-awesome', SADAT_CSS . 'font-awesome.min.css' );
    wp_enqueue_style( 'elegent-icons', SADAT_CSS . 'elegent-icons.css' );
    wp_enqueue_style( 'bootstrap', SADAT_CSS . 'bootstrap.min.css' );
    wp_enqueue_style( 'owl-carousel', SADAT_CSS . 'owl.carousel.css' );
    wp_enqueue_style( 'sadat_wp-style-css', SADAT_CSS . 'style.css' );
    wp_enqueue_style( 'sadat_wp-header', SADAT_CSS . 'header.css' );
    wp_enqueue_style( 'sadat_wp-themes', SADAT_CSS . 'themes.css' );
    wp_enqueue_style( 'sadat_wp-responsive', SADAT_CSS . 'responsive.css' );
    wp_enqueue_style( 'sadat_wp-google-fonts', sadat_wp_google_fonts_url());


    //JS
    //wp_enqueue_script( 'sadat_wp-app', SADAT_THME_URI . '/dist/build.js', array(), '', true );
    //wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', SADAT_JS . 'bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'owl-carousel', SADAT_JS . 'owl.carousel.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'isotope', SADAT_JS . 'isotope.min.js', array('jquery'), '', true );
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script( 'match-height', SADAT_JS . 'match-height.js', array('jquery'), '', true );
    wp_enqueue_script( 'sadat-wp-main', SADAT_JS . 'main.js', array('jquery'), '', true );
    wp_enqueue_script( 'moments', SADAT_JS . 'moments.js', array('jquery'), false, true );
    wp_enqueue_script( 'sadat-wp-app-build', SADAT_PATH . '/app/dist/build.js', array('jquery'), '', true );

    $home_url = esc_url_raw( home_url() );
    $actual_base_link = rtrim( parse_url( $home_url, PHP_URL_PATH ), '/' );

    wp_localize_script('sadat-wp-app-build', 'wp_rest_api', [
        'base_url'          => rest_url('/wp/v2/'),
        'sadat_url'         => rest_url('/sadat_wp/v1/'),
        'site_name'         => get_bloginfo('name'),
        'image_url'           => SADAT_PATH,
        'user_logged_in'    => is_user_logged_in(),
        //'actual_link'       => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
        'actual_link'       => $actual_base_link ? $actual_base_link . '/' : '/',
        'nonce'             => wp_create_nonce( 'wp_rest' ),

        'custom_logo'       => wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' ),
        'footer_copyright'  => get_theme_mod('footer_copyright'),
        'twitter'           => get_theme_mod('twitter'),
        'instagram'         => get_theme_mod('instagram'),
        'pinterest'         => get_theme_mod('pinterest'),
        'facebook'          => get_theme_mod('facebook'),
        'footer_logo'       => get_theme_mod('footer_logo'),
    ]);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
