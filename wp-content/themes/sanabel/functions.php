<?php
$themename = "Sanabel";
if (!isset($content_width))
    $content_width = 960;
define('theme_name', $themename);

// include options panel
include ('inc/optionclasses.php');
require_once ('inc/scripts.php');
include ('inc/posttypes.php');
include ('inc/postoptions.php');
include ('inc/banners.php');
include ('inc/posts.php');
include ('inc/megamenu.php');
include ('inc/customstyle.php');
//include ('switcher/switcher.php');
include ('framework/bootstrap/function.php');
include ('framework/twitter/twitteroauth.php');
include_once('framework/tgm/class-tgm-plugin-activation.php');
include ('framework//shortcodes/shortcodes-ultimate.php');
// include widgets
include ('inc/widgets/tweets.php');
include ('inc/widgets/postlist.php');
require_once ('admin/index.php');
include ( 'inc/shortcodes/shortcodes.php' );

include ( 'extend-vc.php' ); 
/* Importer */
include ( 'framework/importer/importer.php' );
/* color switcher */

// theme setup functions
if ( ! function_exists( 'asalah_theme_setup' ) ) :
function asalah_theme_setup() {

    add_editor_style();

    load_theme_textdomain('asalah', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to <head>.
    add_theme_support('automatic-feed-links');
	
	$project_thumbnail_width = 640;
	$project_thumbnail_height = 500;

    $blog_thumbnail_width = 460;
    $blog_thumbnail_height = 320;

    $blog_banner_width = 1170;
    $blog_banner_height = 480;
	
	if (asalah_option("asalah_portfolio_thumb_width")) {
		$project_thumbnail_width = asalah_option("asalah_portfolio_thumb_width");
	}
	
	if (asalah_option("asalah_portfolio_thumb_height")) {
		$project_thumbnail_height = asalah_option("asalah_portfolio_thumb_height");
	}

    if (asalah_option("asalah_blog_thumb_width")) {
        $blog_thumbnail_width = asalah_option("asalah_blog_thumb_width");
    }
    
    if (asalah_option("asalah_blog_thumb_height")) {
        $blog_thumbnail_height = asalah_option("asalah_blog_thumb_height");
    }

    if (asalah_option("asalah_blog_banner_width")) {
        $blog_banner_width = asalah_option("asalah_blog_banner_width");
    }
    
    if (asalah_option("asalah_blog_banner_height")) {
        $blog_banner_height = asalah_option("asalah_blog_banner_height");
    }
	
    add_theme_support('post-thumbnails');
    add_image_size('portfolio', $project_thumbnail_width, $project_thumbnail_height, true);
    add_image_size('masonry', $project_thumbnail_width, 0, false);
    add_image_size('bloggrid', $blog_thumbnail_width, $blog_thumbnail_height, true);
    add_image_size('blogmasonry', $blog_thumbnail_width, 0, false);
    add_image_size('blog', $blog_banner_width, $blog_banner_height, true);


    add_image_size('blogcarousel', 310, 260, true);
    add_image_size('bloglist', 160, 100, true);
    add_image_size('smallbloglist', 42, 42, true);
}
endif;
add_action('after_setup_theme', 'asalah_theme_setup');

add_theme_support('post-formats', array(
    'audio', 'gallery', 'image', 'video'
));

// Register primary menu.
register_nav_menu('mainmenu', __('Main Menu', 'asalah'));
register_nav_menu('footermenu', __('Footer Menu', 'asalah'));

// start activating required plugins

add_action('tgmpa_register', 'asalah_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if ( ! function_exists( 'asalah_register_required_plugins' ) ) :
function asalah_register_required_plugins() {


    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Visual Composer to the installation progress
        array(
            'name' => 'Visual Composer', // The plugin name
            'slug' => 'js_composer', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/js_composer.zip', // The plugin source
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'version' => '4.4.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // Revolution Slider to the installation progress
        array(
            'name' => 'Revolution Slider', // The plugin name
            'slug' => 'revslider', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/revslider.zip', // The plugin source
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // LayerSlider to the installation progress
        array(
            'name' => 'LayerSlider', // The plugin name
            'slug' => 'LayerSlider', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/layerslider.zip', // The plugin source
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // Post Formats to the installation progress (required)
        array(
            'name' => 'Post Formats', // The plugin name
            'slug' => 'wp-post-formats-develop', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/wp-post-formats-develop.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // Sanabel Core to the installation progress (required)
        array(
            'name' => 'Sanabel Core', // The plugin name
            'slug' => 'sanabel-core', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/sanabel-core.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // Envato Toolkit to the installation progress (required)
        array(
            'name' => 'Envato Toolkit', // The plugin name
            'slug' => 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // Contact Form 7 to the installation progress
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => false,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'asalah' ),
            'menu_title'                      => __( 'Install Plugins', 'asalah' ),
            'installing'                      => __( 'Installing Plugin: %s', 'asalah' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'asalah' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'asalah' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'asalah' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'asalah' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );
}
endif;

function theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
    
    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );

if ( ! function_exists( 'asalah_range_array' ) ) :
function asalah_range_array($from = 0, $to = 10, $by = 1) {
    $range_array = array();
    $to = $to + $by;
    for ($i = $from; $i < $to; $i+=$by ) {
        $range_array["{$i}"] = $i;
    }
    return $range_array;
}
endif;

// asalah options function
if ( ! function_exists( 'asalah_option' ) ) :
function asalah_option($id, $prefix = "") {
    global $asalah_data;

    if (isset($asalah_data[$id])) {
        return $prefix . $asalah_data[$id];
    }
}
endif;

if ( ! function_exists( 'asalah_post_option' ) ) :
function asalah_post_option($id, $postid = '') {

    global $post;

    if ($post && $postid == '') {
        $post_id = $post->ID;
    } else {
        $post_id = $postid;
    }
    $post_meta = get_post_meta($post_id, $id, true);
    if (isset($post_meta)) {
        return $post_meta;
    }
}
endif;

if ( ! function_exists( 'asalah_cross_option' ) ) :
function asalah_cross_option($id, $postid = '') {
    global $post;

    if ($post && $postid == '') {
        $post_id = $post->ID;
    } else {
        $post_id = $postid;
    }

    if (asalah_option($id) && !asalah_post_option($id, $post_id)) {
        $output = asalah_option($id);
    }elseif(asalah_post_option($id, $post_id)) {
        $output = asalah_post_option($id, $post_id);
    }else{
        $output = null;
    }
    return $output;
}
endif;

if (asalah_option('asalah_color_switcher')) {
    get_template_part( '/switcher/switcher' );
}

if ( ! function_exists( 'excerpt' ) ) :
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt);
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}
endif;

if ( ! function_exists( 'asalah_widgets_init' ) ) :
function asalah_widgets_init() {
    global $asalah_data;
    register_sidebar(array(
        'name' => __('Blog sidebar', 'asalah'),
        'id' => 'sidebar-1',
        'description' => __('This sidebar id is: "sidebar-1" to be used in sidebar shortcode'  , 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="page-header"><span class="page_header_title">',
        'after_title' => '</span></h4>',
    ));

    
    register_sidebar(array(
        'name' => __('Footer Area One', 'asalah'),
        'id' => 'footer-1',
        'description' => __('This sidebar id is: "footer-1" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="page-header"><span class="page_header_title">',
        'after_title' => '</span></h4>',
    ));
    
    // show widget area 2 and 3 only if footer layout not equal footer_6
    register_sidebar(array(
        'name' => __('Footer Area Two', 'asalah'),
        'id' => 'footer-2',
        'description' => __('This sidebar id is: "footer-2" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="page-header"><span class="page_header_title">',
        'after_title' => '</span></h4>',
    ));

    register_sidebar(array(
        'name' => __('Footer Area Three', 'asalah'),
        'id' => 'footer-3',
        'description' => __('This sidebar id is: "footer-3" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="page-header"><span class="page_header_title">',
        'after_title' => '</span></h4>',
    ));

    // show widget area 4 only if footer layout not equal footer_6 and not equal footer_1
    register_sidebar(array(
        'name' => __('Footer Area four', 'asalah'),
        'id' => 'footer-4',
        'description' => __('This sidebar id is: "footer-4" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="page-header"><span class="page_header_title">',
        'after_title' => '</span></h4>',
    ));

    // show widget area 5 only if footer layout equal to footer_3, footer_4 or footer_5
    register_sidebar(array(
        'name' => __('Footer Area five', 'asalah'),
        'id' => 'footer-5',
        'description' => __('This sidebar id is: "footer-5" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="page-header"><span class="page_header_title">',
        'after_title' => '</span></h4>',
    ));

    // show widget area 6 only if footer layout equal footer_5
    register_sidebar(array(
        'name' => __('Footer Area Six', 'asalah'),
        'id' => 'footer-6',
        'description' => __('This sidebar id is: "footer-6" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="page-header"><span class="page_header_title">',
        'after_title' => '</span></h4>',
    ));
	
	// add custom sidebars
    if (isset($asalah_data['asalah_custom_sidebars'])) {
        $sidebars = $asalah_data['asalah_custom_sidebars'];
        if (!empty($sidebars)):

            foreach ($sidebars as $option) {
                $siebar_id = "asalah_custom_sidebar_" . $option['order'];
                register_sidebar(array(
                    'name' => $option['title'],
                    'id' => $siebar_id,
                    'description' => __('This custom sidebar id is:', 'asalah') . $siebar_id,
                    'before_widget' => '<div id="%1$s" class="widget_container widget_content widget %2$s clearfix">',
                    'after_widget' => "</div>",
                    'before_title' => '<h4 class="page-header"><span class="page_header_title">',
                    'after_title' => '</span></h4>',
                ));
            }
        endif;
    }
    
}
endif;
add_action('widgets_init', 'asalah_widgets_init');

/* bread crumb function */
if ( ! function_exists( 'asalah_breadcrumbs' ) ) :
function asalah_breadcrumbs($last = "") {
    global $asalah_data;
    global $post;

    if (!is_home() && !asalah_option('asalah_disable_breadcrumb')) {
        echo '<nav class="breadcrumb">';
        echo '<a href="' . home_url('/') . '">' . __("Home", "asalah") . '</a> <span class="divider">//</span> ';
        if (is_single()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                if (get_post_type() == 'post') {
                    if (asalah_option('asalah_blog_url')) {
                        echo '<a href="' . asalah_option('asalah_blog_url') . '">';
                    }
                    echo esc_attr($post_type->labels->name);
                    if (asalah_option('asalah_blog_url')) {
                        echo '</a>';
                    }
                } elseif (get_post_type() == 'project') {
                    if (asalah_option('asalah_portfolio_url')) {
                        echo '<a href="' . asalah_option('asalah_portfolio_url') . '">';
                    }
                    echo esc_attr($post_type->labels->name);
                    if (asalah_option('asalah_portfolio_url')) {
                        echo '</a>';
                    }
                } elseif (get_post_type() == 'product') {
                    echo '<a href="' . get_permalink( woocommerce_get_page_id( 'shop' )) . '">';
                    echo esc_attr($post_type->labels->name);
                    echo '</a>';
                }else {
                    echo esc_attr($post_type->labels->name);
                }

                echo ' <span class="divider">//</span> ';
                the_title();
            } else {
                // the_category(' <span class="divider">&raquo;</span> ');
                // show first cat only
                $category = get_the_category();
                $category_link = get_category_link( $category[0]->cat_ID );
                echo ' <a href="'.$category_link.'" title="'.$category[0]->cat_name.'">'.$category[0]->cat_name.'</a>';

                echo ' <span class="divider">//</span> ';
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        } elseif ($last != "") {
            echo " " . $last;
        }
        echo '</nav>';
    }
}
endif;

if ( ! function_exists( 'asalah_post_date_label' ) ) :
function asalah_post_date_label() {
    global $post;
    // check if post date should be in meta or both meta and label in option panel
    if ((asalah_post_option("asalah_post_date") == "label") || (asalah_post_option("asalah_post_date") == "both") || (asalah_option("asalah_post_date_position") == "label" && asalah_post_option("asalah_post_date") != "meta" && asalah_post_option("asalah_post_date") != "hide") || (asalah_option("asalah_post_date_position") == "both" && asalah_post_option("asalah_post_date") != "meta" && asalah_post_option("asalah_post_date") != "hide")
    ):
        ?>
        <div class="blog_post_date">
            <span class="blog_post_day"><?php the_date("d"); ?></span>
            <span class="blog_post_month"><?php echo get_the_date("M"); ?></span>
        </div>
        <?php
    endif;
}
endif;

if ( ! function_exists( 'asalah_post_icon' ) ) :
function asalah_post_icon($type = 'standard') {
    global $post;
    if ($type == '') {
        $type = 'standard';
    }
    $defaults = array('standard' => 'pencil', 'image' => 'picture-o', 'video' => 'film', 'gallery' => 'picture-o', 'audio' => 'headphones');
    if (asalah_option('asalah_post_icons_' . $type)) {
        if (asalah_option('asalah_post_icons_' . $type . '_image') && asalah_option('asalah_post_icons_' . $type . '_image_upload')) {
            return '<img src="' . asalah_option('asalah_post_icons_' . $type . '_image_upload') . '" />';
        } elseif (asalah_option('asalah_post_icons_' . $type . '_fontawesome')) {
            return '<i class="' . asalah_option('asalah_post_icons_' . $type . '_fontawesome') . '"></i>';
        } else {
            return '<i class="fa fa-' . $defaults[$type] . '"></i>';
        }
    }
}
endif;

if ( ! function_exists( 'asalah_post_icon_label_sanabel' ) ) :
function asalah_post_icon_label_sanabel() {
    global $post;
    // first check if post icons are enabled in option panel 
    if (asalah_option("asalah_post_icons")):

        // then check post format print the image for each post format

        if (get_post_format() == "image" && asalah_option('asalah_post_icons_image')) {
            ?>
            <div class="blog_box_item post_type_box_item image_post_icon">
                <?php echo asalah_post_icon('image'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "video" && asalah_option('asalah_post_icons_video')) {
            ?>
            <div class="blog_box_item post_type_box_item video_post_icon">
                <?php echo asalah_post_icon('video'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "gallery" && asalah_option('asalah_post_icons_gallery')) {
            ?>
            <div class="blog_box_item post_type_box_item gallery_post_icon">
                <?php echo asalah_post_icon('gallery'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "audio" && asalah_option('asalah_post_icons_audio')) {
            ?>
            <div class="blog_box_item post_type_box_item audio_post_icon">
                <?php echo asalah_post_icon('audio'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "" && asalah_option('asalah_post_icons_standard')) {
            ?>
            <div class="blog_box_item post_type_box_item standard_post_icon">
                <?php echo asalah_post_icon('standard'); ?>
            </div>
            <?php
        }
    endif;
    // endif for checking if post icons enabled
}
endif;

if ( ! function_exists( 'asalah_post_icon_label' ) ) :
function asalah_post_icon_label() {
    global $post;
    // first check if post icons are enabled in option panel 
    if (asalah_option("asalah_post_icons")):

        // then check post format print the image for each post format

        if (get_post_format() == "image" && asalah_option('asalah_post_icons_image')) {
            ?>
            <div class="blog_post_type image_post_icon">
                <?php echo asalah_post_icon('image'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "video" && asalah_option('asalah_post_icons_video')) {
            ?>
            <div class="blog_post_type video_post_icon">
                <?php echo asalah_post_icon('video'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "gallery" && asalah_option('asalah_post_icons_gallery')) {
            ?>
            <div class="blog_post_type gallery_post_icon">
                <?php echo asalah_post_icon('gallery'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "audio" && asalah_option('asalah_post_icons_audio')) {
            ?>
            <div class="blog_post_type audio_post_icon">
                <?php echo asalah_post_icon('audio'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "" && asalah_option('asalah_post_icons_standard')) {
            ?>
            <div class="blog_post_type standard_post_icon">
                <?php echo asalah_post_icon('standard'); ?>
            </div>
            <?php
        }
    endif;
    // endif for checking if post icons enabled
}
endif;

if ( ! function_exists( 'asalah_page_meta_info' ) ) :
function asalah_page_meta_info() {
    global $post;
    // first check if meta info line is enabled in option panel 
    if ((asalah_post_option("asalah_page_meta_info") == "show") || (asalah_option("asalah_page_meta_info") && asalah_post_option("asalah_page_meta_info") != "hide")):
        ?>
        <div class="blog_info_box clearfix">
            <!-- check if post date should be in meta or both meta and label in option panel -->
            <?php if (asalah_cross_option('asalah_page_datetime') != "hide"): ?>
                <div class="blog_box_item">
                    <span class="blog_date meta_item"><i class="icon-calendar meta_icon"></i> <?php the_time(get_option('date_format')); ?> - <?php echo get_the_time(); ?></span>
                </div>
            <?php endif; ?>

            <?php if (get_the_category_list()): ?>
                <div class="blog_box_item">
                    <span class="blog_category meta_item"><i class="icon-folder-open meta_icon"></i> <?php echo get_the_category_list(', '); ?></span>
                </div>
            <?php endif; ?>

            <?php if ((asalah_post_option("asalah_post_comments") == "show") || (asalah_option("asalah_enable_comments") && asalah_post_option("asalah_post_comments") != "hide")): ?>
                <div class="blog_box_item">
                    <span class="blog_comments meta_item"><i class="icon-comment meta_icon"></i> <?php comments_number(__("0 Comments", "asalah")); ?></span>
                </div>
            <?php endif; ?>

            <?php if ((asalah_post_option("asalah_page_author_meta") == "show") || (asalah_option("asalah_page_author_meta") && asalah_post_option("asalah_page_author_meta") != "hide")): ?>
                <div class="blog_box_item">
                    <span class="blog_meta_author meta_item"><i class="icon-user meta_icon"></i> <?php _e('By', 'asalah'); ?> <?php the_author_posts_link(); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <?php
    endif;
    // endif for checking if meta info line is enabled in option panel
}
endif;

if ( ! function_exists( 'asalah_post_meta_info' ) ) :
function asalah_post_meta_info() {
    global $post;
    // first check if meta info line is enabled in option panel 
    if ((asalah_post_option("asalah_meta_info") == "show") || (asalah_option("asalah_meta_info") && asalah_post_option("asalah_meta_info") != "hide")):
        ?>
        <div class="blog_info_box clearfix">
            <!-- check if post date should be in meta or both meta and label in option panel -->
            <?php if (asalah_cross_option('asalah_post_datetime') != "hide"): ?>
                <div class="blog_box_item">
                    <span class="blog_date meta_item"><i class="icon-calendar meta_icon"></i> <?php the_time(get_option('date_format')); ?> - <?php echo get_the_time(); ?></span>
                </div>
            <?php endif; ?>

            <?php if (get_the_category_list()): ?>
                <div class="blog_box_item">
                    <span class="blog_category meta_item"><i class="icon-folder-open meta_icon"></i> <?php echo get_the_category_list(', '); ?></span>
                </div>
            <?php endif; ?>

            <?php if ((asalah_post_option("asalah_post_comments") == "show") || (asalah_option("asalah_enable_comments") && asalah_post_option("asalah_post_comments") != "hide")): ?>
                <div class="blog_box_item">
                    <span class="blog_comments meta_item"><i class="icon-comment meta_icon"></i> <?php comments_number(__("0 Comments", "asalah")); ?></span>
                </div>
            <?php endif; ?>

            <?php if ((asalah_post_option("asalah_author_meta") == "show") || (asalah_option("asalah_author_meta") && asalah_post_option("asalah_author_meta") != "hide")): ?>
                <div class="blog_box_item">
                    <span class="blog_meta_author meta_item"><i class="icon-user meta_icon"></i> <?php _e('By', 'asalah'); ?> <?php the_author_posts_link(); ?></a></span>
                </div>
            <?php endif; ?>
        </div>
        <?php
    endif;
    // endif for checking if meta info line is enabled in option panel
}
endif;

/* register new social networks for user */
if ( ! function_exists( 'asalah_author_register_social_networks' ) ) :
function asalah_author_register_social_networks($contactmethods) {
    $contactmethods['twitter'] = __('Twitter', 'asalah');
    $contactmethods['facebook'] = __('Facebook', 'asalah');
    $contactmethods['gplus'] = __('Google Plus', 'asalah');
    $contactmethods['dribbble'] = __('Dribbble', 'asalah');
    $contactmethods['linkedin'] = __('Linkedin', 'asalah');
    return $contactmethods;
}
endif;

add_filter('user_contactmethods', 'asalah_author_register_social_networks', 10, 1);

if ( ! function_exists( 'asalah_author_box' ) ) :
function asalah_author_box() {

    // first check if author box is enabled in option panel
    global $post;
    ?>
    <div class="author_box post_author_box clearfix">
        <div class="author_avatar">
            <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>

        </div>
        <div class="author_info">
            <h5 class="title author_name"><?php the_author(); ?></h5>
            <p><?php echo get_the_author_meta('description'); ?></p>

            <div class="author_social_profiles">

                <?php if (get_the_author_meta('facebook')): ?>
                    <a class="social_profile" rel="nofollow" target="_blank" href="<?php the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a>
                <?php endif; ?>

                <?php if (get_the_author_meta('twitter')): ?>
                    <a class="social_profile" rel="nofollow" target="_blank" href="<?php the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a>
                <?php endif; ?>

                <?php if (get_the_author_meta('gplus')): ?>
                    <a class="social_profile" rel="nofollow" target="_blank" href="<?php the_author_meta('gplus'); ?>"><i class="fa fa-google-plus"></i></a>
                <?php endif; ?>

                <?php if (get_the_author_meta('dribbble')): ?>
                    <a class="social_profile" rel="nofollow" target="_blank" href="<?php the_author_meta('dribbble'); ?>"><i class="fa fa-dribbble"></i></a>
                <?php endif; ?>

                <?php if (get_the_author_meta('linkedin')): ?>
                    <a class="social_profile" rel="nofollow" target="_blank" href="<?php the_author_meta('linkedin'); ?>"><i class="fa fa-rss"></i></a>
                <?php endif; ?>
                
            </div>

        </div>
    </div>
    <?php
}
endif;

if ( ! function_exists( 'asalah_icon_text' ) ) :
function asalah_icon_text($text, $title = '', $color = '', $size = '') {
    $icon_style ='';

    if ($color != '') {
        $icon_style .= ' color:'.$color.';';
    }
    if (preg_match('#^(?:https?|ftp)://#', $text, $m)) {
        if ($size != '') {
            $icon_style .= ' width:'.$size.'px;';
        }
        return "<img src='" . $text . "' title='" . $title . "' style='".$icon_style."' />";
        // return "it's url";
    } else {
        if ($size != '') {
            $icon_style .= ' font-size:'.$size.'px;';
        }
        return "<i class='" . $text . "' style='".$icon_style."'></i>";
        //return "it's icon";
    }
}
endif;

if ( ! function_exists( 'asalah_blogposts_list' ) ) :
function asalah_blogposts_list($num = "3", $thumb = 'bloglist', $orderby = 'date', $cat = '', $tag_ids = '') {
    global $post;

    $args = array('posts_per_page' => $num, 'orderby' => $orderby);

    if ($tag_ids != '') {
        $tags = explode(',', $tag_ids);
        $tags_array = array();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $tags_array[] = $tag;
                }
            }
        }
        $args['tag_slug__in'] = $tags_array;
    }
    $wp_query = new WP_Query($args);

    $bloglist_class = "";
    if ($thumb == "bloglist") {
        $bloglist_class = "blog_block";
    }
    ?>

    <?php if ($wp_query->have_posts()) : ?>
        <ul class="post_list <?php echo esc_attr($bloglist_class); ?>">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="post_item clearfix">

                    <?php if ($thumb != 'hide' && has_post_thumbnail($post->ID)): ?>
                        <div class="post_thumbnail <?php echo esc_attr($thumb); ?>">
                            <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_post_thumbnail($thumb); ?></a>
                        </div>
                    <?php endif; ?>

                    <div class="post_info">
                        <h5 class="title post_title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h5>
                        <p><?php echo excerpt(20); ?></p>
                        <span class="post_time"><?php _e("Posted on", "asalah") ?> <?php the_time(get_option('date_format')); ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    <?php
}
endif;

if ( ! function_exists( 'asalah_return_blogposts_list' ) ) :
function asalah_return_blogposts_list($num = "3", $thumb = 'bloglist', $orderby = 'date', $cat = '', $tag_ids = '') {
    global $post;

    $args = array('posts_per_page' => $num, 'orderby' => $orderby);

    if ($tag_ids != '') {
        $tags = explode(',', $tag_ids);
        $tags_array = array();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $tags_array[] = $tag;
                }
            }
        }
        $args['tag_slug__in'] = $tags_array;
    }
    $wp_query = new WP_Query($args);

    $bloglist_class = "";
    if ($thumb == "bloglist") {
        $bloglist_class = "blog_block";
    }
    $output = '';
    ?>

    <?php if ($wp_query->have_posts()) : ?>
        <?php $output .= '<ul class="post_list ' . $bloglist_class . '">' ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $output .= '<div class="post_item clearfix">'; ?>

            <?php if ($thumb != 'hide' && has_post_thumbnail($post->ID)): ?>
                <?php $output .= '<div class="post_thumbnail ' . $thumb . '"><a href="' . get_permalink() . '" title="' . get_the_title() . '">'; ?>
                <?php $output .= get_the_post_thumbnail($post->ID, $thumb); ?>
                <?php $output .= '</a></div>'; ?>
            <?php endif; ?>

            <?php $output .= '<div class="post_info">'; ?>
            <?php $output .= '<h5 class="title post_title"><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h5>'; ?>
            
            <?php 
            if ($thumb == 'bloglist') {
            $output .= '<p>' . excerpt(13) . ' <a href="'.get_permalink().'" title="'.get_the_title().'" class="blog_read_more">'.__("Read More...", "asalah").'</a></p>'; 
            }
            ?>
            
            <?php $output .= '<span class="post_time">' . get_the_time(get_option('date_format')) . '</span>'; ?>
            <?php $output .= '</div>'; ?>
            <?php $output .= '</div>'; ?>
        <?php endwhile; ?>
        <?php $output .= '</ul>'; ?>
    <?php endif; ?>
    <?php return $output; ?>
    <?php
}
endif;

if ( ! function_exists( 'asalah_default_sidebar_class' ) ) :
function asalah_default_sidebar_class() {
    global $post;
    // first check sidebar position option from option panel
    if (asalah_option("asalah_sidebar_position") == "left") {
        $class = "col-md-3 pull-left";
    } else {
        $class = "col-md-3";
    }
    return $class;
}
endif;

if ( ! function_exists( 'asalah_default_content_class' ) ) :
function asalah_default_content_class() {
    global $post;
    // first check sidebar position option from option panel
    if (asalah_option("asalah_sidebar_position") == "left") {
        $class = "col-md-9 pull-right";
    } elseif (asalah_option("asalah_sidebar_position") == "no-sidebar") {
        $class = "col-md-12";
    } else {
        $class = "col-md-9";
    }

    return $class;
}
endif;

if ( ! function_exists( 'asalah_sidebar_class' ) ) :
function asalah_sidebar_class($id = '') {
    global $post;
    if ($id == '') {
        $id = $post->ID;
    }

    // first check sidebar position option from option panel
    if (asalah_option("asalah_sidebar_position") == "left") {
        $class = "col-md-3 pull-left";
    } else {
        $class = "col-md-3";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_post_layout", $id) != "default") {
        if (asalah_post_option("asalah_post_layout", $id) == "left") {
            $class = "col-md-3 pull-left";
        } elseif (asalah_post_option("asalah_post_layout", $id) == "right") {
            $class = "col-md-3";
        }
    }

    if (is_single()) {
        if (asalah_cross_option('asalah_post_sticky_sidebar') == "yes") {
            $class .= " asalah_sticky_sidebar";
        }
    }elseif(is_page()) {
        if (asalah_cross_option('asalah_page_sticky_sidebar') == "yes") {
            $class .= " asalah_sticky_sidebar";
        }
    }
    
    return $class;
}
endif;

if ( ! function_exists( 'asalah_content_class' ) ) :
function asalah_content_class($id = '') {
    global $post;
    if ($id == '') {
        $id = $post->ID;
    }
    // first check sidebar position option from option panel
    if (asalah_option("asalah_sidebar_position") == "left") {
        $class = "col-md-9 pull-right";
    } elseif (asalah_option("asalah_sidebar_position") == "no-sidebar") {
        $class = "col-md-12";
    } else {
        $class = "col-md-9";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_post_layout", $id) != "default") {
        if (asalah_post_option("asalah_post_layout", $id) == "left") {
            $class = "col-md-9 pull-right";
        } elseif (asalah_post_option("asalah_post_layout", $id) == "right") {
            $class = "col-md-9";
        } elseif (asalah_post_option("asalah_post_layout", $id) == "full") {
            $class = "col-md-12";
        }
    }

    return $class;
}
endif;

if ( ! function_exists( 'asalah_project_sidebar_class' ) ) :
function asalah_project_sidebar_class() {
    global $post;
    // first check sidebar position option from option panel
    if (asalah_option("asalah_project_layout") == "left") {
        $class = "col-md-4 pull-left";
    } elseif (asalah_option("asalah_project_layout") == "full") {
        $class = "col-md-12";
    } else {
        $class = "col-md-4";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_project_layout") != "default") {
        if (asalah_post_option("asalah_project_layout") == "left") {
            $class = "col-md-4 pull-left";
        } elseif (asalah_post_option("asalah_project_layout") == "full") {
            $class = "col-md-12";
        } elseif (asalah_post_option("asalah_project_layout") == "right") {
            $class = "col-md-4";
        }
    }
    return $class;
}
endif;

if ( ! function_exists( 'asalah_project_content_class' ) ) :
function asalah_project_content_class() {
    global $post;

    // first check sidebar position option from option panel
    if (asalah_option("asalah_project_layout") == "left") {
        $class = "col-md-8 pull-right";
    } elseif (asalah_option("asalah_project_layout") == "full") {
        $class = "col-md-12";
    } else {
        $class = "col-md-8";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_project_layout") != "default") {
        if (asalah_post_option("asalah_project_layout") == "left") {
            $class = "col-md-8 pull-right";
        } elseif (asalah_post_option("asalah_project_layout") == "right") {
            $class = "col-md-8";
        } elseif (asalah_post_option("asalah_project_layout") == "full") {
            $class = "col-md-12";
        }
    }

    return $class;
}
endif;

if ( ! function_exists( 'asalah_body_class' ) ) :
function asalah_body_class() {
    $class = "";
    if (asalah_option("asalah_boxed")) {
        $class .= " boxed_body";
    } else {
        $class .= " fluid_body";
    }

    if (asalah_option("asalah_container_width") == 960) {
        $class .= " grid_960";
    }

    if (asalah_option("asalah_dark_skin")) {
        $class .= " dark_skin";
    }

    if (asalah_option("website_global_typography")) {
        $class .= " website_global_typography_".asalah_option("website_global_typography");
    }

    // if (asalah_option('asalah_disable_responsive') == "yes") {
    //     $class .= " responsive_disabled";
    // }

    return $class;
}
endif;

if ( ! function_exists( 'random_id' ) ) :
function random_id($length) {
    $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
    $max = strlen($characters) - 1;
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }

    return $string;
}
endif;
/* this function has been copied from shortcode ultimate plugins and all credits are back to the plugin author */
if ( ! function_exists( 'asalah_su_hex_shift' ) ) :
function asalah_su_hex_shift($supplied_hex, $shift_method, $percentage = 50) {
    $shifted_hex_value = null;
    $valid_shift_option = false;
    $current_set = 1;
    $RGB_values = array();
    $valid_shift_up_args = array('up', '+', 'lighter', '>');
    $valid_shift_down_args = array('down', '-', 'darker', '<');
    $shift_method = strtolower(trim($shift_method));
    // Check Factor
    if (!is_numeric($percentage) || ( $percentage = (int) $percentage ) < 0 || $percentage > 100
    )
        trigger_error("Invalid factor", E_USER_NOTICE);
    // Check shift method
    foreach (array($valid_shift_down_args, $valid_shift_up_args) as $options) {
        foreach ($options as $method) {
            if ($method == $shift_method) {
                $valid_shift_option = !$valid_shift_option;
                $shift_method = ( $current_set === 1 ) ? '+' : '-';
                break 2;
            }
        }
        ++$current_set;
    }
    if (!$valid_shift_option)
        trigger_error("Invalid shift method", E_USER_NOTICE);
    // Check Hex string
    switch (strlen($supplied_hex = ( str_replace('#', '', trim($supplied_hex)) ))) {
        case 3:
            if (preg_match('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', $supplied_hex)) {
                $supplied_hex = preg_replace('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', '\\1\\1\\2\\2\\3\\3', $supplied_hex);
            } else {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        case 6:
            if (!preg_match('/^[0-9a-f]{2}[0-9a-f]{2}[0-9a-f]{2}$/i', $supplied_hex)) {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        default:
            trigger_error("Invalid hex color length", E_USER_NOTICE);
    }
    // Start shifting
    $RGB_values['R'] = hexdec($supplied_hex{0} . $supplied_hex{1});
    $RGB_values['G'] = hexdec($supplied_hex{2} . $supplied_hex{3});
    $RGB_values['B'] = hexdec($supplied_hex{4} . $supplied_hex{5});
    foreach ($RGB_values as $c => $v) {
        switch ($shift_method) {
            case '-':
                $amount = round(( ( 255 - $v ) / 100 ) * $percentage) + $v;
                break;
            case '+':
                $amount = $v - round(( $v / 100 ) * $percentage);
                break;
            default:
                trigger_error("Oops. Unexpected shift method", E_USER_NOTICE);
        }
        $shifted_hex_value .= $current_value = ( strlen($decimal_to_hex = dechex($amount)) < 2 ) ?
                '0' . $decimal_to_hex : $decimal_to_hex;
    }
    return '#' . $shifted_hex_value;
}
endif;

if ( ! function_exists( 'asalah_rev_slider_wrapper' ) ) :
function asalah_rev_slider_wrapper($the_post_id = "") {

    global $post;

    if ($post && $post->ID) {
        $postid = $post->ID;    
    }else{
        $postid = "";
    }

    if ($the_post_id != "") {
        $postid = $the_post_id;
    }

    $slider_wrapper_class = '';
    // after start using asalah_cross_option
    if (asalah_cross_option('asalah_slider_wrapper', $postid) == "container") {
         $slider_wrapper_class .= ' container';
    }

    if (asalah_post_option('asalah_rev_alias', $postid)) {
        echo '<div class="rev_slider_asalah_wrapper '.$slider_wrapper_class.'">';
        if (asalah_cross_option('asalah_slider_wrapper', $postid) == "container") {
             echo '<div class="row"><div class="col-md-12">';
        }
        putRevSlider(asalah_post_option('asalah_rev_alias', $postid));
        if (asalah_post_option('asalah_rev_slier_next_arrow', $postid) == 'show') {
            echo "<span class='go_to_main_content'><i class='fa fa-circle'></i></span>";
        }
        if (asalah_cross_option('asalah_slider_wrapper', $postid) == "container") {
             echo '</div></div>';
        }
        echo '</div>';
    }
}
endif;

if ( ! function_exists( 'asalah_page_title_holder' ) ) :
function asalah_page_title_holder($title = "", $breadcrumb_last = "", $woo = false, $custom_post_id = "") {
    global $post;
    if ($custom_post_id) {
        $postid = $custom_post_id;
    }elseif ($post && $post->ID) {
        $postid = $post->ID;    
    }else{
        $postid = "";
    }

    $asalah_video_poster = '';
    
    ?>
    <!-- check if page title is enabled in options panel -->
    <?php if (asalah_cross_option("asalah_title_holder", $postid) == "show"): ?>
        
        <?php if ($custom_post_id != "no"): ?>
        <!-- check custom bg in post options -->
        <?php if (asalah_post_option("asalah_custom_title_bg", $postid)): ?>
            <?php
            // set poster variable in case of video bg
            $asalah_video_poster = 'poster="'.asalah_post_option("asalah_custom_title_bg", $postid).'"';

            ?>
        <style>
        .page_title_holder {
            background-image: url('<?php echo asalah_post_option("asalah_custom_title_bg", $postid);  ?>');
        }    
        </style>
        <?php endif; ?>

        <!-- check custom repeat -->
        <?php if (asalah_post_option("asalah_page_title_bg_repeat", $postid)) { ?>
        <style>
        .page_title_holder {
            background-repeat: <?php echo asalah_post_option("asalah_page_title_bg_repeat", $postid); ?>;
        }    
        </style>
        <?php } ?>

        <!-- check custom cover size -->
        <?php if (asalah_post_option("asalah_page_title_bg_cover", $postid)) { ?>
            <?php if (asalah_post_option("asalah_page_title_bg_cover", $postid) == "yes") { ?>
                <style>
                .page_title_holder {
                    background-size: cover;
                }    
                </style>
            <?php }else{ ?>
                <style>
                .page_title_holder {
                    background-size: initial;
                }    
                </style>
            <?php } ?>
        <?php } ?>

        <!-- check custom position -->
        <?php if (asalah_post_option("asalah_page_title_bg_pos_x", $postid)) { ?>
        <style>
        .page_title_holder {
            background-position-x: <?php echo asalah_post_option("asalah_page_title_bg_pos_x", $postid); ?>;
        }    
        </style>
        <?php } ?>

        <!-- check custom repeat -->
        <?php if (asalah_post_option("asalah_page_title_bg_pos_y", $postid)) { ?>
        <style>
        .page_title_holder {
            background-position-y: <?php echo asalah_post_option("asalah_page_title_bg_pos_y", $postid); ?>;
        }    
        </style>
        <?php } ?>

        <!-- check overlay color -->
        <?php if (asalah_post_option("asalah_page_title_bg_overlay_color", $postid) && asalah_post_option("asalah_page_title_bg_overlay_color", $postid) != "") { ?>
        <style>
        .page_title_overlay {
            background-color: <?php echo asalah_post_option("asalah_page_title_bg_overlay_color", $postid); ?>;
        }    
        </style>
        <?php } ?>

        <!-- check overlay color -->
        <?php if (asalah_post_option("asalah_page_title_text_color", $postid) && asalah_post_option("asalah_page_title_text_color", $postid) != "") { ?>
        <style>
        .page_info, .page_info a {
            color: <?php echo asalah_post_option("asalah_page_title_text_color", $postid); ?>;
        }    
        </style>
        <?php } ?>
        
        <!-- check custom padding post options -->
        <?php if (asalah_post_option("asalah_banner_padding_top", $postid) || asalah_post_option("asalah_banner_padding_bottom", $postid) ) { ?>
        <style>
        .page_title_holder {
            padding-top: <?php echo asalah_post_option("asalah_banner_padding_top", $postid); ?>px;
            padding-bottom: <?php echo asalah_post_option("asalah_banner_padding_bottom", $postid); ?>px;
        }    
        </style>
        <?php } ?>

        <!-- check custom page title style -->
        <?php if (asalah_post_option("asalah_page_title_style", $postid)) { ?>
            <?php if (asalah_post_option("asalah_page_title_style", $postid) == "default") { ?>
                <style>
                .page_title_holder {
                    text-align: initial;
                }
                .page_title_holder .breadcrumb {
                    float: left;
                }
                .page_title_holder h1 {
                    float: right;font-size: 15px;margin-bottom: 0px;
                }   
                </style>
            <?php } elseif (asalah_post_option("asalah_page_title_style", $postid) == "center") { ?>
                <style>
                .page_title_holder {
                    text-align: center;
                }
                .page_title_holder .breadcrumb {
                    float: none;
                }
                .page_title_holder h1 {
                    float: none;font-size: 22px;margin-bottom: 12px;
                }   
                </style>
            <?php } ?>
            
        <?php } ?>
        <?php endif; ?>
        
        <!-- Start Page Title Holder -->
        <div class="page_title_holder container-fluid">

            <?php if ($custom_post_id != "no"): ?>
                <?php if (asalah_post_option('asalah_banner_video_mp4', $postid) 
                            || asalah_post_option('asalah_banner_video_m4v', $postid)
                            || asalah_post_option('asalah_banner_video_webm', $postid)
                            || asalah_post_option('asalah_banner_video_ogv', $postid)
                             ) : ?>
                            
                    <style>
                    .page_title_holder {
                        overflow: hidden;
                        position: relative;
                    }    
                    </style>
                             
                    <video class="video_overlay" preload="auto" <?php echo esc_attr($asalah_video_poster); ?> autoplay="autoplay" loop muted="muted">
                    <source src="<?php echo asalah_post_option('asalah_banner_video_m4v', $postid); ?>" type="video/mp4" />
                    <source src="<?php echo asalah_post_option('asalah_banner_video_webm', $postid); ?>" type="video/webm" />
                    <source src="<?php echo asalah_post_option('asalah_banner_video_ogv', $postid); ?>" type="video/ogg" />
                    <source src="<?php echo asalah_post_option('asalah_banner_video_mp4', $postid); ?>" />
                    </object>
                    </video>
                <?php endif; ?>
            <?php endif; ?>
            
            <!-- check if overlay is enabled in theme options or post options -->
            <?php if ($custom_post_id != "no"): ?>
                <?php if (asalah_option("asalah_enable_title_overlay") && !asalah_post_option("asalah_page_title_bg_overlay", $postid)
                            || asalah_post_option("asalah_page_title_bg_overlay", $postid) == "yes"): ?>
                <div class="page_title_overlay"></div>
                <?php endif; ?>
            <?php else: ?>
                <?php if (asalah_option("asalah_enable_title_overlay")): ?>
                <div class="page_title_overlay"></div>
                <?php endif; ?>
            <?php endif; ?>
            
            <div class="container">
                <div class="page_info">
                    <?php
                    $page_title = '';
                    if (get_the_title()) {
                        $page_title = get_the_title();
                    }
                    if ($title != ""){
                        $page_title = $title;
                    }
                    ?>
                    <?php if (asalah_cross_option("asalah_post_title", $postid) == "show"): ?>
                    <h1><?php echo esc_attr($page_title); ?></h1>
                    <?php endif; ?>
    
                    <?php
                    if (asalah_cross_option("asalah_breadcrumb", $postid) == "show"): 
                        if (!$woo) {
                            asalah_breadcrumbs($breadcrumb_last);
                        }else{
                            asalah_breadcrumbs($breadcrumb_last);
                        }  
                    endif;                      
                    ?>
                </div>
            </div>
            
        </div>
        <!-- End Page Title Holder -->    

    <?php endif; ?>
    <!-- endif for checking page title in option panel -->
    <?php
}
endif;

/* start woocommerce */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

if ( ! function_exists( 'asalah_woocommerce_breadcrumbs' ) ) :
function asalah_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47;&#47; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;
add_filter( 'woocommerce_breadcrumb_defaults', 'asalah_woocommerce_breadcrumbs' );

if ( !function_exists( 'asalah_header_checkout' ) ) {
    function asalah_header_checkout() {
        global $woocommerce;
        if ( !$woocommerce || is_cart() || is_checkout() ) { return false; }
        if (class_exists('Woocommerce')) {
            echo '<div class="asalah_cart_icon asalah_cart_count_'.$woocommerce->cart->cart_contents_count.'">';
            echo '<a href="'.$woocommerce->cart->get_cart_url().'" title="'.__('View your shopping cart', 'asalah').'" class="cart-contents"><i class="fa fa-shopping-cart"></i></a>';
            echo '<div class="my_cart_content dropdown-menu">';
            the_widget( 'WC_Widget_Cart', 'title= ');
            echo '</div>';
            echo '</div>';
        }   
    }
}
add_action( 'header_checkout', 'asalah_header_checkout' );

if ( ! function_exists( 'my_theme_wrapper_start' ) ) :
function my_theme_wrapper_start() {
    global $post;
    if (is_shop()) {
        $id = get_option('woocommerce_shop_page_id');
    } else {
        $id = $post->ID;
    }
    echo '<div class="main_content ' . asalah_content_class($id) . ' ">';
}
endif;

if ( ! function_exists( 'my_theme_wrapper_end' ) ) :
function my_theme_wrapper_end() {
    echo '</div>';
}
endif;

remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
if ( ! function_exists( 'woocommerce_pagination' ) ) :
function woocommerce_pagination() {
    asalah_bootstrap_pagination();
}
endif;
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

add_theme_support('woocommerce');

$asalah_woocommerce_per_page = "return 12;";
if (asalah_option('asalah_woo_per_page')) {
    $asalah_woocommerce_per_page = 'return '.asalah_option('asalah_woo_per_page').';';
}
add_filter( 'loop_shop_per_page', create_function( '$cols', $asalah_woocommerce_per_page ), 20 );

/* end woocommerce */

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

/* start infinite scroll */
if ( ! function_exists( 'asalah_infinite_scroll' ) ) :
function asalah_infinite_scroll(){ 
    $loopFile        = $_POST['loop_file'];
    $paged           = $_POST['page_no'];
    $posts_per_cycle  = $_POST['posts_per_page'];
    $post_type  = $_POST['post_type'];

    # Load the posts
    $query_array = array('post_type' => $post_type, 'posts_per_page' => $posts_per_cycle, 'paged' => $paged );
    if (isset($_POST['tax'])) {
        $tax = $_POST['tax'];
        $query_array['tagportfolio'] = $tax;
    }
    if (isset($_POST['cat'])) {
        $tax = $_POST['cat'];
        $query_array['cat'] = $tax;
    }

    if (isset($_POST['tag'])) {
        $tax = $_POST['tag'];
        $query_array['tag'] = $tax;
    }
    query_posts($query_array); 
    get_template_part( $loopFile );
 
    exit;
}
endif;

add_action('wp_ajax_infinite_scroll', 'asalah_infinite_scroll');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'asalah_infinite_scroll');    // if user not logged in
/* end infinite scroll */


if ( ! function_exists( 'asalah_social_icons_list' ) ) :
function asalah_social_icons_list($bg = "", $color = "", $skin = "") {
    global $asalah_data;
    $networks = array("facebook" => "Facebook", "twitter" => "Twitter", "google-plus" =>  "Google Plus", "behance" => "Behance", "dribbble" => "Dribbble", "linkedin" => "Linked In", "youtube" => "Youtube", 'vimeo-square' => 'Vimeo', "vk" => "VK", "skype" => "Skype", "instagram" => "Instagram", "pinterest" => "Pinterest", "github" => "Github", "renren" => "Ren Ren", "flickr" => "Flickr", "rss" =>  "RSS");

    $activated = 0;
    $social_link_style = '';

    if ($bg) {
        $social_link_style .= ' background: none; background-color: '.$bg.';';
    }
    if ($color) {
        $social_link_style .= ' color: '.$color.';';
    }

    $output = "";
    foreach ($networks as $network => $social ) {
        $id = "asalah_" . $network . "_url";
        if (asalah_option($id) != "") {
            $activated++;
            if ($activated == 1) {
                $output .= '<ul class="social_icons_list ' . $skin . '">';
            }
            $output .= '<li class="social_icon ' . $network . '_icon"><a  rel="nofollow" style="'.$social_link_style.'" target="_blank" title="'.$social.'" href="'.asalah_option($id).'"><i class="fa fa-' . $network . '"></i></a></li>';
        }
    }
    if ($activated != "0") {
        $output .= '</ul>';
    }

    if ($output != '') {
        return $output;
    }
}
endif;

if ( ! function_exists( 'asalah_page_share' ) ) :
function asalah_page_share() {
    // first check if social share is enabled in option panel
    if ((asalah_post_option("asalah_page_share") == "show") || (asalah_option("asalah_page_post_social_share") && asalah_post_option("asalah_page_share") != "hide")):

        // then check if sliding social share is enabled, if so add sliding_social_share class which should be deceted by jquery in /inc/single_scripts.js
        if (asalah_option("asalah_sliding_social_share")) {
            $class = "blog_social_share sliding_social_share";
        } else {
            $class = "blog_social_share";
        }
        ?>
        <div class="<?php echo esc_attr($class); ?> clearfix">
            <span class="blog_share_sign"><i class="fa fa-share"></i></span>
            <ul class="social_icons_list blog_post_share_icons <?php echo asalah_option("asalah_post_social_share_skin") ?>">
                <li class="social_icon facebook_icon"><a rel="nofollow" href="<?php the_permalink(); ?>" onclick=" window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436');
                                return false;"><i class="fa fa-facebook"></i></a></li>

                <li class="social_icon twitter_icon"><a rel="nofollow" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="social_icon gplus_icon"><a rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                return false;"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <?php
    endif;
    // endif for checking if social share enabled in option panel
}
endif;

if ( ! function_exists( 'asalah_post_share' ) ) :
function asalah_post_share() {
    // first check if social share is enabled in option panel
    if ((asalah_post_option("asalah_post_share") == "show") || (asalah_option("asalah_post_social_share") && asalah_post_option("asalah_post_share") != "hide")):

        // then check if sliding social share is enabled, if so add sliding_social_share class which should be deceted by jquery in /inc/single_scripts.js
        if (asalah_option("asalah_sliding_social_share")) {
            $class = "blog_social_share sliding_social_share";
        } else {
            $class = "blog_social_share";
        }
        ?>
        <div class="<?php echo esc_attr($class); ?> clearfix">
            <span class="blog_share_sign"><i class="fa fa-share"></i></span>
            <ul class="social_icons_list blog_post_share_icons <?php echo asalah_option("asalah_post_social_share_skin") ?>">
                <li class="social_icon facebook_icon"><a rel="nofollow" href="<?php the_permalink(); ?>" onclick=" window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436');
                                return false;"><i class="fa fa-facebook"></i></a></li>

                <li class="social_icon twitter_icon"><a rel="nofollow" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="social_icon gplus_icon"><a rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                return false;"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <?php
    endif;
    // endif for checking if social share enabled in option panel
}
endif;

if ( ! function_exists( 'asalah_post_like' ) ) :
function asalah_post_like() {
    ?>
    <div class="social_share clearfix">
        <div class="fbshare socialbutton">
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>

        <div class="twtweet socialbutton">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="en">Tweet</a>
            <script>!function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "https://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");</script>
        </div>

        <div class="gpbutton socialbutton">
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>

            <!-- Place this tag after the last +1 button tag. -->
            <script type="text/javascript">
                (function() {
                    var po = document.createElement('script');
                    po.type = 'text/javascript';
                    po.async = true;
                    po.src = 'https://apis.google.com/js/plusone.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(po, s);
                })();
            </script>
        </div>

        <div class="pinit socialbutton">
            <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_image_src( get_post_thumbnail_id() ); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
        </div>

    </div>  
    <?php
}
endif;

if ( ! function_exists( 'asalah_twitter_tweets' ) ) :
function asalah_twitter_tweets($consumerkey = '', $consumersecret = '', $accesstoken = '', $accesstokensecret = '', $screenname = '', $tweets_count = 2) {

    if (empty($consumerkey) || empty($consumersecret) || empty($accesstokensecret) || empty($accesstoken)) {
        return 'Your twitter application info is not set correctly in option panel, please create please login to twitter developers <a href="https://dev.twitter.com/apps" target="_blank">here</a>, create new application and new access tocken, then go to theme option panel social section and fill the data you got from application';
    } else {
        $twitter = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

        $tweets = $twitter->get('statuses/user_timeline', array('screen_name' => $screenname, 'count' => $tweets_count));

        $output = '';

        if (is_array($tweets) && !isset($tweets->errors)) {
            $i = 0;
            $lnk_msg = NULL;

            $output .= "<ul>";
            foreach ($tweets as $tweet) {
                $i++;

                $lnk_page = 'http://twitter.com/#!/' . $screenname;
                $page_name = $tweet->user->name;

                $msg = $tweet->text;

                if (is_array($tweet->entities->urls)) {
                    try {
                        if (array_key_exists('0', $tweet->entities->urls)) {
                            $lnk_msg = $tweet->entities->urls[0]->url;
                        } else {
                            $lnk_msg = NULL;
                        }
                    } catch (Exception $e) {
                        $lnk_msg = NULL;
                    }
                }



                $lnk_tweet = 'http://twitter.com/#!/' . $screenname . '/status/' . $tweet->id_str;


                /* Tweet Time */
                $time = strtotime($tweet->created_at);
                $delta = abs(time() - $time); /* in seconds */
                $result = '';
                if ($delta < 1) {
                    $result = ' just now';
                } elseif ($delta < 60) {
                    $result = $delta . ' seconds ago';
                } elseif ($delta < 120) {
                    $result = ' about a minute ago';
                } elseif ($delta < (45 * 60)) {
                    $result = ' about ' . round(($delta / 60), 0) . ' minutes ago';
                } elseif ($delta < (2 * 60 * 60)) {
                    $result = ' about an hour ago';
                } elseif ($delta < (24 * 60 * 60)) {
                    $result = ' about ' . round(($delta / 3600), 0) . ' hours ago';
                } elseif ($delta < (48 * 60 * 60)) {
                    $result = ' about a day ago';
                } else {
                    $result = ' about ' . round(($delta / 86400), 0) . ' days ago';
                }


                if ($i >= $tweets_count)
                    break;


                $output .= '<li class="cat-item"><a rel="nofollow" target="_target" href="' . $lnk_tweet . '" class="tweet_icon"><i class="fa fa-twitter"></i></a> <a target="_blank" class="tweet_name" href="' . $lnk_tweet . '">' . $screenname . '</a> ';


                $output .= $msg;

                $output .= '<span class="tweet_time">' . $result . '</span></li>';
            } /* foreach */

            $output .= "</ul>";
            return $output;
            if (!empty($output)) {
                //return; $output;
            }
        } else {
            if (isset($tweets->errors)):
                $output .= '<span class="tweet_error">Message: ' . $tweets->errors[0]->message . ', Please check your Twitter Authentication Data or internet connection.</span>';
            else:
                $output .= '<span class="tweet_error">Please check your internet connection.</span>';
            endif;

            if (!empty($output)) {
                return $output;
            }
        }
    }
}
endif;


remove_shortcode('gallery');

if ( ! function_exists( 'asalah_gallery_shortcode' ) ) :
function asalah_gallery_shortcode( $attr ) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) ) {
            $attr['orderby'] = 'post__in';
        }
        $attr['include'] = $attr['ids'];
    }

    /**
     * Filter the default gallery shortcode output.
     *
     * If the filtered output isn't empty, it will be used instead of generating
     * the default gallery template.
     *
     * @since 2.5.0
     *
     * @see gallery_shortcode()
     *
     * @param string $output The gallery output. Default empty.
     * @param array  $attr   Attributes of the gallery shortcode.
     */
    $output = apply_filters( 'post_gallery', '', $attr );
    if ( $output != '' ) {
        return $output;
    }

    $html5 = current_theme_supports( 'html5', 'gallery' );
    $atts = shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => $html5 ? 'figure'     : 'dl',
        'icontag'    => $html5 ? 'div'        : 'dt',
        'captiontag' => $html5 ? 'figcaption' : 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr, 'gallery' );

    $id = intval( $atts['id'] );

    if ( ! empty( $atts['include'] ) ) {
        $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( ! empty( $atts['exclude'] ) ) {
        $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    } else {
        $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    }

    if ( empty( $attachments ) ) {
        return '';
    }

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment ) {
            $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
        }
        return $output;
    }

    $itemtag = tag_escape( $atts['itemtag'] );
    $captiontag = tag_escape( $atts['captiontag'] );
    $icontag = tag_escape( $atts['icontag'] );
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) ) {
        $itemtag = 'dl';
    }
    if ( ! isset( $valid_tags[ $captiontag ] ) ) {
        $captiontag = 'dd';
    }
    if ( ! isset( $valid_tags[ $icontag ] ) ) {
        $icontag = 'dt';
    }

    $columns = intval( $atts['columns'] );
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = '';

    /**
     * Filter whether to print default gallery styles.
     *
     * @since 3.1.0
     *
     * @param bool $print Whether to print default gallery styles.
     *                    Defaults to false if the theme supports HTML5 galleries.
     *                    Otherwise, defaults to true.
     */
    if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
        $gallery_style = "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 2px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
            /* see gallery_shortcode() in wp-includes/media.php */
        </style>\n\t\t";
    }

    $size_class = sanitize_html_class( $atts['size'] );
    switch ($columns) {
        case 1:
            $column_class = "full_column";
            break;
        case 2:
            $column_class = "one_half";
            break;
        case 3:
            $column_class = "one_third";
            break;
        case 4:
            $column_class = "one_fourth";
            break;
        case 5:
            $column_class = "one_fifth";
            break;
        case 6:
            $column_class = "one_sixth";
            break;
        case 7:
            $column_class = "one_seventh";
            break;
        case 8:
            $column_class = "one_eighth";
            break;
        case 9:
            $column_class = "one_ninth";
            break;
        default:
            $column_class = "one_fourth";


    }
    $gallery_div = "<div class='filterable_wrapper'><div id='$selector' class='filterable_grid clearfix gallery galleryid-{$id} asalah_row gallery_row gallery-columns-{$columns} gallery-size-{$size_class} '>";

    /**
     * Filter the default gallery shortcode CSS styles.
     *
     * @since 2.5.0
     *
     * @param string $gallery_style Default CSS styles and opening HTML div container
     *                              for the gallery shortcode output.
     */
    $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {

        $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
        if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
            $the_image = wp_get_attachment_image_src( $id, $atts['size'] );
            $thumb_attributes = $the_image[0];
            $image_attributes = wp_get_attachment_url($id);
            $attachment_title = get_the_title($id);
            if ( $captiontag && trim($attachment->post_excerpt) ) {
                $image_output = '<a href="'. $image_attributes.'" class="fancybox" rel="fancybox['.$selector.']" title="'.wptexturize($attachment->post_excerpt).'">';
            }else{
                $image_output = '<a href="'. $image_attributes.'" class="fancybox" rel="fancybox['.$selector.']" title="'.$attachment_title.'">';
            }
            $image_output .= '<img src="'.$thumb_attributes.'">';
            $image_output .= '</a>';
        } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
            $image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
        } else {
            $image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
        }
        $image_meta  = wp_get_attachment_metadata( $id );

        $orientation = '';
        if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
            $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
        }
        $output .= "<{$itemtag} class='gallery_column filterable_item {$column_class}'>";
        $output .= "
            <{$icontag} class='gallery-icon {$orientation}'>
                $image_output
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
            $output .= '<br style="clear: both" />';
        }
    }

    if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
        $output .= "
            <br style='clear: both' />";
    }

    $output .= "
        </div></div>\n";

    return $output;
}
endif;
add_shortcode('gallery', 'asalah_gallery_shortcode');

