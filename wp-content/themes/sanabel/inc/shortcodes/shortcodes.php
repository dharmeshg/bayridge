<?php

function asalah_col_atts($atts, $out = "style") {
  $atts_array = array(
      "padding_top" => "",
      "padding_bottom" => "",
      "padding_left" => "",
      "padding_right" => "",
      "bg_color" => "",
      "content_color" => "",
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottom, bounce
      "effect_delay" => '100',
      "padding" => "",
      "border_top_width" => '',
      "border_top_color" => '',
      "border_bottom_width" => '',
      "border_bottom_color" => '',
      "border_left_width" => '',
      "border_left_color" => '',
      "border_right_width" => '',
      "border_right_color" => '',
      "border_width" => '',
      "border_color" => '',
      "radius" => "",
      "align" => "",
      "width" => '100%', // sum of 1170px or 100%, used only for custom column
    );
  extract(shortcode_atts($atts_array, $atts));

  $column_style = '';

  if ($radius) {
    $column_style .= " border-radius:".$radius."px;";
  }

  if ($border_width) {
    $column_style .= 'border-width: '.$border_width.'px;';
  }

  if ($border_color) {
    $column_style .= 'border-color: '.$border_color.';';
  }

  if ($border_top_width) {
    $column_style .= 'border-top-width: '.$border_top_width.'px;';
  }

  if ($border_bottom_width) {
    $column_style .= 'border-bottom-width: '.$border_bottom_width.'px;';
  }

  if ($border_left_width) {
    $column_style .= 'border-left-width: '.$border_left_width.'px;';
  }

  if ($border_right_width) {
    $column_style .= 'border-right-width: '.$border_right_width.'px;';
  }

  if ($border_top_color) {
    $column_style .= 'border-top-color: '.$border_top_color.';';
  }

  if ($border_bottom_color) {
    $column_style .= 'border-bottom-color: '.$border_bottom_color.';';
  }

  if ($border_left_color) {
    $column_style .= 'border-left-color: '.$border_left_color.';';
  }

  if ($border_right_color) {
    $column_style .= 'border-right-color: '.$border_right_color.';';
  }

  if (isset($padding) && $padding != '') {
    $column_style .= " padding:".$padding."px;";
  }

  if (isset($padding_top) && $padding_top != '') {
    $column_style .= " padding-top:".$padding_top."px;";
  }
  if (isset($padding_bottom) && $padding_bottom != '') {
    $column_style .= " padding-bottom:".$padding_bottom."px;";
  }
  if (isset($padding_left) && $padding_left != '') {
    $column_style .= " padding-left:".$padding_left."px;";
  }
  if (isset($padding_right) && $padding_right != '') {
    $column_style .= " padding-right:".$padding_right."px;";
  }

  if ($bg_color) {
     $column_style .= " background-color:".$bg_color.";";
  }

  if ($content_color) {
     $column_style .= " color:".$content_color.";";
  }

  if ($column_style != '') {
    $column_style = ' style="'.$column_style.'"';
  }

  // add animiation effects tags
  $animation_tags = '';
  if ($effect) {
    $animation_tags .= ' data-animation="'.$effect.'"';
  }
  if ($effect_delay) {
    $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
  }
  if ($animation_tags != '' ) {
    $effect = $animation_tags;
  }

  // $out put data
  if (isset($out) && $out != '' && $out != 'style') {
    return $$out;
  }else{
    return $column_style;
  }
}

