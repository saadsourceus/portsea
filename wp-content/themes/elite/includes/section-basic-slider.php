<?php
	$args = array(
		'post_type' => 'post',
		'cat' => $news_category,
		'posts_per_page' => '4',
		'ignore_sticky_posts' => 1,
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) { ?>
		<?php 
			echo "<script src='". get_template_directory_uri() . "/core/js/bjqs-1.3.min.js'></script>";
			?>
			<script>
			jQuery(document).ready(function($) {
			    $('#basic-slider-parent').bjqs({
			        'height' : 600,
			        'width' : 768,
			        'responsive' : true,
					'animtype' : 'slide', // accepts 'fade' or 'slide'
					'animduration' : 450, // how fast the animation are
					'animspeed' : 4000, // the delay between each slide
					'automatic' : true, // automatic
					'showcontrols' : true, // show next and prev controls
					'centercontrols' : true, // center controls verically
					'nexttext' : '>', // Text for 'next' button (can use HTML)
					'prevtext' : '<', // Text for 'previous' button (can use HTML)
					'showmarkers' : true, // Show individual slide markers
					'centermarkers' : true, // Center markers horizontally
			    });
			});
			</script>
			<?php
		
			$this_cat = get_category($news_category,false);
			$cat_slug = $this_cat->slug;
			if(get_sub_field('section_title')) { ?><h2 class="heading"><?php the_sub_field('section_title'); ?><a href="<?php echo home_url().'/category/'.$cat_slug; ?>">Archive</a></h2>
		<?php } ?>
		<div id="basic-slider-parent"><ul class="basic-slider bjqs">
		<?php
		global $seen_posts;
		$seen_posts = array();
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$seen_posts[] = $post->ID;
?>

	<li class="basic-slider-slide clearfix">
		
		<div class="featured-image">


		<?php


				if ( has_post_thumbnail()) {
					$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider');
					$featured_image = $thumb_image_url[0];
				 } else { 
				 	$featured_image = get_stylesheet_directory_uri().'/core/images/placeholder.jpg';
				 	} ?>
			  	<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $featured_image; ?>" alt=""></a>

		</div>
		<div class="caption">
				  		<h2><a href="<?php the_permalink() ?>"><span><?php echo ShortenText(50, get_the_title(), false); ?></span></a></h2>
				  		<p><?php echo get_excerpt(150); ?></p>
				  		<span class="rel-links">
				  			<?php 
									if( have_rows('related_posts') ){
										foreach (get_field('related_posts') as $value) {
//										    print_r($value['related_post']->ID);
											$post = get_post($value['related_post']->ID);
											setup_postdata( $post ); 
										?>
											<a class="slide-related" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php 
										wp_reset_postdata();
										}
									}

				  			?>
				  		</span>
				  	</div>
	</li>


<?php 
	} // end while
		echo '</ul></div>';
wp_reset_postdata();
	} // end if
?>