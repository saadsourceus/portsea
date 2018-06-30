<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
//print_r($landing_page_object);
?>

<div id="sidebar" class=" col-md-3 col-2">
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'archives-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'archives-sidebar' ); ?>
	<?php endif; ?>
	
</div>