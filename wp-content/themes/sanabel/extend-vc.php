<?php


add_action( 'vc_before_init', 'asalah_shortcodes_to_vc' );
function asalah_shortcodes_to_vc() {

$row_custom_css = array (
		'admin_enqueue_css' => array(get_template_directory_uri().'/extend-vc.css'),
);
vc_map_update('vc_row', $row_custom_css);


vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "container",
	"heading" => "Width",
	"param_name" => "width",
	"value" => array(
		"Container" => "container",
		"Full" => "full",	
		"Mini" => "mini"
	),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background type",
	"param_name" => "bg",
	"value" => array(
		"Color" => "color",
		"Image" => "image",
		"Video" => "video",
		"Half image left" => "half_image_left",
		"Half image right" => "half_image_right"
	),
	"group" => "Main Section"
));

// changed to bg_image

// vc_add_param("vc_row", array(
// 	"type" => "attach_image",
// 	"class" => "",
// 	"heading" => "Background Image",
// 	"value" => "",
// 	"param_name" => "background_image",
// 	"group" => "Main Section"
// ));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	'value' => array( __( 'No', 'js_composer' ) => 'no' ),
	"heading" => "Show Background On Mobile ?",
	"param_name" => "mobile_bg",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background Image Style",
	"param_name" => "image_style",
	"value" => array(
		"Default" => "default",
		"Cover" => "cover",
		"Pattern" => "pattern",
		"Responsive" => "responsive",
		"Fixed" => "fixed"
	),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background Overlay Color",
	"param_name" => "bg_overlay",
	"value" => "",
	"description" => "",
	"dependency" => array( 'element' => "bg", 'value' => array('image', 'video', 'half_image_left', 'half_image_right')),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Parallax Background",
	"param_name" => "parallax",
	"dependency" => array( 'element' => "bg", 'value' => array('image', 'video', 'half_image_left', 'half_image_right')),
	"value" => array(
		"No" => "no",
		"Yes" => "yes",
		"Fixed" => "fixed",
		"Animated" => "animated",
		"Half image right" => "half_image_right"
	),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Parallax Speed",
	"value" => "0.8",
	"param_name" => "parallax_speed",
	"description" => __("The speed of parallax compared to page scroll speed, should be ny value from 0 to 2", "asalah"),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Parallax Offset",
	"value" => "0",
	"param_name" => "parallax_offset",
	"description" => __("The top margin of the image when the image hits the top of browser", "asalah"),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "MP4 Video URL",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => array( 'element' => "bg", 'value' => array('video')),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "WEBM Video URL",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
	"dependency" => array( 'element' => "bg", 'value' => array('video')),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "M4V Video URL",
	"value" => "",
	"param_name" => "video_m4v",
	"description" => "",
	"dependency" => array( 'element' => "bg", 'value' => array('video')),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "OGG Video URL",
	"value" => "",
	"param_name" => "video_ogg",
	"description" => "",
	"dependency" => array( 'element' => "bg", 'value' => array('video')),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Title",
	"value" => "",
	"param_name" => "title",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Subtitle",
	"value" => "",
	"param_name" => "sub_title",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Title Icon",
	"value" => "",
	"param_name" => "title_icon",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Color",
	"param_name" => "title_color",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Subtitle Color",
	"param_name" => "sub_title_color",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Icon Color",
	"param_name" => "title_icon_color",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Content Color",
	"param_name" => "content_color",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border Top Color",
	"param_name" => "border_top",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border Bottom Color",
	"param_name" => "border_bottom",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Title Icon Size In Pixels",
	"value" => "60",
	"param_name" => "title_icon_size",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "container",
	"heading" => "Pointer Arrows",
	"param_name" => "pointer_color",
	"value" => array(
		"No" => "no",
		"Top" => "top",
		"Bottom" => "bottom",
		"Both" => "both",
	),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Pointer Color",
	"param_name" => "pointer_color",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "container",
	"heading" => "Title Align",
	"param_name" => "title_align",
	"value" => array(
		"Center" => "center",
		"Left" => "left",
		"Right" => "right",	
	),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "container",
	"heading" => "Content Align",
	"param_name" => "content_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right",	
	),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "container",
	"heading" => "Title Divider",
	"param_name" => "title_divider",
	"value" => array(
		"No Divider" => "no",
		"Underline" => "underline",
	),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Divider Color",
	"param_name" => "title_divider_color",
	"value" => "",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Title Margin In Pixels",
	"value" => "",
	"param_name" => "title_margin",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Unique Word In Title",
	"value" => "",
	"param_name" => "unique_word",
	"description" => "Write a word in the title to appear in different color, this word should be found in the title",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Unique Word Color",
	"param_name" => "unique_color",
	"value" => "#26BDEF",
	"description" => "",
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "ID",
	"value" => "",
	"param_name" => "id",
	"description" => __("Give this section a unique ID, you can use it as a target to one page menu and should be unique", "asalah"),
	"group" => "Main Section"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Class",
	"value" => "",
	"param_name" => "class",
	"description" => __("Add custom class to this section", "asalah"),
	"group" => "Main Section"
));
// end add param

