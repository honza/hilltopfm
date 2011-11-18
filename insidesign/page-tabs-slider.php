<?php
/**
 * Template Name: Homepage with Tabs Slider
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div id="featured" class="clearfix">
    
    	<div id="tabsSlider">
    	
    		<div id="tabsSlides">
    
    			<ul>
    			    
                    <?php
                      $loop = new WP_Query( array('post_type' => 'tabs_slider', 'post_status' => 'publish', 'orderby' => 'meta_value', 'meta_key' => 'inde_slide_order', 'order' => 'ASC', 'posts_per_page' => 100));
                       while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    
                        <li id="slide-<?php echo get_custom_field('inde_slide_order'); ?>">
                        
                        	<img src="<?php echo get_custom_field('inde_slide_bg'); ?>" alt="bg" class="background" />
                        
                        	<div class="tabContent">
                        	    
                        	    <?php
                            	    if(get_custom_field('inde_slide_thumbnail_align') == 'Left') {
                            	        echo get_the_post_thumbnail($post->ID, 'tabs-slider' , array('class' => 'alignleft attachment-tabs-slider'));
                            	    } elseif (get_custom_field('inde_slide_thumbnail_align') == 'Right') {
                            	        echo get_the_post_thumbnail($post->ID, 'tabs-slider' , array('class' => 'alignright attachment-tabs-slider'));
                            	    }
                        	    ?>
                        
                        		<?php the_content(); ?>
                        
                        	</div><!-- end .tabContent -->
                        </li>
        
                    <?php endwhile; ?>
                    
    			</ul>
    			
    		</div><!-- end #tabSlides -->
    
    		<ul id="tabsNav">
    		    
    		    <?php     
                   while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                
    			<li<?php if(get_custom_field('inde_slide_order') == '1') : ?> class="activeSlide"<?php endif; ?>><a href="#slide-<?php echo get_custom_field('inde_slide_order'); ?>"><?php the_title(); ?></a></li>
                
                <?php
                endwhile;
                wp_reset_query();
                ?>
    			
    		</ul><!-- end #tabsNav -->
    
    	</div><!-- end #tabSlider -->
    
    	<hr />
    
    </div><!-- end #featured -->
    
	<?php the_content(); ?>
	
	<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>