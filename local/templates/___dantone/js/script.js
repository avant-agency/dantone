$(document).ready(function(){
	
/* 	$('.feedback .checkboxes-rit.control').click(function(e){
e.stopPropagation();
e.preventDefault();
$(this).find('.jq-checkbox').toggleClass('checked')

})	
*/

/* 	function ContactsJS() {
		$('input[name="form_text_5"]').mask("+7(999)999-99-99");
		$('.feedback .checkboxes-rit.control').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		$(this).find('.jq-checkbox').toggleClass('checked'); });
	} */
	
	function resize() {
		$window = $(window);
		width = $(window).width();
		height = $(window).height();
		if ( width < 768 ){
		}
		$('.a-promo .slides li').height(height);
	}
	
	function defineWidth() {

		if ($('.page-back').length) {
			var height2 = $('.form-popup').offset().top - $('.nav-container').offset().top;
			var height =  $('.form-popup').height() + height2 - 35;

			if ($(window).width() < 1100) {
				height =  $('.form-popup').height() + height2 - 5; 
			}

			if ($(window).width() < 800) {
				height =  $('.form-popup').height() + height2 - 26; 
			}

			if ($(window).width() < 700) {
				height =  $('.form-popup').height() + height2 - 21 ; 
			}

			if ($(window).width() > 1700) {
				height =  $('.form-popup').height() + height2 - 15;
				console.log(1);
			}

			var width = $(window).width() / 3;
			$('.page-back').css({'height':height});
			$('.form-right').css({'width':width})
		}
	}

	resize();
	defineWidth();

	$(window).resize(function() {
		resize();
		defineWidth();
	});

	if ( $('.a-categories').length ) {
		$('.a-categories').flexslider({ animation: 'slide', slideshowSpeed: 3000, controlNav: false, itemWidth: 200, itemMargin: 0, minItems: 1, maxItems: 5 });
	}

	if ( $('.a-product-list').length ) {
		$('.a-product-list').flexslider({ animation: 'slide', slideshow: false, controlNav: false, itemWidth: 200, itemMargin: 0, minItems: 1, maxItems: 5 });
	}

	if ( $('.a-bnr-slider').length ) {
		$('.a-bnr-slider').flexslider({ animation: 'slide' });
	}

	$('.a-show-search').click( function() {
		$('.search-form').show();
		$('.search-form input[type=text]').focus();
	});

	$('.search-form input[type=text]').keydown(function(eventObject){
		if (eventObject.which == 27) {
			$('.search-form').hide();
		}
	});

	/*$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});*/
	$('.tabs li').on('click', function(){
		var links=$(this).closest('.tabs'),
		tabs=$(this).closest('.tabs-container').find('.panes');
		links.find('.active').removeClass('active');
		$(this).addClass('active');
		var index = $(this).index();
		tabs.find('.active').removeClass('active').hide();
		console.log($(tabs.find('.pane')[index]))
		$(tabs.find('.pane')[index]).addClass('active').show();

	})

	$('input:checkbox, input:radio, select').styler();


	$('.a-radio-inline input, .a-radio input').change(function(){
		$(this).parents('.control-group').find('.selected').removeClass('selected');
		$(this).parents('.control').addClass('selected');
	});

	//	DropDownMenu
	$( '#ddmenu li:has(.dropdown)' ).doubleTapToGo();

	// Mobile Menu
	$('.a-show-menu').click( function() {
		$('.nav-container').toggleClass('active');
		$('html').toggleClass('body-menu-opened');
	});
	ymaps.ready(init_geo);
	function set_geo(location){
		var date = new Date(new Date().getTime() + 60*60 *24* 1000);
		document.cookie = 'iplocation='+location+'; path=/; expires=' + date.toUTCString();
		if($('.city-input').length>0){
			$('.city-input').each(function(){
				if($(this).val().length==0)$(this).val(location);
			})
			
		}
	}
	function init_geo() {
		var location = ymaps.geolocation.city;
		//console.log(BX.translit(location, {use_google: trueб }))
		if($('body').hasClass('en-version')){
			BX.message['LANGUAGE_ID']='ru';
			location=BX.translit(location, {use_google: true, callback: set_geo});
			//BX.message['LANGUAGE_ID']='en';
		}
		else{
			set_geo(location)
		}
	}
	function parseJSON(data)
	{
		var result = null;
		if (typeof data === 'string')
		{
			try {
				if (data.indexOf("\n") >= 0)
					eval('result = ' + data);
				else
					result = (new Function("return " + data))();
			} catch(e) {
				return false;
			}
		}
		return result;
	}
	get_and_load();
	$(document).on('change','.order-form input, .order-form textarea', function(){
		collect_and_save();
	})
	function collect_and_save(){
		if($('.order-form').length==0)return;
		var data=new FormData($('.order-form')[0]);
		$.ajax({
			url: '?save_props=Y',
			data: data,
			type: 'POST',
			async: true,
			processData: false,
			dataType :'html', 
			contentType: false,
			success: function(html){
			}

		})
	}
	function get_and_load(){
		if($('.order-form').length==0)return;
		var form = $('.order-form');
		$.ajax({
			url: '?get_props=Y',
			async: true,
			processData: false,
			dataType :'html', 
			contentType: false,
			success: function(html){
				var json = parseJSON(html);
				for(var code in json){
					var val=json[code],
					field = form.find('[name="'+code+'"]');
					if(field.is('[type="checkbox"]') || field.is('[type="radio"]')){
						console.log(field)
						//if(field.is('[type="radio"]'))field.closest('.control-group').find('input[type="radio"]:checked').prop('checked', false);
						field.closest('.control-group').find('input[value="'+val+'"]').parent().click();
						
					}else{
						field.val(val);
					}
				}
			}
		})
	}
});
