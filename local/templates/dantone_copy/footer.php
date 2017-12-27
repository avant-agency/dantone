<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    IncludeModuleLangFile(__FILE__);?>
    <div class="push"></div>
</div>
<!--mobile footer-->
<div class="mobile-footer">
    <div class="mf-content">
        <a href="/personal/cart/" class="mf-bagLink"></a>
        <a href="tel:+74951914218" class="mf-tel">+7 (495) 191-42-18</a>
        <div class="mf-search-icon"></div>
    </div>
    <form action="/search/" class="mobile-search-form">
        <div class="modbile-search-form-inner">
            <input type="submit" value="" class="mobileSearch-submit" style="margin-top:2px;">
            <input type="text" name="q" class="mobileSearch-input" placeholder="Поиск на Dantone home">
            <div class="mobileSearch-close"></div>
        </div>
    </form>
</div>
<!--end mobile footer-->
<!--footer-->
<footer id="footer">
    <script>
        $(document).ready(function(){
           $('.btn').each(function(){
              var text = $(this).text();

              if (text == '<?=GetMessage('FOOTER_BERNET')?>') {

                 $(this).css({'width':'200px'});
             }
         }) 
       })
   </script>
   <div class="container">
    <div class="footer-nav clearfix">
        <div class="footer-nav-main clearfix">
            <h4><?=GetMessage('FOOTER_CATALOG')?></h4>
            <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "footer_catalog", Array(
        "VIEW_MODE" => "TEXT",  // Вид списка подразделов
        "SHOW_PARENT_NAME" => "Y",  // Показывать название раздела
        "IBLOCK_TYPE" => "",    // Тип инфоблока
        "IBLOCK_ID" => "4", // Инфоблок
        "SECTION_CODE" => "",   // Код раздела
        "SECTION_URL" => "",    // URL, ведущий на страницу с содержимым раздела
        "COUNT_ELEMENTS" => "N",    // Показывать количество элементов в разделе
        "TOP_DEPTH" => "1", // Максимальная отображаемая глубина разделов
        "SECTION_FIELDS" => "", // Поля разделов
        "SECTION_USER_FIELDS" => array('UF_ENG_NAME'),  // Свойства разделов
        "LANGUAGE_ID" => LANGUAGE_ID,   // Свойства разделов
        "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
        "CACHE_TYPE" => "A",    // Тип кеширования
        "CACHE_TIME" => "36000000", // Время кеширования (сек.)
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "Y",  // Учитывать права доступа
        ),
            false
            );?>
        </div>

        <div class="footer-nav-aside clearfix">
            <h4><?=GetMessage('FOOTER_ABOUT')?></h4>
            <ul>
                <li><a href="<?=SITE_DIR?>about/"><?=GetMessage('FOOTER_ABOUT')?></a></li>
                <li><a href="<?=SITE_DIR?>clients/"><?=GetMessage('FOOTER_CLIENTS')?></a></li>
                <li><a href="<?=SITE_DIR?>delivery/"><?=GetMessage('FOOTER_DELIVERY')?></a></li>
                <li><a href="<?=SITE_DIR?>news/"><?=GetMessage('FOOTER_NEWS')?></a></li>
                <li><a href="<?=SITE_DIR?>vakansii/"><?=GetMessage('FOOTER_VACANCIES')?></a></li>
                <li><a href="<?=SITE_DIR?>sotrudnichestvo/"><?=GetMessage('FOOTER_PARTNERSHIP')?></a></li>
                <li><a target="_blank" href="https://www.google.com/maps/place/Dantone+Home/@55.758587,37.5596686,3a,75y,289.22h,83.83t/data=!3m6!1e1!3m4!1sqbao1hZnw4cAAAQ8sT4S_g!2e0!7i8000!8i4000!4m5!3m4!1s0x0:0x617c785c874d1a8f!8m2!3d55.7586405!4d37.5594895!6m1!1e1">
                <?=GetMessage('FOOTER_VIRTUAL')?></a></li>
            </ul>
            <div class="footer-info">
                <div class="file">
                    <a href="<?=SITE_TEMPLATE_PATH?>/DANTONE HOME CATALOGUE 2016-2017.pdf">
                        <i class="icon-file-pdf"></i>
                        <div class="file-name"><?=GetMessage('FOOTER_DOWNCATALOG')?></div>
                        <div class="file-detail">pdf, 330 <?=GetMessage('FOOTER_MB')?>.</div>
                    </a>
                </div>                  
                <div class="file">
                    <a href="#download3d"><!-- https://yadi.sk/d/Tqcdj97J3QWspt -->
                        <i class="icon-file-zip" style="background-image: url('/bitrix/templates/dantone/images/dantone-icon.svg'); width: 30px;  height: 34px; background-size:cover; background-position: -3px 0"></i>
                        <div class="file-name"><?=GetMessage('FOOTER_DOWN3DS')?></div>
                        <div class="file-detail">zip, 8.44 <?=GetMessage('FOOTER_GB')?>.</div>
                    </a>
                </div>              

                <ul class="social">
                    <li><a target="_blank" href="https://www.facebook.com/dantonehome?skip_nax_wizard=true&ref_type=bookmark" title="<?=GetMessage('FOOTER_WE')?>Facebook"><i class="icon-fb"></i></a></li>
                    <li><a target="_blank" href="https://instagram.com/Dantonehome/" title="<?=GetMessage('FOOTER_WE')?> Instagram"><i class="icon-ins"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clearfix">
        <div class="copyright">&copy; 2015-<?=date("Y")?> Dantone Home</div>

    </div>
