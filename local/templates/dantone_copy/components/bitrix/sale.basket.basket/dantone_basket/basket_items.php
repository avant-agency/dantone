<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
	ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0):
	?>

<script>
	
	function number_format( str ){
		return str.toString().replace(/(\s)+/g, '').replace(/(\d{1,3})(?=(?:\d{3})+$)/g, '$1 ');
	}
	
	function updateQuantity(itemid, quantity) {
		
		$sum = $('#sum_' + itemid);
		$total = $('#allSum_FORMATED');
		
		var url = "/ajax/updateQtyBasket.php";
		var data = {
			pID : itemid,
			qty : quantity
		}
		
		$.post(url, data, function(response) {
			
			
			
			response = JSON.parse(response);
			console.log(response)
			
			
			$sum.text( number_format( parseInt(response["ITEM"]["PRICE"])*parseInt(response["ITEM"]["QUANTITY"]) )  + " <?=GetMessage('CART_RUB')?>" )
			$total.text(number_format( response["TOTAL_SUM"] )  + " <?=GetMessage('CART_RUB')?>" )
			
			
		})
		
		
	}
	
	
	function setCoupon(coupon) {
		$total = $('#allSum_FORMATED');
		
		var url = "/ajax/setCoupon.php";
		
		var data = {
			coupon: coupon
		}
		
		
		$.post(url, data, function(response) {
			response = parseInt(response);
			switch(response) {

				case 2:
				window.location.reload();
				break;
				case 4:
				$('.coupon-response-text').text('<?=GetMessage('CART_COUPONNOTFOUND')?>');
				break;


			}
			
			
		})
		
		
	}
	
	$(function(){
		$('.coupon-btn').on('click', function(e) {
			e.preventDefault();
			var coupon = $("#coupon-input").val();
			setCoupon(coupon);
		});
		
		
		$('li.coupon-applied').each(function() {
			var $this = $(this);
			$this.find('a.coupon-cancel').on("click", function(e) {
				e.preventDefault();
				$.post(
					"/ajax/cancelCoupon.php",
					{
						coupon : $this.find('.coupon-code').text()
					},
					function(response) {
						window.location.reload();
					}
					)
			})
		})
	})
	
	
	
</script>


<div class="cart-table-header">
	<div class="photo"></div>
	<div class="title"><?=GetMessage('CART_NAME')?></div>
	<div class="price"><?=GetMessage('CART_PRICE')?></div>
	<div class="count"><?=GetMessage('CART_QTY')?></div>
	<div class="result"><?=GetMessage('CART_TOTAL')?></div>
	<div class="remove"></div>         
</div>


