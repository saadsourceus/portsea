<?php if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_custom-header',
		'title' => 'Custom Header',
		'fields' => array (
			array (
				'key' => 'field_53d9cc1a17215',
				'label' => 'Custom header image',
				'name' => 'custom_header_image',
				'type' => 'image',
				'instructions' => '1120px x 100px',
				'save_format' => 'object',
				'preview_size' => 'custom-header',
				'library' => 'all',
			),
			array (
				'key' => 'field_53dad8cf4c7f0',
				'label' => 'Custom Header Image Mobile',
				'name' => 'custom_header_image_mobile',
				'type' => 'image',
				'instructions' => '560px x 200px',
				'save_format' => 'object',
				'preview_size' => 'custom-header-mobile',
				'library' => 'all',
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
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
?>