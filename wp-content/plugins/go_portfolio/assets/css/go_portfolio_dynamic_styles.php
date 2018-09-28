<?php
if ( ! defined( 'WPINC' ) ) { die; }
$plugin_prefix = self::$plugin_prefix;
$general_settings = get_option( $plugin_prefix . '_general_settings' );
$portfolios = get_option( $plugin_prefix . '_portfolios' );
$styles = get_option( $plugin_prefix . '_styles' );
if ( isset( $general_settings['primary-font-css'] ) && !empty( $general_settings['primary-font-css'] ) ) { echo '@import url(' . $general_settings['primary-font-css'] . ');'; }
if ( isset( $general_settings['secondary-font-css'] ) && !empty( $general_settings['secondary-font-css'] ) ) { echo '@import url(' . $general_settings['secondary-font-css'] . ');'; }
?>
/* -------------------------------------------------------------------------------- /

	Plugin Name: Go – Responsive Portfolio for WP
	Author: Granth
	Version: <?php echo self::$plugin_version."\n"; ?>

	+----------------------------------------------------+
		TABLE OF CONTENTS
	+----------------------------------------------------+

    [1] SETUP
    [2] LAYOUT
    [3] FILTER
    [4] PAGINATION
    [5] SLIDER	
    [6] HEADER, MEDIA, OVERLAY
    [7] POST CONTENT
    [8] ISOTOPE PLUGIN
    [9] MAGNIFIC POPUP
	[10] MEDIA QUERIES
	[11] CUSTOM - PORTFOLIO

/ -------------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------------- /
	[1]	SETUP - General settings, clearfix, common classes
/ -------------------------------------------------------------------------------- */

	.gw-gopf-no-trans * { 
	  -webkit-transition: none !important; 
	  -moz-transition: none !important; 
	  -o-transition: none !important; 
	  -ms-transition: none !important; 
	  transition: none !important; 
	}

	/* Clearfix */
	.gw-gopf-clearfix:after {
		content:".";
		display:block;
		height:0;
		clear:both;
		visibility:hidden;
	}
	.gw-gopf-clearfix { display:inline-block; } /* Hide from IE Mac \*/
	.gw-gopf-clearfix { display:block; } /* End hide from IE Mac */
	.gw-gopf-clearfix:after {
		content:".";
		display:block;
		height:0;
		clear:both;
		visibility:hidden;
	}	
		
	/* In slider mode */
	.gw-gopf .caroufredsel_wrapper {
		margin:0 !important; 
		overflow:visible !important;
	}		

	/* Reset and set image */
	.gw-gopf img {
		border:none !important;
		-moz-border-radius:0 !important;
		-webkit-border-radius:0 !important;
		border-radius:0 !important;				
		-moz-box-shadow:none !important;
		-o-box-shadow:none !important;
		-webkit-box-shadow:none !important;
		box-shadow:none !important;
		display:inline-block !important;
		height:auto !important;
		max-width:100% !important;		
		margin:0 !important;
		padding:0 !important;
		-moz-transition:none;
		-ms-transition:none;
		-o-transition:none;
		-webkit-transition:none;
		transition:none;
		vertical-align:middle;
        -ms-interpolation-mode:bicubic;
	}
	.gw-gopf iframe { width:100%; }
	.gw-gopf-post-media-wrap iframe { 
		height:100% !important;
		left:0;
		position:absolute;
		top:0;
	}
	
	/* OTHER */

	/* disable dotted outlines */
	:focus { outline:none !important; }
	::-moz-focus-inner { border:none !important; }
	a { outline:none !important;}
	
	/* remove tap highlight */
	.gw-gopf * { -webkit-tap-highlight-color: rgba(0,0,0,0); }
	
	.gw-gopf-disable-trans {
		-moz-transition:none !important;
		-ms-transition:none !important;
		-o-transition:none !important;
		-webkit-transition:none !important;
		transition:none !important;	
	}

/* -------------------------------------------------------------------------------- /
	[2]	LAYOUT - Columns
/ -------------------------------------------------------------------------------- */

	.gw-gopf-slider-type .gw-gopf-col-wrap{ display:none; }
	.gw-gopf-slider-type .gw-gopf-col-wrap:first-child { display:block; visibility: hidden; }	
	
	/* Wrappers */
	.gw-gopf-posts-wrap { 
		position:relative;
		width:100%;
		-webkit-backface-visibility: hidden;		
	}
	.gw-gopf-slider-type .gw-gopf-posts-wrap { 
		margin:-20px 0px;	
		padding:20px 0px;
	}	
	.gw-gopf-posts-wrap-inner { position:relative; }
	.gw-gopf-posts { 
		margin-right:-10px;
		width:100% !important;	
	}	
	.gw-gopf-post-col{ position:relative; }

	/* Default colum widths */
	.gw-gopf-col-wrap {
		float:left;
		letter-spacing:0;
		position:relative;		
	}
	.gw-gopf-1col .gw-gopf-col-wrap { width:100%; }
	.gw-gopf-2cols .gw-gopf-col-wrap { width:50%; }
	.gw-gopf-3cols .gw-gopf-col-wrap { width:33.33%; }
	.gw-gopf-4cols .gw-gopf-col-wrap { width:25%; }
	.gw-gopf-5cols .gw-gopf-col-wrap { width:20%; }
	.gw-gopf-6cols .gw-gopf-col-wrap { width:16.66%; }
	.gw-gopf-7cols .gw-gopf-col-wrap { width:14.2857%; }
	.gw-gopf-8cols .gw-gopf-col-wrap { width:12.50%; }
	.gw-gopf-9cols .gw-gopf-col-wrap { width:11.11%; }
	.gw-gopf-10cols .gw-gopf-col-wrap { width:10%; }
	
	/* RTL */
	.gw-gopf-rtl .gw-gopf-col-wrap { float:right; }
	.gw-gopf-slider-type.gw-gopf-rtl .gw-gopf-col-wrap { float:left; }
	
	/* opacity filtering */
	.gw-gopf-filter-opacity .gw-gopf-col-wrap.gw-gopf-disabled:before { 
		position:absolute;
		content:'';
		width:100%;
		height:100%;
		z-index:5;
		-moz-transition:none !important;
		-ms-transition:none !important;
		-o-transition:none !important;
		-webkit-transition:none !important;
		transition:none !important;		
	}
	
