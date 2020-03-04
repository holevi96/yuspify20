jQuery(document).ready(function(){

    jQuery("ul.pricingPlans li").click(function(e){
        if (!jQuery(this).hasClass("selected")) {
            var tabNum = jQuery(this).index();
            var nthChild = tabNum+1;

            jQuery("ul.stickyRowWrapper li.selected").removeClass("selected");
            jQuery(this).addClass("selected");
        }
    });
});