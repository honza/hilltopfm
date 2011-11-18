<?php
/**
 * Template Name: Homepage with Dots Slider 2
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div id="featured">
        
        <ul id="dotsSlider2">
        
        	<?php              
                $loop = new WP_Query( array('post_type' => 'work', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 100));
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
        
        		<li>
        
    				<a href="<?php echo basename(get_permalink()); ?>"><img src="<?php echo get_custom_field('inde_dots_slider_2_image'); ?>" alt="<?php the_title(); ?>" /></a>
        
        		</li>
        
        	<?php endwhile; wp_reset_query(); ?>
        
        </ul><!-- end #dotsSlider2 -->
        
    	<a href="#" class="prevDotsSlide">&laquo;</a>
    	<a href="#" class="nextDotsSlide">&raquo;</a>
    
        <hr />
    
    </div><!-- end #featured -->
    
	<?php the_content(); ?>
	
	<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>