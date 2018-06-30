<?php

if ( current_user_can('delete_others_pages') ) {
    add_action('wp_footer', 'show_template');
    function show_template() {
        global $template;
        print_r($template);
        edit_post_link();
    }
}


include STYLESHEETPATH . '/core/includes/custom-plugins.php';

function change_default_title( $title ) {
  $screen = get_current_screen();

  if  ( 'people' == $screen->post_type ) {
    $title = 'Enter Persons Name';
  }

  return $title;
}

add_filter( 'enter_title_here', 'change_default_title' );
add_theme_support( 'category-thumbnails' );

// Add Google Fonts

// function load_fonts() {
//   wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Rajdhani:600|Open+Sans:300,400,700' );
//   wp_enqueue_style( 'googleFonts' );

//    wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Rajdhani light:400|Open+Sans:300,400,700' );
//   wp_enqueue_style( 'googleFonts' );


// }

add_theme_support( 'post-thumbnails' );
function load_fonts() {
  wp_register_style( 'googleFonts', 'http://fonts.googleapis.com/css?family=Anton:400,700|Open+Sans:300,400,700' );
  wp_enqueue_style( 'googleFonts' );
}
add_action( 'wp_print_styles', 'load_fonts' );

// Image Sizes
add_image_size( 'club_logo_admin', 30, 30, true ); 
add_image_size( 'related-article', 100, 100, true ); 
add_image_size( 'slider', 620, 415, array( 'center', 'top' ) );
add_image_size( 'panel-alt', 620, 253, array( 'center', 'top' ) );
add_image_size( 'slider-img', 620, array( 'center', 'top' ) );
add_image_size( 'slider-thumb', 290, 195, array( 'center', 'top' ) );
add_image_size( 'content-image', 675, 9999 );
add_image_size( 'gallery-thumb', 264, 149, true );
add_image_size( 'custom-header', 1120, 100, true );
add_image_size( 'custom-header-mobile', 560, 200, true );
add_image_size( 'home-page-buttons', 300, 150, true );
add_image_size( 'news-square', 600, 600, array( 'center', 'top' ) );
add_image_size( 'small-news-square', 300, 300, array( 'center', 'top' ) );
add_image_size( 'news-thumb', 1200, 501, array( 'center', 'top' ) );
add_image_size( 'home-slide', 895, 490, array( 'center', 'top' ) );
add_image_size( 'panel-slide', 895, 700, array( 'center', 'top' ) );
add_image_size( 'player-single', 370, 554, array( 'center', 'top' ) );
add_image_size( 'player-thumb', 200, 300, array( 'center', 'top' ) );
add_image_size( 'player-home', 300, 445, array( 'center', 'top' ) );
add_image_size( 'player-img', 215, 320, true );


//Add Image Sizes To Post / Page Admin
add_filter( 'image_size_names_choose', 'my_image_sizes' );
function my_image_sizes( $sizes ) {
  $addsizes = array(
    "content-image" => __( "Content Image" ),
  );
  $newsizes = array_merge( $sizes, $addsizes );
  return $newsizes;
}


// Custom Functions
function get_excerpt( $limit, $source = null ) {
  global $post;
  if ( $source == "content" ? ( $excerpt = get_the_content() ) : ( $excerpt = get_the_excerpt() ) );
  $excerpt = preg_replace( " (\[.*?\])", '', $excerpt );
  $excerpt = strip_shortcodes( $excerpt );
  $excerpt = strip_tags( $excerpt );
  $excerpt = substr( $excerpt, 0, $limit );
  $excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
  $excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );
 // $excerpt = "<br />";
 // $excerpt = $excerpt.'... <a class="read-more" href="'.get_permalink( $post->ID ).'"><br />Read More</a>';
  return $excerpt;
}
function softTrim($text, $count, $wrapText='...'){

    if(strlen($text)>$count){
        preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    }else{
        $wrapText = '';
    }
    return $text . $wrapText;
}

