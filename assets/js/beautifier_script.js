(function($) {
    'use strict';
    $(document).ready(function() {
        //Translate JavaScript String
        const { __ } = wp.i18n;
        
        if(!$('body').hasClass('wc_beautifier')){
            return false;
        }
        
        //Color Picker
        $('.wcb_color_picker').wpColorPicker();
       
        //Reset by one click
        $('body.wc_beautifier').on('click','.wcb_reset_button',function(e){
            e.preventDefault();
            var activeTab = $('.wcb_wrap .nav-tab-wrapper a.nav-tab.nav-tab-active').html();
            var confirmation = confirm(__("Are you sure to reset [","wc_beautifier") + activeTab + __("] tab's data?\nUnable to reback.","wc_beautifier"));
            if(confirmation){
                var formClass = $(this).data('target');
                
                $('.tab-content.tab-content-active input[type=text],.tab-content.tab-content-active input.wcb_hidden_input,.tab-content.tab-content-active select').each(function(){
                    $(this).val('');
                });
                $('.tab-content.tab-content-active .wp-picker-clear').each(function(){
                    $(this).trigger('click');
                });
                
                $('.' + formClass + ' .wcb_submit_button').trigger('click');
            }
            return;
            
        });
        
        
        //Reset by one click
        $('body.wc_beautifier').on('click','.wcb_reset_all_button',function(e){
            e.preventDefault();
            var confirmation = confirm(__("Are you sure to reset all tab's data?\nUnable to reback.","wc_beautifier"));
            if(confirmation){
                var formClass = $(this).data('target');
                $('.' + formClass +' .tab-content input[type=text],.' + formClass +' .tab-content input.wcb_hidden_input,.' + formClass +' .tab-content select').each(function(){
                    $(this).val('');
                });
                $('.' + formClass +' .tab-content .wp-picker-clear').each(function(){
                    $(this).trigger('click');
                });
                $('.' + formClass + ' .wcb_submit_button').trigger('click');
            }
            return;
            
        });
        
        
        //Expand Option
        $('body.wc_beautifier').on('click','.wcb_exapnd_base64_code',function(e){
            e.preventDefault();
            var target = $(this).data('target');
            if(target){
                $("#" + target).toggle('medium');
            }
            return false;
        });
        
        //Textarea code select
        $('body.wc_beautifier').on('click','.wcb_export_code',function(){
                $(this).select();
            }
        );
        
        //Message and Warning hide automatically after 10 second
        var hideMsgNWarning = setInterval(function(){
            $('p.wcb_message.is-dismissible,p.wcb_error.is-dismissible').fadeOut();
            clearInterval(hideMsgNWarning);
        },4000);
        
        //confirm apply and on deleted
        $('body.wc_beautifier').on('click','.wcb_apply_template.wc_beautifier_button,.wcb_delete_template',function(e){
            e.preventDefault();
            var title = $(this).attr('title');
            var href = $(this).attr('href');
            var confirmation = confirm(__("Are you sure!\n TO ","wc_beautifier") + title);
            if(confirmation){
                window.location.href = href;
            }
            return;
        });
        
        //Template Save Start
        var templateConfirmation = __("Are you sure!\nCurrent setting,You want to save. Click Ok","wc_beautifier");
        var wcbTemplateSaveButtonSelecot = 'a.button.button-controls.wcb_template_save_button';
        $('body.wc_beautifier').on('change','#wcb_template_name_id',function(e){
            e.preventDefault();
            var confirmation = confirm(templateConfirmation);
            if(confirmation){
                $(wcbTemplateSaveButtonSelecot).attr('data-confirmation','yes');
                $(wcbTemplateSaveButtonSelecot).trigger('click');
            }
            return false;
        });
        
        $('body.wc_beautifier').on('click',wcbTemplateSaveButtonSelecot,function(e){
            e.preventDefault();
            var name = $('#wcb_template_name_id').val();
            var href = $(this).attr('href');
            var extras = "";
            if( name.length > 0 && name.length < 4){
                alert(__("Template name should min: 4 charecters or Emplty","wc_beautifier"));
                return false;
            }else{
                extras = "&name=" + name;
            }
            var alreadyConfirmation = $(wcbTemplateSaveButtonSelecot).attr('data-confirmation');
            var confirmation = true
            if(alreadyConfirmation !== 'yes'){
                confirmation = confirm(templateConfirmation);
            }
            if(confirmation){
                window.location.href = href + extras;
            }
            return false;
            
        });
        //Template Save End

        /**************Admin Panel's Setting Tab Start Here For Tab****************/

        var selectLinkTab = $("body.toplevel_page_wc-beautifier .nav-tab-wrapper a.wcb_nav_tab.nav-tab");
        var selectTabContent = $("body.toplevel_page_wc-beautifier .wcb_element_wrapper");
        var tabName = window.location.hash.substr(1);
        if($('body').hasClass('toplevel_page_wc-beautifier')){
            if(!tabName){
                tabName = selectLinkTab.first().data('tab').substr(1);
            }
            if (tabName) {
                removingActiveClass();
                $('.wcb_tab_' + tabName).addClass('tab-content-active');
                $('a.wcb_nav_for_' + tabName).addClass('nav-tab-active');
            }
            serFormActionHash('#' + tabName); //Set has onload page for form Action
        }
        $('body.toplevel_page_wc-beautifier').on('click','.nav-tab-wrapper a.wcb_nav_tab.nav-tab',function(e){
            e.preventDefault(); //Than prevent for click action of hash keyword
            var targetTabContent = $(this).data('tab').substr(1);//getting data value from data-tab attribute
            window.location.hash = targetTabContent; //Set hash keywork in Address Bar 
            
            removingActiveClass();
            
            serFormActionHash('#' + targetTabContent);
            $(this).addClass('nav-tab-active');
            $('body.toplevel_page_wc-beautifier .wcb_tab_' + targetTabContent).addClass('tab-content-active');
        });
        
        /**
         * Removing current active nav_tab and tab_content element
         * 
         * @returns {void}
         */
        function removingActiveClass() {
            selectLinkTab.removeClass('nav-tab-active');
            selectTabContent.removeClass('tab-content-active');
            return false;
        }
        
        /**
        * Sesh #hash on action attribute for form
        * 
        * @param {String} hash last hash(#) key of link. Normallly for WC_Beautifier page
        * @returns {void}
        * @author Saiful Islam<codersaiful@gmail.com>
        */
       function serFormActionHash(hash){
           var formObj = $('form.form_generator'); //Form Dom Object
           var actionURL = formObj.attr('action');
           var targetActionURL = formObj.attr('data-target_action');
           if(typeof targetActionURL === 'undefined'){
               formObj.attr('data-target_action', actionURL);
               targetActionURL = formObj.attr('data-target_action');
           }
           var finalActionURL = targetActionURL + hash;
           formObj.attr('action', finalActionURL);//set has to action URL
       }
       
       //For select, used select2 addons of jquery
        $('.wcb_select_wrapper select.wcb_select').select2();

        var mediaUploader;
        $('body.wc_beautifier').on('click','input.wcb_image',function(e){
            e.preventDefault();
            var ID = $(this).attr('id');
            var targetID = ID + '_hidden';
            var targetImg = ID + '_image';

            mediaUploader = wp.media({
                title: __('Chose background image',"wc_beautifier"),
                button: {
                  text: __('Select',"wc_beautifier")
                },
                multiple: false  // Set to true to allow multiple files to be selected
              });
            
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                if (attachment.type === 'image') {
                    $('#' + targetID).val(attachment.url);
                    $('#' + targetImg).attr('src',attachment.url);
                } else {
                    alert("Sorry! Only image supported here.");
                }
            });

            mediaUploader.open();
        });
        
        $('body.wc_beautifier').on('click','img.wcb_background_image',function(){
            var ThisClass = $(this).attr('id');
            var targetUpBtn = ThisClass.replace('_image','',ThisClass);
            $('#' + targetUpBtn).trigger('click');
        });
        
        $('body.wc_beautifier').on('click','a.wcb_image_remove',function(){
            var target_id = $(this).data('target_id');
            var no_image_src = $(this).data('no_image');
            $('#' + target_id + '_image').attr('src',no_image_src);
            $('#' + target_id + '_hidden').val('');
        });
        
    });
})(jQuery);


