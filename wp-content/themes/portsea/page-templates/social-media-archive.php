<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/*
 Template Name: Social Media Archive Template
 */

get_header(); ?>

<?php
	//$post_back = get_field('inner_post_background','option');
	//$post_text = get_field('inner_post_text','option',)
?>
<style>
	.more-social .aggroText{
	    color: <?php echo get_field('inner_post_text','option'); ?>;
	    background: <?php echo get_field('inner_post_background','option'); ?>;
	}
		#aggro-container a {
			color: <?php echo get_field('inner_post_text','option'); ?>;
	}
</style> 

<div class="content-body">
	<div class="container">
		<div id="content-wrap" class="row">
		
                     <?php $facebook = get_field('facebook', 'option');
					$twitter = get_field('twitter', 'option');
				    $instagram = get_field('instagram', 'option');?>
			<div class="col-md-12 more-social">
				<h1 class="page-title"><?php the_title(); ?></h1>
		    	<?php echo do_shortcode('[aggro_social_list  retweets=1 facebook="'.$facebook.'" twitter="'.$twitter.'" instagram="'.$instagram.'" size=20 theme=1 noscroll=1 imagesonly=1]'); ?>
					
			</div>
			<script type="text/javascript">
						 imagesLoaded( document.querySelector('.more-social'), function( instance ) {
						   console.log('all images are loaded');
						   var $container = jQuery('.more-social #aggro-container');
						   $container.masonry({
						     itemSelector: '.aggroItem',
						     "columnWidth": 1
						   });
						 });
					</script>
			<?php //get_sidebar(); ?> 
		</div><!-- end row -->
	</div><!-- end of .container -->
	
</div><!-- end of .content-body -->


<?php get_footer(); ?>




