<?php	if ( post_password_required() ) return; ?>

<div id="comments" class="comments-area">

	<?php
	
	if ( have_comments() ) : ?>
		<h4 class="pre_comment"></h4>
		<h2 class="comments-title">
			<?php _e( 'Comments :' , 'az-theme')?>
			<?php
			/*
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(					
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'az-theme' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.					
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'az-theme' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			*/
			?>
		</h2><!-- .comments-title -->

		<?php 
		
			$args = array(
				'mid_size'     => 3,
				'prev_text'    => __('&laquo;'),
				'next_text'    => __('&raquo;'),
			);
		
		//the_comments_pagination($args); ?>

		<ul class="comment-list">
			<?php
				
				wp_list_comments( array(					
					'style'      	=> 'ul',
					'short_ping' 	=> true,
					'avatar_size' 	=> 64,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php 
			
		
		the_comments_pagination($args);

		// If comments are closed 
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'az-theme' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	if ( ! isset( $args['format'] ) )
	$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];
	
	$defaults = array(
		'fields'    => array(
						'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
						'<br /><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
						'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
						'<br /><input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
						'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
						'<br /><input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
						),
	);
	
	
	comment_form($defaults);
	?>

</div><!-- #comments -->