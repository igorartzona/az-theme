<!-- Page Template-->			
<article  <?php post_class('az-article clearfix'); ?> id="page-<?php the_ID(); ?>">	
						
	<?php edit_post_link(__('Edit This'),'<span class="az-edit">','</span>'); ?>
	
		<?php if ( get_theme_mod( 'az-page-meta', true) ) : ?>
			<div class="az-article-meta">			
				<?php if ( get_theme_mod( 'az-page-date', true) ) : ?>
					<span class="az-posttitle-date">
						<?php echo the_time( get_option( 'date_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-page-time', false) ) : ?>
					<span class="az-posttitle-time">
						<?php echo the_time( get_option( 'time_format' )); ?>
					</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'az-page-author', true) ) : ?>
					<span class="az-author-meta">
						<?php the_author_meta('display_name'); ?>
					</span>
				<?php endif; ?>
				
			</div>
		<?php endif; ?>
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="az-single-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
			</div>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'az-page-title', true) ) : ?>
			<h3 class="az-posttitle">
				<a href="<?php the_permalink() ?>"> <?php the_title();?> </a>
			</h3>
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

<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
		
	



