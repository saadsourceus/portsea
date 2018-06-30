<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
//print_r($landing_page_object);
?>

<div id="sidebar" class="">

	<?php if ( is_active_sidebar( 'facebook-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'facebook-sidebar' ); ?>
	<?php endif; ?>
	
</div>