<?php

get_header(); ?>

<div id="subpage" class="fullwidth">		

	<div class="top">

		<div class="corner">
		    
		    <?php if(get_custom_field('inde_corner_icon')): ?>
		
			    <span class="<?php echo get_custom_field('inde_corner_icon'); ?>"></span>
			    
			<?php endif; ?>
			
		</div>

		<h4><?php if(get_custom_field('sidebar_parent_headline')) : echo get_custom_field('sidebar_parent_headline'); else : the_title(); endif; ?></h4>

		    
	    <?php if(get_custom_field('inde_page_subtitle')): ?>
	        
	    	<p class="subtitle"><?php echo get_custom_field('inde_page_subtitle'); ?></p>
		    
		<?php endif; ?>

	</div><!-- end .top -->

	<div class="main">

		<div class="content">
				<h1><?php _e( 'Not Found', 'insidesign' ); ?></h1>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'insidesign' ); ?></p>
				<?php get_search_form(); ?>

		</div><!-- end .content -->

	</div><!-- end .main -->

</div><!-- end #subpage -->

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>