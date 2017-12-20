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
		
<h1 class="h2 mb10"><?=GetMessage('PRESS_NAME')?></h1>	
<div class="clearfix mb20">
	<ul class="breadcrumbs">
		<li>
			<a href="<?=SITE_DIR?>"><?=GetMessage('PRESS_MAIN')?></a>
		</li>
		<li>
			<?=GetMessage('PRESS_NAME')?>
		</li>
	</ul>
</div>	
		

<div class="news-list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$FILE  = CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"]);
	?>
	<div class="pressa-wrap">
		<div class="journal-title"><?=$arItem["NAME"]?></div>
		<a class="publ-title" href="<?=$FILE?>" onclick="return false;"><?=$arItem["PREVIEW_TEXT"]?></a>
		<div class="pressa-about clearfix">
				<span class="line"></span>
				<span class="about-text"><?=GetMessage('PRESS_DETAIL')?></span>
				<span class="line"></span>
		</div>
		<img class="pressa-img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" />
	</div>

	
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

<script>
	$(document).ready(function(){
		$('.pressa-wrap').click(function(){
			var href = $(this).find('a').attr('href');
			window.open(href);
		})
	})
</script>
