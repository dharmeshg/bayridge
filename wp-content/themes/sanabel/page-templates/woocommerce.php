<?php
/*
 * Template Name: Woocommerce Ready Page
 */
get_header();

if (asalah_post_option('asalah_rev_alias')) {
    echo '<div class="rev_slider_asalah_wrapper">';
    putRevSlider(asalah_post_option('asalah_rev_alias'));
    if (asalah_post_option('asalah_rev_slier_next_arrow') == 'show') {
        echo "<span class='go_to_main_content'><i class='fa fa-circle'></i></span>";
    }
    echo '</div>';
}

?>
<!-- start site content -->
<div class="site_content">

    <?php asalah_page_title_holder(); ?>

    <div class="new_section page_section woo_page_section container-fluid">
        <div class="container">
            <?php
            $main_row_class = "";
            if (asalah_cross_option('asalah_page_sticky_sidebar') == "yes") {
                $main_row_class = "asalah_sticky_sidebar_container";
            }
            ?>
            <div class="row content_main_row page_content_main_row <?php echo esc_attr($main_row_class); ?>">

            <div class="main_content <?php echo asalah_content_class(); ?>">
                <?php /* The loop */ ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="clearfix blog_post">
                        <div class="blog_post_body clearfix">

                            <div class="blog_post_info content_container">
                                <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'asalah')); ?>
                                <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'asalah') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
                                <?php
                                ?>
                            </div>

                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php wp_reset_query(); ?>
            
            <?php if (asalah_option("asalah_sidebar_position") != "no-sidebar" ): ?>
            <?php if (asalah_post_option("asalah_post_layout") != "full" ): ?>
            
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
            </div>
            <?php endif; ?>
            <?php endif; ?>

            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>