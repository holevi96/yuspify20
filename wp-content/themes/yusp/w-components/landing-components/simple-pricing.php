<section id="why-start" class="row ">

    <div id="plugin-pricing" class="pricing col-sm-12 col-xl-6">
        <div class="plugin-pricing-container">

            <h2 class="text t-22 white center bold mgT40 mgB8">Price calculator</h2>
            <p class="stnd s-white center">estimations based on silimarweb</p>
            <div class="error-msg"></div>
            <form id="domain-form" class="" action="#" method="GET">
                <input id="domain-input" class="form-input white col-xs-12 col-md-8 col-lg-8" placeholder="type your domain name here" type="text" name="site"/>
                <!-- progress button -->
                <button id="actionButton" class="progress-button form-button white col-xs-8 col-md-4 col-lg-4 mgB16" href="#" class="progress-button green" data-loading="Working.." data-finished="Submit">Ok</button>
                <div class="captcha-container row mgT16">
                    <div class="captcha-placeholder ">
                    </div>
                </div>
            </form>

            <div class="pricing-table">
                <div class="pricing-row row mgT16">
                    <span class="text t-22 white mgT8">Monthly Price</span>
                    <span id="pricing-total"></span>
                </div>
                <div class="pricing-row row">
                    <span class="text t-22 white mgT8">Plan name</span>
                    <span id="pricing-plan-name"></span>
                </div>
                <div class="pricing-row row">
                    <span class="text t-22 white mgT8">Pageview /month</span>
                    <span id="pricing-pageview"></span>
                </div>
                <div class="pricing-row row" style="display: none;">
                    <span class="text t-22 white mgT8">Number of impressions</span>
                    <span id="pricing-impressions"></span>
                </div>
            </div>

            <div class="pricing-link row mgT24">
                <a href="/pricing">check out our pricing page for more details</a>
            </div>

        </div>
    </div>

    <div id="campaign-call-to-action" class="col-sm-12 col-lg-6">
        <div class="cat-button-holder">

            <a class="probalja-ki-ingyen free-trial-button" href="https://account.yusp.com/checkout/?code=yusp20">
                Start your 30-day free trial now!
            </a>

            <p class="kezdje-el row mgT24">
                20% discount for 3 months<br>Coupon code: yusp20
            </p>

        </div>
    </div>
