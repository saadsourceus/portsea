
<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
/*
 Template Name: State Basketball League
 */
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

<div id="hero" class="" >
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
					<?php if( is_category() || is_tag() || is_author() || is_date() ) { ?>
						<h1 class="news-title">
							<?php
							if( is_day() ) :
								printf( __( 'Daily Archives: %s', 'responsive' ), '<span>' . get_the_date() . '</span>' );
							elseif( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
							elseif( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
							elseif( is_category()) :
								printf(__('%s'), single_cat_title('', false));
							else :
								_e( 'News Archives', 'responsive' );
							endif;
							?>
						</h1>
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
<div id="content"  style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;">
	<div class="container">
	<div id="main-content">
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
			<div class="col-md-12">
				   <?php                  
                                        $rows = get_field('match_centre');
                                        if($rows) { ?>
<div class="fixture-sec">
 

    
      <select name="sblock4_dropdown_name" class="SP_ext_scripts" id="sblock4_dropdown">
                                                      
                                      <?php foreach($rows as $row) { ?>
                                        <option value="http://www.sportingpulse.com/ext/external_schedule.cgi?c=<?php echo $row['comp_id'] ; ?>&round=<?php echo $row['round_number'] ; ?>&pool=<?php echo $row['time_of_season'] ; ?>&cols=&fix=1&json=1"><?php echo $row['comp_name'] ; ?></option>
                                        <?php } ?>
                                                         
                                              
                                      
                  </select>   
                  
           <div class="fixure-slider">

          <div class="widget_match_center">
                <div class="score-dtl">
                    <div class="timing-detail">
                             <section class="widget_match_center_content">    
                             <section id="sblock4_wrapper" name="sblock4_dropdown_name">
                             </section>
                             </section>  
                    </div>
                </div> 
            </div> <!-- End of widget_match_center -->
  
</div>

	</div>
	  <?php } ?>
	<?php 
  $rows = get_field('match_centre');
    if($rows) { ?>
	<div class="col-md-8 tiles">
	<?php } else { ?>

	<div class="col-md-9 tiles">

	<?php }	?>
	<?php $banners = get_field('banners');
		if($banners){
			foreach($banners as $banner)
			{
				echo "<div class='col-sm-6 boxes'><a href=".$banner['link']."> <img src='".$banner['image']."' / >  </a> </div>";
			}
		}
	?>
	
	</div>
<?php 
  $rows = get_field('match_centre');
    if($rows) { ?>
	<div class="col-md-4">
		 <div class="comp-ladder">
  <div class="ladder-inner">
 
  <?php $leagues = get_field('match_centre'); ?>
    <select id="selectme4" class="SP_ext_scripts">  
            <option value="" selected="selected">Competition</option>                
            <?php
                  $count2 = 0;              
                 foreach($leagues as $league2) {
                            
                     $count2++;
                     $selectcounter++; 
                     $comp_name =  $league2['comp_name'];
                     $comp_name = str_replace("/", "-", $comp_name);
                     $comp_name = stripslashes($comp_name);
                     $comp_name = preg_replace('/\s+/', '',  $comp_name);?>
                     <option value="ladder_6<?php echo $count2;?>"><?php echo $league2['comp_name'] ; ?></option>
             <?php 
                    }
            ?>
    </select>
     <?php $fixs = get_field('match_centre');
                   
          if($fixs) {   
                      
                $fixtures_counter = 0;       
                            
                 foreach($fixs as $fix2 ) {
                        $fixtures_counter++;
                         $count++;
                         $comp_name2 =  $fix2['comp_name'];
                         $comp_name2 = str_replace("/", "-", $comp_name2);
                         $comp_name2 = stripslashes($comp_name2);
                         $comp_name2 = preg_replace('/\s+/', '',  $comp_name2);
             ?>  
                       

       <div class="ladder" id="ladder_6<?php echo $fixtures_counter;?>">
           
          <section class="widget_match_center_heading">
            
                <select style="display:none" name="sblock5<?php echo $fixtures_counter; ?>0_dropdown_name" class="SP_ext_scripts" id="sblock5<?php echo $fixtures_counter; ?>0_dropdown">             
                  <option value=""></option>                 
                  <option value="http://www.sportingpulse.com/ext/external_ladder.cgi?c=<?php echo $fix2['comp_id']; ?>&pool=-1&round=0&pool=-<?php echo $fix2['time_of_season1'] ; ?>&cols=<?php echo $fix2['ladder_col']; ?>&fix=0&json=1"><?php echo $fix2['comp_name']; ?></option>
             </select> 
          </section>  
              
              <section id="sblock5<?php echo $fixtures_counter; ?>0_wrapper" name="sblock5<?php echo $fixtures_counter; ?>0_dropdown_name" class="sblock">
                </section>
         

        </div> 


<?php } } ?>
    </div>
      </div>
	</div>
		<?php } else { ?>



			<?php get_sidebar(); ?> 


		<?php }?>	
			<!-- end col-1 -->
			
		</div><!-- end row -->
		</div>
	</div><!-- end of #content -->

<?php get_footer(); ?>
