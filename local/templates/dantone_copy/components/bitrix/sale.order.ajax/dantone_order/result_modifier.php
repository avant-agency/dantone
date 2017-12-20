<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

$OFFERS_IBLOCK_ID = 5;

$component = $this->__component;
$component::scaleImages($arResult['JS_DATA'], $arParams['SERVICES_IMAGES_SCALING']);

global $USER;

$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();

if($USER->isAuthorized()) {
	$arResult["USER"] = $arUser;
}

$arResult["PICKUP_AVAILABLE"] = true;
$total_cart_price = 0;

$fUserID = IntVal(CSaleBasket::GetBasketUserID(True));

$arFilter = array("CAN_BUY" => "Y", "DELAY" => "N", "FUSER_ID" => $fUserID, "ORDER_ID" => "NULL", "LID" => "s1");
$dbItems = CSaleBasket::GetList(array("NAME" => "ASC", "ID" => "ASC"), $arFilter, false, false, array());

while ($arItem = $dbItems->GetNext(true, false))
{
	if($arResult["PICKUP_AVAILABLE"])
	{
		$products_id = array();
	
		$offers = CCatalogSKU::getProductList(array($arItem["PRODUCT_ID"]), $OFFERS_IBLOCK_ID);
		if(count($offers) > 0)
		{
			foreach($offers as $k => $v)
				$products_id[] = $v['ID'];
		}
		else
		{
			$products_id[] = $arItem["PRODUCT_ID"];
		}
	
		$db_old_groups = CIBlockElement::GetElementGroups($products_id, true);
		$groups = array();
		while($ar_group = $db_old_groups->Fetch())
		{
			$groups[] = $ar_group["ID"];
		}
		if(count(array_intersect($groups, array(51, 57, 26, 50, 48, 55, 56, 44, 45, 47, 49))) == 0)
		{
			$arResult["PICKUP_AVAILABLE"] = false;
		}
	}
	$total_cart_price += $arItem["PRICE"] * $arItem["QUANTITY"];
}

$arResult["ORDER_TOTAL_PRICE"] = $total_cart_price;