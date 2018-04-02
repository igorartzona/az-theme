<?php		
/*----------| archive Page Panel >---------------------*/		

		$wp_customize->add_section(	'archive-page',
				array(
					'title' => __('Archive page (default)','az-theme'),
					'description' => __('Archive page tuning','az-theme'),
					'priority' => 118,
				)
			);		

		/*-- archive page breadcrumbs--*/
			$wp_customize->add_setting(	'az-archive-bread',
				array(	'default' => "1",	'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-archive-bread',
				array(
					'label' => __('Display breadcrumbs','az-theme'),
					'section' => 'archive-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End archive page breadcrumbs--*/		
		
		/*--Title archive page--*/
			$wp_customize->add_setting(	'az-archive-title',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-archive-title',
				array(
					'label' => __('Display page title','az-theme'),
					'section' => 'archive-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End title archive page--*/
		
		/*--Meta archive page--*/
			$wp_customize->add_setting(	'az-archive-meta',
				array(	'default' => "1", 'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-archive-meta',
				array(
					'label' => __('Display page meta','az-theme'),
					'section' => 'archive-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End meta archive page--*/

		/*-------Date archive page--------------------*/
			$wp_customize->add_setting(	'az-archive-date',
				array(	'default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-archive-date',
				array(
					'label' => __( 'View date', 'az-theme' ), 
					'section' => 'archive-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Time archive page--------------------*/
			$wp_customize->add_setting(	'az-archive-time',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-archive-time',
				array(
					'label' => __( 'View time', 'az-theme' ), 
					'section' => 'archive-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/		
		
		/*-------Author archive page--------------------*/
			$wp_customize->add_setting(	'az-archive-author',
				array('default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-archive-author',
				array(
					'label' => __( 'View post author', 'az-theme' ), 
					'section' => 'archive-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Category archive page--------------------*/
			$wp_customize->add_setting(	'az-archive-category',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-archive-category',
				array(
					'label' => __( 'View post category', 'az-theme' ), 
					'section' => 'archive-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/

		/*-------Comments archive page--------------------*/
			$wp_customize->add_setting(	'az-archive-comments',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-archive-comments',
				array(
					'label' => __( 'View comments link', 'az-theme' ), 
					'section' => 'archive-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/

?>