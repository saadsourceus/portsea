
<?php
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
if( $related ) { ?>

<div class="home-more-news clearfix">
<h2 class="heading">Recomended Articles</h2>
<?php 
foreach( $related as $post ) {
setup_postdata($post); ?>

<div class="home-more-news-box">

	<?php
	if ( has_post_thumbnail()) {
		$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'small-news-square');
		$slider_img = $thumb_image_url[0];
	 } else { 
	 	if (getFeaturedVideoPreview($post->ID) !="") {
	 		$yt_url = get_post_meta($post->ID, 'featuredVideoURL', true);
	 		$slider_img_part = substr( $yt_url, strrpos( $yt_url, '=' )+1 );
	 		$slider_img = 'http://img.youtube.com/vi/'.$slider_img_part.'/hqdefault.jpg';
	 	}else{
	 		$slider_img = get_stylesheet_directory_uri().'/core/images/logo-placeholder.jpg';
	 	}
	 }
	 	?>
	 	<a class="image-link" href="<?php the_permalink(); ?>"><img src="<?php echo $slider_img; ?>" alt="">
			<h2><?php substr(the_title(), 0, 5)."..."; ?></h2>
			
		</a>
</div>

	<?php } ?>
	</div>
<?php }
wp_reset_postdata(); ?>

