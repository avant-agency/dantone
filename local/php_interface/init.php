<?

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "DoIBlockAfterSave");
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "DoIBlockAfterSave");
AddEventHandler("catalog", "OnPriceAdd", "DoIBlockAfterSave");
AddEventHandler("catalog", "OnPriceUpdate", "DoIBlockAfterSave");
AddEventHandler("main", "OnAfterUserRegister", "OnAfterUserRegisterHandler");

function OnAfterUserRegisterHandler(&$arFields)
{
    send_to_mailchump($arFields["EMAIL"], $arFields["NAME"], $arFields["LAST_NAME"]);
    include_once $_SERVER["DOCUMENT_ROOT"] . "/amo-crm/amo.php";
    $res = Amo_DoRegistration($arFields["EMAIL"], $arFields["NAME"], $arFields["NAME"], $arFields["PERSONAL_PHONE"], $arFields["PERSONAL_CITY"]);
}

function my_onAfterResultAddUpdate($WEB_FORM_ID, $RESULT_ID)
{
    include_once $_SERVER["DOCUMENT_ROOT"] . "/amo-crm/amo.php";
    $arResult = CFormResult::GetDataByID($RESULT_ID, array("NAME", "EMAIL", "PHONE", "MESSAGE", "SIMPLE_QUESTION_723", "SIMPLE_QUESTION_644"));
    if ($WEB_FORM_ID == 2) 
    {
        CModule::IncludeModule("form");
        send_to_mailchump($arResult["EMAIL"][0]["USER_TEXT"], $arResult["EMAIL"][0]["USER_TEXT"]);
        Amo_DoFeedback($arResult["NAME"][0]["USER_TEXT"], $arResult["PHONE"][0]["USER_TEXT"], $arResult["EMAIL"][0]["USER_TEXT"], $arResult["MESSAGE"][0]["USER_TEXT"]);
    }
    if($WEB_FORM_ID == 1)
    {
        send_to_mailchump($arResult["EMAIL"][0]["USER_TEXT"], $arResult["EMAIL"][0]["USER_TEXT"]);
        Amo_DoCallback($arResult["SIMPLE_QUESTION_723"][0]["USER_TEXT"], $arResult["SIMPLE_QUESTION_644"][0]["USER_TEXT"]);
    }
}

AddEventHandler('form', 'onAfterResultAdd', 'my_onAfterResultAddUpdate');
AddEventHandler('form', 'onAfterResultUpdate', 'my_onAfterResultAddUpdate');

function send_to_mailchump($email, $fname, $lname)
{
    $apikey='e5a6e1b43fd90b5bf7f029ead92e18f7';
    $listId='5e3f4d865e';
    
    $data = array(
        'email_address'=>$email, 'apikey'=>$apikey,
        'merge_vars' => array('FNAME' => $fname, 'LNAME' => $lname),
        'id' => $listId, 'double_optin' => false, 'update_existing' => true, 
        'replace_interests' => false, 'send_welcome' => false, 'email_type' => 'html');
    $submit_url = "http://us12.api.mailchimp.com/1.3/?method=listSubscribe";

    $payload = json_encode($data); 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $submit_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
    
    $result = curl_exec($ch);
    curl_close ($ch);
    $data = json_decode($result);
    if (isset($data->error) and $data->error){
        return json_encode(array("res" => true, "data" => $data->error));
    } else {
        return json_encode(array("res" => true, "data" => "Действие выполненно успешно"));
    }
}

