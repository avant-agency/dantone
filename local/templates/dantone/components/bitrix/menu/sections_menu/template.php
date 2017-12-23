<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="catalog-nav">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="<?if ($arItem["SELECTED"]):?>active<?else:?><?endif?><?=trim($arItem["TEXT"])=='Sale'?' red-item':''?>"><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
				<ul>
		<?else:?>
			<li class="<?if ($arItem["SELECTED"]):?> active<?endif?><?=trim($arItem["TEXT"])=='Sale'?' red-item':''?>"><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>active<?else:?><?endif?><?=trim($arItem["TEXT"])=='Sale'?' red-item':''?>"><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li <?if ($arItem["SELECTED"]):?> class="active<?=trim($arItem["TEXT"])=='Sale'?' red-item':''?>"<?endif?>><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>active<?else:?><?endif?><?=trim($arItem["TEXT"])=='Sale'?' red-item':''?>"><a href=""  title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied<?=trim($arItem["TEXT"])=='Sale'?' red-item':''?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>