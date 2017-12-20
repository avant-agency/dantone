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

<article class="about">
	<h1 class="h2"><?=GetMessage('SECTIONS_CATALOG')?></h1>
	<div class="divider-horisontal"></div>
</article>

<div class="categories categories-list clearfix">
	<ul>
		<?

		foreach ($arResult['SECTIONS'] as &$arSection)
		{
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

			?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
			<a href="<?=$arSection['SECTION_PAGE_URL']; ?>">
				<div class="photo">
					<img src="<?=$arSection["PICTURE"]["SRC"]?>" alt="<?=$arSection["NAME"]?>"/>
				</div>
				<div class="title"><?=$arSection['NAME']?></div>
				<div class="more"><i class="icon-arr-right"></i><?=GetMessage('SECTIONS_GOTOCATALOG')?></div>
				
			</a><?
			if ($arParams["COUNT_ELEMENTS"])
			{
				?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
			}
			?></li><?
		}
		
		?>
	</ul>			
</div>			