/* -------------------------------------------------------------------------------- /
	[3]	FILTER - Portfolio filter categories
/ -------------------------------------------------------------------------------- */	

	.gw-gopf-filter { 
		position:relative;
		z-index:1;
	}
	.gw-gopf-cats {
		list-style:none;
		display:block;		
		margin:-10px 0 0;
		padding:0;
		position:relative;
	}
	.gw-gopf-cats > span {
		background:none;
		display:inline-block;	
		margin:10px 0 0;
		padding:0;
	}
	
	.gw-gopf-cats > span.gw-gopf-hidden { display:none; }	
	
	/* Centered filter */
	.gw-gopf-cats-centered .gw-gopf-cats { text-align:center; }
	
	/* Right aligned filter */
	.gw-gopf-cats-right .gw-gopf-cats { text-align:right; }
	
/* -------------------------------------------------------------------------------- /
	[4]	PAGINATION - Portfolio pagination
/ -------------------------------------------------------------------------------- */	

	.gw-gopf-pagination-wrapper { 
		position:relative;
		display:none;
	}
	.gw-gopf-pagination {
		list-style:none;
		display:block;		
		margin:-10px 0 0 !important;
		padding:0;
		position:relative;
	}
	.gw-gopf-pagination > span,
	.gw-gopf-pagination > a {
		background:none;
		display:inline-block;	
		margin:10px 0 0;
		padding:0;
	}
	
	/* Centered pagination */
	.gw-gopf-pagination-centered .gw-gopf-pagination { text-align:center; }
	
	/* Right aligned pagination */
	.gw-gopf-pagination-right .gw-gopf-pagination { text-align:right; }	


/* -------------------------------------------------------------------------------- /
	[5]	SLIDER - Slider arrows
/ -------------------------------------------------------------------------------- */	

	.gw-gopf-slider-controls-wrap {
		margin:0;
		padding:0;
		position:relative;
		width:100%;
		z-index:1;		
	}
	.gw-gopf-slider-controls > div {
		background:none;
		float:left;		
		margin:0;
		padding:0;
		text-align:center;
		cursor:hand;
	}
	.gw-gopf-slider-controls > div:first-child { margin-left:0 !important; }	
	
	/* Centered filter */
	.gw-gopf-slider-controls-centered .gw-gopf-slider-controls {
		float:left;
		left:50%;	
		position:relative;
	}
	.gw-gopf-slider-controls-centered .gw-gopf-slider-controls > div {
		float:left;
		position:relative;	
		right:50%;
	}
	
	/* Right aligned filter */
	.gw-gopf-slider-controls-right .gw-gopf-slider-controls { float:right; }

