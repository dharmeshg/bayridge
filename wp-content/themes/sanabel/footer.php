</div>
<div class="fancybox-hidden">
<div id="contact_form_pop"><?php echo do_shortcode('[contact-form-7 id="2306" title="connect now"]') ?> </div>
</div>
<!-- Start Footer -->
<?php 
$show_footer = true;
$show_footer1 = true;
$show_footer2 = true;

if (!asalah_post_option("asalah_hide_footer")) {
    if (asalah_option("asalah_hide_footer") == true) {
        $show_footer = false;
    }
}elseif (asalah_post_option("asalah_hide_footer") == "hide") {
    $show_footer = false;
}

if (!asalah_post_option("asalah_hide_footer1")) {
    if (asalah_option("asalah_hide_footer1") == true) {
        $show_footer1 = false;
    }
}elseif (asalah_post_option("asalah_hide_footer1") == "hide") {
    $show_footer1 = false;
}

if (!asalah_post_option("asalah_hide_footer2")) {
    if (asalah_option("asalah_hide_footer2") == true) {
        $show_footer2 = false;
    }
}elseif (asalah_post_option("asalah_hide_footer2") == "hide") {
    $show_footer2 = false;
}

?>
<?php if ($show_footer): ?>
    <?php 
    $footer_class = "dark_footer";
    if (!asalah_option('asalah_dark_footer')) {
        $footer_class = 'light_footer';
    }

    if (!$show_footer2) {
        $footer_class .= ' first_footer_only';
    }

    ?>

<footer class="site_footer <?php echo esc_attr($footer_class); ?>" id="site_footer">
    <div class="footer-fluid container-fluid">
        <div class="container">
            
            
                <!-- start first footer -->
                <?php if ($show_footer1): ?>
                <div class="row">
                    <?php get_sidebar('footer'); ?>
                </div>
                <?php endif; ?>
                <!-- end first footer -->
                
                <!-- start second footer -->
                <?php if ($show_footer2): ?>
                    <div class="row">
                        <div class="col-md-12">
 
                            <div class="second_footer">
                                <!-- credits text and image -->
                                <div class="footer_text">
<a href="tel:9055810908" style="color:transparent;">905-581-0908</a>
                                    <?php if (asalah_option("asalah_credits_image") == true): ?>
                                    <span class="credits_logo"><img src="<?php echo asalah_option("asalah_credits_image"); ?>"  <?php if (asalah_option('asalah_credits_image_w') && asalah_option('asalah_credits_image_w') !== 0) { ?>width="<?php echo asalah_option("asalah_credits_image_w") ?>" <?php } if (asalah_option('asalah_credits_image_h') && asalah_option('asalah_credits_image_h') !== 0) { ?> height="<?php echo asalah_option("asalah_credits_image_h") ?>" <?php } ?> /></span> 
                                    <?php endif ?>
                                    <?php echo asalah_option("asalah_credits_text"); ?>
                                </div>
                                <!-- end credits text and image -->

                                <!-- Start Footer Navigation -->
                                <nav class="visible-desktop navbar footer_navbar pull-left" role="navigation">
                                    <?php
                                    wp_nav_menu(array(
                                        'container' => 'div',
                                        'container_class' => 'footer_nav',
                                        'theme_location' => 'footermenu',
                                        'menu_class' => 'nav',
                                        'fallback_cb' => '',
                                        'walker' => new wp_bootstrap_navwalker(),
                                    ));
                                    ?>
                                </nav>
                                <!-- End Footer Navigation -->
                            </div> <!-- end site_footer -->
                        </div> <!-- End col-md-12 --> 
                    </div> <!-- end row -->
                <?php endif; ?> <!-- end checking for second footer -->
                <!-- end second footer -->   
        </div>
    </div>
</footer>
<!-- End Footer -->
<?php endif; ?> <!-- end checking for footer -->

<!-- start color switcher -->
<?php if (asalah_option('asalah_color_switcher')): ?>

<div class="style_switcher_control closed_switcher">
    <i class="fa fa-cog"></i>
