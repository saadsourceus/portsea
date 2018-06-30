<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => '5',
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