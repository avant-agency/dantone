<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Альфабанк");

// update order after pay
if($_SESSION["LAST_COMPLETE_ORDER_ID"] != "" && $_SESSION["PRICE_DELIVERY"] != "")
{
	$arFields = array("PRICE_DELIVERY" => $_SESSION["PRICE_DELIVERY"]);
	CSaleOrder::Update($_SESSION["LAST_COMPLETE_ORDER_ID"], $arFields);
	unset($_SESSION["LAST_COMPLETE_ORDER_ID"]);
	unset($_SESSION["PRICE_DELIVERY"]);
}
?><div align="center""><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.payment.receive",
	"",
	Array(
		"PAY_SYSTEM_ID_NEW" => "3"
	)
);?>
<?if(defined('ORDER_PAYED')):?>

<?else:?>
<div>Возникли проблемы с оплатой</div>
<?endif?>	


</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>