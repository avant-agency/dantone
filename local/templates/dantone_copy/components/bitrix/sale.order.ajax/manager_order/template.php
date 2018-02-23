<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 * @var $USER CUser
 * @var $component SaleOrderAjax
 */


if (empty($arParams['TEMPLATE_THEME']))
{
    $arParams['TEMPLATE_THEME'] = \Bitrix\Main\ModuleManager::isModuleInstalled('bitrix.eshop') ? 'site' : 'blue';
}

if ($arParams['TEMPLATE_THEME'] == 'site')
{
    $templateId = \Bitrix\Main\Config\Option::get("main", "wizard_template_id", "eshop_bootstrap", SITE_ID);
    $templateId = preg_match("/^eshop_adapt/", $templateId) ? "eshop_adapt" : $templateId;
    $arParams['TEMPLATE_THEME'] = \Bitrix\Main\Config\Option::get('main', 'wizard_' . $templateId . '_theme_id', 'blue', SITE_ID);
}

if (!empty($arParams['TEMPLATE_THEME']))
{
    if (!is_file($_SERVER['DOCUMENT_ROOT'].'/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
        $arParams['TEMPLATE_THEME'] = 'blue';
}

$arParams["ALLOW_USER_PROFILES"] = $arParams["ALLOW_USER_PROFILES"] == "Y" ? "Y" : "N";
$arParams["SKIP_USELESS_BLOCK"] = $arParams["SKIP_USELESS_BLOCK"] == "N" ? "N" : "Y";
if (!isset($arParams['SHOW_ORDER_BUTTON']))
    $arParams['SHOW_ORDER_BUTTON'] = 'final_step';
$arParams["SHOW_TOTAL_ORDER_BUTTON"] = $arParams["SHOW_TOTAL_ORDER_BUTTON"] == "Y" ? "Y" : "N";
$arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] = $arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_PAY_SYSTEM_INFO_NAME'] = $arParams['SHOW_PAY_SYSTEM_INFO_NAME'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_LIST_NAMES'] = $arParams['SHOW_DELIVERY_LIST_NAMES'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_INFO_NAME'] = $arParams['SHOW_DELIVERY_INFO_NAME'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_PARENT_NAMES'] = $arParams['SHOW_DELIVERY_PARENT_NAMES'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_STORES_IMAGES'] = $arParams['SHOW_STORES_IMAGES'] == 'N' ? 'N' : 'Y';
if (!isset($arParams['BASKET_POSITION']))
    $arParams['BASKET_POSITION'] = 'after';
$arParams['SHOW_BASKET_HEADERS'] = $arParams['SHOW_BASKET_HEADERS'] == 'Y' ? 'Y' : 'N';
$arParams['DELIVERY_FADE_EXTRA_SERVICES'] = $arParams['DELIVERY_FADE_EXTRA_SERVICES'] == 'Y' ? 'Y' : 'N';
$arParams['SHOW_COUPONS_BASKET'] = $arParams['SHOW_COUPONS_BASKET'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_DELIVERY'] = $arParams['SHOW_COUPONS_DELIVERY'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_PAY_SYSTEM'] = $arParams['SHOW_COUPONS_PAY_SYSTEM'] == 'Y' ? 'Y' : 'N';
$arParams['SHOW_NEAREST_PICKUP'] = $arParams['SHOW_NEAREST_PICKUP'] == 'Y' ? 'Y' : 'N';
$arParams['DELIVERIES_PER_PAGE'] = intval($arParams['DELIVERIES_PER_PAGE']);
$arParams['PAY_SYSTEMS_PER_PAGE'] = intval($arParams['PAY_SYSTEMS_PER_PAGE']);
$arParams['PICKUPS_PER_PAGE'] = intval($arParams['PICKUPS_PER_PAGE']);
$arParams['SHOW_MAP_IN_PROPS'] = $arParams['SHOW_MAP_IN_PROPS'] == 'Y' ? 'Y' : 'N';
$arParams['USE_YM_GOALS'] = $arParams['USE_YM_GOALS'] == 'Y' ? 'Y' : 'N';

if ($arParams["USE_CUSTOM_MAIN_MESSAGES"] != "Y")
{
    $arParams['MESS_AUTH_BLOCK_NAME'] = Loc::getMessage("AUTH_BLOCK_NAME_DEFAULT");
    $arParams['MESS_REG_BLOCK_NAME'] = Loc::getMessage("REG_BLOCK_NAME_DEFAULT");
    $arParams['MESS_BASKET_BLOCK_NAME'] = Loc::getMessage("BASKET_BLOCK_NAME_DEFAULT");
    $arParams['MESS_REGION_BLOCK_NAME'] = Loc::getMessage("REGION_BLOCK_NAME_DEFAULT");
    $arParams['MESS_PAYMENT_BLOCK_NAME'] = Loc::getMessage("PAYMENT_BLOCK_NAME_DEFAULT");
    $arParams['MESS_DELIVERY_BLOCK_NAME'] = Loc::getMessage("DELIVERY_BLOCK_NAME_DEFAULT");
    $arParams['MESS_BUYER_BLOCK_NAME'] = Loc::getMessage("BUYER_BLOCK_NAME_DEFAULT");
    $arParams['MESS_BACK'] = Loc::getMessage("BACK_DEFAULT");
    $arParams['MESS_FURTHER'] = Loc::getMessage("FURTHER_DEFAULT");
    $arParams['MESS_EDIT'] = Loc::getMessage("EDIT_DEFAULT");
    $arParams['MESS_ORDER'] = Loc::getMessage("ORDER_DEFAULT");
    $arParams['MESS_PRICE'] = Loc::getMessage("PRICE_DEFAULT");
    $arParams['MESS_PERIOD'] = Loc::getMessage("PERIOD_DEFAULT");
    $arParams['MESS_NAV_BACK'] = Loc::getMessage("NAV_BACK_DEFAULT");
    $arParams['MESS_NAV_FORWARD'] = Loc::getMessage("NAV_FORWARD_DEFAULT");
}

if ($arParams["USE_CUSTOM_ADDITIONAL_MESSAGES"] != "Y")
{
    $arParams['MESS_REGISTRATION_REFERENCE'] = Loc::getMessage("REGISTRATION_REFERENCE_DEFAULT");
    $arParams['MESS_AUTH_REFERENCE_1'] = Loc::getMessage("AUTH_REFERENCE_1_DEFAULT");
    $arParams['MESS_AUTH_REFERENCE_2'] = Loc::getMessage("AUTH_REFERENCE_2_DEFAULT");
    $arParams['MESS_AUTH_REFERENCE_3'] = Loc::getMessage("AUTH_REFERENCE_3_DEFAULT");
    $arParams['MESS_ADDITIONAL_PROPS'] = Loc::getMessage("ADDITIONAL_PROPS_DEFAULT");
    $arParams['MESS_USE_COUPON'] = Loc::getMessage("USE_COUPON_DEFAULT");
    $arParams['MESS_COUPON'] = Loc::getMessage("COUPON_DEFAULT");
    $arParams['MESS_PERSON_TYPE'] = Loc::getMessage("PERSON_TYPE_DEFAULT");
    $arParams['MESS_SELECT_PROFILE'] = Loc::getMessage("SELECT_PROFILE_DEFAULT");
    $arParams['MESS_REGION_REFERENCE'] = Loc::getMessage("REGION_REFERENCE_DEFAULT");
    $arParams['MESS_PICKUP_LIST'] = Loc::getMessage("PICKUP_LIST_DEFAULT");
    $arParams['MESS_NEAREST_PICKUP_LIST'] = Loc::getMessage("NEAREST_PICKUP_LIST_DEFAULT");
    $arParams['MESS_SELECT_PICKUP'] = Loc::getMessage("SELECT_PICKUP_DEFAULT");
    $arParams['MESS_INNER_PS_BALANCE'] = Loc::getMessage("INNER_PS_BALANCE_DEFAULT");
    $arParams['MESS_ORDER_DESC'] = Loc::getMessage("ORDER_DESC_DEFAULT");
}

if ($arParams["USE_CUSTOM_ERROR_MESSAGES"] != "Y")
{
    $arParams['MESS_DELIVERY_CALC_ERROR_TITLE'] = Loc::getMessage("DELIVERY_CALC_ERROR_TITLE_DEFAULT");
    $arParams['MESS_DELIVERY_CALC_ERROR_TEXT'] = Loc::getMessage("DELIVERY_CALC_ERROR_TEXT_DEFAULT");
}

$scheme = \Bitrix\Main\Context::getCurrent()->getRequest()->isHttps() ? 'https' : 'http';
switch (LANGUAGE_ID)
{
    case 'ru':
    $locale = 'ru-RU'; break;
    case 'ua':
    $locale = 'ru-UA'; break;
    case 'tk':
    $locale = 'tr-TR'; break;
    default:
    $locale = 'en-US'; break;
}




$context = Bitrix\Main\Application::getInstance()->getContext();
if (strlen($context->getRequest()->get('ORDER_ID')) > 0):
    include($context->getServer()->getDocumentRoot().$templateFolder."/confirm.php");
elseif ($arParams["DISABLE_BASKET_REDIRECT"] == 'Y' && $arResult["SHOW_EMPTY_BASKET"]):
    include($context->getServer()->getDocumentRoot().$templateFolder."/empty.php");
else:
    $hideDelivery = empty($arResult["DELIVERY"]);


?>

<div class="errors">
    <ul>
    </ul>
</div>

<form action="<?=$APPLICATION->GetCurPage();?>" class="order-form" method="POST" name="ORDER_FORM" id="bx-soa-order-form" enctype="multipart/form-data">
    <?=bitrix_sessid_post()?>
    <?
    if (strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
        echo $arResult["PREPAY_ADIT_FIELDS"];
    ?>
    <input type="hidden" name="PRICE_DELIVERY" id="price_delivery_id" value="0">
    <input type="hidden" name="PRICE_PREPAYMENT" id="price_prepayment_id" value="0">
    <input type="hidden" name="action" value="saveOrderAjax">
    <input type="hidden" name="location_type" value="code">
    <input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="0">
    <?foreach($arResult["PERSON_TYPE"] as $v)
    {
        ?>
        <input type="hidden" id="PERSON_TYPE" name="PERSON_TYPE" value="<?=$v["ID"]?>" />
        <input type="hidden" name="PERSON_TYPE_OLD" value="<?=$v["ID"]?>" />
        <?
    }

    ?>

    <div class="tabs-container">

        <ul class="tabs paneble">
            <li class="active"><span><span class="number">1</span><?=GetMessage('ORDER_PERSONAL')?></span></li>
            <li><span><span class="number">2</span><?=GetMessage('ORDER_DELIVERY')?></span></li>
            <li><span><span class="number">3</span><?=GetMessage('ORDER_PAYMENT')?></span></li>
        </ul>

        <div class="panes ">

          <div class="pane active">
            <div class="confirm-form">


<?/*                
              <div class="help-form">
                <div class="help-form-calculate" id="delivery_description">
                  <div class="hfc-info" style="color: #111e35;font-size: 14px;margin-bottom: 16px;">
                    К оплате: <span class="hfc-price" style="font-size: 16px;font-weight: 700;">  
                    <span class="hfc-price-value" style="font-size:36px;">
                      <?=substr_replace(substr_replace($arResult["ORDER_TOTAL_PRICE"], " ", -3, 0), " ", -7,0)?> 
                    </span> руб.</span>
                    <?
                        global $numWindow;
                        $numWindow = 1;
                        include('coupon.php')?>
                    </div>
                  <div class="hfc-warning" style="color:#666666;font-weight:300;font-size:14px;">
                    Сумма указана без учета доставки
                  </div>
                  <br/><br/>
                </div>
                <?=GetMessage('ORDER_PERSONAL_TEXT')?>
              </div>
*/?>


                    <div class="form-container">
                        <div class="control-group">
                            <div class="control">
                                <input type="text" name="ORDER_PROP_8" id="ORDER_PROP_8" class="input-text" placeholder="<?=GetMessage('ORDER_FULL_NAME_SHORT')?>" data-name="<?=GetMessage('ORDER_FULL_NAME_SHORT')?>" value="<?=isset($arResult["USER"]) ? $arResult["USER"]["NAME"] : "";?>">                                    
                                <div class="help-inline help-small"><?=GetMessage('ORDER_FULL_NAME')?></div>
                            </div>
                            <div class="control">
                                <input type="text" name="ORDER_PROP_9" class="input-text" placeholder="<?=GetMessage('ORDER_LAST_NAME_SHORT')?>"  data-name="<?=GetMessage('ORDER_LAST_NAME_SHORT')?>"  value="<?=isset($arResult["USER"]) ? $arResult["USER"]["LAST_NAME"] : "";?>">                                    
                                <div class="help-inline help-small"><?=GetMessage('ORDER_LAST_NAME')?></div>
                            </div>
                            <div class="control">
                                <input type="email" name="ORDER_PROP_2" class="input-text" placeholder="E-mail" data-name="E-mail" data-rule="email" value="<?=isset($arResult["USER"]) ? $arResult["USER"]["EMAIL"] : "";?>">                                    
                                <div class="help-inline help-small"><?=GetMessage('ORDER_EMAIL')?></div>
                            </div>
                            <div class="control">
                                <input type="text" name="ORDER_PROP_3" class="input-text phone-input" placeholder="<?=GetMessage('ORDER_PHONE_SHORT')?>" data-name="<?=GetMessage('ORDER_PHONE_SHORT')?>" value="<?=isset($arResult["USER"]["PERSONAL_PHONE"]) ? $arResult["USER"]["PERSONAL_PHONE"] : "";?>">                                   
                                <div class="help-inline help-small"><?=GetMessage('ORDER_PHONE')?></div>
                            </div>
                            <div class="control">
                                <?
                                    $APPLICATION->IncludeComponent("bitrix:sale.ajax.locations", "locations", array( "CITY_OUT_LOCATION" => "Y", "ALLOW_EMPTY_CITY" => "Y", 
                                        "COUNTRY_INPUT_NAME" => "COUNTRY", "REGION_INPUT_NAME" => "REGION", "CITY_INPUT_NAME" => "LOCATION", "COUNTRY" => "1", 
                                        "ONCITYCHANGE" => "", "NAME" => "", "COMPONENT_TEMPLATE" => "popup"), false);
                                ?>
                                <input style="display:none;" type="text" id="ORDER_PROP_5" name="ORDER_PROP_5" data-name="<?=GetMessage('ORDER_CITY_SHORT')?>">
                                <div class="help-inline help-small" style="margin-top:15px;margin-left:15px;"><?=GetMessage('ORDER_CITY')?></div>
                            </div>
                        </div>

                        <div class="pane-errors">
                            <ul></ul>
                        </div>
                                <input  type="hidden" name="ORDER_PROP_22" value="N"/>
                                <div class="control-group">

                                    <?/*
                                    <div class="control">  
                                        <label class="checkbox a-checkbox privacy-checkbox"><input class="required" data-name="<?=GetMessage('ORDER_PRIVACY')?>" type="checkbox" required="required" name="ORDER_PROP_22" value="Y"/></label>
                                        <div class="privacy-check"><?$APPLICATION->IncludeComponent(
                                            "bitrix:main.include",
                                            "",
                                            Array(
                                                "AREA_FILE_SHOW" => "file",
                                                "AREA_FILE_SUFFIX" => "inc",
                                                "EDIT_TEMPLATE" => "",
                                                "PATH" => SITE_DIR."include/privacy.php"
                                                )
                                                );?>
                                        </div>
                                    </div>
                                    */?>
                                    <?/*
                                    <div class="control-btn">
                                        <button onclick="changePane(2); return false;" class="btn btn-blue btn-medium input-medium"><?=GetMessage('ORDER_CHOOSE_DELIVERY')?> <i class="icon-next"></i></button>
                                    </div>
                                    */?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pane">
                         <div class="confirm-form" method="post">
                            <div class="help-form">
                              <div class="help-form-calculate">
                                <div class="hfc-info" style="color: #111e35;font-size: 14px;margin-bottom: 16px;">
                                К оплате: <span class="hfc-price" style="font-size: 16px;font-weight: 700;">  
                                    <span class="hfc-price-value" style="font-size:36px;">
                                        <?=substr_replace(substr_replace($arResult["ORDER_TOTAL_PRICE"], " ", -3, 0), " ", -7,0)?> 
                                    </span> руб.</span>
                                </div>
                                <div class="hfc-info" style="color: #111e35;font-size: 14px;margin-bottom: 16px;">
                                    Предоплата: <span class="hfc-price" style="font-size: 16px;font-weight: 700;">  
                                    <span class="prepayment" style="font-size:36px;">             
                                    </span> руб.</span>
                                </div>
                                <div class="hfc-warning" style="color:#666666;font-weight:300;font-size:14px;">
                                    Сумма указана без учета доставки
                                </div>
                                <br/><br/>
                              </div>
                            </div>

                          <div class="form-container">
                            <div class="control-group control-group-radio clearfix" id="deliveryTypesBlock">
                              <div class="help-inline help-small"><?=GetMessage('ORDER_DELIVERY_TITLE')?></div>
                                <br />


                              <div class="control">
                                <label class="radio a-radio">
                                    <input checked type="radio" name="DELIVERY_ID" value="2" data-ourdelivery="1" data-selfdelivery="0" data-customdelivery="0" style="position: absolute; left: -9999px;">
                                    <?=GetMessage('ORDER_DELIVERY_TRANSPORT')?> 
                                </label>
                  
                                <div class="help-inline"><a class="conditions" target="_blank" href="/delivery/">Условия доставки</a></div>
                              </div>
                                <?/*if($arResult["PICKUP_AVAILABLE"]):?>
                                <div class="control" style="display:none;" id="pickup_moskow_and_mo">
                                        <label class="radio a-radio">
                                            <input type="radio" name="DELIVERY_ID" value="3" data-ourdelivery="0" data-selfdelivery="1" data-customdelivery="0" style="position: absolute; left: -9999px;">
                                            <?=GetMessage('ORDER_DELIVERY_SELF')?>                                 
                                        </label>
                                    </div>
<?endif;*/?>
                                <div class="control">
                                  <label class="radio a-radio">
                                      <input type="radio" name="DELIVERY_ID" value="16" data-ourdelivery="0" data-selfdelivery="0" data-customdelivery="1" style="position: absolute; left: -9999px;">
                                      <?=GetMessage('ORDER_DELIVERY_OTHER')?>
                                  </label>

                              </div>

                            <div class="control-group" id="addressBlock2" style="display: none;">
                                  <div class="calculate-div control-group" style="display: block;" style="margin-bottom:34px;text-align:left;font-weight: 400;margin-top: 10px;padding-top: 17px;padding-bottom: 20px;border-top: 1px solid #efeeef;border-bottom: 1px solid #efeeef;" id="our_delivery_description">
                                  <div class="calc-div-title">
                                    Стоимость доставки:
                                  </div>
                                  <div class="calc-div-block">
                                    По Москве  <span style="font-weight: 700;">2000</span> руб.
                                  </div>
                                  <div class="calc-div-block">
                                    По Московской области  <span style="font-weight: 700;">2000+50</span>  руб./км  от МКАД.
                                  </div>
                                    <div class="calc-div-calculate">
                                        <div class="cdc-title">
                                          Рассчитать доставку
                                        </div>
                                        <div class="cdc-calculate">
                                            2000 руб + 50 руб * <input name="distance" type="text" value="0" class="cdc-input" pattern="^\d+(\.|\.\d+)?$"> км =  <span class="cdc-itog"> 2000</span> руб.
                                        </div>
                                    </div>
                                </div>                       
                                    <div class="control" style="margin-right: 0px;padding-right: 90px;">
                                      <input type="text" data-name="<?=GetMessage('ORDER_ADDRESS_CITY')?>" name="ORDER_PROP_13" placeholder="<?=GetMessage('ORDER_ADDRESS_CITY')?>*" class="city-input input-text" value="<?=$arResult["USER"]["PERSONAL_CITY"]?>">
                                      <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_CITY_COMMENT1')?></div>
                                    </div>
                                    <div class="control" style="margin-right: 0px;padding-right: 90px;">
                                      <input type="text" data-name="<?=GetMessage('ORDER_ADDRESS_STREET')?>" name="ORDER_PROP_14" placeholder="<?=GetMessage('ORDER_ADDRESS_STREET')?>*" class=" input-text" value="<?=$arResult["USER"]["PERSONAL_STREET"]?>">
                                      <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_STREET_COMMENT')?></div>
                                    </div>
                                    <div class="control" style="margin-right: 0px;padding-right: 90px;">
                                      <input type="text" data-name="Дом" name="ORDER_PROP_15" placeholder="<?=GetMessage('ORDER_ADDRESS_HOUSE')?>*" class=" input-text input-small2" value="<?=$arResult["USER"]["PERSONAL_PROFESSION"]?>">
                                      <input type="text" name="ORDER_PROP_17" placeholder="<?=GetMessage('ORDER_ADDRESS_KORPUS')?>" class="input-text input-small2">
                                      <input type="text" name="ORDER_PROP_18" placeholder="<?=GetMessage('ORDER_ADDRESS_FLAT')?>" class="input-text input-small2">
                                    </div>
                                <?/*<div class="control" style="margin-right: 0px;padding-right: 90px;">
                                      <input type="text" name="ORDER_PROP_4" placeholder="<?=GetMessage('ORDER_ADDRESS_INDEX')?>" data-name="<?=GetMessage('ORDER_ADDRESS_INDEX')?>" class=" input-text" value="<?=$arResult["USER"]["PERSONAL_ZIP"]?>">
                                      <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_KNOWINDEX')?> <a href="http://indexp.ru/" class="nounderline" target="_blank"><?=GetMessage('ORDER_ADDRESS_FINDINDEX')?></a></div>
                                    </div>
                                    */?>
                                    <div class="control" style="margin-right: 0px;padding-right: 90px;">
                                      <textarea name="ORDER_PROP_16" placeholder="<?=GetMessage('ORDER_ADDRESS_COMMENT')?>" class="input-text" cols="30" rows="6">
                                      </textarea>
                                      <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_COMMENT_COMMENT')?></div>
                                    </div>
                                </div>

<!--
                              <div class="control">
                                  <label class="radio a-radio">
                                      <input type="radio" name="DELIVERY_ID" value="16" data-ourdelivery="0" data-selfdelivery="0" data-customdelivery="1" style="position: absolute; left: -9999px;">
                                      <?=GetMessage('ORDER_DELIVERY_OTHER')?>
                                  </label>
                              </div>
-->
                              <div class="control" id="customDeliveryBlock" style="display: none;">
                                <input type="text" name="ORDER_PROP_11" class="input-text" style="width: 280px;" value="" placeholder="<?=GetMessage('ORDER_DELIVERY_INPUT')?>" name="customDelivery">
                              </div>
                            </div>

                            <div class="control-group" id="addressBlock" style="display: none;">
                                  <!-- <div class="control">
                                    <input type="text" name="ORDER_PROP_12" placeholder="<?=GetMessage('ORDER_ADDRESS_REGION')?>" class="input-text" value="" disabled="">
                                    <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_REGION_COMMENT')?></div>
                                </div> -->
                                <div class="control">
                                  <input type="text" data-name="<?=GetMessage('ORDER_ADDRESS_CITY')?>" name="ORDER_PROP_13" placeholder="<?=GetMessage('ORDER_ADDRESS_CITY')?>*" class="city-input input-text" value="" disabled="" value="<?=$arResult["USER"]["PERSONAL_CITY"]?>">
                                  <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_CITY_COMMENT')?></div>
                                </div>
                                <div class="control">
                                  <input type="text" data-name="<?=GetMessage('ORDER_ADDRESS_STREET')?>" name="ORDER_PROP_14" placeholder="<?=GetMessage('ORDER_ADDRESS_STREET')?>*" class=" input-text" value="" disabled="" value="<?=$arResult["USER"]["PERSONAL_STREET"]?>">
                                  <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_STREET_COMMENT')?></div>
                                </div>
                                <div class="control">
                                  <input type="text" data-name="Дом" name="ORDER_PROP_15" placeholder="<?=GetMessage('ORDER_ADDRESS_HOUSE')?>*" class=" input-text input-small2" value="" disabled="">
                                  <input type="text" name="ORDER_PROP_17" placeholder="<?=GetMessage('ORDER_ADDRESS_KORPUS')?>" class="input-text input-small2" value="" disabled="">
                                  <input type="text" name="ORDER_PROP_18" placeholder="<?=GetMessage('ORDER_ADDRESS_FLAT')?>" class="input-text input-small2" value="" disabled="">
                                </div>
                                <?/*
                                <div class="control">
                                  <input type="text" name="ORDER_PROP_4" placeholder="<?=GetMessage('ORDER_ADDRESS_INDEX')?>" data-name="<?=GetMessage('ORDER_ADDRESS_INDEX')?>" class=" input-text" value="<?=$arResult["USER"]["PERSONAL_ZIP"]?>" disabled="">
                                  <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_KNOWINDEX')?> <a href="http://indexp.ru/" class="nounderline" target="_blank"><?=GetMessage('ORDER_ADDRESS_FINDINDEX')?></a></div>
                                </div>
                                */?>
                                <div class="control">
                                  <textarea name="ORDER_PROP_16" placeholder="<?=GetMessage('ORDER_ADDRESS_COMMENT')?>" class="input-text" cols="30" rows="6" disabled=""></textarea>
                                  <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_COMMENT_COMMENT')?></div>
                                </div>
                            </div>
                            <div class="pane-errors">
                                <ul></ul>
                            </div>
    <?/*
      <div class="control-btn">
        <button onclick="changePane(3); return false;" class="delivery_step_button btn btn-blue btn-medium input-medium"><?=GetMessage('ORDER_PAYMENT_CHOOSE')?> <i class="icon-next"></i></button>
      </div>
      */?>
    </div>
  </div>
</div>

<div class="pane last">
    <div class="confirm-form" >
            <div class="help-form">
                <div class="help-form-calculate">
                  <div class="hfc-info" style="color: #111e35;font-size: 14px;margin-bottom: 16px;">
                    К оплате: <span class="hfc-price" style="font-size: 16px;font-weight: 700;">  
                    <span id="price-value-last" class="hfc-price-value" style="font-size:36px;">
                      <?=substr_replace(substr_replace($arResult["ORDER_TOTAL_PRICE"], " ", -3, 0), " ", -7,0)?> 
                    </span> руб.</span>
                  </div>
                  <div class="hfc-info" style="color: #111e35;font-size: 14px;margin-bottom: 16px;">
                    Предоплата: <span class="hfc-price" style="font-size: 16px;font-weight: 700;">  
                    <span class="prepayment" style="font-size:36px;"></span> руб.</span>
                  </div>
                  <div class="hfc-warning" style="color:#666666;font-weight:300;font-size:14px;">
                    Сумма указана без учета доставки
                  </div>
                </div>
            </div>


            <div class="form-container">
              <div class="control-group control-group-radio clearfix">
                <div class="help-inline help-small">Способ оплаты заказанных товаров</div>
                <div class="control selected">
                    <label class="radio a-radio">
                    <input type="radio" name="PAY_SYSTEM_ID" value="3" style="position: absolute; left: -9999px;">
                        <?=GetMessage('ORDER_PAYMENT_BANK')?>
                    </label>
                </div>
                <div class="calc-div-calculate" style="background-color: #efeeef; padding: 11px 18px 18px 18px; border-radius: 4px;">
                    <div class="calc-div-title">
                        Рассчитать сумму предоплаты:
                    </div>
                    <div class="pp-calculate">
                        <input name="prepayment_percentage" type="text" value="0" class="pp-input" pattern="\d+(\.|\.\d{1})?"> % = <span class="pp-itog">0</span> руб.
                    </div>
                </div>

                <?/*
                <div class="control">
                  <label class="radio a-radio">
                    <input type="radio" checked="checked" name="PAY_SYSTEM_ID" value="1" style="position: absolute; left: -9999px;">
                    <?=GetMessage('ORDER_PAYMENT_CASH')?>
                  </label>
                </div>
                <div class="control">
                  <label class="radio a-radio">
                    <input type="radio" name="PAY_SYSTEM_ID" value="4" style="position: absolute; left: -9999px;">
                    <?=GetMessage('ORDER_PAYMENT_NOCASH')?>
                  </label>
                </div>
                */?>
              </div>

              <div class="control-group">
                <div class="control">
                    <textarea name="ORDER_PROP_20" placeholder="<?=GetMessage('ORDER_COMMENT')?>" class="input-text" cols="30" rows="6"></textarea>
                    <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_COMMENT_COMMENT')?></div>
                </div>
              </div>

              <div class="want-subscribe">
                <label class="checkbox a-checkbox">
                    <input  type="checkbox" checked="checked" name="ORDER_PROP_21" value="Y"/>Отправить ссылку по почте
                </label>
              </div>

              <div class="control-btn">
                <button onclick="submitOrder(); return false;" class="btn btn-blue btn-medium input-medium subOrder">Сгенерировать ссылку<i class="icon-next"></i></button>
              </div>
              <div id="link_blok" style="margin-top: 15px;">
                <p id="link_order"></p>
              </div>
              <div class="pane-errors">
              <ul></ul>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">
<?  global $USER;
    CModule::IncludeModule('sale');
    $res = CSaleBasket::GetList(array(), array("ORDER_ID" => $arResult["ORDER"]["ID"])); // ID заказа

    while ($arItem = $res->Fetch()) {
        $arBasketItems[] = $arItem["PRODUCT_ID"];
    }

    $js_array = json_encode($arBasketItems);
?>
function criteoEvent(){

    window.criteo_q = window.criteo_q || [];
    window.criteo_q.push(
        { event: "setAccount", account: 45351 },
        { event: "setEmail", email: [<?=$USER->GetEmail()?>] },
        { event: "setSiteType", type: "d" },
        { event: "trackTransaction", id: Math.round(Math.random()*1000000000),
           item: <? echo $js_array; ?>
       }
 );

}
</script>
<script>
        /*Enter Cupon*/
function addSpaces(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
    return x1 + x2;
}

    function enterThisCoupon(coupon) //Добавление купона на скидку
        {
            var newCoupon = $('#'+coupon).find("input");
            var zn = newCoupon.val();
            $.ajax({
                url: '/ajax/setCoupon.php',
                data: {'coupon' : zn},
                type: "post",
                success: function(response) {
                console.log(response);
                location.reload();
                }
            })
        }
        $(function() { 



            $('.good').click(function(){ //Деактивация действующего купона на скидку
            var coupon = $(this).attr('data-coupon');
                $.ajax({
                        url: '/ajax/eraseCoupon.php',
                        data: {'coupon' : coupon},
                        type: "post",
                        success: function(response) {
                        console.log(response);
                        location.reload();
                        }
                    })
        });

        $('.pane').not('.active').hide();

        var radios = $('#deliveryTypesBlock input[type="radio"]');
        radios.change(function () {
          var radio = $(this);
          var ourdelivery = radio.data('ourdelivery');
          var selfDelivery = radio.data('selfdelivery');
          var customDelivery = radio.data('customdelivery');

          var addressBlock = $('#addressBlock');
          if(ourdelivery){
            $("#our_delivery_description").show(500);
            $("#addressBlock2").show(500);
            $("#addressBlock").hide(500);
          }
          else{
            $("#addressBlock2").hide(500);
            $("#our_delivery_description").hide(500);
            if (selfDelivery == 1) {
              addressBlock.hide(500);
              //addressBlock.find('input').val("<?=GetMessage('ORDER_DELIVERY_TRANSPORT')?>");
              addressBlock.find('textarea').val("");
            } else {
              addressBlock.show(500);
              addressBlock.find('input').prop('disabled', false);
              addressBlock.find('textarea').prop('disabled', false);
            }
          }

          var customDeliveryBlock = $('#customDeliveryBlock');
          if (customDelivery == 1) {
            customDeliveryBlock.show(500);
          } else {
            customDeliveryBlock.hide(500);
            customDeliveryBlock.find('input').val('');
          }
        });

        $('#deliveryTypesBlock input[type="radio"]:checked').change();

        $(".cdc-input").on("keyup", function(e){
          var pr = true;
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
              (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
              (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
              (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
              (e.keyCode >= 35 && e.keyCode <= 39)) {
                  pr = false;
                  return;
              }
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              pr = false;
              e.preventDefault();
          }
          if(pr){
            // set price of delivery
            var price = $(".cdc-input").val() * 50 + 2000;
            $("#price_delivery_id").val(price);
            $(".cdc-itog").text(price);
          }
          if($(".cdc-input").val().length == 0) $(".cdc-itog").text("2000");
      });



        //расчет процента предоплаты
        $('.pp-input').keyup(function(e){
            this.value = this.value.replace(/[^0-9.]/, '');

            var totalPrice = parseFloat(order_price.replace(/\s/g, ''));
            var percent = parseFloat($(".pp-input").val());
            if(!isNaN(percent)) {
                if(percent>100){
                    percent = 100;
                    $(".pp-input").val(percent);
                }
                var prepayment = totalPrice * percent / 100;
                $('.pp-itog').text(prepayment);
                $('#price_prepayment_id').val(prepayment);
            }else{
                $('.pp-itog').text("0");
            }

            if($(".pp-input").val().length == 0) 
                $(".pp-itog").text("0");
        });

        $("#bx-soa-order-form .pane.last .control:first label").click();

            // var order_price = "<?=$arResult['ORDER_TOTAL_PRICE']?>";
            //var order_price = "<?=$arResult['ORDER_TOTAL_PRICE_FORMATED']?>".replace(" руб.","");
            /*
        setInterval(function(){
            $("#ORDER_PROP_5").val($("#LOCATION_val").val());
            if($("#ORDER_PROP_5").val().search("Московская область") != -1 || $("#ORDER_PROP_5").val().search("Москва") != -1 || 
                $("#ORDER_PROP_5").val().search("москва") != -1)
            {
                // отображаем самовывоз
                $("#pickup_moskow_and_mo").css("display", 'block');
            }
            else
            {   
                // скрываем самовывоз
                $("#pickup_moskow_and_mo").css("display", 'none');
            }

            // описание в левом сайдбаре
            if($(".tabs.paneble li.active").text() == "1Личные данные")
            {
                $("#delivery_description .hfc-price-value").text(order_price + " ");
                $("#delivery_description .hfc-warning").text("Сумма указана без учета доставки");
            }
            else
            {
                var summop = parseFloat(order_price.replace(/\s/g, '')) + parseFloat($("#our_delivery_description .cdc-itog").text().trim());

                switch($("#deliveryTypesBlock .control input[name='DELIVERY_ID']:checked").val())
                {
                    case "2": // Доставка Дантона
                        // get delivery price
                        // $(".hfc-price-value").text((parseFloat(op) + parseFloat($("#our_delivery_description .cdc-itog").text().trim())) + " ");
                        $(".hfc-price-value").text(addSpaces(summop) + " ");
                      $(".hfc-warning").text("Цена доставки: " + $("#our_delivery_description .cdc-itog").text().trim() + "р.");
                    break;
                    case "3": // Самовывоз
                        $(".hfc-price-value").text(addSpaces(order_price) + " ");
                        $(".hfc-warning").text("Сумма указана без учета доставки");
                    break; 
                    case "16": // Доставка ТК
                        $(".hfc-price-value").text(addSpaces(order_price) + " ");
                        $(".hfc-warning").text("Сумма указана без учета доставки");
                    break;

                }
            }
        }, 500);
            */
        $("#addressBlock input").change(function(e,i){
            $("#addressBlock2 input[name='"+$(this).attr('name')+"']").val($(this).val());
        });
        $("#addressBlock2 input").change(function(e,i){
            $("#addressBlock input[name='"+$(this).attr('name')+"']").val($(this).val());
        });
        $("#addressBlock text-area").change(function(e,i){
            $("#addressBlock2 text-area[name='"+$(this).attr('name')+"']").text($(this).text());
        });
        $("#addressBlock2 text-area").change(function(e,i){
            $("#addressBlock text-area[name='"+$(this).attr('name')+"']").text($(this).text());
        });
    });



    function submitOrder(){
        if($("#deliveryTypesBlock .selected input[name='DELIVERY_ID']").data("ourdelivery") != 1){
            $("#price_delivery_id").val(0);
        }else{ 
            var price = $(".cdc-input").val() * 50 + 2000;
            $("#price_delivery_id").val(price);
        }

        var isSend = false;
        if($('input[name="ORDER_PROP_21"]').is(':Checked')){
            if($('input[type="email"]').val()===""){
                alert("Укажите, пожалуйста, e-mail на шаге 1 – личные данные");
                return false;
            }else{
                isSend = true;
            }
        }

        var data = $('form[name="ORDER_FORM"]').serialize();
        $.ajax({
            type: "post",
            url: "save_deferred_orders.php",
            data: data,
            success: function(response) {
                $(".subOrder").css("display","none");
                $('#link_order').text(response);
                if(isSend){ 
                    send_mail(response);
                }else{
                    alert("Нажмите на ссылку чтобы скопировать ее.");
                }
            }
        });


        var copyLink = document.querySelector('#link_blok');
        //копирование ссылки в буфер обмена
        copyLink.addEventListener('click', function(event) {  
            var orderLink = document.querySelector('#link_order');  
            var range = document.createRange();  
            range.selectNode(orderLink);  
            window.getSelection().addRange(range);  
            try {  
                var successful = document.execCommand('copy');  
                if(!successful) 
                    console.log('Ошибка автоматического копирования в буфер обмена');    
            }catch(err) {  
                console.log('Ошибка автоматического копирования в буфер обмена');  
            }  
            window.getSelection().removeRange(range);  
        });


        function send_mail(response){
            $.ajax({
                type: "post",
                url: "send_msg.php",
                data: {"email": $('input[type="email"]').val(), "link_order":response},
                success: function(data){
                    if(data=='')
                        alert("На указанный e-mail отправлена ссылка для оплаты");
                    else
                        alert(data);
                }
            });
        }
        return false;
    }

    function validatePane($node, requiredClass) {

        var errors = [];

        $node.find('input').each(function() {
            var $this = $(this);

            if($this.hasClass(requiredClass)) {
                var rule = $this.attr('data-rule') || null;

                if($this.val() == "" || ($this.is('[type="checkbox"]') && !$this.is(':checked'))) {
                    $this.addClass('error');
                    errors.push("<?=GetMessage('ORDER_FIELD')?> '" + $this.attr('data-name') + "' <?=GetMessage('ORDER_REQUIRED')?>");
                } else {

                    if(rule == "email") {
                        if(!validateEmail($this.val())) {
                            $this.addClass('error');
                            errors.push("<?=GetMessage('ORDER_WRONG_EMAIL')?>");
                        } else {
                            $this.removeClass('error')
                        }
                    } else {
                        $this.removeClass('error')
                    }
                }
            }

        });

        return errors || false;
    }

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function changePane(index) {
        /*
        var pr = true;
        if(index == 3 && $('#deliveryTypesBlock input[type="radio"]:checked').val() != 3)
        {
            var price = $(".cdc-input").val() * 50 + 2000;
            $("#price_delivery_id").val(price);
            $(".cdc-itog").text(price);
        }
        if(!pr){
            return false;
        }
        $('.pane').eq(index-2).find('.pane-errors ul').html('');
        var $pane = $('.pane').eq(index - 2);
        errors = validatePane($pane, "required")
        if(errors.length) {
            for(var i = 0, l = errors.length; i < l; ++i) {
                $('.pane').eq(index-2).find('.pane-errors ul').append($("<li>" + errors[i] + "</li>"));
            }
            return false;
        } 

        var $pane = $('.pane');
        var $tabs = $('.tabs li');
        $pane.removeClass('active').hide();
        $pane.eq(index - 1).addClass('active').show();
        $tabs.removeClass('active').removeClass('success');
        $tabs.eq(index - 1 ).addClass('active');

        $tabs.each(function() {
            if($(this).index() < (index - 1)) {
                $(this).addClass('success');
            }
        }) 
        */
    }


</script>

<style>
  .control-group {
    margin-bottom: 34px;
    text-align: left;
  }
  
  .calculate-div {
    font-weight: 400;
    margin-top: 10px;
    margin-bottom: 10px;
    padding-top: 17px;
    padding-bottom: 20px;
    border-top: 1px solid #efeeef;
    border-bottom: 1px solid #efeeef;
  }
  .calc-div-title {
    margin-bottom: 16px;
  }
  .calc-div-block {
    font-size: 14px;
    margin-bottom: 14px;
  }
  .pane:nth-of-type(2) .calc-div-calculate {
    background-color: #efeeef;
    padding: 11px 18px 18px 18px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
  }
  .pane:nth-of-type(2) .cdc-title {
    margin-bottom: 14px;
  }
  .pane:nth-of-type(2) .cdc-input {
    width: 36px;
    height: 20px;
    text-align: center;
    border: none;
    color: #c4c2c3;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
  }
  .pane:nth-of-type(2) .control-group-radio {
    width: 360px !important;
    max-width: 100%;
  }

    /***COUPON STYLES**/
.bx_ordercart_coupon span.good {
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAANCAYAAABPeYUaAAAAoklEQVQ4y2NgIBOUb7JkY6AEAA0wBuJHQGxHrgFWQPwBiP8D8WcgliTVAHuoRpAB/4A4E10BDwED3ID4K9SAP0CciK7ACYhfg2gcBvgA8Q8kA6LQFQgB8Seogq/oBgH5QUD8EyoPooNwOTUMagOKQSAbkcRBLvEhFGjoBvWi8V2JDX1kg2AY5FV7UqMR2SBQerAkN0GBDHoJSpmUJm1uYtUCAMzalTMY8Lf6AAAAAElFTkSuQmCC) no-repeat center;
    display: inline-block;
    width: 22px;
    height: 34px;
    vertical-align: middle;
    margin: 0 0 0 5px;
    cursor: pointer;
}
    .bx_ordercart_coupon span.good:hover{
        background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjA2QzFEQUU3QTJEMTFFNEJFMTJEMjJGMUE4MkZDRkYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjA2QzFEQUY3QTJEMTFFNEJFMTJEMjJGMUE4MkZDRkYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MDZDMURBQzdBMkQxMUU0QkUxMkQyMkYxQTgyRkNGRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MDZDMURBRDdBMkQxMUU0QkUxMkQyMkYxQTgyRkNGRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuRKTjMAAAC1SURBVHjaXJAhEsIwEEWTDiCoAa6CBtUKEAxHwAfHGSpxySWqUFQUh+YG3AEMOvxlfmf+kJmXnXRftr/1McaDc+4M9iGEu5OVUlqhXMCpwNaABejYUKljrxlh24EbmFHeomZKJXiZ43POdnsp8odDB6lGpMdP5KtUdirZoZDsNmEs5wmYDoeC09YoV8pvUuoHevyef6nikB7MmXljE1sJXlkm5qr5zHqtiQE8Nbgtka13/AowAFzKRSz6AcYPAAAAAElFTkSuQmCC") no-repeat center;
}

.bx_ordercart .bx_ordercart_coupon span.good, .bx_ordercart .bx_ordercart_coupon span.bad, .bx_ordercart .bx_ordercart_coupon span.disabled {
    display: inline-block;
    width: 22px;
    height: 34px;
    vertical-align: middle;
    margin: 0 0 0 5px;
    cursor: pointer;
}

.bx_ordercart .bx_ordercart_coupon span {
    display: block;
    margin-bottom: 13px;
    color: #7f7f7f;
    font-size: 13px;
}
.pp-input{
    width: 36px; 
    height: 20px; 
    text-align: center; 
    border: none;
    color: #c4c2c3;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;"
}
</style>
<?endif;?>