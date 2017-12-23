<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>




	<?if($arParams['SHOW_NUM_PRODUCTS'] == 'Y'):?>
		<?if ($arResult['NUM_PRODUCTS'] > 0):?>

			<a href="<?=$arParams['PATH_TO_BASKET']?>">
		        <i class="icon-cart"></i>Ваша корзина
		        <span class="product-cart-detail">
		            <span class="cart-count"><?= $arResult['NUM_PRODUCTS'] ?></span> шт. на <?= $arResult['TOTAL_PRICE'] ?>
		        </span>
		    </a>

		<?else:?>
			<a href="#">
		        <i class="icon-cart"></i>Ваша корзина
		        <span class="product-cart-detail">пока пуста</span>
		    </a>
		<?endif?>
	<?endif?>

	