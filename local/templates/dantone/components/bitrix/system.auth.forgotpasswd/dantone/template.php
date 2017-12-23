<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);


	

?>
<form name="bform" id="restorePasswordForm" method="post" action="<?=$arResult["AUTH_URL"]?>#login">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	


			
		    
			 <div class="control">
				<input placeholder="<?=GetMessage("AUTH_EMAIL")?>" class="input-text input-full" type="text" name="USER_EMAIL" maxlength="255" />
			 </div>	
			
	
	
			<div class="control-btn text-center">
				<input type="submit" name="send_account_info" class="btn btn-blue" value="<?=GetMessage("AUTH_SEND")?>" />
			</div>
		
	

</form>
<script type="text/javascript">
document.bform.USER_EMAIL.focus();
</script>
