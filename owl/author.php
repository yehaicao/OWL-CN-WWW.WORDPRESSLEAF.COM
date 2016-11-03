<?php get_header(); ?>
	
	<div class="archive-box container">
					
		<span><?php _e( 'All Posts By', 'winvader' ); ?></span>
		<h1><?php the_post(); echo get_the_author(); ?></h1>
					
	</div>
	
	<?php
	$archive_sidebar = balanceTags(get_theme_mod( 'wi_sidebar_archive' ));
	if(isset($_GET['archive_sidebar']) == 'false') {
		$archive_sidebar = '';
	}
	
	$archive_layout = balanceTags(get_theme_mod( 'wi_archive_layout', 'masonry' ));
	if(isset($_GET['archive_layout'])) {
		$archive_layout = $_GET['archive_layout'];
	}
	?>
	
	<div class="container <?php if($archive_sidebar == 1 ) : ?>wi_sidebar<?php endif; ?>">
	
	<div id="main">
	
	<?php if($archive_layout == 'full' ) : ?>
	<!-- full -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', $archive_layout); ?>
		<?php endwhile; ?>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if($archive_layout == 'grid' ) : ?>
	<!-- grid -->	
	<ul class="wi-grid">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('content', $archive_layout); ?>
	<?php endwhile; ?>
	<?php endif; ?>
	</ul>
	
	<?php endif; ?>

	<?php if($archive_layout == 'masonry' ) : ?>
	<!-- masonry -->	
		<ul class="wi-masonry">
			
				<?php get_template_part('content', $archive_layout); ?>

		</ul>
	<?php endif; ?>
	
	<?php winvader_site_pagination(); ?>
	</div>
	
<?php if(balanceTags(get_theme_mod( 'wi_sidebar_archive' ))) : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>