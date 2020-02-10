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
	$btns = null;
	if ( get_theme_mod('btn_contrast') == 'dark' )	{
		$btns = 'dark-btns';
	}
	else if ( get_theme_mod('btn_contrast') == 'white-dark' )	{
		$btns = 'white-dark-btns';
	}
	else if ( get_theme_mod('btn_contrast') == 'dark-white' )	{
		$btns = 'dark-white-btns';
	}
?>
<body <?php body_class($btns); ?>>
<?php wp_body_open(); ?>

<div id="wrapper">

	<?php
		if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
			get_template_part('template-parts/header', 'skiplinks');
		}
		
		$version = null;
		if ( get_theme_mod('layout_option') == 'version1' ) {
			$version = ' class="header-v1"';
		}
		else if ( get_theme_mod('layout_option') == 'version2' ) {
			$version = ' class="header-v2"';
		}
		else if ( get_theme_mod('layout_option') == 'version3' ) {
			$version = ' class="header-v3"';
		}
	?>
	
	<header role="banner" id="site_head"<?php echo $version; ?>>
		<div class="row inner justify-between">
			
			<?php 
				get_template_part('template-parts/header', 'brand'); 
			?>
			<?php 
				if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
					get_template_part('template-parts/header', 'nav');
				}
			?>

		</div>
	</header>


		<main class="content-area" role="main" id="site_main">