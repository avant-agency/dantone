<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if($APPLICATION->get_cookie("DONT_SHOW_POPUP") == "Y") 
{
	echo json_encode(array("TIME_ON_SITE" => 0, "PAGE_QUANTUTY" => 0));
	die();
}

if($_REQUEST["ENDLOGIC"] == "Y")
{
	$APPLICATION->set_cookie("DONT_SHOW_POPUP", "Y", time()+360000, "/");
	echo json_encode(array("TIME_ON_SITE" => 0, "PAGE_QUANTUTY" => 0));
	die();
}

if($_REQUEST["PAGE_QUANTITY"] == "Y")
{
	$old_quanter = 0;

	if($APPLICATION->get_cookie("PAGE_COUNTER") != "") 
		$old_quanter = $APPLICATION->get_cookie("PAGE_COUNTER");

	$new_quantity = $old_quanter + 1;
	$APPLICATION->set_cookie("PAGE_COUNTER", $new_quantity, time()+3600, "/");
}
else
{
	$new_time = $APPLICATION->get_cookie("TIME_ON_SITE")+5;
	$APPLICATION->set_cookie("TIME_ON_SITE", $new_time, time()+3600, "/");
}
$new_quantity = $APPLICATION->get_cookie("PAGE_COUNTER");
echo json_encode(array("TIME_ON_SITE" => $new_time, "PAGE_QUANTUTY" => $new_quantity));
die();
?>