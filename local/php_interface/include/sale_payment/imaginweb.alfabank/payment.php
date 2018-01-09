<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?
include(GetLangFileName(dirname(__FILE__)."/", "/payment.php"));

// payment params
$arPayParams["PAYMENT_WAY"]		= trim(CSalePaySystemAction::GetParamValue("PAYMENT_WAY"));
$arPayParams["USER_NAME"]		= trim(CSalePaySystemAction::GetParamValue("USER_NAME")); 
$arPayParams["USER_PASS"]		= trim(CSalePaySystemAction::GetParamValue("USER_PASS"));
$arPayParams["ORDER_ID"]		= intval(CSalePaySystemAction::GetParamValue("ORDER_ID"));
$arPayParams["SHOULD_PAY"]		= intval(floatval(CSalePaySystemAction::GetParamValue("SHOULD_PAY")) * 100);
$arPayParams["CURRENCY"]		= trim(CSalePaySystemAction::GetParamValue("CURRENCY"));
$arPayParams["RETURN_URL"]		= trim(CSalePaySystemAction::GetParamValue("RETURN_URL"));
$arPayParams["PAY_TYPE"]		= trim(CSalePaySystemAction::GetParamValue("PAY_TYPE"));

// error flag
$bError = false;

// order
{
	$arOrder = CSaleOrder::GetByID($arPayParams["ORDER_ID"]);

	if ($arOrder["ID"] != $arPayParams["ORDER_ID"])
	{
		$bError = true;
		echo GetMessage("ALBK_ERROR_NO_ORDER");
	}
}

// pay
if (!$bError)
{
	// payment url
	$sPaymentURL = $arPayParams["PAYMENT_WAY"].($arPayParams["PAY_TYPE"] == "Y" ? "/rest/register.do" : "/rest/registerPreAuth.do");
	
	// order number for payment gateway
	$sPgOrderNumber = $arPayParams["ORDER_ID"]."_".date("YmdHis"); 
	
	// query params
	$arQueryParams = array(
		"userName"		=> $arPayParams["USER_NAME"],
		"password"		=> $arPayParams["USER_PASS"],
		"orderNumber"	=> $sPgOrderNumber,
		"amount"		=> $arPayParams["SHOULD_PAY"],
		"currency"		=> $arPayParams["CURRENCY"],
		"taxSystem"		=> 0,
		"returnUrl"		=> $arPayParams["RETURN_URL"]."?oid=".$sPgOrderNumber,
		);
	
	// full reg url
	$request=array(
		'orderCreationDate'=>date_format(date_create($arOrder['DATE_INSERT']), 'Y-m-d\TH:i:s'),
		'customerDetails'=>array("email"=>$arOrder['USER_EMAIL'], "contact"=>$arOrder['USER_NAME']." ".$arOrder['USER_LAST_NAME'] )
		);
	$dbBasketItems = CSaleBasket::GetList(array(),array("ORDER_ID" => $arOrder['ID']),false,false,array());
	while ($arItem = $dbBasketItems->Fetch())
	{
		$arItem['NAME'] = str_replace("%","проц.",$arItem['NAME']);
		$k++;
		$request['cartItems']['items'][]=array(
			"positionId"=>$k,
			"name"=>$arItem['NAME'],
			"quantity"=> array("value"=> $arItem['QUANTITY'], "measure"=>"шт"),
			"itemAmount"=> $arItem['PRICE']*$arItem['QUANTITY']*100,
			"itemCurrency"=>$arPayParams["CURRENCY"],
			"itemCode"=>$arItem['PRODUCT_ID'],
			"tax"=> array("taxType"=> 0),
			"itemPrice"=> $arItem['PRICE']*100
			);
	}

	if($arOrder["DELIVERY_ID"] == 2)
	{
		$request['cartItems']['items'][]=array(
			"positionId"=>($k + 1),
			"name"=>"Доставка от Dantone Home (Москва и область)",
			"quantity"=> array("value"=> 1, "measure"=>"шт"),
			"itemAmount"=> $_SESSION["PRICE_DELIVERY"] * 100,
			"itemCurrency"=>$arPayParams["CURRENCY"],
			"itemCode"=>'delivery_2',
			"tax"=> array("taxType"=> 0),
			"itemPrice"=> $_SESSION["PRICE_DELIVERY"] * 100
		);
		$arQueryParams["amount"] += $_SESSION["PRICE_DELIVERY"] * 100;
	}

	$sRegisterURL = //$sPaymentURL."?".
	"userName=".urlencode($arQueryParams["userName"])."&".
	"password=".urlencode($arQueryParams["password"])."&".
	"orderNumber=".urlencode($arQueryParams["orderNumber"])."&".
	"amount=".urlencode($arQueryParams["amount"])."&".
	"currency=".urlencode($arQueryParams["currency"])."&".
	"returnUrl=".urlencode($arQueryParams["returnUrl"]).'&'.
	"orderBundle=".json_encode($request, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE)
		;


	//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/111.txt', $sRegisterURL, FILE_APPEND);


	// send query
	$rCURL = curl_init();
	/*curl_setopt($rCURL, CURLOPT_URL, $sRegisterURL);
	curl_setopt($rCURL, CURLOPT_RETURNTRANSFER, 1);
	*/
	curl_setopt($rCURL, CURLOPT_URL, $sPaymentURL);
    curl_setopt($rCURL, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($rCURL, CURLOPT_POST, true);
    curl_setopt($rCURL, CURLOPT_POSTFIELDS, $sRegisterURL);

   	$r = curl_exec($rCURL);
	curl_close($rCURL);
	$arAnswer = json_decode($r, true);

	// success
	if (intval($arAnswer["errorCode"]) <= 0 && strlen($arAnswer["formUrl"]) > 0)
	{
		echo '<div>';
		echo '<a href="'.$arAnswer["formUrl"].'">'.GetMessage("ALBK_BUTN_PAY").'</a>';
		echo '</div>';
	}
	else
	{
		$bError = true;
		echo GetMessage("ALBK_IS_ERROR").": [".$arAnswer["errorCode"]."] ".$arAnswer["errorMessage"].".";
	}
}
?>