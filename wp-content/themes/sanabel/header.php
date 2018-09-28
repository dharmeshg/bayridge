<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title><?php wp_title('|', true, 'right'); ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="icon" href="https://www.bayridgecounsellingcentres.ca/wp-content/uploads/2017/10/favicon1.ico" type="image/x-icon" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- start favicon and apple icons -->
    <?php global $asalah_data; ?>
    <?php if (asalah_option("asalah_fav_url")): ?>
        <link rel="shortcut icon" href="<?php echo asalah_option("asalah_fav_url"); ?>" title="Favicon" />
    <?php endif; ?>
    <?php if (asalah_option("asalah_apple_57")): ?>
        <link rel="apple-touch-icon-precomposed" href="<?php echo asalah_option("asalah_apple_57"); ?>" />
    <?php endif; ?>
    <?php if (asalah_option("asalah_apple_72")): ?>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo asalah_option("asalah_apple_72"); ?>" />
    <?php endif; ?>
    <?php if (asalah_option("asalah_apple_114")): ?>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo asalah_option("asalah_apple_114"); ?>" />
    <?php endif; ?>
    <?php if (asalah_option("asalah_apple_144")): ?>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo asalah_option("asalah_apple_144"); ?>" />
    <?php endif; ?>
    <!-- end favicons and apple icons -->
    <?php wp_head(); ?>
<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Read More";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Read More";
	}
} 
</script>
<script type="text/javascript" src="//cdn.callrail.com/companies/216207417/521a1d8f703e58655ddc/12/swap.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46504303-1', 'bayridgecounsellingcentres.ca');
  ga('send', 'pageview');

</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/form.js"></script>
<style>
.rc-anchor-normal
{
width:130px !important;
}
.ism-website-display{display:none !important;}
.custom_social_share{float:right;}
.ism_total_share .ism_tc_count.ism-zoomed{color:#fff !important;}
.ism_share_label{display:none;}
.ism_share_counts{margin-left:0;}
.header_info .contact_info.pull-left{float: right !important;}
.header_info .contact_info_item a {text-decoration: none !important; font-size: 15px; font-weight: 600; color: rgba(37, 62, 144, 1);}
.header_info .contact_info_item > i{font-size: 15px; font-weight: 600; color: rgba(37, 62, 144, 1);}
#gw_go_portfolio_mississauga{margin-top: 25px !important;}
.page_title_holder{display:none;}
.cd-tab-filter a
{
font-family: 'Raleway', sans-serif !important;
font-size: 13px !important;
font-weight: 600 !important;
color: #fff !important;
line-height: 40px !important;
height: 40px !important;
}
.cd-tab-filter a.selected{box-shadow : none !important;}
.cd-tab-filter li{margin: 0 0 0 5px;}
.cd-filter-content{width: 100%;
float: left;
text-align: center;
margin: 35px 0px 0px;}
.h3_custom
{
font-size: 20px;
margin: 0 0px 15px;
text-transform: capitalize;
}
#selectThis{font-size: 15px;
text-transform: capitalize;
font-weight: 600;
font-family: 'Raleway', sans-serif !important;
padding: 5px 20px;}
.view p{width:auto;}
body {
    font-family: 'Raleway', sans-serif !important;
font-size: 13px !important;
    line-height: 22px !important;
}
.home .vc_custom_heading h3 {
    font-size: 24px !important;
    text-transform: capitalize;
    padding-bottom: 15px;
}
.view h2
{
     width: 95%;
    float: left;
    padding: 10px;
}
.cursur
{
font-size: 12px;   
    width: 83%;
    float: left;
}
.page-id-194 #mep_0
{
 width: 640px !important;
    height: 360px !important;
}
.cd-gallery
{
    margin: 0 auto !important;   
    width: 100% !important;
}
.asalah_select_container{    padding: 15px 5px;}
#selectThis{font-size: 18px; padding: 5px 20px;}
.asalah_select_container:before{    right: 6px;}

.main_stop ul li{font-size: 22px;
    text-transform: capitalize;
    font-weight: 500;
    color: #2B4166;
    margin: 0 0 15px 0;
    font-family: sans-serif;}

.main_stop p{font-size: 15px; text-transform: capitalize; margin: 30px 0;}

.main_stop h4 {font-size: 16px;
    text-transform: capitalize;
    color: #2B4166;
    margin: 0 0 15px 0;
    font-family: sans-serif;
    background: #f5f5f5;
    padding: 15px;
    box-sizing: border-box;
    font-weight: bold;}
