<?php

add_action('wp_enqueue_scripts', 'asalah_enqueue_google_font', 1);

function asalah_enqueue_google_font() {
    wp_enqueue_style('raleway', 'http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,800,900,300,200');
}

add_action('wp_enqueue_scripts', 'asalah_scripts', 30);
add_action('wp_head', 'asalah_ie_scripts', 30);

function asalah_ie_scripts() {
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->
	<?php
}

function asalah_scripts() {
    global $asalah_data;

    // Register All Scripts
    wp_register_script('asalah_modernizer', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'));
    wp_register_script('asalah_fullmenu', get_template_directory_uri() . '/js/fullmenu.js', array('jquery'), false, true);
    wp_register_script('asalah_googlemap', get_template_directory_uri() . '/js/googlemap.js', array( 'jquery' ), false, true );
    wp_register_script('asalah_easing', get_template_directory_uri() . '/js/onepage_scroll/jquery.easing.min.js', array( 'jquery' ), false, true );
    wp_register_script('asalah_slimscroll', get_template_directory_uri() . '/js/onepage_scroll/jquery.slimscroll.min.js', array( 'jquery' ), false, true );
    wp_register_script('asalah_onepagescroll', get_template_directory_uri() . '/js/onepage_scroll/jquery.onepage-scroll.min.js', array( 'jquery' ), false, true );

    wp_register_script('asalah_scripts', get_template_directory_uri() . '/js/asalah.js', array('jquery'), false, true);
    
    // Get Global Scripts
    if (asalah_cross_option("asalah_menu_style") == "full") {
        wp_enqueue_script('asalah_fullmenu');
    }
    wp_enqueue_script('asalah_modernizer');    
    wp_enqueue_script('asalah_scripts');

    // Register all css
    // in_array(ICL_LANGUAGE_CODE, array("ar","he","xyz"))
    if ( is_rtl() ) {
    	wp_register_style('asalah_bootstrap_css', get_template_directory_uri() . '/framework/bootstrap/css/bootstrap.rtl.css', array(), '', 'all');
    }else{
    	wp_register_style('asalah_bootstrap_css', get_template_directory_uri() . '/framework/bootstrap/css/bootstrap.min.css', array(), '', 'all');
    } 
    wp_register_style('asalah_fontawesome_css', get_template_directory_uri() . '/framework/fontawesome/css/font-awesome.min.css', array(), '', 'all');
    wp_register_style('asalah_pluginstyle_css', get_template_directory_uri() . '/pluginstyle.css', array(), '', 'all');
    
    if ( is_rtl() ) {
    	wp_register_style('asalah_main_style', get_template_directory_uri() . '/rtl.css', array(), '1.01', 'all');
        wp_register_style('asalah_rtl_basics_style', get_template_directory_uri() . '/rtl-basics.css', array(), '1', 'all');
    }else{
    	wp_register_style('asalah_main_style', get_bloginfo('stylesheet_url'), array(), '1.084', 'all');
    }
    
    wp_register_style('asalah_responsive_css', get_template_directory_uri() . '/responsive.css', array(), '1', 'all');
    wp_register_style('asalah_fancybox_css', get_template_directory_uri().'/js/fancybox/jquery.fancybox.css', array(), '', 'all' );
    wp_register_style('asalah_fancybuttons_css', get_template_directory_uri().'/js/fancybox/helpers/jquery.fancybox-buttons.css', array(), '', 'all' );
    wp_register_style('asalah_onepagescroll', get_template_directory_uri().'/js/onepage_scroll/onepage-scroll.css', array(), '', 'all' );

    // check for vector icons activated
    if (asalah_option('asalah_include_vector_icon') == "fontello") {

        // check if custom version of fontello uploaded
        $custom_fontello = get_stylesheet_directory() . '/framework/fontello/custom_fontello/css/fontello.css';
        $custom_fontello_animation = get_stylesheet_directory() . '/framework/fontello/custom_fontello/css/animation.css';
        $custom_fontello_ie7 = get_stylesheet_directory() . '/framework/fontello/custom_fontello/css/fontello-ie7.css';

        // include custom version or original version
        if (file_exists($custom_fontello)) {
            wp_register_style('asalah_fontello_css', get_template_directory_uri() . '/framework/fontello/custom_fontello/css/fontello.css', array(), '1', 'all');
        } else {
            wp_register_style('asalah_fontello_css', get_template_directory_uri() . '/framework/fontello/css/fontello.css', array(), '1', 'all');
        }

        if (file_exists($custom_fontello_animation)) {
            wp_register_style('asalah_fontello_animation_css', get_template_directory_uri().'/framework/fontello/custom_fontello/css/animation.css', array(), '', 'all' );
        } else {
            wp_register_style('asalah_fontello_animation_css', get_template_directory_uri().'/framework/fontello/css/animation.css', array(), '', 'all' );
        }

        if (file_exists($custom_fontello_ie7)) {
            wp_register_style('asalah_fontello_ie7_css', get_template_directory_uri().'/framework/fontello/custom_fontello/css/fontello-ie7.css', array(), '', 'all' );
        } else {
            wp_register_style('asalah_fontello_ie7_css', get_template_directory_uri().'/framework/fontello/css/fontello-ie7.css', array(), '', 'all' );
        }

        wp_enqueue_style('asalah_fontello_css');
        wp_enqueue_style('asalah_fontello_animation_css');
        wp_enqueue_style('asalah_fontello_ie7_css');
    }elseif (asalah_option('asalah_include_vector_icon') == "icomoon") { 
        // check if custom version of icomoon uploaded
        $custom_icomoon = get_stylesheet_directory() . '/framework/icomoon/custom_icomoon/style.css';

        // include custom version or original version
        if (file_exists($custom_icomoon)) {
            wp_register_style('asalah_icomoon_css', get_template_directory_uri() . '/framework/icomoon/custom_icomoon/style.css', array(), '1', 'all');
        } else {
            wp_register_style('asalah_icomoon_css', get_template_directory_uri() . '/framework/icomoon/style.css', array(), '1', 'all');
        }
        wp_enqueue_style('asalah_icomoon_css');
    }

    // Get Global css
    wp_enqueue_style('asalah_bootstrap_css');
	wp_enqueue_style('asalah_fontawesome_css');
    wp_enqueue_style('asalah_fancybox_css');
    wp_enqueue_style('asalah_fancybuttons_css');
    wp_enqueue_style('asalah_pluginstyle_css');
    wp_enqueue_style('asalah_main_style');
    wp_enqueue_style('asalah_rtl_basics_style');
    wp_enqueue_style('asalah_responsive_css');  
}



add_action('admin_enqueue_scripts', 'asalah_post_options_style');
function asalah_post_options_style() {
    wp_register_style('asalah_admin_css', get_template_directory_uri().'/admin-style.css', array(), '', 'all' );
    wp_enqueue_style('asalah_admin_css');
	if( is_admin() ) { 
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' );        
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', get_template_directory_uri() . '/js/admin_scripts.js', array( 'wp-color-picker' ), false, true ); 
    }
    wp_register_script('asalah_admin', get_template_directory_uri() . '/js/admin_scripts.js', array( 'jquery' ) );
	wp_enqueue_script('asalah_admin');
}
?>