<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	
	<nav id="navigation">
			
		<?php if(balanceTags(!get_theme_mod('wi_topbar_search_check'))) : ?>
			<div class="show-search-large">
				<div class="container">
					<?php get_search_form(); ?>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="container">
			
			
			<?php if(balanceTags(!get_theme_mod('wi_topbar_social_check'))) : ?>
			<div id="top-social">
				<?php echo winvader_social_icons(); ?>
			</div>
			<?php endif; ?>	
			
			<div id="navigation-wrapper">
			<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'menu' ) ); ?>
			</div>
							
			<?php if(balanceTags(!get_theme_mod('wi_topbar_search_check'))) : ?>
			<div id="top-search">
					<a href="#" class="sbutton"><i class="fa fa-search"></i></a>
					<div class="show-search"><?php get_search_form(); ?></div>
			</div>
			<?php endif; ?>
			
			
			
			<div class="menu-mobile"></div>
			
		</div>
		
	</nav>
	
	<header id="header">
		
	<div class="container">

			<div id="logo">
				
				<?php if(balanceTags(!get_theme_mod('wi_logo'))) : ?>
					
					<?php if(is_front_page()) : ?>
						<h1><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
					<?php else : ?>
						<h2><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h2>
					<?php endif; ?>
					
				<?php else : ?>
					
					<?php if(is_front_page()) : ?>
						<h1><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo balanceTags(get_theme_mod('wi_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
					<?php else : ?>
						<h2><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo balanceTags(get_theme_mod('wi_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h2>
					<?php endif; ?>
					
				<?php endif; ?>
				
			</div>
			
		</div>
	
	</header>