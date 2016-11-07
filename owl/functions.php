<?php

/* Set Content Width
------------------------------------------*/
if ( ! isset( $content_width ) )
	$content_width = 1040;


/* Theme set up
------------------------------------------*/
add_action( 'after_setup_theme', 'winvader_theme_setup' );

if ( !function_exists('winvader_theme_setup') ) {
	function winvader_theme_setup() {
		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => 'Primary Menu',
			)
		);
		// Localization support
		load_theme_textdomain('winvader', get_template_directory() . '/languages');
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		// Title Tag
		add_theme_support( 'title-tag' );
		// Post formats
		add_theme_support( 'post-formats', 
			array( 
				'gallery', 
				'video',
				'quote',				
				'audio'
			) );
		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'winvader-full-thumb', 1040, 0, true );
		add_image_size( 'winvader-masonry-thumb', 600, 0, true );
		add_image_size( 'winvader-small-height-thumb', 1040, 580, true );
		add_image_size( 'winvader-full-thumb-fixed', 1040, 620, true );		
		add_image_size( 'winvader-square-thumb-small', 440, 440, true );
		add_image_size( 'winvader-three-slides-thumb', 650, 460, true );
		add_image_size( 'winvader-one-slide-thumb', 1040, 538, true );
		add_image_size( 'winvader-alternative-slider-thumb', 680, 460, true );			
		add_image_size( 'winvader-thumb', 360, 360, true );
	}
}

/* Register & enqueue styles/scripts
------------------------------------------*/

add_action( 'wp_enqueue_scripts','winvader_load_scripts' );

function winvader_load_scripts() {

	// Register scripts and styles
	wp_register_style('wi_style', get_stylesheet_directory_uri() . '/style.css');
	wp_register_style('wi_responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_register_style('slicknav-css', get_template_directory_uri() . '/css/slicknav.css');
	wp_register_style('owl-css', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_register_style('owl-theme-css', get_template_directory_uri() . '/css/owl.theme.css');
	wp_register_style('magnific-popup-css', get_template_directory_uri() . '/css/magnific-popup.css');
	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	
	wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', array('jquery'), false, true);
	wp_enqueue_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), false, true);
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), false, true);
	wp_enqueue_script('mutate-events', get_template_directory_uri() . '/js/mutate.events.js', array('jquery'), false, true);
	wp_enqueue_script('mutate', get_template_directory_uri() . '/js/mutate.min.js', array('jquery'), false, true);
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), false, true);	
	wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), false, true);	
	wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), false, true);
	wp_enqueue_script('jfollowsidebar', get_template_directory_uri() . '/js/jquery.jfollowsidebar.js', array('jquery'), false, true);
	wp_enqueue_script('wi_scripts', get_template_directory_uri() . '/js/winvader.js', array('jquery'), false, true);
	
	// Enqueue scripts and styles

	wp_enqueue_style('wi_style');
	wp_enqueue_style('wi_responsive');
	wp_enqueue_style('slicknav-css');
	wp_enqueue_style('owl-css');
	wp_enqueue_style('owl-theme-css');
	wp_enqueue_style('magnific-popup-css');
	wp_enqueue_style('font-awesome');
	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
}

/* Register Fonts
------------------------------------------*/

