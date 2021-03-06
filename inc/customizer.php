<?php defined('ABSPATH') or die();
/**
 * Good Time Customizer functionality
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
 
// Customizer JS

add_action( 'customize_preview_init', 'fs_customizer_scripts' );
function fs_customizer_scripts() {
	wp_enqueue_script(
		'fs-customizer',
	    	FS_THEME_URL . '/js/customizer.js',
	    	array( 'customize-preview' ), 
	    	false, 
	    	true
	);
}
 
// Customizer Settings

add_action('customize_register', 'fs_customize_register'); 
function fs_customize_register($fs_customize) {

	// Title and Description

	$fs_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$fs_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $fs_customize->selective_refresh ) ) {
		$fs_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => array('.site-title', '.site-title a'),
			'render_callback' => 'fs_customize_partial_blogname',
		) );
		$fs_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-desc',
			'render_callback' => 'fs_customize_partial_blogdescription',
		) );
	}

		
	// Create Some Custom Sections
	// -
	// + + + + + + + + + + + + + +  
	
	$fs_customize->add_section(
		'fs_options_section',
		array(
			'title'			=> __('Theme Options', 'good-time'),
			'priority'		=> 20,
		)
	);
	$fs_customize->add_section(
		'fs_front_section', 
		array(
			'title' 		=> __('Front Page Options', 'good-time'),
			'priority'		=> 30,
		)
	);
	$fs_customize->add_section(
		'fs_layout_section', 
		array(
			'title' 		=> __('Layout Options', 'good-time'),
			'description' 	=> __('Choose the layout of the site header and main navigation.', 'good-time'),
			'priority'		=> 40,
		)
	);
	$fs_customize->add_section(
		'fs_footer_section',
		array(
			'title'			=> __('Footer Options', 'good-time'),
			'priority'		=> 50,
		)
	);
/*
	$fs_customize->add_section(
		'fs_fonts_section', 
		array(
			'title' 		=> __('Theme Fonts', 'good-time'),
			'description' 	=> __('Choose a font combination for the site.', 'good-time'),
			'priority'		=> 50,
		)
	);
*/


	// Colors
	// -
	// + + + + + + + + + + 
		
		// Color palettes
		
		$fs_customize->add_setting(
			'palette', 
			array(
				'default' 			=> 'violet',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'fs_customizer_sanitize_palette',
			)
		);
		
		$fs_customize->add_control(
			'palette', 
			array(
				'type' 			=> 'radio',
				'label' 		=> __( 'Color Themes', 'good-time' ),
				'description'	=> __('Choose a color theme', 'good-time'),
				'section' 		=> 'colors',
				'choices' 		=> array(
					'violet' 		=> __( 'Violette', 'good-time' ),
					'spring' 		=> __( 'Spring', 'good-time' ),
					'fall' 			=> __( 'Fall', 'good-time' ),
					'summer' 		=> __( 'Summer', 'good-time' ),
					'winter' 		=> __( 'Winter', 'good-time' ),
					'vineyard' 		=> __( 'Vineyard', 'good-time' ),
					'darkpink' 		=> __( 'Dark Pink', 'good-time' ),
					'darkyellow' 	=> __( 'Dark Yellow', 'good-time' ),
				),
			)
		);


	// Site identity
	// -
	// + + + + + + + + + + 

		// Site logo
		
		$fs_customize->add_setting(
			'site_logo', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Image_control(
				$fs_customize, 
				'site_logo', 
				array(
					'label'			=> __('Site Logo', 'good-time'),
					'description'	=> __('Your logo, displayed instead of the website title.', 'good-time'),
					'section'		=> 'title_tagline',
					'settings'		=> 'site_logo',
				)
			)
		);
		
		// Site logo - Mobile
		
		$fs_customize->add_setting(
			'site_logo_mobile', array(
				'sanitize_callback'		=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Image_control(
				$fs_customize, 
				'site_logo_mobile', 
				array(
					'label'			=> __('Site Logo - Mobile', 'good-time'),
					'description'	=> __('Specific version of the logo for mobile devices. If none, the default logo will be used.', 'good-time'),
					'section'		=> 'title_tagline',
					'settings'		=> 'site_logo_mobile',
				)
			)
		);


		// Hide tagline
		
		$fs_customize->add_setting(
			'hide_tagline', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'hide_tagline', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide the website tagline', 'good-time'),
				'section'		=> 'title_tagline',
				'settings'		=> 'hide_tagline',
			)
		);
	

	// Footer Options
	// -
	// + + + + + + + + + + 

		// Footer pictures
		
		$fs_customize->add_setting(
			'footer_picture', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Image_control(
				$fs_customize, 
				'footer_picture', 
				array(
					'label'			=> __('Footer picture', 'good-time'),
					'description'	=> __('A small picture displayed in the first widgets column', 'good-time'),
					'section'		=> 'fs_footer_section',
					'settings'		=> 'footer_picture',
				)
			)
		);
		
		$fs_customize->add_setting(
			'footer_deco', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Image_control(
				$fs_customize, 
				'footer_deco', 
				array(
					'label'			=> __('Footer decoration', 'good-time'),
					'description'	=> __('An optional decoration at the bottom of the first widgets column', 'good-time'),
					'section'		=> 'fs_footer_section',
					'settings'		=> 'footer_deco',
				)
			)
		);
			
		// Footer text
		
		$fs_customize->add_setting(
			'footer_text', 
			array(
				'default'				=> '',
				'transport'				=> 'postMessage',
				'sanitize_callback'		=> 'sanitize_text_field'
			)
		);
		$fs_customize->add_control(
			'footer_text', 
			array(
				'label'			=> __('Custom footer text', 'good-time'),
				'description'	=> __('Add a custom text instead of the year and blog name', 'good-time'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'footer_text',
			)
		);
		
		
		// WP Credits
		
		$fs_customize->add_setting(
			'display_wp', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'display_wp', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display WordPress Link', 'good-time'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'display_wp',
			)
		);


	// Theme Options
	// -
	// + + + + + + + + + + 


		// Home title
		
		$fs_customize->add_setting('welcome_title', array(
			'default'			=> __('Aloha :)', 'good-time'),
			'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field',		
		));
		$fs_customize->add_control('welcome_title', array(
			'label'			=> __('Front page welcome title', 'good-time'),
			'description'	=> __('Add a custom title instead of “Aloha :)”', 'good-time'),
			'section'		=> 'fs_front_section',
			'settings'		=> 'welcome_title',
		));
		
		// Home text
		
		$fs_customize->add_setting('welcome_text', array(
			'default'			=> __('Welcome and have a good time','good-time'),
			'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field',		
		));
		$fs_customize->add_control('welcome_text', array(
			'type'			=> 'textarea',
			'label'			=> __('Front page welcome text', 'good-time'),
			'description'	=> __('Add a custom text instead of “Welcome and have a good time”', 'good-time'),
			'section'		=> 'fs_front_section',
			'settings'		=> 'welcome_text',
		));
		
		// Scroll down

		$fs_customize->add_setting(
			'scrolldown', 
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'scrolldown', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display a Scroll Down button', 'good-time'),
				'section'		=> 'fs_front_section',
				'settings'		=> 'scrolldown',
			)
		);
		
		// Back to top

		$fs_customize->add_setting(
			'back2top', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'back2top', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display a Back to top button', 'good-time'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'back2top',
			)
		);
		
		// Hide Welcome

		$fs_customize->add_setting(
			'hide_welcome', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'hide_welcome', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide welcome text & title', 'good-time'),
				'section'		=> 'fs_front_section',
				'settings'		=> 'hide_welcome',
			)
		);
			
		// Sticky Nav
		
		$fs_customize->add_setting(
			'stickynav', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'stickynav', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Make the header sticky', 'good-time'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'stickynav',
			)
		);


	// Theme Layout
	// -
	// + + + + + + + + + + 

		// Header & Main nav

		$fs_customize->add_setting(
			'layout_option', 
			array(
				'default' 			=> 'version1',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'fs_customizer_sanitize_radio_layout',
			)
		);
		
		$fs_customize->add_control(
			'layout_option', 
			array(
				'type' => 'radio',
				'label' => __( 'Layout version', 'good-time' ),
				'section' => 'fs_layout_section',
				'choices' => array(
					'version1' => __( 'Version 1', 'good-time' ),
					'version2' => __( 'Version 2', 'good-time' ),
					'version3' => __( 'Version 3', 'good-time' ),
				),
			)
		);


	// Theme Pictures
	// -
	// + + + + + + + + + + 

	
		// Default Image
		
		$fs_customize->add_setting(
			'bg_default', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Image_control(
				$fs_customize, 
				'bg_default', 
				array(
					'label'			=> __('Default banner', 'good-time'),
					'description'	=> __('Choose a default banner picture. (2048 x 625 pixels max.)', 'good-time'),
					'section'		=> 'fs_options_section',
					'settings'		=> 'bg_default',
				)
			)
		);
		
		// Blog Image
		
		$fs_customize->add_setting(
			'bg_blog', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Image_control(
				$fs_customize, 
				'bg_blog', 
				array(
					'label'			=> __('Blog', 'good-time'),
					'description'	=> __('Choose a picture for the blog page. (2048 x 625 pixels max.)', 'good-time'),
					'section'		=> 'fs_options_section',
					'settings'		=> 'bg_blog',
				)
			)
		);
		
		// 404 Image
		
		$fs_customize->add_setting(
			'bg_404', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Image_control(
				$fs_customize, 
				'bg_404', 
				array(
					'label'			=> __('404 error', 'good-time'),
					'description'	=> __('Choose a picture for the 404 error page. (2048 x 625 pixels max.)', 'good-time'),
					'section'		=> 'fs_options_section',
					'settings'		=> 'bg_404',
				)
			)
		);	

}


// Callbacks, Sanitize

function fs_customize_partial_blogname() {
	bloginfo( 'name' );
}
function fs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function fs_customizer_sanitize_checkbox( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
}
function fs_customizer_sanitize_radio_layout( $input ) {
    if( !in_array( $input, array( 'version1', 'version2', 'version3' ) ) ) {
        $input = 'version1';
    }
    return $input;
}
function fs_customizer_sanitize_palette( $input ) {
    if( !in_array( $input, array( 'violet', 'spring', 'summer', 'fall', 'winter', 'vineyard', 'darkpink', 'darkyellow'  ) ) ) {
        $input = 'violet';
    }
    return $input;
}