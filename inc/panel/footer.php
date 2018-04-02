<?php
global $wp_customize;
/*----------| Footer Panel >---------------------*/

	$wp_customize->add_section(	'footer',
		array(
			'title' => __('Footer settings' , 'az-theme'),
			'description' => __('Footer tuning' , 'az-theme'),
			'priority' => 230,
		)
	);

	/*--Footer Header--*/
		$wp_customize->add_setting(	'sidebar-footer',
			array(
				'default'=>'true',
				'sanitize_callback' => 'az_checkbox_check',
			)
		);
		
		$wp_customize->add_control(	'sidebar-footer',
			array(
				'label' => __('Display footer sidebar' , 'az-theme'),
				'section' => 'footer',
				'type' => 'checkbox',
			)						
		);			
	/*--End Sidebar footer--*/	
		
	/*--Flex settings--*/
		$wp_customize->add_setting(	'az_footerflex',
			array(
				'default' => 'space-between',
				'sanitize_callback' => 'az_text_check',
			)
		);
			
		$wp_customize->add_control(
			'az_footerflex',
			array(
				'label' => __('Justify-content (flex option)' , 'az-theme'),
				'settings'=>'az_footerflex',
				'section' => 'footer',
				'type' => 'select',
				'choices'    => array(						
					'flex-start' => 'flex-start',
					'flex-end' => 'flex-end',
					'center' => 'center',
					'space-between' => 'space-between',
					'space-around' => 'space-around',
				),
			)
		);
	/*--End Flex settings--*/
?>