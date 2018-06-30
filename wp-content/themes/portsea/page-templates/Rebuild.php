<?php
		
// vars
$hero = get_field('hero');	

if( $hero ): ?>
	<div id="hero">
		<img src="<?php echo $hero['image']['url']; ?>" alt="<?php echo $hero['image']['alt']; ?>" />
		<div class="content">
			<?php echo $hero['caption']; ?>
			<a href="<?php echo $hero['link']['url']; ?>"><?php echo $hero['link']['title']; ?></a>
		</div>
	</div>
	<style type="text/css">
		#hero {
			background: <?php echo $hero['color']; ?>;
		}
	</style>
<?php endif; ?>