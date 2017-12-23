<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 * @var $USER CUser
 * @var $component SaleOrderAjax
 */




if (empty($arParams['TEMPLATE_THEME']))
{
	$arParams['TEMPLATE_THEME'] = \Bitrix\Main\ModuleManager::isModuleInstalled('bitrix.eshop') ? 'site' : 'blue';
}

if ($arParams['TEMPLATE_THEME'] == 'site')
{
	$templateId = \Bitrix\Main\Config\Option::get("main", "wizard_template_id", "eshop_bootstrap", SITE_ID);
	$templateId = preg_match("/^eshop_adapt/", $templateId) ? "eshop_adapt" : $templateId;
	$arParams['TEMPLATE_THEME'] = \Bitrix\Main\Config\Option::get('main', 'wizard_' . $templateId . '_theme_id', 'blue', SITE_ID);
}

if (!empty($arParams['TEMPLATE_THEME']))
{
	if (!is_file($_SERVER['DOCUMENT_ROOT'].'/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
		$arParams['TEMPLATE_THEME'] = 'blue';
}

$arParams["ALLOW_USER_PROFILES"] = $arParams["ALLOW_USER_PROFILES"] == "Y" ? "Y" : "N";
$arParams["SKIP_USELESS_BLOCK"] = $arParams["SKIP_USELESS_BLOCK"] == "N" ? "N" : "Y";
if (!isset($arParams['SHOW_ORDER_BUTTON']))
	$arParams['SHOW_ORDER_BUTTON'] = 'final_step';
$arParams["SHOW_TOTAL_ORDER_BUTTON"] = $arParams["SHOW_TOTAL_ORDER_BUTTON"] == "Y" ? "Y" : "N";
$arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] = $arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_PAY_SYSTEM_INFO_NAME'] = $arParams['SHOW_PAY_SYSTEM_INFO_NAME'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_LIST_NAMES'] = $arParams['SHOW_DELIVERY_LIST_NAMES'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_INFO_NAME'] = $arParams['SHOW_DELIVERY_INFO_NAME'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_PARENT_NAMES'] = $arParams['SHOW_DELIVERY_PARENT_NAMES'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_STORES_IMAGES'] = $arParams['SHOW_STORES_IMAGES'] == 'N' ? 'N' : 'Y';
if (!isset($arParams['BASKET_POSITION']))
	$arParams['BASKET_POSITION'] = 'after';
$arParams['SHOW_BASKET_HEADERS'] = $arParams['SHOW_BASKET_HEADERS'] == 'Y' ? 'Y' : 'N';
$arParams['DELIVERY_FADE_EXTRA_SERVICES'] = $arParams['DELIVERY_FADE_EXTRA_SERVICES'] == 'Y' ? 'Y' : 'N';
$arParams['SHOW_COUPONS_BASKET'] = $arParams['SHOW_COUPONS_BASKET'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_DELIVERY'] = $arParams['SHOW_COUPONS_DELIVERY'] == 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_PAY_SYSTEM'] = $arParams['SHOW_COUPONS_PAY_SYSTEM'] == 'Y' ? 'Y' : 'N';
$arParams['SHOW_NEAREST_PICKUP'] = $arParams['SHOW_NEAREST_PICKUP'] == 'Y' ? 'Y' : 'N';
$arParams['DELIVERIES_PER_PAGE'] = intval($arParams['DELIVERIES_PER_PAGE']);
$arParams['PAY_SYSTEMS_PER_PAGE'] = intval($arParams['PAY_SYSTEMS_PER_PAGE']);
$arParams['PICKUPS_PER_PAGE'] = intval($arParams['PICKUPS_PER_PAGE']);
$arParams['SHOW_MAP_IN_PROPS'] = $arParams['SHOW_MAP_IN_PROPS'] == 'Y' ? 'Y' : 'N';
$arParams['USE_YM_GOALS'] = $arParams['USE_YM_GOALS'] == 'Y' ? 'Y' : 'N';

if ($arParams["USE_CUSTOM_MAIN_MESSAGES"] != "Y")
{
	$arParams['MESS_AUTH_BLOCK_NAME'] = Loc::getMessage("AUTH_BLOCK_NAME_DEFAULT");
	$arParams['MESS_REG_BLOCK_NAME'] = Loc::getMessage("REG_BLOCK_NAME_DEFAULT");
	$arParams['MESS_BASKET_BLOCK_NAME'] = Loc::getMessage("BASKET_BLOCK_NAME_DEFAULT");
	$arParams['MESS_REGION_BLOCK_NAME'] = Loc::getMessage("REGION_BLOCK_NAME_DEFAULT");
	$arParams['MESS_PAYMENT_BLOCK_NAME'] = Loc::getMessage("PAYMENT_BLOCK_NAME_DEFAULT");
	$arParams['MESS_DELIVERY_BLOCK_NAME'] = Loc::getMessage("DELIVERY_BLOCK_NAME_DEFAULT");
	$arParams['MESS_BUYER_BLOCK_NAME'] = Loc::getMessage("BUYER_BLOCK_NAME_DEFAULT");
	$arParams['MESS_BACK'] = Loc::getMessage("BACK_DEFAULT");
	$arParams['MESS_FURTHER'] = Loc::getMessage("FURTHER_DEFAULT");
	$arParams['MESS_EDIT'] = Loc::getMessage("EDIT_DEFAULT");
	$arParams['MESS_ORDER'] = Loc::getMessage("ORDER_DEFAULT");
	$arParams['MESS_PRICE'] = Loc::getMessage("PRICE_DEFAULT");
	$arParams['MESS_PERIOD'] = Loc::getMessage("PERIOD_DEFAULT");
	$arParams['MESS_NAV_BACK'] = Loc::getMessage("NAV_BACK_DEFAULT");
	$arParams['MESS_NAV_FORWARD'] = Loc::getMessage("NAV_FORWARD_DEFAULT");
}

if ($arParams["USE_CUSTOM_ADDITIONAL_MESSAGES"] != "Y")
{
	$arParams['MESS_REGISTRATION_REFERENCE'] = Loc::getMessage("REGISTRATION_REFERENCE_DEFAULT");
	$arParams['MESS_AUTH_REFERENCE_1'] = Loc::getMessage("AUTH_REFERENCE_1_DEFAULT");
	$arParams['MESS_AUTH_REFERENCE_2'] = Loc::getMessage("AUTH_REFERENCE_2_DEFAULT");
	$arParams['MESS_AUTH_REFERENCE_3'] = Loc::getMessage("AUTH_REFERENCE_3_DEFAULT");
	$arParams['MESS_ADDITIONAL_PROPS'] = Loc::getMessage("ADDITIONAL_PROPS_DEFAULT");
	$arParams['MESS_USE_COUPON'] = Loc::getMessage("USE_COUPON_DEFAULT");
	$arParams['MESS_COUPON'] = Loc::getMessage("COUPON_DEFAULT");
	$arParams['MESS_PERSON_TYPE'] = Loc::getMessage("PERSON_TYPE_DEFAULT");
	$arParams['MESS_SELECT_PROFILE'] = Loc::getMessage("SELECT_PROFILE_DEFAULT");
	$arParams['MESS_REGION_REFERENCE'] = Loc::getMessage("REGION_REFERENCE_DEFAULT");
	$arParams['MESS_PICKUP_LIST'] = Loc::getMessage("PICKUP_LIST_DEFAULT");
	$arParams['MESS_NEAREST_PICKUP_LIST'] = Loc::getMessage("NEAREST_PICKUP_LIST_DEFAULT");
	$arParams['MESS_SELECT_PICKUP'] = Loc::getMessage("SELECT_PICKUP_DEFAULT");
	$arParams['MESS_INNER_PS_BALANCE'] = Loc::getMessage("INNER_PS_BALANCE_DEFAULT");
	$arParams['MESS_ORDER_DESC'] = Loc::getMessage("ORDER_DESC_DEFAULT");
}

if ($arParams["USE_CUSTOM_ERROR_MESSAGES"] != "Y")
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TITLE'] = Loc::getMessage("DELIVERY_CALC_ERROR_TITLE_DEFAULT");
	$arParams['MESS_DELIVERY_CALC_ERROR_TEXT'] = Loc::getMessage("DELIVERY_CALC_ERROR_TEXT_DEFAULT");
}

