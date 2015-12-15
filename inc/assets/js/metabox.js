(function ($) {
    "use strict";
    jQuery(document).ready(function(){

        $('#page_layout').each(function() {
            checkEnableSelect(this,true);
            $(this).change(function() {
                checkEnableSelect(this,true);
            });
            checkEnableSelect(this,true);
        });
        selectPostLayout();

        if($('.wp-color-picker-field').length >0){
            $('.wp-color-picker-field').wpColorPicker();
        }

        WPO_Admin.params_Embed('#video_link','#option');
        WPO_Admin.params_Embed('#audio_link','#option');

        var config_layout = jQuery("#config_layout");
        var _config = jQuery('.enabal-config');
        checkEnableCheckbox(config_layout, _config);

         //show breadcrumb
        var show_breadcrumb = jQuery("#breadcrumb");
        var background = jQuery('.background_breadcrumb');
        checkEnableCheckbox(show_breadcrumb, background);

        var bg_breadcrumb = $('#background_breadcrumb');
        var bg_image = $('.bg_image');
        var bg_color = $('.bg_color');
        checkBreadcrumb(show_breadcrumb, bg_breadcrumb, bg_image, bg_color);
        jQuery(show_breadcrumb).change(function() {
            checkBreadcrumb(show_breadcrumb, bg_breadcrumb, bg_image, bg_color);    
        });

        $('#background_breadcrumb').each(function() {
            //checkEnableSelect(this,true);
            $(this).change(function() {
                checkEnableSelect(this,true);
            });
        });


        var show_related = jQuery("#show_related_post");
        var related_style = jQuery('.related_style');
        checkEnableCheckbox(show_related, related_style);

        //check format post
        var format_select = jQuery('#post-formats-select input');
        var element = jQuery('.postformat');
        checkFormat(format_select, element);
        jQuery(format_select).change(function() {
            checkFormat(format_select, element);
        });

        $('#blog_style').each(function() {
            checkEnableSelect(this,true);
            $(this).change(function() {
                checkEnableSelect(this,true);
            });
        });


        //check background type
        var type_select = jQuery('.body-background input');
        var type = jQuery('.body-type');

        var page_template = $('#page_template');
        checkTemplate(page_template);
        jQuery(page_template).change(function() {
            checkTemplate(this);
        });

        //Portfolio config
        $('#portfolio_format').each(function() {
            checkEnableSelect(this,true);
            $(this).change(function() {
                checkEnableSelect(this,true);
            });
        });

        if( $('#wpo_datetime').length >0 ){
            $('#wpo_datetime').datepicker({
                defaultDate: "",
                dateFormat: "yy-mm-dd",
                numberOfMonths: 1,
                showButtonPanel: true,
            });
        }
        

        WPO_Admin.params_Embed('#portfolio_video','#wpo-format');

       //tabs
       $('.wpo-metabox').each(function() {
                
                var current_index   = 0;
                var tabs            = $(this).find('.wpo-meta-tabs a');
                var contents        = $(this).find('.wpo-meta-content');
                
                for(var i=0;i<tabs.length;i++){
                    if(i == current_index){
                        $(tabs[i]).parent().addClass('active');
                        $(contents[i]).addClass('active');
                    }
                    $(tabs[i]).click(function() {
                        $(tabs).parent().removeClass('active');
                        $(contents).removeClass('active');
                        $(this).parent().addClass('active');
                        $($(this).attr('href')).addClass('active');
                        return false;
                    });
                }
                
                if(tabs.length == 0){
                    $(contents[current_index]).addClass('active');
                }
                
            });
});

    function checkBreadcrumb(el1, el2, el3, el4){
        var value = $(el1).prop("checked");
        if(value){
             $(el2).each(function() {
                checkEnableSelect(this,true);
            });
        }else{
            $(el3).slideUp(400);
            $(el4).slideUp(400);
        }
    }

    function checkEnableCheckbox( element1, element2){ 
            var value = jQuery(element1).prop("checked");
            if(value){
                jQuery(element2).slideDown(400);
             }else{
                jQuery(element2).slideUp(400);
            }
            jQuery(element1).change(function() {
                checkEnableCheckbox(element1, element2);
            });
    }

    //check select element
    function checkEnableSelect(element, bool){
        if(bool){
            var value = $(element).val();
        }
        var group = jQuery(element).parent().attr('data-group');
        if(group && group != ''){
            $('.'+group).slideUp(400);
            var items = String(jQuery(element).parent().attr('data-id')).split(':');
            for(var i=0;i<items.length;i++){
                if(value == items[i]){
                    $('.'+items[i]).slideDown(400);
                }
                
            }
        }
    }

    function checkFormat(el1, el2){
        for(var i=0;i<el1.length;i++){
            if(jQuery(el1[i]).attr('checked') == "checked"){
                jQuery(el2).css('display','none');
                if( jQuery('.wpo-postformat-'+jQuery(el1[i]).attr('value')).length > 0){
                    jQuery('.tabs-option').slideDown(400);
                    jQuery('.wpo-postformat-'+jQuery(el1[i]).attr('value')).css('display','block');
                    break;
                }else{
                    jQuery('.tabs-option').slideUp(400);
                    jQuery('.tabs-option').removeClass('active');
                    jQuery('#option').removeClass('active');
                    jQuery('.tabs-wpo-config').addClass('active');
                    jQuery('#wpo-config').addClass('active');
                    break;
                }
            }
        }
    }

    function checkRadioButton(el1, el2, el3){
        for(var i=0;i<el1.length;i++){
            if(jQuery(el1[i]).attr('checked') == "checked"){
                jQuery(el2).css('display','none');
                jQuery(el3+jQuery(el1[i]).attr('value')).css('display','block');
                break;
            }
        }
        jQuery(el1).change(function() {
            checkRadioButton(el1, el2, el3);
        });
    }

    function checkTemplate(element){
        if(jQuery(element).length > 0 && jQuery(element).val().length > 0){
            var str = $(element).val();
            str = str.substr(0,str.length-4);
            if( jQuery('.wpo-template-'+str).length >0 ){
                jQuery('.tabs-option').slideDown(400);
                jQuery('.wpo-check').css('display','none');
                jQuery('.wpo-template-'+str).css('display','block');
            }else{
                jQuery('.tabs-option').slideUp(400);
                jQuery('.tabs-option').removeClass('active');
                jQuery('#option').removeClass('active');
                jQuery('.tabs-wpo-config').addClass('active');
                jQuery('#wpo-config').addClass('active');
            }
        }
    }

    function selectPostLayout(){
 
    }

})(jQuery);