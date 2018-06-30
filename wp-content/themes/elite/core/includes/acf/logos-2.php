<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_logos-2',
		'title' => 'Logos 2',
		'fields' => array (
			array (
				'key' => 'field_53d59f3abace8',
				'label' => 'Logos 2',
				'name' => 'logos_2',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_53d59f51bace9',
						'label' => 'Logo',
						'name' => 'logo',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_53d59f7ebacea',
						'label' => 'Link URL',
						'name' => 'link_url',
						'type' => 'text',
						'instructions' => 'The entire url including http://',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-community-sponsors',
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