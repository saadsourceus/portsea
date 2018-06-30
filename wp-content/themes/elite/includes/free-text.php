<div class="free-text clearfix">
	<h2 class="heading"><?php the_field('free_text_heading', 'option') ?></h2>
	<div class="free-text-content">
		<?php 
		 
		$image = get_field('featured_image', 'option');
		 
		if( !empty($image) ): 
		 
			// vars
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$caption = $image['caption'];
		 
			// thumbnail
			$size = 'medium';
			$thumb = $image['sizes'][ $size ];
		 
			if( $caption ): ?>
		 
				<div class="wp-caption">
		 
			<?php endif; ?>
		 
				<img class="img-responsive" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>

		 
			<?php if( $caption ): ?>
		 
					<p class="wp-caption-text"><?php echo $caption; ?></p>
		 
				</div>
		 
			<?php endif; ?>
		 
		<?php endif; ?>
		<?php the_field('free_text_content', 'option') ?>
	</div>
</div>