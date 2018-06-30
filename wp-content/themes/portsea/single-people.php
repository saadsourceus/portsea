<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div id="content"  style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;"> 
<div class="container players-single">
	<div id="content-wrap" class="">
		<div class="col-md-12">
			<div class="headering-top">
			<div class="col-md-9">
			<h1 style="padding-bottom:0;"><?php the_title(); ?></h1>
			</div>
			<div class="col-md-3">
				<?php  get_template_part( 'loop-header' ); ?>
			</div>
		</div>
		</div>
		<div class="col-md-12 post-content" style="clear:both;">
			<?php if (have_posts()) : ?>
			    <?php while (have_posts()) : the_post(); ?>
						<div class="col-sm-4">
						<?php 
						 $player_image = get_field('player_full_image');
						if( $player_image ) {
							echo wp_get_attachment_image( $player_image, 'player-single' );
						}else{ ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/core/images/no_image_thumb.jpg" alt="">
						<?php } ?>
					</div>

					<div class="col-sm-6 player-stats-table">						
							
							<?php if(get_field('position')){ ?><p><strong>Position : </strong> <?php the_field('position'); ?></p><?php } ?>
							<?php if(get_field('age')){ ?><p><strong> Age : </strong> <?php the_field('age'); ?></p><?php } ?>
							<?php if(get_field('height')){ ?><p><strong>Height :</strong> <?php the_field('height'); ?></p><?php } ?>
							<?php if(get_field('nickname')){ ?><p><strong>Nickname : </strong> <?php the_field('nickname'); ?></p><?php } ?>
							<?php if(get_field('career_highlights')){ ?><p><strong>Career Highlights : </strong> <?php the_field('career_highlights'); ?></p><?php } ?>
						
					</div>
			        <?php the_content(); ?>
			    <?php endwhile; ?>
			    <?php else : ?>
			    	<p>No Posts.</p>
			<?php endif; ?>
			
			<?php get_template_part( 'includes/next-prev' ); ?>

		</div>

			<?php //get_sidebar(); ?>

	</div>
</div>
</div>

<?php //get_template_part( 'includes/sponsors' ); ?>

<?php get_footer(); ?>
