	<aside id="sidebar" <?php if(balanceTags(get_theme_mod('wi_sidebar_sticky', true))) { ?>class="sidebar-fixed"<?php } ?>>
		
		<div id="sidebar-fixed">
		
		<?php	/* Widgetised Area */	if ( is_active_sidebar( 'sidebar' ) ) { dynamic_sidebar('Sidebar'); } ?>
		
		</div>
	</aside>