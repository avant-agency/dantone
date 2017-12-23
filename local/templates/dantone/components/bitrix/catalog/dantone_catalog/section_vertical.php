<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader,
Bitrix\Main\ModuleManager;
IncludeModuleLangFile(__FILE__);
if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
	$basketAction = (isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '');
else
	$basketAction = (isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '');

$intSectionID = 0;

global $arrFilter;

$priceFrom = (isset($_REQUEST["priceFrom"]) && !empty($_REQUEST["priceFrom"])) ? intVal(trim($_REQUEST["priceFrom"])) : 0;
$priceTo = (isset($_REQUEST["priceTo"]) && !empty($_REQUEST["priceTo"])) ? intVal(trim($_REQUEST["priceTo"])) : 1000000000;

if(!is_null($priceFrom) || !is_null($priceTo)) {
	$arrFilter = Array(
		"><CATALOG_PRICE_1" => Array(
			0 => $priceFrom,
			1 => $priceTo
			)
		); 
}

if(isset($_REQUEST["sortField"])) {

	switch($_REQUEST["sortField"]) {

		case "price":
		$arParams["ELEMENT_SORT_FIELD"] = "property_MINIMUM_PRICE";
		$arParams["ELEMENT_SORT_ORDER"] = "ASC";
		break;

		case "discount":
		$arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_DISCOUNT";
		$arParams["ELEMENT_SORT_ORDER"] = "DESC";
		break; 

		case "hit":
		$arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_BESTSELLER";
		$arParams["ELEMENT_SORT_ORDER"] = "DESC";
		break;   


	}

}    







?>



<div class="clearfix">


	<?$intSectionID = $APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
			"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
			"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
			"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
			"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
			"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
			"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"SET_TITLE" => $arParams["SET_TITLE"],
			"MESSAGE_404" => $arParams["MESSAGE_404"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"SHOW_404" => $arParams["SHOW_404"],
			"FILE_404" => $arParams["FILE_404"],
			"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
			"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
			"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"LANGUAGE_ID" => LANGUAGE_ID,

			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
			"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
			"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
			'SECTION_USER_FIELDS'=>array('UF_*'),
			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
			"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFERS_LIMIT" => 1,

			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
			"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
			'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
			'CURRENCY_ID' => $arParams['CURRENCY_ID'],
			'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

			'LABEL_PROP' => $arParams['LABEL_PROP'],
			'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
			'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

			'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
			'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
			'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
			'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
			'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
			'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
			'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
			'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

			'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
			"ADD_SECTIONS_CHAIN" => "Y",
			'ADD_TO_BASKET_ACTION' => $basketAction,
			'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
			'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
			'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
			'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
			),
$component
);?>

<?
$GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;
unset($basketAction);

?>


<aside role="complementary" class="catalog-nav-container">
<!--<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sidebar_menu", Array(
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
"LANGUAGE_ID" => LANGUAGE_ID,

"CACHE_TYPE" => "A",	// Тип кеширования
"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
"CACHE_NOTES" => "",
"CACHE_GROUPS" => "Y",	// Учитывать права доступа
),
false
);?>-->


<?$APPLICATION->IncludeComponent("bitrix:menu", "sections_menu", Array(
"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
"MAX_LEVEL" => "2",	// Уровень вложенности меню
"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
"DELAY" => "N",	// Откладывать выполнение шаблона меню
"ALLOW_MULTI_SELECT" => "Y",	// Разрешить несколько активных пунктов одновременно
"MENU_CACHE_TYPE" => "N",	// Тип кеширования
"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
),
false
);?>

<div class="filter">

	<form method="get" id="priceForm">
		<h4><?=GetMessage('SECTION_PRICE')?></h4>

		<div class="control-group">

			<input class="input-text input-small" placeholder="<?=GetMessage('SECTION_FROM')?>" title="<?=GetMessage('SECTION_FROM')?>" type="text" name="priceFrom" value="<?= (isset($_REQUEST["priceFrom"])) ? $_REQUEST["priceFrom"] : ""?>">
			<input class="input-text input-small" placeholder="<?=GetMessage('SECTION_TO')?>" title="<?=GetMessage('SECTION_TO')?>" type="text" name="priceTo" value="<?=(isset($_REQUEST["priceTo"])) ? $_REQUEST["priceTo"] : ""?>">
			<input class="btn btn-blue btn-small" value="ОК" type="submit">

		</div>
		<ul class="base-nav" id="fixedPriceList">
			<li><a href="?priceTo=10000" data-priceto="10000"><?=GetMessage('SECTION_TO')?> 10 000</a></li>
			<li><a href="?priceFrom=10000&priceTo=50000" data-pricefrom="10000" data-priceto="50000"><?=GetMessage('SECTION_FROM')?> 10 000 <?=GetMessage('SECTION_TO')?> 50 000</a></li>
			<li><a href="?priceFrom=50000" data-pricefrom="50000"><?=GetMessage('SECTION_FROM')?> 50 000 <?=GetMessage('SECTION_MORE')?></a></li>
		</ul>
	</form>
</div>
</aside>


</div>
<?if(defined('RECOMMEND_FILTER'))include 'hit.php';?>
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
		"DETAIL_URL" => SITE_DIR."catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#",
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
		"BASKET_URL" => SITE_DIR."personal/basket.php",
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