</div>
<div class="style_switcher closed_switcher" id="color-switcher" data-uri="<?php echo get_template_directory_uri(); ?>/switcher/actions/color.php">
    <h5>Color examples</h5>
    <div class="asalah_color_switcher_container clearfix switcher_section">
        <a class="asalah_color_switcher" name="26BDEF" style="width:28px;height: 30px;display: block;background-color:#26BDEF"></a>
        <a class="asalah_color_switcher" name="0a9fd8" style="width:28px;height: 30px;display: block;background-color:#0a9fd8"></a>
        <a class="asalah_color_switcher" name="38cbcb" style="width:28px;height: 30px;display: block;background-color:#38cbcb"></a>
        <a class="asalah_color_switcher" name="27bebe" style="width:28px;height: 30px;display: block;background-color:#27bebe"></a>
        <a class="asalah_color_switcher" name="0bb586" style="width:28px;height: 30px;display: block;background-color:#0bb586"></a>
        <a class="asalah_color_switcher" name="94c523" style="width:28px;height: 30px;display: block;background-color:#94c523"></a>
        <a class="asalah_color_switcher" name="f1505b" style="width:28px;height: 30px;display: block;background-color:#f1505b"></a>
        <a class="asalah_color_switcher" name="ee3733" style="width:28px;height: 30px;display: block;background-color:#ee3733"></a>
        <a class="asalah_color_switcher" name="f36510" style="width:28px;height: 30px;display: block;background-color:#f36510"></a>
        <a class="asalah_color_switcher" name="f8ba01" style="width:28px;height: 30px;display: block;background-color:#f8ba01"></a>
        <a class="asalah_color_switcher" name="f49237" style="width:28px;height: 30px;display: block;background-color:#f49237"></a>
        <a class="asalah_color_switcher" name="fdb655" style="width:28px;height: 30px;display: block;background-color:#fdb655"></a>
        <a class="asalah_color_switcher" name="C24E2B" style="width:28px;height: 30px;display: block;background-color:#C24E2B"></a>
        <a class="asalah_color_switcher" name="BA2F2F" style="width:28px;height: 30px;display: block;background-color:#BA2F2F"></a>
        <a class="asalah_color_switcher" name="72A909" style="width:28px;height: 30px;display: block;background-color:#72A909"></a>
    </div>
    <div class="switched_style"></div>

    <h5>Layout</h5>
    <div class="asalah_layout_switcher clearfix switcher_section">
        <select class="asalah_body_layout_switcher" name="asalah_body_layout_switcher" id="asalah_body_layout_switcher">
            <option value="fluid_body">Fluid Body</option>
            <option value="boxed_body">Boxed Body</option>
        </select>
    </div>

    <h5>Choose background</h5> 
    <div class="asalah_bg_swithcer clearfix switcher_section">
    <?php
    //Background Images Reader
    $bg_images_path = get_stylesheet_directory() . '/images/bg/'; // change this to where you store your bg images
    $bg_images_url = get_template_directory_uri() . '/images/bg/'; // change this to where you store your bg images
    $bg_images = array();

    if (is_dir($bg_images_path)) {
        if ($bg_images_dir = opendir($bg_images_path)) {
            while (($bg_images_file = readdir($bg_images_dir)) !== false) {
                if (stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                    natsort($bg_images); //Sorts the array into a natural order
                    $bg_images[] = $bg_images_url . $bg_images_file;
                }
            }
        }
    }
    foreach ($bg_images as $key => $option) {
        ?>
        <img class="asalah_html_bg_switcher" style="width:30px;height: 30px; margin-bottom: 2px;cursor: pointer;border: 1px solid #ccc;" src="<?php echo $option; ?>" />
        <?php
    }
    ?>
    </div>
</div>
<?php endif; ?>
<!-- end color switcher -->

</div> <!-- end all site wrapper all_site_wrapper canvas-off -->
<?php if (asalah_option('asalah_footer_code')): ?>
    <?php echo asalah_option('asalah_footer_code'); ?>
<?php endif; ?>



<?php wp_footer(); ?>

</body>
</html>