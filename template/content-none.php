<!-- None Template-->
<?php 
	dimox_breadcrumbs();
	if( is_search() ) : ?>
		
		<div class="az-search-title">
			<?php get_search_form(); ?>
			<?php printf( esc_html__( 'Not Found for : %s','az-theme' ), '<strong>' . get_search_query() . '</strong>' ); ?>
		</div>
		
		<div class="az-search-notfound">
			<img src="<?php echo get_template_directory_uri(); ?>/img/search-stork.png">
		</div>
	<?php endif;	
		
	if( is_404() )	: ?>
		<?php _e('Page not found' , 'az-theme'); ?>
		<div class="az-search-notfound">
			<img src="<?php echo get_template_directory_uri(); ?>/img/404-stork.jpg">
		</div>
	<?php endif;
?>

