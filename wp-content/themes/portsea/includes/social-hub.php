


<div class="social-hub">

<div class="container">



<div class="social-sub"> <?php echo get_field('sub_text','option');?></div>
<h2> Social Hub </h2>
<div class="social-strip clearfix">
<?php 
    $facebook = get_field('facebook', 'option');
	$twitter = get_field('twitter', 'option');
    $instagram = get_field('instagram', 'option');
    $youtube = get_field('you_tube', 'option');
    ?>
    <div class="desktop-social">
    <?
    echo do_shortcode('[aggro_social_list facebook="'.$facebook.'"  twitter="'.$twitter.'" youtube="'.$youtube.'" size=6  theme=1 noscroll=1]'); 
    ?>

   </div>
     <div class="mobile-social">
    <?
    echo do_shortcode('[aggro_social_list facebook="'.$facebook.'"  twitter="'.$twitter.'" youtube="'.$youtube.'" size=0  theme=1 noscroll=1]'); 
    ?>

   </div>


</div>
 <script type="text/javascript">
						 imagesLoaded( document.querySelector('.social-strip'), function( instance ) {
						   console.log('all images are loaded');
						   var $container = jQuery('.social-strip #aggro-container');
						   $container.masonry({
						     itemSelector: '.aggroItem',
						     "columnWidth": 1
						   });
						 });
					</script>

</div>
<div class="counter-wrap">
	<div class="container">
		<div class="col-md-12">
			<div class="social-counter"><?php echo do_shortcode('[aggro_social_count facebook="'.$facebook.'" twitter="'.$twitter.'"   youtube="'.$youtube.'"]'); ?></div>
		</div>
		
	</div>
</div>
	
</div>

