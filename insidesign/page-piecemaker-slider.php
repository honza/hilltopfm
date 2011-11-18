<?php
/**
 * Template Name: Homepage with Piecemaker 3D Slider
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div id="featured" class="clearfix">
        
        <div id="piecemakerSlider">
            
            <div class="no-flash">
            	<h5>Slider requires Flash player and Javascript!</h5>
            	<a href="http://www.adobe.com/go/getflashplayer">
            		<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
            	</a>
            </div>
        </div>
    
        <div id="piecemakerShadow">&nbsp;</div>
    
        <hr />
        
    </div><!-- end #featured -->
    
	<?php the_content(); ?>
	
	<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>