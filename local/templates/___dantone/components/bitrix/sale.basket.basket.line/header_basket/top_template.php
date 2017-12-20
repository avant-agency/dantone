<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>
<?
		/* 
			<a href="<?=$arParams['PATH_TO_BASKET']?>">
		        <i class="icon-cart"></i><?=GetMessage("BASKET_YOUR")?>
		        <span class="product-cart-detail">
		            <span class="cart-count"><?= $arResult['NUM_PRODUCTS'] ?></span> <?=GetMessage("BASKET_SHTNA")?><?= $arResult['TOTAL_PRICE'] ?>
		        </span>
		    </a>
 */ ?>