</div>
</footer>
<div class="test" id="submit_popup_trigger" style="display:none;">Нажать для вызова popup</div>
<div class="newPopup-wrap">
    <div class="newPopup-overlay"></div>
    <div class="newPopup-content">
        <div class="close-newPopup">
            <svg width="64" version="1.1" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 0 64 64"
                 enable-background="new 0 0 64 64">
                <g>
                    <path fill="#1D1D1B"
                          d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
                </g>
            </svg>

        </div>
        <img src="https://dantonehome.ru/bitrix/templates/dantone_copy/img/header-logo-blue.svg" alt="" class="newPopup-logo">
        <div class="newPopup-title">
      Подпишитесь, чтобы стать участником закрытого клуба Dantone Home. Получайте новости, информацию о пополнении ассортимента и специальных предложениях.
        </div>
    <img src="/upload/photoPopup.jpg" alt="" class="newPopup-photo">

        <form action="#" class="newPopup-form">
            <div class="newPopup-inner">
                <div class="control">
                    <input type="text" class="input-text full-size" required="required" placeholder="E-mail" title="E-mail" name="form_email_4" value="" size="0">
                </div>
                <div class="control-btn newPopupBtn">
                    <input class="btn btn-blue full-size btn-large" id="contact_form_submitter" type="submit" name="web_form_submit" value="Вступить в клуб">
                </div>
                <div class="checkboxes-rit control">
                    <label class="privacy-checkbox">
                        <input name="#" value="14" type="checkbox" style="position: absolute; left: -9999px;">
                        <span class="checkbox-title">Я соглашаюсь на использование  <a
                                onclick="window.open('https://dantonehome.ru/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf','_blank')"
                                href="https://dantonehome.ru/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf"
                                target="_blank">персональных данных</a>
                </span>
                    </label>
                </div>
            </div>

        </form>
    </div>
