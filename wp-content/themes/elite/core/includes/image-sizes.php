<?php

//Add Custom Image Sizes

    add_image_size( 'content-image', 620, 415 );


//Add Image Sizes To Post / Page Admin
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
        $addsizes = array(
                "content-image" => __( "Content Image"),
                );
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
}
?>