<?php

// Header
function inde_header($atts, $content = null){
	extract( shortcode_atts( array(
		'dots' => ''
		), $atts ) );

	$output .= '<div class="header ' . esc_attr($dots) . '">' . do_shortcode($content) . '</div>';

	return $output;
}
add_shortcode('header', 'inde_header');

function inde_header_info($atts, $content = null){
	return '<div class="info">' . do_shortcode($content) . '</div>';
}
add_shortcode('info', 'inde_header_info');

function inde_header_headline($atts, $content = null){
	return '<h3>' . $content . '</h3>';
}
add_shortcode('headline', 'inde_header_headline');

function inde_header_subtitle($atts, $content = null){
	return '<p class="subtitle">' . $content . '</p>';
}
add_shortcode('subtitle', 'inde_header_subtitle');

function inde_header_links($atts, $content = null){
	return '<div class="links">' . do_shortcode($content) . '</div>';
}
add_shortcode('links', 'inde_header_links');
// end Header

// Homepage Box
function inde_homebox($atts, $content = null){
	extract( shortcode_atts( array(
		'width' => 'one-third'
		), $atts ) );

	return '<div class="box ' . esc_attr($width) . '"><div class="box-inner">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('home_box', 'inde_homebox');

function inde_homebox_last($atts, $content = null){
	extract( shortcode_atts( array(
		'width' => 'one-third'
		), $atts ) );

	return '<div class="box ' . esc_attr($width) . ' last"><div class="box-inner">' . do_shortcode($content) . '</div></div><div class="clear"></div>';
}
add_shortcode('home_box_last', 'inde_homebox_last');
// end Homepage Box

// Button
function inde_button($atts, $content = null){
	extract( shortcode_atts( array(
		'style' => 'brightBlue',
		'size' => '',
		'url' => ''
		), $atts ) );
	return '<a class="button ' . esc_attr($style) . ' ' . esc_attr($size) . '" href="' . esc_attr($url) . '"><span>' . $content . '</span></a>';
}
add_shortcode('button', 'inde_button');
// end Button

// Tabs Slider Button
function inde_tabs_slider_button($atts, $content = null){
	extract( shortcode_atts( array(
		'url' => ''
		), $atts ) );
	return '<a class="buttonLink" href="' . esc_attr($url) . '">' . $content . '</a>';
}
add_shortcode('tabs_slider_button', 'inde_tabs_slider_button');
// end Tabs Slider Button

// Divider
function inde_hr($atts, $content = null){
	return '<hr />';
}
add_shortcode('divider', 'inde_hr');
// end Divider

// Accordion Content
function inde_accordion_content($atts, $content = null){
	extract( shortcode_atts( array(
		'title' => ''
	), $atts ) );

	return '<h4 class="acc_trigger"><a href="#">' . esc_attr($title) . '</a></h4><div class="acc_container"><div class="block">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('accordion_content', 'inde_accordion_content');
// end Accordion Content

// Content Tabs
function inde_content_tabs( $atts, $content ){
	$GLOBALS['tab_count'] = 0;
	$tabs_count = 1;
	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
		foreach( $GLOBALS['tabs'] as $tab ){
			$tabs[] = '<li><a href="#tab'.$tabs_count.'">'.$tab['title'].'</a></li>';
			$panes[] = '<div id="tab'.$tabs_count++.'" class="tab_content">'.$tab['content'].'</div>';
		}
		$return = "\n".'<ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="tab_container">'.implode( "\n", $panes ).'</div>'."\n";
	}
	return $return;
}
add_shortcode( 'tabgroup', 'inde_content_tabs' );

function etdc_tab( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => ''
	), $atts));

	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'etdc_tab' );
// end Content Tabs

