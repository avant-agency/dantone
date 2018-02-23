<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

  CModule::IncludeModule("sale");
  CModule::IncludeModule("iblock");

$pending_orders = json_encode(GetListCard(), JSON_UNESCAPED_UNICODE);

  $el = new CIBlockElement;

  $PROP = array();
  $PROP['FIRST_NAME'] = $_POST['ORDER_PROP_8'];
  $PROP['SECOND_NAME'] = $_POST['ORDER_PROP_9'];
  $PROP['USER_EMAIL'] = $_POST['ORDER_PROP_2'];
  $PROP['USER_PHONE'] = $_POST['ORDER_PROP_3'];
  $PROP['USER_CITY'] = $_POST['ORDER_PROP_5'];
  $PROP['DELIVERY_METHOD'] = $_POST['DELIVERY_ID'];
  $PROP['TRANSPORT_COMPANY'] = $_POST['ORDER_PROP_11'];
  $PROP['DISTANCE'] = $_POST['distance'];
  $PROP['DELIVERY_CITY'] = $_POST['ORDER_PROP_13'];
  $PROP['STREET'] = $_POST['ORDER_PROP_14'];
  $PROP['HOUSE'] = $_POST['ORDER_PROP_15'];
  $PROP['HOUSING'] = $_POST['ORDER_PROP_17'];
  $PROP['FLAT'] = $_POST['ORDER_PROP_18'];
  $PROP['DELIVERY_COMMENT'] = $_POST['ORDER_PROP_16'];
  $PROP['PAYMENT_METHOD'] = $_POST['PAY_SYSTEM_ID'];
  $PROP['PAYMENT_COMMENT'] = $_POST['ORDER_PROP_20'];
  $PROP['PREPAYMENT_PERCENTAGE'] = $_POST['prepayment_percentage'];
  $PROP['PRICE_PREPAYMENT'] = $_POST['PRICE_PREPAYMENT'];

  $fields = Array(
    "MODIFIED_BY"    => $USER->GetID(),
    "IBLOCK_SECTION_ID" => false,  // элемент лежит в корне раздела
    "IBLOCK_ID"      => 17,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Отложенный заказ",
    "ACTIVE"         => "Y",
    "PREVIEW_TEXT"   => $pending_orders
  );

  function DeleteAllCard($fUserID) 
  {
      if (CSaleBasket::DeleteAll($fUserID, False))
          return true;
      else
          return false;
  }


if ($ID = $el->Add($fields)) {
	if(DeleteAllCard(CSaleBasket::GetBasketUserID()))
		echo "http://".$_SERVER['SERVER_NAME']."/manager_orders/show_order.php?ELEMENT_ID=".$ID;
	else
		echo "Error clear basket";
}else{
    echo "Error: ".$el->LAST_ERROR;
}





  function GetListCard(){
    // Выведем актуальную корзину для текущего пользователя
    $arBasketItems = array();
    $dbBasketItems = CSaleBasket::GetList(
            array(
                    "NAME" => "ASC",
                    "ID" => "ASC"
                ),
            array(
                    "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                    "LID" => SITE_ID,
                    "ORDER_ID" => "NULL"
                ),
            false,
            false,
            array("PRODUCT_ID", "QUANTITY")
        );
    while ($arItems = $dbBasketItems->Fetch())
    {
        if (strlen($arItems["CALLBACK_FUNC"]) > 0)
        {
            CSaleBasket::UpdatePrice($arItems["ID"], 
                                     $arItems["CALLBACK_FUNC"], 
                                     $arItems["MODULE"], 
                                     $arItems["PRODUCT_ID"], 
                                     $arItems["QUANTITY"]);
            $arItems = CSaleBasket::GetByID($arItems["ID"]);
        }

        $arBasketItems[] = $arItems;
    }
    return $arBasketItems;
  }

?>