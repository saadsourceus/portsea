
<?php $category = get_field('slider_category','option');?>
           
          <?php   $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '5',
                    'category_name' => $category,
                    'ignore_sticky_posts' => 1
                            
                );
                $the_query = new WP_Query( $args ); ?>
               
                    <div class="container">
                    <div class="row">
                     <div class="banner col-md-8 col-sm-8">
                <div class="slick-slider">
                    <?php
                   if ( $the_query->have_posts() ) 
                {
                            
                while ( $the_query->have_posts() ) { 
                           $the_query->the_post();  
                           if( has_post_thumbnail() ) { 
          
                     $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                     $image = $thumb_image_url[0];
                                         
                         }

                           ?>
                       
                            <div data-nav="<?php echo the_title(); ?>" >
                                <div class="banner-img">
                                
                                       <img src="<?php echo $image; ?>" alt="" style="width:100%;"/>
                               
                                <div class="banner-content">
                                 
                                       
                                            <a href="<?php the_permalink(); ?>" class="link-content">
                                                <h2><?php echo the_title(); ?></h2>
                                                <p  class="white" style="margin-left: 25px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <a href="http://localhost/portsea/2018/04/27/big-v-round-8-jae-blake-dickinsons-200th-games/" type="button"><button class="btn btn2" >Read More</button></a>
                                                
                                          
                                            </a>
                                        
                                    
                                </div>
                                 </div>
                            </div>

                            <?php
                        }
                    }
                    ?> 
                </div> <!-- end slick-slider -->


                </div>
                
    <div class="col-md-4 col-sm-3 facebook-social">
    <div class="fb-page" data-href="https://www.facebook.com/portsea/" data-tabs="timeline" data-width="398" data-height="685px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/portsea/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/portsea/">Portsea</a></blockquote></div>
	</div>

    <div class="col-md-4 col-sm-3 facebook-social-md">
    <div class="fb-page" data-href="https://www.facebook.com/portsea/" data-tabs="timeline" data-width="305" data-height="525" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/portsea/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/portsea/">Portsea</a></blockquote></div>
  </div>
                
                </div> <!-- end banner col-md-9 -->
                
            <?php get_sidebar('external-links'); ?>
        </div>
           
            <script type="text/javascript">
        jQuery(document).ready(function($){          


 $('.slick-slider').slick({
        autoplay: true, 
//        fade: true,
      arrows: true,
//        dots: true,
//        pauseOnHover: true,

        customPaging: function (slider, i) {
            var navText = $(slider.$slides[i]).data('nav');
            return '<a>' + navText + '</a>';
        }
    });
    
  });
      
</script>
   