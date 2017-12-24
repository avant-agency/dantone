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
<?if (!empty($arResult['ITEMS'])) {
    ?>
    <ul class="slides">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>

            <? if ($arParams['FILTER_NAME']=='recommendFilter' || $arItem["PROPERTIES"]["BESTSELLER"]["VALUE"] == "Y"): ?>
                <li>

                    <a  href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <div class="photo">
                            <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>"
                                 draggable="false">
                        </div>
                        <div class="title"><?= $arItem["NAME"] ?></div>

                        <div class="price">
                               <span class='value'><?=$arItem["PROPERTIES"]["MINIMUM_PRICE"]["VALUE"]?></span>
								<? if ('Y' == $arParams['SHOW_OLD_PRICE'] && $minPrice['DISCOUNT_VALUE'] < $minPrice['VALUE']) :?>
                               		<span class="price-old">
								 		<span class='value'><?= $minPrice['PRINT_VALUE'] ?></span>
									</span>
                                <?endif;?>
                        </div> 
                    </a>

                    <a data-fancybox-href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" rel="g<?=$arItem['ID']?>" class="gallery-list  fancybox-media">
                    </a>
                    <?if($arItem['PROPERTIES']['MORE_PHOTO']['VALUE']):?>
						 <?foreach($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'] as $k=>$pid): if($k==0)continue;?>
						 <a style="display: none;" data-fancybox-href="<?=CFile::GetPath($pid)?>" rel="g<?=$arItem['ID']?>" class="fancybox-media"></a>
						 <?endforeach?>
					 <?endif?>
                </li>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
<? } ?>

<?
global $USER;
if($USER->IsAdmin())
{
	echo "<pre>";
	print_r($arResult["ITEMS"][0]["PROPERTIES"]["MINIMUM_PRICE"]["VALUE"]);
	echo "</pre>";
}
?>