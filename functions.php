<?php
/**
 * Sadat WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sadat_WP
 */

// Define Constants
define( 'SADAT', wp_get_theme()->get( 'Name' ));
define( 'SADAT_VER', wp_get_theme()->get( 'Version' ));
define( 'SADAT_CSS', get_template_directory_uri().'/assets/css/');
define( 'SADAT_JS', get_template_directory_uri().'/assets/js/');
define( 'SADAT_PATH', get_template_directory_uri());
define( 'SADAT_THME_URI', get_template_directory());
define( 'AJAX_URL', esc_url_raw( admin_url('admin-ajax.php')));

// Include Files
require SADAT_THME_URI . '/inc/enqueue-scripts.php';
require SADAT_THME_URI . '/inc/custom-header.php';
require SADAT_THME_URI . '/inc/template-tags.php';
require SADAT_THME_URI . '/inc/template-functions.php';
require SADAT_THME_URI . '/inc/customizer.php';
require SADAT_THME_URI . '/inc/api/api.php';
require SADAT_THME_URI . '/inc/api/post.php';
require SADAT_THME_URI . '/inc/api/menus.php';
if ( defined( 'JETPACK__VERSION' ) ) { require SADAT_THME_URI . '/inc/jetpack.php'; }


// Hooks
add_action( 'after_setup_theme', 'sadat_wp_setup' );
add_action( 'wp_enqueue_scripts', 'sadat_wp_scripts' );
add_action('rest_api_init', 'sadat_wp_rest_api_init');
add_filter( 'user_contactmethods', 'sadat_wp_add_to_author_profile', 10, 1);
add_filter( 'rest_prepare_post', 'sadat_wp_next_previous_post', 10, 3 );
add_action( 'widgets_init', 'sadat_wp_widgets_init' );
add_action( 'after_setup_theme', 'sadat_wp_content_width', 0 );
add_filter( 'excerpt_length', 'sadat_wp_excerpt_length', 999 );
add_filter( 'excerpt_more', '__return_false' );
