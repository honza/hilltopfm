<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    
	<?php the_content(); ?>
	
	<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>