// Recent Blog Post
function inde_recent_blog_posts($atts, $content = null){
	extract( shortcode_atts( array(
		'limit' => '5'
	), $atts ) );
		
		$recentPosts = new WP_Query();
		$recentPosts->query('showposts='.esc_attr($limit));
		
		$i = 1;

		$output .= '<ul class="recentBlogPosts">'."\n";

		while ($recentPosts->have_posts()) { 
		
		$recentPosts->the_post();

		if($limit == $i) {
			$output .= '<li class="last">'."\n";
		} else {
			$output .= '<li>'."\n";
		}
		
		$output .= '<h6><a href="'.get_permalink().'" title="'.the_title('','',false).'">'.the_title('','',false).'</a></h6>
				<p>'.excerpt('30').'</p>
				<p class="meta">by <a href="'.get_permalink().'">'.get_the_author_meta('display_name').'</a> on <a href="'.get_permalink().'">'.get_the_time('d.m.Y').'</a></p>
			</li>';
		
		$i++;

		}

		$output .= '</ul>'."\n";

		# $output .= '<a class="button blue" href="'.get_bloginfo('url').'/blog/"><span>'. __('Read More', 'insidesign') .'</span></a>';
		
		return $output;

		wp_reset_query();

}
add_shortcode('recent_blog_posts', 'inde_recent_blog_posts');
// end Recent Blog Post

