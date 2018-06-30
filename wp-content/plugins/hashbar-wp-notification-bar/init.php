


<?php
/**
 * Plugin Name: HashBar - WordPress Notification Bar
 * Plugin URI: http://demo.wphash.com/hashbar/
 * Description: Notification Bar plugin for WordPress
 * Version: 1.0.4
 * Author: Dev Items
 * Author URI: https://devitems.com
 * Text Domain: hashbar
 * License:  GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/


// define path
define( 'HASHBAR_WPNB_URI', plugins_url('', __FILE__) );
define( 'HASHBAR_WPNB_DIR', dirname( __FILE__ ) );

// include all files
include_once( HASHBAR_WPNB_DIR. '/inc/custom-posts.php');
include_once( HASHBAR_WPNB_DIR. '/inc/shortcode.php');
include_once( HASHBAR_WPNB_DIR. '/admin/cmb2/init.php');


add_action( 'cmb2_admin_init', 'hashbar_wpnb_add_metabox' );
function hashbar_wpnb_add_metabox(){
    include_once( HASHBAR_WPNB_DIR. '/inc/metabox.php');
}

// define text domain path
function hashbar_wpnb_textdomain() {
    load_plugin_textdomain( 'hashbar', false, basename(HASHBAR_WPNB_URI) . '/languages/' );
}
add_action( 'init', 'hashbar_wpnb_textdomain' );

// enqueue scripts
add_action( 'wp_enqueue_scripts','hashbar_wpnb_enqueue_scripts');
function  hashbar_wpnb_enqueue_scripts(){
    // enqueue styles
    wp_enqueue_style( 'material-design-iconic-font', HASHBAR_WPNB_URI.'/css/material-design-iconic-font.min.css');
    wp_enqueue_style( 'hashbar-notification-bar', HASHBAR_WPNB_URI.'/css/notification-bar.css');

    // enqueue js
     wp_enqueue_script( 'hashbar-main-js', HASHBAR_WPNB_URI.'/js/main.js', array('jquery'), '', false);
}

add_action( 'wp_footer', 'hashbar_wpnb_load_notification_to_footer' );
function hashbar_wpnb_load_notification_to_footer(){
    $args = array('post_type' => 'wphash_ntf_bar');

    $ntf_query = new WP_Query($args);

    while($ntf_query->have_posts()){
        $ntf_query->the_post();

        $post_id = get_the_id();

        $where_to_show = get_post_meta( $post_id , '_wphash_notification_where_to_show', true );

        if($where_to_show  == 'custom'){
             $where_to_show_custom =  get_post_meta( $post_id , '_wphash_notification_where_to_show_custom', true );

             if(!empty($where_to_show_custom)){
                 foreach( $where_to_show_custom as $item){
                    if(is_front_page() && $item == 'home'){
                       hashbar_wpnb_output($post_id);
                    }

                    if(is_single() && $item == 'posts'){
                        hashbar_wpnb_output($post_id);
                    }

                    if(is_page() && $item == 'page' ){
                       hashbar_wpnb_output($post_id);
                    }
                 }
             }

        } elseif ($where_to_show  == 'everywhere' ){
              hashbar_wpnb_output($post_id);
        }
    }
}
    

//notification bar output
function hashbar_wpnb_output($post_id){

    $positon = get_post_meta( $post_id , '_wphash_notification_position', true );
    $positon = !empty($positon) ? $positon : 'ht-n-top';

    $on_mobile = get_post_meta( $post_id, '_wphash_notification_on_mobile', true );
    $display = get_post_meta( $post_id , '_wphash_notification_display', true );
    $display = !empty($display) ? $display : 'ht-n-open';

    $content_width = get_post_meta( $post_id, '_wphash_notification_content_width', true );

    $content_color = get_post_meta( $post_id, '_wphash_notification_content_text_color', true );
    $content_bg_color = get_post_meta( $post_id, '_wphash_notification_content_bg_color', true );
    $content_bg_image = get_post_meta( $post_id, '_wphash_notification_content_bg_image', true );
    $content_bg_opacity = get_post_meta( $post_id, '_wphash_notification_content_bg_opcacity', true );

    //button options
    $close_button = get_post_meta( $post_id, '_wphash_notification_close_button', true );
    $button_text = get_post_meta( $post_id, '_wphash_notification_close_button_text', true );
    $button_text = !empty($button_text) ? $button_text : esc_html__( 'Close', 'hashbar' );

    $open_button_text = get_post_meta( $post_id, '_wphash_notification_open_button_text', true );

    $close_button_bg_color = get_post_meta( $post_id, '_wphash_notification_close_button_bg_color', true );
    $close_button_color = get_post_meta( $post_id, '_wphash_notification_close_button_color', true );
    $close_button_hover_color = get_post_meta( $post_id, '_wphash_notification_close_button_hover_color', true );
    $close_button_hover_bg_color = get_post_meta( $post_id, '_wphash_notification_close_button_hover_bg_color', true );

    $arrow_color = get_post_meta( $post_id, '_wphash_notification_arrow_color', true );
    $arrow_bg_color = get_post_meta( $post_id, '_wphash_notification_arrow_bg_color', true );
    $arrow_hover_color = get_post_meta( $post_id, '_wphash_notification_arrow_hover_color', true );
    $arrow_hover_bg_color = get_post_meta( $post_id, '_wphash_notification_arrow_hover_bg_color', true );

    $css_style = '';
    if(!empty($content_color)){
        $css_style .= "#notification-$post_id .ht-notification-text,#notification-$post_id .ht-notification-text p{color:$content_color}";
    }

    if(!empty($content_bg_color)){
        $css_style .= "#notification-$post_id::before{background-color:$content_bg_color}";
    }

    if(!empty($content_bg_image)){
        $css_style .= "#notification-$post_id::before{background-image:url($content_bg_image)}";
    }

    if(!empty($content_bg_opacity)){
        $css_style .= "#notification-$post_id::before{opacity:$content_bg_opacity}";
    }

    $css_style .= "#notification-$post_id .ht-n-close-toggle{background-color:$close_button_bg_color}";
    $css_style .= "#notification-$post_id .ht-n-close-toggle,#notification-$post_id .ht-n-close-toggle i{color:$close_button_color}";
    $css_style .= "#notification-$post_id .ht-n-close-toggle:hover{background-color:$close_button_hover_bg_color}";
    $css_style .= "#notification-$post_id .ht-n-close-toggle:hover{color:$close_button_hover_color}";
    $css_style .= "#notification-$post_id .ht-n-close-toggle:hover i{color:$close_button_hover_color}";

    $css_style .= "#notification-$post_id .ht-n-open-toggle{background-color:$arrow_bg_color}";
    $css_style .= "#notification-$post_id .ht-n-open-toggle{color:$arrow_color}";

    $css_style .= "#notification-$post_id .ht-n-open-toggle:hover i{color:$arrow_hover_color}";
    $css_style .= "#notification-$post_id .ht-n-open-toggle:hover{background-color:$arrow_hover_bg_color}";

    $responsive_style = '';
    if($on_mobile == 'off'){
        $responsive_style = "@media (max-width: 767px){#notification-$post_id{display:none}}";
    }

    // change arrow icon with position
    switch ($positon) {
        case 'ht-n-left':
            $arrow_class = 'zmdi zmdi-long-arrow-right';
            break;

        case 'ht-n-right':
            $arrow_class = 'zmdi zmdi-long-arrow-left';
            break;

        case 'ht-n-bottom':
            $arrow_class = 'zmdi zmdi-long-arrow-up';
            break;
        
        default:
            $arrow_class = 'zmdi zmdi-long-arrow-down';
            break;
    }

    ?>

    <!--Notification Section-->
    <div id="notification-<?php echo esc_attr( $post_id ); ?>" class="ht-notification-section <?php echo esc_attr($content_width); ?> <?php echo esc_attr($positon); ?> <?php echo esc_attr($display); ?>">

        <!--Notification Open Buttons-->
        <?php if(empty($open_button_text)): ?>
            <span class="ht-n-open-toggle"><i class="<?php echo esc_attr($arrow_class); ?>"></i></span>
        <?php else: ?>
             <span class="ht-n-open-toggle has_text"><span><?php echo esc_html($open_button_text); ?></span></span>
        <?php endif; ?>

        <div class="ht-notification-wrap">
            <div class="<?php echo $content_width == 'ht-n-full-width' ? esc_attr( 'ht-n-container_full_width' ) : esc_attr('ht-n-container'); ?>">

                <?php if($close_button != 'off'): ?>
                <!--Notification Buttons-->
                <div class="ht-notification-buttons">
                    <button class="ht-n-close-toggle" data-text="<?php echo esc_html( $button_text ); ?>"><i class="zmdi zmdi-close"></i></button>
                </div>
                <?php endif; ?>

                <!--Notification Text-->
                <div class="ht-notification-text">
                    <?php the_content(); ?>
                </div>


            </div>
        </div>

    </div>


    <style type="text/css">
        <?php echo esc_html($css_style.$responsive_style); ?>
    </style>

    <?php
}


// page builder support for content editor
add_action( 'init', 'hashbar_wpnb_page_builder_support' );
function hashbar_wpnb_page_builder_support(){
    //king composer support
    global $kc;

    if($kc){
        $kc->add_content_type( 'wphash_ntf_bar' );
    }

    //vc support
    if( class_exists( 'VC_Manager' ) ){
        $list = array(
            'wphash_ntf_bar'
        );
        
        vc_set_default_editor_post_types( $list );
    }
}
