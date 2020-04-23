<?php if ( !defined('ABSPATH') ) die();
	
define( 'FS_THEME_VERSION', '1.2' );
define( 'FS_THEME_DIR', get_template_directory() );
define( 'FS_THEME_URL', get_template_directory_uri() );

// Colors 

if ( get_theme_mod('palette') == 'winter' ) { 
	$primary = '#116395';
	$secondary = '#FFD910';
	$alpha1 = '#E7EFF4';
	$alpha2 = '#E7FFFA';
}
else if ( get_theme_mod('palette') == 'spring' ) { 
	$primary = '#308619';
	$secondary = '#FFD910';
	$alpha1 = '#EAF2E8';
	$alpha2 = '#FFFBE7';
} 
else if ( get_theme_mod('palette') == 'fall' ) { 
	$primary = '#6F4616';
	$secondary = '#FFAA00';
	$alpha1 = '#F0ECE7';
	$alpha2 = '#FFF6E5';
}
else if ( get_theme_mod('palette') == 'summer' ) { 
	$primary = '#D50000';
	$secondary = '#FFAA00';
	$alpha1 = '#FAE5E5';
	$alpha2 = '#FFF6E5';
}
else if ( get_theme_mod('palette') == 'vineyard' ) { 
	$primary = '#A6113B';
	$secondary = '#BBEE01';
	$alpha1 = '#FAE5EB';
	$alpha2 = '#F8FDE5';
}
else if ( get_theme_mod('palette') == 'darkpink' ) { 
	$primary = '#283046';
	$secondary = '#FF4D73';
	$alpha1 = '#E9EAEC';
	$alpha2 = '#FFEDF1';
}
else if ( get_theme_mod('palette') == 'darkyellow' ) { 
	$primary = '#283046';
	$secondary = '#FF0';
	$alpha1 = '#E9EAEC';
	$alpha2 = '#FFFFE5';
}
else {
	
	// Default 
	
	$primary = '#412F85';
	$secondary = '#FFD910';
	$alpha1 = '#ECEAF2';
	$alpha2 = '#FFFBE7';
}	
	

// ------------------------
// Theme Setup
// ------------------------

if ( ! isset( $content_width ) )
	$content_width = 2048;


if ( ! function_exists( 'fs_setup' ) ) :

function fs_setup() {
	
	global $primary;
	global $secondary;
	global $alpha1;
	global $alpha2;
	
	// I18n
	
	load_theme_textdomain( 'good-time', FS_THEME_DIR . '/languages' );
	
	// Theme Support
	
	add_editor_style( array('css/editor-style.css') );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_theme_support( 'customize-selective-refresh-widgets' );
	
/*
	// https://codex.wordpress.org/Theme_Logo

	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	));	
	
	// https://codex.wordpress.org/Custom_Backgrounds
	
	add_theme_support( 'custom-background', array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'left',
	    'default-position-y'     => 'top',
	    'default-size'           => 'auto',
		'default-attachment'     => 'scroll',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	));
	
	// https://codex.wordpress.org/Custom_Headers
	
	add_theme_support( 'custom-header', array(
		'default-image'          => get_template_directory_uri() . '/img/header.jpg',
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => true,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	));
*/


	// Gutenberg support 
	
	add_theme_support( 'align-wide' );
	
	add_theme_support( 'editor-color-palette', array(
	    
	    // Raw colors 
	    
	    array(
	        'name' => esc_html__( 'Black', 'good-time' ),
	        'slug' => 'black',
	        'color' => '#23252B',
	    ),
	    array(
	        'name' => esc_html__( 'White', 'good-time' ),
	        'slug' => 'white',
	        'color' => '#ffffff',
	    ),

	    // Custom colors
	    
	    array(
	        'name' => esc_html__( 'Primary color', 'good-time' ),
	        'slug' => 'primary-color',
	        'color' => $primary,
	    ),
	    array(
	        'name' => esc_html__( 'Secondary color', 'good-time' ),
	        'slug' => 'secondary-color',
	        'color' => $secondary,
	    ),
	    array(
	        'name' => esc_html__( 'Alpha color 1', 'good-time' ),
	        'slug' => 'alpha-color-1',
	        'color' => $alpha1,
	    ),
	    array(
	        'name' => esc_html__( 'Alpha color 2', 'good-time' ),
	        'slug' => 'alpha-color-2',
	        'color' => $alpha2,
	    ),
 	    
	));	
	
	add_theme_support( 'disable-custom-colors' );

	add_theme_support( 'editor-font-sizes', array(
	     array(
	        'name' => __( 'Regular', 'good-time' ),
	        'shortName' => __( 'M', 'good-time' ),
	        'size' => 18,
	        'slug' => 'regular'
	    ),
	    array(
	        'name' => __( 'Large', 'good-time' ),
	        'shortName' => __( 'L', 'good-time' ),
	        'size' => 22,
	        'slug' => 'large'
	    ),
		array(
	        'name' => __( 'Small', 'good-time' ),
	        'shortName' => __( 'S', 'good-time' ),
	        'size' => 14,
	        'slug' => 'small'
	    ),	    
	));
	
	add_theme_support( 'disable-custom-font-sizes' );
	
	add_theme_support( 'responsive-embeds' );

}
endif;
add_action( 'after_setup_theme', 'fs_setup' );


