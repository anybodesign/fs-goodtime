<?php if ( !defined('ABSPATH') ) die();
						
// ACF Blocks

add_action('acf/init', 'block_edito_init');
function block_edito_init() {

	if( function_exists('acf_register_block') ) {

		// edito block Text
		
		acf_register_block(array(
			'name'				=> 'block',
			'title'				=> __('Editorial', 'good-time'),
			'description'		=> __('The first block you need on your home page.', 'good-time'),
			'category'			=> 'ad-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M2,20l0,1.2c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-1.2l2,0l0,2.08c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-2.08l2,0Zm-2,-16l0,-2.08c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0c1.06,0 1.92,0.86 1.92,1.92l0,2.08l-2,0l0,-1.2c0,-0.441 -0.358,-0.8 -0.8,-0.8l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,1.2l-2,0Z" style="fill:#555d66;"/><rect x="12" y="15" width="10" height="2" style="fill:#555d66;"/><rect x="0" y="7" width="10" height="10" style="fill:#555d66;"/><rect x="22" y="7" width="2" height="2" style="fill:#555d66;"/><rect x="12" y="11" width="12" height="2" style="fill:#555d66;"/><rect x="12" y="7" width="8" height="1.857" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => false, 'mode' => false, 'multiple' => false),
            'keywords'			=> array( 'editorial', 'edito' ),
            'render_template'   => FS_THEME_DIR . '/blocks/block-edito/templates/block-edito.php',
            'enqueue_assets'	=> function() {
										wp_enqueue_style( 'block-edito', FS_THEME_URL . '/blocks/block-edito/css/block-edito.css' );
										//wp_enqueue_script( 'block-edito', FS_THEME_URL . '/blocks/block-edito/js/block-edito.js', array('jquery'), '', true );
									},
		));
		
	}	
}


// Load ACF fields (PHP)

require_once( FS_THEME_DIR . '/blocks/block-edito/block-edito-fields.php' );