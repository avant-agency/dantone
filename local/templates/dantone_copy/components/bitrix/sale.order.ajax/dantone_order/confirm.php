<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    use Bitrix\Main\Localization\Loc;
    include $_SERVER["DOCUMENT_ROOT"] . "/amo-crm/amo.php";

    CModule::IncludeModule("sale");
    CModule::IncludeModule("iblock");
    CModule::IncludeModule("catalog");

    $arOrder = CSaleOrder::GetByID($arResult["ORDER"]["ID"]);

    if($arOrder["PRICE_DELIVERY"] == 0 && $arResult["ORDER"]["PRICE_DELIVERY"] && $_SESSION["PRICE_DELIVERY"] > 0 )
    {
        $arResult["ORDER"]["PRICE"] = $_SESSION["PRICE_DELIVERY"] + $arOrder["PRICE"];
        $arResult["ORDER"]["PRICE_DELIVERY"] = $_SESSION["PRICE_DELIVERY"];
        $arFields = array("PRICE_DELIVERY" => $_SESSION["PRICE_DELIVERY"]);
        CSaleOrder::Update($arResult["ORDER"]["ID"], $arFields);
        header("Refresh:0");
    }

    $db_vals = CSaleOrderPropsValue::GetList(array("SORT" => "ASC"), array("ORDER_ID" => $arResult["ORDER"]["ID"]));

    $arProps = Array();
    while($arVals = $db_vals->Fetch())
        $arProps[$arVals["CODE"]] = $arVals;

    if($arProps['WANT_SUBSCRIBE']['VALUE']=='Y'){
        $user = new CUser;
        $user->Update($USER->GetId(), Array("UF_USER_SUBSCRIBE" => 1));
    }

    // получаем ID торговых предложений в корзине

    global $USER;
    $res = CSaleBasket::GetList(array(), array("ORDER_ID" => $arResult["ORDER"]["ID"]));

    // получаем ID товаров, их разделы и формируем результирующий массив
    $section_ids = array();

    while ($arItem = $res->Fetch())
    {
        $el = CCatalogSku::GetProductInfo($arItem["PRODUCT_ID"]);
        $section_ids[$arItem["PRODUCT_ID"]] = $el["ID"];
        $arResult["BASKET_ITEMS"][$el["ID"]] = $arItem;
    }

    $arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID");
    $arFilter = Array("ID"=>$section_ids);

    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arResult["BASKET_ITEMS"][$arFields["ID"]]["IBLOCK_SECTION_ID"] = $arFields["IBLOCK_SECTION_ID"];
    }

    $resamo = Amo_DoOrder(
        $arProps["NAME"]["VALUE"], 
        $arProps["LAST_NAME"]["VALUE"], 
        $arProps["EMAIL"]["VALUE"].$rand,
        $arProps["PHONE"]["VALUE"].$rand, 
        $arProps["CITY"]["VALUE"], 
        $arProps["STREET"]["VALUE"], 
        $arProps["HOUSE"]["VALUE"],
        'section',
        $arProps["APARTMENT"]["VALUE"], 
        "index_empty", 
        $arResult, 
        $arProps["ADDRESS_COMMENT"]["VALUE"]
    );

if ($arParams["SET_TITLE"] == "Y")
    $APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
?>

<? if (!empty($arResult["ORDER"])): 
    $dbBasketItems = CSaleBasket::GetList(array("ID" => "ASC"),
        array("ORDER_ID" => $arResult['ORDER']['ID']),false,false,
        array("ID","PRODUCT_ID","QUANTITY", 'PRICE', 'NAME'));

        $k=0;

        while ($arItem = $dbBasketItems->Fetch())
        {
            $k++;
            $arScripts[]=array('id'=>$arItem['PRODUCT_ID'], 'number'=>$arItem['QUANTITY']);
            $res = CIBlockElement::GetList(Array(), Array("ID"=>IntVal($arItem['PRODUCT_ID'])), false, Array("nPageSize"=>50), Array("ID", "IBLOCK_ID", "PROPERTY_ARTIKUL", 'PROPERTY_SIZES_CLOTHES'));
            if($arFields = $res->GetNext())
            {
                $arItem['variant']=$arFields['PROPERTY_ARTIKUL_VALUE'];
                if($arFields['PROPERTY_SIZES_CLOTHES_VALUE'])$arItem['variant'].=' '.$arFields['PROPERTY_SIZES_CLOTHES_VALUE'];
            }
            $arDatalayer[]=array('id'=>$arItem['PRODUCT_ID'], 'name'=>$arItem['NAME'], 'price'=>$arItem['PRICE'], 'quantity'=>$arItem['QUANTITY'], 'variant'=>$arItem['variant']);
            $arItems[]=$arItem;
        }
    ?>

    <script>

        dataLayer.push({
            "ecommerce": {
                "purchase": {
                    "actionField": {
                        "id" : "<?=$arResult["ORDER"]["ACCOUNT_NUMBER"]?>" //номер заказа
                    },
                    "products": [
                    <?foreach($arDatalayer as $arItem):?>
                    {'id':'<?=$arItem['id']?>','name':'<?=$arItem['name']?>','price':'<?=$arItem['price']?>','quantity':'<?=$arItem['quantity']?>', 'variant':'<?=$arItem['variant']?>'},
                    <?endforeach?>
                    ]
                }
            }
        });

    </script>

