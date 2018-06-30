<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<div class="container">

			<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title><?php wp_title( '&#124;', true, 'right' ); ?></title>

		<?php wp_head(); ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet">
		<script src="http://www.spulsecdn.net/js/ext_script_ddown.js" type="text/javascript"></script>
		<script src="http://www.sportingpulse.com/elite.cgi?e=5&d=Setup&p=elite_home&s=elite" type="text/javascript"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>

#mysticky-nav {background:url('<?php echo get_field('header_background','option');?>');background-position: top center;}

</style>
<div class="top-header" style="background:url('<?php echo get_field('header_background','option');?>');background-position: top center;"> 
	
<div class="col-md-12 top-club-logos">
<div class="container">
	
	<?php $top_logos = get_fields("top_logos","options"); ?>

	<?php if( have_rows('top_logos', 'options') ):?>
    <ul class="top_logos">
    <?php while ( have_rows('top_logos', 'options') ) : the_row(); ?>
        <li>
            <a href="<?php the_sub_field('url', 'options'); ?>">
                <img src="<?php the_sub_field('image', 'options'); ?>" />
                <span><?php the_sub_field('title', 'options'); ?> </span>
            </a>
        </li>
    <?php endwhile; ?>
    </ul>   
    <?php endif; ?>
</div>
</div>
	<div class="container">
	<div class="col-sm-7 col-xs-10 header-logo"> <a href="<?php echo home_url( ); ?>" class="top-logo"> <img src="<?php echo get_field('top_logo','option');?>"></a></div>

	<div class="col-sm-5 social-media-icon">
<!--
		<div class="social-search">
		
				<ul class="social-search-list clearfix">
					<?php 

					 $youtube = get_field('youtube', 'option');
					 $facebook = get_field('facebook', 'option');	
					 
					?>
					<li class="title"><span> Follow the Eagles on</span></li>
						<?php if(!empty($facebook)) { ?><li><a href="<?php echo get_field('facebook', 'option');?>" target="_blank"> <i class="fa fa-facebook-official" aria-hidden="true"></i> </a></li><?php } ?>
				
					<?php if(!empty($youtube)) { ?><li><a href="<?php echo get_field('youtube', 'option'); ?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i>
</a></li><?php } ?>
				
					
				</ul>
	
			</div>
-->
			<div class="sub-logos col-md-12 col-sm-12">
				<?php $header_right_logos = get_fields("header_right_logos","options"); ?>
				<?php if( have_rows('header_right_logos', 'options') ):?>
    <ul class="header_right_logos">
    <?php while ( have_rows('header_right_logos', 'options') ) : the_row(); ?>
        <li>
            <a href="<?php the_sub_field('link', 'options'); ?>">
                <img src="<?php the_sub_field('image', 'options'); ?>" />
                
            </a>
        </li>
    <?php endwhile; ?>
    </ul>   
    <?php endif; ?>
    
			</div>
	 </div>
</div>
	
</div>
<div id="nav-container" >


	<div class="container">

			<?php wp_nav_menu( array(
					'container'       => 'div',
					'container_class' => 'main-nav',
			
					'theme_location'  => 'top-menu',
					'menu'  => 'Top Menu'
				)
			);

			?>
		<div class="search-box">
				<form method="get" class="clearfix" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<div>
					<input type="text" size="28" value="<?php echo wp_specialchars( $s, 1 ); ?>" name="s" id="s" placeholder="Type search term here ..." />
					<input type="submit" id="searchsubmit" value="s" />
				</div>
			</form>
			<h4 style="color:#fff; margin-left: 60px;">Follow us on 
			<a href="http://localhost/portsea/" style="color:#fff;" >
			<i class="fab fa-facebook-square"></i>
			</a>
			<a href="http://localhost/portsea/" style="color:#fff;">
			<i class="fab fa-instagram"></i></a>
			
			
			</h4>
			</div>
	</div>
</div>

