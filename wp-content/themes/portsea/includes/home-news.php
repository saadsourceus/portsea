<div class="container more-news-events arrow-bt">

		<div class="col-md-9 more-news-section">
			<h3><a href="<?php echo home_url(); ?>/news">Latest News</a></h3>
			<?php 

global $seen_posts;
?>
<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4,
		'category_name' => 'front-page-news',
		'post__not_in' => $seen_posts,
		'ignore_sticky_posts' => 1,
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		echo '<ul class="front-more-news clearfix">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
?>

	<li>
	<div class="rel-article-time"><?php echo the_time('jS F, Y') ?></div>
		<a href="<?php the_permalink(); ?>">
			
			<h4><?php the_title(); ?></h4>
		</a>
		
		<p><?php echo get_excerpt( 200 ); ?></p>
		<a class="read-more" href="'.get_permalink( $post->ID ).'">Read More</a>
		</li>


<?php 
	} // end while
		echo '</ul>';


wp_reset_postdata();
	} // end if

?>
<div class="more-news">
<a href="./news/" class="yellow-btn"> View All News<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
</div>
		</div>
		<div class="col-md-3 major-sponsor">
			<h3>Major Sponsors</h3>

			<div class="sponsor-img">
				<img src="<?php echo get_field('major_sponsor_image','option'); ?>">
			</div>

			<div class="sponsor-text">
			<ul>
				<li><i class="fa fa-trophy" aria-hidden="true"></i><a href="<?php echo get_field('button_link','option');?>"><?php echo get_field('button_1','option');?> </a> <br />
				<span class="sub-text"><?php echo get_field('button_sub_text','option');?>  </span> </li>

				<li><i class="fa fa-calendar" aria-hidden="true"></i><a href="<?php echo get_field('button_link_2','option');?>"><?php echo get_field('button_2','option');?> </a><br />
				<span class="sub-text"><?php echo get_field('button_sub_text_2','option');?> </span> </li>

				<li><i class="fa fa-trophy" aria-hidden="true"></i><a href="<?php echo get_field('button_link_3','option');?>"><?php echo get_field('button_3','option');?> </a><br />
				<span class="sub-text"><?php echo get_field('button_sub_text_3','option');?>  </span> </li>

				<li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="<?php echo get_field('button_link_4','option');?>"><?php echo get_field('button_4','option');?> </a><br />
				<span class="sub-text"><?php echo get_field('button_sub_text_4','option');?> </span> </li>

				<li><i class="fa fa-book" aria-hidden="true"></i><a href="<?php echo get_field('button_link_5','option');?>"><?php echo get_field('button_5','option');?> </a><br />
				<span class="sub-text"> <?php echo get_field('button_sub_text_5','option');?></span> </li>
			</ul>
			</div>
		</div>
	
</div>
