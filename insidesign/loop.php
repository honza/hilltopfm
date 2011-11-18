<?php /* Display navigation to next/previous pages when applicable */ ?>

<div id="blog">
    
<?php 

include_once('js-settings.php');

global $themename, $shortname;

?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'insidesign' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'insidesign' ); ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts in the Gallery category. */ ?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'insidesign') ) ) : ?>
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'insidesign' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php insidesign_posted_on(); ?>

<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
<?php else : ?>
<?php
	$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
	$total_images = count( $images );
	$image = array_shift( $images );
	$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
?>
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>

				<p><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'insidesign' ),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'insidesign' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
					); ?></p>

				<?php the_excerpt(); ?>
<?php endif; ?>

				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'insidesign'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'insidesign' ); ?>"><?php _e( 'More Galleries', 'insidesign' ); ?></a>
				|
				<?php comments_popup_link( __( 'Leave a comment', 'insidesign' ), __( '1 Comment', 'insidesign' ), __( '% Comments', 'insidesign' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'insidesign' ), '|', '' ); ?>

<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'insidesign') ) ) : ?>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<?php the_excerpt(); ?>
		<?php else : ?>
			<?php the_content( __( 'Continue reading &rarr;', 'insidesign' ) ); ?>
		<?php endif; ?>

				<?php insidesign_posted_on(); ?>
				|
				<?php comments_popup_link( __( 'Leave a comment', 'insidesign' ), __( '1 Comment', 'insidesign' ), __( '% Comments', 'insidesign' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'insidesign' ), '| ', '' ); ?>

<?php /* How to display all other posts. */ ?>

	<?php else : ?>
	
		<div class="entry">
			<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'insidesign' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<p class="meta">
				<?php insidesign_posted_on(); ?>
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="meta-sep">|</span>
					<?php printf( __( '%2$s', 'insidesign' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
				<?php endif; ?>
			</p>
			
			<hr />
			
			<?php if (has_post_thumbnail()) : ?>
			        					    
            	<div class="zoom">
			    
            	    <a class="single_image" href="<?php echo get_featured_image_large(); ?>">
			            <?php the_post_thumbnail('blog'); ?>
			        </a>
			        
			    </div><!-- end .zoom -->
			        
			<?php endif; ?>

			<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
					<?php the_excerpt(); ?>
			<?php else : ?>
					<?php the_content( __( 'Continue reading &rarr;', 'insidesign' ) ); ?>
					<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'insidesign' ), 'after' => '' ) ); ?>
			<?php endif; ?>

			<div class="clear"></div>
			
			<div class="footer">
			
				<?php
				$tags_list = get_the_tag_list( '', ', ' );
				if ( $tags_list ) {
					// printf( __( 'Tagged %2$s', 'insidesign' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				}
				?>
					
				<span class="edit"><?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?></span>
				
				<a href="<?php the_permalink(); ?>#comments-title" class="button blue small">
					<span class="icon left">
						<?php echo get_comments_number(); ?> <em class="speechbubble">&nbsp;</em>
					</span>
				</a>

				<a href="<?php the_permalink(); ?>" class="button blue small">
					<span class="icon">
						Read More <em class="plus">&nbsp;</em>
					</span>
				</a>
			
			</div><!-- end .footer -->

			<?php // comments_template( '', true ); ?>
		
		</div><!-- end .entry -->

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

</div><!-- end #blog -->

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div id="pagination">
	
		<div class="left">
		
			<?php next_posts_link( __( '<span class="previous">&laquo;</span> <span class="previousText">Older Posts</span>', 'insidesign' ) ); ?>
	
		</div>
	
		<div class="right">

			<?php previous_posts_link( __( '<span class="next">&raquo;</span> <span class="nextText">Newer Posts</span>', 'insidesign' ) ); ?>
	
		</div>
	
	</div><!-- end #pagination -->

<?php endif; ?>

<?php
//Reset Query
wp_reset_query();
?>