.shareaholic-share-buttons-container.floated ul.shareaholic-share-buttons {display:none !important;}
.logo img{padding-top:12px;}
.postid-430 .post_content .one_fourth{display:none !important;}
.postid-5014 .single_profile_img, .postid-5063 .single_profile_img {    display: none !important;}
.postid-5014 .post_content img, .postid-5063 .post_content img {    display: block !important;}
.postid-5014 .post_content img, .postid-5063 .post_content img{    width: 100% !important;}
.postid-5049 .single_profile_img{display:none !important;}
.postid-5049 .post_content img{display:block !important;}
.postid-5049 .wp-caption-text, .postid-5063 .wp-caption-text, .postid-5172 .wp-caption-text , .postid-5190 .wp-caption-text{text-align: center;}

.post_content h2{font-size: 21px;line-height: 30px;}
.postid-5046 .wp-caption img, .postid-5049 .wp-caption img{width: 100%;}
.byauth{ font-size: 17px;}
.post_content p {text-align: left;}
.postid-4049 .single_profile_img img.wp-post-image { width: 390px;  padding-top: 81px;}
.postid-4049 .post_content h1 { margin: -20px 0 30px 0;}
.postid-5100 .post_content h1{font-size: 32px; margin-top: 30px;}
.postid-5100 .post_content h2{font-size: 21px; line-height: 30px;}
.postid-5100 .post_content h3 strong{font-weight: 800;}
.postid-5100 .single_profile_img img.wp-post-image{width: 360px !important; height: 500px !important;}
.postid-5130 .post_content h2{font-size: 24px !important;line-height: 38px;}
.postid-5130 #attachment_5131{width: 450px !important;}
.postid-5130 #attachment_5131 img{width: 440px !important;}
.postid-5130 #attachment_5131 p{text-align:center;font-weight: 800;color: #000; margin: 10px 0 0 0; font-style:normal;}
.postid-5130 .wp-caption.alignright{margin: 4px 14px 0;}
.postid-3913 .single_profile_img{display: none;}
.postid-4939 .single_profile_img img.wp-post-image{display: none;}
.postid-4149 .single_profile_img img.wp-post-image{display: none;}
.postid-4049 .single .single_main_content .blog_post .post_content img{width: 390px !important; padding-top: 81px !important; display: none;}
.postid-3918 .single_profile_img img.wp-post-image{display: none;}
.postid-3908 .single_profile_img img.wp-post-image{display: none;}
.postid-3862 .single_profile_img img.wp-post-image{display: none;}
.postid-3807 .single_profile_img img.wp-post-image{display: none;}
.postid-3665 .single_profile_img img.wp-post-image{display: none;}
.postid-3682 .single_profile_img img.wp-post-image{display: none;}
.postid-3535 .single_profile_img img.wp-post-image{display: none;}
.postid-3503 .single_profile_img img.wp-post-image{display: none;}
.postid-3507 .single_profile_img img.wp-post-image{display: none;}
.postid-3469 .single_profile_img img.wp-post-image{display: none;}
.postid-3456 .single_profile_img img.wp-post-image{display: none;}
.postid-3082 .single_profile_img img.wp-post-image{display: none;}
.postid-2972 .single_profile_img img.wp-post-image{display: none;}
.postid-3475 .single_profile_img img.wp-post-image{display: none;}
.postid-2831 .single_profile_img img.wp-post-image{display: none;}
.postid-2706 .single_profile_img img.wp-post-image{display: none;}
.postid-569 .single_profile_img img.wp-post-image{display: none;}
.postid-556 .single_profile_img img.wp-post-image{display: none;}
.postid-551 .single_profile_img img.wp-post-image{display: none;}
.postid-537 .single_profile_img img.wp-post-image{display: none;}
.postid-529 .single_profile_img img.wp-post-image{display: none;}
.postid-522 .single_profile_img img.wp-post-image{display: none;}
.postid-526 .single_profile_img img.wp-post-image{display: none;}
.postid-439 .single_profile_img img.wp-post-image{display: none;}
.postid-427 .single_profile_img img.wp-post-image{display: none;}
.postid-397 .single_profile_img img.wp-post-image{display: none;}
.postid-403 .single_profile_img img.wp-post-image{display: none;}
.postid-420 .single_profile_img img.wp-post-image{display: none;}
.postid-391 .single_profile_img img.wp-post-image{display: none;}
.postid-380 .single_profile_img img.wp-post-image{display: none;}
.postid-354 .single_profile_img img.wp-post-image, .postid-5130  .single_profile_img img, .postid-5172 .single_profile_img img, .postid-5190 .single_profile_img{display: none;}
.postid-5172 #attachment_5005{margin-bottom:0px !important;}
.postid-5190 #attachment_5005 img{width:100%;}
.postid-5190 .post_content h2{    font-size: 26px;}
.postid-5190 .wp-caption-text, .postid-5190 #attachment_5005{    margin-bottom: 0px !important;}
.postid-4635 .single_profile_img img{display:none;}
</style>
<script type="text/javascript">
    var _mfq = _mfq || [];
    (function() {
        var mf = document.createElement("script");
        mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/524b854b-f1e5-4f9c-9e36-d2d3df8228e2.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
    })();
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1682048695440413');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1682048695440413&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<?php
global $post;
    $post_slug=$post->post_name;

    if($post_slug == 'thank-you'){
    ?>
    	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-935032105"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-935032105');
</script>
<!-- Event snippet for Contact Form conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-935032105/3apnCN28p2EQqertvQM'});
</script>

    <?php
    }

	wp_head(); ?>
