<?php

get_header(); ?>

<div id="subpage">
    
    <?php
    	if ( have_posts() )
    		the_post();
    ?>

	<div class="top">

		<div class="corner">
		    
		    <?php if(get_custom_field('inde_corner_icon')): ?>
		
			    <span class="<?php echo get_custom_field('inde_corner_icon'); ?>"></span>
			    
			<?php endif; ?>
			
		</div>

		<h4>
		    <?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s', 'insidesign' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: %s', 'insidesign' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: %s', 'insidesign' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'insidesign' ); ?>
<?php endif; ?>
		</h4>

	    <?php if(get_custom_field('inde_page_subtitle')): ?>
	        
	    	<p class="subtitle"><?php echo get_custom_field('inde_page_subtitle'); ?></p>
		    
		<?php endif; ?>

	</div><!-- end .top -->

	<div class="main">

		<div class="content">
		    
            <?php
            	rewind_posts();
            	get_template_part( 'loop', 'archive' );
            ?>

		</div><!-- end .content -->

		<?php get_sidebar(); ?>

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>