<?php

global $typographyclasses;
global $fontsclasses;
global $colorclasses;
global $bordersclasses;
global $bgclasses;

function asalah_switcher_hex_shift($supplied_hex, $shift_method, $percentage = 50) {
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


$the_new_color = $_POST['color'];

$color = '#' . $the_new_color;
/* generate darker and and lighter color from the current skin color */

$lighter_color = asalah_switcher_hex_shift($color, "lighter", 10);
$darker_color = asalah_switcher_hex_shift($color, "darker", 10);
$extra_lighter_color = asalah_switcher_hex_shift($color, "lighter", 25);
$extra_darker_color = asalah_switcher_hex_shift($color, "darker", 25);


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
                         
echo '<style>' . $output . '</style>';
?>

