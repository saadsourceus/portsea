<?php if(get_sub_field('section_title')) { ?><h2 class="heading"><?php the_sub_field('section_title'); ?></h2><?php } ?>
<div class="free-text clearfix">
	<div class="free-text-content">
		<?php 
		 
		$image = $custom_field_image;
		 
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
		<?php echo $custom_section_text; ?>
	</div>
</div>