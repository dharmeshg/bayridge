<?php

function magic_substr($haystack, $start, $end) {
    $index_start = strpos($haystack, $start);
    $index_start = ($index_start === false) ? 0 : $index_start + strlen($start);
    if (strpos($haystack, $end) == TRUE) {
        $index_end = strpos($haystack, $end, $index_start);
        $length = ($index_end === false) ? strlen($end) : $index_end - $index_start;
        return substr($haystack, $index_start, $length);
    } else {
        return substr($haystack, $index_start);
    }
}

function asalah_default_image() {
    global $asalah_data;
    if ($asalah_data['asalah_default_image']) {
        return $asalah_data['asalah_default_image'];
    } else {
        return get_template_directory_uri() . '/img/default.jpg';
    }
}

function asalah_video_prov($vurl) {
    if (strpos($vurl, 'youtube') !== false) {
        $prov = "youtube";
    } elseif (strpos($vurl, 'youtu') !== false) {
        $prov = "youtu";
    } elseif (strpos($vurl, 'vimeo') !== false) {
        $prov = "vimeo";
    } else {
        $prov = "none";
    }
    return $prov;
}

function asalah_video_id($prov, $vurl) {
    if ($prov == 'youtube') {
        $id = magic_substr($vurl, "http://www.youtube.com/watch?v=", "&");
        $id = magic_substr($vurl, "https://www.youtube.com/watch?v=", "&");
    } elseif ($prov == 'youtu') {
        $id = magic_substr($vurl, "http://www.youtu.be/watch?v=", "&");
        $id = magic_substr($vurl, "https://www.youtu.be/watch?v=", "&");
    } elseif ($prov == 'vimeo') {
        $id = magic_substr($vurl, "http://vimeo.com/", "?");
        $id = magic_substr($vurl, "https://vimeo.com/", "?");
    }
    return $id;
}

function asalah_video_iframe($prov, $vid) {
    echo '<div class="video_fit_container">';
    if ($prov == 'youtube') {
        ?>
        <iframe class="video_iframe" src="http://www.youtube.com/embed/<?php echo esc_attr($vid); ?>?wmode=transparent&wmode=opaque" frameborder="0" allowfullscreen></iframe>
        <?php
    } elseif ($prov == 'youtu') {
        ?>
        <iframe  class="video_iframe" src="http://www.youtube.com/embed/<?php echo esc_attr($vid); ?>?wmode=transparent&wmode=opaque" frameborder="0" allowfullscreen></iframe>
        <?php
    } elseif ($prov == 'vimeo') {
        ?>
        <iframe class="video_iframe" src="//player.vimeo.com/video/<?php echo esc_attr($vid); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        <?php
    } else {
        
    }
    echo '</div>';
}

function asalah_blog_post_banner($size = "") {
    global $post;

    if (get_post_format() == "image"
        || ( get_post_type() == 'project' && get_post_format() == "" ) ) {
        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        ?>
        <?php if (!asalah_option('asalah_disable_prettyphoto')): ?>
        <a href="<?php echo esc_url($url); ?>" class="fancybox" rel="fancybox" title="<?php echo get_the_title(); ?>"><?php the_post_thumbnail($size); ?></a>
        <?php else: ?>
        <a href="<?php echo get_the_permalink(); ?>" ><?php the_post_thumbnail($size); ?></a>
        <?php endif; ?>
        <?php
    } elseif (get_post_format() == "video") {
        if (get_post_meta($post->ID, '_format_video_embed', true) != '' ) {
            $video_url = get_post_meta($post->ID, '_format_video_embed', true);

            if (strpos($video_url, "iframe") != false) {
                echo '<div class="video_fit_container">';
                echo balanceTags($video_url);
                echo '</div>';
            } elseif (strpos($video_url, "webm") || strpos($video_url, ".ogv") || strpos($video_url, ".mp4") || strpos($video_url, ".m4v") || strpos($video_url, ".wmv") || strpos($video_url, ".mov") || strpos($video_url, ".qt") || strpos($video_url, ".flv") || strpos($video_url, ".mp3") || strpos($video_url, ".m4a") || strpos($video_url, ".m4b") || strpos($video_url, ".ogg") || strpos($video_url, ".oga") || strpos($video_url, ".wma") || strpos($video_url, ".wav")) {
                echo '<div class="video_fit_container">';
                echo do_shortcode('[video url="' . $video_url . '"]');
                echo '</div>';
            } else {
                $prov = asalah_video_prov($video_url);
                $vid = asalah_video_id($prov, $video_url);
                asalah_video_iframe($prov, $vid);
            }
        }else{
            // if video form empty
        }
        
    } elseif (get_post_format() == "gallery") {
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => $post->ID,
            'order' => 'ASC',
            'orderby' => 'menu_order ID',
        ));

        if ($attachments) {
            echo '<div class="owl-carousel">';
            if (!asalah_option('asalah_disable_prettyphoto')) {
                foreach ($attachments as $attachment) {
                    $image_attributes = wp_get_attachment_url($attachment->ID);
                    $attachment_title = get_the_title($attachment->ID);
                    echo '<div>';
                    echo '<a href="'. $image_attributes.'" class="fancybox" rel="fancybox['.$post->ID.']" title="'.$attachment_title.'">';
                    echo '<img src="'.$image_attributes.'" class="featured_image">';
                    echo '</a>';
                    echo '</div>';
                }
            }else{
                foreach ($attachments as $attachment) {
                    $attachment_title = get_the_title($attachment->ID);
                    echo '<div>';
                    echo '<a href="'. get_the_permalink().'" title="'.$attachment_title.'">';
                    echo wp_get_attachment_image($attachment->ID, 'full');
                    echo '</a>';
                    echo '</div>';
                }
            }
            echo '</div>';
        }
    } elseif (get_post_format() == "audio") {
        $sound_url = get_post_meta($post->ID, '_format_audio_embed', true);
        if (strpos($sound_url, "iframe") != false) {
            echo '<div class="video_fit_container">';
            echo balanceTags($sound_url);
            echo '</div>';
        } elseif (strpos($sound_url, "webm") || strpos($sound_url, ".ogv") || strpos($sound_url, ".mp4") || strpos($sound_url, ".m4v") || strpos($sound_url, ".wmv") || strpos($sound_url, ".mov") || strpos($sound_url, ".qt") || strpos($sound_url, ".flv") || strpos($sound_url, ".mp3") || strpos($sound_url, ".m4a") || strpos($sound_url, ".m4b") || strpos($sound_url, ".ogg") || strpos($sound_url, ".oga") || strpos($sound_url, ".wma") || strpos($sound_url, ".wav")) {
            echo '<div class="video_fit_container">';
            echo do_shortcode('[audio src="' . $sound_url . '" width=100][/audio]');
            echo '</div>';
        } elseif (strpos($sound_url, "soundcloud.com")) {
            ?>
            <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo esc_url($sound_url); ?>"></iframe>
            <?php
        }
    }
}
?>
