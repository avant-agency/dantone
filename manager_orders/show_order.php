<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Толик");
?>
<section id="content">
	<div class="container">
<?
	if(isset($_REQUEST['ELEMENT_ID'])){
		$elementId = $_REQUEST['ELEMENT_ID'];

		$res = CIBlockElement::GetByID($elementId);
		if($ar_res = $res->Fetch()){
			CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
			$ar_res = json_decode($ar_res['PREVIEW_TEXT'],true);
			foreach($ar_res as $el){
				Add2BasketByProductID($el['PRODUCT_ID'], $el['QUANTITY']);
			}
		}
	}

?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:sale.basket.basket",
			"user_basket",
			Array(
				"ACTION_VARIABLE" => "basketAction",
				"AUTO_CALCULATION" => "Y",
				"COLUMNS_LIST" => array("NAME","DISCOUNT","WEIGHT","DELETE","DELAY","TYPE","PRICE","QUANTITY"),
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"CORRECT_RATIO" => "N",
				"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
				"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
				"GIFTS_CONVERT_CURRENCY" => "N",
				"GIFTS_HIDE_BLOCK_TITLE" => "N",
				"GIFTS_HIDE_NOT_AVAILABLE" => "N",
				"GIFTS_MESS_BTN_BUY" => "Выбрать",
				"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
				"GIFTS_PAGE_ELEMENT_COUNT" => "4",
				"GIFTS_PLACE" => "BOTTOM",
				"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
				"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "",
				"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
				"GIFTS_SHOW_IMAGE" => "Y",
				"GIFTS_SHOW_NAME" => "Y",
				"GIFTS_SHOW_OLD_PRICE" => "N",
				"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
				"HIDE_COUPON" => "N",
				"OFFERS_PROPS" => array(),
				"PATH_TO_ORDER" => "/personal/order.php",
				"PRICE_VAT_SHOW_VALUE" => "N",
				"QUANTITY_FLOAT" => "N",
				"SET_TITLE" => "Y",
				"TEMPLATE_THEME" => "blue",
				"USE_GIFTS" => "Y",
				"USE_PREPAYMENT" => "N"
			)
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:sale.order.ajax",
			"user_order",
			Array(
				"ADDITIONAL_PICT_PROP_11" => "-",
				"ADDITIONAL_PICT_PROP_12" => "-",
				"ADDITIONAL_PICT_PROP_3" => "-",
				"ADDITIONAL_PICT_PROP_4" => "-",
				"ADDITIONAL_PICT_PROP_5" => "-",
				"ALLOW_AUTO_REGISTER" => "N",
				"ALLOW_NEW_PROFILE" => "N",
				"ALLOW_USER_PROFILES" => "N",
				"BASKET_IMAGES_SCALING" => "standard",
				"BASKET_POSITION" => "after",
				"COMPATIBLE_MODE" => "Y",
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"DELIVERIES_PER_PAGE" => "8",
				"DELIVERY_FADE_EXTRA_SERVICES" => "N",
				"DELIVERY_NO_AJAX" => "N",
				"DELIVERY_NO_SESSION" => "Y",
				"DELIVERY_TO_PAYSYSTEM" => "d2p",
				"DISABLE_BASKET_REDIRECT" => "N",
				"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
				"PATH_TO_AUTH" => "/auth/",
				//"PATH_TO_BASKET" => "basket.php",
				"PATH_TO_PAYMENT" => "payment.php",
				"PATH_TO_PERSONAL" => "index.php",
				"PAY_FROM_ACCOUNT" => "N",
				"PAY_SYSTEMS_PER_PAGE" => "8",
				"PICKUPS_PER_PAGE" => "5",
				"PRODUCT_COLUMNS_HIDDEN" => array(),
				"PRODUCT_COLUMNS_VISIBLE" => array("PREVIEW_PICTURE","PROPS"),
				"PROPS_FADE_LIST_1" => array(),
				"SEND_NEW_USER_NOTIFY" => "Y",
				"SERVICES_IMAGES_SCALING" => "standard",
				"SET_TITLE" => "Y",
				"SHOW_BASKET_HEADERS" => "N",
				"SHOW_COUPONS_BASKET" => "Y",
				"SHOW_COUPONS_DELIVERY" => "Y",
				"SHOW_COUPONS_PAY_SYSTEM" => "Y",
				"SHOW_DELIVERY_INFO_NAME" => "Y",
				"SHOW_DELIVERY_LIST_NAMES" => "Y",
				"SHOW_DELIVERY_PARENT_NAMES" => "Y",
				"SHOW_MAP_IN_PROPS" => "N",
				"SHOW_NEAREST_PICKUP" => "N",
				"SHOW_NOT_CALCULATED_DELIVERIES" => "L",
				"SHOW_ORDER_BUTTON" => "final_step",
				"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
				"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
				"SHOW_STORES_IMAGES" => "Y",
				"SHOW_TOTAL_ORDER_BUTTON" => "N",
				"SKIP_USELESS_BLOCK" => "Y",
				"TEMPLATE_LOCATION" => "popup",
				"TEMPLATE_THEME" => "site",
				"USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
				"USE_CUSTOM_ERROR_MESSAGES" => "N",
				"USE_CUSTOM_MAIN_MESSAGES" => "N",
				"USE_PRELOAD" => "Y",
				"USE_PREPAYMENT" => "N",
				"USE_YM_GOALS" => "N"
			)
		);?>
    </div>
</select>
<script>
	setInterval(function(){
		var order_price = $("#allSum_FORMATED").text().replace(/[^0-9.]/g, '') - $("#price_prepayment_id").val();
		$("#ORDER_PROP_5").val($("#LOCATION_val").val());
		if($("#ORDER_PROP_5").val().search("Московская область") != -1 || $("#ORDER_PROP_5").val().search("Москва") != -1 || 
			$("#ORDER_PROP_5").val().search("москва") != -1){
			// отображаем самовывоз
			$("#pickup_moskow_and_mo").css("display", 'block');
		}
		else{   
			// скрываем самовывоз
			$("#pickup_moskow_and_mo").css("display", 'none');
		}
		// описание в левом сайдбаре
		if($(".tabs.paneble li.active").text() == "1Личные данные")
		{
			$("#delivery_description .hfc-price-value").text(order_price);
			$("#delivery_description .hfc-warning").text("Сумма указана без учета доставки");
		}
		else
		{
			var summop = parseFloat(order_price) + parseFloat($("#our_delivery_description .cdc-itog").text().trim());
			switch($("#deliveryTypesBlock .control input[name='DELIVERY_ID']:checked").val())
			{
				case "2": // Доставка Дантона
					$(".hfc-price-value").text(addSpaces(summop));
					$(".hfc-warning").text("Цена доставки: " + $("#our_delivery_description .cdc-itog").text().trim() + "руб.");
				break;
				case "3": // Самовывоз
					$(".hfc-price-value").text(addSpaces(order_price));
					$(".hfc-warning").text("Сумма указана без учета доставки");
				break; 
				case "16": // Доставка ТК
					$(".hfc-price-value").text(addSpaces(order_price));
					$(".hfc-warning").text("Сумма указана без учета доставки");
					$('#price_delivery_id').val(0);
				break;
			}
		}
	}, 500);

</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>