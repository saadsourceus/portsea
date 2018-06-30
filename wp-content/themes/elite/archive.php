<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

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
<?php 
 
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
<div id="content" class="container">
	<div id="main-content" class="row">
		<div class="col-1">
			<div class="col-md-12">
			<?php  get_template_part( 'loop-header' ); ?>
				<?php if (isset($landing_page_object->ID)){ ?>
				<?php if( !empty($header_image) ){ ?>
						<h1 class="page-title-landing"><?php printf(__('%s'), single_cat_title('', false));?></h1>
				<?php } } ?>
	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

		<div class="post-entry clearfix">
			<h1 class="single-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

			<?php 

					if( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'slider-thumb', array( 'class' => 'archive-img' ) ); ?>
					</a>

			<?php } ?>

			
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
		</div>
		<?php get_template_part( 'post-data' ); ?>
		<?php endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>
				</div>
			</div><!-- end col-1 -->
			<?php get_sidebar(); ?>
		</div><!-- end row -->
	</div><!-- end of #content -->

<?php get_footer(); ?>