function winvader_fonts_url() {
    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */  
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'studio' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Playfair Display:400,700,400italic,700italic&subset=latin,cyrillic,latin-ext|Roboto:400,300,300italic,400italic,700,700italic&subset=latin,cyrillic' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function winvader_scripts() {
    wp_enqueue_style( 'studio-fonts', winvader_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'winvader_scripts' );


/* Include files
------------------------------------------*/

// Theme Options
include(get_template_directory().'/functions/customizer/wi_custom_controller.php');
include(get_template_directory().'/functions/customizer/wi_customizer_settings.php');
include(get_template_directory().'/functions/customizer/wi_customizer_style.php');

// Widgets
include(get_template_directory().'/inc/widgets/about_widget.php');
include(get_template_directory().'/inc/widgets/video_widget.php');
include(get_template_directory().'/inc/widgets/facebook_widget.php');
include(get_template_directory().'/inc/widgets/flickr_widget.php');
include(get_template_directory().'/inc/widgets/popular_tags_widget.php');
include(get_template_directory().'/inc/widgets/post_widget.php');
include(get_template_directory().'/inc/widgets/social_widget.php');

// Additions
include("inc/additions/post-like.php");

/* Register footer widgets
------------------------------------------*/
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		'id' => 'sidebar',
	));
	register_sidebar(array(
		'name' => 'Footer 1',
		'before_widget' => '<div id="%1$s" class="widget first %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		'id' => 'footer-1',
	));
	register_sidebar(array(
		'name' => 'Footer 2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		'id' => 'footer-2',
	));
	
	register_sidebar(array(
		'name' => 'Footer 3',
		'before_widget' => '<div id="%1$s" class="widget last %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		'id' => 'footer-3',
	));
	
	register_sidebar(array(
		'name' => 'Footer Instagram',
		'before_widget' => '<div id="%1$s" class="widget last %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		'id' => 'footer-instagram',
	));
}

/* Pagination
------------------------------------------*/


function winvader_pagination() { ?>
	<div class="pagination">
		<div class="older"><?php next_posts_link(__( 'Older Posts <i class="fa fa-long-arrow-right"></i>', 'winvader')); ?></div>
		<div class="newer"><?php previous_posts_link(__( '<i class="fa fa-long-arrow-left"></i> Newer Posts', 'winvader')); ?></div>
	</div>
	<?php	
}

/* Numbered Pagination
------------------------------------------*/

function winvader_num_pagination() {  
    global $wp_query;
	$big = 999999999; // need an unlikely integer
	echo '<div class="num-pagination">';
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big, false ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type'         => 'list',
		'add_args' => false,
		'prev_text'          => __('<i class="fa fa-long-arrow-left"></i>', 'winvader'),
		'next_text'          => __('<i class="fa fa-long-arrow-right"></i>', 'winvader') 
	) );
	echo '</div>';	
}

/* Choose Pagination */


function winvader_site_pagination() { 
	$type = balanceTags(get_theme_mod('wi_pagination_type', 1)); 
	if ($type == 1) {
		return winvader_num_pagination(); 
	} else {
		return winvader_pagination(); 
	}
}

/* Comments Layout
------------------------------------------*/

	function winvader_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="thecomment">
						
				<div class="author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'winvader'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(esc_html__('Edit', 'winvader')); ?>
					</span>
					<span class="author"><?php echo get_comment_author_link(); ?></span>
					<span class="date"><?php printf(esc_html__('%1$s at %2$s', 'winvader'), get_comment_date(),  get_comment_time()) ?></span>
					<?php if ($comment->comment_approved == '0') : ?>
						<em><i class="icon-info-sign"></i> <?php _e('Comment awaiting approval', 'winvader'); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
						
			</div>
			
			
		</li>

		<?php 
	}

