<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_landing-page-relationship',
		'title' => 'Landing Page Relationship',
		'fields' => array (
			array (
				'key' => 'field_53ec4d8ee2ff8',
				'label' => 'Landing Page Relationship',
				'name' => 'landing_page_relationship',
				'type' => 'post_object',
				'instructions' => 'Select if this item belongs to a Landing page.',
				'post_type' => array (
					0 => 'landing',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'teams',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 3,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>