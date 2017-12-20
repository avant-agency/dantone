<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>  <div class="push"></div>
</div>



<!--footer-->
<footer id="footer">
<div class="overlay">
    <div class="popup">
        <div class="close"> X</div>
    </div>
</div>

	  <style>
            .ovhHid{
                overflow: hidden !important;
            }

            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                display: none;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                z-index: 1000;
                right: 0;
                bottom: 0;
                overflow-y: auto;
            }

            .popup {
                z-index: 1001;
                width: 750px;

                height: 440px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                background: url("/bitrix/templates/dantone/images/bg-text.png");
                background-size: contain;
                background-repeat: no-repeat;
            }

            .close {
                position: relative;
                left: 100.5%;
                top: 0.5%;
                cursor: pointer;
                color: #fff;
                width: 20px;
                height: 20px;
                text-align: center;
                border-radius: 50%;
                line-height: 20px;

                font-family: sans-serif;
                font-size: 14px;
            }


            @media (max-width: 800px){
                .popup{
                    width: 90%;
                }
            }
            @media (max-width: 750px){
                .popup{
                    width: 500px;
                    height: 293px;


                }
                .close{
                    left: 100.5%;
                    top: -1.5%;
                    width: 16px;
                    height: 16px;
                    font-size: 12px;
                    line-height: 16px;
                }
            }
            @media (max-width: 500px){
                .popup{
                    width: 290px;
                    height: 190px;


                }

            }


        </style>
        <script>
            $(document).ready(function () {

                if (!getCookie('popup-open')){
                    setTimeout(function () {
                        $('.overlay').fadeOut(300);
                        $('html').removeClass('ovhHid');
                       // setCookie('popup-open', 'open', {expires: 33336000});
                    }, 10000);
                    setTimeout(function () {
                        $('.overlay').css({
                            display: 'block'
                        });
                        $('html').addClass('ovhHid');

                    }, 500);

                    $('.close').click(function () {
                        $(this).parent().parent().fadeOut(300);
                        $('html').removeClass('ovhHid');
                        // setCookie('popup-open', 'open', {expires: 33336000});


                    })
                }


                function setCookie(name, value, options) {


                    options = options || {};

                    var expires = options.expires;

                    if (typeof expires == "number" && expires) {
                        var d = new Date();
                        d.setTime(d.getTime() + expires * 1000);
                        expires = options.expires = d;
                    }
                    if (expires && expires.toUTCString) {
                        options.expires = expires.toUTCString();
                    }

                    value = encodeURIComponent(value);

                    var updatedCookie = name + "=" + value;

                    for (var propName in options) {
                        updatedCookie += "; " + propName;
                        var propValue = options[propName];
                        if (propValue !== true) {
                            updatedCookie += "=" + propValue;
                        }
                    }

                    document.cookie = updatedCookie;
                };



                function getCookie(name) {
                    var matches = document.cookie.match(new RegExp(
                            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                    ));
                    return matches ? decodeURIComponent(matches[1]) : undefined;
                };



            })
        </script>



	<script>
		
		$(document).ready(function(){
				        
	        
	
	
	
	$('.btn').each(function(){
		var text = $(this).text();

		if (text == 'Барнет классик') {

			$(this).css({'width':'200px'});
		}
	})	
		})
	</script>
    <div class="container">
        <div class="footer-nav clearfix">
            <div class="footer-nav-main clearfix">
                <h4>Каталог товаров</h4>
                 <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "footer_catalog", Array(
									"VIEW_MODE" => "TEXT",	// Вид списка подразделов
									"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
									"IBLOCK_TYPE" => "",	// Тип инфоблока
									"IBLOCK_ID" => "4",	// Инфоблок
									"SECTION_CODE" => "",	// Код раздела
									"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
									"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
									"TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
									"SECTION_FIELDS" => "",	// Поля разделов
									"SECTION_USER_FIELDS" => "",	// Свойства разделов
									"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
									"CACHE_TYPE" => "A",	// Тип кеширования
									"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
									"CACHE_NOTES" => "",
									"CACHE_GROUPS" => "Y",	// Учитывать права доступа
									),
									false
								);?>
            </div>

            <div class="footer-nav-aside clearfix">
                <h4>О компании</h4>
                <ul>
                    <li><a href="/about/">О компании</a></li>
                    <li><a href="/clients/">Клиенты</a></li>
                    <li><a href="/delivery/">Доставка</a></li>
                    <li><a href="/news/">Новости</a></li>
                    <li><a href="/vakansii/">Вакансии</a></li>
                </ul>
                <div class="footer-info">
                    <div class="file">
                        <a href="<?=SITE_TEMPLATE_PATH?>/DANTONE HOME CATALOGUE 2016-2017.pdf">
                            <i class="icon-file-pdf"></i>
                            <div class="file-name">Скачать каталог</div>
                            <div class="file-detail">pdf, 330 мб.</div>
                        </a>
                    </div>					
					<div class="file">
                        <a target="_blank" href="https://yadi.sk/d/Tqcdj97J3QWspt"> <!-- #download3d -->
                            <i class="icon-file-zip" style="background-image: url('/bitrix/templates/dantone/images/dantone-icon.svg'); width: 30px;  height: 34px; background-size:cover; background-position: -3px 0"></i>
                            <div class="file-name">Скачать модели 3DS Max 2016</div>
                            <div class="file-detail">zip, 4,5 гб.</div>
                        </a>
                    </div>				
					
                    <ul class="social">
                        <li><a target="_blank" href="https://www.facebook.com/dantonehome?skip_nax_wizard=true&ref_type=bookmark" title="Мы в Facebook"><i class="icon-fb"></i></a></li>
                        <li><a target="_blank" href="https://instagram.com/Dantonehome/" title="Мы в Instagram"><i class="icon-ins"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix">
            <div class="copyright">&copy; 2015-<?=date("Y")?> Dantone Home</div>
            
        </div>
    </div>
