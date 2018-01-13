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

global $USER;
$arDB = CUser::GetList($by = 'ID', $order = 'ASC',  array("ID"=>$USER->GetID()), array("SELECT"=>array("UF_FAVORITES")));
if ($arP = $arDB->Fetch())
    $arResult["FAVORITES"] = array_filter(explode(",", $arP["UF_FAVORITES"]), function($value) { return $value !== ''; });
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
            BX.onCustomEvent('OnBasketChange'); 

			var price = $("#productLink-" + productID);//.parents("li").find(".price");
			/*console.log(price);
			price = price.find(".value");
			console.log(price);
			price = price.replace( /^\D+/g, '');
			console.log(price);
			alert(price);*/

			dataLayer.push({
				'event': 'addToCart',
				'google_tag_params': {
					'ecomm_prodid': [productID],
					'ecomm_pagetype': 'cart',
					'ecomm_totalvalue': price
				}
			});
        }           
    }
</script>


<h1 class="h2 text-left h2-profile mb10"><?=$arResult["NAME"]?></h1>

<div class="clearfix mb20">
    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","section_breadcrumb",Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
        )
        );?> 
<?/*
        <div class="fright sort-container">
            <?if(isset($_REQUEST["sortField"])) {
                $sort = $_REQUEST["sortField"];
            }?>
            <select id="sort" style="position: absolute; left: -9999px;">
                <option value=""><?=GetMessage('CATALOG_SORT')?></option>
                <option value="hit" <?= ($sort == "hit") ? 'selected="selected"' : ''?>><?=GetMessage('CATALOG_SORT_POPULAR')?></option>
                <option value="price" <?= ($sort == "price") ? 'selected="selected"' : ''?>><?=GetMessage('CATALOG_SORT_PRICE')?></option>
                <option value="discount" <?= ($sort == "discount") ? 'selected="selected"' : ''?>><?=GetMessage('CATALOG_SORT_DISCOUNT')?></option>
            </select>               
        </div>

        <script>
            $(function() {
                $('#sort').on('change', function() {
                    var val = $(this).val();

                    location.href = "?sortField=" + val

                });
            });
        </script>
*/?>
</div>




<div class="catalog-main-container" role="main" id="main">

    <div class="bnr-slider a-bnr-slider">

        <ul class="slides">
            <?foreach($arResult["UF_SLIDERPICS"] as $pic):?>
            <li class="" style="width: 797px; float: left; display: block;">
                <a style="cursor:default;">
                    <?$src = CFile::GetPath($pic);?>
                    <img src="<?=$src?>" alt="" draggable="false">

                    <div class="bnr-text white"></div>
                </a>
            </li>
            <?endforeach;?> 
        </ul>

    </div>

<?
global $USER;  
//if($USER->IsAdmin())
//{

	if( $arParams["SECTION_CODE"] == 'sofas') 
	{
		include "sofa_filter.php";
	}
	else if($arParams["SECTION_CODE"] == 'tables_and_consoles' || $arParams["SECTION_CODE"] == 'consoles' || $arParams["SECTION_CODE"] == 'tables')
	{
		include "table_filter.php";
	}
	else if($arParams["SECTION_CODE"] == 'bedroom' || $arParams["SECTION_CODE"] == 'childrens_beds' || $arParams["SECTION_CODE"] == 'beds_izgolovia' || $arParams["SECTION_CODE"] == 'beds' || $arParams["SECTION_CODE"] == 'matrasy')  
	{
		include "beds_filter.php";
	}
	else if($arParams["SECTION_CODE"] == 'armchairs_and_chairs' || $arParams["SECTION_CODE"] == 'chairs' || $arParams["SECTION_CODE"] == 'armchairs')
	{
		include "chears_filter.php";
	}
	else if($arParams["SECTION_CODE"] == 'chandelier')
	{
		include "chandelier_filter.php";
	}
	else if($arParams["SECTION_CODE"] == 'table_lamp') 
	{
		include "table_lamp.php";
	}
	else if($arParams["SECTION_CODE"] == 'torchere') 
	{
		include "torchere_filter.php";
	}
	else {
		?><div style="clear:both; height:60px; padding:20px 0; display:block;"><?
				include "sort.php";
		?></div><?
	}
	//}