/* -------------------------------------------------------------------------------- /
	[6]	HEADER, MEDIA, OVERLAY
/ -------------------------------------------------------------------------------- */

	.gw-gopf-post-header { 
		position:relative !important;
		width:100%;
	}
	.gw-gopf-post-media-wrap {
		height:auto;
		-moz-background-size:cover;
		-o-background-size:cover;
		-webkit-background-size:cover;
		background-size:cover;		
		background-position:50% 50%;
		overflow:hidden;		
		position:relative;
		z-index:1;
	}
	.gw-gopf-post-media-wrap img {
		width:100%;
		height:auto;
		visibility:hidden;
	}
	.gw-gopf-post-media-wrap a {
		border:none !important;
		display:block;
		position:relative;
	}

	/* Reset and set image */
	.gw-gopf-post-media-wrap img.gw-gopf-fallback-img {
		display:none !important;
		position:absolute !important;
		width:100% !important;
	}
	
	/* Overlay */
	.gw-gopf-post-overlay, .gw-gopf-post-overlay-bg {
		background:transparent;
		display:none;
		height:100%;
		filter:alpha(opacity=0); /* IE 5-7 */
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; /* IE 8 */
		-khtml-opacity:0; /* Safari 1.x */
		-moz-opacity:0; /* Netscape */
		opacity:0;		
		overflow:hidden;
		-moz-transition:opacity 0.1s ease-in-out, height 0.1s 0.1s ease-in-out, top 0.1s 0.1s ease-in-out, bottom 0.1s 0.1s ease-in-out;
		-ms-transition:opacity 0.1s ease-in-out, height 0.1s 0.1s ease-in-out, top 0.1s 0.1s ease-in-out, bottom 0.1s 0.1s ease-in-out;
		-o-transition:opacity 0.1s ease-in-out, height 0.1s 0.1s ease-in-out, top 0.1s 0.1s ease-in-out, bottom 0.1s 0.1s ease-in-out;
		-webkit-transition:opacity 0.1s ease-in-out, height 0.1s 0.1s ease-in-out, top 0.1s 0.1s ease-in-out, bottom 0.1s 0.1s ease-in-out;
		transition:opacity 0.1s ease-in-out, height 0.1s 0.1s ease-in-out, top 0.1s 0.1s ease-in-out, bottom 0.1s 0.1s ease-in-out;
		position:absolute;
		text-align:center;
		width:100%;
		z-index:3;		
	}
	.gw-gopf-has-overlay .gw-gopf-post-overlay, 
	.gw-gopf-touch .gw-gopf-has-overlay .gw-gopf-post-overlay-hover:hover .gw-gopf-post-overlay,
	.gw-gopf-touch .gw-gopf-has-overlay .gw-gopf-post-header:hover .gw-gopf-post-overlay { display:block; }
	.gw-gopf-post-overlay-bg {
		display:block;
		content:'';
		left:0;		 
		filter:alpha(opacity=0); /* IE 5-7 */
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; /* IE 8 */
		-khtml-opacity:0; /* Safari 1.x */
		-moz-opacity:0; /* Netscape */
		opacity:0;
		top:0;
		z-index:-1;		
	 }

	.gw-gopf-post-overlay-hover:hover .gw-gopf-post-overlay,
	.gw-gopf-post-header:hover .gw-gopf-post-overlay,
	.gw-gopf-touch .gw-gopf-current.gw-gopf-post .gw-gopf-post-overlay { 
		filter:alpha(opacity=100); /* IE 5-7 */
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; /* IE 8 */
		-khtml-opacity:1; /* Safari 1.x */
		-moz-opacity:1; /* Netscape */
		opacity:1;
		-moz-transition:opacity 0.3s ease-in-out, height 0.3s ease-in-out, top 0.3s ease-in-out, bottom 0.3s ease-in-out;
		-ms-transition:opacity 0.3s ease-in-out, height 0.3s ease-in-out, top 0.3s ease-in-out, bottom 0.3s ease-in-out;
		-o-transition:opacity 0.3s ease-in-out, height 0.3s ease-in-out, top 0.3s ease-in-out, bottom 0.3s ease-in-out;
		-webkit-transition:opacity 0.3s ease-in-out, height 0.3s ease-in-out, top 0.3s ease-in-out, bottom 0.3s ease-in-out;
		transition:opacity 0.3s ease-in-out, height 0.3s ease-in-out, top 0.3s ease-in-out, bottom 0.3s ease-in-out;
	}
	.gw-gopf-post-overlay:before {
		  content:'';
		  display:inline-block;
		  height:100%;
		  vertical-align:middle;
		  margin-right: -0.25em; /* Adjusts for spacing */
	}
	
	/* Overlay inner */
	.gw-gopf-post-overlay-inner,
	.gw-gopf-touch .gw-gopf-post-overlay-hover:hover .gw-gopf-post-overlay-inner, 
	.gw-gopf-touch .gw-gopf-post-header:hover .gw-gopf-post-overlay-inner {
		display:inline-block;
		left:1px;
		padding-top:20px;		
		position:relative;
		text-align:center;
		top:-40px;		
		-moz-transition:opacity 0s 0.1s ease-in-out, top 0s 0.1s ease-in-out, padding 0s 0.1s ease-in-out;
		-ms-transition:opacity 0s 0.1s ease-in-out, top 0s 0.1s ease-in-out, padding 0s 0.1s ease-in-out;
		-o-transition:opacity 0s 0.1s ease-in-out, top 0s 0.1s ease-in-out, padding 0s 0.1s ease-in-out;
		-webkit-transition:opacity 0s 0.1s ease-in-out, top 0s 0.1s ease-in-out, padding 0s 0.1s ease-in-out;
		transition:opacity 0s 0.1s ease-in-out, top 0s 0.1s ease-in-out, padding 0s 0.1s ease-in-out;
		vertical-align:middle;
		visibility:hidden;
	}
			
	.gw-gopf-post-overlay-hover:hover .gw-gopf-post-overlay-inner, 
	.gw-gopf-post-header:hover .gw-gopf-post-overlay-inner,
	.gw-gopf-touch .gw-gopf-current.gw-gopf-post .gw-gopf-post-overlay-inner { 
		padding-top:0;
		top:-5px;		
		-moz-transition:opacity 0.3s ease-in-out, top 0.15s ease-in-out, padding 0.15s 0.1s ease-in-out;
		-ms-transition:opacity 0.3s ease-in-out, top 0.15s ease-in-out, padding 0.15s 0.1s ease-in-out;
		-o-transition:opacity 0.3s ease-in-out, top 0.15s ease-in-out, padding 0.15s 0.1s ease-in-out;
		-webkit-transition:opacity 0.3s ease-in-out, top 0.15s ease-in-out, padding 0.15s 0.1s ease-in-out;
		transition:opacity 0.3s ease-in-out, top 0.15s ease-in-out, padding 0.15s 0.1s ease-in-out;
		visibility:visible;
	}
	.gw-gopf-post-overlay-btn, 
	.gw-gopf-post-overlay-circle {
		margin-top:10px;
	}	
	.gw-gopf-circle { vertical-align:top; }
	.gw-gopf-circle img { vertical-align:0; }
	
	/* Overlay link */
	.gw-gopf-post-overlay.gw-gopf-post-overlay-link {
		display:block;
		position:absolute;
		z-index:3;
		width:100%;
	}

/* -------------------------------------------------------------------------------- /
	[7]	POST CONTENT
/ -------------------------------------------------------------------------------- */

	.gw-gopf-post {
		position:relative;
	}
	.gw-gopf-post-content-wrap { 
		overflow:hidden;
		position:relative;
		z-index:1;
	}
	.gw-gopf-post-content-wrap:before { 
		content:'';
		display:block;
		height:100%;
		left:0;
		position:absolute;
		top:0;		
		width:100%;
		z-index:-1;
	}
	
	.gw-gopf-post-content {
		-webkit-box-sizing:border-box;
		-moz-box-sizing:border-box;
		box-sizing:border-box;
		overflow:hidden;
		text-align:left; 	
	}

	.gw-gopf-post-content a,
	.gw-gopf-post-content a:hover { text-decoration:none; }
	.gw-gopf-post-content h2, 
	.gw-gopf-post-content h2 a {
		margin:0 0 3px 0 !important;
		padding:0;
	}

