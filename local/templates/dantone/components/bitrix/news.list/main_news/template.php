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


		
		
<div class="news-container">
	<a class="block-title" href="<?=str_ireplace('#SITE_DIR#/', SITE_DIR, $arResult['LIST_PAGE_URL'])?>"><h2><?=$arResult['NAME']?></h2></a>	
	<div class="container">
		<ul class="news-list">
		
		<?foreach($arResult["ITEMS"] as $k=>$arItem):?>
			<?if($k>=$arParams['NEWS_COUNT'])break;
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<li>
		                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
		                        <div class="photo">
		                           <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
		                        </div>
		
		                        <div class="title"><?=$arItem["NAME"]?></div>
		                    </a>
		                </li>
		
			
			
		<?endforeach;?>
		
		
		</ul>
	</div>
</div>
