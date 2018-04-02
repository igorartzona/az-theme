(function( $ ) {	

	//Связанный input ( Фиксированная высота )
	wp.customize( 'header-height', function( value ) {
		value.bind( function( newval ) {			
			if (newval == 'az-height-fix') {				
				$('#_customize-input-height-fix-size').removeAttr( "disabled");			
			} else {
				$('#_customize-input-height-fix-size').attr( "disabled" , "" );			
			}
		} );
	} );


	//Связанный select ( Показать сайдбар в шапке )	
	wp.customize( 'sidebar-header', function( value ) {
		value.bind( function( newval ) {			
			if (newval) {
				$('#_customize-input-az_headerflex').removeAttr( "disabled");	
			}	else {
				$('#_customize-input-az_headerflex').attr( "disabled" , "" );			
			}
			
		} );
	} );
	
	wp.customize( 'design', function( value ) {
		value.bind( function( newval ) {			
			if (newval == 'blog') {
				$('#_customize-input-sidebar-left').removeAttr( "disabled");
				$('#_customize-input-sidebar-right').removeAttr( "disabled");
				$('#_customize-input-sidebar-width').removeAttr( "disabled");
			}	else {
				$('#_customize-input-sidebar-left').attr( "disabled" , "" );
				$('#_customize-input-sidebar-right').attr( "disabled" , "" );
				$('#_customize-input-sidebar-width').attr( "disabled" , "" );				
			}
			
		} );
	} );
	
	wp.customize( 'sidebar-left', function( value ) {
		value.bind( function( newval ) {	
			if ( 	!$("#_customize-input-sidebar-right").prop("checked") && 
					!$("#_customize-input-sidebar-left").prop("checked")
				)
				$('#_customize-input-sidebar-width').attr( "disabled" , "" );
			else $('#_customize-input-sidebar-width').removeAttr( "disabled");
		} );
	} );
	
	wp.customize( 'sidebar-right', function( value ) {
		value.bind( function( newval ) {	
			if ( 	!$("#_customize-input-sidebar-left").prop("checked") && 
					!$("#_customize-input-sidebar-right").prop("checked")
				)
				$('#_customize-input-sidebar-width').attr( "disabled" , "" );
			else $('#_customize-input-sidebar-width').removeAttr( "disabled");
		} );
	} );
	
})( jQuery );



	