/* -------------------------------------------------------------------------------- /
	[8] ISOTOPE PLUGIN
/ -------------------------------------------------------------------------------- */
	
	.gw-gopf-isotope { overflow:visible !important; }
	.gw-gopf-isotope-item { z-index:2; }
	.gw-gopf-isotope-item:hover { z-index:3; }
	.gw-gopf-isotope-hidden.gw-gopf-isotope-item {
		pointer-events:none;
		z-index:1;
	}
	.gw-gopf-isotope-ready .gw-gopf-isotope,
	.gw-gopf-isotope-new-added .gw-gopf-isotope {
		-webkit-transition-duration:0.8s;
		-moz-transition-duration:0.8s;
		-ms-transition-duration:0.8s;
		-o-transition-duration:0.8s;
		transition-duration:0.8s;
		-webkit-transition-property:height, width;
		-moz-transition-property:height, width;
		-ms-transition-property:height, width;
		-o-transition-property:height, width;
		transition-property:height, width;
		-webkit-backface-visibility: hidden;		

	}
	.gw-gopf-isotope-ready .gw-gopf-isotope .gw-gopf-isotope-item {
		-webkit-transition:-webkit-transform 0.8s, opacity 0.8s, z-index 0s 0.1s;
		-moz-transition:-moz-transform 0.8s, opacity 0.8s, z-index 0s 0.1s;
		-ms-transition:-ms-transform 0.8s, opacity 0.8s, z-index 0s 0.1s;
		-o-transition:-o-transform 0.8s, opacity 0.8s, z-index 0s 0.1s;
		transition:transform 0.8s, opacity 0.8s, z-index 0s 0.1s;
		-webkit-backface-visibility: hidden;			
	}

	/* RTL */
	.gw-gopf-rtl.gw-gopf-isotope-ready .gw-gopf-isotope .gw-gopf-isotope-item {
		-webkit-transition:right 0.8s, top 0.8s, opacity 0.8s, z-index 0s 0.1s;
		-moz-transition:right 0.8s, top 0.8s, opacity 0.8s, z-index 0s 0.1s;
		-ms-transition:right 0.8s, top 0.8s, opacity 0.8s, z-index 0s 0.1s;
		-o-transition:right 0.8s, top 0.8s, opacity 0.8s, z-index 0s 0.1s;
		transition:right 0.8s, top 0.8s, opacity 0.8s, z-index 0s 0.1s;	
	}	
	
	.gw-gopf-isotope-ready .gw-gopf-isotope .gw-gopf-isotope-item:hover {
		-webkit-transition:-webkit-transform 0.8s, opacity 0.8s, z-index 0s 0s;
		-moz-transition:-moz-transform 0.8s, opacity 0.8s, z-index 0s 0s;
		-ms-transition:-ms-transform 0.8s, opacity 0.8s, z-index 0s 0s;
		-o-transition:-o-transform 0.8s, opacity 0.8s, z-index 0s 0s;
		transition:transform 0.8s, opacity 0.8s, z-index 0s 0s;
		-webkit-backface-visibility: hidden;		
	}	

