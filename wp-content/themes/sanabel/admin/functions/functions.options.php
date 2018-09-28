<?php

add_action('init', 'of_options');
include (TEMPLATEPATH . '/inc/googlefonts.php');
if (!function_exists('of_options')) {

    function of_options() {
        //Access the WordPress Categories via an Array
        $of_categories = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        $categories_tmp = array_unshift($of_categories, "Select a category:");

        //Access the WordPress Pages via an Array
        $of_pages = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }
        $of_pages_tmp = array_unshift($of_pages, "Select a page:");

        //Testing 
        $of_options_select = array("one", "two", "three", "four", "five");
        $of_options_radio = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");

        //Sample Homepage blocks for the layout manager (sorter)
        $of_options_homepage_blocks = array
            (
            "disabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_one" => "Block One",
                "block_two" => "Block Two",
                "block_three" => "Block Three",
            ),
            "enabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_four" => "Block Four",
            ),
        );


        //Stylesheets Reader
        $alt_stylesheet_path = LAYOUT_PATH;
        $alt_stylesheets = array();

        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[] = $alt_stylesheet_file;
                    }
                }
            }
        }


        //Background Images Reader
        $bg_images_path = TEMPLATEPATH . '/images/bg/'; // change this to where you store your bg images
        $bg_images_url = get_template_directory_uri() . '/images/bg/'; // change this to where you store your bg images
        $bg_images = array();

        if (is_dir($bg_images_path)) {
            if ($bg_images_dir = opendir($bg_images_path)) {
                while (($bg_images_file = readdir($bg_images_dir)) !== false) {
                    if (stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                        natsort($bg_images); //Sorts the array into a natural order
                        $bg_images[] = $bg_images_url . $bg_images_file;
                    }
                }
            }
        }


        /* ----------------------------------------------------------------------------------- */
        /* TO DO: Add options/functions that use these */
        /* ----------------------------------------------------------------------------------- */

        //More Options
        $uploads_arr = wp_upload_dir();
        $all_uploads_path = $uploads_arr['path'];
        $all_uploads = get_option('of_uploads');
        $other_entries = array("Select a number:", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19");
        $body_repeat = array("no-repeat", "repeat-x", "repeat-y", "repeat");
        $body_pos = array("top left", "top center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right");

        // Image Alignment radio box
        $of_options_thumb_align = array("alignleft" => "Left", "alignright" => "Right", "aligncenter" => "Center");

        // Image Links to Options
        $of_options_image_link_to = array("image" => "The Image", "post" => "The Post");


        /* ----------------------------------------------------------------------------------- */
        /* The Options Array */
        /* ----------------------------------------------------------------------------------- */

// Set the Options Array
        global $of_options;
        global $typographyclasses;
        global $fontsclasses;
        global $colorclasses;
        global $bordersclasses;
        global $bgclasses;
        $yesorno = array("yes" => "Yes", "no" => "No");
        $showhide = array("show" => "Show", "hide" => "Hide");
        $of_options = array();


        /* start header settings here */

        $of_options[] = array("name" => "Header Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "headericon.png"
        );

        /* start logo settings */
        $of_options[] = array("name" => "Logo URL",
            "desc" => "Put the URL of your logo, or upload new one",
            "id" => "asalah_logo_url",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Retina Logo URL",
            "desc" => "It should be double size as default logo",
            "id" => "asalah_logo_url_retina",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Sticky Header Logo URL",
            "desc" => "Put the URL of the logo which should appear on the sticky menu, or upload new one",
            "id" => "asalah_sticky_logo_url",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Sticky Header Retina Logo URL",
            "desc" => "It should be double size as default logo",
            "id" => "asalah_sticky_logo_url_retina",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Default Logo Width in pixel",
            "desc" => "",
            "id" => "asalah_logo_url_w",
            "std" => "0",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Default Logo Height in pixel",
            "desc" => "",
            "id" => "asalah_logo_url_h",
            "std" => "36",
            "step" => "1",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );
        
        $of_options[] = array("name" => "Sticky header Logo Width",
            "desc" => "",
            "id" => "asalah_sticky_logo_width",
            "std" => "0",
            "step" => "1",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );

        
        $of_options[] = array("name" => "Sticky header Logo Height",
            "desc" => "",
            "id" => "asalah_sticky_logo_height",
            "std" => "30",
            "step" => "1",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );


        $of_options[] = array("name" => "Favicon URL",
            "desc" => "",
            "id" => "asalah_fav_url",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple iPhone Icon",
            "desc" => "57px X 57px",
            "id" => "asalah_apple_57",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple iPad Icon",
            "desc" => "72px X 72px",
            "id" => "asalah_apple_72",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple iPhone Retina Icon",
            "desc" => "114px X 114px",
            "id" => "asalah_apple_114",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple iPad Icon",
            "desc" => "144px X 144px",
            "id" => "asalah_apple_144",
            "std" => "",
            "type" => "media");
        


        $top_header_styles = array("light" => "Light", "dark" => "Dark");

        $of_options[] = array("name" => "Top Header Skin",
            "desc" => "it's a ready scheme for top header, you can color it yourself by going to colors settings",
            "id" => "asalah_top_header_scheme",
            "std" => "light",
            "type" => "select",
            "options" => $top_header_styles
        );

        $header_styles = array("default" => "Default", "white_overlay" => "White Overlay", "black_overlay" => "Black Overlay", "fixed_left" => "Left Side", "fixed_right" => "Right Side", 'overlapping' => "Overlapping Header");

        $of_options[] = array("name" => "Main header style",
            "desc" => "",
            "id" => "asalah_header_style",
            "std" => "default",
            "type" => "select",
            "options" => $header_styles
        );

        $menu_styles = array("default" => "Default", "classic" => "Classic", "full" => "Full Screen");

        $of_options[] = array("name" => "Main menu style",
            "desc" => "",
            "id" => "asalah_menu_style",
            "std" => "default",
            "type" => "select",
            "options" => $menu_styles
        );

        $header_wrapper = array("full" => "Full Width", "container" => "Container");

        $of_options[] = array("name" => "Header Wrapper Width",
            "desc" => "",
            "id" => "asalah_header_wrapper",
            "std" => "full",
            "type" => "select",
            "options" => $header_wrapper
        );

        $header_wrapper = array("full" => "Full Width", "container" => "Container");

        $of_options[] = array("name" => "Slider Wrapper Width",
            "desc" => "",
            "id" => "asalah_slider_wrapper",
            "std" => "full",
            "type" => "select",
            "options" => $header_wrapper
        );

        $header_items_positions = array("default" => "Default", "center" => "Centered");

        $of_options[] = array("name" => "Header items position",
            "desc" => "",
            "id" => "asalah_header_items_position",
            "std" => "default",
            "type" => "select",
            "options" => $header_items_positions
        );

        $of_options[] = array("name" => "Dark Header",
            "desc" => "",
            "id" => "asalah_dark_header",
            "std" => "no",
            "type" => "select",
            "options" => $yesorno
        );

        $of_options[] = array("name" => "Transparent Header",
            "desc" => "",
            "id" => "asalah_transparent_header",
            "std" => "no",
            "type" => "select",
            "options" => $yesorno
        );

        $of_options[] = array("name" => "Show Cart In Header",
            "desc" => "",
            "id" => "asalah_header_cart",
            "std" => "hide",
            "folds" => 1,
            "type" => "select",
            "options" => $showhide
        );
		
		/* start header info */
		// $of_options[] = array("name" => "Show WPML Switcher In Header",
  //           "desc" => "",
  //           "id" => "asalah_header_language",
  //           "std" => "hide",
  //           "type" => "select",
  //           "options" => $showhide
  //       );
		
        /* start header info */
        $of_options[] = array("name" => "Show Search In Header",
            "desc" => "",
            "id" => "asalah_header_search",
            "std" => "show",
            "folds" => 1,
            "type" => "select",
            "options" => $showhide
        );

        $search_styles = array("simple" => "Simple", "circle" => "Circle");
        $of_options[] = array("name" => "Header Search icon Style",
            "desc" => "",
            "id" => "asalah_search_style",
            "std" => "simple",
            "folds" => 1,
            "type" => "select",
            "options" => $search_styles
        );
        $of_options[] = array("name" => "Show social icons In Header",
            "desc" => "",
            "id" => "asalah_header_social",
            "std" => "show",
            "folds" => 1,
            "type" => "select",
            "options" => $showhide
        );

        $of_options[] = array("name" => "Show contact info In Header",
            "desc" => "",
            "id" => "asalah_header_contact",
            "std" => "show",
            "folds" => 1,
            "type" => "select",
            "options" => $showhide
        );
        
        $of_options[] = array("name" => "Sticky Header",
            "desc" => "",
            "id" => "asalah_sticky_header",
            "std" => "no",
            "folds" => 1,
            "type" => "select",
            "options" => $yesorno
        );

        $of_options[] = array("name" => "Disable Sticky Header On Mobile",
            "desc" => "",
            "id" => "asalah_sticky_header_mobile_disable",
            "std" => "yes",
            "folds" => 1,
            "type" => "select",
            "options" => $yesorno
        );

        $of_options[] = array("name" => "Disable Sticky Header On Tablet",
            "desc" => "",
            "id" => "asalah_sticky_header_tablet_disable",
            "std" => "yes",
            "folds" => 1,
            "type" => "select",
            "options" => $yesorno
        );

        $of_options[] = array("name" => "Header Phone Number",
            "desc" => "",
            "id" => "asalah_header_phone",
            "std" => "+1-23-456789",
            "fold" => "asalah_header_contact",
            "type" => "text");

        $of_options[] = array("name" => "Header Email Address",
            "desc" => "",
            "id" => "asalah_header_mail",
            "std" => "email@address.com",
            "fold" => "asalah_header_contact",
            "type" => "text");


        $of_options[] = array("name" => "Header Custom Code",
            "desc" => "",
            "id" => "asalah_header_code",
            "std" => "",
            "type" => "textarea");



        $of_options[] = array("name" => "CSS Custom Code",
            "desc" => "",
            "id" => "asalah_custom_css",
            "std" => "",
            "type" => "textarea");

        /* start header info */
        $of_options[] = array("name" => "Disable Lightbox plugin",
            "desc" => "",
            "id" => "asalah_disable_prettyphoto",
            "std" => 0,
            "type" => "switch"
        );


        /* start spacing and sizes settings */
        $of_options[] = array("name" => "Spaces & Sizes Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "spacingicon.png"
        );

        $of_options[] = array("name" => "Menu items padding top",
            "desc" => "",
            "id" => "asalah_menu_items_padding_top",
            "std" => "30",
            "step" => "1",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Menu items padding Bottom",
            "desc" => "",
            "id" => "asalah_menu_items_padding_bottom",
            "std" => "30",
            "step" => "1",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Sticky Menu items padding top",
            "desc" => "",
            "id" => "asalah_sticky_menu_items_padding_top",
            "std" => "10",
            "step" => "1",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Sticky Menu items padding Bottom",
            "desc" => "",
            "id" => "asalah_sticky_menu_items_padding_bottom",
            "std" => "10",
            "step" => "1",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Header paddign top",
            "desc" => "",
            "id" => "asalah_header_padding_top",
            "std" => "0",
            "step" => "1",
            "min" => "0",
            "max" => "80",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Header paddign bottom",
            "desc" => "",
            "id" => "asalah_header_padding_bottom",
            "std" => "0",
            "step" => "1",
            "min" => "0",
            "max" => "80",
            "type" => "sliderui"
        );
        

        $of_options[] = array("name" => "Sticky header padding top",
            "desc" => "",
            "id" => "asalah_sticky_padding_top",
            "std" => "0",
            "step" => "1",
            "min" => "0",
            "max" => "30",
            "type" => "sliderui"
        );
        
        $of_options[] = array("name" => "Sticky header padding bottom",
            "desc" => "",
            "id" => "asalah_sticky_padding_bottom",
            "std" => "0",
            "step" => "1",
            "min" => "0",
            "max" => "30",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Main menu Margin Top",
            "desc" => "",
            "id" => "asalah_menu_margin_top",
            "std" => "0",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );
        
        $of_options[] = array("name" => "Sticky header menu margin top",
            "desc" => "",
            "id" => "asalah_sticky_menu_margin_top",
            "std" => "0",
            "step" => "1",
            "min" => "0",
            "max" => "30",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Logo Margin Top",
            "desc" => "",
            "id" => "asalah_logo_margin_top",
            "std" => "10",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Sticky logo Margin Top",
            "desc" => "",
            "id" => "asalah_sticky_logo_margin_top",
            "std" => "10",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Header buttons margin top",
            "desc" => "",
            "id" => "asalah_header_buttons_margin_top",
            "std" => "16",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Sticky header buttons margin top",
            "desc" => "",
            "id" => "asalah_sticky_header_buttons_margin_top",
            "std" => "12",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Page title holder padding top",
            "desc" => "",
            "id" => "asalah_page_title_padding_top",
            "std" => "46",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Page title holder padding bottom",
            "desc" => "",
            "id" => "asalah_page_title_padding_bottom",
            "std" => "46",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        /* start footer settings here */
        $of_options[] = array("name" => "Footer Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "footericon.png"
        );

        $url =  ADMIN_DIR . 'assets/images/';
        $of_options[] = array(  "name"      => "Footer Layout",
                                "desc"      => "Select footer layout then you can add content to it by going to widgets.",
                                "id"        => "asalah_footer_layout",
                                "std"       => "footer_1",
                                "type"      => "images",
                                "options"   => array(
                                    'footer_1'    => $url . '1.jpg',
                                    'footer_2'    => $url . '2.jpg',
                                    'footer_3'    => $url . '3.jpg',
                                    'footer_4'    => $url . '4.jpg',
                                    'footer_5'    => $url . '5.jpg',
                                    'footer_6'    => $url . '6.jpg',
                                    'footer_7'    => $url . '7.jpg',
                                    'footer_8'    => $url . '8.jpg',
                                    'footer_9'    => $url . '9.jpg',
                                    'footer_10'    => $url . '10.jpg',
                                    'footer_11'    => $url . '11.jpg'
                                )
                        );
        
        $of_options[] = array("name" => "Dark Footer",
            "desc" => "",
            "id" => "asalah_dark_footer",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Hide footer",
            "desc" => "",
            "id" => "asalah_hide_footer",
            "std" => 0,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Hide first footer",
            "desc" => "",
            "id" => "asalah_hide_footer1",
            "std" => 0,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Hide second footer",
            "desc" => "",
            "id" => "asalah_hide_footer2",
            "std" => 0,
            "type" => "switch"
        );
        
		
		// $of_options[] = array("name" => "Show WPML language switcher in footer",
		//     "desc" => "",
		//     "id" => "asalah_footer_language",
		//     "std" => 0,
		//     "type" => "switch"
		// );
		
        /* start logo settings */
        $of_options[] = array("name" => "Copyrights Logo URL",
            "desc" => "Put the URL of your logo, or upload new one",
            "id" => "asalah_credits_image",
            "std" => "",
            "type" => "media");


        $of_options[] = array("name" => "Copyrights Logo Width in pixel",
            "desc" => "",
            "id" => "asalah_credits_image_w",
            "std" => "0",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Copyrights Logo Height in pixel",
            "desc" => "",
            "id" => "asalah_credits_image_h",
            "std" => "28",
            "step" => "1",
            "min" => "1",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Copyright Text",
            "desc" => "Copyright Text",
            "id" => "asalah_credits_text",
            "std" => "All right reserved to Asalah Solutions | Sanabel.",
            "type" => "text");
        
        // $of_options[] = array("name" => "Enable Scroll To Top Button",
        //     "desc" => "",
        //     "id" => "asalah_scroll_totop",
        //     "std" => 1,
        //     "folds" => 1,
        //     "type" => "switch"
        // );

        $of_options[] = array("name" => "Footer Custom Code",
            "desc" => "",
            "id" => "asalah_footer_code",
            "std" => "",
            "type" => "textarea");

        /* start posts settings here */
        $of_options[] = array("name" => "Posts Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "postsicon.png"
        );

        $asalah_blog_paginations = array("default" => "Default", "scroll" => "Infinite Scroll", 'loadmore' => "Ajax Load More");
        $of_options[] = array("name" => "Default Blog Pagination",
            "desc" => "",
            "id" => "asalah_blog_pagination",
            "std" => "default",
            "type" => "select",
            "options" => $asalah_blog_paginations
        );

        $asalah_blog_styles = array("default" => "Default", "classic" => "Classic", "masonry" => "Masonry");
        $of_options[] = array("name" => "Default Blog Style",
            "desc" => "",
            "id" => "asalah_blog_style",
            "std" => "default",
            "type" => "select",
            "options" => $asalah_blog_styles
        );

        $of_options[] = array("name" => "Default Blog Description lenght",
            "desc" => "",
            "id" => "asalah_blog_excrept_length",
            "std" => "40",
            "min" => "5",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Crop Banner Of Single Post",
            "desc" => "",
            "id" => "asalah_crop_single_banner",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Crop Banner Of Blog Page",
            "desc" => "",
            "id" => "asalah_crop_blog_banner",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Blog Post Grid Crop Width",
            "desc" => "The default size to crop blog post thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_blog_thumb_width",
            "std" => "460",
            "type" => "text");
            
        $of_options[] = array("name" => "Blog Post Grid Crop Height",
            "desc" => "The default size to crop blog post thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_blog_thumb_height",
            "std" => "320",
            "type" => "text");

        $of_options[] = array("name" => "Blog Post Banner Crop Width",
            "desc" => "The default size to crop blog post thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_blog_banner_width",
            "std" => "1170",
            "type" => "text");
            
        $of_options[] = array("name" => "Blog Post Banner Crop Height",
            "desc" => "The default size to crop blog post thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_blog_banner_height",
            "std" => "480",
            "type" => "text");

        $of_options[] = array("name" => "Page Title Holder",
            "desc" => "",
            "id" => "asalah_title_holder",
            "std" => "show",
            "folds" => 1,
            "type" => "select",
            "options" => $showhide
        );

        $asalah_page_title_styles = array("" => "Default", "center" => "Center");

        $of_options[] = array("name" => "Page Title Style",
            "desc" => "",
            "id" => "asalah_page_title_style",
            "std" => "",
            "fold" => "asalah_title_holder",
            "type" => "select",
            "options" => $asalah_page_title_styles
        );

        $of_options[] = array("name" => "Breadcrumb",
            "desc" => "",
            "id" => "asalah_breadcrumb",
            "std" => "show",
            "fold" => "asalah_title_holder",
            "type" => "select",
            "options" => $showhide
        );

        $of_options[] = array("name" => "Page Title",
            "desc" => "",
            "id" => "asalah_post_title",
            "std" => "show",
            "fold" => "asalah_title_holder",
            "type" => "select",
            "options" => $showhide
        );

        $of_options[] = array("name" => "Next And Previous Posts Links",
            "desc" => "",
            "id" => "asalah_post_next_prev",
            "std" => "show",
            "type" => "select",
            "options" => $showhide
        );

        $of_options[] = array("name" => "Enable Wordpress navtive comments",
            "desc" => "",
            "id" => "asalah_enable_comments",
            "std" => 1,
            "type" => "switch"
        );
        
        /*
        $of_options[] = array("name" => "Enable Facebook comments",
            "desc" => "",
            "id" => "asalah_enable_fbcomments",
            "std" => 0,
            "type" => "switch"
        );
         * 
         */
        
        $of_options[] = array("name" => "Sticky Sidebar",
            "desc" => "Not recommended for long sidebars",
            "id" => "asalah_post_sticky_sidebar",
            "std" => "no",
            "type" => "select",
            "options" => $yesorno
        );

        $of_options[] = array("name" => "Enable Post Social Share",
            "desc" => "",
            "id" => "asalah_post_social_share",
            "std" => 0,
            "folds" => 1,
            "type" => "switch"
        );
        
        /*
        $of_options[] = array("name" => "Sliding Post Social Share",
            "desc" => "",
            "id" => "asalah_sliding_social_share",
            "std" => 1,
            "fold" => "asalah_post_social_share",
            "type" => "switch"
        );
        */

        $of_options[] = array("name" => "Post Tag Cloud",
            "desc" => "",
            "id" => "asalah_post_tags",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Author Box",
            "desc" => "",
            "id" => "asalah_author_box",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Show meta info bar",
            "desc" => "",
            "id" => "asalah_meta_info",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Author name in meta info line",
            "desc" => "",
            "id" => "asalah_author_meta",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Post Date And Time in Meta",
            "desc" => "",
            "id" => "asalah_post_datetime",
            "std" => "show",
            "type" => "select",
            "options" => $showhide
        );

        $of_options[] = array("name" => "Post icons",
            "desc" => "",
            "id" => "asalah_post_icons",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Blog Page URL",
            "desc" => "The URL of page you created to use as main blog page",
            "id" => "asalah_blog_url",
            "std" => "",
            "type" => "text");


        /* start pages settings here */
        $of_options[] = array("name" => "Pages Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "postsicon.png"
        );

        $of_options[] = array("name" => "Sticky Sidebar",
            "desc" => "Not recommended for long sidebars",
            "id" => "asalah_page_sticky_sidebar",
            "std" => "no",
            "type" => "select",
            "options" => $yesorno
        );

        $of_options[] = array("name" => "Enable Wordpress navtive comments pages",
            "desc" => "",
            "id" => "asalah_page_enable_comments",
            "std" => 1,
            "type" => "switch"
        );
        

        $of_options[] = array("name" => "Enable Page Social Share",
            "desc" => "",
            "id" => "asalah_page_post_social_share",
            "std" => 0,
            "folds" => 1,
            "type" => "switch"
        );


        $of_options[] = array("name" => "Page Author Box",
            "desc" => "",
            "id" => "asalah_page_author_box",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Show page meta info bar",
            "desc" => "",
            "id" => "asalah_page_meta_info",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Page Author name in meta info line",
            "desc" => "",
            "id" => "asalah_page_author_meta",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Page Date And Time in Meta",
            "desc" => "",
            "id" => "asalah_page_datetime",
            "std" => "show",
            "type" => "select",
            "options" => $showhide
        );

        
        /* start project settings */
        $of_options[] = array("name" => "Projects Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "headericon.png"
        );

        $of_options[] = array("name" => "Portfolio URL Slug",
            "desc" => "",
            "id" => "asalah_portfolio_slug",
            "std" => "project",
            "type" => "text");

        $asalah_portfolio_paginations = array("default" => "Default", "scroll" => "Infinite Scroll", 'loadmore' => "Ajax Load More");
        $of_options[] = array("name" => "Default Portfolio Pagination",
            "desc" => "",
            "id" => "asalah_portfolio_pagination",
            "std" => "default",
            "type" => "select",
            "options" => $asalah_portfolio_paginations
        );

        $asalah_portfolio_thumnails = array("default" => "Default", "masonry" => "Masonry");
        $of_options[] = array("name" => "Default Portfolio Thumbnails",
            "desc" => "",
            "id" => "asalah_portfolio_thumnails",
            "std" => "default",
            "type" => "select",
            "options" => $asalah_portfolio_thumnails
        );

        $asalah_portfolio_styles = array("default" => "Default", "classic" => "Classic", "grid" => "Grid", "text" => "Text", "full" => "Full");
        $of_options[] = array("name" => "Default Portfolio Style",
            "desc" => "",
            "id" => "asalah_portfolio_style",
            "std" => "default",
            "type" => "select",
            "options" => $asalah_portfolio_styles
        );

        $asalah_portfolio_columns = array('full_column' => '1', 'one_half' => '2', 'one_third' => '3', 'one_fourth' => '4', 'one_fifth' => '5', 'one_sixth' => '6');
        $of_options[] = array("name" => "Default Portfolio Columns",
            "desc" => "",
            "id" => "asalah_portfolio_columns",
            "std" => "one_third",
            "type" => "select",
            "options" => $asalah_portfolio_columns
        );

        $of_options[] = array("name" => "Next And Previous Projects Links",
            "desc" => "",
            "id" => "asalah_project_next_prev",
            "std" => "show",
            "type" => "select",
            "options" => $showhide
        );

        $of_options[] = array("name" => "Show Project Overview",
            "desc" => "",
            "id" => "asalah_project_overview",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Project Overview Phrase",
            "desc" => "",
            "id" => "asalah_project_overview_phrase",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array("name" => "Show Project Details",
            "desc" => "",
            "id" => "asalah_project_details",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Project Details Phrase",
            "desc" => "",
            "id" => "asalah_project_details_phrase",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array("name" => "Enable Porject Social Share",
            "desc" => "",
            "id" => "asalah_project_social_share",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Show Projects Filter",
            "desc" => "",
            "id" => "asalah_projects_filter",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Show Other Projects",
            "desc" => "",
            "id" => "asalah_other_projects",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Other Projects Block Title",
            "desc" => "",
            "id" => "asalah_other_project_title",
            "std" => "Other Projects",
            "type" => "text");
            
        
        $of_options[] = array("name" => "Other Projects Block Description Text",
            "desc" => "",
            "id" => "asalah_other_projects_desc",
            "std" => "",
            "type" => "textarea");

        $of_options[] = array("name" => "Other Projects Block Title Unique Word",
            "desc" => "",
            "id" => "asalah_other_project_title_unique_word",
            "std" => "Projects",
            "type" => "text");

        $of_options[] = array("name" => "",
                "desc" => "Other Projects Block Title Unique Word Color",
                "id" => "asalah_other_project_title_unique_word_color",
                "std" => "",
                "type" => "color"
            );

        $of_options[] = array("name" => "Portfolio Page URL",
            "desc" => "The URL of page you created to use as main portfolio page",
            "id" => "asalah_portfolio_url",
            "std" => "",
            "type" => "text");
            
        $of_options[] = array("name" => "Portfolio Page Projects Per Page",
            "desc" => "Number of projects will display in portfolio page",
            "id" => "asalah_portfolio_posts_per_page",
            "std" => "9",
            "type" => "text");

        /* start logo settings */
        $of_options[] = array("name" => "Default Project Thumbnail",
            "desc" => "This will be the project thumbnail image if no image uploaded",
            "id" => "asalah_default_project_thumbnail",
            "std" => get_template_directory_uri()."/images/project_default.png",
            "type" => "media");
            
        $of_options[] = array("name" => "Portfolio Thumbnail Crop Width",
            "desc" => "The default size to crop portfolio thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_portfolio_thumb_width",
            "std" => "640",
            "type" => "text");
            
        $of_options[] = array("name" => "Portfolio Thumbnail Crop Height",
            "desc" => "The default size to crop portfolio thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_portfolio_thumb_height",
            "std" => "500",
            "type" => "text");
        
        $projects_side_positions = array("right" => "Right", "left" => "left", 'full' => "Full Witdh");

        $of_options[] = array("name" => "Project Default Layout",
            "desc" => "",
            "id" => "asalah_project_layout",
            "std" => "right",
            "type" => "select",
            "options" => $projects_side_positions
        );
        
        /* start sidebars options */
        $of_options[] = array("name" => "Sidebars Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "sidebaricon.png"
        );

        $of_options[] = array("name" => "Custom Sidebars",
            "desc" => "Here you can add custom sidebars to use theme with pages and posts.",
            "id" => "asalah_custom_sidebars",
            "std" => "",
            "type" => "sidebars"
        );
        

        /* start social options */
        $of_options[] = array("name" => "Post Icons Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "posticonsicon.png"
        );

        $post_types = array("standard", "image", "gallery", "video", "audio");
        foreach ($post_types as $post_type) {

            $of_options[] = array("name" => $post_type . " Post Icon",
                "desc" => "",
                "id" => "asalah_post_icons_" . $post_type,
                "std" => 1,
                "folds" => 1,
                "type" => "switch"
            );

            $of_options[] = array("name" => "",
                "desc" => "Use image icon insted of font awesome icons",
                "id" => "asalah_post_icons_" . $post_type . "_image",
                "std" => 0,
                "type" => "switch"
            );

            $of_options[] = array("name" => "",
                "desc" => "Upload image to use as post icons for " . $post_type . " post, will be resized to 20X20",
                "id" => "asalah_post_icons_" . $post_type . "_image_upload",
                "std" => "",
                "type" => "upload");

            $of_options[] = array("name" => "",
                "desc" => "Icon name, Go <a target='_blank' href='http://fortawesome.github.io/Font-Awesome/icons/'>here</a>, click the icon you want and you will find it's name, for example (icon-pencil)",
                "id" => "asalah_post_icons_" . $post_type . "_fontawesome",
                "std" => "",
                "type" => "text");

            $of_options[] = array("name" => "",
                "desc" => "Icon color",
                "id" => "asalah_post_icons_" . $post_type . "_color",
                "std" => "",
                "type" => "color"
            );

            $of_options[] = array("name" => "",
                "desc" => "Icon background color.",
                "id" => "asalah_post_icons_" . $post_type . "_bg",
                "std" => "",
                "type" => "color"
            );
        }
        /* start social options */
        $of_options[] = array("name" => "Social Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "socialicon.png");

        $networks = array("facebook" => "Facebook", "twitter" => "Twitter", "google-plus" =>  "Google Plus", "behance" => "Behance", "dribbble" => "Dribbble", "linkedin" => "Linked In", "youtube" => "Youtube", 'vimeo-square' => 'Vimeo', "vk" => "VK", "skype" => "Skype", "instagram" => "Instagram", "pinterest" => "Pinterest", "github" => "Github", "renren" => "Ren Ren", "flickr" => "Flickr", "rss" =>  "RSS");
        
        foreach ($networks as $network => $social ) {
            $of_options[] = array("name" => $social . " Page URL",
                "desc" => "",
                "id" => "asalah_".$network."_url",
                "std" => "",
                "type" => "text");
        }

        $of_options[] = array("name" => "Google Map Javascript API",
            "desc" => "More details about creating API here https://developers.google.com/maps/documentation/javascript/tutorial?csw=1#api_key",
            "id" => "asalah_map_api",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Facebook APP ID",
            "desc" => "",
            "id" => "asalah_fb_id",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Add facebook SDK library to header",
            "desc" => "Disable this if any conflict with another plugin which has (social plugins).",
            "id" => "asalah_use_sdk",
            "std" => 1,
            "type" => "checkbox");
        
        $of_options[] = array("name" => "Twitter Access token",
            "desc" => "",
            "id" => "asalah_at_id",
            "std" => "",
            "type" => "text");
        
        $of_options[] = array("name" => "Twitter Access token secret",
            "desc" => "",
            "id" => "asalah_ats_id",
            "std" => "",
            "type" => "text");
        
        $of_options[] = array("name" => "Consumer key",
            "desc" => "",
            "id" => "asalah_conk_id",
            "std" => "",
            "type" => "text");
        
        $of_options[] = array("name" => "Consumer secret",
            "desc" => "",
            "id" => "asalah_cons_id",
            "std" => "",
            "type" => "text");

        /* start layout options */
        $of_options[] = array("name" => "Layout Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "layouticon.png");

        $grid_systems = array("1200" => "1200px Grid", "960" => "960px Grid");

        $of_options[] = array("name" => "Site container width",
            "desc" => "",
            "id" => "asalah_container_width",
            "std" => "1200",
            "type" => "select",
            "options" => $grid_systems
        );

        // $of_options[] = array("name" => "Disable Responsive",
        //     "desc" => "",
        //     "id" => "asalah_disable_responsive",
        //     "std" => "no",
        //     "type" => "select",
        //     "options" => $yesorno
        // );

        $of_options[] = array("name" => "Boxed Layout",
            "desc" => "",
            "id" => "asalah_boxed",
            "std" => 0,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Color switcher",
            "desc" => "",
            "id" => "asalah_color_switcher",
            "std" => 0,
            "type" => "switch"
        );
        
        $pagination_styles = array("numbers" => "Page Numbers", "navigation" => "Next/Previous Links");
        $of_options[] = array("name" => "Pagination Style",
            "desc" => "",
            "id" => "asalah_default_pagination_style",
            "std" => "numbers",
            "type" => "select",
            "options" => $pagination_styles
        );

        $side_positions = array("right" => "Right", "left" => "left", 'no-sidebar' => "No Sidebar");

        $of_options[] = array("name" => "Default Sidebar Position",
            "desc" => "",
            "id" => "asalah_sidebar_position",
            "std" => "right",
            "type" => "select",
            "options" => $side_positions
        );

        $of_options[] = array("name" => "Body Margin Top",
            "desc" => "",
            "id" => "asalah_body_margintop",
            "std" => "0",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Body Margin Bottom",
            "desc" => "",
            "id" => "asalah_body_marginbottom",
            "std" => "0",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Section Default Padding Top",
            "desc" => "",
            "id" => "asalah_section_top",
            "std" => "60",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Section Default Padding Bottom",
            "desc" => "",
            "id" => "asalah_section_bottom",
            "std" => "60",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Products Per Shop Page",
            "desc" => "Number of Products Per Page In WooCommerce Shop",
            "id" => "asalah_woo_per_page",
            "std" => "12",
            "type" => "text");
        
        /* start fonts options */
        global $fontsarray;

        $decode = json_decode($fontsarray, true);

        $webfonts = array('none' => 'Default');

        $webfonts['safefonts'] = "Web Safe Fonts";

        foreach ($decode['items'] as $key => $property) {

            $item_family = $decode['items'][$key]['family'];

            $item_family_trunc = str_replace(' ', '+', $item_family);

            $webfonts[$item_family_trunc] = $item_family;
        }

        $of_options[] = array("name" => "Fonts",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "fontsicon.png");

        

        foreach ($fontsclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '~', $id);
            $id = str_replace(',', '*', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_gfonts_" . $id;

            $of_options[] = array("name" => $title,
                "id" => $id,
                "std" => "none",
                "type" => "select",
                "options" => $webfonts
            );
        }
        
        /* start typography options */
        
        $of_options[] = array("name" => "Typography",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "typoicon.png");

        $verctor_icons = array("no" => "No", "fontello" => "Fontello", "icomoon" => "Icomoon");
        $of_options[] = array("name" => "Include Additional Vector Icons Package",
            "desc" => "By default, Fontawesome is included in the theme, if it is not enough for you, you can include another package, you have to choose only one additional package to prevent heavy load of your site and conflicts between icon names, and you can create your own set of icons if you do not need all of them, read the documentation for more information about customizing vector icons",
            "id" => "asalah_include_vector_icon",
            "std" => "no",
            "type" => "select",
            "options" => $verctor_icons
        );

        $taypography_options = array("normal" => "Normal", "semi" => "Semi-bold", "bold" => "Bold");
            
            $of_options[] = array("name" => "Site Global Typography",
                "desc" => "",
                "id" =>"website_global_typography",
                "std" => "normal",
                "type" => "select",
                "options" => $taypography_options);
        
        
        foreach ($typographyclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_typo_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => array('size' => '0', 'style' => '', 'height' => '0', 'color' => ''),
                "type" => "googletypography");
        }
        

        /* asalah color options */
        $of_options[] = array("name" => "Styling Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "stylingicon.png");

        $of_options[] = array("name" => "Dark_skin",
            "desc" => "",
            "id" => "asalah_dark_skin",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Skin",
            "desc" => "Change Your Site Color.",
            "id" => "asalah_skin_color",
            "std" => "",
            "type" => "color");

        /* start header coloring */


        /* end header coloring */

        
        
        // if you change this array don't forget to change it in inc/customstyle.php

        foreach ($colorclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_bgcolor_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => "",
                "type" => "color");
        }

        /* asalah color options */
        $of_options[] = array("name" => "Borders Colors Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "bordersicon.png");

        foreach ($bordersclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_border_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => "",
                "type" => "color");
        }

                
        /* start background options */
        $of_options[] = array("name" => "Backgrounds",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "bgicon.png");


        $of_options[] = array("name" => "Site Custom Background",
            "desc" => "Enable custom background for body",
            "id" => "asalah_enable_html_background",
            "std" => 0,
            "folds" => 1,
            "type" => "checkbox");

        $of_options[] = array("name" => "Site Background Images",
            "desc" => "Select a background pattern.",
            "id" => "asalah_html_custom_bg",
            "std" => $bg_images_url . "bg0.png",
            "fold" => 'asalah_enable_html_background',
            "type" => "tiles",
            "options" => $bg_images,
        );

        $of_options[] = array("name" => "Upload your own custom backgrounds!",
            "desc" => "",
            "id" => "asalah_custom_bg_instructions",
            "std" => "<h3 style=\"margin: 0 0 10px;\">Upload Your Own Custom Backgrounds.</h3>
					You can uer below fields to upload your own custom background for your website sections, if you upload custom background for your body you should disable the body background option above.",
            "icon" => true,
            "type" => "info");

        foreach ($bgclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_customebg_" . $id;

            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => "",
                "type" => "media");
            $repeat_options_radio = array("repeat" => "repeat", "repeat-x" => "repeat-x", "repeat-y" => "repeat-y", "no-repeat" => "no-repeat");
            
            $of_options[] = array("name" => "",
                "desc" => "",
                "id" => $id . "_repeat",
                "std" => "",
                "type" => "select",
                "options" => $repeat_options_radio);

            $of_options[] = array("name" => "",
                "desc" => "Make This A Cover Background",
                "id" => $id . "_is_fixed",
                "std" => 0,
                "type" => "checkbox");

            $position_options_radio = array("top" => "Top", "center" => "Center", "bottom" => "Bottom");
            $of_options[] = array("name" => "",
                "desc" => "Select image Y position",
                "id" => $id . "_position",
                "std" => "center",
                "type" => "select",
                "options" => $position_options_radio);

            $x_position_options_radio = array("left" => "Left", "center" => "Center", "right" => "Right");
            $of_options[] = array("name" => "",
                "desc" => "Select image X position",
                "id" => $id . "_x_position",
                "std" => "center",
                "type" => "select",
                "options" => $x_position_options_radio);
        }

        $of_options[] = array("name" => "Enable Page Title Overlay Color",
            "desc" => "",
            "id" => "asalah_enable_title_overlay",
            "std" => 0,
            "folds" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Page Title Overlay Color",
                "desc" => "",
                "id" => "asalah_page_title_overlay_color",
                "std" => "#fff",
                "fold" => "asalah_enable_title_overlay",
                "type" => "color"
            );

        $of_options[] = array("name" => "Page Title Text Color",
                "desc" => "",
                "id" => "asalah_page_title_text_color",
                "std" => "",
                "type" => "color"
            );
        /* $page_holder_options = array("default" => "Default", "black" => "Black", "white" => "White");
        $of_options[] = array("name" => "Page Holder Title Color (Title and links)",
            "desc" => "",
            "id" => "asalah_pageholder_color",
            "std" => "default",
            "type" => "select",
            "options" => $page_holder_options); */
        

        $of_options[] = array("name" => "Import Demo Sites",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "importicon.png"
        );

        $url =  ADMIN_DIR . 'assets/images/demo/';

        $of_options[] = array( "name" => "Import Main Site",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=main",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'main.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 1",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo1",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo1.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 2",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo2",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo2.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 3",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo3",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo3.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 4",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo4",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo4.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 5",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo5",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo5.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 6",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo6",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo6.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 7",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo7",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo7.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 8",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo8",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo8.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 9",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo9",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo9.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 10",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo10",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo10.jpg',
            "type" => "button");

        $of_options[] = array( "name" => "Import Demo 11",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=demo11",
            "btntext" => 'Import Demo Content',
            "image" => $url . 'demo11.jpg',
            "type" => "button");
        
// Backup Options
        $of_options[] = array("name" => "Backup Options",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "backupicon.png"
        );

        $of_options[] = array("name" => "Backup and Restore Options",
            "id" => "of_backup",
            "std" => "",
            "type" => "backup",
            "desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
        );

        $of_options[] = array("name" => "Transfer Theme Options Data",
            "id" => "of_transfer",
            "std" => "",
            "type" => "transfer",
            "desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
        );
    }

//End function: of_options()
}//End chack if function exists: of_options()
?>
