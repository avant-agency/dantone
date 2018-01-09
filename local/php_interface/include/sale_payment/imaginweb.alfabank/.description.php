<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
include(GetLangFileName(dirname(__FILE__)."/", "/payment.php"));

$psTitle = GetMessage("ALBK_TITLE");
$psDescription = GetMessage("ALBK_DESCR");

$arPSCorrespondence = array(
		"PAYMENT_WAY" => array(
			"NAME" => GetMessage("ALBK_PAYMENT_WAY"),
			"DESCR" => GetMessage("ALBK_PAYMENT_WAY_DESC"),
			"VALUE" => "https://test.paymentgate.ru/testpayment",
			"TYPE" => "",	
		),
		"USER_NAME" => array(
			"NAME" => GetMessage("ALBK_USER_NAME"),
			"DESCR" => GetMessage("ALBK_USER_NAME_DESC"),
			"VALUE" => "",
			"TYPE" => ""
		),
		"USER_PASS" => array(
			"NAME" => GetMessage("ALBK_USER_PASS"),
			"DESCR" => GetMessage("ALBK_USER_PASS_DESC"),
			"VALUE" => "",
			"TYPE" => ""
		),
		"ORDER_ID" => array(
			"NAME" => GetMessage("ALBK_ORDER_ID"),
			"DESCR" => GetMessage("ALBK_ORDER_ID_DESC"),
			"VALUE" => "ID",
			"TYPE" => "ORDER"
		),
		"SHOULD_PAY" => array(
			"NAME" => GetMessage("ALBK_SHOULD_PAY"),
			"DESCR" => GetMessage("ALBK_SHOULD_PAY_DESC"),
			"VALUE" => "SHOULD_PAY",
			"TYPE" => "ORDER"
		),
		"CURRENCY" => array(
			"NAME" => GetMessage("ALBK_CURRENCY"),
			"DESCR" => GetMessage("ALBK_CURRENCY_DESC"),
			"VALUE" => ((stripos($_SERVER["SERVER_NAME"], ".ru") !== false) ? "810" : 
							((stripos($_SERVER["SERVER_NAME"], ".ua") !== false) ? "980" : 
							((stripos($_SERVER["SERVER_NAME"], ".kz") !== false) ? "398" : "810"))),
			"TYPE" => ""
		),
		"RETURN_URL" => array(
			"NAME" => GetMessage("ALBK_RETURN_URL"),
			"DESCR" => GetMessage("ALBK_RETURN_URL_DESC"),
			"VALUE" => "http://".$_SERVER["SERVER_NAME"]."/alfabank_pay/result.php",
			"TYPE" => ""
		),
		"PAY_TYPE" => array(
			"NAME" => GetMessage("ALBK_PAY_TYPE"),
			"DESCR" => GetMessage("ALBK_PAY_TYPE_DESC"),
			"TYPE" => "SELECT",
			"VALUE" => array(
							"N" => array("NAME" => GetMessage("ALBK_PAY_TYPE_DESC_VAL2_NAME")),
							"Y" => array("NAME" => GetMessage("ALBK_PAY_TYPE_DESC_VAL1_NAME")),
						),
		),
	);                                     
?>
