<?php

/* Admin - Backend - Theme Options */

$themename = "Insidesign";
$shortname = "inde";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();

$yesno = array("Yes","No");

$dots_slider_effects = array("blindX", "blindY", " blindZ", "cover", "curtainX", "curtainY", "fade", "fadeZoom", "growX", "growY", "none", "scrollUp", "scrollDown", "scrollLeft", "scrollRight", "scrollHorz", "scrollVert", "shuffle", "slideX", "slideY", "toss", "turnUp", "turnDown", "turnLeft", "turnRight", "uncover", "wipe", "zoom");
$three_speeds = array("Slow", "Normal", "Fast");
$dots_slider_timeout = array("Disable Autoplay", "3 Seconds", "5 Seconds", "10 Seconds");

$roundabout_slider_easing = array("linear", "swing", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic" ,"easeOutCubic" ,"easeInOutCubic" ,"easeInQuart" ,"easeOutQuart" ,"easeInOutQuart" ,"easeInQuint" ,"easeOutQuint" ,"easeInOutQuint" ,"easeInSine" ,"easeOutSine" ,"easeInOutSine" ,"easeInExpo" ,"easeOutExpo" ,"easeInOutExpo" ,"easeInCirc" ,"easeOutCirc" ,"easeInOutCirc" ,"easeInElastic" ,"easeOutElastic" ,"easeInOutElastic" ,"easeInBack" ,"easeOutBack" ,"easeInOutBack" ,"easeInBounce" ,"easeOutBounce" ,"easeInOutBounce");

$piecemaker_tweens = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeOutInCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeOutInQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeOutInCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeOutInBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeOutInQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeOutInQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeOutInExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeOutInElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce", "easeOutInBounce");


foreach ($categories as $category_list ) {
	   $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 

$options = array (

	array( "name" => $themename." Options",
		"type" => "title"),

	array( "name" => "General",
    		"type" => "section",
			"title_icon_class" => "general"),
	array( "type" => "open"),

	array( "name" => "Custom Favicon",
    		"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
    		"id" => $shortname."_favicon",
    		"type" => "text",
    		"std" => get_bloginfo('url') ."/favicon.ico"),

	array( "name" => "Logo URL",
    		"desc" => "Enter the link to your logo image",
    		"id" => $shortname."_logo",
    		"type" => "text",
    		"std" => ""),

	array( "name" => "Show Tagline",
			"desc" => "Show or hide tagline",
			"id" => $shortname."_display_tagline",
			"std" => "Yes",
			"type" => "select",
			"options" => $yesno),

	array( "name" => "Navigation Advert",
    		"desc" => "This will be displayed in navigation bar. You can use HTML.",
    		"id" => $shortname."_nav_bar_ad",
    		"type" => "textarea",
    		"std" => ""),

	array( "type" => "close"),
	
	array( "name" => "Portfolio",
		    "type" => "section",
			"title_icon_class" => "portfolio"),
			
	array( "type" => "open"),

	array( "name" => "Number of works per page",
    		"desc" => "How many portfolio works you want to show per page (including featured works)",
    		"id" => $shortname."_portfolio_works_per_page",
    		"type" => "text",
    		"std" => ""),

	array( "name" => "Get a Quote URL",
    		"desc" => "If empty button won't be displayed",
    		"id" => $shortname."_qet_a_quote_url",
    		"type" => "text",
    		"std" => ""),

	array( "type" => "close"),
	
	array( "name" => "Dots Slider 1",
			"type" => "section",
			"title_icon_class" => "slider"),
	array( "type" => "open"),

	array( "name" => "Active",
			"desc" => "Enable or disable slider",
			"id" => $shortname."_dots_slider_1",
			"std" => "No",
			"type" => "select",
			"options" => $yesno),
			
	array( "name" => "Effects",
			"desc" => "Choose transition effect",
			"id" => $shortname."_dots_slider_1_effects",
			"std" => "fade",
			"type" => "select",
			"options" => $dots_slider_effects),
			
	array( "name" => "Speed",
			"desc" => "Speed of the transition",
			"id" => $shortname."_dots_slider_1_speed",
			"std" => "fade",
			"type" => "select",
			"options" => $three_speeds),
			
	array( "name" => "Custom Speed",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite speed setting above. Only numbers!",
			"id" => $shortname."_dots_slider_1_custom_speed",
			"std" => "",
			"type" => "text"),
			
	array( "name" => "Pause Time",
			"desc" => "Time between slide transitions",
			"id" => $shortname."_dots_slider_1_timeout",
			"std" => "fade",
			"type" => "select",
			"options" => $dots_slider_timeout),
			
	array( "name" => "Custom Pause Time",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite pause time setting above. Only numbers!",
			"id" => $shortname."_dots_slider_1_custom_timeout",
			"std" => "",
			"type" => "text"),
			
	array( "type" => "close"),
	
	array( "name" => "Dots Slider 2",
			"type" => "section",
			"title_icon_class" => "slider"),
	array( "type" => "open"),

	array( "name" => "Active",
			"desc" => "Enable or disable slider",
			"id" => $shortname."_dots_slider_2",
			"std" => "No",
			"type" => "select",
			"options" => $yesno),
			
	array( "name" => "Effects",
			"desc" => "Choose transition effect",
			"id" => $shortname."_dots_slider_2_effects",
			"std" => "fade",
			"type" => "select",
			"options" => $dots_slider_effects),
			
	array( "name" => "Speed",
			"desc" => "Speed of the transition",
			"id" => $shortname."_dots_slider_2_speed",
			"std" => "fade",
			"type" => "select",
			"options" => $three_speeds),
			
	array( "name" => "Custom Speed",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite speed setting above. Only numbers!!",
			"id" => $shortname."_dots_slider_2_custom_speed",
			"std" => "",
			"type" => "text"),
			
	array( "name" => "Pause Time",
			"desc" => "Time between slide transitions",
			"id" => $shortname."_dots_slider_2_timeout",
			"std" => "fade",
			"type" => "select",
			"options" => $dots_slider_timeout),
			
	array( "name" => "Custom Pause Time",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite pause time setting above. Only numbers!",
			"id" => $shortname."_dots_slider_2_custom_timeout",
			"std" => "",
			"type" => "text"),
			
	array( "type" => "close"),
	
	array( "name" => "Roundabout Slider",
			"type" => "section",
			"title_icon_class" => "roundabout"),
	array( "type" => "open"),

	array( "name" => "Active",
			"desc" => "Enable or disable slider",
			"id" => $shortname."_roundabout_slider",
			"std" => "No",
			"type" => "select",
			"options" => $yesno),
			
	array( "name" => "Easing",
			"desc" => "Choose transition effect",
			"id" => $shortname."_roundabout_slider_easing",
			"std" => "swing",
			"type" => "select",
			"options" => $roundabout_slider_easing),
			
	array( "name" => "Duration",
			"desc" => "The length of time that all animations take to complete",
			"id" => $shortname."_roundabout_slider_duration",
			"std" => "Normal",
			"type" => "select",
			"options" => $three_speeds),
			
	array( "name" => "Custom Duration",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite duration setting above. Only numbers!",
			"id" => $shortname."_roundabout_slider_custom_duration",
			"std" => "",
			"type" => "text"),

	array( "type" => "close"),
    
    array( "name" => "Piecemaker 3D Slider",
          "type" => "section",
			"title_icon_class" => "piecemaker"),
    array( "type" => "open"),

	array( "name" => "Active",
			"desc" => "Enable or disable slider",
			"id" => $shortname."_piecemaker",
			"std" => "No",
			"type" => "select",
			"options" => $yesno),
			
	array( "name" => "Images Folder Path",
			"desc" => "Beginning of website address. Usually http:// or https://",
			"id" => $shortname."_piecemaker_images_path",
			"std" => "http://",
			"type" => "text"),
            
    array( "name" => "Segments",
            "desc" => "Number of segments in which the image will be sliced.",
            "id" => $shortname."_piecemaker_segments",
            "type" => "text",
            "std" => "7"),
    
    array( "name" => "Tween Time",
            "desc" => "Number of seconds for each element to be turned.",
            "id" => $shortname."_piecemaker_tween_time",
            "type" => "text",
            "std" => "1"),
    
    array( "name" => "Tween Delay",
            "desc" => "Number of seconds from one element starting to turn to the next element starting.",
            "id" => $shortname."_piecemaker_tween_delay",
            "type" => "text",
            "std" => "0.1"),
    
    array( "name" => "Tween Type",
            "desc" => "Type of animation transition.",
            "id" => $shortname."_piecemaker_tween_type",
            "type" => "select",
            "options" => $piecemaker_tweens,
            "std" => "Choose a category"),
    
    array( "name" => "Z Distance",
            "desc" => "to which extend are the cubes moved on z axis when being tweened. Negative values bring the cube closer to the camera, positive values take it further away. A good range is roughly between -200 and 700.",
            "id" => $shortname."_piecemaker_z_distance",
            "type" => "text",
            "std" => "200"),
            
    array( "name" => "Expand",
            "desc" => "To which etxend are the cubes moved away from each other when tweening.",
            "id" => $shortname."_piecemaker_expand",
            "type" => "text",
            "std" => "20"),
            
    array( "name" => "Inner Color",
            "desc" => "Color of the sides of the elements in hex values (e.g. 0x000000 for black)",
            "id" => $shortname."_piecemaker_inner_color",
            "type" => "text",
            "std" => "0x111111"),
    
    array( "name" => "Text Background Color",
            "desc" => "Color of the description text background in hex values (e.g. 0xFF0000 for red)",
            "id" => $shortname."_piecemaker_text_background",
            "type" => "text",
            "std" => "0xE8ECF0"),
            
    array( "name" => "Text Distance",
            "desc" => "Distance of the info text to the borders of its background.",
            "id" => $shortname."_piecemaker_text_distance",
            "type" => "text",
            "std" => "25"),
    
    array( "name" => "Shadow Darkness",
            "desc" => "To which extend are the sides shadowed, when the elements are tweening and the sided move towards the background. 100 is black, 0 is no darkening.",
            "id" => $shortname."_piecemaker_shadow_darkness",
            "type" => "text",
            "std" => "100"),
            
    array( "name" => "Auto Play",
            "desc" => "Number of seconds to the next image when autoplay is on. Set 0, if you don't want autoplay.",
            "id" => $shortname."_piecemaker_autoplay",
            "type" => "text",
            "std" => "3"),
    
    array( "type" => "close"),
	
	array( "name" => "Tabs Slider",
			"type" => "section",
			"title_icon_class" => "tabsslider"),
	array( "type" => "open"),

	array( "name" => "Active",
			"desc" => "Enable or disable slider",
			"id" => $shortname."_tabs_slider",
			"std" => "No",
			"type" => "select",
			"options" => $yesno),
			
	array( "name" => "Effects",
			"desc" => "Choose transition effect",
			"id" => $shortname."_tabs_slider_effects",
			"std" => "fade",
			"type" => "select",
			"options" => $dots_slider_effects),
			
	array( "name" => "Tab Speed",
			"desc" => "Speed of the transition when user click tab",
			"id" => $shortname."_tabs_slider_tab_speed",
			"std" => "fade",
			"type" => "select",
			"options" => $three_speeds),
			
	array( "name" => "Custom Tab Speed",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite speed setting above. Only numbers!",
			"id" => $shortname."_tabs_slider_custom_tab_speed",
			"std" => "",
			"type" => "text"),
			
	array( "name" => "Slide Speed",
			"desc" => "Speed of the transition when autoplay",
			"id" => $shortname."_tabs_slider_slide_speed",
			"std" => "fade",
			"type" => "select",
			"options" => $three_speeds),
			
	array( "name" => "Custom Slide Speed",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite speed setting above. Only numbers!",
			"id" => $shortname."_tabs_slider_custom_slide_speed",
			"std" => "",
			"type" => "text"),
			
	array( "name" => "Pause Time",
			"desc" => "Time between slide transitions",
			"id" => $shortname."_tabs_slider_timeout",
			"std" => "fade",
			"type" => "select",
			"options" => $dots_slider_timeout),
			
	array( "name" => "Custom Pause Time",
			"desc" => "In milliseconds (1000ms = 1s). This is will overwrite pause time setting above. Only numbers!",
			"id" => $shortname."_tabs_slider_custom_timeout",
			"std" => "",
			"type" => "text"),
    
    array( "type" => "close"),

	array( "name" => "Info Columns",
		    "type" => "section",
			"title_icon_class" => "infocolumns"),
	array( "type" => "open"),

	array( "name" => "Display Info Columns",
			"desc" => "Enable or disable info columns",
			"id" => $shortname."_infocolumns_sections",
			"std" => "Yes",
			"type" => "select",
			"options" => $yesno),

	array( 	"name" => "How many sections",
			"desc" => "Number of sections you want to display",
			"id" => $shortname."_infocolumns_sections_count",
			"std" => "4",
			"type" => "select",
			"options" => array("1","2","3","4")),

	array( 	"name" => "Info Column #1 Icon URL",
			"desc" => "Required (48px*48px)",
			"id" => $shortname."_infocolumns_1_icon",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #1 Title",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_1_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #1 Description",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_1_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #1 Link Title",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_1_link_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #1 Link URL",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_1_link_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #2 Icon URL",
			"desc" => "Required (48px*48px)",
			"id" => $shortname."_infocolumns_2_icon",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #2 Title",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_2_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #2 Description",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_2_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #2 Link Title",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_2_link_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #2 Link URL",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_2_link_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #3 Icon URL",
			"desc" => "Required (48px*48px)",
			"id" => $shortname."_infocolumns_3_icon",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #3 Title",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_3_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #3 Description",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_3_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #3 Link Title",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_3_link_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #3 Link URL",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_3_link_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #4 Icon URL",
			"desc" => "Required (48px*48px)",
			"id" => $shortname."_infocolumns_4_icon",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #4 Title",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_4_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #4 Description",
			"desc" => "Required",
			"id" => $shortname."_infocolumns_4_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #4 Link Title",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_4_link_title",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Info Column #4 Link URL",
			"desc" => "Optional",
			"id" => $shortname."_infocolumns_4_link_url",
			"std" => "",
			"type" => "text"),

	array( "type" => "close"),

	array( "name" => "Content Bottom",
			"type" => "section",
			"title_icon_class" => "infocolumns"),
	array( "type" => "open"),

	array( "name" => "Display Content Bottom",
			"desc" => "Enable or disable content bottom",
			"id" => $shortname."_content_bottom",
			"std" => "Yes",
			"type" => "select",
			"options" => $yesno),

	array( 	"name" => "Support",
			"desc" => "You can use HTML",
			"id" => $shortname."_content_bottom_support",
			"std" => "",
			"type" => "textarea"),

	array( 	"name" => "Newsletter",
			"desc" => "You can use HTML",
			"id" => $shortname."_content_bottom_newsletter",
			"std" => "",
			"type" => "textarea"),

	array( 	"name" => "Form",
			"desc" => "You can use HTML",
			"id" => $shortname."_content_bottom_form",
			"std" => "",
			"type" => "textarea"),

	array( "type" => "close"),

	array( "name" => "Advertisements",
			"type" => "section",
			"title_icon_class" => "ads"),

	array( 	"name" => "Buy Ads Label",
			"desc" => "Enter here 'Buy Ads' text",
			"id" => $shortname."_buy_ads_text",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Buy Ads URL",
			"desc" => "Enter here the URL of 'Buy Ads' button",
			"id" => $shortname."_buy_ads_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #1 Link URL",
			"desc" => "Target URL",
			"id" => $shortname."_ad_1_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #1 Image URL",
			"desc" => "URL to ad image",
			"id" => $shortname."_ad_1_image",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #1 Image Alt",
			"desc" => "If image isn't available this text will be shown instead",
			"id" => $shortname."_ad_1_image_alt",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #2 Link URL",
			"desc" => "Target URL",
			"id" => $shortname."_ad_2_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #2 Image URL",
			"desc" => "URL to ad image",
			"id" => $shortname."_ad_2_image",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #2 Image Alt",
			"desc" => "If image isn't available this text will be shown instead",
			"id" => $shortname."_ad_2_image_alt",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #3 Link URL",
			"desc" => "Target URL",
			"id" => $shortname."_ad_3_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #3 Image URL",
			"desc" => "URL to ad image",
			"id" => $shortname."_ad_3_image",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #3 Image Alt",
			"desc" => "If image isn't available this text will be shown instead",
			"id" => $shortname."_ad_3_image_alt",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #4 Link URL",
			"desc" => "Target URL",
			"id" => $shortname."_ad_4_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #4 Image URL",
			"desc" => "URL to ad image",
			"id" => $shortname."_ad_4_image",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Advert #4 Image Alt",
			"desc" => "If image isn't available this text will be shown instead",
			"id" => $shortname."_ad_4_image_alt",
			"std" => "",
			"type" => "text"),

	array( "type" => "close"),

	array( "name" => "Social Links",
			"type" => "section",
			"title_icon_class" => "twitter"),
	array( "type" => "open"),

	array( 	"name" => "Facebook URL",
			"desc" => "Enter the URL to your Facebook profile",
			"id" => $shortname."_facebook_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Facebook Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_facebook_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Twitter URL",
			"desc" => "Enter the URL to your Twitter profile",
			"id" => $shortname."_twitter_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Twitter Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_twitter_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Flickr URL",
			"desc" => "Enter the URL to your Flickr profile",
			"id" => $shortname."_flickr_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Flickr Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_flickr_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Vimeo URL",
			"desc" => "Enter the URL to your Vimeo profile",
			"id" => $shortname."_vimeo_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Vimeo Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_vimeo_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "LinkedIn URL",
			"desc" => "Enter the URL to your LinkedIn profile",
			"id" => $shortname."_linkedin_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "LinkedIn Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_linkedin_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Tumblr URL",
			"desc" => "Enter the URL to your Tumblr profile",
			"id" => $shortname."_tumblr_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Tumblr Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_tumblr_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Delicious URL",
			"desc" => "Enter the URL to your Delicious profile",
			"id" => $shortname."_delicious_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Delicious Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_delicious_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Digg URL",
			"desc" => "Enter the URL to your Digg profile",
			"id" => $shortname."_digg_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Digg Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_digg_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Google URL",
			"desc" => "Enter the URL to your Google profile",
			"id" => $shortname."_google_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Google Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_google_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Lastfm URL",
			"desc" => "Enter the URL to your Lastfm profile",
			"id" => $shortname."_lastfm_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Lastfm Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_lastfm_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Myspace URL",
			"desc" => "Enter the URL to your Myspace profile",
			"id" => $shortname."_myspace_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Myspace Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_myspace_desc",
			"std" => "",
			"type" => "text"),
			
	array( 	"name" => "Reddit URL",
			"desc" => "Enter the URL to your Reddit profile",
			"id" => $shortname."_reddit_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Reddit Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_reddit_desc",
			"std" => "",
			"type" => "text"),
			
	array( 	"name" => "Skype URL",
			"desc" => "Enter the URL to your Skype profile",
			"id" => $shortname."_skype_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Skype Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_skype_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Email URL",
			"desc" => "Enter your email address",
			"id" => $shortname."_email_url",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "Email Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_email_desc",
			"std" => "",
			"type" => "text"),

	array( 	"name" => "RSS",
			"desc" => "Enable or disable RSS from social links",
			"id" => $shortname."_rss_url",
			"std" => "No",
			"type" => "select",
			"options" => $yesno),

	array( 	"name" => "RSS Description",
			"desc" => "Write few words long description",
			"id" => $shortname."_rss_desc",
			"std" => "",
			"type" => "text"),

	array( "type" => "close"),

	array( "name" => "Footer",
			"type" => "section",
			"title_icon_class" => "footer"),
	array( "type" => "open"),

	array( "name" => "Footer Left text",
			"desc" => "Enter text used in the left side of the footer. It can be HTML.",
			"id" => $shortname."_footer_left",
			"type" => "textarea",
			"std" => ""),

	array( "name" => "Footer Right text",
			"desc" => "Enter text used in the right side of the footer. It can be HTML.",
			"id" => $shortname."_footer_right",
			"type" => "textarea",
			"std" => ""),

	array( "type" => "close")

);


function insidesign_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

	if ( 'save' == $_REQUEST['action'] ) {

		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: admin.php?page=functions.admin.php&saved=true");
die;

} 
else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=functions.admin.php&reset=true");
die;

}
}

