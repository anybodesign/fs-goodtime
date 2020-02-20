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
	if ( get_theme_mod('palette') == 'violet' ) { $palette = 'palette-1'; }
	else if ( get_theme_mod('palette') == 'winter' ) { $palette = 'palette-2'; }
	else if ( get_theme_mod('palette') == 'spring' ) { $palette = 'palette-3'; } 
	else if ( get_theme_mod('palette') == 'fall' ) { $palette = 'palette-4'; } 
	else if ( get_theme_mod('palette') == 'summer' ) { $palette = 'palette-5'; } 
	else if ( get_theme_mod('palette') == 'vineyard' ) { $palette = 'palette-6'; } 
	else if ( get_theme_mod('palette') == 'darkpink' ) { $palette = 'palette-7'; } 
	else if ( get_theme_mod('palette') == 'darkyellow' ) { $palette = 'palette-8'; } 
	else { $palette = 'palette-1'; }

	$head1 = get_theme_mod('layout_option') == 'version1';
	$head2 = get_theme_mod('layout_option') == 'version2';
	$head3 = get_theme_mod('layout_option') == 'version3';
	
	if ( $head1 ) { $header = 'header-v1'; }
	else if ( $head2 ) { $header = 'header-v2'; }
	else if ( $head3 ) { $header = 'header-v3'; } 
	else { $header = 'header-v1'; }
	
?>
<body <?php body_class( array($palette) ); ?>>
<?php wp_body_open(); ?>

<div id="wrapper" class="<?php echo $header; ?>">

	<?php
		if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
			get_template_part('template-parts/header', 'skiplinks');
		}
	?>
	
	<?php if (!is_page_template( 'pagecustom-maintenance.php' )) { ?>
	<header id="site_head" role="banner"<?php if ( !is_front_page() ) { fs_bg_img(); } ?>>
		<div class="row inner">
			<div class="header-content">
				<?php 
					get_template_part('template-parts/header', 'brand'); 
					get_template_part('template-parts/header', 'nav');
				?>
			</div>
		</div>
		
		<div class="header-banner"<?php if ( is_front_page() ) { fs_bg_img(); } ?>>
			<?php 
				if ( $head2 || $head3 ) {
					// :-)
				} else {
					get_template_part( 'template-parts/page', 'title' );
				} 
			?>
		</div>
		
	</header>
	<?php } ?>

		<main id="site_main" class="content-area" role="main">
			
			<?php if (!is_page_template( 'pagecustom-maintenance.php' )) { 
					if ( function_exists('bcn_display') && !is_front_page() ) { ?>
			<div class="breadcrumbs-nav">
				<div class="inner">
					<?php bcn_display(); ?>					
				</div>
			</div>
			<?php } } ?>