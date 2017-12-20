$(document).ready(function(){

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
        $('.a-categories').flexslider({ animation: 'slide', slideshowSpeed: 3000, controlNav: false, itemWidth: 200, itemMargin: 0, minItems: 1, maxItems: 5
        });
    }

    if ( $('.a-product-list').length ) {
        $('.a-product-list').flexslider({ animation: 'slide', slideshow: false, controlNav: false, itemWidth: 200, itemMargin: 0, minItems: 1, maxItems: 5 });
    }

    if ( $('.a-bnr-slider').length ) {
        $('.a-bnr-slider').flexslider({ animation: 'slide' });
    }

    $('.a-show-search').click( function() {
        $('.search-form').toggleClass('hide');
        $('.search-form').toggleClass('showed animated slideInUp');
        $('.main-menu').toggleClass('novisible');
        if(!$('.search-form').hasClass('hide')){
            $('.search-form input[type=text]').focus();
        }

    });

    $('.search-form input[type=text]').keydown(function(eventObject){
        if (eventObject.which == 27) {
            $('.search-form').addClass('hide');
            $('.search-form').removeClass('showed animated slideInUp');
            $('.main-menu').removeClass('novisible');
        }
    });

    $('.fancybox-media:not(.gallery-list)').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        helpers : {
            media : {}
        }
    });
    $('.tabs li').on('click', function(){
        if($(this).parents('.paneble').length==0)return false;
        var links=$(this).closest('.tabs'),
            tabs=$(this).closest('.tabs-container').find('.panes');
        links.find('.active').removeClass('active');
        $(this).addClass('active');
        var index = $(this).index();
        tabs.find('.active').removeClass('active').hide();
        console.log($(tabs.find('.pane')[index]))
        $(tabs.find('.pane')[index]).addClass('active').show();

    })



    $('.a-radio-inline input, .a-radio input').change(function(){
        $(this).parents('.control-group').find('.selected').removeClass('selected');
        $(this).parents('.control').addClass('selected');
    });

    //	DropDownMenu
    $( '#ddmenu li:has(.dropdown)' ).doubleTapToGo();

    // Mobile Menu 
    // ИЗМЕНЕНИЯ
    $('.a-show-menu').click( function() {
        $('.nav-container').toggleClass('active');
        $('html').toggleClass('body-menu-opened');
        $('#header').toggleClass('active');
        $('.a-show-menu.show-menu span').toggleClass('active')
    });
    $('.mf-search-icon').click(function () {
        $('.mobile-search-form').animate({
            left: 20,
            opacity: 1
        }, 350);
    })
    $('.mobileSearch-close').click(function () {
        $('.mobile-search-form').animate({
            left: '100vw',
            opacity: 1
        }, 350);
    })
    //ИЗМЕНЕНИЯ ЗАКАНЧИВАЮТСЯ
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
        //console.log(BX.translit(location, {use_google: trueР± }))
        if($('body').hasClass('en-version')){
            BX.message['LANGUAGE_ID']='ru';
            location=BX.translit(location, {use_google: true, callback: set_geo});
            //BX.message['LANGUAGE_ID']='en';
        }
        set_geo(location)
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
                init_geo();
            }
        })
    }
});
function basketAjax(action, productID) {
    if(productID) {
        var url = SITE_DIR+"include/basket.php";
        var data = {
            pID: productID,
            action: action
        }
        $.post(url, data, function(response) {
            $('#cartInHeaderWrapper').html(response)
            location.href = "#cart";
        })
        BX.onCustomEvent('OnBasketChange');
    }
}
function addDatalayer(id, name, price, variant){
    dataLayer.push({
        "ecommerce": {
            "add": {
                "products": [
                    {
                        "id": id,
                        "name" : name,
                        "variant" : variant,
                        "price": price
                    },
                ]
            }
        }
    })
}
function removeDatalayer(id, name){
    dataLayer.push({
        "ecommerce": {
            "remove": {
                "products": [
                    {
                        "id": id,
                        "name": name,
                    }
                ]
            }
        }

    });
    console.log(dataLayer)
}
$(function () {
    console.log($('.payment-btn').attr('href'))
    if($('.payment-btn').length>0)window.location.href=$('.payment-btn').attr('href')
    function openPopup(url){
        var popup = $('<div class="goodPopup-wrap">'+
        '<div class="goodPopup-overlay"></div>'+
        '<div class="goodPopup-content">'+
        '<div class="goodPopup-close"></div>'+
        '</div>'+
        '</div>');
        $('body').append(popup);
        $('.goodPopup-wrap').fadeIn(300);
        $('html').addClass('fancybox-margin');
        $.ajax({
            url: url+'?quickview=Y',
            success: function(html){
                popup.find('.goodPopup-content').append(html);
                initScripts(popup);
            }
        })
    }
    function closePopup(){
        if($(window).width() > 601 ){

            $('.goodPopup-wrap').fadeOut(300);
            $('html').removeClass('fancybox-margin');
        }
        else if($(window).width() < 601){
            $('.goodPopup-wrap').fadeOut(300);
            $('html').removeClass('fancybox-margin');
        }
        $('.goodPopup-wrap').remove();
    }
    function initScripts(parent){
        if(!parent)parent=$('body');
        if(!$.cookie('showCounter')) {
            $.cookie('showCounter', 1, { expires: 360, path: '/' });
        } else {
            if($.cookie('showCounter') != 3) {
                var newc = $.cookie('showCounter')
                newc++;
                $.cookie('showCounter', newc , { expires: 360, path: '/' });
            }
        }
        var sync1 = parent.find('[id="sync1"]');
        var sync2 = parent.find('[id="sync2"]');
        var slidesPerPage = 3; ///  РєРѕР»РёС‡РµСЃС‚РІРѕ РјРёРЅРёР°С‚СЋСЂ РІРѕ СЃС‚РѕСЂРѕР№ РєР°СЂСѓСЃРµР»Рё
        var syncedSecondary = true;

        sync1.owlCarousel({
            items : 1,
            slideSpeed : 2000,
            nav: true,
            autoplay: false,
            dots: false,
            loop: true

        }).on('changed.owl.carousel', function(el) {
            //С„СѓРЅРєС†РёСЏ РѕРїСЂРµРґРµР»РµРЅРёСЏ РїРѕР·РёРёС†РёРё
            var count = el.item.count-1;
            var current = Math.round(el.item.index - (el.item.count/2) - .5);
            if (count === 1) {
                current = current - 1;
            }
            if(current < 0) {
                current = count ;
            }
            if(current > count) {
                current = 0;
            }
            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current")
            sync2
                .find('.item')
                .removeClass('active-item-dantone')
                .eq(current)
                .addClass('active-item-dantone');
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }

        });

        sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items : slidesPerPage,
                loop: false,
                dots: false,
                nav: false,
                smartSpeed: 200,
                slideSpeed : 500,
                slideBy: slidesPerPage, ///  РєРѕР»РёС‡РµСЃС‚РІРѕ РјРёРЅРёР°С‚СЋСЂ РІРѕ СЃС‚РѕСЂРѕР№ РєР°СЂСѓСЃРµР»Рё
                responsiveRefreshRate : 100,
                responsive: {
                    741: {
                        items : slidesPerPage
                    }
                }
            });



        sync2.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });

        sync2.find('.owl-item:first-child .ritual-slider-fanc img').addClass('active-item-dantone');
    }




    $('.gallery-list').click(function (e) {
        var url = ($(this).parent().find('.photo a').length>0?$(this).parent().find('.photo a'):$(this).prev('a')).attr('href')
        openPopup(url);
        return false;
    });
    $(document).on('click', '.goodPopup-overlay, .goodPopup-close',   function () {
        closePopup();
    })
});
function checkPrivate(){
    if($('.privacy-checkbox').length>0){
        $('.privacy-checkbox input').each(function(){
            $(this).attr('checked', 'checked');
        })
    }
    $('input:checkbox, input:radio, select').styler();

}
$(document).ready(function(){
    checkPrivate();
    $(document).on('change', '.privacy-checkbox input', function(){
        var form=$(this).parents('form');
        form.find('[type="submit"], button').prop('disabled', !$(this).prop('checked'))
    })
    $(window).on('scroll', function(){
        if($(window).scrollTop()>$('header').height()){
            $('header').addClass('fixed-header')
        }else{
            $('header').removeClass('fixed-header')
        }
    })
})

$(document).ready(function(){
    if($(".favorite-icon").length){
        var favorites = $(".favorite-icon");

        favorites.click(function(e){
            e.preventDefault();
            if($(this).hasClass("favorite-icon-active")){
                $(this).removeClass("favorite-icon-active");
            } else {
                $(this).addClass("favorite-icon-active");
            }
        })
    }
})