// service shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Service", 'asalah'),
	"base" => "service",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Type",
			"param_name" => "type",
			"value" => array(
				"Icon" => "icon",
				"Image" => "image",
				"Text" => "text",	
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'asalah'),
			"param_name" => "title",
			"value" => __("Service", 'asalah')
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Icon Style",
			"param_name" => "icon_style",
			"value" => array(
				"Default" => "default",
				"Circle" => "circle"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Icon Position",
			"param_name" => "icon_position",
			"value" => array(
				"Left" => "top",
				"Center" => "left",
				"Right" => "right",	
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Text Align",
			"param_name" => "align",
			"value" => array(
				"Center" => "center",
				"Left" => "left",
				"Right" => "right",	
			),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Icon Color",
			"param_name" => "icon_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Icon Background Color",
			"param_name" => "icon_bg_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Icon Size", 'asalah'),
			"param_name" => "icon_size",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Icon Width", 'asalah'),
			"param_name" => "icon_width",
			"value" => ""
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content", 'asalah'),
			"param_name" => "content"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Value", 'asalah'),
			"param_name" => "value",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Link", 'asalah'),
			"param_name" => "link"
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Link Target",
			"param_name" => "target",
			"value" => array(
				"_self" => "_self",
				"_blank" => "_blank"
			),
			"description" => __('Link opens in same window or new tab','asalah'),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Icon", 'asalah'),
			"param_name" => "icon"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image", 'asalah'),
			"param_name" => "image_url"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image Width", 'asalah'),
			"param_name" => "image_width",
			"value" => "60"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Margin Top", 'asalah'),
			"param_name" => "margin_top",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Margin Bottom", 'asalah'),
			"param_name" => "margin_bottom",
			"value" => ""
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Value Color",
			"param_name" => "value_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Frame",
			"param_name" => "frame",
			"value" => array(
				"No" => "no",
				"Light" => "light",
				"Dark" => "dark"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Box",
			"param_name" => "box",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Box Color",
			"param_name" => "box_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Size",
			"param_name" => "size",
			"value" => array(
				"Small" => "small",
				"Medium" => "Medium",
				"big" => ""
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Skin",
			"param_name" => "skin",
			"value" => array(
				"Dark" => "dark",
				"Light" => "light",
				"Theme Color" => "theme_color"
			),
		),



	)
));

// Alert shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Alert", 'asalah'),
	"base" => "alert",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content", 'asalah'),
			"param_name" => "content"
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"Light" => "light",
				"Dark" => "dark",
				"Info" => "info",
				"Warning" => "warning",
				"Success" => "success",
				"Danger" => "danger",
				"Skin" => "skin",	
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Close Button",
			"param_name" => "close",
			"value" => array(
				"Yes" => "yes",
				"No" => "no"
			),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "bg_color",
			"value" => "",
			"description" => "",
		),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Border Color",
			"param_name" => "border_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Content Color",
			"param_name" => "content_color",
			"value" => "",
			"description" => "",
		),
	)
));