/* columns shortcode */
function asalah_full_column( $atts, $content = null ) {
  return '<div class="full_column text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('full_column', 'asalah_full_column');
add_shortcode('_full_column', 'asalah_full_column');
add_shortcode('__full_column', 'asalah_full_column');

function asalah_one_third( $atts, $content = null ) {
  return '<div class="one_third text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'asalah_one_third');
add_shortcode('_one_third', 'asalah_one_third');
add_shortcode('__one_third', 'asalah_one_third');

function asalah_two_third( $atts, $content = null ) {

  return '<div class="two_third text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'asalah_two_third');
add_shortcode('_two_third', 'asalah_two_third');
add_shortcode('__two_third', 'asalah_two_third');

function asalah_one_half( $atts, $content = null ) {
  return '<div class="one_half text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'asalah_one_half');
add_shortcode('_one_half', 'asalah_one_half');
add_shortcode('__one_half', 'asalah_one_half');


function asalah_one_fourth( $atts, $content = null ) {
  return '<div class="one_fourth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'asalah_one_fourth');
add_shortcode('_one_fourth', 'asalah_one_fourth');
add_shortcode('__one_fourth', 'asalah_one_fourth');


function asalah_three_fourth( $atts, $content = null ) {
  return '<div class="three_fourth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'asalah_three_fourth');
add_shortcode('_three_fourth', 'asalah_three_fourth');
add_shortcode('__three_fourth', 'asalah_three_fourth');

function asalah_one_fifth( $atts, $content = null ) {
  return '<div class="one_fifth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'asalah_one_fifth');
add_shortcode('_one_fifth', 'asalah_one_fifth');
add_shortcode('__one_fifth', 'asalah_one_fifth');


function asalah_two_fifth( $atts, $content = null ) {
  return '<div class="two_fifth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'asalah_two_fifth');
add_shortcode('_two_fifth', 'asalah_two_fifth');
add_shortcode('__two_fifth', 'asalah_two_fifth');


function asalah_three_fifth( $atts, $content = null ) {
  return '<div class="three_fifth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'asalah_three_fifth');
add_shortcode('_three_fifth', 'asalah_three_fifth');
add_shortcode('__three_fifth', 'asalah_three_fifth');


function asalah_four_fifth( $atts, $content = null ) {
  return '<div class="four_fifth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'asalah_four_fifth');
add_shortcode('_four_fifth', 'asalah_four_fifth');
add_shortcode('__four_fifth', 'asalah_four_fifth');


function asalah_one_sixth( $atts, $content = null ) {
  return '<div class="one_sixth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'asalah_one_sixth');
add_shortcode('_one_sixth', 'asalah_one_sixth');
add_shortcode('__one_sixth', 'asalah_one_sixth');


function asalah_five_sixth( $atts, $content = null ) {
  return '<div class="five_sixth text-'.asalah_col_atts($atts, 'align').'" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'asalah_five_sixth');
add_shortcode('_five_sixth', 'asalah_five_sixth');
add_shortcode('__five_sixth', 'asalah_five_sixth');


function asalah_custom_column( $atts, $content = null ) {
  return '<div class="custom_column text-'.asalah_col_atts($atts, 'align').'" style="width:'.asalah_col_atts($atts, 'width').';" '.asalah_col_atts($atts).' '.asalah_col_atts($atts, 'effect').'>' . do_shortcode($content) . '</div>';
}
add_shortcode('column', 'asalah_custom_column');
add_shortcode('_column', 'asalah_custom_column');
add_shortcode('__column', 'asalah_custom_column');

/* New section shortcode */
add_shortcode( 'section', 'asalah_section_shortcode' );
function asalah_section_shortcode ($atts, $content = null) {
	extract(shortcode_atts(array(
      "width" => 'fixed', // full, fixed
      "bg" => 'color', // color, image, video, half_image_left, half_image_right
      "bg_color" => '',
      "bg_image" => '', // image url
      "mobile_bg" => '', // yes, no
      "bg_overlay" => '',
      "image_style" => 'cover', // default, cover, pattern, responsive, fixed
      "parallax" => "", // no, yes, fixed, animated
      "parallax_speed" => "0.8",
      "parallax_offset" => "0",
      "video_mp4" =>'',
      "video_webm" => '',
      "video_m4v" => '',
      "video_ogg" => '',
      "padding_top" => '',
      "padding_bottom" => '',
      "margin_top" => '',
      "margin_bottom" => '',
      "title" => '',
      "subtitle" => '',
      "title_icon" => '',
      "title_icon_color" => '',
      "title_icon_size" => '60',
      "title_align" => 'center',
      "title_color" => '',
      "subtitle_color" => '',
      "content_color" => '',
      "content_align" => '',
      "title_divider" => '', // underline, no
      "title_divider_color" => "",
      "title_margin" => '',
      "border_top" => '',
      "border_bottom" => '',
      "effect" => 'no', //no, fade, fade_left, fade_right, fade_top, fade_bottom, bounce
      "effect_delay" => '01',
      "unique_word" => "",
      "unique_color" => "",
      "pointer" => "no", // no, top, bottom, both
      "pointer_color" => "",
      "id" => "",
      "class" => "",
    ), $atts));
    
    if ($title && $unique_word) {
      $title = str_replace($unique_word, "<span class='skin_color' style='color:".$unique_color.";'>".$unique_word."</span>", $title);
    }

    $section_style = '';
    $section_class = '';
    $title_style = '';
    $subtitle_style = '';
    $video_html = '';
    $title_divider_style = '';
    $animation_tags = '';
    $inner_bg_class = '';
    $inner_bg_style = '';
    $section_visible_column_class = ' col-md-12';
    $content_style = '';
    $title_div_style = '';
    $pointer_style_atts = "";
    $pointer_style = "";
    $pointer_top_border_style_atts = "";
    $pointer_top_border_style = "";
    $pointer_bottom_border_style_atts = "";
    $pointer_bottom_border_style = "";
    $bg_section_class = "";
    $parallax_data = "";
    $parallax_offset_data = "";
    $section_data = "";
    $section_id_data = "";
    $bg_section_id_data = "";

    if ($id) {
      if ($bg == "half_image_right" || $bg == "half_image_left") {
        $bg_section_id_data = ' id="'.$id.'"';
      }else{
        $section_id_data = ' id="'.$id.'"';
      }
    }

    if ($class) {
      if ($bg == "half_image_right" || $bg == "half_image_left") {
        $bg_section_class .= ' ' . $class;
      }else{
        $section_class .= ' ' . $class;
      }
    }

    if (isset($title_margin) && $title_margin != '') {
      $title_div_style .= ' margin-bottom:' .$title_margin.'px;';
    }

    //section background
    if ($bg_color) {
      if (preg_match('#^(?:https?|ftp)://#', $bg_color, $m)) {
        $section_style .= " background-image:url('".$bg_color."');";
      }else{
        $section_style .= " background-color:".$bg_color.";";
      }
      $pointer_style_atts .= ' border-color:'.$bg_color.';';
    }

    if ($mobile_bg == "no") {
      $section_class = ' no_mobile_bg_section';
    }

    if($bg == 'image') {
      $section_style .= " background-color:".$bg_color.";";
      $section_style .= " background-image:url('".$bg_image."');";
      $section_style .= " background-repeat: no-repeat;";
      if($image_style == "pattern") {
        $section_style .= " background-repeat: repeat;";
      }elseif($image_style == "cover") {
        $section_style .= " background-size: cover;";
        // $section_style .= " background-attachment: fixed;";
        $section_style .= " background-repeat: no-repeat;";
      }elseif($image_style == "responsive") {
        $section_style .= " background-size: 100% auto;";
      }elseif($image_style == "default") {
        $section_style .= " background-position: 50%;";
      }

      if($parallax == "fixed") {
        $section_style .= " background-attachment: fixed;";
      }elseif($parallax == "yes") {
        $section_class .= ' parallax';
        $section_style .= " background-image:url('".$bg_image."') 50% 0 no-repeat;";
        $parallax_data = ' data-stellar-background-ratio="0.8" ';
        if ($parallax_speed) {
          $parallax_data = ' data-stellar-background-ratio="'.$parallax_speed.'" ';
        }
        if ($parallax_offset) {
          $parallax_offset_data = ' data-stellar-vertical-offset="'.$parallax_offset.'" ';
          $section_style .= ' background-position-y:'.$parallax_offset.'px;';
        }
      }elseif($parallax == "animated") {
        $section_class .= ' animated_bg_section';
      }
    }elseif($bg == 'video') {
      $video_html .= '<video class="video_overlay asalah_video_shortcode" preload="auto"  autoplay="autoplay" poster="'.$bg_image.'" loop muted="muted">';
      $video_html .= '<source src="'.$video_m4v.'" type="video/mp4" />';
      $video_html .= '<source src="'.$video_webm.'" type="video/webm" />';
      $video_html .= '<source src="'.$video_ogg.'" type="video/ogg" />';
      $video_html .= '<source src="'.$video_mp4.'" />';
      $video_html .= '<img alt="Video Background" src="'.$bg_image.'" style="position:absolute;left:0;" width="100%" title="'.__('Video playback is not supported by your browser','asalah').'" />';
      $video_html .= '</video>';
      $video_html .= '<div class="color_overlay"></div>';
      $section_class .= ' video_section';
    }

    // section custom style
    if (isset($padding_top) && $padding_top != '') {
      $section_style .= " padding-top:".$padding_top."px;";
    }
    if (isset($padding_bottom) && $padding_bottom != '') {
      $section_style .= " padding-bottom:".$padding_bottom."px;";
    }
    if (isset($margin_top) && $margin_top != '') {
      $section_style .= " margin-top:".$margin_top."px;";
    }
    if (isset($margin_bottom) && $margin_bottom != '') {
      $section_style .= " margin-bottom:".$margin_bottom."px;";
    }
    if ($content_color) {
      $section_style .= " color: ".$content_color.";";
    }
    if ($border_top) {
      $section_style .= " border-top: 1px solid ".$border_top.";";
      $pointer_top_border_style_atts = " border-bottom-color: ".$border_top.";";
    }
    if ($border_bottom) {
      $section_style .= " border-bottom: 1px solid ".$border_bottom.";";
      $pointer_bottom_border_style_atts = " border-top-color: ".$border_bottom.";";
    }

    if ($content_align) {
      $content_style .= ' text-align:'.$content_align.';';
    }

    // title color class
    if ($title_color) {
      $title_style .= " color:".$title_color.";";
    }
    
    if ($subtitle_color) {
      $subtitle_style .= " color:".$subtitle_color.";";
    }

    // title divider class
    if ($title_divider_color) {
      $title_divider_style .= " background-color:".$title_divider_color.";";
    }

    // add animiation effect tags
    if ($effect && $effect != "no") {
      if ($effect) {
        $animation_tags .= ' data-animation="'.$effect.'"';
      }
      if ($effect_delay) {
        $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
      }
    }

    if ($bg_image && ($bg == "half_image_left" || $bg == "half_image_right") ) {
      $inner_bg_style .= " background-image:url('".$bg_image."');";
    }

    if ($bg == "half_image_left") {
      $inner_bg_class .= ' inner_full_left';
      $section_visible_column_class = ' col-md-7 col-md-offset-5';
      $inner_bg_style .= " background-repeat: no-repeat;";

      if($image_style == "pattern") {
        $inner_bg_style .= " background-repeat: repeat;";
      }elseif($image_style == "cover") {
        $inner_bg_style .= " background-size: cover;";
        //$inner_bg_style .= " background-attachment: fixed;";
        $inner_bg_style .= " background-repeat: no-repeat;";
      }elseif($image_style == "responsive") {
        $inner_bg_style .= " background-size: 100% auto;";
      }elseif($image_style == "default") {
        $inner_bg_style .= " background-position: 50%;";
      }

      if($parallax == "fixed") {
        $inner_bg_style .= " background-attachment: fixed;";
      }elseif($parallax == "yes") {
        $inner_bg_class .= ' parallax';
        $inner_bg_style .= " background-image:url('".$bg_image."');";
        $parallax_data = ' data-stellar-background-ratio="0.8" ';
        if ($parallax_speed) {
          $parallax_data = ' data-stellar-background-ratio="'.$parallax_speed.'" ';
        }
        if ($parallax_offset) {
          $parallax_offset_data = ' data-stellar-vertical-offset="'.$parallax_offset.'" ';
          $inner_bg_style .= ' background-position-y:'.$parallax_offset.'px;';
        }
      }elseif($parallax == "animated") {
        $inner_bg_class .= ' animated_bg_section';
      }

    }elseif($bg == "half_image_right"){
      $inner_bg_class .= ' inner_full_right';
      $section_visible_column_class = ' col-md-7';
      $inner_bg_style .= " background-repeat: no-repeat;";

      if($image_style == "pattern") {
        $inner_bg_style .= " background-repeat: repeat;";
      }elseif($image_style == "cover") {
        $inner_bg_style .= " background-size: cover;";
        //$inner_bg_style .= " background-attachment: fixed;";
        $inner_bg_style .= " background-repeat: no-repeat;";
      }elseif($image_style == "responsive") {
        $inner_bg_style .= " background-size: 100% auto;";
      }elseif($image_style == "default") {
        $inner_bg_style .= " background-position: 50%;";
      }

      if($parallax == "fixed") {
        $inner_bg_style .= " background-attachment: fixed;";
      }elseif($parallax == "yes") {
        $inner_bg_class .= ' parallax';
        $inner_bg_style .= " background-image:url('".$bg_image."');";
        $parallax_data = ' data-stellar-background-ratio="0.8" ';
        if ($parallax_speed) {
          $parallax_data = ' data-stellar-background-ratio="'.$parallax_speed.'" ';
        }
        if ($parallax_offset) {
          $parallax_offset_data = ' data-stellar-vertical-offset="'.$parallax_offset.'" ';
          $inner_bg_style .= ' background-position-y:'.$parallax_offset.'px;';
        }
      }elseif($parallax == "animated") {
        $inner_bg_class .= ' animated_bg_section';
      }
    }
    if ($width == "mini") {
      $container_width_class = "container mini_container";
    }else{
      $container_width_class = "container";
    }

    if ($pointer == "both" || $pointer == "top" || $pointer == "bottom") {
      $section_class .= " section_with_pointer";
      $bg_section_class .= " bg_section_with_pointer";
      if ($pointer_style_atts) {
        $pointer_style .= ' style="'.$pointer_style_atts.'"';
        $pointer_top_border_style .= ' style="'.$pointer_top_border_style_atts.'"';
        $pointer_bottom_border_style .= ' style="'.$pointer_bottom_border_style_atts.'"';
      }
    }



    $output = '';

    if ($bg == "half_image_right" || $bg == "half_image_left") { $output .= '<div '.$bg_section_id_data.' class="bg_section '.$bg_section_class.'">'; } // open bg_section if half background image section chosen
    if ($bg == "half_image_right" || $bg == "half_image_left") {
      // check style tag
      if ($inner_bg_style != '') {
        $inner_bg_style = ' style="'.$inner_bg_style.'"';
      } 
      // end checking style tag
      $output .= '<div class="inner_full_section col-md-5 container_fluid '.$inner_bg_class.'" '.$inner_bg_style.'  '.$parallax_data.' '.$parallax_offset_data.'>';
      if ($bg_overlay) {
        $output .= '<div class="bg_overlay" style="background-color:'.$bg_overlay.';"></div>';
      }
      $output .= '</div>';  
    }

    // check style tag
    if ($section_style != '') {
      $section_style = ' style="'.$section_style.'"';
    } 
    // end checking style tag
    $output .= '<div '.$section_id_data.' class="new_section container-fluid '.$section_class.'" '.$section_style.' '.$parallax_data.' '.$parallax_offset_data.' '.$section_data.'>'; // start section
      // section top pointer
      if ($pointer == "top" || $pointer == "both") {
        $output .= '<div class="section_top_poitner" '.$pointer_style.'><div class="outer_pointer_border" '.$pointer_top_border_style.'></div><div class="inner_pointer_border"></div></div>';
      }
      $output .= $video_html;
      if ($bg_overlay && $bg != "half_image_right" && $bg != "half_image_left") {
        $output .= '<div class="bg_overlay" style="background-color:'.$bg_overlay.';"></div>';
      }

      // check style tag
      if ($content_style != '') {
        $content_style = ' style="'.$content_style.'"';
      } 
      // end checking style tag
      if ($width != 'full') { $output .= '<div class="'.$container_width_class.'" '.$content_style.' '.$animation_tags.'><div class="row">'; } // start container and row

        $output .= '<div class="section_visible_column '.$section_visible_column_class.'">'; // start section visible column
      		if ($title || $subtitle) {
            if ($width == "full") {$output .= '<div class="container">';}
            // check style tag
            if ($title_div_style != '') {
              $title_div_style = ' style="'.$title_div_style.'"';
            }
            // end checking style tag
            $output .= '<div class="section_title text-'.$title_align.' clearfix" '.$title_div_style.'>'; // start section title
              if ($title_icon) { $output .= asalah_icon_text($title_icon, $title, $title_icon_color, $title_icon_size); }

              
        			if ($title) { 
                // check style tag
                if ($title_style != '') {
                  $title_style = ' style="'.$title_style.'"';
                }
                // end checking style tag
                $output .= '<h2 '.$title_style.'>'.$title.'</h2>'; 
              } // section title

        			if ($subtitle) { 
                // check style tag
                if ($subtitle_style != '') {
                  $subtitle_style = ' style="'.$subtitle_style.'"';
                }
                // end checking style tag
                $output .= '<p class="section_description" '.$subtitle_style.'>'.$subtitle.'</p>'; 
              } // section sub title

              if ($title_divider == "underline") {
                // check style tag
                if ($title_divider_style != '') {
                  $title_divider_style = ' style="'.$title_divider_style.'"'; // style tag changed
                }
                // end checking style tag
                $output .= '<div class="section_title_divider" '.$title_divider_style.'></div>';
              }

        		$output .= '</div>'; // end section title
            if ($width == "full") {$output .= '</div>';}
          }
      		$output .= do_shortcode($content);
        $output .= '</div>'; // end section_visible_column

      if ($width != 'full') { $output .= '</div></div>'; } // end row container
      // section bottom pointer
      if ($pointer == "bottom" || $pointer == "both") {
        $output .= '<div class="section_bottom_poitner" '.$pointer_style.'><div class="outer_pointer_border" '.$pointer_bottom_border_style.'></div><div class="inner_pointer_border"></div></div>';
      }
    $output .= '</div>'; // end section new_section

    if ($bg == "half_image_right" || $bg == "half_image_left") { $output .= '</div>'; } // close bg_section if half background image section chosen


    return $output;
}

/* New row shortcode */
add_shortcode( 'row', 'asalah_row_shortcode' );
add_shortcode( '_row', 'asalah_row_shortcode' );
add_shortcode( '__row', 'asalah_row_shortcode' );
add_shortcode( 'inner_row', 'asalah_row_shortcode' );
function asalah_row_shortcode ($atts, $content = null) {
	extract(shortcode_atts(array(
      "margin_top" => '',
      "margin_bottom" => '',
    ), $atts));

    $row_style = '';
    if ($margin_top) {
      $row_style .= ' margin-top:' . $margin_top . 'px;';
    }
    if ($margin_bottom) {
      $row_style .= ' margin-bottom:' . $margin_bottom . 'px;';
    }

    // check style tag
    if ($row_style != '') {
      $row_style = ' style="'.$row_style.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<div class="asalah_row row" '.$row_style.'>';
    	$output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}

/* Service block shortcode */
add_shortcode( 'service', 'asalah_service_shortcode' );
function asalah_service_shortcode ($atts, $content) {
  extract(shortcode_atts(array(
      "type" => 'icon', // icon, image, text
      "title" => '',
      "icon_style" => 'default', // default, circle
      "icon_position" => 'top', // top, left, right
      "icon_color" => '',
      "icon_bg_color" => "",
      "icon_size" => "",
      "icon_width" => "70",
      "align" => 'center',
      "value" => "",
      "link" => '',
      "target" => '', // _blank
      "icon" => '',
      "image_url" => '',
      "image_width" => '100',
      "image_height" => '',
      "margin_top" => "",
      "margin_bottom" => "",
      "title_color" => "",
      "text_color" => "",
      "value_color" => "",
      "frame" => "no", // light, dark, no
      "box" => "no", // no, yes
      "box_color" => "",
      "size" => "small", // small, medium, big
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottom, bounce
      "effect_delay" => '01',
      "skin" => "dark", // light, theme_color, dark
    ), $atts));

  $class = '';
  $animation_tags = '';
  $image_style = '';
  $icon_atts = '';
  $icon_wrapper_atts = '';
  $service_body_atts = '';
  $body_margin = '';
  $service_atts = "";
  $title_atts = "";
  $text_atts = "";
  $value_atts = "";
  $image_class = "";
  $icon_class = "";
  $image_size = "";
  $image_height_att = " height='auto'";
  $image_width_att = "";

  if ($frame == "yes") {
    $image_class .= ' image_frame';
  }elseif($frame == "light") {
    $image_class .= ' image_frame light_frame';
  }elseif($frame == "dark") {
    $image_class .= ' image_frame dark_frame';
  }

  if ($title_color) {
    $title_atts .= ' color:'.$title_color.';';
  }
  if ($text_color) {
    $text_atts .= ' color:'.$text_color.';';
  }
  if ($value_color) {
    $value_atts .= ' color:'.$value_color.';';
  }

  if (isset($margin_top) && $margin_top != '') {
    $service_atts .= " margin-top:".$margin_top."px;";
  }
  if (isset($margin_bottom) && $margin_bottom != '') {
    $service_atts .= " margin-bottom:".$margin_bottom."px;";
  }

  if ($icon_color) {
    $icon_atts .= ' color:'.$icon_color.';';
  }

  if ($icon_size) {
    $icon_atts .= ' font-size:'.$icon_size.'px;';
  }

  if ($icon_bg_color) {
    $icon_wrapper_atts .= ' background-color:'.$icon_bg_color.';';
  }

  if ($icon_width) {
    $icon_atts .= ' line-height:'.$icon_width.'px;';
    $icon_wrapper_atts .= ' width:'.$icon_width.'px;';
    
  }

  if ($icon_width && $type == "icon") {
    $body_margin = $icon_width + 20;
  }

  if ($image_width && $type == "image") {
    $body_margin = $image_width + 20;
    $image_width_att = " width='".$image_width."'";
    $image_size .= $image_width_att;
  }

  if ($image_height) {
    $image_height_att = " height='".$image_height."'";
    $image_size .= $image_height_att;
  }

  if ($body_margin && $icon_position == "left") {
    $service_body_atts .= ' margin-left: '.$body_margin.'px;';

  }elseif ($body_margin && $icon_position == "right") {
    $service_body_atts .= ' margin-right: '.$body_margin.'px;';
  }

  // add service item classes
  if ($box == "yes") {
    $class .= ' boxed_service';
    if ($box_color) {
      $service_body_atts .= ' background-color: '.$box_color.';';
    }
    if ($type == "icon" && $icon_position == "top" && $icon_style == "circle") {
      $body_margin_top = 26 + ($icon_width/2);
      $service_body_atts .= ' margin-top: -'.$body_margin_top.'px;';
      $service_body_atts .= ' padding-top: '.$body_margin_top.'px;';
    }elseif ($type == "iamge" && $icon_position == "top") {
      $body_margin_top = 26 + ($image_width/2);
      $service_body_atts .= ' margin-top: -'.$body_margin_top.'px;';
      $service_body_atts .= ' padding-top: '.$body_margin_top.'px;';
    }
  }
  if ($icon_style) {
    $class .= ' icon_' . $icon_style;
  }

  if ($skin == "theme_color") {
    if ($icon_style == "default") {
      $icon_class .= ' skin_color';
    }elseif($icon_style == "circle") {
      $icon_class .= ' skin_bg';
    }
  }elseif($skin) {
    $icon_class .= $skin . '_icon_skin';
  }

  if ($icon_position) {
    $class .= ' icon_' . $icon_position;
  }

  if ($align) {
    $class .= ' text_' . $align;
  }

  if ($size) {
    $class .= ' service_size_'. $size;
  }

  //add image width
  if ($image_width) {
    $image_style .= ' width:'.$image_width.'px;';
  }

  // add animiation effects tags
  if ($effect) {
    $animation_tags .= ' data-animation="'.$effect.'"';
  }
  if ($effect_delay) {
    $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
  }

  // check style tag
  if ($service_atts != '') {
    $service_atts = ' style="'.$service_atts.'"'; // style tag changed
  }
  // end checking style tag
  $output = '<div class="service_item clearfix '.$class.'" '.$service_atts.' '.$animation_tags.'>'; // start service


    // check if shortcode type is icon or image
    $href_atts = '';
    if ($link) {
      $href_atts .= ' href="'.$link.'"';
    }
    if ($target) {
      $href_atts .= ' target="'.$target.'"';
    }
    if ($type == 'image') {
      if ($icon_color) {
        $image_style .= "background-color: ".$icon_color.";";
      }
      // check style tag
      if ($image_style != '') {
        $image_style = ' style="'.$image_style.'"'; // style tag changed
      }
      // end checking style tag
      $output .= '<div class="service_icon image_service_icon '.$image_class.'" '.$image_style.'>';
        $output .= '<a '.$href_atts.'>';
        $output .= '<img class="img-responsive service_image" src="'.$image_url.'" '.$image_size.' alt="'.$title.'"/>';
        $output .= '</a>';
      $output .= '</div>';
    }elseif($type == 'icon') {
      // check style tag
      if ($icon_wrapper_atts != '') {
        $icon_wrapper_atts = ' style="'.$icon_wrapper_atts.'"'; // style tag changed
      }
      // end checking style tag
      $output .= '<div class="service_icon vector_service_icon '.$icon_class.'" '.$icon_wrapper_atts.'>';

        // check style tag
        if ($icon_atts != '') {
          $icon_atts = ' style="'.$icon_atts.'"'; // style tag changed
        }
        // end checking style tag
        $output .= '<a '.$icon_atts.' '.$href_atts.'>';
        $output .= '<i class="'.$icon.'"></i>';
        $output .= '</a>';
      $output .= '</div>';
    }
    
    // check style tag
    if ($service_body_atts != '') {
      $service_body_atts = ' style="'.$service_body_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output .= '<div class="service_body" '.$service_body_atts.'>';
    $output .= '<a '.$href_atts.'>';

    // check style tag
    if ($title_atts != '') {
      $title_atts = ' style="'.$title_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output .= '<h4 class="service_title title" '.$title_atts.'>'.$title.'</h4>'; // service title
    $output .= '</a>';

    // check style tag
    if ($text_atts != '') {
      $text_atts = ' style="'.$text_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output .= '<p '.$text_atts.'>'.do_shortcode($content).'</p>'; // service text
    $output .= '<a '.$href_atts.'>';

    // check style tag
    if ($value_atts != '') {
      $value_atts = ' style="'.$value_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output .= '<span class="service_value" '.$value_atts.'>'.$value.'</span>'; // service value
    $output .= '</a>';
    $output .= '</div>'; // service body
  $output .= '</div>'; // end service service_item
  return $output;
}

/* Button shortcode */
add_shortcode( 'button', 'asalah_button_shortcode' );
function asalah_button_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "url" => '',
      "link" => '',
      "style" => 'default', // default, soft, gradient, flat
      "skin" => "theme_color", // light, dark
      "color" => '',
      "text_color" => '',
      "size" => 'small', // small, medium, large
      "radius" => '',
      "width" => "", // add unit
      "icon" => '',
      "icon_color" => "",
      "target" => "", // _self, _blank
      "margin_top" => '',
      "margin_bottom" => '',
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01',
    ), $atts));

    if ($link) {
      $url = $link;
    }

    $button_style = '';
    $button_class = '';
    $animation_tags = '';
    $icon_style = '';
    $button_target_data = '';

    if ($target) {
      $button_target_data .= ' target="'.$target.'"';
    }

    if ($style) {
      $button_class .= ' button_'.$style;
    }
    if ($size) {
      $button_class .= ' button_'.$size;
    }

    if ($skin) {
      $button_class .= ' skin_'.$skin;
    }

    if ($icon_color) {
       $icon_style .= ' color:'.$icon_color.';';
    }

    if ($width) {
      $button_style .= ' width:'.$width.';';
    }

    if ($color) {
      if ($style == "soft") {
        $button_style .= ' background-color:'.$color.';';
        $button_style .= ' border-color:'.$color.';';
      }elseif($style == "flat") {
        $darker_color = asalah_su_hex_shift($color, "darker", 25);
        $button_style .= ' background-color:'.$color.';';
        $button_style .= ' border-color:'.$color.';';
        $button_style .= ' border-bottom-color:'.$darker_color.';';
      }elseif($style == "gradient") {
        $lighter_color = asalah_su_hex_shift($color, "lighter", 25);
        $darker_color = asalah_su_hex_shift($color, "darker", 10);
        $button_style .= ' background-color:'.$color.';';
        $button_style .= ' border-color:'.$color.';';
        $button_style .= ' background-image: linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_style .= ' background-image: -o-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_style .= ' background-image: -moz-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_style .= ' background-image: -webkit-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_style .= ' background-image: -ms-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
      }else{
        $button_style .= ' border-color:'.$color.';';
        $button_style .= ' color:'.$color.';';
      }
    }

    if ($text_color) {
      $button_style .= ' color:' .$text_color .';';
    }
    if (isset($radius) && $radius != '') {
      $button_style .= ' border-radius:'.$radius.'px;';
    }
    if ($margin_top) {
      $button_style .= ' margin-top:' . $margin_top . 'px;';
    }
    if ($margin_bottom) {
      $button_style .= ' margin_bottom:' . $margin_bottom . 'px;';
    }

    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    if ($button_style != "") {
      $button_style = ' style="'.$button_style.'"';
    }

    if ($icon_style != "") {
      $icon_style = ' style="'.$icon_style.'"';
    }

    $output = '';
    if ($url) { $output .= '<a href="'.$url.'" '.$button_target_data.'>'; } // check if url is set and open a tag
      $output .= '<span class="asalah_button '.$button_class.'" '.$button_style.' '.$animation_tags.'>';
        $output .= do_shortcode($content);
        if ($icon) {
          $output .= '<i class="button_icon '.$icon.'" '.$icon_style.'></i>';
        }
      $output .= '</span>';
    if ($url) { $output .= '</a>'; } // check if url is set and close a tag

    return $output;
}


add_shortcode( 'title', 'asalah_title_shortcode' );
function asalah_title_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "size" => '',
      "weight" => "", // should define unit
      "line_height" => '',
      "margin_top" => '',
      "margin_bottom" => '17',
      "align" => "", 
      "divider" => "no", // no, single, double, thick, part, part_thick
      "divider_color" => "",
      "divider_width" => "", // should define unit
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01',
      "id" => "",
    ), $atts));

    $text_class = '';
    $style_atts = '';
    $animation_tags = '';
    $sep_atts = '';
    $title_atts = "";
    $title_div_style = "";

    if ($id) {
      $title_div_style = ' id="'.$id.'"';
    }

    if ($divider_color) {
      $sep_atts .= ' background-color: '.$divider_color.';';
    }

    if ($divider_width) {
      $sep_atts .= ' width: '.$divider_width.';';
    }

    if ($color) {
      $title_atts .= "color:" .$color. "; ";
    }
    if ($size) {
      $title_atts .= "font-size:" .$size. "px; ";
    }
    if ($line_height) {
      $title_atts .= "line-height:" .$line_height. "px; ";
    }

    if ($margin_top) {
      $style_atts .= " margin-top:".$margin_top."px;";
    }
    if ($margin_bottom) {
      $style_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($weight) {
       $title_atts .= "font-weight:" .$weight. "; ";
    }

    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<div '.$title_div_style.' class="title_shortcode title_wrapper text-'.$align.' '.$text_class.'" '.$style_atts.' '.$animation_tags.'>';

      // check style tag
      if ($title_atts != '') {
        $title_atts = ' style="'.$title_atts.'"'; // style tag changed
      }
      // end checking style tag
      $output .= '<h4 class="title" '.$title_atts.'>'.do_shortcode($content).'</h4>';
      if ($divider != "no") {
        // check style tag
        if ($sep_atts != '') {
          $sep_atts = ' style="'.$sep_atts.'"'; // style tag changed
        }
        // end checking style tag
        $output .= '<div class="title_divider title_divider_'.$divider.'" '.$sep_atts.'></div>';
      }
    $output .= '</div>';
    return $output;
}

add_shortcode( 'alert', 'asalah_alert_shortcode' );
function asalah_alert_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "title" => '',
      "style" => "light", // light, dark, info, warning, success, danger, skin
      "close" => "yes", // yes, no
      "bg_color" => "", 
      "border_color" => "",
      "content_color" => "",
      "margin_top" => '',
      "margin_bottom" => '',
    ), $atts));
    $alert_style_atts = '';
    $alert_style_data = '';
    $alert_style = 'info';

    if ($bg_color) {
      $alert_style_atts .= 'background-color:'.$bg_color.';';
    }

    if ($border_color) {
      $alert_style_atts .= 'border-color:'.$border_color.';';
    }

    if ($margin_top) {
      $alert_style_atts .= " margin-top:".$margin_top."px;";
    }
    if ($margin_bottom) {
      $alert_style_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($content_color) {
      $alert_style_atts .= 'color:'.$content_color.';';
    }

    if ($alert_style_atts && $alert_style_atts != '') {
      $alert_style_data = ' style="'.$alert_style_atts.'"';
    }

    if ($style) {
      $alert_style = $style;
    }
    $output = '';

    $output .= '<div class="alert_shorcode alert alert-'.$alert_style.' alert-dismissible fade in" '.$alert_style_data.' role="alert">';
      if ($close == 'yes') {
        $output .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>';
      }

      if ($title) {
        $output .= '<h4 class="title">'.$title.'</h4>';
      }

      if ($content) {
        $output .= '<div class="alert_content">';
        $output .= do_shortcode($content);
        $output .= '</div>';
      }

    $output .= '</div>';
    return $output;
}

add_shortcode( 'tooltip', 'asalah_tooltip_shortcode' );
function asalah_tooltip_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "title" => '',
      "position" => "top", // top, bottom, left, right
      "delay" => "50",
    ), $atts));

    $tooltip_delay = 50;
    $tooltip_position = "top";

    if ($position) {
      $tooltip_position = $position;
    }

    if ($delay) {
      $tooltip_delay = $delay;
    }
    $output = '';
    $output .= '<span class="asalah_tooltip_shortcode" data-delay="'.$tooltip_delay.'" data-toggle="tooltip" data-placement="'.$tooltip_position.'"  title="'.$title.'">';
      $output .= do_shortcode($content);
    $output .= '</span>';
    return $output;
}

add_shortcode( 'color', 'asalah_color_shortcode' );
function asalah_color_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "weight" => "",
    ), $atts));

    $style_atts = '';

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }

    if ($weight) {
       $style_atts .= "font-weight:" .$weight. "; ";
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<span class="skin_color" '.$style_atts.'>';
      $output .= do_shortcode($content);
    $output .= '</span>';
    return $output;
}

