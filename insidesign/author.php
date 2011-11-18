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

		<h4><?php printf( __( 'Author Archives: %s', 'insidesign' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h4>
		    
	    <?php if(get_custom_field('inde_page_subtitle')): ?>
	        
	    	<p class="subtitle"><?php echo get_custom_field('inde_page_subtitle'); ?></p>
		    
		<?php endif; ?>

	</div><!-- end .top -->

	<div class="main">

		<div class="content">

				<h1><?php printf( __( 'Author Archives: %s', 'insidesign' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h1>


				<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
			    	<div class="author-bio">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'insidesign_author_bio_avatar_size', 65 ) ); ?>
						<h3><?php printf( esc_attr__( 'About %s', 'insidesign' ), get_the_author() ); ?></h3>
						<p><?php the_author_meta( 'description' ); ?>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
							<?php printf( __( 'View all posts by %s &rarr;', 'insidesign' ), get_the_author() ); ?>
						</a></p>
			    	</div><!-- end .author-bio -->
				<?php endif; ?>
                
                <?php
                	rewind_posts();
                	get_template_part( 'loop', 'author' );
                ?>

		</div><!-- end .content -->

		<?php get_sidebar(); ?>

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>