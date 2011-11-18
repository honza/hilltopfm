<?php

function insidesign_widgets_init() {
	register_sidebar( array(
		'name' => __( 'General Sidebar Widget Area', 'insidesign' ),
		'id' => 'general-widget-area',
		'description' => __( 'The general sidebar widget area', 'insidesign' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title"><span>',
		'after_title' => '</span></h6>',
	) );

	register_sidebar( array(
		'name' => __( 'Blog Sidebar Widget Area', 'insidesign' ),
		'id' => 'blog-widget-area',
		'description' => __( 'The blog sidebar widget area', 'insidesign' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title"><span>',
		'after_title' => '</span></h6>',
	) );

	register_sidebar( array(
		'name' => __( 'Portfolio Sidebar Widget Area', 'insidesign' ),
		'id' => 'portfolio-widget-area',
		'description' => __( 'The portfolio sidebar widget area', 'insidesign' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title"><span>',
		'after_title' => '</span></h6>',
	) );

	register_sidebar( array(
		'name' => __( 'Left Footer Widget Area', 'insidesign' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The left footer widget area', 'insidesign' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Center Footer Widget Area', 'insidesign' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The center footer widget area', 'insidesign' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Right Footer Widget Area', 'insidesign' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The right footer widget area', 'insidesign' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s last">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}

add_action( 'widgets_init', 'insidesign_widgets_init' );

/* Widgets */

class Insidesign_Recent_Blog_Post extends WP_Widget {
	function Insidesign_Recent_Blog_Post() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Insidesign Recent Blog Posts');
	}

	function form($instance) {
		// outputs the options form on admin
		$title = esc_attr($instance['title']);
		$subtitle = esc_attr($instance['subtitle']);
		$postCount = esc_attr($instance['postCount']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'insidesign'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle:', 'insidesign'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" /></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('postCount'); ?>"><?php _e('Number of Posts:', 'insidesign'); ?>
			<input size="2" id="<?php echo $this->get_field_id('postCount'); ?>" name="<?php echo $this->get_field_name('postCount'); ?>" type="text" value="<?php echo $postCount; ?>" /></label>
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		$instance['postCount'] = strip_tags($new_instance['postCount']);
		return $instance;
	}

	function widget($args, $instance) {
		// outputs the content of the widget
		extract($args);
		$title = esc_attr($instance['title']);
		$subtitle = esc_attr($instance['subtitle']);
		$postCount = esc_attr($instance['postCount']);
		?>
		<?php echo $before_widget; ?>

		<?php if($title) : echo $before_title . $title . $after_title; endif; ?>
		<?php if($subtitle) : echo '<p class="subtitle">' . $subtitle . '</p>'; endif; ?>

		<?php if(have_posts()) :

			$recentPosts = new WP_Query();
			$recentPosts->query('showposts=' . $postCount); ?>
			
			<?php $i = 1; ?>

			<ul class="latestPosts">

				<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

					<?php if($postCount == $i) : ?>
						<li class="last">
					<?php else: ?>
						<li>
					<?php endif; ?>
					<h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
					<p><?php echo excerpt('30'); ?></p>
					<p class="meta">by <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a> on <a href="<?php the_permalink(); ?>"><?php the_time('d.m.Y'); ?></a></p>
				</li>
				
				<?php $i++; ?>

				<?php endwhile; ?>

			</ul>
			
        	<a class="button" href="<?php echo bloginfo('url'); ?>/blog/"><?php _e('Read More', 'insidesign') ?></a>
		
		<?php wp_reset_query(); ?>

		<?php endif; ?>

		<?php echo $after_widget; ?>
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("Insidesign_Recent_Blog_Post");'));


class Insidesign_Social_Links extends WP_Widget {
	function Insidesign_Social_Links() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Insidesign Social Links');
	}

	function form($instance) {
		// outputs the options form on admin
		$title = esc_attr($instance['title']);
		$subtitle = esc_attr($instance['subtitle']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'insidesign'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle:', 'insidesign'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" /></label>
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		return $instance;
	}

	function widget($args, $instance) {
		// outputs the content of the widget
		global $themename, $shortname;

		extract($args);
		$title = esc_attr($instance['title']);
		$subtitle = esc_attr($instance['subtitle']);
		?>
		<?php echo $before_widget; ?>

		<?php if($title) : echo $before_title . $title . $after_title; endif; ?>
		<?php if($subtitle) : echo '<p class="subtitle">' . $subtitle . '</p>'; endif; ?>

			<ul class="socialLinks">

				<?php if(get_option($shortname.'_facebook_url')) : ?>
					<li class="facebook">
						<a href="<?php echo get_option($shortname . '_facebook_url'); ?>" title="<?php echo get_option($shortname.'_facebook_desc'); ?>"><?php echo get_option($shortname.'_facebook_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_twitter_url')) : ?>
					<li class="twitter">
						<a href="<?php echo get_option($shortname . '_twitter_url'); ?>" title="<?php echo get_option($shortname.'_twitter_desc'); ?>"><?php echo get_option($shortname.'_twitter_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_flickr_url')) : ?>
					<li class="flickr">
						<a href="<?php echo get_option($shortname . '_flickr_url'); ?>" title="<?php echo get_option($shortname.'_flickr_desc'); ?>"><?php echo get_option($shortname.'_flickr_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_vimeo_url')) : ?>
					<li class="vimeo">
						<a href="<?php echo get_option($shortname . '_vimeo_url'); ?>" title="<?php echo get_option($shortname.'_vimeo_desc'); ?>"><?php echo get_option($shortname.'_vimeo_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_linkedin_url')) : ?>
					<li class="linkedin">
						<a href="<?php echo get_option($shortname . '_linkedin_url'); ?>" title="<?php echo get_option($shortname.'_linkedin_desc'); ?>"><?php echo get_option($shortname.'_linkedin_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_tumblr_url')) : ?>
					<li class="tumblr">
						<a href="<?php echo get_option($shortname . '_tumblr_url'); ?>" title="<?php echo get_option($shortname.'_tumblr_desc'); ?>"><?php echo get_option($shortname.'_tumblr_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_delicious_url')) : ?>
					<li class="delicious">
						<a href="<?php echo get_option($shortname . '_delicious_url'); ?>" title="<?php echo get_option($shortname.'_delicious_desc'); ?>"><?php echo get_option($shortname.'_delicious_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_digg_url')) : ?>
					<li class="digg">
						<a href="<?php echo get_option($shortname . '_digg_url'); ?>" title="<?php echo get_option($shortname.'_digg_desc'); ?>"><?php echo get_option($shortname.'_digg_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_google_url')) : ?>
					<li class="google">
						<a href="<?php echo get_option($shortname . '_google_url'); ?>" title="<?php echo get_option($shortname.'_google_desc'); ?>"><?php echo get_option($shortname.'_google_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_lastfm_url')) : ?>
					<li class="lastfm">
						<a href="<?php echo get_option($shortname . '_lastfm_url'); ?>" title="<?php echo get_option($shortname.'_lastfm_desc'); ?>"><?php echo get_option($shortname.'_lastfm_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_myspace_url')) : ?>
					<li class="myspace">
						<a href="<?php echo get_option($shortname . '_myspace_url'); ?>" title="<?php echo get_option($shortname.'_myspace_desc'); ?>"><?php echo get_option($shortname.'_myspace_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_reddit_url')) : ?>
					<li class="reddit">
						<a href="<?php echo get_option($shortname . '_reddit_url'); ?>" title="<?php echo get_option($shortname.'_reddit_desc'); ?>"><?php echo get_option($shortname.'_reddit_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_skype_url')) : ?>
					<li class="skype">
						<a href="<?php echo get_option($shortname . '_skype_url'); ?>" title="<?php echo get_option($shortname.'_skype_desc'); ?>"><?php echo get_option($shortname.'_skype_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_email_url')) : ?>
					<li class="email">
						<a href="mailto:<?php echo get_option($shortname . '_email_url'); ?>" title="<?php echo get_option($shortname.'_email_desc'); ?>"><?php echo get_option($shortname.'_email_desc'); ?></a>
					</li>
				<?php endif; ?>

				<?php if(get_option($shortname.'_rss_url') == 'Yes') : ?>
					<li class="rss">
						<a href="<?php bloginfo('rss2_url'); ?>" title="<?php echo get_option($shortname.'_rss_desc'); ?>"><?php echo get_option($shortname.'_rss_desc'); ?></a>
					</li>
				<?php endif; ?>

			</ul>

		<?php echo $after_widget; ?>
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("Insidesign_Social_Links");'));


