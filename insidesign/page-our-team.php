<?php
/*
Template Name: Our Team
*/
?>

<?php get_header(); ?>

<div id="subpage">
	
	<div class="top">

		<div class="corner">
		    
		    <?php if(get_custom_field('inde_corner_icon')): ?>
		
			    <span class="<?php echo get_custom_field('inde_corner_icon'); ?>"></span>
			    
			<?php endif; ?>
			
		</div>

		<h4><?php if(get_custom_field('inde_sidebar_parent_headline')) : echo get_custom_field('inde_sidebar_parent_headline'); else : the_title(); endif; ?></h4>
		
	    <?php if(get_custom_field('inde_page_subtitle')): ?>
	        
	    	<p class="subtitle"><?php echo get_custom_field('inde_page_subtitle'); ?></p>
		    
		<?php endif; ?>

	</div><!-- end .top -->
	
	<div class="main">

		<div class="content">
            
            <?php the_content(); ?>
    	
			<?php                 
                $i = 0;
               
                $loop = new WP_Query( array('post_type' => 'our_team', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 100));
                while ( $loop->have_posts() ) : $loop->the_post();
                
                // Custom fields
                $member_name = get_custom_field('inde_our_team_name');
                $member_job_title = get_custom_field('inde_our_team_job_title');
                $member_vcard = get_custom_field('inde_our_team_vcard');
                $member_website = get_custom_field('inde_our_team_website');
                $member_email = get_custom_field('inde_our_team_email');
                $member_facebook = get_custom_field('inde_our_team_facebook');
                $member_twitter = get_custom_field('inde_our_team_twitter');
                $member_flickr = get_custom_field('inde_our_team_flickr');
                $member_tumblr = get_custom_field('inde_our_team_tumblr');
                $member_vimeo = get_custom_field('inde_our_team_vimeo');
                $member_linkedin = get_custom_field('inde_our_team_linkedin');
                $member_delicious = get_custom_field('inde_our_team_delicious');
                $member_digg = get_custom_field('inde_our_team_digg');
                $member_google = get_custom_field('inde_our_team_google');
                $member_lastfm = get_custom_field('inde_our_team_lastfm');
                $member_myspace = get_custom_field('inde_our_team_myspace');
                $member_reddit = get_custom_field('inde_our_team_reddit');
                $member_skype = get_custom_field('inde_our_team_skype');
                
                // Avatar
                $portfolio_image_thumb = get_the_post_thumbnail($post->ID, 'our-team-member');
                
            ?>
            
                <?php $i++; ?>
            
                <div class="teamMember <?php echo ($i % 2 == 0) ? 'odd' : 'even'; ?>">
            	
					<div class="picture">
    				    <?php if($portfolio_image_thumb) : ?>
        					<?php echo $portfolio_image_thumb; ?>
    					<?php endif; ?>
					</div>			

					<h4><?php echo $member_name; ?></h4>
					<p class="subtitle"><?php echo $member_job_title; ?></p>

					<div class="socialMediaLinks">
					    
					    <?php if($member_facebook): ?>
						    <a href="<?php echo $member_facebook; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/facebook.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_twitter): ?>
					    	<a href="<?php echo $member_twitter; ?>"><img alt="<?php _e('twitter', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/twitter.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_flickr): ?>
						    <a href="<?php echo $member_flickr; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/flickr.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_tumblr): ?>
						    <a href="<?php echo $member_tumblr; ?>"><img alt="<?php _e('tumblr', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/tumblr.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_vimeo): ?>
						    <a href="<?php echo $member_vimeo; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/vimeo.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_linkedin): ?>
						    <a href="<?php echo $member_linkedin; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/linkedin.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_delicious): ?>
						    <a href="<?php echo $member_delicious; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/delicious.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_digg): ?>
						    <a href="<?php echo $member_digg; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/digg.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_google): ?>
						    <a href="<?php echo $member_google; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/google.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_lastfm): ?>
						    <a href="<?php echo $member_lastfm; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/lastfm.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_myspace): ?>
						    <a href="<?php echo $member_myspace; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/myspace.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_reddit): ?>
						    <a href="<?php echo $member_reddit; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/reddit.png"></a>
					    <?php endif; ?>
					    
					    <?php if($member_skype): ?>
						    <a href="<?php echo $member_skype; ?>"><img alt="<?php _e('facebook', 'insidesign'); ?>" src="<?php bloginfo('template_url'); ?>/images/icons/social-icons/16px/skype.png"></a>
					    <?php endif; ?>
					</div>
					
					<div class="personalLinks">
					    
					    <?php if($member_vcard) : ?>
    						<a class="button blue small" href="<?php echo $member_vcard; ?>">
    							<span class="icon">
    								<?php _e('vcard', 'insidesign'); ?> <em class="vcard">&nbsp;</em>
    							</span>
    						</a>    						
						<?php endif; ?>
					    
					    <?php if($member_website) : ?>						
    						<a class="button blue small" href="<?php echo $member_website; ?>">
    							<span class="icon">
    								<?php _e('website', 'insidesign'); ?> <em class="website">&nbsp;</em>
    							</span>
    						</a>					    
						<?php endif; ?>
						
					    <?php if($member_email) : ?>						
    						<a class="button blue small" href="mailto:<?php echo $member_email; ?>">
    							<span class="icon">
    								<?php _e('contact', 'insidesign'); ?> <em class="email">&nbsp;</em>
    							</span>
    						</a>    						
						<?php endif; ?>
						
					</div><!-- end .personalLinks -->
                     
                </div><!-- end .teamMember -->
                
                <?php echo ($i % 2 == 0) ? '<div class="clear"></div>' : ''; ?>
                
                <?php endwhile; ?>
                            
            <?php wp_reset_query(); ?>

		</div><!-- end .content -->
		
		<?php get_sidebar(); ?>

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>