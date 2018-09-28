<?php
/*
 * Template Name: Clean Page
 */
get_header();
if (asalah_post_option('asalah_onepage_scroll') != 'yes') {
    if(class_exists('RevSliderFront')) {
        asalah_rev_slider_wrapper();
    }
}

?>
<!-- start site content -->
<div class="site_content">
    <?php
    if (asalah_post_option('asalah_onepage_scroll') != 'yes') { 
        asalah_page_title_holder();
    } 
    ?>

    <div class="new_section clean_page_container">
        <div class="container">
            <?php
            $main_row_class = "";
            if (asalah_cross_option('asalah_page_sticky_sidebar') == "yes") {
                $main_row_class = "asalah_sticky_sidebar_container";
            }
            ?>
            <div class="row content_main_row page_content_main_row <?php echo esc_attr($main_row_class); ?>">
                <div class="page_main_content_layout clean_page_main_content blog_description <?php echo asalah_content_class(); ?>">
                    <?php while (have_posts()) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('post_content'); ?>>
                        <?php the_content(); ?>
                    </div>
                    <?php endwhile; ?>
                </div><!-- end page_main_content_layout -->

                <?php if (asalah_option("asalah_sidebar_position") != "no-sidebar" ): ?> <!-- check if sidebar is not disabled  -->
                    <?php if (asalah_post_option("asalah_post_layout") != "full" ): ?> <!-- and check if layout is not set to full -->
                    <div class="side_content <?php echo asalah_sidebar_class(); ?>">
                        <?php
                        $asalah_have_custom_sidebar = get_post_meta($post->ID, 'asalah_custom_sidebar', true);
                
                        if (!isset($asalah_have_custom_sidebar) || $asalah_have_custom_sidebar == '' || $asalah_have_custom_sidebar == 'none') {
                            get_sidebar();
                        } else {
                
                            $custom_sidebar_id = get_post_meta($post->ID, 'asalah_custom_sidebar', true);
                            if (is_active_sidebar($custom_sidebar_id)) :
                                dynamic_sidebar($custom_sidebar_id);
                            endif;
                        }
                        ?>
                    </div> <!-- end side_content -->
                    <?php endif; ?> <!-- end check if layout is not set to full -->
                <?php endif; ?> <!-- end check if sidebar is not disabled -->

            </div> <!-- end row -->
        </div> <!-- end of container -->
    </div> <!-- end new_section -->

</div>
<?php get_footer(); ?>