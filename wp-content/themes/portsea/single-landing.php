<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}



get_header(); ?>

<?php
// Custom header as background image
$image = get_field('custom_header_image');
if( !empty($image) ){ ?>
<style>
.custom-header-img {
	background-image: url('<?php echo $image['sizes'][ 'custom-header' ]; ?>');
}
</style>
<?php } ?>
	<?php  get_template_part( 'includes/banners' ); ?>

<div id="hero" class="landing-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?php if(!wp_is_mobile()){ ?>
				<a href="<?php echo get_permalink( $post->ID);?>"><div class="custom-header-img"></div></a>
			<?php } else { ?>
				<a href="<?php echo get_permalink( $post->ID);?>"><div class="custom-header-img hidden-xs hidden-sm"></div></a>
			<?php
			$image_mobile = get_field('custom_header_image_mobile');
				if( !empty($image) ){ ?>
				<a href="<?php echo get_permalink( $post->ID);?>"><img class="custom-header-img-mobile img-responsive hidden-md hidden-lg" src="<?php echo $image_mobile['sizes'][ 'custom-header-mobile' ]; ?>" alt="<?php echo $image_mobile['alt']; ?>" /></a>
				<?php } ?>
			<?php } ?>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
			
			<div class="row">	
				<div class="col-md-12">
						<?php  
						if(get_field('match_centre_type') == 1) {
							get_template_part( 'includes/match-centre' );
						}elseif(get_field('match_centre_type') == 2){							
							get_template_part( 'includes/live-stats-mc' );
						}
						?>
				</div><!-- /.col-md-12 -->
			</div>
	</div>
	
</div>
<?php
if(get_field('sub_menu') !=""){
?>
<div class="landing-nav">
	<div class="container">
		<?php $menu_id = get_field('sub_menu'); ?>
		<?php wp_nav_menu( array(
							   'container'       => 'div',
							   'container_class' => 'landing-menu',
							   'fallback_cb'     => 'responsive_fallback_menu',
							   'menu'  => $menu_id
						   )
		);
		?>		
	</div>
</div>
<?php } ?>
			<?php
			$panel_category = get_field('panel_category'); 
			if ($panel_category != "") {				
				get_template_part( 'includes/club-logos' ); 
				get_template_part( 'includes/home-panels' );
				get_template_part( 'includes/feature-comp' );
				

			}
	?>
	<div class="landing-page">
<div class="container">
	<?php
			if ($panel_category == "") {				
				get_template_part( 'includes/club-logos' ); 
				//get_template_part( 'includes/feature-comp' ); 
			}
	?>
	<div id="content-wrap" class="row">
		<div id="content">
			<div class="col-md-12">
			<?php
			if ($panel_category == "") {				
				get_template_part( 'includes/content-blocks' ); 

			}
			?>
		</div>
		</div><!-- end col-1 -->
			<?php 
			if ($panel_category == "") {				
				//get_sidebar(); 
			}
				?>
	</div><!-- end row -->
	
	<?php 
	// no default values. using these as examples


	
	
?>
<?php 

$term_args=array(
  'hide_empty' => false,
  'orderby' => 'name',
  'order' => 'ASC'
);

	$terms = get_terms("landing_sidebar", $term_args);
	//print_r($terms);
	
    foreach ( $terms as $term ) {
      // echo "<li>" . $term->name . "</li>";
       
    }

	?>
</div><!-- end of .container -->
</div>


<?php get_footer('landing'); ?>