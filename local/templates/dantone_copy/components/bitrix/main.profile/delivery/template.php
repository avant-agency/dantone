<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>

<h1 class="h2 h2-profile text-left"><?=GetMessage('PROFILE_PROFILE')?></h1>

<div class="clearfix">
	
    <aside role="complementary">
        <ul class="catalog-nav">
            <li><a href="<?=SITE_DIR?>personal/profile/"><?=GetMessage('PROFILE_INFO')?></a></li>
            <li class="active"><a href="<?=SITE_DIR?>personal/delivery/"><?=GetMessage('PROFILE_ADDRESS')?></a></li>
            <li><a href="<?=SITE_DIR?>personal/order/?show_all=Y"><?=GetMessage('PROFILE_ORDERS')?></a></li>
        </ul>
    </aside>	

    <div role="main" id="main" class="profile-container"   >         

        <?=ShowError($arResult["strProfileError"]);?>
        <?
        if ($arResult['DATA_SAVED'] == 'Y')
           echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
       ?>

       <form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data" class="profile-form">
          <?=$arResult["BX_SESSION_CHECK"]?>
          <input type="hidden" name="lang" value="<?=LANG?>" />
          <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
          <input type="hidden" name="LOGIN" value=<?=$arResult["arUser"]["LOGIN"]?> />
          <input type="hidden" name="EMAIL" value=<?=$arResult["arUser"]["EMAIL"]?> />


          <div class="control-group-with-help mt20">
            <div class="control-with-help">
                <div class="control">
                <input type="text" name="PERSONAL_STATE" placeholder="<?=GetMessage('PROFILE_REGION')?>" class="input-text input-middle" value="<?=$arResult["arUser"]["PERSONAL_STATE"]?>">
                </div>
                <div class="control">
                    <input type="text" name="PERSONAL_CITY" required="required" placeholder="<?=GetMessage('PROFILE_CITY')?>*" class="input-text input-middle" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>">
                </div>
                <div class="control">
                    <input type="text" name="PERSONAL_STREET" required="required" placeholder="<?=GetMessage('PROFILE_STREET')?>*" class="input-text input-middle" value="<?=$arResult["arUser"]["PERSONAL_STREET"]?>">
                </div>
                <div class="control">
                    <input type="text" name="UF_HOUSE" required="required" placeholder="<?=GetMessage('PROFILE_HOUSE')?>*" class="input-text input-small3" value="<?=$arResult["arUser"]["UF_HOUSE"]?>">
                    <input type="text" name="UF_BUILDING" placeholder="<?=GetMessage('PROFILE_KORPUS')?>" class="input-text input-small3" value="<?=$arResult["arUser"]["UF_BUILDING"]?>">
                    <input type="text" name="UF_FLAT" placeholder="<?=GetMessage('PROFILE_FLAT')?>" class="input-text input-small3" value="<?=$arResult["arUser"]["UF_FLAT"]?>">
                </div>
                <div class="control">
                    <input type="text" name="PERSONAL_ZIP" placeholder="<?=GetMessage('PROFILE_INDEX')?>" class="input-text input-middle" value="<?=$arResult["arUser"]["PERSONAL_ZIP"]?>">
                </div>
            </div>
            <div class="help-inline help-large">
                <?=GetMessage('PROFILE_CHECK')?>
            </div>
        </div>

        
        <input name="save" value="<?=GetMessage('PROFILE_SAVE')?>" class="btn btn-blue input-middle btn-large" type="submit">
    </form>


</div>

</div>