// Testimonials shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Testimonial", 'asalah'),
	"base" => "testimonial",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content", 'asalah'),
			"param_name" => "content",
			"value" => __("Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor", 'asalah'),
			"description" => __("What the client said", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Cite", 'asalah'),
			"param_name" => "cite"
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Color",
			"param_name" => "color",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Border Color",
			"param_name" => "border_color",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Cite Color",
			"param_name" => "cite_color",
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Text Align",
			"param_name" => "align",
			"value" => array(
				"Center" => "center",
				"Left" => "left",
				"Right" => "right",	
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Size", 'asalah'),
			"param_name" => "size"
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Text Align",
			"param_name" => "align",
			"value" => array(
				"100" => "100",
				"200" => "200",
				"300" => "300",
				"400" => "400",
				"500" => "500",
				"600" => "600",
				"700" => "700",
				"800" => "800"
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Line Height", 'asalah'),
			"param_name" => "line_height"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Margin Top", 'asalah'),
			"param_name" => "margin_top",
			"value" => "",
			"description" => ""
		),

		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Margin Bottom", 'asalah'),
			"param_name" => "margin_bottom",
			"value" => "",
			"description" => ""
		),

	)
));

// Testimonials shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Testimonial", 'asalah'),
	"base" => "testimonial",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content", 'asalah'),
			"param_name" => "content",
			"value" => __("Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor", 'asalah'),
			"description" => __("What the client said", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Author", 'asalah'),
			"param_name" => "author",
			"value" => __("John Doe", 'asalah'),
			"description" => __("Who Said This?", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image", 'asalah'),
			"param_name" => "image",
			"description" => __("Client Image Or Logo", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Client URL", 'asalah'),
			"param_name" => "url",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Position", 'asalah'),
			"param_name" => "position",
			"value" => __("CEO", 'asalah'),
			"description" => __("Client Position", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Size", 'asalah'),
			"param_name" => "size",
			"description" => __("Testimonial Font Size", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Line Height", 'asalah'),
			"param_name" => "line_height",
			"description" => __("Testimonial Line Height", 'asalah')
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "bg_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Name Color",
			"param_name" => "name_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Position Color",
			"param_name" => "position_color",
			"value" => "",
		),

	)
));

// clients and client shortcodes
vc_map( array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
    "name" => __("Clients", "js_composer"),
    "base" => "clients",
    "as_parent" => array('only' => 'client'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Content Align",
			"param_name" => "align",
			"value" => array(
				"Left" => "left",
				"Center" => "center",
				"Right" => "right",	
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Margin Top", 'asalah'),
			"param_name" => "margin_top",
			"value" => "",
			"description" => ""
		),

		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Margin Bottom", 'asalah'),
			"param_name" => "margin_bottom",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Tooltip",
			"param_name" => "tooltip",
			"value" => array(
				"Yes" => "yes",
				"No" => "no",
			),
		),
	),
    "js_view" => 'VcColumnView'
));

vc_map( array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
    "name" => __("Client", "js_composer"),
    "base" => "client",
    "content_element" => true,
    // "as_child" => array('only' => 'clients'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image", 'asalah'),
			"param_name" => "image",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Name", 'asalah'),
			"param_name" => "name",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Client URL", 'asalah'),
			"param_name" => "url",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Logo Max Height", 'asalah'),
			"param_name" => "max_height",
		),
    )
));

