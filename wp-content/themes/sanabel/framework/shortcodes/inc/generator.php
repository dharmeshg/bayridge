<?php
/**
 * Shortcode Generator
 */
class Su_Generator {

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'media_buttons',                       array( __CLASS__, 'button' ), 1000 );

		add_action( 'su/update',                           array( __CLASS__, 'reset' ) );
		add_action( 'su/activation',                       array( __CLASS__, 'reset' ) );
		add_action( 'sunrise/page/before',                 array( __CLASS__, 'reset' ) );
		add_action( 'create_term',                         array( __CLASS__, 'reset' ), 10, 3 );
		add_action( 'edit_term',                           array( __CLASS__, 'reset' ), 10, 3 );
		add_action( 'delete_term',                         array( __CLASS__, 'reset' ), 10, 3 );

		add_action( 'wp_ajax_su_generator_settings',       array( __CLASS__, 'settings' ) );

		add_action( 'wp_ajax_su_generator_get_icons',      array( __CLASS__, 'ajax_get_icons' ) );
		add_action( 'wp_ajax_su_generator_get_terms',      array( __CLASS__, 'ajax_get_terms' ) );
		add_action( 'wp_ajax_su_generator_get_taxonomies', array( __CLASS__, 'ajax_get_taxonomies' ) );
	}

	/**
	 * Generator button
	 */
	public static function button( $args = array() ) {
		// Check access
		if ( !self::access_check() ) return;
		// Prepare button target
		$target = is_string( $args ) ? $args : 'content';
		// Prepare args
		$args = wp_parse_args( $args, array(
				'target'    => $target,
				'text'      => __( 'Insert shortcode', 'su' ),
				'class'     => 'button',
				'icon'      => get_template_directory_uri() . '/framework/shortcodes/assets/images/icon.png',
				'echo'      => true,
				'shortcode' => false
			) );
		// Prepare icon
		if ( $args['icon'] ) $args['icon'] = '<img src="' . $args['icon'] . '" /> ';
		// Print button
		$button = '<a href="javascript:void(0);" class="su-generator-button ' . $args['class'] . '" title="' . $args['text'] . '" data-target="' . $args['target'] . '" data-mfp-src="#su-generator" data-shortcode="' . (string) $args['shortcode'] . '">' . $args['icon'] . $args['text'] . '</a>';
		// Show generator popup
		add_action( 'wp_footer',    array( __CLASS__, 'popup' ) );
		add_action( 'admin_footer', array( __CLASS__, 'popup' ) );
		// Request assets
		wp_enqueue_media();
		su_query_asset( 'css', array( 'simpleslider', 'farbtastic', 'magnific-popup', 'font-awesome', 'su-generator' ) );
		su_query_asset( 'js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'simpleslider', 'farbtastic', 'magnific-popup', 'su-generator' ) );
		// Print/return result
		if ( $args['echo'] ) echo ($button);
		return $button;
	}

	/**
	 * Cache reset
	 */
	public static function reset() {
		// Clear popup cache
		delete_transient( 'su/generator/popup' );
		// Clear shortcodes settings cache
		foreach ( array_keys( (array) Su_Data::shortcodes() ) as $shortcode ) delete_transient( 'su/generator/settings/' . $shortcode );
	}

	/**
	 * Generator popup form
	 */
	public static function popup() {
		// Get cache
		$output = get_transient( 'su/generator/popup' );
		if ( $output && SU_ENABLE_CACHE ) echo ($output);
		// Cache not found
		else {
			ob_start();

?>
		<div id="su-generator-wrap" style="display:none">
			<div id="su-generator">
				<div id="su-generator-header">
					<input type="text" name="su_generator_search" id="su-generator-search" value="" placeholder="<?php _e( 'Search for shortcodes', 'su' ); ?>" />
					<div id="su-generator-filter">
						<strong><?php _e( 'Filter by type', 'su' ); ?></strong>
						<?php foreach ( (array) Su_Data::groups() as $group => $label ) echo '<a href="#" data-filter="' . $group . '">' . $label . '</a>'; ?>
					</div>
					<div id="su-generator-choices" class="su-generator-clearfix">
						<?php
			// Choices loop
			foreach ( (array) Su_Data::shortcodes() as $name => $shortcode ) {
				$icon = ( isset( $shortcode['icon'] ) ) ? $shortcode['icon'] : 'puzzle-piece';
				$shortcode['name'] = ( isset( $shortcode['name'] ) ) ? $shortcode['name'] : $name;
				echo '<span data-name="' . $shortcode['name'] . '" data-shortcode="' . $name . '" title="' . esc_attr( $shortcode['desc'] ) . '" data-desc="' . esc_attr( $shortcode['desc'] ) . '" data-group="' . $shortcode['group'] . '">' . Su_Tools::icon( $icon ) . $shortcode['name'] . '</span>' . "\n";
			}
?>
					</div>
				</div>
				<div id="su-generator-settings"></div>
				<input type="hidden" name="su-generator-selected" id="su-generator-selected" value="<?php echo plugins_url( '', SU_PLUGIN_FILE ); ?>" />
				<input type="hidden" name="su-generator-url" id="su-generator-url" value="<?php echo plugins_url( '', SU_PLUGIN_FILE ); ?>" />
				<input type="hidden" name="su-compatibility-mode-prefix" id="su-compatibility-mode-prefix" value="<?php echo su_compatibility_mode_prefix(); ?>" />
				<div id="su-generator-result" style="display:none"></div>
			</div>
		</div>
	<?php
			$output = ob_get_contents();
			set_transient( 'su/generator/popup', $output, 2 * DAY_IN_SECONDS );
			ob_end_clean();
			echo ($output);
		}
	}

	/**
	 * Process AJAX request
	 */
	public static function settings() {
		self::access();
		// Param check
		if ( empty( $_REQUEST['shortcode'] ) ) wp_die( __( 'Shortcode not specified', 'su' ) );
		// Get cache
		$output = get_transient( 'su/generator/settings/' . sanitize_text_field( $_REQUEST['shortcode'] ) );
		if ( $output && SU_ENABLE_CACHE ) echo ($output);
		// Cache not found
		else {
			// Request queried shortcode
			$shortcode = Su_Data::shortcodes( sanitize_key( $_REQUEST['shortcode'] ) );
			// Prepare skip-if-default option
			$skip = '';
			// Prepare actions
			$actions = apply_filters( 'su/generator/actions', array(
					'insert' => '<a href="javascript:void(0);" class="button button-primary button-large su-generator-insert"><i class="fa fa-check"></i> ' . __( 'Insert shortcode', 'su' ) . '</a>'
				) );
			// Shortcode header
			$return = '<div id="su-generator-breadcrumbs">';
			$return .= apply_filters( 'su/generator/breadcrumbs', '<a href="javascript:void(0);" class="su-generator-home" title="' . __( 'Click to return to the shortcodes list', 'su' ) . '">' . __( 'All shortcodes', 'su' ) . '</a> &rarr; <span>' . $shortcode['name'] . '</span> <small class="alignright">' . $shortcode['desc'] . '</small><div class="su-generator-clear"></div>' );
			$return .= '</div>';
			// Shortcode note
			if ( isset( $shortcode['note'] ) ) {
				$return .= '<div class="su-generator-note"><i class="fa fa-info-circle"></i><div class="su-generator-note-content">';
				if ( isset( $shortcode['note'] ) ) $return .= wpautop( $shortcode['note'] );
				$return .= '</div></div>';
			}
			// Shortcode has atts
			if ( count( $shortcode['atts'] ) && $shortcode['atts'] ) {
				// Loop through shortcode parameters
				foreach ( $shortcode['atts'] as $attr_name => $attr_info ) {
					// Prepare default value
					$default = (string) ( isset( $attr_info['default'] ) ) ? $attr_info['default'] : '';
					$attr_info['name'] = (isset( $attr_info['name'] )) ? $attr_info['name'] : $attr_name;
					$return .= '<div class="su-generator-attr-container' . $skip . ' '.strtolower($shortcode['name']).' '.$attr_name.'" data-default="' . esc_attr( $default ) . '">';
					$return .= '<h5>' . $attr_info['name'] . '</h5>';
					// Create field types
					if ( !isset( $attr_info['type'] ) && isset( $attr_info['values'] ) && is_array( $attr_info['values'] ) && count( $attr_info['values'] ) ) $attr_info['type'] = 'select';
					elseif ( !isset( $attr_info['type'] ) ) $attr_info['type'] = 'text';
					if ( is_callable( array( 'Su_Generator_Views', $attr_info['type'] ) ) ) $return .= call_user_func( array( 'Su_Generator_Views', $attr_info['type'] ), $attr_name, $attr_info );
					elseif ( isset( $attr_info['callback'] ) && is_callable( $attr_info['callback'] ) ) $return .= call_user_func( $attr_info['callback'], $attr_name, $attr_info );
					if ( isset( $attr_info['desc'] ) ) $attr_info['desc'] = str_replace( '%su_skins_link%', su_skins_link(), $attr_info['desc'] );
					if ( isset( $attr_info['desc'] ) ) $return .= '<div class="su-generator-attr-desc">' . str_replace( array( '<b%value>', '<b_>' ), '<b class="su-generator-set-value" title="' . __( 'Click to set this value', 'su' ) . '">', $attr_info['desc'] ) . '</div>';
					$return .= '</div>';
				}
			}
			// Single shortcode (not closed)
			if ( $shortcode['type'] == 'single' ) $return .= '<input type="hidden" name="su-generator-content" id="su-generator-content" value="false" />';
			// Wrapping shortcode
			else $return .= '<div class="su-generator-attr-container"><h5>' . __( 'Content', 'su' ) . '</h5><textarea name="su-generator-content" id="su-generator-content" rows="5">' . esc_attr( str_replace( array( '%prefix_', '__' ), su_cmpt(), $shortcode['content'] ) ) . '</textarea></div>';
			$return .= '<div class="su-generator-actions su-generator-clearfix">' . implode( ' ', array_values( $actions ) ) . '</div>';
			set_transient( 'su/generator/settings/' . sanitize_text_field( $_REQUEST['shortcode'] ), $return, 2 * DAY_IN_SECONDS );
			echo ($return);
		}
		exit;
	}

	public static function access() {
		if ( !self::access_check() ) wp_die( __( 'Access denied', 'su' ) );
	}

	public static function access_check() {
		$by_role = ( get_option( 'su_generator_access' ) ) ? current_user_can( get_option( 'su_generator_access' ) ) : true;
		return current_user_can( 'edit_posts' ) && $by_role;
	}

	public static function ajax_get_icons() {
		self::access();
		die( Su_Tools::icons() );
	}

	public static function ajax_get_terms() {
		self::access();
		$args = array();
		if ( isset( $_REQUEST['tax'] ) ) $args['options'] = (array) Su_Tools::get_terms( sanitize_key( $_REQUEST['tax'] ) );
		if ( isset( $_REQUEST['class'] ) ) $args['class'] = (string) sanitize_key( $_REQUEST['class'] );
		if ( isset( $_REQUEST['multiple'] ) ) $args['multiple'] = (bool) sanitize_key( $_REQUEST['multiple'] );
		if ( isset( $_REQUEST['size'] ) ) $args['size'] = (int) sanitize_key( $_REQUEST['size'] );
		if ( isset( $_REQUEST['noselect'] ) ) $args['noselect'] = (bool) sanitize_key( $_REQUEST['noselect'] );
		die( Su_Tools::select( $args ) );
	}

	public static function ajax_get_taxonomies() {
		self::access();
		$args = array();
		$args['options'] = Su_Tools::get_taxonomies();
		die( Su_Tools::select( $args ) );
	}
}

new Su_Generator;

class Shortcodes_Ultimate_Generator extends Su_Generator {
	function __construct() {
		parent::__construct();
	}
}
