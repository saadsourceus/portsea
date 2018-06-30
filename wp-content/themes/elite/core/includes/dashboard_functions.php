<?php 

//Add Roles To Editor
	$role = get_role('editor');
	$role->add_cap('edit_theme_options');
	$role->add_cap('edit_users');
	$role->add_cap('list_users'); 
	$role->add_cap('create_users');
	$role->add_cap('delete_users');
	$role->add_cap('manage_options');

//Hide Menu Items From Admin Dashboard
	add_action( 'admin_init', 'my_remove_menu_pages' );
	function my_remove_menu_pages() {
		if(!current_user_can('add_users')) {
			remove_menu_page( 'link-manager.php' ); 
			remove_menu_page( 'edit.php?post_type=acf' ); 
			remove_submenu_page( 'themes.php', 'customize.php' );
			remove_submenu_page( 'themes.php', 'themes.php?page=custom-header' );
			remove_submenu_page( 'themes.php', 'themes.php' );
			remove_submenu_page( 'options-general.php', 'options-general.php' );
			remove_submenu_page( 'options-general.php', 'options-writing.php' );
			remove_submenu_page( 'options-general.php', 'options-reading.php' );
			//remove_submenu_page( 'options-general.php', 'options-media.php' );
			remove_submenu_page( 'options-general.php', 'options-permalink.php' );
		}
	}
	
	function remove_admin_bar_links() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('new-link');       // Remove the user details tab
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

	add_action( 'after_setup_theme','remove_twentyeleven_options', 100 );
	function remove_twentyeleven_options() {
		if(!current_user_can('add_users')) {
			remove_theme_support( 'custom-background' );
			remove_theme_support( 'custom-header' );
		}
	}


//Rename Appearance Menu	
	function edit_admin_menus() {
	    global $menu;
     		if(!current_user_can('add_users')) {
			    $menu[60][0] = 'Menus & Widgets'; // Change Posts to Recipes
			}
	}
	add_action( 'admin_menu', 'edit_admin_menus' );
	
	function remove_wp_update_notice() {
		if ( !current_user_can('add_users') ) {
		  remove_action( 'admin_notices', 'update_nag', 3);
		  }
	}
	add_action('admin_init', 'remove_wp_update_notice');
	
	
//Allow Editors to create users (editor & below)	
	class FSP_User_Caps {

	  // Add our filters
	  function FSP_User_Caps(){
	    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
	    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
	  }

	  // Remove 'Administrator' from the list of roles if the current user is not an admin
	  function editable_roles( $roles ){
	    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
	      unset( $roles['administrator']);
	    }
	    return $roles;
	  }

	  // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
	  function map_meta_cap( $caps, $cap, $user_id, $args ){

	    switch( $cap ){
	        case 'edit_user':
	        case 'remove_user':
	        case 'promote_user':
	            if( isset($args[0]) && $args[0] == $user_id )
	                break;
	            elseif( !isset($args[0]) )
	                $caps[] = 'do_not_allow';
	            $other = new WP_User( absint($args[0]) );
	            if( $other->has_cap( 'administrator' ) ){
	                if(!current_user_can('administrator')){
	                    $caps[] = 'do_not_allow';
	                }
	            }
	            break;
	        case 'delete_user':
	        case 'delete_users':
	            if( !isset($args[0]) )
	                break;
	            $other = new WP_User( absint($args[0]) );
	            if( $other->has_cap( 'administrator' ) ){
	                if(!current_user_can('administrator')){
	                    $caps[] = 'do_not_allow';
	                }
	            }
	            break;
	        default:
	            break;
	    }
	    return $caps;
	  }

	}

	$fsp_user_caps = new FSP_User_Caps();
 
	// hide admin from user list
	add_action('pre_user_query','isa_pre_user_query');
	function isa_pre_user_query($user_search) {
	  $user = wp_get_current_user();
	  if ($user->ID!=1) { // Is not administrator, remove administrator
	    global $wpdb;
	    $user_search->query_where = str_replace('WHERE 1=1',
	      "WHERE 1=1 AND {$wpdb->users}.ID<>1",$user_search->query_where);
	  }
	}
//Hide toolbar appearance menu	
	function FSP_admin_bar_render() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('appearance');
	}
	add_action( 'wp_before_admin_bar_render', 'FSP_admin_bar_render' );

//Remove dashboard widgets	
	function fsp_remove_dashboard_widgets() {
	    global $wp_meta_boxes;
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['welcome-panel']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['vfb-dashboard']);
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	}
	if (!current_user_can('add_users')) {
	    add_action('wp_dashboard_setup', 'fsp_remove_dashboard_widgets' );
	}

//Remove  WordPress Welcome Panel
	remove_action('welcome_panel', 'wp_welcome_panel');
	
	add_action('wp_dashboard_setup', 'fsp_dashboard_widgets');


