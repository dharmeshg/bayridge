<?php
/**
 * Class for managing plugin data
 */
class Su_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return apply_filters( 'su/data/groups', array(
				
				'all'     => __( 'All', 'asalah' ),
				'Sanabel'   => __( 'Sanabel', 'asalah' ),
				'columns'   => __( 'Columns', 'asalah' ),
				'child_columns' => __('Child Columns'),
				''
			) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		$shortcodes_array = array(
			// section
			'section' => array(
				'name' => __( 'Section', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'width' => array(
						'type' => 'select',
						'values' => array(
							'left' => __( 'Fixed', 'asalah' ),
							'right' => __( 'Full', 'asalah' ),
						),
						'default' => 'fixed',
						'name' => __( 'Width', 'asalah' )
					),
					'bg' => array(
						'type' => 'select',
						'values' => array(
							'color' => __( 'Color', 'asalah' ),
							'image' => __( 'Image', 'asalah' ),
							'video' => __( 'Video', 'asalah' ),
							'half_image_left' => __( 'Half Image Left', 'asalah' ),
							'half_image_right' => __( 'Half Image Right', 'asalah' ),
						),
						'default' => 'color',
						'name' => __( 'Background', 'asalah' )
					),
					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
					'bg_image' => array(
						'default' => '',
						'name' => __( 'Background Image', 'asalah' ),
						'desc' => __( 'Image background in case of background is set to show image', 'asalah' )
					),
					'mobile_bg' => array(
						'type' => 'select',
						'values' => array(
							'yes' => __( 'Yes', 'asalah' ),
							'no' => __( 'No', 'asalah' ),
						),
						'default' => '',
						'name' => __( 'Image Background Fof Mobile?', 'asalah' )
					),
					'bg_overlay' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Overlay Background Color', 'asalah' ),
					),
					'image_style' => array(
						'type' => 'select',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'cover' => __( 'Cover', 'asalah' ),
							'pattern' => __( 'Pattern', 'asalah' ),
							'responsive' => __( 'Responsive', 'asalah' ),
							'fixed' => __( 'Fixed', 'asalah' ),
						),
						'default' => 'cover',
						'name' => __( 'Background Image Style', 'asalah' )
					),
					'parallax' => array(
						'type' => 'select',
						'name' => __( 'Parallax', 'asalah' ),
						'default' => 'cover',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' ),
							'fixed' => __( 'Fixed', 'asalah' ),
							'animated' => __( 'Animated', 'asalah' )
						),
					),
					'parallax_speed' => array(
						'type' => 'select',
						'name' => __( 'Parallax Speed', 'asalah' ),
						'default' => '0.8',
						'values' => asalah_range_array(0,2,0.1),
					),
					'parallax_offset' => array(
						'default' => '',
						'name' => __( 'Parallax Offset', 'asalah' ),
						'desc' => __( 'Image margin top when the top of div section hits the to of the screen', 'asalah' )
					),
					'video_mp4' => array(
						'default' => '',
						'name' => __( 'Mp4 Video Link', 'asalah' ),
						'desc' => __( 'Video in case of background is set to show video', 'asalah' )
					),
					'video_webm' => array(
						'default' => '',
						'name' => __( 'WEBM Video Link', 'asalah' ),
						'desc' => __( 'Video in case of background is set to show video', 'asalah' )
					),
					'video_m4v' => array(
						'default' => '',
						'name' => __( 'M4V Video Link', 'asalah' ),
						'desc' => __( 'Video in case of background is set to show video', 'asalah' )
					),
					'video_ogg' => array(
						'default' => '',
						'name' => __( 'OGG Video Link', 'asalah' ),
						'desc' => __( 'Video in case of background is set to show video', 'asalah' )
					),
					'padding_top' => array(
						'default' => '',
						'name' => __( 'Padding Top', 'asalah' )
					),
					'padding_bottom' => array(
						'default' => '',
						'name' => __( 'Padding Bottom', 'asalah' )
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' )
					),
					'subtitle' => array(
						'default' => '',
						'name' => __( 'Subtitle', 'asalah' )
					),
					'title_icon' => array(
						'default' => '',
						'name' => __( 'Title Icon', 'asalah' )
					),
					'title_icon_size' => array(
						'default' => '',
						'name' => __( 'Title Icon Size', 'asalah' )
					),
					'title_align' => array(
						'type' => 'select',
						'name' => __( 'Title Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' ),
						),
					),
					'title_margin' => array(
						'default' => '',
						'name' => __( 'Title Margin', 'asalah' )
					),
					'content_align' => array(
						'type' => 'select',
						'name' => __( 'Content Align', 'asalah' ),
						'default' => '',
						'values' => array(
							'left' => __( 'Left', 'asalah' ),
							'center' => __( 'Center', 'asalah' ),
							'right' => __( 'Right', 'asalah' ),
						),
					),
					'title_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Color', 'asalah' ),
					),
					'title_icon_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Icon Color', 'asalah' ),
					),
					'subtitle_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Subtitle Color', 'asalah' ),
					),
					'content_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Content Color', 'asalah' ),
					),
					'title_divider' => array(
						'type' => 'select',
						'name' => __( 'Title Separator', 'asalah' ),
						'default' => '',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'underline' => __( 'Underline', 'asalah' ),
						),
					),
					'title_divider_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Separator Color', 'asalah' ),
					),
					'border_top' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Border Top Color', 'asalah' ),
					),
					'border_bottom' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Border Bottom Color', 'asalah' ),
					),
					'unique_word' => array(
						'default' => '',
						'name' => __( 'Unique Word In Title', 'asalah' ),
						'desc' => __('Write a unique word to appear in different color in title, this word should be written in the title','asalah'),
					),
					'unique_word' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Unique Word color', 'asalah' ),
					),
					'pointer' => array(
						'type' => 'select',
						'name' => __( 'Title Separator', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'top' => __( 'Top', 'asalah' ),
							'bottom' => __( 'Bottom', 'asalah' ),
							'both' => __( 'Both', 'asalah' ),
						),
					),
					'pointer_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Pointer color', 'asalah' ),
					),
					'id' => array(
						'default' => '',
						'name' => __( 'ID', 'asalah' ),
						'desc' => __('Give this section a unique ID, you can use it as a target to one page menu and should be unique','asalah'),
					),
					'class' => array(
						'default' => '',
						'name' => __( 'Class', 'asalah' ),
						'desc' => __('Add custom class to this section','asalah'),
					),

				),
				'content' => __( "\n[row]\n[one_third]Content[/one_third]\n[one_third]Content[/one_third]\n[one_third]Content[/one_third]\n[/row]\n", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// row
			'row' => array(
				'name' => __( 'Row', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
				),
				'content' => __( "\n[one_third]Content[/one_third]\n[one_third]Content[/one_third]\n[one_third]Content[/one_third]\n", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// row
			'_row' => array(
				'name' => __( '2nd Level Row', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
				),
				'content' => __( "\n[_one_half]Content[/_one_half]\n[_one_half]Content[/_one_half]\n", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// row
			'__row' => array(
				'name' => __( 'Third Row', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
				),
				'content' => __( "\n[__one_half]Content[/__one_half]\n[__one_half]Content[/__one_half]\n", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// service
			'service' => array(
				'name' => __( 'Service', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'type' => array(
						'type' => 'select',
						'name' => __( 'Type', 'asalah' ),
						'default' => 'icon',
						'values' => array(
							'icon' => __( 'Icon', 'asalah' ),
							'image' => __( 'Image', 'asalah' ),
							'text' => __( 'Text', 'asalah' )
						),
					),
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						'desc' => ""
					),
					'icon_style' => array(
						'type' => 'select',
						'name' => __( 'Icon Style', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'circle' => __( 'Circle', 'asalah' )
						),
					),
					'icon_position' => array(
						'type' => 'select',
						'name' => __( 'Icon Position', 'asalah' ),
						'default' => 'top',
						'values' => array(
							'top' => __( 'Top', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'icon_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icon Color', 'asalah' ),
					),
					'icon_bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icon Background Color', 'asalah' ),
					),
					'icon_size' => array(
						'default' => '',
						'name' => __( 'Icon Size', 'asalah' ),
						'desc' => __( 'Define size in Pixels', 'asalah' )
					),
					'icon_width' => array(
						'default' => '',
						'name' => __( 'Icon Width', 'asalah' ),
						'desc' => __( 'This is the width of div wrapping the icon, in case of circle icon style this will be the width of circle', 'asalah' )
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'value' => array(
						'default' => '',
						'name' => __( 'Value', 'asalah' ),
						'desc' => __( 'Small text below the block, you can use it to write a value of the service or as a read more link', 'asalah' )
					),
					'link' => array(
						'default' => '',
						'name' => __( 'Link', 'asalah' ),
						'desc' => ""
					),
					'target' => array(
						'type' => 'select',
						'name' => __( 'Target', 'asalah' ),
						'default' => '',
						'values' => array(
							'_self' => __( '_selft', 'asalah' ),
							'_blank' => __( '_blank', 'asalah' )
						),
						'desc' => __( 'Select if the link opens in the same tab or new tab, select _self for the same tab and _blank for new tab', 'asalah' )
					),
					'icon' => array(
						'default' => '',
						'name' => __( 'Icon', 'asalah' ),
						'desc' => __( 'Read documentation to know more about icon names', 'asalah' )
					),
					'image_url' => array(
						'default' => '',
						'name' => __( 'Image URL', 'asalah' ),
						'desc' => __( 'Service image url in case you set service type to image not icon', 'asalah' )
					),
					'image_width' => array(
						'default' => '',
						'name' => __( 'Image Width', 'asalah' ),
						'desc' => __( 'Define width in Pixels', 'asalah' )
					),
					'image_height' => array(
						'default' => '',
						'name' => __( 'Image Heigh', 'asalah' ),
						'desc' => __( 'Define height in Pixels', 'asalah' )
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
					'title_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Color', 'asalah' ),
					),
					'text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Text Color', 'asalah' ),
					),
					'value_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Value Color', 'asalah' ),
					),
					'frame' => array(
						'type' => 'select',
						'name' => __( 'Frame', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
						),
						'desc' => ""
					),
					'box' => array(
						'type' => 'select',
						'name' => __( 'Box', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => ""
					),
					'box_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Value Color', 'asalah' ),
					),
					'size' => array(
						'type' => 'select',
						'name' => __( 'Size', 'asalah' ),
						'default' => 'small',
						'values' => array(
							'small' => __( 'Small', 'asalah' ),
							'medium' => __( 'Medium', 'asalah' ),
							'big' => __( 'Big', 'asalah' ),
						),
						'desc' => ""
					),
					'skin' => array(
						'type' => 'select',
						'name' => __( 'Skin', 'asalah' ),
						'default' => 'light',
						'values' => array(
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
							'theme_color' => __( 'Theme Color', 'asalah' ),
						),
						'desc' => ""
					),
				),
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// button
			'button' => array(
				'name' => __( 'Button', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
						'desc' => "",
					),
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'soft' => __( 'Soft', 'asalah' ),
							'gradient' => __( 'Gradient', 'asalah' ),
							'flat' => __( 'Flat', 'asalah' ),
						),
						'desc' => ""
					),
					'skin' => array(
						'type' => 'select',
						'name' => __( 'Skin', 'asalah' ),
						'default' => 'theme_color',
						'values' => array(
							'theme_color' => __( 'Theme Color', 'asalah' ),
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
						),
						'desc' => ""
					),
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Text Color', 'asalah' ),
					),
					'size' => array(
						'type' => 'select',
						'name' => __( 'Size', 'asalah' ),
						'default' => 'small',
						'values' => array(
							'small' => __( 'Small', 'asalah' ),
							'medium' => __( 'Medium', 'asalah' ),
							'large' => __( 'Large', 'asalah' ),
						),
						'desc' => ""
					),
					'radius' => array(
						'default' => '',
						'name' => __( 'Radius', 'asalah' ),
						'desc' => __("The size of radius in Pixels","aslah"),
					),
					'width' => array(
						'default' => '',
						'name' => __( 'Width', 'asalah' ),
						'desc' => __( 'Widh of the button you should define a unit, for example (400px) or (100%)', 'asalah' )
					),
					'icon' => array(
						'default' => '',
						'name' => __( 'Icon', 'asalah' ),
						'desc' => __( 'Read documentation to know more about icon names', 'asalah' )
					),
					'icon_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icon Color', 'asalah' ),
					),
					'target' => array(
						'type' => 'select',
						'name' => __( 'Target', 'asalah' ),
						'default' => '',
						'values' => array(
							'_self' => __( '_selft', 'asalah' ),
							'_blank' => __( '_blank', 'asalah' )
						),
						'desc' => __( 'Select if the link opens in the same tab or new tab, select _self for the same tab and _blank for new tab', 'asalah' )
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
				),
				'content' => __( "Read More", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// title
			'title' => array(
				'name' => __( 'Title', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'weight' => array(
						'type' => 'select',
						'name' => __( 'Font weight', 'asalah' ),
						'default' => '',
						'values' => asalah_range_array(100, 900, 100),
						'desc' => __( 'Font weight in pixels', 'asalah' )
					),
					'line_height' => array(
						'default' => '',
						'name' => __( 'Line Heigh', 'asalah' ),
						'desc' => __( 'Line height in pixels', 'asalah' )
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'divider' => array(
						'type' => 'select',
						'name' => __( 'Separator', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'no', 'asalah' ),
							'single' => __( 'Single', 'asalah' ),
							'double' => __( 'Double', 'asalah' ),
							'thick' => __( 'Thick', 'asalah' ),
							'part' => __( 'Part', 'asalah' ),
							'part_thick' => __( 'Part Thick', 'asalah' )

						),
					),
					'divider_color' => array(
						'type' => 'Color',
						'default' => '',
						'name' => __( 'Separator', 'asalah' ),
					),
					'divider_width' => array(
						'default' => '',
						'name' => __( 'Divider Width', 'asalah' ),
						'desc' => __( 'Widh of the separator you should define a unit, for example (30px) or (70%)', 'asalah' )
					),
				),
				'content' => __( "New Heading Title", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// alert
			'alert' => array(
				'name' => __( 'Alert', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						'desc' => ""
					),
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'light',
						'values' => array(
							'light' => __( 'Dark', 'asalah' ),
							'info' => __( 'Info', 'asalah' ),
							'warning' => __( 'Warning', 'asalah' ),
							'success' => __( 'Success', 'asalah' ),
							'danger' => __( 'Danger', 'asalah' ),
							'skin' => __( 'Skin', 'asalah' ),
						),
					),
					'close' => array(
						'type' => 'select',
						'name' => __( 'Close Button', 'asalah' ),
						'default' => 'yes',
						'values' => array(
							'yes' => __( 'Yes', 'asalah' ),
							'no' => __( 'No', 'asalah' )
						),
					),
					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
					'border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Border Color', 'asalah' ),
					),
					'content_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Content Color', 'asalah' ),
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					)
				),
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// tooltip
			'tooltip' => array(
				'name' => __( 'Tooltip', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'title' => array(
						'default' => 'This text will popup',
						'name' => __( 'Title', 'asalah' ),
						'desc' => ""
					),
					'position' => array(
						'type' => 'select',
						'name' => __( 'Position', 'asalah' ),
						'default' => 'top',
						'values' => array(
							'top' => __( 'Top', 'asalah' ),
							'bottom' => __( 'Bottom', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'delay' => array(
						'default' => '50',
						'name' => __( 'Delay', 'asalah' ),
						'desc' => __('Time in melliseconds the tooltip should wait before popup after mouse hover', 'asalah')
					),
				),
				'content' => __( "Content", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// color
			'color' => array(
				'name' => __( 'Color', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'weight' => array(
						'type' => 'select',
						'name' => __( 'Font weight', 'asalah' ),
						'default' => '',
						'values' => asalah_range_array(100, 900, 100),
						'desc' => __( 'Font weight in pixels', 'asalah' )
					),
				),
				'content' => __( "Content", 'asalah' ),
				'desc' => 'A text with different color',
				'icon' => 'columns'
			),
			// link
			'link' => array(
				'name' => __( 'Link', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
						'desc' => "",
					),
					'target' => array(
						'type' => 'select',
						'name' => __( 'Target', 'asalah' ),
						'default' => '',
						'values' => array(
							'_self' => __( '_selft', 'asalah' ),
							'_blank' => __( '_blank', 'asalah' )
						),
						'desc' => __( 'Select if the link opens in the same tab or new tab, select _self for the same tab and _blank for new tab', 'asalah' )
					),
				),
				'content' => __( "Link Text Here", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// dropcap
			'dropcap' => array(
				'name' => __( 'Dropcap', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'skin' => __( 'Skin', 'asalah' ),
							'circle' => __( 'Circle', 'asalah' ),
							'square' => __( 'Square', 'asalah' ),
						),
						'desc' => "",
					)
				),
				'content' => __( "Link Text Here", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// icon
			'icon' => array(
				'name' => __( 'Icon', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'name' => array(
						'default' => '',
						'name' => __( 'Icon Name', 'asalah' ),
						'desc' => __('Read documentation to know more about icon names', 'asalah'),
					),
					'theme_color' => array(
						'type' => 'select',
						'name' => __( 'Icon Has Default Theme Color?', 'asalah' ),
						'default' => '',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' ),
						),
						'desc' => __("Ignore this option if you need to set a custom color", ""),
					),
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
				),
				'desc' => '',
				'icon' => 'columns'
			),
			// br
			'br' => array(
				'name' => __( 'New Line ( br )', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(),
				'desc' => '',
				'icon' => 'columns'
			),
			// space
			'space' => array(
				'name' => __( 'Empty Space', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
				),
				'desc' => '',
				'icon' => 'columns'
			),
			// marker
			'marker' => array(
				'name' => __( 'Marker', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'id' => array(
						'default' => '',
						'name' => __( 'ID', 'asalah' ),
						'desc' => __( 'Should be unuiqe and do not repeat it in another place', 'asalah' )
					),
				),
				'desc' => __('Adds an invisible div with unique ID so you can use it as a target to one page menu','asalah'),
				'icon' => 'columns'
			),
			// id
			'id' => array(
				'name' => __( 'ID', 'asalah' ),
				'type' => 'Wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'value' => array(
						'default' => '',
						'name' => __( 'Value', 'asalah' ),
						'desc' => __( 'Should be unuiqe and do not repeat it in another place', 'asalah' )
					),
				),
				'content' => __( "Content", 'asalah' ),
				'desc' => __('Wrap content with unique ID so you can use it as a target to one page menu','asalah'),
				'icon' => 'columns'
			),
			// bold
			'bold' => array(
				'name' => __( 'Bold Text', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'weight' => array(
						'type' => 'select',
						'name' => __( 'Font weight', 'asalah' ),
						'default' => '',
						'values' => asalah_range_array(100, 900, 100),
						'desc' => __( 'Font weight in pixels', 'asalah' )
					),
				),
				'content' => __( "Content", 'asalah' ),
				'desc' => 'A text with different font weight',
				'icon' => 'columns'
			),
			// quote
			'quote' => array(
				'name' => __( 'Quote', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'cite' => array(
						'default' => '',
						'name' => __( 'Cite', 'asalah' ),
						'desc' => "",
					),
					'cite_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Cite Color', 'asalah' ),
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'weight' => array(
						'type' => 'select',
						'name' => __( 'Font weight', 'asalah' ),
						'default' => '',
						'values' => asalah_range_array(100, 900, 100),
						'desc' => __( 'Font weight in pixels', 'asalah' )
					),
					'line_height' => array(
						'default' => '',
						'name' => __( 'Line Heigh', 'asalah' ),
						'desc' => __( 'Line height in pixels', 'asalah' )
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					)
				),
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// text
			'text' => array(
				'name' => __( 'Text', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'weight' => array(
						'type' => 'select',
						'name' => __( 'Font weight', 'asalah' ),
						'default' => '',
						'values' => asalah_range_array(100, 900, 100),
						'desc' => __( 'Font weight in pixels', 'asalah' )
					),
					'line_height' => array(
						'default' => '',
						'name' => __( 'Line Heigh', 'asalah' ),
						'desc' => __( 'Line height in pixels', 'asalah' )
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
					'paragraph' => array(
						'type' => 'select',
						'name' => __( 'Is this a new paragraph ?', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' ),
						),
					),
				),
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// list
			'list' => array(
				'name' => __( 'List', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'weight' => array(
						'type' => 'select',
						'name' => __( 'Font weight', 'asalah' ),
						'default' => '',
						'values' => asalah_range_array(100, 900, 100),
						'desc' => __( 'Font weight in pixels', 'asalah' )
					),
					'line_height' => array(
						'default' => '',
						'name' => __( 'Line Heigh', 'asalah' ),
						'desc' => __( 'Line height in pixels', 'asalah' )
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					)
				),
				'content' => __( "\n\n[list_item]Here is a list item[/list_item]\n[list_item]Here is a list item[/list_item]\n[list_item]Here is a list item[/list_item]\n", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// list_item
			'list_item' => array(
				'name' => __( 'List Item', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'icon' => array(
						'default' => '',
						'name' => __( 'Icon', 'asalah' ),
						'desc' => __( 'Read documentation to know more about icon names', 'asalah' )
					),
					'icon_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icon Color', 'asalah' ),
					),
					'icon_size' => array(
						'default' => '',
						'name' => __( 'Icon Size', 'asalah' ),
						'desc' => __( 'Icon size in pixels', 'asalah' )
					),
				),
				'content' => __( "Here is a list item", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// list_item
			'set' => array(
				'name' => __( 'Set', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'name' => array(
						'default' => '',
						'name' => __( 'Name', 'asalah' ),
						'desc' => __( 'Effect name, you can read more details about the effect names in the documentation', 'asalah' )
					),
				),
				'content' => __( " lets you create a set of items with appear effect, so these group of items will appear on the page one after one with a css3 effect", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// content
			'content' => array(
				'name' => __( 'Content', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'weight' => array(
						'type' => 'select',
						'name' => __( 'Font weight', 'asalah' ),
						'default' => '',
						'values' => asalah_range_array(100, 900, 100),
						'desc' => __( 'Font weight in pixels', 'asalah' )
					),
					'line_height' => array(
						'default' => '',
						'name' => __( 'Line Heigh', 'asalah' ),
						'desc' => __( 'Line height in pixels', 'asalah' )
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					)
				),
				'content' => __( "Here is a list item", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// testimonial
			'testimonial' => array(
				'name' => __( 'Testimonial', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'center' => __( 'Center', 'asalah' )
						),
					),
					'author' => array(
						'default' => '',
						'name' => __( 'Author', 'asalah' ),
						'desc' => "",
					),
					'image' => array(
						'default' => '',
						'name' => __( 'Image', 'asalah' ),
						'desc' => "",
					),
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
						'desc' => "",
					),
					'position' => array(
						'default' => '',
						'name' => __( 'Author Position', 'asalah' ),
						'desc' => "",
					),
					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
					'text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Text Color', 'asalah' ),
					),
					'size' => array(
						'default' => '',
						'name' => __( 'Size', 'asalah' ),
						'desc' => __( 'Font size in pixels', 'asalah' )
					),
					'line_height' => array(
						'default' => '',
						'name' => __( 'Line Heigh', 'asalah' ),
						'desc' => __( 'Line height in pixels', 'asalah' )
					),
					'name_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Name Color', 'asalah' ),
					),
					'position color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Position Color', 'asalah' ),
					),
				),
				'content' => __( "Here is a list item", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// clients
			'clients' => array(
				'name' => __( 'Clients', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'tooltip' => array(
						'type' => 'select',
						'name' => __( 'Tooltip', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					)
				),
				'content' => __( '[client image="http://link.jpg"][client image="http://link.jpg"][client image="http://link.jpg"]', 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),
			// client
			'client' => array(
				'name' => __( 'Client', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'image' => array(
						'default' => '',
						'name' => __( 'Image URL', 'asalah' ),
					),
					'name' => array(
						'default' => '',
						'name' => __( 'Client Name', 'asalah' ),
					),
					'url' => array(
						'default' => '',
						'name' => __( 'Client URL', 'asalah' ),
					),
					'max_height' => array(
						'default' => '',
						'name' => __( 'Max Heigh', 'asalah' ),
						'desc' => __('Max height of client logo image in Pixels','asalah')
					),
				),
				'desc' => '',
				'icon' => 'columns'
			),
			// projects
			'projects' => array(
				'name' => __( 'Projects', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'number' => array(
						'default' => '',
						'name' => __( 'Number Of Projects', 'asalah' ),
					),
					'columns' => array(
						'type' => 'select',
						'name' => __( 'Columns', 'asalah' ),
						'default' => '3',
						'values' => asalah_range_array(1,6)
					),
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'full' => __( 'Full', 'asalah' ),
							'classic' => __( 'Classic', 'asalah' ),
							'grid' => __( 'Grid', 'asalah' ),
							'text' => __( 'Text', 'asalah' )
						),
					),
					'order' => array(
						'type' => 'select',
						'name' => __( 'Order By', 'asalah' ),
						'default' => 'date',
						'values' => array(
							"date" => "Date",
							"title" => "Title",
							"modified" => "Last Modified",
							"rand" => "Random",
							"comment_count" => "Comment Count"
						),
					),
					'button' => array(
						'default' => '',
						'name' => __( 'Button Text', 'asalah' ),
						'desc' => __('Show more button text','asalah')
					),
					'url' => array(
						'default' => '',
						'name' => __( 'Button URL', 'asalah' ),
						'desc' => __('Show more button URL','asalah')
					),
					'button_style' => array(
						'type' => 'select',
						'name' => __( 'Button Style', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'full' => __( 'Full', 'asalah' ),
						),
					),
					'except' => array(
						'default' => '',
						'name' => __( 'Except', 'asalah' ),
						'desc' => __('IDs of excepted projects, seperate them by comma','asalah')
					),
					'tags' => array(
						'default' => '',
						'name' => __( 'Tags', 'asalah' ),
						'desc' => __('Show projects only from these tags, seperate them by comma','asalah')
					),
					'one_by_one' => array(
						'type' => 'select',
						'name' => __( 'Show projects one by one', 'asalah' ),
						'default' => 'no',
						'values' => array(
							"no" => "No",
							"yes" => "yes"
						),
					),
					'gray' => array(
						'type' => 'select',
						'name' => __( 'Gray Photos?', 'asalah' ),
						'default' => 'no',
						'values' => array(
							"no" => "No",
							"yes" => "yes",
							"semi" => "Semi"
						),
						'desc' => __('Show projects images in black and white','asalah')
					),
				),
				'desc' => '',
				'icon' => 'columns'
			),
			// blog_posts
			'blog_posts' => array(
				'name' => __( 'Blog Posts', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'number' => array(
						'default' => '',
						'name' => __( 'Number Of Projects', 'asalah' ),
					),
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'grid' => __( 'Grid', 'asalah' ),
							'list' => __( 'List', 'asalah' )
						),
					),
					'order' => array(
						'type' => 'select',
						'name' => __( 'Order By', 'asalah' ),
						'default' => 'date',
						'values' => array(
							"date" => "Date",
							"title" => "Title",
							"modified" => "Last Modified",
							"rand" => "Random",
							"comment_count" => "Comment Count"
						),
					),
					'button' => array(
						'default' => '',
						'name' => __( 'Button Text', 'asalah' ),
						'desc' => __('Show more button text','asalah')
					),
					'url' => array(
						'default' => '',
						'name' => __( 'Button URL', 'asalah' ),
						'desc' => __('Show more button URL','asalah')
					),
					'words' => array(
						'default' => '',
						'name' => __( 'Number of words in the description', 'asalah' )
					),
					'except' => array(
						'default' => '',
						'name' => __( 'Except', 'asalah' ),
						'desc' => __('IDs of excepted projects, seperate them by comma','asalah')
					),
					'tags' => array(
						'default' => '',
						'name' => __( 'Tags', 'asalah' ),
						'desc' => __('Show projects only from these tags, seperate them by comma','asalah')
					),
					'one_by_one' => array(
						'type' => 'select',
						'name' => __( 'Show projects one by one', 'asalah' ),
						'default' => 'no',
						'values' => array(
							"no" => "No",
							"yes" => "yes"
						),
					),
					'show_date' => array(
						'type' => 'select',
						'name' => __( 'Show Post Date', 'asalah' ),
						'default' => 'yes',
						'values' => array(
							"no" => "No",
							"yes" => "yes"
						),
					),
					'show_time' => array(
						'type' => 'select',
						'name' => __( 'Show Post Time', 'asalah' ),
						'default' => 'no',
						'values' => array(
							"no" => "No",
							"yes" => "yes"
						),
					),
					'show_comments' => array(
						'type' => 'select',
						'name' => __( 'Show Post Comments', 'asalah' ),
						'default' => 'yes',
						'values' => array(
							"no" => "No",
							"yes" => "yes"
						),
					),
					'show_author' => array(
						'type' => 'select',
						'name' => __( 'Show Post Author', 'asalah' ),
						'default' => 'yes',
						'values' => array(
							"no" => "No",
							"yes" => "yes"
						),
					),
					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
					'title_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Color', 'asalah' ),
					),
					'text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Text Color', 'asalah' ),
					),
					'meta_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Meta Color', 'asalah' ),
					),
				),
				'desc' => '',
				'icon' => 'columns'
			),
			// map
			'map' => array(
				'name' => __( 'Map', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'width' => array(
						'default' => '',
						'name' => __( 'Width', 'asalah' ),
						'desc' => __( 'Widh of the map you should define a unit, for example (400px) or (100%)', 'asalah' )
					),
					'height' => array(
						'default' => '',
						'name' => __( 'Heigh', 'asalah' ),
						'desc' => __( 'Heigh of the map you should define a unit, for example (400px) or (100%)', 'asalah' )
					),
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => '1',
						'values' => asalah_range_array(1,20),
					),
					'zoom' => array(
						'type' => 'select',
						'name' => __( 'Zoom', 'asalah' ),
						'default' => '15',
						'values' => asalah_range_array(0,19),
					),
					'marker' => array(
						'default' =>  get_template_directory_uri().'/images/pointer.png',
						'name' => __( 'Marker Image', 'asalah' )
					),
					'frame' => array(
						'type' => 'select',
						'name' => __( 'Frame', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
						),
						'desc' => ""
					),
				),
				'content' => __( '[location lat="0000" long="0000"][location lat="0000" long="0000"][location lat="0000" long="0000"]', 'asalah' ),
				'desc' => __( 'Read documentation to know more about map and locations', 'asalah' ),
				'icon' => 'columns'
			),
			// location
			'location' => array(
				'name' => __( 'Location', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'name' => array(
						'default' => '',
						'name' => __( 'Name', 'asalah' ),
					),
					'lat' => array(
						'default' => '',
						'name' => __( 'Latitude', 'asalah' ),
					),
					'long' => array(
						'default' => '',
						'name' => __( 'Longitude', 'asalah' ),
					),
				),
				'desc' => __( 'Read documentation to know more about map and locations', 'asalah' ),
				'icon' => 'columns'
			),
			// member
			'member' => array(
				'name' => __( 'Member', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'name' => array(
						'default' => '',
						'name' => __( 'Name', 'asalah' ),
						'desc' => "",
					),
					'text' => array(
						'type' => 'textarea',
						'default' => '',
						'name' => __( 'Text', 'asalah' ),
						'desc' => "",
					),
					'position' => array(
						'default' => '',
						'name' => __( 'Member Position', 'asalah' ),
						'desc' => "",
					),
					'image' => array(
						'default' => '',
						'name' => __( 'Image', 'asalah' ),
						'desc' => "",
					),
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
						'desc' => "",
					),
					'website' => array(
						'default' => '',
						'name' => __( 'Website', 'asalah' ),
						'desc' => "",
					),
					'mail' => array(
						'default' => '',
						'name' => __( 'Mail', 'asalah' ),
						'desc' => "",
					),
					'fb' => array(
						'default' => '',
						'name' => __( 'Facebook', 'asalah' ),
						'desc' => "",
					),
					'twitter' => array(
						'default' => '',
						'name' => __( 'Twitter', 'asalah' ),
						'desc' => "",
					),
					'linkedin' => array(
						'default' => '',
						'name' => __( 'Linkedin', 'asalah' ),
						'desc' => "",
					),
					'pinterest' => array(
						'default' => '',
						'name' => __( 'Pinterest', 'asalah' ),
						'desc' => "",
					),
					'skype' => array(
						'default' => '',
						'name' => __( 'Skype', 'asalah' ),
						'desc' => "",
					),
					'instagram' => array(
						'default' => '',
						'name' => __( 'Instagram', 'asalah' ),
						'desc' => "",
					),
					'google' => array(
						'default' => '',
						'name' => __( 'Google', 'asalah' ),
						'desc' => "",
					),
					'youtube' => array(
						'default' => '',
						'name' => __( 'Youtube', 'asalah' ),
						'desc' => "",
					),
					'dribbble' => array(
						'default' => '',
						'name' => __( 'Dribbble', 'asalah' ),
						'desc' => "",
					),
					'behance' => array(
						'default' => '',
						'name' => __( 'Behance', 'asalah' ),
						'desc' => "",
					),

					'skill1' => array(
						'default' => '',
						'name' => __( 'Skill 1', 'asalah' ),
						'desc' => "Write member skill and the percent of this skill",
					),
					'percent1' => array(
						'default' => '',
						'name' => __( 'Percent 1', 'asalah' ),
						'desc' => "Write the percent of member's skill",
					),

					'skill2' => array(
						'default' => '',
						'name' => __( 'Skill 2', 'asalah' ),
						'desc' => "Write member skill and the percent of this skill",
					),
					'percent2' => array(
						'default' => '',
						'name' => __( 'Percent 2', 'asalah' ),
						'desc' => "Write the percent of member's skill",
					),
					'skill3' => array(
						'default' => '',
						'name' => __( 'Skill 3', 'asalah' ),
						'desc' => "Write member skill and the percent of this skill",
					),
					'percent3' => array(
						'default' => '',
						'name' => __( 'Percent 3', 'asalah' ),
						'desc' => "Write the percent of member's skill",
					),

					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
					'title_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Color', 'asalah' ),
					),
					'position_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Position Color', 'asalah' ),
					),
					'text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Text Color', 'asalah' ),
					),
					'social_bg' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Social Background Color', 'asalah' ),
					),
					'social_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Social icons Color', 'asalah' ),
					),
					'social_border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Social Border Color', 'asalah' ),
					),
					'skill_border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Skills Border Color', 'asalah' ),
					),
					'skills_bg' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Skills Background Color', 'asalah' ),
					),
					'skills_bar_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Skills Bar Color', 'asalah' ),
					),

					'skills_animate' => array(
						'type' => 'select',
						'name' => __( 'Skills Bars Animate', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => ""
					),
					'frame' => array(
						'type' => 'select',
						'name' => __( 'Frame', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
						),
						'desc' => ""
					),
				),
				'desc' => __( 'Read documentation to know more about map and locations', 'asalah' ),
				'icon' => 'columns'
			),
			// counter
			'counter' => array(
				'name' => __( 'Counter', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'icon' => array(
						'default' => '',
						'name' => __( 'Icon Name', 'asalah' ),
						'desc' => __( 'Read documentation to know more about icon names', 'asalah' )
					),
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
					),
					'count' => array(
						'default' => '',
						'name' => __( 'Count', 'asalah' ),
					),
					'time' => array(
						'default' => '',
						'name' => __( 'Time', 'asalah' ),
						'desc' => __( 'The time should the counter take to count to the end, time should be in melisecond which means that 1000 equals 1 second', 'asalah' )
					),
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
					),
					'title_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Color', 'asalah' ),
					),
					'icon_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icon Color', 'asalah' ),
					),
					'count_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Count Color', 'asalah' ),
					),
					'border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Border Color', 'asalah' ),
					),
					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
				),
				'desc' => '',
				'icon' => 'columns'
			),
			// img
			'img' => array(
				'name' => __( 'Image', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
					),
					'lightbox' => array(
						'type' => 'select',
						'name' => __( 'Open In Lightbox?', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => ""
					),
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						"desc" => __('A name to descripe the image, this title will not appear on the page, it is only for HTML reference', 'asalah')
					),
					'lightbox_title' => array(
						'default' => '',
						'name' => __( 'Lightbox Title', 'asalah' ),
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
					'frame' => array(
						'type' => 'select',
						'name' => __( 'Frame', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
						),
						'desc' => ""
					),
					'width' => array(
						'default' => '',
						'name' => __( 'Width', 'asalah' ),
						'desc' => __( 'Define width in Pixels', 'asalah' )
					),
					'height' => array(
						'default' => '',
						'name' => __( 'Heigh', 'asalah' ),
						'desc' => __( 'Define height in Pixels, Leave empty for auto scaling', 'asalah' )
					),
					'shadow' => array(
						'type' => 'select',
						'name' => __( 'Shadow', 'asalah' ),
						'default' => 'no',
						'values' => asalah_range_array(1,8),
						'desc' => ""
					),
				),
				'desc' => '',
				'icon' => 'columns'
			),
			// lightbox
			'lightbox' => array(
				'name' => __( 'Lightbox', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
					),
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
					),
					'frame' => array(
						'type' => 'select',
						'name' => __( 'Is this a frame lightbox?', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => __('Set to yes if you want to open video in the lightbox','asalah')
					)
				),
				'desc' => '',
				'content' => __( 'This Content Opens Lightbox', 'asalah' ),
				'icon' => 'columns'
			),
			// pin
			'pin' => array(
				'name' => __( 'Pin', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'image' => array(
						'default' => '',
						'name' => __( 'Image', 'asalah' ),
					),
					'image_width' => array(
						'default' => '50',
						'name' => __( 'Image Width', 'asalah' ),
						'desc' => __( 'Define image width relative to the main container, if you want the image to become 20% of the container just write 20', 'asalah' )
					),
					'image_float' => array(
						'type' => 'select',
						'name' => __( 'Image Align', 'asalah' ),
						'default' => 'left',
						'values' => array(
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
						'desc' => __( 'Image float relative to the content', 'asalah' )
					),
					'image_align' => array(
						'type' => 'select',
						'name' => __( 'Image Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
						'desc' => __( 'This is not relative to the content, it is relative to the image container itself, if the image size is small to should be centered or aligned to any side', 'asalah' )
					),

				),
				'desc' => __('Pinned image beside the content','asalah'),
				'content' => __( 'This content will be the main content, and image link in the pin shortcode will be sticky from the beginning to ending of this content.', 'asalah' ),
				'icon' => 'columns'
			),
			// my_social
			'my_social' => array(
				'name' => __( 'My Social', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
						'desc' => "",
					),
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'icons_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icons Color', 'asalah' ),
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					)

				),
				'desc' => __( 'Outputs all your social profiles from theme options', 'asalah' ),
				'icon' => 'columns'
			),
			// social
			'social' => array(
				'name' => __( 'Social', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'facebook' => array(
						'default' => '',
						'name' => __( 'Facebook', 'asalah' )
					),
					'twitter' => array(
						'default' => '',
						'name' => __( 'Twitter', 'asalah' )
					),
					'googleplus' => array(
						'default' => '',
						'name' => __( 'Google Plus', 'asalah' )
					),
					'behance' => array(
						'default' => '',
						'name' => __( 'Behance', 'asalah' )
					),
					'dribbble' => array(
						'default' => '',
						'name' => __( 'Dribbble', 'asalah' )
					),
					'linkedin' => array(
						'default' => '',
						'name' => __( 'Linkedin', 'asalah' )
					),
					'youtube' => array(
						'default' => '',
						'name' => __( 'Youtube', 'asalah' )
					),
					'vimeo' => array(
						'default' => '',
						'name' => __( 'Vimeo', 'asalah' )
					),
					'vk' => array(
						'default' => '',
						'name' => __( 'VK', 'asalah' )
					),
					'skype' => array(
						'default' => '',
						'name' => __( 'Skype', 'asalah' )
					),
					'instagram' => array(
						'default' => '',
						'name' => __( 'Instagram', 'asalah' )
					),
					'pinterest' => array(
						'default' => '',
						'name' => __( 'Pinterest', 'asalah' )
					),
					'github' => array(
						'default' => '',
						'name' => __( 'Github', 'asalah' )
					),
					'renren' => array(
						'default' => '',
						'name' => __( 'Ren Ren', 'asalah' )
					),
					'flickr' => array(
						'default' => '',
						'name' => __( 'Flickr', 'asalah' )
					),
					'rss' => array(
						'default' => '',
						'name' => __( 'RSS', 'asalah' )
					),

					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
						'desc' => "",
					),
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'icons_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icons Color', 'asalah' ),
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					)

				),
				'desc' => __( 'Outputs custom social profiles links', 'asalah' ),
				'icon' => 'columns'
			),
			// divider
			'divider' => array(
				'name' => __( 'Divider', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'type' => array(
						'type' => 'select',
						'name' => __( 'Type', 'asalah' ),
						'default' => 'single',
						'values' => array(
							'single' => __( 'Single', 'asalah' ),
							'double' => __( 'Double', 'asalah' ),
							'shadow' => __( 'Shadow', 'asalah' )
						),
						'desc' => "",
					),
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'solid',
						'values' => array(
							'solid' => __( 'Solid', 'asalah' ),
							'dashed' => __( 'Dashed', 'asalah' ),
							'dotted' => __( 'Dotted', 'asalah' )
						),
						'desc' => "",
					),
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Align', 'asalah' ),
						'default' => 'center',
						'values' => array(
							'center' => __( 'Center', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
						'desc' => "",
					),
					'height' => array(
						'default' => '',
						'name' => __( 'Height is the thickness Of The Line', 'asalah' )
					),
					'width' => array(
						'default' => '100%',
						'name' => __( 'Width', 'asalah' ),
						'desc' => __( 'Widh of the divider you should define a unit, for example (30px) or (70%)', 'asalah' )
					),
					'margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' )
					),
					'padding' => array(
						'default' => '',
						'name' => __( 'Padding', 'asalah' ),
						'desc' => __( 'If you set divider type to double, this will be the padding between the to lines', 'asalah' )
					)

				),
				'desc' => "",
				'icon' => 'columns'
			),
			// action
			'action' => array(
				'name' => __( 'Action', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						'desc' => "",
					),
					'button' => array(
						'default' => '',
						'name' => __( 'Button Text', 'asalah' ),
						'desc' => "",
					),
					'button_position' => array(
						'type' => 'select',
						'name' => __( 'Button Position', 'asalah' ),
						'default' => 'default',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'top' => __( 'Top', 'asalah' ),
							'bottom' => __( 'Bottom', 'asalah' )
						),
						'desc' => ""
					),
					'url' => array(
						'default' => '',
						'name' => __( 'URL', 'asalah' ),
						'desc' => "",
					),
					'image' => array(
						'default' => '',
						'name' => __( 'Image', 'asalah' ),
						'desc' => "",
					),
					'image_width' => array(
						'default' => '',
						'name' => __( 'Image Width', 'asalah' ),
						'desc' => "",
					),
					'image_align' => array(
						'type' => 'select',
						'name' => __( 'Image Align', 'asalah' ),
						'default' => 'left',
						'values' => array(
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
						'desc' => ""
					),
					'image_bottom' => array(
						'default' => '0',
						'name' => __( 'Image Bottom Offset', 'asalah' ),
						'desc' => "",
					),
					'title_size' => array(
						'default' => '',
						'name' => __( 'Title Size', 'asalah' ),
						'desc' => __( 'Define title in Pixels, leave empty for auto theme size', 'asalah' )
					),
					'color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Color', 'asalah' ),
					),
					'title_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Color', 'asalah' ),
					),
					'text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Text Color', 'asalah' ),
					),
					'align' => array(
						'type' => 'select',
						'name' => __( 'Content Align', 'asalah' ),
						'default' => '',
						'values' => array(
							'left' => __( 'Left', 'asalah' ),
							'center' => __( 'Center', 'asalah' ),
							'right' => __( 'Right', 'asalah' )
						),
						'desc' => "",
					),
					'hilight' => array(
						'type' => 'select',
						'name' => __( 'Hilight', 'asalah' ),
						'default' => 'none',
						'values' => array(
							'none' => __( 'None', 'asalah' ),
							'left' => __( 'Left', 'asalah' ),
							'right' => __( 'Right', 'asalah' ),
							'top' => __( 'Top', 'asalah' ),
							'bottom' => __( 'Bottom', 'asalah' ),
						),
						'desc' => ""
					),
					'content_margin_left' => array(
						'default' => '',
						'name' => __( 'Content Margin Left', 'asalah' ),
						'desc' => "",
					),
					'content_margin_right' => array(
						'default' => '',
						'name' => __( 'Content Margin Right', 'asalah' ),
						'desc' => "",
					),
					'button_style' => array(
						'type' => 'select',
						'name' => __( 'Button Style', 'asalah' ),
						'default' => 'soft',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'soft' => __( 'Soft', 'asalah' ),
							'gradient' => __( 'Gradient', 'asalah' ),
							'flat' => __( 'Flat', 'asalah' ),
						),
						'desc' => ""
					),
					'button_skin' => array(
						'type' => 'select',
						'name' => __( 'Button Skin', 'asalah' ),
						'default' => 'theme_color',
						'values' => array(
							'theme_color' => __( 'Theme Color', 'asalah' ),
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
						),
						'desc' => ""
					),
					'button_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Button Color', 'asalah' ),
					),
					'button_text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Button Text Color', 'asalah' ),
					),
					'button_size' => array(
						'type' => 'select',
						'name' => __( 'Button Size', 'asalah' ),
						'default' => 'small',
						'values' => array(
							'small' => __( 'Small', 'asalah' ),
							'medium' => __( 'Medium', 'asalah' ),
							'large' => __( 'Large', 'asalah' ),
						),
						'desc' => ""
					),
					'button_radius' => array(
						'default' => '',
						'name' => __( 'Radius', 'asalah' ),
						'desc' => __("The size of radius in Pixels","aslah"),
					),
					'button_icon' => array(
						'default' => '',
						'name' => __( 'Icon', 'asalah' ),
						'desc' => __( 'Read documentation to know more about icon names', 'asalah' )
					),
					'button_icon_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icon Color', 'asalah' ),
					),
					'target' => array(
						'type' => 'select',
						'name' => __( 'Target', 'asalah' ),
						'default' => '',
						'values' => array(
							'_self' => __( '_selft', 'asalah' ),
							'_blank' => __( '_blank', 'asalah' )
						),
						'desc' => __( 'Select if the link opens in the same tab or new tab, select _self for the same tab and _blank for new tab', 'asalah' )
					),
					'button_margin_top' => array(
						'default' => '',
						'name' => __( 'Margin Top', 'asalah' )
					),
					'shadow' => array(
						'type' => 'select',
						'name' => __( 'Shadow', 'asalah' ),
						'default' => 'no',
						'values' => asalah_range_array(1,8),
						'desc' => ""
					),
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => 'light',
						'values' => array(
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
							'skin' => __( 'Skin', 'asalah' ),
							'gray' => __( 'Gray', 'asalah' )
						),
						'desc' => "",
					),
					'frame' => array(
						'type' => 'select',
						'name' => __( 'Frame', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'normal' => __( 'Normal', 'asalah' ),
							'Flat' => __( 'Flat', 'asalah' )
						),
						'desc' => "",
					),
					'frame_style' => array(
						'type' => 'select',
						'name' => __( 'Frame Style', 'asalah' ),
						'default' => 'solid',
						'values' => array(
							'solid' => __( 'Solid', 'asalah' ),
							'dashed' => __( 'Dashed', 'asalah' ),
							'dotted' => __( 'Dotted', 'asalah' )
						),
						'desc' => "",
					),
				),
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.", 'asalah' ),
				'desc' => '',
				'icon' => 'columns'
			),

			// tabs
			'tabs' => array(
				'name' => __( 'Tabs', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'style' => array(
						'type' => 'select',
						'name' => __( 'Tabs Style', 'asalah' ),
						'default' => 'v_tabs',
						'values' => array(
							'v_tabs' => __( 'Vertical Tabs', 'asalah' ),
							'h_tabs' => __( 'Horizontal Tabs', 'asalah' )
						),
						'desc' => ""
					),
					'justify' => array(
						'type' => 'select',
						'name' => __( 'Justify Tabs?', 'asalah' ),
						'default' => 'yes',
						'values' => array(
							'yes' => __( 'Yes', 'asalah' ),
							'no' => __( 'No', 'asalah' )
						),
						'desc' => __('Make all tabs the same width and justify them based on all width','asalah')
					),
					'id' => array(
						'default' => '',
						'name' => __( 'ID', 'asalah' ),
						'desc' => __('You can define a unique ID to prevent any conflict, by default we generate a random long number to prevent this, you can leave this empty and we handle this.','asalah')
					),
				),
				'desc' => '',
				'content' => __( '[tab title="First tab"]First Content[/tab][tab title="Second tab"]Second Content[/tab][tab title="Third tab"]Third Content[/tab]', 'asalah' ),
				'icon' => 'columns'
			),
			// tab
			'tab' => array(
				'name' => __( 'Tab', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						'desc' => "",
					),
				),
				'desc' => '',
				'content' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.', 'asalah' ),
				'icon' => 'columns'
			),
			// accordion
			'accordion' => array(
				'name' => __( 'Accordion', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'id' => array(
						'default' => '',
						'name' => __( 'ID', 'asalah' ),
						'desc' => __('You can define a unique ID to prevent any conflict, by default we generate a random long number to prevent this, you can leave this empty and we handle this.','asalah')
					),
				),
				'desc' => '',
				'content' => __( '[toggle open="yes" title="First toggle"]First Content[/toggle][toggle title="Second toggle"]Second Content[/toggle][toggle title="Third toggle"]Third Content[/toggle]', 'asalah' ),
				'icon' => 'columns'
			),
			// toggle
			'toggle' => array(
				'name' => __( 'Toggle', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						'desc' => "",
					),
					'open' => array(
						'type' => 'select',
						'name' => __( 'Open', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => __('Select if the toggle is open when page load','asalah')
					),
				),
				'desc' => '',
				'content' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.', 'asalah' ),
				'icon' => 'columns'
			),
			// progress_bar
			'progress_bar' => array(
				'name' => __( 'Progress Bar', 'asalah' ),
				'type' => 'single',
				'group' => 'Sanabel',
				'atts' => array(
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => '',
						'values' => array(
							'basic' => __( 'Basic', 'asalah' ),
							'striped' => __( 'Striped', 'asalah' ),
							'animated' => __( 'Animated', 'asalah' )
						),
						'desc' => "",
					),
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						'desc' => "",
					),
					'min' => array(
						'type' => 'slider',
						'min' => 0,
						'max' => 100,
						'step' => 1,
						'default' => 0,
						'name' => __( 'Minimum Value', 'asalah' ),
					),
					'max' => array(
						'type' => 'slider',
						'min' => 0,
						'max' => 100,
						'step' => 1,
						'default' => 100,
						'name' => __( 'Maximum Value', 'asalah' ),
					),
					'value' => array(
						'type' => 'slider',
						'min' => 0,
						'max' => 100,
						'step' => 1,
						'default' => 50,
						'name' => __( 'Value', 'asalah' ),
						'desc' => __('Should be some value between min and max','asalah')
					),
					'margin_bottom' => array(
						'default' => '',
						'name' => __( 'Margin Bottom', 'asalah' ),
						'desc' => "",
					),
					'bar_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Bar Color', 'asalah' ),
					),
					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
					'height' => array(
						'default' => '',
						'name' => __( 'Height', 'asalah' ),
						'desc' => __( 'Define height in Pixels', 'asalah' )
					),
					'animate' => array(
						'type' => 'select',
						'name' => __( 'Animate', 'asalah' ),
						'default' => '',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => "",
					)

				),
				'desc' => "",
				'icon' => 'columns'
			),
			// pricing
			'pricing' => array(
				'name' => __( 'Pricing Table', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'style' => array(
						'type' => 'select',
						'name' => __( 'Style', 'asalah' ),
						'default' => '1',
						'values' => asalah_range_array(1,3),
					),
				),
				'desc' => __('This is the pricing table, you need to wrap plans and features inside it','asalah'),
				'content' => __( "\n\n[plan][feature][/feature][/plan]\n[plan][feature][/feature][/plan]\n", 'asalah' ),
				'icon' => 'columns'
			),
			// plan
			'plan' => array(
				'name' => __( 'Pricing Plan', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'columns' => array(
						'type' => 'select',
						'name' => __( 'Columns', 'asalah' ),
						'default' => 'four',
						'values' => array(
							'one' => __( 'One', 'asalah' ),
							'two' => __( 'Two', 'asalah' ),
							'three' => __( 'Three', 'asalah' ),
							'four' => __( 'Four', 'asalah' ),
							'five' => __( 'Five', 'asalah' ),
							'six' => __( 'Six', 'asalah' ),
						),
						'desc' => __('number of plans in the row of pricing table, four means the plan will be 1/4 of the table widh and table can show 4 plans in one row','asalah'),
					),
					'featured' => array(
						'type' => 'select',
						'name' => __( 'Featured?', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => __('Select if this plan is marked as featured plan, it will have a unique color', 'asalah'),
					),
					'shadow' => array(
						'type' => 'select',
						'name' => __( 'Shadow?', 'asalah' ),
						'default' => 'no',
						'values' => array(
							'no' => __( 'No', 'asalah' ),
							'yes' => __( 'Yes', 'asalah' )
						),
						'desc' => __('Select if this plan is outlined by shadow, use this if you need more outstanding than other plans', 'asalah'),
					),
					'title' => array(
						'default' => '',
						'name' => __( 'Title', 'asalah' ),
						'desc' => "",
					),
					'price' => array(
						'default' => '',
						'name' => __( 'Price', 'asalah' ),
						'desc' => "",
					),
					'term' => array(
						'default' => '',
						'name' => __( 'Term', 'asalah' ),
						'desc' => "",
					),
					'link' => array(
						'default' => '',
						'name' => __( 'Link', 'asalah' ),
						'desc' => "",
					),
					'button' => array(
						'default' => '',
						'name' => __( 'Button Text', 'asalah' ),
						'desc' => "",
					),
					'border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Border Color', 'asalah' ),
					),
					'price_border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Price Border Color', 'asalah' ),
					),
					'price_bg' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Price Background', 'asalah' ),
					),
					'price_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Price Color', 'asalah' ),
					),
					'term_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Term Color', 'asalah' ),
					),
					'title_bg' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Background Color', 'asalah' ),
					),
					'title_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Title Color', 'asalah' ),
					),
					'button_bg' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Button Background Color', 'asalah' ),
					),
					'button_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Button Color', 'asalah' ),
					),
					'button_text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Button Text Color', 'asalah' ),
					),
					'button_border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Button Border Color', 'asalah' ),
					),
					'button_style' => array(
						'type' => 'select',
						'name' => __( 'Button Style', 'asalah' ),
						'default' => 'soft',
						'values' => array(
							'default' => __( 'Default', 'asalah' ),
							'soft' => __( 'Soft', 'asalah' ),
							'gradient' => __( 'Gradient', 'asalah' ),
							'flat' => __( 'Flat', 'asalah' ),
						),
						'desc' => ""
					),
					'button_skin' => array(
						'type' => 'select',
						'name' => __( 'Button Skin', 'asalah' ),
						'default' => 'theme_color',
						'values' => array(
							'theme_color' => __( 'Theme Color', 'asalah' ),
							'light' => __( 'Light', 'asalah' ),
							'dark' => __( 'Dark', 'asalah' ),
						),
						'desc' => ""
					),
					'button_icon' => array(
						'default' => '',
						'name' => __( 'Icon', 'asalah' ),
						'desc' => __( 'Read documentation to know more about icon names', 'asalah' )
					),
					'button_icon_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Icon Color', 'asalah' ),
					),
					'target' => array(
						'type' => 'select',
						'name' => __( 'Target', 'asalah' ),
						'default' => '',
						'values' => array(
							'_self' => __( '_selft', 'asalah' ),
							'_blank' => __( '_blank', 'asalah' )
						),
						'desc' => __( 'Select if the link opens in the same tab or new tab, select _self for the same tab and _blank for new tab', 'asalah' )
					),
					'button_size' => array(
						'type' => 'select',
						'name' => __( 'Button Size', 'asalah' ),
						'default' => 'small',
						'values' => array(
							'small' => __( 'Small', 'asalah' ),
							'medium' => __( 'Medium', 'asalah' ),
							'large' => __( 'Large', 'asalah' ),
						),
						'desc' => ""
					),
					'button_radius' => array(
						'default' => '',
						'name' => __( 'Radius', 'asalah' ),
						'desc' => __("The size of radius in Pixels","aslah"),
					),
				),
				'desc' => __('This is the pricing plan, you need to put it inside pricing shortcode','asalah'),
				'content' => __( "\n\n[feature]Feature One[/feature]\n[feature]Feature Two[/feature]\n[feature]Feature Three[/feature]", 'asalah' ),
				'icon' => 'columns'
			),
			// feature
			'feature' => array(
				'name' => __( 'Pricing Feature', 'asalah' ),
				'type' => 'wrap',
				'group' => 'Sanabel',
				'atts' => array(
					'bg_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Background Color', 'asalah' ),
					),
					'text_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Text Color', 'asalah' ),
					),
					'border_color' => array(
						'type' => 'color',
						'default' => '',
						'name' => __( 'Border Color', 'asalah' ),
					),
				),
				'desc' => __('Inside each pricing plan you need to add features, every line in the plan is a feature','asalah'),
				'content' => __( "This is a feature", 'asalah' ),
				'icon' => 'columns'
			),
		);
		
		$cols_array = array('one_half', 'one_third', 'two_third', 'three_fourth', 'one_fourth', 'one_fifth', 'two_fifth', 'three_fifth', 'four_fifth', 'one_sixth', 'five_sixth', 'full_column', 'custom_column', 'one_seventh', 'one_eighth', 'one_ninth');

		foreach ($cols_array as $column ) {
			$column_name = str_replace('_', ' ', $column);
			$column_name = ucwords($column_name);
			$column_atts = array(
				'padding' => array(
					'default' => '',
					'name' => __( 'Padding', 'asalah' )
				),
				'padding_top' => array(
					'default' => '',
					'name' => __( 'Padding Top', 'asalah' )
				),
				'padding_bottom' => array(
					'default' => '',
					'name' => __( 'Padding Bottom', 'asalah' )
				),
				'padding_left' => array(
					'default' => '',
					'name' => __( 'Padding Left', 'asalah' )
				),
				'padding_right' => array(
					'default' => '',
					'name' => __( 'Padding Right', 'asalah' )
				),
				'bg_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Background Color', 'asalah' ),
				),
				'content_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Content Color', 'asalah' ),
				),
				'border_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Color', 'asalah' ),
				),
				'border_top_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_top_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Top Color', 'asalah' ),
				),
				'border_bottom_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_bottom_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Bottom Color', 'asalah' ),
				),
				'border_left_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_left_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Left Color', 'asalah' ),
				),
				'border_right_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_right_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Right Color', 'asalah' ),
				),
				'radius' => array(
					'default' => '',
					'name' => __( 'Radius', 'asalah' ),
					'desc' => __("The size of radius in Pixels","aslah"),
				),
				'align' => array(
					'type' => 'select',
					'name' => __( 'Align', 'asalah' ),
					'default' => '',
					'values' => array(
						'left' => __( 'Left', 'asalah' ),
						'center' => __( 'Center', 'asalah' ),
						'right' => __( 'Right', 'asalah' )
					),
				),
			);

			if ($column == 'custom_column') {
				$column_atts['width'] = array(
					'default' => '',
					'name' => __( 'Column Width', 'asalah' ),
					'desc' => __('The width of this custom column, a unit should defined, columns in one row should be the sum of 1170px or 100%, for example you can create two custom columns inside one row, one has width 25% and the other has the width 75%', 'asalah')
				);
			}

			$column_array = array(
				'name' => $column_name,
				'type' => 'wrap',
				'group' => 'columns',
				'atts' => $column_atts,
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.", 'zoomarts' ),
				'desc' => '',
				'icon' => 'columns'
			);
			
			
			// add column options array to shortcodes list
			$shortcodes_array[$column] = $column_array;
		}

		// first level columns
		$cols_array = array('_one_half', '_one_third', '_two_third', '_three_fourth', '_one_fourth', '_one_fifth', '_two_fifth', '_three_fifth', '_four_fifth', '_one_sixth', '_five_sixth', '_full_column', '_custom_column', '_one_seventh', '_one_eighth', '_one_ninth');

		foreach ($cols_array as $column ) {
			$column_name = '2nd Level'.str_replace('_', ' ', $column);
			$column_name = ucwords($column_name);
			$column_atts = array(
				'padding' => array(
					'default' => '',
					'name' => __( 'Padding', 'asalah' )
				),
				'padding_top' => array(
					'default' => '',
					'name' => __( 'Padding Top', 'asalah' )
				),
				'padding_bottom' => array(
					'default' => '',
					'name' => __( 'Padding Bottom', 'asalah' )
				),
				'padding_left' => array(
					'default' => '',
					'name' => __( 'Padding Left', 'asalah' )
				),
				'padding_right' => array(
					'default' => '',
					'name' => __( 'Padding Right', 'asalah' )
				),
				'bg_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Background Color', 'asalah' ),
				),
				'content_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Content Color', 'asalah' ),
				),
				'border_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Color', 'asalah' ),
				),
				'border_top_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_top_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Top Color', 'asalah' ),
				),
				'border_bottom_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_bottom_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Bottom Color', 'asalah' ),
				),
				'border_left_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_left_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Left Color', 'asalah' ),
				),
				'border_right_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_right_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Right Color', 'asalah' ),
				),
				'radius' => array(
					'default' => '',
					'name' => __( 'Radius', 'asalah' ),
					'desc' => __("The size of radius in Pixels","aslah"),
				),
				'align' => array(
					'type' => 'select',
					'name' => __( 'Align', 'asalah' ),
					'default' => '',
					'values' => array(
						'left' => __( 'Left', 'asalah' ),
						'center' => __( 'Center', 'asalah' ),
						'right' => __( 'Right', 'asalah' )
					),
				),
			);

			if ($column == 'custom_column') {
				$column_atts['width'] = array(
					'default' => '',
					'name' => __( 'Column Width', 'asalah' ),
					'desc' => __('The width of this custom column, a unit should defined, columns in one row should be the sum of 1170px or 100%, for example you can create two custom columns inside one row, one has width 25% and the other has the width 75%', 'asalah')
				);
			}

			$column_array = array(
				'name' => $column_name,
				'type' => 'wrap',
				'group' => 'child_columns',
				'atts' => $column_atts,
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.", 'zoomarts' ),
				'desc' => '',
				'icon' => 'columns'
			);
			
			
			// add column options array to shortcodes list
			$shortcodes_array[$column] = $column_array;
		}

		//3rd level columns
		$cols_array = array('__one_half', '__one_third', '__two_third', '__three_fourth', '__one_fourth', '__one_fifth', '__two_fifth', '__three_fifth', '__four_fifth', '__one_sixth', '__five_sixth', '__full_column', '__custom_column', '__one_seventh', '__one_eighth', '__one_ninth');

		foreach ($cols_array as $column ) {
			$column_name = '3rd Level'.str_replace('_', ' ', $column);
			$column_name = ucwords($column_name);
			$column_atts = array(
				'padding' => array(
					'default' => '',
					'name' => __( 'Padding', 'asalah' )
				),
				'padding_top' => array(
					'default' => '',
					'name' => __( 'Padding Top', 'asalah' )
				),
				'padding_bottom' => array(
					'default' => '',
					'name' => __( 'Padding Bottom', 'asalah' )
				),
				'padding_left' => array(
					'default' => '',
					'name' => __( 'Padding Left', 'asalah' )
				),
				'padding_right' => array(
					'default' => '',
					'name' => __( 'Padding Right', 'asalah' )
				),
				'bg_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Background Color', 'asalah' ),
				),
				'content_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Content Color', 'asalah' ),
				),
				'border_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Color', 'asalah' ),
				),
				'border_top_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_top_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Top Color', 'asalah' ),
				),
				'border_bottom_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_bottom_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Bottom Color', 'asalah' ),
				),
				'border_left_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_left_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Left Color', 'asalah' ),
				),
				'border_right_width' => array(
					'default' => '',
					'name' => __( 'Border Width', 'asalah' )
				),
				'border_right_color' => array(
					'type' => 'color',
					'default' => '',
					'name' => __( 'Border Right Color', 'asalah' ),
				),
				'radius' => array(
					'default' => '',
					'name' => __( 'Radius', 'asalah' ),
					'desc' => __("The size of radius in Pixels","aslah"),
				),
				'align' => array(
					'type' => 'select',
					'name' => __( 'Align', 'asalah' ),
					'default' => '',
					'values' => array(
						'left' => __( 'Left', 'asalah' ),
						'center' => __( 'Center', 'asalah' ),
						'right' => __( 'Right', 'asalah' )
					),
				),
			);

			if ($column == 'custom_column') {
				$column_atts['width'] = array(
					'default' => '',
					'name' => __( 'Column Width', 'asalah' ),
					'desc' => __('The width of this custom column, a unit should defined, columns in one row should be the sum of 1170px or 100%, for example you can create two custom columns inside one row, one has width 25% and the other has the width 75%', 'asalah')
				);
			}

			$column_array = array(
				'name' => $column_name,
				'type' => 'wrap',
				'group' => 'columns',
				'atts' => $column_atts,
				'content' => __( "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.", 'zoomarts' ),
				'desc' => '',
				'icon' => 'columns'
			);
			
			
			// add column options array to shortcodes list
			$shortcodes_array[$column] = $column_array;
		}

		$shortcodes = apply_filters( 'su/data/shortcodes', $shortcodes_array );
		// Return result
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}

class Shortcodes_Ultimate_Data extends Su_Data {
	function __construct() {
		parent::__construct();
	}
}