if ( ! function_exists( 'asalah_bootstrap_pagination' ) ) :
function asalah_bootstrap_pagination($pages = '', $range = 2) {
    if (asalah_option('asalah_default_pagination_style') == 'navigation') {
        posts_nav_link();
    }else{
        $showitems = ($range * 2) + 1;
        global $paged;
        if (empty($paged))
            $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {
            echo "<div class='pagination_container'><ul class='pagination'>";
            if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
            if ($paged > 1 && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                    echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='active'>" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
                }
            }

            if ($paged < $pages && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
            if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
            echo "</ul></div>\n";
        }
    }
}
endif;

function my_shortcode( ) {
	$short='';
	
	$short .='<link rel="stylesheet" href="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/css/style.css">';
	$short .='<link rel="stylesheet" href="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/css/style1.css">';
	$short .='<link rel="stylesheet" href="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/css/demo.css">';
	$short .='<link rel="stylesheet" href="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/css/style_common.css"> <!-- Resource style -->'; 
	$short .='<script src="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/filter_js/modernizr.js"></script>';
	$short .='<style type="text/css">
.viewmoreposts{
	background: #000 none repeat scroll 0 0;
    box-shadow: 0 0 1px #000;
    color: #fff;
    display: inline-block;
    margin: 0 0 0 516px;
    padding: 7px 14px;
    text-decoration: none;
    text-transform: uppercase;
}
.info{
	background: #000 none repeat scroll 0 0;
    box-shadow: 0 0 1px #000;
    color: #fff;
    display: inline-block;
    padding: 7px 14px;
    text-decoration: none;
    text-transform: uppercase;
}
.cursur{
cursor:pointer;
}
</style>';
	$short .='<div class="site_content">';
  	$short .='<main class="cd-main-content">';
   
  				$slug="team";
					$thisCat = get_category_by_slug($slug);
					$categories=get_categories(array( 'parent' => $thisCat->cat_ID ));

			$short .='<div class="cd-tab-filter-wrapper">';
			$short .='<div class="cd-tab-filter">';
			$short .='<ul class="cd-filters">';
			$short .='<li class="placeholder">'; 
			$short .='<a data-type="all" href="#0">All</a> <!-- selected option on mobile --></li>'; 
			$short .='<li class="filter" data-filter=".mix" posts="0"><a class="selected" href="#0" data-type="all">All</a></li>';
						$cattext1="";
					 foreach ( $categories as $cat_term )
							{
								
					$short .='<li class="filter" data-filter=".'.$cat_term->name.'"  posts="0"><a href="#0"  data-count="'.$cat_term->count.'"   data-type="'.$cat_term->name.'">'.$cat_term->name.'</a></li>';
					
					
			    			 $cattext1.=$cat_term->term_id.",";
			    			}	
			    			
					$short .='</ul>
			</div>
			<div class="cd-filter-content">
				<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
									<option value="">Choose an option</option>
									<option value=".Adolescents">Adolescents</option>
									<option value=".Adults">Adults</option>
									<option value=".Children">Children</option>
									<option value=".Couples">Couples</option>
								</select>
						</div></div>	
			</div>';
		
			$short .='<section class="cd-gallery" posts="0">';
				$short .='<ul class="selected">';
						

							$args=array(
 									 'cat' =>$cattext1,
 									 'posts_per_page' => 100,
  											);
  											
  							$query = new WP_Query($args);
							
							//query_posts("cat=$cat_id2&posts_per_page=-1&order=ASC");
							if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
							
							   $category = get_the_category( );
								$cattext="";
							
								foreach($category as $cat)
								{
									
		    					$cattext.=" ".$cat->cat_name;
		    					
								}
							$permalink = get_permalink();
							$title = get_the_title();
							
							$thumbnail = get_the_post_thumbnail();
		$short .='<li class="mix '.$cattext.' view view-first"><a href="'.$permalink.'">'.$thumbnail.'</a>';
						
					$short .='<div class="mask">';
					
                      $short .='<p>'.$title.'</p>';
                        $short .='<h2><span class="cursur" onclick="window.location=\''.$permalink.'\'">Read more</span></h2>';
                    $short .='</div>';
                   $short .='</li>';
                   
						endwhile; 
						
						endif; 
							
					$short .='<li class="gap"></li>';
					$short .='<li class="gap"></li>';
					$short .='<li class="gap"></li>';
				
			$short .='</ul>';
		
				$short .='<div class="cd-fail-message">No results found</div>';
					
				$short .='</section>';

	$short .='</main>';
	$short .='</div>';
	  
$short .='<script src="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/filter_js/jquery.mixitup.min.js"></script><script>$= jQuery.noConflict();</script>';
$short .='<script src="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/filter_js/main.js"></script>';
$short .='<script src="https://www.bayridgecounsellingcentres.ca/wp-content/themes/sanabel/filter_js/jquery.contenthover.js"></script>';
	 
	 return $short;
}
add_shortcode( 'shortcode', 'my_shortcode' );

function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

?>