//Add custom admin dashboard widget
	function fsp_dashboard_widgets() {
		global $wp_meta_boxes;
		if (!current_user_can('add_users')) {
			wp_add_dashboard_widget('custom_dashboard_elite', 'Elite Site Dashboard', 'custom_dashboard_elite');
		}
	}
	function custom_dashboard_elite() {
		echo '<div class="dash-helper clearfix">';
		echo '<a class="panel" href="'.get_admin_url() .'edit.php">
                    <div class=" dashicons-before dashicons-admin-post">
						<h4 class="thin">News Items</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'edit-tags.php?taxonomy=category">
                    <div class=" dashicons-before dashicons-category">
						<h4 class="thin">News Categories</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'edit.php?post_type=page">
                    <div class=" dashicons-before dashicons-admin-page">
						<h4 class="thin">Pages</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'edit.php?post_type=landing">
                    <div class=" dashicons-before dashicons-schedule">
						<h4 class="thin">Landing Pages</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'edit.php?post_type=people">
                    <div class=" dashicons-before dashicons-universal-access-alt">
						<h4 class="thin">Players & Staff</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'edit-tags.php?taxonomy=teams&post_type=people">
                    <div class=" dashicons-before dashicons-groups">
						<h4 class="thin">Teams</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'admin.php?page=acf-options-major-partners">
                    <div class=" dashicons-before dashicons-megaphone">
						<h4 class="thin">Sponsors</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'upload.php">
                    <div class=" dashicons-before dashicons-admin-media">
						<h4 class="thin">Images & Files</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'nav-menus.php">
                    <div class=" dashicons-before dashicons-list-view">
						<h4 class="thin">Menus</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'nav-menus.php?action=edit&menu=0">
                    <div class=" dashicons-before dashicons-list-view">
						<h4 class="thin">Add New Menu</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'widgets.php">
                    <div class=" dashicons-before dashicons-welcome-widgets-menus">
						<h4 class="thin">Widgets</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'admin.php?page=acf-options-major-partners">
                    <div class=" dashicons-before dashicons-admin-generic">
						<h4 class="thin">Site Options</h4>
					</div>
            </a>';
		echo '<a class="panel" href="'.get_admin_url() .'users.php">
                    <div class=" dashicons-before dashicons-admin-users">
						<h4 class="thin">User Management</h4>
					</div>
            </a>';
		echo '</div>';
	}

// force one-column dashboard
	function shapeSpace_screen_layout_columns($columns) {
		$columns['dashboard'] = 1;
		return $columns;
	}
	if (!current_user_can('add_users')) {
		add_filter('screen_layout_columns', 'shapeSpace_screen_layout_columns');
	}

	function shapeSpace_screen_layout_dashboard() { return 1; }
	add_filter('get_user_option_screen_layout_dashboard', 'shapeSpace_screen_layout_dashboard');

//Admin CSS	
	function my_admin_theme_style() {
	    wp_enqueue_style('my-admin-style', get_template_directory_uri() . '/admin-style.css');
	}
	add_action('admin_enqueue_scripts', 'my_admin_theme_style');
	add_action('login_enqueue_scripts', 'my_admin_theme_style');	


//Remove WordPress Toolbar Menu
	add_action( 'wp_before_admin_bar_render', function() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
	}, 7 );
//Dashboard Footer
	function fsp_edit_footer()
	{
	    add_filter( 'admin_footer_text', 'fsp_edit_text', 11 );
	}

	function fsp_edit_text($content) {
	    return "<a href='http://sportsolutions.foxsportspulse.com'>FOX SPORTS PULSE</a> Elite Website";
	}
	add_action( 'admin_init', 'fsp_edit_footer' );	
	
//Remove Help Menu
	add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
	function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
	    $screen->remove_help_tabs();
	    return $old_help;
	}
//Remove Unwanted Widgets
	function my_widgets_init() {
	    unregister_widget( 'WP_Widget_Calendar' );
	    unregister_widget( 'WP_Widget_Archives' );
	    unregister_widget( 'WP_Widget_Links' );
	    unregister_widget( 'WP_Widget_Meta' );
		unregister_widget('Twenty_Eleven_Ephemera_Widget');	
		unregister_widget('GADSH_Frontend_Widget');	
	}
	add_action('widgets_init', 'my_widgets_init');

// Add Toolbar Menu
	function fsp_custom_toolbar() {
		global $wp_admin_bar;

		$args = array(
			'id'     => 'return-to-dash',
			'title'  => 'Return To Website Dashboard',
			'href'   => get_admin_url(),
			'meta'   => array(
				'title'    => 'Return To Dashboard',
				'class'    => 'dashicons-before dashicons-dashboard',			),
		);
		$wp_admin_bar->add_menu( $args );

	}

	add_action( 'wp_before_admin_bar_render', 'fsp_custom_toolbar', 999 );	
	
//Hide Admin Color Schemes in Profiles
	function admin_color_scheme() {
	   global $_wp_admin_css_colors;
	   $_wp_admin_css_colors = 0;
	}
	add_action('admin_head', 'admin_color_scheme');	

//Change Howdy 	
	function replace_howdy( $wp_admin_bar ) {
		$my_account=$wp_admin_bar->get_node('my-account');
		$newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );
		$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtitle,
		) );
	}
	add_filter( 'admin_bar_menu', 'replace_howdy',25 );