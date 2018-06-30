<?php 
/* Logos 1 */	
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_logos-1',
		'title' => 'Logos 1',
		'fields' => array (
			array (
				'key' => 'field_53cc9312ce60a',
				'label' => 'Logos 1',
				'name' => 'logos_1',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_53cc93d05a946',
						'label' => 'Logo',
						'name' => 'logo',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_53cc93dc5a947',
						'label' => 'Link Url',
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
					'value' => 'acf-options-major-partners',
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