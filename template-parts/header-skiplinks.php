<?php if ( !defined('ABSPATH') ) die(); ?>

	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_main"><?php _e('Go to main content', 'good-time'); ?></a>
		<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
		<a href="#site_nav"><?php _e('Go to main menu', 'good-time'); ?></a>
		<?php endif; ?>
	</div>