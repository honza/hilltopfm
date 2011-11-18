<?php

get_header(); ?>

<div id="subpage">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<div class="top">

		<div class="corner">
		    
		    <?php if(get_custom_field('inde_corner_icon')): ?>
		
			    <span class="<?php echo get_custom_field('inde_corner_icon'); ?>"></span>
			    
			<?php endif; ?>
			
		</div>


		<h4><?php if(get_custom_field('sidebar_parent_headline')) : echo get_custom_field('sidebar_parent_headline'); else : the_title(); endif; ?></h4>
		
	    <?php if(get_custom_field('inde_page_subtitle')): ?>
	        
	    	<p class="subtitle"><?php echo get_custom_field('inde_page_subtitle'); ?></p>
		    
		<?php endif; ?>

	</div><!-- end .top -->

	<div class="main">

		<div class="content">
            
            <div id="portfolio" class="single">
            		    
    		    <?php
                
                $portfolio_image_large = get_the_post_thumbnail($post->ID);
                $pattern= "/(?<=src=['|\"])[^'|\"]*?(?=['|\"])/i";
                preg_match($pattern, $portfolio_image_large, $thePath);
                $portfolio_image_large_final = $thePath[0]; 
                
                $slides = get_custom_field('inde_portfolio_slideshow_images');
                
                if($slides) :
                
                ?>                    		
            		
    				<ul id="portfolioSlider">
    
    					<li>
    
    						<div class="zoom">
    
    							<a class="multi_images" rel="<?php echo basename(get_permalink()); ?>" href="<?php echo $portfolio_image_large_final; ?>">
    								<?php echo get_the_post_thumbnail($post->ID, 'portfolio-single'); ?>
    							</a>
    
    						</div><!-- end .zoom -->
    
    					</li>
    					
                		<?php
            	    	
            	    	$single_slide = preg_split('/\n/', $slides);
            	    	
            	    	$count = count($single_slide);
            	    	
                        for ($i = 0; $i < $count; $i++) : ?>
                            
            	        	<?php list($small, $full, $alt) = preg_split('/\|/', $single_slide[$i]); ?>                            
    
    						<li>
    
    							<div class="zoom">
    
    								<a class="multi_images" rel="<?php echo basename(get_permalink()); ?>" href="<?php if($full) : echo $full; else: echo $small; endif; ?>">
    									<img src="<?php if($small) : echo $small; else: echo $full; endif; ?>" alt="<?php if($alt) : echo $alt; else: echo  _e('Image', 'insidesign'); endif; ?>" width="630" height="490" />
    								</a>
    
    							</div><!-- end .zoom -->
    
    						</li>
                	    	    
                        <?php endfor; ?>                                
    
    				</ul><!-- end #portfolioSlider -->
    				
    			<?php else: ?>    			    
                
            		<div class="image">
        		    
    					<div class="zoom">
    
    						<a class="single_image" href="<?php echo $portfolio_image_large_final; ?>">
    							<?php echo get_the_post_thumbnail($post->ID, 'portfolio-single'); ?>
    						</a>
    
    					</div><!-- end .zoom -->
            		    
            		</div><!-- end .image -->
            		
            	<?php endif; ?>
				
				<div class="clear"></div>
            
        		<hr />
    
            	<div class="info">
            	    
            	    <?php 
                        $portfolio_portfolio_categories = get_the_term_list($post->ID, 'portfolio-categories', '', ' <li><span class="separator">-</span></li> ', '' );
                        // This will turn our What We Did tags into a list and strip out the links
                        $portfolio_portfolio_categories_final = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_portfolio_categories);
                        
                        $portfolio_web_techniques = get_the_term_list($post->ID, 'web-techniques', ' <li><span class="separator">|</span></li> ', ' <li><span class="separator">-</span></li> ', '' );
                        // This will turn our What We Did tags into a list and strip out the links
                        $portfolio_web_techniques_final = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_web_techniques);
                     ?>
            
            		<h4><?php the_title(); ?></h4>
            
            		<ul class="taxonomies">
            			<?php echo $portfolio_portfolio_categories_final; ?>
            		</ul>
            
            		<ul class="taxonomies">
            			<?php echo $portfolio_web_techniques_final; ?>
            		</ul>
                
            		<hr />
            
            		<?php the_content(); ?>
            
            	</div><!-- end .info -->
                
            </div><!-- end #portfolio -->
			
			<?php if ( comments_open() ) : ?>
			
				<hr />
				
				<?php comments_template( '', true ); ?>
				
			<?php endif; ?>
    	
			<div id="pagination">
	
				<div class="left">

					<?php previous_post_link( '%link', '' . _x( '', '<span class="previous">&laquo;</span> <span class="previousText">Previous post link</span>', 'insidesign' ) . '<span class="previous">&laquo;</span> <span class="previousText">%title</span>' ); ?>
	
				</div>
	
				<div class="right">
				
					<?php next_post_link( '%link', '<span class="next">&raquo;</span> <span class="nextText">%title</span> ' . _x( '', '<span class="next">&raquo;</span> <span class="nextText">Next post link</span>', 'insidesign' ) . '' ); ?>
	
				</div>

			</div><!-- end #pagination -->

    	</div><!-- end .content -->
		
	    <?php endwhile; ?>
    
    	<?php get_sidebar(); ?>
    
    </div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>
		    