$scheme = \Bitrix\Main\Context::getCurrent()->getRequest()->isHttps() ? 'https' : 'http';
switch (LANGUAGE_ID)
{
	case 'ru':
	$locale = 'ru-RU'; break;
	case 'ua':
	$locale = 'ru-UA'; break;
	case 'tk':
	$locale = 'tr-TR'; break;
	default:
	$locale = 'en-US'; break;
}



?>

<?
$context = Bitrix\Main\Application::getInstance()->getContext();
if (strlen($context->getRequest()->get('ORDER_ID')) > 0):
	include($context->getServer()->getDocumentRoot().$templateFolder."/confirm.php");
elseif ($arParams["DISABLE_BASKET_REDIRECT"] == 'Y' && $arResult["SHOW_EMPTY_BASKET"]):
	include($context->getServer()->getDocumentRoot().$templateFolder."/empty.php");
else:
	$hideDelivery = empty($arResult["DELIVERY"]);
?>

<h1 class="h2 mb10"><?=GetMessage('ORDER_NAME')?></h1>
<div class="clearfix mb20">
	<ul class="breadcrumbs">
		<li><a href="<?=SITE_DIR?>"><?=GetMessage('ORDER_MAIN')?></a></li>
		<li><?=GetMessage('ORDER_NAME')?></li>
	</ul>
