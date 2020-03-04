jQuery(document).ready(function() {

    setTimeout(function () {
        jQuery('#front-page-above-the-fold .layer').addClass('loaded');
    }, 3200);
    setTimeout(function () {
        jQuery('#front-page-above-the-fold h1').addClass('loaded');
    }, 3250);
    setTimeout(function () {
        jQuery('#front-page-above-the-fold h2').addClass('loaded');
    }, 3500);

    /*
     SVGInjector(jQuery('.svg-inject'),{},function (){
     console.log('SVG injected')
     });
     */

    // MENU OPENER
    jQuery('#nav-icon').click(function () {
        jQuery('ul.mobile-menu').toggleClass('opened');
        jQuery('#nav-icon').toggleClass('open');
        jQuery('#overlay').toggleClass('opened');
    });

    // MENU OPENER
    jQuery('.general #nav-icon').click(function () {
        jQuery('ul#general-mobile').toggleClass('opened');
        jQuery('.general #nav-icon').toggleClass('open');
        jQuery('#overlay').toggleClass('opened');
    });

    // MEGA MENU OPENER & MEGA MENU JS HANDLER
    /*
    jQuery('#menu-general-menu li a').click(function (e) {
		e.preventDefault();
        jQuery('#mega-menu').addClass('opened');
    });
    jQuery('i.closer').click(function () {
        jQuery('#mega-menu').removeClass('opened');
		
    });
	jQuery('#mega-menu #mega-menu-listing ul li').hover(function(){
		var id = jQuery(this).attr('menu-number');
		jQuery('#mega-menu .item-hover-contents ul li').hide().parent().find('li[menu-number="' + id +'"]').show();
	})
	*/
	
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
        var vh = jQuery(window).height();

        if (scroll >= vh) {
            jQuery("#floating-menu").addClass("visible");
        } else {
            jQuery("#floating-menu").removeClass("visible");
        }
		
		if(scroll >= 140){
			console.log('asd')
			jQuery('#technology-menu').addClass('scrolled')
		}
		if(scroll>=250){
			jQuery('#technology-menu').addClass('ontop')
		}
		if(scroll < 200){
			jQuery('#technology-menu').removeClass('ontop').removeClass('scrolled');
		}
        if (scroll >= vh /3) {
            jQuery("#service-menu").addClass("fixed");
        } else {
            jQuery("#service-menu").removeClass("fixed");
        }

        if (scroll >= vh *1) {
            jQuery("#front-page-menu").addClass("visible");
        } else {
            jQuery("#front-page-menu").removeClass("visible");
        }
    });


    /* PRODUCT MEGA MENU */

    jQuery('li#menu-item-2287, #mega-menu-wrapper').hover(function () {
        MenuOpenCloseErgoTimer(100, function (){
            jQuery('#mega-menu-wrapper').addClass('visible');
        });
    }, function() {
        MenuOpenCloseErgoTimer(200, function (){
            jQuery('#mega-menu-wrapper').removeClass('visible');
        });
    });

    jQuery('li#menu-item-2287').click(function(e) {
        e.preventDefault();
        if(!jQuery('#mega-menu-wrapper').hasClass('visible')){
            jQuery('#mega-menu-wrapper').addClass('visible');
        } else {
            jQuery('#mega-menu-wrapper').removeClass('visible');
        }
    });

    jQuery('#mega-menu-wrapper .product-features .feature').hover(function (item) {
        var index = $('#mega-menu-wrapper .product-features .feature').index(item.target);
        $('.product-details .selected').removeClass("selected");
        $($('.product-details .details')[index]).addClass("selected");
    }, function(item){
        $('.product-details .selected').removeClass("selected");
    });

    jQuery('.products ul.product-features .feature').hover(function () {
        var parent = jQuery(this).closest('.products').attr('data-id');
        var valami = jQuery(this).attr('data-tab');

        jQuery('.products[data-id="' + parent + '"]' + ' .feature-content[data-tab="' + valami + '"]').toggleClass('visible');
        console.log('.products[data-id="' + parent + '"]' + ' .feature-content[data-tab="' + valami + '"]')
    });

    /*
    jQuery('ul.product-features .feature').hover(function () {
        var valami = jQuery(this).attr('data-tab');
        jQuery('p[data-tab="' + valami + '"]').toggleClass('visible');
    });
    */



    /* RESOURCES MEGA MENU */
    jQuery('li#menu-item-2265').hover(function () {
        jQuery('#resources-mega-menu-wrapper').addClass('visible');
    }, function() {
        jQuery('#resources-mega-menu-wrapper').removeClass('visible');
    });

    jQuery('li#menu-item-2265').click(function(e) {
        e.preventDefault();
        if(!jQuery('#resources-mega-menu-wrapper').hasClass('visible')){
          jQuery('#resources-mega-menu-wrapper').addClass('visible');
        } else {
          jQuery('#resources-mega-menu-wrapper').removeClass('visible');
        }
    });



    /*
    jQuery('.one').click(function () {
        jQuery('.floating-wrapper').toggleClass('floated');
    });

    jQuery('.feature-row').click(function () {
        jQuery('.solution').toggleClass('opened');
    });
    */


    /* INDUSTRIRES */
    jQuery('#industries-block li.industry-wrapper').click(function(){

        var tab_id = jQuery(this).attr('id');

        jQuery('#industries-block li.industry-wrapper').removeClass('current');
        jQuery('#selected-industries .selected-industry').removeClass('current');

        jQuery(this).addClass('current');
        jQuery('#selected-industries').find('div[data-tab="' + tab_id + '"]').addClass('current');
        //jQuery("#"+tab_id).addClass('current');

   });


    jQuery('.color-switcher').click(function(){
        jQuery('#industries.body').toggleClass('light');
        jQuery('#industries.body').toggleClass('dark');
        // jQuery('#industries.body').removeClass('dark');
        // jQuery('#industries.body').addClass('light');

    });

    function MenuOpenCloseErgoTimer (dDelay, fActionFunction, node) {
        if (typeof this.delayTimer == "number") {
            clearTimeout (this.delayTimer);
            this.delayTimer = '';
        }
        if (node)
            this.delayTimer     = setTimeout (function() { fActionFunction (node); }, dDelay);
        else
            this.delayTimer     = setTimeout (function() { fActionFunction (); }, dDelay);
    }


   /* jQuery('#accordion').find('.accordion-toggle').click(function(){

        //Expand or collapse this panel
        jQuery(this).next().slideToggle('fast');


        //Hide the other panels
        jQuery(".accordion-content").not($(this).next()).slideUp('fast');

    }); */


    jQuery('.accordion-toggle').click(function(){
        jQuery(this).toggleClass('active');
        jQuery('.accordion-toggle').not(this).removeClass('active');

    });


    jQuery(".accordion-toggle").click(function() {
        jQuery(this).next(".accordion-content").toggleClass('selected');
    });


    function switchDesktop() {
        if (jQuery(window).width() > 740) {
            jQuery('ul.tabs li').click(function(){
                // var tab_id = jQuery(this).attr('data-tab');
                var tab_id = "#" + jQuery(this).attr('data-tab');

                jQuery('ul.tabs li').removeClass('current');
                jQuery('.tab-content').removeClass('show');

                jQuery(this).addClass('current');
                jQuery('.tab-content' + tab_id).addClass('show');
            });
        }
    }

    function switchMobile() {
        if (jQuery(window).width() < 710) {
            curr = jQuery('.tab-content.show');
            curr_link = jQuery('ul.tabs li.current');
            curr_link.after(curr);

            jQuery('ul.tabs li').click(function(){
                // var tab_id = jQuery(this).attr('data-tab');
                var tab_id = "#" + jQuery(this).attr('data-tab');

                jQuery('ul.tabs li').removeClass('current');
                jQuery('.tab-content').removeClass('show');

                jQuery(this).addClass('current');
                jQuery(this).after(jQuery('.tab-content' + tab_id).addClass('show'));
            });
        }
    }

    switchDesktop();
    switchMobile();

    jQuery(window).resize(function () {

        jQuery('ul.tabs li').off('click');
        switchDesktop();
        switchMobile();

    });


    // DROPDOWN
    //-----------------------------

    /**
     * Attach toggle event to all dropdown comboboxes
     */
    window.dropdowns = {};

    jQuery('body').on("click", ".form-dropdown", function (event){
        jQuery( this ).find('ul').toggleClass('opened');
        event.stopPropagation();
    });

    jQuery('body').on("click", ".form-dropdown-options li", function(event){
        var $li = jQuery( this );
        var $ul = $li.parent('.form-dropdown-options');

        $li.siblings().removeClass("selected");
        $li.addClass("selected");
        $ul.parent('.form-dropdown').data('value', $li.html());
        $ul.siblings('.selected-value').html($li.html());
    })

    jQuery("body").click
    (
        function(e)
        {
            if(e.target.className !== "form-dropdown")
            {
                jQuery(".form-dropdown-options").removeClass('opened');
                jQuery('.form-dropdown').removeClass('opened');
            }
        }
    );

    /* VERTICAL TABULATOR */
    jQuery(jQuery('.vertical-tab-content')[0]).addClass('visible');
    jQuery(jQuery('.vertical-tab')[0]).addClass('selected');

    jQuery('.vertical-tabulator .vertical-tab').click(function(){

        var tab_id = jQuery(this).attr('data-tab');
		jQuery(this).parent().parent().parent().parent().find('.bullets li').removeClass('active').parent().find('li[data-tab="'+ tab_id +'"]').addClass('active')
         //jQuery('.vertical-tab').removeClass('selected');
		//console.log(jQuery(this))
		jQuery(this).parent().parent().find('.vertical-tab').removeClass('selected');
        jQuery(this).parent().parent().parent().find('.vertical-tab-content').removeClass('visible');
        jQuery(this).addClass('selected');
        jQuery(this).parent().parent().parent().find('.vertical-tab-content[data-tab="'+ tab_id +'"]').addClass('visible');
    });
	jQuery('.bullets li').click(function(){
		var data = jQuery(this).attr('data-tab');
		jQuery('.vertical-tabulator .vertical-tab').eq(data).click();
	})
	 jQuery('html').smoothScroll();
});




var tomb = [0,5000,20000,50000,100000,100000];
var percentages = [3,2.5,2,1.5,1,1];

new Dragdealer('pricing-slider', {
    animationCallback: function(x, y) {
        var m = Math.round((x-(x % 0.25))/0.25);
        var h = (x-m*0.25)/0.25;
        var value = tomb[m]+h*(tomb[m+1]-tomb[m]);
        $('#monthly-revenue .revenue').text(Math.round(value));
        jQuery('.revenue-share').text(percentages[m]);
        jQuery('.yusp-generated-revenue').text(Math.round(value*0.1));
        jQuery('#the-price span').text(Math.round(((value*1.1)-value)/100*percentages[m]));
    }
});