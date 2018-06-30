<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Pages Template
 */

get_header(); ?>
<?php

$landing_page_object = get_field('landing_page_relationship');

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
	//include(locate_template('includes/banners.php')); 
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
<div class="content-body" id="content-wrap" style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;">
	<div class="container">
	<div class="headering-top">
				<div class="col-md-9">
				<h1 style="padding-bottom:0;"><?php the_title(); ?></h1>
				</div>
				<div class="col-md-3">
					<?php  get_template_part( 'loop-header' ); ?>
				</div>
		</div>
		<div id="content-wrap" class="col-1" style="clear:both;" >
			<div class="col-md-12">
				<?php // get_template_part( 'loop-header' ); ?>
			</div>
			
				<div class="col-md-9 col-sm-9 post-content">
				
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php 
						if ( has_post_thumbnail()) {
							the_post_thumbnail();
							 
						 }
						?>

					<?php the_content(); ?>
				<?php endwhile; else : ?>
					<h1>Post Not Found</h1>
				<?php endif; ?>
				</div>
			
					<?php get_sidebar('external-links-inner'); ?>
		</div><!-- end row -->
	</div><!-- end of .container -->
	<?php //get_template_part( 'includes/sponsors' ); ?>
</div><!-- end of .container -->


<?php get_footer(); ?>