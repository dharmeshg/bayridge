<?php
/*
 * Template Name: Langing Page
 */
get_header();
if (asalah_post_option('asalah_onepage_scroll') != 'yes') {
    if(class_exists('RevSliderFront')) {
      asalah_rev_slider_wrapper();
    }
    
}

?>
<!-- start site content -->
<div class="site_content landing_page">

    <?php
    if (asalah_post_option('asalah_onepage_scroll') != 'yes') { 
        asalah_page_title_holder();
    } 
    ?>
    <?php 
    remove_filter( 'the_content', 'wpautop' );

    remove_filter( 'the_excerpt', 'wpautop' );
    ?>
    <?php while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page_builder_template'); ?> >
        <?php the_content(); ?>
        <?php wp_reset_query(); ?>
    </div>
    <?php endwhile; ?>

</div>
<?php get_footer(); ?>