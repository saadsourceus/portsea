<?php
/*
Custom Metaboxes - Refer to https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
*/

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'metabox/init.php';

}

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	
	$meta_boxes['test_metabox'] = array(
			'id'         => 'test_metabox',
			'title'      => __( 'Page Options', 'cmb' ),
			'pages'      => array( 'page', ), // Post type
			'context'    => 'side',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
			'fields'     => array(
				array(
					'name' => __( 'Hide Heading', 'cmb' ),
					'id'   => $prefix . 'hide_heading',
					'type' => 'checkbox',
					),
			),
		);


	
	
	// Add other metaboxes as needed

	return $meta_boxes;
}
?>