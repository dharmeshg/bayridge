<?php
add_filter('upload_mimes', 'add_custom_upload_mimes');
function add_custom_upload_mimes($existing_mimes){
    $existing_mimes['swf'] = 'text/swf'; //allow swf files
    return $existing_mimes;
}
?>
<?php
function excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
 array_pop($excerpt);
 $excerpt = implode(" ",$excerpt).'...';
 } else {
 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}
 function content($limit) {
 $content = explode(' ', get_the_content(), $limit);
 if (count($content)>=$limit) {
 array_pop($content);
 $content = implode(" ",$content).'...';
 } else {
 $content = implode(" ",$content);
 }
 $content = preg_replace('/[.+]/','', $content);
 $content = apply_filters('the_content', $content);
 $content = str_replace(']]>', ']]&gt;', $content);
 return $content;
}
?>
<?php
function display_shortcode_search()
{
?>
<div class="main_search_bar col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php //echo do_shortcode('[search-into-subcategories parent_category=39 max_depth=2 search_input=-1 labels=Location|Speciality hide_empty=0 posts_per_page=10]'); ?><?php echo do_shortcode('[mdf_search_form id="4233"]'); ?></div>
<div class="search_top col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="search_sub col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingnone">
<div class="search_sub_left col-lg-8 col-md-8 col-sm-12 col-xs-12">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingnone">
<div class="search_sub_img col-lg-3 col-md-3 col-sm-12 col-xs-12"> <?php the_post_thumbnail(); ?> </div>
<div class="search_sub_txt col-lg-9 col-md-9 col-sm-12 col-xs-12 paddingnone">
<a href="<?php echo get_permalink(); ?>"><h1><?php echo the_title(); ?></h1></a>
<p class="search_register"> <?php the_field('registered'); ?> </p>
<p class="search_phone">Phone & Email : <?php the_field('phone_no'); ?> </p>
<p class="search_location"> <?php the_field('location'); ?> </p>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search_sub_right paddingnone">
<a id="free_consultation_btn" onclick="div_show()">View Specialties</a>
<div id="abc">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 popup_content"><div class="form_box"><div class="inner_form"><img id="close" src="https://webdemonstrationlink.com/bayridgecounsellingcentres/wp-content/themes/sanabel-child-theme/close.png" onclick ="div_hide()"><h3>Area Of Practice</h3><div class="inner_scroll"><?php the_field('view_specialties'); ?></div></div></div></div>
</div>
</div>

</div>
</div>
<hr>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p class="search_txt"><i class="fa fa-quote-left fa-2"></i><?php the_field('profile_info'); ?><i class="fa fa-quote-right fa-2"></i></p>
</div>
</div>
<div class="search_sub_right col-lg-4 col-md-4 col-sm-12 col-xs-12 for_single">

<iframe src="<?php the_field('map_single'); ?>" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="search_sub_right col-lg-4 col-md-4 col-sm-12 col-xs-12 for_category">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingnone">
<a href="<?php the_field('contact_button'); ?>">Contact</a>
<a href="<?php the_field('full_profile_btn'); ?>">Full Profile</a>
</div>
<h2>Some of My Specialties:</h2>
<p><?php the_field('specialties'); ?></p>
</div>
</div>
</div>
<?php
}
add_shortcode( 'search_location', 'display_shortcode_search' );
add_filter( 'robots_txt', 'robots_mod', 10, 2 );
 function robots_mod( $output, $public ) {
     $output .= "Disallow: /wp-content/plugins/\nDisallow: /cgi-bin/\nDisallow: /wp-includes/\nDisallow: /wp-content/plugins/\nDisallow: /wp-content/cache/\nDisallow: /wp-content/themes/\nDisallow: /trackback/\nDisallow: /feed/\nDisallow: /comments/\nDisallow: /xmlrpc.php/\nDisallow: /category/\nDisallow: /tag/\nDisallow: /*?\nSitemap: https://www.bayridgecounsellingcentres.ca/sitemap.xml";
    return $output;
}
?>