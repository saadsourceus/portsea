<?php

//On Page Menu Shortcode [pagemenu name="menuname"]
function print_menu_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array( 'name' => null, ), $atts ) );
    return wp_nav_menu( array(
            'menu' => $name,
            'echo' => false,
            'container' => 'div',
            'container_id' => 'onpagemenu',
            'container_class' => '',
            'menu_class'      => 'onpagemenu',
        ) );
}
add_shortcode( 'pagemenu', 'print_menu_shortcode' );


//Web Page ScreenShot - [screenshot url="http://wpsnipp.com" alt="wordpress code snippets for your blog" width="200" height="200"]

function wps_screenshot( $atts, $content = null ) {
    extract( shortcode_atts( array(
                "screenshot" => 'http://s.wordpress.com/mshots/v1/',
                "url" => 'http://',
                "alt" => 'screenshot',
                "width" => '400',
                "height" => '300'
            ), $atts ) );
    return $screen = '<img src="' . $screenshot . '' . urlencode( $url ) . '?w=' . $width . '&h=' . $height . '" alt="' . $alt . '"/>';
}
add_shortcode( "screenshot", "wps_screenshot" );


// Add Shortcode
function external_content_shortcode( $atts , $content = null ) {

    // Attributes
    extract( shortcode_atts(
            array(
                'selector' => '#col-1-2-wrap',
                'search' => '',
                'replace' => '',
            ), $atts )
    );

    // Code
    include_once 'simple_html_dom.php';
    $html = file_get_html( $content );
    $elem = $html->find( $selector, 0 );
    $elem = str_replace( $search, $replace, $elem );
    return $elem;
}
add_shortcode( 'external_content', 'external_content_shortcode' );

function competition_content_shortcode( $atts , $content = null ) {

    // Attributes
    extract( shortcode_atts(
            array(
                'url' => '',
                'style' => 'comps.css',
                'view' => "full",
                'override' => '0',
            ), $atts )
    );

    $cssPath = base64_encode( get_stylesheet_directory_uri() . '/' .$style );

    if ($_SERVER['QUERY_STRING'] != "") {
        $url = "http://foxsportspulse.com/" . $_SERVER['QUERY_STRING'];
    }

    // Code
    $url .= "&cpath=" . $cssPath. "&v=" . $view . $qstring;

    $elem = '<div id="iframeDiv" style="overflow: hidden; text-align: center">';
    $elem .= '    <iframe frameborder="0" id="externalFrame" src="'.$url.'" style="margin-top: -'.$override.'px;" height=0 scrolling="no" data-override='.$override.'></iframe>';
    $elem .= '</div>';

    return $elem;
}
add_shortcode( 'competition', 'competition_content_shortcode' );

