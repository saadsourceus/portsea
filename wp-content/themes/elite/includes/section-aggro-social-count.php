<?php
 
// check if the flexible content field has rows of data
if( have_rows('aggro_social_count', 'option') ):
 
$aggro_count = '';

     // loop through the rows of data
    while ( have_rows('aggro_social_count', 'option') ) : the_row();
 
        if( get_row_layout() == 'aggro_count_twitter' ):
 
        	$aggro_count .= ' twitter='.get_sub_field('twitter_username');
 
        elseif( get_row_layout() == 'agro_count_youtube' ): 
 
        	$aggro_count .= ' youtube='.get_sub_field('youtube_username');

        elseif( get_row_layout() == 'agro_count_facebook' ): 
 
        	$aggro_count .= ' facebook='.get_sub_field('facebook_page');

        elseif( get_row_layout() == 'aggro_count_instagram' ): 
 
        	$aggro_count .= ' instagram='.get_sub_field('instagram_username');
 
        endif;
 
    endwhile;
echo do_shortcode('[aggro_social_count '.$aggro_count.']');
else :
 
    // no layouts found
 
endif;
?>