<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("For Dealers | Dantone");
?>
<section id="content">
    
        <div class="promo-about" style='background: url("<?=SITE_TEMPLATE_PATH?>/images/ART-6162.jpg") 50% 50% no-repeat; background-size: cover;'></div>

    <div class="container">
        <article class="base-article">
            <h1 class="h2">For Dealers</h1>
            <div class="divider-horisontal"></div>
 <p class="lead">We specialize in the production of upholstered and carcass furniture under Dantone Home brand name.
</p>
<p>Dantone Home was created in 2015. We specialize in upholstered and carcass furniture manufacture, as well as the sale of furniture, accessories and lighting fixtures from China and Indonesia under our brand name.
</p>
<p>We offer dealership in the Russian Federation regions in the following form: a separate showroom from 150 to 200 square meters, designed in keeping with the Dantone Home requirements.
</p>
<p>Dantone Home showroom can be opened in the city with a 500 000 or more population. The territory covered by the dealer is recognized as the city in its administrative boundaries, as well as the region under a separate agreement.
</p>
<p>Upon signing the dealership agreement the Dealer assumes the exclusive dealership rights as follows:
</p>
<ul>
<li>the opening of the showroom under the Dantone Home trademark at the location specified by the agreement;</li>
<li>exclusive sales rights of brand products within the specified Territory;</li>
<li>publishing of the information about the showroom and its contact details on www.dantonehome.ru  website;</li>
</ul>
<p>Services provided at the initial stage of cooperation:
</p>
<ul>
<li>Creating an individual design project for the showroom;</li>
<li>Drafting an individual showroom product range based on the mandatory assortment list of products;</li>
<li>Providing training information for the showroom staff;</li>
<li>Initial training of two showroom staff members in the form of internship in the flagship Dantone Home showroom in Moscow (travel and accommodation expenses covered by the dealer);</li>
<li>Providing the starter kit of promotional materials, fabric samples, and Dantone Home quality certificates.</li>
</ul>

<p>In the course of day-to-day operations we also provide:</p>

<ul>
<li>Information about new arrivals;</li>
<li>Advertising support (references to the dealer showroom during all Dantone Home promotional campaigns);</li>
<li>Ensuring uninterrupted supply of brand products;</li>
<li>Keeping in force the exclusive dealer rights;</li>
<li>Providing consultations and new staff training.</li>
</ul>
<br>
<br>
<h2 style="text-align: center;">For Suppliers</h2>
<div class="divider-horisontal" style="box-sizing: border-box; width: 40px; height: 1px; margin: 0px auto 22px; color: #333333; font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 26px; background: #516c9b;">&nbsp;</div>

 
<p>Dantone Home is open to new collaborations!<br>
If you are a manufacturer of American style furniture and accessories, if you produce or supply upholstery fabrics or accessories, or if you are a furniture designer and would like to offer us a model that would fit perfectly in our collection, please contact us at: info@dantonehome.ru and we will get back to you!
</p>
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