// Layout - one half
function inde_one_half($atts, $content = null){
	return '<div class="one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'inde_one_half');
// end Layout - one half

// Layout - one half last
function inde_one_half_last($atts, $content = null){
	return '<div class="one-half last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'inde_one_half_last');
// end Layout - one half last

// Layout - one third
function inde_one_third($atts, $content = null){
	return '<div class="one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'inde_one_third');
// end Layout - one third

// Layout - one third last
function inde_one_third_last($atts, $content = null){
	return '<div class="one-third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'inde_one_third_last');
// end Layout - one third last

// Layout - one fourth
function inde_one_fourth($atts, $content = null){
	return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'inde_one_fourth');
// end Layout - one fourth

// Layout - one fourth last
function inde_one_fourth_last($atts, $content = null){
	return '<div class="one-fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'inde_one_fourth_last');
// end Layout - one fourth last

// Layout - one third
function inde_two_third($atts, $content = null){
	return '<div class="two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'inde_two_third');
// end Layout - one third

// Layout - two third last
function inde_two_third_last($atts, $content = null){
	return '<div class="two-third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'inde_two_third_last');
// end Layout - two third last

// Layout - three fourth
function inde_three_fourth($atts, $content = null){
	return '<div class="three-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'inde_three_fourth');
// end Layout - three fourth

// Layout - three fourth last
function inde_three_fourth_last($atts, $content = null){
	return '<div class="three-fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'inde_three_fourth_last');
// end Layout - three fourth last

// Dots Slider 1
function inde_dots_slider_1($atts, $content = null){

	$output .= '<div class="singleSlider">'."\n".'<ul id="dotsSlider" class="clearfix">';
	
	$loop = new WP_Query( array('post_type' => 'work', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 100));
	
	while ( $loop->have_posts() ) {	
		$loop->the_post();
		
		$output .= "\n".'<li>'."\n".'<div class="previewImage">'."\n".'<img src="'.get_custom_field('inde_dots_slider_image').'" alt="'.the_title('','',false).'" />'."\n".'<div class="info">'."\n".'<h5>'.the_title('','',false).'</h5>'."\n".'<small>'.get_the_date('F jS, Y').'</small>'."\n".'</div><!-- end .info -->'."\n".'</div><!-- end .previewImage -->'."\n".'<div class="description">'."\n".'<h2>'.get_custom_field('inde_dots_slider_info_title').'</h2>'."\n".'<h6>'.get_custom_field('inde_dots_slider_info_subtitle').'</h6>'."\n".'<h3>'.get_custom_field('inde_dots_slider_info_desc').'</h3>'."\n".apply_filters('the_content', get_custom_field('inde_dots_slider_info_buttons'))."\n".'</div><!-- end .description -->'."\n".'</li>'."\n";

     }
	 
	 wp_reset_query();
	 
	$output .= '</ul><!-- end #dotsSlider -->'."\n".'</div><!-- end .singleSlider -->';

	return $output;
	
}
add_shortcode('dots_slider_1', 'inde_dots_slider_1');
// end Dots Slider 1

// Dots Slider 2
function inde_dots_slider_2($atts, $content = null){

	$output .= '<div class="singleSlider">'."\n".'<ul id="dotsSlider2">';
	
	$loop = new WP_Query( array('post_type' => 'work', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 100));
	
	while ( $loop->have_posts() ) {	
		$loop->the_post();
		
		$output .= "\n".'<li>'."\n".'<a href="'.basename(get_permalink()).'"><img src="'.get_custom_field('inde_dots_slider_2_image').'" alt="'.the_title('','',false).'" /></a>'."\n".'</li>'."\n";		
     }
	 
	 wp_reset_query();
	 
	$output .= '</ul><!-- end #dotsSlider2 -->'."\n".'<a href="#" class="prevDotsSlide">&laquo;</a>'."\n".'<a href="#" class="nextDotsSlide">&raquo;</a>'."\n".'</div><!-- end .singleSlider -->';

	return $output;
	
}
add_shortcode('dots_slider_2', 'inde_dots_slider_2');
// end Dots Slider 2

// Roundabout Slider
function inde_roundabout_slider($atts, $content = null){

	$output .= '<div class="singleSlider">'."\n".'<ul id="roundaboutSlider">';
	
	$loop = new WP_Query( array('post_type' => 'work', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 100));
	
	while ( $loop->have_posts() ) {	
		$loop->the_post();
		
		$output .= "\n".'<li>'."\n".'<a href="'.basename(get_permalink()).'">'."\n".'<img src="'.get_custom_field('inde_roundabout_slider_image').'" alt="'.the_title('','',false).'" />'."\n";	
		
		if(get_custom_field('inde_roundabout_slider_new')){
			$output .= '<span class="new"></span>'."\n";
		}

		if(get_custom_field('inde_roundabout_slider_desc')){
			$output .= '<span class="desc">'.get_custom_field('inde_roundabout_slider_desc').'</span>'."\n";
		}
		
		$output .= '</a>'."\n".'</li>'."\n";
     }
	 
	 wp_reset_query();
	 
	$output .= '</ul><!-- end #roundaboutSlider -->'."\n".'<div id="roundaboutSliderNav">'."\n".'<a href="#" class="previousSlide">&laquo;</a>'."\n".'<a href="#" class="nextSlide">&raquo;</a>'."\n".'</div><!-- end #roundaboutSliderNav -->'."\n".'</div><!-- end .singleSlider -->';

	return $output;
	
}
add_shortcode('roundabout_slider', 'inde_roundabout_slider');
// end Roundabout Slider

// Piecemaker Slider
function inde_piecemaker_slider_shortcode($atts, $content = null){

	$output .= '<div class="singleSlider clearfix">'."\n".'<div id="piecemakerSlider">'."\n";
		
		$output .= "\n".'<div class="no-flash">'."\n".'<h5>Slider requires Flash player and Javascript!</h5>'."\n".'<a href="http://www.adobe.com/go/getflashplayer">'."\n".'<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />'."\n".'</a>'."\n".'</div>'."\n";		
	 
	$output .= '</div><!-- end #piecemakerSlider -->'."\n".'<div id="piecemakerShadow">&nbsp;</div>'."\n".'</div><!-- end .singleSlider -->';

	return $output;
	
}
add_shortcode('piecemaker_slider', 'inde_piecemaker_slider_shortcode');
// end Piecemaker Slider

// Tabs Slider
function inde_tabs_slider_shortcode($atts, $content = null){

	$output .= '<div class="singleSlider">'."\n".'<div id="tabsSlider">'."\n".'<div id="tabsSlides">'."\n".'<ul>'."\n";

	$loop = new WP_Query( array('post_type' => 'tabs_slider', 'post_status' => 'publish', 'orderby' => 'meta_value', 'meta_key' => 'inde_slide_order', 'order' => 'ASC', 'posts_per_page' => 100));
	
	while ( $loop->have_posts() ) {	
		$loop->the_post();
	
		$content = get_the_content();
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);	

		$output .= '<li id="slide-'.get_custom_field('inde_slide_order').'"><img src="'.get_custom_field('inde_slide_bg').'" alt="bg" class="background" /><div class="tabContent">';
		
		if(get_custom_field('inde_slide_thumbnail_align') == 'Left') {
			$output .= get_the_post_thumbnail($post->ID, 'tabs-slider' , array('class' => 'alignleft attachment-tabs-slider'));
		} elseif (get_custom_field('inde_slide_thumbnail_align') == 'Right') {
			$output .= get_the_post_thumbnail($post->ID, 'tabs-slider' , array('class' => 'alignright attachment-tabs-slider'));
		}

		$output .= $content.'</div><!-- end .tabContent --></li>';
		
     }
	 
	$output .= '</ul>'."\n".'</div><!-- end #tabSlides -->'."\n".'<ul id="tabsNav">'."\n";
	
	while ( $loop->have_posts() ) {	
		$loop->the_post();
		
		if(get_custom_field('inde_slide_order') == '1') {
			$output .= "\n".'<li class="activeSlide">';
		} else {
			$output .= "\n".'<li>';
		}
		
		$output .= '<a href="#slide-'.get_custom_field('inde_slide_order').'">'.the_title('','',false).'</a></li>'."\n";		
     }
	 
	wp_reset_query();
	
	$output .= '</ul><!-- end #tabsNav --></div>'."\n".'<!-- end #tabSlider -->'."\n".'</div><!-- end .singleSlider -->';

	return $output;
	
}
add_shortcode('tabs_slider', 'inde_tabs_slider_shortcode');
// end Tabs Slider

/* TinyMCE Buttons */

// Header
function add_header_button() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;
    
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "add_header_tinymce_plugin");
        add_filter('mce_buttons', 'register_header_button');
    }
}

function register_header_button($buttons) {
    array_push($buttons, "", "header");
    return $buttons;
}

function add_header_tinymce_plugin($plugin_array) {
    $plugin_array['header'] = get_bloginfo('template_url').'/functions/assets/tinymce-editor.js';
    return $plugin_array;
}

// Home Box
function add_homebox_button() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;
    
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "add_homebox_tinymce_plugin");
        add_filter('mce_buttons', 'register_homebox_button');
    }
}

function register_homebox_button($buttons) {
    array_push($buttons, "", "homebox");
    return $buttons;
}

function add_homebox_tinymce_plugin($plugin_array) {
    $plugin_array['homebox'] = get_bloginfo('template_url').'/functions/assets/tinymce-editor.js';
    return $plugin_array;
}

// Raw
function add_raw_button() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;
    
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "add_raw_tinymce_plugin");
        add_filter('mce_buttons', 'register_raw_button');
    }
}

