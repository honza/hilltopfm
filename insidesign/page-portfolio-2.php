<?php
/*
Template Name: Portfolio 2 (with sidebar)
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
		    
		    <div id="portfolio">
    	
        			<?php
                        
                        $query = array();
                    	global $wp_query;
                    	wp_reset_query();
                    
                    	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    
                    	$defaults = array(
                    		'paged'				=> $paged,
                	    	'posts_per_page'	=> get_option($shortname.'_portfolio_works_per_page'),
                    		'post_type'         => 'work',
                    		'orderby'           => 'date',
                    		'order'             => 'DSC',
							'post_status'		=> 'publish'
                    	);
                    	$query += $defaults;
                    
                    	$wp_query = new WP_Query($query);
                    	
                    	$i = 1;
                    	
                    	$first = 0;
                    	
                        // Start the loop for our portfolio items
                        while (have_posts()) : the_post();
                        
                        // Set the post to global so we can grab information on the page containing this code
                        global $post;
                        
                        // Grab and store our variables
                        $portfolio_title = $post->post_title;
                        
                        // This will turn tags into a list and strip out the links
                        $portfolio_portfolio_categories = get_the_term_list($post->ID, 'portfolio-categories', '', ' <li><span class="separator">-</span></li> ', '' );
                        $portfolio_portfolio_categories_final = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_portfolio_categories);
                        
                        // This will turn tags into a list and strip out the links
                        $portfolio_web_techniques = get_the_term_list($post->ID, 'web-techniques', ' <li><span class="separator">|</span></li> ', ' <li><span class="separator">-</span></li> ', '' );
                        $portfolio_web_techniques_final = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_web_techniques);
                        
                        // Custom fields
                        $portfolio_featured_item =  get_custom_field('inde_portfolio_featured_item');
                        
                        // Grab the featured images and strip out the title
                        $portfolio_image_thumb = get_the_post_thumbnail($post->ID, 'portfolio-2');
                        $portfolio_image_thumb_featured = get_the_post_thumbnail($post->ID, 'portfolio-2-featured'); ?>
                        
                        <?php $first++; ?>
                        
                        <?php if($portfolio_featured_item == 'on'): ?>
                            
                            <div class="entry featured<?php if($first == 1) : echo ' first'; endif; ?>">
                            
                            	<div class="image">
                            
                            		<div class="zoom">
                            
                            			<a class="single_image" href="<?php echo get_featured_image_large(); ?>">
                            			    <?php if($portfolio_featured_item == 'on'):?>
                            				    <?php echo $portfolio_image_thumb_featured; ?>
                            				<?php else: ?>
                            				    <?php echo $portfolio_image_thumb; ?>
                                    		<?php endif; ?>
                            			</a>
                            
                            		</div><!-- end .zoom -->
                    	    	
                     	   	        <div class="clear"></div>
                                 
                            	</div><!-- end .image -->
                            		
                        		<div class="desc">
                            
                            		<h4><a href="<?php echo basename(get_permalink()); ?>"><?php echo $portfolio_title; ?></a></h4>
                            
                            		<ul class="taxonomies">
                            			<?php echo $portfolio_portfolio_categories_final; ?>
                            		</ul>
                            
                            		<ul class="taxonomies">
                            			<?php echo $portfolio_web_techniques_final; ?>
                            		</ul>
                            		
                        		</div><!-- end .desc -->
                        		
                        		<div class="buttons">
                        		    
                        			<?php if(get_custom_field('inde_portfolio_client_url')): ?>
                        
                        				<a class="button blue" href="<?php echo get_custom_field('inde_portfolio_client_url'); ?>"><span><?php _e('View Live', 'insidesign'); ?></span></a>
                        
                        			<?php endif; ?>
                        
                        			<?php if(get_custom_field('inde_portfolio_testimonials')): ?>
                        
                        				<a class="button blue" href="<?php echo get_custom_field('inde_portfolio_testimonials'); ?>"><span><?php _e('Testimonials', 'insidesign'); ?></span></a>
                        
                        			<?php endif; ?>
                        
                        			<a class="button blue" href="<?php echo basename(get_permalink()); ?>"><span><?php _e('Read More', 'insidesign'); ?></span></a>
                            		    
                        		</div><!-- end .buttons -->
                        		
                        		<div class="clear"></div>
                            
                        		<hr />
                            
                            	<div class="info">
                            
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
                            
                            	</div><!-- end .info -->
                            
                            </div><!-- end .entry -->
                        		
                    		<div class="clear"></div>
                            
                            <hr />
                        
                        <?php else: ?>
                        
                        <?php $i++; ?>
                                
                            <div class="entry small <?php echo ($i % 2 == 0) ? 'odd' : 'even'; ?>">
                            
                            	<div class="image">
                            
                            		<div class="zoom">
                            
                            			<a class="single_image" href="<?php echo get_featured_image_large(); ?>">
                        				    <?php echo $portfolio_image_thumb; ?>
                            			</a>
                            
                            		</div><!-- end .zoom -->
                    	    	
                     	   	        <div class="clear"></div>
                            
                            	</div><!-- end .image -->
                            
                            	<div class="info">
                            
                            		<h4><a href="<?php echo basename(get_permalink()); ?>"><?php echo $portfolio_title; ?></a></h4>
                            
                            		<ul class="taxonomies">
                            			<?php echo $portfolio_portfolio_categories_final; ?>
                            		</ul>
                            
                            		<ul class="taxonomies">
                            			<?php echo $portfolio_web_techniques_final; ?>
                            		</ul>
                            
                            		<hr>
                            		
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
                        
                        			<a class="button blue" href="<?php echo basename(get_permalink()); ?>"><span<?php _e('Read More', 'insidesign'); ?></span></a>
                            
                            	</div><!-- end .info -->
                            
                            </div><!-- end .entry -->
                            
                        <?php echo ($i % 2 == 0) ? '' : '<div class="clear"></div> <hr />'; ?>
                        
                        <?php endif; ?>
                        
                        <?php endwhile; ?>
                        
                        <div id="pagination">
                        
                        <div class="left">
                        
                        	<?php next_posts_link( __( '<span class="previous">»</span> <span class="previousText">Older Works</span>', 'insidesign' ) ); ?>
                        
                        </div>
                        
                        <div class="right">
                        
                        	<?php previous_posts_link( __( '<span class="next">»</span> <span class="nextText">Newer Works</span>', 'insidesign' ) ); ?>
                        
                        </div>
                        
                        </div><!-- end #pagination -->
                    
                    <?php wp_reset_query(); ?>
		        
		    </div><!-- end #portfolio -->

		</div><!-- end .content -->

		<?php get_sidebar(); ?>

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>