add_shortcode( 'code', 'asalah_code_shortcode' );
function asalah_code_shortcode ($atts, $content = null) {
    $output = '<pre class="asalah_pre_shortcode">';
      $output .= do_shortcode($content);
    $output .= '</pre>';
    return $output;
}

add_shortcode( 'l', 'asalah_line_shortcode' );
function asalah_line_shortcode ($atts, $content = null) {
    extract(shortcode_atts(array(
      "space" => '0',
    ), $atts));
    $space = $space * 8;

    $line_style_att = "";
    if ($space) {
      $line_style_att = ' style="margin-left:'.$space.'px"';
    }
    $output = '<span class="asalah_code_line_shortcode" '.$line_style_att.'>';
      $output .= $content;
    $output .= '</span>';
    return $output;
}

add_shortcode( 'link', 'asalah_link_shortcode' );
function asalah_link_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "url" => '',
      "target" => '', // _blank
    ), $atts));

    $target_data = '';
    if ($target) {
      $target_data .= ' target="'.$target.'"';
    }

    $output = '<a class="asalah_link_shortcode" href="'.$url.'" '.$target_data.'>';
      $output .= do_shortcode($content);
    $output .= '</a>';
    return $output;
}

add_shortcode( 'dropcap', 'asalah_dropcap_shortcode' );
function asalah_dropcap_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "style" => '', // default, skin, circle, square
    ), $atts));

    $dropcap_style_atts = '';
    $dropcap_class = "";

    if ($style == "skin") {
      $dropcap_class = " skin_drop_cap skin_color";
    }

    if ($style == "circle") {
      $dropcap_class = " skin_circle_drop_cap skin_bg";
    }

    if ($style == "square") {
      $dropcap_class = " skin_square_drop_cap skin_bg";
    }

    $output = '<span class="asalah_dropcap '.$dropcap_class.'">';
      $output .= $content;
    $output .= '</span>';
    return $output;
}

add_shortcode( 'icon', 'asalah_icon_shortcode' );
function asalah_icon_shortcode ($atts) {
  extract(shortcode_atts(array(
      "color" => '',
      "size" => '',
      "name" => '',
      "align" => '', 
      "theme_color" => '', // yes or no
    ), $atts));

    $style_atts = '';
    $icon_style = "";
    $icon_class = "";

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }

    if ($size) {
       $style_atts .= "font-size:" .$size. "px; ";
    }

    if ($style_atts) {
      $icon_style = 'style="'.$style_atts.'"';
    }

    if ($theme_color == "yes") {
      $icon_class .= " skin_color";
    }

    if ($name) {
      $icon_class .= " " .$name;
    }

    if ($align) {
      $icon_class .= " icon_align_".$align;
    }

    $output = '<i class="icon_shortcode '.$icon_class.'" '.$icon_style.'></i>';
    return $output;
}

add_shortcode( 'br', 'asalah_br_shortcode' );
function asalah_br_shortcode ($atts) {
    $output = '<br />';
    return $output;
}

add_shortcode( 'space', 'asalah_space_shortcode' );
function asalah_space_shortcode ($atts) {
  extract(shortcode_atts(array(
      "size" => '',
    ), $atts));

    $style_atts = '';
    $space_style = "";

    if ($size) {
       $style_atts .= "height:" .$size. "px; ";
    }

    if ($style_atts) {
      $space_style = 'style="'.$style_atts.'"';
    }

    $output = '<div class="space_shortcode" '.$space_style.'></div>';
    return $output;
}

add_shortcode( 'marker', 'asalah_marker_shortcode' );
function asalah_marker_shortcode ($atts) {
  extract(shortcode_atts(array(
      "id" => '',
    ), $atts));

    if ($id) {
      $output = '<div id="'.$id.'" class="marker_shortcode"></div>';
    }
    return $output;
}

add_shortcode( 'id', 'asalah_id_shortcode' );
function asalah_id_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "value" => '',
    ), $atts));

    $output = '<span id="'.$value.'" class="custom_id_shortcode">'.do_shortcode($content).'</span>';
    return $output;
}

add_shortcode( 'bold', 'asalah_bold_shortcode' );
function asalah_bold_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "weight" => "",
    ), $atts));

    $style_atts = '';
    $animation_tags = '';

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }

    if ($weight) {
       $style_atts .= "font-weight:" .$weight. "; ";
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<strong class="strong_shortcode" '.$style_atts.'>';
      $output .= do_shortcode($content);
    $output .= '</strong>';
    return $output;
}

add_shortcode( 'quote', 'asalah_quote_shortcode' );
function asalah_quote_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "cite" => "",
      "cite_color" => "",
      "align" => '',
      "size" => '',
      "weight" => "",
      "line_height" => '',
      "margin_top" => '',
      "margin_bottom" => '',
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01'
    ), $atts));

    $text_class = '';
    $style_atts = '';
    $cite_atts = '';
    $animation_tags = '';

    if ($cite_color) {
      $cite_atts = "color:" .$cite_color. "; ";
    }

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }
    if ($size) {
      $style_atts .= "font-size:" .$size. "px; ";
    }
    if ($line_height) {
      $style_atts .= "line-height:" .$line_height. "px; ";
    }

    if (isset($margin_top) && $margin_top != '') {
      $style_atts .= " margin-top:".$margin_top."px;";
    }
    if (isset($margin_bottom) && $margin_bottom != '') {
      $style_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($weight) {
       $style_atts .= "font-weight:" .$weight. "; ";
    }

    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<blockquote class="pull-'.$align.'" '.$style_atts.' '.$animation_tags.'>';
      $output .= do_shortcode($content);
      if ($cite) {
        // check style tag
        if ($cite_atts != '') {
          $cite_atts = ' style="'.$cite_atts.'"'; // style tag changed
        }
        // end checking style tag
        $output .= '<cite '.$cite_atts.'>-'.$cite.'</cite>';
      }
    $output .= '</blockquote>';
    return $output;
}