</footer>
<!--footer-->
<noindex>
<div class="remodal" data-remodal-id="cart">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <h2>Товар добавлен в корзину</h2>
    <form action="#">
        <div class="control-btn text-center">
            <input onclick="location.href = '#'; return false;" type="submit" value="Продолжить покупку" class="btn btn-blue" />
        </div>
        <div class="control-btn text-center">
            <input onclick="location.href = '/personal/cart/'; return false;" type="submit" value="Перейти в корзину" style="width:223px;" class="btn btn-blue" />
        </div>
    </form>
</div>

<div class="remodal" data-remodal-id="callback">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
     <?$APPLICATION->IncludeComponent("bitrix:form.result.new","dantone_callback",Array(
	        "SEF_MODE" => "N", 
	        "WEB_FORM_ID" => "1", 
	        "LIST_URL" => "", 
	        "EDIT_URL" => "result_edit.php", 
	        "SUCCESS_URL" => "", 
	        "CHAIN_ITEM_TEXT" => "", 
	        "CHAIN_ITEM_LINK" => "", 
	        "IGNORE_CUSTOM_TEMPLATE" => "Y", 
	        "USE_EXTENDED_ERRORS" => "Y", 
	        "CACHE_TYPE" => "A", 
	        "CACHE_TIME" => "3600", 
	        "AJAX_MODE" => "Y",  // режим AJAX
			"AJAX_OPTION_SHADOW" => "N", // затемнять область
				"AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента
				"AJAX_OPTION_STYLE" => "Y", // подключать стили
        	"AJAX_OPTION_HISTORY" => "N", 
	        "VARIABLE_ALIASES" => Array(
	        )
	    )
	);?>
    
    
</div>

<div class="remodal" data-remodal-id="download3d">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <h3>Скачать 3D-модели</h3>
 <p>Введите пароль. <br/>Запросите его у своего менеджера или по почте info@dantonehome.ru.</p>
   <?$APPLICATION->IncludeComponent(
	"ims:pwd",
	"",
	Array(
		"AJAX" => "Y",
		"ERROR" => "Неверный пароль. Обратитесь к менеджеру за доступом.",
		"FILE" => "/download3d_link.php",
		"PWD" => "Dantone1905"
	)
);?>
         
</div>

<div class="remodal" data-remodal-id="login">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <h2>Авторизация</h2>
 
    <?$APPLICATION->IncludeComponent(
                "bitrix:system.auth.form",
                "modal",
                Array(
                    "REGISTER_URL" => "/auth/?register=yes",
                    "FORGOT_PASSWORD_URL" => "",
                    "PROFILE_URL" => "/personal/profile/",
                    "SHOW_ERRORS" => "Y",
                    "BACKURL" => $APPLICATION->GetCurDir()."/#login"
                )
            );?>
         
