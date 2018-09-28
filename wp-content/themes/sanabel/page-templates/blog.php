<?php
/*
 * Template Name: Default Blog Page
 */
get_header();
?>
<!-- start site content -->
<div class="site_content">
    
    <?php asalah_page_title_holder(); ?>
    
    <?php
    $wp_query = new WP_Query(array('post_type' => 'post', 'paged' => get_query_var('paged')));
    ?>

    <?php 
    // get project template option
    $blog_style_class = "";
    $blog_wrapper_class = "";
    if (asalah_post_option("asalah_blog_style")) {
        $blog_style_class .= ' style_'.asalah_post_option("asalah_blog_style");
    }

    if (asalah_post_option("asalah_blog_style") == "masonry") {
        $blog_style_class .= ' filterable_grid';
        $blog_wrapper_class .= ' filterable_wrapper';
    }

    // get project pagination option
    $blog_pagination = "default";
    if (asalah_post_option("asalah_blog_pagination") == "scroll") {
        $blog_pagination = "scroll";
    }
    ?>
    <?php if ($blog_pagination == "scroll"): ?> <!-- if infinite scroll -->
    <!-- start infinite scroll -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
                var count = 2;
                var total = <?php echo esc_attr($wp_query->max_num_pages); ?>;
                
                jQuery(window).scroll(function(){
                    if  (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()){
                        if (count > total){
                            return false;
                        }else{
                            loadArticle(count);
                        }
                        count++;
                    }
                });
        
                function loadArticle(pageNumber){   
                        jQuery('#inifiniteLoader > img').show('fast'); 
                        jQuery.ajax({
                            url: "<?php echo esc_url( site_url() ) ?>/wp-admin/admin-ajax.php",
                            type:'POST',
                            data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=content&posts_per_page=<?php echo get_option('posts_per_page'); ?>&post_type=post&current_post_id=<?php echo esc_attr($post->ID); ?>', 
                            success: function(html){
                                jQuery('#inifiniteLoader > img').hide('1000');                          

                                <?php if (asalah_post_option("asalah_blog_style") == "masonry"): ?>
                                var $newItems = jQuery(html)
                                $('#content').isotope( 'insert', $newItems );

                                $('#content').imagesLoaded( function() {
                                    $('#content').isotope({
                                        itemSelector : '.filterable_item',
                                    });
                                });

                                $(".video_fit_container").fitVids();
                                // apply owl carousel for ltr an rtl content
                                $(".owl-carousel").owlCarousel({
                                        items: 1,
                                        loop: true,
                                        nav: true,
                                        dots: false,
                                        autoHeight: true,
                                        animateOut: 'fadeOut',
                                        animateIn: 'fadeIn',
                                        navText: "",
                                        rtl: jQuery('body.rtl').length ? true : false
                                });

                                $('#content').isotope('layout');

                                <?php else: ?>
                                jQuery("#content").append(html);
                                jQuery(".video_fit_container").fitVids();  // This will be the div where our content will be loaded
                                
                                <?php endif; ?>
                            }
                        });
                    return false;
                }
        });
    </script>
    <!-- end infinite scroll -->
    <?php endif; ?>
    <div class="new_section blog_section container-fluid">  
        <div class="container">
            <?php
            $main_row_class = "";
            if (asalah_cross_option('asalah_page_sticky_sidebar') == "yes") {
                $main_row_class = "asalah_sticky_sidebar_container";
            }
            ?>
            <div class="row content_main_row page_content_main_row <?php echo esc_attr($main_row_class); ?>">
                <div class="blog_main_content_layout blog_posts_wrapper <?php echo esc_attr($blog_wrapper_class); ?> <?php echo asalah_content_class(); ?>">
                    <div id="content" class="main_content blog_main_content clearfix <?php echo esc_attr($blog_style_class); ?>">
                    <?php if ($wp_query->have_posts()) : ?>
                        <?php get_template_part('content'); ?>

                    <?php else : ?>
                        <?php get_template_part('content', 'none'); ?>
                    <?php endif; ?>
                    </div>

                    <?php if ($blog_pagination == "scroll"): ?>
                        <div id="inifiniteLoader"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ajax-loader.gif" /></div>
                    <?php else: ?>
                        <?php asalah_bootstrap_pagination(); ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div> <!-- end main_content -->
                
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
        </div> <!-- end container -->
    </div>  <!-- end new_section blog_section -->
</div>

<?php get_footer(); ?>