function ShortenText( $limit, $text, $word ) { // limit, text, keep whole word
  $chars_limit = $limit; // Character length
  $chars_text = strlen( $text );
  $text = $text." ";
  $text = substr( $text, 0, $chars_limit );
  if ( $word == true ) {
    $text = substr( $text, 0, strrpos( $text, ' ' ) );
  }

  if ( $chars_text > $chars_limit ) { $text = $text."..."; } // Ellipsis
  return $text;
}


// function my_acf_options_page_settings( $settings ) {
//   $settings['title'] = 'Options';
//   if ( current_user_can( 'add_users' ) ) {
//     $settings['pages'] = array( 'Major Partners', 'Community Sponsors', 'Home Page Buttons', 'Social Count', 'Home Advertising', 'Home Splash', 'Image Defaults', 'Admin', 'Unused AFC' );
//   }else {
//     $settings['pages'] = array( 'Major Partners', 'Community Sponsors', 'Home Advertising', 'Home Splash', 'Image Defaults', );
//   }


//   return $settings;
// }
// add_filter( 'acf/options_page/settings', 'my_acf_options_page_settings' );


// Social Media Links
function fsp_adv_social_media() {
  $output = '
        <ul class="fsp-adv-social-media">
        <li class="share-title">Share</li>
        <li><a href="https://www.facebook.com/sharer.php?u='.get_the_permalink().'&t='.get_the_title().'" target="_blank">f</a></li>
        <li><a href="https://twitter.com/home?status='.get_the_title().'%20-%20'.get_the_permalink().'" target="_blank">t</a></li>
        <li><a href="https://plus.google.com/share?url='.get_the_permalink().'" target="_blank">m</a></li>
        <li><a href="https://plus.google.com/share?url='.get_the_permalink().'" target="_blank">P</a></li>
        </ul>
  ';
  IF (function_exists('sharing_display')){
        $output = sharing_display();
  }
  return $output;
}
// Use the after_setup_theme hook with a priority of 11 to load after the
// parent theme, which will fire on the default priority of 10
add_action( 'after_setup_theme', 'remove_featured_images_from_pages', 11 );

function remove_featured_images_from_pages() {

  // This will remove support for post thumbnails on ALL Post Types
  remove_theme_support( 'post-thumbnails' );

  // Add this line in to re-enable support for just Posts
  add_theme_support( 'post-thumbnails', array( 'post','gallery') );

  // Add this line in to re-enable support for just Posts
  add_theme_support( 'post-thumbnails', array( 'post','gallery','page') );
}

// Register Child Scripts
function child_scripts() {

   wp_register_script( 'flexisel', get_stylesheet_directory_uri() . '/core/js/jquery.flexisel.js', array( 'jquery' ), '1', false );
   wp_enqueue_script( 'flexisel' );
   wp_register_script( 'slick', get_stylesheet_directory_uri() . '/core/js/slick.min.js', array( 'jquery' ), '1', true );
  wp_enqueue_script( 'slick' ); 
   wp_register_script( 'classie', get_stylesheet_directory_uri() . '/core/js/classie.js', array( 'jquery' ), '1', true );
  wp_enqueue_script( 'classie' );
  wp_register_script( 'uisearch', get_stylesheet_directory_uri() . '/core/js/uisearch.js', array( 'jquery' ), '1', true );
  wp_enqueue_script( 'uisearch' ); 
  wp_register_script( 'matchheight', get_stylesheet_directory_uri() . '/core/js/jquery.matchHeight.js', array( 'jquery' ), '1', true );
  wp_enqueue_script( 'matchheight' ); 
  

 
}
add_action( 'wp_enqueue_scripts', 'child_scripts' );


