<?php
	$post_effect_block ='post-effect-block';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php
	$post_title = balanceTags(get_theme_mod( 'wi_home_post_title_type', 1 ));
	if( $post_title == 2  && !has_post_format('quote') ) : ?>
	<div class="post-header">
		
		<span class="sticky-post-icon"><i class="fa fa-bookmark"></i></span>
		
		<?php if(balanceTags(!get_theme_mod('wi_post_cat'))) : ?>
			<span class="post-meta cat"><?php wi_category(''); ?></span>
		<?php endif; ?>
				
		<?php if(is_single()) : ?>
			<h1><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></h1>
		<?php else : ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></a></h2>
		<?php endif; ?>
	</div>
	<?php endif; ?>
		
	
	<?php if(has_post_format('gallery')) : ?>
			
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
		<?php $gallery_type = get_post_meta($post->ID, '_format_gallery_type', true);
			  if( empty($gallery_type)) { $gallery_type = 'option0'; };
		?>
		
		<?php if($images) : ?>
		<?php if($gallery_type == 'option0') { ?>
		<div class="post-image owl-sl <?php echo balanceTags($post_effect_block); ?>">
		<ul class="owlslider">
		<?php foreach($images as $image) : ?>
			<?php $the_full_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb' ); ?>
			<?php $the_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb-fixed' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li>
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<img src="<?php echo esc_url($the_image[0]); ?>" alt="<?php echo the_title(); ?>">
			</li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php } elseif ($gallery_type == 'option1') { ?>
		<div class="post-image owl-sl <?php echo balanceTags($post_effect_block); ?>">
		<ul class="owlslider ">
		<?php foreach($images as $image) : ?>
			<?php $the_full_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb' ); ?> 
			<?php $the_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb' ); ?>
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li>
				<?php echo winvader_post_effect($the_image[0]); ?>
				<img src="<?php echo esc_url($the_image[0]); ?>" alt="<?php echo the_title(); ?>">
			</li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php } elseif ($gallery_type == 'option2') { ?>
		<div class="post-image">
		<ul class="grid-gallery-post grid-three-col">
		<?php foreach($images as $image) : ?>
			<?php $the_full_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb' ); ?>
			<?php $the_image = wp_get_attachment_image_src( $image, 'winvader-square-thumb-small' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li class="<?php echo balanceTags($post_effect_block); ?>">
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> >
			</li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php } elseif ($gallery_type == 'option3') { ?>
		<div class="post-image">
		<ul class="grid-gallery-post grid-four-col">
		<?php foreach($images as $image) : ?>
			<?php $the_full_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb' ); ?>
			<?php $the_image = wp_get_attachment_image_src( $image, 'winvader-square-thumb-small' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li class="<?php echo balanceTags($post_effect_block); ?>">
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> >
			</li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php } elseif ($gallery_type == 'option4') { ?>
		<div class="post-image">
		<ul class="grid-gallery-post grid-three-col grid-first-large-col">
		<?php 
		$gallery_element_counter = 0;
		foreach($images as $image) : ?>
		
			<?php if($gallery_element_counter == 0) { 
				  $the_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb-fixed' ); } else {
				  $the_image = wp_get_attachment_image_src( $image, 'winvader-square-thumb-small' ); }
				  $gallery_element_counter++;
			?>
			<?php $the_full_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb' ); ?>
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li class="<?php echo balanceTags($post_effect_block); ?>">
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> >
			</li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php } elseif ($gallery_type == 'option5') { ?>
		<div class="post-image">
		<ul class="grid-gallery-post grid-four-col grid-first-large-col">
		<?php 
		$gallery_element_counter = 0;
		foreach($images as $image) : ?>
		
			<?php if($gallery_element_counter == 0) { 
				  $the_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb-fixed' ); } else {
				  $the_image = wp_get_attachment_image_src( $image, 'winvader-square-thumb-small' ); }
				  $gallery_element_counter++;
			?>
			<?php $the_full_image = wp_get_attachment_image_src( $image, 'winvader-full-thumb' ); ?>	  
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li class="<?php echo balanceTags($post_effect_block); ?>">
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> >
			</li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php } ?>
		
		<?php endif; ?>
	
	<?php elseif(has_post_format('video')) : ?>
	
		<div class="post-image">
			<?php $wi_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
			<?php if(wp_oembed_get( $wi_video )) : ?>
				<?php echo wp_oembed_get($wi_video); ?>
			<?php else : ?>
				<?php echo balanceTags($wi_video); ?>
			<?php endif; ?>
		</div>
		
	<?php elseif(has_post_format('quote')) : ?>
	
		<div class="post-quote <?php echo balanceTags($post_effect_block); ?>">

			<?php if(balanceTags(!get_theme_mod('wi_post_thumb'))) { ?>
			<div class="post-image" <?php if(has_post_thumbnail()) : ?> style="background-image: url(<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'winvader-full-thumb', true); echo balanceTags($thumb_url[0]); ?>);" <?php endif; ?>>
				<div class="quote-text-wrapper">
				<?php $the_full_image = wp_get_attachment_image_src( $thumb_id, 'winvader-full-thumb' ); ?>
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<div class="quote-text"><a href="<?php echo get_permalink(); ?>"><?php the_content(); ?></a></div>
				<?php wp_link_pages(); ?>
				<br>
				<?php $wi_quote_name = get_post_meta( $post->ID, '_format_quote_source_name', true ); ?>
				<?php echo esc_attr($wi_quote_name); ?>
				<br>
				<?php $wi_quote_url = get_post_meta( $post->ID, '_format_quote_source_url', true); ?>
				<a href="<?php echo esc_attr($wi_quote_url); ?>" title="<?php echo esc_attr($wi_quote_url); ?>"><?php echo esc_attr($wi_quote_url); ?></a>
				</div>
			</div>
			<?php } else { ?>
				<div class="quote-text-wrapper">
				<span class="quote-text"><a href="<?php echo get_permalink(); ?>"><?php the_content(); ?></a></span>
				<?php wp_link_pages(); ?>
				<br>
				<?php $wi_quote_name = get_post_meta( $post->ID, '_format_quote_source_name', true ); ?>
				<?php echo esc_attr($wi_quote_name); ?>
				<br>
				<?php $wi_quote_url = get_post_meta( $post->ID, '_format_quote_source_url', true); ?>
				<a href="<?php echo esc_attr($wi_quote_url); ?>" title="<?php echo esc_attr($wi_quote_url); ?>"><?php echo esc_attr($wi_quote_url); ?></a>
				</div>
			<?php } ?>
						
		</div>	
	
	<?php elseif(has_post_format('audio')) : ?>
	
		<div class="post-image audio">
		<?php if(has_post_thumbnail()) : ?>
		<?php if(balanceTags(!get_theme_mod('wi_post_thumb'))) : ?>
		<div class="post-image <?php echo balanceTags($post_effect_block); ?>">
				
				<?php $the_full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'winvader-full-thumb' ); ?>
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<?php the_post_thumbnail('winvader-full-thumb'); ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		
			<?php $wi_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if(wp_oembed_get( $wi_audio )) : ?>
				<?php echo wp_oembed_get($wi_audio); ?>
			<?php else : ?>
				<?php echo balanceTags($wi_audio); ?>
			<?php endif; ?>
		</div>
	
	<?php else : ?>
		
		<?php if(has_post_thumbnail()) : ?>
		<?php if(balanceTags(!get_theme_mod('wi_post_thumb'))) : ?>
		<div class="post-image <?php echo balanceTags($post_effect_block); ?>">
				
				<?php $the_full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'winvader-full-thumb' ); ?>
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<?php the_post_thumbnail('winvader-full-thumb'); ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		
	<?php endif; ?>
	
	<?php
	if( $post_title == 1 && !has_post_format('quote')) : ?>
	<div class="post-header">
		<span class="sticky-post-icon"><i class="fa fa-bookmark"></i></span>
		
		<?php if(balanceTags(!get_theme_mod('wi_post_cat'))) : ?>
			<span class="post-meta cat"><?php wi_category(''); ?></span>
		<?php endif; ?>
		
		<?php if(is_single()) : ?>
			<h1><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></h1>
		<?php else : ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></a></h2>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	
	<div class="post-entry">
	
		<?php 
		
		if(!is_single() && !has_post_format('quote')) {
			$home_content_type   = balanceTags(get_theme_mod('wi_home_post_content_type', 'full'));
			$home_excerpt_length = balanceTags(get_theme_mod('wi_home_excerpt_length'));
			$post_content = winvader_post_content($home_content_type, $home_excerpt_length); 
			echo balanceTags($post_content); 
		} elseif (has_post_format('quote')) {
			
		} else {
			the_content();
		}
		?>
		<?php if (!has_post_format('quote')):?>
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
			<?php endif; ?>
			
			<?php wp_link_pages(); ?>
			
			<?php if(balanceTags(!get_theme_mod('wi_post_tags'))) : ?>
			<?php if(is_single()) : ?>
				<div class="post-tags">
					<?php if(balanceTags(get_theme_mod('wi_tags_title', '标签'))) : ?> 
					<span class="tags-title"><?php echo esc_html(get_theme_mod('wi_tags_title', '标签：'));?></span>
					<?php endif; ?>
					<?php the_tags("",""); ?>
				</div>
			<?php endif; ?>
			<?php endif; ?>
	</div>
	
	
	<?php if(balanceTags(!get_theme_mod('wi_post_author'))) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/about_author'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(balanceTags(!get_theme_mod('wi_post_related'))) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/related_posts'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php comments_template( '', true );  ?>
	
	<?php if(balanceTags(!get_theme_mod('wi_post_nav'))) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/post_pagination'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
</article>