?>


    <?if (!empty($arResult['ITEMS'])):?> 
    <ul class="product-list-static" id="productCatalogBlock" style="padding-bottom:1px;">
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
                <div class="product-label-container">
                    <?if($arItem["PROPERTIES"]["WOW"]["VALUE"] == "Y"):?>   
                    <div class="product-label-yellow">wow</div>
                    <?endif;?>  
                </div>
                <div class="product-label-container">
                    <?if($arItem["PROPERTIES"]["INSTOCK"]["VALUE"] == "Y"):?>   
                    <div class="product-label-blue">in stock</div>
                    <?endif;?>  
                </div>
            </div>
             <a data-fancybox-href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" rel="g<?=$arItem['ID']?>" class="gallery-list fancybox-media">
                </a>
                <?if($arItem['PROPERTIES']['MORE_PHOTO']['VALUE']):?>
                <?foreach($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'] as $k=>$pid): if($k==0)continue;?>
                <a data-fancybox-href="<?=CFile::GetPath($pid)?>" rel="g<?=$arItem['ID']?>" class="fancybox-media"></a>
                <?endforeach?>
                <?endif?>
            <a class="favorite-icon tooltips <?if(in_array($arItem["ID"], $arResult["FAVORITES"])):?>favorite-icon-active del-favorite<?else:?>add-favorite<?endif;?>" href="#" data-elid="<?=$arItem['ID']?>">
                    <span class="tooltips-text">Удалить из избранного</span>
                </a>
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
                        if ('N' == $arParams['PRODUCT_DISPLAY_MODE'] && isset($arItem['OFFERS']) && !empty($arItem['OFFERS'])) {
                            echo GetMessage(
                                'CT_BCS_TPL_MESS_PRICE_SIMPLE_MODE',
                                array(
                                    '#PRICE#' => $minPrice['PRINT_DISCOUNT_VALUE'],
                                    '#MEASURE#' => GetMessage(
                                        'CT_BCS_TPL_MESS_MEASURE_SIMPLE_MODE',
                                        array(
                                            '#VALUE#' => $minPrice['CATALOG_MEASURE_RATIO'],
                                            '#UNIT#' => $minPrice['CATALOG_MEASURE_NAME']
                                            )
                                        )
                                    )
                                );
                        }
                        else
                        {
                            ?><span class='value'><?if($arItem["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y"):?>
                            <?=GetMessage('CATALOG_SECTION_FROM')?>   
                            <?endif;?><?=$minPrice['PRINT_DISCOUNT_VALUE']?></span><?
                        }
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
        </li>
        <?endforeach;?>
    </ul>

    <?endif;?>

    <article class="about text-left">

        <?if($arResult["DESCRIPTION"]):?>
        <?=$arResult["DESCRIPTION"]?>
        <?endif;?>

        <h3></h3>

        <p></p>
        <?=GetMessage('CATALOG_SECTION_DESCRIPTION')?><p></p>
    </article>
</div>
<?
foreach ($arResult['ITEMS'] as $key => $arItem)
{
	$productIds[] = $arItem['ID'];
	/*$productOffers = CCatalogSKU::getOffersList($id);$producIdArray = reset($productOffers[$id]);$productIds[] = $producIdArray["ID"];*/
}

$js_array = json_encode(array_slice($productIds, 0, 3)); 
?>

<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">
window.criteo_q = window.criteo_q || [];
var deviceType = /iPad/.test(navigator.userAgent) ? "t" : /Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Silk/.test(navigator.userAgent) ? "m" : "d";
window.criteo_q.push(
	{ event: "setAccount", account: 45351 },
	{ event: "setEmail", email: "<? echo $USER->GetEmail(); ?>"},
	{ event: "setSiteType", type: deviceType },
	{ event: "viewList", ecpplugin: "1cbitrix", item: <? echo $js_array; ?> }
);
</script>