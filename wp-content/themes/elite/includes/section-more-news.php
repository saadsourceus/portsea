<?php
	/* Content Block - More News
	 * Description: Grabs News Items from a selection of one or more Categories. Outputs selected posts per page 1-10.
	 * Will Not Display "Seen Posts" already seen in Slider, Basic Slider...
	 */
	if (is_front_page()) {
		if(get_sub_field('section_title')) { ?><h2 class="heading"><?php the_sub_field('section_title'); ?><a href="<?php echo home_url().'/category/news'; ?>">Archive</a></h2><?php }
	}else{
		if(get_sub_field('section_title')) { ?><h2 class="heading"><?php the_sub_field('section_title'); ?><a href="<?php echo home_url().'/category/'.$cat_slug; ?>">Archive</a></h2><?php }
	}
?>
<?php 
global $seen_posts;
$cats =  implode (", ", get_sub_field('more_news_category')); 
$news_items = get_sub_field('items');
?>
<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $news_items,
		'cat' => $cats,
		'post__not_in' => $seen_posts,
		'ignore_sticky_posts' => 1,
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		echo '<ul class="more-news">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
?>

	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>


<?php 
	} // end while
		echo '</ul>';
wp_reset_postdata();
	} // end if
?>