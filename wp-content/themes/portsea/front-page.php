
<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Pages Template
 */

//get_header('home');
get_header();
 ?>

<?php  get_template_part( 'includes/home-panels' ); ?>
<!-- <div class="container">
	<div id="content-wrap" class="row">
		<div id="content" class="col-1">
		<?php  get_template_part( 'includes/content-blocks' ); ?>
		</div>
			
	</div>
</div> -->


<?php get_footer(); ?>
