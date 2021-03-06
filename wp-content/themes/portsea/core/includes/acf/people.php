<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_people',
		'title' => 'People',
		'fields' => array (
			array (
				'key' => 'field_53d9bc24125ce',
				'label' => 'Player image',
				'name' => 'player_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53d9bc4e125cf',
				'label' => 'Player number',
				'name' => 'player_number',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		
			array (
				'key' => 'field_zc1aci9np258k',
				'label' => 'Goal',
				'name' => 'player_goal',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d9e35054f3f',
				'label' => 'Player Link',
				'name' => 'player_link',
				'type' => 'text',
				'instructions' => 'Full link to player profile.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_sjn6lj44tqrr7',
				'label' => 'Player Team',
				'name' => 'player_lteam',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
?>