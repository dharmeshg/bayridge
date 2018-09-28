<?php
/*
 * Template Name: Default Portfolio Page
 */
get_header();

?>
<!-- start site content -->
<div class="site_content">

    <?php asalah_page_title_holder(); ?>

    <div class="new_section portfolio_section container-fluid">
        <div class="container portfolio_page">
            <div class="row">
                <!-- Start Portfolio Filter Navigation -->
                <?php if (asalah_option("asalah_projects_filter")): ?>
                <nav id="portfolio_filter_options" class="col-md-12 portfolio_filter navbar portfolio_filter_options">
                        <?php asalah_portfolio_tag_list_filter(); ?>
                </nav>
                <?php endif; ?>
                <!-- End Portfolio Filter Navigation -->

                <!-- start main content div -->
                <div class="col-md-12 pull-right main_content">
                    <?php 
                    $per_page = 9;
                    if (asalah_option('asalah_portfolio_posts_per_page')) {
                    $per_page = asalah_option('asalah_portfolio_posts_per_page');
                    }
                    
                    $wp_query = new WP_Query(array('post_type' => 'project', 'posts_per_page' => $per_page, 'paged' => get_query_var('paged')));
                    ?>

                    <?php 
                    // get project template option
                    $portfolio_template = "project";
                    $portfolio_class = "";
                    if (asalah_post_option("asalah_portfolio_style")) {
                        $portfolio_class .= ' style_'.asalah_post_option("asalah_portfolio_style");
                    }

                    // get project pagination option
                    $portfolio_pagination = "default";
                    if (asalah_post_option("asalah_portfolio_pagination") == "scroll") {
                        $portfolio_pagination = "scroll";
                    }
                    ?>

                    <?php if ($portfolio_pagination == "scroll"): ?> <!-- if infinite scroll -->
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
                                            data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=content-<?php echo esc_attr($portfolio_template); ?>&posts_per_page=<?php echo esc_attr($per_page); ?>&post_type=project&current_post_id=<?php echo esc_attr($post->ID); ?>', 
                                            success: function(html){
                                                jQuery('#inifiniteLoader > img').hide('1000');

                                                var $newItems = jQuery(html)
                                                $('#content').isotope( 'insert', $newItems );

                                                $('#content').imagesLoaded( function() {
                                                    $('#content').isotope({
                                                        itemSelector : '.portfolio_grid_list',
                                                    });
                                                });

                                                // $('#content').isotope('layout');
                                                
                                            }
                                        });
                                    return false;
                                }
                        });
                    </script>
                    <!-- end infinite scroll -->
                    <?php endif; ?>
                    <?php

                    if (have_posts()) :
                        ?>
                        <div class= "projects_wrapper filterable_wrapper filterable_portfolio_wrapper <?php echo esc_attr($portfolio_class); ?>">
                            <div class="thumbnails portfolio_grid filterable_portfolio_grid filterable_grid grid asalah_row js-isotope" id="content" data-isotope-options='{ "itemSelector": ".portfolio_grid_list" }'>
                                <?php get_template_part('content', $portfolio_template); ?>
                            </div> <!-- end thumbnails portfolio grid grid row -->
                        </div> <!-- end projects wrapper style_grid -->
                        
                        <?php if ($portfolio_pagination == "scroll"): ?>
                            <div id="inifiniteLoader"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ajax-loader.gif" /></div>
                        <?php else: ?>
                            <?php asalah_bootstrap_pagination(); ?>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
                <!-- end main content div -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </div> <!-- end new_section blog_section -->
</div>

<?php get_footer(); ?>