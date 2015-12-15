!function($) {
   if( $('#wpo_datepicker').length > 0){
    	$('#wpo_datepicker').datepicker({
	    	defaultDate: "",
			dateFormat: "yy-mm-dd",
			numberOfMonths: 1,
			showButtonPanel: true,
		});
    }
}(window.jQuery);