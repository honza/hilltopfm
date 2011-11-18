<?php
/**
 * Template Name: Homepage with Dots Slider 1
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    
    <div id="featured">
        
        <ul id="dotsSlider" class="clearfix">
        	
    		<?php              
                $loop = new WP_Query( array('post_type' => 'work', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 100));
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            
        		<li>
        
        			<div class="previewImage">
        
        				<img src="<?php echo get_custom_field('inde_dots_slider_image'); ?>" alt="<?php the_title(); ?>" />
        
        				<div class="info">
        
        					<h5><?php the_title(); ?></h5>
        					<small><?php echo get_the_date('F jS, Y'); ?></small>
        
        				</div><!-- end .info -->
        
        			</div><!-- end .previewImage -->
        
        			<div class="description">
        
        				<h2><?php echo get_custom_field('inde_dots_slider_info_title'); ?></h2>
        				<h6><?php echo get_custom_field('inde_dots_slider_info_subtitle'); ?></h6>
        
        				<h3><?php echo get_custom_field('inde_dots_slider_info_desc'); ?></h3>
        				
        				<?php echo apply_filters('the_content', get_custom_field('inde_dots_slider_info_buttons')); ?>
        
        			</div><!-- end .description -->
        
        		</li>
                    
            <?php endwhile; wp_reset_query(); ?>
        
        </ul><!-- end #dotsSlider -->
    
        <hr />
    
    </div><!-- end #featured -->
    
	<?php the_content(); ?>
	
	<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>