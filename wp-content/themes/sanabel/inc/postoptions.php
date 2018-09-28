<?php
add_action("admin_init", "asalah_post_meta");

function asalah_post_meta() {
    $global_types = array('post','page', 'project', 'product');
    $types = array('post', 'page');

    // add meta box for commons options in posts and pages

    add_meta_box("post_options", sprintf(__('%s - Post Options.', 'asalah'), theme_name), "asalah_posts_meta_options", "post", "normal", "core");

    add_meta_box("Page_options", sprintf(__('%s - Page Options.', 'asalah'), theme_name), "asalah_page_options", "page", "normal", "core");

    add_meta_box("project_details", sprintf(__('%s - Project Details.', 'asalah'), theme_name), "asalah_project_details", "project", "normal", "high");
    add_meta_box("project_options", sprintf(__('%s - Project Options.', 'asalah'), theme_name), "asalah_project_options", "project", "normal", "core");

    add_meta_box("product_options", sprintf(__('%s - Product Options.', 'asalah'), theme_name), "asalah_posts_product_options", "product", "normal", "high");

    add_meta_box("asalah_portfolio_template_box", sprintf(__('%s - Portfolio Template Options.', 'asalah'), theme_name), "page_portfolio_template_options", "page", "normal", "high");
    add_meta_box("asalah_blog_template_box", sprintf(__('%s - Blog Template Options.', 'asalah'), theme_name), "page_blog_template_options", "page", "normal", "high");

    foreach ($global_types as $type) {
        add_meta_box("asalah_general_page_options", sprintf(__('%s - General Page Options.', 'asalah'), theme_name), "asalah_global_options", $type, "normal", "core");
    }
}

function asalah_post_options($value, $validation = "") {
    global $post;

    $depends_on_templates = "";
    if (isset($value['templates']) && $value['templates'] != "" ) {

        $mother_templates_atts = '';
        foreach($value['templates'] as $template) {
            $mother_templates_atts .= 'page-templates/'.$template.'.php ';
        }
        $depends_on_templates = ' data_mother_templates="'.$mother_templates_atts.'"';
    }
    ?>

    <div class="option-item asalah_post_option_item" id="<?php echo esc_attr($value['id']) ?>-item" <?php echo esc_attr($depends_on_templates); ?> >
        <span class="label"><?php echo esc_attr($value['name']); ?></span>
        <?php
        $id = esc_attr($value['id']);
        $get_meta = get_post_custom($post->ID);
        $current_value = "";
        if (isset($value['default']) && $value['default']) {
        	$current_value = $value['default'];
        }
        if (isset($get_meta[$id][0])) {
            if ($validation == 'html') {
                $current_value = balanceTags($get_meta[$id][0]);
            }elseif($validation == 'url') {
                $current_value = esc_url($get_meta[$id][0]);
            }elseif($validation == 'attr') {
                $current_value = esc_attr($get_meta[$id][0]);
            }else{
                $current_value = $get_meta[$id][0];
            }           
        }

        switch ($value['type']) {

            case 'text':
                ?>
                <input  name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="text" value="<?php echo ($current_value) ?>" />
                <?php
                break;

            case 'color':
                ?>
                <input class="asalah_color" name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="text" value="<?php echo ($current_value) ?>"  />
                <?php
                break;
                
            case 'image':
                ?>
                <input  name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" class="input-upload" type="text" value="<?php echo ($current_value) ?>" />
                <a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
                <?php
                break;
                
            case 'video':
                ?>
                <input  name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" class="input-upload" type="text" value="<?php echo ($current_value) ?>" />
                <a href="#" class="aq_upload_button button" rel="video">Upload</a><p></p>
                <?php
                break;

            case 'select':
                ?>
                <select name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>">
                    <?php foreach ($value['options'] as $key => $option) { ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php
                        if ($current_value == $key) {
                            echo ' selected="selected"';
                        }
                        ?>><?php echo esc_attr($option); ?></option>
                            <?php } ?>
                </select>
                <?php
                break;

            case 'textarea':
                ?>
                <textarea name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="<?php echo esc_attr($value['type']); ?>" cols="" rows=""><?php echo ($current_value) ?></textarea>
                <?php
                break;
        }
        ?>
    </div>
    <?php
}


