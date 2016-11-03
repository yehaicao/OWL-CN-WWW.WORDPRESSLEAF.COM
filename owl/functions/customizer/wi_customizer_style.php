<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function winvader_customizer_css() {
?>
<style type="text/css">
<?php
	$color_accent = balanceTags(get_theme_mod( 'wi_color_accent' ));
	$color_dark_main = balanceTags(get_theme_mod( 'wi_color_dark_main', '#000000' ));
	$color_gray_main = balanceTags(get_theme_mod( 'wi_color_gray_main', '#a3a3a3' ));
	$css = '
	/* main dark color */
	body {color:'.$color_dark_main.';}
	a {color:'.$color_dark_main.';}
	input[type="submit"],
	input[type="button"] {background-color: '.$color_dark_main.';}
	input[type="text"]:active,
	input[type="text"]:focus,
	textarea:active,
	textarea:focus {color: '.$color_dark_main.';}
	.alert {background-color: '.$color_dark_main.';}
	code { color: '.$color_dark_main.';}
	#navigation {background-color:'.$color_dark_main.';}
	.menu .sub-menu,
	.menu .children {background-color: '.$color_dark_main.';}
	.show-search {background-color: '.$color_dark_main.';}
	.about-me-post-item { border-color: '.$color_dark_main.';}
	.about-me-post-item h4 a {color: '.$color_dark_main.';}
	.wi-grid-title .sub-title {color: '.$color_dark_main.';}
	.wi-grid li .item h2 a {color:'.$color_dark_main.';}
	.post-header h1 a, .post-header h2 a, .post-header h1 {color:'.$color_dark_main.';}
	.post-entry h1, .post-entry h2, .post-entry h3, .post-entry h4, .post-entry h5, .post-entry h6 {color:'.$color_dark_main.';}
	.post-entry blockquote:before {border-color: '.$color_dark_main.';}
	.post-entry blockquote:after {border-color: '.$color_dark_main.';}
	.post-author {border-color: '.$color_dark_main.';}	
	.author-content h5 a {color:'.$color_dark_main.';}
	.post-tags a {border-color: '.$color_dark_main.';}
	.post-tags a:hover {background-color: '.$color_dark_main.';}
	.post-pagination span {color:'.$color_dark_main.';}
	.post-pagination .arrow {color:'.$color_dark_main.';}
	.post-pagination a {color:'.$color_dark_main.';}
	.post-pagination a:hover > .arrow, .post-pagination a:hover > .pagi-text span, .post-pagination a:hover {color:'.$color_dark_main.';}
	.post-quote .post-image {background-color: '.$color_dark_main.';}
	.post-quote .post-image:after {background-color: '.$color_dark_main.';}
	a.jm-post-like {color: '.$color_dark_main.';}
	.owl-theme .owl-nav [class*="owl-"] { color: '.$color_dark_main.';}
	.owl-theme .owl-dots .owl-dot span { border-color: '.$color_dark_main.';}
	.owl-theme .owl-dots .owl-dot.active span, 
	.owl-theme .owl-dots .owl-dot:hover span { background-color: '.$color_dark_main.';}
	.post-share-show {background-color: '.$color_dark_main.';}
	.post-share-show:after {border-right-color: '.$color_dark_main.';}
	.pagination:after {background-color: '.$color_dark_main.';}
	.pagination a {color:'.$color_dark_main.'; border-color: '.$color_dark_main.';	}
	.num-pagination:after {background-color: '.$color_dark_main.';}
	.num-pagination>.page-numbers {border-color: '.$color_dark_main.';}
	.num-pagination .page-numbers li {border-color: '.$color_dark_main.';}
	.footer-social-wrapper:after {background-color: '.$color_dark_main.';}
	#footer-social a {color:'.$color_dark_main.';}
	#footer-social a i:before {background-color: '.$color_dark_main.';}
	#footer-social a span:after {background-color: '.$color_dark_main.';}
	#footer-logo p {color:'.$color_dark_main.';}
	#footer-copyright {background-color:'.$color_dark_main.';}
	#footer-copyright .to-top {border-color: '.$color_dark_main.';color: '.$color_dark_main.';}
	#footer-copyright .to-top:hover {background-color: '.$color_dark_main.';}
	#widget-insta-area {background-color: '.$color_dark_main.';}
	#widget-insta-area .widget .widget-title {background-color: '.$color_dark_main.';}
	.widget .widget-title {color:'.$color_dark_main.';}
	.widget .widget-title:after {background-color: '.$color_dark_main.';}
	.widget a {color: '.$color_dark_main.';}
	.widget a:hover {color: '.$color_dark_main.';}
	.widget ul li {border-color: '.$color_dark_main.';}
	.widget .tagcloud a:hover {background-color:'.$color_dark_main.';}
	#wp-calendar caption { color: '.$color_dark_main.'; }
	#wp-calendar tbody td a { color:'.$color_dark_main.'; }
	.widget-social a i {background-color: '.$color_dark_main.';}
	.widget-social a:hover > i {color: '.$color_dark_main.';border-color: '.$color_dark_main.';}
	.thecomment .comment-text span.author a:after {background-color: '.$color_dark_main.';}
	.thecomment .comment-text span.date {color:'.$color_dark_main.';}
	.post-comments span.reply a {border-color: '.$color_dark_main.';}
	.post-comments span.reply a:hover {background-color:'.$color_dark_main.';}
	ul.children {border-color: '.$color_dark_main.';}
	.bypostauthor {border-color: '.$color_dark_main.';}
	ul.children li.bypostauthor .author a.url:before {background-color: '.$color_dark_main.'; }
	#respond  h3 {color:'.$color_dark_main.';}
	#respond h3 a {color:'.$color_dark_main.';}
	#respond h3 small a {background-color:'.$color_dark_main.';}
	#respond #submit {background-color:'.$color_dark_main.';border-color: '.$color_dark_main.';}
	.archive-box {border-color: '.$color_dark_main.';}
	.gallery .gallery-caption{ color:'.$color_dark_main.';} 
	.wpcf7 .wpcf7-submit {background-color:'.$color_dark_main.';}
	.wpcf7 .wpcf7-submit:hover {background-color:'.$color_dark_main.';}
	.searchsubmit {color: '.$color_dark_main.';}
	.widget_categories li a {color: '.$color_dark_main.';}
	.widget_categories .children {border-color: '.$color_dark_main.';}
	.facebook-widget-cover {background-color: '.$color_dark_main.';}
	.winvader-tag-cloud [class*="tag-link-"] {color: '.$color_dark_main.';border-color: '.$color_dark_main.';}
	.winvader-tag-cloud [class*="tag-link-"]:hover {background-color: '.$color_dark_main.';}
	.tp_recent_tweets li a:hover {color: '.$color_dark_main.';}
	.tp_recent_tweets .twitter_time {color: '.$color_dark_main.';}
	.wds-latest-tweets li a:hover {color: '.$color_dark_main.';}
	.wds-latest-tweets li .time-ago a {color: '.$color_dark_main.';}
	.wds-latest-tweets li .time-ago a:hover {color: '.$color_dark_main.';	opacity: 1;}
	span.dropcap {background-color: '.$color_dark_main.';}
	.alternative-slider .item .button {border-color: '.$color_dark_main.';}
	.alternative-slider .item .button:hover {background-color: '.$color_dark_main.';}
	.about-author-area {background-color: '.$color_dark_main.';}
	.cat a {background-color: '.$color_dark_main.';}
	.wi-masonry li .item h2:after {background-color: '.$color_dark_main.';}
	.wi-masonry li .item h2 a {color:'.$color_dark_main.';}
	.sticky .sticky-post-icon {background-color: '.$color_dark_main.';}
	.author-content h5 a:after {background-color: '.$color_dark_main.';}
	.post-entry blockquote:hover:after {background: '.$color_dark_main.';}
	.post_format-post-format-gallery .owl-theme .owl-nav [class*="owl-"]:hover { color: '.$color_dark_main.'; }
	.widget_mc4wp_widget .form input[type="submit"] { color: '.$color_dark_main.';border-color: '.$color_dark_main.';}
	';
	$css = $css.'
	input[type="submit"]:focus, input[type="submit"]:hover, input[type="button"]:focus, input[type="button"]:hover { color: '.$color_accent.'; }
	.featured-area .owl-carousel .item .feat-overlay .feat-meta a:hover { color: '.$color_accent.'; }
	.about-me-featured:before { border-color: '.$color_accent.'; }
	.about-me-cont h2:after { background-color: '.$color_accent.'; }
	.about-me-post-item h4 a:hover { color: '.$color_accent.'; }
	.about-me-post-item .feat-meta { color: '.$color_accent.'; }
	a.jm-post-like:hover, a.jm-post-like:active, a.jm-post-like:focus, a.liked:hover, a.liked:active, a.liked:focus { color: '.$color_accent.'; }
	#footer-logo p i { color:'.$color_accent.'; }
	.recentcomments .comment-author-link a { color: '.$color_accent.';}
	.thecomment .comment-text em i {color:'.$color_accent.';}
	.owlslider-insta .owl-theme .owl-nav [class*="owl-"]:hover { color: '.$color_accent.' !important;}
	.owlslider-insta .owl-theme .owl-dots .owl-dot.active span, .owlslider-insta .owl-theme .owl-dots .owl-dot:hover span {  background-color: '.$color_accent.' !important; }
	.widget_mc4wp_widget .form label i { color: '.$color_accent.'; }
	.tp_recent_tweets li a { color: '.$color_accent.'; }
	.tp_recent_tweets li:before { color: '.$color_accent.'; }
	.wi-insta-thumb .profile-link-wrapper a { color: '.$color_accent.'; }
	.widget a:hover {color: '.$color_accent.';}
	.item-related h3 a {color: '.$color_accent.';}
	.post-entry a:hover {color: '.$color_accent.';}
	.entry-comments a:hover {color: '.$color_accent.';}
	';
	$css = $css.'
	.menu>li>a { color:'.$color_gray_main.'; }
	ul.menu ul a, .menu ul ul a { color: '.$color_gray_main.'; }
	#top-social a i { color:'.$color_gray_main.'; }
	.post-entry hr { border-color: '.$color_gray_main.'; }
	.post-entry td, .post-entry th { border-color: '.$color_gray_main.'; }
	.post-share-show a { color: '.$color_gray_main.'; }
	.num-pagination .current { color: '.$color_gray_main.'; }
	#footer-copyright p { color:'.$color_gray_main.'; }
	#wp-calendar tbody { color: '.$color_gray_main.'; }
	.gallery .gallery-icon img:hover { border-color: '.$color_gray_main.' !important; }
	.widget_categories li { color: '.$color_gray_main.'; }
	.about-author-area .about-author-social a i { color:'.$color_gray_main.'; }
	.wi-insta-thumb .profile-link-wrapper a:hover {	color: '.$color_gray_main.'; }
	';
	$topbar_bg                       = balanceTags(get_theme_mod( 'wi_topbar_bg' ));
	$topbar_nav_color                = balanceTags(get_theme_mod( 'wi_topbar_nav_color' ));
	$topbar_nav_color_hover          = balanceTags(get_theme_mod( 'wi_topbar_nav_color_hover' ));
	$drop_bg                         = balanceTags(get_theme_mod( 'wi_drop_bg' ));
	$drop_text_color                 = balanceTags(get_theme_mod( 'wi_drop_text_color' ));
	$drop_text_hover_color           = balanceTags(get_theme_mod( 'wi_drop_text_hover_color' ));
	$topbar_social_color             = balanceTags(get_theme_mod( 'wi_topbar_social_color' ));
	$topbar_social_color_hover       = balanceTags(get_theme_mod( 'wi_topbar_social_color_hover' ));
	$topbar_search_bg                = balanceTags(get_theme_mod( 'wi_topbar_search_bg' ));
	$topbar_search_text              = balanceTags(get_theme_mod( 'wi_topbar_search_text' ));
	$topbar_search_icon              = balanceTags(get_theme_mod( 'wi_topbar_search_icon' ));
	$topbar_search_icon_hover        = balanceTags(get_theme_mod( 'wi_topbar_search_icon_hover' ));
	$topbar_search_inside_icon_hover = balanceTags(get_theme_mod( 'wi_topbar_search_inside_icon_hover' ));
	$css = $css.'
	/* top bar settings */
	#navigation { background: '.$topbar_bg.'; }
	.menu li a, .slicknav_nav a { color: '.$topbar_nav_color.'; }
	.menu li a:hover, .slicknav_nav a:hover { color: '.$topbar_nav_color_hover.'; }
	.menu .sub-menu, .menu .children {background-color:'.$drop_bg.'; }
	ul.menu ul a, .menu ul ul a { color: '.$drop_text_color.'; }
	ul.menu ul a:hover, .menu ul ul a:hover { color: '.$drop_text_hover_color.'; }
	#top-social a i { color: '.$topbar_social_color.'; }
	#top-social a:hover i { color: '.$topbar_social_color_hover.'; }
	#top-search a { color: '.$topbar_search_icon.';}
	#top-search a:hover { color: '.$topbar_search_icon_hover.';}
	.show-search { background: '.$topbar_search_bg.'; }
	.show-search input.s { color: '.$topbar_search_text.'; }
	.show-search .searchsubmit:hover { color: '.$topbar_search_inside_icon_hover.';}
	';
	$footer_widget_bg            = balanceTags(get_theme_mod( 'wi_footer_widget_bg' ));
	$footer_widget_color         = balanceTags(get_theme_mod( 'wi_footer_widget_color' ));
	$footer_social_bg            = balanceTags(get_theme_mod( 'wi_footer_social_bg' ));
	$footer_social_link          = balanceTags(get_theme_mod( 'wi_footer_social_link' ));
	$footer_social_link_hover    = balanceTags(get_theme_mod( 'wi_footer_social_link_hover' ));
	$footer_social_border        = balanceTags(get_theme_mod( 'wi_footer_social_border' ));
	$footer_logo_bg              = balanceTags(get_theme_mod( 'wi_footer_logo_bg' ));
	$footer_copyright_bg         = balanceTags(get_theme_mod( 'wi_footer_copyright_bg' ));
	$footer_copyright_color      = balanceTags(get_theme_mod( 'wi_footer_copyright_color' ));
	$footer_copyright_link       = balanceTags(get_theme_mod( 'wi_footer_copyright_link' ));
	$footer_copyright_link_hover = balanceTags(get_theme_mod( 'wi_footer_copyright_link_hover' ));
	$footer_large_widget_bg      = balanceTags(get_theme_mod( 'wi_footer_large_widget_bg' ));
	$footer_large_widget_color   = balanceTags(get_theme_mod( 'wi_footer_large_widget_color' ));
	$css = $css.'
	/* footer settings */
	.footer-widget-wrapper .widget .widget-title:after { background: '.$footer_widget_bg.';} 
	.footer-widget-wrapper .widget .widget-title {color: '.$footer_widget_color.';}
	#footer-social { background: '.$footer_social_bg.'; }
	#footer-social a i:before {border-color: '.$footer_social_bg.'; }
	#footer-copyright { background: '.$footer_copyright_bg.';}
	#footer-copyright p {color: '.$footer_copyright_color.'; }
	#footer-copyright a {color: '.$footer_copyright_link.';}
	#footer-copyright a:hover {color: '.$footer_copyright_link_hover.';}
	#footer-social a {border-color: '.$footer_social_border.'; color: '.$footer_social_link.';}
	#footer-social a:hover { color: '.$footer_social_link_hover.';}
	#widget-insta-area .widget .widget-title { background: '.$footer_large_widget_bg .'; color: '.$footer_large_widget_color.';}
	#widget-insta-area .widget .widget-title span { background: '.$footer_large_widget_bg .'; }
	';
	$sidebar_bg    = balanceTags(get_theme_mod( 'wi_sidebar_bg' ));
	$sidebar_color = balanceTags(get_theme_mod( 'wi_sidebar_color' ));
	$css = $css.'
	/* sidebar settings */
	.widget .widget-title { color: '.$sidebar_color.'; }
	.widget .widget-title:after { background: '.$sidebar_bg.'; }
	';
	$posts_title_color = balanceTags(get_theme_mod( 'wi_posts_title_color' ));
	$posts_title_color_hover = balanceTags(get_theme_mod( 'wi_posts_title_color_hover' ));
	$posts_dropcap_color = balanceTags(get_theme_mod( 'wi_posts_dropcap_color' ));
	$posts_dropcap_bg = balanceTags(get_theme_mod( 'wi_posts_dropcap_bg' ));
	$css = $css.'
	/* post settings */
	.post-header h1 a, .post-header h2 a, .post-header h1 { color: '.$posts_title_color.'; }
	.post-header h1 a:hover, .post-header h2 a:hover, .post-header h1:hover { color: '.$posts_title_color_hover.'; }
	span.dropcap {color: '.$posts_dropcap_color.'; background-color: '.$posts_dropcap_bg.';}
	';
	
	echo balanceTags($css);
?>
<?php if(balanceTags(get_theme_mod( 'wi_post_hover_symbol', 'f141' ))) : ?>
.post-effect-block:after, .page-effect-block:after, #owlslider-alternative-slider .image-col:after { content: '\<?php echo balanceTags(get_theme_mod( 'wi_post_hover_symbol', 'f141' )); ?>';}
<?php endif; ?>
<?php if(balanceTags(!get_theme_mod( 'wi_post_title_lowercase' ))) : ?>
.post-header h1 a, .post-header h2 a, .post-header h1, .wi-masonry li .item h2, .wi-masonry li .item h2 a { text-transform:uppercase; }
<?php endif; ?>
<?php 
$color_dark_main = balanceTags(get_theme_mod( 'wi_color_dark_main', '#000000' ));
if(balanceTags(get_theme_mod( 'wi_slider_border' ))) : ?>
.featured-area .owl-carousel .item:hover .feat-overlay, 
.featured-area .owl-carousel .item:hover .feat-overlay a,
.featured-area .owl-carousel .item:hover .feat-overlay span { color: <?php echo balanceTags($color_dark_main); ?>; }
<?php endif; ?>
.widget_mc4wp_widget .form { background-image: url(<?php $themedir = get_template_directory_uri(); echo balanceTags($themedir); ?>/img/envelope-mail-chimp.png); }
<?php 
$header_image = get_header_image();
if(isset($_GET['header_image'])) { $header_image = $_GET['header_image']; }
if ( !empty( $header_image ) ) { ?>
	#header:before { background-image: url( <?php echo esc_url($header_image); ?>); }
<?php } else { ?>
	#header:before { display: none; }
<?php } ?>

<?php if(balanceTags(get_theme_mod('wi_about_me_image'))) { ?>
	.about-me-image { background-image: url( <?php echo balanceTags(get_theme_mod('wi_about_me_image')); ?> ); }
<?php } else { ?>
	.about-me-image { background-image: url(<?php $themedir = get_template_directory_uri(); echo balanceTags($themedir); ?>/img/about-me-image-by-default.jpg); }
<?php } ?>

<?php $author_area = balanceTags(get_theme_mod('wi_author_area')); if(isset($_GET['author_area'])) {$author_area = $_GET['author_area'];} if(!$author_area) {?>
	.featured-area { margin-bottom: 0px; }
<?php } ?>

<?php if(balanceTags(get_theme_mod( 'wi_alt_slider_title', 'Featured Posts' )) == '') { ?>
	#owlslider-alternative-slider { padding-left: 0px; }
<?php } ?>

<?php if(balanceTags(get_theme_mod('wi_author_area_image'))) { ?>
	.about-author-area { background-image: url( <?php echo balanceTags(get_theme_mod('wi_author_area_image')); ?> ); }
<?php } else { ?>
	.about-author-area { background-image: url(<?php $themedir = get_template_directory_uri(); echo balanceTags($themedir); ?>/img/about-me-background.jpg); }
<?php } ?>

<?php if(balanceTags(get_theme_mod('wi_footer_background'))) : ?>
	#footer-logo { background-image: url( <?php echo balanceTags(get_theme_mod('wi_footer_background')); ?>); }
<?php endif; ?>

<?php if(balanceTags(!get_theme_mod('wi_footer_background'))) : ?>
	#footer-logo {	padding: 40px 0 40px 0; ?> }
<?php endif; ?>
<?php if(balanceTags(get_theme_mod( 'wi_slider_zoom', true))) : ?>
.slider-image-effect img {
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transform: scale(1);
	transform: scale(1);
}
#owlslider-alternative-slider .image-col .slider-image-effect:hover img {
	-webkit-transform: scale(1.08);
	transform: scale(1.08);
}
#owlslider-featured-one-slide:hover .slider-image-effect img {
	-webkit-transform: scale(1.08);
	transform: scale(1.08);
}
#owlslider-featured-three-slider .item:hover .slider-image-effect img {
	-webkit-transform: scale(1.08);
	transform: scale(1.08);
}	
<?php endif; ?>
<?php if(balanceTags(!get_theme_mod( 'wi_post_zoom', false))) : ?>
.post-effect-block img {
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transform: scale(1.08);
	transform: scale(1.08);
}
.post-effect-block:hover img {
	-webkit-transform: scale(1);
	transform: scale(1);
}
<?php endif; ?>
<?php if(balanceTags(!get_theme_mod( 'wi_page_zoom', false))) : ?>
.page-effect-block img {
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transform: scale(1.08);
	transform: scale(1.08);
}
.page-effect-block:hover img {
	-webkit-transform: scale(1);
	transform: scale(1);
}
<?php endif; ?>
<?php if(balanceTags(get_theme_mod('wi_post_likes')) && is_single() && balanceTags(get_theme_mod('wi_post_comments')) && balanceTags(get_theme_mod('wi_post_share') )) : ?>
.single .post-footer { display: none;}
<?php endif; ?>
<?php if(balanceTags(get_theme_mod('wi_post_cat'))) : ?>
.wi-grid li .item .date:before,
.post-header .post-meta:before {
	display: none;
}
<?php endif; ?>
<?php 
$post_title = balanceTags(get_theme_mod( 'wi_home_post_title_type', 1 ));
if( $post_title == 2) : ?>
.post {
    margin-bottom: 20px;
}
.post-header {
	margin-bottom: 48px;
	margin-top: 30px;
}
<?php endif; ?>
</style>
<?php
}
add_action( 'wp_head', 'winvader_customizer_css' );
?>