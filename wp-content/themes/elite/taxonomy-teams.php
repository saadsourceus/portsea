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
						<h1 class="news-title">
							<?php
								$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
								echo "Term = ". $term->name;
							?>
						</h1>
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
	<div id="content-wrap" class="row">
		<div class="col-1">
			<div class="col-md-12 players">
		

		<?php
			$args = array(
				'post_type' => 'people',
				'teams' => $term,
				'roles' => 'player',
				'posts_per_page' => '999',
				'ignore_sticky_posts' => 1
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) { ?>
				<h2 class="heading">Player Profiles</h2>
				<ul class="profile-box">
				<?php while ( $the_query->have_posts() ) {
					$the_query->the_post();
		?>

			<li class="<?php if( 0 == $the_query->current_post || 1 == $the_query->current_post ){echo 'first-two-posts';}else{echo 'not-first-two-posts';}; ?> clearfix">
				
				<?php 
				 
				$image = get_field('player_image');
				 
				if( !empty($image) ) {
				 				 
					// thumbnail
					$size = 'medium';
					$thumb = $image['sizes'][ $size ];
				}else{
					$thumb = get_stylesheet_directory_uri().'/core/images/user.jpg';
				}
				?>
				

				 <div class="profile-thumb" style="background-image: url('<?php echo $thumb; ?>')">
				 	<?php if(get_field('player_number')){ ?><span class="player-number"><?php the_field('player_number'); ?></span><?php } ?>
				 	<?php if(get_field('player_link')){ ?><a href="<?php the_field('player_link'); ?>" class="profile-link" target="_blank"></a><?php } ?>
				 </div>

				 
				

				<a <?php if(get_field('player_link')){ ?>href="<?php the_field('player_link'); ?>"<?php } ?> class="profile-details">
					<span class="player-name"><?php the_title(); ?></span>
					<span class="player-position"><?php the_field('player_position'); ?></span>	
				</a>
				
			</li>


		<?php 
			} // end while
				echo '</ul>';
		wp_reset_postdata();
			} // end if
		?>
		
		</div>

		<!-- Coaches -->
		<div class="col-md-12 coaches">
		<?php
			$args = array(
				'post_type' => 'people',
				'teams' => $term,
				'roles' => 'coach',
				'posts_per_page' => '999',
				'ignore_sticky_posts' => 1
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) { ?>
				<h2 class="heading">Coaches</h2>
				<ul class="profile-box">
				<?php while ( $the_query->have_posts() ) {
					$the_query->the_post();
		?>

			<li class="<?php if( 0 == $the_query->current_post || 1 == $the_query->current_post ){echo 'first-two-posts';}else{echo 'not-first-two-posts';}; ?> clearfix">
				
				<?php 
				 
				$image = get_field('player_image');
				 
				if( !empty($image) ) {
				 				 
					// thumbnail
					$size = 'medium';
					$thumb = $image['sizes'][ $size ];
				}else{
					$thumb = get_stylesheet_directory_uri().'/core/images/user.jpg';
				}
				?>


				 <div class="profile-thumb" style="background-image: url('<?php echo $thumb; ?>')">
				 	<?php if(get_field('player_number')){ ?><span class="player-number"><?php the_field('player_number'); ?></span><?php } ?>
				 	<?php if(get_field('player_link')){ ?><a href="<?php the_field('player_link'); ?>" class="profile-link" target="_blank"></a><?php } ?>
				 </div>


				<a <?php if(get_field('player_link')){ ?>href="<?php the_field('player_link'); ?>"<?php } ?> class="profile-details">
					<span class="player-name"><?php the_title(); ?></span>
					<span class="player-position"><?php the_field('player_position'); ?></span>	
				</a>
				
			</li>


		<?php 
			} // end while
				echo '</ul>';
		wp_reset_postdata();
			} // end if
		?>


				</div>



		<!-- Staff -->
		<div class="col-md-12 staff">
		<?php
			$args = array(
				'post_type' => 'people',
				'teams' => $term,
				'roles' => 'staff',
				'posts_per_page' => '999',
				'ignore_sticky_posts' => 1
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) { ?>
				<h2 class="heading">Support Staff</h2>
				<ul class="staff-list">
				<?php while ( $the_query->have_posts() ) {
					$the_query->the_post();
		?>

			<li><?php the_title(); ?> - <?php the_field('player_position'); ?></li>


		<?php 
			} // end while
				echo '</ul>';
		wp_reset_postdata();
			} // end if
		?>


				</div>
			</div><!-- end col-1 -->
			<?php get_sidebar(); ?>
		</div><!-- end row -->
	</div><!-- end of #content -->
	<?php  get_template_part( 'includes/lower-section' ); ?>
	<script>
		jQuery( document ).ready(function( $ ) {
			$('.profile-link').hover(function(){
				$(this).closest('.profile-box li').find('.profile-details').toggleClass('hovered');;
			});
		});
	</script>
<?php get_footer(); ?>
