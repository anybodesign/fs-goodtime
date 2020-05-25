<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="post-content">
							<?php 
								if ( get_theme_mod('layout_option') == 'version2' || get_theme_mod('layout_option') == 'version3' ) {
									get_template_part( 'template-parts/page', 'title' );
								} 
								the_content();
							?>
						</div>
						<?php get_template_part('template-parts/post', 'meta'); ?>

					</article>