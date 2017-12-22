<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $USER;
//if($USER->isAdmin())
//{
global $numWindow;
 ?>
<?
$arCoupons = Bitrix\Sale\DiscountCouponsManager::get(true, array(), true, true);
foreach ($arCoupons as &$oneCoupon)
{
	if($oneCoupon['STATUS_TEXT'] == 'применен'){
		$dId = $oneCoupon["DISCOUNT_ID"];
		$arrDiscount = CCatalogDiscount::GetByID($dId);
		echo "<div>Ваша скидка ";
		echo intVal($arrDiscount["VALUE"]);
		if($arrDiscount["VALUE_TYPE"] == "P") echo " %"; else echo " руб.";
		echo "</div>";
		//	$dName = $oneCoupon["DISCOUNT_NAME"];
	}
}
?>

<div><small><a href="javascript:void(0)" onclick="javascript:$('#promo<?=$numWindow?>').toggle()">Введите промокод или номер подарочного сертификата</a></small></div>

	<div style="display:none" id="promo<?=$numWindow?>"><input onchange="enterThisCoupon('promo<?=$numWindow?>')" type="text" name="promo" value="" />
		<a href="javascript:void(0)" onclick="enterThisCoupon('promo<?=$numWindow?>')">Отправить</a><br />
<?

	/*Добавляем список использованых промокодов*/
		$arResult['COUPON_LIST'] = array();
        $arResult['COUPON'] = '';


	//$arCoupons = Bitrix\Sale\DiscountCouponsManager::get(true, array(), true, true);
            if (!empty($arCoupons))
            {
                foreach ($arCoupons as &$oneCoupon)
                {


                    if ($arResult['COUPON'] == '')
                        $arResult['COUPON'] = $oneCoupon['COUPON'];
                    if ($oneCoupon['STATUS'] == Bitrix\Sale\DiscountCouponsManager::STATUS_NOT_FOUND || $oneCoupon['STATUS'] == Bitrix\Sale\DiscountCouponsManager::STATUS_FREEZE)
                        $oneCoupon['JS_STATUS'] = 'BAD';
                    elseif ($oneCoupon['STATUS'] == Bitrix\Sale\DiscountCouponsManager::STATUS_NOT_APPLYED || $oneCoupon['STATUS'] == Bitrix\Sale\DiscountCouponsManager::STATUS_ENTERED)
                        $oneCoupon['JS_STATUS'] = 'ENTERED';
                    else
                        $oneCoupon['JS_STATUS'] = 'APPLYED';
                    $oneCoupon['JS_CHECK_CODE'] = '';
                    if (isset($oneCoupon['CHECK_CODE_TEXT']))
                    {
                        $oneCoupon['JS_CHECK_CODE'] = (is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
                    }
                    $arResult['COUPON_LIST'][] = $oneCoupon;
                }
                unset($oneCoupon);
                $arResult['COUPON_LIST'] = array_values($arCoupons);
            }
            unset($arCoupons);


                if (!empty($arResult['COUPON_LIST']))
                {
                    foreach ($arResult['COUPON_LIST'] as $oneCoupon)
                    {
                        $couponClass = 'disabled';
                        switch ($oneCoupon['STATUS'])
                        {
                            case Bitrix\Sale\DiscountCouponsManager::STATUS_NOT_FOUND:
                            case Bitrix\Sale\DiscountCouponsManager::STATUS_FREEZE:
                                $couponClass = 'bad';
                                break;
                            case Bitrix\Sale\DiscountCouponsManager::STATUS_APPLYED:
                                $couponClass = 'good';
                                break;
                        }
                        ?><div class="bx_ordercart_coupon"><input disabled readonly type="text" name="OLD_COUPON[]" value="<?=htmlspecialcharsbx($oneCoupon['COUPON']);?>" class="<? echo $couponClass; ?>"><span class="<? echo $couponClass; ?>" data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"></span><div class="bx_ordercart_coupon_notes"><?
                        if (isset($oneCoupon['CHECK_CODE_TEXT']))
                        {
                            echo (is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
                        }
                        ?></div></div><?
                    }
                    unset($couponClass, $oneCoupon);
                }
?>
  </div>
<?//}?>
