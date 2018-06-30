<?php if(get_sub_field('section_title')) { ?><h2 class="heading"><?php the_sub_field('section_title'); ?></h2><?php } ?>
<div id="aggro-youtube">

<?php if ( !wp_is_mobile() ) {
	echo do_shortcode('[aggro_social_list youtube="'.$youtube_chanel.'" size='.$youtube_size.' theme=3 noscroll=1 imagesonly=1]');
} else {
	echo do_shortcode('[aggro_social_list youtube="'.$youtube_chanel.'" size='.$youtube_size.' theme=3 noscroll=1 imagesonly=1]');
} ?>

</div>