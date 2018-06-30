<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}



get_header(); ?>
<?php  
	include(locate_template('includes/banners.php')); 
?>
<div id="hero">
	<div class="container slider-container">
	<?php  get_template_part( 'includes/slider' ); ?>

	
		<div class="row hero-links">
			<div class="col-md-12">
				
				<?php 
				$rows = get_field('image_links', 'option');
				if($rows) {
					$link_count = 0;
					foreach($rows as $row) {
					$link_count++;
						$attachment_id = $row['image']['id'];
						$image = wp_get_attachment_image_src( $attachment_id, 'home-page-buttons' ); 
						if(empty($row['link_url'])) {
							$link_url = $row['page_link'];
						}else{
							$link_url = $row['link_url'];
						}
						?>
						
						<a class="link-<?php echo $link_count; ?>" href="<?php echo $link_url; ?>" <?php if($row['new_window'] == 1){echo 'target="_blank"';} ?>><img src="<?php echo $image[0];  ?>" alt="<?php echo $row['image']['alt']; ?>"></a>

					<?php
					}
				}
				?>
			</div>
		</div>
	</div>

</div>

<div class="container">
	<div id="content-wrap" class="row">
		<div id="content" class="col-1">
		<?php  get_template_part( 'includes/content-blocks' ); ?>
		</div><!-- end col-1 -->
			<?php // get_sidebar(); ?>
	</div><!-- end row -->
</div><!-- end of .container -->


<?php get_footer(); ?>