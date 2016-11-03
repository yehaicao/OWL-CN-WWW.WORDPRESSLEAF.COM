<div class="featured-area alternative-slider">
	<div class="container">
	
	<div class="alternative-slider-wrapper">
	<?php 
	if (balanceTags(get_theme_mod( 'wi_alt_slider_title', '特色文章' ))) { ?>
		<span class="alternative-slider-title"><?php echo esc_html(get_theme_mod( 'wi_alt_slider_title', '特色文章' )); ?></span>
	<?php } ?>
	
	
	<div id="owlslider-alternative-slider" class="owl-carousel">
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
				<div class="text-col">
					<div class="content-area">
						<h3><a href="<?php echo get_permalink() ?>"><?php echo winvader_replace_words(get_the_title(),  esc_html__( 'and, from', 'winvader' )); ?></a></h3>
						<p class="excerpt">
						<?php
						$alt_slider_exc = balanceTags(get_theme_mod( 'wi_alt_slider_excerpt' ));
						if ($alt_slider_exc == '') { $alt_slider_exc = '180';}
						$post_content = winvader_post_content('excerpt', $alt_slider_exc); 
						echo balanceTags($post_content);
						?>
						</p>
						<?php if (balanceTags(get_theme_mod( 'wi_alt_slider_readmore', 'Read More' ))) {?>
							<a href="<?php echo get_permalink() ?>" class="button"><?php echo balanceTags(get_theme_mod( 'wi_alt_slider_readmore', '阅读全文' ))?></a>
						<?php } ?>
						
					</div>
				</div>
				
				<div class="image-col">
					<a href="<?php echo get_permalink() ?>" class="slider-image-effect <?php echo esc_attr($slider_border); ?>"><?php the_post_thumbnail('winvader-alternative-slider-thumb'); ?></a>
				</div>
				
				

			</div>
		<?php endwhile; endif; ?>

	</div></div>
	
</div>
</div>