/* -------------------------------------------------------------------------------- /
	[9] MAGNIFIC POPUP
/ -------------------------------------------------------------------------------- */

 	.gw-gopf-mfp-close {
 		background:url(../images/icon_close.png) 0 0 no-repeat;
		cursor:pointer;		
 		height:18px;
		filter:alpha(opacity=65); /* IE 5-7 */
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=65)"; /* IE 8 */
		-khtml-opacity:0.65; /* Safari 1.x */
		-moz-opacity:0.65; /* Netscape */
		opacity:0.65;
		position:absolute;		
		right:0;
		top:6px;
        -moz-transition:all 0.1s ease-in-out;
		-ms-transition:all 0.1s ease-in-out;
        -o-transition:all 0.1s ease-in-out;
        -webkit-transition:all 0.1s ease-in-out;		
        transition:all 0.1s ease-in-out;		
		width:18px;
 	}

	@media
	only screen and (-webkit-min-device-pixel-ratio: 2),
	only screen and (   min--moz-device-pixel-ratio: 2),
	only screen and (     -o-min-device-pixel-ratio: 2/1),
	only screen and (        min-device-pixel-ratio: 2),
	only screen and (                min-resolution: 192dpi),
	only screen and (                min-resolution: 2dppx) { 	  
		.gw-gopf-mfp-close {
			background:url(../images/icon_close@2x.png) 0 0 no-repeat;
			background-size:18px auto;
		}
	}	
	
 	.gw-gopf-mfp-close:hover { 
		filter:alpha(opacity=100); /* IE 5-7 */
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; /* IE 8 */
		-khtml-opacity:1; /* Safari 1.x */
		-moz-opacity:1; /* Netscape */
		opacity:1;
	}
		
	.gw-gopf-mfp-title.mfp-title {
		color:#bababa;
		font-size:16px;
		height:auto;
		line-height:20px;
	}
	.gw-gopf-mfp-counter.mfp-counter {
		color:#bababa;
	}
	
	.gw-gopf-mfp-arrow.mfp-arrow {
		cursor:pointer !important;
		filter:alpha(opacity=65) !important; /* IE 5-7 */
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=65)" !important; /* IE 8 */
		-khtml-opacity:0.65 !important; /* Safari 1.x */
		-moz-opacity:0.65 !important; /* Netscape */
		opacity:0.65 !important;
		 -webkit-transform:none !important;
	    transform:none !important;		
	    z-index:1048;			
	}
	.gw-gopf-mfp-arrow.mfp-arrow:hover {
		filter:alpha(opacity=100) !important; /* IE 5-7 */
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)" !important; /* IE 8 */
		-khtml-opacity:1 !important; /* Safari 1.x */
		-moz-opacity:1 !important; /* Netscape */
		opacity:1 !important;
	}
	
	.gw-gopf-mfp-arrow.mfp-arrow:before, 
	.gw-gopf-mfp-arrow.mfp-arrow:after { border:none !important; }

	.gw-gopf-mfp-arrow.mfp-arrow-left {
		background:url(../images/icon_lb_prev.png) 50% 50% no-repeat !important;
	}
	
	.gw-gopf-mfp-arrow.mfp-arrow-right {
		background:url(../images/icon_lb_next.png) 50% 50% no-repeat !important;
	}	
	
	@media
	only screen and (-webkit-min-device-pixel-ratio: 2),
	only screen and (   min--moz-device-pixel-ratio: 2),
	only screen and (     -o-min-device-pixel-ratio: 2/1),
	only screen and (        min-device-pixel-ratio: 2),
	only screen and (                min-resolution: 192dpi),
	only screen and (                min-resolution: 2dppx) { 	  
		.gw-gopf-mfp-arrow.mfp-arrow-left {
			background:url(../images/icon_lb_prev@2x.png) 50% 50% no-repeat !important;
			background-size:34px auto !important;
		}
		
		.gw-gopf-mfp-arrow.mfp-arrow-right {
			background:url(../images/icon_lb_next@2x.png) 50% 50% no-repeat !important;
			background-size:34px auto !important;
		}
	}		
	
 	.mfp-iframe-holder .gw-gopf-mfp-close { top:-34px !important; }
	
	 /**
	  * Fade-move animation for second dialog
	  */
      
      /* at start */
      .my-mfp-slide-bottom .mfp-figure {
        opacity: 0;
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        -o-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
        -webkit-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -moz-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -ms-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -o-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );

      }
      
      /* animate in */
      .my-mfp-slide-bottom.mfp-ready .mfp-figure {
        opacity: 1;
        -webkit-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        -moz-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        -ms-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        -o-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
      }

      /* animate out */
      .my-mfp-slide-bottom.mfp-removing .mfp-figure {
        opacity: 0;
        -webkit-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        -moz-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        -ms-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        -o-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
      }

      /* Dark overlay, start state */
      .my-mfp-slide-bottom.mfp-bg {
        opacity: 0;
        -webkit-transition: opacity 0.3s ease-out; 
        -moz-transition: opacity 0.3s ease-out; 
        -o-transition: opacity 0.3s ease-out; 
        transition: opacity 0.3s ease-out;
      }
      /* animate in */
      .my-mfp-slide-bottom.mfp-ready.mfp-bg {
        opacity: 0.8;
      }
      /* animate out */
      .my-mfp-slide-bottom.mfp-removing.mfp-bg {
        opacity: 0;
      }

/* -------------------------------------------------------------------------------- /
	[10]	MEDIA QUERIES
/ -------------------------------------------------------------------------------- */

<?php if ( isset( $general_settings['responsivity'] ) ) : ?>  
/* -------------------------------------------------------------------------------- /
	[10.1] TABLET (LANDSCAPE)
/ -------------------------------------------------------------------------------- */

	@media only screen<?php 
		echo isset( $general_settings['size1-min'] ) && $general_settings['size1-min'] != '' ? ' and (min-width: ' . $general_settings['size1-min'] . ')' : '' ;
		echo isset( $general_settings['size1-max'] ) && $general_settings['size1-max'] != '' ? ' and (max-width: ' . $general_settings['size1-max'] . ')' : '' 		
		?> {
		.gw-gopf-posts { letter-spacing:10px; }
		.gw-gopf {
			<?php echo ( isset( $general_settings['max-width3'] ) && !empty( $general_settings['max-width3'] ) ? 'max-width:' . floatval( $general_settings['max-width3'] ) . 'px;' : '' ); ?>
			margin:0 auto;
		}
		.gw-gopf-1col .gw-gopf-col-wrap { 
        	float:left !important;		
			margin-left:0 !important;
        	width:100%;		
		} 
		.gw-gopf-2cols .gw-gopf-col-wrap,
		.gw-gopf-3cols .gw-gopf-col-wrap,
		.gw-gopf-4cols .gw-gopf-col-wrap,
		.gw-gopf-5cols .gw-gopf-col-wrap,
		.gw-gopf-6cols .gw-gopf-col-wrap,
		.gw-gopf-7cols .gw-gopf-col-wrap,
		.gw-gopf-8cols .gw-gopf-col-wrap,
		.gw-gopf-9cols .gw-gopf-col-wrap,
		.gw-gopf-10cols .gw-gopf-col-wrap { width:50% !important; }		
	}

