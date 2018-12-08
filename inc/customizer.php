<?php
/**
 * saintsrobotics Theme Customizer
 *
 * @package saintsrobotics
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function featured_image_gallery_customize_register( $wp_customize ) {
 
    if ( ! class_exists( 'CustomizeImageGalleryControl\Control' ) ) {
        return;
    }
    // featured gallery
	 $wp_customize->add_setting( 'featured_image_gallery', array(
        'default' => array(),
        'sanitize_callback' => 'wp_parse_id_list',
    ) );
    $wp_customize->add_control( new CustomizeImageGalleryControl\Control(
        $wp_customize,
        'featured_image_gallery',
        array(
            'label'    => __( 'Image Gallery Field Label' ),
            'section'  => 'front_settings_section',
            'settings' => 'featured_image_gallery',
            'type'     => 'image_gallery',
        )
    ) );
}
	add_action( 'customize_register', 'featured_image_gallery_customize_register' );


function saintsrobotics_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'saintsrobotics_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'saintsrobotics_customize_partial_blogdescription',
	) );
	
	//addingsection in wordpress customizer
	$wp_customize->add_section('front_settings_section', array(
	 'title'          => 'Manage Front Page',
	 'priority'   => 25,
	));
	
	


	//adding social links
	$wp_customize->add_setting('facebook_link', array(
	'default'        => '',
	));

	$wp_customize->add_control('facebook_link', array(
	'label'   => 'facebook link',
	 'section' => 'front_settings_section',
	'type'    => 'text',
	'description' => __( 'remember to add https:// in front of links' ),
	  
	));
	$wp_customize->add_setting('instagram_link', array(
	'default'        => '',
	));

	$wp_customize->add_control('instagram_link', array(
	'label'   => 'instagram link',
	 'section' => 'front_settings_section',
	'type'    => 'text',
	));
	$wp_customize->add_setting('youtube_link', array(
	'default'        => '',
	));

	$wp_customize->add_control('youtube_link', array(
	'label'   => 'youtube link',
	 'section' => 'front_settings_section',
	'type'    => 'text',
	));
	
	//messagebar
	$wp_customize->add_setting( 'landing_message_style', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saintsrobotics_sanitize_select',
	  'default' => 'none',
	) );

	$wp_customize->add_control( 'landing_message_style', array(
	  'type' => 'select',
	  'section' => 'front_settings_section', // Add a default or your own section
	  'label' => __( 'Messege Type (color)' ),
	  'description' => __( 'add a message to the front page' ),
	  'choices' => array(
			'none' => __( 'No Message' ),
	    'success' => __( 'Success' ),
	    'error' => __( 'Error' ),
	    'warning' => __( 'Warning' ),
			'info' => __( 'Info' ),

	  ),
	) );
	//adding text for messges
	$wp_customize->add_setting('landing_message', array(
	'default'        => '',
	));

	$wp_customize->add_control('landing_message', array(
	'label'   => 'Message alert content ',
	 'section' => 'front_settings_section',
	'type'    => 'textarea',
	));
	
	function saintsrobotics_sanitize_select( $input, $setting ) {

	  // Ensure input is a slug.
	  $input = sanitize_key( $input );

	  // Get list of choices from the control associated with the setting.
	  $choices = $setting->manager->get_control( $setting->id )->choices;

	  // If the input is a valid key, return it; otherwise, return the default.
	  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	};
	


}
add_action( 'customize_register', 'saintsrobotics_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function saintsrobotics_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function saintsrobotics_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function saintsrobotics_customize_preview_js() {
	wp_enqueue_script( 'saintsrobotics-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'saintsrobotics_customize_preview_js' );
