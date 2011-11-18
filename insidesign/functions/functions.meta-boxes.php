<?php

/**
 * Create meta boxes for editing pages in WordPress
 * Compatible with custom post types in WordPress 3.0
 *
 * Support input types: text, textarea, checkbox, radio box, select, file, image
 * 
 * @author: Rilwis
 * @url: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 * @version: 2.2
 *
 * Changelog:
 * - 2.2: add enctype to post form (fix upload bug), thanks to http://www.hashbangcode.com/blog/add-enctype-wordpress-post-and-page-forms-471.html
 * - 2.1: add file upload, image upload support
 * - 2.0: oop code, support multiple post types, multiple meta boxes
 * - 1.0: procedural code
 */

/******************************

Edit meta box settings here

******************************/

$prefix = 'inde_';

$meta_boxes = array();

// General Options
$meta_boxes[] = array(
  'id' => 'general-options',
  'title' => 'General Page Options',
  'pages' => array('post', 'page', 'work'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Corner Icon',
		'desc' => '',
		'id' => $prefix . 'corner_icon',
		'type' => 'select',
		'options' => array('home', 'people', 'folder', 'message', 'gear', 'speechBubble', 'heart', 'calendar', 'photos', 'movie', 'star', 'barGraph')
	),
	array(
		'name' => 'Page Subtitle',
		'desc' => '',
		'id' => $prefix . 'page_subtitle',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Sidebar Parent Headline',
		'desc' => 'You can give custom page label to sidebar. Example: Introduction',
		'id' => $prefix . 'sidebar_parent_headline',
		'type' => 'text',
		'std' => ''
	)
  )
);


// Tabs Slider Options
$meta_boxes[] = array(
  'id' => 'tabs-slider-options',
  'title' => 'Options',
  'pages' => array('tabs_slider'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Slide Order',
		'desc' => '',
		'id' => $prefix . 'slide_order',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Slide Background',
		'desc' => '960px*400px',
		'id' => $prefix . 'slide_bg',
		'type' => 'image'
	),
	array(
		'name' => 'Featured Image Align',
		'desc' => '',
		'id' => $prefix . 'slide_thumbnail_align',
		'type' => 'select', 
		'options' => array('Left', 'Right')
	),
  )
);

// Our Team Options
$meta_boxes[] = array(
  'id' => 'our-team-member',
  'title' => 'Member Options',
  'pages' => array('our_team'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Name',
		'desc' => '',
		'id' => $prefix . 'our_team_name',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Job Title',
		'desc' => '',
		'id' => $prefix . 'our_team_job_title',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'vCard',
		'desc' => '',
		'id' => $prefix . 'our_team_vcard',
		'type' => 'file'
	),
	array(
		'name' => 'Website',
		'desc' => 'URL',
		'id' => $prefix . 'our_team_website',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Email',
		'desc' => '',
		'id' => $prefix . 'our_team_email',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Twitter',
		'desc' => 'Example: http://twitter.com/johndoe',
		'id' => $prefix . 'our_team_twitter',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Facebook',
		'desc' => 'Example: http://facebook.com/johndoe',
		'id' => $prefix . 'our_team_facebook',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Flickr',
		'desc' => 'Example: http://flickr.com/johndoe',
		'id' => $prefix . 'our_team_flickr',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Tumblr',
		'desc' => 'Example: http://johndoe.tumblr.com',
		'id' => $prefix . 'our_team_tumblr',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Vimeo',
		'desc' => 'Example: http://vimeo.com/johndoe',
		'id' => $prefix . 'our_team_vimeo',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Linkedin',
		'desc' => 'Example: http://linkedin.com/johndoe',
		'id' => $prefix . 'our_team_linkedin',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Delicious',
		'desc' => 'Example: http://delicious.com/johndoe',
		'id' => $prefix . 'our_team_delicious',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Digg',
		'desc' => 'Example: http://digg.com/johndoe',
		'id' => $prefix . 'our_team_digg',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Google',
		'desc' => 'Example: http://google.com/profiles/johndoe',
		'id' => $prefix . 'our_team_google',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'LastFM',
		'desc' => 'Example: http://lastfm.com/user/johndoe',
		'id' => $prefix . 'our_team_lastfm',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'MySpace',
		'desc' => 'Example: http://myspace.com/johndoe',
		'id' => $prefix . 'our_team_myspace',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Reddit',
		'desc' => 'Example: http://reddit.com/user/johndoe',
		'id' => $prefix . 'our_team_reddit',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Skype',
		'desc' => 'Example: http://skype.com/johndoe',
		'id' => $prefix . 'our_team_skype',
		'type' => 'text',
		'std' => ''
	)
  )
);

// Portfolio Item Options
$meta_boxes[] = array(
  'id' => 'portfolio-page-options',
  'title' => 'Portfolio Page Options',
  'pages' => array('work'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Client',
		'desc' => '',
		'id' => $prefix . 'portfolio_client',
		'type' => 'text',
		'std' => ''
	),
    array(
        'name' => 'Client\'s Website URL',
        'desc' => '',
        'id' => $prefix . 'portfolio_client_url',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => 'Testimonials URL',
        'desc' => '',
        'id' => $prefix . 'portfolio_testimonials',
        'type' => 'text',
        'std' => ''
    ),
	array(
		'name' => 'CMS',
		'desc' => '',
		'id' => $prefix . 'portfolio_cms',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Featured Item',
		'desc' => '',
		'id' => $prefix . 'portfolio_featured_item',
		'type' => 'checkbox'
	),
	array(
		'name' => 'Slideshow Images',
		'desc' => '',
		'id' => $prefix . 'portfolio_slideshow_images',
		'type' => 'textarea',
		'std' => ''
	)
  )
);

