<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<?php 
	if ( get_theme_mod('btn_contrast') == 'dark' ) { $btns = 'dark-btns'; }
	else if ( get_theme_mod('btn_contrast') == 'white-dark' ) { $btns = 'white-dark-btns'; }
	else if ( get_theme_mod('btn_contrast') == 'dark-white' ) { $btns = 'dark-white-btns'; } 
	else { $btns = null; }
	
	if ( get_theme_mod('layout_option') == 'version1' ) { $header = 'header-v1'; }
	else if ( get_theme_mod('layout_option') == 'version2' ) { $header = 'header-v2'; }
	else if ( get_theme_mod('layout_option') == 'version3' ) { $header = 'header-v3'; } 
	else { $header = null; }
?>
<body <?php body_class( array($btns, $header) ); ?>>
<?php wp_body_open(); ?>

<div id="wrapper">

	<?php
		if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
			get_template_part('template-parts/header', 'skiplinks');
		}
	?>
	
	<header id="site_head" role="banner"<?php if ( !is_front_page() ) { fs_bg_img(); } ?>>
		<div class="row inner">
			<div class="header-content">
				<?php 
					get_template_part('template-parts/header', 'brand'); 
				?>
				<?php 
					if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
						get_template_part('template-parts/header', 'nav');
					}
				?>
			</div>
		</div>
		
		<div class="header-banner"<?php if ( is_front_page() ) { fs_bg_img(); } ?>>
			<?php if ( get_theme_mod('layout_option') == 'version1' ) { ?>
				<?php get_template_part( 'template-parts/header', 'banner' ); ?>
			<?php } ?>
		</div>
		
	</header>


		<main id="site_main" class="content-area" role="main">
			
			<?php if ( function_exists('bcn_display') && !is_front_page() ) { ?>
			<div class="breadcrumbs-nav">
				<div class="inner">
					<?php bcn_display(); ?>					
				</div>
			</div>
			<?php } ?>