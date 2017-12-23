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
      		});
    	}
	}
	$(function(){
		$(".add-favorite").on("click", function(){
			$.ajax({
				method: "POST",
				url: "/ajax/favorites.php",
				data: { elid: $(this).data('elid'), action: "fav-add" }
			})
			.done(function( msg ) {
				var res = JSON.parse(msg);
				if(res.res) location.reload()
				else alert(res.data)
			});

			return false;
		});
		$(".del-favorite").on("click", function(){
			$.ajax({
				method: "POST",
				url: "/ajax/favorites.php",
				data: { elid: $(this).data('elid'), action: "fav-del" }
			})
			.done(function( msg ) {
				var res = JSON.parse(msg);
				if(res.res) location.reload()
				else alert(res.data)
			});

			return false;
		});
	});
</script>

<div class="clearfix">
  
  <div class="catalog-main-container" >

    <ul class="product-list-static product-favorite-list" id="productCatalogBlock">
      <?foreach($arResult["ITEMS"] as $arItem):?> 
      <li>
        <div class="photo">
          <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="Посмотреть детали" id="productLink-1<?=$arItem["ID"]?>">
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
          </a>
        </div>
        <a data-fancybox-href="https://dantonehome.ru/upload/iblock/380/380792410f133ce6f0f24c6d7a317f5d.jpg" rel="g1737" class="gallery-list fancybox-media"></a>
        <a data-fancybox-href="https://dantonehome.ru/upload/iblock/4a0/4a0154300af7d6591f561c140bb1ecf7.jpg" rel="g1737" class="fancybox-media"></a>
        <a data-fancybox-href="https://dantonehome.ru/upload/iblock/83d/83de616f44953d791e96b564fcabc3b1.jpg" rel="g1737" class="fancybox-media"></a>
        <a class="favorite-icon favorite-icon-active tooltips del-favorite" data-elid="<?=$arItem["ID"]?>" href="#"><span class="tooltips-text">Удалить из избранного</span></a>
        <div class="descr">
          <div class="title">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" id="productLink-2<?=$arItem["ID"]?>" title="<?=GetMessage('CATALOG_SECTION_SEE')?>"><?=$arItem["NAME"]?></a>
          </div>
        </div>
      </li>
      <?endforeach;?>
    </ul>

  </div>
</div>