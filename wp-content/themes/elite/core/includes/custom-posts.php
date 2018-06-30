<?php 
// add_action( 'init', 'register_cpt_people' );

// function register_cpt_people() {

//     $labels = array( 
//         'name' => _x( 'People', 'people' ),
//         'singular_name' => _x( 'Person', 'people' ),
//         'add_new' => _x( 'Add New', 'people' ),
//         'add_new_item' => _x( 'Add New Person', 'people' ),
//         'edit_item' => _x( 'Edit Person', 'people' ),
//         'new_item' => _x( 'New Person', 'people' ),
//         'view_item' => _x( 'View Person', 'people' ),
//         'search_items' => _x( 'Search People', 'people' ),
//         'not_found' => _x( 'No people found', 'people' ),
//         'not_found_in_trash' => _x( 'No people found in Trash', 'people' ),
//         'parent_item_colon' => _x( 'Parent Person:', 'people' ),
//         'menu_name' => _x( 'People', 'people' ),
//     );

//     $args = array( 
//         'labels' => $labels,
//         'hierarchical' => false,
        
//         'supports' => array( 'title', 'editor', 'thumbnail' ),
//         'taxonomies' => array( 'teams', 'post_tag' ),
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'menu_position' => 20,
//         'show_in_nav_menus' => false,
//         'publicly_queryable' => true,
//         'exclude_from_search' => false,
//         'has_archive' => true,
//         'query_var' => true,
//         'can_export' => true,
//         'rewrite' => true,
//         'capability_type' => 'post'
//     );

//    register_post_type( 'people', $args );
// }



add_action( 'init', 'register_cpt_landing' );

