<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Cart");
?>

<section id="content">
	<div class="container">
		
		<h1 class="h2 mb10">Cart</h1>
		
		<div class="clearfix mb20">
            <ul class="breadcrumbs">
                <li><a href="<?=SITE_DIR?>">Main</a></li>
                <li>Cart</li>
            </ul>
        </div>

<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"dantone_basket", 
	array(
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "DISCOUNT",
			2 => "PROPS",
			3 => "DELETE",
			4 => "DELAY",
			5 => "PRICE",
			6 => "QUANTITY",
			7 => "SUM",
		),
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"PATH_TO_ORDER" => "/en/personal/order/make/",
		"HIDE_COUPON" => "Y",
		"QUANTITY_FLOAT" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"TEMPLATE_THEME" => "site",
		"SET_TITLE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"OFFERS_PROPS" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"COMPONENT_TEMPLATE" => "dantone_basket",
		"USE_PREPAYMENT" => "N",
		"AUTO_CALCULATION" => "Y",
		"ACTION_VARIABLE" => "basketAction",
		"USE_GIFTS" => "N"
	),
	false
);?>

	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>