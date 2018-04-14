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
	
	<!-- SEO meta -->	
	<?php
		add_filter( 'pre_get_document_title', function(){
			global $post;
			
			if(  get_post_meta($post->ID, 'az-meta-title', true)  ) {
				$az_title = get_post_meta($post->ID, 'az-meta-title', true);
				$az_title .= ' | '.get_bloginfo('name');			
				return $az_title ;
			} else	{
				add_filter( 'document_title_separator', function(){	return ' | '; });		
			}
		});
	?>
	
	<meta name="description" content="<?php
			$az_meta_description = get_post_meta($post->ID, 'az-meta-description', true);
			if(  $az_meta_description  ) {					
				echo $az_meta_description.' | ';bloginfo('name');
			} else {
				if ( is_single() ) {
					single_post_title('', true); echo " | "; bloginfo('name');
				} 
				else {	
					bloginfo('name'); echo " | "; bloginfo('description');
				}
			}
		?>
	"/>
    
	<?php
	$az_meta_keywords = get_post_meta($post->ID, 'az-meta-keywords', true);
	if( $az_meta_keywords ) : ?>
<meta name="keywords" content="<?php echo $az_meta_keywords; ?>"/>
	<?php endif; ?>	
	   
    <!-- авторство контента -->        
    <meta name="author" content="<?php bloginfo('name'); ?>"> 
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  	
	<?php 
		if(  get_post_meta($post->ID, 'az-meta-robots', true)  ) {
			remove_action('wp_head','noindex',1); 
			function az_robots(){
				global $post;
				
				$az_robots = get_post_meta($post->ID, 'az-meta-robots', true);
				echo "<meta name='robots' content='$az_robots' />\n";
			}
			add_action('wp_head','az_robots',1);
		}		
	?>
	
    <?php 
		wp_head(); 
		add_action('wp_head','noindex',1); 
	?>
		
</head>

