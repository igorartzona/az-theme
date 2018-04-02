<?php
/*----------| Front Page Panel >---------------------*/

			$wp_customize->add_section(	'front-page',
				array(
					'title' => __('Front Page','az-theme'),
					'description' => __('Front Page tuning','az-theme'),
					'priority' => 115,
				)
			);
			
			/*--Title frontpage post--*/
			$wp_customize->add_setting(	'az-frontpage-title',
				array('default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-frontpage-title',
				array(
					'label' => __('Display post title','az-theme'),
					'section' => 'front-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End title frontpage post--*/
		
		/*--Meta frontpage post--*/
			$wp_customize->add_setting(	'az-frontpage-meta',
				array('default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-frontpage-meta',
				array(
					'label' => __('Display post meta','az-theme'),
					'section' => 'front-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End title frontpage--*/

		/*-------Date frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-date',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-frontpage-date',
				array(
					'label' => __( 'View date', 'az-theme' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Time frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-time',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-frontpage-time',
				array(
					'label' => __( 'View time', 'az-theme' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/		
		
		/*-------Author frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-author',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-frontpage-author',
				array(
					'label' => __( 'View post author', 'az-theme' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Category frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-category',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-frontpage-category',
				array(
					'label' => __( 'View post category', 'az-theme' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/

		/*-------Comments frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-comments',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-frontpage-comments',
				array(
					'label' => __( 'View comments link', 'az-theme' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/

		

		/*-------Pagination--------------------*/
			$wp_customize->add_setting(	'az-frontpage-pagination',
				array('default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-frontpage-pagination',
				array(
					'label' => __( 'View pagination', 'az-theme' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/	
?>