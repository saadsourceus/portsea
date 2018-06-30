<?php
class ewb_sidebar_links_inner_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
				'ewb_sidebar_links_inner_widget',
				__('CB Sidebar Links Widget - Inner', 'wgfnc_tiles_widget_domain'),
				array( 'description' => __( 'Display external links in sidebar', 'ewb_sidebar_links_widget_domain' ), )
		);
	}

	function form( $instance ) {
    }
     
    function update( $new_instance, $old_instance ) {       
    }

	// Creating widget front-end
	public function widget( $args, $instance ) {
		get_template_part( 'template-parts/sidebar', 'external-links-inner');
	}
}

function sidebar_external_links_inner_widget() {
	register_widget( 'ewb_sidebar_links_inner_widget' );
}

add_action( 'widgets_init', 'sidebar_external_links_inner_widget' );

?>