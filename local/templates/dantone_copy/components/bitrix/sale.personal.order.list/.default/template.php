<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult['ERRORS']['FATAL'])):?>

    <?foreach($arResult['ERRORS']['FATAL'] as $error):?>
        <?=ShowError($error)?>
    <?endforeach?>

    <?$component = $this->__component;?>
    <?if($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])):?>
        <?$APPLICATION->AuthForm('', false, false, 'N', false);?>
    <?endif?>

<?else:?>

    <?if(!empty($arResult['ERRORS']['NONFATAL'])):?>

        <?foreach($arResult['ERRORS']['NONFATAL'] as $error):?>
            <?=ShowError($error)?>
        <?endforeach?>

    <?endif?>

    <?if(!empty($arResult['ORDERS'])):?>

        <div class="cart-table-history-short">
            <div class="table-header">
                <div></div>
                <div class="photo"><?=GetMessage('ORDERS_DATE')?></div>
                <div class="title"><?=GetMessage('ORDERS_NUMBER')?></div>
                <div class="price"><?=GetMessage('ORDERS_PRICE')?></div>
                <div class="count"><?=GetMessage('ORDERS_STATUS')?></div>
            </div>

        <?foreach($arResult["ORDERS"] as $key => $arOrder):?>

            <div class="table-item">
                <div class="drodown-icon">
                    <div class="dd-icon"></div>
                </div>
                <div class="photo"><?=$arOrder["ORDER"]["DATE_STATUS_FORMATED"]?></div>
                <div class="title">№ <?=$arOrder["ORDER"]["ID"]?></div>
                <div class="price"><span class="value"><?=$arOrder["ORDER"]["FORMATED_PRICE"]?></span></div>
                <div class="count">
                    <?if($arResult["INFO"]["STATUS"][$arOrder["ORDER"]["STATUS_ID"]]['NAME'] == "Placed"):?>
                        Placed
                    <?else:?>
					<?if($arOrder['PAYMENT'][0]['PAY_SYSTEM_ID'] == 3){?>
                        <a href="<?=$arOrder['PAYMENT'][0]['PSA_ACTION_FILE']?>" class="solve-btn">Оплатить</a>
					<?}else echo $arOrder['PAYMENT'][0]['PAY_SYSTEM_NAME']; ?>
                    <?endif?>

                </div>

                <div class="dd-list">
                    <div class="dd-list-header">
                        <div class="dd-header-item">Наименование</div>
                        <div class="dd-header-item">Количество</div>
                        <div class="dd-header-item">Цена</div>
                    </div>
                    <?
                    $basket_ids = array();
                    $basket = array();
                    foreach($arOrder["BASKET_ITEMS"] as $k => $v)
                    {
                        $basket_ids[] = $v["PRODUCT_ID"];
                    }
                    CModule::IncludeModule("iblock");
                    CModule::IncludeModule("catalog");
                    $arSelect = Array("ID", "NAME", "PREVIEW_PICTURE");
                    $arFilter = Array("IBLOCK_ID"=>5, "ID"=>$basket_ids);
                    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                    while($ob = $res->GetNextElement())
                    {
                        $arFields = $ob->GetFields();
                        $mxResult = CCatalogSku::GetProductInfo($arFields['ID']);
                        if (is_array($mxResult))
                        {
                            $res = CIBlockElement::GetByID($mxResult['ID']);
                            if($ar_res = $res->GetNext())
							{
                                $basket[$arFields["ID"]] = CFile::GetPath($ar_res['PREVIEW_PICTURE']);
							}
                        }
                    }
                    ?>
                    <?foreach($arOrder["BASKET_ITEMS"] as $k => $v):?>
                        <div class="dd-list-goods">
                            <div class="photo dd-list-item">
                                <img src="<?=$basket[$v['PRODUCT_ID']]?>" alt="<?=$v['NAME']?>">
                                <div class="title"><a href="<?=$v['DETAIL_PAGE_URL']?>"><?=$v['NAME']?></a></div>
                            </div>

                            <div class="price dd-list-item"><?=$v['QUANTITY']?> <?=$v['MEASURE_NAME']?>.</div>
                            <div class="count dd-list-item"><?=$v['PRICE']?> руб.</div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        <?endforeach;?>
        </div>
         

        
        <?if(strlen($arResult['NAV_STRING'])):?>
            <?=$arResult['NAV_STRING']?>
        <?endif?>

    <?else:?>
        <?=GetMessage('SPOL_NO_ORDERS')?>
    <?endif?>

<?endif?>
<style>
.table-item > div, .table-header > div {
  width: 150px; }

.table-item > div:first-of-type, .table-header > div:first-of-type {
  width: 50px; }