function events_list_shortcode( $atts ) {

    global $post;
    $temp_post = $post;

    ob_start();
    extract( shortcode_atts( array(
                'category' => "",
                'posts' => -1,
            ), $atts ) );


    $today = date( 'Ymd', strtotime( "-1 days" ) );

    if ( $category != "" ) {
        $tax_query = array(
            array(
                'taxonomy' => 'tf_eventcategory',
                'field' => 'slug',
                'terms' => $category,
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
        'posts_per_page'        => $posts,
        'ignore_sticky_posts'   => true,
        'orderby' => 'tf_events_startdate',
        'order' => "ASC",
        'tax_query' => $tax_query
    );
    $event_query = new WP_Query( $args );
    if ( $event_query->have_posts() ) {
?>
            <div class="elite_events_list">
                <ul>
        <?php
        while ( $event_query->have_posts() ) {
            $event_query->the_post();
            setup_postdata( $post );
?>
               <a class="event_list_row" href="<?php echo get_field( 'link' ); ?>"> <li>  <span class="event_title"><?php the_title(); ?></span><span class="event_date"><?php echo date( "d M Y", strtotime( get_field( 'tf_events_startdate' ) ) );?></span><span class="event_time"><?php echo get_field( 'tf_events_starttime' ) ?></span></li></a>
              <?php
        } ?>
         </ul>
       <?php wp_reset_postdata();
?>
            </div>
        <?php
    }

    $myvariable = ob_get_clean();
    $post = $temp_post;

    return $myvariable;
}

add_shortcode( 'events_list', 'events_list_shortcode' );

add_shortcode( 'medium_news', 'medium_news_shortcode' );
function medium_news_shortcode( $atts ) {

    global $post;
    $temp_post = $post;

    ob_start();
    extract( shortcode_atts( array(
                'cat' => "featured",
                'posts' => 2,
            ), $atts ) );      //WP_Query arguments

    $news_category = get_category_by_slug( $cat );
    $news_category = $news_category->term_id;
    $news_items = array();
    $news_items[0] = $posts;

    include locate_template( 'includes/section-medium-news.php' );


    wp_reset_postdata();
    //wp_reset_query();
    $myvariable = ob_get_clean();

    $post = $temp_post;

    return $myvariable;
}

add_shortcode( 'short_news', 'short_news_shortcode' );
function short_news_shortcode( $atts ) {

    global $post;
    $temp_post = $post;

    ob_start();
    extract( shortcode_atts( array(
                'cat' => "",
                'posts' => 4,
                'target' => 'self',
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
        echo "<div class='panel_short_news'>";
        while ( $pantest_query->have_posts() ) {
            $pantest_query->the_post();
            setup_postdata( $post );

?>
              <a target="_<?php echo $target; ?>" class="panel_news_sub_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
add_shortcode( 'single-post', 'single_news_shortcode' );
function single_news_shortcode( $atts ) {

    global $post;
    $temp_post = $post;

    ob_start();
    extract( shortcode_atts( array(
                'cat' => "",
                'posts' => 1,
                'single_id' => '0',
                'image_size' => 'orig'
            ), $atts ) );
    $args = array (
        'p'          => $single_id,
    );

    // The Query
    $pantest_query = new WP_Query( $args );
    //print_r($args);
    if ( $pantest_query->have_posts() ) {
        echo "<div class='panel_short_news'>";
        while ( $pantest_query->have_posts() ) {
            $pantest_query->the_post();
            setup_postdata( $post );

?>
        <?php 
        if ( has_post_thumbnail()) {
            if($image_size != 'alt'){
                $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider');
                $featured_image = $thumb_image_url[0];
            } else {
                $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'panel-alt');
                $featured_image = $thumb_image_url[0];
            }
         } else { 
            $featured_image = get_stylesheet_directory_uri().'/core/images/placeholder.jpg';
            ?>
        <?php } ?>
        <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $featured_image; ?>" alt=""></a>
        <a class="single-short-news-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <p><?php echo get_excerpt(220); ?></p>
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

add_shortcode( 'panel_news', 'panel_news_shortcode' );
function panel_news_shortcode( $atts ) {

    global $post;
    $temp_post = $post;

    ob_start();
    extract( shortcode_atts( array(
                'category' => "national-teams",
                'posts' => 4,
            ), $atts ) );
    $args = array (
        'category_name'          => $category,
        'posts_per_page'         => $posts,
        'ignore_sticky_posts'    => true,
        'order'                  => 'DESC',
        'orderby'                => 'date',
    );

    // The Query
    $pantest_query = new WP_Query( $args );

    $first_post = true;

    if ( $pantest_query->have_posts() ) {
        echo "<div class='panel_news'>";
        while ( $pantest_query->have_posts() ) {
            $pantest_query->the_post();
            setup_postdata( $post );
            if ( $first_post ) {
                if ( has_post_thumbnail() ) {
                    $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider' );
                    $featured_image = $thumb_image_url[0];
                } else {
                    $featured_image = get_stylesheet_directory_uri().'/core/images/placeholder.jpg';
                } ?>
            <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $featured_image; ?>" alt=""></a>
              <a class="panel_news_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <div class="panel_excerpt">
              <?php echo excerpt( get_the_excerpt(), 25 ); ?>
            </div>
          <?php
                $first_post = false;
            } else {
?>
              <a class="panel_news_sub_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php
            }
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
