<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?
include(GetLangFileName(dirname(__FILE__)."/", "/payment.php"));
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/lp.txt', print_r($_REQUEST, true), FILE_APPEND);
CModule::IncludeModule("sale");

// payment params
$arPayParams["PAYMENT_WAY"]		= trim(CSalePaySystemAction::GetParamValue("PAYMENT_WAY"));
$arPayParams["USER_NAME"]		= trim(CSalePaySystemAction::GetParamValue("USER_NAME"));
$arPayParams["USER_PASS"]		= trim(CSalePaySystemAction::GetParamValue("USER_PASS"));

// request params
$arReqParams["PG_ORDER_ID"]	= htmlspecialchars($_REQUEST["oid"]);
$arReqParams["ORDER_CODE"]	= htmlspecialchars($_REQUEST["orderId"]);

// order
$iOrderID = intval(substr($arReqParams["PG_ORDER_ID"], 0, strlen($arReqParams["PG_ORDER_ID"]) - 14));
$iOrderID=explode('_', $arReqParams["PG_ORDER_ID"]);
$iOrderID=$iOrderID[0];
$arOrder = CSaleOrder::GetByID($iOrderID);

//
if (intval($arOrder["ID"]) > 0 && strlen($arReqParams["PG_ORDER_ID"]) > 0 && strlen($arReqParams["ORDER_CODE"]) > 0)
{
	// query params
	$arQueryParams = array(
			"userName"	=> $arPayParams["USER_NAME"],
			"password"	=> $arPayParams["USER_PASS"],
			"orderId"	=> $arReqParams["ORDER_CODE"],
		);

	// full status url
	$sStatusURL = $arPayParams["PAYMENT_WAY"]."/rest/getOrderStatus.do?".
		"userName=".urlencode($arQueryParams["userName"])."&".
		"password=".urlencode($arQueryParams["password"])."&".
		"orderId=".urlencode($arQueryParams["orderId"]);

	// send query
	$rCURL = curl_init();
	curl_setopt($rCURL, CURLOPT_URL, $sStatusURL);
	curl_setopt($rCURL, CURLOPT_RETURNTRANSFER, 1);
	$r = curl_exec($rCURL);
	curl_close($rCURL);
	$arAnswer = json_decode($r, true);
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'/lp.txt', $sStatusURL, FILE_APPEND);
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'/lp.txt', print_r($arAnswer, true), FILE_APPEND);
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'/lp.txt', print_r($arOrder, true), FILE_APPEND);
	// success
	if (intval($arAnswer["ErrorCode"]) == 0)
	{
		if (intval($arAnswer["OrderStatus"]) == 1 || intval($arAnswer["OrderStatus"]) == 2 || intval($arAnswer["orderStatus"]) == 1 || intval($arAnswer["orderStatus"]) == 2)
		{
			$fPaySum = floatval($arAnswer["Amount"]) / 100;
			$fPaidSum = floatval($arOrder["SUM_PAID"]);
			$fAllPaidSum = $fPaySum;//roundEx($fPaidSum + $fPaySum, 2);
			
			CSaleOrder::Update($arOrder["ID"], array("SUM_PAID" => $fAllPaidSum));
			if ($fAllPaidSum >= $arOrder["PRICE"])
			{
				echo GetMessage("ALBK_SUCCESS_PAY");
				CSaleOrder::PayOrder($arOrder["ID"], "Y");
				define('ORDER_PAYED', 1);
			}
		}
	}
	else
	{
		echo GetMessage("ALBK_IS_ERROR").": [".$arAnswer["ErrorCode"]."] ".$arAnswer["ErrorMessage"].".";
	}
}
else
{
	echo GetMessage("ALBK_ERROR_REC_NO_ORDER");
}
?>