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
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
$this->addExternalCss($this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css');
?>
<?if($arParams['NO_HEAD']!='Y'):?>
<h1 class="h2 mb10"><?=$arResult['NAME']?></h1>

<div class="clearfix mb20">
	<ul class="breadcrumbs">
		<li><a href="<?=SITE_DIR?>"><?=GetMessage('NEWS_MAIN')?></a></li>
		<li><?=$arResult['NAME']?></li>
	</ul>
</div>
<?endif?>
<ul class="news-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>

	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	 $file = CFile::ResizeImageGet($arItem['~PREVIEW_PICTURE'], array('width'=>257, 'height'=>150), BX_RESIZE_IMAGE_EXACT, true);                
               
	?>
	<li>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
			<div class="photo">
				<img src="<?=$file['src']?>" alt="<?=$arItem["NAME"]?>">
			</div>
			<?if($arParams['DISPLAY_DATE']!='N'):?><div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div><?endif?>
			<div class="title"><?=$arItem["NAME"]?></div>
		</a>
	</li>

	
	
	<?endforeach;?>
</ul>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