if ( ! function_exists( 'home_page_panel_type' ) ) {

  // Register Custom Post Type
  function home_page_panel_type() {

    $labels = array(
      'name'                => _x( 'Page Panels', 'Post Type General Name', 'text_domain' ),
      'singular_name'       => _x( 'Page Panel', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'           => __( 'Page Panels', 'text_domain' ),
      'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
      'all_items'           => __( 'All Items', 'text_domain' ),
      'view_item'           => __( 'View Item', 'text_domain' ),
      'add_new_item'        => __( 'Add New Item', 'text_domain' ),
      'add_new'             => __( 'Add New', 'text_domain' ),
      'edit_item'           => __( 'Edit Item', 'text_domain' ),
      'update_item'         => __( 'Update Item', 'text_domain' ),
      'search_items'        => __( 'Search Item', 'text_domain' ),
      'not_found'           => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
      'label'               => __( 'home_page_panel', 'text_domain' ),
      'description'         => __( 'Home Page Panels', 'text_domain' ),
      'labels'              => $labels,
      'supports'            => array( 'title', ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => false,
      'menu_position'       => 10,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
    );
    register_post_type( 'home_page_panel', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'home_page_panel_type', 0 );

}




add_shortcode( 'box_news', 'box_news_shortcode' );
function box_news_shortcode( $atts ) {

  global $post;
  $temp_post = $post;

  ob_start();
  extract( shortcode_atts( array(
        'cat' => "",
        'posts' => 5,
      ), $atts ) );
  $args = array (
    'category_name'          => $cat,
    'posts_per_page'         => $posts,
    'ignore_sticky_posts'    => true,
    'order'                  => 'DESC',
    'orderby'                => 'date',
  );

  // The Query
  $pantest_query = new WP_Query( $args );
  //print_r($pantest_query);
  if ( $pantest_query->have_posts() ) {
    echo "<div class='panel_box_news'>";
    while ( $pantest_query->have_posts() ) {
      $pantest_query->the_post();
      setup_postdata( $post );

      if ( has_post_thumbnail() ) {
        $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news-square' );
        $featured_image = $thumb_image_url[0];
      } else {
        $featured_image = get_stylesheet_directory_uri().'/core/images/placeholder.jpg';
      } ?>
          <div class="<?php if ( 0 == $pantest_query->current_post ) {echo 'col-md-6';}else {echo 'col-md-3';}; ?> clearfix">
          <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $featured_image; ?>" alt=""></a>
            <a class="panel_box_news_sub_title" href="<?php the_permalink(); ?>"><?php the_title(); ?><span>Read More</span></a>
          </div>
          <?php
    }

    echo "</div>";
    //WP_Query arguments
    wp_reset_postdata();
    //wp_reset_query();
    $myvariable = ob_get_clean();

    $post = $temp_post;

    return $myvariable;
  }
}



  

add_shortcode( 'panel_slider', 'panel_slider_shortcode' );
function panel_slider_shortcode( $atts ) {

  global $post;
  $temp_post = $post;

  ob_start();
  extract( shortcode_atts( array(
        'cat' => "featured",
        'posts' => 4,
      ), $atts ) );      //WP_Query arguments

  $news_category = $cat;

  include locate_template(  'includes/section-panel-slider.php' );


  wp_reset_postdata();
  //wp_reset_query();
  $myvariable = ob_get_clean();

  $post = $temp_post;

  return $myvariable;
}

add_shortcode( 'panel_social', 'panel_social_shortcode' );
function panel_social_shortcode( $atts ) {

  global $post;
  $temp_post = $post;

  ob_start();
  extract( shortcode_atts( array(
        'twitter' => "",
        'facebook' => "",
        'instgram' => ""
      ), $atts ) );      //WP_Query arguments


  include locate_template(  'includes/panel-social.php' );


  wp_reset_postdata();
  //wp_reset_query();
  $myvariable = ob_get_clean();

  $post = $temp_post;

  return $myvariable;
}

add_shortcode( 'panel_youtube', 'panel_youtube_shortcode' );
function panel_youtube_shortcode( $atts ) {

  global $post;
  $temp_post = $post;

  ob_start();
  extract( shortcode_atts( array(
        'youtube' => "",
        'size' => 4,
        'playlist' => false
      ), $atts ) );      //WP_Query arguments


  include locate_template(  'includes/panel-youtube.php' );


  wp_reset_postdata();
  //wp_reset_query();
  $myvariable = ob_get_clean();

  $post = $temp_post;

  return $myvariable;
}



function excerpt( $text, $limit ) {
  $excerpt = explode( ' ', $text, $limit );
  if ( count( $excerpt )>=$limit ) {
    array_pop( $excerpt );
    $excerpt = implode( " ", $excerpt ).'...';
  } else {
    $excerpt = implode( " ", $excerpt );
  }
  $excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
  return $excerpt;
}

function content( $limit ) {
  $content = explode( ' ', get_the_content(), $limit );
  if ( count( $content )>=$limit ) {
    array_pop( $content );
    $content = implode( " ", $content ).'...';
  } else {
    $content = implode( " ", $content );
  }
  $content = preg_replace( '/\[.+\]/', '', $content );
  $content = apply_filters( 'the_content', $content );
  $content = str_replace( ']]>', ']]&gt;', $content );
  return $content;
}


// function eliteplus_widgets_init() {


//   register_sidebar( array(
//       'name'          => __( 'Home Page Banner Widget', 'responsive' ),
//       'description'   => __( 'Banner Area Over Slideshow', 'responsive' ),
//       'id'            => 'slide-banner',
//       'before_title'  => '<h3 class="widget-title">',
//       'after_title'   => '</h3>',
//       'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
//       'after_widget'  => '</div>'
//     ) );


// }

// add_action( 'widgets_init', 'eliteplus_widgets_init' );


// function event_widgets_init() {
// register_sidebar( array(
//                           'name'          => __( 'Events Sidebar', 'responsive' ),
//                           'description'   => __( 'Events Sidebar', 'responsive' ),
//                           'id'            => 'events-sidebar',
//                           'before_title'  => '<h3 class="widget-title">',
//                           'after_title'   => '</h3>',
//                           'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
//                           'after_widget'  => '</div>'
//                       ) );

// }
// add_action( 'widgets_init', 'event_widgets_init' );
function banner_styles_method() {
  if ( is_child_theme() ) {
    $banner = get_field( 'banners_active', 'option' );
    if ( $banner ) {
      wp_enqueue_style( 'advertising-style', get_stylesheet_directory_uri() . '/core/css/banners.css', false, $theme['Version'] );
      //$color = "#FF0000";
      $custom_css = "
                    .mycolor{
                            background: {$color};
                    }";
      wp_add_inline_style( 'advertising-style', $custom_css );
    }
  }
}
add_action( 'wp_enqueue_scripts', 'banner_styles_method' );

if ( ! function_exists( 'panel_cat_taxonomy' ) ) {

  // Register Custom Taxonomy
  function panel_cat_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Panel Category', 'Taxonomy General Name', 'text_domain' ),
      'singular_name'              => _x( 'Panel Category', 'Taxonomy Singular Name', 'text_domain' ),
      'menu_name'                  => __( 'Panel Category', 'text_domain' ),
      'all_items'                  => __( 'All Items', 'text_domain' ),
      'parent_item'                => __( 'Parent Item', 'text_domain' ),
      'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
      'new_item_name'              => __( 'New Item Name', 'text_domain' ),
      'add_new_item'               => __( 'Add New Item', 'text_domain' ),
      'edit_item'                  => __( 'Edit Item', 'text_domain' ),
      'update_item'                => __( 'Update Item', 'text_domain' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
      'search_items'               => __( 'Search Items', 'text_domain' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
      'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
      'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
    );
    register_taxonomy( 'panel_cat_taxonomy', array( 'home_page_panel' ), $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'panel_cat_taxonomy', 0 );

}



// Register FSP oEmbed providers
function custom_oembed_provider() {
  wp_oembed_add_provider( 'http://www.foxsportspulse.com/round_info.cgi?a=MATCH*', 'http://fspdev.com/oembed/', false );
  wp_oembed_add_provider( 'http://www.sportingpulse.com/round_info.cgi?a=MATCH*', 'http://fspdev.com/oembed/', false );
}
add_action( 'init', 'custom_oembed_provider' );


if( function_exists('acf_add_options_page') ) {
 acf_add_options_page(array(
    'page_title'  => 'Home Options',
    'menu_title'  => 'Home Options',
    'menu_slug'   => 'home_options',
    'capability'  => 'edit_posts',
    'redirect'    => false,
   
  ));   

acf_add_options_page(array(
    'page_title'  => 'Site Options',
    'menu_title'  => 'Site Options',
    'menu_slug'   => 'options',
    'capability'  => 'edit_posts',
    'redirect'    => false,
   
  ));

}


if ( ! function_exists('gallery') ) {

// Register Custom Post Type
function gallery() {

  $labels = array(
    'name'                  => _x( 'Gallery', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Gallery', 'text_domain' ),
    'name_admin_bar'        => __( 'Gallery ', 'text_domain' ),
    'archives'              => __( 'Item Archives', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'All Items', 'text_domain' ),
    'add_new_item'          => __( 'Add New Item', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Item', 'text_domain' ),
    'edit_item'             => __( 'Edit Item', 'text_domain' ),
    'update_item'           => __( 'Update Item', 'text_domain' ),
    'view_item'             => __( 'View Item', 'text_domain' ),
    'search_items'          => __( 'Search Item', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Gallery', 'text_domain' ),
    'description'           => __( 'Display Gallery Images', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
 register_post_type( 'gallery', $args );

}
add_action( 'init', 'gallery', 0 );

}


register_nav_menus( array(
                
                // 'footer-bottom-menu'     => __( 'Footer Bottom Menu', 'responsive' ),
                // 'top-left-header-menu'     => __( 'Top Header Left Menu', 'responsive' ),
                'top-left-header-menu'     => __( 'Top Left Right Menu', 'responsive' )
              )
    );
add_action( 'init', 'register_my_menu' );

// function generate_options_css() {
//     global $blog_id;
//     $ss_dir = get_stylesheet_directory();
//     ob_start(); // Capture all output into buffer
//     require($ss_dir . '/custom-styles.php'); // Grab the custom-style.php file
//     $css = ob_get_clean(); // Store output in a variable, then flush the buffer
//     file_put_contents($ss_dir . '/core/css/custom-styles-'.$blog_id.'.css', $css, LOCK_EX); // Save it as a css file
// }
// add_action( 'acf/save_post', 'generate_options_css' ); //Parse the output and write the CSS file on post save
if(is_multisite()) {
  function custom_css_local() {
      global $blog_id;
      wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/core/css/custom-styles-'.$blog_id.'.css', array('responsive-child-style'), '1.0.0' );
  }
  add_action( 'wp_enqueue_scripts', 'custom_css_local' );
}else{
  function custom_css() {
      wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/core/css/custom-styles-1.css', array('responsive-child-style'), '1.0.0' );
  }
  add_action( 'wp_enqueue_scripts', 'custom_css' );
}



 
// This goes to your theme's functions.php
function codelight_all_permissions( $allcaps, $cap, $args ) {
    $allcaps[$cap[0]] = true;
    return $allcaps;
}
add_filter( 'user_has_cap', 'codelight_all_permissions', 0, 3 );


add_action('widgets_init', create_function('', 'return register_widget("nzff_events_widget");'));

class nzff_events_widget extends WP_Widget
{
    // constructor
    function nzff_events_widget()
    {
        $widget_ops  = array(
            'classname' => 'nzff_events_widget',
            'description' => __('New widget to display a list of events')
        );
        $control_ops = array(
            'width' => 300,
            'height' => 350,
            'id_base' => 'nzff_events_widget'
        );
        parent::__construct('nzff_events_widget', __('New Events Widget'), $widget_ops);
    }
    
    // widget display
    function widget($args, $instance)
    {
        global $post;
      $temp_post = $post;
  
      ob_start();
      extract($args);
        $title    = apply_filters('widget_title', $instance['title']);
        $category = isset($instance['category']) ? $instance['category'] : false;
        $num_posts = isset($instance['num_posts']) ? $instance['num_posts'] : false;
        $link_target = isset($instance['link_target']) ? $instance['link_target'] : false;
        echo $before_widget;
        
        // Display the widget title 
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        //Display the Events Widget 
         $today = date('Ymd',strtotime("-1 days"));

         if ($category != 0){
       $term = get_term( $category, 'tf_eventcategory' );
           $tax_query = array(
                     array(
                          'taxonomy' => 'tf_eventcategory',
                          'field' => 'slug',
                          'terms' => $term->slug,  
                          )
                  );
      } else {
        $tax_query = "";
      }
         $args = array (
        'post_type' => 'tf_events',
        'meta_key' => 'tf_events_startdate',
        'meta_compare' => '>',
        'meta_value' => $today,
        'orderby' => 'tf_events_startdate',
        'posts_per_page'        => $num_posts,
        'ignore_sticky_posts'   => true,
        'orderby' => 'tf_events_startdate',
        'order' => "ASC",
        'tax_query' => $tax_query
        );
      $event_query = new WP_Query( $args );
      if ( $event_query->have_posts() ) { 
        
        while ( $event_query->have_posts() ) {
          $event_query->the_post();
          setup_postdata($post);
            ?>
                <a class="event_widget_row" href="<?php echo get_field('link'); ?>"><span class="event_title"><?php the_title(); ?></spzn><span class="event_date"><?php echo date("M d, Y", strtotime(get_field('tf_events_startdate')));?></span><span class="event_time"><?php echo get_field('tf_events_starttime') ?></span></a>
            <?php
          }


      //WP_Query arguments
      wp_reset_postdata();
      //wp_reset_query();


    }
    ?>
      <a class="event_archive_link" href="<?php echo get_permalink( $link_target ); ?>">Event List</a>
    <?php
        
        echo $after_widget;
    $myvariable = ob_get_clean();
    $post = $temp_post;
    echo $myvariable;
    }
    
    function form($instance)
    {
        //Set up some default widget settings.
        $defaults = array(
            'title' => __('Events', 'example'),
            'category' => __('', 'example'),
            'num_posts' => __('5', 'example')
        );
        $instance = wp_parse_args((array) $instance, $defaults);
?>

        <p>
            <label for="<?php
        echo $this->get_field_id('title');
?>"><?php
        _e('Title:', 'example');
?></label>
            <input id="<?php
        echo $this->get_field_id('title');
?>" name="<?php
        echo $this->get_field_name('title');
?>" value="<?php
        echo $instance['title'];
?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php
        echo $this->get_field_id('category');
?>"><?php
        _e('Category (optional):', 'example');
?></label>
<?php
      wp_dropdown_categories(array(
          'id' => $this->get_field_id('category'),
          'name' => $this->get_field_name('category'),
          'selected' => $instance['category'],
          'depth' => 0,
          'show_option_all' => "All Events",
          'orderby' => "NAME",
          'taxonomy' => 'tf_eventcategory'
      ));
?>
        </p>
        <p>
            <label for="<?php
        echo $this->get_field_id('num_posts');
?>"><?php
        _e('Qty Posts:', 'num_posts');
?></label>
            <input id="<?php
        echo $this->get_field_id('num_posts');
?>" name="<?php
        echo $this->get_field_name('num_posts');
?>" value="<?php
        echo $instance['num_posts'];
?>" style="width:100%;" />
        </p>
<p>
        <label for="<?php echo $this->get_field_id('link_target'); ?>"><?php _e('Events Archive Page:'); ?></label>
        <?php
      wp_dropdown_pages(array(
          'id' => $this->get_field_id('link_target'),
          'name' => $this->get_field_name('link_target'),
          'selected' => $instance['link_target'],
          'depth' => 0,
          'show_option_none' => "No Events Archive Page",
          'option_none_value' => "",
      ));
    ?>
    </p> 
      <?php
    }
    
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        
        //Strip tags from title and name to remove HTML
        $instance['title']    = strip_tags($new_instance['title']);
        $instance['category'] = strip_tags($new_instance['category']);
        $instance['num_posts'] = strip_tags($new_instance['num_posts']);
        $instance['link_target'] = strip_tags($new_instance['link_target']);
        return $instance;
    }
}

// Register and load sidebar tiles widget
require_once 'widget-classes/ewb-sidebar-links-home-widget.php';
require_once 'widget-classes/ewb-sidebar-links-inner-widget.php';