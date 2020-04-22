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
					
					<div class="page-content">
					<?php 
						get_template_part( 'template-parts/page', 'title' ); 
					?>

					<?php if ( have_posts() ) : ?>		
			
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'template-parts/post', 'block' ); ?>
			
						<?php endwhile; ?>
						
						<div class="post-navigation">
						<?php 
							if ( function_exists('wp_pagenavi') ) {
								wp_pagenavi();
							} else {
								the_posts_pagination(array(
									'prev_text'          => __( 'Previous page', 'fs-goodtime' ),
									'next_text'          => __( 'Next page', 'fs-goodtime' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fs-goodtime' ) . ' </span>',
								));
							} 
						?>
						</div>
						
					<?php else : ?>
	
						<?php get_template_part( 'template-parts/nothing' ); ?>
				
					<?php endif; ?>	

					</div>


					<div class="page-sidebar">
						<?php get_sidebar(); ?>
					</div>
										
				</div>

<?php get_footer(); ?>