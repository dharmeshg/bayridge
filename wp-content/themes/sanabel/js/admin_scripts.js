(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.asalah_color').wpColorPicker();
    });

    jQuery(document).on('click', '.aq_upload_button', function(event) {
        var $clicked = jQuery(this), frame,
            input_id = $clicked.prev().attr('id'),
            media_type = $clicked.attr('rel');
            
        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( frame ) {
            frame.open();
            return;
        }

        // Create the media frame.
        frame = wp.media.frames.aq_media_uploader = wp.media({
            // Set the media type
            library: {
                type: media_type
            },
            view: {
                
            }
        });

        // When an image is selected, run a callback.
        frame.on( 'select', function() {
            // Grab the selected attachment.
            var attachment = frame.state().get('selection').first();
            
            jQuery('#' + input_id).val(attachment.attributes.url);
            
            if(media_type == 'image') jQuery('#' + input_id).parent().parent().parent().find('.screenshot img').attr('src', attachment.attributes.url);
            
        });

        frame.open();
    });

// reorganize mete on page load
var selected_page_template = jQuery("select[name='page_template'] option:selected ").val();
// show portfolio template box in case portfolio page selected
if (selected_page_template == 'page-templates/portfolio.php' || selected_page_template == 'page-templates/portfolio-full.php' ) {
	jQuery("#asalah_blog_template_box").slideUp('300');
	jQuery("#asalah_portfolio_template_box").slideDown('300');
} else if (selected_page_template == 'page-templates/blog.php') {
	jQuery("#asalah_portfolio_template_box").slideUp('300');
	jQuery("#asalah_blog_template_box").slideDown('300');
}
// reorganize other meta options
if (selected_page_template != '') {
	jQuery("[data_mother_templates]").not("[data_mother_templates*='"+selected_page_template+"']").slideUp('300');
	jQuery("[data_mother_templates*='"+selected_page_template+"']").slideDown('300');
}

// reorganize meta on template change
jQuery("select[name='page_template']").change(function(){
	var changed_page_template = jQuery(this).val();
	// hide portfolio and blog template boxes before checking
	// show portfolio template box in case portfolio page selected
	
	if (changed_page_template == 'page-templates/portfolio.php' || changed_page_template == 'page-templates/portfolio-full.php' ) {
		jQuery("#asalah_blog_template_box").slideUp('300');
		jQuery("#asalah_portfolio_template_box").slideDown('300');
	}else if (changed_page_template == 'page-templates/blog.php') {
		jQuery("#asalah_portfolio_template_box").slideUp('300');
		jQuery("#asalah_blog_template_box").slideDown('300');
	} else {
		jQuery("#asalah_portfolio_template_box").slideUp('300');
		jQuery("#asalah_blog_template_box").slideUp('300');
	}
	jQuery("[data_mother_templates]").not("[data_mother_templates*='"+changed_page_template+"']").slideUp('300');
	jQuery("[data_mother_templates*='"+changed_page_template+"']").slideDown('300');
});
     
})( jQuery );