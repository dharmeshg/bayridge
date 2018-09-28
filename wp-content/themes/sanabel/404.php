<?php
get_header();
?>
<!-- start site content -->
<div class="site_content">

    <?php asalah_page_title_holder(__( '404 ERROR', 'asalah' ), __( 'No thing found', 'asalah' )); ?>

    <div class="new_section error_section container-fluid error_404_page"> 
        <div class="container">
            <?php
            $main_row_class = "";
            if (asalah_cross_option('asalah_post_sticky_sidebar') == "yes") {
                $main_row_class = "asalah_sticky_sidebar_container";
            }
            ?>
            <div class="row content_main_row <?php echo esc_attr($main_row_class); ?>">
                <div class="main_content blog_main_content error_404_page_content">
                    <!-- if page title is not enabled add secondary page title here -->
                    <?php if (asalah_option("asalah_enable_pagetitle") == "no"): ?>
                        <h1 class="title secondary_page_title"><?php _e( 'Not found', 'asalah' ); ?></h1>
                    <?php endif; ?>
                    <!-- endif for checking if page title is not enabled -->
                        
                    <header class="page-header">
                        <h1 class="page-title"><?php _e( '404', 'asalah' ); ?></h1>
                    </header>

                    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'asalah' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>