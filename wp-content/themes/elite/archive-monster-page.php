<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
  exit;
}

/*
 Template Name: Category Archive Monster
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
<div class="content-body">
  <div class="container">
    <div id="content-wrap" class="row">
      <div id="content" class="">
        <div class="col-md-12 all-news">
<?php 
$cat_args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'child_of' => 0
);

$categories =   get_categories($cat_args); 

foreach($categories as $category) { 
$exclude_cats  = array('fifa-news', 'oceania-football-news', 'news', 'featured-news' );

  if ( ! in_array( $category->slug, $exclude_cats ) )
  {
      echo '<div class="col-md-4 monster-box">';
      echo '<dl>';
      echo '<dt><h3><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></h3></dt>';
      echo do_shortcode('[panel_news category="'.$category->slug.'" posts="1"]' );
      echo '<dd class="view-all"> <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>View all posts in ' . $category->name.'</a></dd>';
      echo '</dl>';
      echo '</div>';
  }
} 
?>
        </div>
      </div><!-- end col-1 -->
    </div><!-- end row -->
  </div><!-- end of .container -->
</div><!-- end of .container -->