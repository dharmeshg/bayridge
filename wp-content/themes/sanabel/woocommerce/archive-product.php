<?php
$postid =  woocommerce_get_page_id('shop');
$post = get_post($postid);
$shop_page_title = get_the_title();
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

get_header('shop');

if(class_exists('RevSliderFront')) {
    asalah_rev_slider_wrapper($postid);
}
?>
<!-- start before content from post option -->
<?php
if (asalah_post_option("asalah_before_content")) {
    $before_content = asalah_post_option("asalah_before_content");
    echo do_shortcode($before_content);
}

$shop_page_class = "default_page_style";
if (asalah_post_option("asalah_shop_style") == "noborder") {
    $shop_page_class = "noborder_page_style";
}
?>
<div class="site_content">

<?php asalah_page_title_holder("", $shop_page_title, $woo = true, $postid); ?>

<div class="new_section shop_page <?php echo esc_attr($shop_page_class); ?>">
    <div class="container">
    <div class="row">
        <?php
        /**
         * woocommerce_before_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        do_action('woocommerce_before_main_content');
        ?>

        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>


        <?php endif; ?>

        <?php do_action('woocommerce_archive_description'); ?>

        <?php if (have_posts()) : ?>

            <?php
            /**
             * woocommerce_before_shop_loop hook
             *
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action('woocommerce_before_shop_loop');
            ?>

            <?php woocommerce_product_loop_start(); ?>

            <?php woocommerce_product_subcategories(); ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php woocommerce_get_template_part('content', 'product'); ?>

            <?php endwhile; // end of the loop.  ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php
            /**
             * woocommerce_after_shop_loop hook
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
            ?>

        <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

            <?php woocommerce_get_template('loop/no-products-found.php'); ?>

        <?php endif; ?>

        <?php
        /**
         * woocommerce_after_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
        ?>

        <?php
        /**
         * woocommerce_sidebar hook
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action('woocommerce_sidebar');
        ?>
    </div>
    </div>
</div>

<!-- start after content from post option -->
<?php
if (asalah_post_option("asalah_after_content")) {
    $after_content = asalah_post_option("asalah_after_content");
    echo do_shortcode($after_content);
}
?>

</div>
<?php get_footer('shop'); ?>