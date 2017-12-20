<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Результат оплаты");
$APPLICATION->SetTitle("Результат оплаты");

if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/include/sale_payment/teasoftalfabank/result_rec.php"))
	include($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/include/sale_payment/teasoftalfabank/result_rec.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>
