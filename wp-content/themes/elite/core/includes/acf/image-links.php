<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_image-links',
		'title' => 'Image Links',
		'fields' => array (
			array (
				'key' => 'field_53e2bcec92100',
				'label' => 'Image Links',
				'name' => 'image_links',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_53e2bd1292101',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '33.3',
						'save_format' => 'object',
						'preview_size' => 'home-page-buttons',
						'library' => 'all',
					),
					array (
						'key' => 'field_53e2bed6b1c6d',
						'label' => 'Page Link',
						'name' => 'page_link',
						'type' => 'page_link',
						'instructions' => 'Link to page',
						'column_width' => '33.3',
						'post_type' => array (
							0 => 'post',
							1 => 'page',
							2 => 'people',
							3 => 'landing',
						),
						'allow_null' => 1,
						'multiple' => 0,
					),
					array (
						'key' => 'field_53e2bea1b1c6c',
						'label' => 'Link URL',
						'name' => 'link_url',
						'type' => 'text',
						'instructions' => 'Optional. Use if link is external. The full URL including http://',
						'column_width' => '33.3',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53e2c3e0a3f74',
						'label' => 'New Tab/Window',
						'name' => 'new_window',
						'type' => 'true_false',
						'column_width' => 5,
						'message' => '',
						'default_value' => 0,
					),
				),
				'row_min' => 0,
				'row_limit' => 4,
				'layout' => 'table',
				'button_label' => 'Add Link',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-home-page-buttons',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>