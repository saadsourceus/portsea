<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
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
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title><?php wp_title( '&#124;', true, 'right' ); ?></title>


		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

	<div id="header">
		<div id="nav-container">
			<div class="container">
		
			<div id="logo"><a href="<?php echo home_url(); ?>"></a></div>
		<?php wp_nav_menu( array(
							   'container'       => 'div',
							   'container_class' => 'main-nav',
							   'fallback_cb'     => 'responsive_fallback_menu',
							   'theme_location'  => 'top-menu'
						   )
		);
		?>		
	
	</div>
</div>


		

	</div><!-- end of #header -->