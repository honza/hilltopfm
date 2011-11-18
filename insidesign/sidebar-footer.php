<?php
/**
 * The Footer widget areas.
 */
?>

<?php
	if (   ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
		&& ! is_active_sidebar( 'third-footer-widget-area'  )
	)
	return;
?>

<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
<?php endif; ?>