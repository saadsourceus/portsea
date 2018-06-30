<?php 
if( function_exists('register_field_group') ):

register_field_group(array (
	'id' => 'acf_golden-boot',
	'title' => 'Landing Page Golden Boot',
	'fields' => array (
		array (
			'key' => 'field_5733c9b699873',
			'label' => 'Golden Competition',
			'name' => 'landing_page_g_competition',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => 1,
			'layout' => 'table',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_5733c9b69aac6',
					'label' => 'Golden Competition Id',
					'name' => 'landing_page_golden_competition_id',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5733c9b69aad6',
					'label' => 'Golden Header Text',
					'name' => 'landing_page_golden_header_text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
		array (
			'key' => 'field_5733c9b699884',
			'label' => 'Golden Boot Show/Hide',
			'name' => 'landing_page_golden_boot_showhide',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => 50,
				'id' => '',
			),
			'choices' => array (
				'show' => 'Show',
				'hide' => 'Hide',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'hide : Hide',
			'layout' => 'vertical',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'landing',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
?>