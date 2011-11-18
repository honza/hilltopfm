<?php
/**
 * Template Name: Homepage with Roundabout Slider
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div id="featured">
            		
        <ul id="roundaboutSlider">
        	
    		<?php              
                $loop = new WP_Query( array('post_type' => 'work', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 100));
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
        
            	<li>
            
            		<a href="<?php echo basename(get_permalink()); ?>">
            
            			<img src="<?php echo get_custom_field('inde_roundabout_slider_image'); ?>" alt="<?php the_title(); ?>" />
            			
            			<?php if(get_custom_field('inde_roundabout_slider_new')): ?>
            		    	<span class="new"></span>
            		    <?php endif;?>
            			
            			<?php if(get_custom_field('inde_roundabout_slider_desc')): ?>
            		    	<span class="desc"><?php echo get_custom_field('inde_roundabout_slider_desc'); ?></span>
            		    <?php endif;?>
            
            		</a>
            
            	</li>
                    
            <?php endwhile; wp_reset_query(); ?>
        	
        </ul><!-- end #roundaboutSlider -->
        
        <div id="roundaboutSliderNav">
        
        	<a href="#" class="previousSlide">&laquo;</a>
        	<a href="#" class="nextSlide">&raquo;</a>
        	
        </div><!-- end #roundaboutSlider -->
    
        <hr />
    
    </div><!-- end #featured -->
    
	<?php the_content(); ?>
	
	<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>