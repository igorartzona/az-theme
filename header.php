<!DOCTYPE HTML>
<html <?php language_attributes(); ?> > 
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
		
    <!-- mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" > 

    <!-- WP required -->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon.ico" />

    <meta name="robots" content="index, follow">
    <meta name="description" content="
			<?php
				if ( is_single() ) {
					single_post_title('', true); echo " | "; bloginfo('name');
				} 
				else {	
					bloginfo('name'); echo " | "; bloginfo('description');
				}
			?>
	"/>
    <meta name="keywords" content="Ключевые слова, ключевые тэги">
    
    <!-- авторство контента -->        
    <meta name="author" content="<?php bloginfo('name'); ?>"> 
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
	<?php 
	add_filter( 'pre_get_document_title', function(){
		global $post;
		
		if(  get_post_meta($post->ID, 'az-title', true)  ) {
			$az_title = get_post_meta($post->ID, 'az-title', true);
			$az_title .= ' | '.get_bloginfo('name');			
			return $az_title ;
		} else	{
			add_filter( 'document_title_separator', function(){ 
				return ' | '; 
			});			
		}
	});
	
	?>
	
    <?php wp_head(); ?>
		
</head>

