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
<?php
	if (isset($landing_page_object->ID)){
		echo '<style type="text/css">'.get_post_meta($landing_page_object->ID, '_custom_css', true).'</style>';
		$landing_class = " landing-hero";
	}
?>
</style>
<?php } ?>

<?php
	if (isset($landing_page_object->ID)){
		?>
		<script>
		jQuery(document).ready(function($) {
			$('body').addClass('is-landing');
		});
		</script>
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
<?php } } 
/*
?>

<div id="hero" class="<?php echo $landing_class; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if($header_image) { ?>
						<?php if(!wp_is_mobile()){ ?>
						<a href="<?php echo get_permalink( $landing_page_object->ID);?>"><div class="custom-header-img">
							<img src="<?php echo $header_image['sizes'][ 'custom-header' ]; ?>" alt="">
						</div></a>
						<?php } else { ?>
						<a href="<?php echo get_permalink( $landing_page_object->ID);?>"><div class="custom-header-img hidden-xs hidden-sm"></div></a>
						<?php
						$image_mobile = get_field('custom_header_image_mobile', $landing_page_object->ID);
							if( !empty($image_mobile) ){ ?>
							<a href="<?php echo get_permalink( $landing_page_object->ID);?>"><img class="custom-header-img-mobile img-responsive hidden-md hidden-lg" src="<?php echo $image_mobile['sizes'][ 'custom-header-mobile' ]; ?>" alt="<?php echo $image_mobile['alt']; ?>" /></a>
							<?php } ?>
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
<?php */?>

	<div id="content-wrap" class="row" style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;">
	<div class="container">
	<!-- 	<div class="col-md-12">
			<?php  //get_template_part( 'loop-header' ); ?>
		</div> -->
	<div class="headering-top">
			<div class="col-md-6">
			<h1 style="padding-bottom:0;">News</h1>
			</div>
			<div class="col-md-6">
				<?php  get_template_part( 'loop-header' ); ?>
			</div>
		</div>
		
	<div id="content" class="col-1" style="clear:both;">
			
		<div class="col-md-9 col-sm-9 post-content">
			<?php if (have_posts()) : ?>
			    <?php while (have_posts()) : the_post(); ?>
			    	
						
						<?php //get_template_part( 'includes/post-meta' ); ?>

						<?php 
						if ( has_post_thumbnail()) {
							$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single');
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
					<?php
					$thumb_img = get_post( get_post_thumbnail_id() )->post_excerpt;

						 if($thumb_img) { ?>
								<span class="image-caption"><?php echo $thumb_img; ?></span>
					<?php } ?>
					 <div class="status">
			 Posted on <?php the_time('l jS F, Y') ?>
			 </div> 

<h1 class="news-title"><?php the_title(); ?></h1>

			        <?php the_content(); ?>
			    <?php endwhile; ?>
			    <?php else : ?>
			    	<p>No Posts.</p>
			<?php endif; ?>
			
			<?php get_template_part( 'includes/next-prev' ); ?>
			<?php //get_template_part( 'includes/related-articles' ) ?>

		</div>

			<?php get_sidebar('external-links-inner'); ?>
</div>
	</div>
</div>

<?php //get_template_part( 'includes/sponsors' ); ?>

<?php get_footer(); ?>