/* Author Social Links
------------------------------------------*/
function winvader_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   = 'Twitter Username';
	$contactmethods['facebook']  = 'Facebook Username';
	$contactmethods['google']    = 'Google Plus Username';
	$contactmethods['tumblr']    = 'Tumblr Username';
	$contactmethods['instagram'] = 'Instagram Username';
	$contactmethods['pinterest'] = 'Pinterest Username';

	return $contactmethods;
}
add_filter('user_contactmethods','winvader_contactmethods',10,1);

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.2
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Vafpress Post Formats UI', // The plugin name
			'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Owl Instagram Slider Widget', // The plugin name
			'slug'     				=> 'winvader-instagram-slider-widget', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/winvader-instagram-slider-widget.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'WDS Recent Tweets Widget', // The plugin name
			'slug'     				=> 'wds-recent-tweets-widget', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/wds-recent-tweets-widget.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '0.1.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'Tiled Galleries',
			'slug'               => 'tiled-gallery',
			'source'             => get_stylesheet_directory() . '/plugins/tiled-gallery.1.0.zip',
			'required'           => true,
			'version'            => '1.0',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),		
		array(
			'name'               => 'Simple Custom Post Order',
			'slug'               => 'simple-custom-post-order',
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),	
		array(
			'name'               => 'Better Font-Awesome',
			'slug'               => 'better-font-awesome',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),			
		array(
			'name'               => 'Drop Cap Shortcode',
			'slug'               => 'drop-cap-shortcode',
			'source'             => get_stylesheet_directory() . '/plugins/drop-cap-shortcode.zip',
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),
		array(
			'name'               => 'Column Shortcodes',
			'slug'               => 'column-shortcodes',
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),
		array(
			'name'               => 'Google Maps Builder',
			'slug'               => 'google-maps-builder',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
		$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

/* Exclude Featured Category
------------------------------------------*/

function wi_category($separator) {
	
	if(balanceTags(get_theme_mod( 'wi_featured_cat_hide' )) == true) {
		
		$excluded_cat = balanceTags(get_theme_mod('wi_featured_cat'));
		
		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($category->cat_ID != $excluded_cat) {
				if ($first_time == 1) {
					echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "winvader" ), $category->name ) . '" ' . '><span>'  . $category->name.'</span></a>';
					$first_time = 0;
				} else {
					echo balanceTags($separator) . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "winvader" ), $category->name ) . '" ' . '><span>' . $category->name.'</span></a>';
				}
			}
		}
	
	} else {
		
		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($first_time == 1) {
				echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "winvader" ), $category->name ) . '" ' . '><span>'  . $category->name.'</span></a>';
				$first_time = 0;
			} else {
				echo balanceTags($separator) . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "winvader" ), $category->name ) . '" ' . '><span>' . $category->name.'</span></a>';
			}
		}
	
	}
}

/* The Excerpt
------------------------------------------*/
function custom_excerpt_length( $length ) {
	return 19;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ''; //&hellip;
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/* Gallery Post Options
------------------------------------------*/

// add new field under gallery post format forms ui
add_action( 'vp_pfui_after_gallery_meta', 'mytheme_add_gallery_type_field' );
 
// handle the saving of our new field
add_action( 'admin_init'                , 'mytheme_admin_init' );
 
function mytheme_admin_init() {
	$post_formats = get_theme_support('post-formats');
	if (!empty($post_formats[0]) && is_array($post_formats[0])) {
		if (in_array('gallery', $post_formats[0])) {
			add_action('save_post', 'mytheme_format_gallery_save_post');
		}
	}
}
 
function mytheme_add_gallery_type_field() {
	global $post;
	$type = get_post_meta($post->ID, '_format_gallery_type', true);
	?>
	<div class="vp-pfui-elm-block">
		<label for="vp-pfui-format-gallery-type"><?php _e('Gallery Type', 'winvader'); ?></label><br>
 
		<!-- Radio Button Sample -->
		<input type="radio" name="_format_gallery_type" value="option0" id="option0" <?php checked( $type, "option0" ); ?>><label style="display: inline-block;" for="option1">Slider Fixed Height</label>
		<input type="radio" name="_format_gallery_type" value="option1" id="option1" <?php checked( $type, "option1" ); ?>><label style="display: inline-block;" for="option1">Slider Auto Height</label>
		<input type="radio" name="_format_gallery_type" value="option2" id="option2" <?php checked( $type, "option2" ); ?>><label style="display: inline-block;" for="option2">Grid 3 columns</label>
		<input type="radio" name="_format_gallery_type" value="option3" id="option3" <?php checked( $type, "option3" ); ?>><label style="display: inline-block;" for="option3">Grid 4 columns</label>
		<input type="radio" name="_format_gallery_type" value="option4" id="option4" <?php checked( $type, "option4" ); ?>><label style="display: inline-block;" for="option3">Large + Grid 3 columns</label>
		<input type="radio" name="_format_gallery_type" value="option5" id="option5" <?php checked( $type, "option5" ); ?>><label style="display: inline-block;" for="option3">Large + Grid 4 columns</label>
 
	</div>
	<?php
}
 
function mytheme_format_gallery_save_post($post_id) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!defined('XMLRPC_REQUEST') && isset($_POST['_format_gallery_type'])) {
		update_post_meta($post_id, '_format_gallery_type', $_POST['_format_gallery_type']);
	}
}

