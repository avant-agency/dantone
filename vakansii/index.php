<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии | Dantone");
?>
<section id="content">
    
        <div class="promo-about" style='background: url("<?=SITE_TEMPLATE_PATH?>/images/ART-6151.jpg") 50% 50% no-repeat; background-size: cover;'></div>

    <div class="container">
        <article class="about full-size base-article">
            <h1 class="h2">Вакансии</h1>
            <div class="divider-horisontal"></div>
            <p class="lead text-left">
               
               Мы стремимся быть современным и открытым работодателем с демократичным стилем управления. Каждый найдет здесь именно то, что он ждет от работы: карьерный рост, личностное развитие и возможность воплощать свои идеи!           
            </p>
       
            <p>Присылайте Ваше резюме и вопросы на почту: info@dantonehome.ru и мы обязательно с Вами свяжемся! Начни работать в том месте, где сможешь профессионально расти и при этом оставаться собой!<br/><br/>

Dantone Home. Нет ничего невозможного.<br/>
Dantone Home. У тебя есть вкус.</p>
            
                   </article>
                   
                   
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