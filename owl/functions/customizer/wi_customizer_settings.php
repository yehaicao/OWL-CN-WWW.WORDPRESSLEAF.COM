<?php
	
//////////////////////////////////////////////////////////////////
// Customizer - Add Custom Styling
//////////////////////////////////////////////////////////////////
function winvader_customizer_style()
{
	wp_enqueue_style('customizer-css', get_stylesheet_directory_uri() . '/functions/customizer/css/customizer.css');
}
add_action('customize_controls_print_styles', 'winvader_customizer_style');


//////////////////////////////////////////////////////////////////
// Customizer - Add Settings
//////////////////////////////////////////////////////////////////
function winvader_register_theme_customizer( $wp_customize ) {
 	
	// Add Sections

	$wp_customize->add_section( 'winvader_new_section_cn_author' , array(
   		'title'      => '汉化作者',
   		'description'=> 'OWL中文版由www.wordpressleaf.com汉化，访问主页支持作者。<br>
   		<a target="_blank" href="http://www.wordpressleaf.com" class="wordpressleaf-badge wp-badge">WordPress Leaf</a><br>
   		<h3 style="margin: 0 0 10px;">捐助我们</h3>
							如果您愿意捐助我们，请点击<a href="http://www.wordpressleaf.com/donate" target="_blank"><strong>这里</strong></a>或者使用微信扫描下面的二维码进行捐助。谢谢！<br>
							<img src="http://www.wordpressleaf.com/wp-content/themes/wordpressleaf/assets/images/weixin.png" width="140" height="140" alt="捐助我们"> ',
   		'priority'   => 103,
	) );

	$wp_customize->add_section( 'winvader_new_section_color_general' , array(
   		'title'      => '颜色: 通用设置',
   		'description'=> '',
   		'priority'   => 102,
	) );
	$wp_customize->add_section( 'winvader_new_section_color_posts' , array(
   		'title'      => '颜色: 文章设置',
   		'description'=> '',
   		'priority'   => 101,
	) );
	$wp_customize->add_section( 'winvader_new_section_color_sidebar' , array(
   		'title'      => '颜色: 侧边栏设置',
   		'description'=> '',
   		'priority'   => 100,
	) );
	$wp_customize->add_section( 'winvader_new_section_color_footer' , array(
   		'title'      => '颜色: 页脚设置',
   		'description'=> '',
   		'priority'   => 99,
	) );
	$wp_customize->add_section( 'winvader_new_section_color_topbar' , array(
   		'title'      => '颜色: 顶部设置',
   		'description'=> '',
   		'priority'   => 98,
	) );
	$wp_customize->add_section( 'winvader_new_section_footer' , array(
   		'title'      => '页脚设置',
   		'description'=> '',
   		'priority'   => 97,
	) );
	$wp_customize->add_section( 'winvader_new_section_social' , array(
   		'title'      => '社交媒体设置',
   		'description'=> 'Enter your social media links ( full url like: https://twitter.com/BBershadsky )',
   		'priority'   => 96,
	) );
	$wp_customize->add_section( 'winvader_new_section_page' , array(
   		'title'      => '页面设置',
   		'description'=> '',
   		'priority'   => 95,
	) );
	$wp_customize->add_section( 'winvader_new_section_post' , array(
   		'title'      => '文章设置',
   		'description'=> '',
   		'priority'   => 94,
	) );
	$wp_customize->add_section( 'winvader_new_section_featured' , array(
		'title'      => '特色区域设置',
		'description'=> '',
		'priority'   => 93,
	) );
	$wp_customize->add_section( 'winvader_new_section_about_author' , array(
		'title'      => '作者区域设置',
		'description'=> '',
		'priority'   => 93,
	) );
	$wp_customize->add_section( 'winvader_new_section_topbar' , array(
		'title'      => '顶部设置',
		'description'=> '',
		'priority'   => 92,
	) );
	$wp_customize->add_section( 'winvader_new_section_logo_header' , array(
   		'title'      => 'Logo和页眉设置',
   		'description'=> '',
   		'priority'   => 91,
	) );
	$wp_customize->add_section( 'winvader_new_section_general' , array(
   		'title'      => '通用设置',
   		'description'=> '',
   		'priority'   => 90,
	) );
	
	// Add Setting
		
		// General
		$wp_customize->add_setting(
	        'wi_home_layout',
	        array(
	            'default'     => 'masonry',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_grid_title',
	        array(
	            'default'     => 'Latest Posts',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_home_post_content_type',
	        array(
	            'default'     => 'full',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_home_post_title_type',
	        array(
	            'default'     => '1',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_home_excerpt_length',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_home_readmore_tag_text',
	        array(
	            'default'     => '...',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_ontop_text',
	        array(
	            'default'     => 'On Top <i class="fa fa-angle-double-right"></i>',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_grid_sub',
	        array(
	            'default'     => 'Mauris vitae erat consequat auctor eu in elit',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_archive_layout',
	        array(
	            'default'     => 'masonry',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_pagination_type',
	        array(
	            'default'     => '1',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_sidebar_sticky',
	        array(
	            'default'     => true,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_sidebar_home',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_sidebar_posts',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_sidebar_archive',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Header and logo
		$wp_customize->add_setting(
	        'wi_logo',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_logo_retina',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_header_padding_top',
	        array(
	            'default'     => '50',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_header_padding_bottom',
	        array(
	            'default'     => '50',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_header_img_height',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Top Bar
		$wp_customize->add_setting(
	        'wi_topbar_social_check',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_topbar_search_check',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Featured area
		$wp_customize->add_setting(
	        'wi_featured_slider',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_featured_layout',
	        array(
	            'default'     => '1',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_featured_layout_line',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_about_me_image',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
			'wi_alt_slider_title',
			array(
				'default'     => 'Featured Posts',
				'sanitize_callback' => 'sanitizecb',
			)
		); 
		$wp_customize->add_setting(
			'wi_alt_slider_readmore',
			array(
				'default'     => 'Read More',
				'sanitize_callback' => 'sanitizecb',
			)
		);	
		
		
		$wp_customize->add_setting(
	        'wi_alt_slider_excerpt',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_featured_cat',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_featured_cat_hide',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_featured_slider_slides',
	        array(
	            'default'     => '6',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_slider_border',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		
		$wp_customize->add_setting(
	        'wi_slider_zoom',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
				
		// Author area
		
		$wp_customize->add_setting(
	        'wi_author_area',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_author_area_social',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
			'wi_author_area_h',
			array(
				'default'     => "AUTHOR NAME",
				'sanitize_callback' => 'sanitizecb',
			)
		);	
		
		$wp_customize->add_setting(
			'wi_author_area_p',
			array(
				'default'     => "Quisque ut nisi. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Suspendisse non nisl sit amet velit hendrerit rutrum. Ut leo. Ut a nisl id ante tempus hendrerit. Proin pretium, leo ac pellentesque mollis.",
				'sanitize_callback' => 'sanitizecb',
			)
		);	
		
		$wp_customize->add_setting(
	        'wi_author_area_avatar',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_author_area_image',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Post Settings
		$wp_customize->add_setting(
	        'wi_post_tags',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_author',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_related',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_share',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_likes',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_comments',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_thumb',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_nav',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_date',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_zoom',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_border',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );		
		$wp_customize->add_setting(
	        'wi_post_popup',
	        array(
	            'default'     => true,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_single_post_popup',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_cat',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_title_lowercase',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_post_hover_symbol',
	        array(
	            'default'     => 'f141',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_tags_title',
	        array(
	            'default'     => 'Tags:',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_related_title',
	        array(
	            'default'     => 'Related Posts:',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Page Settings
		$wp_customize->add_setting(
	        'wi_page_zoom',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_page_border',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );		
		$wp_customize->add_setting(
	        'wi_page_popup',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
				
		$wp_customize->add_setting(
	        'wi_page_galley_popup',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_page_comments',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_page_share',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Social Media
		
		$wp_customize->add_setting(
	        'wi_facebook',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_twitter',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_instagram',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_pinterest',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_bloglovin',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_tumblr',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_google',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_youtube',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_flickr',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_dribbble',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_vkontakte',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_linkedin',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_digg',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_skype',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_vimeo',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_stumbleupon',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_yahoo',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_foursquare',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_rss',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Footer Options
		
		
		$wp_customize->add_setting(
	        'wi_mostdicussed_line',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );

		$wp_customize->add_setting(
	        'wi_mostdicussed_home',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_mostdicussed_other',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
	        'wi_mostdicussed_postcount',
	        array(
	            'default'     => '8',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		$wp_customize->add_setting(
			'wi_mostdicussed_title',
			array(
				'default'     => 'Most Discussed',
				'sanitize_callback' => 'sanitizecb',
			)
		);
		
		$wp_customize->add_setting(
			'wi_mostdicussed_readmore',
			array(
				'default'     => 'Read More',
				'sanitize_callback' => 'sanitizecb',
			)
		); 
		
		$wp_customize->add_setting(
	        'wi_footermain_line',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
	    $wp_customize->add_setting(
	        'wi_footer_social',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_footer_widget_area',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_footer_logo_area',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_footer_logo',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_footer_logo_retina',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );		
		$wp_customize->add_setting(
	        'wi_footer_background',
	        array(
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		$wp_customize->add_setting(
	        'wi_footer_copyright',
	        array(
	            'default'     => '2015 © All Rights reserved by <a href="http://themeforest.net/user/wwwebinvader">wwwebinvader</a>',
				'sanitize_callback' => 'sanitizecb',
	        )
	    );
		
		// Color Options
		
			// Top bar
			$wp_customize->add_setting(
				'wi_topbar_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_topbar_nav_color',
				array(
					'default'     => '#a3a3a3',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_topbar_nav_color_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
			$wp_customize->add_setting(
				'wi_drop_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_drop_text_color',
				array(
					'default'     => '#a3a3a3',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_drop_text_hover_color',
				array(
					'default'     => '#ffffff', 
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
			$wp_customize->add_setting(
				'wi_topbar_social_color',
				array(
					'default'     => '#a3a3a3',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_topbar_social_color_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
			$wp_customize->add_setting(
				'wi_topbar_search_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_topbar_search_icon',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_topbar_search_icon_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_topbar_search_inside_icon_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_topbar_search_text',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
			// Footer
			$wp_customize->add_setting(
				'wi_footer_widget_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_widget_color',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_large_widget_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_large_widget_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_social_bg',
				array(
					'default'     => '#fdfdfd',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_social_link',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_social_link_hover',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_logo_bg',
				array(
					'default'     => '#fdfdfd',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_copyright_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_copyright_color',
				array(
					'default'     => '#a3a3a3',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_footer_copyright_link',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);			
			$wp_customize->add_setting(
				'wi_footer_copyright_link_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
			// Sidebar color
			$wp_customize->add_setting(
				'wi_sidebar_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_sidebar_color',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
			// Posts color
			$wp_customize->add_setting(
				'wi_posts_title_color',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);			
			$wp_customize->add_setting(
				'wi_posts_title_color_hover',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_posts_dropcap_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_posts_dropcap_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
			
			// Color general
			$wp_customize->add_setting(
				'wi_color_accent',
				array(
					'default'     => '',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_color_dark_main',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			$wp_customize->add_setting(
				'wi_color_gray_main',
				array(
					'default'     => '#a3a3a3',
					'sanitize_callback' => 'sanitizecb',
				)
			);
			
//cn_author

			$wp_customize->add_setting(
				'wi_cn_author',
				array(
					'default'     => 'OWL中文版由www.wordpressleaf.com汉化',
					'sanitize_callback' => 'sanitizecb',
				)
			);


    // Add Control
    
 //cn_author   
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'cn_author',
				array(
					'label'       => '汉化作者',
					'section'     => 'winvader_new_section_cn_author',
					'settings'    => 'wi_cn_author',
					'priority'	  => 2
				)
			)
		);    
		
		// General
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_layout',
				array(
					'label'       => 'Homepage Layout',
					'section'     => 'winvader_new_section_general',
					'settings'    => 'wi_home_layout',
					'type'        => 'radio',
					'priority'	  => 2,
					'choices'     => array(
						'masonry' => 'Masonry Posts',
						'full'    => 'Full Posts',
						'grid'    => 'Grid Posts'
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_post_content_type',
				array(
					'label'          => 'Homepage Content Type',
					'section'        => 'winvader_new_section_general',
					'settings'       => 'wi_home_post_content_type',
					'type'           => 'radio',
					'priority'	 => 2,
					'choices'        => array(
						'excerpt'    => 'Excerpt',
						'full'       => 'Full Text',
						'none'       => 'Without Text'
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_post_title_type',
				array(
					'label'          => 'Posts/Page Title Type',
					'section'        => 'winvader_new_section_general',
					'settings'       => 'wi_home_post_title_type',
					'type'           => 'radio',
					'priority'	     => 2,
					'choices'        => array(
						  '1'        => 'Under Thumbnail',
						  '2'        => 'Over Thumbnail'
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_excerpt_length',
				array(
					'label'      => 'Homepage Excerpt Length',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_home_excerpt_length',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_readmore_tag_text',
				array(
					'label'      => 'Homepage Read More Tag Text',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_home_readmore_tag_text',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'grid_title',
				array(
					'label'      => 'Grid Layout: Heading',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_grid_title',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'grid_sub',
				array(
					'label'      => 'Grid Layout: Sub heading',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_grid_sub',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'archive_layout',
				array(
					'label'          => 'Archive Layout',
					'section'        => 'winvader_new_section_general',
					'settings'       => 'wi_archive_layout',
					'type'           => 'radio',
					'priority'	 => 5,
					'choices'     => array(
						'masonry' => 'Masonry Posts',
						'full'    => 'Full Posts',
						'grid'    => 'Grid Posts'
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pagination_type',
				array(
					'label'          => 'Pagination Type',
					'section'        => 'winvader_new_section_general',
					'settings'       => 'wi_pagination_type',
					'type'           => 'radio',
					'priority'	 => 6,
					'choices'        => array(
						'1'   => 'Numbered',
						'2'   => 'Simple'
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_sticky',
				array(
					'label'      => 'Enable Sticky Sidebar (Fixed)',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_sidebar_sticky',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_home',
				array(
					'label'      => 'Enable Sidebar on Homepage',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_sidebar_home',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_posts',
				array(
					'label'      => 'Enable Sidebar on Posts',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_sidebar_posts',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_archive',
				array(
					'label'      => 'Enable Sidebar on Archives',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_sidebar_archive',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ontop_text',
				array(
					'label'      => 'On Top Button Text',
					'section'    => 'winvader_new_section_general',
					'settings'   => 'wi_ontop_text',
					'type'		 => 'text',
					'priority'	 => 9
				)
			)
		);
		
		// Header and Logo
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo',
				array(
					'label'      => 'Upload Logo',
					'section'    => 'winvader_new_section_logo_header',
					'settings'   => 'wi_logo',
					'priority'	 => 20
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo_retina',
				array(
					'label'      => 'Upload Logo (Retina Version)',
					'section'    => 'winvader_new_section_logo_header',
					'settings'   => 'wi_logo_retina',
					'priority'	 => 21
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_top',
				array(
					'label'      => 'Top Header Padding (50)',
					'section'    => 'winvader_new_section_logo_header',
					'settings'   => 'wi_header_padding_top',
					'type'		 => 'number',
					'priority'	 => 22
				)
			)
		);
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_bottom',
				array(
					'label'      => 'Bottom Header Padding (50)',
					'section'    => 'winvader_new_section_logo_header',
					'settings'   => 'wi_header_padding_bottom',
					'type'		 => 'number',
					'priority'	 => 23
				)
			)
		);
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_img_height',
				array(
					'label'      => 'Header Logo Max Height (Auto)',
					'section'    => 'winvader_new_section_logo_header',
					'settings'   => 'wi_header_img_height',
					'type'		 => 'number',
					'priority'	 => 24
				)
			)
		);
		
		// Top Bar
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'topbar_social_check',
				array(
					'label'      => 'Disable Top Bar Social Icons',
					'section'    => 'winvader_new_section_topbar',
					'settings'   => 'wi_topbar_social_check',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'topbar_search_check',
				array(
					'label'      => 'Disable Top Bar Search',
					'section'    => 'winvader_new_section_topbar',
					'settings'   => 'wi_topbar_search_check',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
		// Featured area
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_slider',
				array(
					'label'      => 'Disable Featured Slider',
					'section'    => 'winvader_new_section_featured',
					'settings'   => 'wi_featured_slider',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);	
			
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_layout',
				array(
					'label'          => 'Featured Posts Layout',
					'section'        => 'winvader_new_section_featured',
					'settings'       => 'wi_featured_layout',
					'type'           => 'radio',
					'priority'	 => 2,
					'choices'        => array(
						'1'   => 'Alternative Slider',
						'2'   => 'One Slide',
						'3'   => 'Three Slides'
					)
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Category_Control(
				$wp_customize,
				'featured_cat',
				array(
					'label'    => 'Select Featured Category',
					'settings' => 'wi_featured_cat',
					'section'  => 'winvader_new_section_featured',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_cat_hide',
				array(
					'label'      => 'Hide Featured Category',
					'section'    => 'winvader_new_section_featured',
					'settings'   => 'wi_featured_cat_hide',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'featured_slider_slides',
				array(
					'label'      => 'Amount of Slides',
					'section'    => 'winvader_new_section_featured',
					'settings'   => 'wi_featured_slider_slides',
					'type'		 => 'number',
					'priority'	 => 5
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_border',
				array(
					'label'      => 'Show Border Effect on Hover',
					'section'    => 'winvader_new_section_featured',
					'settings'   => 'wi_slider_border',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_zoom',
				array(
					'label'      => 'Show Zoom effect on Slider',
					'section'    => 'winvader_new_section_featured',
					'settings'   => 'wi_slider_zoom',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Line_Control(
				$wp_customize,
				'featured_layout_line',
				array(
					'label'    => 'Alternative Slider Settings',
					'type'     => 'line',
					'section'  => 'winvader_new_section_featured',
					'settings' => 'wi_featured_layout_line',
					'priority' => 6
				)
			)
		);
		
		$wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'alt_slider_title',
                    array(
                        'label'      => 'Alternative Slider Title',
                        'section'    => 'winvader_new_section_featured',
                        'settings'   => 'wi_alt_slider_title',
                        'type'		 => 'text',
                        'priority'	 => 8
                    )
                )
            );
            
            $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'alt_slider_readmore',
                    array(
                        'label'      => 'Alternative Slider Read More text',
                        'section'    => 'winvader_new_section_featured',
                        'settings'   => 'wi_alt_slider_readmore',
                        'type'		 => 'text',
                        'priority'	 => 9
                    )
                )
            );
			
			$wp_customize->add_control(
				new Customize_Number_Control(
					$wp_customize,
					'alt_slider_excerpt',
					array(
						'label'      => 'Your own Excerpt Length',
						'section'    => 'winvader_new_section_featured',
						'settings'   => 'wi_alt_slider_excerpt',
						'type'		 => 'number',
						'priority'	 => 10
					)
				)
			);
		
		// Author area
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'author_area',
				array(
					'label'      => 'Disable Author Area',
					'section'    => 'winvader_new_section_about_author',
					'settings'   => 'wi_author_area',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);	
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'author_area_social',
				array(
					'label'      => 'Disable Author Area Social',
					'section'    => 'winvader_new_section_about_author',
					'settings'   => 'wi_author_area_social',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);	
		
		$wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'author_area_h',
                    array(
                        'label'      => 'Author Name',
                        'section'    => 'winvader_new_section_about_author',
                        'settings'   => 'wi_author_area_h',
                        'type'		 => 'text',
                        'priority'	 => 4
                    )
                )
        );
		
		$wp_customize->add_control(
                new Customize_Textarea_Control(
                    $wp_customize,
                    'author_area_p',
                    array(
                        'label'      => 'Text About Author',
                        'section'    => 'winvader_new_section_about_author',
                        'settings'   => 'wi_author_area_p',
                        'type'		 => 'textarea',
                        'priority'	 => 4
                    )
                )
            );
				
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'author_area_avatar',
				array(
					'label'      => 'Upload Author Section Avatar',
					'section'    => 'winvader_new_section_about_author',
					'settings'   => 'wi_author_area_avatar',
					'priority'	 => 5
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'author_area_image',
				array(
					'label'      => 'Upload Author Section Background',
					'section'    => 'winvader_new_section_about_author',
					'settings'   => 'wi_author_area_image',
					'priority'	 => 6
				)
			)
		);
		
			
		// Post Settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_border',
				array(
					'label'      => 'Hide Border effect',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_border',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_popup',
				array(
					'label'      => 'Hide Popup Window',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_popup',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_single_popup',
				array(
					'label'      => 'Hide Popup on Post Page',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_single_post_popup',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_zoom',
				array(
					'label'      => 'Hide Zoom effect',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_zoom',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_cat',
				array(
					'label'      => 'Hide Category',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_date',
				array(
					'label'      => 'Hide Date',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_date',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_tags',
				array(
					'label'      => 'Hide Tags',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_tags',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share',
				array(
					'label'      => 'Hide Share Buttons',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_share',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_likes',
				array(
					'label'      => 'Hide Likes',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_likes',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_comments',
				array(
					'label'      => 'Hide Comments',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_comments',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author',
				array(
					'label'      => 'Hide Author Box',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_author',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related',
				array(
					'label'      => 'Hide Related Posts Box',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_related',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb',
				array(
					'label'      => 'Hide Featured Image from top of Post',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_thumb',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_nav',
				array(
					'label'      => 'Hide Next/Prev Post Navigation',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_nav',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_title_lowercase',
				array(
					'label'      => 'Disable uppercase in post title',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_title_lowercase',
					'type'		 => 'checkbox',
					'priority'	 => 9
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_hover_symbol',
				array(
					'label'      => 'Post Hover Symbol (Unicode)',
					'description'=> 'http://fortawesome.github.io/Font-Awesome/icons/',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_post_hover_symbol',
					'type'		 => 'text',
					'priority'	 => 9
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tags_title',
				array(
					'label'      => 'Tags Area Title',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_tags_title',
					'type'		 => 'text',
					'priority'	 => 10
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'related_title',
				array(
					'label'      => 'Related Area Title',
					'section'    => 'winvader_new_section_post',
					'settings'   => 'wi_related_title',
					'type'		 => 'text',
					'priority'	 => 11
				)
			)
		);
		
		// Page settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_border',
				array(
					'label'      => 'Hide Border effect',
					'section'    => 'winvader_new_section_page',
					'settings'   => 'wi_page_border',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_zoom',
				array(
					'label'      => 'Hide Zoom effect',
					'section'    => 'winvader_new_section_page',
					'settings'   => 'wi_page_zoom',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_popup',
				array(
					'label'      => 'Hide Popup',
					'section'    => 'winvader_new_section_page',
					'settings'   => 'wi_page_popup',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_galley_popup',
				array(
					'label'      => 'Hide Popup on Tiled Galley Page',
					'section'    => 'winvader_new_section_page',
					'settings'   => 'wi_page_galley_popup',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_comments',
				array(
					'label'      => 'Hide Comments',
					'section'    => 'winvader_new_section_page',
					'settings'   => 'wi_page_comments',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_share',
				array(
					'label'      => 'Hide Share Buttons',
					'section'    => 'winvader_new_section_page',
					'settings'   => 'wi_page_share',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
		// Social Media
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'facebook',
				array(
					'label'      => 'Facebook',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_facebook',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'twitter',
				array(
					'label'      => 'Twitter',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_twitter',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'instagram',
				array(
					'label'      => 'Instagram',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_instagram',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pinterest',
				array(
					'label'      => 'Pinterest',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_pinterest',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bloglovin',
				array(
					'label'      => 'Bloglovin',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_bloglovin',
					'type'		 => 'text',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'google',
				array(
					'label'      => 'Google Plus',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_google',
					'type'		 => 'text',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tumblr',
				array(
					'label'      => 'Tumblr',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_tumblr',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'youtube',
				array(
					'label'      => 'Youtube',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_youtube',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'flickr',
				array(
					'label'      => 'Flickr',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_flickr',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'dribbble',
				array(
					'label'      => 'Dribbble',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_dribbble',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'vkontakte',
				array(
					'label'      => 'Vkontakte',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_vkontakte',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'linkedin',
				array(
					'label'      => 'Linkedin',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_linkedin',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'digg',
				array(
					'label'      => 'Digg',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_digg',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'skype',
				array(
					'label'      => 'Skype',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_skype',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'vimeo',
				array(
					'label'      => 'Vimeo',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_vimeo',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'stumbleupon',
				array(
					'label'      => 'Stumbleupon',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_stumbleupon',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'yahoo',
				array(
					'label'      => 'Yahoo',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_yahoo',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'foursquare',
				array(
					'label'      => 'Foursquare',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_foursquare',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rss',
				array(
					'label'      => 'RSS Link',
					'section'    => 'winvader_new_section_social',
					'settings'   => 'wi_rss',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		
		// Footer Settings
	
		$wp_customize->add_control(
			new Customize_Line_Control(
				$wp_customize,
				'mostdicussed_line',
				array(
					'label'    => 'Most Discussed Area Settings',
					'type'     => 'line',
					'section'  => 'winvader_new_section_footer',
					'settings' => 'wi_mostdicussed_line',
					'priority' => 1
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'mostdicussed_home',
				array(
					'label'      => 'Disable Most Discussed Area on Homepage',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_mostdicussed_home',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'mostdicussed_other',
				array(
					'label'      => 'Disable Most Discussed Area on Other Pages',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_mostdicussed_other',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'mostdicussed_postcount',
				array(
					'label'      => 'Most Discussed Posts Amount',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_mostdicussed_postcount',
					'type'		 => 'number',
					'priority'	 => 1
				)
			)
		);
		
		$wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'mostdicussed_title',
                    array(
                        'label'      => 'Most Discussed Area Title',
                        'section'    => 'winvader_new_section_footer',
                        'settings'   => 'wi_mostdicussed_title',
                        'type'		 => 'text',
                        'priority'	 => 1
                    )
                )
            );
            
            $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'mostdicussed_readmore',
                    array(
                        'label'      => 'Most Discussed Post Read More text',
                        'section'    => 'winvader_new_section_footer',
                        'settings'   => 'wi_mostdicussed_readmore',
                        'type'		 => 'text',
                        'priority'	 => 1
                    )
                )
            );
		
		$wp_customize->add_control(
			new Customize_Line_Control(
				$wp_customize,
				'footermain_line',
				array(
					'label'    => 'Footer Main Settings',
					'type'     => 'line',
					'section'  => 'winvader_new_section_footer',
					'settings' => 'wi_footermain_line',
					'priority' => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_widget_area',
				array(
					'label'      => 'Disable Footer Widget Area',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_footer_widget_area',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_social',
				array(
					'label'      => 'Disable Footer Social',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_footer_social',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_logo_area',
				array(
					'label'      => 'Enable Footer Logo Area',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_footer_logo_area',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo',
				array(
					'label'      => 'Upload Footer Logo',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_footer_logo',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo_retina',
				array(
					'label'      => 'Upload Footer Logo (Retina)',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_footer_logo_retina',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_background',
				array(
					'label'      => 'Upload Footer Background Image',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_footer_background',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright',
				array(
					'label'      => 'Footer Copyright Text',
					'section'    => 'winvader_new_section_footer',
					'settings'   => 'wi_footer_copyright',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		
		// Color Settings
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_bg',
					array(
						'label'      => 'Top Bar BG',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color',
					array(
						'label'      => 'Top Bar Menu Text Color',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_nav_color',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color_active',
					array(
						'label'      => 'Top Bar Menu Text Hover Color',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_nav_color_hover',
						'priority'	 => 3
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_bg',
					array(
						'label'      => 'Dropdown BG',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_drop_bg',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_color',
					array(
						'label'      => 'Dropdown Text Color',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_drop_text_color',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_color',
					array(
						'label'      => 'Dropdown Text Hover Color',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_drop_text_hover_color',
						'priority'	 => 8
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color',
					array(
						'label'      => 'Top Bar Social Icons',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_social_color',
						'priority'	 => 9
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color_hover',
					array(
						'label'      => 'Top Bar Social Icons Hover',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_social_color_hover',
						'priority'	 => 11
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_bg',
					array(
						'label'      => 'Top Bar Search BG',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_search_bg',
						'priority'	 => 12
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_icon',
					array(
						'label'      => 'Top Bar Search Icon',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_search_icon',
						'priority'	 => 13
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_icon_hover',
					array(
						'label'      => 'Top Bar Search Icon Hover',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_search_icon_hover',
						'priority'	 => 13
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_inside_icon_hover',
					array(
						'label'      => 'Top Bar Search Inside Icon Hover',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_search_inside_icon_hover',
						'priority'	 => 14
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_text',
					array(
						'label'      => 'Top Bar Search Inside Text',
						'section'    => 'winvader_new_section_color_topbar',
						'settings'   => 'wi_topbar_search_text',
						'priority'	 => 15
					)
				)
			);
			
			// Footer colors
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_widget_bg',
					array(
						'label'      => 'Footer Widget Title BG',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_widget_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_widget_color',
					array(
						'label'      => 'Footer Widget Title Text Color',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_widget_color',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_large_widget_bg',
					array(
						'label'      => 'Footer Large Widget Title BG',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_large_widget_bg',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_large_widget_color',
					array(
						'label'      => 'Footer Large Widget Title Text Color',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_large_widget_color',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_bg',
					array(
						'label'      => 'Footer Social Section BG',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_social_bg',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_link',
					array(
						'label'      => 'Footer Social Link',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_social_link',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_link_hover',
					array(
						'label'      => 'Footer Social Link Hover',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_social_link_hover',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_logo_bg',
					array(
						'label'      => 'Footer Logo Section BG',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_logo_bg',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_bg',
					array(
						'label'      => 'Footer Copyright Section BG',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_copyright_bg',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_color',
					array(
						'label'      => 'Footer Copyright Section Text',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_copyright_color',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_link',
					array(
						'label'      => 'Footer Copyright Section Link',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_copyright_link',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_link_hover',
					array(
						'label'      => 'Footer Copyright Section Link Hover',
						'section'    => 'winvader_new_section_color_footer',
						'settings'   => 'wi_footer_copyright_link_hover',
						'priority'	 => 7
					)
				)
			);
			
			// Sidebar Color
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_bg',
					array(
						'label'      => 'Sidebar Widget Heading BG',
						'section'    => 'winvader_new_section_color_sidebar',
						'settings'   => 'wi_sidebar_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_color',
					array(
						'label'      => 'Sidebar Widget Heading Text Color',
						'section'    => 'winvader_new_section_color_sidebar',
						'settings'   => 'wi_sidebar_color',
						'priority'	 => 2
					)
				)
			);
			
			// Posts Color
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'posts_title_color',
					array(
						'label'      => 'Posts Title Color',
						'section'    => 'winvader_new_section_color_posts',
						'settings'   => 'wi_posts_title_color',
						'priority'	 => 1
					)
				)
			);					
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'posts_title_color_hover',
					array(
						'label'      => 'Posts Title Hover',
						'section'    => 'winvader_new_section_color_posts',
						'settings'   => 'wi_posts_title_color_hover',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'posts_dropcap_color',
					array(
						'label'      => 'Posts Drop Cap Color',
						'section'    => 'winvader_new_section_color_posts',
						'settings'   => 'wi_posts_dropcap_color',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'posts_dropcap_bg',
					array(
						'label'      => 'Posts Drop Cap BG',
						'section'    => 'winvader_new_section_color_posts',
						'settings'   => 'wi_posts_dropcap_bg',
						'priority'	 => 3
					)
				)
			);
			
			// Colors general
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'color_accent',
					array(
						'label'      => 'Accent Color',
						'section'    => 'winvader_new_section_color_general',
						'settings'   => 'wi_color_accent',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'color_dark_main',
					array(
						'label'      => 'Main Dark Color',
						'section'    => 'winvader_new_section_color_general',
						'settings'   => 'wi_color_dark_main',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'color_gray_main',
					array(
						'label'      => 'Main Gray Color',
						'section'    => 'winvader_new_section_color_general',
						'settings'   => 'wi_color_gray_main',
						'priority'	 => 2
					)
				)
			);
					
 
}

function sanitizecb( $input ) {
    return $input;
}

add_action( 'customize_register', 'winvader_register_theme_customizer' );
?>