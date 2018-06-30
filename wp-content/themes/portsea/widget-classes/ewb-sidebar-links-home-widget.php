<?php
class ewb_sidebar_links_home_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
				'ewb_sidebar_links_home_widget',
				__('CB Sidebar Links Widget - Home', 'wgfnc_tiles_widget_domain'),
				array( 'description' => __( 'Display external links in sidebar', 'ewb_sidebar_links_widget_domain' ), )
		);
	}

	function form( $instance ) {
    }
     
    function update( $new_instance, $old_instance ) {       
    }

	// Creating widget front-end
	public function widget( $args, $instance ) {
		get_template_part( 'template-parts/sidebar', 'external-links');
	}
}

function sidebar_external_links_widget() {
	register_widget( 'ewb_sidebar_links_home_widget' );
}

add_action( 'widgets_init', 'sidebar_external_links_widget' );

?>