<?php
/*----------| Single Post Panel >---------------------*/

			$wp_customize->add_section(	'single-post',
				array(
					'title' => __('Single post','az-theme'),
					'description' => __('Single post tuning','az-theme'),
					'priority' => 117,
				)
			);
			
			/*-- post breadcrumbs --*/
			$wp_customize->add_setting(	'az-post-bread',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
			
			$wp_customize->add_control(	'az-post-bread',
				array(
					'label' => __('Display breadcrumbs','az-theme'),
					'section' => 'single-post',
					'type' => 'checkbox',
				)						
			);			
		/*--End post breadcrumbs--*/	
		
		/*-------Thumbnail single post--------------------*/
			$wp_customize->add_setting(	'az-post-thumbnail',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-post-thumbnail',
				array(
					'label' => __( 'View post thumbnail', 'az-theme' ), 
					'section' => 'single-post',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
			
		/*--Title post--*/
			$wp_customize->add_setting(	'az-post-title',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
			
			$wp_customize->add_control(	'az-post-title',
				array(
					'label' => __('Display post title','az-theme'),
					'section' => 'single-post',
					'type' => 'checkbox',
				)						
			);			
		/*--End title post--*/
		
		/*--Meta single post--*/
			$wp_customize->add_setting(	'az-post-meta',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
			
			$wp_customize->add_control(	'az-post-meta',
				array(
					'label' => __('Display post meta','az-theme'),
					'section' => 'single-post',
					'type' => 'checkbox',
				)						
			);			
		/*--End title post--*/

		/*-------Date post--------------------*/
			$wp_customize->add_setting(	'az-post-date',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-post-date',
				array(
					'label' => __( 'View date', 'az-theme' ), 
					'section' => 'single-post',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Time post--------------------*/
			$wp_customize->add_setting(	'az-post-time',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-post-time',
				array(
					'label' => __( 'View time', 'az-theme' ), 
					'section' => 'single-post',
					'type' => 'checkbox'
				,)
			);
		/*------Enf time post---------------------------*/		
		
		/*-------Author single post--------------------*/
			$wp_customize->add_setting(	'az-post-author',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-post-author',
				array(
					'label' => __( 'View post author', 'az-theme' ), 
					'section' => 'single-post',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Category single post--------------------*/
			$wp_customize->add_setting(	'az-post-category',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-post-category',
				array(
					'label' => __( 'View post category', 'az-theme' ), 
					'section' => 'single-post',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-- PREV\NEXT link--*/		
			$wp_customize->add_setting(	'az-post-prev-next-link',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
			
			$wp_customize->add_control(
				'az-post-prev-next-link',
				array(
					'label' => __('Display PREV\NEXT link','az-theme'),
					'section' => 'single-post',
					'type' => 'checkbox',)						
			);			
		/*--End PREV\NEXT link--*/	
?>