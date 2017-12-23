<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(dirname(__FILE__)).'/top_template.php');

if ($arParams["SHOW_PRODUCTS"] == "Y")
{
?>
    
    <?if($arParams['SHOW_NUM_PRODUCTS'] == 'Y'):?>
        <?//if ($arResult['NUM_PRODUCTS'] > 0):?>
        
            <a href="<?=$arParams['PATH_TO_BASKET']?>">
                <i class="icon-cart"></i><?=GetMessage("BASKET_YOUR")?>
                <span class="product-cart-detail">
                  <? if($arResult['NUM_PRODUCTS'] > 0) {?>  <span class="cart-count"><?= $arResult['NUM_PRODUCTS'] ?></span> <?=GetMessage("BASKET_SHTNA")?><?= $arResult['TOTAL_PRICE'] ?><? }else{?>$nbsp;<?} ?>
                </span>
            </a>

        <?/* else:?>
            <a href="<?=$arParams['PATH_TO_BASKET']?>">
                <i class="icon-cart"></i><?=GetMessage("BASKET_YOUR")?>
                <span class="product-cart-detail"><?=GetMessage("BASKET_EMPTY")?></span>
            </a>
        <?endif */?>
    <?endif?>

    <script>
        BX.ready(function(){
            <?=$cartId?>.fixCart();
        });
    </script>
<?
}