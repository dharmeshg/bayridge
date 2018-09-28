<?php
/**
 * Template Name: Search Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="main_search_page col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="container">

<div class="main_search_bar col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none;"><?php //echo do_shortcode('[search-into-subcategories parent_category=39 max_depth=2 search_input=-1 labels=Location|Speciality hide_empty=0 posts_per_page=10]'); ?></div>

<div class="main_search_bar col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none;"><?php //echo do_shortcode("[mdf_chain_menu taxonomy='category' exclude='33,34,1,35,36,21' show_count=1 post_slug='post' button_title='Watch It' target='_blank']"); ?></div>


<div class="main_search_bar col-lg-12 col-md-12 col-sm-12 col-xs-12"><h2>Search Associate Therapists</h2><?php echo do_shortcode('[mdf_search_form id="4233"]'); ?></div>

			<?php
				$args = array( 'post_type' => 'post', 'cat' => 89, 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>

<div class="search_top col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="search_sub col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingnone">

<div class="search_sub_left col-lg-8 col-md-8 col-sm-12 col-xs-12">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingnone">
<div class="search_sub_img col-lg-3 col-md-3 col-sm-12 col-xs-12"> <?php the_post_thumbnail(); ?> </div>

<div class="search_sub_txt col-lg-9 col-md-9 col-sm-12 col-xs-12 paddingnone">
<a href="<?php echo get_permalink(); ?>"><h1><?php echo the_title(); ?></h1></a>
<p class="search_register"> <?php the_field('registered'); ?> </p>
<p class="search_phone">Email : <?php the_field('phone_no'); ?> </p>
<p class="search_location"> <?php the_field('location'); ?> </p>
</div>
</div>
<hr>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p class="search_txt"><i class="fa fa-quote-left fa-2"></i><?php the_field('profile_info'); ?><i class="fa fa-quote-right fa-2"></i></p>
</div>

</div><!-- search_sub_left -->


<div class="search_sub_right col-lg-4 col-md-4 col-sm-12 col-xs-12 for_single">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingnone">
<a id="free_consultation_btn" onclick="div_show()" style="display:none;">View Specialties</a>
<div id="abc">
<img id="close" src="/close.png" onclick ="div_hide()">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 popup_content"><div class="form_box"><div class="inner_form"><img id="close" src="https://webdemonstrationlink.com/bayridgecounsellingcentres/wp-content/themes/sanabel-child-theme/close.png" onclick ="div_hide()"><div class="inner_scroll"><?php the_field('view_specialties'); ?></div></div></div></div>
</div>
</div>

<iframe src="<?php the_field('map_single'); ?>" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="search_sub_right col-lg-4 col-md-4 col-sm-12 col-xs-12 for_category">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingnone">
<a href="<?php the_field('contact_button'); ?>">Contact</a>
<a href="<?php the_field('full_profile_btn'); ?>">Full Profile</a>
</div>
<h2>Some of My Specialties:</h2>
<p><?php the_field('specialties'); ?></p>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search_sub_right paddingnone">
<a id="free_consultation_btn" onclick="div_show_new()" style="display:none;">View Specialties</a>
<div id="abcnew">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 popup_content"><div class="form_box"><div class="inner_form"><img id="close" src="https://webdemonstrationlink.com/bayridgecounsellingcentres/wp-content/themes/sanabel-child-theme/close.png" onclick ="div_hide_new()"><h3>Area Of Practice</h3><div class="inner_scroll"><?php the_field('view_specialties'); ?></div></div></div></div>
</div>
</div>

</div>

</div><!-- search_sub -->
</div><!-- search_top  -->

<?php

endwhile;
			?>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();
