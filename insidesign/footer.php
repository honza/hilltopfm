<?php
	global $themename, $shortname;
	
	if (get_option($shortname . '_infocolumns_1_icon') && get_option($shortname . '_infocolumns_1_title') && get_option($shortname . '_infocolumns_1_desc') ) { $infocolumns_1 = true; } else { $infocolumns_1 = false; }
	if (get_option($shortname . '_infocolumns_2_icon') && get_option($shortname . '_infocolumns_2_title') && get_option($shortname . '_infocolumns_2_desc') ) { $infocolumns_2 = true; } else { $infocolumns_2 = false; }
	if (get_option($shortname . '_infocolumns_3_icon') && get_option($shortname . '_infocolumns_3_title') && get_option($shortname . '_infocolumns_3_desc') ) { $infocolumns_3 = true; } else { $infocolumns_3 = false; }
	if (get_option($shortname . '_infocolumns_4_icon') && get_option($shortname . '_infocolumns_4_title') && get_option($shortname . '_infocolumns_4_desc') ) { $infocolumns_4 = true; } else { $infocolumns_4 = false; }

?>

	<?php if(get_option($shortname . '_infocolumns_sections') == 'Yes') : ?>

		<div id="infoColumns" <?php if(get_option($shortname . '_infocolumns_sections_count')) : ?> class="x<?php echo stripslashes(get_option($shortname . '_infocolumns_sections_count')); ?>"> <?php endif; ?>
		
			<div class="inner">

				<?php if( ($infocolumns_1) && (get_option($shortname . '_infocolumns_sections_count') == '1' || get_option($shortname . '_infocolumns_sections_count') == '2' || get_option($shortname . '_infocolumns_sections_count') == '3' || get_option($shortname . '_infocolumns_sections_count') == '4') ) : ?>
				<div class="section first<?php if(get_option($shortname . '_infocolumns_sections_count') == '1') : echo ' last'; endif; ?>">
					<img src="<?php echo get_option($shortname . '_infocolumns_1_icon'); ?>" alt="icon">
					<strong><?php echo get_option($shortname . '_infocolumns_1_title'); ?></strong>
					<p><?php echo get_option($shortname . '_infocolumns_1_desc'); ?></p>
					<a href="<?php echo get_option($shortname . '_infocolumns_1_link_url'); ?>" title="<?php echo get_option($shortname . '_infocolumns_1_link_title'); ?>"><?php echo get_option($shortname . '_infocolumns_1_link_title'); ?></a>
				</div>
				<?php endif; ?>

				<?php if( ($infocolumns_2) && (get_option($shortname . '_infocolumns_sections_count') == '2' || get_option($shortname . '_infocolumns_sections_count') == '3' || get_option($shortname . '_infocolumns_sections_count') == '4') ) : ?>
				<div class="section<?php if(get_option($shortname . '_infocolumns_sections_count') == '2') : echo ' last'; endif; ?>">
					<img src="<?php echo get_option($shortname . '_infocolumns_2_icon'); ?>" alt="icon">
					<strong><?php echo get_option($shortname . '_infocolumns_2_title'); ?></strong>
					<p><?php echo get_option($shortname . '_infocolumns_2_desc'); ?></p>
					<a href="<?php echo get_option($shortname . '_infocolumns_2_link_url'); ?>" title="<?php echo get_option($shortname . '_infocolumns_2_link_title'); ?>"><?php echo get_option($shortname . '_infocolumns_2_link_title'); ?></a>
				</div>
				<?php endif; ?>

				<?php if( ($infocolumns_3) && (get_option($shortname . '_infocolumns_sections_count') == '3' || get_option($shortname . '_infocolumns_sections_count') == '4') ) : ?>
				<div class="section<?php if(get_option($shortname . '_infocolumns_sections_count') == '3') : echo ' last'; endif; ?>">
					<img src="<?php echo get_option($shortname . '_infocolumns_3_icon'); ?>" alt="icon">
					<strong><?php echo get_option($shortname . '_infocolumns_3_title'); ?></strong>
					<p><?php echo get_option($shortname . '_infocolumns_3_desc'); ?></p>
					<a href="<?php echo  get_option($shortname . '_infocolumns_3_link_url'); ?>" title="<?php echo get_option($shortname . '_infocolumns_3_link_title'); ?>"><?php echo get_option($shortname . '_infocolumns_3_link_title'); ?></a>
				</div>
				<?php endif; ?>

				<?php if($infocolumns_4 && get_option($shortname . '_infocolumns_sections_count') == '4') : ?>
				<div class="section last">
					<img src="<?php echo get_option($shortname . '_infocolumns_4_icon'); ?>" alt="icon">
					<strong><?php echo get_option($shortname . '_infocolumns_4_title'); ?></strong>
					<p><?php echo get_option($shortname . '_infocolumns_4_desc'); ?></p>
					<a href="<?php echo get_option($shortname . '_infocolumns_4_link_url'); ?>" title="<?php echo get_option($shortname . '_infocolumns_4_link_title'); ?>"><?php echo get_option($shortname . '_infocolumns_4_link_title'); ?></a>
				</div>
				<?php endif; ?>

			</div><!-- end .inner -->

		</div><!-- end #infoColumns -->
		
	<?php endif; ?>
	
	</div><!-- end .container -->

</div><!-- end #infoColumns -->

<?php if(get_option($shortname."_content_bottom") == 'Yes') : ?>

	<div id="contentBottom">
	
		<div class="container">
	
			<div id="support">
	
				<?php echo stripslashes(get_option($shortname.'_content_bottom_support')); ?>
	
			</div><!-- end #support -->
	
			<div id="newsletter">
	
				<div class="newsletterInfo">
	
					<?php echo stripslashes(get_option($shortname.'_content_bottom_newsletter')); ?>

				</div><!-- end .newsletterInfo -->

				<?php echo stripslashes(get_option($shortname.'_content_bottom_form')); ?>
	
			</div><!-- end #newsletter -->
	
		</div><!-- end .container -->
	
	</div><!-- end #contentBottom -->

<?php endif; ?>

<div class="clear"></div>

<div id="footer">

	<div class="container">

		<?php
			get_sidebar( 'footer' );
		?>

	</div><!-- end .container -->

</div><!-- end #footer -->

<div id="footerBottom">

	<div class="container">

		<p class="alignleft">
			<?php echo stripslashes(get_option($shortname.'_footer_left')); ?>
		</p>

		<p class="alignright">
			<?php echo stripslashes(get_option($shortname.'_footer_right')); ?>
		</p>
		
	</div><!-- end .container -->

</div><!-- end #footerBottom -->

<script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.roundabout.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/swfobject.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.clearfield.packed.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox-1.3.3.pack.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/custom-js.php"></script>
<!--[if IE]><script src="<?php bloginfo('template_url'); ?>/js/ie-fix.js"></script><![endif]-->

<?php
	wp_footer();
?>
</body>
</html>