</div>

<div class="errors">
	<ul>

	</ul>
</div>

<form action="<?=$APPLICATION->GetCurPage();?>" class="order-form" method="POST" name="ORDER_FORM" id="bx-soa-order-form" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<?
	if (strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
		echo $arResult["PREPAY_ADIT_FIELDS"];
	?>
	<input type="hidden" name="action" value="saveOrderAjax">
	<input type="hidden" name="location_type" value="code">
	<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="0">
	<?foreach($arResult["PERSON_TYPE"] as $v)
	{
		?>
		<input type="hidden" id="PERSON_TYPE" name="PERSON_TYPE" value="<?=$v["ID"]?>" />
		<input type="hidden" name="PERSON_TYPE_OLD" value="<?=$v["ID"]?>" />
		<?
	}

	?>

	<div class="tabs-container">

		<ul class="tabs paneble">
			<li class="active"><span><span class="number">1</span><?=GetMessage('ORDER_PERSONAL')?></span></li>
			<li><span><span class="number">2</span><?=GetMessage('ORDER_DELIVERY')?></span></li>
			<li><span><span class="number">3</span><?=GetMessage('ORDER_PAYMENT')?></span></li>
		</ul>



		<div class="panes ">

			<div class="pane active">
				<div class="confirm-form">
					<div class="help-form"><?=GetMessage('ORDER_PERSONAL_TEXT')?></div>

					<div class="form-container">
						<div class="control-group">
							<div class="control">
								<input type="text" name="ORDER_PROP_8" id="ORDER_PROP_8" required="required" class="input-text required" placeholder="<?=GetMessage('ORDER_FULL_NAME_SHORT')?>" data-name="<?=GetMessage('ORDER_FULL_NAME_SHORT')?>" value="<?=isset($arResult["USER"]) ? $arResult["USER"]["NAME"] : "";?>">                                    
								<div class="help-inline help-small"><?=GetMessage('ORDER_FULL_NAME')?></div>
							</div>
							<div class="control">
								<input type="text" name="ORDER_PROP_9" required="required" class="input-text required" placeholder="<?=GetMessage('ORDER_LAST_NAME_SHORT')?>"  data-name="<?=GetMessage('ORDER_LAST_NAME_SHORT')?>"  value="<?=isset($arResult["USER"]) ? $arResult["USER"]["LAST_NAME"] : "";?>">                                    
								<div class="help-inline help-small"><?=GetMessage('ORDER_LAST_NAME')?></div>
							</div>
							<div class="control">
								<input type="email" name="ORDER_PROP_2" required="required" class="input-text required" placeholder="E-mail" data-name="E-mail" data-rule="email" value="<?=isset($arResult["USER"]) ? $arResult["USER"]["EMAIL"] : "";?>">                                    
								<div class="help-inline help-small"><?=GetMessage('ORDER_EMAIL')?></div>
							</div>
							<div class="control">
								<input type="text" name="ORDER_PROP_3" required="required" class="input-text required phone-input" placeholder="<?=GetMessage('ORDER_PHONE_SHORT')?>" data-name="<?=GetMessage('ORDER_PHONE_SHORT')?>" value="<?=isset($arResult["USER"]) ? $arResult["USER"]["PERSONAL_PHONE"] : "";?>">                                   
								<div class="help-inline help-small"><?=GetMessage('ORDER_PHONE')?></div>
							</div>
							<div class="control">
								<input type="text" name="ORDER_PROP_5" required="required" class="city-input input-text required" placeholder="<?=GetMessage('ORDER_CITY_SHORT')?>" data-name="<?=GetMessage('ORDER_CITY_SHORT')?>" value="<?=isset($arResult["USER"]) ? $arResult["USER"]["PERSONAL_CITY"] : "";?>">                                    
								<div class="help-inline help-small"><?=GetMessage('ORDER_CITY')?></div>
							</div>
						</div>

						<div class="pane-errors">
							<ul></ul>
						</div>
						<input  type="hidden" name="ORDER_PROP_22" value="N"/>
						<div class="control-group">
							<div class="control">  <label class="checkbox a-checkbox privacy-checkbox"><input class="required" data-name="<?=GetMessage('ORDER_PRIVACY')?>" type="checkbox" required="required" name="ORDER_PROP_22" value="Y"/></label>
								<div class="privacy-check"><?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR."include/privacy.php"
										)
										);?></div>
									</div>
									<div class="control-btn"><button onclick="changePane(2); return false;" class="btn btn-blue btn-medium input-medium"><?=GetMessage('ORDER_CHOOSE_DELIVERY')?> <i class="icon-next"></i></button></div>


								</div>
							</div>
						</div>
					</div>

					<div class="pane">

						<div class="confirm-form" method="post">
							<div class="help-form"><?=GetMessage('ORDER_PERSONAL_TEXT')?></div>
							<div class="form-container">
								<div class="control-group control-group-radio clearfix" id="deliveryTypesBlock">
									<div class="help-inline help-small"><?=GetMessage('ORDER_DELIVERY_TITLE')?></div>
									<div class="control">
										<label class="radio a-radio">
											<input checked type="radio" name="DELIVERY_ID" value="2" data-selfdelivery="0" data-customdelivery="0" style="position: absolute; left: -9999px;">
											<?=GetMessage('ORDER_DELIVERY_TRANSPORT')?> 
										</label>
									</div>
									<div class="control">
										<label class="radio a-radio">
											<input type="radio" name="DELIVERY_ID" value="3" data-selfdelivery="1" data-customdelivery="0" style="position: absolute; left: -9999px;">
											<?=GetMessage('ORDER_DELIVERY_SELF')?>                                 
										</label>
									</div>
									<div class="control">
										<label class="radio a-radio">
											<input type="radio" name="DELIVERY_ID" value="16" data-selfdelivery="0" data-customdelivery="1" style="position: absolute; left: -9999px;">
											<?=GetMessage('ORDER_DELIVERY_OTHER')?>
										</label>
									</div>
        <!-- <div class="control">
          <label class="radio a-radio">
            <input type="radio" name="DELIVERY_ID" value="17" data-selfdelivery="0" data-customdelivery="0" style="position: absolute; left: -9999px;">
            <?=GetMessage('ORDER_DELIVERY_OTHERCITY')?>
          </label>
      </div> -->
      <div class="control" id="customDeliveryBlock" style="display: none;">
      	<input type="text" name="ORDER_PROP_11" class="input-text" style="width: 280px;" value="" placeholder="<?=GetMessage('ORDER_DELIVERY_INPUT')?>" name="customDelivery">
      </div>
  </div>
  <script type="text/javascript">
  	$(function () {
  		var radios = $('#deliveryTypesBlock input[type="radio"]');
  		radios.change(function () {
  			var radio = $(this);
  			var selfDelivery = radio.data('selfdelivery');
  			var customDelivery = radio.data('customdelivery');

  			var addressBlock = $('#addressBlock');
  			if (selfDelivery == 1) {
  				addressBlock.hide(500);
              //addressBlock.find('input').val("<?=GetMessage('ORDER_DELIVERY_TRANSPORT')?>");
              addressBlock.find('textarea').val("");
          } else {
          	addressBlock.show(500);
          	addressBlock.find('input').prop('disabled', false);
          	addressBlock.find('textarea').prop('disabled', false);
          }

          var customDeliveryBlock = $('#customDeliveryBlock');
          if (customDelivery == 1) {
          	customDeliveryBlock.show(500);
          } else {
          	customDeliveryBlock.hide(500);
          	customDeliveryBlock.find('input').val('');
          }
      });

  		$('#deliveryTypesBlock input[type="radio"]:checked').change();
  	});
  </script>

  <div class="control-group" id="addressBlock" style="display: none;">
        <!-- <div class="control">
          <input type="text" name="ORDER_PROP_12" placeholder="<?=GetMessage('ORDER_ADDRESS_REGION')?>" class="input-text" value="" disabled="">
          <div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_REGION_COMMENT')?></div>
      </div> -->
      <div class="control">
      	<input type="text" data-name="<?=GetMessage('ORDER_ADDRESS_CITY')?>" name="ORDER_PROP_13" required="required" placeholder="<?=GetMessage('ORDER_ADDRESS_CITY')?>*" class="city-input input-text" value="" disabled="" value="<?=$arResult["USER"]["PERSONAL_CITY"]?>">
      	<div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_CITY_COMMENT')?></div>
      </div>
      <div class="control">
      	<input type="text" data-name="<?=GetMessage('ORDER_ADDRESS_STREET')?>" name="ORDER_PROP_14" required="required" placeholder="<?=GetMessage('ORDER_ADDRESS_STREET')?>*" class=" input-text" value="" disabled="" value="<?=$arResult["USER"]["PERSONAL_STREET"]?>">
      	<div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_STREET_COMMENT')?></div>
      </div>
      <div class="control">
      	<input type="text" data-name="Дом" name="ORDER_PROP_15" required="required" placeholder="<?=GetMessage('ORDER_ADDRESS_HOUSE')?>*" class=" input-text input-small2" value="" disabled="">
      	<input type="text" name="ORDER_PROP_17" placeholder="<?=GetMessage('ORDER_ADDRESS_KORPUS')?>" class="input-text input-small2" value="" disabled="">
      	<input type="text" name="ORDER_PROP_18" placeholder="<?=GetMessage('ORDER_ADDRESS_FLAT')?>" class="input-text input-small2" value="" disabled="">
      </div>
      <div class="control">
      	<input type="text" name="ORDER_PROP_4" placeholder="<?=GetMessage('ORDER_ADDRESS_INDEX')?>" data-name="<?=GetMessage('ORDER_ADDRESS_INDEX')?>" class=" input-text" value="<?=$arResult["USER"]["PERSONAL_ZIP"]?>" disabled="">
      	<div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_KNOWINDEX')?> <a href="http://indexp.ru/" class="nounderline" target="_blank"><?=GetMessage('ORDER_ADDRESS_FINDINDEX')?></a></div>
      </div>
      <div class="control">
      	<textarea name="ORDER_PROP_16" placeholder="<?=GetMessage('ORDER_ADDRESS_COMMENT')?>" class="input-text" cols="30" rows="6" disabled=""></textarea>
      	<div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_COMMENT_COMMENT')?></div>
      </div>
  </div>

  <div class="pane-errors">
  	<ul></ul>
  </div>

  <div class="control-btn"><button onclick="changePane(3); return false;" class="btn btn-blue btn-medium input-medium"><?=GetMessage('ORDER_PAYMENT_CHOOSE')?> <i class="icon-next"></i></button></div>