function register_raw_button($buttons) {
    array_push($buttons, "", "raw");
    return $buttons;
}

function add_raw_tinymce_plugin($plugin_array) {
    $plugin_array['raw'] = get_bloginfo('template_url').'/functions/assets/tinymce-editor.js';
    return $plugin_array;
}

// Shortcodes Dropdown
function add_shortcodes_dropdown_button() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;
    
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "add_shortcodes_dropdown_tinymce_plugin");
        add_filter('mce_buttons', 'register_shortcodes_dropdown_button');
    }
}

function register_shortcodes_dropdown_button($buttons) {
    array_push($buttons, "|", "shortcodes_dropdown");
    return $buttons;
}

function add_shortcodes_dropdown_tinymce_plugin($plugin_array) {
    $plugin_array['shortcodes_dropdown'] = get_bloginfo('template_url').'/functions/assets/tinymce-editor.js';
    return $plugin_array;
}

function my_refresh_mce($ver) {
    $ver += 3;
    return $ver;
}

// Button
function add_button_button() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;
    
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "add_button_tinymce_plugin");
        add_filter('mce_buttons', 'register_button_button');
    }
}

function register_button_button($buttons) {
    array_push($buttons, "", "button");
    return $buttons;
}

function add_button_tinymce_plugin($plugin_array) {
    $plugin_array['button'] = get_bloginfo('template_url').'/functions/assets/tinymce-editor.js';
    return $plugin_array;
}

add_filter('tiny_mce_version', 'my_refresh_mce');
add_action('init', 'add_shortcodes_dropdown_button');
add_action('init', 'add_header_button');
add_action('init', 'add_homebox_button');
add_action('init', 'add_button_button');
add_action('init', 'add_raw_button');

// Editor Fix (Raw)
function my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter('the_content', 'my_formatter', 99);