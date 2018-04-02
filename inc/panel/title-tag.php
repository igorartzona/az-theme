<?php
/*----------| Title&tag Panel >---------------------*/
	
		/*--Logo--*/
		$wp_customize->add_setting('az-minilogo', array(			
			'capability'  => 'edit_theme_options',			
		));
 
		$wp_customize->add_control( 
			new WP_Customize_Image_Control($wp_customize, 'az-minilogo', 
				array(
				'label'    => __('Logo', 'az-theme'),
				'section'  => 'title_tagline',
				'settings' => 'az-minilogo',
				)
			)
		);
		/*--End Logo--*/
		
		/*--Header Background--*/
		$wp_customize->add_setting('az-headerbg', array(			
			'capability'  => 'edit_theme_options',			
		));
 
		$wp_customize->add_control( 
			new WP_Customize_Image_Control($wp_customize, 'az-headerbg', 
				array(
				'label'    => __('Header background', 'az-theme'),
				'section'  => 'title_tagline',
				'settings' => 'az-headerbg',
				)
			)
		);
		/*--End Header Background--*/		
?>