</div>
<!--footer-->
<noindex>
    <div class="remodal" data-remodal-id="cart">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <h2><?=GetMessage('FOOTER_BASKET_ADDED')?></h2>
        <form action="#">
            <div class="control-btn text-center">
                <input onclick="location.href = '#'; return false;" type="submit" value="<?=GetMessage('FOOTER_BASKET_CONTINUE')?>" class="btn btn-blue" />
            </div>
            <div class="control-btn text-center">
                <input onclick="location.href = '<?=SITE_DIR?>personal/cart/'; return false;" type="submit" value="<?=GetMessage('FOOTER_BASKET_GOTOCART')?>" style="width:223px;" class="btn btn-blue" />
            </div>
        </form>
    </div>

    <div class="remodal" data-remodal-id="callback">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <?$APPLICATION->IncludeComponent("bitrix:form.result.new","dantone_callback",Array(
           "SEF_MODE" => "N", 
           "WEB_FORM_ID" => LANGUAGE_ID=='en'?'3':"1", 
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
            <h3><?=GetMessage('FOOTER_DOWN3DMODEL')?></h3>
            <p><?=GetMessage('FOOTER_REQPASS')?> info@dantonehome.ru.</p>
            <?$APPLICATION->IncludeComponent(
               "ims:pwd",
               "",
               Array(
                  "AJAX" => "Y",
                  "ERROR" => GetMessage('FOOTER_WRONGPASS'),
                  "FILE" => "/download3d_link.php",
                  "PWD" => "Dantone1905"
                  )
                  );?>

              </div>

              <div class="remodal" data-remodal-id="login">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                <h2><?=GetMessage('FOOTER_AUTH')?></h2>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:system.auth.form",
                    "modal",
                    Array(
                        "REGISTER_URL" => SITE_DIR."auth/?register=yes",
                        "FORGOT_PASSWORD_URL" => "",
                        "PROFILE_URL" => SITE_DIR."personal/profile/",
                        "SHOW_ERRORS" => "Y",
                        "BACKURL" => $APPLICATION->GetCurDir()."/#login",
                        'AJAX_MODE'=>'Y',
                        )
                        );?>

                    </div>

                    <div class="remodal" data-remodal-id="pass">
                        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                        <h2><?=GetMessage('FOOTER_RESPASS')?></h2>
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
      <div class="form-popup_title"><?=GetMessage('FOOTER_GLAD')?></div>
      <div class="form-popup_text">
       <div class="form-popup_descr"><?=GetMessage('FOOTER_GETDISCOUNT')?>

       </div>
        <!--<div class="form-popup_descr">
             Подпишитесь на рассылку о новинках и узнайте о скидках и акциях Dantone Home первыми.
         </div>-->

         <form class="form-popup_submit" id="discountForm">
            <input class="form-popup_input" type="text" placeholder="<?=GetMessage('FOOTER_YOUREMAIL')?>" name="email" value="<?$USER->GetEmail();?>"/>
            <input type="submit" class="form-button" value="<?=GetMessage('FOOTER_YESDISCOUNT')?>Не упустить скидку"/>
            <p class="error"></p>
        </form>
        <p class="small-descr"><?=GetMessage('FOOTER_DISCOUNTSMALL')?></p>
        <div class="form-gallery">
            <div class="form-gallery_descr">
                <?=GetMessage('FOOTER_DISCOUNTTEXT')?>
            </div>
            <div class="form-gallery_imgs">
                <img class="gallery-img" src="/bitrix/templates/dantone/img/small-1.jpg"  alt=""/>
                <img class="gallery-img" src="/bitrix/templates/dantone/img//small-2.jpg" alt=""/>
                <img class="gallery-img" src="/bitrix/templates/dantone/img//small-3.jpg" alt=""/>
            </div>
            <div class="form-gallery-wrap">
               <a class="form-galley-btn" href="<?=SITE_DIR?>catalog/" style=""><?=GetMessage('FOOTER_SEECOLLECTION')?></a>
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
                       discountForm.find('input[type="submit"]').val('<?=GetMessage('FOOTER_SENDING')?>');
                   },
                   url: '/ajax/applyDiscount.php',
                   type: 'post',
                   dataType: 'json',
                   data: {'email' : discountForm.find('input[name="email"]').val()},
                   success: function (data) {

                     if (data["STATUS"] == 2) {
                        discountForm.find('input[type="submit"]').val('<?=GetMessage('FOOTER_APPLY')?>');
                        $('[data-remodal-id="discount-success"]').find('p').html('<?=GetMessage('FOOTER_DISCOUNTEXIST')?>');
                        $('[data-remodal-id="discount-success"]').remodal().open();
                    } 

                    if (data["STATUS"] == 0) {

                        discountForm.find('input[type="submit"]').val('<?=GetMessage('FOOTER_APPLY')?>');
                        $('.remodal-discount .error').html('<?=GetMessage('FOOTER_WRONGEMAIL')?>');
                        busy = false;


                    }                            
                    if (data["STATUS"] == 1) {

                        discountForm.find('input[type="submit"]').val('<?=GetMessage('FOOTER_APPLY')?>');
                        $('[data-remodal-id="discount-success"]').remodal().open();
                    }

                    var date = new Date();
                    date.setTime(date.getTime() - 3600);
                    document.cookie = "temporarilyLockDiscountPopup=0; expires="+ date.toGMTString() + "; path=/";
                },
                error: function () {
                    discountForm.find('input[type="submit"]').val('<?=GetMessage('FOOTER_APPLY')?>');


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
    <h2 class="text-center mb20"><?=GetMessage('FOOTER_THANK')?></h2>
    <p class="text-center mb0"><?=GetMessage('FOOTER_SUBSCRIBED')?></p>
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
<script>
setInterval(function(){
  $.ajax({
    method: "POST",
    url: "/ajax/timecounter.php",
  }).done(function(data){
    data = JSON.parse(data);
  <?global $APPLICATION;?>
    if( (data.PAGE_QUANTUTY > 7 || data.TIME_ON_SITE > 120) && '<?=$APPLICATION->get_cookie("subscribe_popup_showed")?>' == '' )
    {
      // show popup
      $("#submit_popup_trigger").click();
      $.ajax({
        method: "POST",
        url: "/ajax/timecounter.php",
        data: { "ENDLOGIC" : "Y" }
      });
    }
  });
}, 5000);

$(function () {
  $("#contact_form_submitter").on("click", function(){
    var btn = $(this);

    var email = $(this).parents(".newPopup-form").find("input[name='form_email_4']").val();

    if(email.length == 0)
    {
      $(this).parents(".newPopup-form").find("input[name='form_email_4']").css("border", "1px solid red");
      return false;
    }

    if($(this).parents(".newPopup-form").find(".jq-checkbox.checked").length == 0) 
    {
      $(this).parents(".newPopup-form").find(".checkbox-title").css('color', 'red');
      return false;
    }

    $.ajax({
      method: "POST",
      url: "/ajax/mailchump_integrate.php",
      data: { fname : "fname", lname : "lname", email : email }
    }).done(function(){

      $.ajax({ method: "POST", url: "/ajax/add_subscribers.php", data: { fname : "fname", lname : "lname", email : email } });

      $(btn).parents(".newPopup-wrap").find(".newPopup-title").html("Спасибо!<br/>Ваш email успешно отправлен.");
      $(btn).parents(".newPopup-wrap").find(".newPopup-photo").css('display', 'none');
      $(btn).parents(".newPopup-wrap").find(".newPopup-form").css('display', 'none');

      setTimeout(function(){ $('.close-newPopup, .newPopup-overlay').click(); }, 2000);
    });

    return false;
  });

    $('.test').click(function () {
        $('.newPopup-wrap').fadeIn(300)
    });
    $('.close-newPopup, .newPopup-overlay').click(function () {
        $('.newPopup-wrap').fadeOut(300)
    })
});
</script>
</body>
</html>