function asalah_posts_product_options() {
    global $asalah_data;
    asalah_post_options(
            array("name" => __("Layout", 'asalah'),
                "id" => "asalah_post_layout",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'right' => 'Right Sidebar',
                    'left' => 'Left Sidebar',
                    'full' => 'No Sidebar'
    )));

    // create custom sidebars array to use in the next option
    $custom_sidebars_options = array('none' => 'None');
    $sidebars = $asalah_data['asalah_custom_sidebars'];
    if ($sidebars):
        foreach ($sidebars as $option) {
            $siebar_id = "asalah_custom_sidebar_" . $option['order'];
            $custom_sidebars_options[$siebar_id] = $option['title'];
        }
    endif;
    
    asalah_post_options(
            array("name" => __("Custom Sidebar", 'asalah'),
                "id" => "asalah_custom_sidebar",
                "type" => "select",
                "options" => $custom_sidebars_options,
    ));
    wp_nonce_field( basename( __FILE__ ), 'asalah_posts_product_options' );

}

add_action('save_post', 'save_product');
function save_product() {
    global $post;

    if ( isset($post) ) : // check if post is exists

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['asalah_posts_product_options'] ) || !wp_verify_nonce( $_POST['asalah_posts_product_options'], basename( __FILE__ ) ) )
        return $post->ID;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post->ID ) )
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_post_layout',
        'asalah_custom_sidebar'
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }

    endif; // end if check if post is exists
}

function asalah_page_options() {

    global $asalah_data;
    asalah_post_options(
            array("name" => __("Layout", 'asalah'),
                "id" => "asalah_post_layout",
                // "templates" => array('clean', 'blog'),
                // "input" => array(
                //     "name" => "",
                //     "value" => "",
                //     ),
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'right' => 'Right Sidebar',
                    'left' => 'Left Sidebar',
                    'full' => 'No Sidebar'
    )));

    // create custom sidebars array to use in the next option
    $custom_sidebars_options = array('none' => 'None');
    $sidebars = $asalah_data['asalah_custom_sidebars'];
    if ($sidebars):
        foreach ($sidebars as $option) {
            $siebar_id = "asalah_custom_sidebar_" . $option['order'];
            $custom_sidebars_options[$siebar_id] = $option['title'];
        }
    endif;

    asalah_post_options(
            array("name" => __("Custom Sidebar", 'asalah'),
                "id" => "asalah_custom_sidebar",
                "type" => "select",
                "options" => $custom_sidebars_options,
    ));

    asalah_post_options(
            array("name" => __("Sticky Sidebar", 'asalah'),
                "id" => "asalah_page_sticky_sidebar",
                "type" => "select",
                "options" => array(
                    false => 'Same as site options',
                    'no' => 'No',
                    'yes' => 'Yes',
                    
    )));

    asalah_post_options(
            array("name" => __("Full Page Scroll", 'asalah'),
                "id" => "asalah_onepage_scroll",
                "type" => "select",
                "default" => "no",
                "options" => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                    
    )));
    
    asalah_post_options(
            array("name" => __("Meta Info", 'asalah'),
                "id" => "asalah_page_meta_info",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Author Box", 'asalah'),
                "id" => "asalah_page_author_box",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Author Name in Meta", 'asalah'),
                "id" => "asalah_page_author_meta",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Date And Time in Meta", 'asalah'),
                "id" => "asalah_page_datetime",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Share", 'asalah'),
                "id" => "asalah_page_share",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Comments", 'asalah'),
                "id" => "asalah_page_comments",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Before Content", 'asalah'),
                "id" => "asalah_before_content",
                "templates" => array('woocommerce'),
                "type" => "textarea"));

    asalah_post_options(
            array("name" => __("After Content", 'asalah'),
                "id" => "asalah_after_content",
                "templates" => array('woocommerce'),
                "type" => "textarea"));

    asalah_post_options(
            array("name" => __("Shop Products Style", 'asalah'),
                "id" => "asalah_shop_style",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'noborder' => 'No Borders',
    )));

    wp_nonce_field( basename( __FILE__ ), 'asalah_page_options' );

}

