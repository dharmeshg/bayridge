<?php
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
    /**
     * @see Walker_Nav_Menu::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {   
    }
    
    /**
     * @see Walker_Nav_Menu::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
    }
    
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth;
       
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
    
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    
        ob_start();
        $item_id = esc_attr( $item->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );
    
        $original_title = '';
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = $original_object->post_title;
        }
    
        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );
    
        $title = $item->title;
    
        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( __( '%s (Invalid)', 'asalah' ), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( __('%s (Pending)', 'asalah'), $item->title );
        }
    
        $title = empty( $item->label ) ? $title : $item->label;
    
        ?>
        <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                    <span class="item-title"><?php echo esc_html( $title ); ?></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-up-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'asalah'); ?>">&#8593;</abbr></a>
                            |
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-down-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'asalah'); ?>">&#8595;</abbr></a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'asalah'); ?>" href="<?php
                            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                        ?>"><?php _e( 'Edit Menu Item', 'asalah' ); ?></a>
                    </span>
                </dt>
            </dl>
    
            <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
                
                <?php if( 'custom' == $item->type ) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'URL', 'asalah' ); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                
                <p class="description description-thin">
                    <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Navigation Label', 'asalah' ); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                    </label>
                </p>
                
                <p class="description description-thin">
                    <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Title Attribute', 'asalah' ); ?><br />
                        <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                    </label>
                </p>
                
                
                <p class="field-custom description asalah_custom_menu custom_menu_icon description-thin" style="margin:10px 0 12px 0;">
                    <label for="edit-menu-item-icon-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Add Icon', 'asalah' ); ?><br />
                        <input type="text" id="edit-menu-item-icon-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-custom" name="menu-item-icon[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->icon ); ?>" />
                    </label>
                </p>

                
                <p class="field-custom description asalah_custom_menu custom_mega_menu asalah_custom_megamenu description-wide" style="margin:20px 0 9px 0; padding-top:15px; border-top:1px solid #eee;">
                    <?php
                        $value = $item->megamenu;
                        if($value != "") $value = "checked='checked'";
                    ?>
                    <label for="edit-menu-item-megamenu-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-megamenu-<?php echo esc_attr($item_id); ?>" class="code edit-menu-item-custom" name="menu-item-megamenu[<?php echo esc_attr($item_id); ?>]" value="megamenu" <?php echo esc_attr($value); ?> />
                        <?php _e( "Mega Menu?", 'asalah' ); ?>
                    </label>
                </p>
                
                <p class="field-custom description asalah_custom_menu custom_mega_menu_title asalah_custom_megamenu description-wide">
                    <?php
                        $value = $item->menutitle;
                        if($value != "") $value = "checked='checked'";
                    ?>
                    <label for="edit-menu-item-menutitle-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-menutitle-<?php echo esc_attr($item_id); ?>" class="code edit-menu-item-custom" name="menu-item-menutitle[<?php echo esc_attr($item_id); ?>]" value="title" <?php echo esc_attr($value); ?> />
                        <?php _e( "Menu Title ?", 'asalah' ); ?>
                    </label>
                </p>
                
                <p class="field-custom description asalah_custom_menu custom_mega_menu_cols asalah_custom_megamenu description-thin description-thin">
                    <label for="edit-menu-item-cols-nums-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Number of Columns', 'asalah' ); ?><br />
                        <select id="edit-menu-item-cols-nums<?php echo esc_attr($item_id); ?>" name="menu-item-cols_nums[<?php echo esc_attr($item_id); ?>]">
                            <option value="one-columns" <?php if(esc_attr($item->cols_nums) == "one-columns"){echo 'selected="selected"';} ?>>1 column</option>
                            <option value="two-columns" <?php if(esc_attr($item->cols_nums) == "two-columns"){echo 'selected="selected"';} ?>>2 columns</option>
                            <option value="three-columns" <?php if(esc_attr($item->cols_nums) == "three-columns" || esc_attr($item->cols_nums) == ""){echo 'selected="selected"';} ?>>3 columns</option>
                            <option value="four-columns" <?php if(esc_attr($item->cols_nums) == "four-columns"){echo 'selected="selected"';} ?>>4 columns</option>
                            <option value="five-columns" <?php if(esc_attr($item->cols_nums) == "five-columns"){echo 'selected="selected"';} ?>>5 columns</option>
                        </select>
                    </label>
                </p>
                
                <p class="field-columntype description asalah_custom_menu custom_mega_menu_col_type asalah_custom_megamenu description-thin description-thin">
                    <label for="edit-menu-item-columntype-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Column Type', 'asalah' ); ?><br />
                        <select id="edit-menu-item-columntype<?php echo esc_attr($item_id); ?>" name="menu-item-columntype[<?php echo esc_attr($item_id); ?>]">
                            <option value="menu" <?php if(esc_attr($item->columntype) == "menu" || esc_attr($item->cols_nums) == ""){echo 'selected="selected"';} ?>>Menu</option>
                            <option value="text" <?php if(esc_attr($item->columntype) == "text"){echo 'selected="selected"';} ?>>Text</option>
                            <option value="sidebar" <?php if(esc_attr($item->columntype) == "sidebar"){echo 'selected="selected"';} ?>>Sidebar</option>
                        </select>
                    </label>
                </p>
                
                <p class="field-text description asalah_custom_menu custom_mega_menu_text asalah_custom_megamenu description-wide" style="margin:0 0 5px 0;">
                    <label for="edit-menu-item-text-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Text Block (Shortcodes allows)', 'asalah' ); ?><br />
                        <textarea id="edit-menu-item-text-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-text" rows="3" cols="20" name="menu-item-text[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->text ); // textarea_escaped ?></textarea>
                    </label>
                </p>
                
                <div class="menu-item-actions description-wide submitbox">
                    <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                        <p class="link-to-original">
                            <?php printf( __('Original: %s', 'asalah'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
                    echo wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'delete-menu-item',
                                'menu-item' => $item_id,
                            ),
                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                        ),
                        'delete-menu_item_' . $item_id
                    ); ?>"><?php _e('Remove', 'asalah'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
                        ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e('Cancel', 'asalah'); ?></a>
                </div>
    
                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        <?php
        
        $output .= ob_get_clean();

        }
}

// add custom menu fields to menu
add_filter( 'wp_setup_nav_menu_item', 'asalah_add_custom_nav_fields' );

// save menu custom fields
add_action( 'wp_update_nav_menu_item', 'asalah_update_custom_nav_fields', 10, 3 );

// edit menu walker
add_filter( 'wp_edit_nav_menu_walker', 'asalah_edit_walker', 10, 2 );


function asalah_add_custom_nav_fields( $menu_item ) {
    $menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
    $menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
    $menu_item->menutitle = get_post_meta( $menu_item->ID, '_menu_item_menutitle', true );
    $menu_item->cols_nums = get_post_meta( $menu_item->ID, '_menu_item_cols_nums', true );
    $menu_item->columntype = get_post_meta( $menu_item->ID, '_menu_item_columntype', true );
    $menu_item->text = get_post_meta( $menu_item->ID, '_menu_item_text', true );
    return $menu_item;
   
}

/**
 * Save menu custom fields
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function asalah_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
        
        $check = array('icon', 'megamenu', 'menutitle', 'cols_nums', 'text', 'columntype');
            
        foreach ( $check as $key )
        {
            if(!isset($_POST['menu-item-'.$key][$menu_item_db_id]))
            {
                $_POST['menu-item-'.$key][$menu_item_db_id] = "";
            }
            
            $value = $_POST['menu-item-'.$key][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_'.$key, $value );
        }
        

}

/**
 * Define new Walker edit
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function asalah_edit_walker($walker,$menu_id) {

    return 'Walker_Nav_Menu_Edit_Custom';
        
}


/* Custom WP_NAV_MENU function for top navigation */

