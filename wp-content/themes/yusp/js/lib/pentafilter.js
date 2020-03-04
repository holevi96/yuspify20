 (function( $ ) {
 
    $.fn.pentafilter = function(filterwrapper, options) {
		
		 var settings = $.extend({
            // These are the defaults.
            time: 300
        }, options );
		
		var container = this;
	
		var effect = $('#'+filterwrapper).attr('effect-type');	
		
		$('#'+filterwrapper + " .pentafilter").click(function(){

                if(!$(this).hasClass('active')){

                var classList = $(this).attr('termName').split(/\s+/);
                $(container).attr('visible','none');

                $.each(classList, function(index, item) {
                    $(container.selector + '[termname*=' + item + ']').attr('visible','visible');
                });

                if(jQuery(container.selector + '[visible="visible"]').length == 0){

                    jQuery(container.selector + '.notfound').attr('visible','visible');
                }
                if(effect = 'fade'){
                    jQuery(container.selector ).velocity("fadeOut", { duration: 300 })
                    jQuery(container.selector + '[visible*="visible"]').velocity("fadeIn", { delay: 100, duration: 300 });
                    jQuery(container.selector + '[visible*="none"]').velocity("fadeOut", { delay: 100, duration: 300 });
                }
            }
            $('#'+filterwrapper + " .pentafilter").removeClass('active');
            $(this).toggleClass('active');
		})
		
		
 
       
 
    };
 
}( jQuery ));
 