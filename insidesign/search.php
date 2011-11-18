<?php
get_header(); ?>

<div id="subpage">
	
	<div class="top">

		<div class="corner">
		    
		    <?php if(get_custom_field('inde_corner_icon')): ?>
		
			    <span class="<?php echo get_custom_field('inde_corner_icon'); ?>"></span>
			    
			<?php endif; ?>
			
		</div>

		<h4><?php printf( __( 'Search Results for: %s', 'insidesign' ), '' . get_search_query() . '' ); ?></h4>
		    
	    <?php if(get_custom_field('inde_page_subtitle')): ?>
	        
	    	<p class="subtitle"><?php echo get_custom_field('inde_page_subtitle'); ?></p>
		    
		<?php endif; ?>

	</div><!-- end .top -->

	<div class="main">

		<div class="content">

			<?php if ( have_posts() ) : ?>
		
			<h1><?php printf( __( 'Search Results for: %s', 'insidesign' ), '' . get_search_query() . '' ); ?></h1>
			<?php
			 get_template_part( 'loop', 'search' );
			?>
			
			<?php else : ?>
								<h2><?php _e( 'Nothing Found', 'insidesign' ); ?></h2>
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'insidesign' ); ?></p>
								<?php get_search_form(); ?>
			<?php endif; ?>

		</div><!-- end .content -->

		<?php get_sidebar(); ?>

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>
