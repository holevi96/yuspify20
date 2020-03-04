function isElementInView(element, fullyInView) {
        var pageTop = $(window).scrollTop();
        var pageBottom = pageTop + $(window).height();
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).height();

        if (fullyInView === true) {
            return ((pageTop < elementTop) && (pageBottom > elementBottom));
        } else {
            return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
        }
    }
	
function appear(){
    jQuery( "body" ).delegate( ".more-blogs", "click", function() {
        console.log('ase');
        var btn = jQuery(this);
        btn.text("Loading...");
        var page = jQuery(this).attr('page');
        jQuery($all_appeared_elements).hide();
        jQuery.post(
            my_ajax_object.ajax_url,
            {
                'action': 'add_foobar',
                'data':   page
            },
            function(response){
                btn.parent().remove();
                jQuery('.infinite-container').append($(response).hide().fadeIn(1000));
                var next =parseInt(page) + 1;
                window.history.replaceState( {} ,  'Blog', my_ajax_object.main_url+'/blog/page/'+next );
                jQuery('.infinite-container .blog-post').pentafilter('pentafilter-box');
                appear();
                //jQuery('.infinite-container').isotope()
            }
        );
    });
	jQuery('.more-blogs').click(function(event, $all_appeared_elements) {

	
    });
}	
jQuery(document).ready(function($) {
    jQuery( "body" ).delegate( ".more-blogs", "click", function(event, $all_appeared_elements) {
        console.log('ase');
        var btn = jQuery(this);
        btn.text("Loading...");
        var page = jQuery(this).attr('page');
        jQuery($all_appeared_elements).hide();
        jQuery.post(
            my_ajax_object.ajax_url,
            {
                'action': 'add_foobar',
                'data':   page
            },
            function(response){
                btn.parent().remove();
                jQuery('.infinite-container').append($(response).hide().fadeIn(1000));
                var next =parseInt(page) + 1;
                window.history.replaceState( {} ,  'Blog', my_ajax_object.main_url+'/blog/page/'+next );
                jQuery('.infinite-container .blog-post').pentafilter('pentafilter-box');
                appear();
                //jQuery('.infinite-container').isotope()
            }
        );
    });
	appear();
	jQuery('.infinite-container .blog-post').pentafilter('pentafilter-box');
	// init Isotope
	/*var $grid = jQuery('.infinite-container').isotope({
	  termSelector: '.blog-post',
	  layoutMode: 'fitRows'
	});
	// filter items on button click
	jQuery('.blog-filter-buttons li').click(function() {
	console.log('asd')
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
});*/
	
});
