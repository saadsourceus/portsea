<?php

add_action('cmb2_meta_boxes','hashbar_wpnb_meta_boxes');
if( ! function_exists('hashbar_wpnb_meta_boxes') ){

	function hashbar_wpnb_meta_boxes(){
		$prefix = '_wphash_';

		$meta_box = new_cmb2_box( array(
			'id'           		 => $prefix . 'notification_options',
			'title'        		 => esc_html__( 'Notification Bar Options', 'hashbar' ),
			'object_types' 		 => array('wphash_ntf_bar'),
			'context'      		 => 'normal',
			'priority'     		 => 'high',
			'show_names'         => true,
		) );

		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_where_to_show',
			'name'        		 => esc_html__( 'Choose option where to show', 'hashbar' ),
			'type'        		 => 'radio_inline',
			'options'     		 => array(
				'everywhere'    => esc_html__( 'Everywhere', 'hashbar' ),
				'custom'       	=> esc_html__( 'Custom', 'hashbar' ),
				'none'       	=> esc_html__( 'Don\'t show', 'hashbar' ),
			),
			'default'     		 => 'everywhere',
		) );

		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_where_to_show_custom',
			'name'        		 => esc_html__( 'Custom options where to show', 'hashbar' ),
			'type'        		 => 'multicheck',
			'options'     		 => array(
				'posts'    => esc_html__( 'Posts', 'hashbar' ),
				'page'       	=> esc_html__( 'Pages', 'hashbar' ),
				'home'       	=> esc_html__( 'Home', 'hashbar' ),
			),
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_position',
			'name'        		 => esc_html__( 'Positioning', 'hashbar' ),
			'type'        		 => 'radio_inline',
			'options'     		 => array(
				'ht-n-left'    		=> esc_html__( 'Left', 'hashbar' ),
				'ht-n-top'       	=> esc_html__( 'Top', 'hashbar' ),
				'ht-n-right'       	=> esc_html__( 'Right', 'hashbar' ),
				'ht-n-bottom'       	=> esc_html__( 'Bottom', 'hashbar' ),
			),
			'default'     		 => 'ht-n-top',
			'desc' 				 => wp_kses( __( 'Left means the notification bar is always fixed at the left <br> Top means the notificatin bar is always fixed at the top of the page. <br> Right means the notification bar is always fixed at the right<br> Bottom means the notificatin bar is always visible at the bottom of the page', 'hashbar' ), array( 'br' => array() ) ),
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_display',
			'name'        		 => esc_html__( 'Display', 'hashbar' ),
			'type'        		 => 'radio_inline',
			'options'     		 => array(
				'ht-n-open'    		=> esc_html__( 'Open', 'hashbar' ),
				'ht-n-close'       	=> esc_html__( 'Close', 'hashbar' ),
			),
			'default'     		 => 'ht-n-open',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_on_mobile',
			'name'        		 => esc_html__( 'Enable / Disable On Mobile Device', 'hashbar' ),
			'type'        		 => 'radio_inline',
			'options'     		 => array(
				'on'    		=> esc_html__( 'Enable', 'hashbar' ),
				'off'       	=> esc_html__( 'Disable', 'hashbar' ),
			),
			'default'     		 => 'on',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_content_width',
			'name'        		 => esc_html__( 'Content Width', 'hashbar' ),
			'type'        		 => 'radio_inline',
			'options'     		 => array(
				'default-width'    	=> esc_html__( 'Default', 'hashbar' ),
				'ht-n-full-width'       	=> esc_html__( 'Full Width', 'hashbar' ),
			),
			'default'     		 => 'default-width',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_content_bg_color',
			'name'        		 => esc_html__( 'Content Background color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_content_bg_image',
			'name'        		 => esc_html__( 'Content Background Image', 'hashbar' ),
			'type'        		 => 'file',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_content_text_color',
			'name'        		 => esc_html__( 'Content Text Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_content_bg_opcacity',
			'name'        		 => esc_html__( 'Opacity', 'hashbar' ),
			'type'        		 => 'text',
		) );

		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_close_button',
			'name'        		 => esc_html__( 'Enable / Disable Close Button', 'hashbar' ),
			'type'        		 => 'radio_inline',
			'options'     		 => array(
				'on'    	=> esc_html__( 'Enable', 'hashbar' ),
				'off'   	=> esc_html__( 'Disable', 'hashbar' ),
			),
			'default'     		 => 'on',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_close_button_text',
			'name'        		 => esc_html__( 'Close Button Text', 'hashbar' ),
			'type'        		 => 'text',
			'before_display'        	 => '<h3 style="border-bottom: 1px solid #e9e9e9;padding-bottom: 1em;">Close Button Options</h3>',
			'desc'		 	     => esc_html__( 'Only works with left and right position', 'hashbar' ),
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_open_button_text',
			'name'        		 => esc_html__( 'Open Button Text', 'hashbar' ),
			'type'        		 => 'text',
			'desc'				 => esc_html__( 'Leave it empty if you don\'t want text instead of arrow icon', 'hashbar' ),
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_close_button_bg_color',
			'name'        		 => esc_html__( 'Close Button BG Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_close_button_color',
			'name'        		 => esc_html__( 'Close Button Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_close_button_hover_color',
			'name'        		 => esc_html__( 'Close Button Hover Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_close_button_hover_bg_color',
			'name'        		 => esc_html__( 'Close Button Hover BG Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_arrow_bg_color',
			'name'        		 => esc_html__( 'Arrow Bg Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_arrow_color',
			'name'        		 => esc_html__( 'Arrow Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_arrow_hover_color',
			'name'        		 => esc_html__( 'Arrow Hover Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
		$meta_box->add_field( array(
			'id'                 => $prefix.'notification_arrow_hover_bg_color',
			'name'        		 => esc_html__( 'Arrow Hover Bg Color', 'hashbar' ),
			'type'        		 => 'colorpicker',
		) );
	}
}


add_action( 'admin_footer', 'hashbar_wpnb_cmb2_js' );
if(!function_exists('hashbar_wpnb_cmb2_js')){
	function hashbar_wpnb_cmb2_js(){
		?>
		
		<script>
		(function($){
				//conditional where to show field
				var $current_where_to_show = jQuery('.cmb2-id--wphash-notification-where-to-show li input[checked="checked"]').attr('value');
				var $relation_with = jQuery('.cmb2-id--wphash-notification-where-to-show-custom');

				if( $current_where_to_show !== 'custom' ){
			    	$relation_with.slideUp();
			    }

				jQuery('.cmb2-id--wphash-notification-where-to-show li input').on('click', function() {
				    if(this.getAttribute('value') == 'custom'){
				    	$relation_with.slideDown();
				    } else {
				    	$relation_with.slideUp();
				    }
				});

				//conditional content width
		    	var $current_position = jQuery('.cmb2-id--wphash-notification-position li input[checked="checked"]').attr('value');
		    	var $relation_with_1 = jQuery('.cmb2-id--wphash-notification-content-width');
		    	if( $current_position == 'ht-n-left' || $current_position == 'ht-n-right'){
		        	$relation_with_1.slideUp();
		        }

		        jQuery('.cmb2-id--wphash-notification-position li input').on('click', function() {
				    if(this.getAttribute('value') == 'ht-n-top' || this.getAttribute('value') == 'ht-n-bottom'){
				    	$relation_with_1.slideDown();
				    } else {
				    	$relation_with_1.slideUp();
				    }
		        });
	        })(jQuery);
		</script>

		<?php
	}
}
