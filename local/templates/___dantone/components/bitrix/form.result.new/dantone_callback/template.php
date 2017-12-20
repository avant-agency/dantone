<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?if ($arResult["isFormTitle"]) {?>
	<h2><?=$arResult["FORM_TITLE"]?></h2>
<?}?>

<?=$arResult["FORM_HEADER"]?>
    <div class="control">
		    <input type="text" class="input-text input-full" name="form_text_<?=LANGUAGE_ID=='en'?7:1?>" required="required" placeholder="<?=GetMessage('CALLBACK_NAME')?>" title="<?=GetMessage('CALLBACK_NAME')?>">
		    <i class="icon-inside-input icon-user"></i>
	</div>
	
	<div class="control">
		<input type="text" class="input-text input-full phone-input" name="form_text_<?=LANGUAGE_ID=='en'?8:1?>" required="required" placeholder="<?=GetMessage('CALLBACK_PHONE')?>" title="<?=GetMessage('CALLBACK_PHONE')?>" />
            <i class="icon-inside-input icon-phone-small"></i>
    </div>
<div class="checkboxes-rit control">
    <label>
        <input type="checkbox">
        <span class="checkbox-title"><?=GetMessage('CALLBACK_ACCEPT')?>  <a onclick="window.open('/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf','_blank')" href="/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf" target="_blank">
        <?=GetMessage('CALLBACK_PERSONAL')?></a></span>
    </label>
</div>
    <div class="control-btn text-center">
    <input class="btn btn-blue" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
    </div>

	
<?=$arResult["FORM_FOOTER"]?>
<?
}  else {//endif (isFormNote)
?>
  


<?}?>