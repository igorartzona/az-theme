<?php
global $wp_customize;
/*----------| NAV (Menu) Panel >---------------------*/
			$wp_customize->add_section(	'menu',
				array(
					'title' => __('NAV settings' , 'az-theme'),
					'description' => __('NAV layout tuning. Choice main menu in Menus section before customize' , 'az-theme'),
					'priority' => 40,
				)
			);
	
		/*--Add menu position--*/
			$wp_customize->add_setting('az-menu-position',
				array(
					'capability'  => 'edit_theme_options',
					'default'=>'after_header',
					'sanitize_callback' => 'az_radio_check',
				) 
			);
			
			$wp_customize->add_control(
				'az-menu-position',
				array(
					'label' => __('Menu','az-theme'),
					'section' => 'menu',					
					'type' => 'radio',
					'choices'    => array(
						'after-header' => __('After Header' , 'az-theme'),
						'on-top' => __('On top' , 'az-theme'),            
					),
				)		
			);				
		/*--End menu position--*/
?>