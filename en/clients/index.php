<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Клиенты | Dantone");
?>
<section id="content">
    
       
    <div class="container">
        <article class="base-article">
            <h1 class="h2">Клиенты</h1>
            <div class="divider-horisontal"></div>
            <p class="lead">Dantone Home — не просто еще один российский производитель. Он бросает вызов всем, кто считает, будто в России нельзя делать качественную и красивую мебель.</p>
            <p style="text-align: left;"><a href="http://doubletreemoscow.ru/about/hotel-information.html" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="<?=SITE_TEMPLATE_PATH?>/images/logo1.jpg" alt=""></a></p>
<p style="text-align: center;">Хилтон</p>
<p>Отель DoubleTree by Hilton Moscow – Marina: мы ценим Ваше время и комфорт! Отель расположен на главной магистрали Москвы, Ленинградском шоссе, в непосредственной близости от крупных бизнес-центров. Мы предоставляем своим гостям все возможности для комфортной организации бизнеса без больших временных затрат. Пешая доступность станции метро «Водный стадион» позволяет добраться до центра города без пересадок за 25 минут. Также гости отеля могут воспользоваться услугами наших комфортных микроавтобусов марки «Мерседес».</p>
<p class="MsoNormal"><strong><span style="font-size: 9.5pt; mso-bidi-font-size: 11.0pt; font-family: 'Arial','sans-serif'; mso-fareast-font-family: 'Times New Roman'; color: #222222; mso-fareast-language: RU;">&nbsp;</span></strong></p>
<p style="text-align: left;"><a href="http://novikovgroup.ru/restaurants/vodnyy/" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="<?=SITE_TEMPLATE_PATH?>/images/logo2.jpg" alt=""></a>&nbsp;</p>
<p style="text-align: center;">Ресторан «Vоdный»</p>
<p>Ресторан «Vоdный» расположился на берегу исторического комплекса «Водный стадион», на территории Royal Yacht Club. Здесь, в живописном месте и всего в десяти минутах езды от центра города, во время летнего сезона можно насладиться видом покачивающихся на волнах яхт или под роскошным шатром в 600 кв. м провести праздничные банкеты (до 150 человек) и фуршеты (до 300 человек). В зимний период приятно порадует утопающая в зелени утепленная веранда. «Vоdный» – столичная площадка интересных мероприятий: в ресторане устраивают концерты популярных групп, выступления модных диджеев и fashion-показы.</p>
<p class="MsoNormal">&nbsp;</p>
<p style="text-align: left;"><a href="http://www.royalyachtclub.ru" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="<?=SITE_TEMPLATE_PATH?>/images/logo3.jpg" alt=""></a></p>
<p style="text-align: center;">Royal Yacht Club</p>
<p>Royal Yacht Club – это центр яхтенной жизни Москвы, пронизанный европейским духом и объединяющий в себе современный яхтенный порт, уникальный прибрежный ресторан с пляжным комплексом, вместительные зрительские трибуны и уютный бизнес-центр с кафе.&nbsp; Роскошный отдых на воде в черте города, стоянка для судов от 6 до 40 метров, один из лучших ресторанов Аркадия Новикова, респектабельные апартаменты, полная инфраструктура и безопасность, а также высочайшие стандарты обслуживания – все это Royal Yacht Club. Royal Yacht Club расположен на территории памятника архитектуры Водный стадион «Динамо», в 10-ти минутах езды от центра Москвы и в 50-ти километрах до ближайшего шлюза в сторону области по воде.</p>        </article> 

 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.viewed.products", 
	"dantone_viewed", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"SHOW_FROM_SECTION" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_NAME" => "Y",
		"SHOW_IMAGE" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"PAGE_ELEMENT_COUNT" => "5",
		"LINE_ELEMENT_COUNT" => "3",
		"TEMPLATE_THEME" => "blue",
		"DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SHOW_OLD_PRICE" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"SHOW_PRODUCTS_5" => "Y",
		"DEPTH" => "2",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PROPERTY_CODE_2" => array(
			0 => "MANUFACTURER,MATERIAL,",
		),
		"CART_PROPERTIES_2" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_2" => "MORE_PHOTO",
		"LABEL_PROP_2" => "NEWPRODUCT",
		"PROPERTY_CODE_3" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
			3 => "",
		),
		"CART_PROPERTIES_3" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
			3 => "",
		),
		"ADDITIONAL_PICT_PROP_3" => "MORE_PHOTO",
		"OFFER_TREE_PROPS_3" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"COMPONENT_TEMPLATE" => "dantone_viewed",
		"SHOW_PRODUCTS_4" => "Y",
		"PROPERTY_CODE_4" => array(
			0 => "META_DESCRIPTION",
			1 => "ARTIKUL",
			2 => "TITLE",
			3 => "MORE_PHOTO",
			4 => "KEYWORDS",
			5 => "BESTSELLER",
			6 => "MAXIMUM_PRICE",
			7 => "MINIMUM_PRICE",
			8 => "NEWPRODUCT",
			9 => "PREORDER",
			10 => "DISCOUNT",
			11 => "SPECIAL_OFFER",
			12 => "FEATURES",
			13 => "PRICE_FROM",
			14 => "",
		),
		"CART_PROPERTIES_4" => array(
			0 => "",
			1 => "DISCOUNT",
			2 => "SPECIAL_OFFER",
			3 => "PRICE_FROM",
			4 => "",
		),
		"ADDITIONAL_PICT_PROP_4" => "MORE_PHOTO",
		"LABEL_PROP_4" => "-",
		"PROPERTY_CODE_5" => array(
			0 => "ARTIKUL",
			1 => "MORE_PHOTO",
			2 => "CML2_LINK",
			3 => "",
		),
		"CART_PROPERTIES_5" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_5" => "MORE_PHOTO",
		"OFFER_TREE_PROPS_5" => array(
		),
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_ELEMENT_ID" => "",
		"SECTION_ELEMENT_CODE" => "",
		"SHOW_PRODUCTS_2" => "N"
	),
	false
);?>

 </div> <!-- /end .container -->

</section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>