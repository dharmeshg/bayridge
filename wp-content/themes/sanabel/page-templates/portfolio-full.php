<?php
/*
 * Template Name: Full Portfolio Page
 */
get_header();

?>
<!-- start site content -->
<div class="site_content">

    <?php asalah_page_title_holder(); ?>

    <div class="new_section portfolio_section portfolio_full_section container-fluid">
        <div class="portfolio_page">
            <div class="container portfolio_page_filter_container">
                <div class="row">
                    <!-- Start Portfolio Filter Navigation -->
                    <?php if (asalah_option("asalah_projects_filter")): ?>
                    <nav id="portfolio_filter_options" class="col-md-12 portfolio_filter navbar portfolio_filter_options">
                            <?php asalah_portfolio_tag_list_filter(); ?>
                    </nav>
                    <?php endif; ?>
                    <!-- End Portfolio Filter Navigation -->
                </div> <!-- end row -->
            </div> <!-- end container -->
                    
            <!-- start main content div -->
            <div class="pull-right main_content">
                <?php 
                $per_page = 9;
                if (asalah_option('asalah_portfolio_posts_per_page')) {
                $per_page = asalah_option('asalah_portfolio_posts_per_page');
                }
                
                $wp_query = new WP_Query(array('post_type' => 'project', 'posts_per_page' => $per_page, 'paged' => get_query_var('paged')));
                ?>

                <?php 
                // get project template option
                $portfolio_template = "projectfull";
                if (asalah_post_option("asalah_portfolio_style") == "default") {
                    $portfolio_template = "projectfull";
                }
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
                    <div class= "projects_wrapper filterable_wrapper filterable_portfolio_wrapper style_full">
                        <div class="thumbnails portfolio_grid filterable_portfolio_grid filterable_grid grid asalah_row js-isotope" id="content" data-isotope-options='{ "itemSelector": ".portfolio_grid_list" }'>
                            <?php get_template_part('content', 'projectfull'); ?>

                        </div> <!-- end thumbnails portfolio grid grid row -->
                    </div> <!-- end projects wrapper style_grid -->
                <?php endif; ?>
            </div>

            <!-- end main content div -->
            
            <div class="container portfolio_page_pagination_container">
                <div class="row">
                    <div class="col-md-12">
                    <?php if ($portfolio_pagination == "scroll"): ?>
                        <div id="inifiniteLoader"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ajax-loader.gif" /></div>
                    <?php else: ?>
                        <?php asalah_bootstrap_pagination(); ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

        </div> <!-- end portfolio_page -->
    </div> <!-- end new_section blog_section -->
</div>

<?php get_footer(); ?>