<?php if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_custom-sub-menu',
		'title' => 'Custom Sub Menu',
		'fields' => array (
			array (
				'key' => 'field_53dee3d9ad151',
				'label' => 'Secondary Menu',
				'name' => 'sub_menu',
				'type' => 'nav_menu',
				'instructions' => 'The menu that will appear on your landing page. If you have not created a custom menu you can do so <a href="/nav-menus.php" target="_blank">here</a>',
				'save_format' => 'id',
				'container' => 'div',
				'allow_null' => 1,
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
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 2,
	));
}
?>