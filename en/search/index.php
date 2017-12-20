<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Search");
?>

<section id="section">
	<div class="container"> 
		
		<h1 class="h2 text-left h2-profile mb10">Search</h1>
		<div class="clearfix mb20">
            <ul class="breadcrumbs text-left fleft">
                <li><a href="/">Main</a></li>
                <li>Search</li>
            </ul>

            
<div class="fright sort-container">
				<?if(isset($_REQUEST["sortField"])) {
					$sort = $_REQUEST["sortField"];
				}?>
			    <select id="sort" style="position: absolute; left: -9999px;">
			        <option value="">Sort</option>
			        <option value="hit" <?= ($sort == "hit") ? 'selected="selected"' : ''?>>By popular</option>
			        <option value="price" <?= ($sort == "price") ? 'selected="selected"' : ''?>>By price</option>
			        <option value="discount" <?= ($sort == "discount") ? 'selected="selected"' : ''?>>With discount</option>
			    </select>			    
			</div>
			
			<script>
				$(function() {
					$('#sort').on('change', function() {
						var val = $(this).val();
						
						location.href = "<?=$APPLICATION->GetCurUri()?>" + "&sortField=" + val
						
					});
				});
			</script>
        </div>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.search", 
	"catalog_search", 
	array(
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"SECTION_URL" => "/en/catalog/#SECTION_CODE_PATH#/",
		"DETAIL_URL" => "/en/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		"BASKET_URL" => "/en/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"DISPLAY_COMPARE" => "Y",
		"PAGE_ELEMENT_COUNT" => "100",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "BESTSELLER",
			1 => "MAXIMUM_PRICE",
			2 => "MINIMUM_PRICE",
			3 => "NEWPRODUCT",
			4 => "DISCOUNT",
			5 => "SPECIAL_OFFER",
			6 => "PRICE_FROM",
			7 => "",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "ARTIKUL",
			1 => "CML2_LINK",
			2 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_LIMIT" => "5",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		'LANGUAGE_ID'=>LANGUAGE_ID,
		"USE_PRICE_COUNT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"USE_PRODUCT_QUANTITY" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"RESTART" => "Y",
		"NO_WORD_LOGIC" => "Y",
		"USE_LANGUAGE_GUESS" => "N",
		"CHECK_DATES" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "ARTIKUL",
			1 => "CML2_LINK",
		),
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"COMPONENT_TEMPLATE" => "catalog_search",
		"AJAX_OPTION_ADDITIONAL" => "undefined"
	),
	false
);?>

	</div>
</section>

<!--<?$APPLICATION->IncludeComponent("bitrix:search.page", "clear", array(
	"RESTART" => "N",
	"CHECK_DATES" => "N",
	"USE_TITLE_RANK" => "N",
	"DEFAULT_SORT" => "rank",
	"arrFILTER" => array(
		0 => "main",
		1 => "iblock_services",
		2 => "iblock_news",
		3 => "iblock_catalog",
	),
	"arrFILTER_main" => array(
	),
	"arrFILTER_iblock_services" => array(
		0 => "all",
	),
	"arrFILTER_iblock_news" => array(
		0 => "all",
	),
	"arrFILTER_iblock_catalog" => array(
		0 => "all",
	),
	"SHOW_WHERE" => "N",
	"SHOW_WHEN" => "N",
	"PAGE_RESULT_COUNT" => "25",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_SHADOW" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Результаты поиска",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "arrows",
	"USE_SUGGEST" => "N",
	"SHOW_ITEM_TAGS" => "N",
	"SHOW_ITEM_DATE_CHANGE" => "N",
	"SHOW_ORDER_BY" => "N",
	"SHOW_TAGS_CLOUD" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>