<?php
get_header();
?>
<!-- start site content -->
<div class="site_content">

    <?php asalah_page_title_holder(); ?>

    <div class="new_section page_section container-fluid">
        <div class="container">
            <?php
            $main_row_class = "";
            if (asalah_cross_option('asalah_page_sticky_sidebar') == "yes") {
                $main_row_class = "asalah_sticky_sidebar_container";
            }
            ?>
            <div class="row content_main_row page_content_main_row <?php echo esc_attr($main_row_class); ?>">

                <section class="main_content single_main_content <?php echo asalah_content_class(); ?>">
                                <?php /* The loop */ ?>
                                <?php get_template_part('content', 'page'); ?>
                </section>
                <?php wp_reset_query(); ?>
                
                <?php if (asalah_option("asalah_sidebar_position") != "no-sidebar" ): ?>
                <?php if (asalah_post_option("asalah_post_layout") != "full" ): ?>
                
                <div class="side_content widget_area col-md-3 <?php echo asalah_sidebar_class(); ?>">
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