</head>

<?php 
$body_classes_array = array(asalah_body_class());
$header_position = "top";
$header_class =  "";
$header_container = "container";

if (asalah_post_option('asalah_onepage_scroll') == 'yes') {
    wp_enqueue_style('asalah_onepagescroll');
    wp_enqueue_script('asalah_easing');
    wp_enqueue_script('asalah_slimscroll');
    wp_enqueue_script('asalah_onepagescroll');
    $body_classes_array[] = "one_page_scroll";
}

if(asalah_cross_option("asalah_header_style") == "black_overlay") {
    $header_class = "overlay_header";
    $header_class .= ' '. asalah_cross_option("asalah_header_style") . '_header';
}elseif(asalah_cross_option("asalah_header_style") == "white_overlay") {
    $header_class = "overlay_header";
    $header_class .= ' '. asalah_cross_option("asalah_header_style") . '_header';
}else {
    $header_class .= ' '. asalah_cross_option("asalah_header_style") . '_header';
}

if (asalah_cross_option("asalah_sticky_header") == "yes") {
    $header_class .= " fixed_header";
}else{
    $body_classes_array[] = " no_sticky_header";
    $body_classes_array[] = " fixed_header_mobile_disabled";
    $body_classes_array[] = " fixed_header_tablet_disabled";
}

if (asalah_cross_option("asalah_sticky_header_mobile_disable") == "yes") {
    $body_classes_array[] = " fixed_header_mobile_disabled";
}

if (asalah_cross_option("asalah_sticky_header_tablet_disable") == "yes") {
    $body_classes_array[] = " fixed_header_tablet_disabled";
}

if (asalah_cross_option("asalah_header_style") == "fixed_left") {
    $header_class = "fixed_left fixed_aside";
    $body_classes_array[] = "side_header";
    $header_position = "side";
    echo "<style>html {margin-left: 240px;}</style>";
}elseif(asalah_cross_option("asalah_header_style") == "fixed_right") {
    $header_class = "fixed_right fixed_aside";
    $body_classes_array[] = "side_header";
    $header_position = "side";
    echo "<style>html {margin-right: 240px;}</style>";
}



if (asalah_cross_option("asalah_header_items_position")) {
    $header_class .= ' '. asalah_cross_option("asalah_header_items_position") . '_position_header';
}

if (asalah_cross_option("asalah_dark_header") == "yes") {
    $header_class .= ' dark_header';
}

if (asalah_cross_option("asalah_top_header_scheme") == "dark") {
    $header_class .= ' dark_top_header';
}

if (asalah_cross_option("asalah_transparent_header") == "yes") {
    $header_class .= ' transparent_header';
}

if (asalah_cross_option('asalah_header_wrapper') == "container") {
     $header_class .= ' container';
     $header_container = "defaultwrapper";
}

