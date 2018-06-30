
<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
/*
 Template Name: News Archive Template
 */
get_header(); 

$queried_object = get_queried_object();

$landing_page_object = get_field('landing_page_relationship', $queried_object);
// Custom header as background image
$header_image = get_field('custom_header_image', $landing_page_object->ID);
if (isset($landing_page_object->ID)){
	echo '<style type="text/css">'.get_post_meta($landing_page_object->ID, '_custom_css', true).'</style>';
	$landing_class = " landing-hero";
}
if( !empty($header_image) ){ ?>
<style>
.custom-header-img {
	background-image: url('<?php echo $header_image['sizes'][ 'custom-header' ]; ?>');
}
</style>
<?php } ?>
<?php  
	include(locate_template('includes/banners.php')); 
	/*
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
					<?php if( is_category() || is_tag() || is_author() || is_date() ) { ?>
						<h1 class="news-title">
							<?php
							if( is_day() ) :
								printf( __( 'Daily Archives: %s', 'responsive' ), '<span>' . get_the_date() . '</span>' );
							elseif( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
							elseif( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
							elseif( is_category()) :
								printf(__('%s'), single_cat_title('', false));
							else :
								_e( 'News Archives', 'responsive' );
							endif;
							?>
						</h1>
						<?php } ?>
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
<?php */
 
$menu_id = get_field('sub_menu', $landing_page_object);
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
<?php } ?>
<div id="content"  style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;">
<div class="container">
	<div id="main-content" class="news-archive">
		<div class="container">
		<div class="headering-top">
			<div class="col-md-9">
			<h1 style="padding-bottom:0;"><?php the_title(); ?></h1>
			</div>
			<div class="col-md-3">
				<?php  get_template_part( 'loop-header' ); ?>
			</div>
		</div>
			
		<div id="content" class="col-1" style="clear:both;">
		
			<?php  //get_template_part( 'loop-header' ); ?>
				
			
						
				<?php 
						$category_name = get_field('archive_category_name');
						$number = get_field('archive_no_of_post');
						 $current_month = date('m');
						
						 $paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => 'post',
							'orderby' => 'date',
							'order' => 'asc',
							'paged' => $paged, 
							//'monthnum' => $current_month, 
							//'category_name' => $category_name, 
							'ignore_sticky_posts' => 1
							
						);
						// The Query
						$the_query = new WP_Query( $args );

						// The Loop
						if ( $the_query->have_posts() ) {
							
							while ( $the_query->have_posts() ) {
								$the_query->the_post(); ?>
				
							<div class="col-sm-6 col-md-3 news-box">
							<?php if ( has_post_thumbnail()) :
        $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
        $slider_img = $thumb_image_url[0];
      endif; ?>
		 <div class="feature-img" style="background: url('');background-size: cover;background-repeat: no-repeat;background-position: center;"><img src="<?php echo $slider_img;?>" alt="" /> </div>
		<a href="<?php the_permalink(); ?>">
			
			<h4><?php the_title();  
			//echo softTrim(the_title(), 6);?></h4>
			<div class="rel-article-time">Posted on <?php echo the_time('jS F, Y') ?></div>
		</a>
		
		</div>			<?php	}

			
					if( function_exists('wp_pagenavi'))  {  
					
echo "<div class='pagination'>";
						wp_pagenavi(array('query' => $the_query)); 
	echo "</div>";
					
				}
			
					
							
						} else {
							// no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata();
					 ?>
			
				</div>
			</div><!-- end col-1 -->
			<?php // get_sidebar('archives'); ?>
		</div><!-- end row -->
	</div><!-- end of #content -->

<?php get_footer(); ?>