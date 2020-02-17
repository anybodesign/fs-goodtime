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
					<article id="post-<?php the_ID(); ?>" <?php post_class('post-block'); ?>>
						
						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<figure class="post-figure">
							<a href="<?php the_permalink(); ?>" rel="nofollow" title="<?php _e('Read ', 'good-time'); the_title(); ?>">
							<?php the_post_thumbnail('thumbnail-hd'); ?>
							</a>
						</figure>
						<?php } ?>
						
						<div class="post-content">
							<header class="post-header">
								<h2 class="post-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
							</header>

							<?php get_template_part('template-parts/post', 'meta'); ?>							
							<div class="post-excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
						
					</article>