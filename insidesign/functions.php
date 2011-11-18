<?php

include_once('functions/functions.admin.php');

include_once('functions/functions.widgets.php');

include_once('functions/functions.shortcodes.php');

include_once('functions/functions.meta-boxes.php');

include_once('functions/functions.comments.php');

include_once('js-settings.php');

global $themename, $shortname;

if ( ! isset( $content_width ) )
	$content_width = 665;

add_action( 'after_setup_theme', 'insidesign_setup' );

if ( ! function_exists( 'insidesign_setup' ) ):

function insidesign_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
    // Custom thumbnail sizes
    add_theme_support( 'post-thumbnails' );
    
    add_image_size('portfolio-single', 630, 490, true);
    add_image_size('portfolio-1-featured', 510, 350, true);
    add_image_size('portfolio-1', 425, 205, true);
    add_image_size('portfolio-2-featured', 630, 205, true);
    add_image_size('portfolio-2', 255, 160, true);
    add_image_size('blog', 630, 205, true);
    add_image_size('tabs-slider', 492, 299, true);
    add_image_size('piecemaker-slider', 960, 330, true);
    add_image_size('our-team-member', 100, 100, true);

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'insidesign' ),
	) );
	
	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'insidesign', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

}
endif;

function insidesign_filter_wp_title( $title, $separator ) {
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'insidesign' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'insidesign' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'insidesign' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'insidesign_filter_wp_title', 10, 2 );

function insidesign_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'insidesign_page_menu_args' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function insidesign_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'insidesign' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function insidesign_auto_excerpt_more( $more ) {
	return ' &hellip;' . insidesign_continue_reading_link();
}
add_filter( 'excerpt_more', 'insidesign_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function insidesign_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= insidesign_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'insidesign_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 */
function insidesign_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'insidesign_remove_gallery_css' );

