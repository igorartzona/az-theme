<?php $menu_position = get_theme_mod( 'az-menu-position' , 'after-header' );	?>    

    <!-- Primary menu -->
        <?php if( has_nav_menu( 'az_menu' ) ) : ?>
	
			<input type="checkbox" id="menu-checkbox"  />
			<nav class="az-primary-nav <?php echo 'az-primary-nav-'.$menu_position;?>" role="navigation" id="menu">
				<label class="toggle-button" for="menu-checkbox" onclick></label>
				<?php 
					wp_nav_menu( 
						array(
							'theme_location' => 'az_menu',
							'fallback_cb' => false,
						) 
					);
				?>
			</nav>
		
		<?php endif; ?>
		<!-- Primary menu end -->