<h1 class="h2 mb10"><?=GetMessage('CONFIRM_TITLE')?></h1>
<div class="clearfix mb20">
    <ul class="breadcrumbs">
        <li><a href="<?=SITE_DIR?>"><?=GetMessage('ORDER_MAIN')?></a></li>
        <li><?=GetMessage('ORDER_NAME')?></li>
    </ul>
</div>


<div class="tabs-container">
    <ul class="tabs noclickable">
        <li class="success"><a href="#"><span class="number">1</span><?=GetMessage('ORDER_PERSONAL')?></a></li>
        <li class="success"><a href="#"><span class="number">2</span><?=GetMessage('ORDER_DELIVERY')?></a></li>
        <li class="success"><a href="#"><span class="number">3</span><?=GetMessage('ORDER_PAYMENT')?></a></li>
    </ul>
    <div class="panes">
        <div class="pane clearfix">

            <?if (!empty($arResult["ORDER"])):?>

            <div class="help-form"><?=GetMessage('CONFIRM_THANK', array('#NUMBER#'=>$arResult["ORDER"]["ACCOUNT_NUMBER"]))?></div>
            <br/>
            <div class="confirm-form">
                <div class="form-container">
                    <div class="cart-table-result">
                        <?
                        $rsGoods = CSaleBasket::GetList(Array(), Array("ORDER_ID" => $arResult["ORDER"]["ID"]));
                        ?>

                        <?$basket = Array();?>    
                        <?while($arGoods = $rsGoods->Fetch()) {?>  

                        <?
                        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE");
                        $mxResult = CCatalogSku::GetProductInfo(
                            $arGoods['PRODUCT_ID']
                            );
                        if (is_array($mxResult))
                        {
                            $arFilter = Array("ID" => $mxResult["ID"]);
                        }
                        else
                        {
                            $arFilter = Array("ID" => $arGoods["PRODUCT_ID"]);
                        
                        }
                        //$arFilter = Array("IBLOCK_ID"=>4, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "NAME" => $arGoods["NAME"]);
                        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
                        while($ob = $res->GetNextElement())
                        {
                            $arFields = $ob->GetFields();
                        }

                        $basket[] = Array(
                            "NAME" =>  $arGoods["NAME"],
                            "QTY" => $arGoods["QUANTITY"]." шт.",
                            "PRICE" => number_format ( $arGoods["PRICE"], 0, '.', ' ' ).' руб.'
                            );

                            ?> 

                            <div class="cart-table-item">
                                <div class="photo">
                                    <a href="<?=$arGoods["DETAIL_PAGE_URL"]?>/"><img src="<?=CFIle::GetPath($arFields["PREVIEW_PICTURE"]?$arFields["PREVIEW_PICTURE"]:$arFields["DETAIL_PICTURE"])?>" alt="<?=$arGoods["NAME"]?>"></a>
                                </div>
                                <div class="title"><a href="<?=$arGoods["DETAIL_PAGE_URL"]?>/"><?=$arGoods["NAME"]?></a></div>
                                <div class="price">
                                    <span class="value"><?=number_format ( $arGoods["PRICE"], 0, '.', ' ' )?></span> <?=GetMessage('CONFIRM_RUB')?>
                                </div>
                                <div class="result"><span class="value"><?=$arGoods["QUANTITY"]?></span> <?=GetMessage('CONFIRM_SHT')?></div>
                            </div>
                            <?}?>    
                        </div>
                    </div>
                </div>

                <?endif;?>
                <div class="confirm-result">
                    <div class="clearfix">
                        <div class="warning">
                            <?=GetMessage('CONFIRM_CHECK')?> <strong class="text-nowrap">
                            <span class="kupislova">8 (495) 727-02-17</span></strong> <?=GetMessage('CONFIRM_SAYUS')?>
                        </div>

                        <div class="confirm-result-detail">
                            <div class="item">
                                <div class="param"><strong><?=GetMessage('CONFIRM_TOTAL')?>:</strong></div>
                                <div class="value">
                                    <div class="price"><span class="value">
                                        <?=number_format ( $arResult["ORDER"]["PRICE"] , 0, '.', ' ' )?></span> <?=GetMessage('CONFIRM_RUB')?>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="param"><strong>Стоимость доставки:</strong></div>
                                <div class="value">
                                    <div class="price"><span class="value">
                                        <?=number_format ($arResult["ORDER"]["PRICE_DELIVERY"], 0, '.', ' ' )?></span> <?=GetMessage('CONFIRM_RUB')?>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="param"><?=GetMessage('CONFIRM_PERSONAL')?>:</div>
                                <div class="value">
                                    <?=$arProps["NAME"]["VALUE"]?> <?=$arProps["LAST_NAME"]["VALUE"]?> <?=$arProps["PHONE"]["VALUE"]?>                                    </div>
                                </div>
                                <div class="item">
                                    <div class="param"><?=GetMessage('ORDER_DELIVERY')?>:</div>
                                    <div class="value">
                                        <?
                                        $delivery = CSaleDelivery::GetByID($arResult["ORDER"]["DELIVERY_ID"]);
                                        ?>
                                        <?=$delivery["NAME"]?>                                    </div>
                                    </div>
                                    <div class="item">
                                        <div class="param"><?=GetMessage('ORDER_PAYMENT')?>:</div>
                                        <div class="value">
                                            <?=$arResult["PAY_SYSTEM_LIST"][$arResult['ORDER']['PAY_SYSTEM_ID']]["NAME"]?>
                                            <br>
                                            <div>
                                            <?
                                            if (!empty($arResult["PAYMENT"]))
                                            {
                                                foreach ($arResult["PAYMENT"] as $payment)
                                                {
                                                    if ($payment["PAID"] != 'Y')
                                                    {
                                                        if (!empty($arResult['PAY_SYSTEM_LIST']) && array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST']))
                                                        {
                                                            $arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment["PAY_SYSTEM_ID"]];

                                                            if (empty($arPaySystem["ERROR"]))
                                                            {
                                                                if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
                                                                    <?
                                                                    $orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
                                                                    $paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
                                                                    ?>
                                                                    <script>
                                                                        window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
                                                                    </script>
                                                                    <?=GetMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
                                                                        <? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
                                                                        <br/>
                                                                        <?=GetMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
                                                                    <? endif ?>
                                                                <? else: ?>
                                                                    <br>

                                                                <?if($payment["PAY_SYSTEM_ID"] == 3){?>
                                                                    <div class="count mobileVisible_"><a target="_blank" href="/personal/order/payment/?ORDER_ID=<?=$arResult["ORDER"]["ID"]?>&PAYMENT_ID=<?=$payment["PAY_SYSTEM_ID"]?>/1" class="solve-btn">Оплатить</a></div>
                                                                <?}?>

                                                <? endif;
                                                            }
                                            }?></div><?
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="back-to-catalog"><a href="<?=SITE_DIR?>"><?=GetMessage('BACK_TO_CATALOG')?></a></div>
            </div>

        </div>
    </div>
</div>

        <?
        /** @var \Bitrix\Sale\Order $order */

        if (!empty($order))
        {
            $paymentCollection = $order->getPaymentCollection();
            /** @var \Bitrix\Sale\Payment $payment */

            foreach ($paymentCollection as $payment)
            {
                if (!$payment->isPaid())
                {
                    $service = \Bitrix\Sale\PaySystem\Manager::getObjectById($payment->getPaymentSystemId());
                    if (!empty($service))
                    {
                        if ($payment->isInner())
                        {
                            $service->initiatePay($payment);
                        }
                        else if (array_key_exists($payment->getPaymentSystemId(), $arResult['PAY_SYSTEM_LIST']))
                        {
                            $arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment->getPaymentSystemId()];
                            ?>
                            <br /><br />

                            <table class="sale_order_full_table">
                                <tr>
                                    <td class="ps_logo">
                                        <div class="pay_name"><?=Loc::getMessage("SOA_PAY")?></div>
                                        <?=CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\" style=\"width:100px\"", "", false)?>
                                        <div class="paysystem_name"><?=$arPaySystem["NAME"]?></div>
                                        <br />
                                    </td>
                                </tr>
                                <? if (strlen($arPaySystem["ACTION_FILE"]) > 0): ?>
                                <tr>
                                    <td>
                                        <? if ($arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
                                        <?
                                        $orderAccountNumber = urlencode(urlencode($order->getField('ACCOUNT_NUMBER')));
                                        $paymentAccountNumber = $payment->getField('ID');
                                        ?>
                                        <script>
                                            window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
                                        </script>
                                        <?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
                                        <? if (CSalePdf::isPdfAvailable() && $service->isAffordPdf()): ?>
                                        <br />
                                        <?=Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
                                    <? endif ?>
                                <? else: ?>
                                <?
                                try
                                {
                                    $service->initiatePay($payment);
                                }
                                catch (Exception $e)
                                {
                                    echo '<span style="color:red;">'.Loc::getMessage("SOA_ORDER_PS_ERROR").'</span>';
                                }
                                ?>
                                <? endif ?>
                                    </td>
                                </tr>
                            <? endif ?>
                            </table>
                        <?}
                        else
                        {
                            echo '<span style="color:red;">'.Loc::getMessage("SOA_ORDER_PS_ERROR").'</span>';
                        }
                    }
                    else
                    {
                        echo '<span style="color:red;">'.Loc::getMessage("SOA_ORDER_PS_ERROR").'</span>';
                    }
                }
            }
        }?>
<? else: ?>
    <b><?=Loc::getMessage("SOA_ERROR_ORDER")?></b>
    <br /><br />

    <table class="sale_order_full_table">
        <tr>
            <td>
                <?=Loc::getMessage("SOA_ERROR_ORDER_LOST", array("#ORDER_ID#" => $arResult["ACCOUNT_NUMBER"]))?>
                <?=Loc::getMessage("SOA_ERROR_ORDER_LOST1")?>
            </td>
        </tr>
    </table>
<? endif ?>
<?$this->SetViewTarget('google_aim_sale_order_ajax_ready');?>
<script>
    dataLayer.push({
        "event": "productsPurchase",
        "ecommerce": {
            "purchase": {
                "actionField": {
                    "id": "<?=$arResult['ORDER']['ID']?>",
                    "revenue": "<?=$arResult['ORDER']['PRICE']?>",
                },
                "products": [
                <?foreach($arItems as $k => $v):?>
                {
                    "name": "<?=$v['NAME']?>",
                    "id": "<?=$v['ID']?>",
                    "price": "<?=$v['PRICE']?>",
                    "variant": "<?=$v['variant']?>",
                    "quantity": <?=$v['QUANTITY']?>,
                }
                <?if($k + 1 < count($arItems)):?>,<?endif;?>
                <?endforeach?>
                ]
            }
        }
    });
</script>
<?
$this->EndViewTarget();
?> 

<?
if (!empty($arResult["ORDER"]) && !empty($arResult["PAYMENT"])) {
$transactionId = $arResult["ORDER"]["ID"];
CModule::IncludeModule('sale');
$res = CSaleBasket::GetList(array(), array("ORDER_ID" => $arResult["ORDER"]["ID"])); // ID заказа

while ($arItem = $res->Fetch()) {
    $arBasketItems[] = $arItem["PRODUCT_ID"];
}
$js_array = json_encode($arBasketItems);  ?>

<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">
window.criteo_q = window.criteo_q || [];
var deviceType = /iPad/.test(navigator.userAgent) ? "t" : /Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Silk/.test(navigator.userAgent) ? "m" : "d";
window.criteo_q.push(
    { event: "setAccount", account: 45351 },
    { event: "setEmail", email: "<? echo $USER->GetEmail(); ?>" },
    { event: "setSiteType", type: deviceType },
    { event: "trackTransaction", ecpplugin: "1cbitrix", id: <? echo $transactionId; ?>, item: <? echo $js_array; ?> }
);

dataLayer.push({
    'event': 'productsPurchase',
    'google_tag_params': {
        'ecomm_prodid': [<? echo $js_array; ?>],
        'ecomm_pagetype': 'purchase',
        'ecomm_totalvalue': '<?=$arResult["ORDER"]["PRICE"]?>';
    }
});
</script> 

<? }; ?>
<?
$user = new CUser;
$fields = Array(
    "NAME"                  => $arProps["NAME"]["VALUE"],
    "LAST_NAME"             => $arProps["LAST_NAME"]["VALUE"],
    "PERSONAL_PHONE"        => $arProps["PHONE"]["VALUE"],
    "PERSONAL_CITY"         => $arProps["CITY"]["VALUE"],
    "PERSONAL_STREET"       => $arProps["STREET"]["VALUE"],
    "PERSONAL_PROFESSION"   => $arProps["HOUSE"]["VALUE"],
);
$user->Update($USER->GetID(), $fields);
?>