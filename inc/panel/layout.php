<?php
/*----------| Layout Panel >---------------------*/

			$wp_customize->add_section(	'layout',
				array(
					'title' => __('Layout','az-theme'),
					'description' => __('Layout settings','az-theme'),
					'priority' => 114,
				)
			);
			
		/*--Design setting--*/
			$wp_customize->add_setting(	'design',
				array(
					'default'=>'blog',
					'sanitize_callback' => 'az_radio_check',
				)
			);
			
			$wp_customize->add_control(	'design',
				array(
					'label' => __('Choice design','az-theme'),
					'section' => 'layout',
					'type' => 'radio',
					'choices'    => array(
						'blog' => __('Blog','az-theme'),
						'landing' => __('Landing page','az-theme'),						
					),
				)						
			);			
		/*--End Design setting--*/
			
		/*--Sidebar left--*/
			$wp_customize->add_setting(	'sidebar-left',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'sidebar-left',
				array(
					'label' => __('Display left sidebar','az-theme'),
					'section' => 'layout',
					'type' => 'checkbox',
				)						
			);			
		/*--End Sidebar left--*/
		
		/*--Sidebar Right--*/
			$wp_customize->add_setting(	'sidebar-right',
				array(
					'default'=>'1',
					'sanitize_callback' => 'az_checkbox_check',
				)
			);
			
			$wp_customize->add_control(	'sidebar-right',
				array(
					'label' => __('Display right sidebar','az-theme'),
					'section' => 'layout',
					'type' => 'checkbox',
				)						
			);			
		/*--End Sidebar right--*/

		/*--Site width--*/
			$wp_customize->add_setting(	'site-maxwidth',
				array(
					'default'=>'1400',
					'sanitize_callback' => 'az_number_check',
					'validate_callback' => 'validate_number'
				)
			);
			
			$wp_customize->add_control(	'site-maxwidth',
				array(
					'label' => __('Site max-width (px)','az-theme'),
					'section' => 'layout',
					'type' => 'text',
				)						
			);	
		/*--End Site width--*/
						
		/*--Sidebar width--*/
			$wp_customize->add_setting(	'sidebar-width',
				array(
					'default'=>'33',
					'sanitize_callback' => 'az_number_check',
					'validate_callback' => 'validate_sidebar_width'
				)
			);
			
			$wp_customize->add_control(	'sidebar-width',
				array(
					'label' => __('Sidebar width (%)','az-theme'),
					'section' => 'layout',
					'type' => 'text',
				)						
			);	
		/*--End Sidebar width--*/

		function validate_sidebar_width($validity , $value){
			$value = intval( $value );
			$design = get_theme_mod('design');
			if ( empty( $value ) || ! is_numeric( $value ) ) {
				$validity->add( 'required', __( 'You must supply a numeric value','az-theme' ) );
			} 	elseif ( $value > 33 && 
						get_theme_mod('sidebar-left') && 
						get_theme_mod('sidebar-right') &&
						( $design == 'blog' ) 
						)
				{
					$validity->add( 'warning' , __( 'We recommended width < 34%' , 'az-theme' ) );
				}
			return $validity;			
			
		}
?>