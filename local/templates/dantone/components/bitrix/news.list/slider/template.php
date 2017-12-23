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
$this->setFrameMode(true);

?>

<?if(count($arResult["ITEMS"])):?>

 <div class="promo a-promo">
        
    
	    <ul class="slides" >
		      <?foreach($arResult["ITEMS"] as $arItem):
			  // текст ссылки по умолчанию
			 
			  if ($arItem["PROPERTIES"]["LINKS"]["VALUE"]) {
				  foreach ($arItem["PROPERTIES"]["LINKS"]["VALUE"] as $o=>$val) {
				  $arItem["LINKS"][$o]["LINK"] = $val;
				  if ($arItem["PROPERTIES"]["LINKS"]["DESCRIPTION"][$o])
					   $arItem["LINKS"][$o]["TEXT"] = $arItem["PROPERTIES"]["LINKS"]["DESCRIPTION"][$o];
				  else 
					   $arItem["LINKS"][$o]["TEXT"] = GetMessage('CT_BNL_GOTO_DETAIL');
				  }
			  } 
			  
			  ?>          
                <li class="white" style="height: 333px; width: 1278px; float: left; display: block; background: url(<?=$arItem["DETAIL_PICTURE"]["SRC"]?>) 50% 50% / cover no-repeat;">
                    <div class="container">
                        <i class="icon-infinity"></i>
                        <h2>
	                        <?if($arItem["PREVIEW_TEXT"]) {?>
	                           <?=$arItem["PREVIEW_TEXT"]?>
	                        <?} else{ ?>
                               <?=$arItem["NAME"]?>
                            <?}?>
                        </h2>
						<?if($arItem["LINKS"]):?>
						<? foreach ($arItem["LINKS"] as $link) { ?>
						 <a href="<?=$link["LINK"]?>" class="btn"><?=$link["TEXT"]?></a>    
						<? } ?>
                        <?elseif($arItem["CODE"]):?>
                        <a href="<?=$arItem["CODE"]?>" class="btn"><?=GetMessage('CT_BNL_GOTO_DETAIL')?></a>
                        <?endif;?>						
                    </div>
                </li>
              <?endforeach;?>
                </ul></div>

    <script>
        $('.a-promo').flexslider({ animation: 'slide', controlNav: false, slideshowSpeed: 5000 });
    </script>
    
<?endif;?>    