add_action('save_post', 'save_page_options');
function save_page_options() {
    global $post;

    if ( isset($post) ) : // check if post is exists

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['asalah_page_options'] ) || !wp_verify_nonce( $_POST['asalah_page_options'], basename( __FILE__ ) ) )
        return $post->ID;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post->ID ) )
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_post_layout',
        'asalah_custom_sidebar',
        'asalah_page_sticky_sidebar',
        'asalah_onepage_scroll',
        'asalah_page_meta_info',
        'asalah_page_author_box',
        'asalah_page_author_meta',
        'asalah_page_datetime',
        'asalah_page_share',
        'asalah_page_comments',

        'asalah_before_content',
        'asalah_after_content',
        'asalah_shop_style',
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }

    endif; // end if check if post is exists
}

function asalah_posts_meta_options() {
    global $asalah_data;
    asalah_post_options(
            array("name" => __("Layout", 'asalah'),
                "id" => "asalah_post_layout",
                // "templates" => array('clean', 'blog'),
                // "input" => array(
                //     "name" => "",
                //     "value" => "",
                //     ),
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'right' => 'Right Sidebar',
                    'left' => 'Left Sidebar',
                    'full' => 'No Sidebar'
    )));

    // create custom sidebars array to use in the next option
    $custom_sidebars_options = array('none' => 'None');
    $sidebars = $asalah_data['asalah_custom_sidebars'];
    if ($sidebars):
        foreach ($sidebars as $option) {
            $siebar_id = "asalah_custom_sidebar_" . $option['order'];
            $custom_sidebars_options[$siebar_id] = $option['title'];
        }
    endif;

    asalah_post_options(
            array("name" => __("Custom Sidebar", 'asalah'),
                "id" => "asalah_custom_sidebar",
                "type" => "select",
                "options" => $custom_sidebars_options,
    ));

    asalah_post_options(
            array("name" => __("Sticky Sidebar", 'asalah'),
                "id" => "asalah_post_sticky_sidebar",
                "type" => "select",
                "options" => array(
                    false => 'Same as site options',
                    'no' => 'No',
                    'yes' => 'Yes',
                    
    )));

    asalah_post_options(
            array("name" => __("Next And Previous Posts Links", 'asalah'),
                "id" => "asalah_post_next_prev",
                "type" => "select",
                "options" => array(
                    false => 'Same as site options',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
    
    asalah_post_options(
            array("name" => __("Meta Info", 'asalah'),
                "id" => "asalah_meta_info",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Author Box", 'asalah'),
                "id" => "asalah_author_box",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Author Name in Meta", 'asalah'),
                "id" => "asalah_author_meta",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Date And Time in Meta", 'asalah'),
                "id" => "asalah_post_datetime",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Share", 'asalah'),
                "id" => "asalah_post_share",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));


    asalah_post_options(
            array("name" => __("Post Tags Cloud", 'asalah'),
                "id" => "asalah_post_tags",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Comments", 'asalah'),
                "id" => "asalah_post_comments",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    wp_nonce_field( basename( __FILE__ ), 'asalah_posts_meta_options' );

    
}

add_action('save_post', 'asalah_save_post');

function asalah_save_post() {
    global $post;

    if ( isset($post) ) : // check if post is exists
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['asalah_posts_meta_options'] ) || !wp_verify_nonce( $_POST['asalah_posts_meta_options'], basename( __FILE__ ) ) )
        return $post->ID;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post->ID ) )
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_post_layout',
        'asalah_custom_sidebar',
        'asalah_post_sticky_sidebar',
        'asalah_post_next_prev',
        'asalah_meta_info',
        'asalah_author_box',
        'asalah_author_meta',
        'asalah_post_datetime',
        'asalah_post_share',
        'asalah_post_tags',
        'asalah_post_comments',
    );
    foreach ($custom_meta_fields as $custom_meta_field) {
        
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }
    endif; // end if check if post is exists
}

