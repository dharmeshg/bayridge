<?php
/*
Plugin Name: Sanabel Core
Plugin URI: http://ahmad.works/sanabel/
Description: The core plugin of Sanabel Wordpress theme
Author: Ahmad Abou Hashem
Author URI: http://ahmad.works/
Version: 1.0.1
*/

add_action('init', 'portfolio_init');
/* SECTION - project_custom_init */

function portfolio_init() {
    $labels = array(
        'name' => _x('Projects', 'post type general name', 'asalah'),
        'singular_name' => _x('Project', 'post type singular name', 'asalah'),
        'add_new' => _x('Add New', 'project', 'asalah'),
        'add_new_item' => __('Add New Project', 'asalah'),
        'edit_item' => __('Edit Project', 'asalah'),
        'new_item' => __('New Project', 'asalah'),
        'view_item' => __('View Project', 'asalah'),
        'search_items' => __('Search Projects', 'asalah'),
        'not_found' => __('No projects found', 'asalah'),
        'not_found_in_trash' => __('No projects found in Trash', 'asalah'),
        'parent_item_colon' => '',
        'menu_name' => 'Portfolio'
    );
    // Some arguments and in the last line 'supports', we say to WordPress what features are supported on the Project post type  
    $portfolio_slug = "project";
    if ( function_exists( 'asalah_option' ) ) :
        if (asalah_option('asalah_portfolio_slug') != "") {
            $portfolio_slug = asalah_option('asalah_portfolio_slug');
        }
    endif;
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'exclude_from_search' => false,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor','excerpt', 'author', 'thumbnail', 'excerpt', 'revisions', 'post-formats', 'custom-fields'),
        'can_export' => true,
        'rewrite' => array(
            'slug' => $portfolio_slug
        )
    );
    // We call this function to register the custom post type  
    register_post_type('project', $args);

    $labels = array(
        'name' => _x('Tags', 'taxonomy general name', 'asalah'),
        'singular_name' => _x('Tag', 'taxonomy singular name', 'asalah'),
        'search_items' => __('Search Types', 'asalah'),
        'all_items' => __('All Tags', 'asalah'),
        'parent_item' => __('Parent Tag', 'asalah'),
        'parent_item_colon' => __('Parent Tag:', 'asalah'),
        'edit_item' => __('Edit Tags', 'asalah'),
        'update_item' => __('Update Tag', 'asalah'),
        'add_new_item' => __('Add New Tag', 'asalah'),
        'new_item_name' => __('New Tag Name', 'asalah'),
    );
    // Register Custom Taxonomy  
    register_taxonomy('tagportfolio', array('project'), array(
        'hierarchical' => true, // define whether to use a system like tags or categories  
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tag-portfolio'),
    ));
}

/* --- Custom Messages - project_updated_messages --- */
add_filter('post_updated_messages', 'project_updated_messages');

function project_updated_messages($messages) {
    global $post, $post_ID;
    $messages['project'] = array(
        0 => '', // Unused. Messages start at index 1.  
        1 => sprintf(__('Project updated. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'asalah'),
        3 => __('Custom field deleted.', 'asalah'),
        4 => __('Project updated.', 'asalah'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Project restored to revision from %s', 'asalah'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Project published. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Project saved.', 'asalah'),
        8 => sprintf(__('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
                // translators: Publish box date format, see http://php.net/date  
                date_i18n(__('M j, Y @ G:i', 'asalah'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}
/* --- #end SECTION - project_updated_messages --- */
?>