// projects shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Projects", 'asalah'),
	"base" => "projects",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"Default" => "default",
				"Full" => "full",
				"Classic" => "classic",
				"Grid" => "grid",
				"Text" => "text"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Order",
			"param_name" => "order",
			"value" => array(
				"Date" => "date",
				"Title" => "title",
				"Last Modified" => "modified",
				"Random" => "rand",
				"Comment Count" => "comment_count"
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Number", 'asalah'),
			"param_name" => "number",
			"value" => "6",
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Columns",
			"param_name" => "columns",
			"description" => __("Number of columns per row", 'asalah'),
			"value" => asalah_range_array(1,6),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button", 'asalah'),
			"param_name" => "button",
			"value" => __("View All", 'asalah'),
			"description" => __("The text of button which links to full portfolio", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("URL", 'asalah'),
			"param_name" => "url",
			"description" => __("Link to full portfolio", 'asalah')
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Style",
			"param_name" => "button_style",
			"value" => array(
				"Default" => "default",
				"Full" => "full"
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Except", 'asalah'),
			"param_name" => "except",
			"description" => __("IDs of excepted projects, seperate them by comma", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Tags", 'asalah'),
			"param_name" => "tags",
			"description" => __("Show projects only from these tags, seperate them by comma", 'asalah')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
			"heading" => "Show projects one by one",
			"param_name" => "one_by_one",
			"description" => __("This option will add animation to make projects appear one after one", 'asalah')
		),
	)
));


// Blog posts shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Blog Posts", 'asalah'),
	"base" => "blog_posts",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"Grid" => "grid",
				"List" => "list",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Order",
			"param_name" => "order",
			"value" => array(
				"Date" => "date",
				"Title" => "title",
				"Modified" => "last Modified",
				"Rand" => "random",
				"Comment_count" => "comment Count"
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Number", 'asalah'),
			"param_name" => "number",
			"value" => "6",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Words", 'asalah'),
			"param_name" => "words",
			"value" => "15",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button", 'asalah'),
			"param_name" => "button",
			"value" => __("View All", 'asalah'),
			"description" => __("The text of button which links to full blog page", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("URL", 'asalah'),
			"param_name" => "url",
			"description" => __("Link to full full blog page", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Except", 'asalah'),
			"param_name" => "except",
			"description" => __("IDs of excepted blog posts, seperate them by comma", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image Width", 'asalah'),
			"param_name" => "image_width",
			"description" => __("In list style", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Tags", 'asalah'),
			"param_name" => "tags",
			"description" => __("Show blog posts only from these tags, seperate them by comma", 'asalah')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
			"heading" => "Show projects one by one",
			"param_name" => "one_by_one",
			"description" => __("This option will add animation to make blog posts appear one after one", 'asalah')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Show Post Date",
			"param_name" => "show_date",
			"value" => array(
				"Yes" => "yes",
				"No" => "no",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Show Post Time",
			"param_name" => "show_time",
			"value" => array(
				"No" => "no",
				"Yes" => "yes",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Show Post Comments",
			"param_name" => "show_comments",
			"value" => array(
				"Yes" => "yes",
				"No" => "no",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Show Post Author",
			"param_name" => "show_author",
			"value" => array(
				"Yes" => "yes",
				"No" => "no",
			),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "bg_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Meta Color",
			"param_name" => "meta_color",
			"value" => "",
			"description" => "",
		)
	)
));

// Map shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Map", "js_composer"),
	"base" => "map",
	"as_parent" => array('only' => 'location'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Width", 'asalah'),
			"param_name" => "width"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Height", 'asalah'),
			"param_name" => "height"
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Style",
			"param_name" => "style",
			"value" => asalah_range_array(1,20),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Zoom",
			"param_name" => "zoom",
			"value" => asalah_range_array(0,19),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Marker Image", 'asalah'),
			"param_name" => "marker"
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Frame",
			"param_name" => "frame",
			"value" => array(
				"No" => "no",
				"Light" => "light",
				"Dark" => "dark"
			),
		),
	),
	"js_view" => 'VcColumnView'
));

vc_map( array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
    "name" => __("Location", "js_composer"),
    "base" => "location",
    "content_element" => true,
    "as_child" => array('only' => 'map'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Name", 'asalah'),
			"param_name" => "name",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Longitude", 'asalah'),
			"param_name" => "long",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Latitude", 'asalah'),
			"param_name" => "lat",
		),
    )
));