function asalah_project_options() {
    asalah_post_options(
            array("name" => __("Layout", 'asalah'),
                "id" => "asalah_project_layout",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'right' => 'Right',
                    'left' => 'Left',
                    'full' => 'Full Width'
    )));

    asalah_post_options(
            array("name" => __("Next And Previous Projects Links", 'asalah'),
                "id" => "asalah_project_next_prev",
                "type" => "select",
                "options" => array(
                    false => 'Same as site options',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Project Overview", 'asalah'),
                "id" => "asalah_project_overview",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Project Overview Phrase", 'asalah'),
                "id" => "asalah_project_overview_phrase",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Project Details", 'asalah'),
                "id" => "asalah_projects_details",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Project Details Phrase", 'asalah'),
                "id" => "asalah_project_details_phrase",
                "type" => "text"));
    
    asalah_post_options(
            array("name" => __("Project Social Like", 'asalah'),
                "id" => "asalah_projects_social",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Other Projects", 'asalah'),
                "id" => "asalah_other_projects",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
}

function asalah_project_details() {
    asalah_post_options(
            array("name" => __("Project Date", 'asalah'),
                "id" => "asalah_project_date",
                "type" => "text"));
    
    asalah_post_options(
            array("name" => __("Client Name", 'asalah'),
                "id" => "asalah_project_client",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Client URL", 'asalah'),
                "id" => "asalah_project_client_url",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Client Logo", 'asalah'),
                "id" => "asalah_project_client_logo",
                "type" => "image"));

    asalah_post_options(
            array("name" => __("Project Preview URL", 'asalah'),
                "id" => "asalah_project_url",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Project Preview Text", 'asalah'),
                "id" => "asalah_project_preview_text",
                "type" => "text"));

    wp_nonce_field( basename( __FILE__ ), 'asalah_project_details' );

}

add_action('save_post', 'save_project');

function save_project() {
    global $post;

    if ( isset($post) ) : // check if post is exists
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['asalah_project_details'] ) || !wp_verify_nonce( $_POST['asalah_project_details'], basename( __FILE__ ) ) )
        return $post->ID;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post->ID ) )
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_project_date',
        'asalah_project_layout',
        'asalah_projects_details',
        'asalah_project_overview',
        
        'asalah_project_client',
        'asalah_project_client_url',
        'asalah_project_client_logo',
        'asalah_project_url',
        'asalah_project_preview_text',
        'asalah_projects_social',
        'asalah_other_projects',
        'asalah_project_details_phrase',
        'asalah_project_overview_phrase',
        'asalah_project_next_prev',
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }

    endif; // end if check if post is exists
}

function page_portfolio_template_options() {
    asalah_post_options(
            array("name" => __("Pagination", 'asalah'),
                "id" => "asalah_portfolio_pagination",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'scroll' => 'Infinite Scroll',
                    'loadmore' => 'Ajax Load More',
    )));

    asalah_post_options(
            array("name" => __("Thumnails", 'asalah'),
                "id" => "asalah_portfolio_thumnails",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'masonry' => 'Masonry',
    )));

    asalah_post_options(
            array("name" => __("Style", 'asalah'),
                "id" => "asalah_portfolio_style",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'classic' => 'Classic',
                    'grid' => "Grid",
                    "text" => "Text"
    )));
    asalah_post_options(
            array("name" => __("Columns", 'asalah'),
                "id" => "asalah_portfolio_columns",
                "type" => "select",
                "default" => "one_third",
                "options" => array(
                    'full_column' => '1',
                    'one_half' => '2',
                    'one_third' => '3',
                    'one_fourth' => '4',
                    'one_fifth' => '5',
                    'one_sixth' => '6',
    )));

    wp_nonce_field( basename( __FILE__ ), 'page_portfolio_template_options' );

}

