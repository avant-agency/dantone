<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>

<h1 class="h2 h2-profile text-left"><?=GetMessage('PROFILE_PROFILE')?></h1>

<div class="clearfix">
	
<aside role="complementary">
                <ul class="catalog-nav">
                    <li class="active" ><a href="<?=SITE_DIR?>personal/profile/"><?=GetMessage('PROFILE_INFO')?></a></li>
                    <li><a href="<?=SITE_DIR?>personal/delivery/"><?=GetMessage('PROFILE_ADDRESS')?></a></li>
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
         
        
         

        <div class="control-group-with-help mt20"> 
			<div class="control-with-help">
					
					<div class="control radio-as-input" id="personTypeBlock">
                                <label class="radio">
                                <input type="radio" name="UF_TYPE_ENTITY" <?= ($arResult['arUser']["UF_TYPE_ENTITY"] == 1) ? "checked='checked'" : ""?> value="1" style="position: absolute; left: -9999px;"><?=GetMessage('PROFILE_FTYPE')?></label>
                                <label class="radio">
                                <input type="radio" name="UF_TYPE_ENTITY" <?= ($arResult['arUser']["UF_TYPE_ENTITY"] == 2) ? "checked='checked'" : ""?> value="2" style="position: absolute; left: -9999px;"><?=GetMessage('PROFILE_YTYPE')?></label>
                                </div>
					<script type="text/javascript">
						
                                $(function () {
                                    var radios = $('#personTypeBlock input[type="radio"]');
                                    radios.change(function () {
                                        var radio = $(this);

                                        var legalPersonBlock = $('#legalPersonBlock');
                                        if (radio.is(':checked') && radio.val() == '1') {
                                            legalPersonBlock.hide(500);
                                            legalPersonBlock.find('input').val('');
                                        } else if(radio.is(':checked') && radio.val() == '2') {
                                            legalPersonBlock.show(500);
                                        }

                                        return false;
                                    });

                                    $('#personTypeBlock input[type="radio"]:checked').change();
                                });
                            </script>
					
					<div class="control">
						<input class="input-text input-middle"  type="text" name="NAME" placeholder="<?=GetMessage('NAME')?>" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
					</div>		
				
					<div class="control">
						<input class="input-text input-middle" type="text" placeholder="<?=GetMessage('LAST_NAME')?>" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
					</div>
					
					<div class="control">
						<input placeholder="<?=GetMessage('SECOND_NAME')?>" class="input-text input-middle" type="text" name="SECOND_NAME" maxlength="50"  value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
					</div>
					
					<div class="control">
						<input placeholder="E-mail" class="input-text input-middle" type="text" name="EMAIL" maxlength="50"  value="<?=$arResult["arUser"]["EMAIL"]?>" />
					</div>
			
				    <div class="control">
						<input class="input-text input-middle" placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>" type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" /> 
				    </div>	
			
                    <div class="control">
						<input class="input-text input-middle" placeholder="<?=GetMessage('NEW_PASSWORD_CONFIRM')?>" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /> 
                    </div>	
			
				
						<div id="legalPersonBlock">
						   <div class="control">
						<input class="input-text input-middle" placeholder="<?=GetMessage('PROFILE_COMPANY')?>" type="text" name=" UF_LEGAL_COMPANY"  value="<?=$arResult["arUser"]["UF_LEGAL_COMPANY"]?>" /> 
				    </div>	
			
                    <div class="control">
						<input class="input-text input-middle" placeholder="<?=GetMessage('PROFILE_INN')?>" type="text" name="UF_INN" value="<?=$arResult["arUser"]["UF_INN"]?>"/> 
                    </div>
						</div>
					
			</div>
			<div class="help-inline help-large">
                      <?=GetMessage('PROFILE_CHECK')?>  </div>
			
			
			
        </div>

		<input name="save" value="<?=GetMessage('PROFILE_SAVE')?>" class="btn btn-blue input-middle btn-large" type="submit">
	</form>


</div>

</div>


