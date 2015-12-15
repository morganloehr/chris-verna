!function ($) {
   "use strict";
      $(window).load(function(){
         $('body').delegate("input[name*='event_date']", 'hover', function(e){
            e.preventDefault();
            $(this).datepicker({
               defaultDate: "",
               dateFormat: "yy-mm-dd",
               numberOfMonths: 1,
               showButtonPanel: true,
            });
         });

         function load_data(datetime){
            var $this = datetime;
            var $event_date = datetime.val();
            var $list = $('select[name*="event_ids"]');
            var $values = '';
            if($list){
               $values = $list.attr('data-value');
            }
            $.ajax({
               url: ajaxurl,
               data:{action:'load_event_of_date', event_date: $event_date},
               type: 'POST',
               beforeSend:function(){
                  $this.parent().append('<span class="loading">Loading...</span>');
               },
               success: function(response){
                  $this.parent().find('.loading').remove();
                  $list.html(response.html);
                  if($values){
                     $list.val($values.split(','));
                  }
               }
            });
         }

         $("#vc_properties-panel").on("vcPanel.shown", function (e) { 
            var $event_date = $("input[name*='event_date']");
            load_data($event_date);
        });

         $('body').delegate("input[name*='event_date']", 'change', function(e){
            e.preventDefault();
            load_data($(this));
         });
      })
}(jQuery);