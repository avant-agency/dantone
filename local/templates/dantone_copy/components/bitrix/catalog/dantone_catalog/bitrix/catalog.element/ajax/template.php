<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<div class="goodPopup-left">
  <div class="goodPopup-left-titleWrap">
    <div class="goodPopup-title"><?= $arResult["NAME"] ?></div>
    <div class="goodPopup-price">
      <? $minPrice = (isset($arResult['RATIO_PRICE']) ? $arResult['RATIO_PRICE'] : $arResult['MIN_PRICE']);
      $boolDiscountShow = (0 < $minPrice['DISCOUNT_DIFF']);?>
      <?if($arResult["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y"):?>
      <?=GetMessage('DETAIL_FROM')?>   
      <?endif;?><?=$minPrice['PRINT_DISCOUNT_VALUE']?>
      
    </div>
  </div>
  <div class="goodPopup-sliderWrap">
    <div id="sync1" class="owl-carousel">
      <?if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]):?>
      <?foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $PHOTO):?>
      <?
      if(!$firstImageId) {
        $firstImageId = $PHOTO;
      }
      ?>
      <?$SRC = CFile::GetPath($PHOTO);?>
      <div class="item">
        <img id="ph_<?= $PHOTO ?>" src="<?= $SRC ?>" alt="<?= $arResult["NAME"] ?>">
      </div>
      <?endforeach;?>
      <?endif;?>
    </div>
    <div id="sync2" class="owl-carousel">
      <?if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]):?>
      <?foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $PHOTO):?>
      <?$SRC = CFile::GetPath($PHOTO);?>
      <div class="item"><img  src="<?= $SRC ?>" alt="<?= $arResult["NAME"] ?>"/></div>
      <?endforeach;?>
      <?endif;?>
    </div>
  </div>

</div>
<div class="goodPopup-right">
  <?if($arResult["PROPERTIES"]["FEATURES"]["VALUE"]):?>
  <div class="goodPopup-right-title">
    <?=GetMessage('DETAIL_PROPS')?>
  </div>
  <div class="param-table goodPopupTable">
    <? foreach ($arResult["PROPERTIES"]["FEATURES"]["VALUE"] as $id => $feature) { ?>
    <div class="item">
      <div class="param"><?= $arResult["PROPERTIES"]["FEATURES"]["DESCRIPTION"][$id] ?></div>
      <div class="value"><?= $feature ?></div>
    </div>
    <? } ?>
    <?php if ($arResult["PROPERTIES"]["ARTIKUL"]["VALUE"]) { ?>
    <div class="item">
      <div class="param"><?=GetMessage('DETAIL_ARTNUMBER')?></div>
      <div class="value"><?= $arResult["PROPERTIES"]["ARTIKUL"]["VALUE"] ?></div>
    </div>
    <?php } ?>
  </div>
  <?endif;?>
  <?if($arResult["IN_BASKET"] != "Y") {?> 
  <a href="#" onclick="basketAjax('add', <?=$arResult["OFFERS"][0]["ID"]?>); return false;" class="full-btn"><?=GetMessage('DETAIL_ADDTOCART')?></a>           
  <?} else {?>
  <a href="<?=SITE_DIR?>personal/cart/"  class="full-btn"><?=GetMessage('DETAIL_ORDER')?></a>           
  <?}?>
  <a href="<?=$arResult['DETAIL_PAGE_URL']?>" class="full-btn goodPopup-grey-btn"><?=GetMessage('DETAIL_GOTODETAIL')?></a>

</div>