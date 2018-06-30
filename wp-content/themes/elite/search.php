<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/search.php
 * @link           http://codex.wordpress.org/Theme_Development#Search_Results_.28search.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>
<div id="hero" class="<?php echo $landing_class; ?> archive category ">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
						<h1 class="news-title">
							<?php
								printf( __( 'Search results for: %s', 'responsive' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
			</div>
		</div>
	</div>
</div>
<div id="content" class="container">
	<div id="main-content" class="row">
		<div class="col-1">
			<div class="col-md-12">
			<?php  get_template_part( 'loop-header' ); ?>
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
			</div><!-- end col-1 -->
			<?php //get_sidebar(); ?>
		</div><!-- end row -->
	</div><!-- end of #content -->

<?php get_footer(); ?>

