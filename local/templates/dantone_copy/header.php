﻿﻿<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeModuleLangFile(__FILE__);
include 'ajax.php';
if(isset($_REQUEST["logout"]) && $_REQUEST["logout"] == "Y" ) {
  $USER->Logout();
}
if($APPLICATION->GetCurPage(true)==SITE_DIR.'index.php')define('INDEX', true);
CJSCore::Init(array('translit'));
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <?$APPLICATION->ShowHead();?>
    <?$APPLICATION->ShowHeadStrings();?>
    <?$APPLICATION->ShowHeadScripts();?>
    <?CJSCore::Init(array("fx"));?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="KrwMwRLASso_EU0U_X82S2AyqLyXiOATOyJT5sKM5As" />

    <title><?$APPLICATION->ShowTitle()?></title>

    <link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon2x.png">
    <script type="text/javascript">var SITE_DIR = '<?=SITE_DIR?>';</script>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/animate.css" />
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css" />
    
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/subscribe-popup.css" />

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?/*<script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>*/?>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.cookie.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedInput.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/owl.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/plugins.js"></script>
     <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/script.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.elevateZoom-3.0.8.min.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?if($_SERVER["SERVER_NAME"] != "new.dantone.bitter.moscow"):?>
    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type="text/javascript">

        (function (w, d) {
            w.amo_jivosite_id = 'g3V82X3iQq';
            var s = document.createElement('script'), f = d.getElementsByTagName('script')[0];
            s.id = 'amo_jivosite_js';
            s.type = 'text/javascript';
            s.async = true;
            s.src = 'https://forms.amocrm.ru/chats/jivosite/jivosite.js';
            f.parentNode.insertBefore(s, f);
        })(window, document);
    </script>
    <!-- {/literal} END JIVOSITE CODE -->
    <?endif;?>

<script type="text/javascript">
    $(function() {
       $('.phone-input').mask("+7(999)999-99-99");
    });
</script>
<?if($_SERVER["SERVER_NAME"] != "new.dantone.bitter.moscow"):?>
<script src="https://analytics.alloka.ru/v4/alloka.js" type="text/javascript"></script>
<!-- FACEBOOK -->
  <meta property="og:url"           content="http://dantonehome.ru" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Мебель и аксессуары Dantone" />
  <meta property="og:description"   content="Компания Dantone Home предлагает Вам мебель и аксессуары в американском и бельгийском стилях" />
  <meta property="og:image"         content="http://dantonehome.ru/upload/iblock/1a0/1a05c93d75065eec4b2f68941a78a2e9.jpg" /><!-- calltouch code -->
