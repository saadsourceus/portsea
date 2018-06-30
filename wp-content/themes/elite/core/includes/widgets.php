<?php
class wp_post_cat extends WP_Widget
{
    // constructor
    function wp_post_cat()
    {
        $widget_ops = array(
            'classname' => 'widget_post_cat',
            'description' => __('A widget to display the post category.')
        );
        parent::__construct('category', __('News Widget'), $widget_ops);
    }
    
    // widget display
    function widget($args, $instance)
    {
        echo $before_widget;
        
        echo $after_widget;
    }
    
    // widget form creation
    function form($instance)
    {
        $title    = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $category = isset($instance['category']) ? absint($instance['category']) : '';
?>
			
			<select name="event-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
			<option value=""><?php
        echo esc_attr(__('Select News Category'));
?></option> 
			</select>
		<?php
    }
    
    // widget update
    function update($new_instance, $old_instance)
    {
        /* ... */
    }
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_post_cat");'));



class fsp_iframe extends WP_Widget
{
    // constructor
    function fsp_iframe()
    {
        $widget_ops  = array(
            'classname' => 'fsp_iframe',
            'description' => __('A widget to display an embedded iframe.')
        );
        $control_ops = array(
            'width' => 300,
            'height' => 350,
            'id_base' => 'example-iframe-widget'
        );
        parent::__construct('fsp_iframe', __('FSP Iframe'), $widget_ops);
    }
    
    // widget display
    function widget($args, $instance)
    {
        extract($args);
        $title    = apply_filters('widget_title', $instance['title']);
        $url      = $instance['url'];
        $seamless = isset($instance['seamless']) ? $instance['seamless'] : false;
        
        echo $before_widget;
        
        // Display the widget title 
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        //Display the name 
        if ($seamless) {
            $iframe_style = " seamless";
        }
        if ($url) {
            echo '<iframe src="' . $url . '" ' . $seamless . '></iframe>';
        }
        
        echo $after_widget;
    }
    
    function form($instance)
    {
        //Set up some default widget settings.
        $defaults = array(
            'title' => __('Iframe', 'example'),
            'url' => __('http://foxsportspulse.com', 'example'),
            'seamless' => true
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $checked  = "";
        if ($instance['seamless']) {
            $checked = "checked";
        }
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
        echo $this->get_field_id('url');
?>"><?php
        _e('URL:', 'example');
?></label>
			    <input id="<?php
        echo $this->get_field_id('url');
?>" name="<?php
        echo $this->get_field_name('url');
?>" value="<?php
        echo $instance['url'];
?>" style="width:100%;" />
			</p>
			<p>
			    <input class="checkbox" type="checkbox" <?php
        echo $checked;
?> id="<?php
        echo $this->get_field_id('seamless');
?>" name="<?php
        echo $this->get_field_name('seamless');
?>" /> 
			    <label for="<?php
        echo $this->get_field_id('seamless');
?>"><?php
        _e('Seamless Frame', 'example');
?></label>
			</p>
		<?php
    }
    
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        
        //Strip tags from title and name to remove HTML
        $instance['title']    = strip_tags($new_instance['title']);
        $instance['url']      = strip_tags($new_instance['url']);
        $instance['seamless'] = $new_instance['seamless'];
        
        return $instance;
    }
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("fsp_iframe");'));


//Admin Dashboard Widget
// add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets()
{
    global $wp_meta_boxes;
    
    wp_add_dashboard_widget('custom_help_widget', 'Repository Updates', 'custom_dashboard_help');
}

function custom_dashboard_help()
{
    
    if (is_admin()) {
        $project = "fsp-wordpress-starter";
        $url     = 'https://bitbucket.org/api/2.0/repositories/fsptest/' . $project . '/commits';
        
        // Initializing curl
        $ch = curl_init($url);
        
        // Configuring curl options
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-type: application/json'
            ),
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => "gavinsmith:Gbs1-Gbs1"
        );
        // Setting curl options
        curl_setopt_array($ch, $options);
        // Getting results
        $result   = curl_exec($ch); // Getting JSON result string
        $data     = json_decode($result, true);
        $rep_url  = $data['values'][0]['repository']['full_name'] . "/";
        $rep_icon = $data['values'][0]['repository']['links']['avatar']['href'];
        $rep_name = $data['values'][0]['repository']['name'];
        $output   = "<table class='fsp-bb-table'><tr style='text-align: left'><th width='70%'>Message</th><th width='15%'>Date</th><th width='30%'>User</th></tr>";
        $arr      = $data['values'];
        for ($i = 0; $i < 5; $i++) {
            $value = $arr[$i]; //print_r($value);
            $output .= "<tr>";
            $output .= "<td><a href='" . $value['links']['html']['href'] . "' target='_blank'>" . $value['message'] . "</a></td>";
            $output .= "<td>" . $value['date'] . "</td>";
            $output .= "<td><img height='20' width='20' style='margin-right: 5px;' src='" . $value['author']['user']['links']['avatar']['href'] . "' />" . $value['author']['user']['display_name'] . "</td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
        
        $header = "<h2><img style='margin-right: 5px;' height='25' width='25' src='" . $rep_icon . "' /><a href='https://bitbucket.org/" . $rep_url . "'  target='_blank'>" . $rep_name . "</a></h2>";
        $header .= "<h3>Last 5 Commits</h3>";
        
        echo $header;
        echo $output;
    } else {
        echo "You need to be an administrator to view this content";
    }
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

function remove_dashboard_widgets()
{
    
    //Completely remove various dashboard widgets (remember they can also be HIDDEN from admin)
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Quick Press widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); //WordPress.com Blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side'); //Other WordPress News
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Plugins dashboard_activity
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Plugins 
    
}

function fsp_screen_layout_columns($columns)
{
    $columns['dashboard'] = 2;
    
    return $columns;
}

add_filter('screen_layout_columns', 'fsp_screen_layout_columns');

function fsp_screen_layout_dashboard()
{
    return 2;
}

add_filter('get_user_option_screen_layout_dashboard', 'fsp_screen_layout_dashboard');


// THE EDITABLE BUTTONS WIDGET
class Edit_Button_Widget extends WP_Widget
{
    function Edit_Button_Widget()
    {
        // widget actual processes
        parent::WP_Widget(false, $name = 'Editable Button', array(
            'description' => 'Add A Custom Button Link.'
        ));
    }
    
