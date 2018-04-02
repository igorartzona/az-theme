<!-- Article as blog Template (Frontpage) -->
<article  <?php post_class('az-frontpage-article clearfix'); ?> id="post-<?php the_ID(); ?>">				
				
	<?php if (!is_sticky() ) : ?>
				
		<?php if ( get_theme_mod( 'az-frontpage-meta', true) ) : ?>
			<div class="az-article-meta">			
				<?php if ( get_theme_mod( 'az-frontpage-date', true) ) : ?>
					<span class="az-posttitle-date">
						<?php echo the_time( get_option( 'date_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-frontpage-time', false) ) : ?>
					<span class="az-posttitle-time">
						<?php echo the_time( get_option( 'time_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-frontpage-author', true) ) : ?>
					<span class="az-author-meta">
						<?php the_author_meta('display_name'); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( has_category() ) : ?>
					<?php if ( get_theme_mod( 'az-frontpage-category', false) ) : ?>
						<span class="az-category-meta">
							<?php the_category(', ')?>
						</span>
					<?php endif; ?>
				<?php endif; ?>	

				<?php if ( get_theme_mod( 'az-frontpage-comments', false) ) : ?>
					<span class="az-comment-meta">
						<?php comments_popup_link( sprintf( __( 'Leave a comment', 'az-theme' ), get_the_title() ) ); ?>
					</span>
				<?php endif; ?>				
			</div>
		<?php endif; ?>
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="az-index-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			</div>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'az-frontpage-title', true) ) : ?>
			<h3 class="az-posttitle">
				<a href="<?php the_permalink() ?>"> <?php the_title();?> </a>
			</h3>
		<?php endif; ?>
		
	<?php else: ?>
		
		<?php if ( get_theme_mod( 'az-frontpage-title', true) ) : ?>
			<h3 class="az-stickytitle">
				<a href="<?php the_permalink() ?>"> <?php the_title();?> </a>
			</h3>
		<?php endif; ?>
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="az-sticky-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
			</div>					
		<?php endif; ?>
		
	<?php endif; ?>	
		
	<div class="entry">													
		<?php							
			if( has_excerpt() ) { 
				$length = apply_filters('excerpt_length',40);
				echo wp_trim_words(get_the_excerpt(),$length).
				'<p>
					<a class="more-link" href='.get_the_permalink().'>'.__('Read more&rArr;','az-theme').'</a>
				</p>'; 
			} else the_content( __('Read more&rArr;','az-theme') );								
		?>					
	</div> 			
          
</article> 
