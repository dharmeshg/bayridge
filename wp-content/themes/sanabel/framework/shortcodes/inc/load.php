<?php
class Shortcodes_Ultimate {

	/**
	 * Register shortcodes
	 */
	public static function register() {
		// Prepare compatibility mode prefix
		$prefix = su_cmpt();
		// Loop through shortcodes
		foreach ( ( array ) Su_Data::shortcodes() as $id => $data ) {
			if ( isset( $data['function'] ) && is_callable( $data['function'] ) ) $func = $data['function'];
			elseif ( is_callable( array( 'Su_Shortcodes', $id ) ) ) $func = array( 'Su_Shortcodes', $id );
			elseif ( is_callable( array( 'Su_Shortcodes', 'su_' . $id ) ) ) $func = array( 'Su_Shortcodes', 'su_' . $id );
			else continue;
			// Register shortcode
			add_shortcode( $prefix . $id, $func );
		}
		// Register [media] manually // 3.x
		add_shortcode( $prefix . 'media', array( 'Su_Shortcodes', 'media' ) );
	}

	/**
	 * Add timestamp
	 */
	public static function timestamp() {
		if ( !get_option( 'su_installed' ) ) update_option( 'su_installed', time() );
	}

	/**
	 * Create directory /wp-content/uploads/shortcodes-ultimate-skins/ on activation
	 */
	public static function skins_dir() {
		$upload_dir = wp_upload_dir();
		$path = trailingslashit( path_join( $upload_dir['basedir'], 'shortcodes' ) );
		if ( !file_exists( $path ) ) mkdir( $path, 0755 );
	}

}

/**
 * Register plugin function to perform checks that plugin is installed
 */
function shortcodes_ultimate() {
	return true;
}

new Shortcodes_Ultimate;
