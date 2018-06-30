<?php
 
// check if the flexible content field has rows of data
if( have_rows('content_blocks') ):
 
     // loop through the rows of data
    while ( have_rows('content_blocks') ) : the_row();
 
        if( get_row_layout() == 'youtube' ): ?>
        <div class="col-md-12">
        	<?php
        	$youtube_chanel = get_sub_field('youtube_id');
        	$youtube_size = get_sub_field('video_thumbs') - 1;
        	if(get_sub_field('channel_or_playlist') == 'channel'){
        		include(locate_template('includes/section-aggro-youtube.php')); 
        	}
        	if(get_sub_field('channel_or_playlist') == 'playlist'){
        		include(locate_template('includes/section-aggro-youtube-pl.php')); 
        	}
        	?>
        </div>
        <!-- End  -->

        <?php elseif( get_row_layout() == 'custom_section' ): ?>
		<div class="col-md-12">
			<?php
			$custom_field_image = get_sub_field('section_image');
			$custom_section_text = get_sub_field('section_text');
			include(locate_template('includes/section-free-text.php')); 
			?>
		</div>
		<!-- End  -->

		<?php elseif( get_row_layout() == 'gallery' ): ?>
		<div class="col-md-12 clearfix">
			<?php
			$images = get_sub_field('gallery_images');
			include(locate_template('includes/section-gallery.php')); 
			?>
		</div>
		<!-- End  -->

    <?php elseif( get_row_layout() == 'latest_news' ): ?>
        <div class="col-md-12 clearfix">
            <?php
            $news_category = get_sub_field('news_category');
            include(locate_template('includes/section-latest-news.php')); 
            ?>
        </div>
        <!-- End  -->
    <?php elseif( get_row_layout() == 'medium_news' ): ?>
        <div class="col-md-12 clearfix">
            <?php
            $news_category = get_sub_field('news_category');
            include(locate_template('includes/section-medium-news.php')); 
            ?>
        </div>
        <!-- End  -->
    <?php elseif( get_row_layout() == 'basic_slider' ): ?>
        <div class="col-md-12 clearfix">
            <?php
            $news_category = get_sub_field('news_category');
            include(locate_template('includes/section-basic-slider.php')); 
            ?>
        </div>
        <!-- End  -->
		
    <?php elseif( get_row_layout() == 'more_news' ): ?>
        <div class="col-md-12 clearfix">
            <?php
            include(locate_template('includes/section-more-news.php')); 
            ?>
        </div>
        <!-- End  -->

          <?php elseif( get_row_layout() == 'feature_section' ): ?>
      </div>
  </div>
  </div>
  </div>
        <div class="col-md-12 clearfix feature">
            <?php
            $news_category = get_sub_field('news_category');
            include(locate_template('includes/feature-comp.php')); 
            ?>
        </div>
        <div class="container">
            <div id="content-wrap" class="row">
       <div id="content">
            <div class="col-md-12">

        <?php endif;
 
    endwhile;
 
else :
 
    // no layouts found
 
endif;
 
?>