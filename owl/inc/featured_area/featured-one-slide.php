<div class="container">
<div class="featured-area">
		
	<div id="owlslider-featured-one-slide" class="owl-carousel">
		
		<?php
		
			$featured_cat = balanceTags(get_theme_mod( 'wi_featured_cat' ));
			$number = balanceTags(get_theme_mod( 'wi_featured_slider_slides', 6 ));
	
			if(balanceTags(get_theme_mod( 'wi_slider_border' )) == true) {
				$slider_border = 'slider-border';
			} else {
				$slider_border = '';
			}
		?>
		
		<?php $feat_query = new WP_Query( array( 'cat' => $featured_cat, 'showposts' => $number ) ); ?>
		<?php if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); ?>
			<div class="item">
				<a href="<?php echo get_permalink() ?>" class="slider-image-effect <?php echo esc_attr($slider_border); ?>"><?php the_post_thumbnail('winvader-one-slide-thumb'); ?></a>
				
				<div class="feat-overlay">
					<div class="feat-text">
						<span class="feat-meta"><?php wi_category('  /  '); ?></span>
						<span class="feat-meta"><?php the_time( get_option('date_format') ); ?></span>
						<h3><a href="<?php echo get_permalink() ?>"><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></a></h3>
					</div>
				</div>

			</div>
		<?php endwhile; endif; ?>

	</div>
	
</div>
</div>