function register_cpt_landing() {

    $labels = array( 
        'name' => _x( 'Landing Page', 'landing' ),
        'singular_name' => _x( 'Landing Page', 'landing' ),
        'add_new' => _x( 'Add New', 'landing' ),
        'add_new_item' => _x( 'Add New Landing Page', 'landing' ),
        'edit_item' => _x( 'Edit Landing Page', 'landing' ),
        'new_item' => _x( 'New Landing Page', 'landing' ),
        'view_item' => _x( 'View Landing Page', 'landing' ),
        'search_items' => _x( 'Search Landing Pages', 'landing' ),
        'not_found' => _x( 'No landing page found', 'landing' ),
        'not_found_in_trash' => _x( 'No landing page found in Trash', 'landing' ),
        'parent_item_colon' => _x( 'Parent Landing Page:', 'landing' ),
        'menu_name' => _x( 'Landing Pages', 'landing' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

   // register_post_type( 'landing', $args );
}


add_action( 'init', 'register_taxonomy_teams' );

function register_taxonomy_teams() {

    $labels = array( 
        'name' => _x( 'Teams', 'teams' ),
        'singular_name' => _x( 'Team', 'teams' ),
        'search_items' => _x( 'Search Teams', 'teams' ),
        'popular_items' => _x( 'Popular Teams', 'teams' ),
        'all_items' => _x( 'All Teams', 'teams' ),
        'parent_item' => _x( 'Parent Team', 'teams' ),
        'parent_item_colon' => _x( 'Parent Team:', 'teams' ),
        'edit_item' => _x( 'Edit Team', 'teams' ),
        'update_item' => _x( 'Update Team', 'teams' ),
        'add_new_item' => _x( 'Add New Team', 'teams' ),
        'new_item_name' => _x( 'New Team', 'teams' ),
        'separate_items_with_commas' => _x( 'Separate teams with commas', 'teams' ),
        'add_or_remove_items' => _x( 'Add or remove teams', 'teams' ),
        'choose_from_most_used' => _x( 'Choose from the most used teams', 'teams' ),
        'menu_name' => _x( 'Teams', 'teams' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'query_var' => true
    );

    //register_taxonomy( 'teams', array('people'), $args );
}

add_action( 'init', 'register_taxonomy_roles' );

function register_taxonomy_roles() {

    $labels = array( 
        'name' => _x( 'Roles', 'roles' ),
        'singular_name' => _x( 'Role', 'roles' ),
        'search_items' => _x( 'Search Roles', 'roles' ),
        'popular_items' => _x( 'Popular Roles', 'roles' ),
        'all_items' => _x( 'All Roles', 'roles' ),
        'parent_item' => _x( 'Parent Role', 'roles' ),
        'parent_item_colon' => _x( 'Parent Role:', 'roles' ),
        'edit_item' => _x( 'Edit Role', 'roles' ),
        'update_item' => _x( 'Update Role', 'roles' ),
        'add_new_item' => _x( 'Add New Role', 'roles' ),
        'new_item_name' => _x( 'New Role', 'roles' ),
        'separate_items_with_commas' => _x( 'Separate roles with commas', 'roles' ),
        'add_or_remove_items' => _x( 'Add or remove roles', 'roles' ),
        'choose_from_most_used' => _x( 'Choose from the most used roles', 'roles' ),
        'menu_name' => _x( 'Roles', 'roles' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

   // register_taxonomy( 'roles', array('people'), $args );
}


if ( ! function_exists( 'sidebar_landing_taxonomy' ) ) {

// Register Custom Taxonomy
function sidebar_landing_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Sidebars', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Sidebar', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Sidebars', 'text_domain' ),
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
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
   // register_taxonomy( 'landing_sidebar', array( 'landing' ), $args );

}

// Hook into the 'init' action
//add_action( 'init', 'sidebar_landing_taxonomy', 0 );

} 


//add_action( 'init', 'create_event_postype' );
 
function create_event_postype() {
 
$labels = array(
    'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'events'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'view_item' => __('View Event'),
    'search_items' => __('Search Events'),
    'not_found' =>  __('No events found'),
    'not_found_in_trash' => __('No events found in Trash'),
    'parent_item_colon' => '',
);
 
$args = array(
    'label' => __('Events'),
    'labels' => $labels,
    'public' => true,
    'can_export' => true,
    'show_ui' => true,
    'has_archive' => true,
    '_builtin' => false,
    'capability_type' => 'post',
    'menu_icon' => get_bloginfo('template_url').'/core/images/icon-datepicker.png',
    'hierarchical' => false,
    'rewrite' => array( "slug" => "events" ),
    'supports'=> array('title') ,
    'show_in_nav_menus' => true,
    'taxonomies' => array( 'tf_eventcategory')
);
 
register_post_type( 'tf_events', $args);}

add_action('pre_get_posts','tf_events_archive_query');
function tf_events_archive_query( $query ) {
    if( $query->is_main_query() && is_post_type_archive('tf_events') ) {
        $today = date('Ymd',strtotime("-1 days"));

            $query->set( 'meta_key', 'tf_events_startdate' );
            $query->set( 'meta_compare', '>');
            $query->set( 'meta_value', $today);
            $query->set( 'posts_per_page', '100' );
            $query->set( 'orderby', 'tf_events_startdate' );
            $query->set( 'order', 'ASC' );
    }
}

function create_eventcategory_taxonomy() {
 
$labels = array(
    'name' => _x( 'Event Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Event Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'popular_items' => __( 'Popular Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Category' ),
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'separate_items_with_commas' => __( 'Separate categories with commas' ),
    'add_or_remove_items' => __( 'Add or remove categories' ),
    'choose_from_most_used' => __( 'Choose from the most used categories' ),
);
 
register_taxonomy('tf_eventcategory','tf_events', array(
    'label' => __('Event Category'),
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event-category' ),
));
}
 
add_action( 'init', 'create_eventcategory_taxonomy', 0 );

add_filter ("manage_edit-tf_events_columns", "tf_events_edit_columns");
add_action ("manage_posts_custom_column", "tf_events_custom_columns");
 
function tf_events_edit_columns($columns) {
 
$columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Event",
    "tf_col_ev_date" => "Date",
    "tf_col_ev_desc" => "Description",
    "tf_col_ev_cat" => "Category",
    );
return $columns;
}
 
function tf_events_custom_columns($column)
{
    global $post;
    $custom = get_post_custom();
    switch ($column)
    {
    case "tf_col_ev_cat":
        // - show taxonomy terms -
        $eventcats = get_the_terms($post->ID, "tf_eventcategory");
        $eventcats_html = array();
        if ($eventcats) {
        foreach ($eventcats as $eventcat)
        array_push($eventcats_html, $eventcat->name);
        echo implode($eventcats_html, ", ");
        } else {
        _e('None', 'themeforce');;
        }
    break;
    case "tf_col_ev_date":
        // - show dates -
        $startd = $custom["tf_events_startdate"][0];
        //$startdate = date("F j, Y", $startd);
        $parsed_date  = date_parse_from_format('Ymd', $startd);
        echo $parsed_date['day'] . "/" . $parsed_date['month'] ."/". $parsed_date['year'];
    break;
    case "tf_col_ev_times":
        // - show times -
        $startt = $custom["tf_events_startdate"][0];
        $endt = $custom["tf_events_enddate"][0];
        $time_format = get_option('time_format');
        $starttime = date($time_format, $startt);
        $endtime = date($time_format, $endt);
        echo $starttime . ' - ' .$endtime;
    break;
    case "tf_col_ev_thumb":
        // - show thumb -
        $post_image_id = get_post_thumbnail_id(get_the_ID());
        if ($post_image_id) {
        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
        if ($thumbnail) (string)$thumbnail = $thumbnail[0];
        echo '<img src="';
        echo bloginfo('template_url');
        echo '/timthumb/timthumb.php?src=';
        echo $thumbnail;
        echo '&h=60&w=60&zc=1" alt="" />';
    }
    break;
    case "tf_col_ev_desc";
        the_excerpt();
    break;
     
    }
}