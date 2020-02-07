<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying the post meta.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
?>

							<div class="post-meta">
								<p class="meta-infos">
									<?php _e( 'Posted on&nbsp;', 'good-time' ); ?><?php echo the_time( get_option('date_format') ); ?>
									<?php _e( 'by&nbsp;', 'good-time' ); the_author(); ?>
									<?php _e( 'in&nbsp;', 'good-time' ); the_category(', '); ?>
								</p>
								
								<?php $comment = get_comments_number(); if ( $comment > 0 ) : ?>
								<p class="meta-comments">
									<a href="<?php the_permalink() ?>#comments">
										<?php printf( _n( '%s comment', '%s comments', $comment, 'good-time' ), $comment ); ?>
									</a>
								</p>
		    					<?php endif; ?>
							</div>