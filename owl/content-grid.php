<?php
	$post_effect_block ='post-effect-block';
?>

<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
		
		<?php if(has_post_thumbnail()) : ?>
		<?php if(balanceTags(!get_theme_mod('wi_post_thumb'))) : ?>
		<div class="post-image <?php echo balanceTags($post_effect_block); ?>">
				
				<?php $the_full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'winvader-full-thumb' ); ?>
				<?php echo winvader_post_effect($the_full_image[0]); ?>
				<?php the_post_thumbnail('winvader-thumb'); ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		
		<div class="item-content">
			<span class="sticky-post-icon"><i class="fa fa-bookmark"></i></span>
			
			<?php if(balanceTags(!get_theme_mod('wi_post_cat'))) : ?>
				<span class="post-meta cat"><?php wi_category(''); ?></span>
			<?php endif; ?>
				
			<?php if(balanceTags(!get_theme_mod('wi_post_date'))) : ?>
				<span class="post-meta date"><?php the_time( get_option('date_format') ); ?></span>
			<?php endif; ?>
			
			<?php if(is_single()) : ?>
				<h1><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></h1>
			<?php else : ?>
				<h2><a href="<?php echo get_permalink(); ?>"><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></a></h2>
			<?php endif; ?>
		
		</div>
		
	</article>
</li>