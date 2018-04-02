<header id="az-header">
			
	<div id="az-site-branding">
		<?php if ( get_theme_mod( 'az-minilogo') ) :?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name'); ?>">
				<img 
					class="az-fleft az-mini-logo" 
					alt="Logo mini" 
					src="<?php echo get_theme_mod( 'az-minilogo');?>"
				>
			</a>
		<?php endif; ?>
					
		<h1 class="az-site-title">
			<a 
				href="<?php echo esc_url( home_url( '/' ) ); ?>" 
				rel="home" title="<?php bloginfo('name'); ?>" 
				class="blog-name" 
				style="<?php echo sprintf( 'color: #%s;', get_header_textcolor() ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>
						
		<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<h2 class="site-description" style="<?php echo sprintf( 'color: #%s;', get_header_textcolor() ); ?>"><?php echo $description; ?></h2>
			<?php
			endif; ?>			
	</div>
			
								
	<?php if (az_has_header_image() ) : ?> 
	<div id="az-logo">
		<a href="<?php  echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
			<img 
				src="<?php header_image(); ?>" 
				height="<?php echo get_custom_header()->height; ?>" 
				width="<?php echo get_custom_header()->width; ?>" 
				alt="<?php bloginfo('name'); ?>"
				class="az-logo-img" 
			/>	
		</a>
	</div>
	<?php endif; ?>					
				
	<?php get_sidebar('header'); ?>				
</header>
