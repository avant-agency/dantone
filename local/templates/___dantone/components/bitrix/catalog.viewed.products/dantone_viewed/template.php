<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

?>
<section class="product-list-container">

  <?
  if (!empty($arResult['ITEMS'])) {
    ?>	
    <h2 class="h1"><?=GetMessage('VIEWED_TITLE')?></h2>
    <div class="product-list a-product-list">
     <ul class="slides">
      <?foreach($arResult["ITEMS"] as $arItem):?>
      <li>
       <a data-fancybox-href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" rel="g<?=$arItem['ID']?>" class="fancybox-media" href="<?=$arItem["DETAIL_PAGE_URL"]?>/">
        <div class="photo">
         <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" draggable="false">
       </div>
       <div class="title"><?=$arItem["NAME"]?></div>
       <div class="price"><?=$arItem["MIN_PRICE"]["PRINT_VALUE"]?></div>
     </a>
     <?if($arItem['PROPERTIES']['MORE_PHOTO']['VALUE']):?>
     <?foreach($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'] as $k=>$pid): if($k==0)continue;?>
     <a style="display: none;" data-fancybox-href="<?=CFile::GetPath($pid)?>" rel="g<?=$arItem['ID']?>" class="fancybox-media"></a>
     <?endforeach?>
     <?endif?>
   </li>
   <?endforeach;?>
 </ul>
</div> 	
<?	
}
?>

</section>
<?



