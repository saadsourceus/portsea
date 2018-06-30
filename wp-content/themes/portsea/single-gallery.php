<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>
  
   <div id="content" class="row" style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;">
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
			<div class="col-md-12 post-content">
    

           <?php 

$images = get_field('images');
//print_r($images);
if( $images ): ?>
    <ul style="text-align: center;
    padding-left: 0px;">
    
        <?php foreach( $images as $image ): ?>
                <div class="col-sm-6 col-md-3 single-gallery">
                <a href="<?php echo $image['url']; ?>" rel="lightbox">
                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" style="max-height: 200px;padding: 20px 0;" />
                </a>
               </div>
               <?php $counter++; ?>
        <?php endforeach;
       
    ?> </ul>
<?php endif; ?>
	</div><!-- end row -->
</div>
</div><!-- end of .container -->
</div>
</div>
<?php get_footer(); ?>
