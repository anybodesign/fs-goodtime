<?php if ( !defined('ABSPATH') ) die();

	$title = get_field('title') ?: __('Welcome title here...', 'good-time');
	$text = get_field('text') ?: __('Welcome text here...', 'good-time');
	$img1 = get_field('left_picture');
	$img2 = get_field('right_picture');

?>
						
			<section class="acf-block--edito" data-scroll>
				<div class="acf-block-container">

					<?php if ( $title || $text ) { ?>
					<div class="edito-content">
						<?php if ( $title ) { echo '<h1 class="edito-title">'.$title.'</h1>'; } ?>
						<?php if ( $text ) { echo $text; } ?>
					</div>
					<?php } ?>
					
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
										
				</div>
			</section>