add_action('save_post', 'save_portfolio_template');

function save_portfolio_template() {
    global $post;

    if ( isset($post) ) : // check if post is exists
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['page_portfolio_template_options'] ) || !wp_verify_nonce( $_POST['page_portfolio_template_options'], basename( __FILE__ ) ) )
        return $post->ID;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post->ID ) )
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_portfolio_pagination',
        'asalah_portfolio_thumnails',
        'asalah_portfolio_style',
        'asalah_portfolio_columns'
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }

    endif; // end if check if post is exists
}

function page_blog_template_options() {
    asalah_post_options(
            array("name" => __("Pagination", 'asalah'),
                "id" => "asalah_blog_pagination",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'scroll' => 'Infinite Scroll',
                    'loadmore' => 'Ajax Load More',
    )));

    asalah_post_options(
            array("name" => __("Blog Style", 'asalah'),
                "id" => "asalah_blog_style",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'classic' => 'Classic',
                    'masonry' => 'Masonry',
    )));

    asalah_post_options(
            array("name" => __("Blog Description Lenght", 'asalah'),
                "id" => "asalah_blog_excrept_length",
                "default" => "40",
                "type" => "text"));

    wp_nonce_field( basename( __FILE__ ), 'page_blog_template_options' );

}

add_action('save_post', 'save_blog_template');

function save_blog_template() {
    global $post;

    if ( isset($post) ) : // check if post is exists

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['page_blog_template_options'] ) || !wp_verify_nonce( $_POST['page_blog_template_options'], basename( __FILE__ ) ) )
        return $post->ID;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post->ID ) )
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_blog_style',
        'asalah_blog_pagination',
        'asalah_blog_excrept_length',
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }

    endif; // end if check if post is exists
}