$meta_boxes[] = array(
  'id' => 'portfolio-dots-slider-1-options',
  'title' => 'Dots Slider 1 Options',
  'pages' => array('work'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Preview Image',
		'desc' => '496px*262px',
		'id' => $prefix . 'dots_slider_image',
		'type' => 'image'
	),
	array(
		'name' => 'Title',
		'desc' => '',
		'id' => $prefix . 'dots_slider_info_title',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Subtitle',
		'desc' => '',
		'id' => $prefix . 'dots_slider_info_subtitle',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Description',
		'desc' => '',
		'id' => $prefix . 'dots_slider_info_desc',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'Buttons',
		'desc' => 'Example: [button style="brightOrange" size="big" url="http://google.com"]Google.com[/button]',
		'id' => $prefix . 'dots_slider_info_buttons',
		'type' => 'textarea',
		'std' => ''
	)
  )
);

$meta_boxes[] = array(
  'id' => 'portfolio-dots-slider-2-options',
  'title' => 'Dots Slider 2 Options',
  'pages' => array('work'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Preview Image',
		'desc' => '940px*340px',
		'id' => $prefix . 'dots_slider_2_image',
		'type' => 'image'
	)
  )
);

$meta_boxes[] = array(
  'id' => 'portfolio-roundabout-slider-options',
  'title' => 'Roundabout Slider Options',
  'pages' => array('work'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
	array(
		'name' => 'Preview Image',
		'desc' => '554px*364px',
		'id' => $prefix . 'roundabout_slider_image',
		'type' => 'image'
	),
	array(
		'name' => 'Description',
		'desc' => '',
		'id' => $prefix . 'roundabout_slider_desc',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => 'New Item',
		'id' => $prefix . 'roundabout_slider_new',
		'type' => 'checkbox'
	)
  )
);

/*********************************

You should not edit the code below

*********************************/

foreach ($meta_boxes as $meta_box) {
	$my_box = new My_meta_box($meta_box);
}

class My_meta_box {

	protected $_meta_box;

	// create meta box based on given data
	function __construct($meta_box) {
		if (!is_admin()) return;
	
		$this->_meta_box = $meta_box;

		// fix upload bug: http://www.hashbangcode.com/blog/add-enctype-wordpress-post-and-page-forms-471.html
		$current_page = substr(strrchr($_SERVER['PHP_SELF'], '/'), 1, -4);
		if ($current_page == 'page' || $current_page == 'page-new' || $current_page == 'post' || $current_page == 'post-new') {
			add_action('admin_head', array(&$this, 'add_post_enctype'));
		}
		
		add_action('admin_menu', array(&$this, 'add'));

		add_action('save_post', array(&$this, 'save'));
	}
	
	function add_post_enctype() {
		echo '
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#post").attr("enctype", "multipart/form-data");
			jQuery("#post").attr("encoding", "multipart/form-data");
		});
		</script>';
	}

	/// Add meta box for multiple post types
	function add() {
		foreach ($this->_meta_box['pages'] as $page) {
			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
		}
	}

	// Callback function to show fields in meta box
	function show() {
		global $post;

		// Use nonce for verification
		echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
		echo '<table class="form-table">';

		foreach ($this->_meta_box['fields'] as $field) {
			// get current post meta data
			$meta = get_post_meta($post->ID, $field['id'], true);
		
			echo '<tr>',
					'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
					'<td>';
			switch ($field['type']) {
				case 'text':
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? esc_attr($meta) : esc_attr($field['std']), '" size="30" style="width:97%" />',
						'<br />', $field['desc'];
					break;
				case 'textarea':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
						'<br />', $field['desc'];
					break;
				case 'select':
					echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					foreach ($field['options'] as $option) {
						echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
					}
					echo '</select>';
					break;
				case 'radio':
					foreach ($field['options'] as $option) {
						echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
					}
					break;
				case 'checkbox':
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
				case 'file':
					echo $meta ? "$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
						'<br />', $field['desc'];
					break;
				case 'image':
					echo $meta ? "<img src=\"$meta\" width=\"150\" height=\"150\" /><br />$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
						'<br />', $field['desc'];
					break;
			}
			echo 	'<td>',
				'</tr>';
		}
	
		echo '</table>';
	}

	// Save data from meta box
	function save($post_id) {
		// verify nonce
		if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		foreach ($this->_meta_box['fields'] as $field) {
			$name = $field['id'];
			
			$old = get_post_meta($post_id, $name, true);
			$new = $_POST[$field['id']];
			
			if ($field['type'] == 'file' || $field['type'] == 'image') {
				$file = wp_handle_upload($_FILES[$name], array('test_form' => false));
				$new = $file['url'];
			}
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $name, $new);
			} elseif ('' == $new && $old && $field['type'] != 'file' && $field['type'] != 'image') {
				delete_post_meta($post_id, $name, $old);
			}
		}
	}
}
?>
