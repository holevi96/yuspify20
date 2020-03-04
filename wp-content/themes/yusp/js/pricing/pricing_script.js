jQuery(document).ready(function() {

	if(jQuery("#pricing.pricing-wrapper").length < 1){
		return;
	};

	var $digiOrDigi = jQuery("#digital-or-digical");
	$digiOrDigi.find(".digital").on("click", function(){
		/*jQuery("#yusp-digical").removeClass("active");
		jQuery("#yusp-digital").addClass("active");*/

		jQuery(this).addClass("active");
		jQuery(".digical").removeClass("active");

		jQuery("#yusp-digical").slideUp(400, function(){
			jQuery("#yusp-digital").slideDown();
		});
	});

	$digiOrDigi.find(".digical").on("click", function(){
		/*jQuery("#yusp-digical").addClass("active");
		jQuery("#yusp-digital").removeClass("active");*/

		jQuery(this).addClass("active");
		jQuery(".digital").removeClass("active");

		jQuery("#yusp-digital").slideUp(400, function(){
			jQuery("#yusp-digical").slideDown();
		});
	});

	var PAGEVIEW_MAX = 10 * 1000 * 1000;
	var backendUrl = "https://account.yusp.com/verify_checkout/";

	var plans = [
		{
			'id': 1,
			'name': 'Small',
			'viewMax': 50000,
			'price': 49,
			'overuseCost': 0.98
		},
		{
			'id': 2,
			'name': 'Medium',
			'viewMax': 500000,
			'price': 299,
			'overuseCost': 0.6
		},
		{
			'id': 3,
			'name': 'Growing',
			'viewMax': 1500000,
			'price': 799,
			'overuseCost': 0.33
		},
		{
			'id': 4,
			'name': 'Pro',
			'viewMax': 3000000,
			'price': 990,
			'overuseCost': 0.33
		},
		{
			'id': 5,
			'name': 'Enterprise',
			'viewMax': 6000000,
			'price': Number.MAX_VALUE,
			'overuseCost': 0.33
		},
	];
	var captchaEnum = {
		DOMAIN: 1,
		TRIAL: 2
	}

	var selectedPlan = 0;
	var firstMove = true;
	var pageViewsPerMonth = 0;
	var dataLoading = false;
	var captchaData = "";
	var captchaId = null;
	var captchaActive = null;

	var slider = jQuery("#price-slider")[0];
	var filterSteps = function(value, type){
		return (value < 3*1000*1000 && value > 0) ? 2 : 1;
	};
	if(slider){
		noUiSlider.create(slider, {
			start: 0,
			snap: false,
			connect: "lower",
			range: {
				'min': 0,
				'17%': 300000,
				'34%': 850000,
				'50%': 3 * 1000 * 1000,
				'75%': 6*1000*1000,
				'max': PAGEVIEW_MAX
				/*'min': 0,
				 '20%': 100000,
				 '40%': 400000,
				 '60%': 850000,
				 '80%': 1500000,
				 'max': PAGEVIEW_MAX*/
				/*'min': 0,
				 '5%': PAGEVIEW_MAX * 0.0005,
				 '10%': PAGEVIEW_MAX * 0.001,
				 '15%': PAGEVIEW_MAX * 0.0025,
				 '20%': PAGEVIEW_MAX * 0.005,
				 '25%': PAGEVIEW_MAX * 0.01,
				 '30%': PAGEVIEW_MAX * 0.025,
				 '35%': PAGEVIEW_MAX * 0.05,
				 '40%': PAGEVIEW_MAX * 0.1,
				 '45%': PAGEVIEW_MAX * 0.125,
				 '50%': PAGEVIEW_MAX * 0.15,
				 '55%': PAGEVIEW_MAX * 0.2,
				 '60%': PAGEVIEW_MAX * 0.225,
				 '65%': PAGEVIEW_MAX * 0.25,
				 '70%': PAGEVIEW_MAX * 0.30,
				 '75%': PAGEVIEW_MAX * 0.35,
				 '80%': PAGEVIEW_MAX * 0.4,
				 '85%': PAGEVIEW_MAX * 0.5,
				 '90%': PAGEVIEW_MAX * 0.6,
				 '95%': PAGEVIEW_MAX * 0.7,
				 'max': PAGEVIEW_MAX*/
			},
			pips: {
				mode: 'steps',
				density: 20,
				filter: filterSteps,
				format: wNumb({
					decimals: 0,
					thousand: ' '
				})
			}
		});
	}

	jQuery('.plans.selected .plan').click(function () {
		if(jQuery('.plans.selected').length > 0){
			selectPlan(jQuery('.plans.selected .plan').index(jQuery(this)) + 1);
		}
	});

	jQuery('.plans .plan .trial').click(function(){
		var id = jQuery('.plans.selected .plan-wrapper').index(jQuery(this).parents('.plan-wrapper.selected')) + 1;
		showTrial(id);
	});

	jQuery('#free-trial-box #close-trial').click(function() {
		closeTrial();
	});

	if(slider){
		slider.noUiSlider.on('slide', setValue);
	}

	jQuery('.progress-button').progressInitialize();

	var controlButton = jQuery('#actionButton');
	var trialButton = jQuery('#free-trial-button');
	var enterpriseButton = jQuery('#submit-enterprise');
	var proButton = jQuery('#submit-pro');

	var sending_mail = false;
	jQuery('#submit-enterprise').click(function(){
		if(sending_mail) return;
		var email = jQuery("#enterprise-form #e-mail-address").val();
		var company = jQuery("#enterprise-form #company-name").val();

		if(email == '' || company == ''){
			jQuery('#enterprise-form .form-error').addClass("active");
			return
		}
		else{
			jQuery('#enterprise-form .form-error').removeClass("active");
		}

		sending_mail = true;
		enterpriseButton.progressStart();
		var progress = 0;
		var refreshInterval = setInterval(function () {
			if (progress >= 90) {
				progress = 0;
				enterpriseButton.progressSet(0);
			}
			else {
				enterpriseButton.progressIncrement(5);
				progress += 5;
			}
		}, 200);

		var email = jQuery("#enterprise-form #e-mail-address").val();
		var company = jQuery("#enterprise-form #company-name").val();

		jQuery.ajax({
			type: "POST",
			url: jQuery("#enterprise-form").data('url'),
			data: {
				email: email,
				company: company,
				subject: "Yusp enterprise customer"
			},
			success: function(){
				jQuery("#enterprise-form #company-name").val("");
				jQuery("#enterprise-form #e-mail-address").val("");

				jQuery("#enterprise-form").addClass("inactive");
				jQuery("#enterprise-thanks").addClass("active");


				console.log("mail success");
				sending_mail = false;
				clearInterval(refreshInterval);
				enterpriseButton.progressFinish();
			},
			error: function(){
				jQuery("#enterprise-form .error-msg").addClass("active");

				console.log("mail fail");
				sending_mail = false;
				clearInterval(refreshInterval);
				enterpriseButton.progressFinish();
			}
		});
	});

	jQuery('#submit-pro').click(function(){
		if(sending_mail) return;
		var email = jQuery("#pro-form #e-mail-address").val();
		var company = jQuery("#pro-form #company-name").val();

		if(email == '' || company == ''){
			jQuery('#enterprise-form .form-error').addClass("active");
			return
		}
		else{
			jQuery('#enterprise-form .form-error').removeClass("active");
		}

		sending_mail = true;
		proButton.progressStart();
		var progress = 0;
		var refreshInterval = setInterval(function () {
			if (progress >= 90) {
				progress = 0;
				proButton.progressSet(0);
			}
			else {
				proButton.progressIncrement(5);
				progress += 5;
			}
		}, 200);

		var email = jQuery("#pro-form #e-mail-address").val();
		var company = jQuery("#pro-form #company-name").val();

		jQuery.ajax({
			type: "POST",
			url: jQuery("#pro-form").data('url'),
			data: {
				email: email,
				company: company,
				subject: "Yusp pro customer"
			},
			success: function(){
				jQuery("#pro-form #company-name").val("");
				jQuery("#pro-form #e-mail-address").val("");

				jQuery("#pro-form").addClass("inactive");
				jQuery("#pro-thanks").addClass("active");


				console.log("mail success");
				sending_mail = false;
				clearInterval(refreshInterval);
				proButton.progressFinish();
			},
			error: function(){
				jQuery("#pro-form .error-msg").addClass("active");

				console.log("mail fail");
				sending_mail = false;
				clearInterval(refreshInterval);
				proButton.progressFinish();
			}
		});
	})
// Custom progress handling

	controlButton.click(function (e) {
		e.preventDefault();
		if (captchaActive != captchaEnum.DOMAIN && jQuery('#domain-input')[0].value != ""){
			if(captchaActive == captchaEnum.TRIAL){
				clearCaptcha();
			}
			/*var $captcha = jQuery('.captcha-placeholder');*/
			var $captcha = jQuery('#pricing-traffic-box .captcha-container').append("<div id='recaptcha'></div>");
			captchaId = grecaptcha.render('recaptcha', {
				'sitekey': '6Lf72hkTAAAAAKVY7GUW3BGVthmR6JQmdVOrqSCe',
				'callback': captchaCallback
			});
			jQuery('.captcha-placeholder').addClass('active');
			captchaActive = captchaEnum.DOMAIN;
		};
	});

	trialButton.click(function(e){
		e.preventDefault();
		if (captchaActive != captchaEnum.TRIAL){
			var domain = jQuery('#domain-input-trial')[0].value;
			var email = jQuery('#e-mail-address')[0].value;
			if(email == '' || domain == ''){
				jQuery('#trial-form .form-error').addClass("active");
				return
			}
			else{
				jQuery('#enterprise-form .form-error').removeClass("active");
			}
			if(captchaActive == captchaEnum.DOMAIN){
				clearCaptcha();
			}
			/*var $captcha = jQuery('.captcha-placeholder');*/
			var $captcha = jQuery('#free-trial-box .captcha-container').append("<div id='recaptcha'></div>");
			captchaId = grecaptcha.render('recaptcha', {
				'sitekey': '6Lf72hkTAAAAAKVY7GUW3BGVthmR6JQmdVOrqSCe',
				'callback': captchaCallback
			});
			jQuery('.captcha-placeholder').addClass('active');
			captchaActive = captchaEnum.TRIAL;
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
		jQuery('#free-trial-box .error-msg').html(msg);
	}

	function clearErrorMessage(){
		jQuery('#free-trial-box .error-msg').html("");
	}

	function captchaCallback(data) {
		captchaData = data;
		/*jQuery('#actionButton')[0].disabled = false;
		jQuery('#free-trial-button')[0].disabled = false;*/

		if(captchaActive == captchaEnum.DOMAIN){
			getDomainInfo();
		}
		else if(captchaActive == captchaEnum.TRIAL){
			sendTrialInfo();
		}
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

	function sendTrialInfo(){
		clearErrorMessage();
		if(captchaData == null){
			setErrorMessage("Complete captcha first");
			var $captcha = jQuery('.captcha-placeholder');
			jQuery('#free-trial-box .captcha-container').append($captcha);
			jQuery('.captcha-placeholder').addClass('active');

			return;
		}

		var domain = jQuery('#domain-input-trial')[0].value;
		var email = jQuery('#e-mail-address')[0].value;

		//console.log(selectedPlan);
		var requestData = {
			"comp_domain_name": domain,
			"email": email,
			"g-recaptcha-response": captchaData,
			"plan_idx": "tierPlan0" + (selectedPlan.id)
		};

		dataLoading = true;
		trialButton.progressStart();
		var progress = 0;
		var refreshInterval = setInterval(function () {
			if (progress >= 90) {
				progress = 0;
				trialButton.progressSet(0);
			}
			else {
				trialButton.progressIncrement(5);
				progress += 5;
			}
		}, 200);


		jQuery.ajax(
			{
				type: 'POST',
				url: backendUrl,
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify(requestData),
				success: function(data){
					var redirectUrl = data.url;
					clearErrorMessage();
					dataLoading = false;
					clearInterval(refreshInterval);
					trialButton.progressFinish();

					jQuery("#trial-form").addClass("inactive");
					jQuery("#trial-thanks").addClass("active");

					clearCaptcha();

					//window.location = redirectUrl;
				},
				error: function(data){
					var statusCode = Number(data.status);
					if(statusCode == 401){
						setErrorMessage("Failed captcha, try again!");
					}
					else{
						setErrorMessage("Unknown error occurred, try again later!");
					}

					dataLoading = false;
					clearCaptcha();
					jQuery('.captcha-placeholder').removeClass('active');
					clearInterval(refreshInterval);
					trialButton.progressFinish();

				}
			}
		)
	}

	function setValue() {
		if(slider){
			pageViewsPerMonth = Number(slider.noUiSlider.get());
		}
		reCalculate();
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

			/*console.log("Page views: " + views);
			console.log("Page views parsed: " + pageViewsPerSession);

			console.log("ViewsForCount: " + viewsForCount);*/

			pageViewsPerMonth = viewsForCount * pageViewsPerSession;

			/*console.log("Page views per month: " + pageViewsPerMonth);*/

			if(slider){
				slider.noUiSlider.set(pageViewsPerMonth);
			}
			reCalculate();
		}
		else {
			jQuery('.pageview-count').html("No information available from you site. Choose another option!").addClass('warning');
		}
	}

	function reCalculate() {
		selectedPlan = null;

		if(firstMove){
			jQuery('#feature-based-pricing').addClass("hidden");
			firstMove = false;
		}

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

	function showTrial(id){
		// Show free trial box
		jQuery('#free-trial-box').addClass('visible');

		jQuery('#free-trial-button').removeClass('plan-1');
		jQuery('#free-trial-button').removeClass('plan-2');
		jQuery('#free-trial-button').removeClass('plan-3');

		jQuery('#free-trial-button').addClass('plan-' + id);
	}

	function closeTrial(){
		jQuery('#free-trial-button').removeClass('plan-1');
		jQuery('#free-trial-button').removeClass('plan-2');
		jQuery('#free-trial-button').removeClass('plan-3');

		jQuery('#free-trial-box').removeClass('visible');
	}

	function selectPlan(id) {
		selectedPlan = plans[id -1];
		jQuery('.pageview-count').html(formatCount(pageViewsPerMonth)).removeClass('warning');

		// Enterprise
		if(id == 5){
			if(!jQuery('.calculated-price').hasClass('hidden')){
				jQuery('.calculated-price').addClass('hidden');
			}
			if(jQuery('.plans').hasClass('selected')){
				jQuery('.plans').removeClass('selected');
			}
			if(jQuery('#yusp-pro').hasClass('selected')){
				jQuery('#yusp-pro').removeClass('selected');
			}
			if(!jQuery('#yusp-plus').hasClass('selected')){
				jQuery('#yusp-plus').addClass('selected');
			}

			jQuery('#pricing').removeClass('pricing-pro');
			jQuery('#pricing').removeClass('pricing-overview');
			jQuery('#pricing').removeClass('pricing-starter');
			jQuery('#pricing').addClass('pricing-enterprise');

			jQuery('#free-trial-box').removeClass('visible');

		}

		else if(id == 0){
			if(!jQuery('.calculated-price').hasClass('hidden')){
				jQuery('.calculated-price').addClass('hidden');
			}
			if(jQuery('.plans').hasClass('selected')){
				jQuery('.plans').removeClass('selected');
			}
			if(jQuery('#yusp-pro').hasClass('selected')){
				jQuery('#yusp-pro').removeClass('selected');
			}
			if(!jQuery('#yusp-plus').hasClass('selected')){
				jQuery('#yusp-plus').removeClass('selected');
			}

			jQuery('#pricing').removeClass('pricing-pro');
			jQuery('#pricing').removeClass('pricing-enterprise');
			jQuery('#pricing').removeClass('pricing-starter');
			jQuery('#pricing').addClass('pricing-overview');

			jQuery('#free-trial-box').removeClass('visible');
		}

		// Pro
		else{
			if (id == 4){
				jQuery('#yusp-pro').addClass('selected');

				if(jQuery('.plans').hasClass('selected')){
					jQuery('.plans').removeClass('selected');
				}
				if(jQuery('#yusp-plus').hasClass('selected'))
					jQuery('#yusp-plus').removeClass('selected');
				jQuery('#free-trial-box').removeClass('visible');

				jQuery('#pricing').addClass('pricing-pro');
				jQuery('#pricing').removeClass('pricing-overview');
				jQuery('#pricing').removeClass('pricing-starter');
				jQuery('#pricing').removeClass('pricing-enterprise');
			}
			else{
				if(!jQuery('.plans').hasClass('selected'))
					jQuery('.plans').addClass('selected');
				if(jQuery('#yusp-plus').hasClass('selected'))
					jQuery('#yusp-plus').removeClass('selected');
				if(jQuery('#yusp-pro').hasClass('selected')){
					jQuery('#yusp-pro').removeClass('selected');
				}

				if(jQuery('.calculated-price').hasClass('hidden')){
					jQuery('.calculated-price').removeClass('hidden');
				}

				if(!jQuery('#pricing').hasClass('pricing-starter')){
					jQuery('#pricing').removeClass('pricing-pro');
					jQuery('#pricing').removeClass('pricing-overview');
					jQuery('#pricing').addClass('pricing-starter');
					jQuery('#pricing').removeClass('pricing-enterprise');
				}
			}

			var overuse = Math.ceil( (pageViewsPerMonth - selectedPlan.viewMax) / 1000) * selectedPlan.overuseCost;
			if (overuse < 0) overuse = 0;

			/*jQuery('.plan-price').html(formatPrice(selectedPlan.price));
			jQuery('.overuse-price').html(formatPrice(overuse));
			jQuery('.total-price').html(formatPrice(overuse + selectedPlan.price));*/
			jQuery('.price-per-reco').html(formatPrice(((overuse + selectedPlan.price) / parseFloat(pageViewsPerMonth)) * 1000, 2));

			jQuery('.plan-wrapper.selected').removeClass('selected');
			jQuery('.plan-wrapper').addClass('unselected');
			jQuery('#plan-' + id).removeClass('unselected').addClass('selected');

			jQuery(plans).each(function (index, elem) {
				var planprice = elem.price;
				var additionalReco = pageViewsPerMonth - elem.viewMax;
				if (additionalReco < 0) additionalReco = 0;

				var overuse = Math.ceil(additionalReco / 1000) * elem.overuseCost;
				if (overuse < 0) overuse = 0;

				jQuery('#plan-' + elem.id + " .additional").html(formatCount(additionalReco));
				jQuery('#plan-' + elem.id + " .overuse").html(formatPrice(overuse));
				jQuery('#plan-' + elem.id + " .total").html(formatPrice(overuse + planprice));

				if(elem.id == selectedPlan.id){
					jQuery('#plan-' + elem.id + " .price").html(formatPrice(overuse + planprice));
					var higherCount = pageViewsPerMonth > elem.viewMax ? pageViewsPerMonth : elem.viewMax;
					jQuery('#plan-' + elem.id + " .tertiary .value").html(formatCount(higherCount));
				}
				else{
					jQuery('#plan-' + elem.id + " .price").html(formatPrice(planprice));
					jQuery('#plan-' + elem.id + " .tertiary .value").html(formatCount(elem.viewMax));
				}

				jQuery('#plan-' + elem.id + " .base-price").html(formatPrice(planprice));


				if(elem.id == 4){
					jQuery('#yusp-pro .price').html(formatPrice(overuse + planprice));
				}
			});


			var domain = jQuery('#domain-input')[0].value;
			if(domain){
				jQuery('#domain-input-trial').val(domain);
			}
		}
	}

});