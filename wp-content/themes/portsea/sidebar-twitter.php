<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
//print_r($landing_page_object);
?>

<div id="sidebar" class="">

	<?php if ( is_active_sidebar( 'twitter-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'twitter-sidebar' ); ?>
	<?php endif; ?>
	
</div>