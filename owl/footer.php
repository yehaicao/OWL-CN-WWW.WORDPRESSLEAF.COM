<?php 

$mostdicussed_home  = balanceTags(!get_theme_mod( 'wi_mostdicussed_home' ));
$mostdicussed_other = balanceTags(get_theme_mod( 'wi_mostdicussed_other' ));
$ishome = '';
$isother = '';
if( is_home() && $mostdicussed_home ){ $ishome = 1; }

if( !is_home() && !$mostdicussed_other ){ $isother = 1; }
if($ishome == 1 xor $isother == 1) :

  ?>

	<div class="most-discussed">
		<span class="most-discussed-title"><?php echo esc_html(get_theme_mod( 'wi_mostdicussed_title', '评论最多' )); ?></span>
		
		<div id="most-discussed-slider" class="owl-carousel">
			<?php $discussed_postcount = balanceTags(get_theme_mod( 'wi_mostdicussed_postcount', 8 ));
				  $discussed_query = new WP_Query( array( 'orderby' => 'comment_count', 'showposts' => $discussed_postcount, 'ignore_sticky_posts' => 1 ) ); ?>
			<?php if ($discussed_query->have_posts()) : while ($discussed_query->have_posts()) : $discussed_query->the_post(); ?>
			
			
			<div class="item">
				<div class="post-image" <?php if(has_post_thumbnail()) : ?> style="background-image: url(<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'winvader-full-thumb', true); echo balanceTags($thumb_url[0]); ?>);" <?php endif; ?>>
					<h3><a href="<?php echo get_permalink() ?>"><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></a></h3>
					<a href="<?php echo get_permalink() ?>" class="button"><?php echo balanceTags(get_theme_mod( 'wi_mostdicussed_readmore', '阅读全文' ))?></a>
				</div>
			</div>
			
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php endif; ?>
	
	<!-- END CONTAINER -->
	</div>
	
	<?php if(balanceTags(!get_theme_mod('wi_footer_widget_area'))) : ?>
	<div id="widget-area">
	
		<div class="container">
			
			<div class="footer-widget-wrapper">
				<?php	/* Widgetised Area */	if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar('Footer 1'); } ?>
			</div>
			
			<div class="footer-widget-wrapper">
				<?php	/* Widgetised Area */	if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar('Footer 2'); } ?>
			</div>
			
			<div class="footer-widget-wrapper last">
				<?php	/* Widgetised Area */	if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar('Footer 3'); } ?>
			</div>
			
		</div>
		
	</div>
	<?php endif; ?>
	
	<?php 
	$footer_logo_area = balanceTags(get_theme_mod( 'wi_footer_logo_area', 1 ));
	if(isset($_GET['footer_logo_area'])) {
		$footer_logo_area = $_GET['footer_logo_area'];
	}
	
	if($footer_logo_area) : ?>
	<div id="footer-logo">
		
		<div class="container">
			
			<?php if(balanceTags(get_theme_mod('wi_footer_logo'))) : ?>
				<img src="<?php echo balanceTags(get_theme_mod('wi_footer_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			<?php endif; ?>
			
		</div>
		
	</div>
	<?php endif; ?>
	
	
	<?php if(balanceTags(!get_theme_mod('wi_footer_social'))) : ?>
	<div id="footer-social">
	
		<div class="container">
		<div class="footer-social-wrapper">
		
		<?php echo winvader_social_icons(); ?>
		
		</div>
		</div>
		
	</div>
	<?php endif; ?>
	
	<?php if(balanceTags(!get_theme_mod('wi_large_footer_widget_area'))) : ?>
	<div id="widget-insta-area">
			
			<div class="insta-footer-widget-wrapper">
				<?php	/* Widgetised Area */	if ( is_active_sidebar( 'footer-instagram' ) ) { dynamic_sidebar('Footer Instagram'); } ?>
			</div>		
		
	</div>
	<?php endif; ?>
		
	<footer id="footer-copyright">
		
		<div class="container">
		
			<?php if(balanceTags(get_theme_mod('wi_footer_copyright', date('Y').' &copy; <a href="'.home_url().'">'.get_bloginfo( 'name' ).'</a> 保留所有权利 <br/> OWL中文版由<a rel="nofollow" target="_blank" href="http://themostspecialname.com">NAME</a> <a rel="nofollow" target="_blank" href="http://www.wordpressleaf.com">LEAF</a>联合出品'))) : ?>
				<p><?php echo balanceTags(get_theme_mod('wi_footer_copyright',date('Y').' &copy; <a href="'.home_url().'">'.get_bloginfo( 'name' ).'</a> 保留所有权利 ')).'<br/> OWL中文版由<a rel="nofollow" target="_blank" href="http://themostspecialname.com">NAME</a> <a rel="nofollow" target="_blank" href="http://www.wordpressleaf.com">LEAF</a>联合出品';  ?></p>
			<?php endif; ?>
			
		</div>
		<?php if(balanceTags(get_theme_mod('wi_ontop_text', '回顶部 <i class="fa fa-angle-double-right"></i>'))) : ?>
			<a href="#" class="to-top"><?php echo balanceTags(get_theme_mod('wi_ontop_text', '回顶部 <i class="fa fa-angle-double-right"></i>')); ?></a>
		<?php endif; ?>
	</footer>

</div><!--/ #wrapper -->	
<?php wp_footer(); ?>
</body>

</html>