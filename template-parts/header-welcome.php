<?php if ( !defined('ABSPATH') ) die(); 

	$h_title = get_theme_mod('welcome_title');
	$h_text = get_theme_mod('welcome_text');	
	$scroll = get_theme_mod('scrolldown');
?>

			<?php // The Welcome Titles ?>
			
			<div class="fs-welcome">
				
				<?php if ($h_title) { ?>
				<p class="fs-welcome-title h1-like">
					<?php echo $h_title; ?>
				</p>
				<?php } ?>
				
				<?php if ($h_text) { ?>
				<p class="fs-welcome-text text-intro">
					<?php echo $h_text; ?>
				</p>
				<?php } ?>
				
				<?php if ( $scroll != false ) { ?> 
				<button class="scroll-down">
					<img src="<?php echo FS_THEME_URL; ?>/img/ui/arrow.svg" alt="<?php _e('Scroll Down', 'fs-onepage'); ?>">
				</button>
				<?php } ?>
			</div>