<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("123");
?><?$APPLICATION->IncludeComponent(
	"evalga:locationinformer", 
	".default", 
	array(
		"SHOW_CITY" => "Y",
		"SHOW_COUNTRY" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>