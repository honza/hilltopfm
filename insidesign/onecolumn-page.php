<?php
/**
 * Template Name: One column, no sidebar
 */

get_header(); ?>

<div id="subpage" class="fullwidth">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	    
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

				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'insidesign' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

			<?php endwhile; ?>

		</div><!-- end .content -->

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>