<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_club-logos',
		'title' => 'Club Logos',
		'fields' => array (
			array (
				'key' => 'field_53ab89548b1fa',
				'label' => 'Club Logos',
				'name' => 'club_logos',
				'type' => 'repeater',
				'instructions' => 'Adds a row of club logos',
				'sub_fields' => array (
					array (
						'key' => 'field_53ab896a8b1fb',
						'label' => 'Logo Image',
						'name' => 'logo_image',
						'type' => 'image',
						'instructions' => 'Club Logo should be a transparent .png',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'club_logo_admin',
						'library' => 'all',
					),
					array (
						'key' => 'field_53ab89be8b1fc',
						'label' => 'Club Link',
						'name' => 'club_link',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53ab89e28b1fd',
						'label' => 'Club Name',
						'name' => 'club_name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => 20,
				'layout' => 'table',
				'button_label' => 'Add Club Logo',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'landing',
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
		'menu_order' => 100,
	));
}
?>