add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'insidesign_admin');
}

function insidesign_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/assets/style.css", false, "1.0", "all");
wp_enqueue_script("inde_script", $file_dir."/functions/assets/inde_script.js", false, "1.0");

}
function insidesign_admin() {

global $themename, $shortname, $options;
$i=0;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap inde_wrap">
<h2><?php echo $themename; ?> Settings</h2>

<div class="inde_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>

<?php break;

case "close":
?>

</div>
</div>


<?php break;

case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>


<?php break;

case 'text':
?>

<div class="inde_input inde_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>
<?php
break;

case 'textarea':
?>

<div class="inde_input inde_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>

<?php
break;

case 'select':
?>

<div class="inde_input inde_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;

case "checkbox":
?>

<div class="inde_input inde_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="inde_section">
<div class="inde_title inactive"><h3 class="inactive <?php echo $value['title_icon_class']; ?>"><img src="<?php bloginfo('template_directory')?>/functions/assets/trans.png" alt=""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" class="button"/>
</span><div class="clearfix"></div></div>
<div class="inde_options">


<?php break;

}
}
?>

<input type="hidden" name="action" value="save" />
</form>
<form method="post" class="hidden">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<div style="font-size:9px; margin-bottom:10px;">Icons: <a href="http://www.fatcow.com/free-icons/">FatCow</a></div>
 </div> 


<?php
}
?>
<?php
add_action('admin_init', 'insidesign_add_init');
add_action('admin_menu', 'insidesign_add_admin');