if ( ! function_exists( 'insidesign_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function insidesign_posted_on() {
	printf( __( '%2$s <span class="meta-sep">|</span> %1$s', 'insidesign' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'insidesign' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'insidesign_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function insidesign_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( ' <span class="meta-sep">|</span> %1$s <br />Tagged %2$s - Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'insidesign' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( ' <span class="meta-sep">|</span> %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'insidesign' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'insidesign' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

// Navigation descriptions
class description_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
		$class_names = $value = '';
	
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
	
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	
		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
	
		if($depth != 0)
		{
			$description = $append = $prepend = "";
		}
	
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
	
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// Get Custom Field
function get_custom_field($key) {
	global $post;
	return $custom_field = get_post_meta($post->ID,$key,true);
}

// Get Category ID
function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

// Get Large Featured Image
function get_featured_image_large(){
    $featured_image_large = get_the_post_thumbnail($post->ID);
    preg_match("/(?<=src=['|\"])[^'|\"]*?(?=['|\"])/i", $featured_image_large, $thePath);
    return $featured_image_large_final = $thePath[0]; 
}

// Hide 'No categories' info
function hide_no_categories($content) {
  if (!empty($content)) {
    $content = str_ireplace('<li>' .__( "No categories" ). '</li>', "", $content);
  }
  return $content;
}
add_filter('wp_list_categories','hide_no_categories');


// Limit the content to certain number of words
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);

	return $excerpt;
}
function content($limit) {
	$content = explode(' ', get_the_content(), $limit);

	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);

	return $content;
}

// Piecemaker 3D Slider
add_action('init', 'inde_piecemaker_slider');

function inde_piecemaker_slider() {
  $labels = array(
    'name' => _x('Piecemaker 3D Slider', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add Slide', 'Event Slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slide'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slide Details'),
    'search_items' => __('Search Slides'),
    'not_found' =>  __('No slides were found with that criteria'),
    'not_found_in_trash' => __('No slides found in the Trash with that criteria'),
    'view' =>  __('View Item')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'This is the holding location for all slides',
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'rewrite' => true,
    'hierarchical' => true,
    'menu_position' => 30,
    'supports' => array('title', 'editor', 'thumbnail')
  );

  register_post_type('piecemaker_slider',$args);
}

// Tabs Slider
add_action('init', 'inde_tabs_slider');

function inde_tabs_slider() {
  $labels = array(
    'name' => _x('Tabs Slider', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add Slide', 'Event Slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slide'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slide Details'),
    'search_items' => __('Search Slides'),
    'not_found' =>  __('No slides were found with that criteria'),
    'not_found_in_trash' => __('No slides found in the Trash with that criteria'),
    'view' =>  __('View Item')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'This is the holding location for all slides',
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'rewrite' => true,
    'hierarchical' => true,
    'menu_position' => 35,
    'supports' => array('title', 'editor', 'thumbnail')
  );

  register_post_type('tabs_slider',$args);
}

// Our Team
add_action('init', 'inde_our_team');

function inde_our_team() {
  $labels = array(
    'name' => _x('Our Team', 'post type general name'),
    'singular_name' => _x('Member', 'post type singular name'),
    'add_new' => _x('Add Member', 'Event Member'),
    'add_new_item' => __('Add New Member'),
    'edit_item' => __('Edit Member'),
    'new_item' => __('New Member'),
    'view_item' => __('View Member Details'),
    'search_items' => __('Search Member'),
    'not_found' =>  __('No members were found with that criteria'),
    'not_found_in_trash' => __('No members found in the Trash with that criteria'),
    'view' =>  __('View Item')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'This is the holding location for all members',
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'rewrite' => true,
    'hierarchical' => true,
    'menu_position' => 40,
    'supports' => array('title', 'thumbnail')
  );

  register_post_type('our_team',$args);
}

// Portfolio
add_action('init', 'inde_portfolio');

function inde_portfolio() {
  $labels = array(
    'name' => _x('Portfolio', 'taxonomy general name'),
    'singular_name' => _x('Work', 'taxonomy singular name'),
    'add_new' => _x('Add Work', 'Event Work'),
    'add_new_item' => __('Add New Work'),
    'edit_item' => __('Edit Work'),
    'new_item' => __('New Work'),
    'view_item' => __('View Work Details'),
    'search_items' => __('Search Portfolio Work'),
    'not_found' =>  __('No portfolio works were found with that criteria'),
    'not_found_in_trash' => __('No portfolio works found in the Trash with that criteria'),
    'view' =>  __('View Item')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'This is the holding location for all portfolio items',
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'rewrite' => true,
    'hierarchical' => true,
    'menu_position' => 25,
    'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'comments')
  );

  register_post_type('work',$args);
}

$labels = array(
  'name' => _x( 'Web Techniques', 'taxonomy general name' ),
  'singular_name' => _x( 'Web Technique', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search Web Techniques' ),
  'popular_items' => __( 'Popular Web Techniques' ),
  'all_items' => __( 'All Web Techniques' ),
  'parent_item' => __( 'Parent Web Techniques' ),
  'parent_item_colon' => __( 'Parent Web Techniques:' ),
  'edit_item' => __( 'Edit Web Technique' ),
  'update_item' => __( 'Update Web Technique' ),
  'add_new_item' => __( 'Add New Web Technique' ),
  'new_item_name' => __( 'New Web Technique Name' )
);

register_taxonomy('web-techniques',array('work'), array(
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'web-techniques' )
));

$labels = array(
  'name' => _x( 'Categories', 'taxonomy general name' ),
  'singular_name' => _x( 'Category', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search Categories' ),
  'popular_items' => __( 'Popular Categories' ),
  'all_items' => __( 'All Categories' ),
  'parent_item' => __( 'Parent Categories' ),
  'parent_item_colon' => __( 'Parent Categories:' ),
  'edit_item' => __( 'Edit Category' ),
  'update_item' => __( 'Update Category' ),
  'add_new_item' => __( 'Add New Category' ),
  'new_item_name' => __( 'New Category Name' )
);

register_taxonomy('portfolio-categories',array('work'), array(
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'portfolio-categories' )
));

// Cleaner Gallery Plugin
add_action( 'wp_print_styles', 'inde_deregister_styles' );

function inde_deregister_styles() {
	wp_deregister_style( 'cleaner-gallery' );
}

add_filter( 'cleaner_gallery_image_link_class', 'inde_gallery_image_link_class' );

function inde_gallery_image_link_class( $class ) {
	return 'single_image';
}