<?php
/*----------| Font Panel >---------------------*/

		/*--Font--*/
			$wp_customize->add_section(
				'font',
				array(
					'title' => __('Font','az-theme'),
					'description' => __('Install font to theme (copy code from <a href="https://www.google.com/fonts" target=_blank>Google Fonts</a> and enter Font Family). Font to be used in body tag','az-theme'),
					'priority' => 115,
				)
			);	
			
			$wp_customize->add_setting(
				'az_font',
				array(
					'default' => "<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>",
					'sanitize_callback' => 'az_font_cut_tag',
					
				)
			);
			
			$wp_customize->add_control(
				'az_font',
				array(
					'label' => __('Google Font code','az-theme'),
					'section' => 'font',
					'type' => 'text',)						
			);
			
			function az_font_cut_tag($input){
					//вырезаем < в начале и в конце, чтоб из базы доставалось
					//$input = substr_replace($input, '', 0, 1);
					//$input = substr_replace($input, '', strlen($input)-1, 1);
					//ищем одинарную кавычку (старый googlefont)
					$symb = "'";
					$find = strpos($input,$symb);
					//если одинарной нет, будем отсекать по двойной (новый googlefont)
					if ( $find === false ) $symb = '"';
					//достаем путь к шрифту и отдаем его в базу
					$array_tag = explode($symb,$input);
					$input = $array_tag[1];
					
					return $input;
			}
			
			
			$wp_customize->add_setting(
				'az_fontfamily',
				array('default' => 'Roboto','sanitize_callback' => 'az_fontfamily_cut_tag',	)
			);
			
			$wp_customize->add_control(
				'az_fontfamily',
				array(
					'label' => __('Font Family','az-theme'),
					'section' => 'font',
					'type' => 'text',)		
			);
			
			function az_fontfamily_cut_tag($input){
					$findFONT = strpos($input,'font-family');
					if ( $findFONT === false ) $input = "Roboto" ;
					$symb = "'";
					$find = strpos($input,$symb);					
					if ( $find === false ) $symb = '"';
					$array_tag = explode($symb,$input);
					$input = $array_tag[1];									
					return wp_kses_post( force_balance_tags( $input ) );
			}			
			
			$wp_customize->add_setting(
				'az_fontselect',
				array('default' => '1','sanitize_callback' => 'az_number_check',	)
			);
			
			$wp_customize->add_control(
				'az_fontselect',
				array(
					'label' => __('Font Size (em)','az-theme'),
					'settings'=>'az_fontselect',
					'section' => 'font',
					'type' => 'select',
					'choices'    => array(
						'0.8' => '0.8',
						'0.9' => '0.9',
						'1' => '1',
						'1.1' => '1.1',
						'1.2' => '1.2',
						'1.3' => '1.3',
						'1.4' => '1.4',
						'1.5' => '1.5',
						'1.6' => '1.6',
					),
				)
			);
		/*--End font--*/
		
?>