<?php

$googlefonts = array();

function style_options() {
    global $typographyclasses;
    global $fontsclasses;
    global $colorclasses;
    global $bordersclasses;
    global $bgclasses;
    global $asalah_data, $googlefonts;
    $output = '';

    $post_types = array("standard", "image", "gallery", "video", "audio");
    foreach ($post_types as $post_type) {
        if (asalah_option("asalah_post_icons_" . $post_type . "_color")) {
            $output .= "." . $post_type . "_post_icon {";
            $output .= "color: " . asalah_option("asalah_post_icons_" . $post_type . "_color") . ";";
            $output .= "}";
        }

        if (asalah_option("asalah_post_icons_" . $post_type . "_bg")) {
            $output .= "." . $post_type . "_post_icon {";
            $output .= "background-color: " . asalah_option("asalah_post_icons_" . $post_type . "_bg") . ";";
            $output .= "}";
        }
    }

    foreach ($bgclasses as $class => $title) {
        $id = str_replace(' ', '', $class);
        $id = str_replace('.', '^', $id);
        $id = str_replace('[', '%', $id);
        $id = str_replace(']', '%', $id);
        $id = str_replace("'", '!', $id);
        $id = "asalah_customebg_" . $id;
        if (asalah_option($id)) {
            $output .= $class . "{";
            ?>
            <?php

            if (asalah_option($id)):
                $output .= "background-image: url('" . asalah_option($id) . "');";

                $idrepeat = $id . '_repeat';
                $idfixed = $id . '_is_fixed';
                $idposition = $id . '_position';
                $id_x_position = $id . '_x_position';

                if (asalah_option($idfixed)) {
                    $output .= "background-size: cover;";
                    if ($class == "html") {
                        $output .= "background-attachment:fixed;";
                    }
                    
                } elseif (asalah_option($idrepeat)) {
                    $output .= "background-repeat: " . asalah_option($idrepeat) . ";";
                }

                if (asalah_option($id_x_position) && asalah_option($idposition)) {
                    $output .= "background-position: ".asalah_option($id_x_position)." " . asalah_option($idposition) . ";";
                }
            endif;
            ?>

            <?php

            $output .= "} ";
        }
    }

    foreach ($typographyclasses as $class => $title) {
        $id = str_replace(' ', '', $class);
        $id = str_replace('.', '^', $id);
        $id = str_replace('[', '%', $id);
        $id = str_replace(']', '%', $id);
        $id = str_replace("'", '!', $id);
        $id = "asalah_typo_" . $id;
        if ($asalah_data[$id]["size"] || $asalah_data[$id]["height"] || $asalah_data[$id]["style"] || $asalah_data[$id]["color"]) {
                $output .= $class . "{";

                if ($asalah_data[$id]["size"] && $asalah_data[$id]["size"] != 0):
                $output .= "font-size:" . $asalah_data[$id]["size"] . ";" ;
                endif; 

                if ($asalah_data[$id]["height"] && $asalah_data[$id]["height"] != 0):
                $output .= "line-height:" . $asalah_data[$id]["height"] . ";" ;
                endif; 

                if ($asalah_data[$id]["style"]):
                $output .= "font-weight:" . $asalah_data[$id]["style"] . ";" ;
                endif; 

                if ($asalah_data[$id]["color"] != ''):
                $output .= "color:" . $asalah_data[$id]["color"] . ";" ;
                endif; 

        $output .= "} ";
        }
    }

    if (asalah_option("asalah_enable_title_overlay") && asalah_option("asalah_page_title_overlay_color")) {
        $output .= ".page_title_overlay {";
        $output .= "background-color: ".asalah_option("asalah_page_title_overlay_color").";";
        $output .= "}";
    }

    if (asalah_option("asalah_page_title_text_color")) {
        $output .= ".page_info, .page_info a {";
        $output .= "color: ".asalah_option("asalah_page_title_text_color").";";
        $output .= "}";
    }

    if (asalah_option('asalah_page_title_padding_top')) {
        $output .= ".page_title_holder {";
        $output .= "padding-top: ".asalah_option('asalah_page_title_padding_top')."px;";
        $output .= "}";
    }

    if (asalah_option('asalah_page_title_padding_bottom')) {
        $output .= ".page_title_holder {";
        $output .= "padding-bottom: ".asalah_option('asalah_page_title_padding_bottom')."px;";
        $output .= "}";
    }

    if (asalah_option("asalah_page_title_style") == "center") {
        $output .= ".page_title_holder {";
        $output .= "text-align: center;";
        $output .= "}";

        $output .= ".page_title_holder .breadcrumb {";
        $output .= "float: none;";
        $output .= "}";

        $output .= ".page_title_holder h1 {";
        $output .= "float: none;font-size: 22px;margin-bottom: 12px;";
        $output .= "}";
    }


    if (asalah_option("asalah_enable_html_background") && asalah_option("asalah_html_custom_bg")) {
        $output .= "html {";
        $output .= "background-image: url('" . asalah_option("asalah_html_custom_bg") . "');background-repeat:repeat;background-position:initial;background-position:initial;background-size:initial;";
        $output .= "}";
    }

    if (asalah_option("asalah_pageholder_color") == 'black') {

        $output .= ".page_title_holder .page_info .title {
					color:#555;
					}
					.page_title_holder .page_nav .breadcrumb a{
					color:#555;
					}
					.page_title_holder{
					color:#555;
					}
                                        .page_title_holder .page_nav .breadcrumb {
                                        color:#555;
                                        }";
    } elseif (asalah_option("asalah_pageholder_color") == 'white') {
        $output .= ".page_title_holder .page_info .title {
					color:#fff;
					}
					.page_title_holder .page_nav .breadcrumb a{
					color:#fff;
					}
					.page_title_holder{
					color:#fff;
					}
                                        .page_title_holder .page_nav .breadcrumb {
                                        color:#fff;
                                        }";
    }

    if (asalah_option("asalah_body_margintop")) {
        $output .= "body.boxed_body {";
        $output .= "margin-top: " . asalah_option("asalah_body_margintop") . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_body_marginbottom")) {
        $output .= "body.boxed_body {";
        $output .= "margin-bottom: " . asalah_option("asalah_body_marginbottom") . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_section_top")) {
        $output .= ".new_section {";
        $output .= "padding-top: " . asalah_option("asalah_section_top") . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_section_bottom")) {
        $output .= ".new_section {";
        $output .= "padding-bottom: " . asalah_option("asalah_section_bottom") . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_skin_color")) {
        $color = asalah_option("asalah_skin_color");
        /* generate darker and and lighter color from the current skin color */
        $lighter_color = asalah_su_hex_shift($color, "lighter", 10);
        $darker_color = asalah_su_hex_shift($color, "darker", 10);
        $extra_lighter_color = asalah_su_hex_shift($color, "lighter", 25);
        $extra_darker_color = asalah_su_hex_shift($color, "darker", 25);


        $output .= '.skin_color, a, .service_item .service_value, .unique_word_color, .page_title_holder span.divider, .featured.columns .plan_title, .black_button.asalah_button, .first_header_wrapper .navbar .nav>li>a:hover>i, .countto_item .countto_number, .woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce a.button.added:before, .woocommerce-page a.button.added:before, .woocommerce button.button.added:before, .woocommerce-page button.button.added:before, .woocommerce input.button.added:before, .woocommerce-page input.button.added:before, .woocommerce #respond input#submit.added:before, .woocommerce-page #respond input#submit.added:before, .woocommerce #content input.button.added:before, .woocommerce-page #content input.button.added:before, .nav-tabs > li.active > a:after, .panel-heading > .panel-title a:hover, .asalah_button, .push_button.push_button_style_skin .push_button_button.asalah_button.button_soft, .asalah_cart_icon a.cart-contents, .overlay ul li a:hover, .overlay ul li a:focus, .overlay .overlay-close:hover, .vector_service_icon.skin_color a {';
        $output .= "color: " . $color . ";";
        $output .= "}";


        $output .= '.portfolio_filter.navbar .nav>.active>a:after, .push_button.hilight_top, .navbar.classic_menu_style .dropdown-menu {';
        $output .= "border-top-color: " . $color . ";";
        $output .= "}";

        $output .= '.push_button.hilight_bottom, .first_header_wrapper .navbar.classic_menu_style .nav>li:hover > a, .navbar.classic_menu_style .current-menu-ancestor.dropdown > a, .navbar.classic_menu_style > .main_nav > .nav > .current_page_item > a {';
        $output .= "border-bottom-color: " . $color . ";";
        $output .= "}";

        $output .= '.push_button.hilight_left {';
        $output .= "border-left-color: " . $color . ";";
        $output .= "}";

        $output .= '.push_button.hilight_right {';
        $output .= "border-right-color: " . $color . ";";
        $output .= "}";

        $output .= '.skin_bg, input[type="submit"], .view_all_button.button_style_full a, .portfolio_filter.navbar .nav>.active>a, .blog_post_type, .color_overlay, .asalah_button.button_soft, .header_search > i, .header_button .gototop > i, .widget_container caption, a.project_preview_button, .woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce .cart tbody > tr > td > input[type="submit"].button, .woocommerce-message, .title_divider.title_divider_thick, .title_divider.title_divider_part:after, .title_divider.title_divider_part_thick:after, .panel-heading > .panel-title a:before, .panel-heading > .panel-title a:hover:before, .projects_wrapper.style_grid .portfolio_figure .overlay_color, body.dark_skin .portfolio_filter.navbar .nav>.active>a, .push_button.push_button_style_light .push_button_button.asalah_button.button_soft, .side_content .widget_nav_menu ul.menu > li.current_page_item > a, .alert-skin, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_layered_nav_filters ul li a, .woocommerce-page .widget_layered_nav_filters ul li a, .woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale, .pricingcontainer.style1 .recommended_package.pricing_table_layout .plans, .asalah_button.button_gradient, .asalah_button.button_flat, .icon_circle .vector_service_icon.skin_bg, .simpleselect .options .option.active {';
        $output .= "background-color: " . $color . ";";
        $output .= "}";
        
        $output .= '.skin_border, .black_button.asalah_button, .asalah_button, .asalah_button.button_soft, .asalah_button.button_gradient, .asalah_button.button_flat {';
        $output .= "border-color: " . $color . ";";
        $output .= "}";

        $output .= '.projects_wrapper.style_classic .portfolio_figure:hover figcaption.portfolio_caption  {';
        $output .= "border-bottom-color: " . $color . ";";
        $output .= "}";

        $output .= '.push_button.push_button_style_skin, .pricingcontainer.style2 .recommended_package.pricing_table_layout .plans .plan_price, .pricingcontainer.style3 .recommended_package.pricing_table_layout .plans .plan_price  {';
        $output .= "border-color: " . $darker_color . ";";
        $output .= "}";

        $output .= '.pricingcontainer .recommended_package.pricing_table_layout .plans .plan_price {';
        $output .= "background-color: " . $color . ";";
        $output .= "background-image: linear-gradient(bottom, ".$color." 0%, ".$lighter_color." 100%);";
        $output .= "background-image: -moz-linear-gradient(bottom, ".$color." 0%, ".$lighter_color." 100%);";
        $output .= "background-image: -webkit-linear-gradient(bottom, ".$color." 0%, ".$lighter_color." 100%);";
        $output .= "}";

        $output .= '.asalah_button.button_gradient {';
        $output .= "background-color: " . $color . ";";
        $output .= "background-image: linear-gradient(bottom, ".$darker_color." 0%, ".$extra_lighter_color." 100%);";
        $output .= "background-image: -moz-linear-gradient(bottom, ".$darker_color." 0%, ".$extra_lighter_color." 100%);";
        $output .= "background-image: -webkit-linear-gradient(bottom, ".$darker_color." 0%, ".$extra_lighter_color." 100%);";
        $output .= "}";

        $output .= '.asalah_button.button_flat  {';
        $output .= "border-bottom-color: " . $extra_darker_color . ";";
        $output .= "}";
        
    }

    /* start top header schemes */
    if (asalah_cross_option('asalah_top_header_scheme') == "dark" ) {
        $output .= ".header_top {";
            $output .= "background-color: #2c2c2c;";
            $output .= "border-color: #000;";
        $output .= "}";
        $output .= ".contact_info_item {";
            $output .= "border-right: 1px solid #383838;";
        $output .= "}";
        $output .= ".header_social a:hover {";
            $output .= "color: #fff;";
        $output .= "}";
    }
    /* end top header schemes */
	    
	foreach ($colorclasses as $class => $title) {
		$id = str_replace(' ', '', $class);
		$id = str_replace('.', '^', $id);
		$id = str_replace('[', '%', $id);
		$id = str_replace(']', '%', $id);
		$id = str_replace("'", '!', $id);
		$id = "asalah_bgcolor_" . $id;
		if (asalah_option($id)) {
		$output .= $class . "{";
			?>
				<?php 
				if (asalah_option($id)):
				$output .= "background-color:" . asalah_option($id) . ";" ;
				endif; 
				?>
	
			<?php
		$output .= "} ";
		}
	}
    /* end backgrounds coloring */

    foreach ($bordersclasses as $class => $title) {
        $id = str_replace(' ', '', $class);
        $id = str_replace('.', '^', $id);
        $id = str_replace('[', '%', $id);
        $id = str_replace(']', '%', $id);
        $id = str_replace("'", '!', $id);
        $id = "asalah_border_" . $id;
        if (asalah_option($id)) {
        $output .= $class . "{";
            ?>
                <?php 
                if (asalah_option($id)):
                $output .= "border-color:" . asalah_option($id) . ";" ;
                endif; 
                ?>
    
            <?php
        $output .= "} ";
        }
    }
    /* end borders coloring */


    foreach ($fontsclasses as $class => $title) {
        $id = str_replace(' ', '', $class);
        $id = str_replace('.', '~', $id);
        $id = str_replace(',', '*', $id);
        $id = str_replace('[', '%', $id);
        $id = str_replace(']', '%', $id);
        $id = str_replace("'", '!', $id);
        $id = "asalah_gfonts_" . $id;

        if (asalah_option($id) != "none") {
            $output .= $class . "{";
            ?>				
            <?php

            if (asalah_option($id)):
                if (asalah_option($id) == "safefonts") {
                    $thefont = '"Helvetica Neue",Helvetica,Arial,sans-serif';
                } else {
                        if (!in_array(asalah_option($id), $googlefonts)) {
                        $googlefonts[] = asalah_option($id);
                        $thefont = str_replace('+', ' ', asalah_option($id));
                    }
                    $thefont = str_replace('+', ' ', asalah_option($id));
                }
                $output .= "font-family:" . $thefont . ";";
            endif;
            ?>

            <?php

            $output .= "} ";
        }
    }
    /* the above code is mine */
    // functions.options    

    if (asalah_option('asalah_logo_url_h') || asalah_option('asalah_logo_url_w')) {
        $output .= ".logo img {";
        if (asalah_option('asalah_logo_url_w') && asalah_option('asalah_logo_url_w') !== 0) {
            $output .= "width:" . asalah_option('asalah_logo_url_w') . "px;";
            
        }else{
            $output .= "width: auto;";
        }

        if (asalah_option('asalah_logo_url_h') && asalah_option('asalah_logo_url_h') !== 0) {
            $output .= "height:" . asalah_option('asalah_logo_url_h') . "px;";
        }else{
            $output .= "height: auto;";
        }

        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_logo_height') || asalah_option('asalah_sticky_logo_width')) {
        $output .= ".sticky_logo img {";
        if (asalah_option('asalah_sticky_logo_width') && asalah_option('asalah_sticky_logo_width') !== 0) {
            $output .= "width:" . asalah_option('asalah_sticky_logo_width') . "px;";
            
        }else{
            $output .= "width: auto;";
        }

        if (asalah_option('asalah_sticky_logo_height') && asalah_option('asalah_sticky_logo_height') !== 0) {
            $output .= "height:" . asalah_option('asalah_sticky_logo_height') . "px;";
        }else{
            $output .= "height: auto;";
        }

        $output .= "}";
    }

    


    if (asalah_option('asalah_header_padding_top') !== 0 ) {
        $output .= ".header_below {";
            $output .= "padding-top:" . asalah_option('asalah_header_padding_top') . "px;";
        $output .= "}";
    }

    if (asalah_option('asalah_header_padding_bottom') !== 0 ) {
        $output .= ".header_below {";
            $output .= "padding-bottom:" . asalah_option('asalah_header_padding_bottom') . "px;";
        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_padding_top') !== 0 ) {
        $output .= ".site_header.fixed_header.sticky_header .header_below {";
            $output .= "padding-top:" . asalah_option('asalah_sticky_padding_top') . "px;";
        $output .= "}";
    }

    if (asalah_option('asalah_sticky_padding_bottom') !== 0 ) {
        $output .= ".site_header.fixed_header.sticky_header .header_below {";
            $output .= "padding-bottom:" . asalah_option('asalah_sticky_padding_bottom') . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_logo_margin_top")) {
        $output .= ".logo {";
            $output .= "margin-top:" . asalah_option('asalah_logo_margin_top') . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_sticky_logo_margin_top")) {
        $output .= ".sticky_logo {";
            $output .= "margin-top:" . asalah_option('asalah_sticky_logo_margin_top') . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_sticky_logo_margin_top") && ( !asalah_option("asalah_sticky_logo_url") || asalah_option("asalah_sticky_logo_url") == "" ) ) {
        $output .= ".sticky_header .logo {";
            $output .= "margin-top:" . asalah_option('asalah_sticky_logo_margin_top') . "px;";
        $output .= "}";
    }
    
    if (asalah_option("asalah_menu_margin_top")) {
        $output .= ".main_navbar {";
            $output .= "margin-top:" . asalah_option('asalah_menu_margin_top') . "px;";
        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_menu_margin_top') !== 0 ) {
        $output .= ".sticky_header .main_navbar {";
            $output .= "margin-top:" . asalah_option('asalah_sticky_menu_margin_top') . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_header_buttons_margin_top")) {
        $output .= ".header_button {";
            $output .= "margin-top:" . asalah_option('asalah_header_buttons_margin_top') . "px;";
        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_header_buttons_margin_top') !== 0 ) {
        $output .= ".sticky_header .header_button {";
            $output .= "margin-top:" . asalah_option('asalah_sticky_header_buttons_margin_top') . "px;";
        $output .= "}";
    }

    if (asalah_option('asalah_menu_items_padding_top') !== 0 ) {
        $output .= ".first_header_wrapper .navbar .nav>li>a {";
            $output .= "padding-top:" . asalah_option('asalah_menu_items_padding_top') . "px;";
        $output .= "}";
    }

    if (asalah_option('asalah_menu_items_padding_bottom') !== 0 ) {
        $output .= ".first_header_wrapper .navbar .nav>li>a {";
            $output .= "padding-bottom:" . asalah_option('asalah_menu_items_padding_bottom') . "px;";
        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_menu_items_padding_top') !== 0 ) {
        $output .= ".site_header.fixed_header.sticky_header .first_header_wrapper .navbar .nav>li>a {";
            $output .= "padding-top:" . asalah_option('asalah_sticky_menu_items_padding_top') . "px;";
        $output .= "}";
    }

    if (asalah_option('asalah_sticky_menu_items_padding_bottom') !== 0 ) {
        $output .= ".site_header.fixed_header.sticky_header .first_header_wrapper .navbar .nav>li>a {";
            $output .= "padding-bottom:" . asalah_option('asalah_sticky_menu_items_padding_bottom') . "px;";
        $output .= "}";
    }
    
    
    
    if (asalah_option('asalah_credits_image_h') || asalah_option('asalah_credits_image_w')) {
        $output .= ".credits_logo img {";
        if (asalah_option('asalah_credits_image_w') && asalah_option('asalah_credits_image_w') !== 0) {
            $output .= "width:" . asalah_option('asalah_credits_image_w') . "px;";
            
        }else{
            $output .= "width: auto;";
        }

        if (asalah_option('asalah_credits_image_h') && asalah_option('asalah_credits_image_h') !== 0) {
            $output .= "height:" . asalah_option('asalah_credits_image_h') . "px;";
        }else{
            $output .= "height: auto;";
        }

        $output .= "}";
    }
    
     // check if header search, contact or social is enabled and add css to stikcy header 
    // if (asalah_option("asalah_header_search") || asalah_option("asalah_header_contact") || asalah_option("asalah_header_social") ) {
    // 	$output .= ".sticky_header.fixed_header.site_header {";
    // 		$output .= "margin-top: -40px;";
    // 	$output .= "}";
    // }
    

    if (isset($output)) {
        return $output;
    }
}

add_action('wp_enqueue_scripts', 'asalah_enqueue_custom_google_font');

function asalah_enqueue_custom_google_font() {
    style_options();
    global $googlefonts;
    foreach ($googlefonts as $fontname) {
        wp_enqueue_style($fontname, 'http://fonts.googleapis.com/css?family=' . $fontname . ':400,100,200,300,500,600,700,800,900');
    }
}

function asalah_attach_style_to_header() {
    global $asalah_data;
    echo '<style>';
    echo style_options();
    if (asalah_option('asalah_custom_css')):
        echo asalah_option('asalah_custom_css');
    endif;
    echo '</style>';
}

add_action('wp_head', 'asalah_attach_style_to_header', 15);

?>