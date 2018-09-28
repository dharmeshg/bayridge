<?php
$current_post_id = "";
if (isset($_POST['current_post_id'])) {
    $current_post_id = $_POST['current_post_id'];
}
$blog_thumbnail_option = "blog";

if (asalah_option("asalah_blog_style") == "masonry") {
    $blog_thumbnail_option = "masonry";
}elseif (asalah_option("asalah_blog_style") == "classic") {
    $blog_thumbnail_option = "bloggrid";
}
if (asalah_post_option("asalah_blog_style", $current_post_id) == "default") {
    $blog_thumbnail_option = "blog";
}elseif (asalah_post_option("asalah_blog_style", $current_post_id) == "masonry") {
    $blog_thumbnail_option = "blogmasonry";
}elseif (asalah_post_option("asalah_blog_style", $current_post_id) == "classic") {
    $blog_thumbnail_option = "bloggrid";
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
<article class="blog_post blog_type<?php echo get_post_format(); ?> filterable_item clearfix">

    <!-- start blog post banner if exist -->
    <!-- appears only if post format not set to standard -->
    <?php if (get_post_format() != ""): ?>
    <div class="blog_banner clearfix">
        <header class="content_banner blog_post_banner clearfix">
            <?php 
            if (is_single() || is_page()) :
                if (asalah_option("asalah_crop_single_banner")) {
                    asalah_blog_post_banner("blog");
                }else{
                    asalah_blog_post_banner();
                }
                
            else:
                if (asalah_option("asalah_crop_blog_banner")) {
                    asalah_blog_post_banner($blog_thumbnail_option);
                }else{
                    asalah_blog_post_banner();
                }
            endif;
            ?>
        </header>
    </div>
    <?php endif; ?>
    <!-- end blog post banner if exist -->

    <div class="blog_info clearfix">
        
        <!-- get post icon -->
        <?php
        // if the current page is page don't show post type
        if (!is_page()) {
            asalah_post_icon_label();
        }
        ?>

        <!-- end post icon -->
        <div class="blog_body_wrapper">
            
            <div class="blog_heading">

                <?php if (is_single() || is_page()) : ?>
                    <?php if (asalah_post_option("asalah_post_title") != 'hide'): ?>
                    <div class="blog_title">
                        <h3 class="title blog_post_title"><?php the_title(); ?></h3>
                    </div>
                    <?php endif; ?>
                <?php else : ?>
                    <?php if (get_the_title()): ?>
                    <div class="blog_title">
                        <h3 class="title blog_post_title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h3>
                    </div>
                    <?php else: ?>
                    <div class="blog_title">
                        <h3 class="title blog_post_title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e("Go to post", "asalah"); ?></a>
                        </h3>
                    </div>
                    <?php endif; ?>
                <?php endif; // is_single() ?>

                <?php asalah_post_meta_info(); ?>

                <div class="blog_content_wrapper shifted_description">
                    <?php
                    if (is_single() || is_page()) {
                        asalah_post_share();
                    }
                    ?>
                    <div class="blog_description">

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
                        
                        if (is_single() || is_page()) {
                            wp_reset_query();
                        }
                        ?>
                        <!-- end show post description -->

                        <!-- start tag cloud -->
                        <?php if (((asalah_post_option("asalah_post_tags") == "show") || (asalah_option("asalah_post_tags") && asalah_post_option("asalah_post_tags") != "hide")) && get_the_tags()): ?>
                            <div class="tagcloud blog_post_tags clearfix"><?php the_tags("", "", ""); ?></div>
                        <?php endif; ?>
                        <!-- end tag cloud -->
                    </div> <!-- end blog_description -->
                    
                </div> <!-- end blog_content_wrapper -->

            </div>
            
        </div>
        
    </div>

    <!-- start post navigation -->
    <?php if (is_single()): ?>
    <div class="post_navigation_container">
    <?php if (asalah_cross_option('asalah_post_next_prev') != "hide") : ?>
        <?php
            $next_post = get_next_post();
            $prev_post = get_previous_post();
        ?>
        <?php if ( !empty( $prev_post ) || !empty( $next_post ) ): ?>
            
                <div class="post_navigation_wrapper clearfix">
                    <?php if (!empty( $prev_post )): ?>
                        <a title="<?php echo esc_attr($prev_post->post_title); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>" id="right_nav_arrow" class="cars_nav_control next_nav_arrow"><?php _e("Next Post", 'asalah'); ?></i></a>
                    <?php endif; ?>

                    <?php if (!empty( $next_post )): ?>
                        <a title="<?php echo esc_attr($next_post->post_title); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>" id="left_nav_arrow" class="cars_nav_control prev_nav_arrow"><?php _e("Previous Post", 'asalah'); ?></a>
                    <?php endif; ?>
                </div>
            
        <?php endif; ?>
    <?php endif; ?>
    </div>
    <?php endif; ?>
    <!-- end post navigation -->
    
</article>

<?php
if (is_single() || is_page()):
    if ((asalah_post_option("asalah_author_box") == "show") || (asalah_option("asalah_author_box") && asalah_post_option("asalah_author_box") != "hide")) {
        asalah_author_box();
    }

    if ((asalah_post_option("asalah_post_comments") == "show") || (asalah_option("asalah_enable_comments") && asalah_post_option("asalah_post_comments") != "hide")) {
        comments_template();
    }
endif;
?>

<?php endwhile; ?>
