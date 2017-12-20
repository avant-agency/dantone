<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"CONTROLS" => array("ZOOM"),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.758468921680524;s:10:\"yandex_lon\";d:37.55956520370485;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.55956520370485;s:3:\"LAT\";d:55.75846892168682;s:4:\"TEXT\";s:69:\"улица Трехгорный Вал, 5, Москва, Россия\";}}}",
		"MAP_HEIGHT" => "150",
		"MAP_ID" => "",
		"MAP_WIDTH" => "450",
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>