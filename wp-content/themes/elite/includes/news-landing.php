<?php
	$cat_id = get_field('news_category');
	$args = array(
		'post_type' => 'post',
		'cat' => $cat_id,
		'posts_per_page' => '3',
		'ignore_sticky_posts' => 1,
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) { ?>
		<h2 class="heading"><?php the_field('news_section_title'); ?><a href="#">Archive</a></h2>
		<ul class="landing-news">
		<?php
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
?>

	<li class="<?php if( 0 == $the_query->current_post ){echo 'first-post';}else{echo 'not-first-post';}; ?> clearfix">
		<?php 
		if ( has_post_thumbnail()) {
			$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider');
			$featured_image = $thumb_image_url[0];
		 } else { 
		 	$featured_image = get_stylesheet_directory_uri().'/core/images/placeholder.jpg';
		 	?>
	  	<?php } ?>
	  	<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $featured_image; ?>" alt=""></a>
		<a class="landing-news-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<p><?php echo get_excerpt(220); ?></p>
	</li>


<?php 
	} // end while
		echo '</ul>';
wp_reset_postdata();
	} // end if
?>