<script type="text/javascript">
(function (w, d, nv, ls, yac){
    var lwait = function (w, on, trf, dly, ma, orf, osf) { var pfx = "ct_await_", sfx = "_completed";  if(!w[pfx + on + sfx]) { var ci = clearInterval, si = setInterval, st = setTimeout , cmld = function () { if (!w[pfx + on + sfx]) {  w[pfx + on + sfx] = true; if ((w[pfx + on] && (w[pfx + on].timer))) { ci(w[pfx + on].timer);  w[pfx + on] = null;   }  orf(w[on]);  } };if (!w[on] || !osf) { if (trf(w[on])) { cmld();  } else { if (!w[pfx + on]) { w[pfx + on] = {  timer: si(function () { if (trf(w[on]) || ma < ++w[pfx + on].attempt) { cmld(); } }, dly), attempt: 0 }; } } }   else { if (trf(w[on])) { cmld();  } else { osf(cmld); st(function () { lwait(w, on, trf, dly, ma, orf); }, 0); } }}};
    var ct = function (w, d, e, c, n){ var a = 'all', b = 'tou', src = b + 'c' + 'h';  src = 'm' + 'o' + 'd.c' + a + src; var jsHost = "https://" + src, s = [{"sp":"1","sc":d.createElement(e)}, {"sp":"2","sc":d.createElement(e)}, {"sp":"3","sc":d.createElement(e)}]; var jsf = function (w, d, s, h, c, n, yc) { if (yc !== null) { lwait(w, 'yaCounter'+yc, function(obj) { return (obj && obj.getClientID ? true : false); }, 50, 100, function(yaCounter) { s.forEach(function(el) { el.sc.async = 1; el.sc.src = jsHost + "." + "r" + "u/d_client.js?param;specific_id"+el.sp+";" + (yaCounter  && yaCounter.getClientID ? "ya_client_id" + yaCounter.getClientID() + ";" : "") + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":171110}") + ";"; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(el.sc, p); }); }, function (f) { if(w.jQuery) { w.jQuery(d).on('yacounter' + yc + 'inited', f ); }}); } else { s.forEach(function(el) { el.sc.async = 1; el.sc.src = jsHost + "." + "r" + "u/d_client.js?param;specific_id"+el.sp+";" + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":171110}") + ";"; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(el.sc, p); }); } };if (!w.jQuery) { var jq = d.createElement(e); jq.src = jsHost + "." + "r" + 'u/js/jquery-1.7.min.js'; jq.onload = function () { lwait(w, 'jQuery', function(obj) { return (obj ? true : false); }, 30, 100, function () { jsf(w, d, s, jsHost, c, n, yac);  }); }; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(jq, p); } else { jsf(w, d, s, jsHost, c, n, yac); } };
    var gaid = function (w, d, o, ct, n) { if (!!o) { lwait(w, o, function (obj) {  return (obj && obj.getAll ? true : false); }, 200, (nv.userAgent.match(/Opera|OPR\//) ? 10 : 20), function (gaCounter) { var clId = null; try {  var cnt = gaCounter && gaCounter.getAll ? gaCounter.getAll() : null; clId = cnt && cnt.length > 0 && !!cnt[0] && cnt[0].get ? cnt[0].get('clientId') : null; } catch (e) { console.warn("Unable to get clientId, Error: " + e.message); } ct(w, d, 'script', clId, n); }, function (f) { w[o](function () {  f(w[o]); })});} else{ ct(w, d, 'script', null, n); }};
    var cid  = function () { try { var m1 = d.cookie.match('(?:^|;)\\s*_ga=([^;]*)');if (!(m1 && m1.length > 1)) return null; var m2 = decodeURIComponent(m1[1]).match(/(\d+\.\d+)$/); if (!(m2 && m2.length > 1)) return null; return m2[1]} catch (err) {}}();
    if (cid === null && !!w.GoogleAnalyticsObject){
        if (w.GoogleAnalyticsObject=='ga_ckpr') w.ct_ga='ga'; else w.ct_ga = w.GoogleAnalyticsObject;
        if (typeof Promise !== "undefined" && Promise.toString().indexOf("[native code]") !== -1){new Promise(function (resolve) {var db, on = function () {  resolve(true)  }, off = function () {  resolve(false)}, tryls = function tryls() { try { ls && ls.length ? off() : (ls.x = 1, ls.removeItem("x"), off());} catch (e) { nv.cookieEnabled ? on() : off(); }};w.webkitRequestFileSystem ? webkitRequestFileSystem(0, 0, off, on) : "MozAppearance" in d.documentElement.style ? (db = indexedDB.open("test"), db.onerror = on, db.onsuccess = off) : /constructor/i.test(w.HTMLElement) ? tryls() : !w.indexedDB && (w.PointerEvent || w.MSPointerEvent) ? on() : off();}).then(function (pm){
            if (pm){gaid(w, d, w.ct_ga, ct, 2);}else{gaid(w, d, w.ct_ga, ct, 3);}})}else{gaid(w, d, w.ct_ga, ct, 4);}
    }else{ct(w, d, 'script', cid, 1);}})
(window, document, navigator, localStorage, "32121695");
</script>
<!-- /calltouch code -->
<?endif;?>
</head>

<body class="<?=LANGUAGE_ID?>-version <?=defined('INDEX')?'index-page':'';?> lk-body">
<?if($_SERVER["SERVER_NAME"] != "new.dantone.bitter.moscow"):?>
<? 
    $criteoHomePageTags = array(SITE_DIR."index.php", SITE_DIR."about/index.php",SITE_DIR."projects/index.php", SITE_DIR."press/index.php",SITE_DIR."contacts/index.php");

    if (in_array($_SERVER['SCRIPT_NAME'],$criteoHomePageTags)):?>
    
    <script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
    <script>
    window.criteo_q = window.criteo_q || [];
    var deviceType = /iPad/.test(navigator.userAgent)?"t":/webOS|Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Silk/.test(navigator.userAgent)?"m":"d";
    window.criteo_q.push(
        { event: "setAccount", account: 45351 },
        { event: "setEmail", email: "<?=$USER->GetEmail();?>" },
        { event: "setSiteType", type: deviceType },
        { event: "viewHome", ecpplugin: "1cbitrix" });
    </script>
    
    <?endif?>
<script> 
    window.dataLayer = window.dataLayer || [];
</script>
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1074463552690535');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1"
    src="https://www.facebook.com/tr?id=1074463552690535&ev=PageView
    &noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<?endif?>
    <?=$APPLICATION->ShowPanel()?>
    <?$APPLICATION->ShowViewContent('google_aim_sale_order_ajax_ready');?>
    <?if($_SERVER["SERVER_NAME"] != "new.dantone.bitter.moscow"):?>
    <!-- Google Tag Manager -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-5PZJHN"
        height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5PZJHN');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Yandex.Metrika -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter32121695 = new Ya.Metrika({
                        id:32121695,
                        clickmap:true,
                        trackLinks:true,
                        trackHash:true,
                        accurateTrackBounce:true,
                        webvisor:false,
                        ecommerce:"dataLayer"
                    });
                    w.yaCounter34931375 = new Ya.Metrika({
                        id: 34931375,
                        clickmap:true,
                        trackLinks:true,
                        trackHash:true,
                        accurateTrackBounce:true,
                        webvisor:false,
       triggerEvent:true,                 ecommerce:"dataLayer"
                    });
                } catch(e) { }
            });
    
            var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";
    
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div>
            <img src="https://mc.yandex.ru/watch/32121695" style="position:absolute; left:-9999px;" alt="" />
            <img src="https://mc.yandex.ru/watch/34931375" style="position:absolute; left:-9999px;" alt="" />
        </div>
    </noscript>
    <!-- End Yandex.Metrika -->
    <?endif;?>
