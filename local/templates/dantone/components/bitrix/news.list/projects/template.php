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
<?if($arParams['NO_HEAD']!='Y'):?>
<article class="about">
	<h1 class="h2 mb20"><?=GetMessage('PROJECSTS_NAME')?></h1>
	<div class="divider-horisontal"></div>
</article>
<?endif?>


<ul class="project-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>

	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
 $file = CFile::ResizeImageGet($arItem["~PREVIEW_PICTURE"], array('width'=>320, 'height'=>185), BX_RESIZE_IMAGE_EXACT, true);                
               
	?>	
	<li>
		<div class="min-gallery">
			<div class="photo">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<img src="<?=$file['src']?>" alt="<?=$arItem["NAME"]?>">
				</a>
			</div>
			
			<div class="photos">
				<?$photosLength = sizeof($arItem['PROPERTIES']['PHOTOS']['VALUE']);?>

				<?foreach($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $key=>$pid): $src=CFile::GetPath($pid);
				 $file = CFile::ResizeImageGet($pid, array('width'=>76, 'height'=>50), BX_RESIZE_IMAGE_EXACT, true);                
               
				?>
					<?$photoAfterLength = $photosLength-(++$key);?>

					<div class="photos__photo">
						<a class="fancybox-media" href="<?=$src?>" style="background-image: url(<?=$file['src']?>)" rel="gallery<?=$arItem["ID"];?>">
							<img src="<?=$file['src']?>" alt="<?=$arItem["NAME"]?>">
							
							<?if($photoAfterLength !== 0):?>
								<span class="photos__photo-after-length">+<?=$photoAfterLength;?></span>
							<?endif;?>
						</a>
					</div>
				<?endforeach?>
			</div>
		</div>

		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
			<div class="title"><?=$arItem["NAME"]?></div>
		</a>
	</li>
	
	<?endforeach;?>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</ul>
