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

                    <a data-fancybox-href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" rel="g<?=$arItem['ID']?>" class="fancybox-media" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <div class="photo">
                            <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>"
                                 draggable="false">
                        </div>
                        <div class="title"><?= $arItem["NAME"] ?></div>

                        <?$minPrice = false;
                        if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
                            $minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);?>
                        <div class="price">

                            <?if (!empty($minPrice)) {


                                ?><span class='value'><? if ($arItem["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y"): ?>
                                    От
                                <? endif; ?><?= $minPrice['PRINT_DISCOUNT_VALUE'] ?></span><?

                                if ('Y' == $arParams['SHOW_OLD_PRICE'] && $minPrice['DISCOUNT_VALUE'] < $minPrice['VALUE']) {
                                    ?>
                                    <span class="price-old">
								 <span class='value'><?= $minPrice['PRINT_VALUE'] ?></span>
								</span>
                                <?
                                }
                            }
                            unset($minPrice);
                            ?>

                        </div>
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