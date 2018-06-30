<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_event-information',
		'title' => 'Event Information',
		'fields' => array (
			array (
				'key' => 'field_541b792377885',
				'label' => 'Date',
				'name' => 'tf_events_startdate',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_541b796277886',
				'label' => 'Time',
				'name' => 'tf_events_starttime',
				'type' => 'text',
				'instructions' => 'Use 24h Time (07:00)',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 65,
			),
			array (
				'key' => 'field_541b87393df98',
				'label' => 'Link (url)',
				'name' => 'link',
				'type' => 'text',
				'instructions' => 'Full Url (http://site.com/)',
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
					'value' => 'tf_events',
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