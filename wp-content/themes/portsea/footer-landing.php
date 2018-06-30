<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="news-sep2"></div>

<?php  //get_template_part( 'includes/lower-section' ); ?>

<?php  
$sponsors = get_field('display_sponsors'); 
//print_r($sponsors);
  if( $sponsors == 'show' ) {
		get_template_part( 'includes/sponsors' ); 

} ?>
<?php  
$sponsors = get_field('display_social_media'); 
//print_r($sponsors);
  if( $sponsors == 'show1' ) {
		 get_template_part( 'includes/social-media-box' ); 

} ?>


<div id="footer" style="<?php if( get_field('footer_background__image','option') ): ?> background:url('<?php the_field('footer_background__image','option')['url']; ?>');<?php endif; ?>">

	<div class="container panel-content">
		<div class="scroller"></div>
<div id="footer-sep"></div>	<div class="footer-inner">
	<div class="container">
		<div class="row footer-menus">
		<?php get_template_part( 'includes/mega-menu' ); ?>
		</div>
	</div>
	</div>
</div>
</div>


<div class="footer-bottom">

	<div class="container panel-content">
		<div class="scroller"></div>
	<div class="container">
		<div class="row footer-heading">
			<div class="col-md-1">
				 <a class="header-logo" href="http://www.nzfootball.co.nz/"><img src="http://www.nzfootball.co.nz/wp-content/themes/nzf/core/images/nzf-footer-logo.png" alt=""></a>
			</div>
			<div class="col-md-8">
				<h1>nzfootball.co.nz</h1>
			</div>
			<div class="col-md-3">
				<?php  get_template_part( 'includes/logos2' ); ?>
				
			</div>
		</div>
		<div class="container">
			 <?php  if ( has_nav_menu( 'footer-menu' ) ) {
 wp_nav_menu( array(
		'container'       => 'div',
		'container_class' => 'top-nav',
		'fallback_cb'     => 'responsive_fallback_menu',
		'theme_location'  => 'footer-menu',
		'menu'     => 'Footer Menu'
	)
);
}?>
	</div>
           
		

	</div>


</div>

</div>
<div class="footer-last">
	<div class="container">
<div class="row">
			<div class="col-md-5">
				<p>&copy; Copyright 1994 - <?php echo date('Y'); ?> <?php echo bloginfo('site_title'); ?>. All rights reserved.</p>
			</div>
			<div class="col-md-5">
				 <?php  if ( has_nav_menu( 'footer-bottom-menu' ) ) {
			wp_nav_menu( array(
		'container'       => 'False',
		'container_class' => 'top-nav1',
		'fallback_cb'     => 'responsive_fallback_menu',
		'theme_location'  => 'footer-bottom-menu',
		'menu'     => 'Footer Bottom Menu'
	)
);
}?>
			</div>
			<div class="col-md-2 fsp-link">
				<a href="http://www.foxsportspulse.com/" style="padding:0px;"><img src="<?php bloginfo('template_directory'); ?>/core/images/fsplogo_footer_darkbg.png" alt="" ></a>
			</div>
		</div>
  </div>

</div>
<?php wp_footer(); ?>
<?php 
	if(is_front_page()) { ?>
		<script src="http://www.sportingpulse.com/elite.cgi?e=104&d=TagManagement&p=elite_home&s=elite" type="text/javascript"></script>
	<?php }else{ ?>
		<script src="http://www.sportingpulse.com/elite.cgi?e=104&d=TagManagement&p=elite_internal&s=elite" type="text/javascript"></script>
<?php }	?>
<script>
	new UISearch( document.getElementById( 'sb-search' ) );
</script>
