<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>

<h1 class="lk-title"><?=GetMessage('PROFILE_PROFILE')?></h1>

<div class="clearfix">
	
    <aside role="complementary">
        <ul class="catalog-nav">
            <li><a  class="lk-link" href="<?=SITE_DIR?>personal/profile/"><span class="svg-span">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px"
	 viewBox="0 0 350 350" style="enable-background:new 0 0 350 350;" xml:space="preserve">
	<path d="M175,171.173c38.914,0,70.463-38.318,70.463-85.586C245.463,38.318,235.105,0,175,0s-70.465,38.318-70.465,85.587
		C104.535,132.855,136.084,171.173,175,171.173z"/>
	<path d="M41.909,301.853C41.897,298.971,41.885,301.041,41.909,301.853L41.909,301.853z"/>
	<path d="M308.085,304.104C308.123,303.315,308.098,298.63,308.085,304.104L308.085,304.104z"/>
	<path d="M307.935,298.397c-1.305-82.342-12.059-105.805-94.352-120.657c0,0-11.584,14.761-38.584,14.761
		s-38.586-14.761-38.586-14.761c-81.395,14.69-92.803,37.805-94.303,117.982c-0.123,6.547-0.18,6.891-0.202,6.131
		c0.005,1.424,0.011,4.058,0.011,8.651c0,0,19.592,39.496,133.08,39.496c113.486,0,133.08-39.496,133.08-39.496
		c0-2.951,0.002-5.003,0.005-6.399C308.062,304.575,308.018,303.664,307.935,298.397z"/>
</svg>

                        </span>
                                <span class="lk-block">
                              <?=GetMessage('PROFILE_INFO')?>
                        </span>
                                <span class="lk-arrow"></span></a></li>
            <li class="active"><a  class="lk-link" href="<?=SITE_DIR?>personal/delivery/">
                            <span class="svg-span">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
		<path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
</svg>

                        </span>
                            <span class="lk-block">
                              <?=GetMessage('PROFILE_ADDRESS')?>
                        </span>
                            <span class="lk-arrow"></span>

                        </a></li>
            <li><a  class="lk-link" href="<?=SITE_DIR?>personal/order/?show_all=Y"><span class="svg-span">
                            <svg version="1.1" id="Capa_3" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px"
	 viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
<path d="M30,0.061c-16.542,0-30,13.458-30,30s13.458,29.879,30,29.879s30-13.337,30-29.879S46.542,0.061,30,0.061z M32,30.939
	c0,1.104-0.896,2-2,2H14c-1.104,0-2-0.896-2-2s0.896-2,2-2h14v-22c0-1.104,0.896-2,2-2s2,0.896,2,2V30.939z"/>
</svg>
                        </span>
                            <span class="lk-block">
                              <?=GetMessage('PROFILE_ORDERS')?>
                        </span>
                            <span class="lk-arrow"></span></a></li>
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


