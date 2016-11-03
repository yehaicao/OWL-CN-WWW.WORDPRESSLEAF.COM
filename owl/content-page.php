<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$post_title = balanceTags(get_theme_mod( 'wi_home_post_title_type', 1 ));
	if( $post_title == 1) : ?>	
	<div class="post-header">
		<h1><?php the_title(); ?></h1>
	</div>
	<?php endif; ?>
	
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
	<div class="post-image <?php $post_effect_block ='page-effect-block'; echo balanceTags($post_effect_block); ?>">
		<?php $the_full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'winvader-full-thumb' ); ?>
		<?php echo winvader_page_effect($the_full_image[0]); ?>
		<?php the_post_thumbnail('winvader-small-height-thumb'); ?>
	</div>
	<?php endif; ?>
	
	<?php
	$post_title = balanceTags(get_theme_mod( 'wi_home_post_title_type', 1 ));
	if( $post_title == 2) : ?>	
	<div class="post-header">
		<h1><?php the_title(); ?></h1>
	</div>
	<?php endif; ?>
	
	<div class="post-entry">
	
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	
	</div>
	
	<?php if(balanceTags(!get_theme_mod('wi_page_share'))) : ?>
	<div class="page-footer">
	<div class="page-footer-col">
		<div class="post-share">
			<?php echo esc_html__( 'Share: ', 'winvader' ); ?>
			
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
			<a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php $string = get_the_title(); $string = preg_replace('/\s+/', '%20', $string); echo balanceTags($string); ?>%20-%20<?php the_permalink(); ?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
			<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
			<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo balanceTags($pin_image); ?>&amp;description=<?php $string = get_the_title(); $string = preg_replace('/\s+/', '%20', $string); echo balanceTags($string); ?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>
			<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
			<?php if(balanceTags(!get_theme_mod('wi_page_comments'))) : ?>
				<?php echo esc_html__( 'or ', 'winvader' ); ?><?php comments_popup_link( '<span class="share-box comment">'.esc_html__( "Comment", "winvader" ) .'</span>', '<span class="share-box comment">'. esc_html__( "Comment", "winvader" ) .'</span>', '<span class="share-box comment">'. esc_html__( "Comment", "winvader" ) .'</span>', '', ''); ?>
			<?php endif; ?>
		</div>
	</div>
	</div>
	<?php endif; ?>
	
	<?php if(balanceTags(!get_theme_mod('wi_page_comments'))) : ?>
		<?php comments_template( '', true );  ?>
	<?php endif; ?>
	
</article>