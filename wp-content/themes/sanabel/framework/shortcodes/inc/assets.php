<?php

/**
 * Class for managing plugin assets
 */
class Su_Assets {

	/**
	 * Set of queried assets
	 *
	 * @var array
	 */
	static $assets = array( 'css' => array(), 'js' => array() );

	/**
	 * Constructor
	 */
	function __construct() {
		// Register
		add_action( 'admin_head',                  array( __CLASS__, 'register' ) );
		// Enqueue
		add_action( 'admin_footer',                array( __CLASS__, 'enqueue' ) );
		// Print
		add_action( 'su/generator/preview/after',  array( __CLASS__, 'prnt' ) );
		add_action( 'su/examples/preview/after',   array( __CLASS__, 'prnt' ) );
	}

	/**
	 * Register assets
	 */
	public static function register() {

		// SimpleSlider
		wp_register_script( 'simpleslider', get_template_directory_uri() . '/framework/shortcodes/assets/js/simpleslider.js' , array( 'jquery' ), '1.0.0', true );
		wp_register_style( 'simpleslider', get_template_directory_uri() . '/framework/shortcodes/assets/css/simpleslider.css' , false, '1.0.0', 'all' );

		//Font Awesome
		wp_register_style( 'font-awesome', get_template_directory_uri() . '/framework/fontawesome/css/font-awesome.min.css', false, '4.1.0', 'all' );

		// qTip
		wp_register_style( 'qtip', get_template_directory_uri() . '/framework/shortcodes/assets/css/qtip.css' , false, '2.1.1', 'all' );
		wp_register_script( 'qtip', get_template_directory_uri() . '/framework/shortcodes/assets/js/qtip.js' , array( 'jquery' ), '2.1.1', true );

		// jsRender
		wp_register_script( 'jsrender', get_template_directory_uri() . '/framework/shortcodes/assets/js/jsrender.js' , array( 'jquery' ), '1.0.0-beta', true );

		// Magnific Popup
		wp_register_style( 'magnific-popup', get_template_directory_uri() . '/framework/shortcodes/assets/css/magnific-popup.css' , false, '0.9.9', 'all' );
		wp_register_script( 'magnific-popup', get_template_directory_uri() . '/framework/shortcodes/assets/js/magnific-popup.js' , array( 'jquery' ), '0.9.9', true );
		wp_localize_script( 'magnific-popup', 'su_magnific_popup', array(
				'close'   => __( 'Close (Esc)', 'su' ),
				'loading' => __( 'Loading...', 'su' ),
				'prev'    => __( 'Previous (Left arrow key)', 'su' ),
				'next'    => __( 'Next (Right arrow key)', 'su' ),
				'counter' => sprintf( __( '%s of %s', 'su' ), '%curr%', '%total%' ),
				'error'   => sprintf( __( 'Failed to load this link. %sOpen link%s.', 'su' ), '<a href="%url%" target="_blank"><u>', '</u></a>' )
			) );

		// Generator
		wp_register_style( 'su-generator', get_template_directory_uri() . '/framework/shortcodes/assets/css/generator.css' , array( 'farbtastic', 'magnific-popup' ), '1.0', 'all' );
		wp_register_script( 'su-generator', get_template_directory_uri() . '/framework/shortcodes/assets/js/generator.js' , array( 'farbtastic', 'magnific-popup', 'qtip' ), '1.0', true );
		wp_localize_script( 'su-generator', 'su_generator', array(
				'upload_title'         => __( 'Choose file', 'su' ),
				'upload_insert'        => __( 'Insert', 'su' ),
				'isp_media_title'      => __( 'Select images', 'su' ),
				'isp_media_insert'     => __( 'Add selected images', 'su' ),
				'last_used'            => __( 'Last used settings', 'su' )
			) );
		
		// Hook to deregister assets or add custom
		do_action( 'su/assets/register' );
	}

	/**
	 * Enqueue assets
	 */
	public static function enqueue() {
		// Get assets query and plugin object
		$assets = self::assets();
		// Enqueue stylesheets
		foreach ( $assets['css'] as $style ) wp_enqueue_style( $style );
		// Enqueue scripts
		foreach ( $assets['js'] as $script ) wp_enqueue_script( $script );
		// Hook to dequeue assets or add custom
		do_action( 'su/assets/enqueue', $assets );
	}

	/**
	 * Print assets without enqueuing
	 */
	public static function prnt() {
		// Prepare assets set
		$assets = self::assets();
		// Enqueue stylesheets
		wp_print_styles( $assets['css'] );
		// Enqueue scripts
		wp_print_scripts( $assets['js'] );
		// Hook
		do_action( 'su/assets/print', $assets );
	}

	/**
	 * Styles for visualised shortcodes
	 */
	public static function mce_css( $mce_css ) {
		if ( ! empty( $mce_css ) ) $mce_css .= ',';
		$mce_css .= get_template_directory_uri() . '/framework/shortcodes/assets/css/tinymce.css' ;
		return $mce_css;
	}

	/**
	 * TinyMCE plugin for visualised shortcodes
	 */
	public static function mce_js( $plugins ) {
		$plugins['shortcodesultimate'] = get_template_directory_uri() . '/framework/shortcodes/assets/js/tinymce.js' ;
		return $plugins;
	}

	/**
	 * Add asset to the query
	 */
	public static function add( $type, $handle ) {
		// Array with handles
		if ( is_array( $handle ) ) { foreach ( $handle as $h ) self::$assets[$type][$h] = $h; }
		// Single handle
		else self::$assets[$type][$handle] = $handle;
	}
	/**
	 * Get queried assets
	 */
	public static function assets() {
		// Get assets query
		$assets = self::$assets;
		// Apply filters to assets set
		$assets['css'] = array_unique( ( array ) apply_filters( 'su/assets/css', ( array ) array_unique( $assets['css'] ) ) );
		$assets['js'] = array_unique( ( array ) apply_filters( 'su/assets/js', ( array ) array_unique( $assets['js'] ) ) );
		// Return set
		return $assets;
	}

	/**
	 * Helper to get full URL of a skin file
	 */
	public static function skin_url( $file = '' ) {
		$shult = shortcodes_ultimate();
		$skin = get_option( 'su_option_skin' );
		$uploads = wp_upload_dir(); $uploads = $uploads['baseurl'];
		// Prepare url to skin directory
		$url = ( !$skin || $skin === 'default' ) ? get_template_directory_uri() . '/framework/shortcodes/assets/css/'  : $uploads . '/shortcodes-ultimate-skins/' . $skin;
		return trailingslashit( apply_filters( 'su/assets/skin', $url ) ) . $file;
	}
}

new Su_Assets;

/**
 * Helper function to add asset to the query
 *
 * @param string  $type   Asset type (css|js)
 * @param mixed   $handle Asset handle or array with handles
 */
function su_query_asset( $type, $handle ) {
	Su_Assets::add( $type, $handle );
}

/**
 * Helper function to get current skin url
 *
 * @param string  $file Asset file name. Example value: box-shortcodes.css
 */
function su_skin_url( $file ) {
	return Su_Assets::skin_url( $file );
}
