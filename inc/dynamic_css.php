<?php
	function az_dynamic_css ($dynamic_css) {
		wp_enqueue_style('az-dynamic-style', get_template_directory_uri() . '/css/custom_script.css');
		$dynamic_css = '';
		
		$site_maxwidth	= get_theme_mod('site-maxwidth' , '1400');		
		$sidebar_width	= get_theme_mod('sidebar-width' , '33');
		
		$sidebar_left = get_theme_mod('sidebar-left');
		$sidebar_right = get_theme_mod('sidebar-right');
				
		$colormenu	= get_theme_mod('colormenu' , '#f5f5f5');
		$colormenulink	= get_theme_mod('colormenulink' , '#6C6C6C');
		
		$primarycolor	= get_theme_mod('primarycolor' , '#282828');
		$secondarycolor = "#FFF";
		$autocolor	= get_theme_mod('autocolor' , true);		
		
		$az_fontfamily = get_theme_mod('az_fontfamily');	
		$az_font = get_theme_mod('az_font');
		$az_fontsize = get_theme_mod('az_fontselect' , '1');

		$design = get_theme_mod('design');
		
		/*-----------header-----------------*/	
		/*Header background image size*/
			if ( get_theme_mod( 'az-headerbg' ) ) { 
				$headerbg = get_theme_mod( 'az-headerbg' );
				$headerbg_size = getimagesize($headerbg);		
				$headerbg_width = $headerbg_size[0];
				$headerbg_height = $headerbg_size[1];
				
				$dynamic_css .= 
					"#az-header {\n\t 
						background:url('$headerbg') center no-repeat;
						background-size:cover; 
					\n}";
			}
			
			
			if ( get_theme_mod( 'header-height' , 'az-height-fix' ) ) {
				$header_height = get_theme_mod( 'header-height' , 'az-height-image' );
				switch ( $header_height ){
					case "az-height-image":
						if ( get_theme_mod( 'az-headerbg' ) ) { 
							$header_height_style = $headerbg_height."px";
						} else $header_height_style = '';
						break;
					case "az-height-full": 
							$header_height_style = "100vh";				
						break;
					case "az-height-fix":
							if ( get_theme_mod( 'height-fix-size' , '100' ) ) {
								$header_height_style = get_theme_mod( 'height-fix-size','100' )."px";	
							}
						break;
					
				}
				
				$dynamic_css .= "#az-header {\n\t height:$header_height_style; \n}";
			}
			
			if ( get_theme_mod( 'az_headerflex' ) ) {
				$header_justify = get_theme_mod( 'az_headerflex' , 'space-between' ); 
				$dynamic_css .= "#az-header {\n\t justify-content:$header_justify; \n}";
			}
					
		/*-----------end header-----------------*/
		
		/*-----------footer-----------------*/
			if ( get_theme_mod( 'az_footerflex' ) ) {
				$footer_justify = get_theme_mod( 'az_footerflex' , 'space-between' ); 
				$dynamic_css .= "footer {\n\t justify-content:$footer_justify; \n}";
			}		
		/*-----------end footer-----------------*/
		
		/*-----------font-----------------*/
			if ( $az_font ) {
				wp_register_style('googlefont', $az_font,array(),null );
				wp_enqueue_style('googlefont', get_stylesheet_uri(), array('googlefont'),null );
			}
			
			if ( $az_fontfamily ) {
				$dynamic_css .= "body {\n\t font-family: $az_fontfamily,sans-serif; \n}";
			} else $dynamic_css .= "body {\n\t font-family: Roboto,sans-serif;\n}";
			
			if ( $az_fontsize ) {
				$dynamic_css .= "body {\n\t font-size: $az_fontsize"."em; \n}";
			} 
		/*-----------end font-----------------*/
		
		/*-----------layout-----------------*/
			if ( $site_maxwidth ) {	$dynamic_css .= "\n\t #az-wrap {\n\t max-width: $site_maxwidth"."px; \n}"; }
		/*-----------end layout-----------------*/
		
		/*-----------color-----------------*/
			if ( $colormenulink ) {
				$dynamic_css .= "\n\t .az-primary-nav ul> li > a {\n\t color: $colormenulink; \n}".
								"\n\t .az-primary-nav .menu-item-has-children::after {\n\t color: $colormenulink; \n}".
								"\n\t .az-primary-nav .menu-item-has-children > li:hover {\n\t background: $colormenulink; \n}".
								"\n\t .current-menu-item, .current_page_item{\n\t color:$colormenulink; \n}".		
								"\n\t .az-primary-nav .current-menu-item, .az-primary-nav .current_page_item {\n\t background:$colormenulink; \n}".
								"\n\t .az-primary-nav .menu .menu-item-home a{\n\t color:$colormenulink; \n}".
								"\n\t .az-primary-nav a, .az-primary-nav .menu-item-has-children::after {\n\t color:$colormenulink; \n}".
								"\n\t .az-primary-nav ul > li {\n\t border-right: 1px solid $colormenulink; \n}".
								"\n\t .az-primary-nav li:hover {\n\t background:$colormenulink; \n}".
								"\n\t .toggle-button:after {\n\t color: $colormenulink; \n}";
				
			}
			
			if ( $colormenu ) {
				$dynamic_css .= "\n\t .az-primary-nav {\n\t background: $colormenu; \n}".
								"\n\t .az-primary-nav .page_item_has_children:hover, .az-primary-nav .menu-item-has-children:hover {\n\t border-right:1px solid $colormenu \n}".
								"\n\t .current-menu-item a, .current_page_item a{\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav .menu-item-home {\n\t background:$colormenu; \n}".	
								"\n\t .az-primary-nav .current-menu-item a, .az-primary-nav .current_page_item a{\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav .menu .menu-item-home:hover > a{\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav .sub-menu,.az-primary-nav .children {\n\t background: $colormenu; \n}".
								"\n\t .az-primary-nav li a:hover {\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav li:hover > a {\n\t color:$colormenu; \n}";				
			}
			
			if ( $autocolor ) {
				$dynamic_css .= "\n\t .az-posttitle {\n\t border-left: 1.6rem solid $primarycolor; \n}".
								"\n\t .comment-respond {\n\t box-shadow: 1px 1px 2px $primarycolor inset, -1px -1px 2px $primarycolor inset; \n}".				
								"\n\t input[type='submit'], #comment, .more-link, .comment-form-author > input, .comment-form-email > input, .comment-form-url > input, select,.search-form input {\n\t border: 1px solid $primarycolor; \n}".
								"\n\t .comment-reply-title:before,a:link,a:visited,a:hover,blockquote:before {\n\t color:$primarycolor; \n}".
								"\n\t .more-link:hover,thead,th,input[type='submit'],.navigation a, #az-wrap + footer, .comments-title, .comment-reply-title, .comment-reply-title:before {\n\t background:$primarycolor; color:$secondarycolor; \n}".
								"\n\t input[type='submit']:hover,.navigation a:hover {\n\t	color:$primarycolor;background:$secondarycolor; \n}".
								"\n\t blockquote{\n\t border-left:2px solid $primarycolor; \n}".
								"\n\t .sticky:before{\n\t color: $primarycolor;border:2px solid $primarycolor; \n}".
								"\n\t .az-widget {\n\t border-bottom: 1px solid $primarycolor;border-top: 1px solid $primarycolor;color:$primarycolor; \n}".
								"\n\t .bypostauthor {\n\t background:$secondarycolor; border-left:2px solid $primarycolor; \n}".
								"\n\t .comment-author {\n\t border-bottom: 1px solid $primarycolor; \n}".
								"\n\t .az-article-meta {\n\t border-bottom: 1px dashed $primarycolor; \n}";			
			}
			
		/*-----------color end-------------*/
		
		/*-------------media---------------*/
			$dynamic_css .= "\n\t @media only screen and (min-width: 1024px) {";
				if ( $sidebar_width && ($design == 'blog') ) {					
					$dynamic_css .= "\n\t .az-sidebar {\n\t min-width: ".$sidebar_width."%; \n
														\n\t max-width: ".$sidebar_width."%; \n}";			
					if ( $sidebar_right && $sidebar_left ){
						$sidebar_width = $sidebar_width*2;
					}
					$dynamic_css .= "\n\t #main {\n\t min-width: calc(100% - ".$sidebar_width."%); \n}";
				} 				
				if ( 
					$design == 'landing' || 
					!($sidebar_right && $sidebar_left) 
					) $dynamic_css .= "\n\t #main {\n\t width: 100%; \n}";
				
			$dynamic_css .= "\n }";
			
			$dynamic_css .= "\n\t @media only screen and (max-width: 1023px) {";			
				if ( $colormenulink ) {
					$dynamic_css .= "\n\t .az-primary-nav ul > li {\n\t border:0; \n}";
				}
				$dynamic_css .= "#az-entry-wrap {\n\t font-size: 16px; \n}";
			$dynamic_css .= "\n }";		
		/*---------media end---------------*/
		
		wp_add_inline_style( 'az-dynamic-style', $dynamic_css );		
	}
	
	add_action( 'wp_enqueue_scripts', 'az_dynamic_css' );
?>