// Gutenberg editor styles

function fs_block_editor_styles() {
    wp_enqueue_style( 
    	'fs_block_editor_styles',
    	FS_THEME_URL .'/css/block-editor-style.css', 
    	false, 
    	'1.0', 
    	'screen'
    );
}
add_action( 'enqueue_block_editor_assets', 'fs_block_editor_styles' );


//	Admin style and script

add_action('admin_print_styles', 'fs_acf_admin_css', 11 );
function fs_acf_admin_css() {
	wp_enqueue_style( 'admin-css', FS_THEME_URL . '/css/admin.css' );
}


// ------------------------
// Enqueue JS & CSS
// ------------------------

function fs_scripts_load() {
    if (!is_admin()) {

		// JS 
		
			// jQuery 
					
			wp_deregister_script( 'jquery' );
	
			wp_enqueue_script(
				'jquery', 
				FS_THEME_URL . '/js/jquery-3.4.1.min.js', 
				array(), 
				'3.4.1', 
				true
			);

			// Back 2 top
			
			if ( get_theme_mod('back2top') == true ) {
				
				wp_enqueue_script(
					'back2top', 
					FS_THEME_URL . '/js/back2top.js', 
					array(), 
					false, 
					true
				);
			}
			
			// Sticky Nav
			
			if ( get_theme_mod('stickynav') == true ) {
				
				wp_enqueue_script(
					'stickynav', 
					FS_THEME_URL . '/js/sticky-header.js', 
					array(), 
					false, 
					true
				);
			}
						
			// Other stuff
			
			wp_enqueue_script(
				'focus-visible', 
				FS_THEME_URL . '/js/focus-visible.js', 
				array(), 
				false, 
				true
			);
			
			wp_enqueue_script(
				'good-time-skip-link-focus-fix', 
				FS_THEME_URL . '/js/skip-link-focus-fix.js', 
				array(), 
				false, 
				true
			);
			
			// Main
			
		    wp_enqueue_script( 
			    	'main', 
			    	FS_THEME_URL . '/js/main.js',
			    	array('jquery'), 
			    	'1.0', 
			    	true
		    );
		    
		    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Scroll-Out
			
			wp_enqueue_script(
				'scrollout', 
				FS_THEME_URL . '/js/scroll-out.min.js', 
				array(), 
				'2.2.3', 
				true
			);
		
			function fs_scrollout_js() {
				print '
				<script>
					ScrollOut();
				</script>
				';
			}
			add_action('wp_footer', 'fs_scrollout_js', 100);
			
		
		// CSS

			// Back to top
	
			if ( get_theme_mod('back2top') == true ) {
	
				wp_enqueue_style( 
					'back2top', 
					FS_THEME_URL . '/css/back2top.css',
					array(), 
					false, 
					'screen' 
				);
			}
			
			
			// Main stylesheet
			
			wp_enqueue_style( 'good-time-style', get_stylesheet_uri(), array(), FS_THEME_VERSION, 'screen' );

	}
}    
add_action( 'wp_enqueue_scripts', 'fs_scripts_load' );


