<?php if ( !defined('ABSPATH') ) die();
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
?>
				<aside class="widget-area" role="complementary">
					<?php
						if ( is_active_sidebar( 'widgets_blog' ) ) { 
							dynamic_sidebar( 'widgets_blog' ); 
						} 
					?>
				</aside>