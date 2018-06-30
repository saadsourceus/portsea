<html>
<body>

<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="news-sep2"></div>

<?php  //get_template_part( 'includes/lower-section' ); ?>




<div class="container">
<div class="row">
<div class="footer">
	<div class="container">
		<div class="col-sm-6 col-xs-12 col-md-2 quick-links"> 
		<h4><?php echo get_field('footer_menu_heading','option'); ?> </h4>
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
	

        <div class="col-sm-6 col-xs-12  col-md-2"> 
        <h4> Patrols</h4> 
        <ul style="list-style-type:none ;padding-left: 1px">
            <li>Protrol Information</li>
            <li>Gallery</li>
            <li>Beach Information</li>
            <li>Surf Safety</li>
        </ul>  
        </div>


        <div class="col-sm-6 col-xs-12  col-md-2"> 
        <h4> Events</h4> 
        <ul style="list-style-type:none ;padding-left: 1px">
            <li>Portsea Swim Classic</li>
            <li>Peir Perignon</li>
        </ul>  
        </div>
    
        <div class="col-sm-6 col-xs-12  col-md-2"> 
        <h4> Education</h4>
        <ul style="list-style-type:none ;padding-left: 1px">
            <li>Lifesaving Pathways</li>
            <li>Skill Maintenance</li>
            <li>Part Time Bronze Course </li>
            <li>Bronze Camp</li>
            <li>Cadet Camp</li>
            <li>Silver Camp</li>
            <li>Nippers</li>
        </ul>   
        </div>

        <div class="col-sm-6 col-xs-12  col-md-2"> 
        <h4> Competition</h4> 
        <ul style="list-style-type:none ;padding-left: 1px">
            <li>Types of Competition</li>
            <li>Senior Competition</li>
            <li>IRB Competition </li>
            <li>Surfboat Rowing Competition</li>
            <li>Masters Competition</li>
            <li>Nippers Competition</li>
        </ul>   
        </div>
<!--
		<div class="col-sm-6 col-xs-12  col-md-2"> 
		<h4> Follow Us</h4>
		<?php $facebook  = get_field('facebook', 'option');
				$youtube = get_field('youtube', 'option'); ?>
			<ul class="footer-social">
			<?php if(!empty($facebook)) {?>
			<li><a href="<?php echo get_field('facebook', 'option'); ?>"> <i class="fa fa-facebook-official" aria-hidden="true"></i> <span>Facebook</span></a></li><?php }?>
			<?php if(!empty($youtube)) {?><li><a href="<?php echo get_field('youtube', 'option'); ?>"> <i class="fa fa-youtube-square" aria-hidden="true"></i><span>Youtbe</span> </a></li>
			<?php  } ?>
		
		
			</ul>
		</div>
-->
			
<!--
		<div class="col-sm-6 col-md-3"> 
		<h4> Contact Us</h4>
		<div class="address"><?php echo get_field('address','option');?> </div>
		<div class="phone"> <b> Phone: </b><?php echo get_field('phone','option');?></div>
		<div class="email"> <b> Email: </b><a href="mailto:<?php echo get_field('email','option');?>" style="color:#FFF;"><?php echo get_field('email','option');?></a></div>
		</div>
-->
	
	
	
	</div>

</div>

</div>
</div>

<div class="footer-last">
	

	<div class="footer-logo">
	<div class="container">
		
		<div class="col-md-5"> 
			 <div class="copyright-text"><?php echo get_field('copyright_text','option'); ?> </div>
		</div>

		<div class="col-md-7 stg-footer"> 
<script type="text/javascript" src="http://www-static.spulsecdn.net/js/elite/footer_logo.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function() {
					jQuery("#splogo").footerLogo();
				});
				</script>
				<div id="splogo"></div>

				
		</div>




	</div>

	</div>
</div>

<?php wp_footer(); ?>
<script>
	new UISearch( document.getElementById( 'sb-search' ) );
</script>
</body>
</html>