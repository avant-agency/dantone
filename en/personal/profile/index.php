<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("User settings");
?>

<section id="content">
<div class="container">
	

	
<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"eshop", 
	array(
		"SET_TITLE" => "Y",
		"COMPONENT_TEMPLATE" => "eshop",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "undefined",
		"USER_PROPERTY" => array(
			0 => "UF_LEGAL_COMPANY",
			1 => "UF_INN",
		),
		"SEND_INFO" => "N",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => ""
	),
	false
);?>
</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>