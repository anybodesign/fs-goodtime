<?php defined('ABSPATH') or die();
/**
 * Good Time Customizer functionality
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
 
 
 // Customizer Settings
 
function fs_customize_register($wp_customize) {
	 

	// Create Some Sections
	// -
	// + + + + + + + + + + 
	
	$wp_customize->add_section(
		'fs_footer_section',
		array(
			'title'			=> __('Footer Options', 'good-time'),
			'priority'		=> 50,
		)
	);
	$wp_customize->add_section(
		'fs_options_section',
		array(
			'title'			=> __('Theme Options', 'good-time'),
			'priority'		=> 50,
		)
	);
	$wp_customize->add_section(
		'fs_layout_section', 
		array(
			'title' 		=> __('Layout Options', 'good-time'),
			'description' 	=> __('Choose the layout of the site header and main navigation.', 'good-time'),
			'priority'		=> 50,
		)
	);
	$wp_customize->add_section(
		'fs_fonts_section', 
		array(
			'title' 		=> __('Theme Fonts', 'good-time'),
			'description' 	=> __('Choose a font combination for the site.', 'good-time'),
			'priority'		=> 50,
		)
	);
	$wp_customize->add_section(
		'fs_pictures_section', 
		array(
			'title' 		=> __('Theme Pictures', 'good-time'),
			'description' 	=> __('Select default banner pictures.', 'good-time'),
			'priority'		=> 50,
		)
	);


	// Colors
	// -
	// + + + + + + + + + + 
		
		// Primary color
		
		$wp_customize->add_setting(
			'primary_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_control(
				$wp_customize, 
				'primary_color', 
				array(
					'label'		=> __('Primary color', 'good-time'),
					'section'	=> 'colors',
					'settings'	=> 'primary_color',
				)
			)
		);
				
		// Secondary color
		
		$wp_customize->add_setting(
			'secondary_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Color_control(
				$wp_customize, 
				'secondary_color', 
				array(
					'label'		=> __('Secondary color', 'good-time'),
					'section'	=> 'colors',
					'settings'	=> 'secondary_color',
				)
			)
		);
				
		// Buttons Contrast
		
		$wp_customize->add_setting(
			'btn_contrast', 
			array(
				'default' => 'white',
				'sanitize_callback' => 'fs_customizer_sanitize_btn_contrast',
			)
		);
		
		$wp_customize->add_control(
			'btn_contrast', 
			array(
				'type' => 'radio',
				'label' => __( 'Buttons contrast setting', 'good-time' ),
				'description' => __('Select the desired color for plain/hovered buttons.', 'good-time'),
				'section' => 'colors',
				'choices' => array(
					'white' => __( 'White text', 'good-time' ),
					'dark' => __( 'Dark text', 'good-time' ),
					'white-dark' => __( 'White + Dark', 'good-time' ),
					'dark-white' => __( 'Dark + White', 'good-time' ),
				),
			)
		);




	// Site identity
	// -
	// + + + + + + + + + + 

		// Site logo
		
		$wp_customize->add_setting(
			'site_logo', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_control(
				$wp_customize, 
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
		
		$wp_customize->add_setting(
			'site_logo_mobile', array(
				'sanitize_callback'		=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_control(
				$wp_customize, 
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
		
		$wp_customize->add_setting(
			'hide_tagline', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
			'hide_tagline', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide the website tagline', 'good-time'),
				'section'		=> 'title_tagline',
				'settings'		=> 'hide_tagline',
			)
		);
	

	// Site identity
	// -
	// + + + + + + + + + + 

		// Footer pictures
		
		$wp_customize->add_setting(
			'footer_picture', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_control(
				$wp_customize, 
				'footer_picture', 
				array(
					'label'			=> __('Footer picture', 'good-time'),
					'description'	=> __('A small picture displayed in the first widgets column', 'good-time'),
					'section'		=> 'fs_footer_section',
					'settings'		=> 'footer_picture',
				)
			)
		);
		
		$wp_customize->add_setting(
			'footer_deco', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_control(
				$wp_customize, 
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
		
		$wp_customize->add_setting(
			'footer_text_color', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
			'footer_text_color', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Dark colored footer text', 'good-time'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'footer_text_color',
			)
		);		
		
		$wp_customize->add_setting(
			'footer_text', 
			array(
				'default'				=> '',
				'sanitize_callback'		=> 'sanitize_text_field'
			)
		);
		$wp_customize->add_control(
			'footer_text', 
			array(
				'label'			=> __('Custom footer text', 'good-time'),
				'description'	=> __('Add a custom text instead of the year and blog name', 'good-time'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'footer_text',
			)
		);
		
		
		// WP Credits
		
		$wp_customize->add_setting(
			'display_wp', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
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
		
		// Back to top
	
		$wp_customize->add_setting(
			'back2top', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
			'back2top', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display a Back to top button', 'good-time'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'back2top',
			)
		);
			
		// Sticky Nav
		
		$wp_customize->add_setting(
			'stickynav', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
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

		$wp_customize->add_setting(
			'layout_option', 
			array(
				'default' => 'version1',
				'sanitize_callback' => 'fs_customizer_sanitize_radio_layout',
			)
		);
		
		$wp_customize->add_control(
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

	
		// 404 Image
		
		$wp_customize->add_setting(
			'bg_404', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_control(
				$wp_customize, 
				'bg_404', 
				array(
					'label'			=> __('404 error', 'good-time'),
					'description'	=> __('Choose a picture for the 404 error page. (2048 x 625 pixels max.)', 'good-time'),
					'section'		=> 'fs_pictures_section',
					'settings'		=> 'bg_404',
				)
			)
		);	

}
add_action('customize_register', 'fs_customize_register');


// Sanitize

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
function fs_customizer_sanitize_btn_contrast( $input ) {
    if( !in_array( $input, array( 'white', 'dark', 'white-dark', 'dark-white' ) ) ) {
        $input = 'white';
    }
    return $input;
}


// Customizer Colors Output

function fs_colors() {
	?>
	<style>
		.something { 
			background-color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
		
		.something { 
			color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
		
		.something {
			background-color: <?php echo get_theme_mod('secondary_color', '#606060'); ?>
		}
		.something {
			color: <?php echo get_theme_mod('secondary_color', '#606060'); ?>
		}
	</style>
	<?php
}
add_action('wp_head','fs_colors');