<?
foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):

	if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
		?>
	<div id="<?=$arItem["ID"]?>" class="cart-table-item">


		<!-- PHOTO SECTION -->
		<div class="photo">

			<?
			if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
				$url = $arItem["PREVIEW_PICTURE_SRC"];
			elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
				$url = $arItem["DETAIL_PICTURE_SRC"];
			else:
				$url = $templateFolder."/images/no_photo.png";
			endif;
			?>

			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>/">
				<img src="<?=$url?>" alt="<?=$arItem["NAME"]?>"/>
			</a>

		</div>	
		<!-- END PHOTO SECTION -->

		<!-- TITLE SECTION -->
		<div class="title">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
		</div>
		<!-- END TITLE SECTION -->


		<div class="price">
		<div class="for-mobile"><?=GetMessage('CART_PRICE')?>:</div>
		
			<span class="value" ><?=$arItem["PRICE_FORMATED"]?></span>

			<div class="old_price" id="old_price_<?=$arItem["ID"]?>">
				<?if (floatval($arItem["DISCOUNT_PRICE_PERCENT"]) > 0):?>
				<?=$arItem["FULL_PRICE_FORMATED"]?>
				<?endif;?>
			</div>						    
		</div>

		<div class="count">
		<div class="for-mobile"><?=GetMessage('CART_COUNT')?>:</div>
			<div class="count-control">
				<?
				$ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
				$max = isset($arItem["AVAILABLE_QUANTITY"]) ? "max=\"".$arItem["AVAILABLE_QUANTITY"]."\"" : "";
				$useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
				$useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
				?>
				<a href="#" id="down_<?=$arItem["ID"]?>" class="down"></a>
				<input type="text"
				size="3"
				id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
				name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
				size="2"
				maxlength="18"
				value="<?=$arItem["QUANTITY"]?>"
				onchange="updateQuantity(<?=$arItem["ID"]?>, parseInt($(this).val()));">
				<a href="#" id="up_<?=$arItem["ID"]?>" class="up" ></a>
			</div>

			<script type="text/javascript">
				$(function () {
					var quantityInput = $('#QUANTITY_INPUT_<?=$arItem["ID"]?>');
					$('#up_<?=$arItem["ID"]?>').click( function() {
						quantityInput.val(parseInt(quantityInput.val()) + 1);
				                            //setQuantity(<?=$arItem["ID"]?>, 0, 'up', false);
				                            updateQuantity(<?=$arItem["ID"]?>, parseInt(quantityInput.val()));
				                            quantityInput.change();
				                            return false;
				                        });

					$('#down_<?=$arItem["ID"]?>').click( function() {
						if(parseInt(quantityInput.val()) > 1) {
							quantityInput.val(parseInt(quantityInput.val()) - 1);
							updateQuantity(<?=$arItem["ID"]?>, parseInt(quantityInput.val()));				                                
						}

						return false;
					});


				});
			</script>
			<input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />
		</div>


		<div class="result">
		<div class="for-mobile"><?=GetMessage('CART_TOTAL')?>:</div>
		
			<span id="sum_<?=$arItem["ID"]?>" class="value">
				<?=$arItem["SUM"]?>
			</span>   
		</div>


		<div class="remove">
			<a href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>" id="removeFromCart-5789f9349ce404cf6a8b4567"><?=GetMessage('CART_REMOVE')?> <i class="icon-remove"></i></a>
		</div>

	</div>


	<?				
	endif;
	endforeach;?>



	<?/*<div class="cart-table-item">
		<label><?=GetMessage('CART_INP_COUPON')?></label>
		<input type="text" name="coupon" id="coupon-input"/>
		<a class="coupon-btn btn btn-blue btn-medium"><?=GetMessage('CART_APPLY')?></a>
		<p class="coupon-response-text"></p>
		<?$coupons = CCatalogDiscountCoupon::GetCoupons();		   
		foreach($coupons as $coupon) {
			?>
			<li class="coupon-applied"><span class="coupon-code"><?=$coupon?><span> <a class="coupon-cancel" href="#"><?=GetMessage('CART_CANCEL')?></a></li>
			<?
		}
		?>
	</div>*/?>




	<input type="hidden" id="column_headers" value="<?=CUtil::JSEscape(implode($arHeaders, ","))?>" />
	<input type="hidden" id="offers_props" value="<?=CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ","))?>" />
	<input type="hidden" id="action_var" value="<?=CUtil::JSEscape($arParams["ACTION_VARIABLE"])?>" />
	<input type="hidden" id="quantity_float" value="<?=$arParams["QUANTITY_FLOAT"]?>" />
	<input type="hidden" id="count_discount_4_all_quantity" value="<?=($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="price_vat_show_value" value="<?=($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="hide_coupon" value="<?=($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="use_prepayment" value="<?=($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="auto_calculation" value="<?=($arParams["AUTO_CALCULATION"] == "N") ? "N" : "Y"?>" />

	
	<?

$link=SITE_DIR.'catalog/';
$_SERVER['HTTP_REFERER']=explode('?', $_SERVER['HTTP_REFERER']);
$_SERVER['HTTP_REFERER']=str_ireplace('index.php', '', $_SERVER['HTTP_REFERER'][0]);
$_SERVER['HTTP_HOST']=explode(':', $_SERVER['HTTP_HOST']);
$_SERVER['HTTP_HOST']=$_SERVER['HTTP_HOST'][0];
$curLink=trim(($_SERVER['SERVER_PORT']==443?'https://':'http://').$_SERVER['HTTP_HOST'].$APPLICATION->GetCurPage(false));
if($_SERVER['HTTP_REFERER'] && $_SERVER['HTTP_REFERER']!=$curLink){
$_SESSION['HTTP_REFERER']=$_SERVER['HTTP_REFERER'];
}
if(!$_SESSION['HTTP_REFERER'])$_SESSION['HTTP_REFERER']=$link;
?>
	<div class="cart-table-footer">
		<div class="photo">
			<div class="back-link"><a href="<?=$_SESSION['HTTP_REFERER']?>" class="dark-link"><i class="icon-back"></i>
				<?=GetMessage('CART_BACKTOCATALOG')?></a>
			</div>
		</div>
		<div class="title"></div>
		<div class="price"></div>
		<div class="count text-right"><?=GetMessage('CART_ORDER_TOTAL')?>:</div>
		<div class="result"><span id="allSum_FORMATED" class="value"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></span></div>
		<div class="remove">
			<a class="checkout btn btn-blue btn-medium full-size" id="checkoutButton" href="<?=SITE_DIR?>personal/order/make"><?=GetMessage('CART_PLACE_ORDER')?></a>
		</div>
	</div>
	<?
	else:
		?>
	<div id="basket_items_list">
		<table>
			<tbody>
				<tr>
					<td style="text-align:center">
						<div class=""><?=GetMessage("SALE_NO_ITEMS");?></div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?
	endif;
	?>
<small><strong>Внимание!</strong> Цвет товара на фотографиях может отличаться от фактического ввиду особенностей цветопередачи, настроек монитора или дисплея.</small>