/* Content Type
------------------------------------------*/

if (!function_exists('winvader_post_content')) {
	function winvader_post_content($type, $excerpt_length) {
		switch ($type) {
			case 'excerpt':
				$length = (int)$excerpt_length;
				$length = $length == 0 ? 280 : $length;
				$string = get_the_excerpt(''); if(strlen($string) > 8) $string = mb_substr($string, 0, $length/2);
				$post_content = $string.'...';
				break;
			case 'full':
				$post_content = the_content();
				break;
			case 'none':
				$post_content = '';
				break;
		}
		return $post_content;
	}
}

add_filter( 'the_content_more_link', 'modify_read_more_link' );
	function modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">'.balanceTags(get_theme_mod('wi_home_readmore_tag_text', '...')).'</a>';
}

/* Set post thumbnails in admin
------------------------------------------*/

add_filter('manage_posts_columns', 'post_col', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
 
function post_col($post_col_static) {
    $post_col_static['post_thumb_prev'] = 'Thumbnail';
    return $post_col_static;
}
 
function posts_custom_columns($post_col_name, $id) {
    if ($post_col_name === 'post_thumb_prev') :
        print the_post_thumbnail('thumbnail');
    endif;
}

/* Get comments meta
------------------------------------------*/
if (!function_exists('winvader_comments_meta')) {
	function winvader_comments_meta() {
		return sprintf(
			'<span class="entry-comments">
				<a href="%s">
					<i class="fa fa-comment"></i>
					%s
				</a>
			</span>',
			get_permalink(),
			get_comments_number()
		);
	}
}

/* Get likes meta
------------------------------------------*/
if (!function_exists('winvader_likes_meta')) {
	function winvader_likes_meta() {
		return sprintf(
			'<span class="entry-like">
					%s
			</span>',
			getPostLikeLink( get_the_ID() )
		);
	}
}

/* Get post image
------------------------------------------*/
if (!function_exists('winvader_post_effect')) {
	function winvader_post_effect($img_url) {
	$post_image_effect_start = '';
	$post_image_effect_end = '';
	if(!is_single()) {
		if(balanceTags(!get_theme_mod('wi_post_popup', true))) {
			$post_image_effect_start = $post_image_effect_start.'<a href="'. $img_url .'" class="popup">';
			$post_image_effect_end = $post_image_effect_end.'</a>';
		} else {
			$post_image_effect_start = $post_image_effect_start.'<a href="'. get_permalink() .'" class="overlink">';
			$post_image_effect_end = $post_image_effect_end.'</a>';
		}
	}
	
	if(is_single() && balanceTags(!get_theme_mod('wi_single_post_popup'))){
			$post_image_effect_start = $post_image_effect_start.'<a href="'. $img_url .'" class="popup">';
			$post_image_effect_end = $post_image_effect_end.'</a>';
	}
	
	if(balanceTags(!get_theme_mod('wi_post_border'))) {
		$post_image_effect_start = $post_image_effect_start.'<span class="post-image-effect">';
		$post_image_effect_end = '</span>'.$post_image_effect_end;
	}	
		
	return $post_image_effect_start.$post_image_effect_end;
	}
}

/* Get page image
------------------------------------------*/
if (!function_exists('winvader_page_effect')) {
	function winvader_page_effect($img_url) {
	global $page_image_effect_start, $page_image_effect_end;
	
	if(!is_single()) {
		if(balanceTags(!get_theme_mod('wi_page_popup'))) {
			$page_image_effect_start = $page_image_effect_start.'<a href="'. $img_url .'" class="popup">';
			$page_image_effect_end = $page_image_effect_end.'</a>';
		} else {
			$page_image_effect_start = $page_image_effect_start.'';
			$page_image_effect_end = $page_image_effect_end.'';
		}
	}
		
	if(balanceTags(!get_theme_mod('wi_page_border'))) {
		$page_image_effect_start = $page_image_effect_start.'<span class="page-image-effect">';
		$page_image_effect_end = $page_image_effect_end.'</span>';
	}	
		
	return $page_image_effect_start.$page_image_effect_end;
	}
}

/* Replace words function
------------------------------------------*/

if (!function_exists('winvader_replace_words')) {
	function winvader_replace_words($str, $search) {
	$str = html_entity_decode($str, ENT_QUOTES, "utf-8");
	$str = ' '.$str;
	$explode = explode(", ", $search);

	foreach($explode as $word){
	  $str = preg_replace("/ $word \b/i", '<i>$0</i>', $str);
	  $str = preg_replace("/#038;/i", '', $str); 
	}

	return $str;	
	}
}

/* First Title Letter function
------------------------------------------*/

if (!function_exists('winvader_title_first_letter')) {
	function winvader_title_first_letter($str) {
	$str = mb_substr($str, 0, 1);
	return $str;	
	}
}

/* Social icons
------------------------------------------*/

if (!function_exists('winvader_social_icons')) {
function winvader_social_icons() {?>
	<?php if(balanceTags(get_theme_mod('wi_facebook'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i> <span>Facebook</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_twitter'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i> <span>Twitter</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_instagram'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i> <span>Instagram</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_pinterest'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i> <span>Pinterest</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_bloglovin'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i> <span>Bloglovin</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_google'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_google')); ?>" target="_blank"><i class="fa fa-google-plus"></i> <span>Google Plus</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_tumblr'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_tumblr')); ?>" target="_blank"><i class="fa fa-tumblr"></i> <span>Tumblr</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_youtube'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i> <span>Youtube</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_flickr'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_flickr')); ?>" target="_blank"><i class="fa fa-flickr"></i> <span>Flickr</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_dribbble'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_dribbble')); ?>" target="_blank"><i class="fa fa-dribbble"></i> <span>Dribbble</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_vkontakte'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_vkontakte')); ?>" target="_blank"><i class="fa fa-vk"></i> <span>Vkontakte</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_linkedin'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i> <span>Linkedin</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_digg'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_digg')); ?>" target="_blank"><i class="fa fa-digg"></i> <span>Digg</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_skype'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_skype')); ?>" target="_blank"><i class="fa fa-skype"></i> <span>Skype</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_vimeo'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_vimeo')); ?>" target="_blank"><i class="fa fa-vimeo-square"></i> <span>Vimeo</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_stumbleupon'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_stumbleupon')); ?>" target="_blank"><i class="fa fa-stumbleupon"></i> <span>Stumbleupon</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_yahoo'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_yahoo')); ?>" target="_blank"><i class="fa fa-yahoo"></i> <span>Yahoo</span></a><?php endif; ?>
	<?php if(balanceTags(get_theme_mod('wi_foursquare'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_foursquare')); ?>" target="_blank"><i class="fa fa-foursquare"></i> <span>Foursquare</span></a><?php endif; ?>		
	<?php if(balanceTags(get_theme_mod('wi_rss'))) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_rss')); ?>" target="_blank"><i class="fa fa-rss"></i> <span>RSS</span></a><?php endif; ?>
	<?php
}
}

/* Sticky Posts
------------------------------------------*/

function winvader_cpt_sticky_at_top( $posts ) {
 
    // apply it on the archives only
    if ( is_main_query() && is_post_type_archive() ) {
        global $wp_query;
 
        $sticky_posts = get_option( 'sticky_posts' );
        $num_posts = count( $posts );
        $sticky_offset = 0;
 
        // Find the sticky posts
        for ($i = 0; $i < $num_posts; $i++) {
 
            // Put sticky posts at the top of the posts array
            if ( in_array( $posts[$i]->ID, $sticky_posts ) ) {
                $sticky_post = $posts[$i];
 
                // Remove sticky from current position
                array_splice( $posts, $i, 1 );
 
                // Move to front, after other stickies
                array_splice( $posts, $sticky_offset, 0, array($sticky_post) );
                $sticky_offset++;
 
                // Remove post from sticky posts array
                $offset = array_search($sticky_post->ID, $sticky_posts);
                unset( $sticky_posts[$offset] );
            }
        }
 
        // Look for more sticky posts if needed
        if ( !empty( $sticky_posts) ) {
 
            $stickies = get_posts( array(
                'post__in' => $sticky_posts,
                'post_type' => $wp_query->query_vars['post_type'],
                'post_status' => 'publish',
                'nopaging' => true
            ) );
 
            foreach ( $stickies as $sticky_post ) {
                array_splice( $posts, $sticky_offset, 0, array( $sticky_post ) );
                $sticky_offset++;
            }
        }
 
    }
 
    return $posts;
}
 
add_filter( 'the_posts', 'winvader_cpt_sticky_at_top' );

// Add sticky class in article title to style sticky posts differently

function winvader_cpt_sticky_class($classes) {
			if ( is_sticky() ) : 
			$classes[] = 'sticky';
	        return $classes;
		endif; 
		return $classes;
				}
	add_filter('post_class', 'winvader_cpt_sticky_class');


/* VT Resize
------------------------------------------*/

if ( !function_exists( 'vt_resize') ) {
	function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
		// this is an attachment, so we have the ID
		$file_path = ''; $path = '';
		if ( $attach_id ) {
			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );
		// this is not an attachment, let's use the image url
		} else if ( $img_url ) {
			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
			// Look for Multisite Path
			if(file_exists($file_path) === false){
				global $blog_id;
				$file_path = parse_url( $img_url );
				if (preg_match("/files/", $file_path['path'])) {
					$path = explode('/',$file_path['path']);
					foreach($path as $k=>$v){
						if($v == 'files'){
							$path[$k-1] = 'wp-content/blogs.dir/'.$blog_id;
						}
					}
					$path = implode('/',$path);
				}
				$file_path = $_SERVER['DOCUMENT_ROOT'].$path;
			}
			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
			$orig_size = getimagesize( $file_path );
			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}
		$file_info = pathinfo( $file_path );
		// check if file exists
		$base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
		if ( !file_exists($base_file) )
		 return;
		$extension = '.'. $file_info['extension'];
		// the image path without the extension
		$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
		$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width ) {
			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {
				$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
				$vt_image = array (
					'url' => $cropped_img_url,
					'width' => $width,
					'height' => $height
				);
				return $vt_image;
			}
			// $crop = false or no height set
			if ( $crop == false OR !$height ) {
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;
				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					return $vt_image;
				}
			}
			// check if image width is smaller than set width
			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) $width = $img_size[0];
			// Check if GD Library installed
			if (!function_exists ('imagecreatetruecolor')) {
			    echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';
			    return;
			}
			// no cache files - let's finally resize it
			$new_img_path = wp_get_image_editor( $file_path, $width, $height, $crop );			
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
			return $vt_image;
		}
		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $width,
			'height' => $height
		);
		return $vt_image;
	}
}