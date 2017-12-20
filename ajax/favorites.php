<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 

global $APPLICATION;
$arResult["FAVORITES"] = $APPLICATION->get_cookie("FAVORITES_PRODUCTS");
$arResult["FAVORITES"] = array_unique(array_filter(explode(",", $arResult["FAVORITES"]), function($value) { return $value !== ''; }));

switch($_REQUEST["action"])
{
	case "fav-add":
			$arResult["FAVORITES"][] = $_REQUEST["elid"];
	break;
	case "fav-del": 
		foreach($arResult["FAVORITES"] as $k => $v)
		{
			if($v == $_REQUEST["elid"]) 
			{
				unset($arResult["FAVORITES"][$k]);
			}
		}
	break;
}

$user = new CUser;
$arResult["FAVORITES"] = array_unique(array_filter($arResult["FAVORITES"], function($value) { return $value !== ''; }));

$APPLICATION->set_cookie("FAVORITES_PRODUCTS", implode(",", $arResult["FAVORITES"]));

echo json_encode(array("res" => true, "data" => "Действие выполненно успешно"));
?>