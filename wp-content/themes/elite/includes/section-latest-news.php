<?php
	$args = array(
		'post_type' => 'post',
		'cat' => $news_category,
		'posts_per_page' => '3',
		'ignore_sticky_posts' => 1,
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) { ?>
		<?php 
			$this_cat = get_category($news_category,false);
			$cat_slug = $this_cat->slug;
			if(get_sub_field('section_title')) { ?><h2 class="heading"><?php the_sub_field('section_title'); ?><a href="<?php echo home_url().'/category/'.$cat_slug; ?>">Archive</a></h2>
		<?php } ?>
		<ul class="latest-news">
		<?php
		global $seen_posts;
		$seen_posts = array();
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$seen_posts[] = $post->ID;
		?>

	<li class="<?php if( 0 == $the_query->current_post ){echo 'first-post';}else{echo 'not-first-post';}; ?> clearfix">
		
		<div class="featured-image">


		<?php
		if (getFeaturedVideoPreview($post->ID) !="") {
			// Gets Featured Video If Exists  
			echo getFeaturedVideoPreview($post->ID, "1200", "528");
			?>
			<?php
			} else { 

				if ( has_post_thumbnail()) {
					$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider');
					$featured_image = $thumb_image_url[0];
				 } else { 
				 	$featured_image = get_stylesheet_directory_uri().'/core/images/placeholder.jpg';
				 	} ?>
			  	<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $featured_image; ?>" alt=""></a>

			<?php }
		?>

		</div>
		
		<a class="latest-news-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<p><?php echo get_excerpt(220); ?></p>
	</li>


<?php 
	} // end while
		echo '</ul>';
wp_reset_postdata();
	} // end if
?>