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
        jQuery('.mobile-menu').toggleClass('opened');
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
    jQuery('li#menu-item-4472').hover(function () {
        jQuery('#resources-mega-menu-wrapper').addClass('visible');
    }, function() {
        jQuery('#resources-mega-menu-wrapper').removeClass('visible');
    });

    jQuery('li#menu-item-4472').click(function(e) {
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
		jQuery(this).parent().parent().find('.vertical-tab').eq(data).click();
	})
	 jQuery('html').smoothScroll();


	//PRIRING ACCORDION JS

    jQuery('.yfy-accordion li').click(function(){
        var t = jQuery(this);
        t.parent().find('li').removeClass('selected');
        t.addClass('selected');
    })

    //STart FREE TRIAL JS
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };



    if(getUrlParameter('modul')){

        var tabid = getUrlParameter('modul');

        jQuery('.page-start-free-trial .vertical-tabulator .list-of-apps li[tab-slug="' + tabid +'"]').click();
    }

    jQuery('.page-start-free-trial .vertical-tabulator .list-of-apps li').click(function(){
        var id = jQuery(this).attr('tab-slug');
        window.history.replaceState( {} ,  'Start free trial', my_ajax_object.main_url+'/start-free-trial/?modul='+id );
    })


    //MOBILE FLICITY SLIDER JS

    var $carousel = jQuery('.flickity-mobile-slider .carousel').flickity({
        prevNextButtons: false,
        pageDots: false
    });
    // Flickity instance
    var flkty = $carousel.data('flickity');
    // elements
    var $cellButtonGroup = jQuery('.button-group--cells');
    var $cellButtons = $cellButtonGroup.find('.slider-title');


    $carousel.on( 'select.flickity', function(e,item) {
        var flkty = jQuery(this).data('flickity');
        $cellButtons = jQuery(this).parent().find('.button-group--cells .slider-title');

        $cellButtons.filter('.selected')
            .removeClass('selected');
        $cellButtons.eq( flkty.selectedIndex )
            .addClass('selected');
    });

    // select cell on button click
    $cellButtonGroup.on( 'click', '.slider-title', function() {

        var index = jQuery(this).index();
        jQuery(this).parent().parent().parent().find(".carousel").flickity( 'select', index );
    });


    //Shopofy plugin JS


    jQuery('#shopfy-plugin-inputs .splug-submit').attr('disabled','disabled');
    function openInNewTab(url) {
        var win = window.open(url);
       // win.focus();
    }
    jQuery('#shopfy-plugin-inputs input').keyup(function(){


        var email = jQuery('#shopfy-plugin-inputs .splug-email').val();
        var ID = jQuery('#shopfy-plugin-inputs .splug-ID').val();

        if(ID.includes('myshopify.com')){
            var lnk = ID+'/admin/oauth/request_grant?client_id=c595337dd8e1bc4fbd44739427fb8ea8&redirect_uri=https%3A%2F%2Fcportal-sjc.gravityrd-services.com%2Fshopify_plugin_request%2F&scope=read_products%2Cread_orders%2Cwrite_script_tags%2Cwrite_themes%2Cread_customers';
        }else{
            var lnk = 'https://' + ID + '.myshopify.com/admin/oauth/request_grant?client_id=c595337dd8e1bc4fbd44739427fb8ea8&redirect_uri=https%3A%2F%2Fcportal-sjc.gravityrd-services.com%2Fshopify_plugin_request%2F&scope=read_products%2Cread_orders%2Cwrite_script_tags%2Cwrite_themes%2Cread_customers';
        }
        if(email.length > 0 && ID.length > 0){
            console.log(ID+lnk)
            jQuery('#shopfy-plugin-inputs .splug-submit').removeClass("unactive").addClass('active').removeAttr('disabled').attr('link',lnk);
        }else{
            jQuery('#shopfy-plugin-inputs .splug-submit').removeClass("active").addClass('unactive').attr('disabled','disabled')
        }
    });

    document.addEventListener( 'wpcf7submit', function( event ) {
        if ( '4380' == event.detail.contactFormId ) {
           // console.log(event)
            console.log(event.detail.status)
            if(event.detail.status == 'mail_sent'){
                //openInNewTab(jQuery(this).attr('link'));
                location.href = jQuery('#shopfy-plugin-inputs .splug-submit').attr('link');
            }
        }
    }, false );
    jQuery('#classic-pricing-box #title-box h1').attr('default-title',jQuery('#classic-pricing-box #title-box h1').text());
    jQuery('#classic-pricing-box #title-box h2').attr('default-title',jQuery('#classic-pricing-box #title-box h2').text());
});