</div>

<div class="remodal" data-remodal-id="pass">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <h2>Восстановить пароль</h2>
    <?$APPLICATION->IncludeComponent( "bitrix:system.auth.forgotpasswd", 
		"dantone", 
		Array(
					) 
	);?>
</div>
<?
	$dir = $APPLICATION->GetCurDir();
	$dir = trim($dir, "/");
	$chunks = explode("/", $dir); 

?>
<?if(strlen($_REQUEST["utm_source"])>0 && $_REQUEST["utm_medium"] && $USER->isAdmin()):
?>
    <script>
	    $(function() {
		  var date = new Date();
                date.setTime(date.getTime() + 3600*24*30*12);
                //$.cookie('shown', "Y" , { expires: 360, path: '/' }); 
	    })
    </script>
    <!--div class="remodal remodal-discount" data-remodal-id="discount">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <h2>Скидка 5%</h2>
        <p>Просто введите Ваш e-mail и получите <strong>скидку 5%</strong> на все заказы.</p>
        <form id="discountForm">
            <div class="control">
                <label>
                    <input type="text" class="input-text input-full" placeholder="E-mail" name="email"
                           required="required" title="E-mail" value="<?$USER->GetEmail();?>"/>
                    <i class="icon-inside-input icon-mail"></i>
                </label>
            </div>
            <div class="control-btn"><input type="submit" value="Подтвердить" class="btn btn-blue" /></div>
            <p class="error"></p>
        </form>
    </div-->
    
    
    <div class="form-popup remodal remodal-discount" style="top: 0px !important; z-index: 100000; overflow: hidden; display;  max-width: 1100px !important; visibility: visible; opacity: 1" data-remodal-id="discount">
		<div class="form-close" style="font-size:50px; color: #111e35; position: absolute; right: 5px; top: 5px; z-index: 3; cursor: pointer;">×</div>
    <div class="form-popup_title">Мы рады приветствовать вас на <span>нашем сайте!</span></div>
    <div class="form-popup_text">
	<div class="form-popup_descr">             Получите <strong>скидку 5% </strong>
             
        </div>
        <!--<div class="form-popup_descr">
             Подпишитесь на рассылку о новинках и узнайте о скидках и акциях Dantone Home первыми.
        </div>-->
		
        <form class="form-popup_submit" id="discountForm">
            <input class="form-popup_input" type="text" placeholder="Ваш email" name="email" value="<?$USER->GetEmail();?>"/>
            <input type="submit" class="form-button" value="Не упустить скидку"/>
            <p class="error"></p>
        </form>
        <p class="small-descr">при единовременной покупке от 300 000 руб.</p>
        <div class="form-gallery">
            <div class="form-gallery_descr">
                Предлагаем Вам ознакомиться с нашей коллекцией мебели, света и аксессуаров.
            </div>
            <div class="form-gallery_imgs">
                <img class="gallery-img" src="/bitrix/templates/dantone/img/small-1.jpg"  alt=""/>
               <img class="gallery-img" src="/bitrix/templates/dantone/img//small-2.jpg" alt=""/>
                <img class="gallery-img" src="/bitrix/templates/dantone/img//small-3.jpg" alt=""/>
            </div>
            <div class="form-gallery-wrap">
	            <a class="form-galley-btn" href="http://dantonehome.ru/catalog/" style="">Посмотреть коллекцию</a>
            </div>             
        </div>
    </div>
    <img class="form-back" src="/bitrix/templates/dantone/img//form-back.jpg" alt="" style="right: -2px"/>
