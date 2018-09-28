<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';

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

$section_visible_column_class = ' col-md-12';

extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
    'css' => '',

    "width" => 'fixed', // full, fixed
    "bg" => 'color', // color, image, video, half_image_left, half_image_right
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

$bg_image = wp_get_attachment_url( $bg_image );
$video_mp4 = wp_get_attachment_url( $video_mp4 );
$video_webm = wp_get_attachment_url( $video_webm );
$video_m4v = wp_get_attachment_url( $video_m4v );
$video_ogg = wp_get_attachment_url( $video_ogg );

// wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
// wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row '. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$style = $this->buildStyle($bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

// $output .= '<div class="new_section '.$css_class.'"'.$style.'>';
// 	$output .= '<div class="container">';
// 		$output .= '<div class="row">';
// 		$output .= wpb_js_remove_wpautop($content);
// 		$output .= '</div>'.$this->endBlockComment('row');
// 	$output .= '</div>';
// $output .= '</div>';

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

if ($title && $unique_word) {
  $title = str_replace($unique_word, "<span class='skin_color' style='color:".$unique_color.";'>".$unique_word."</span>", $title);
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
  $video_html .= '<video class="video_overlay" preload="auto"  autoplay="autoplay" poster="'.$bg_image.'" loop muted="muted">';
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
$output .= '<div '.$section_id_data.' class="new_section container-fluid '.$section_class.' '.$css_class.'" '.$section_style.' '.$parallax_data.' '.$parallax_offset_data.' '.$section_data.'>'; // start section
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
  if ($width != 'full') { $output .= '<div class="'.$container_width_class.'" style="'.$content_style.'" '.$animation_tags.'><div class="row">'; } // start container and row

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
      $output .= wpb_js_remove_wpautop($content);
    $output .= '</div>'; // end section_visible_column

  if ($width != 'full') { $output .= '</div></div>'; } // end row container
  // section bottom pointer
  if ($pointer == "bottom" || $pointer == "both") {
    $output .= '<div class="section_bottom_poitner" '.$pointer_style.'><div class="outer_pointer_border" '.$pointer_bottom_border_style.'></div><div class="inner_pointer_border"></div></div>';
  }
  $output .= $this->endBlockComment('row');
$output .= '</div>'; // end section new_section

if ($bg == "half_image_right" || $bg == "half_image_left") { $output .= '</div>'; } // close bg_section if half background image section chosen


echo ($output);