?>
<body id="all_site" <?php body_class($body_classes_array); ?>>
<img src="http://www.placelocal.com/retarget_pixel.php?cid=570728&uuid=cf1f64bc-4856-11e6-9768-002590592b46" width="1" height="1" style="display:none" />
    <!-- start facebook sdk -->
    <?php if (asalah_option('asalah_use_sdk') && asalah_option('asalah_fb_id')): ?>
        <!-- Load facebook SDK -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo asalah_option('asalah_fb_id'); ?>";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- End Load facebook SDK -->
    <?php endif; ?>

    <?php
    ///////////////////////////////////////////////////////
    //////////////// add cross options here ///////////////
    ///////////////////////////////////////////////////////
    

    // define show header elemnts from post options and theme options
    $show_search = $show_contact = $show_social = $show_cart = $show_language = false;

    if (asalah_cross_option("asalah_header_contact") == "show") {
        $show_contact = true;
    }

    if (asalah_cross_option("asalah_header_social") == "show") {
        $show_social = true;
    }

    if (asalah_cross_option("asalah_header_search") == "show") {
        $show_search = true;
    }

    if (asalah_cross_option("asalah_header_cart") == "show") {
        $show_cart = true;
    }

    // if (asalah_cross_option("asalah_header_language") == "show") {
    //     $show_language = true;
    // }

    if (!$show_search) {
        $header_class .= " no_header_search";
    }
    
    ////////////////////////////////////////////////////////////////
    //////////////// start search contact and social ///////////////
    ////////////////////////////////////////////////////////////////
    
    ?>
    <!-- Start Mobile Menu Button -->
    <?php if ( has_nav_menu( 'mainmenu' ) ) { ?>
        <!-- Start Mobile Navigation -->
        <nav class="slide_menu_list_wrapper">
        <?php
        wp_nav_menu(array(
            'container' => 'div',
            'container_class' => '',
            'container_id' => 'slide_menu_list',
            'theme_location' => 'mainmenu',
            'menu_class' => 'slide_menu_list',
            'fallback_cb' => '',
            'walker' => new wp_bootstrap_navwalker(),
            ));
            ?>
        </nav>
    <?php } ?>
    <!-- end mobile menu -->
    
    <div class="all_site_wrapper canvas-off">
    <header id="site_header" class="site_header <?php echo esc_attr($header_class); ?> unsticky_header">
        <!-- start top header in case of top header position -->
        <?php if ($header_position == "top"): ?>
        <?php if ( $show_contact || $show_social ) : ?>
            <!-- start header_top container -->
            <div class="header_top">
                <div class="<?php echo esc_attr($header_container); ?>">
                    <!-- start header info -->
                    <div class="header_info clearfix">

                    <!-- start contact info -->
                    <?php if ($show_contact): ?>
                        <!-- start contact info -->
                        <div class="contact_info pull-left">
                           <?php if (asalah_option("asalah_header_mail")): ?>
                            <span class="contact_info_item email_address"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo asalah_option("asalah_header_mail"); ?>"><?php echo asalah_option("asalah_header_mail"); ?></a></span>
                        <?php endif; ?>

                        <?php if (asalah_option("asalah_header_phone")): ?>
                            <span class="contact_info_item phone_number"><i class="fa fa-phone"></i> <a href="callto:<?php echo asalah_option("asalah_header_phone"); ?>"><?php echo asalah_option("asalah_header_phone"); ?></a>
                            </span>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <!-- end contact info -->

                    <?php if ($show_language): ?>
                        <div class="asalah_language_switcher pull-right ">
                            <?php do_action('icl_language_selector'); ?>
                        </div>
                    <?php endif; ?>
                       
                    <!-- start header social icons -->     
                    <?php if ($show_social): ?>
                        <!-- start social icons -->
                        <div class="header_social pull-right">
                            <?php echo asalah_social_icons_list(); ?>
                        </div>
                        <!-- end social icons -->
                    <?php endif; ?>
                    <!-- end header social icons -->

                    </div><!-- end header info -->
                </div> <!-- end container -->
            </div> <!-- end header top -->
        <?php endif; ?>
        <?php endif; ?>
        <!-- end header_top container -->


    <div class="header_below container-fluid">

        <div class="<?php echo esc_attr($header_container); ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="first_header_wrapper tranparent_header clearfix">
                        <!-- <div class="header_overlay"></div> -->
                        <?php
                        // get logo options from theme options or post options
                        $logo_url = $logo_retina_url = $logo_url_sticky = $logo_retina_url_sticky = '';
                        $logo_w = $logo_h = $logo_w_sticky = $logo_h_sticky = 'auto';

                        //////////////////////////////////////////////////////////////
                        //////////////// start logo url and dimentions ///////////////
                        //////////////////////////////////////////////////////////////

                        if (asalah_cross_option("asalah_logo_url")) {
                            $logo_url = asalah_cross_option("asalah_logo_url");
                            if (asalah_cross_option("asalah_logo_url_retina")) {
                                $logo_retina_url = asalah_cross_option("asalah_logo_url_retina");
                            }
                            if (asalah_post_option("asalah_logo_url") && ( !asalah_post_option("asalah_logo_url_retina") || asalah_post_option("asalah_logo_url_retina") == '')  ) {
                                $logo_retina_url = null;
                            }
                            if (asalah_cross_option("asalah_logo_url_w")) {
                                $logo_w = asalah_cross_option("asalah_logo_url_w");
                            }
                            if (asalah_cross_option("asalah_logo_url_h")) {
                                $logo_h = asalah_cross_option("asalah_logo_url_h");
                            }
                        }

                        
                        if (asalah_cross_option("asalah_sticky_logo_url")) {
                            if (asalah_post_option("asalah_default_option_sticky_logo") == "yes") {
                                $logo_url_sticky = asalah_option("asalah_sticky_logo_url");
                                $logo_retina_url_sticky = asalah_option("asalah_sticky_logo_url_retina");
                            }else{
                                $logo_url_sticky = asalah_post_option("asalah_sticky_logo_url");
                                $logo_retina_url_sticky = asalah_post_option("asalah_sticky_logo_url_retina");
                            }
                        }

                        if (asalah_cross_option("asalah_sticky_logo_width")) {
                            $logo_w_sticky = asalah_cross_option("asalah_sticky_logo_width");
                        }
                        if (asalah_cross_option("asalah_sticky_logo_height")) {
                            $logo_h_sticky = asalah_cross_option("asalah_sticky_logo_height");
                        }

                       

                        // start style for logo and headers items from post options
                        $header_style_output = "";

                        if (asalah_post_option('asalah_logo_url_h') || asalah_post_option('asalah_logo_url_w')) {
                            $header_style_output .= ".logo img {";
                            if (asalah_post_option('asalah_logo_url_w')) {
                                $header_style_output .= "width:" . asalah_post_option('asalah_logo_url_w') . "px;";
                                
                            }else{
                                $header_style_output .= "width: auto;";
                            }

                            if (asalah_post_option('asalah_logo_url_h')) {
                                $header_style_output .= "height:" . asalah_post_option('asalah_logo_url_h') . "px;";
                            }else{
                                $header_style_output .= "height: auto;";
                            }

                            $header_style_output .= "}";
                        }
                        
                        if (asalah_cross_option('asalah_sticky_logo_height') || asalah_cross_option('asalah_sticky_logo_width')) {
                            $header_style_output .= ".sticky_logo img {";
                            if (asalah_post_option('asalah_sticky_logo_width')) {
                                $header_style_output .= "width:" . asalah_post_option('asalah_sticky_logo_width') . "px;";
                                
                            }else{
                                $header_style_output .= "width: auto;";
                            }

                            if (asalah_post_option('asalah_sticky_logo_height')) {
                                $header_style_output .= "height:" . asalah_post_option('asalah_sticky_logo_height') . "px;";
                            }else{
                                $header_style_output .= "height: auto;";
                            }
                            $header_style_output .= "}";

                            if (!asalah_cross_option("asalah_sticky_logo_url") 
                                || ( !asalah_post_option(".asalah_sticky_logo_url") && asalah_post_option("asalah_default_option_sticky_logo") != "yes" ) ) {
                                $header_style_output .= ".sticky_header .logo img {";
                                    if ($logo_w_sticky != 'auto') {
                                        $header_style_output .= "width:" . $logo_w_sticky . "px;";
                                    }
                                    if ($logo_h_sticky != 'auto') {
                                        $header_style_output .= "height:" . $logo_h_sticky . "px;";
                                    }
                                $header_style_output .= "}";

                                if (asalah_cross_option("asalah_logo_margin_top")) {
                                    $header_style_output .= ".sticky_header .logo {";
                                        $header_style_output .= "margin-top:" . asalah_cross_option('asalah_sticky_logo_margin_top') . "px;";
                                    $header_style_output .= "}";
                                }
                            }

                        }


                        if (asalah_post_option('asalah_header_padding_top')) {
                            $header_style_output .= ".header_below {";
                                $header_style_output .= "padding-top:" . asalah_post_option('asalah_header_padding_top') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option('asalah_header_padding_bottom')) {
                            $header_style_output .= ".header_below {";
                                $header_style_output .= "padding-bottom:" . asalah_post_option('asalah_header_padding_bottom') . "px;";
                            $header_style_output .= "}";
                        }
                        
                        if (asalah_post_option('asalah_sticky_padding_top')) {
                            $header_style_output .= ".site_header.fixed_header.sticky_header .header_below {";
                                $header_style_output .= "padding-top:" . asalah_post_option('asalah_sticky_padding_top') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option('asalah_sticky_padding_bottom')) {
                            $header_style_output .= ".site_header.fixed_header.sticky_header .header_below {";
                                $header_style_output .= "padding-bottom:" . asalah_post_option('asalah_sticky_padding_bottom') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option("asalah_logo_margin_top")) {
                            $header_style_output .= ".logo {";
                                $header_style_output .= "margin-top:" . asalah_post_option('asalah_logo_margin_top') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option("asalah_sticky_logo_margin_top")) {
                            $header_style_output .= ".sticky_logo {";
                                $header_style_output .= "margin-top:" . asalah_post_option('asalah_sticky_logo_margin_top') . "px;";
                            $header_style_output .= "}";
                        }
                        
                        if (asalah_post_option("asalah_menu_margin_top")) {
                            $header_style_output .= ".main_navbar {";
                                $header_style_output .= "margin-top:" . asalah_post_option('asalah_menu_margin_top') . "px;";
                            $header_style_output .= "}";
                        }
                        
                        if (asalah_post_option('asalah_sticky_menu_margin_top')) {
                            $header_style_output .= ".sticky_header .main_navbar {";
                                $header_style_output .= "margin-top:" . asalah_post_option('asalah_sticky_menu_margin_top') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option("asalah_header_buttons_margin_top")) {
                            $header_style_output .= ".header_button {";
                                $header_style_output .= "margin-top:" . asalah_post_option('asalah_header_buttons_margin_top') . "px;";
                            $header_style_output .= "}";
                        }
                        
                        if (asalah_post_option('asalah_sticky_header_buttons_margin_top')) {
                            $header_style_output .= ".sticky_header .header_button {";
                                $header_style_output .= "margin-top:" . asalah_post_option('asalah_sticky_header_buttons_margin_top') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option('asalah_menu_items_padding_top')) {
                            $header_style_output .= ".first_header_wrapper .navbar .nav>li>a {";
                                $header_style_output .= "padding-top:" . asalah_post_option('asalah_menu_items_padding_top') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option('asalah_menu_items_padding_bottom')) {
                            $header_style_output .= ".first_header_wrapper .navbar .nav>li>a {";
                                $header_style_output .= "padding-bottom:" . asalah_post_option('asalah_menu_items_padding_bottom') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option('asalah_sticky_menu_items_padding_top')) {
                            $header_style_output .= ".site_header.fixed_header.sticky_header .first_header_wrapper .navbar .nav>li>a {";
                                $header_style_output .= "padding-top:" . asalah_post_option('asalah_sticky_menu_items_padding_top') . "px;";
                            $header_style_output .= "}";
                        }

                        if (asalah_post_option('asalah_sticky_menu_items_padding_bottom')) {
                            $header_style_output .= ".site_header.fixed_header.sticky_header .first_header_wrapper .navbar .nav>li>a {";
                                $header_style_output .= "padding-bottom:" . asalah_post_option('asalah_sticky_menu_items_padding_bottom') . "px;";
                            $header_style_output .= "}";
                        }

                        echo "<style scoped type='text/css' media='all'>";
                            echo balanceTags($header_style_output);
                        echo "</style>";
                        ?>
                        <!-- start site logo -->
                        <?php if ($logo_url): ?>
                            <?php 
                            $logo_class = "";
                            if (!$logo_retina_url) {
                                $logo_class = " no_retina_logo";
                            }
                            ?>
                            <div class="logo">
                                <a class="default_logo <?php echo esc_attr($logo_class); ?>" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img width="<?php echo esc_attr($logo_w); ?>" height="<?php echo esc_attr($logo_h); ?>" src="<?php echo esc_url($logo_url); ?>" alt="<?php //bloginfo('name'); ?>Bayridge Professional Counselling Center" title="Bayridge Professional Counselling Center"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>
