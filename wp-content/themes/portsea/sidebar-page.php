<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
//print_r($landing_page_object);
?>

<div id="sidebar" class=" col-md-3">

	<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
	<?php endif; ?>
	
</div>