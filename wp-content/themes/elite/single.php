<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>
<?php

$landing_page_object = get_field('landing_page_relationship');

// Custom header as background image
$header_image = get_field('custom_header_image', $landing_page_object->ID);
if( !empty($header_image) ){ ?>
<style>
.custom-header-img {
	background-image: url('<?php echo $header_image['sizes'][ 'custom-header' ]; ?>');
}
<?php
	if (isset($landing_page_object->ID)){
		echo '<style type="text/css">'.get_post_meta($landing_page_object->ID, '_custom_css', true).'</style>';
		$landing_class = " landing-hero";
	}
?>
</style>
<?php } ?>
<?php  
	include(locate_template('includes/banners.php')); 
?>
<?php
	if (isset($landing_page_object->ID)){
		?>

<div id="hero" class="<?php echo $landing_class; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if($header_image) { ?>
						<?php if(!wp_is_mobile()){ ?>
						<a href="<?php echo get_permalink( $landing_page_object->ID);?>"><div class="custom-header-img"></div></a>
						<?php } else { ?>
						<a href="<?php echo get_permalink( $landing_page_object->ID);?>"><div class="custom-header-img hidden-xs hidden-sm"></div></a>
						<?php
						$image_mobile = get_field('custom_header_image_mobile', $landing_page_object->ID);
							if( !empty($image_mobile) ){ ?>
							<a href="<?php echo get_permalink( $landing_page_object->ID);?>"><img class="custom-header-img-mobile img-responsive hidden-md hidden-lg" src="<?php echo $image_mobile['sizes'][ 'custom-header-mobile' ]; ?>" alt="<?php echo $image_mobile['alt']; ?>" /></a>
							<?php } ?>
						<?php } ?>
				<?php }else{ ?>
						<h1 class="page-title"><?php the_title(); ?></h1>
				<?php } ?>
			</div>
		</div>
		<?php if(get_field('match_centre_everywhere', $landing_page_object->ID) == 1) { ?>
			<div class="row">	
				<div class="col-md-12">
						<?php  
						if(get_field('match_centre_type', $landing_page_object->ID) == 1) {
							get_template_part( 'includes/match-centre' );
						}elseif(get_field('match_centre_type', $landing_page_object->ID) == 2){							
							get_template_part( 'includes/live-stats-mc' );
						}
						?>
				</div><!-- /.col-md-12 -->
			</div>
		<?php } ?>
	</div>
</div>
<?php } ?>
<?php

if($landing_page_object){

$menu_id = get_field('sub_menu', $landing_page_object->ID);

if($menu_id){
?>
<div class="landing-nav">
	<div class="container">
		<?php wp_nav_menu( array(
							   'container'       => 'div',
							   'container_class' => 'landing-menu',
							   'fallback_cb'     => 'responsive_fallback_menu',
							   'menu'  => $menu_id
						   )
		);
		?>		
	</div>
</div><!-- /.landing-nav -->
<?php } } ?>
<div id="news-hero">
	<div class="container">
		<div class="row hero-image">

					<?php 
					if ( has_post_thumbnail()) {
					$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news-thumb');
												   }
					?>
					<?php
					if (getFeaturedVideoPreview($post->ID) !="") {
						// Gets Featured Video If Exists  
						echo getFeaturedVideoPreview($post->ID, "1200", "400");
						?>
						<div class="single_video_mask"></div>

						<?php
						} else { ?>
						<img class="img-responsive featured-image" src="<?php echo $thumb_image_url[0]; ?>" alt="">
						<?php }
					?>
					
					<h1 class="news-title"><span><?php the_title(); ?></span></h1>
<?php
$thumb_img = get_post( get_post_thumbnail_id() )->post_excerpt;

	 if($thumb_img) { ?>
					<span class="image-caption"><?php echo $thumb_img; ?></span>
<?php } ?>
		</div>
	</div>
</div>