function DoIBlockAfterSave($arg1, $arg2 = false)
{
    $ELEMENT_ID = false;
    $IBLOCK_ID = false;
    $OFFERS_IBLOCK_ID = false;
    $OFFERS_PROPERTY_ID = false;
    if (CModule::IncludeModule('currency'))
        $strDefaultCurrency = CCurrency::GetBaseCurrency();

    //Check for catalog event
    if (is_array($arg2) && $arg2["PRODUCT_ID"] > 0) {
        //Get iblock element
        $rsPriceElement = CIBlockElement::GetList(
            array(),
            array(
                "ID" => $arg2["PRODUCT_ID"],
            ),
            false,
            false,
            array("ID", "IBLOCK_ID")
        );
        if ($arPriceElement = $rsPriceElement->Fetch()) {
            $arCatalog = CCatalog::GetByID($arPriceElement["IBLOCK_ID"]);
            if (is_array($arCatalog)) {
                //Check if it is offers iblock
                if ($arCatalog["OFFERS"] == "Y") {
                    //Find product element
                    $rsElement = CIBlockElement::GetProperty(
                        $arPriceElement["IBLOCK_ID"],
                        $arPriceElement["ID"],
                        "sort",
                        "asc",
                        array("ID" => $arCatalog["SKU_PROPERTY_ID"])
                    );
                    $arElement = $rsElement->Fetch();
                    if ($arElement && $arElement["VALUE"] > 0) {
                        $ELEMENT_ID = $arElement["VALUE"];
                        $IBLOCK_ID = $arCatalog["PRODUCT_IBLOCK_ID"];
                        $OFFERS_IBLOCK_ID = $arCatalog["IBLOCK_ID"];
                        $OFFERS_PROPERTY_ID = $arCatalog["SKU_PROPERTY_ID"];
                    }
                } //or iblock which has offers
                elseif ($arCatalog["OFFERS_IBLOCK_ID"] > 0) {
                    $ELEMENT_ID = $arPriceElement["ID"];
                    $IBLOCK_ID = $arPriceElement["IBLOCK_ID"];
                    $OFFERS_IBLOCK_ID = $arCatalog["OFFERS_IBLOCK_ID"];
                    $OFFERS_PROPERTY_ID = $arCatalog["OFFERS_PROPERTY_ID"];
                } //or it's regular catalog
                else {
                    $ELEMENT_ID = $arPriceElement["ID"];
                    $IBLOCK_ID = $arPriceElement["IBLOCK_ID"];
                    $OFFERS_IBLOCK_ID = false;
                    $OFFERS_PROPERTY_ID = false;
                }
            }
        }
    } //Check for iblock event
    elseif (is_array($arg1) && $arg1["ID"] > 0 && $arg1["IBLOCK_ID"] > 0) {
        //Check if iblock has offers
        $arOffers = CIBlockPriceTools::GetOffersIBlock($arg1["IBLOCK_ID"]);
        if (is_array($arOffers)) {
            $ELEMENT_ID = $arg1["ID"];
            $IBLOCK_ID = $arg1["IBLOCK_ID"];
            $OFFERS_IBLOCK_ID = $arOffers["OFFERS_IBLOCK_ID"];
            $OFFERS_PROPERTY_ID = $arOffers["OFFERS_PROPERTY_ID"];
        }
    }

    if ($ELEMENT_ID) {
        static $arPropCache = array();
        if (!array_key_exists($IBLOCK_ID, $arPropCache)) {
            //Check for MINIMAL_PRICE property
            $rsProperty = CIBlockProperty::GetByID("MINIMUM_PRICE", $IBLOCK_ID);
            $arProperty = $rsProperty->Fetch();
            if ($arProperty)
                $arPropCache[$IBLOCK_ID] = $arProperty["ID"];
            else
                $arPropCache[$IBLOCK_ID] = false;
        }

        if ($arPropCache[$IBLOCK_ID]) {
            //Compose elements filter
            if ($OFFERS_IBLOCK_ID) {
                $rsOffers = CIBlockElement::GetList(
                    array(),
                    array(
                        "IBLOCK_ID" => $OFFERS_IBLOCK_ID,
                        "PROPERTY_" . $OFFERS_PROPERTY_ID => $ELEMENT_ID,
                    ),
                    false,
                    false,
                    array("ID")
                );
                while ($arOffer = $rsOffers->Fetch())
                    $arProductID[] = $arOffer["ID"];

                if (!is_array($arProductID))
                    $arProductID = array($ELEMENT_ID);
            } else
                $arProductID = array($ELEMENT_ID);

            $minPrice = false;
            $maxPrice = false;
            //Get prices
            $rsPrices = CPrice::GetList(
                array(),
                array(
                    "PRODUCT_ID" => $arProductID,
                )
            );
            while ($arPrice = $rsPrices->Fetch()) {
                if (CModule::IncludeModule('currency') && $strDefaultCurrency != $arPrice['CURRENCY'])
                    $arPrice["PRICE"] = CCurrencyRates::ConvertCurrency($arPrice["PRICE"], $arPrice["CURRENCY"], $strDefaultCurrency);

                $PRICE = $arPrice["PRICE"];

                if ($minPrice === false || $minPrice > $PRICE)
                    $minPrice = $PRICE;

                if ($maxPrice === false || $maxPrice < $PRICE)
                    $maxPrice = $PRICE;
            }

            //Save found minimal price into property
            if ($minPrice !== false) {
                CIBlockElement::SetPropertyValuesEx(
                    $ELEMENT_ID,
                    $IBLOCK_ID,
                    array(
                        "MINIMUM_PRICE" => $minPrice,
                        "MAXIMUM_PRICE" => $maxPrice,
                    )
                );
            }
        }
    }
}

