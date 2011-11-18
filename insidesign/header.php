<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php

    include_once('js-settings.php');

    global $themename, $shortname;

    wp_title( '|', true, 'right' );

    ?></title>

<!--[if ! lte IE 6]><!-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<!--<![endif]-->

<!--[if gt IE 6]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" type="text/css" media="screen" />
<![endif]-->

<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" type="text/css" media="screen" />
<![endif]-->

<!--[if lte IE 6]>
<link rel="stylesheet" href="http://universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
<![endif]-->

<link rel="shortcut icon" href="<?php echo get_option($shortname.'_favicon'); ?>"> 

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script("jquery");
    wp_head();
?>

</head>

<body <?php body_class(); ?>>

<div id="header">

	<div class="container">

		<h1>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php echo get_option($shortname.'_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
		</h1>
		
        <?php if(get_option($shortname."_display_tagline") == 'Yes') : ?>
        
        	<span class="tagline"><?php bloginfo( 'description' ); ?></span>
        	
        <?php endif; ?>
				
		<div id="search">

			<?php get_search_form(); ?>

		</div><!-- end #search -->
	
	</div><!-- end .container -->

</div><!-- end #header -->

<div id="navigation">

	<div class="container">
	
		<?php
	         $defaults = array(
    		    'container_class' => 'menu', 
    		    'theme_location' => 'primary', 
    		    'menu_class' => 'nav', 
    		    'walker' => new description_walker()
		    );
            
            global $post, $wp_query;

            if (get_query_var('post_type') == 'work') {
            // Load up the 'Portfolio' page to fool WP.
            $page = get_page_by_title('Portfolio');
            
            $temp_post = $post; $temp_query = $wp_query; $wp_query = null;
            
            $wp_query = new WP_Query();
            $wp_query->query(array('page_id' => $page->ID));
            wp_nav_menu($defaults);
            
            // Restore previous wp_query.
            $wp_query = null; $wp_query = $temp_query; $post = $temp_post;
            } else if (get_query_var('taxonomy') == 'portfolio-categories') {
            // Load up the 'Portfolio' page to fool WP.
            $page = get_page_by_title('Portfolio');
            
            $temp_post = $post; $temp_query = $wp_query; $wp_query = null;
            
            $wp_query = new WP_Query();
            $wp_query->query(array('page_id' => $page->ID));
            wp_nav_menu($defaults);
            
            // Restore previous wp_query.
            $wp_query = null; $wp_query = $temp_query; $post = $temp_post;
            } else {
            // A normal page.
            wp_nav_menu($defaults);
        }
        ?>
        
        <?php echo stripslashes(get_option($shortname.'_nav_bar_ad')); ?>
        
	</div><!-- end .container -->

</div><!-- end #navigation -->

<div id="content">

	<div class="container">