<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}


/*
 * Template Name: MSBL Team
 */

get_header();

$landing_page_object = get_field('landing_page_relationship');

// Custom header as background image
$header_image = get_field('custom_header_image', $landing_page_object->ID);

if (isset($landing_page_object->ID)){
	echo '<style type="text/css">'.get_post_meta($landing_page_object->ID, '_custom_css', true).'</style>';
	$landing_class = " landing-hero";
	?>
		<script>
		jQuery(document).ready(function($) {
			$('body').addClass('is-landing');
		});
		</script>
	<?php
}

if( !empty($header_image) ){ ?>
<style>
</style>
<?php } 

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
						<a href="<?php echo get_permalink( $landing_page_object->ID);?>"><div class="custom-header-img hidden-xs hidden-sm">
							<img src="<?php echo $header_image['sizes'][ 'custom-header-mobile' ]; ?>" alt="">
						</div></a>
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
<div id="content"  style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;"> 
	<div class="container">
		<div id="content-wrap">
			<div class="col-md-12">
			<div class="headering-top">
			<div class="col-md-9">
			<h1 style="padding-bottom:0;"><?php the_title(); ?></h1>
			</div>
			<div class="col-md-3">
				<?php  get_template_part( 'loop-header' ); ?>
			</div>
		</div>
		</div>
			<div id="content" class="col-1" style="clear:both;">
				<div class="col-md-12">
					<?php  $page_category = get_field('player_category', $page->id);
							//echo $page_category;
				
						$args = array(
							'post_type' => 'people',
							'posts_per_page' => 999,
							'ignore_sticky_posts' => 1,
							'meta_key'			=> 'player_number',
							'orderby'			=> 'meta_value_num',
							'order'				=> 'ASC'
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
						
						?>
						
						<ul class="player-profiles-archive">
							<?php while ( $the_query->have_posts() ) {
							$the_query->the_post(); 
							$team_category = get_field('team_category');
							//echo $team_category;
							 if($page_category == $team_category) { ?>

							<div class="col-sm-3 col-md-2">
								<a class="ppa-link" href="<?php the_permalink(); ?>">
								<?php 				

										$player_image = get_field('player_image');
										if( $player_image ) {
											echo wp_get_attachment_image( $player_image, 'player-img' );
											}else{ ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/no_image_thumb.jpg" alt="">
											<?php } ?>
												
											<h4><?php echo get_field('player_number')." "; ?><?php the_title();?></h4>
												
								</a>
							</div>
							<?php } }  ?>
							
						</ul>

						<?php  } wp_reset_postdata(); ?>
				
				</div>
			</div><!-- end col-1 -->
		</div><!-- end row -->
	</div><!-- end of .container -->
	
</div><!-- end of .container -->


<?php get_footer(); ?>