// Функция генерации купона по id скидки $DISCOUNT_ID
function generateCoupon($DISCOUNT_ID)
{

    CModule::includeModule('sale');
    CModule::includeModule('catalog');

    $COUPON = CatalogGenerateCoupon();

    $arCouponFields = array(
        "DISCOUNT_ID" => $DISCOUNT_ID,
        "ACTIVE" => "Y",
        "ONE_TIME" => "N",
        "COUPON" => $COUPON,
        "DATE_APPLY" => false
    );

    $CID = CCatalogDiscountCoupon::Add($arCouponFields);
    $CID = IntVal($CID);

    if ($CID <= 0) {
        $ex = $APPLICATION->GetException();
        $errorMessage = $ex->GetString();
        return $errorMessage;
    }

    return Array("COUPON_ID" => $CID, "COUPON" => $COUPON);

}


//AddEventHandler("sale", "OnSaleComponentOrderOneStepComplete", "OnOrderAddHandler");
/*function OnOrderAddHandler($ORDER_ID, $arOrder, $arParams)
{

    $file = "/ordercheck.csv";
    $fp = fopen($file, "w");
    foreach ($arOrder as $line) {
        fputcsv($fp, $line);


    }

    fclose($fp);

    CModule::includeModule('sale');
    $db_vals = CSaleOrderPropsValue::GetList(
        array("SORT" => "ASC"),
        array(
            "ORDER_ID" => $ORDER_ID,
        ));
    $arProps = Array();
    while ($arVals = $db_vals->Fetch())
        $arProps[$arVals["CODE"]] = $arVals;

    $basket = Array();
    $rsGoods = CSaleBasket::GetList(Array(), Array("ORDER_ID" => $ORDER_ID));
    while ($arGoods = $rsGoods->Fetch()) {


        $arSelect = Array("ID", "NAME");
        $arFilter = Array("IBLOCK_ID" => 4, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "NAME" => $arGoods["NAME"]);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
        }

        $basket[] = Array(
            "NAME" => $arGoods["NAME"],
            "QTY" => $arGoods["QUANTITY"] . " шт.",
            "PRICE" => number_format($arGoods["PRICE"], 0, '.', ' ') . ' руб.'
        );

    }

    CEvent::Send("SALE_NEW_ORDER", "s1", Array(
        "ORDER_ID" => $ORDER_ID,
        "PRICE" => $arOrder["PRICE"] . " руб.",
        "ORDER_DATE" => $arOrder["DATE_INSERT"],
        "EMAIL" => $arProps["EMAIL"]["VALUE"],
        "ORDER_USER" => $arProps["NAME"]["VALUE"] . " " . $arProps["LAST_NAME"]["VALUE"],
        "ORDER_LIST" => $basket
    ), "N", 44);

}*/

function debug($var)
{
    global $USER;
    if ($USER->IsAdmin()) {
        $bt = debug_backtrace();
        $bt = $bt[0];
        $dRoot = $_SERVER["DOCUMENT_ROOT"];
        $dRoot = str_replace("/", "\\", $dRoot);
        $bt["file"] = str_replace($dRoot, "", $bt["file"]);
        $dRoot = str_replace("\\", "/", $dRoot);
        $bt["file"] = str_replace($dRoot, "", $bt["file"]);
        ?>
        <div style="font-size:12px; color:#000; background:#FFF; border:1px dashed #000;">
            <div style="padding: 3px 5px; background:#99CCFF; font-weight:bold;">File: <?= $bt["file"] ?>
                [<?= $bt["line"] ?>]
            </div>
            <pre style="padding: 10px;"><? print_r($var) ?></pre>
        </div>
    <?
    }
}

