<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); 

?>
<div id="content"  style="background: url('<?php echo get_field('page_background','option'); ?>');  background-position: center;  background-repeat: no-repeat;    background-size: cover;"> 
<div class="container">
	<div id="main-content" class="row">
		<div class="container">
			<div class="col-md-9 post-content">
			<?php  //get_template_part( 'loop-header' ); ?>
			<?php if( is_category() || is_tag() || is_author() || is_date() ) { ?>
				<h1 class="news-title">
					<?php
					if( is_day() ) :
						printf( __( 'Daily Archives: %s', 'responsive' ), '<span>' . get_the_date() . '</span>' );
					elseif( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
					elseif( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
					elseif( is_category()) :
						printf(__('%s'), single_cat_title('', false));
					else :
						_e( 'News Archives', 'responsive' );
					endif;
					?>
				</h1>
				<?php } ?>
				<?php if (isset($landing_page_object->ID)){ ?>
				<?php if( !empty($header_image) ){ ?>
						<h1 class="page-title-landing"><?php printf(__('%s'), single_cat_title('', false));?></h1>
				<?php } } ?>
	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

		<div class="post-entry clearfix">
			<h1 class="single-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

			<?php 

					if( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'slider-thumb', array( 'class' => 'archive-img' ) ); ?>
					</a>

			<?php } ?>

			
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
		</div>
		<?php get_template_part( 'post-data' ); ?>
		<?php endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>
				</div>
			<!-- end col-1 -->
			<?php get_sidebar(); ?>
		</div><!-- end row -->
		</div>
	</div><!-- end of #content -->
	</div>
<?php get_footer(); ?>
