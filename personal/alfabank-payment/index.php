<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Альфабанк");
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