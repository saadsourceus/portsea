<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div id="footer">
	<div class="footer-inner">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-push-6 footer-right">
					<?php if ( is_active_sidebar( 'right-footer' ) ) : ?>
				      <?php dynamic_sidebar( 'right-footer' ); ?>
					<?php endif; ?>
			</div>
			<div class="col-md-6 col-md-pull-6">					
					<?php if ( is_active_sidebar( 'left-footer' ) ) : ?>
				      <?php dynamic_sidebar( 'left-footer' ); ?>
					<?php endif; ?>		
			</div>
		</div>
	</div>
	</div>
</div>
<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p>&copy; Copyright <?php echo date('Y'); ?> <?php echo bloginfo('description'); ?></p>
			</div>
			<div class="col-md-6 fsp-link">
				<a href="http://www.foxsportspulse.com/"><img src="<?php bloginfo('template_directory'); ?>/core/images/fsplogo_footer_darkbg.png" alt=""></a>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>