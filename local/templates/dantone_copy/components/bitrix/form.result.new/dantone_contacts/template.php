<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>


<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>

<h5>Обратная связь</h5>
<?=$arResult["FORM_HEADER"]?>


<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>



    <div class="control">
		    <input type="text" class="input-text full-size" name="form_text_<?=LANGUAGE_ID=='en'?13:3?>" required="required" placeholder="<?=GetMessage('CONTACTS_NAME')?>" title="<?=GetMessage('CONTACTS_NAME')?>">		  
	</div>
	
	<div class="control">
		<input type="text" class="input-text full-size" name="form_email_<?=LANGUAGE_ID=='en'?10:4?>" required="required" placeholder="E-mail" title="E-mail" />
    </div>
    
    <div class="control">
		<input type="text" class="input-text full-size phone-input" name="form_text_<?=LANGUAGE_ID=='en'?11:5?>" required="required" placeholder="<?=GetMessage('CONTACTS_PHONE')?>" title="<?=GetMessage('CONTACTS_PHONE')?>" />
    </div>
    
    <div class="control">
        <textarea name="form_textarea_<?=LANGUAGE_ID=='en'?12:6?>" class="input-text full-size" placeholder="<?=GetMessage('CONTACTS_MESSAGE')?>" cols="30" rows="7"></textarea>                                                         </div>
    <div class="checkboxes-rit control">
    <label class="privacy-checkbox">
        <input type="checkbox" style="position: absolute; left: -9999px;"><div class="jq-checkbox" style="display: inline-block"><div></div></div>
        <span class="checkbox-title">Я соглашаюсь на использование  <a onclick="window.open('/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf','_blank')" href="/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf" target="_blank">
        персональных данных</a></span>
    </label>
</div>
    
    <div class="control-btn">
    <input class="btn btn-blue full-size btn-large" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
    </div>

	
<?=$arResult["FORM_FOOTER"]?>
<?
}  else {//endif (isFormNote)
?>
<?=GetMessage('CONTACTS_THANK')?>

<?}?>