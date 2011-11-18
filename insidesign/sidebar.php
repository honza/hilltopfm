<div class="sidebar">

    <?php global $themename, $shortname; $root_page_id = ( empty( $post->ancestors ) ) ? $post->ID : end( $post->ancestors ); ?>
        
    <?php
        if ( is_page() ) :
        if($post->post_parent)
        $children = wp_list_pages('sort_column=menu_order&title_li=&child_of='.$post->post_parent.'&echo=0');
        else
        $children = wp_list_pages('sort_column=menu_order&title_li=&child_of='.$post->ID.'&echo=0');
        if ($children) :
    ?>
        <ul class="subpages">
            
            <?php if($post->post_parent) : $parent_link = get_permalink($post->post_parent); ?>
                <li class="page_item page-item-<?php echo $root_page_id; ?>">
                    <a href="<?php echo $parent_link; ?>" title="<?php echo get_the_title($post->post_parent); ?>">
                        <?php if(get_post_meta($root_page_id,'inde_sidebar_parent_headline',true)) : echo get_post_meta($root_page_id,'inde_sidebar_parent_headline',true); else: echo get_the_title($post->post_parent); endif; ?>
                    </a>
                </li>
            <?php else : ?>
                <li class="page_item page-item-<?php echo $root_page_id; ?> current_page_item">
                    <a href="<?php echo $parent_link; ?>" title="<?php echo get_the_title($post->post_parent); ?>">
                        <?php if(get_post_meta($root_page_id,'inde_sidebar_parent_headline',true)) : echo get_post_meta($root_page_id,'inde_sidebar_parent_headline',true); else: echo get_the_title($post->post_parent); endif; ?>
                    </a>
                </li>
            <?php endif; ?>
            
            <?php echo $children; ?>
            
        </ul>
        
    <?php endif; endif; ?>
    
    <?php if (is_singular('work')): ?>
        
        <div id="portfolioInfo" class="clearfix">
                
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               
               <h4><?php the_title(); ?></h4>
               
               <?php
                                            
                $portfolio_portfolio_categories = get_the_term_list($post->ID, 'portfolio-categories', '', ' <li><span class="separator">-</span></li> ', '' );
                $portfolio_portfolio_categories_final = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_portfolio_categories);
                
                $portfolio_web_techniques = get_the_term_list($post->ID, 'web-techniques', ' <li><span class="separator">|</span></li> ', ' <li><span class="separator">-</span></li> ', '' );
                $portfolio_web_techniques_final = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_web_techniques);
                                            
                ?>
            
            
        		<ul class="taxonomies">
        			<?php echo $portfolio_portfolio_categories_final; ?>
        		</ul>
        
        		<ul class="taxonomies">
        			<?php echo $portfolio_web_techniques_final; ?>
        		</ul>
        		
        		<hr />	
            		
        		<dl>
        			<?php if(get_custom_field('inde_portfolio_client')) : ?>
        			<dt><?php _e('Client:', 'insidesign'); ?>&nbsp;</dt>
        				<dd><?php echo get_custom_field('inde_portfolio_client'); ?></dd>
        			<?php endif; ?>
        			<?php if(get_custom_field('inde_portfolio_cms')) : ?>
        			<dt><?php _e('CMS:', 'insidesign'); ?>&nbsp;</dt>
        				<dd><?php echo get_custom_field('inde_portfolio_cms'); ?></dd>
        			<?php endif; ?>
        			<dt><?php _e('Date:', 'insidesign'); ?>&nbsp;</dt>
        				<dd><?php echo get_the_date('F j - Y'); ?></dd>
        		</dl>
    
    			<?php if(get_custom_field('inde_portfolio_client_url')): ?>
    
    				<a class="button blue" href="<?php echo get_custom_field('inde_portfolio_client_url'); ?>"><span><?php _e('View Live', 'insidesign'); ?></span></a>
    
    			<?php endif; ?>    
    			
    			<?php if(get_option($shortname.'_qet_a_quote_url')): ?>
    
    	    		<a class="button blue" href="<?php echo get_option($shortname.'_qet_a_quote_url'); ?>"><span><?php _e('Get Quote', 'insidesign'); ?></span></a>
    	    		
    			<?php endif; ?>    
                  
           <?php endwhile; endif; ?> 
            
        </div><!-- end #portfolioInfo -->

    <?php endif; ?>
    
    <?php if (is_singular('work')): ?>
                
    	<?php if ( is_active_sidebar( 'portfolio-widget-area' ) ) : ?>

			<?php dynamic_sidebar( 'portfolio-widget-area' ); ?>
    	
    	<?php endif; // end portfolio widget area ?>
                    
    <?php endif; ?>
    
    <?php if ( ( !is_singular('work') && get_post_type() != 'work' && get_post_type() != 'our_team' ) && ( is_home() || is_archive() || is_single() ) ) : ?>
    
    	<?php if ( ! dynamic_sidebar( 'blog-widget-area' ) ) : ?>
    		
    			<h6 class="title"><span><?php _e( 'Archives', 'insidesign' ); ?></span></h6>
    			<ul>
    				<?php wp_get_archives( 'type=monthly' ); ?>
    			</ul>
    
    			<h6 class="title"><span><?php _e( 'Meta', 'insidesign' ); ?></span></h6>
    			<ul>
    				<?php wp_register(); ?>
    				<li><?php wp_loginout(); ?></li>
    				<?php wp_meta(); ?>
    			</ul>
    
    	<?php endif; // end blog widget area ?>       
    
    <?php endif; ?>
    	
	<?php if ( is_active_sidebar( 'general-widget-area' ) ) : ?>

			<?php dynamic_sidebar( 'general-widget-area' ); ?>
	
	<?php endif; // end general widget area ?>   

</div><!-- end .sidebar-->

<?php if (!is_page_template('page-left-sidebar.php')): ?>
	<div class="clear"></div>
<?php endif; ?>