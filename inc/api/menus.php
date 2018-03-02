<?php

function sadat_wp_get_main_menu(){
    $menus  = [];

    foreach ( get_registered_nav_menus() as $slug => $desc ) {
        $obj                = new stdClass;
        $obj->slug          = $slug;
        $obj->description   = $desc;
        $menus[]            = $obj;
    }

    return $menus;
}


function sadat_wp_get_menu_data( $data ){
    // One Method by Menu ID
    //$menus                   = wp_get_nav_menu_object( $data['id'] );

    // Another Method by Menu Location
    $menu_name                 = 'primary';
    $locations                 = get_nav_menu_locations( $data['id'] );
    $menu_id                   = $locations[ $menu_name ] ;
    $menus                     = wp_get_nav_menu_object($menu_id);
    $menu_items                = wp_get_nav_menu_items( $menus->term_id );

    return $menu_items;
}