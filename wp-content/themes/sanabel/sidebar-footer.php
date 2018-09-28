<?php
	if (   ! is_active_sidebar( 'footer-1'  )
		&& ! is_active_sidebar( 'footer-2' )
		&& ! is_active_sidebar( 'footer-3'  )
		&& ! is_active_sidebar( 'footer-4'  )
		&& ! is_active_sidebar( 'footer-5'  )
		&& ! is_active_sidebar( 'footer-6'  )
	)
	return;

?>
<?php 
$footer_widget1_col = 'col-md-3';
$footer_widget2_col = 'col-md-3';
$footer_widget3_col = 'col-md-3';
$footer_widget4_col = 'col-md-3';
$footer_widget5_col = 'col-md-3';
$footer_widget6_col = 'col-md-3';

if (asalah_option('asalah_footer_layout') == "footer_1") {
	$footer_widget1_col = 'col-md-4';
	$footer_widget2_col = 'col-md-4';
	$footer_widget3_col = 'col-md-4';
	$footer_widget4_col = 'col-md-4';
	$footer_widget5_col = 'col-md-4';
	$footer_widget6_col = 'col-md-4';
}

if (asalah_option('asalah_footer_layout') == "footer_2") {
	$footer_widget1_col = 'col-md-3';
	$footer_widget2_col = 'col-md-3';
	$footer_widget3_col = 'col-md-3';
	$footer_widget4_col = 'col-md-3';
	$footer_widget5_col = 'col-md-3';
	$footer_widget6_col = 'col-md-3';
}

if (asalah_option('asalah_footer_layout') == "footer_3") {
	$footer_widget1_col = 'col-md-5';
	$footer_widget2_col = 'col-md-3';
	$footer_widget3_col = 'col-md-2';
	$footer_widget4_col = 'col-md-2';
	$footer_widget5_col = 'col-md-2';
	$footer_widget6_col = 'col-md-2';
}

if (asalah_option('asalah_footer_layout') == "footer_4") {
	$footer_widget1_col = 'col-md-2';
	$footer_widget2_col = 'col-md-2';
	$footer_widget3_col = 'col-md-2';
	$footer_widget4_col = 'col-md-2';
	$footer_widget5_col = 'col-md-4';
	$footer_widget6_col = 'col-md-3';
}

if (asalah_option('asalah_footer_layout') == "footer_5") {
	$footer_widget1_col = 'col-md-2';
	$footer_widget2_col = 'col-md-2';
	$footer_widget3_col = 'col-md-2';
	$footer_widget4_col = 'col-md-2';
	$footer_widget5_col = 'col-md-2';
	$footer_widget6_col = 'col-md-2';
}

if (asalah_option('asalah_footer_layout') == "footer_6") {
	$footer_widget1_col = 'col-md-4 col-md-offset-4 text-center centered_footer_widget_area';
	$footer_widget2_col = 'col-md-4';
	$footer_widget3_col = 'col-md-4';
	$footer_widget4_col = 'col-md-4';
	$footer_widget5_col = 'col-md-4';
	$footer_widget6_col = 'col-md-4';
}

if (asalah_option('asalah_footer_layout') == "footer_7") {
	$footer_widget1_col = 'col-md-6';
	$footer_widget2_col = 'col-md-3';
	$footer_widget3_col = 'col-md-3';
}

if (asalah_option('asalah_footer_layout') == "footer_8") {
	$footer_widget1_col = 'col-md-6';
	$footer_widget2_col = 'col-md-2';
	$footer_widget3_col = 'col-md-2';
	$footer_widget4_col = 'col-md-2';
}

if (asalah_option('asalah_footer_layout') == "footer_9") {
	$footer_widget1_col = 'col-md-12';
}

if (asalah_option('asalah_footer_layout') == "footer_10") {
	$footer_widget1_col = 'col-md-9';
	$footer_widget2_col = 'col-md-3';
}

if (asalah_option('asalah_footer_layout') == "footer_11") {
	$footer_widget1_col = 'col-md-8';
	$footer_widget2_col = 'col-md-2';
	$footer_widget3_col = 'col-md-2';
}
?>

<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
<div id="first_footer" class="widget_area <?php echo esc_attr($footer_widget1_col); ?>">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</div>
<?php endif; ?>

<!-- show widget area 2 and 3 only if footer layout not equal footer_6 -->
<?php if ( asalah_option('asalah_footer_layout') != "footer_6" 
	  && asalah_option('asalah_footer_layout') != "footer_9" ): 
?>
	
	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
	<div id="second_footer" class="widget_area <?php echo esc_attr($footer_widget2_col); ?>">
		<?php dynamic_sidebar( 'footer-2' ); ?>
	</div>
	<?php endif; ?>
<?php endif; ?>

<?php if ( asalah_option('asalah_footer_layout') != "footer_6" 
	  && asalah_option('asalah_footer_layout') != "footer_9"
	  && asalah_option('asalah_footer_layout') != "footer_10" ): 
?>
	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
	<div id="third_footer" class="widget_area <?php echo esc_attr($footer_widget3_col); ?>">
		<?php dynamic_sidebar( 'footer-3' ); ?>
	</div>
	<?php endif; ?>

<?php endif; ?>

<?php if ( asalah_option('asalah_footer_layout') == "footer_2" 
	  || asalah_option('asalah_footer_layout') == "footer_4"
	  || asalah_option('asalah_footer_layout') == "footer_5"
	  || asalah_option('asalah_footer_layout') == "footer_3"
	  || asalah_option('asalah_footer_layout') == "footer_8"): 
?>
	<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
	<div id="fourth_footer" class="widget_area <?php echo esc_attr($footer_widget4_col); ?>">
		<?php dynamic_sidebar( 'footer-4' ); ?>
	</div>
	<?php endif; ?>
<?php endif; ?>

<?php 
if ( asalah_option('asalah_footer_layout') == "footer_3" 
|| asalah_option('asalah_footer_layout') == "footer_4"
|| asalah_option('asalah_footer_layout') == "footer_5" ): 
?>
	<?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
	<div id="fifth_footer" class="widget_area <?php echo esc_attr($footer_widget5_col); ?>">
		<?php dynamic_sidebar( 'footer-5' ); ?>
	</div>
	<?php endif; ?>
<?php endif; ?>

<?php if ( asalah_option('asalah_footer_layout') == "footer_5" ): ?>
	<?php if ( is_active_sidebar( 'footer-6' ) ) : ?>
	<div id="sixth_footer" class="widget_area <?php echo esc_attr($footer_widget6_col); ?>">
		<?php dynamic_sidebar( 'footer-6' ); ?>
	</div>
	<?php endif; ?>
<?php endif; ?>