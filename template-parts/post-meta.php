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
								<span class="meta-author"><?php _e( 'Posted by&nbsp;', 'good-time' ); the_author(); ?></span>									
								<span class="meta-category"><?php _e( 'in&nbsp;', 'good-time' ); the_category(', '); ?></span>
								
								<span class="meta-date">
									<span class="meta-date-text"><?php _e( 'on&nbsp;', 'good-time' ); ?></span><span class="meta-date-time"><span class="day"><?php the_time( ('j') ); ?></span><span class="month"><?php the_time( ('F') ); ?></span><span class="year"><?php the_time( ('Y') ); ?></span></span>
								</span>

								<?php $comment = get_comments_number(); if ( $comment > 0 ) : ?>
								<span class="meta-comments">
									<a href="<?php the_permalink() ?>#comments">
										<?php printf( _n( '%s comment', '%s comments', $comment, 'good-time' ), $comment ); ?>
									</a>
								</span>
		    						<?php endif; ?>								
							</div>
							