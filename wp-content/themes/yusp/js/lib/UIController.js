jQuery(document).ready(function () {
    
    // FLICKITY RESIZER
    var middleSlider = jQuery(".testimonial-carousel").flickity(
        {
            "wrapAround": true
        });

    jQuery(".testimonial-carousel .carousel-cell").each(function(index,elem){
        new ResizeSensor(jQuery(elem).children(), function() {
            middleSlider.resize();
        });
    });

});