function asalah_global_options() {

    global $asalah_data;

    asalah_post_options(
            array("name" => __("Page Title Holder", 'asalah'),
                "id" => "asalah_title_holder",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Breadcrumb", 'asalah'),
                "id" => "asalah_breadcrumb",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
    
    asalah_post_options(
            array("name" => __("Page Title", 'asalah'),
                "id" => "asalah_post_title",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Revolution Slider alias", 'asalah'),
                "id" => "asalah_rev_alias",
                "type" => "text",
                "default" => ''
    ));

    asalah_post_options(
            array("name" => __("Arrow moves to the main content", 'asalah'),
                "id" => "asalah_rev_slier_next_arrow",
                "type" => "select",
                "options" => array(
                    'hide' => 'Hide',
                    'show' => 'Show',   
    )));
     
    asalah_post_options(
            array("name" => __("Custom page title background URL", 'asalah'),
                "id" => "asalah_custom_title_bg",
                "type" => "image",
    ));


    
    asalah_post_options(
            array("name" => __("Page banner video background - mp4", 'asalah'),
                "id" => "asalah_banner_video_mp4",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - m4v", 'asalah'),
                "id" => "asalah_banner_video_m4v",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - webm", 'asalah'),
                "id" => "asalah_banner_video_webm",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - ogv/ogg", 'asalah'),
                "id" => "asalah_banner_video_ogv",
                "type" => "video",
    ));
    
    
    
    asalah_post_options(
            array("name" => __("Page title banner padding top", 'asalah'),
                "id" => "asalah_banner_padding_top",
                "type" => "text",
                "default" => ''
    ));

    asalah_post_options(
            array("name" => __("Page title banner padding bottom", 'asalah'),
                "id" => "asalah_banner_padding_bottom",
                "type" => "text",
                "default" => ''
    ));

    // page title background options
    asalah_post_options(
            array("name" => __("Page Title Background Repeat", 'asalah'),
                "id" => "asalah_page_title_bg_repeat",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'repeat' => 'Repeat',
                    'repeat-x' => 'Repeat X',
                    'repeat-y' => 'Repeat Y',
                    'no-repeat' => 'No Repeat',
    )));

    asalah_post_options(
            array("name" => __("Make Page Title Background A Cover", 'asalah'),
                "id" => "asalah_page_title_bg_cover",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'no' => 'No',
                    'yes' => 'Yes'
    )));

    asalah_post_options(
            array("name" => __("Page Title Background Vertical Position", 'asalah'),
                "id" => "asalah_page_title_bg_pos_y",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'top' => 'Top',
                    'center' => 'Center',
                    'bottom' => "Bottom",
    )));

    asalah_post_options(
            array("name" => __("Page Title Background Horizontal Position", 'asalah'),
                "id" => "asalah_page_title_bg_pos_x",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'left' => 'left',
                    'center' => 'Center',
                    'right' => "Right",
    )));

    asalah_post_options(
            array("name" => __("Page Title Background Overlay", 'asalah'),
                "id" => "asalah_page_title_bg_overlay",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'no' => 'No',
                    'yes' => 'Yes'
    )));

    asalah_post_options(
            array("name" => __("Page Title Style", 'asalah'),
                "id" => "asalah_page_title_style",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'default' => 'Default',
                    'center' => 'Center'
    )));

    asalah_post_options(
            array("name" => __("Page Title Background Overlay Color", 'asalah'),
                "id" => "asalah_page_title_bg_overlay_color",
                "type" => "color",
                "default" => ''
    ));

    asalah_post_options(
            array("name" => __("Page Title Text Color", 'asalah'),
                "id" => "asalah_page_title_text_color",
                "type" => "color",
                "default" => ''
    ));

    

    // header settings   
    asalah_post_options(
            array("name" => __("Slider Wrapper Width", 'asalah'),
                "id" => "asalah_slider_wrapper",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'full' => 'Full Width',
                    'container' => 'Container',
    )));

    asalah_post_options(
            array("name" => __("Header style", 'asalah'),
                "id" => "asalah_header_style",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'default' => 'Default',
                    'white_overlay' => 'White Overlay',
                    'black_overlay' => 'Black Overlay',
                    'fixed_left' => 'Left Side',
                    'fixed_right' => 'Right Side',
                    'overlapping' => "Overlapping Header"
    )));

    asalah_post_options(
            array("name" => __("Header Wrapper Width", 'asalah'),
                "id" => "asalah_header_wrapper",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'full' => 'Full Width',
                    'container' => 'Container',
    )));

    asalah_post_options(
            array("name" => __("Main menu style", 'asalah'),
                "id" => "asalah_menu_style",
                "type" => "select",
                "options" => array(
                    false => "Same as site options",
                    'default' => 'Default',
                    'classic' => 'Classic',
                    'full' => 'Full Screen',
    )));

    asalah_post_options(
            array("name" => __("Header items position", 'asalah'),
                "id" => "asalah_header_items_position",
                "type" => "select",
                "options" => array(
                    false => 'Same as site options',
                    'default' => 'Default',
                    'center' => 'Center',
    )));

    asalah_post_options(
            array("name" => __("Sticky header", 'asalah'),
                "id" => "asalah_sticky_header",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'yes' => 'Yes',
                    'no' => 'No',
    )));

    asalah_post_options(
            array("name" => __("Disable Sticky Header On Mobile", 'asalah'),
                "id" => "asalah_sticky_header_mobile_disable",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'yes' => 'Yes',
                    'no' => 'No',
    )));

    asalah_post_options(
            array("name" => __("Disable Sticky Header On Tablet", 'asalah'),
                "id" => "asalah_sticky_header_tablet_disable",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'yes' => 'Yes',
                    'no' => 'No',
    )));

    asalah_post_options(
            array("name" => __("Top Header Skin", 'asalah'),
                "id" => "asalah_top_header_scheme",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'light' => 'Light',
                    'dark' => 'Dark',
    )));

    asalah_post_options(
            array("name" => __("Dark Header", 'asalah'),
                "id" => "asalah_dark_header",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'yes' => 'Yes',
                    'no' => 'No',
    )));

    asalah_post_options(
            array("name" => __("Transparent Header", 'asalah'),
                "id" => "asalah_transparent_header",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'yes' => 'Yes',
                    'no' => 'No',
    )));

    asalah_post_options(
            array("name" => __("Cart in header", 'asalah'),
                "id" => "asalah_header_cart",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    // asalah_post_options(
    //         array("name" => __("Show WPML Switcher In Header", 'asalah'),
    //             "id" => "asalah_header_language",
    //             "type" => "select",
    //             "options" => array(
    //                 false => 'Default',
    //                 'show' => 'Show',
    //                 'hide' => 'Hide',
    // )));

    asalah_post_options(
            array("name" => __("Search icon in header", 'asalah'),
                "id" => "asalah_header_search",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Header Search icon Style", 'asalah'),
                "id" => "asalah_search_style",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'simple' => 'simple',
                    'circle' => 'circle',
    )));

    asalah_post_options(
            array("name" => __("Social icons in header", 'asalah'),
                "id" => "asalah_header_social",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Contact info in header", 'asalah'),
                "id" => "asalah_header_contact",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Site Footer", 'asalah'),
                "id" => "asalah_hide_footer",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Site First Footer", 'asalah'),
                "id" => "asalah_hide_footer1",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Site Second Footer", 'asalah'),
                "id" => "asalah_hide_footer2",
                "type" => "select",
                "options" => array(
                    false => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    // start logo and menu custom options

    asalah_post_options(
            array("name" => __("Logo", 'asalah'),
                "id" => "asalah_logo_url",
                "type" => "image",
    ));

    asalah_post_options(
            array("name" => __("Retina Logo", 'asalah'),
                "id" => "asalah_logo_url_retina",
                "type" => "image",
    ));

    asalah_post_options(
            array("name" => __("Use Default Sticky Logo From Theme Options", 'asalah'),
                "id" => "asalah_default_option_sticky_logo",
                "type" => "select",
                "Default" => "yes",
                "options" => array(
                    'yes' => 'Yes',
                    'no' => 'No',
    )));

    asalah_post_options(
            array("name" => __("Sticky Header Logo", 'asalah'),
                "id" => "asalah_sticky_logo_url",
                "type" => "image",
    ));

    asalah_post_options(
            array("name" => __("Sticky Header Retina Logo", 'asalah'),
                "id" => "asalah_sticky_logo_url_retina",
                "type" => "image",
    ));

    asalah_post_options(
            array("name" => __("Logo Width", 'asalah'),
                "id" => "asalah_logo_url_w",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Logo Height", 'asalah'),
                "id" => "asalah_logo_url_h",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Logo Width", 'asalah'),
                "id" => "asalah_sticky_logo_width",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Logo Height", 'asalah'),
                "id" => "asalah_sticky_logo_height",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Menu Items Padding Top", 'asalah'),
                "id" => "asalah_menu_items_padding_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Menu Items Padding Bottom", 'asalah'),
                "id" => "asalah_menu_items_padding_bottom",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Menu Items Padding Top", 'asalah'),
                "id" => "asalah_sticky_menu_items_padding_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Menu Items Padding Bottom", 'asalah'),
                "id" => "asalah_sticky_menu_items_padding_bottom",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Header Padding Top", 'asalah'),
                "id" => "asalah_header_padding_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Header Padding Bottom", 'asalah'),
                "id" => "asalah_header_padding_bottom",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Header Padding Top", 'asalah'),
                "id" => "asalah_sticky_padding_top",
                "type" => "text",
                "default" => ''
    ));

    asalah_post_options(
            array("name" => __("Sticky Header Padding Bottom", 'asalah'),
                "id" => "asalah_sticky_padding_bottom",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Menu Margin Top", 'asalah'),
                "id" => "asalah_menu_margin_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Menu Margin Top", 'asalah'),
                "id" => "asalah_sticky_menu_margin_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Logo Margin Top", 'asalah'),
                "id" => "asalah_logo_margin_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Logo Margin Top", 'asalah'),
                "id" => "asalah_sticky_logo_margin_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Header Button Margin Top", 'asalah'),
                "id" => "asalah_header_buttons_margin_top",
                "type" => "text",
                "default" => ''
    ));
    asalah_post_options(
            array("name" => __("Sticky Header Button Margin Top", 'asalah'),
                "id" => "asalah_sticky_header_buttons_margin_top",
                "type" => "text",
                "default" => ''
    ));

    wp_nonce_field( basename( __FILE__ ), 'asalah_global_options' );
}