// ------------------------
// Theme Stuff
// ------------------------


// Customizer

require FS_THEME_DIR . '/inc/customizer.php';


// Register Navigation Menus

function fs_custom_nav_menus() {

	$locations = array(
		'main_menu' =>  esc_html__( 'Main Menu', 'good-time' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'good-time' ),
		'social_menu' => esc_html__( 'Social Menu', 'good-time' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'fs_custom_nav_menus' );


// Nav tag for widget menus

function fs_modify_nav_menu_args( $args ) {

	if( empty ( $args['theme_location'] ) ) {
		$args['container'] = 'nav';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'fs_modify_nav_menu_args' );


// Sub-menus Walker

include_once( FS_THEME_DIR . '/inc/subnav-walker.php' );


// Extended Search

include_once( FS_THEME_DIR . '/inc/fs-extended-search.php' );


// Archives titles

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

        $title = single_cat_title( '', false );

    } elseif ( is_tag() ) {

        $title = single_tag_title( '', false );

    } elseif ( is_post_type_archive() ) {

        $title = post_type_archive_title( '', false );
    
    } elseif ( is_tax() ) {

        $title = single_term_title( '', false );
    } 

    return $title;

});


// Excerpts lenght

function fs_custom_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'fs_custom_excerpt_length', 999 );


// Excerpt link

function fs_excerpt_more( $more ) {
    return sprintf( '… <a class="read-more-btn" href="%1$s" rel="nofollow">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'good-time' )
    );
}
add_filter( 'excerpt_more', 'fs_excerpt_more' );


// Image Sizes

add_image_size( 'thumbnail-hd', 320, 320, true );
add_image_size( 'medium-hd', 640, 640, false );
add_image_size( 'large-hd', 2048, 2048, false );
add_image_size( 'screen-mid', 720, 450, true );
add_image_size( 'screen-hd', 1440, 900, true );
add_image_size( 'video-mid', 960, 540, true );
add_image_size( 'video-hd', 1920, 1080, true );

function fs_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'thumbnail-hd'	=> __( 'Thumbnail x2', 'good-time' ),
        'medium-hd'		=> __( 'Medium x2', 'good-time' ),
        'large-hd'		=> __( 'Large x2', 'good-time' ),
        'screen-mid'	=> __( 'Screen Medium', 'good-time' ),
        'large-hd'		=> __( 'Screen Full', 'good-time' ),
        'large-hd'		=> __( 'Video Medium', 'good-time' ),
        'large-hd'		=> __( 'Video Full', 'good-time' ),
    ) );
}
add_filter( 'image_size_names_choose', 'fs_custom_sizes' );


// Background image

function fs_bg_img() {
	
	$bg_default = get_theme_mod( 'bg_default' );
	$bg_blog = get_theme_mod( 'bg_blog' );
	$bg_404 = get_theme_mod( 'bg_404' );
	$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-hd' );
	
	if ( $bg_blog && is_home() ) {
		$bg = ' style="background-image: url('.$bg_blog.')"';
	} else if ( $bg_404 && is_404() ) {
		$bg = ' style="background-image: url('.$bg_404.')"';	
	} else if ( '' != get_the_post_thumbnail() ) {
		$bg = ' style="background-image: url('.$img_url[0].')"';
	} else if ( $bg_default ) {
		$bg = ' style="background-image: url('.$bg_default.')"';
	} else {
		$bg = null;	
	}
	
	echo $bg;
}

// Widgets

