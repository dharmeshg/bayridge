<?php
$current_post_id = "";
if (isset($_POST['current_post_id'])) {
    $current_post_id = $_POST['current_post_id'];
}

$excerpt_length = "40";
if (asalah_option("asalah_blog_excrept_length")) {
    $excerpt_length = asalah_option("asalah_blog_excrept_length");
}
if (asalah_post_option("asalah_blog_excrept_length", $current_post_id)) {
    $excerpt_length = asalah_post_option("asalah_blog_excrept_length", $current_post_id);
}
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<article class="blog_post blog_type<?php echo get_post_format(); ?> page_post clearfix">

    <!-- start blog post banner if exist -->
    <!-- appears only if post format not set to standard -->
    <?php if (get_post_format() != ""): ?>
    <div class="blog_banner page_banner clearfix">
        <header class="content_banner blog_post_banner page_post_banner clearfix">
            <?php 
            if (asalah_option("asalah_crop_single_banner")) {
                asalah_blog_post_banner("blog");
            }else{
                asalah_blog_post_banner();
            }
            ?>
        </header>
    </div>
    <?php endif; ?>
    <!-- end blog post banner if exist -->

    <div class="blog_info page_info clearfix">

        <!-- end post icon -->
        <div class="blog_body_wrapper page_body_wrapper">
            
            <div class="blog_heading page_heading">

                <?php if (asalah_post_option("asalah_post_title") != 'hide'): ?>
                <div class="blog_title">
                    <h3 class="title blog_post_title"><?php the_title(); ?></h3>
                </div>
                <?php endif; ?>

                <?php asalah_page_meta_info(); ?>

                <div class="blog_content_wrapper shifted_description">
                    <div class="page_description">

                        <!-- start show post description -->
                        <!-- if current page is single or page show content, else show only excerpt. -->
                        <?php if (is_single() || is_page()) : ?>
                            <div class="post_content">
                            <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'asalah')); ?>
                            <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'asalah') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
                            </div>
                        <?php
                        else:
                            echo '<p>' . excerpt($excerpt_length) . '</p>';
                        endif;
                        
                        wp_reset_query();
                        ?>
                        <!-- end show post description -->

                    </div> <!-- end blog_description -->
                    <?php
                    asalah_page_share();
                    ?>
                </div> <!-- end blog_content_wrapper -->

            </div>
            
        </div>
        
    </div>
    
</article>

<?php
if ((asalah_post_option("asalah_page_author_box") == "show") || (asalah_option("asalah_page_author_box") && asalah_post_option("asalah_page_author_box") != "hide")) {
    asalah_author_box();
}
if ((asalah_post_option("asalah_page_comments") == "show") || (asalah_option("asalah_page_enable_comments") && asalah_post_option("asalah_page_comments") != "hide")) {
    comments_template();
}
?>

<?php endwhile; ?>