if (!class_exists('asalah_header_walker_nav_menu')) {
    class asalah_header_walker_nav_menu extends Walker_Nav_Menu {
        
    // add classes to ul sub-menus
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
            {
                    $id_field = $this->db_fields['id'];
                    if ( is_object( $args[0] ) ) {
                            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
                    }
                    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
            }

        function start_lvl( &$output, $depth = 0, $args = array() ) {
            
            $indent = str_repeat("\t", $depth);
            if($depth == 0){
                $out_div = '<div class="second-lvl">';
            }else{
                $out_div = '';
            }
            
            // build html
            $output .= "\n" . $indent . $out_div  .'<ul>' . "\n";
        }
        function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            
            if($depth == 0){
                $out_div_close = '</div>';
            }else{
                $out_div_close = '';
            }
            
            $output .= "$indent</ul>". $out_div_close ."\n";
        }

        // add main/sub classes to li's and links
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            
            global $wp_query;
            $sub = "";
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
            
            if($depth==0 && $args->has_children) : 
                $sub = ' has_sub';
            endif;
            
            if($depth==1 && $args->has_children) : 
                $sub = 'sub';
            endif;
            
            if($item->icon != ''){
                $item_icon = '<i class="'.$item->icon.'"></i> ';
            }else{
                $item_icon = '';
            }
            
            if($item->background != ''){
                $background_image = 'data-background-image="'.$item->background.'"';
                $background_position = 'data-background-pos="'.$item->bg_position.'"';
            }else{
                $background_image = '';
                $background_position = '';
            }
            
            if($item->megamenu != ''){
                $check_mega_menu = ' mega-menu';
            }else{
                $check_mega_menu = ' no-mega-menu';
            }
            
            if($item->menutitle != ''){
                $check_menu_title = ' menu-title';
            }else{
                $check_menu_title = '';
            }

            $active = "";
            
            // depth dependent classes
            if ((($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0))) { $active = 'active'; }
        
            // passed classes
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;

            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
            
            // build html
            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $sub . $check_mega_menu . $check_menu_title . ' ' . $item->cols_nums .'" '.$background_image . $background_position .'>';
            
            $current_a = "";
            
            // link attributes
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
            if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
            $current_a .= ' current ';
            endif;
            $attributes .= ' class="'. $current_a . '"';
            $item_output = $args->before;
            if($item->hide == ""){
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $item_icon;
                $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
                $item_output .= '</a>';
            }
            
            $item_output .= $args->after;
            
            // build html
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
}

?>