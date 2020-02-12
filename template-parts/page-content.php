<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="page-content">
						<?php 
							if ( get_theme_mod('layout_option') != 'version1' ) {
								get_template_part( 'template-parts/header', 'banner' );
							} 
							the_content(); 
						?>
					</div>