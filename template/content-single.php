<!-- Single post Template-->			
<article  <?php post_class('az-article clearfix'); ?> id="post-<?php the_ID(); ?>">	
						
	<?php edit_post_link(__('Edit This'),'<span class="az-edit">','</span>'); ?>
	
		<?php if ( get_theme_mod( 'az-post-meta', true) ) : ?>
			<div class="az-article-meta">			
				<?php if ( get_theme_mod( 'az-post-date', true) ) : ?>
					<span class="az-posttitle-date">
						<?php echo the_time( get_option( 'date_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-post-time', false) ) : ?>
					<span class="az-posttitle-time">
						<?php echo the_time( get_option( 'time_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-post-author', true) ) : ?>
					<span class="az-author-meta">
						<?php the_author_meta('display_name'); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( has_category() ) : ?>
					<?php if ( get_theme_mod( 'az-post-category', false) ) : ?>
						<span class="az-category-meta">
							<?php the_category(', ')?>
						</span>
					<?php endif; ?>
				<?php endif; ?>				
			</div>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'az-post-title', true) ) : ?>
			<h3 class="az-posttitle">
				<a href="<?php the_permalink() ?>"> <?php the_title();?> </a>
			</h3>
		<?php endif; ?>	

		<?php if ( has_post_thumbnail() ) : ?>
			<?php if ( get_theme_mod( 'az-post-thumbnail', true) ) : ?>
				<div class="az-single-thumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				</div>
			<?php endif; ?>
		<?php endif; ?>		
								
		<div class="entry clearfix">
			<?php the_content(); ?>										
		</div>                                
                
		<?php if ( has_tag() ) : ?>
			<div class="az-article-meta">                    
				<span class="az-tags-meta"><?php the_tags(__('Tags: ','az-theme'),', ',' ');?></span>        
			</div>
		<?php endif; ?>
				
	<!-- nextpage tag support -->
		<?php
			$defaults = array(
				'before'           => '<div class="navigation">' . __( 'Pages:','az-theme' ),
				'after'            => '</div>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => __( 'Next page','az-theme' ),
				'previouspagelink' => __( 'Previous page','az-theme' ),
				'pagelink'         => '%',
				'echo'             => 1
			);	
		?>
					
		<?php wp_link_pages( $defaults );?>						

</article>

<?php if ( get_theme_mod( 'az-post-prev-next-link', true) && get_previous_post_link() ) : ?>
	<div class="az-prev-next-link clearfix">
		<span class="az-prev-link"><?php previous_post_link('%link', '&lArr;%title'); ?></span>
		<span class="az-next-link alignright"><?php next_post_link('%link', '%title&rArr;'); ?></span>
	</div>
<?php endif; ?>	

<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
		
	



