<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult['ERRORS']['FATAL'])):?>

	<?foreach($arResult['ERRORS']['FATAL'] as $error):?>
		<?=ShowError($error)?>
	<?endforeach?>

	<?$component = $this->__component;?>
	<?if($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])):?>
		<?$APPLICATION->AuthForm('', false, false, 'N', false);?>
	<?endif?>

<?else:?>

	<?if(!empty($arResult['ERRORS']['NONFATAL'])):?>

		<?foreach($arResult['ERRORS']['NONFATAL'] as $error):?>
			<?=ShowError($error)?>
		<?endforeach?>

	<?endif?>

	    
  
    
    
	<?if(!empty($arResult['ORDERS'])):?>
	    
	    <div class="cart-table-history-short">
		    			<div class="table-header">
                            <div class="photo"><?=GetMessage('ORDERS_DATE')?></div>
                            <div class="title"><?=GetMessage('ORDERS_NUMBER')?></div>
                            <div class="price"><?=GetMessage('ORDERS_PRICE')?></div>
                            <div class="count"><?=GetMessage('ORDERS_STATUS')?></div>
                            <div class="last"></div>
                        </div>
	    <?foreach($arResult["ORDERS"] as $key => $arOrder):?>
	        <div class="table-item">
		        <div class="photo"><?=$arOrder["ORDER"]["DATE_STATUS_FORMATED"]?></div>
		        <div class="title">№ <?=$arOrder["ORDER"]["ID"]?></div>
		        <div class="price"><span class="value"><?=$arOrder["ORDER"]["FORMATED_PRICE"]?></span></div>
		        <div class="count"><?=$arResult["INFO"]["STATUS"][$arOrder["ORDER"]["STATUS_ID"]]['NAME']?></div>
	        </div>
	    
	    <?endforeach;?>
	    </div>
	     

		
		<?if(strlen($arResult['NAV_STRING'])):?>
			<?=$arResult['NAV_STRING']?>
		<?endif?>

	<?else:?>
		<?=GetMessage('SPOL_NO_ORDERS')?>
	<?endif?>

<?endif?>