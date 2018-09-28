<?php
get_header();

if (get_query_var('author_name')) :
    $curauth = get_user_by('slug', get_query_var('author_name'));
else :
    $curauth = get_userdata(get_query_var('author'));
endif;
?>
<!-- start site content -->
<div class="site_content">
    <?php 
    $this_page_bread = $curauth->display_name;
    $this_page_title = __("All posts by: ", "asalah") . $this_page_bread;
    asalah_page_title_holder($this_page_title, $this_page_bread, false, "no");
    ?>
    <?php 
    // get project template option
    $blog_style_class = "";
    $blog_wrapper_class = "";
    if (asalah_option("asalah_blog_style")) {
        $blog_style_class .= ' style_'.asalah_option("asalah_blog_style");
    }

    if (asalah_option("asalah_blog_style") == "masonry") {
        $blog_style_class .= ' filterable_grid js-isotope';
        $blog_wrapper_class .= ' filterable_wrapper';
    }

    // get project pagination option
    $blog_pagination = "default";
    if (asalah_option("asalah_blog_pagination") == "scroll") {
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

                                <?php if (asalah_option("asalah_blog_style") == "masonry"): ?>
                                var $newItems = jQuery(html)
                                $('#content').isotope( 'insert', $newItems );

                                $('#content').imagesLoaded( function() {
                                    $('#content').isotope({
                                        itemSelector : '.filterable_item',
                                    });
                                });
                                <?php else: ?>
                                jQuery("#content").append(html);
                                jQuery(".video_fit_container").fitVids();   // This will be the div where our content will be loaded
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
            if (asalah_cross_option('asalah_post_sticky_sidebar') == "yes") {
                $main_row_class = "asalah_sticky_sidebar_container";
            }
            ?>
            <div class="row content_main_row <?php echo esc_attr($main_row_class); ?>">
                <div class="blog_main_content_layout blog_posts_wrapper <?php echo esc_attr($blog_wrapper_class); ?> <?php echo asalah_default_content_class(); ?>">
                    <!-- if page title is not enabled add secondary page title here -->
                    <?php if (asalah_option("asalah_enable_pagetitle") == "no"): ?>
                        <h1 class="title secondary_page_title"><?php echo __("All posts by: ", "asalah") . $curauth->display_name; ?></h1>
                    <?php endif; ?>
                    <!-- endif for checking if page title is not enabled -->

                    <div  id="content" class="main_content blog_main_content clearfix <?php echo esc_attr($blog_style_class); ?>"  data-isotope-options='{ "itemSelector": ".filterable_item" }'>
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
                
                <?php if (asalah_option("asalah_sidebar_position") != "no-sidebar" ): ?>
                    <div class="side_content <?php echo asalah_default_sidebar_class(); ?>">
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif; ?>

            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>  <!-- end new_section blog_section -->
</div>

<?php get_footer(); ?>