    function widget($args, $instance)
    {
        // outputs the content of the widget
        global $post;
        
        extract($args);
        $line1       = $instance['line1'];
        $line2       = $instance['line2'];
        $eb_class    = $instance['eb_class'];
        $url         = $instance['url'];
        $link_target = $instance['link_target'] ? 'true' : 'false';
        if ($link_target == 'true') {
            $target = 'target="_blank"';
        } else {
            $target = '';
        }
        echo $before_widget;
        
        echo "<a href='$url' class='editable_button_widget $eb_class' $target><span class='link-text'><span class='line1'>$line1</span><span class='line2'>$line2</span></span></a>";
        
        echo $after_widget;
    }
    
    function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance['link_target'] = $new_instance['link_target'];
        return $new_instance;
    }
    
    function form($instance)
    {
        // outputs the options form on admin
        if (isset($instance['line1'])) {
            $line1 = esc_attr($instance['line1']);
        } else {
            $line1 = "Line 1";
        }
        if (isset($instance['line2'])) {
            $line2 = esc_attr($instance['line2']);
        } else {
            $line2 = "Line 2";
        }
        if (isset($instance['url'])) {
            $url = esc_attr($instance['url']);
        } else {
            $url = "http://";
        }
        if (isset($instance['eb_class'])) {
            $eb_class = esc_attr($instance['eb_class']);
        } else {
            $eb_class = "editable-button";
        }
        if (isset($instance['link_target'])) {
            $link_target = esc_attr($instance['link_target']);
        } else {
            $link_target = "";
        }
?>
	<p>
	<label for="<?php
        echo $this->get_field_id('line1');
?>">
	<?php
        _e('Line 1:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('line1');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('line1');
?>" value="<?php
        echo $line1;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('line2');
?>">
	<?php
        _e('Line 2:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('line2');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('line2');
?>" value="<?php
        echo $line2;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('url');
?>">
	<?php
        _e('URL:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('url');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('url');
?>" value="<?php
        echo $url;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('eb_class');
?>">
	<?php
        _e('Verticle Text Position:');
?>
	</label>
	<select id="<?php
        echo $this->get_field_id('eb_class');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('eb_class');
?>">
		<option value="button-class" <?php
        echo ($eb_class == 'button-class') ? 'selected' : '';
?>>Button Class</option>
		<option value="eb-top" <?php
        echo ($eb_class == 'eb-top') ? 'selected' : '';
?>>Top</option>
		<option value="eb-bottom" <?php
        echo ($eb_class == 'eb-bottom') ? 'selected' : '';
?>>Bottom</option>
	</select>
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('target');
?>">
	<?php
        _e('Open in new window/tab:');
?>
	</label>
	<input class="checkbox" type="checkbox" <?php
        checked($instance['link_target'], 'on');
?> id="<?php
        echo $this->get_field_id('link_target');
?>" name="<?php
        echo $this->get_field_name('link_target');
?>" /> 
	</p>
	<?php
    }
}

// register widget
register_widget('Edit_Button_Widget');


// CONTACT DETAILS
class Contact_Details_Widget extends WP_Widget
{
    function Contact_Details_Widget()
    {
        // widget actual processes
        parent::WP_Widget(false, $name = 'Contact Details', array(
            'description' => 'Adds Contact Details to Widget Area'
        ));
    }
    
    function widget($args, $instance)
    {
        // outputs the content of the widget
        global $post;
        
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        
        $address_1 = $instance['address_1'];
        $address_2 = $instance['address_2'];
        $phone_1   = $instance['phone_1'];
        $fax       = $instance['fax'];
        $email     = $instance['email'];
        $abn       = $instance['abn'];
        
        echo $before_widget;
        
        // Display the widget title 
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        
        echo "<div class='contact-details'>";
        echo "<span class='contact-widget-address-1'>$address_1</span>";
        echo "<span class='contact-widget-address-2'>$address_2</span>";
        echo "<span class='contact-widget-phone-1'>$phone_1</span>";
        echo "<span class='contact-widget-fax'>$fax</span>";
        echo "<span class='contact-widget-email'>$email</span>";
        echo "<span class='contact-widget-abn'>$abn</span>";
        echo "</div>";
        
        echo $after_widget;
    }
    
    function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        return $new_instance;
    }
    
    function form($instance)
    {
        // outputs the options form on admin
        if (isset($instance['title'])) {
            $title = esc_attr($instance['title']);
        } else {
            $title = "Contact Details";
        }
        if (isset($instance['address_1'])) {
            $address_1 = esc_attr($instance['address_1']);
        } else {
            $address_1 = "Address 1";
        }
        if (isset($instance['address_2'])) {
            $address_2 = esc_attr($instance['address_2']);
        } else {
            $address_2 = "Address 2";
        }
        if (isset($instance['phone_1'])) {
            $phone_1 = esc_attr($instance['phone_1']);
        } else {
            $phone_1 = "Phone";
        }
        if (isset($instance['fax'])) {
            $fax = esc_attr($instance['fax']);
        } else {
            $fax = "Fax";
        }
        if (isset($instance['email'])) {
            $email = esc_attr($instance['email']);
        } else {
            $email = "Email";
        }
        if (isset($instance['abn'])) {
            $abn = esc_attr($instance['abn']);
        } else {
            $abn = "ABN";
        }
        
?>
	<p>
	<label for="<?php
        echo $this->get_field_id('title');
?>">
	<?php
        _e('Title:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('title');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('title');
?>" value="<?php
        echo $title;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('address_1');
?>">
	<?php
        _e('Address 1:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('address_1');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('address_1');
?>" value="<?php
        echo $address_1;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('address_2');
?>">
	<?php
        _e('Address 2:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('address_2');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('address_2');
?>" value="<?php
        echo $address_2;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('phone_1');
?>">
	<?php
        _e('Phone:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('phone_1');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('phone_1');
?>" value="<?php
        echo $phone_1;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('fax');
?>">
	<?php
        _e('Fax:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('fax');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('fax');
?>" value="<?php
        echo $fax;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('email');
?>">
	<?php
        _e('Email:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('email');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('email');
?>" value="<?php
        echo $email;
?>" />
	</p>
	<p>
	<label for="<?php
        echo $this->get_field_id('abn');
?>">
	<?php
        _e('ABN:');
?>
	</label>
	<input id="<?php
        echo $this->get_field_id('abn');
?>" class="widefat" type="text" name="<?php
        echo $this->get_field_name('abn');
?>" value="<?php
        echo $abn;
?>" />
	</p>
	<?php
    }
}

// register widget
register_widget('Contact_Details_Widget');


add_action('widgets_init', create_function('', 'return register_widget("elite_events_widget");'));

class elite_events_widget extends WP_Widget
{
    // constructor
    function elite_events_widget()
    {
        $widget_ops  = array(
            'classname' => 'elite_events_widget',
            'description' => __('A widget to display a list of events')
        );
        $control_ops = array(
            'width' => 300,
            'height' => 350,
            'id_base' => 'elite_events_widget'
        );
        parent::__construct('elite_events_widget', __('Events Widget'), $widget_ops);
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
	              <a class="event_widget_row" href="<?php echo get_field('link'); ?>"><span class="event_date"><?php echo date("M d", strtotime(get_field('tf_events_startdate')));?></span><span class="event_title"><?php the_title(); ?></spzn><span class="event_time"><?php echo get_field('tf_events_starttime') ?></span></a>
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

// register widget
add_action('widgets_init', create_function('', 'return register_widget("ladder_widget");'));

class ladder_widget extends WP_Widget
{
    // constructor
    function ladder_widget()
    {
        $widget_ops  = array(
            'classname' => 'ladder_widget',
            'description' => __('A widget to display a comp ladder')
        );
        $control_ops = array(
            'width' => 300,
            'height' => 350,
            'id_base' => 'ladder-widget'
        );
        parent::__construct('ladder_widget', __('Ladder Widget'), $widget_ops);
    }
    
    // widget display
    function widget($args, $instance)
    {
        extract($args);
        $title   = apply_filters('widget_title', $instance['title']);
        $url     = $instance['url'];
        $columns = $instance['columns'];
        echo $before_widget;
        
        // Display the widget title 
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        //Display the Ladder 
        if ($url) {
            $i    = 0;
            $urls = preg_split('/[\r\n]+/', $url, -1, PREG_SPLIT_NO_EMPTY);
            echo '<select id="ladder_widget_select" onChange="ladder_widget_change(this.value);">';
            foreach ($urls as $url_value) {
                $url_value = explode("//", $url_value);
                echo '<option value="' . $i . '" >' . $url_value[0] . '</option>';
                $i++;
            }
            echo '</select>';
            $i = 0;
            foreach ($urls as $url_value) {
                $url_value = explode("//", $url_value);
                echo '<div class="ladder_widget_content"><script type="text/javascript" src="http://www.sportingpulse.com/ext/external_ladder.cgi?' . $url_value[1] . '&cols=' . $columns . '&round=0"></script></div>';
            }
        }
        
        echo $after_widget;
    }
    
    function form($instance)
    {
        //Set up some default widget settings.
        $defaults = array(
            'title' => __('Ladders', 'example'),
            'url' => __('c=1-4499-0-265460-0&pool=1', 'example'),
            'columns' => __('1,2,3,4,5', 'example')
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
        echo $this->get_field_id('url');
?>"><?php
        _e('Comp Name // Comp & Pool', 'example');
?></label>
					<textarea class="widefat" cols="25" rows="5"  id="<?php
        echo $this->get_field_id('url');
?>" name="<?php
        echo $this->get_field_name('url');
?>"><?php
        echo $instance['url'];
?></textarea>
				</p>
				<p>
				    <label for="<?php
        echo $this->get_field_id('columns');
?>"><?php
        _e('Ladder Columns:', 'example');
?></label>
				    <input id="<?php
        echo $this->get_field_id('columns');
?>" name="<?php
        echo $this->get_field_name('columns');
?>" value="<?php
        echo $instance['columns'];
?>" style="width:100%;" />
				</p>
			<?php
    }
    
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        
        //Strip tags from title and name to remove HTML
        $instance['title']   = strip_tags($new_instance['title']);
        $instance['url']     = strip_tags($new_instance['url']);
        $instance['columns'] = strip_tags($new_instance['columns']);
        return $instance;
    }
}

