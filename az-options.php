<?php
/*-- Notice after theme install --*/
	function notice_after_theme_install() {
		?>
		<div class="updated">
			<p>
				<img 
					src="<?php echo get_template_directory_uri(); ?>/img/logo_stork.png" 
					width="24"
					height="24"
					alt="logo-stork"					
				>
				<?php 
					_e('Thanks for use theme. You can delete theme data <a href="?page=az_theme_id"> here</a>' , 'az-theme');
				?>
			</p>
		</div>
		<?php
	}
	if (isset($_GET['activated']) ) add_action( 'admin_notices', 'notice_after_theme_install' );
/*-- END Notice after theme install --*/

/*-- Add page "settings"" to admin panel --*/
	add_action('admin_init' , 'az_settings');
	function az_settings(){
		register_setting( 'az_tab1_group' , 'az_theme_options' );		
		add_settings_section( 'az_tab1', '','az_tab1_description', 'az_theme_id1' );	
		add_settings_field('az_tab1_field1', __( 'Press button to delete theme data from DB', 'az-theme' ), 'fill_az_tab1_field1', 'az_theme_id1', 'az_tab1' );
	}

	add_action('admin_menu', 'az_theme_settings');
	function az_theme_settings() {
		add_theme_page(__( 'Additional theme capabilities' , 'az-theme' ), __( 'Additional theme capabilities' , 'az-theme' ), 'edit_theme_options', 'az_theme_id', 'az_theme_function');
	}
	
	function az_theme_function(){			
	
		global $select_options, $radio_options;
		if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;	
		?>		
		<div class="wrap">		
		
			<div class="az-admin-wrap">

				<form action="options.php" method="POST" >	
				<fieldset>
					<legend>
						<img 
							src="<?php echo get_template_directory_uri(); ?>/img/logo_stork.png" 
							width="24" 
							height="24" 
							alt="logo_stork"
							class="logo-ministork"
						>
						<span class="az-admin-title"><?php echo get_admin_page_title() ?></span>
					</legend>
					
					<!-- NOTICE MESSAGE -->
						<div class="notice notice-warning" style="padding:1em;">
							<?php _e( 'Warning! Be careful by system settings!' , 'az-theme' ); ?>
						</div>
					<!-- END NOTICE MESSAGE -->
					
					<!-- UPDATE MESSAGE -->
						<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
							<div id="message" class="updated">
								<?php 
									$val = get_option('az_theme_options');
									if ( isset($val['az_clear_DB']) ){
										delete_option('az_theme_options');
										remove_theme_mods();
										_e( '<p>Theme data is successful delete!</p>' , 'az-theme' );	
									} else { ?>
										<p>
											<strong><?php _e( 'Options saved' , 'az-theme' ); ?></strong>
										</p>
									<?php }
								?>
							</div>
						<?php endif; ?>
					<!-- END UPDATE MESSAGE -->
					
					<!-- TAB http://codepen.io/oknoblich/pen/tfjFl -->
						<input id="tab1" type="radio" name="tabs" checked class="tabs">
						<label for="tab1" class="tab-label">
							<span class="tab1-title">
								<?php _e( 'Clean theme data' , 'az-theme' ); ?>
							</span>
						</label> 	  
					  
						<section id="content1">		
							<?php settings_fields( 'az_tab1_group' ); ?>
							<?php do_settings_sections( 'az_theme_id1' ); ?>
						</section>
					<!-- END TAB -->
					
				</fieldset>	
				</form>			
			</div> <!-- az-admin-wrap -->
		
		</div> <!-- wrap -->
		<?php
	} /*-- az_theme_function end --*/
?>
<?php
	function az_tab1_description(){
		echo '<img style="float:left;" src="'.get_template_directory_uri().'/img/cleanup64.png">';
		 _e( 'Recommended delete data before uninstall theme' , 'az-theme' );
	}
		
	function fill_az_tab1_field1(){			
		submit_button(__('Clean DB' , 'az-theme'),'button-clean','az_theme_options[az_clear_DB]');	
	}	
?>