/* -------------------------------------------------------------------------------- /
	[10.2] MOBILE (LANDSCAPE)
/ -------------------------------------------------------------------------------- */

	@media only screen<?php 
		echo isset( $general_settings['size2-min'] ) && $general_settings['size2-min'] != '' ? ' and (min-width: ' . $general_settings['size2-min'] . ')' : '' ;
		echo isset( $general_settings['size2-max'] ) && $general_settings['size2-max'] != '' ? ' and (max-width: ' . $general_settings['size2-max'] . ')' : '' 		
		?> {
		.gw-gopf-posts { letter-spacing:20px; }
		.gw-gopf {
			<?php echo ( isset( $general_settings['max-width2'] ) && !empty( $general_settings['max-width2'] ) ? 'max-width:' . floatval( $general_settings['max-width2'] ) . 'px;' : '' ); ?>
			margin:0 auto;
		}		
		.gw-gopf-1col .gw-gopf-col-wrap,
		.gw-gopf-2cols .gw-gopf-col-wrap,
		.gw-gopf-3cols .gw-gopf-col-wrap,
		.gw-gopf-4cols .gw-gopf-col-wrap,
		.gw-gopf-5cols .gw-gopf-col-wrap,
		.gw-gopf-6cols .gw-gopf-col-wrap,
		.gw-gopf-7cols .gw-gopf-col-wrap,
		.gw-gopf-8cols .gw-gopf-col-wrap,
		.gw-gopf-9cols .gw-gopf-col-wrap,
		.gw-gopf-10cols .gw-gopf-col-wrap { 
        	float:left !important;		
			margin-left:0 !important;
        	width:100%;
		}

		/* RTL */
		.gw-gopf-rtl.gw-gopf-1col .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-2cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-3cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-4cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-5cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-6cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-7cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-8cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-9cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-10cols .gw-gopf-col-wrap { float:right !important; }
		
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-1col .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-2cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-3cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-4cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-5cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-6cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-7cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-8cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-9cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-10cols .gw-gopf-col-wrap { float:left !important; }
		
	}

/* -------------------------------------------------------------------------------- /
	[10.3] MOBILE (PORTRAIT)
/ -------------------------------------------------------------------------------- */

	@media only screen<?php 
		echo isset( $general_settings['size3-min'] ) && $general_settings['size3-min'] != '' ? ' and (min-width: ' . $general_settings['size3-min'] . ')' : '' ;
		echo isset( $general_settings['size3-max'] ) && $general_settings['size3-max'] != '' ? ' and (max-width: ' . $general_settings['size3-max'] . ')' : '' 		
		?> {
		.gw-gopf-posts { letter-spacing:30px; }
		.gw-gopf {
			<?php echo ( isset( $general_settings['max-width'] ) && !empty( $general_settings['max-width'] ) ? 'max-width:' . floatval( $general_settings['max-width'] ) . 'px;' : '' ); ?>
			margin:0 auto;
		}
		.gw-gopf-1col .gw-gopf-col-wrap,
		.gw-gopf-2cols .gw-gopf-col-wrap,
		.gw-gopf-3cols .gw-gopf-col-wrap,
		.gw-gopf-4cols .gw-gopf-col-wrap,
		.gw-gopf-5cols .gw-gopf-col-wrap,
		.gw-gopf-6cols .gw-gopf-col-wrap,
		.gw-gopf-7cols .gw-gopf-col-wrap,
		.gw-gopf-8cols .gw-gopf-col-wrap,
		.gw-gopf-9cols .gw-gopf-col-wrap,
		.gw-gopf-10cols .gw-gopf-col-wrap {
        	margin-left:0 !important;
        	float:left !important;
        	width:100%;
         }
		 
		/* RTL */
		.gw-gopf-rtl.gw-gopf-1col .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-2cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-3cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-4cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-5cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-6cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-7cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-8cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-9cols .gw-gopf-col-wrap,
		.gw-gopf-rtl.gw-gopf-10cols .gw-gopf-col-wrap { float:right !important; }
		
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-1col .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-2cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-3cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-4cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-5cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-6cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-7cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-8cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-9cols .gw-gopf-col-wrap,
		.gw-gopf-slider-type.gw-gopf-rtl.gw-gopf-10cols .gw-gopf-col-wrap { float:left !important; }		
		 
	}	

