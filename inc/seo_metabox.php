<?php
/*https://wp-kama.ru/id_740/blok-proizvolnyih-poley-v-adminke-wordpress-svoimi-rukami.html*/
?>
<?php
	add_action('add_meta_boxes', 'my_extra_fields', 1);

	function my_extra_fields() {
		add_meta_box( 'extra_fields', __('Meta fields (az-theme SEO)' , 'az-theme'), 'extra_fields_box_func', 'post', 'normal', 'high'  );
		add_meta_box( 'extra_fields', __('Meta fields (az-theme SEO)' , 'az-theme'), 'extra_fields_box_func', 'page', 'normal', 'high'  );
	}

	// код блока
	function extra_fields_box_func( $post ){
		?>
		<p>
			<label>
				<?php _e('Meta title' , 'az-theme');?>
				<input 	type="text" 
						name="extra[az-meta-title]"
						value="<?php echo get_post_meta($post->ID, 'az-meta-title', 1); ?>"
						style="width:100%" 
				/>			
			</label>
		</p>

		<p><?php _e('Meta description' , 'az-theme');?>
			<textarea type="text" name="extra[az-meta-description]" style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'az-meta-description', 1); ?>
			</textarea>
		</p>
		
		<p><?php _e('Meta keywords' , 'az-theme');?>
			<textarea type="text" name="extra[az-meta-keywords]" style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'az-meta-keywords', 1); ?>
			</textarea>
		</p>
		
		<p><?php _e('Meta robots' , 'az-theme');?>
			<?php $mark_v = get_post_meta($post->ID, 'az-meta-robots', 1); ?>
			 <label><input type="radio" name="extra[az-meta-robots]" value="" <?php checked( $mark_v, '' ); ?> /> index,follow</label>
			 <label><input type="radio" name="extra[az-meta-robots]" value="nofollow" <?php checked( $mark_v, 'nofollow' ); ?> /> nofollow</label>
			 <label><input type="radio" name="extra[az-meta-robots]" value="noindex" <?php checked( $mark_v, 'noindex' ); ?> /> noindex</label>
			 <label><input type="radio" name="extra[az-meta-robots]" value="noindex,nofollow" <?php checked( $mark_v, 'noindex,nofollow' ); ?> /> noindex,nofollow</label>
		</p>

		<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
		<?php
	}

	// включаем обновление полей при сохранении
	add_action('save_post', 'my_extra_fields_update', 0);

	/* Сохраняем данные, при сохранении поста */
	function my_extra_fields_update( $post_id ){
		if ( !isset($_POST['extra_fields_nonce']) || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; 
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 
		if ( !current_user_can('edit_post', $post_id) ) return false; 
		if( !isset($_POST['extra']) ) return false; 

		$_POST['extra'] = array_map('trim', $_POST['extra']);
		foreach( $_POST['extra'] as $key=>$value ){
			if( empty($value) ){
				delete_post_meta($post_id, $key); 
				continue;
			}
			update_post_meta($post_id, $key, $value); 
		}
		return $post_id;
	}