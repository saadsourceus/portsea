<?php
/**
 * Functions Insatll
 *
 * Functions for installation & activation
 *
 * @package        Responsive
 * @license        license.txt
 * @copyright      2014 CyberChimps
 * @since          1.9.5.0
 *
 * Please do not edit this file. This file is part of the Responsive and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * WordPress Widgets start right here.
 */
function responsive_widgets_init() {

    register_sidebar( array(
                          'name'          => __( 'CB Home Sidebar', 'responsive' ),
                          'description'   => __( 'Area 1 - sidebar.php - Displays on Default, Blog, Blog Excerpt page templates', 'responsive' ),
                          'id'            => 'main-sidebar',
                          'before_title'  => '<h3 class="widget-title">',
                          'after_title'   => '</h3>',
                          'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
                          'after_widget'  => '</div>'
                      ) );

   register_sidebar( array(
                         'name'          => __( 'CB Inner Sidebar', 'responsive' ),
                         'description'   => __( 'Area 2 - sidebar-external-links-inner.php - Displays on Content/Sidebar page templates', 'responsive' ),
                         'id'            => 'inner-sidebar',
                         'before_title'  => '<h3 class="widget-title">',
                         'after_title'   => '</h3>',
                         'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
                         'after_widget'  => '</div>'
                     ) );

    // register_sidebar( array(
    //                       'name'          => __( 'Left Footer Widget', 'responsive' ),
    //                       'description'   => __( 'Left Footer Widget - Used for Contact Details', 'responsive' ),
    //                       'id'            => 'left-footer',
    //                       'before_title'  => '<h3 class="widget-title">',
    //                       'after_title'   => '</h3>',
    //                       'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
    //                       'after_widget'  => '</div>'
    //                   ) );

    // register_sidebar( array(
    //                       'name'          => __( 'Right Footer Widget', 'responsive' ),
    //                       'description'   => __( 'Right Footer Widget - Used for Search Widget ect.', 'responsive' ),
    //                       'id'            => 'right-footer',
    //                       'before_title'  => '<h3 class="widget-title">',
    //                       'after_title'   => '</h3>',
    //                       'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
    //                       'after_widget'  => '</div>'
    //                   ) );
  
      // register_sidebar( array(
      //                     'name'          => __( 'Facebook Sidebar', 'responsive' ),
      //                     'description'   => __( 'Facebook Sidebar for Categories ect.', 'responsive' ),
      //                     'id'            => 'facebook-sidebar',
      //                     'before_title'  => '<h3 class="widget-title">',
      //                     'after_title'   => '</h3>',
      //                     'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
      //                     'after_widget'  => '</div>'
      //                 ) );

	  $term_args = array(
	    'hide_empty' => false,
	    'orderby' => 'name',
	    'order' => 'ASC'
	  );

}

add_action( 'widgets_init', 'responsive_widgets_init' );



/* Add fit class to third footer widget */
function responsive_footer_widgets( $params ) {

    global $footer_widget_num; //Our widget counter variable

    //Check if we are displaying "Footer Sidebar"
    if ( $params[0]['id'] == 'footer-widget' ) {
        $footer_widget_num++;
        $divider = 3; //This is number of widgets that should fit in one row

        //If it's third widget, add last class to it
        if ( $footer_widget_num % $divider == 0 ) {
            $class                      = 'class="fit ';
            $params[0]['before_widget'] = str_replace( 'class="', $class, $params[0]['before_widget'] );
        }
    }

    return $params;
}

add_filter( 'dynamic_sidebar_params', 'responsive_footer_widgets' );
