<?php
get_header(); ?>

<div id="subpage">
	
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

			<?php
			 get_template_part( 'loop', 'index' );
			?>

		</div><!-- end .content -->

		<?php get_sidebar(); ?>

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>