<div id="news-sep"></div>
<div class="container">
<div id="content-wrap" class="row">
	<div id="content" class="col-1">

	<div class="col-md-12">
		
		<?php  get_template_part( 'loop-header' ); ?>

		<?php if( have_posts() ) : ?>

			<?php while( have_posts() ) : the_post(); ?>

				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php  if(function_exists('get_the_category_thumbnail')) { ?>
					<div class="col-md-2 related-category-links">
						Related
						<?php
						$categories = get_the_category();
						$separator = ' ';
						$output = '';
						if($categories){
							foreach($categories as $category) {
								if(has_category_thumbnail($category->term_id)) {
										$cat_img = get_the_category_thumbnail($category->term_id, "thumb");
										$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$cat_img.'</a>'.$separator;
									}
							}
						echo trim($output, $separator);
						}
						?>
					</div>
					<?php } ?>

					<div class="post-entry col-md-10">
						<div class="col-md-2 social-share">
							<?php echo fsp_adv_social_media(); ?>
						</div>
				  			<?php 
									if( have_rows('related_posts') ){
										?>
										<div class="single-rel-links">
											<h6>Also in the news: </h6>
										<?php
										foreach (get_field('related_posts') as $value) {
//										    print_r($value['related_post']->ID);
											$post = get_post($value['related_post']->ID);
											setup_postdata( $post ); 
										?>
											<a class="single-related" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php 
										wp_reset_postdata();
										}
										?>
										</div>
										<?php
									}

				  			?>
<script>
		jQuery(document).ready(function($) {


      		$(document).on('click', '.single_video_mask', function (event) {
	      		$("h1.news-title").hide();						
	      		iframe = $(this).closest('.hero-image').find('iframe');
	      		iframe_source = iframe.attr('src');
	      		iframe_source = iframe_source + "&autoplay=1"
	      		iframe.attr('src', iframe_source);
	      		// hide the mask
	      		$(this).toggle();
		      	
      		});
  });
</script>
				  		</span>
						<span class="news-single-excerpt"><?php if($post->post_excerpt) the_excerpt(); ?></span> 
						<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
						<div id="post-tags">
							<h6>Related Topics:</h6>
						<?php
							$posttags = get_the_tags();
							if ($posttags) {
							  foreach($posttags as $tag) {
							  	?>
									<a class="tag-link" href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
							  	<?php
							    //print_r($tag);
							  }
							}
						?>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p class="post-meta">Posted on <?php the_time('l, F jS, Y') ?></p>
							</div>
						</div>
						

						<?php if( get_the_author_meta( 'description' ) != '' ) : ?>

							<div id="author-meta">
								<?php if( function_exists( 'get_avatar' ) ) {
									echo get_avatar( get_the_author_meta( 'email' ), '80' );
								} ?>
								<div class="about-author"><?php _e( 'About', 'responsive' ); ?> <?php the_author_posts_link(); ?></div>
								<p><?php the_author_meta( 'description' ) ?></p>
							</div><!-- end of #author-meta -->

						<?php endif; // no description, no author's meta ?>

						<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
					</div>
					<!-- end of .post-entry -->

					<div class="navigation row">
						<?php
						    $prev = get_adjacent_post(true, array(58,59), true);
						    $next = get_adjacent_post(true, array(58,59), false);

						    //use an if to check if anything was returned and if it has, display a link
						    if($prev){
						        $url = get_permalink($prev->ID);  ?>
									<div class="previous col-md-6">
										<a href=""><span class="fsp-arrows">l</span></a> <a class="next-prev" href="<?php echo $url; ?>" title="<?php $prev->post_title; ?>"><?php echo $prev->post_title; ?></a>
									</div>
						        <?php          
						       
						    }

						    if($next) {
						        $url = get_permalink($next->ID);   ?>
						        <div class="next col-md-6 md-text-right">
						        	<a class="next-prev" href="<?php echo $url; ?>" title="<?php $prev->post_title; ?>"><?php echo $next->post_title; ?></a> <a href=""><span class="fsp-arrows">r</span></a>
						        </div>
								<?php 
						        
						    } 
						?>
					</div>
					<!-- end of .navigation -->

					<div id="news-related-wrapper">
				<h2>Related Articles</h2>
				<ul class="news-related-articles">
				<?php
					$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
					if( $related ) foreach( $related as $post ) {
					setup_postdata($post); ?>
						<li>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
								<?php the_post_thumbnail('small-news-square');?>
								<span><?php the_title(); ?></span>
							</a>	
						</li>
			<?php }
			wp_reset_postdata(); ?>
			</ul>
			</div>
					<?php 
						if (function_exists('fb_link')) {
							echo do_shortcode('[fbcomments]');
						}?>


					<?php // get_template_part( 'post-data' ); ?>

					
				</div><!-- end of #post-<?php the_ID(); ?> -->
				

				
				<?php // comments_template( '', true ); ?>
				

			<?php
			endwhile;

			get_template_part( 'loop-nav' );

		else :

			get_template_part( 'loop-no-posts' );

		endif;
		?>
	</div>

		</div><!-- end col-md-9 -->
		<?php get_sidebar(); ?>
	</div><!-- end row -->
</div><!-- end of .container -->


<?php get_footer(); ?>
