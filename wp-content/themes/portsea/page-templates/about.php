<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}


/*
 * Template Name: About
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



<div id="content-wrap"  style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;background-size: cover;"> 
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
				
						<?php $id2 = get_the_ID();

							 $count = 1;
						?>
			
					<?php $args = array(
							'sort_order' => 'asc',
							'sort_column' => 'post_title',
							'hierarchical' => 1,
							'exclude' => '',
							'include' => '',
							'meta_key' => '',
							'meta_value' => '',
							'authors' => '',
							'child_of' => $id2,
							'parent' => -1,
							'exclude_tree' => '',
							'number' => '',
							'offset' => 0,
							'post_type' => 'page',
							'post_status' => 'publish'
						); 
						$pages = get_pages($args); 

						//print_r($pages);
						
						foreach( $pages as $page ) {		

					?>	
						

						<div class="col-sm-6 col-md-3 news-box">
							<?php  $id = $page->ID;?>
							<?php if ( has_post_thumbnail($id)) {
        $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full');
        $slider_img = $thumb_image_url[0];
      } else {

      		 $slider_img = get_field('default_image','option');
      } ?>
		 <div class="feature-img"><img src="<?php echo $slider_img;?>" alt="" /> </div>
		<a href="<?php echo get_page_link( $page->ID ); ?>">
			
			<h4><?php echo $page->post_title;
			//echo softTrim(the_title(), 6);?></h4></a>
			<div class="rel-article-content"><?php 

			$content = $page->post_content;

			$content = substr($content, 0, 100);

				echo $content;?>

				<p class="more-link"> <a href="<?php echo get_page_link( $page->ID ); ?>"> [ Read More ] </a> </p>
		</div>
		
		
		</div>		
					<?php if($count % 4 == 0 ) { ?>

					<div class="sponsors-divider"><div class="col-md-12"><img src="<?php echo get_site_url();?>/wp-content/themes/casey-basketball/core/images/news-divider.jpg"/></div></div>

					 	<?php } ?>
						
					<?php

						$count++;
								}	?>
							
				
				</div>
			</div><!-- end col-1 -->
		</div><!-- end row -->
	</div><!-- end of .container -->
	
</div><!-- end of .container -->


<?php get_footer(); ?>