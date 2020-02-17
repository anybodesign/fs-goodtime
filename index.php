<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */ 
get_header(); ?>

				<div class="page-wrap has-sidebar">
					
					<?php 
						get_template_part( 'template-parts/page', 'banner' ); 
					?>

					<div class="page-content">
					
					<?php // The Loop ?>
					
					<?php if ( have_posts() ) : ?>		
			
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'template-parts/post', 'block' ); ?>
			
						<?php endwhile; ?>
			
						<?php if ( function_exists('wp_pagenavi') ) { ?>
							<div class="post-navigation">
							<?php wp_pagenavi(); ?>	
							</div>
						<?php } ?>
			
					<?php else : ?>
	
						<?php get_template_part( 'template-parts/nothing' ); ?>
				
					<?php endif; ?>	
						
	
					</div>


					<div class="page-sidebar">
						<?php get_sidebar(); ?>
					</div>
										
				</div>

<?php get_footer(); ?>