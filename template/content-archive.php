<!-- Archive Template-->
<article  <?php post_class('az-article clearfix'); ?> id="post-<?php the_ID(); ?>">	
				
	<?php if ( get_theme_mod( 'az-archive-meta', true) ) : ?>
			<div class="az-article-meta">			
				<?php if ( get_theme_mod( 'az-archive-date', true) ) : ?>
					<span class="az-posttitle-date">
						<?php echo the_time( get_option( 'date_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-archive-time', false) ) : ?>
					<span class="az-posttitle-time">
						<?php echo the_time( get_option( 'time_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-archive-author', true) ) : ?>
					<span class="az-author-meta">
						<?php the_author_meta('display_name'); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( has_category() ) : ?>
					<?php if ( get_theme_mod( 'az-archive-category', false) ) : ?>
						<span class="az-category-meta">
							<?php the_category(', ')?>
						</span>
					<?php endif; ?>
				<?php endif; ?>	

				<?php if ( get_theme_mod( 'az-archive-comments', false) ) : ?>
					<span class="az-comment-meta">
						<?php comments_popup_link( sprintf( __( 'Leave a comment', 'az-theme' ), get_the_title() ) ); ?>
					</span>
				<?php endif; ?>	

			</div>
		<?php endif; ?>
	

	
	<?php if ( get_theme_mod( 'az-archive-title', true) ) : ?>
			<h3 class="az-posttitle">
				<a href="<?php the_permalink() ?>"> <?php the_title();?> </a>
			</h3>
		<?php endif; ?>	
	
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="az-index-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
		</div>
	<?php endif; ?>				
	
	<div class="entry">													
		<?php	
			$length = apply_filters('content_length',40);
			echo wp_trim_words(get_the_content(),$length).
			'<p>
			<a class="more-link" href='.get_the_permalink().'>'.__('Read more&rArr;','az-theme').'</a>
			</p>';			
		?>					
	</div> 			
          
</article> 
