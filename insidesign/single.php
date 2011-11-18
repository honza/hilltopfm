<?php

get_header(); ?>

<div id="subpage">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
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
		
    			<div id="blog">
    	
    				<div class="entry">
    	
    					<h2 class="title"><?php the_title(); ?></h2>
    	
    					<p class="meta">
    						<?php insidesign_posted_on(); ?>
    						<?php insidesign_posted_in(); ?>
    					</p>
    	
    					<hr />
    					
    					<?php if (has_post_thumbnail()) : ?>
    					        					    
        	            	<div class="zoom">
    					    
        	            	    <a class="single_image" href="<?php echo get_featured_image_large(); ?>">
    					            <?php the_post_thumbnail('blog'); ?>
    					        </a>
    					        
    					    </div><!-- end .zoom -->
    					        
    					<?php endif; ?>
    	
    					<?php the_content(); ?>
    					
    					<div class="clear"></div>
    	
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
    					
    					<hr />
    	
    					<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>
    	
    					<?php comments_template( '', true ); ?>
    	
    					<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'insidesign' ), 'after' => '' ) ); ?>
    	
    	
    				</div><!-- end .entry -->
    
    			</div><!-- end #blog -->
    	
    			<div id="pagination">
    	
    				<div class="left">
    
    					<?php previous_post_link( '%link', '' . _x( '', '<span class="previous">»</span> <span class="previousText">Previous post link</span>', 'insidesign' ) . '<span class="previous">»</span> <span class="previousText">%title</span>' ); ?>
    	
    				</div>
    	
    				<div class="right">
    				
    					<?php next_post_link( '%link', '<span class="next">»</span> <span class="nextText">%title</span> ' . _x( '', '<span class="next">»</span> <span class="nextText">Next post link</span>', 'insidesign' ) . '' ); ?>
    	
    				</div>
    
    			</div><!-- end #pagination -->

		</div><!-- end .content -->
        	
        <?php endwhile; ?>

		<?php get_sidebar(); ?>

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>