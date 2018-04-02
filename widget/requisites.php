<?php 
	class az_requisite_widget extends WP_Widget {
		function __construct() {
			parent::__construct(
				'az_requisite_widget', 		
				__('Requisite Widget' , 'az-theme'),
				array( 
					'description' => __( 'Enter your requisites here', 'az-theme' ), 
				) 
			);
		}

		// Создаем фронт-энд виджета	
		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			
			echo $args['before_widget'];
				if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];

				// Здесь исполняется код и выводится результат
				?>
				
				<div class="az-requisites">
					<?php	if ( ! empty ($instance['address']) ): ?>
						<div class="az-address-wrap">
							<address class="az-address">
								<?php echo $instance['address'];?>
							</address>
						</div>				
					<?php endif; ?>

					
					<?php	if ( ! empty ($instance['tel']) ): ?>
						<div class="az-tel-wrap">
							<a href="tel:<?php echo '+'.$instance['tel']; ?>" class='az-tel'">
							<?php echo $instance['tel']; ?>
							</a>							
						</div>				
					<?php endif; ?>
					
					<?php	if ( ! empty ($instance['tel2']) ): ?>
						<div class="az-tel-wrap">
							<a href="tel:<?php echo '+'.$instance['tel2']; ?>" class='az-tel'">
							<?php echo $instance['tel2']; ?>
							</a>							
						</div>				
					<?php endif; ?>
					
					<?php	if ( ! empty ($instance['email']) ): ?>
						<div class="az-email-wrap">
							<a href="mailto:<?php echo '+'.$instance['email']; ?>" class='az-email'">
							<?php echo $instance['email']; ?>
							</a>							
						</div>				
					<?php endif; ?>
					
				</div>
				<?php
				echo $args['after_widget'];
		}
		
		// Бек-энд виждета
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ];
			else $title = __( 'Requisites' , 'az-theme' );
			
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">
					<?php _e( 'Title:', 'az-theme' ); ?>
				</label>
				
				<input 
					class="widefat" 
					id="<?php echo $this->get_field_id( 'title' ); ?>" 
					name="<?php echo $this->get_field_name( 'title' ); ?>" 
					type="text" 
					value="<?php echo esc_attr( $title ); ?>" 
				/>
			</p>
			
			<?php			
				if ( isset( $instance[ 'address' ] ) ) $address = $instance[ 'address' ];
				else $address = __( 'Your address' , 'az-theme' );			
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'address' ); ?>">
					<?php _e( 'Address:', 'az-theme' ); ?>
				</label>
				
				<input 
					class="widefat" 
					id="<?php echo $this->get_field_id( 'address' ); ?>" 
					name="<?php echo $this->get_field_name( 'address' ); ?>" 
					type="text" 
					value="<?php echo esc_attr( $address ); ?>" 
				/>
			</p>
			
			<?php			
				if ( isset( $instance[ 'tel' ] ) ) $tel = $instance[ 'tel' ];
				else $tel = __( '0123456789' , 'az-theme' );					
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tel' ); ?>">
					<?php _e( 'Phone:', 'az-theme' ); ?>
				</label>
				
				<input 
					class="widefat" 
					id="<?php echo $this->get_field_id( 'tel' ); ?>" 
					name="<?php echo $this->get_field_name( 'tel' ); ?>" 
					type="tel" 
					value="<?php echo esc_attr( $tel ); ?>" 
				/>
			</p>
			
			<?php			
				if ( isset( $instance[ 'tel2' ] ) ) $tel2 = $instance[ 'tel2' ];
				else $tel2 = __( '0123456789' , 'az-theme' );					
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tel2' ); ?>">
					<?php _e( 'Phone 2:', 'az-theme' ); ?>
				</label>
				
				<input 
					class="widefat" 
					id="<?php echo $this->get_field_id( 'tel2' ); ?>" 
					name="<?php echo $this->get_field_name( 'tel2' ); ?>" 
					type="tel" 
					value="<?php echo esc_attr( $tel2 ); ?>" 
				/>
			</p>
			
			<?php			
				if ( isset( $instance[ 'email' ] ) ) $email = $instance[ 'email' ];
				else $email = __( 'example@example.com' , 'az-theme' );			
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'email' ); ?>">
					<?php _e( 'E-mail:', 'az-theme' ); ?>
				</label>
				
				<input 
					class="widefat" 
					id="<?php echo $this->get_field_id( 'email' ); ?>" 
					name="<?php echo $this->get_field_name( 'email' ); ?>" 
					type="email" 
					value="<?php echo esc_attr( $email ); ?>" 
				/>
			</p>
			<?php 
			
		}
			
		// Обновляем виджет
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
			
			$instance['tel'] = ( ! empty( $new_instance['tel'] ) ) ? strip_tags( $new_instance['tel'] )*1 : '';
			$instance['tel2'] = ( ! empty( $new_instance['tel2'] ) ) ? strip_tags( $new_instance['tel2'] )*1 : '';
			$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
			return $instance;
		}
	} // end az_requisite_widget class

function az_load_widget() {
	register_widget( 'az_requisite_widget' );
}
add_action( 'widgets_init', 'az_load_widget' );
?>