<?php endif; ?> 
/* -------------------------------------------------------------------------------- /
	[11] CUSTOM - PORTFOLIO
/ -------------------------------------------------------------------------------- */
<?php
$cnt=1;
if ( isset( $portfolios ) && !empty( $portfolios ) ) {
foreach ( $portfolios as $key => $portfolio ) {
if ( isset( $portfolio['enabled'] ) ) {
$id_prefix = '#' . $plugin_prefix . '_' . $portfolio['id'];
?> 
/* -------------------------------------------------------------------------------- /
<?php echo '	[10.' . $cnt . ']	name: ' .$portfolio['name'] . ' - id:'.  $portfolio['id']; ?> 
/ -------------------------------------------------------------------------------- */
<?php echo "\n"; 

	/* Get style */
	if ( isset( $portfolio['style'] ) && !empty( $portfolio['style'] ) && $styles[$portfolio['style']]['data'] ) {
		$style = $portfolio['style'];
		$style_data = stripslashes( isset( $portfolio['style-data'] ) ? $portfolio['style-data'] : $styles[$portfolio['style']]['data'] );
				
		/* Replace variables */
		foreach( $portfolio['css'] as $selector => $value ) { 
			
			if ( isset( $value['val'] ) && !empty( $value['val'] ) ) {
				$value['val'] = trim( $value['val'] );
			}
			
			/* Check integers */
			if ( isset( $value['type'] ) && $value['type'] == 'int' ) {
				$value['val'] = floatval( $value['val'] );
				if ( empty( $value['val'] ) ) { $value['val'] = 0; }
			}
			
			/* Set font families */
			if ( $selector == 'font_family_xl' && isset ( $value['val'] ) ) {
				if ( $value['val'] == '1' && isset( $general_settings['primary-font'] ) && !empty( $general_settings['primary-font'] ) ) {
					$value['val'] = $general_settings['primary-font'];
				} elseif ( $value['val'] == '2' && isset( $general_settings['secondary-font'] ) && !empty( $general_settings['secondary-font'] ) ) {
					$value['val'] = $general_settings['secondary-font'];
				} else {
					$value['val'] = 'inherit';
				}
			} 

			if ( $selector == 'font_family_l' && isset ( $value['val'] ) ) {
				if ( $value['val'] == '1' && isset( $general_settings['primary-font'] ) && !empty( $general_settings['primary-font'] ) ) {
					$value['val'] = $general_settings['primary-font'];
				} elseif ( $value['val'] == '2' && isset( $general_settings['secondary-font'] ) && !empty( $general_settings['secondary-font'] ) ) {
					$value['val'] = $general_settings['secondary-font'];
				} else {
					$value['val'] = 'inherit';
				}
			} 

			if ( $selector == 'font_family_m' && isset ( $value['val'] ) ) {
				if ( $value['val'] == '1' && isset( $general_settings['primary-font'] ) && !empty( $general_settings['primary-font'] ) ) {
					$value['val'] = $general_settings['primary-font'];
				} elseif ( $value['val'] == '2' && isset( $general_settings['secondary-font'] ) && !empty( $general_settings['secondary-font'] ) ) {
					$value['val'] = $general_settings['secondary-font'];
				} else {
					$value['val'] = 'inherit';
				}
			}

			if ( $selector == 'font_family_s' && isset ( $value['val'] ) ) {
				if ( $value['val'] == '1' && isset( $general_settings['primary-font'] ) && !empty( $general_settings['primary-font'] ) ) {
					$value['val'] = $general_settings['primary-font'];
				} elseif ( $value['val'] == '2' && isset( $general_settings['secondary-font'] ) && !empty( $general_settings['secondary-font'] ) ) {
					$value['val'] = $general_settings['secondary-font'];
				} else {
					$value['val'] = 'inherit';
				}
			}

			/* Set opacity */
			if ( $selector == 'post_opacity' && isset ( $value['val'] ) ) {
				$value['val'] = $value['val']/100;
			}

			if ( $selector == 'box_shadow_opacity' && isset ( $value['val'] ) ) {
				$value['val'] = $value['val']/100;
			}
			
			/* validate colors */
			if ( $selector == 'main_color_1' && isset ( $value['val'] ) ) {
				$value['val'] = preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value['val'] ) ? $value['val'] : 'inherit';
			}
			if ( $selector == 'main_color_2' && isset ( $value['val'] ) ) {
				$value['val'] = preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value['val'] ) ? $value['val'] : 'inherit';
			}
			if ( $selector == 'main_color_3' && isset ( $value['val'] ) ) {
				$value['val'] = preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value['val'] ) ? $value['val'] : 'inherit';
			}
			if ( $selector == 'main_color_4' && isset ( $value['val'] ) ) {
				$value['val'] = preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value['val'] ) ? $value['val'] : 'inherit';
			}									
			if ( $selector == 'highlight_color' && isset ( $value['val'] ) ) {
				$value['val'] = preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value['val'] ) ? $value['val'] : 'inherit';
			}									
			if ( $selector == 'post_content_color' && isset ( $value['val'] ) ) {
				$value['val'] = preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value['val'] ) ? $value['val'] : 'inherit';
			}
											
			$style_data = preg_replace( '~(\(\()\s?('. $selector .'+\s?)(\)\))~', $value['val'], $style_data );
			
		}

		/* Modify column and row space - ".gw-gopf-posts-wrap-inner" */
		$css_prop = null;
		if ( isset( $portfolio['h-space'] ) && !empty( $portfolio['h-space'] ) ) {
			$css_prop = 'margin-left:' . floatval( $portfolio['h-space'] )*-1 . 'px;';
		}
		if ( isset( $portfolio['v-space'] ) && !empty( $portfolio['v-space'] ) ) {
			$css_prop .= 'margin-top:' . floatval( $portfolio['v-space'] )*-1 . 'px;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-posts-wrap-inner { %2$s }', $id_prefix, $css_prop ) . "\n"; }

		/* opacity change filtering */
		$css_prop = null;
		if ( isset( $portfolio['filter-inactive-opacity'] ) ) {
			$css_prop = 'filter:alpha(opacity=' . floatval( $portfolio['filter-inactive-opacity'] ) . ') !important;';
			$css_prop .= '-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=' . floatval( $portfolio['filter-inactive-opacity'] ) . ')" !important;';
			$css_prop .= '-khtml-opacity:' . floatval( $portfolio['filter-inactive-opacity'] )/100 . ' !important;';
			$css_prop .= '-moz-opacity:' . floatval( $portfolio['filter-inactive-opacity'] )/100 . ' !important;';
			$css_prop .= 'opacity:' . floatval( $portfolio['filter-inactive-opacity'] )/100 . ' !important;';				
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-filter-opacity .gw-gopf-col-wrap.gw-gopf-disabled { %2$s }', $id_prefix, $css_prop ) . "\n"; }
	
		/* Modify column and row space - ".gw-gopf-post-col" */
		$css_prop = null;
		if ( isset( $portfolio['h-space'] ) && !empty( $portfolio['h-space'] ) ) {
			$css_prop = 'margin-left:' . floatval( $portfolio['h-space'] ) . 'px;';
		}
		if ( isset( $portfolio['v-space'] ) && !empty( $portfolio['v-space'] ) ) {
			$css_prop .= 'margin-top:' . floatval( $portfolio['v-space'] ) . 'px;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-post-col { %2$s }', $id_prefix, $css_prop ) . "\n"; }
	
		/* Modify space between portfolio filter and portfolio items - ".gw-gopf-cats > div" */
		$css_prop = null;
		if ( isset( $portfolio['filter-v-space'] ) && !empty( $portfolio['filter-v-space'] ) ) {
			if ( !isset( $portfolio['filter-v-pos'] ) || ( isset( $portfolio['filter-v-pos'] ) && $portfolio['filter-v-pos'] == 'top') ) {			
				$css_prop = 'margin-bottom:' . floatval( $portfolio['filter-v-space'] ) . 'px !important;';
			} else {
				$css_prop = 'margin-top:' . floatval( $portfolio['filter-v-space'] ) . 'px !important;';
			}			
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-cats { %2$s }', $id_prefix, $css_prop ) . "\n"; }	
		
		/* Modify left space for portfolio filter categories - ".gw-gopf-filter" */
		$css_prop = null;
		if ( isset( $portfolio['filter-h-space'] ) && !empty( $portfolio['filter-h-space']  ) ) {
			$css_prop = 'margin-left:' . floatval( $portfolio['filter-h-space'] ) * -1 . 'px;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-filter { %2$s }', $id_prefix, $css_prop ) . "\n"; }
		
		/* Modify space between portfolio filter categories - ".gw-gopf-cats > div" */
		$css_prop = null;
		if ( isset( $portfolio['filter-h-space'] ) && !empty( $portfolio['filter-h-space'] ) ) {
			$css_prop = 'margin-left:' . floatval( $portfolio['filter-h-space'] ) . 'px;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-cats > span { %2$s }', $id_prefix, $css_prop ) . "\n"; }
		
		/* Modify slider arrow spaces - ".gw-gopf-slider-controls > div" */
		$css_prop = null;
		if ( isset( $portfolio['slider-arrows-v-space'] ) && !empty( $portfolio['slider-arrows-v-space'] ) ) {
			$css_prop = 'margin-bottom:' . floatval( $portfolio['slider-arrows-v-space'] ) . 'px;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-slider-controls > div { %2$s }', $id_prefix, $css_prop ) . "\n"; }	
			
		/* Modify slider arrow spaces - ".gw-gopf-slider-controls > div" */
		$css_prop = null;
		if ( isset( $portfolio['slider-arrows-h-space'] ) && !empty( $portfolio['slider-arrows-h-space'] ) ) {
			$css_prop .= 'margin-left:' . floatval( $portfolio['slider-arrows-h-space'] ) . 'px;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-slider-controls > div { %2$s }', $id_prefix, $css_prop ) . "\n"; }
	
		/* Modify overlay color - ".gw-gopf-post-overlay-bg" */
		$css_prop = null;
		if ( isset( $portfolio['overlay-color'] ) && !empty( $portfolio['overlay-color'] ) ) {
			$portfolio['overlay-color'] = preg_match( '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $portfolio['overlay-color'] ) ? $portfolio['overlay-color'] : 'inherit';
			$css_prop = 'background-color:' . $portfolio['overlay-color'] . ';';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-post-overlay-bg { %2$s }', $id_prefix, $css_prop ) . "\n"; }	
	
		/* Modify overlay opacity - ".gw-gopf-post-overlay-bg" */
		$css_prop = null;
		if ( isset( $portfolio['overlay-opacity'] ) ) {
			$css_prop = 'filter:alpha(opacity=' . floatval( $portfolio['overlay-opacity'] ) . ');';
			$css_prop .= '-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=' . floatval( $portfolio['overlay-opacity'] ) . ')";';
			$css_prop .= '-khtml-opacity:' . floatval( $portfolio['overlay-opacity'] )/100 . ';';
			$css_prop .= '-moz-opacity:' . floatval( $portfolio['overlay-opacity'] )/100 . ';';
			$css_prop .= 'opacity:' . floatval( $portfolio['overlay-opacity'] )/100 . ';';			
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-post-overlay-bg { %2$s }', $id_prefix, $css_prop ) . "\n"; }	
	
		/* Modify post content align - ".gw-gopf-post-content" */
		$css_prop = null;
		if ( isset( $portfolio['post-align'] ) && !empty( $portfolio['post-align'] ) ) {
			$css_prop = 'text-align:' . $portfolio['post-align'] . ';';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-post-content { %2$s }', $id_prefix, $css_prop ) . "\n"; }
	
		/* Modify button align - ".gw-gopf-post-more" */
		$css_prop = null;
		if ( isset( $portfolio['post-button-align'] ) && !empty( $portfolio['post-button-align'] ) ) {
			$css_prop = 'text-align:' . $portfolio['post-button-align'] . ';';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-post-more { %2$s }', $id_prefix, $css_prop ) . "\n"; }	
		
		/* Modify space between portfolio pagination and portfolio items - ".gw-gopf-pagination-wrapper" */
		$css_prop = null;
		if ( isset( $portfolio['pagination-v-space'] ) && !empty( $portfolio['pagination-v-space'] ) ) {
			$css_prop = 'padding-top:' . floatval( $portfolio['pagination-v-space'] ) . 'px;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-pagination-wrapper { %2$s }', $id_prefix, $css_prop ) . "\n"; }		

		/* Modify column and row space - ".gw-gopf-post-media-wrap" */
		$css_prop = null;
		if ( isset( $portfolio['thumb-bg-pos-x'] ) && isset( $portfolio['thumb-bg-pos-y'] ) ) {
			$css_prop = 'background-position:' . floatval( $portfolio['thumb-bg-pos-x'] ) . '% ' . floatval( $portfolio['thumb-bg-pos-y'] ) . '%;';
		}
		if ( $css_prop ) { echo sprintf( '%1$s .gw-gopf-post-media-wrap { %2$s }', $id_prefix, $css_prop ) . "\n"; }
	
		/* Add ID prefix to css selectors */
		$style_data = preg_replace( '/(\/\*[\s\S]*?\*\/|[\t]|[\r]|[\n]|[\r\n])/', 
					'', 
					$style_data );
					
		/* Remove comments & minify */					
		$style_data = preg_replace( '/([^\r\n,{}]+)(,(?=[^}]*{)|\s*{)/', 
					$id_prefix . ' $0', 
					$style_data );
		
		echo $style_data . "\n";
		
	}
	 
$cnt++;
}
}
}
?>
