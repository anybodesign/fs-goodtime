<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Good_Time
 * @since 1.0
 * @version 1.0
 */
?>
		</main> <?php // END content ?>
		
	<?php if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>

		<footer role="contentinfo" id="site_foot"<?php if ( get_theme_mod('footer_text_color') ) { echo ' class="dark-txt"'; } ; ?>>
			
			<div class="row inner">
				
				<div class="footer-widgets">

					<?php if ( is_active_sidebar( 'widgets_area1' ) || has_nav_menu( 'social_menu' ) ) { ?>
					<div class="widgets-area">
						
						<?php if ( get_theme_mod('footer_picture') == true ) { ?>
						<img class="footer-picture" src="<?php echo(get_theme_mod('footer_picture', 'none')); ?>" alt="">
						<?php } ?>
						
						<?php if ( is_active_sidebar( 'widgets_area1' ) ) { dynamic_sidebar( 'widgets_area1' ); } ?>

						<?php if ( has_nav_menu( 'social_menu' ) ) : ?>
						<nav class="social-nav" role="navigation" aria-label="<?php _e('Social Networks Menu', 'good-time'); ?>">
						<?php wp_nav_menu( array(
								'theme_location'	=> 	'social_menu',
								'menu_class'		=>	'social-menu',
								'container'			=>	false
								));
						?>
						</nav>
						<?php endif; ?>

						<?php if ( get_theme_mod('footer_deco') == true ) { ?>
						<img class="footer-decoration" src="<?php echo(get_theme_mod('footer_deco', 'none')); ?>" alt="">
						<?php } ?>						
					</div>						
					<?php }	?>
					
					<?php if ( is_active_sidebar( 'widgets_area2' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_area2' ); ?>
					</div>						
					<?php }	?>
					
					<?php if ( is_active_sidebar( 'widgets_area3' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_area3' ); ?>
					</div>						
					<?php }	?>										
					
				</div>
				
				
				<div class="footer-content">				
					
					<?php // The credit/copyright line, settings in the Customizer ?>
					
					<p class="footer-copyright">
						<?php if ( get_theme_mod('footer_text') ) {
							echo get_theme_mod('footer_text', ''); 
						} else {
							echo '&copy;'; echo date(' Y '); echo esc_url(bloginfo('name')).'.'; 	
						} ?>

						<a class="wp-love<?php if ( get_theme_mod('display_wp' ) == false ) { echo ' out-of-reach'; } ?>" href="//wordpress.org"><?php _e('Powered by WordPress!', 'good-time'); ?></a>
					</p>
					
					<?php // The footer menu location ?>
					
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<nav class="footer-nav" role="navigation" aria-label="<?php _e('Footer Menu', 'good-time'); ?>">
					<?php wp_nav_menu( array(
							'theme_location'	=> 	'footer_menu',
							'menu_class'		=>	'footer-menu',
							'container'			=>	false
							));
					?>
					</nav>
					<?php endif; ?>
					
				</div>
			</div>
			
		</footer>

		<?php if ( get_theme_mod('back2top') == true ) { ?>
			<button id="back2top" title="<?php _e('Back to top','good-time'); ?>">
				<img src="<?php echo FS_THEME_URL; ?>/img/ui/arrow.svg" alt="">
			</button>
		<?php } ?>

	<?php } ?>	
		
</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>