</div>
    
    
    <script type="text/javascript">
        $(function () {
	        

	

	        
            var discountForm = $('#discountForm');
            var busy = false;

            $('[data-remodal-id="discount"]').remodal().open();
            discountForm.on('submit', function () {
                if(!busy) {
                    $.ajax({
                        beforeSend: function () {
	                        busy = true;
                            discountForm.find('input[type="submit"]').val('Отправляю...');
                        },
                        url: '/ajax/applyDiscount.php',
                        type: 'post',
                        dataType: 'json',
                        data: {'email' : discountForm.find('input[name="email"]').val()},
                        success: function (data) {
                           console.log(data);                           
                           
                           
                           if (data["STATUS"] == 2) {
                                discountForm.find('input[type="submit"]').val('Подтвердить');
                                $('[data-remodal-id="discount-success"]').find('p').html('У Вас уже есть <strong>скидка ' + 5 + '%</strong>!');
                                $('[data-remodal-id="discount-success"]').remodal().open();
                            } 
                            
                            
                             if (data["STATUS"] == 0) {
                               
                                discountForm.find('input[type="submit"]').val('Подтвердить');
                                $('.remodal-discount .error').html('Вы ввели некорректный адрес e-mail');
								busy = false;
        

                            }                            
                            if (data["STATUS"] == 1) {
                               
                                discountForm.find('input[type="submit"]').val('Подтвердить');
                                $('[data-remodal-id="discount-success"]').remodal().open();
                            }
                           
                            var date = new Date();
                            date.setTime(date.getTime() - 3600);
                            document.cookie = "temporarilyLockDiscountPopup=0; expires="+ date.toGMTString() + "; path=/";
                        },
                        error: function () {
                            discountForm.find('input[type="submit"]').val('Подтвердить');
                           
                          
                        }
                    });
                }

                return false;
            });

            $('[data-remodal-id="discount"]').on('closed', function (e) {
                var date = new Date();
                date.setTime(date.getTime() - 3600);
                document.cookie = "hasUserDiscount=0; expires="+ date.toGMTString() + "; path=/";

                date = new Date();
                date.setTime(date.getTime() + 6000);
                document.cookie = "temporarilyLockDiscountPopup=1; expires="+ date.toGMTString() + "; path=/";
                function trackDiscount() {
                    setInterval(function() {
                        date = new Date();
                        date.setTime(date.getTime() + 6000);
                        document.cookie = "temporarilyLockDiscountPopup=1; expires="+ date.toGMTString() + "; path=/";
                    }, 5000);
                }

                trackDiscount();

                return true;
            });
        });
        
        
        
        
        var inst = $('[data-remodal-id="discount"]').remodal();
        $('.form-close').click(function(){
	        $('.form-popup').fadeOut(300);	        
	        setTimeout(function(){inst.close()},300);
        })
    </script>
    


    <div class="remodal" data-remodal-id="discount-success">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <h2 class="text-center mb20">Спасибо!</h2>
        <p class="text-center mb0">Вы подписаны на рассылку.</p>
    </div>

<?php if (!empty($_COOKIE['temporarilyLockDiscountPopup']) && !in_array(8, CUser::GetUserGroup($USER->GetID()))) { ?>
    <script type="text/javascript">
        $(function () {
            var date = new Date();
            date.setTime(date.getTime() + 6000);
            document.cookie = "temporarilyLockDiscountPopup=1; expires="+ date.toGMTString() + "; path=/";

            function trackDiscount() {
                setInterval(function() {
                    var date = new Date();
                    date.setTime(date.getTime() + 6000);
                    document.cookie = "temporarilyLockDiscountPopup=1; expires="+ date.toGMTString() + "; path=/";
                }, 5000);
            }

            trackDiscount();
        });
    </script>
<?php } ?>
<?endif;?>

</noindex>


<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=wh/rD790Qc/5uFUGsi7Dp1ozx3HYGpUXcnYO5APfhzYfXtn0XqKTK0sH9leUz2MdmCFAo24SZgD2*1Y4ZzQc0qEuE*ZtatrtK*/anNpjyaovU7hbmRng0JOeLy/T*roFmLaAs*lzdc1KPJurrJs66FSXRBrO3pvVrDAZKleEc5Y-';</script>

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','//connect.facebook.net/en_US/fbevents.js');

    fbq('init', '1510384962594233');
    fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=1510384962594233&ev=PageView&noscript=1"
        /></noscript>
<!-- End Facebook Pixel Code -->

<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({id: "2709206", type: "pageView", start: (new Date()).getTime()});
    (function (d, w, id) {
        if (d.getElementById(id)) return;
        var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
        ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
        var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
        if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
    })(document, window, "topmailru-code");
</script><noscript><div style="position:absolute;left:-10000px;">
        <img src="//top-fwz1.mail.ru/counter?id=2709206;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
    </div></noscript>
<!-- //Rating@Mail.ru counter -->

</body>
</html>