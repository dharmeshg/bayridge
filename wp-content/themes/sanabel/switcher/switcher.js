
jQuery(document).ready(function()
{
    jQuery(".asalah_color_switcher").live("click", function()
    {
        var color = jQuery(this).attr("name");
        var dataString = 'color=' + color;
		var uri = jQuery("#color-switcher").attr('data-uri');

        jQuery.ajax
                ({
                    type: "POST",
                    url: uri,
                    data: dataString,
                    cache: false,
                    success: function(response)
                    {
                        jQuery(".switched_style").html(response);

                    }
                });
                
                jQuery('#asalah_color_switcher_picker').css('backgroundColor', '#' + color);
    });

// Close button action


    jQuery(".asalah_html_bg_switcher").live("click", function()
    {
        var bg = jQuery(this).attr("src");
        var bg_att = 'url("' + bg + '")'
        jQuery('html').css("background", bg_att)


    });
    
    jQuery(".style_switcher_control.closed_switcher").live("click", function()
    {
        jQuery('.style_switcher_control').addClass('opened_switcher');
        jQuery('.style_switcher').addClass('opened_switcher');
        jQuery('.style_switcher_control').removeClass('closed_switcher');
        jQuery('.style_switcher').removeClass('closed_switcher');
    });
    
    jQuery(".style_switcher_control.opened_switcher").live("click", function()
    {
        jQuery('.style_switcher_control').addClass('closed_switcher');
        jQuery('.style_switcher').addClass('closed_switcher');
        jQuery('.style_switcher_control').removeClass('opened_switcher');
        jQuery('.style_switcher').removeClass('opened_switcher');
    });



// Check Reviews On or Off 
    jQuery("select[name='asalah_body_layout_switcher']").change(function() {
        var selected_swithcer_layout = jQuery("select[name='asalah_body_layout_switcher'] option:selected ").val();

        if (selected_swithcer_layout == 'boxed_body') {
            jQuery('body').removeClass('fluid_body');
            jQuery('body').addClass('boxed_body');
            revapi1.revredraw();

        } else if (selected_swithcer_layout == 'fluid_body') {
            jQuery('body').removeClass('boxed_body');
            jQuery('body').addClass('fluid_body');
            revapi1.revredraw();
        }
    });
// activate color picker
    jQuery('#asalah_color_switcher_picker').ColorPicker({
        color: '#ffffff',
        onShow: function(colpkr) {
            jQuery(colpkr).fadeIn(500);
            return false;
        },
        onHide: function(colpkr) {
            jQuery(colpkr).fadeOut(500);
            return false;
        },
        onChange: function(hsb, hex, rgb) {
            jQuery('#asalah_color_switcher_picker').css('backgroundColor', '#' + hex);
            var color = hex;
             var dataString = 'color=' + color;


        jQuery.ajax
                ({
                    type: "POST",
                    url: "http://projects.asalahsolutions.com/sarraty/wp-content/themes/sarraty/switcher/actions/color.php",
                    data: dataString,
                    cache: false,
                    success: function(response)
                    {
                        jQuery(".switched_style").html(response);

                    }
                });
        }
    });
});


