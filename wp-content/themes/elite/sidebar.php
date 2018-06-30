<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
//print_r($landing_page_object);
?>

<div id="sidebar" class="col-2">
	<?php 
	global $landing_page_object;

	$is_landing = false;
	$lid = "";
	
	if ( is_singular( 'landing' ) ) {
		$is_landing = true;
		$lid = $post->ID;
	}
	//$landing_page_sidebar = get_field('landing_page_relationship');
	if (isset($landing_page_object->ID)){
		$is_landing = true;
		$lid = $landing_page_object->ID;
	}
		$term_args=array(
		  'hide_empty' => false,
		  'orderby' => 'name',
		  'order' => 'ASC'
		);

		$terms = get_the_terms($lid, "landing_sidebar");

		if($is_landing == true) {
			$is_landing = false;
		    foreach ( $terms as $term ) {
				$is_landing = true;
			  	if ( is_active_sidebar( $term->slug ) ) : 
					dynamic_sidebar( $term->slug ); 
				endif;
		    }
		}
		
		if ( $is_landing != true ) : 
			if ( is_active_sidebar( 'main-sidebar' ) ) : 
				dynamic_sidebar( 'main-sidebar' ); 
			endif;
		endif;
	?>	
</div>