<div style="display:none;">
<div itemscope itemtype="http://schema.org/Organization">
   <a itemprop="url" href="https://www.bayridgecounsellingcentres.ca/">Home</a>
   <img itemprop="logo" src="https://www.bayridgecounsellingcentres.ca/images/bayridge_counselling_centre.jpg" />
</div>
</div>
                                <!-- start retina logo -->    
                                <?php if ($logo_retina_url) { ?>
                                <a class="retina_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img width="<?php echo esc_attr($logo_w); ?>" height="<?php echo esc_attr($logo_h); ?>" src="<?php echo esc_url($logo_retina_url); ?>" alt="<?php bloginfo('name'); ?>"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>
                                <?php } ?>
                                <!-- end retina logo -->    
                            </div>
                        <?php else: ?>

                            <!-- Text logo if no logo uploaded in option panel -->
                            <div class="logo"><h1><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo get_bloginfo('name'); ?></a></h1></div>
                        <?php endif; ?>

                        <?php if ($logo_url_sticky): ?>
                            <?php 
                            $sticky_logo_class = "";
                            if (!$logo_retina_url_sticky) {
                                $sticky_logo_class = " no_retina_logo";
                            }
                            ?>
                            <div class="sticky_logo">
                                <a class="default_logo <?php echo esc_attr($sticky_logo_class); ?>" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img width="<?php echo esc_attr($logo_w_sticky); ?>" height="<?php echo esc_attr($logo_h_sticky); ?>" src="<?php echo esc_url($logo_url_sticky); ?>" alt="<?php bloginfo('name'); ?>"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>

                                <!-- start retina logo -->    
                                <?php if ($logo_retina_url_sticky) { ?>
                                <a class="retina_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img width="<?php echo esc_attr($logo_w_sticky); ?>" height="<?php echo esc_attr($logo_h_sticky); ?>" src="<?php echo esc_url($logo_retina_url_sticky); ?>" alt="<?php bloginfo('name'); ?>"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>
                                <?php } ?>
                                <!-- end retina logo -->  
                            </div>
                        <?php endif; ?>
                        <!-- end site logo --> 

                        <div class="header_below_control_wrapper">
                            <!-- Start Search Button -->
                            <?php if ( ($show_search || $show_cart ) && $header_position == "top"): ?>
                                
                                <div class="header_button pull-right">
                                   <!-- <a href="#" class="button button-green icon-cart">Buy Now</a> -->
                                
                                

                                <?php if ($show_search): ?>

                                    <?php
                                    $search_style_class = " simple_search";
                                    if (asalah_cross_option("asalah_search_style")) {
                                        $search_style_class = " ".asalah_cross_option("asalah_search_style")."_search";
                                    }
                                    ?>
                                   <!-- start go to top -->
                                   <div id="gototop" title="Scroll To Top" class="gototop pull-right">
                                    <i class="fa fa-chevron-up"></i>
                                   </div>
                                   <!-- end go to top -->
                                    
    
                                   <!-- start search box -->
                                   <div class="search <?php echo esc_attr($search_style_class); ?> pull-right ">
                                       <?php get_template_part( 'header', 'searchform' ); ?>
                                   </div>
                                   <!-- end search box -->
                                <?php endif; ?>   

                                <?php if ($show_cart): ?>
                                   <!-- start cart button -->
                                   <?php global $woocommerce; ?>
                                   <div class="cart pull-right ">
                                       <?php do_action('header_checkout'); ?>
                                   </div>
                                   <!-- end cart button -->
                                <?php endif; ?>

                                </div>

                                

                            <?php endif; ?>
                            <!-- End Search Button -->
    
                            <!-- Start Navigation -->
                            <?php if (asalah_cross_option("asalah_menu_style") == "full"): ?>
                                <!-- ////////////////////////////////////////// -->    
                                <!-- ///////////// Full Width Menu //////////// -->
                                <!-- ////////////////////////////////////////// -->
                                <section class="main_navbar fullwidth_navbar_button">
                                    <button id="trigger-overlay" class="fa fa-align-justify overlay_button" type="button"></button>
                                </section>

                                <div class="overlay overlay-hugeinc">
                                    <button type="button" class="overlay-close"><i class="fa fa-times"></i></button>
                                    <?php
                                    wp_nav_menu(array(
                                        'container' => 'nav',
                                        'container_class' => '',
                                        'theme_location' => 'mainmenu',
                                        'menu_class' => 'full_width_menu',
                                        'fallback_cb' => '',
                                        'walker' => new wp_bootstrap_navwalker(),
                                        ));
                                    ?>
                                </div>
                            <?php else: ?>

                                <?php 
                                $main_menu_class = "default_menu_style";
                                if (asalah_cross_option("asalah_menu_style")) {
                                    $main_menu_class = asalah_cross_option("asalah_menu_style") . "_menu_style";
                                }
                                ?>

                                <!-- ////////////////////////////////////////// -->    
                                <!-- //////////// Default Main Menu /////////// -->
                                <!-- ////////////////////////////////////////// -->
                                <div class="desktop_menu">
                                    <nav class="col-md- visible-desktop col-md- navbar main_navbar pull-right <?php echo esc_attr($main_menu_class); ?>">
                                    <?php
                                    wp_nav_menu(array(
                                        'container' => 'div',
                                        'container_class' => 'main_nav',
                                        'theme_location' => 'mainmenu',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => '',
                                        'walker' => new wp_bootstrap_navwalker(),
                                        ));
                                    ?>
                                    </nav>
                                </div>
                                <!-- End Navigation -->
        
                                <!-- Start Mobile Menu Button -->
                                <?php if ( has_nav_menu( 'mainmenu' ) ) { ?>
                                <div class="mobile_menu">
                                    <div class="mobile_menu_button">
                                        <a class="mobile_menu_target" href="#slide_menu_list"><i id="showLeftPush" class="fa fa-align-justify"></i></a>
                                    </div>
                                    <!-- End Mobile Menu Button -->
                                </div>
                                <?php } ?>
                                <!-- end mobile menu -->
                            <?php endif; ?>
                            <!-- End Mobile Navigation -->

                        </div> <!-- end header_below_control_wrapper -->

                        </div> <!-- end first_header_wrapper -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end container-fluid -->

        <!-- start header top in case of side header -->
        <?php if ($header_position == "side"): ?>
            <?php if ( $show_contact || $show_social || $show_search || $show_language ) : ?>
                <!-- start header_top container -->
                <div class="header_top">
                    <div class="container">
                        <!-- start header info -->
                        <div class="header_info clearfix">
                        <!-- start contact info -->
                        <?php if ($show_contact): ?>
                            <!-- start contact info -->
                            <div class="contact_info pull-left">
                            <?php if (asalah_option("asalah_header_mail")): ?>
                                <span class="contact_info_item email_address"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo asalah_option("asalah_header_mail"); ?>"><?php echo asalah_option("asalah_header_mail"); ?></a></span>
                            <?php endif; ?>

                            <?php if (asalah_option("asalah_header_phone")): ?>
                                <span class="contact_info_item phone_number"><i class="fa fa-phone"></i> <a href="callto:<?php echo asalah_option("asalah_header_phone"); ?>"><?php echo asalah_option("asalah_header_phone"); ?></a>
                                </span>
                            <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <!-- end contact info -->
                            
                        <!-- start header social icons -->     
                        <?php if ($show_social): ?>
                            <!-- start social icons -->
                            <div class="header_social pull-right">
                                <?php echo asalah_social_icons_list(); ?>
                            </div>
                            <!-- end social icons -->
                        <?php endif; ?>
                        <!-- end header social icons -->

                        <?php if ($show_language): ?>
                            <div class="asalah_language_switcher pull-right ">
                                <?php do_action('icl_language_selector'); ?>
                            </div>
                        <?php endif; ?>
                        

                        <!-- Start Search Button -->
                        <?php if ($show_search): ?>
                            <?php
                            $search_style_class = " simple_search";
                            if (asalah_cross_option("asalah_search_style")) {
                                $search_style_class = " ".asalah_cross_option("asalah_search_style")."_search";
                            }
                            ?>
                        <!-- Start Search Button -->
                        <div class="header_button top_header_button">
                            <!-- <a href="#" class="button button-green icon-cart">Buy Now</a> -->
                            <!-- start search box -->
                            <div class="search <?php echo esc_attr($search_style_class); ?>">
                                <?php get_template_part( 'header', 'searchform' ); ?>
                            </div>
                            <!-- end search box -->
                        </div>
                        <?php endif; ?>
                        <!-- End Search Button -->

                        </div><!-- end header info -->
                    </div> <!-- end container -->
                </div> <!-- end header top -->
            <?php endif; ?>
        <?php endif; ?>
        <!-- end header_top container -->
    </header>
    <div class="fixed_header_height <?php echo esc_attr($header_class); ?> unsticky_header"></div>
    <!-- End Site Header -->
    <div id="asalah_site_content">