add_shortcode( 'text', 'asalah_text_shortcode' );
function asalah_text_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "size" => '',
      "weight" => "",
      "line_height" => '',
      "margin_top" => '',
      "margin_bottom" => '',
      "paragraph" => "no",
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01'
    ), $atts));

    $text_class = '';
    $style_atts = '';
    $animation_tags = '';

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }
    if ($size) {
      $style_atts .= "font-size:" .$size. "px; ";
    }
    if ($line_height) {
      $style_atts .= "line-height:" .$line_height. "px; ";
    }

    if ($margin_top) {
      $style_atts .= " margin-top:".$margin_top."px;";
    }
    if ($margin_bottom) {
      $style_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($weight) {
       $style_atts .= "font-weight:" .$weight. "; ";
    }

    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<span class="text_shortcode '.$text_class.'" '.$style_atts.' '.$animation_tags.'>';
      $output .= do_shortcode($content);
    $output .= '</span>';
    if ($paragraph == "yes") {
      $output .= "<p />";
    }
    return $output;
}

add_shortcode( 'list', 'asalah_list_shortcode' );
function asalah_list_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "size" => '',
      "line_height" => '',
      "weight" => '',
      "align" => '',
      "margin_top" => '',
      "margin_bottom" => '',
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01'
    ), $atts));

    $contetn_class = '';
    $style_atts = '';
    $animation_tags = '';

    if ($align) {
      $style_atts .= ' text-align:'.$align.';';
    }

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }
    if ($size) {
      $style_atts .= "font-size:" .$font_size. "px; ";
    }
    if ($line_height) {
      $style_atts .= "line-height:" .$line_height. "px; ";
    }
    if ($margin_top) {
      $style_atts .= " margin-top:".$margin_top."px;";
    }
    if ($margin_bottom) {
      $style_atts .= " margin-bottom:".$margin_bottom."px;";
    }
    if ($weight) {
      $style_atts .= "font-weight:" .$weight. "; ";
    }

    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag

    $output = '<ul class="asalah_list clearfix '.$contetn_class.'" '.$style_atts.' '.$animation_tags.'>';
      $output .= do_shortcode($content);
    $output .= '</ul>';
    return $output;
}

add_shortcode( 'list_item', 'asalah_list_item_shortcode' );
function asalah_list_item_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "size" => '',
      "icon" => "",
      "icon_color" => "",
      "icon_size" => "",
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01'
    ), $atts));

    $text_class = '';
    $style_atts = '';
    $icon_style = "";

    $animation_tags = '';

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }
    if ($size) {
      $style_atts .= "font-size:" .$size. "px; ";
    }

    if ($icon) {
      if (preg_match('#^(?:https?|ftp)://#', $icon, $m)) {
        if ($icon_size) {
          $icon_style .= "height:" .$icon_size. "px; width:auto;";
        }

        // check style tag
        if ($icon_style != '') {
          $icon_style = ' style="'.$icon_style.'"'; // style tag changed
        }
        // end checking style tag
        $icon_output = '<img src="'.$icon.'" class="asalah_list_icon" '.$icon_style.' />';
      }else{
        if ($icon_color) {
          $icon_style .= "color:" .$icon_color. "; ";
        }
        if ($icon_size) {
          $icon_style .= "font-size:" .$icon_size. "px; ";
        }

        // check style tag
        if ($icon_style != '') {
          $icon_style = ' style="'.$icon_style.'"'; // style tag changed
        }
        // end checking style tag
        $icon_output = '<i class="asalah_list_icon skin_color '.$icon.'" '.$icon_style.'></i>';
      }
    }


    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<li class="asalah_list_item '.$text_class.'" '.$style_atts.' '.$animation_tags.'>';
      if ($icon_output) {
        $output .= $icon_output;
      }
      $output .= do_shortcode($content);
    $output .= '</li>';
    return $output;
}

add_shortcode( 'set', 'asalah_set_shortcode' );
function asalah_set_shortcode ($atts, $content = null) {
    extract(shortcode_atts(array(
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
    ), $atts));

    $animation_tags = '';
    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' set-animation="'.$effect.'"';
    }

    $output = '<div class="sorted_effect" '.$animation_tags.'>';
      $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}

add_shortcode( 'content', 'asalah_content_shortcode' );
function asalah_content_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "color" => '',
      "size" => '',
      "line_height" => '',
      "weight" => '',
      "align" => '',
      "margin_top" => '',
      "margin_bottom" => '30',
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01'
    ), $atts));

    $contetn_class = '';
    $style_atts = '';
    $animation_tags = '';

    if ($color) {
      $style_atts .= "color:" .$color. "; ";
    }
    if ($size) {
      $style_atts .= "font-size:" .$font_size. "px; ";
    }
    if ($line_height) {
      $style_atts .= "line-height:" .$line_height. "px; ";
    }
    if ($weight) {
      $style_atts .= "font-weight:" .$weight. "; ";
    }
    if (isset($margin_top) && $margin_top != '') {
      $style_atts .= " margin-top:".$margin_top."px;";
    }
    if (isset($margin_bottom) && $margin_bottom != '') {
      $style_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    // check style tag
    if ($style_atts != '') {
      $style_atts = ' style="'.$style_atts.'"'; // style tag changed
    }
    // end checking style tag
    $output = '<div class="clearfix text-'.$align.' '.$contetn_class.'" '.$style_atts.' '.$animation_tags.'>';
      $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}

add_shortcode( 'testimonial', 'asalah_testimonial_shortcode' );
function asalah_testimonial_shortcode ($atts, $content) {
  extract(shortcode_atts(array(
      "style" => 'default', // default, center
      "author" => '',
      "image" => '',
      "url" => '',
      "position" => '',

      "bg_color" => '',
      "text_color" => "",
      "size" => "", // font size
      "line_height" => "",
      "name_color" => "",
      "position_color" => "",

      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01'
    ), $atts));

  $animation_tags = '';

  if (is_numeric($image)) {
    $image = wp_get_attachment_url( $image );
  }

  // define style variables
  $text_style = $name_style = $pos_style = $arrow_style = "";

  if ($bg_color) {
    $text_style .= 'background-color:'.$bg_color.';';
    $text_style .= 'margin-bottom:20px;';
    $arrow_style .= 'border-color:'.$bg_color.';';
  }
  if ($text_color) {
    $text_style .= 'color:'.$text_color.';';
  }
  if ($size) {
    $text_style .= 'font-size:'.$size.'px;';
  }
  if ($line_height) {
    $text_style .= 'line-height:'.$line_height.'px;';
  }

  if ($name_color) {
    $name_style .= 'color:'.$name_color.';';
  }

  if ($position_color) {
    $pos_style .= 'color:'.$position_color.';';
  }

  // add animiation effects tags
  if ($effect) {
    $animation_tags .= ' data-animation="'.$effect.'"';
  }
  if ($effect_delay) {
    $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
  }

  $output = '<div class="testimonial_item testimonial_style_'.$style.' clearfix" '.$animation_tags.'>'; // start testimonial
    // check style tag
    if ($text_style != '') {
      $text_style = ' style="'.$text_style.'"'; // style tag changed
    }
    // end checking style tag
    $output .= '<div class="testimonials_text" '.$text_style.'>'; // start testimonials_text
      $output .= $content;
      // check style tag
      if ($arrow_style != '') {
        $arrow_style = ' style="'.$arrow_style.'"'; // style tag changed
      }
      // end checking style tag
      $output .= '<span class="testimonial_arrow" '.$arrow_style.'></span>';
    $output .= '</div>';  // end testimonials_text

    $output .= '<div class="testimonials_author">'; // start testimonial author
      if ($image) { $output .= '<div class="testimonial_avatar"><img src="'.$image.'"></div>'; }
      $output .= '<div class="testimonial_info">';
        if ($url) { $output .= '<a href="'.$url.'" target="_blank">'; } // check if url is set and open a tag
          // check style tag
          if ($name_style != '') {
            $name_style = ' style="'.$name_style.'"'; // style tag changed
          }
          // end checking style tag
          $output .= '<span class="testimonial_author_name" '.$name_style.'>'.$author.'</span>';
          // check style tag
          if ($pos_style != '') {
            $pos_style = ' style="'.$pos_style.'"'; // style tag changed
          }
          // end checking style tag
          $output .= '<span class="testimonial_author_position" '.$pos_style.'>'.$position.'</span>';
        if ($url) { $output .= '</a>'; } // check if url is set and close a tag
      $output .= '</div>'; // end testimonial_info
    $output .= '</div>'; // end testimonial author testimonials_author
  $output .= '</div>'; // end testimonial testimonial_item
  return $output;
}

