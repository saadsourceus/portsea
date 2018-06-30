

<div class="container">
<div class="col-md-9">
<h3> Videos</h3>
  <div class="video-slider">
          <?php echo do_shortcode('[aggro_social_list youtube="footyEFL" size=12 noscroll=1 theme=7 ]'); 
          //echo do_shortcode('[youtube-user count="1"]'); ?>
  </div>
  <div class="video-thumbs">
        <?php echo do_shortcode('[aggro_social_list youtube="footyEFL" size=12 noscroll=1 theme=8 ]'); 
        //echo do_shortcode('[youtube-user count="5"]');?>
      </div>
      <div class="more-vd">
      <a href="#" class="yellow-btn" title="More Photos">View All Videos<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
      </div>
</div>

<div class="col-md-3 gallery">
<h3> Photo Gallery</h3>

 <?php                          
$args = array(
            'post_type' => 'gallery',
            'posts_per_page' => '3'
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
?>
<div class="col col-right">
    
    <ul class="list-gallery">
        <?php 
        while ( $the_query->have_posts() ) {
            $the_query->the_post(); ?>

        <li><a href="<?php the_permalink(); ?>">
         <?php   if ( has_post_thumbnail()) {
                $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
               $slider_img = $thumb_image_url[0];
               echo "<img src='".$slider_img."'>";
            
            } ?>
                
          
            <span class="gallery-title"><?php the_title(); ?></span></a></li>

        <?php } wp_reset_postdata(); ?>

    </ul>
    
  
    
</div>
  <div class="more-photo">
    <a href="<?php echo home_url(); ?>/more-photos" class="yellow-btn" title="More Photos">View All Photos<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
  </div>
<?php }  ?>
</div>




</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
  // YOU TUBE

  $('.video-slider #aggro-container').slick({
    slide: '.aggroItem',
    asNavFor: '.video-thumbs #aggro-container',
    arrows: false,
    infinite: true
  });


  $('.video-thumbs #aggro-container').slick({
    slide: '.aggroItem',
    asNavFor: '.video-slider #aggro-container',
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    focusOnSelect: true,
    centerMode: false,
    centerPadding: '10px',
    infinite: true,
    dots: false
  });
});
</script>