var classic_percentages = [0.98,0.6,0.33,0.33,0.33,0.33];
var classic_tomb = [0,(299-49)/(0.00098)+50000,(799-299)/(0.0006)+500000,3000000,3000000];
var classic_viewMax = [50000,500000,1500000,3000000];
var classic_plans = [49,299,799,799];
var pos = 0;
new Dragdealer('classic-pricing-slider', {
    animationCallback: function(x, y) {
            if(x==1){
                jQuery('#pricing-inner .wrapper').removeClass('form');
                var form_title = jQuery('#classic-pricing-box #title-box h1').attr('form-title');
                var form_desc = jQuery('#classic-pricing-box #title-box h2').attr('form-title');
                jQuery('#classic-pricing-box #title-box h1').text(form_title);
                jQuery('#classic-pricing-box #title-box h2').text(form_desc);

            }else{
                jQuery('#pricing-inner .wrapper').addClass('form');
               jQuery('#classic-pricing-box #title-box h1').text(jQuery('#classic-pricing-box #title-box h1').attr('default-title'));
               jQuery('#classic-pricing-box #title-box h2').text(jQuery('#classic-pricing-box #title-box h2').attr('default-title'));


            }
       /* Ez a r?sz mozgatja a boxot ahogy h?zzuk a grabbert */
        var myElement = document.querySelector('.grabber');
        var style = window.getComputedStyle(myElement);
        var matrix = new WebKitCSSMatrix(style.webkitTransform);
        jQuery('#monthly-revenue').css('left',-34+matrix.m41);


       var m = Math.round((x-(x % 0.3333))/0.3333); // melyik s?vba esik a cs?szka (0,1,2,3)
        var q = Math.round(x / 0.3333) // melyik s?vba esik a cs?szka (0,1,2,3)
        console.log(x);
        if(m>3) m=3;
        var h = (x-m*0.3333)/0.3333; // az adott s?von bel?l hol helyezkedik el (0 ?s 1 k?z?tti sz?m)
        var page_views = classic_tomb[m]+h*(classic_tomb[m+1]-classic_tomb[m]);

            var gap = page_views-classic_viewMax[m];
            if(gap<0) gap=0;
            var traffic_price = gap*classic_percentages[m]*0.001;
            var total_price = classic_plans[m] + traffic_price;
            var price_per_1000 = total_price/(page_views/1000);
            if(page_views == 0) price_per_1000 = 0;
            var impressions = 0;
            if(page_views>=classic_viewMax[m]){
                impressions = page_views;
            }else{
                impressions = classic_viewMax[m];
            }

            jQuery('#monthly-revenue .revenue').text(new Intl.NumberFormat('de-DE').format(Math.round(page_views)));

            jQuery('.plan-price span').text(classic_plans[m]);
            jQuery('.traffic-price span').text(Math.round(traffic_price*100)/100);
            jQuery('#the-price span').text(Math.round(total_price*100)/100);

            jQuery('#plan-boxes div').removeClass('active');
            jQuery('#plan-boxes div').eq(m).addClass('active');

            jQuery('#price-extra-details .impression span').text(Math.round(impressions*100)/100);
            jQuery('#price-extra-details .price_per_1000 span').text(Math.round(price_per_1000*100)/100);
            jQuery('#price-extra-details .traffic_price span').text(Math.round(traffic_price*100)/100);

        },


   slide: false
});

var yuspify_tomb = [0,5000,20000,50000,100000,100000];
var yuspify_percentages = [3.0,2.5,2.0,1.5,1.0,1.0];
var maxSteps = [0,150,375,600,750,750];
new Dragdealer('yuspify-pricing-slider', {
    animationCallback: function(x, y) {
        if(x==1){
            jQuery('#pricing-inner .wrapper').removeClass('form');
        }else{
            jQuery('#pricing-inner .wrapper').addClass('form');
        }
        /* Ez a r?sz mozgatja a boxot ahogy h?zzuk a grabbert */
        var myElement = document.querySelector('.grabber');
        var style = window.getComputedStyle(myElement);
        var matrix = new WebKitCSSMatrix(style.webkitTransform);
        jQuery('#monthly-revenue').css('left',-34+matrix.m41);


        var m = Math.round((x-(x % 0.25))/0.25); // melyik s?vba esik a cs?szka (0,1,2,3,4)
        var h = (x-m*0.25)/0.25; // az adott s?von bel?l hol helyezkedik el (0 ?s 1 k?z?tti sz?m)
        var value = yuspify_tomb[m]+h*(yuspify_tomb[m+1]-yuspify_tomb[m]);

        jQuery('#monthly-revenue .revenue').text(new Intl.NumberFormat('de-DE').format(Math.round(value*10)));
        jQuery('.revenue-share').text(yuspify_percentages[m]);
        jQuery('.yusp-generated-revenue').text(new Intl.NumberFormat('de-DE').format(Math.round(value)));

        var m = Math.round((x-(x % 0.25))/0.25); // melyik s?vba esik a cs?szka (0,1,2,3,4)
        var h = (x-m*0.25)/0.25; // az adott s?von bel?l hol helyezkedik el (0 ?s 1 k?z?tti sz?m)
        var value = yuspify_tomb[m]+h*(yuspify_tomb[m+1]-yuspify_tomb[m]);
        var monthly_fee = 0;
        console.log('monthly fee:')
        for(var i=0;i<m+1;i++){

            if(i == m){
                console.log(value-yuspify_tomb[i])
                monthly_fee += (value-yuspify_tomb[i])*0.01*yuspify_percentages[i];
            }else{
                monthly_fee += maxSteps[i+1];
            }
            console.log(monthly_fee);
        }
        if(monthly_fee<=29){
            monthly_fee = 29;
        }
        jQuery('#the-price span').text(new Intl.NumberFormat('de-DE').format(Math.round(Math.round(monthly_fee))));

    },


    slide: false
});



// declare your variable for the setInterval so that you can clear it later
var myInterval;

// set your interval


function whichFunction(){
    console.log('hhhhh')
    jQuery('.product-box').removeClass('animate');
    setTimeout(function(){
        // toggle back after 1 second
        jQuery('.product-box').addClass('animate');
    },2000);

}

// this code clears your interval (myInterval)
window.clearInterval(myInterval);

appear({
    init: function init(){
       // console.log('dom is ready');
    },
    elements: function elements(){
        // work with all elements with the class "track"
        return document.getElementsByClassName('product-box');
    },
    appear: function appear(el){
        jQuery('.product-box').addClass('animate');
        myInterval = setInterval(whichFunction,4000);
    },
    disappear: function disappear(el){

        window.clearInterval(myInterval);
        jQuery('.product-box').removeClass('animate');
    },
    bounds: -200,
    reappear: true
});