function fs_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'First Widgets Column', 'good-time' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
	register_sidebar(array(
		'name'			=>	esc_html__( 'Second Widgets Column', 'good-time' ),
		'id'			=>	'widgets_area2',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
	register_sidebar(array(
		'name'			=>	esc_html__( 'Third Widgets Column', 'good-time' ),
		'id'			=>	'widgets_area3',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
	register_sidebar(array(
		'name'			=>	esc_html__( 'Blog Widgets', 'good-time' ),
		'id'			=>	'widgets_blog',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
}
add_action( 'widgets_init', 'fs_widgets_init' );


// Custom search form

function fs_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="search" placeholder="' . __( 'Keywords' ) . '" value="' . get_search_query() . '" name="s" id="s">
    <input type="submit" class="action-btn" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'">
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'fs_search_form' );


// Custom comment HTML

function fs_custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-author avatar">
				<?php
					echo get_avatar( $comment, 192 );
				?>
				<?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

			<div class="comment-content">
				<div class="comment-author-name">
					<?php 
						printf( '<span class="fn">%s</span>', get_comment_author_link() );
					?>
				</div>
				<div class="comment-date">
					<?php 
						printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							sprintf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() )
						);
					?>
				</div>
				<div class="comment-author-text">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="pending"><?php _e('Your comment is awaiting moderation.') ?></em>
					<?php endif; ?>
					
					<?php comment_text(); ?>
				</div>
			</div>

			<div class="reply">
				<?php comment_reply_link( array_merge($args, array(
				    'reply_text' => __('Reply'),
				    'depth'      => $depth,
				    'max_depth'  => $args['max_depth']
				    )
				)); ?>
			</div>
		</article>
		
<?php }

// Tinymce class

function fs_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'fs_mce_buttons_2');

function fs_tiny_formats($init_array) {

    $style_formats = array(

        array(
            'title' => __( 'Text intro', 'from-scratch' ),
            'selector' => 'p',
            'classes' => 'text-intro',
            'wrapper' => true,
        ),
        array(
            'title' => __( 'Text mentions', 'from-scratch' ),
            'selector' => 'p',
            'classes' => 'text-mentions',
            'wrapper' => true,
        ),
        array(
            'title' => __( 'Action button', 'from-scratch' ),
            'selector' => 'a',
            'classes' => 'action-btn',
        )
    );
    
    // Filter
    $style_formats = apply_filters( 'fs_tiny_formats', $style_formats ); 
    
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;

}
add_filter('tiny_mce_before_init', 'fs_tiny_formats');


// ------------------------
// ACF
// ------------------------


if( class_exists('acf') ) {

	
	// Custom blocks

	$my_blocks = array_diff( scandir(FS_THEME_DIR . '/blocks'), array('..', '.') );
	
	foreach( $my_blocks as $block ) {
		include_once 'blocks/'. $block .'/'. $block .'.php';
		include_once 'blocks/'. $block .'/'. $block .'-fields.php';
	}	

	// Translate ACF fields
	
	function fs_custom_acf_settings_localization($localization){
	  return true;
	}
	add_filter('acf/settings/l10n', 'fs_custom_acf_settings_localization');
	
	function fs_custom_acf_settings_textdomain($domain){
	  return 'good-time';
	}
	add_filter('acf/settings/l10n_textdomain', 'fs_custom_acf_settings_textdomain');


	// ACF colors
	
	add_action('acf/input/admin_footer', 'fs_acf_color_palette_script');	

	function fs_acf_color_palette_script() {

		global $primary;
		global $secondary;
		global $alpha1;
		global $alpha2;
		
		$colors = ' "'.$primary.'", "'.$secondary.'", "'.$alpha1.'", "'.$alpha2.'" ';
	 ?>
	    <script type="text/javascript">
	    (function($){
			acf.add_filter('color_picker_args', function( args, field ){			
			    args.palettes = [ <?php echo $colors; ?> ]
			    return args;			
			});	
	    })(jQuery);
	    </script>
	<?php }
		
}



// ------------------------
// Auto-Updater
// ------------------------

// Remove these lines and dependencies for your theme

require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/anybodesign/good-time',
	__FILE__,
	'good-time'
);
$myUpdateChecker->setBranch('master');