.dd-icon {
  width: 0;
  height: 0;
  border-left: 9px solid transparent;
  border-right: 9px solid transparent;
  border-top: 8px solid #191c3c;
  cursor: pointer; }
  .dd-icon.active {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    transform: rotate(180deg);
    opacity: .8; }

.solve-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-color: #16193d;
  color: #ffffff;
  width: 120px;
  height: 40px;
  text-decoration: none;
  -webkit-transition: all .3s linear;
  -moz-transition: all .3s linear;
  -o-transition: all .3s linear;
  transition: all .3s linear;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  text-transform: uppercase; }

.table-item, .table-header {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -moz-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  border-bottom: #e6e6e6 1px solid; }
  .table-item div, .table-header div {
    border-bottom: none;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center; }

.count {
  padding-right: 28px;
  padding-left: 0 !important; }

.dd-list {
  display: none !important;
  width: 100% !important;
  padding: 0 !important;
  -webkit-transition: .5s ease-in-out;
  -moz-transition: .5s ease-in-out;
  -o-transition: .5s ease-in-out;
  transition: .5s ease-in-out; }
  .dd-list.active {
    display: block !important; }

.dd-list-header {
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -moz-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  width: 100%;
  color: #16193d;
  background-color: #f7f7f7;
  padding: 10px 0 !important;
  margin-bottom: 20px; }

.dd-list-goods {
  width: 100%;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -moz-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between; }
  .dd-list-goods .title {
    font-size: 12px; }

.dd-list-header, .dd-list-goods {
  padding-left: 111px !important; }

.dd-header-item, .dd-list-item {
  width: 25%;
  max-width: 25%; }
  .dd-header-item:first-of-type, .dd-list-item:first-of-type {
    width: 65%;
    max-width: 65%; }
  .dd-header-item img, .dd-list-item img {
    width: 100px;
    margin-right: 20px; }
  .dd-header-item a, .dd-list-item a {
    text-decoration: underline;
    color: inherit; }
  .dd-header-item:hover a, .dd-list-item:hover a {
    text-decoration: none; }

.dd-list-item {
  font-size: 12px; }

@media all and (max-width: 1020px) {
  .dd-list-header, .dd-list-goods {
    padding-left: 20px !important; }
  .dd-header-item img, .dd-list-item img {
    width: 60px;
    margin-right: 10px; }
  .table-item > div:first-of-type, .table-header > div:first-of-type {
    width: 30px;
    padding-left: 28px; }
  .table-item div, .table-header div {
    width: 22%;
    padding-left: 0;
    font-size: 12px;
    line-height: 18px; }
  .solve-btn {
    font-size: 12px;
    height: 30px; }
  .count {
    padding-right: 10px; }
  .dd-list-goods, .dd-list-header {
    width: 100% !important; }
    .dd-list-goods .title, .dd-list-header .title {
      width: auto;
      margin-right: 10px; }
  .drodown-icon {
    padding-left: 10px !important; } }

@media all and (max-width: 767px) {
  .cart-table-history-short .table-header {
    display: -webkit-box !important;
    display: -webkit-flex !important;
    display: -moz-box !important;
    display: -ms-flexbox !important;
    display: flex !important; }
  .table-item .price .value {
    font-size: 12px; }
  .table-item > div:first-of-type, .table-header > div:first-of-type {
    width: 15px; }
  .table-item > div, .table-header > div {
    padding-right: 0 !important;
    font-size: 11px; }
  .dd-list-goods .title {
    font-size: 11px; }
  .solve-btn {
    -webkit-transform: translateX(-10px);
    -moz-transform: translateX(-10px);
    -ms-transform: translateX(-10px);
    -o-transform: translateX(-10px);
    transform: translateX(-10px); }
  .dd-header-item:first-of-type, .dd-list-item:first-of-type {
    width: 54%; }
  .dd-header-item img, .dd-list-item img {
    display: none; }
  .dd-list-goods {
    margin-bottom: 25px; }
  .dd-icon {
    width: 0;
    height: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 5px solid #191c3c;
    cursor: pointer; }
  .table-header {
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap; }
  .table-item .count, .table-header .count {
    width: 26%; }
  .dd-header-item {
    font-weight: 600;
    color: #16193d; } }

@media all and (max-width: 350px) {
  .table-item .price .value {
    font-size: 11px; }
  .dd-header-item:first-of-type, .dd-list-item:first-of-type {
    width: 42%; } }
</style>
<script>
$(function () {
   $('.drodown-icon').click(function () {
       $(this).find('.dd-icon').toggleClass('active');
       $(this).parent().find('.dd-list').toggleClass('active');
   })
});
</script>