add_shortcode( 'clients', 'asalah_clients_shortcode' );
function asalah_clients_shortcode ($atts, $content = null) {

    extract(shortcode_atts(array(
      "align" => 'center',
      "margin_top" => "",
      "margin_bottom" => "",
      "tooltip" => "no", // no, yes
    ), $atts));

    $client_style_atts = "";
    $clients_style = "";
    $clients_class = "";

    if ($tooltip == "yes") {
      $clients_class = " clients_tooltip";
    }

    if (isset($margin_top) && $margin_top != "") {
      $client_style_atts .= " margin-top:".$margin_top."px;";
    }
    if (isset($margin_bottom) && $margin_bottom != "") {
      $client_style_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($client_style_atts != "") {
      $clients_style = 'style="'.$client_style_atts.'"';
    }



    $output = '<div class="clients_grid '.$clients_class.' text-'.$align.'" '.$clients_style.'><div class="clients_list">';
      $output .= do_shortcode($content);
      $output .= '<div style="margin-top:-40px"></div>';
    $output .= '</div></div>';
    return $output;
}

add_shortcode( 'client', 'asalah_client_shortcode' );
function asalah_client_shortcode ($atts) {

  extract(shortcode_atts(array(
    "image" => '',
    "name" => '',
    "url" => '',
    "max_height" => "",
    "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
    "effect_delay" => '01'
  ), $atts));

  if (is_numeric($image)) {
    $image = wp_get_attachment_url( $image );
  }

  $animation_tags = '';

  // add animiation effects tags
  if ($effect) {
    $animation_tags .= ' data-animation="'.$effect.'"';
  }
  if ($effect_delay) {
    $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
  }

  $image_atts = '';
  if ($max_height) {
    $image_atts .= ' max-height: '.$max_height.'px;'; 
  }

  $output = '<div class="clients_item" '.$animation_tags.'>'; // start clients_item
    if ($url) { $output .= '<a href="'.$url.'" target="_blank">'; } // check if url is set and open a tag
      // check style tag
      if ($image_atts != '') {
        $image_atts = ' style="'.$image_atts.'"'; // style tag changed
      }
      // end checking style tag
      $output .= '<img src="'.$image.'" title="'.$name.'" '.$image_atts.' data-delay="50" />';
    if ($url) { $output .= '</a>'; } // check if url is set and close a tag
  $output .= '</div>'; // end clients_item
  return $output;
}



add_shortcode( 'projects', 'asalah_project_grid_shortcode' );
function asalah_project_grid_shortcode($atts) {
	extract(shortcode_atts(array(
      "number" => '6',
      "style" => 'default', // default, full, classic, grid, text
      "order" => 'date',
      'button' => '',
      'url' => '',
      'columns' => '',
      'button_style' => '', // default, full
      'except' => '',
      'tags' => '',
      'one_by_one' => 'no', // yes, no
      'effect' => "",
      "gray" => "", // yes, semi, no
    ), $atts));

  global $post;
  $wrapper_class = '';

  if ($gray == "yes") {
    $wrapper_class .= ' gray_scale_projects';
  }
  if ($gray == "semi") {
    $wrapper_class .= ' semi_gray_scale_projects';
  }

  $column_class = 'one_third';
  if ($columns == '1') {
    $column_class = 'full_column';
  }
  if ($columns == '2') {
    $column_class = 'one_half';
  }
  if ($columns == '3') {
    $column_class = 'one_third';
  }
  if ($columns == '4') {
    $column_class = 'one_fourth';
  }
  if ($columns == '5') {
    $column_class = 'one_fifth';
  }
  if ($columns == '6') {
    $column_class = 'one_sixth';
  }

	if ($except == '') {
		$args = array('post_type' => 'project', 'orderby' => $order, 'posts_per_page' => $number);  
	}else{
		$args = array('post_type' => 'project', 'orderby' => $order, 'posts_per_page' => $number, 'post__not_in' => array($except));  	
	}

	if ($tags != '') {
		$args['tagportfolio'] = $tags;
	}

  $style_class = 'style_default';
  $button_style_class = '';
  if ($style) {
    $style_class = 'style_'.$style;
  }
	 
  $one_by_one_effect = "fadeInUp";
  if ($effect) {
    $one_by_one_effect = $effect;
  }
	$wp_query = new WP_Query($args);

  $full_portfolio_class = "";
  if ($style == "full") {
    $full_portfolio_class .= " filterable_grid full_project_shortcode_grid";
    $wrapper_class .= " filterable_grid";
  }

  $output = '';
	if ( $wp_query ) :
		$output .= '<div class="projects_wrapper projects_shortcode projects_grid '.$wrapper_class.' '.$style_class.'">';
			$output .= '<div class="thumbnails portfolio_grid grid row '.$full_portfolio_class.'">';
        if ($style != 'full') { $output .= '<div class="col-md-12"><div class="asalah_projects_shortcode_row asalah_row">'; } // start col-md-12 and asalah_row if style not full
          if ($one_by_one == 'yes') {
            $output .= '<div class="sorted_effect" set-animation="'.$one_by_one_effect.'">';
          }
  				while ( $wp_query->have_posts() ) : $wp_query->the_post();
            $project_tags = get_the_term_list( $post->ID, 'tagportfolio', '',', ','');

  					$output .= '<li class="'.$column_class.' portfolio_grid_list filterable_item clearfix grid_list">';
  						$output .= '<figure class="portfolio_figure overlay_fade">';
                $output .= '<a href="'.get_permalink().'">';
                if (get_the_post_thumbnail($post->ID)) {
                  $output .= get_the_post_thumbnail($post->ID, 'portfolio', array( 'class' => 'img-responsive' ) );
                }else{
                  // if no project thumbnail show default thumbnail
                  $output .= '<img src="'.asalah_option('asalah_default_project_thumbnail').'" class="img-responsive"/>';
                }
                $output .= '</a>';
  							
                $output .= '<div class="overlay_color"></div>';
  							$output .= '<a href="'.get_permalink().'">';
                  $output .= '<figcaption  class="portfolio_caption">';
    								$output .= '<h4 class="title">'.get_the_title().'</h4>'; // seperate title into two parts
                    $output .= '<span class="portfolio_category">'.strip_tags($project_tags).'</span>';
                    $output .= '<p class="project_text">'.excerpt(15).'</p>';
    							$output .= '</figcaption>'; // end portfolio_caption
                $output .= '</a>';
  						$output .= '</figure>'; // end portfolio_figure overlay_fade
  					$output .= '</li>'; // portfolio_grid_list
  				endwhile;
          if ($one_by_one == 'yes') {
            $output .= '</div>';
          }
        if ($style != 'full') { $output .= '</div></div>'; } // end col-md-12 and asalah_row
			$output .= '</div>'; // end thumbnails portfolio_grid grid row
		$output .= '</div>'; // end projects_wrapper
	endif;

  // start view all button
  if ($url && $button) {
    if ($button_style == 'full') {
      $output .= '<div class="view_all_button button_style_full">';
        $output .= '<a href="'.$url.'">';
            $output .= $button;
        $output .= '</a>';
      $output .= '</div>'; // end view_all_button button_style_full
    }else{
      $output .= '<div class="view_all_button button_style_default">';
        $output .= '<a href="'.$url.'">';
          $output .= '<span class="asalah_button button_medium button_soft">';
            $output .= $button;
          $output .= '</span>';
        $output .= '</a>';
      $output .= '</div>'; // end view_all_button button_style_default
    }
  }
  // end view all button
	
  return $output;
}

add_shortcode( 'blog_posts', 'asalah_blog_posts_shortcode' );
function asalah_blog_posts_shortcode($atts) {
  extract(shortcode_atts(array(
      "number" => '3',
      "order" => 'date',
      "style" => "grid", //grid, list
      'button' => '',
      'url' => '',
      'words' => "15", 
      'except' => '',
      'image_width' => "",
      'tags' => '',
      'bg_color' => '',
      'title_color' => '',
      'text_color' => '',
      'meta_color' => '',
      "show_date" => "yes", // yes or no
      "show_time" => "no", // yes or no
      "show_comments" => "yes", // yes or no
      "show_author" => "yes", // yes or no
      "one_by_one" => 'no',
      'effect' => "",
    ), $atts));

  global $post;
  global $asalah_data;

  if ($except == '') {
    $args = array('orderby' => $order, 'posts_per_page' => $number);  
  }else{
    $args = array('orderby' => $order, 'posts_per_page' => $number, 'post__not_in' => array($except));    
  }

  if ($tags != '') {
    $args['tag_slug__in'] = $tags;
  }

  $bg_style = '';
  $title_style = '';
  $text_style = '';
  $figure_atts = '';
  $meta_style = '';
  $posts_wrapper_class = "";

  if ($image_width) {
    $figure_atts = ' width:'.$image_width.'px;';
  }

  if ($bg_color) {
    $bg_style .= ' background-color:' . $bg_color .';';
  }

  if ($title_color) {
    $title_style .= ' color:' . $title_color .';';
  }

  if ($text_color) {
    $text_style .= ' color:' . $text_color .';';
  }

  if ($meta_color) {
    $meta_style .= ' color:' . $meta_color .';';
  }

  $one_by_one_effect = "fadeInUp";
  if ($effect) {
    $one_by_one_effect = $effect;
  }

  if ($style == "grid") {
    $posts_wrapper_class .= " filterable_wrapper";
  }
   
  $wp_query = new WP_Query($args);

  if ( $wp_query ) :
    $output = '<div class="posts_wrapper blog_posts_wrapper '.$posts_wrapper_class.'">';
      $output .= '<div class="posts_grid '.$style.' row">';
        $output .= '<div class="col-md-12">';
          if ($style == "grid") { $output .= "<div class='asalah_row filterable_grid filterable_blog_shortcode'>"; }else{ $output .= '<div class="asalah_row">'; }

          if ($one_by_one == 'yes') {
            $output .= '<div class="sorted_effect" set-animation="'.$one_by_one_effect.'">';
          }

          // check style tag
          if ($figure_atts != '') {
            $figure_atts = ' style="'.$figure_atts.'"'; // style tag changed
          }
          
          while ( $wp_query->have_posts() ) : $wp_query->the_post();

            $output .= '<li class="one_third filterable_item post_grid_list grid_list">';
              // end checking style tag

              if (get_the_post_thumbnail()) {
                $output .= '<figure class="post_figure" '.$figure_atts.'>';
                  $output .= '<a href="'.get_permalink().'">';
                  $output .= get_the_post_thumbnail($post->ID, 'bloggrid', array( 'class' => 'img-responsive' ));
                  $output .= '</a>';
                $output .= '</figure>'; // close post_figure
              }

              // check style tag
              if ($bg_style != '') {
                $bg_style = ' style="'.$bg_style.'"'; // style tag changed
              }
              // end checking style tag
              $output .= '<div class="post_caption" '.$bg_style.'>';
                $output .= '<a href="'.get_permalink().'">';
                  // check style tag
                  if ($title_style != '') {
                    $title_style = ' style="'.$title_style.'"'; // style tag changed
                  }
                  // end checking style tag
                  $output .= '<h4 class="title" '.$title_style.'>'.get_the_title().'</h4>'; // seperate title into two parts
                $output .= '</a>';

                // check style tag
                if ($text_style != '') {
                  $text_style = ' style="'.$text_style.'"'; // style tag changed
                }
                // end checking style tag
                $output .= '<p '.$text_style.'>'.excerpt($words).'</p>';

                // check style tag
                if ($meta_style != '') {
                  $meta_style = ' style="'.$meta_style.'"'; // style tag changed
                }
                // start post meta
                $output .= '<div class="post_meta" '.$meta_style.'>';
                  if ($show_date != 'no') {
                    $output .= '<span class="post_meta_item post_meta_date"><i class="fa fa-calendar"></i> ' . get_the_time(get_option('date_format')) . '</span>';
                  }
                  if ($show_time != 'no') {
                    $output .= '<span class="post_meta_item post_meta_time"><i class="fa fa-clock-o"></i> ' . get_the_time() . '</span>';
                  }
                  if ($show_comments != 'no') {
                    $output .= '<span class="post_meta_item post_meta_comments"><i class="fa fa-comments"></i> ' . get_comments_number() . '</span>';
                  }
                  if ($show_author != 'no') {
                    $output .= '<span class="post_meta_item post_meta_author"><i class="fa fa-user"></i> ' . get_the_author() . '</span>';
                  }
                $output .= '</div>';
                // end post meta

              $output .= '</div>'; // close post_caption


            $output .= '</li>'; // close posts_grid_list grid_list
          endwhile;
          if ($one_by_one == 'yes') {
            $output .= '</div>';
          }
          $output .= '</div>'; // close asalah_row
        $output .= '</div>'; // close col-md-12
      $output .= '</div>'; // close posts_grid grid
    $output .= '</div>'; // close posts_wrapper
  endif;

  if ($url && $button) {
    $output .= '<div class="view_all_button '.$style.'_style_button">';
      $output .= '<a href="'.$url.'">';
        $output .= '<span class="asalah_button button_medium button_soft">';
          $output .= $button;
        $output .= '</span>';
      $output .= '</a>';
    $output .= '</div>';
  }
  
  return $output;
}

add_shortcode('map','asalah_map_shortcode');
function asalah_map_shortcode ($atts, $content) {
  global $location_number;

  if (asalah_option('asalah_map_api')) {
      $gmap_script_url = 'https://maps.googleapis.com/maps/api/js?key='.asalah_option('asalah_map_api');
      wp_register_script('asalah_googlemap_script', $gmap_script_url, array( 'jquery' ), false, true );
      wp_enqueue_script('asalah_googlemap_script');
  }
  wp_enqueue_script('asalah_googlemap');

  $maker_positions = '';
  foreach ( $atts as $key => $value ) {
    if ( stristr( $key, 'lat' ) ) {
      $the_lat = $the_long = $number = $long_key = null;
      // get latitude value
      $the_lat = $value;

      // get the number of every latitude by removing the word "lat" from the string
      $number = str_replace('lat', '', $key);

      // set a variable for longitude key

      $long_key = "long".$number;

      // use the variable of skills percent to create percantage array
      if ( isset($atts[$long_key]) && $atts[$long_key] ) {
        $the_long = $atts[$long_key];

        $location_key = "location".$number;
        $location_atts = ' data-location=""';
        if (isset($atts[$location_key]) && $atts[$location_key]) {
          $location_atts = ' data-location="'.$atts[$location_key].'"';
        }
        $maker_positions .= '<span class="map_locations_hidden hidden" data-latitude="'.$the_lat.'" data-longitude="'.$the_long.'" '.$location_atts.'></span>';
      }

    }
  }

  extract(shortcode_atts(array(
    'width'     => '100%',
    'height'    => '500px',
    'style'     => '1', 
    'zoom'      => '15',
    'marker'    => get_template_directory_uri().'/images/pointer.png',
    'lat' => '',
    'long' => '',
    'frame' => '', //no, light, dark
  ), $atts));

  if ($long && $lat) {
    $maker_positions .= '<span class="map_center_hidden hidden" data-latitude="'.$lat.'" data-longitude="'.$long.'"></span>';
  }

  $map_style_atts = $map_style = $map_data_atts = $wrapper_class ="";

  if ($frame == "yes") {
    $wrapper_class .= ' image_frame';
  }elseif($frame == "light") {
    $wrapper_class .= ' image_frame light_frame';
  }elseif($frame == "dark") {
    $wrapper_class .= ' image_frame dark_frame';
  }

  if (isset($zoom) && $zoom != "") {
    $map_data_atts .= ' data-map-zoom="'.$zoom.'"';
  }
  if ($style) {
    $map_data_atts .= ' data-map-style="'.$style.'"';
  }
  if ($marker) {
    $map_data_atts .= ' data-map-marker="'.$marker.'"';
  }

  if ($width) {
    $map_style_atts .= ' width:'.$width.';';
  }
  if ($height) {
    $map_style_atts .= ' height:'.$height.';';
  }

  if ($map_style_atts != "") {
    $map_style = ' style="'.$map_style_atts.'"';
  }

  $output = '';
  if (asalah_option('asalah_map_api')) {
    
    $output .= '<div class="asalah_google_map_wrapper '.$wrapper_class.'" '.$map_data_atts.'>';
    if ($maker_positions != '' ) {
      $output .= $maker_positions; 
    }
    $loaction_number = 0;
    $output .= do_shortcode($content);
    $output .= '<div class="asalah_map_container" '.$map_style.'></div>';
    $output .= '<div id="map-zoom-in" class="asalah_map_zoom asalah_map_zoom_in"><i class="fa fa-plus"></i></div><div id="map-zoom-out" class="asalah_map_zoom asalah_map_zoom_out"><i class="fa fa-minus"></i></div>';
    $output .= '</div>';
  }else{
    $output .= '<div class="alert alert-info" role="alert">';
    $output .= __('Google map requires Google API to work, if you are the admin of this site please go to ', 'asalah');
    $output .= '<strong>' . __('Control Panel > Theme Options > Social Settings', 'asalah') . '</strong>';
    $output .= __(' and add you Google Map Javascript API, you will find more details about creating it there.', 'asalah');
    $output .= '</div>';
  }

return $output ;
}

add_shortcode( 'location', 'asalah_location_shortcode' );
function asalah_location_shortcode ($atts) {

    global $location_number;
    $location_number++;

    extract(shortcode_atts(array(
      'name' => '',
      'lat' => '',
      'long' => '',
    ), $atts));
    $output = '';

    $output .= '<span class="map_locations_hidden hidden" data-latitude="'.$lat.'" data-longitude="'.$long.'" data-location="'.$name.'"></span>';
    if ($location_number == 1) {
      $output .= '<span class="map_center_hidden hidden" data-latitude="'.$lat.'" data-longitude="'.$long.'" data-location="'.$name.'"></span>';
    }

    return $output;
}

add_shortcode( 'team', 'asalah_team_shortcode' );
function asalah_team_shortcode ($atts, $content = null) {

    $output = '<div class="team_grid"><div class="team_list">';
      $output .= do_shortcode($content);
      $output .= '<div style="margin-top:-40px"></div>';
    $output .= '</div></div>';
    return $output;
}

add_shortcode( 'member', 'asalah_member_shortcode' );
function asalah_member_shortcode ($atts) {


  extract(shortcode_atts(array(
    "skills_bg" => "",
    "skills_bar_color" => "",
    "skills_animate" => "no", // yes or no
  ), $atts));

  $member_skils_output = "";
  foreach ( $atts as $key => $skill ) {
    $value = "0";
    if ( stristr( $key, 'skill' ) ) {
      

      // get the number of every skill by removing the word "skill" from the string
      $number = str_replace('skill', '', $key);

      // set a variable for skills percent
      $percentkey = "percent".$number;

      // use the variable of skills percent to create percantage array
      if ( isset($atts[$percentkey]) && $atts[$percentkey] ) {

        $value = $atts[$percentkey];

        ////////////////////////////// Start skills options ////////////////////////////
        $progress_style_atts = '';
        $progress_style = '';
        $bar_style_atts = '';
        $bar_style = '';
        $bar_atts = '';
        $bar_value = '';
        $bar_class= '';
        $progress_class = '';
        $bg_color = "";
        $bar_color = "";

 
        if (isset($skills_bar_color) && $skills_bar_color != '') {
          $bar_color = $skills_bar_color;
        }
        if (isset($skills_bg) && $skills_bg != '') {
          $bar_color = $skills_bg;
        }

        if ($value) {
          $start_value = $value;
          if ($skills_animate == "yes") {
            $start_value = 0;
            $bar_class .= " animated_progress_bar";
            $progress_class .= " animated_progress";
          }
          $bar_value = 'aria-valuenow="'.$value.'" ';
          $bar_style_atts .= ' width:'.$start_value.'%;';
        }

        if ($bg_color) {
          $progress_style_atts .= ' background-color: '.$bg_color.';';
        }

        if ($bar_color) {
          $bar_style_atts .= ' background-color: '.$bar_color.';';
        }

        $bar_min = 'aria-valuemin="0" ';
        $bar_max = 'aria-valuemax="100" ';

        if ($progress_style_atts != '' ) {
          $progress_style = 'style="'.$progress_style_atts.'" ';
        }

        if ($bar_style_atts != '') {
          $bar_style = 'style="'.$bar_style_atts.'" ';
        }

        
        $bar_atts = $bar_value . $bar_min . $bar_max . $bar_style;
        ////////////////////////////////////////////////////////
        
          $member_skils_output .= '<span class="skill_title">'.$skill.'</span>';
          $member_skils_output .= '<div class="progress '.$progress_class.'" '.$progress_style.'>';
            $member_skils_output .= '<div class="progress-bar skin_bg '.$bar_class.'" role="progressbar" '.$bar_atts.'>';
            $member_skils_output .= '</div>';
          $member_skils_output .= '</div>';
      }

    }
  }

  extract(shortcode_atts(array(
    "name" => '',
    "text" => '',
    "position" => '',
    "image" => '',
    "url" => "",
    "bg_color" => "",
    "title_color" => "",
    "position_color" => "",
    "text_color" => "",
    "social_bg" => "",
    "social_color" => "",
    "social_border_color" => "",
    "website" => '',
    "mail" => '',
    "fb" => '',
    "twitter" => '',
    "linkedin" => '',
    "pinterest" => '',
    "skype" => '',
    "instagram" => '',
    "google" => '',
    "youtube" => '',
    "dribbble" => '',
    "behance" => '',
    "frame" => "", // no, light, dark
    "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
    "effect_delay" => '01',
    "skill_border_color" => "",
  ), $atts));

  $member_style = $social_style = $title_style = $position_style = $text_style = $social_border_style = $member_avatar_class = '';

  $skill_style = "";
  $skill_style_atts = "";

  if ($skill_border_color) {
    $skill_style_atts.= ' border-color:'.$social_border_color.';';
  }

  if ($skill_style_atts != '') {
    $skill_style = 'style="'.$skill_style_atts.'" ';
  }

  if ($frame == "yes") {
    $member_avatar_class .= ' image_frame';
  }elseif($frame == "light") {
    $member_avatar_class .= ' image_frame light_frame';
  }elseif($frame == "dark") {
    $member_avatar_class .= ' image_frame dark_frame';
  }


  if ($bg_color) {
    $member_style .= ' background-color:'.$bg_color.';';
    $member_style .= ' padding: 20px 20px 30px; margin-top: -14px;';
  }

  if ($social_bg) {
    $social_style .= ' background-color:'.$social_bg.';';
  }

  if ($social_border_color) {
    $social_border_style .= ' border-color:'.$social_border_color.';';
  }

  if ($social_color) {
    $social_style .= ' color:'.$social_color.';';
  }

  if ($title_color) {
    $title_style .= ' color:'.$title_color.';';
  }

  if ($position_color) {
    $position_style .= ' color:'.$position_color.';';
  }

  if ($text_color) {
    $text_style .= ' color:'.$text_color.';';
  }

  
  // add animiation effects tags
  $animation_tags = '';
  if ($effect) {
    $animation_tags .= ' data-animation="'.$effect.'"';
  }
  if ($effect_delay) {
    $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
  }

  // creating output
  $output = '';
  // check social links and add them to social_output variable
  $social_output = '';

  // check style tag
  if ($social_style != '') {
    $social_style = ' style="'.$social_style.'"'; // style tag changed
  }
  // end checking style tag

  if ($website) {
    $social_output .= '<div class="social_item website_item"><a '.$social_style.' href="'.$website.'" target="_blank"><i class="fa fa-globe"></i></a></div>';
  }
  if ($mail) {
    $social_output .= '<div class="social_item mail_item"><a '.$social_style.' href="mailto:'.$mail.'"><i class="fa fa-envelope"></i></a></div>';
  }
  if ($fb) {
    $social_output .= '<div class="social_item facebook_item"><a '.$social_style.' href="'.$fb.'" target="_blank"><i class="fa fa-facebook"></i></a></div>';
  }
  if ($twitter) {
    $social_output .= '<div class="social_item twitter_item"><a '.$social_style.' href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></div>';
  }
  if ($linkedin) {
    $social_output .= '<div class="social_item linkedin_item"><a '.$social_style.' href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a></div>';
  }
  if ($pinterest) {
    $social_output .= '<div class="social_item pinterest_item"><a '.$social_style.' href="'.$pinterest.'" target="_blank"><i class="fa fa-pinterest-p"></i></a></div>';
  }
  if ($skype) {
    $social_output .= '<div class="social_item skype_item"><a '.$social_style.' href="'.$skype.'" target="_blank"><i class="fa fa-skype"></i></a></div>';
  }
  if ($instagram) {
    $social_output .= '<div class="social_item instagram_item"><a '.$social_style.' href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a></div>';
  }
  if ($google) {
    $social_output .= '<div class="social_item google_item"><a '.$social_style.' href="'.$google.'" target="_blank"><i class="fa fa-google"></i></a></div>';
  }
  if ($youtube) {
    $social_output .= '<div class="social_item youtube_item"><a '.$social_style.' href="'.$youtube.'" target="_blank"><i class="fa fa-youtube"></i></a></div>';
  }
  if ($dribbble) {
    $social_output .= '<div class="social_item dribbble_item"><a '.$social_style.' href="'.$dribbble.'" target="_blank"><i class="fa fa-dribbble"></i></a></div>';
  }
  if ($behance) {
    $social_output .= '<div class="social_item behance_item"><a '.$social_style.' href="'.$behance.'" target="_blank"><i class="fa fa-behance"></i></a></div>';
  }

  $output = '<div class="member_item" '.$animation_tags.'>'; // start testimonial
    if ($image) { $output .= '<div class="member_avatar '.$member_avatar_class.'"><img class="img-responsive" src="'.$image.'"></div>'; }

    // check style tag
    if ($member_style != '') {
      $member_style = ' style="'.$member_style.'"'; // style tag changed
    }
    // end checking style tag
    $output .= '<div class="member_info clearfix" '.$member_style.'>';
      
      if ($name || $position) {
        if ($url) { $output .= '<a href="'.$url.'">'; } // check if url is set and open a tag
          $output .= '<div class="member_title">';
          // check style tag
          if ($title_style != '') {
            $title_style = ' style="'.$title_style.'"'; // style tag changed
          }
          // end checking style tag
          $output .= '<h4 class="member_name" '.$title_style.'>'.$name.'</h4>';
          $name_sep = "";
          if ($name && $position) {
            $name_sep = "/";
          }

          // check style tag
          if ($position_style != '') {
            $position_style = ' style="'.$position_style.'"'; // style tag changed
          }
          // end checking style tag
          $output .= '<span class="member_position skin_color" '.$position_style.'>'.$name_sep.' '.$position.'</span>';
          $output .= '</div>';
        if ($url) { $output .= '</a>'; } // check if url is set and close a tag
      }

      // check style tag
      if ($text_style != '') {
        $text_style = ' style="'.$text_style.'"'; // style tag changed
      }
      // end checking style tag
      $output .= '<div class="member_text" '.$text_style.'>'.$text.'</div>';

      if ($member_skils_output != "") {
        $output .= '<div class="member_skills" '.$skill_style.'>';
          $output .= '<div class="member_skills_wrapper">';
            $output .= $member_skils_output;
          $output .= '</div>';
        $output .= '</div>';
      }

      if ($social_output != "") {
        // check style tag
        if ($social_border_style != '') {
          $social_border_style = ' style="'.$social_border_style.'"'; // style tag changed
        }
        // end checking style tag
        $output .= '<div class="member_social_info" '.$social_border_style.'>';
          $output .= $social_output;
        $output .= '</div>';
      }

    $output .= '</div>'; // end member_info
  $output .= '</div>'; // end member member_item

  return $output;
}

/* counter shortcode */
add_shortcode( 'counter', 'asalah_counter_shortcode' );
function asalah_counter_shortcode ($atts) {
  extract(shortcode_atts(array(
      "icon" => "",
      "icon_color" => "",
      "title" => "",
      "title_color" => "",
      "count" => "",
      "time" => "1500",
      "count_color" => "",
      "border_color" => "",
      "bg_color" => "",
      "url" => "",
    ), $atts));

    $item_style = "";
    $icon_style = "";
    $title_style = "";
    $number_style = "";
    $count_data = "";

    if ($bg_color) {
      $item_style .= ' background-color:'.$bg_color.';';
    }

    if ($border_color) {
      $item_style .= ' border-color:'.$border_color.';';
    }

    if ($icon_color) {
      $icon_style .= ' color:'.$icon_color.';';
    }

    if ($title_color) {
      $title_style .= ' color:'.$title_color.';';
    }

    if ($count_color) {
      $number_style .= ' color:'.$count_color.';';
    }

    if ($time) {
      $count_data = ' data-count-time="'.$time.'"';
    }

    $output = "";
    // check style tag
    if ($item_style != '') { $item_style = ' style="'.$item_style.'"'; } // end checking style tag

    $output .= '<div class="countto_item" '.$item_style.'>';
      if ($url) { $output .= '<a href="'.$url.'">'; }
        // check style tag
        if ($icon_style != '') { $icon_style = ' style="'.$icon_style.'"'; } // end checking style tag
        if ($title_style != '') { $title_style = ' style="'.$title_style.'"'; } // end checking style tag
        if ($number_style != '') { $number_style = ' style="'.$number_style.'"'; } // end checking style tag

        $output .= '<span class="countto_icon" '.$icon_style.'><i class="'.$icon.'"></i></span>';
        $output .= '<span class="countto_title" '.$title_style.'>'.$title.'</span>';
        $output .= '<span class="countto_number" '.$number_style.' '.$count_data.'>'.$count.'</span>';
      if ($url) { $output .= '</a>'; }
    $output .= '</div>';
    return $output;
}

/* New image shortcode */
add_shortcode( 'img', 'asalah_image_shortcode' );
function asalah_image_shortcode ($atts) {
  extract(shortcode_atts(array(
      "url" => '',
      "lightbox" => "no", //yes, no
      "title" => "",
      "lightbox_title" => "",
      "align" => "center",
      "margin_top" => "",
      "margin_bottom" => "",
      "frame" => "", // no, light, dark
      "width" => "",
      "height" => "",
      "shadow" => "no", // 1->8
      "effect" => '', // fade, fade_left, fade_right, fade_top, fade_bottomottom, bounce
      "effect_delay" => '01'
    ), $atts));

    $style_atts = "";
    $animation_tags = "";
    $image_class = "";
    $wrapper_class = "";
    $image_size = "";
    $image_height = " height='auto'";
    $image_width = "";
    $image_style_atts = "";
    $image_style = "";

    

    if ($frame == "yes") {
      $wrapper_class .= ' image_frame';
    }elseif($frame == "light") {
      $wrapper_class .= ' image_frame light_frame';
    }elseif($frame == "dark") {
      $wrapper_class .= ' image_frame dark_frame';
    }

    if ($shadow != 'no') {
      $wrapper_class .= ' shadow_effect effect'.$shadow;
    }

    if ($margin_top) {
      $style_atts .= " margin-top:".$margin_top."px;";
    }
    if ($margin_bottom) {
      $style_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($width) {
      $image_style_atts .= " width:".$width."px;";
      $image_width = " width='".$width."'";
      $image_size .= $image_width;
    }
    if ($height) {
      $image_height = " height='".$height."'";
      $image_size .= $image_height;
    }

    if ($image_style_atts != "") {
      $image_style = 'style="'.$image_style_atts.'"';
    }
    // add animiation effects tags
    if ($effect) {
      $animation_tags .= ' data-animation="'.$effect.'"';
    }
    if ($effect_delay) {
      $animation_tags .= ' data-animation-delay="'.$effect_delay.'"';
    }

    $output = '';

    if ($style_atts != '') { $style_atts = ' style="'.$style_atts.'"'; } // end checking style tag
    $output = '<div class="image_shortcode_wrapper '.$wrapper_class.' align'.$align.'" '.$style_atts.'>';
    if ($lightbox == "yes") {
      $output .= '<a href="'. $url.'" class="fancybox" title="'.$lightbox_title.'">';
    }
    $output .= '<img class="layer1 asalah_image img-responsive" src="'.$url.'" alt="'.$title.'" '.$animation_tags.' '.$image_size.' '.$image_style.' />';
    if ($lightbox == "yes") {
      $output .= '</a>';
    }
    $output .= '</div>';
    return $output;
}

add_shortcode( 'lightbox', 'asalah_lightbox_shortcode' );
function asalah_lightbox_shortcode ($atts, $content) {
  extract(shortcode_atts(array(
      "url" => '',
      "title" => "",
      "iframe" => "no", // yes, no
    ), $atts));

    $fancy_class = "";
    if ($iframe == "yes") {
      $fancy_class = "fancybox.iframe";
    }
    $output = '';
    $output .= '<a href="'. $url.'" class="asalah_shortcode fancybox '.$fancy_class.'" title="'.$title.'">';
    $output .= do_shortcode($content);
    $output .= '</a>';
    return $output;
}

/* New image shortcode */
add_shortcode( 'pin', 'asalah_pin_shortcode' );
function asalah_pin_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "image" => '',
      "image_width" => "50",
      "image_float" => "left",
      "image_align" => "center",
    ), $atts));



    $content_width = 100-$image_width;

    $output = '';
    $output .= '<div class="asalah_row clearfix pin_container">';

    $output .= '<div class="pull-'.$image_float.' custom_column pinned_image" style="width:'.$image_width.'%">';
    $output .= '<div class="pinned text-'.$image_align.'"><img class="asalah_image img-responsive" src="'.$image.'" /></div>';
    $output .= "</div>"; // close // custom_column pinned_image

    $output .= '<div class="pinnned_content custom_column" style="width:'.$content_width.'%">'.do_shortcode($content).'</div>';

    $output .= '</div>'; // close asalah_row
    return $output;
}