class Insidesign_Ads extends WP_Widget {
	function Insidesign_Ads() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Insidesign Ads');
	}

	function form($instance) {
		// outputs the options form on admin
		$title = esc_attr($instance['title']);
		$subtitle = esc_attr($instance['subtitle']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'insidesign'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle:', 'insidesign'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" /></label>
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		return $instance;
	}

	function widget($args, $instance) {
		// outputs the content of the widget
		global $themename, $shortname;

		extract($args);
		$title = esc_attr($instance['title']);
		$subtitle = esc_attr($instance['subtitle']);
		?>
		<?php echo $before_widget; ?>

		<?php if($title) : echo $before_title . $title . $after_title; endif; ?>
		<?php if($subtitle) : echo '<p class="subtitle">' . $subtitle . '</p>'; endif; ?>

		<ul class="ads">

			<?php if(get_option($shortname.'_ad_1_url') && get_option($shortname.'_ad_1_image')) : ?>

				<li>
					<a href="<?php echo get_option($shortname . '_ad_1_url'); ?>"><img alt="<?php echo get_option($shortname.'_ad_1_image_alt'); ?>" src="<?php echo get_option($shortname.'_ad_1_image'); ?>" height="125" width="125"></a>
				</li>

			<?php endif; ?>

			<?php if(get_option($shortname.'_ad_2_url') && get_option($shortname.'_ad_2_image')) : ?>

				<li class="even">
					<a href="<?php echo get_option($shortname . '_ad_2_url'); ?>"><img alt="<?php echo get_option($shortname.'_ad_2_image_alt'); ?>" src="<?php echo get_option($shortname.'_ad_2_image'); ?>" height="125" width="125"></a>
				</li>

			<?php endif; ?>

			<?php if(get_option($shortname.'_ad_3_url') && get_option($shortname.'_ad_3_image')) : ?>

				<li>
					<a href="<?php echo get_option($shortname . '_ad_3_url'); ?>"><img alt="<?php echo get_option($shortname.'_ad_3_image_alt'); ?>" src="<?php echo get_option($shortname.'_ad_3_image'); ?>" height="125" width="125"></a>
				</li>

			<?php endif; ?>

			<?php if(get_option($shortname.'_ad_4_url') && get_option($shortname.'_ad_4_image')) : ?>

				<li class="even">
					<a href="<?php echo get_option($shortname . '_ad_4_url'); ?>"><img alt="<?php echo get_option($shortname.'_ad_4_image_alt'); ?>" src="<?php echo get_option($shortname.'_ad_4_image'); ?>" height="125" width="125"></a>
				</li>

			<?php endif; ?>

		</ul>
		
		<?php if(get_option($shortname.'_buy_ads_text') && get_option($shortname.'_buy_ads_url')) : ?>
	
        	<a class="button" href="<?php echo get_option($shortname.'_buy_ads_url'); ?>"><?php echo get_option($shortname.'_buy_ads_text'); ?></a>

		<?php endif; ?>

		<?php echo $after_widget; ?>
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("Insidesign_Ads");'));