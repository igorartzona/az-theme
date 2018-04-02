<?php
	/*-----------------template initialize-----------------*/	
		$design = get_theme_mod( 'design' , 'blog' );
		
		// switch ( $design ) {
			// case "landing" : 			
				// function az_landing_css() {
					// wp_enqueue_style('az-landing-css',get_template_directory_uri().'/css/landing.css');	
				// } 
				// add_action( 'wp_enqueue_scripts' , 'az_landing_css' );
				// break;
			// default:
				// remove_action( 'wp_enqueue_scripts' , 'az_landing_css' );
		// }
		$template = 'archive';
		if( is_front_page() ) $template = 'frontpage';
		if( is_single() )	$template = 'single';
		if( is_page() )	$template = 'page';
		if( is_attachment() ) $template = 'attachment'; 		
		if( is_archive() ) $template = 'archive';
				
		
		if ( $design === 'landing' ) $template = 'landing';
				
		$menu_position = get_theme_mod( 'az-menu-position' , 'after-header' );		
		
	/*-----------------template initialize end-----------------*/	
?>


<?php  get_header(); ?>

<body <?php body_class(); ?> >
    <div id="az-wrap">
	
		<?php 
			if ( $menu_position == 'on-top' ) {
				get_template_part( 'primary-menu' );
				get_header( 'theme' );				
			} else {
				get_header( 'theme' );
				get_template_part( 'primary-menu' );
			}				
		?>
	
        <div class="az-content <?php echo "az-".$design; ?>">
        
		<?php 
			if ( is_active_sidebar( 'left-sidebar' ) && ( $design != 'landing') ) {
				get_sidebar('left');
			}
		?>		
        
		<main id="main"> 
		
			<?php 
			
			if 	(	
				get_theme_mod( 'az-archive-bread', true) && 
				get_theme_mod( 'az-post-bread', true) &&
				get_theme_mod( 'az-page-bread', true)
			) 
			dimox_breadcrumbs();
			 
			/*Loop*/
				if ( have_posts() ) {
					
					/* Search template */
					if( is_search() ) : ?>
						<div class="az-search-title">
							<?php get_search_form(); ?>
							<?php printf( esc_html__( 'Search Results for : %s','az-theme' ), '<strong>' . get_search_query() . '</strong>' ); ?>
						</div>
					<?php endif;
					/* end Search template */					
					
					while ( have_posts() ) : the_post();
						 get_template_part( 'template/content' , $template );			
					endwhile;					
				} 
				else get_template_part( 'template/content' , 'none' );
						

			/*Loop end*/
			?>
			
			<?php
			/* Pagination with WP 4.1*/
				if ( get_theme_mod( 'az-frontpage-pagination' , true ) ) {					
					$args = array(
						'mid_size'     => 3,
						'prev_text'    => __('&laquo;'),
						'next_text'    => __('&raquo;'),
					);					
					the_posts_pagination($args);
				}
			?>			
		</main>
        
        <?php 
			if ( is_active_sidebar( 'right-sidebar' ) && ( $design != 'landing') ) {
				get_sidebar('right');
			}				
		?>	
            
        </div>
        
<?php  get_footer(); ?>