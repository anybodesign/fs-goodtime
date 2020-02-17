<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Maintenance
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				<div class="page-wrap">
					<div class="coming-back-soon"<?php fs_bg_img(); ?>>
						
						<div class="maintenance-message">
							<?php 
								while ( have_posts() ) : the_post();
									echo '<h1>'.get_the_title().'</h1>';
									the_content();
								endwhile;					
							?>
						</div>
					</div>
				</div>

<?php get_footer(); ?>