</div>
</div>


</div>


<div class="pane last">

	<div class="confirm-form" >
		<div class="help-form"><?=GetMessage('ORDER_PERSONAL_TEXT')?></div>
		<div class="form-container">
			<div class="control-group control-group-radio clearfix">
				<div class="help-inline help-small"><?=GetMessage('ORDER_PAYMENT_TITLE')?></div>
				<div class="control selected">
					<label class="radio a-radio">
						<input type="radio" checked="checked" name="PAY_SYSTEM_ID" value="1" style="position: absolute; left: -9999px;">
						<?=GetMessage('ORDER_PAYMENT_CASH')?>                                       </label>
					</div>

					<div class="control ">
						<label class="radio a-radio">
							<input type="radio" name="PAY_SYSTEM_ID" value="4" style="position: absolute; left: -9999px;">
							<?=GetMessage('ORDER_PAYMENT_NOCASH')?>                                   </label>
						</div>
						<?//if($USER->IsAdmin()):?>
						<div class="control ">
							<label class="radio a-radio">
								<input type="radio" name="PAY_SYSTEM_ID" value="3" style="position: absolute; left: -9999px;">
								<?=GetMessage('ORDER_PAYMENT_BANK')?>                                       </label>
						</div><?//endif?>
						<div class="control ">
							<label class="radio a-radio">
								<input type="radio" name="PAY_SYSTEM_ID" value="8" style="position: absolute; left: -9999px;">
								<?=GetMessage('ORDER_PAYMENT_CASH_DELIVERY')?>                                       </label>
						</div>
							
              <!-- <div class="control ">
                <label class="radio a-radio">
                  <input type="radio" name="PAY_SYSTEM_ID" value="4" style="position: absolute; left: -9999px;">
                  <?=GetMessage('ORDER_PAYMENT_KVIT')?>                                     </label>
              </div> -->
          </div>

          <div class="control-group">
          	<div class="control">
          		<textarea name="ORDER_PROP_20" placeholder="<?=GetMessage('ORDER_COMMENT')?>" class="input-text" cols="30" rows="6"></textarea>
          		<div class="help-inline help-small"><?=GetMessage('ORDER_ADDRESS_COMMENT_COMMENT')?></div>
          	</div>
          </div>
          <div class="want-subscribe"><label class="checkbox a-checkbox"><input  type="checkbox" checked="checked" name="ORDER_PROP_21" value="Y"/><?=GetMessage('ORDER_WANT_SUBSCRIBE')?></label></div>
          <div class="control-btn"><button onclick="submitOrder(form); return false;" class="btn btn-blue btn-medium input-medium"><?=GetMessage('ORDER_PLACE')?> <i class="icon-next"></i></button></div>
          <div class="pane-errors">
          	<ul></ul>
          </div>
      </div>
  </div>



