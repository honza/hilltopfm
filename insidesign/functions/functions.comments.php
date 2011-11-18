<?php 

if ( ! function_exists( 'twentyten_comment' ) ) :

function insidesign_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-wrap">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 60 ); ?>
			<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
		</div><!-- .comment-author .vcard -->
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'insidesign' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-body">

			<div class="comment-meta commentmetadata">
	
				<?php printf( __( '%s', 'insidesign' ), sprintf( 'By <cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'insidesign' ), get_comment_date('F jS, Y'),  get_comment_time('g:i a') ); ?></a><?php edit_comment_link( __( '(Edit)', 'insidesign' ), ' ' );
				?>
			</div><!-- .comment-meta .commentmetadata -->

			<?php comment_text(); ?>
			
		</div><!-- .comment-body -->
		
	</div><!-- #comment-##  -->
	
	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'insidesign' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'insidesign'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

// Comment Form
function insidesign_comment_form($arg) {
    if($commenter['comment_author']) {
        $arg['author'] = '<p class="comment-form-author"> <input id="author" name="author" type="text" value="" placeholder="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    } else {
        $arg['author'] = '<p class="comment-form-author"> <input id="author" name="author" type="text" value="" placeholder="' . __( 'Name' ) . '" size="30"' . $aria_req . ' /></p>';
    }
    
    if($commenter['comment_author_email']) {
         $arg['email'] = '<p class="comment-form-email"> <input id="email" name="email" type="text" value="" placeholder="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    } else {
         $arg['email'] = '<p class="comment-form-email"> <input id="email" name="email" type="text" value="" placeholder="' . __( 'E-Mail' ) . '" size="30"' . $aria_req . ' /></p>';
    }
    
    if($commenter['comment_author_url']) {
          $arg['url'] = '<p class="comment-form-url"> <input id="url" name="url" type="text" value="" placeholder="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" class="last" /></p>';
    } else {
          $arg['url'] = '<p class="comment-form-url"> <input id="url" name="url" type="text" value="" placeholder="' . __( 'Website' ) . '" size="30" class="last" /></p>';
    }
    
    return $arg;
}

add_filter('comment_form_default_fields', 'insidesign_comment_form');