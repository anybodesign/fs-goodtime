<?php if ( !defined('ABSPATH') ) die();

	$title = get_field('title') ?: __('Welcome title here...', 'good-time');
	$text = get_field('text') ?: __('Welcome text here...', 'good-time');
	$img = get_field('image');
	
	$select = get_field('side_imgs_select');
	$side = get_field('side_imgs');

?>
						
			<section class="acf-block--edito alignfull" data-scroll>
				<div class="acf-block-container">

					<?php if ( $title || $text ) { ?>
					<div class="edito-content<?php if(! $select && $img) { echo ' has-single-image'; } ?>">
						<?php if ( $title ) { echo '<h2 class="edito-title h1-like">'.$title.'</h2>'; } ?>
						<?php if ( $text ) { echo $text; } ?>
					</div>
					<?php } ?>
					
					<?php if ( ! $select && $img ) { ?>
					<div class="edito-picture">
						<img src="<?php echo $img['sizes']['thumbnail-hd']; ?>" alt="<?php echo $img['alt']; ?>">
					</div>
					<?php } ?>
					
					<?php if ( $select && $side ) { 
							
							if ( have_rows('side_imgs') ):
							while( have_rows('side_imgs') ): the_row(); 
							
							$img1 = get_sub_field('left_picture');
							$img2 = get_sub_field('right_picture');

					?>
					
						<?php if ( $img1 ) { ?>
						<div class="edito-picture--left">
							<img src="<?php echo $img1['sizes']['thumbnail-hd']; ?>" alt="<?php echo $img1['alt']; ?>">
						</div>
						<?php } ?>
	
						<?php if ( $img2 ) { ?>
						<div class="edito-picture--right">
							<img src="<?php echo $img2['sizes']['thumbnail-hd']; ?>" alt="<?php echo $img2['alt']; ?>">
						</div>
						<?php } ?>
						
					<?php 
							endwhile; 
							endif; 
						} 
					?>
										
				</div>
			</section>