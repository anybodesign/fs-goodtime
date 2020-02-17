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
					<?php if ( ! is_front_page() ) { ?>
					<h1 class="page-title">
					<?php 	
						if ( is_home() ) {
							single_post_title();
						} else if ( is_archive() ) {
							the_archive_title();
						} else if ( is_search() ) {
							printf( esc_html__( 'Search Results for: %s', 'good-time' ), '<span class="search-term">' . get_search_query() . '</span>' );
						} else {
							the_title(); 
						}
					?>
					</h1>
					<?php } ?>
					
					<?php 
						if ( is_page_template( 'pagecustom-maintenance.php' ) ) {
							the_content(); 
						} 
						if ( is_archive() ) {
							the_archive_description( '<div class="archive-desc">', '</div>' );
						}
						if ( is_single() ) {
							get_template_part('template-parts/post', 'meta');							
						} 
					?>