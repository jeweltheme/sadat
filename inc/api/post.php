<?php
function sadat_wp_get_additional_post_data( $arr, $field_name, $request ){
    $user_id            = absint( $arr['author'] );
    $array_data         = [];

    // Category
    //$array_data['post_category']        = wp_kses_post( get_the_category_list( esc_html__( ', ', 'sadat_wp' ) ) );
    //$array_data['post_category']        = get_cat_name( $arr['id'] );

    // Author Data
    $array_data['user_avatar']        = get_avatar_url( $user_id, 100 );
    $array_data['user_nicename']        = get_the_author_meta( 'user_nicename', $user_id );
    $array_data['user_description']     = get_the_author_meta( 'user_description', $user_id );
    $array_data['facebook_profile']     = get_the_author_meta( 'facebook_profile', $user_id );
    $array_data['twitter_profile']      = get_the_author_meta( 'twitter_profile', $user_id );
    $array_data['google_profile']       = get_the_author_meta( 'google_profile', $user_id );
    $array_data['pinterest_profile']    = get_the_author_meta( 'pinterest_profile', $user_id );
    $array_data['instagram_profile']    = get_the_author_meta( 'instagram_profile', $user_id );

    // Featured Image
    $array_data['thumbnail']            = get_the_post_thumbnail_url( $arr['id'], 'full' );

    // Post Permalink
    $array_data['post_permalink']       = get_permalink( $arr['id'] );

    $array_data['next_post']         = get_adjacent_post( false, '', true );

    return $array_data;
}




function sadat_wp_next_previous_post( $data, $post, $request ) {

    $_data = $data->data;


    //Thumbnails
    $thumbnail_id       = get_post_thumbnail_id( $post->ID );
    $thumbnail300x240   = wp_get_attachment_image_src ( $thumbnail_id, 'sadat-wp-home-thumb' );
    $thumbnailMedium    = wp_get_attachment_image_src ( $thumbnail_id, 'medium' );
    $full               = wp_get_attachment_image_src ( $thumbnail_id, 'full' );

   // Next and Previous Post
    // $nextPost = get_adjacent_post( false, '', true );
    // $nextPost = $nextPost->ID;
    // $previousPost = get_adjacent_post( false, '', false );
    // $previousPost = $previousPost->ID;

    // Categories
    $cats = get_the_category( $post->ID );

    $_data['sadat_sadat_wp_home_thumb']     = $thumbnail300x240[0];
    $_data['sadat_medium']                  = $thumbnailMedium[0];
    $_data['sadat_full']                    = $full[0];
    $_data['cats']                          = $cats;
    // $_data['next_post']         = $nextPost;
    // $_data['prev_post']         = $previousPost;
    $data->data                             = $_data;

    return $data;
}