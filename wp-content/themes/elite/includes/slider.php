<?php
	$args = array(
		'post_type' => 'post',
		'category_name' => 'featured-news',
		'posts_per_page' => '4'
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
?>
		
		<div id="slider" class="flexslider clearfix loading">
			<ul class="slides">
			<?php
				global $seen_posts;
				$seen_posts = array();
				while ( $the_query->have_posts() ) {				
					$the_query->the_post();
					$seen_posts[] = $post->ID;
				if ( has_post_thumbnail()) {
					$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider');
					$slider_img = $thumb_image_url[0];
				 } else { 
				 	if (getFeaturedVideoPreview($post->ID) !="") {
				 		$yt_url = get_post_meta($post->ID, 'featuredVideoURL', true);
				 		$slider_img_part = substr( $yt_url, strrpos( $yt_url, '=' )+1 );
				 		$slider_img = 'http://img.youtube.com/vi/'.$slider_img_part.'/hqdefault.jpg';
				 	}else{
				 		$slider_img = get_stylesheet_directory_uri().'/core/images/placeholder.jpg';
				 	}
				 	?>
			  	<?php } ?>

				<li class="clearfix" data-thumb="<?php echo $slider_img; ?>">
					<div class="slider-img">

								<?php
								if (getFeaturedVideoPreview($post->ID) !="") {
									// Gets Featured Video If Exists  
									echo getFeaturedVideoPreview($post->ID, "1200", "528");
									?>
									<div class="video_mask"></div>
									<?php
									} else { ?>
									<a href="<?php the_permalink() ?>"><img src="<?php echo $slider_img; ?>"></a>
									<?php }
								?>
						  		
					</div>					
				  	<div class="caption">
				  		<h2><a href="<?php the_permalink() ?>"><?php echo ShortenText(50, get_the_title(), false); ?></a></h2><p><?php echo get_excerpt(220); ?></p>
				  			<?php
				  			if (function_exists('fsp_adv_social_media')) {
				  				echo fsp_adv_social_media();
				  			}
				  			?>
				  	</div>
				</li>
			<?php } ?>
			</ul>
		</div>

<script defer src="<?php echo elite_child_uri('/core/js/jquery.flexslider-min.js'); ?>"></script>
<script type="text/javascript">

jQuery(document).ready(function($) {

       
      $('#slider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        animationLoop: true,
        slideshowSpeed: 8000,
        pauseOnAction: false,
        slideshow: true,
        touch: true,
        smoothHeight: true,
        start: function(slider){
          $('#slider').removeClass('loading');
        },
      });

          	// VIDEO in Slider
      		$('.video_mask').click(function () {
      		iframe = $(this).closest('.slider-img').find('iframe');
      		iframe_source = iframe.attr('src');
      		iframe_source = iframe_source + "&autoplay=1"
      		iframe.attr('src', iframe_source);
      		// hide the mask
      		$(this).toggle();
      		$('#slider').flexslider("pause") //Stop slideshow
      		// stop the slideshow
      		// $('#news_fading_image_list').cycle('pause');
      		// $('.news-headings-wrap, .read-more-wrap, news_list_title, .news_list_subheader').hide();
      		// $(".news_fading_image_list li").addClass("playing");						
      		});
      		$(document).on('click', '.flex-direction-nav, .flex-control-thumbs li img', function (event) {
      		$('.video_mask').show();
      		
      		$('#slider').find('iframe').each(function (key, value) {
      			url = $(this).attr('src');
      			if (url.indexOf("autoplay") > 0) {
      				new_url = url.substring(0, url.indexOf("&autoplay=1"));
      				$(this).attr('src', new_url);
      			}
      			$('#slider').flexslider("play") //Play slideshow
      		});
      		});			

      	$('img[src*="http://img.youtube.com"]').closest('li').addClass('has-vid');

  });
</script>
<?php
wp_reset_postdata();
	} 
?>