<?php
global $panel_category;

$panCat = "home";
if ( isset( $panel_category ) ) {
	$panCat = $panel_category->slug;
}

$tax_query = array(
	array(
		'taxonomy' => 'panel_cat_taxonomy',
		'field' => 'slug',
		'terms' => $panCat,
	)
);
$panel_args = array(
	'post_type'  => 'home_page_panel',
	'posts_per_page' => -1,
	'meta_key'  => 'panel_order',
	'orderby'  => 'meta_value_num',
	'order'   => 'ASC',
	'posts_per_page' => -1,
	'tax_query' => $tax_query
);
$loop = new WP_Query( $panel_args );
?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div id="<?php  echo $post->post_name; ?>-panel" class="home-panel panel-<?php  echo get_field( "panel_style" ); ?> order-<?php  echo get_field( "panel_order" ); ?> <?php echo get_field('panel_style','option');?>" style="">
		<?php
if ( have_rows( 'content_column' ) ):
	while ( have_rows( 'content_column' ) ) : the_row();
	$bgimage = "";
if(get_sub_field( 'panel_background' ) != ""){ 
		$bgimage = "style='background-color:".get_sub_field( 'background_colour' ).";background: url(".  get_sub_field( 'panel_background' ) . ");background-repeat: no-repeat;  background-position: center; background-size: cover'";

	} else {
		$bgimage = "style='background-color:".get_sub_field( 'background_colour' ).";background-repeat: no-repeat;  background-position: center;    background-size: cover'";
	}
?>

	<div class="panel-content"  <?php  echo $bgimage; ?>>
			<div class="panel-row" >
		
			        <div class="vw-left vw-<?php  echo the_sub_field( 'column_width' ) ?>" >
			        	<?php
	echo apply_filters( 'the_content', get_sub_field( 'content' ), true );
//echo the_sub_field('content');?>
			        	<?php
if ( get_sub_field( 'shortcode' ) != "" ) {
	echo apply_filters( 'the_content', get_sub_field( 'shortcode' ), true );
	//echo do_shortcode(get_sub_field('shortcode'));
}
?>
			        	<?php
if ( get_sub_field( 'template_part' ) != "" ) {
	get_template_part( 'includes/' . get_sub_field( 'template_part' ) );
}
?>
			        </div>
			        <?php
endwhile;
else :

	endif;
?>
			</div>
			<?php if ( get_field( "footer_content" ) != "" ) { ?>
			<div class="row">
				<div class="col-md-12"><?php echo get_field( "footer_content" ); ?></div>
			</div>
			<?php } ?>
	</div><!-- end col-1 -->

	
</div>
<?php endwhile; wp_reset_query(); ?>
