<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<form id="authForm" name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
	<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
	<div class="control">
		<input type="text" class="input-text input-full" placeholder="<?=GetMessage('AUTH_LOGIN')?>" title="<?=GetMessage('AUTH_LOGIN')?>"  required="required" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" />
		<i class="icon-inside-input icon-user"></i>
	</div>
	<div class="control">
		<input class="input-text input-full" placeholder="<?=GetMessage('AUTH_PASSWORD')?>" title="<?=GetMessage('AUTH_PASSWORD')?>" type="password" name="USER_PASSWORD" maxlength="50" size="17" autocomplete="off" />
		 <i class="icon-inside-input icon-lock"></i>
	</div>
	<div id="errorBlock" style="color: rgba(255,0,0,0.65);">
		<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>
	</div>
	<div><a href="<?=SITE_DIR?>auth/?register=yes"><?=GetMessage('HEADER_REGISTER')?></a></div>
        <div class="control-btn clearfix">
            <div class="fleft help-inline"><a href="#pass" class="dark-link"><?=GetMessage('AUTH_FORGOT_PASSWORD_2')?></a></div>
            <div class="fright"><input type="submit" value="<?=GetMessage('AUTH_LOGIN_BUTTON')?>" class="btn btn-blue" /></div>
        </div>


<?if($arResult["AUTH_SERVICES"]):?>
<table>
		<tr>
			<td colspan="2">
				<div class="bx-auth-lbl"><?=GetMessage("socserv_as_user_form")?></div>
<?
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons", 
	array(
		"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
		"SUFFIX"=>"form",
	), 
	$component, 
	array("HIDE_ICONS"=>"Y")
);
?>
			</td>
		</tr>
</table>
<?endif?>

</form>
<?if($arResult["AUTH_SERVICES"]):?>
<?
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "", 
	array(
		"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
		"AUTH_URL"=>$arResult["AUTH_URL"],
		"POST"=>$arResult["POST"],
		"POPUP"=>"Y",
		"SUFFIX"=>"form",
	), 
	$component, 
	array("HIDE_ICONS"=>"Y")
);
?>
<?endif?>


