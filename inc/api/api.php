<?php
function sadat_wp_rest_api_init(){

    register_rest_field(
        'post',
        'sadat_wp_meta', [
            'get_callback'          => 'sadat_wp_get_additional_post_data',
            'update_callback'       => null,
            'schema'                => null
    ]);

    register_rest_route(
        'sadat_wp/v1',
        'menus',
        [
            'methods'              => 'GET',
            'callback'             => 'sadat_wp_get_main_menu'
        ]
    );

    register_rest_route(
        'sadat_wp/v1',
        'menus/(?P<id>[a-zA-Z(-]+)',
        [
            'methods'              => 'GET',
            'callback'             => 'sadat_wp_get_menu_data'
        ]
    );

   // register_rest_route(
   //      'users',
   //      '/me',
   //      [
   //          'methods' => 'GET',
   //          'callback' => function(WP_REST_Request $request) {
   //              return wp_get_current_user();
   //          }
   //      ]
   //  );


}