// Member shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Member", 'asalah'),
	"base" => "member",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Name", 'asalah'),
			"param_name" => "name",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Position", 'asalah'),
			"param_name" => "position",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Text", 'asalah'),
			"param_name" => "text",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image", 'asalah'),
			"param_name" => "image",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Skill 1", 'asalah'),
			"param_name" => "skill1",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Percent 1", 'asalah'),
			"param_name" => "percent1",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Skill 2", 'asalah'),
			"param_name" => "skill2",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Percent 2", 'asalah'),
			"param_name" => "percent2",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Skill 3", 'asalah'),
			"param_name" => "skill3",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Percent 3", 'asalah'),
			"param_name" => "percent3",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Skill 4", 'asalah'),
			"param_name" => "skill4",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Percent 4", 'asalah'),
			"param_name" => "percent4",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Skill 5", 'asalah'),
			"param_name" => "skill5",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Percent 5", 'asalah'),
			"param_name" => "percent5",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Skill 6", 'asalah'),
			"param_name" => "skill6",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Percent 6", 'asalah', 'asalah'),
			"param_name" => "percent6",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Skill Animate",
			"param_name" => "skills_animate",
			"value" => array(
				"No" => "no",
				"Yes" => "yes",
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("URL", 'asalah'),
			"param_name" => "url",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Website", 'asalah'),
			"param_name" => "website",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Facebook", 'asalah'),
			"param_name" => "fb",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Twitter", 'asalah'),
			"param_name" => "twitter",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Linkedin", 'asalah'),
			"param_name" => "linkedin",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Pinterest", 'asalah'),
			"param_name" => "pinterest",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Skype", 'asalah'),
			"param_name" => "skype",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Instagram", 'asalah'),
			"param_name" => "instagram",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Google", 'asalah'),
			"param_name" => "google",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Youtube", 'asalah'),
			"param_name" => "youtube",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Dribbble", 'asalah'),
			"param_name" => "dribbble",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Behance", 'asalah'),
			"param_name" => "behance",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Frame",
			"param_name" => "frame",
			"value" => array(
				"No" => "no",
				"Light" => "light",
				"Dark" => "dark"
			),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Skills Background",
			"param_name" => "skills_bg",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Skills Bar Color",
			"param_name" => "skills_bar_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Skills Border Color",
			"param_name" => "skills_border_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "bg_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Position Color",
			"param_name" => "position_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Social Background Color",
			"param_name" => "social_bg",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Social Color",
			"param_name" => "social_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Social Border Color",
			"param_name" => "social_border_color",
			"value" => "",
			"description" => "",
		),

	)
));

// Counter shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Counter", 'asalah'),
	"base" => "counter",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'asalah'),
			"param_name" => "title",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Count", 'asalah'),
			"param_name" => "count",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Time", 'asalah'),
			"param_name" => "time",
			"description" => __('The time should the counter take to count to the end, time should be in melisecond which means that 1000 equals 1 second','asalah'),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("URL", 'asalah'),
			"param_name" => "url",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Icon", 'asalah'),
			"param_name" => "icon",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "bg_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Icon Color",
			"param_name" => "icon_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Count Color",
			"param_name" => "count_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Border Color",
			"param_name" => "border_color",
			"value" => "",
		),
	)
));

// progress_bar shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Progress Bar", 'asalah'),
	"base" => "progress_bar",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"Basic" => "basic",
				"Striped" => "striped",
				"Animated" => "animated"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Animate",
			"param_name" => "animate",
			"value" => array(
				"Yes" => "yes",
				"No" => "no",
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'asalah'),
			"param_name" => "title",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Value", 'asalah'),
			"param_name" => "value",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Minimum Value", 'asalah'),
			"param_name" => "min",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Maximum Value", 'asalah'),
			"param_name" => "max",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Margin Bottom", 'asalah'),
			"param_name" => "margin_bottom",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Height", 'asalah'),
			"param_name" => "height",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Bar Color",
			"param_name" => "bar_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "bg_color",
			"value" => "",
		),
	)
));

