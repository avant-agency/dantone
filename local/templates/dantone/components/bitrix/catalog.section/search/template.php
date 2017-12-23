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

<script>
	function basket(action, productID) {			
		if(productID) {
			var url = "<?=SITE_DIR?>include/basket.php";
			var data = {
				pID: productID,
				action: action
			}
			$.post(url, data, function(response) {
				$('#cartInHeaderWrapper').html(response)
				location.href = "#cart";
				
			})
			
		}			
	}
</script>

<div class="clearfix">
	
	<div class="catalog-main-container" >
		

		
		
		<?if (!empty($arResult['ITEMS'])):?> 
		<ul class="product-list-static" id="productCatalogBlock">
			<?foreach($arResult["ITEMS"] as $arItem):?> 
			
			<li>
				
				<div class="photo">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="Посмотреть детали" id="productLink-1<?=$arItem["ID"]?>">
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
					</a>
					<div class="product-label-container">
						<?if($arItem["PROPERTIES"]["NEWPRODUCT"]["VALUE"] == "Y"):?>	
						<div class="product-label-green">new</div>
						<?endif;?>	
					</div>
					<div class="product-label-container">
						<?if($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"] == "Y"):?>	
						<div class="product-label-red">sale</div>
						<?endif;?>	
					</div>
				</div>
				<div class="descr">
					<div class="title">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" id="productLink-2<?=$arItem["ID"]?>" title="<?=GetMessage('CATALOG_SECTION_SEE')?>"><?=$arItem["NAME"]?></a>
					</div>
					
					
					<?$minPrice = false;
					if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
						$minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);?>
					<div class="price">
						
						<?if (!empty($minPrice))
						{
							
							?><span class='value'><?if($arItem["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y"):?>
							<?=GetMessage('CATALOG_SECTION_FROM')?>   
							<?endif;?><?=$minPrice['PRINT_DISCOUNT_VALUE']?></span><?
							
							if ('Y' == $arParams['SHOW_OLD_PRICE'] && $minPrice['DISCOUNT_VALUE'] < $minPrice['VALUE'])
							{
								?>
								<span class="price-old"> 
									<span class='value'><?=$minPrice['PRINT_VALUE']?></span>
								</span> 
								<?
							}
						}
						unset($minPrice);
						?>
						
					</div>
				</div>
				<a href="#" onclick="basket('add',<?=$arItem["OFFERS"][0]["ID"]?>); return false;" class="btn btn-blue btn-medium" id=""><?=GetMessage('CATALOG_TOCART')?></a>
			<a data-fancybox-href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" rel="g<?=$arItem['ID']?>" class="gallery-list fancybox-media">
                    </a>
                    <?if($arItem['PROPERTIES']['MORE_PHOTO']['VALUE']):?>
     <?foreach($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'] as $k=>$pid): if($k==0)continue;?>
     <a style="display: none;" data-fancybox-href="<?=CFile::GetPath($pid)?>" rel="g<?=$arItem['ID']?>" class="fancybox-media"></a>
     <?endforeach?>
     <?endif?>
			</li>
			<?endforeach;?>
		</ul>
		
		<?endif;?>
		
		
	</div>
</div>