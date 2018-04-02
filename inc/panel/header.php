<?php
global $wp_customize;
/*----------| Header Panel >---------------------*/

	$wp_customize->add_section(	'header' ,
		array(
			'title' => __('Header settings' , 'az-theme'),
			'description' => __('Header tuning' , 'az-theme'),
			'priority' => 30,
		)
	);

		/*--Header Background--*/
		$wp_customize->add_setting( 'az-headerbg' ,
			array('capability'  => 'edit_theme_options',)
		);
 
		$wp_customize->add_control( 
			new WP_Customize_Image_Control($wp_customize, 'az-headerbg', 
				array(
					'label'    => __('Header background', 'az-theme'),
					'section'  => 'header',
					'settings' => 'az-headerbg',
				)
			)
		);
		/*--End Header Background--*/
		
		/*--Height type select--*/
			$wp_customize->add_setting(	'header-height',
				array( 
					'default'=>'az-height-image',
					'sanitize_callback' => 'az_radio_check',
				)
			);
			
			$wp_customize->add_control(	'header-height',
				array(
					'label' => __('Choice header height' , 'az-theme'),
					'section' => 'header',
					'type' => 'radio',
					'choices'    => array(
						'az-height-image' => 
							__('Height as background image' , 'az-theme'),
						'az-height-full' => __('Height 100%' , 'az-theme'),
						'az-height-fix' => __('Custom height (px)' , 'az-theme'),		
					)
				)						
			);			
		/*--End Height type select--*/
		
		/*--Height-fix-size--*/
			$wp_customize->add_setting(	'height-fix-size',
				array(
					'default'=>'100',
					'sanitize_callback' => 'az_number_check',
					'validate_callback' => 'validate_number',
				)
			);
			
			$wp_customize->add_control(	'height-fix-size',
				array(
					'label' => __('Custom height size (px)','az-theme'),
					'section' => 'header',
					'type' => 'text',
					'input_attrs' => array( 						 
						 'style' => 'border: 1px solid silver',						 
						 'disabled' => 'disabled',
					),
				)
			);	
		/*--End Height-fix-size--*/
		
		/*--Sidebar Header--*/
			$wp_customize->add_setting(	'sidebar-header',
				array(
					'default'=>'true',
					'sanitize_callback' => 'az_checkbox_check', 
				)
			);
			
			$wp_customize->add_control(	'sidebar-header',
				array(
					'label' => __('Display header sidebar','az-theme'),
					'section' => 'header',
					'type' => 'checkbox',
				)						
			);			
		/*--End Sidebar header--*/
		
		/*--Flex settings--*/
			$wp_customize->add_setting(	'az_headerflex',
					array( 
						'default' => 'space-between',
						'sanitize_callback' => 'az_text_check',						
					)
			);
			
			$wp_customize->add_control(	'az_headerflex',
				array(
					'label' => __('Justify-content (flex option)','az-theme'),
					'settings'=>'az_headerflex',
					'section' => 'header',
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