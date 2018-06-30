<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>
<?php  
	include(locate_template('includes/banners.php')); 
?>

<div id="content" class="container">
	<div id="main-content" class="row">
		<div class="col-md-12">

	<div id="post-0" class="error404">
		

		<div class="post-entry">

			<?php get_template_part('loop-no-posts' ); ?>

		</div>
		<!-- end of .post-entry -->

		
	</div>

			</div><!-- end col-md-12 -->
		</div><!-- end row -->
	</div><!-- end of #content -->
<?php get_footer(); ?>
