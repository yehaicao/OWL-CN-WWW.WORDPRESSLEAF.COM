<?php get_header(); ?>
	
	<?php 
	
	$home_layout = balanceTags(get_theme_mod( 'wi_home_layout', 'masonry' ));
	
	if(isset($_GET['home_layout'])) {
		$home_layout = $_GET['home_layout'];
	}
	
	$home_sidebar = balanceTags(get_theme_mod( 'wi_sidebar_home' ));
	if(isset($_GET['home_sidebar']) == 'true') {
		$home_sidebar = 1;
	}
	
	$featured_layout = balanceTags(get_theme_mod( 'wi_featured_layout', 1 ));
	if(isset($_GET['featured'])) {
		$featured_layout = $_GET['featured'];
	}
	
	if(balanceTags(get_theme_mod( 'wi_featured_slider' )) == false) :
		if( $featured_layout == 1) {
			get_template_part('inc/featured_area/alternative-slider');
		} elseif ( $featured_layout == 2) {
			get_template_part('inc/featured_area/featured-one-slide');
		} elseif ( $featured_layout == 3) {
			get_template_part('inc/featured_area/featured-three-slides');
		}	
	endif;
	?>
	<?php $author_area = balanceTags(get_theme_mod('wi_author_area')); if(isset($_GET['author_area'])) {$author_area = $_GET['author_area'];} if(!$author_area) : ?>
	<div class="about-author-area">
		<div class="container">
		<?php if(balanceTags(get_theme_mod('wi_author_area_avatar'))) { ?>
		<span class="avatar-img">
			<?php 
			$img_url = balanceTags(get_theme_mod('wi_author_area_avatar'));
			$image = vt_resize( '', $img_url, 400, 400, true );
			?>
			<img alt="" src="<?php echo esc_url($image["url"]); ?>" width="<?php echo balanceTags($image["width"]); ?>" height="<?php echo balanceTags($image["height"]); ?>">
		</span>
		<?php } ?>		
		<h4>
			<b><?php echo esc_html(get_theme_mod('wi_author_area_h', '作者的名字')); ?></b>
			<?php if(balanceTags(!get_theme_mod('wi_author_area_social'))) : ?><span class="about-author-social"><?php echo winvader_social_icons(); ?></span><?php endif; ?>
		</h4>
		<p><?php echo esc_html(get_theme_mod('wi_author_area_p', '你好，我是WordPressLeaf的叶子，我们致力于原创和汉化WordPress主题，你可以访问我们的网站来寻求帮助，我们的网址：www.wordpressleaf.com。')); ?></p>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="container <?php if($home_sidebar == 1 ) : ?>wi_sidebar<?php endif; ?>">
	
	<div id="main">
	
	<?php if($home_layout == 'full' ) : ?>
	<!-- full -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', $home_layout); ?>
		<?php endwhile; ?>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if($home_layout == 'grid' ) : ?>
	<!-- grid -->
	<?php if(balanceTags(get_theme_mod( 'wi_grid_title', 'Latest Posts' ))) : ?>
	<div class="wi-grid-title">
		<h3><?php echo esc_html(get_theme_mod( 'wi_grid_title', 'Latest Posts'  )); ?></h3>
		<span class="sub-title"><?php echo esc_html(get_theme_mod( 'wi_grid_sub', 'Mauris vitae erat consequat auctor eu in elit' )); ?></span>
	</div>
	<?php endif; ?>
	
	<ul class="wi-grid">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('content', $home_layout); ?>
	<?php endwhile; ?>
	<?php endif; ?>
	</ul>
	
	<?php endif; ?>

	<?php if($home_layout == 'masonry' ) : ?>
	<!-- masonry -->	
		<ul class="wi-masonry">
			
				<?php get_template_part('content', $home_layout); ?>

		</ul>
	<?php endif; ?>
	
	<?php winvader_site_pagination(); ?>
	</div>
	

	
<?php if( $home_sidebar == 1 ) : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>