// clients and client shortcodes
vc_map( array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
    "name" => __("Pricing", "js_composer"),
    "base" => "pricing",
    "as_parent" => array('only' => 'plan'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Style",
			"param_name" => "style",
			"value" => asalah_range_array(1,3),
		),
	),
    "js_view" => 'VcColumnView'
));

vc_map( array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
    "name" => __("Plan", "js_composer"),
    "base" => "plan",
    "content_element" => true,
    "as_parent" => array('only' => 'feature'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "as_child" => array('only' => 'pricing'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Columns Per Row",
			"param_name" => "columns",
			"value" => array(
				"One" => "one",
				"Two" => "tow",
				"Three" => "three",
				"Four" => "four",
				"Five" => "five",
				"Six" => "six",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Features?",
			"param_name" => "featured",
			"value" => array(
				"No" => "no",
				"Yes" => "yes",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Shadow?",
			"param_name" => "shadow",
			"value" => array(
				"No" => "no",
				"Yes" => "yes",
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'asalah'),
			"param_name" => "title",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Price", 'asalah'),
			"param_name" => "price",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Term", 'asalah'),
			"param_name" => "term",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Link", 'asalah'),
			"param_name" => "link",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button", 'asalah'),
			"param_name" => "button",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button Icon", 'asalah'),
			"param_name" => "button_icon",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button Radius", 'asalah'),
			"param_name" => "button_radius",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Size",
			"param_name" => "button_size",
			"value" => array(
				"Small" => "small",
				"Medium" => "medium",
				"Large" => "large"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Style",
			"param_name" => "button_style",
			"value" => array(
				"Gradient" => "gradient",
				"Default" => "default",
				"Soft" => "soft",
				"Flat" => "flat"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Skin",
			"param_name" => "button_skin",
			"value" => array(
				"Theme Color" => "theme_color",
				"Light" => "light",
				"Dark" => "dark",
			),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Border Color",
			"param_name" => "border_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Price Border Color",
			"param_name" => "price_border_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Price Background Color",
			"param_name" => "price_bg",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Price Color",
			"param_name" => "price_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Term Color",
			"param_name" => "term_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Background Color",
			"param_name" => "title_bg",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Background Color",
			"param_name" => "button_bg",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Link Target",
			"param_name" => "target",
			"value" => array(
				"_self" => "_self",
				"_blank" => "_blank"
			),
			"description" => __('Link opens in same window or new tab','asalah'),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Color",
			"param_name" => "button_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Text Color",
			"param_name" => "button_text_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Border Color",
			"param_name" => "button_border_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Icon Color",
			"param_name" => "button_icon_color",
			"value" => "",
			"description" => "",
		),
    )
));

vc_map( array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
    "name" => __("Feature", "js_composer"),
    "base" => "feature",
    "content_element" => true,
    "as_child" => array('only' => 'plan'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Text", 'asalah'),
			"param_name" => "content",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "bg_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Border Color",
			"param_name" => "border_color",
			"value" => "",
			"description" => "",
		),
    )
));

// Action shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Action Bar", 'asalah'),
	"base" => "action",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'asalah'),
			"param_name" => "title",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button", 'asalah'),
			"param_name" => "button",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("URL", 'asalah'),
			"param_name" => "url",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image", 'asalah'),
			"param_name" => "image",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image Width", 'asalah'),
			"param_name" => "image_width",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image Bottom Margin", 'asalah'),
			"param_name" => "image_bottom",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title Size In Pixels", 'asalah'),
			"param_name" => "title_size",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Content Align",
			"param_name" => "align",
			"value" => array(
				"Center" => "center",
				"Left" => "left",
				"Right" => "right",	
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Image Align",
			"param_name" => "image_align",
			"value" => array(
				"Left" => "left",
				"Right" => "right",	
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Position",
			"param_name" => "button_position",
			"value" => array(
				"Default" => "default",
				"Top" => "top",
				"Bottom" => "bottom"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "hilight",
			"param_name" => "hilight",
			"value" => array(
				"None" => "none",
				"Top" => "top",
				"Bottom" => "bottom",
				"Left" => "left",
				"Right" => "right",	
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content Margin Left", 'asalah'),
			"param_name" => "content_margin_left",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content Margin Right", 'asalah'),
			"param_name" => "content_margin_right",
			"value" => ""
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Color",
			"param_name" => "color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"value" => "",
			"description" => "",
		),

		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Style",
			"param_name" => "button_style",
			"value" => array(
				"Gradient" => "gradient",
				"Default" => "default",
				"Soft" => "soft",
				"Flat" => "flat"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Skin",
			"param_name" => "button_skin",
			"value" => array(
				"Theme Color" => "theme_color",
				"Light" => "light",
				"Dark" => "dark",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Button Size",
			"param_name" => "button_size",
			"value" => array(
				"Small" => "small",
				"Medium" => "medium",
				"Large" => "large"
			),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button Radius", 'asalah'),
			"param_name" => "button_radius",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button Icon", 'asalah'),
			"param_name" => "button_icon",
			"value" => ""
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Color",
			"param_name" => "button_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Text Color",
			"param_name" => "button_text_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Button Icon Color",
			"param_name" => "button_icon_color",
			"value" => "",
			"description" => "",
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Link Target",
			"param_name" => "target",
			"value" => array(
				"_self" => "_self",
				"_blank" => "_blank"
			),
			"description" => __('Link opens in same window or new tab','asalah'),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button Margin Top", 'asalah'),
			"param_name" => "button_margin_top",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Shadow",
			"param_name" => "shadow",
			"value" => asalah_range_array(0,8),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				"Light" => "light",
				"Dark" => "dark",
				"Skin" => "skin",
				"Gray" => "gray",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Frame",
			"param_name" => "frame",
			"value" => array(
				"No" => "no",
				"Normal" => "normal",
				"Flat" => "flat"
			),
		),
		array(
			"type" => "dropdown",
			"class" => "container",
			"heading" => "Frame Style",
			"param_name" => "frame_style",
			"value" => array(
				"Solid" => "solid",
				"Dashed" => "dashed",
				"Dotted" => "dotted"
			),
		),

	)
));

// Testimonials shortcode
vc_map(array(
	"icon" => get_template_directory_uri().'/images/sanabel.jpg',
	"name" => __("Pinned Image", 'asalah'),
	"base" => "pin",
	"class" => "",
	"category" => __('Content', 'asalah'),
	"params" => array(
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content", 'asalah'),
			"param_name" => "content",
			"value" => __("Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor", 'asalah'),
			"description" => __("This is the main content, image will be sticky beside it", 'asalah')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image URL", 'asalah'),
			"param_name" => "image",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Image Width", 'asalah'),
			"param_name" => "image_width",
			"value" => "50",
			"description" => __( 'Define image width relative to the main container, if you want the image to become 20% of the container just write 20', 'asalah' )
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Image Float",
			"param_name" => "image_float",
			"value" => array(
				"Left" => "left",
				"Right" => "right",	
			),
			"description" => __( 'Image float relative to the content', 'asalah' )
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Image Align",
			"param_name" => "image_align",
			"value" => array(
				"Center" => "center",
				"Left" => "left",
				"Right" => "right",	
			),
			"description" => __( 'This is not relative to the content, it is relative to the image container itself, if the image size is small to should be centered or aligned to any side', 'asalah' )
		),


	)
));

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality

// clientns and client
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Clients extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Client extends WPBakeryShortCode {
    }
}

// map and location
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Map extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Location extends WPBakeryShortCode {
    }
}

// pricing, plan and feature
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Pricing extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Plan extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Feature extends WPBakeryShortCode {
    }
}




}
?>