<?php
	$post_effect_block ='post-effect-block';
	$block_counter = 2;
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
		
		<?php if($block_counter % 2 == 1) : ?>
		<?php if(has_post_thumbnail()) : ?>
		<?php if(balanceTags(!get_theme_mod('wi_post_thumb'))) : ?>
		<div class="post-image <?php echo balanceTags($post_effect_block); ?>">
				
				<?php $the_full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'winvader-full-thumb' ); ?>
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<?php the_post_thumbnail('winvader-masonry-thumb'); ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		<?php endif; ?>
		
		<div class="item-content">
			<span class="sticky-post-icon"><i class="fa fa-bookmark"></i></span>
		
			<?php if(balanceTags(!get_theme_mod('wi_post_cat'))) : ?>
				<span class="post-meta cat"><?php wi_category(''); ?></span>
			<?php endif; ?>
				
			<?php if(is_single()) : ?>
				<h1><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></h1>
			<?php else : ?>
				<span class="first-title-letter"><?php echo winvader_title_first_letter(get_the_title()); ?></span>
				<h2><a href="<?php echo get_permalink(); ?>"><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></a></h2>
			<?php endif; ?>
			
			<p class="excerpt"><?php
			if(!is_single()) {
				$home_excerpt_length = balanceTags(get_theme_mod('wi_home_excerpt_length', 280));
				$post_content = winvader_post_content('excerpt', $home_excerpt_length); 
				echo balanceTags($post_content); 
			}
			?></p>
			<div class="post-footer">
			<?php if(balanceTags(!get_theme_mod('wi_post_likes'))) : ?>
				<?php echo winvader_likes_meta(); ?>
			<?php endif; ?>
			
			<?php if(balanceTags(!get_theme_mod('wi_post_comments'))) : ?>
				<?php echo winvader_comments_meta(); ?>
			<?php endif; ?>
			
			<?php if(balanceTags(!get_theme_mod('wi_post_date'))) : ?>
				<span class="post-meta date"><?php the_time( get_option('date_format') ); ?></span>
			<?php endif; ?>
			
			<?php if(balanceTags(!get_theme_mod('wi_post_share'))) : ?>
			<span class="post-share">
				<?php echo esc_html__( 'Share ', 'winvader' ); ?>
				<span class="post-share-show">
				<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
				<a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php $string = get_the_title(); $string = preg_replace('/\s+/', '%20', $string); echo balanceTags($string); ?>%20-%20<?php the_permalink(); ?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
				<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
				<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo balanceTags($pin_image); ?>&amp;description=<?php $string = get_the_title(); $string = preg_replace('/\s+/', '%20', $string); echo balanceTags($string); ?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>
				<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
				</span>
			</span>
			<?php endif; ?>
			</div>
			
		</div>
		
		<?php if($block_counter % 2 != 1) : ?>
		<?php if(has_post_thumbnail()) : ?>
		<?php if(balanceTags(!get_theme_mod('wi_post_thumb'))) : ?>
		<div class="post-image <?php echo balanceTags($post_effect_block); ?>">
				
				<?php $the_full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'winvader-full-thumb' ); ?>
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<?php the_post_thumbnail('winvader-masonry-thumb'); ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		<?php endif; ?>
		
	</article>
</li>
<?php $block_counter++; ?>
<?php endwhile; ?>
<?php endif; ?>