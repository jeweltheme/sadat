<?php
/**
 * Sadat WP Theme Customizer
 *
 * @package Sadat_WP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sadat_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'sadat_wp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'sadat_wp_customize_partial_blogdescription',
		) );
	}


	//Footer Settings
	$wp_customize->add_section( 'footer_section' , array(
	    	'title'      => esc_html__( 'Footer Settings', 'sadat_wp' ),
	    	'priority'   => 30,
		) );

	//Footer Logo
	$wp_customize->add_setting('footer_logo', array(
        'transport'         => 'refresh',
        'height'         => 10,
        'width'         => 50,
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_two_control', array(
        'label'             => __('Footer Logo', 'sadat_wp'),
        'section'           => 'footer_section',
        'settings'          => 'footer_logo',
    )));

    //Copyright Section
	$wp_customize->add_setting( 'footer_copyright', array(
		'default'  => '© <a href="https://wp.jeweltheme.com/sadat">Sadat</a> 2018 | Develpoed With Love by <a href="https://jeweltheme.com" rel="nofollow">Jewel Theme</a>'
	));
	$wp_customize->add_setting( 'footer_url',array('sanitize_callback'	=> 'esc_url_raw'));

	$wp_customize->add_control(	'footer_copyright',
			array(
				'label'    => esc_html__( 'Copyright Text', 'sadat_wp' ),
				'description' => esc_html__( 'Copyright Text and Credits', 'sadat_wp' ),
				'section'  => 'footer_section',
				'settings' => 'footer_copyright',
				'type'     => 'textarea'
			)
		);


    //Social Icons
 //    $wp_customize->add_section( 'social_section' , array(
 //    	'title'      => esc_html__( 'Social Settings', 'sadat_wp' ),
 //    	'priority'   => 30,
	// ) );

	$wp_customize->add_setting( 'twitter',array(
		'default'  => 'https://twitter.com/jwthemeltd',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_setting( 'instagram',array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'  => '#'
	));
	$wp_customize->add_setting( 'pinterest',array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'  => '#'
	));
	$wp_customize->add_setting( 'facebook',array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'  => 'https://www.facebook.com/jwthemeltd/'
	));


    $wp_customize->add_control(	'twitter',
		array(
			'label'    => esc_html__( 'Twitter Username', 'sadat_wp' ),
			'section'  => 'footer_section',
			'settings' => 'twitter',
			'type'     => 'text'
		)
	);

	$wp_customize->add_control(	'instagram',
		array(
			'label'    => esc_html__( 'Instagram Username', 'sadat_wp' ),
			'section'  => 'footer_section',
			'settings' => 'instagram',
			'type'     => 'text'
		)
	);

	$wp_customize->add_control(	'facebook',
		array(
			'label'    => esc_html__( 'Facebook Username', 'sadat_wp' ),
			'section'  => 'footer_section',
			'settings' => 'facebook',
			'type'     => 'text'
		)
	);

	$wp_customize->add_control(	'pinterest',
		array(
			'label'    => esc_html__( 'Pinterest Username', 'sadat_wp' ),
			'section'  => 'footer_section',
			'settings' => 'pinterest',
			'type'     => 'text'
		)
	);


}
add_action( 'customize_register', 'sadat_wp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sadat_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sadat_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sadat_wp_customize_preview_js() {
	wp_enqueue_script( 'sadat_wp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sadat_wp_customize_preview_js' );
