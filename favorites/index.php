<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Избранные товары");
?>

<section id="content">
	<div class="container">
		<div class="clearfix">
			<script>
				function basket(action, productID) {
					if(productID) {
						var url = "/include/basket.php";
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
			</script>
	
			<h1 class="h2 text-left h2-profile mb10">Избранные товары</h1>
	
			<div class="clearfix mb20">
				<ul class="breadcrumbs text-left fleft">
					<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
						<a href="/catalog/" title="Каталог" itemprop="url">Каталог
						</a>
					</li>
					<li>
						Избранные товары
					</li><div style="clear:both"></div>
				</ul>

				<div class="fright sort-container">
					<select id="sort" style="position: absolute; left: -9999px;">
						<option value="">Сортировать</option>
						<option value="hit" >По популярности</option>
						<option value="price" >По цене</option>
						<option value="discount" >Со скидкой</option>
					</select>
				</div>
	
				<script>
					$(function() {
						$('#sort').on('change', function() {
							var val = $(this).val();
							location.href = "?sortField=" + val
						});
						switch('<?=$_REQUEST["sortField"]?>'){
							case "hit": $("#sort-styler").find(".jq-selectbox__select-text").text("По популярности"); break;
							case "price": $("#sort-styler").find(".jq-selectbox__select-text").text("По цене"); break;
							case "discount": $("#sort-styler").find(".jq-selectbox__select-text").text("Со скидкой"); break;
							default: $("#sort-styler").find(".jq-selectbox__select-text").text("Сортировка"); break;
						}
					});
				</script>
			</div>
		</div>
	<?
	global $APPLICATION;
	$arResult["FAVORITES"] = $APPLICATION->get_cookie("FAVORITES_PRODUCTS");
	$arResult["FAVORITES"] = array_unique(array_filter(explode(",", $arResult["FAVORITES"]), function($value) { return $value !== ''; }));

	if(count($arResult["FAVORITES"]) == 0)
	{?>
		<p>Вами еще не были выбраны товары для раздела Избранное. Сделать это Вы можете на странице <a href="/catalog/">каталога</a>.</p>
	<?}
	else
	{
		global $arrFilter;
		$arrFilter = array("ID" => $arResult["FAVORITES"]);
		$sort = "shows";
		switch($_REQUEST["sortField"])
		{
			case "hit": 
				$sort = "shows"; 
			break;
			case "price": 
				$sort = "price"; 
				break;
			case "discount": 
				$arrFilter["PROPERTY_DISCOUNT"] = 20;
				$sort = "discount"; 
			break;
			default: 
				$sort = "shows";
		}
		$intSectionID = $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"favorites", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"PROPERTY_CODE" => array(
			0 => "VES",
			1 => "VYSOTA",
			2 => "GLUBINA",
			3 => "DLINA",
			4 => "KOLICHESTVO_LAMPOCHEK",
			5 => "LAMPY_V_KOMPLEKTE",
			6 => "MAKSIMALNAYA_MOSHCHNOST",
			7 => "MATERIAL",
			8 => "MATERIALY",
			9 => "RAZMER",
			10 => "RAZMERY",
			11 => "SOSTAV_IZDELIYA",
			12 => "SOSTAV_TKANI",
			13 => "SROK_IZGOTOVLENIYA",
			14 => "STRANA_PROIZVODSTVA",
			15 => "TIP_TSOKOLYA",
			16 => "TSVET",
			17 => "SHIIRNA",
			18 => "SHIRINA",
			19 => "INSTOCK",
			20 => "META_DESCRIPTION",
			21 => "WOW",
			22 => "ARTIKUL",
			23 => "TITLE",
			24 => "KEYWORDS",
			25 => "BESTSELLER",
			26 => "MAXIMUM_PRICE",
			27 => "MINIMUM_PRICE",
			28 => "NEWPRODUCT",
			29 => "PREORDER",
			30 => "RECOMMEND",
			31 => "DISCOUNT",
			32 => "SPECIAL_OFFER",
			33 => "FEATURES",
			34 => "PRICE_FROM",
			35 => "gomerch",
			36 => "ENG_NAME",
			37 => "ENG_DETAIL_TEXT",
			38 => "ENG_FEATURES",
			39 => $arParams["LIST_PROPERTY_CODE"],
			40 => "",
		),
		"META_KEYWORDS" => "",
		"META_DESCRIPTION" => "",
		"BROWSER_TITLE" => "-",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => "",
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"FILTER_NAME" => "arrFilter",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "N",
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"FILE_404" => $arParams["FILE_404"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"PAGE_ELEMENT_COUNT" => "100000",
		"LINE_ELEMENT_COUNT" => "10000",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"LANGUAGE_ID" => LANGUAGE_ID,
		"PRICE_VAT_INCLUDE" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "UF_*",
			2 => "",
		),
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"OFFERS_CART_PROPERTIES" => array(
			0 => $arParams["OFFERS_CART_PROPERTIES"],
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => $arParams["LIST_OFFERS_FIELD_CODE"],
			28 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "ARTIKUL",
			1 => "MORE_PHOTO",
			2 => $arParams["LIST_OFFERS_PROPERTY_CODE"],
			3 => "",
		),
		"OFFERS_SORT_FIELD" => "shows",
		"OFFERS_SORT_ORDER" => "desc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "asc",
		"OFFERS_LIMIT" => "0",
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => "L",
		"LABEL_PROP" => "-",
		"ADD_PICT_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => "N",
		"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
		"OFFER_TREE_PROPS" => $arParams["OFFER_TREE_PROPS"],
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"MESS_BTN_BUY" => "В корзину",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"TEMPLATE_THEME" => "",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"SHOW_CLOSE_POPUP" => "N",
		"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
		"BACKGROUND_IMAGE" => (isset($arParams["SECTION_BACKGROUND_IMAGE"])?$arParams["SECTION_BACKGROUND_IMAGE"]:""),
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"COMPONENT_TEMPLATE" => "favorites",
		"SHOW_ALL_WO_SECTION" => "Y",
		"MESS_BTN_COMPARE" => "Сравнить",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y"
	),
	$component
);
	}
	?>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>