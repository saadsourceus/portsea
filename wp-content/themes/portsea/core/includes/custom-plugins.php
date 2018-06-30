<?php 
class Custom_Editor_Styles {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->plugin_dir = dirname( __FILE__ );
		$this->plugin_url = plugins_url( basename( dirname( __FILE__ ) ) );

		add_filter( 'tiny_mce_before_init', array( $this, 'tiny_mce_before_init' ) );
		add_filter( 'mce_buttons_2', array( $this, 'mce_buttons_2' ) );
		//add_action( 'admin_init', array( $this, 'add_editor_style' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_custom_styles' ) );
	}

	/**
	 * Define custom styles for the dropdown menu
	 *
	 * @param array $settings Existing custom styles in TinyMCE
	 * @return array
	 */
	public function tiny_mce_before_init( $settings ) {
		$style_formats = array(
			
			array(
				'title'   => 'Sabres Yellow heading',
				'block'   => 'h4',
				'classes' => 'yellow-heading',
				'wrapper' => false
			),
			array(
				'title'   => 'Sabres Blue heading',
				'block'   => 'h4',
				'classes' => 'blue-heading',
				'wrapper' => false
			)
			
		);

		$settings['style_formats'] = json_encode( $style_formats );

		return $settings;
	}

	/**
	 * Add the Styles dropdown to the visual editor
	 *
	 * @param array $buttons Array of buttons already registered
	 * @return array
	 */
	public function mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}

}

// Developers, start your engines.
$Custom_Editor_Styles = new Custom_Editor_Styles();
 ?>