AddEventHandler('main', 'OnBeforeEventAdd', "OnBeforeEventAddHandler");
function OnBeforeEventAddHandler(&$event, &$lid, &$arFields)
{
    global $USER;
    if($event == "SALE_NEW_ORDER" && $lid == "s1")
    {
        CModule::IncludeModule("sale");

        $db_props = CSaleOrderPropsValue::GetOrderProps($arFields["ORDER_ID"]);
        while ($arProps = $db_props->Fetch())
        {
            switch($arProps["CODE"])
            {
                case "ORDER_COMMENT": $arFields["P16_KOMMENTARIY_K_ADRESU"] = $arProps["VALUE"]; break;
                case "EMAIL": $arFields["EMAIL"] = $arProps["VALUE"]; break;
                case "PHONE": $arFields["P3_TELEFON"] = $arProps["VALUE"]; break;
                case "CITY": $arFields["P13_GOROD"] = $arProps["VALUE"]; break;
                case "HOUSE": $arFields["P15_DOM"] = $arProps["VALUE"]; break;
                case "APARTMENT": $arFields["P18_KVARTIRA"] = $arProps["VALUE"]; break;
                case "ADDRESS_COMMENT": $arFields["P16_KOMMENTARIY_K_ADRESU"] = $arProps["VALUE"]; break;
                case "BUILDING": $arFields["P15_DOM"] = $arProps["VALUE"]; break;
                case "DELIVERY_COMPANY": break;
                case "STREET": $arFields["P14_ULITSA"] = $arProps["VALUE"]; break;
                case "NAME": $arFields["P8_IMYA"] = $arProps["VALUE"]; break;
                case "LAST_NAME": $arFields["P9_FAMILIYA"] = $arProps["VALUE"]; break;
                case "ZIP": break;
            }
        }

        $arOrder = CSaleOrder::GetByID($arFields["ORDER_ID"]);
        if($_SESSION["PRICE_DELIVERY"] != "")
        {
            $arOrder["PRICE"] += $_SESSION["PRICE_DELIVERY"];
            $arFields["DELIVERY_COST"] = $_SESSION["PRICE_DELIVERY"];
        }

        $arFields["TOTAL_COST"] = floatval($arOrder["PRICE"]) + " руб.";

        if($arOrder["DELIVERY_ID"] == 3)
        {
            $arFields["NEW_DELIVERY_ADDRESS"] = "Указан самовывоз";
        }
        else
        {
            $res = CSaleOrderPropsValue::GetOrderProps($arFields["ORDER_ID"]);

            $address = ""; $city = ""; $street = ""; $house = ""; $corpus = ""; $apartment = "";

            while ($arProps = $res->Fetch())
            {
                switch($arProps["CODE"])
                {
                    case "CITY": $city = $arProps["VALUE"]; break;
                    case "HOUSE": $house = $arProps["VALUE"]; break;
                    case "APARTMENT": $apartment = $arProps["VALUE"]; break;
                    case "BUILDING": $corpus = $arProps["VALUE"]; break; // корпус
                    case "STREET": $street = $arProps["VALUE"]; break;
                    case "INDEX": $index = $arProps["VALUE"]; break;
                }
            }
            $address = "";
            if($city != "") 
                $address .= $city;
            if($street != "") 
                $address .= ' улица '.$street; 
            if($house != "") 
                $address .= ' строение '.$house;
            if($corpus != "") 
                $address .= ' корпус '.$corpus;
            if($apartment != "") 
                $address .= ' квартира '.$apartment;
            $arFields["NEW_DELIVERY_ADDRESS"] = $address;
        }

        if($arFields["NEW_DELIVERY_ADDRESS"] == "") 
            $arFields["NEW_DELIVERY_ADDRESS"] = "Адрес не указан";

        // узнать активирован ли текущий пользователь или нет
        $rsUser = CUser::GetByID($arOrder["USER_ID"]);
        $arUser = $rsUser->Fetch();
        if($arUser["UF_UNACTIVE_USER_COD"] != "ACTIVE")
        {
            $user = new CUser;
            $unactive_user_code = \Bitrix\Main\Security\Random::getString(16);
            $fields = Array("UF_UNACTIVE_USER_COD" => $unactive_user_code);
            $user->Update($arOrder["USER_ID"], $fields);

            $arFields["USER_ID"] = $arOrder["USER_ID"];
            $arFields["UNACTIVE_USER_CODE"] = $unactive_user_code;
            $arFields["INVITE_STYLE_CSS"] = "";
        }
        else
        {
            $arFields["INVITE_STYLE_CSS"] = "display:none;";
        }

        $arFields["TOTAL_PRICE"] = $arOrder["PRICE"];

        $wd = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/local/mail_upgrade/mails_weekdays.txt");
        $we = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/local/mail_upgrade/mails_weekends.txt");

        if(date('w', strtotime(date("d.m.Y"))) % 6 == 0)
        {
            $arFields["TO"] = $we;
        }
        else
        {
            $arFields["TO"] = $wd;
        }

        $arFields["P20_KOMMENTARIY"] = $arFields["P20_KOMMENTARIY"] . '<br/>Комментарий к оплате<br/>' . $arFields["P20__"] . "</br>Комментарий к доставке<br/>" . $arFields["P16_KOMMENTARIY_K_ADRESU"];
    }
}

AddEventHandler("main", "OnAfterUserLogin", Array("ClassRedirect", "OnAfterUserLoginHandler" )) ;
class ClassRedirect
{
   function OnAfterUserLoginHandler(&$fields)
   {
       if(!empty($fields['USER_ID']) ) LocalRedirect("/personal/profile/") ;
   }
}

?>