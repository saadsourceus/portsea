<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_aggro-social-count',
		'title' => 'Aggro Social Count',
		'fields' => array (
			array (
				'key' => 'field_53e976a1911cd',
				'label' => 'Aggro Social Count',
				'name' => 'aggro_social_count',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Twitter',
						'name' => 'aggro_count_twitter',
						'display' => 'row',
						'min' => 0,
						'max' => 1,
						'sub_fields' => array (
							array (
								'key' => 'field_53e97732911ce',
								'label' => 'Twitter Username',
								'name' => 'twitter_username',
								'type' => 'text',
								'instructions' => '<strong>twitter</strong> - (optional) - the Twitter username eg: https://twitter.com/<span class="aggro-example">username</span>',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'YouTube',
						'name' => 'agro_count_youtube',
						'display' => 'row',
						'min' => 0,
						'max' => 1,
						'sub_fields' => array (
							array (
								'key' => 'field_53e9777f911d0',
								'label' => 'Youtube Username',
								'name' => 'youtube_username',
								'type' => 'text',
								'instructions' => '<strong>youtube</strong> - (optional) - the YouTube username or channel eg: https://www.youtube.com/user/<span class="aggro-example">username</span> or https://www.youtube.com/channel/<span class="aggro-example">channel</span>',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Facebook',
						'name' => 'agro_count_facebook',
						'display' => 'row',
						'min' => 0,
						'max' => 1,
						'sub_fields' => array (
							array (
								'key' => 'field_53e97884911d4',
								'label' => 'Facebook Page',
								'name' => 'facebook_page',
								'type' => 'text',
								'instructions' => '<li><strong>facebook</strong> - (optional) - the Facebook page eg: https://www.facebook.com/<span class="aggro-example">page</span></li>',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Instagram',
						'name' => 'aggro_count_instagram',
						'display' => 'row',
						'min' => 0,
						'max' => 1,
						'sub_fields' => array (
							array (
								'key' => 'field_53e977fe911d2',
								'label' => 'Instagram Username',
								'name' => 'instagram_username',
								'type' => 'text',
								'instructions' => '<strong>instagram</strong> - (optional) - the Instagram username eg: http://instagram.com/<span class="aggro-example">username</span>',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
						),
					),
				),
				'button_label' => 'Add Social',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-social-count',
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