<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="news-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="pressa-wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="pressa-wrap">
			<div class="journal-title"><?=$arItem['NAME']?></div>
			<a class="publ-title" href="<?=CFile::GetPath($arItem['PROPERTIES']['FILE']['VALUE'])?>" onclick="return false;"><?=$arItem['PREVIEW_TEXT']?></a>
			<div class="pressa-about clearfix">
				<span class="line"></span>
				<span class="about-text">Подробнее</span>
				<span class="line"></span>
			</div>
			<img class="pressa-img" src="<?=$arItem['PREVIEW_PICTURE']["SRC"]?>" alt="<?=$arItem['NAME']?>"/>
		</div>
		<div class="photo-pressa-wrap">
			<?foreach($arItem["PROPERTIES"]["ADDITIONAL_PHOTO"]["VALUE"] as $kk => $vv):?>
				<img src="<?=CFile::GetPath($vv)?>">
			<?endforeach;?>
		</div>
	</div>
<?endforeach;?>
<br/>
</div>