<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/classes/general/xml.php');
$P = new CDataXML();
$P->Load($_SERVER["DOCUMENT_ROOT"] . '/bitrix/catalog_export/google.xml');
$data = $P->GetArray();

echo "<pre>";
print_r($data);

?>