</div>

</div>

</div>

</form>

<script>

	$(function() {
		$('.pane').not('.active').hide();
	})


	function submitOrder(form) {
		var err=false;
		$('.pane.last').find('.pane-errors ul').empty()
		$('.pane').each(function(){
			var $pane = $(this);
			errors = validatePane($pane, "required")
			if(errors.length) {
				for(var i = 0, l = errors.length; i < l; ++i) {
					$('.pane.last').find('.pane-errors ul').append($("<li>" + errors[i] + "</li>"));
					err =true;
				} 
			} 
		})
		if(err)return false;
		var data = $(form).serialize();

		$.ajax({
			url: $(form).attr('action'),
			data: data,
			type: "post",
			success: function(response) {
				console.log(response);
				if(response['order']["REDIRECT_URL"]) {
					location.href = response['order']["REDIRECT_URL"];
				}

				var propertyErrors = response['order']["ERROR"]["PROPERTY"];

				if(propertyErrors) {

					for(var i in propertyErrors) {
						$('.errors ul').append($("<li>" + propertyErrors[i] + "</li>"))
					}

				}
			}

		})


	}


	function validatePane($node, requiredClass) {

		var errors = [];

		$node.find('input').each(function() {
			var $this = $(this);

			if($this.hasClass(requiredClass)) {
				var rule = $this.attr('data-rule') || null;

				if($this.val() == "" || ($this.is('[type="checkbox"]') && !$this.is(':checked'))) {
					$this.addClass('error');
					errors.push("<?=GetMessage('ORDER_FIELD')?> '" + $this.attr('data-name') + "' <?=GetMessage('ORDER_REQUIRED')?>");
				} else {

					if(rule == "email") {
						if(!validateEmail($this.val())) {
							$this.addClass('error');
							errors.push("<?=GetMessage('ORDER_WRONG_EMAIL')?>");
						} else {
							$this.removeClass('error')
						}
					} else {
						$this.removeClass('error')
					}


				}
			}

		});

		return errors || false;


	}

	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}


	function changePane(index) {
		$('.pane').eq(index-2).find('.pane-errors ul').html('');
		var $pane = $('.pane').eq(index - 2);
		errors = validatePane($pane, "required")
		if(errors.length) {
			for(var i = 0, l = errors.length; i < l; ++i) {
				$('.pane').eq(index-2).find('.pane-errors ul').append($("<li>" + errors[i] + "</li>"));
			}
			console.log(errors)
			return false;
		} 

		var $pane = $('.pane');
		var $tabs = $('.tabs li');
		$pane.removeClass('active').hide();
		$pane.eq(index - 1).addClass('active').show();
		$tabs.removeClass('active').removeClass('success');
		$tabs.eq(index - 1 ).addClass('active');

		$tabs.each(function() {
			if($(this).index() < (index - 1)) {
				$(this).addClass('success');
			}
		}) 
	}
</script>

<?endif;?>