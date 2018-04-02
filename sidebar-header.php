<?php if ( is_active_sidebar('header-sidebar') ) : ?>
	<?php if ( get_theme_mod( 'sidebar-header', true) ) : ?>
		<div class="az-header-sidebar">
			<?php  dynamic_sidebar( 'header-sidebar' ); ?> 
		</div>
	<?php endif; ?>
<?php endif; ?>