add_shortcode( 'social', 'asalah_social_shortcode' );
function asalah_social_shortcode ($atts) {

    $networks = array("facebook" => "Facebook", "twitter" => "Twitter", "google-plus" =>  "Google Plus", "behance" => "Behance", "dribbble" => "Dribbble", "linkedin" => "Linked In", "youtube" => "Youtube", 'vimeo-square' => 'Vimeo', "vk" => "VK", "skype" => "Skype", "instagram" => "Instagram", "pinterest" => "Pinterest", "github" => "Github", "renren" => "Ren Ren", "flickr" => "Flickr", "rss" =>  "RSS");

    $activated = 0;
    $social_link_style = '';

    if ( isset($atts['color']) && $atts['color'] ) {
        $social_link_style .= ' background: none; background-color: '.$atts['color'].';';
    }
    if ( isset($atts['icons_color']) && $atts['icons_color'] ) {
        $social_link_style .= ' color: '.$atts['icons_color'].';';
    }

    $social_list_output = "";
    foreach ($networks as $network => $social ) {
        $social_id = strtolower($social);
        $social_id = str_replace(' ', '', $social_id);
        if ( isset($atts[$social_id]) && $atts[$social_id]) {
            $activated++;
            if ($activated == 1) {
                $social_list_output .= '<ul class="social_icons_list">';
            }
            if ($social_link_style != '') { $social_link_style = ' style="'.$social_link_style.'"'; } // end checking style tag
            $social_list_output .= '<li class="social_icon ' . $network . '_icon"><a '.$social_link_style.' target="_blank" title="'.$social.'" href="'.$atts[$social_id].'"><i class="fa fa-' . $network . '"></i></a></li>';
        }
    }
    if ($activated != "0") {
        $social_list_output .= '</ul>';
    }

    extract(shortcode_atts(array(
      "align" => 'default',
      "color" => "",
      "margin_top" => "",
      "margin_bottom" => "",
      "icons_color" => "",
    ), $atts));


    $my_social_atts = "";
    $my_social_style = "";

    if (isset($margin_top) && $margin_top != "") {
      $my_social_atts .= " margin-top:".$margin_top."px;";
    }
    if (isset($margin_bottom) && $margin_bottom != "") {
      $my_social_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($my_social_atts != "") {
      $my_social_style = 'style="'.$my_social_atts.'"';
    }

    $output = '<div class="my_socials_grid social_shortcode_grid social_custom_grid clearfix"><div class="my_social_list social_shortcode_list social_custom_list text-'.$align.'" '.$my_social_style.'>';
      $output .= $social_list_output;
    $output .= '</div></div>';
    return $output;
}

add_shortcode( 'my_social', 'asalah_my_socials_shortcode' );
function asalah_my_socials_shortcode ($atts) {

    extract(shortcode_atts(array(
      "align" => 'default',
      "color" => "",
      "margin_top" => "",
      "margin_bottom" => "",
      "icons_color" => "",
    ), $atts));

    $my_social_atts = "";
    $my_social_style = "";

    if (isset($margin_top) && $margin_top != "") {
      $my_social_atts .= " margin-top:".$margin_top."px;";
    }
    if (isset($margin_bottom) && $margin_bottom != "") {
      $my_social_atts .= " margin-bottom:".$margin_bottom."px;";
    }

    if ($my_social_atts != "") {
      $my_social_style = 'style="'.$my_social_atts.'"';
    }

    $output = '<div class="my_socials_grid social_shortcode_grid social_custom_grid clearfix"><div class="my_social_list social_shortcode_list social_custom_list text-'.$align.'" '.$my_social_style.'>';
      $output .= asalah_social_icons_list($color, $icons_color);
    $output .= '</div></div>';
    return $output;
}

add_shortcode( 'divider', 'asalah_divider_shortcode' );
add_shortcode( 'divider', 'asalah_divider_shortcode' );
function asalah_divider_shortcode ($atts) {

    extract(shortcode_atts(array(
      "type" => "single", // single, double, shadow
      "style" => 'solid', // solid, dashed, dotted 
      "color" => "",
      "align" => "center",
      "height" => "1",
      "width" => "100%", // percent or px
      "margin_top" => "20",
      "margin_bottom" => "20",
      "padding" => "5",
    ), $atts));

    $style_atts = "";
    $wrapper_class = "";

    $style_atts .= " border-bottom-width: ".$height."px;";
    $style_atts .= " border-bottom-style: ".$style.";";

    if ($type == "double") {
      $style_atts .= " border-top-width: ".$height."px;";
      $style_atts .= " border-top-style: ".$style.";";
      $style_atts .= " height: ".$padding."px;";

    }elseif ($type == "shadow") {
      $wrapper_class .= "shadow_divider";

    }
    if ($margin_top) {
      $style_atts .= " margin-top:".$margin_top."px;";
    }
    if ($margin_bottom) {
      $style_atts .= " margin-bottom:".$margin_bottom."px;";
    }
    if ($color) {
      $style_atts .= 'border-color: '.$color.';';
    }
    if ($width) {
      $style_atts .= 'width: '.$width.';';
    }

    if ($style_atts != '') { $style_atts = ' style="'.$style_atts.'"'; } // end checking style tag
    $output = '<div class="section_divider_wrapper '.$wrapper_class.' text-'.$align.'"><span class="section_divider" '.$style_atts.'></span></div>';
    return $output;
}

/* action block shortcode */
add_shortcode( 'action', 'asalah_action_shortcode' );
function asalah_action_shortcode($atts, $content = null) {
  extract(shortcode_atts(array(
      "title" => "",
      "button" => "",
      "button_position" => "default", //default, top, bottom
      "url" => "",
      "image" => "",
      "image_width" => "",
      "image_align" => "left", // left, right
      "image_bottom" => "0",
      "title_size" => "",

      "color" => "",
      "title_color" => "",
      "text_color" => "",
      "align" => "",
      "hilight" => "none", // left, top, right, bottom

      "content_margin_left" => "",
      "content_margin_right" => "",

      "button_style" => 'soft', // default, soft, gradient, flat
      "button_skin" => "theme_color", // light, dark
      "button_color" => '',
      "button_text_color" => '',
      "button_size" => 'small', // small, medium, large
      "button_radius" => '',
      "button_icon" => '',
      "button_icon_color" => "",
      "target" => "", //_self, _blank
      "button_margin_top" => '',
      "shadow" => "no", // 1 -> 8
      "style" => "light", // light, dark, skin, gray
      "frame" => "no", // no, normal, flat
      "frame_style" => "solid", // solid, dashed, dotted
    ), $atts));


  $output = '';
  $image_style = "";
  $wrapper_style = "";
  $content_style = "";
  $title_style = "";
  $text_style = "";
  $button_css = '';
  $icon_style = "";
  $button_class = '';
  $wrapper_class = '';
  $push_button_content_class = '';
  $button_target_data = '';

  if ($target) {
    $button_target_data .= ' target="'.$target.'"';
  }

  if ($align) {
    $push_button_content_class .= 'text-'.$align;
  }

  if ($frame != 'no') {
    $wrapper_class .= ' push_button_frame_'.$frame;
  }

  if ($button_position) {
    $wrapper_class .= ' push_button_button_position_'.$button_position;
  }

  if ($frame_style) {
    $wrapper_style .= ' border-style:'.$frame_style;
  }

  if ($shadow != 'no') {
    $wrapper_class .= ' shadow_effect effect'.$shadow;
  }
  if ($hilight) {
    $wrapper_class .= ' hilight_'.$hilight;
  }

  if ($style) {
    $wrapper_class .= ' push_button_style_' .$style;

    if ($style == "skin") {
      $wrapper_class .= ' skin_bg';
    }
  }

  if ($button_style) {
    $button_class .= ' button_'.$button_style;
  }
  if ($button_size) {
    $button_class .= ' button_'.$button_size;
  }

  if ($button_skin) {
    $button_class .= ' skin_'.$button_skin;
  }

  if ($button_icon_color) {
     $icon_style .= ' color:'.$button_icon_color.';';
  }

  if ($icon_style != "") {
    $icon_style = ' style="'.$icon_style.'"';
  }

  if ($button_color) {
    if ($button_style == "soft") {
      $button_css .= ' background-color:'.$button_color.';';
      $button_css .= ' border-color:'.$button_color.';';
    }elseif($button_style == "flat") {
      $darker_color = asalah_su_hex_shift($button_color, "darker", 25);
      $button_css .= ' background-color:'.$button_color.';';
      $button_css .= ' border-color:'.$button_color.';';
      $button_css .= ' border-bottom-color:'.$darker_color.';';
    }elseif($button_style == "gradient") {
      $lighter_color = asalah_su_hex_shift($button_color, "lighter", 25);
      $darker_color = asalah_su_hex_shift($button_color, "darker", 10);
      $button_css .= ' background-color:'.$button_color.';';
      $button_css .= ' border-color:'.$button_color.';';
      $button_css .= ' background-image: linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
      $button_css .= ' background-image: -o-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
      $button_css .= ' background-image: -moz-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
      $button_css .= ' background-image: -webkit-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
      $button_css .= ' background-image: -ms-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
    }else{
      $button_css .= ' border-color:'.$button_color.';';
      $button_css .= ' color:'.$button_color.';';
    }
  }

  if ($button_text_color) {
    $button_css .= ' color:' .$button_text_color .';';
  }
  if ($button_radius) {
    $button_css .= ' border-radius:'.$button_radius.'px;';
  }
  if ($button_margin_top) {
    $button_css .= ' margin-top:' . $button_margin_top . 'px;';
  }

  if ($image_width) {
    $image_style .= 'width:'.$image_width.'px;';
    $content_margin = $image_width + 40;
    $content_style .= 'margin-'.$image_align.': '.$content_margin.'px;';
  }

  if ($image_align == "right" ) {
    $image_style .= 'left: auto; right: 40px;';
  }

  if ($image_bottom) {
    $image_style .= 'bottom: '.$image_bottom.'px;';
  }

  if ($color) {
    $wrapper_style .= 'background-color: '.$color.';';
  }

  if ($title_color) {
    $title_style .= 'color: '.$title_color.';';
  }

  if ($title_size) {
    $title_style .= 'font-size: '.$title_size.'px;';
  }

  if ($text_color) {
    $content_style .= ' color: '.$text_color.';';
  }

  if ($content_margin_left) {
    $content_style .= 'margin-left: '.$content_margin_left.'px;';
  }

  if ($content_margin_right) {
    $content_style .= 'margin-right: '.$content_margin_right.'px;';
  }


  if ($wrapper_style != '') { $wrapper_style = ' style="'.$wrapper_style.'"'; } // end checking style tag
  $output .= '<div class="push_button clearfix '.$wrapper_class.'" '.$wrapper_style.'><div class="push_button_inner_container container">';

    if($image) {
      if ($image_style != '') { $image_style = ' style="'.$image_style.'"'; } // end checking style tag
      $output .= '<div class="push_button_image" '.$image_style.'>';
        $output .= '<img class="img-responsive" src="'.strip_tags($image).'" />';
      $output .= '</div>';
      }

      if ($content_style != '') { $content_style = ' style="'.$content_style.'"'; } // end checking style tag
      $output .= '<div class="push_button_content '.$push_button_content_class.'" '.$content_style.'>';
          
          // button for desktop version
          if ($button) {
            if ($url) { $output .= '<a class="desktop_push_button" href="'.$url.'" '.$button_target_data.'>'; } // check if url is set and open a tag
              if ($button_css != '') { $button_css = ' style="'.$button_css.'"'; } // end checking style tag
              $output .= '<span class="push_button_button asalah_button '.$button_class.'" '.$button_css.'>';
                $output .= strip_tags($button);
              $output .= '</span>';
            if ($url) { $output .= '</a>'; } // check if url is set and close a tag
          }

          $output .= '<div class="push_button_info">';
          if ($title) {
            if ($title_style != '') { $title_style = ' style="'.$title_style.'"'; } // end checking style tag
            $output .= '<h2 class="title" '.$title_style.'>'.strip_tags($title).'</h2>';
          }
          
          if($content) {
            if ($text_style != '') { $text_style = ' style="'.$text_style.'"'; } // end checking style tag
            $output .= '<p '.$text_style.'>'.do_shortcode($content).'</p>';
          }
          $output .= '</div>';

          // button for mobile version
          if ($button) {
            if ($url) { $output .= '<a class="mobile_push_button" href="'.$url.'" '.$button_target_data.'>'; } // check if url is set and open a tag
              if ($button_css != '') { $button_css = ' style="'.$button_css.'"'; } // end checking style tag
              $output .= '<span class="push_button_button asalah_button '.$button_class.'" '.$button_css.'>';
                $output .= strip_tags($button);
                if ($button_icon) {
                  $output .= '<i class="button_icon '.$button_icon.'" '.$icon_style.'></i>';
                }
              $output .= '</span>';
            if ($url) { $output .= '</a>'; } // check if url is set and close a tag
          }
          
    $output .= '</div>';

  $output .= '</div></div>';

  return $output;
}

add_shortcode( 'tabs', 'asalah_tabs_shortcode' );
function asalah_tabs_shortcode ($atts, $content) {

    extract(shortcode_atts(array(
      "style" => 'v_tabs', // v_tabs, h_tabs || v h || vertical horizontal
      "justify" => "yes", // yes, no
      "id" => "",
    ), $atts));

    if (!$id) {
      $id = 'tabs_'.random_id(6);
    }

    global $tabs_array;
    global $tab_count;
    global $i;

    $tabs_array = array();
    if (!isset($tab_count)) {
      $tab_count = 0;
    }
    

    do_shortcode($content); // important to run all nested shortcode first so we can get tabs_array content

    // define variables
    $tabs_class = "";
    $wrapper_class = "";
    if ($justify == 'yes')  {
      $tabs_class .= " nav-justified";
    }

    if ($style == "h" || $style == "horizontal" || $style == "h_tabs") {
      $wrapper_class = " h_tabs";
    } 

    $output = '<div class="tabs_shortcode asalah_tabs horizontal_tabs '.$wrapper_class.'" id="'.$id.'">';
      // start tabs title from tab shortcode
      
      $i = 1;
      $tab_id = $tab_count;
      $output .= '<ul class="nav nav-tabs '.$tabs_class.'" role="tablist">';
      foreach($tabs_array as $tab) {
        $tab_selected = $i == 1 ? 'active' : '';
        $output .= '<li class="tab_heading ' . $tab_selected . '"><a href="#tabcontent_' . $tab_id . '" data-toggle="tab">';
        $output .= $tab['title'];
        $output .= '</a></li>';
        $i++;
        $tab_id++;
      }
      $output .= '</ul>'; // close nav nav-tabs ul

      // start tabs content from tab shortcode
      
      $i = 1;
      $tab_id = $tab_count;
      $output .= '<div class="tab-content clearfix">';
      foreach($tabs_array as $tab) {
          $tab_selected = $i == 1 ? 'active' : '';
      
          $output .= '<div class="tab-pane fadeIn animated ' . $tab_selected . ' in" id="tabcontent_' . $tab_id . '">';
          $output .= do_shortcode($tab['content']);
          $output .= '</div>';
          $i++;
          $tab_id++;
      }
      $output .= '</div>';// close tab-content
    $output .= '</div>'; // close tabs_shortcode
    $tabs_array = array();
    return $output;
}

add_shortcode( 'tab', 'asalah_tab_shortcode' );
function asalah_tab_shortcode ($atts, $content) {

    extract(shortcode_atts(array(
      "title" => '',
    ), $atts));

    global $tabs_array;
    global $tab_count;

    $x = $tab_count;
    $tabs_array[$x] = array(
        'title' => $title,
        'content' => do_shortcode($content),
      );
    $tab_count++;
}

add_shortcode( 'toggle', 'asalah_toggle_shortcode' );
function asalah_toggle_shortcode($atts, $content) {
    extract(shortcode_atts(array(
        'title' => __('Toggle', 'su'),
        'open' => '', // yes, no
      ), $atts));
    
    global $accordion_id;
    global $toggle_number;
    if (!isset($toggle_number)) {
      $toggle_number = '1';
    }
    

    $heading_id = 'toggle_heading_'.$toggle_number;
    $collapse_id = 'toggle_collapse_'.$toggle_number;

    if ($toggle_number == '1' && (!isset($open) || $open != 'no') ) {
      $closed = ' in';
      $collapsed = ' ';
    }else{
      $closed = ( $open == 'yes' ) ? ' in' : '';
      $collapsed = ( $open == 'yes' ) ? ' ' : ' collapsed';
    }

    $is_accordion = '';
    if ($accordion_id) {
      $is_accordion = 'data-parent="#'.$accordion_id.'"';
    }

    $output = '';


    $output .= '<div class="panel panel-default">';
    $output .= '<div class="panel-heading" role="tab" id="'.$heading_id.'"><h4 class="panel-title">';
    $output .= '<a class="'.$collapsed.'" data-toggle="collapse" '.$is_accordion.' href="#'.$collapse_id.'" aria-expanded="true" aria-controls="'.$collapse_id.'">';
    $output .= $title;
    $output .= '</a>';
    $output .= '</h4></div>';

    $output .= '<div id="'.$collapse_id.'" class="panel-collapse collapse ' . $closed . '" role="tabpanel" aria-labelledby="'.$heading_id.'">';
    $output .= '<div class="panel-body">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    $toggle_number++;

    return $output;
}

add_shortcode( 'accordion', 'asalah_accordion_shortcode' );
function asalah_accordion_shortcode($atts, $content) {
    extract(shortcode_atts(array(
        'id' => "",
      ), $atts));

    if (!$id) {
      $id = 'tabs_'.random_id(6);
    }

    global $accordion_id;

    $accordion_id = 'accordion_' . $id;

    

    $output = '<div class="panel-group" id="'.$accordion_id.'" role="tablist" aria-multiselectable="true">' . do_shortcode($content) . '</div>';
    $accordion_id = null;
    return $output;
}

add_shortcode( 'progress_bar', 'asalah_progress_bar_shortcode' );
function asalah_progress_bar_shortcode($atts) {
    extract(shortcode_atts(array(
        'style' => "", // basic, striped, animated
        'title' => "",
        "value" => "",
        "min" => "0",
        "max" => "100",
        "margin_bottom" => "",
        "bar_color" => "",
        "bg_color" => "",
        "height" => "",
        "animate" => "", //yes, or no
      ), $atts));

    $progress_style_atts = '';
    $progress_style = '';
    $bar_style_atts = '';
    $bar_style = '';
    $bar_atts = '';
    $bar_value = '';
    $bar_class= '';
    $progress_class = '';
    $bar_min = 'aria-valuemin="0" ';
    $bar_max = 'aria-valuemax="100" ';


    if ($bg_color) {
      $progress_style_atts .= ' background-color: '.$bg_color.';';
    }

    if ($margin_bottom) {
      $progress_style_atts .= ' margin-bottom: '.$margin_bottom.'px;';
    }

    if ($height) {
      $progress_style_atts .= ' height: '.$height.'px;';
      $bar_style_atts .= ' line-height: '.$height.'px;';
    }

    if ($value) {
      $start_value = $value;
      if ($animate == "yes") {
        $start_value = 0;
        $bar_class .= " animated_progress_bar";
        $progress_class .= " animated_progress";
      }
      $bar_value = 'aria-valuenow="'.$value.'" ';
      $bar_style_atts .= ' width:'.$start_value.'%;';
    }

    if ($min) {
      $bar_min = 'aria-valuemin="'.$min.'" ';
    }

    if ($max) {
      $bar_max = 'aria-valuemax="'.$max.'" ';
    }

    if ($bar_color) {
      $bar_style_atts .= ' background-color: '.$bar_color.';';
    }

    if ($progress_style_atts != '' ) {
      $progress_style = 'style="'.$progress_style_atts.'" ';
    }

    if ($bar_style_atts != '') {
      $bar_style = 'style="'.$bar_style_atts.'" ';
    }

    if ($style == "striped") {
      $bar_class .= " progress-bar-striped";
    }

    if ($style == "animated") {
      $bar_class .= " progress-bar-striped active";
    }


    $bar_atts = $bar_value . $bar_min . $bar_max . $bar_style;

    $output = '';
    $output = '<div class="progress '.$progress_class.'" '.$progress_style.'>';
    $output .= '<div class="progress-bar skin_bg '.$bar_class.'" role="progressbar" '.$bar_atts.'>';
      $output .= $title;
    $output .= '</div>';
    $output .= '</div>';
    return $output;
}


add_shortcode( 'carousel', 'asalah_carousel_shortcode' );
function asalah_carousel_shortcode ($atts, $content = null) {
  extract(shortcode_atts(array(
      "style" => '', // default, skin, circle, square
      "weight" => "",
    ), $atts));

    $dropcap_class = "";

    $output = '<div class="asalah_carousel '.$dropcap_class.'">';
      $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}

add_shortcode( 'posts_slider', 'asalah_posts_slider_shortcode' );
function asalah_posts_slider_shortcode($atts) {
  extract(shortcode_atts(array(
      "number" => '5',
      "order" => 'date',
      "style" => "grid", //grid, list
      'words' => "15", 
      'except' => '',
      'tags' => '',
    ), $atts));

  global $post;
  global $asalah_data;

  if ($except == '') {
    $args = array('orderby' => $order, 'posts_per_page' => $number);  
  }else{
    $args = array('orderby' => $order, 'posts_per_page' => $number, 'post__not_in' => array($except));    
  }

  if ($tags != '') {
    $args['tag_slug__in'] = $tags;
  }

   
  $wp_query = new WP_Query($args);

  if ( $wp_query ) :
    
      

    $output = '<div class="owl-carousel asalah_carousel">';
          while ( $wp_query->have_posts() ) : $wp_query->the_post();
            $output .= '<div>';
                $output .= get_the_post_thumbnail($post->ID, 'blog_banner_width', array( 'class' => 'img-responsive' ));
                $output .= '<h2>'.get_the_title().'</h2>';
                $output .= '<p>'.excerpt($words).'</p>';
            $output .= '</div>';
          endwhile;
    $output .= '</div>'; // close posts_wrapper
  endif;

  
  return $output;
}

add_shortcode( 'slide', 'asalah_slides_shortcode' );
function asalah_slides_shortcode($atts, $content) {
  extract(shortcode_atts(array(

    ), $atts));
    $output = '<div class="new_slide">';
                $output .= do_shortcode($content);
    $output .= '</div>'; // end new_slide
  return $output;
}

add_shortcode( 'pricing', 'asalah_pricing_shortcode' );
function asalah_pricing_shortcode($atts, $content) {
  extract(shortcode_atts(array(
      "style" => '1', // 1->3
    ), $atts));
    global $current_style;
    $current_style = $style;
    $output = '<div class="pricingcontainer style'.$style.'">';
      $output .= '<div class="row">';
                $output .= do_shortcode($content);
      $output .= '</div>';
    $output .= '</div>'; // end new_slide
    $current_style = null;
  return $output;
}

add_shortcode( 'plan', 'asalah_plan_shortcode' );
function asalah_plan_shortcode($atts, $content) {
  extract(shortcode_atts(array(
      "width" => 'four',
      "columns" => "", // one => six
      "featured" => "no", // yes, no
      "shadow" => "no", // yes, no
      "title" => "",
      "price" => "",
      "term" => "",
      "link" => "",
      "button" => "",

      "border_color" => "",

      "price_border_color" => "",
      "price_bg" => "",
      "price_color" => "",
      "term_color" => "",

      "title_bg" => "",
      "title_color" => "",

      "button_bg" => "",
      "button_color" => "",
      "button_text_color" => "",
      "button_border_color" => "",

      "button_style" => 'gradient', // default, soft, gradient, flat
      "button_skin" => "dark", // light, dark
      "button_icon" => "",
      "button_icon_color" => "",
      "target" => "", // _self, _blank
      "button_size" => 'small', // small, medium, large
      "button_radius" => '',
    ), $atts));

    if ($columns) {
      $width = $columns;
    }

    global $current_style;

    $table_style_atts = "";
    $table_style = "";

    $title_style_atts = "";
    $title_style = "";

    $plans_style_atts = "";
    $plans_style = "";

    $price_style_atts = "";
    $price_style = "";

    $the_price_style_atts = "";
    $the_price_style = "";

    $button_bg_style_atts = "";
    $button_bg_style = "";

    $button_class = "";
    $button_css = "";
    $icon_style = "";

    $button_target_data = '';

    if ($target) {
      $button_target_data .= ' target="'.$target.'"';
    }

    if ($button_style) {
      $button_class .= ' button_'.$button_style;
    }
    if ($button_size) {
      $button_class .= ' button_'.$button_size;
    }

    if ($button_skin) {
      $button_class .= ' skin_'.$button_skin;
    }

    if ($button_icon_color) {
       $icon_style .= ' color:'.$button_icon_color.';';
    }

    if ($button_color) {
      if ($button_style == "soft") {
        $button_css .= ' background-color:'.$button_color.';';
        $button_css .= ' border-color:'.$button_color.';';
      }elseif($button_style == "flat") {
        $darker_color = asalah_su_hex_shift($button_color, "darker", 25);
        $button_css .= ' background-color:'.$button_color.';';
        $button_css .= ' border-color:'.$button_color.';';
        $button_css .= ' border-bottom-color:'.$darker_color.';';
      }elseif($button_style == "gradient") {
        $lighter_color = asalah_su_hex_shift($button_color, "lighter", 25);
        $darker_color = asalah_su_hex_shift($button_color, "darker", 10);
        $button_css .= ' background-color:'.$button_color.';';
        $button_css .= ' border-color:'.$button_color.';';
        $button_css .= ' background-image: linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_css .= ' background-image: -o-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_css .= ' background-image: -moz-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_css .= ' background-image: -webkit-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
        $button_css .= ' background-image: -ms-linear-gradient(bottom, '.$darker_color.' 0%, '.$lighter_color.' 100%);';
      }else{
        $button_css .= ' border-color:'.$button_color.';';
        $button_css .= ' color:'.$button_color.';';
      }
    }

    if ($icon_style != "") {
      $icon_style = ' style="'.$icon_style.'"';
    }

    

    if ($button_text_color) {
      $button_css .= ' color:' .$button_text_color .';';
    }
    if ($button_radius) {
      $button_css .= ' border-radius:'.$button_radius.'px;';
    }

    if ($button_css != "") {
      $button_css = ' style="'.$button_css.'"';
    }

    if ($button_bg) {
      $button_bg_style_atts .= ' background-color:'.$button_bg.';';
    }

    if ($button_border_color) {
      $button_bg_style_atts .= ' border-color:'.$button_border_color.';';
    }

    if ($border_color) {
      $table_style_atts .= ' border-color:'.$border_color.';';
    }

    if ($title_bg) {
      $title_style_atts .= ' background-color:'.$title_bg.';';
      if ($current_style == "1") {
        $plans_style_atts .= ' background-color:'.$title_bg.';';
      }
    }

    if ($title_color) {
      $title_style_atts .= ' color:'.$title_color.';';
    }

    if ($price_border_color) {
      $price_style_atts .= ' border-color:'.$price_border_color.';';
    }

    if ($price_bg) {
      $price_style_atts .= ' background:none;';
      $price_style_atts .= ' background-color:'.$price_bg.';';
    }

    if ($term_color) {
      $price_style_atts .= ' color:'.$term_color.';';
    }

    if ($price_color) {
      $the_price_style_atts .= ' color:'.$price_color.';';
    }

    // assing attributes to sytle
    if ($table_style_atts != "") {
      $table_style = ' style="'.$table_style_atts.'"';
    }

    if ($title_style_atts != "") {
      $title_style = ' style="'.$title_style_atts.'"';
    }

    if ($price_style_atts != "") {
      $price_style = ' style="'.$price_style_atts.'"';
    }

    if ($the_price_style_atts != "") {
      $the_price_style = ' style="'.$the_price_style_atts.'"';
    }

    if ($button_bg_style_atts != "") {
      $button_bg_style = ' style="'.$button_bg_style_atts.'"';
    }

     if ($plans_style_atts != "") {
      $plans_style = ' style="'.$plans_style_atts.'"';
    }

    $plan_class = "";
    if ($featured == "yes") {
      $plan_class .= " recommended_package";
    }

    if ($shadow == "yes") {
      $plan_class .= " shadow_package";
    }

    $output = '<div class="pricing_table_layout '.$width.' '.$plan_class.'" '.$table_style.'>';
      $output .= '<div class="columns">';
        $output .= '<dl class="plans" '.$plans_style.'>';
          $output .= '<dd class="plan_title" '.$title_style.'>';
            $output .= $title;
          $output .= '</dd>';
          $output .= '<dd class="plan_price" '.$price_style.'>';
            $output .= '<span class="the_price" '.$the_price_style.'>';
              $output .= $price;
            $output .= '</span>';
            $output .= ' ' . $term;
          $output .= '</dd>';
        $output .= '</dl>';
        $output .= '<dl class="plan">';
          $output .= do_shortcode($content);

          // show this only if button available
          if ($button) {
            $output .= '<dd class="pricing_row plan_buy" '.$button_bg_style.'>';
              $output .= '<a href="'.$link.'" '.$button_target_data.'>';
              $output .= '<span class="pricing_button asalah_button '.$button_class.'" '.$button_css.'>';
                $output .= $button;
                if ($button_icon) {
                  $output .= '<i class="button_icon '.$button_icon.'" '.$icon_style.'></i>';
                }
              $output .= '</span>';
              $output .= '</a>';
            $output .= '</dd>';
          }
        $output .= '</dl>';
                
      $output .= '</div>';
    $output .= '</div>'; // end new_slide
  return $output;
}

add_shortcode( 'feature', 'asalah_feature_shortcode' );
function asalah_feature_shortcode($atts, $content) {
  extract(shortcode_atts(array(
    "bg_color" => "",
    "text_color" => "",
    "border_color" => "",
  ), $atts));
  $feature_style_atts = "";
  $feature_style = "";

  if ($bg_color) {
    $feature_style_atts .= ' background-color:'.$bg_color.';';
  }

  if ($text_color) {
    $feature_style_atts .= ' color:'.$text_color.';';
  }

  if ($border_color) {
    $feature_style_atts .= ' border-color:'.$border_color.';';
  }

  if ($feature_style_atts != "") {
    $feature_style = ' style="'.$feature_style_atts.'"';
  }
  $output = '<dd class="pricing_row plan_features" '.$feature_style.'>';
              $output .= do_shortcode($content);
  $output .= '</dd>'; // end new_slide
  return $output;
}

add_shortcode( 'tweets', 'asalah_tweets_shortcode' );
function asalah_tweets_shortcode($atts) {
  extract(shortcode_atts(array(
    "username" => "",
    "number" => "",
  ), $atts));

  $consumerkey = asalah_option('asalah_conk_id');
  $consumersecret = asalah_option('asalah_cons_id');
  $accesstoken = asalah_option('asalah_at_id');
  $accesstokensecret = asalah_option('asalah_ats_id');

  $output = '<div class="asalah_tweets_shortcode">';
    $output .= asalah_twitter_tweets($consumerkey, $consumersecret, $accesstoken, $accesstokensecret, $username, $number);
  $output .= '</div>'; // end new_slide
  return $output;
}

?>