<div class="wrapper remodal-bg">

    <header id="header" <?= $APPLICATION->GetCurPage() == SITE_DIR ? '' : 'class="1header-light inner-header"' ?>>
        <div class="header-dark-line">
            <div class="container">
                <div class="callback-lnk"><a href="#callback" style="display:inline-block;"><?=GetMessage('HEADER_REQCALLBACK')?></a>
                    <a href="#callback" class="additional-phone" style="display:none;">+7 (495) 108-32-19</a></div>
                    <div class="product-cart" id="cartInHeaderWrapper">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/basket.php",
                                "EDIT_TEMPLATE" => ""
                                )
                            );?>
                     </div>
                <?php if ($USER->isAuthorized()) { ?>
                    <div class="login-lnk"><a href="<?$APPLICATION->GetCurPage()?>.?logout=Y"><?=GetMessage('HEADER_LOGOUT')?></a></div>
                    <div class="reg-lnk"><a href="<?=SITE_DIR?>personal/profile/"><?= $USER->GetFullName() ?></a></div>
                <?php } else { ?>
                    <div class="login-lnk"><a href="#login"><?=GetMessage('HEADER_AUTH')?></a></div>
                    <div class="reg-lnk"><a href="<?=SITE_DIR?>auth/?register=yes"><?=GetMessage('HEADER_REGISTER')?></a></div>
                <?php } ?>
            </div>
        </div>
        <div class="header-main-contant ">
            <div class='container'>
                <div class='phone-desctop'>
                    <div class="phone">
                        <i class="icon-phone" style='position: relative; top: 12px; transform: scale(1.2)'></i>
                        <span class="kupislova" data-phone='+74957270217' style='font-size: 18px'>+7 (495) 727 02 17</span> <br>
                        <span style='font-size: 16px; display: inline-block; float: right;'> <a target="_blank" style='font-size:13px;' href='https://yandex.ru/maps/213/moscow/?source=wizbiz_new_map_single&z=14&ll=37.559634%2C55.758517&mode=search&text=dantone&sll=37.559634%2C55.758517&sspn=0.070896%2C0.024441&sctx=CAAAAAEAa9WuCWnPQkD%2FPuPCgeBLQJP8iF%2BxhuQ%2Faw2l9iLa3T8CAAAAAQIBAAAAAAAAAAFZNXutBeFby9UAAAABAACAPwAAAAAAAAAA&ol=biz&oid=1736135840'>
                        <?=GetMessage('HEADER_SHOWROOM')?></a></span> <br>
                        <a href="#callback" class="btn smart-visible"><?=GetMessage('HEADER_CALLBACK')?></a>
                    </div>
                    <p style="font-size: 16px; float: right; margin-top: 41px">
                        <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/schedule.php",
                            "EDIT_TEMPLATE" => ""
                            )
                        );?>
                    </p>
                </div>
                <div id="logo"><a href="<?=SITE_DIR?>" title="Dantone Home"></a></div>
            </div>
        </div>
        <div class="nav-container">
            <div class="mb-nav-icons">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/basket.php",
                            "EDIT_TEMPLATE" => ""
                            )
                    );?>
            </div>
            <div class="container">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
                    "ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
                    "MAX_LEVEL" => "1", // Уровень вложенности меню
                    "CHILD_MENU_TYPE" => "top", // Тип меню для остальных уровней
                    "USE_EXT" => "Y",   // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "DELAY" => "N", // Откладывать выполнение шаблона меню
                    "LANGUAGE_ID" => LANGUAGE_ID,   // Откладывать выполнение шаблона меню
                    "ALLOW_MULTI_SELECT" => "Y",    // Разрешить несколько активных пунктов одновременно
                    "MENU_CACHE_TYPE" => "N",   // Тип кеширования
                    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                    "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                   ), false
                );?>
                <div class="search-container">
                    <div class="">
                        <form class="search-form hide" action="<?=SITE_DIR?>search/" style="" >
                            <input name="q" type="text" required="required" value="" style="border:none;" />
                            <input type="submit" value="" class="searhc-btn" />
                        </form>
                        <a class="show-search a-show-search"></a>
                    </div>
                </div>
            </div>
            <?/*
            <div class="user-nav">
                <!--<div class="callback-lnk"><a href="#callback">Заказать обратный звонок</a></div>-->
                <div class="reg-lnk"><a href="<?=SITE_DIR?>personal/cart"><?=GetMessage('HEADER_CART')?></a></div>
                <?if(!$USER->IsAuthorized()):?><div class="login-lnk"><a href="#login"><?=GetMessage('HEADER_AUTH')?></a></div><?endif?>
            </div>
            */?>
        </div>
        <a class="a-show-menu show-menu"><span></span><span></span><span></span></a>
        <a class="a-show-menu hide-menu"></a>
    </header>
    