add_action('save_post', 'save_global');
function save_global() {
    global $post;

    if ( isset($post) ) : // check if post is exists

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['asalah_global_options'] ) || !wp_verify_nonce( $_POST['asalah_global_options'], basename( __FILE__ ) ) )
        return $post->ID;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post->ID ) )
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_title_holder',
        'asalah_breadcrumb',
        'asalah_post_title',
        'asalah_custom_title_bg',
        'asalah_banner_padding_top',
        'asalah_banner_padding_bottom',
        'asalah_banner_video_mp4',
        'asalah_banner_video_m4v',
        'asalah_banner_video_webm',
        'asalah_banner_video_ogv',
        'asalah_rev_alias',
        'asalah_rev_slier_next_arrow',
        'asalah_header_style',
        'asalah_header_items_position',
        'asalah_top_header_scheme',
        'asalah_dark_header',
        'asalah_transparent_header',
        'asalah_header_language',
        'asalah_header_cart',
        'asalah_header_search',
        'asalah_header_social',
        'asalah_header_contact',
        'asalah_sticky_header',
        'asalah_hide_footer',
        'asalah_hide_footer1',
        'asalah_hide_footer2',
        'asalah_page_title_bg_repeat',
        'asalah_page_title_bg_cover',
        'asalah_page_title_bg_pos_y',
        'asalah_page_title_bg_pos_x',
        'asalah_page_title_bg_overlay',
        'asalah_page_title_bg_overlay_color',
        'asalah_page_title_text_color',
        'asalah_page_title_style',
        'asalah_logo_url',
        'asalah_logo_url_retina',
        'asalah_sticky_logo_url',
        'asalah_sticky_logo_url_retina',
        'asalah_logo_url_w',
        'asalah_logo_url_h',
        'asalah_sticky_logo_width',
        'asalah_sticky_logo_height',
        'asalah_header_padding_top',
        'asalah_header_padding_bottom',
        'asalah_sticky_padding_top',
        'asalah_sticky_padding_bottom',
        'asalah_menu_margin_top',
        'asalah_sticky_menu_margin_top',
        'asalah_logo_margin_top',
        'asalah_sticky_logo_margin_top',
        'asalah_header_buttons_margin_top',
        'asalah_sticky_header_buttons_margin_top',
        'asalah_header_wrapper',
        'asalah_slider_wrapper',
        'asalah_default_option_sticky_logo',
        'asalah_menu_style',
        'asalah_menu_items_padding_top',
        'asalah_menu_items_padding_bottom',
        'asalah_sticky_menu_items_padding_top',
        'asalah_sticky_menu_items_padding_bottom',
        'asalah_search_style',
        
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }

    endif; // end if check if post is exists
}
?>