</section>
<!-- Simple Pricing script -->
<script>
    jQuery(function(){
        jQuery(window).on("load", function(){
            var middleSlider = jQuery("#plugin-features .testimonial-carousel").flickity(
                {
                    "wrapAround": true,
                    "imagesLoaded": true
                });

            jQuery("#plugin-features .testimonial-carousel .carousel-cell").each(function(index,elem){
                new ResizeSensor(jQuery(elem).children(), function() {
                    middleSlider.resize();
                });
            });
        });



        jQuery("#plugin-features .dot").each(function(index, elem){
            jQuery(elem).addClass("dot-" + (index+1));
        });

        jQuery("#plugin-features .testimonial-carousel").on('select.flickity', function(){
            jQuery("#plugin-features .dot").each(function(index, elem){
                jQuery(elem).addClass("dot-" + (index+1));
            });
        });

        var PAGEVIEW_MAX = 10 * 1000 * 1000;
        var backendUrl = "https://account.yusp.com/verify_checkout/";

        var plans = [
            {
                'id': 1,
                'name': 'Starter bronze',
                'viewMax': 50000,
                'price': 49,
                'overuseCost': 0.98
            },
            {
                'id': 2,
                'name': 'Starter silver',
                'viewMax': 500000,
                'price': 299,
                'overuseCost': 0.6
            },
            {
                'id': 3,
                'name': 'Starter gold',
                'viewMax': 1500000,
                'price': 799,
                'overuseCost': 0.33
            },
            {
                'id': 4,
                'name': 'Yusp pro',
                'viewMax': 3000000,
                'price': 990,
                'overuseCost': 0.33
            },
            {
                'id': 5,
                'name': 'Yusp enterprise',
                'viewMax': 6000000,
                'price': Number.MAX_VALUE,
                'overuseCost': 0.33
            },
        ];

        var selectedPlan = 0;
        var firstMove = true;
        var pageViewsPerMonth = 0;
        var dataLoading = false;
        var captchaData = "";
        var captchaId = null;
        var captchaActive = null;

        jQuery('.progress-button').progressInitialize();

        var controlButton = jQuery('#actionButton');

        // Custom progress handling

        controlButton.click(function (e) {
            e.preventDefault();
            if (jQuery('#domain-input')[0].value != ""){
                /*var $captcha = jQuery('.captcha-placeholder');*/
                var $captcha = jQuery('.pricing .captcha-container').append("<div id='recaptcha'></div>");
                captchaId = grecaptcha.render('recaptcha', {
                    'sitekey': '6Lf72hkTAAAAAKVY7GUW3BGVthmR6JQmdVOrqSCe',
                    'callback': captchaCallback
                });
                jQuery('.captcha-placeholder').addClass('active');
            };
        });

        function clearCaptcha(){
            grecaptcha.reset();
            captchaData = "";

            jQuery('.captcha-placeholder').removeClass('active');
            jQuery('#recaptcha').remove();
            captchaActive = null;
            /*jQuery('#actionButton')[0].disabled = true;
             jQuery('#free-trial-button')[0].disabled = true;*/
        }

        function setErrorMessage(msg){
            jQuery('.pricing .error-msg').html(msg);
            jQuery('.pricing .error-msg').addClass('active');
        }

        function clearErrorMessage(){
            jQuery('.pricing .error-msg').html("");
            jQuery('.pricing .error-msg').removeClass('active');
        }

        function captchaCallback(data) {
            captchaData = data;
            getDomainInfo();
        }

        function getDomainInfo(){
            // You can optionally call the progressStart function.
            // It will simulate activity every 2 seconds if the
            // progress meter has not been incremented.
            var siteVar = jQuery('#domain-input')[0].value;
            //var url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D'https%3A%2F%2Fwww.similarweb.com%2Fwebsite%2F" + siteVar + "'%3B%0A";

            dataLoading = true;
            controlButton.progressStart();
            var progress = 0;
            var refreshInterval = setInterval(function () {
                if (progress >= 90) {
                    progress = 0;
                    controlButton.progressSet(0);
                }
                else {
                    controlButton.progressIncrement(5);
                    progress += 5;
                }
            }, 200);

            var data = {
                "g-recaptcha-response": captchaData,
                "comp_domain_name": siteVar
            };

            jQuery.ajax(
                {
                    type: 'POST',
                    dataType: 'json',
                    url: backendUrl, data: data,
                    success: function (data) {
                        /*console.log(data.xml);
                         var query = data.xml.getElementsByTagName('query')[0];
                         if (query) {
                         var resultNum = query.getElementsByTagName('results')[0].childElementCount;
                         }*/

                        parseSimilarData(data);


                        /*if (query && resultNum) {
                         parseSimilarData(data);
                         }
                         else {
                         jQuery('.pageview-count').html("Cannot find a website on this domain. Choose another option!").addClass('warning');
                         }*/
                        dataLoading = false;
                        clearInterval(refreshInterval);
                        controlButton.progressFinish();

                        jQuery('.captcha-placeholder').removeClass('active');

                        clearErrorMessage();
                        clearCaptcha();
                    },
                    error: function(data){
                        clearCaptcha();
                        jQuery('.captcha-placeholder').removeClass('active');
                        clearInterval(refreshInterval);
                        controlButton.progressFinish();

                        var statusCode = Number(data.status);
                        if(statusCode == 402){
                            setErrorMessage("Failed captcha, try again!");
                        }
                        else{
                            setErrorMessage("Unknown error occurred, try again later!");
                        }
                    }
                }
            );
        }

        /*function addCommas(nStr) {
         nStr += '';
         x = nStr.split('.');
         x1 = x[0];
         x2 = x.length > 1 ? '.' + x[1] : '';
         var rgx = /(\d+)(\d{3})/;
         while (rgx.test(x1)) {
         x1 = x1.replace(rgx, '$1' + '.' + '$2');
         }
         return x1 + x2;
         }*/

        function formatPrice(str, decimals){
            var format = wNumb({
                mark: '.',
                thousand: ' ',
                prefix: '$',
                decimals: decimals || 0,
                undo: function(value){
                    return Number(value);
                }
            });

            return format.to(str);
        }

        function formatCount(str, decimals){
            var format = wNumb({
                mark: '.',
                thousand: ' ',
                decimals: decimals || 0,
                undo: function(value){
                    return Number(value);
                }
            });

            return format.to(str);
        }

        function parseSimilarData(o) {
            var xml = o.xml;
            $engagementInfo = jQuery( xml );
            console.log($engagementInfo);
            if ($engagementInfo.length) {
                var views = $engagementInfo.find(".engagementInfo-valueNumber")[0].textContent;

                if (views.indexOf(".") > -1) {
                    var viewsForCount = Number($engagementInfo.find(".engagementInfo-valueNumber")[0].textContent
                        .replace("K", "00").replace("M", "00000").replace("B", "00000000").replace(".", ""));
                    var pageViewsPerSession = Number($engagementInfo[4].textContent);
                }
                else {
                    var viewsForCount = Number($engagementInfo.find(".engagementInfo-valueNumber")[0].textContent
                        .replace("K", "000").replace("M", "000000").replace("B", "000000000").replace(".", ""));
                    var pageViewsPerSession = Number($engagementInfo[4].textContent);
                }

                pageViewsPerMonth = viewsForCount * pageViewsPerSession;
                reCalculate();
            }
            else {
                setErrorMessage("No information available from you site. Choose another option!");
            }
        }

        function reCalculate() {
            selectedPlan = null;

            if(pageViewsPerMonth > 1*6000*1000){
                selectedPlan = plans[4];
            }
            else{
                /*var overuse = Math.ceil((pageViewsPerMonth - selectedPlan.viewMax) / 1000) * selectedPlan.overuseCost;
                 if (overuse < 0) overuse = 0;

                 var planprice = selectedPlan.price;*/

                var totalprice = Number.MAX_VALUE;
                jQuery(plans).each(function (index, elem) {

                    var additionalReco = pageViewsPerMonth - elem.viewMax;
                    if (additionalReco < 0) additionalReco = 0;

                    var overuse = Math.ceil(additionalReco / 1000) * elem.overuseCost;
                    if (overuse < 0) overuse = 0;

                    var planprice = elem.price;

                    var total = planprice + overuse;
                    if (total <= totalprice) {
                        selectedPlan = elem;
                        totalprice = total;
                    }
                    /*if(pageViewsPerMonth < elem.viewMax && selectedPlan == null){
                     selectedPlan = elem;
                     }*/
                });
            }

            if(pageViewsPerMonth == 0){
                selectPlan(0);
            }
            else{
                selectPlan(selectedPlan.id);
            }
        }

        function selectPlan(id) {
            selectedPlan = plans[id -1];
            jQuery('#pricing-pageview').html(formatCount(pageViewsPerMonth)).removeClass('warning');

            // Enterprise
            if(id == 5){
                jQuery(".pricing .pricing-table").removeClass("active");
                jQuery(".pricing .enterprise").addClass("active");
            }
            // Pro
            else{
                var overuse = Math.ceil( (pageViewsPerMonth - selectedPlan.viewMax) / 1000) * selectedPlan.overuseCost;
                if (overuse < 0) overuse = 0;

                //jQuery('.price-per-reco').html(formatPrice(((overuse + selectedPlan.price) / parseFloat(pageViewsPerMonth)) * 1000, 2));

                jQuery(plans).each(function (index, elem) {
                    var planprice = elem.price;
                    var additionalReco = pageViewsPerMonth - elem.viewMax;
                    if (additionalReco < 0) additionalReco = 0;

                    var overuse = Math.ceil(additionalReco / 1000) * elem.overuseCost;
                    if (overuse < 0) overuse = 0;

                    /*jQuery('#plan-' + elem.id + " .additional").html(formatCount(additionalReco));
                     jQuery('#plan-' + elem.id + " .overuse").html(formatPrice(overuse));
                     jQuery('#plan-' + elem.id + " .total").html(formatPrice(overuse + planprice));*/

                    if(elem.id == selectedPlan.id){
                        var higherCount = pageViewsPerMonth > elem.viewMax ? pageViewsPerMonth : elem.viewMax;

                        /*jQuery('#plan-' + elem.id + " .price").html(formatPrice(overuse + planprice));
                         jQuery('#plan-' + elem.id + " .tertiary .value").html(formatCount(higherCount));*/

                        jQuery("#pricing-total").html(formatPrice(overuse + planprice));
                        jQuery("#pricing-plan-name").html(selectedPlan.name);
                        jQuery("#pricing-impressions").html(formatCount(higherCount));

                        jQuery(".pricing .enterprise").removeClass("active");
                        jQuery(".pricing .pricing-table").addClass("active");
                        jQuery(".pricing .download-button").addClass("active");
                    }

                    //jQuery('#plan-' + elem.id + " .base-price").html(formatPrice(planprice));
                });
            }
        }
    });
</script>
