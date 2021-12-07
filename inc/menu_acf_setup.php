

<?php

/**
 * ACF - Advanced Custom FIelds to populate the menu
 */


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6183e2b0b962a',
	'title' => 'Menu',
	'fields' => array(
		array(
			'key' => 'field_6183e2cf584f6',
			'label' => 'Section',
			'name' => 'section',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Menu Section',
			'sub_fields' => array(
				array(
					'key' => 'field_6183e312584f7',
					'label' => 'Section Name',
					'name' => 'section_name',
					'type' => 'text',
					'instructions' => 'I.e. Starter',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '30',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Starter',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6183e33c584f8',
					'label' => 'Section Intro',
					'name' => 'section_intro',
					'type' => 'text',
					'instructions' => 'Example: "First basket of fresh baked bread is on the house"',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '45',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				// array(
				// 	'key' => 'field_618ba552dcde1',
				// 	'label' => 'Section Width',
				// 	'name' => 'section_width',
				// 	'type' => 'select',
				// 	'instructions' => '',
				// 	'required' => 0,
				// 	'conditional_logic' => 0,
				// 	'wrapper' => array(
				// 		'width' => '25',
				// 		'class' => '',
				// 		'id' => '',
				// 	),
				// 	'choices' => array(
				// 		'half' => 'Half Width',
				// 		'full' => 'Full Width',
				// 	),
				// 	'default_value' => 'col-12',
				// 	'allow_null' => 0,
				// 	'multiple' => 0,
				// 	'ui' => 0,
				// 	'return_format' => 'value',
				// 	'ajax' => 0,
				// 	'placeholder' => '',
				// ),
				array(
					'key' => 'field_6183e377584f9',
					'label' => 'Menu Item',
					'name' => 'menu_item',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'block',
					'button_label' => 'Add Menu Item',
					'sub_fields' => array(
						array(
							'key' => 'field_6183e398584fa',
							'label' => 'Item Name',
							'name' => 'item_name',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '20',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_6183e3ca584fb',
							'label' => 'Item Description',
							'name' => 'item_description',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '40',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_6183e401584fc',
							'label' => 'Item Price',
							'name' => 'item_price',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '10',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_6183e430584fd',
							'label' => 'Dietary',
							'name' => 'item_diet',
							'type' => 'checkbox',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '15',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'v' => 'v',
								'vg' => 'vg',
								'gf' => 'gf',
							),
							'allow_custom' => 0,
							'default_value' => array(
							),
							'layout' => 'horizontal',
							'toggle' => 0,
							'return_format' => 'value',
							'save_custom' => 0,
						),
						array(
							'key' => 'field_6183e79a0db0c',
							'label' => 'Has Options',
							'name' => 'has_options',
							'type' => 'true_false',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '15',
								'class' => '',
								'id' => '',
							),
							'message' => '',
							'default_value' => 0,
							'ui' => 0,
							'ui_on_text' => '',
							'ui_off_text' => '',
						),
						array(
							'key' => 'field_6183e62def81c',
							'label' => 'Menu Item Price Variation',
							'name' => 'price_variation',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_6183e79a0db0c',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => 'Add Menu Item Variation',
							'sub_fields' => array(
								array(
									'key' => 'field_6183e670ef81d',
									'label' => 'Variation Description',
									'name' => 'variation_description',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_6183e69cef81e',
									'label' => 'Variation Price',
									'name' => 'variation_price',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '25',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_6183e6acef81f',
									'label' => 'Variation Dietary',
									'name' => 'variation_dietary',
									'type' => 'checkbox',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '25',
										'class' => '',
										'id' => '',
									),
									'choices' => array(
										'v' => 'v',
										'vg' => 'vg',
										'gf' => 'gf',
									),
									'allow_custom' => 0,
									'default_value' => array(
									),
									'layout' => 'horizontal',
									'toggle' => 0,
									'return_format' => 'value',
									'save_custom' => 0,
								),
							),
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'menu',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;		

?>