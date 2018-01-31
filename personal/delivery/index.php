<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Настройки пользователя");
\Bitrix\Main\Loader::includeModule('sale');
\Bitrix\Main\Loader::includeModule('iblock');

if(isset($_REQUEST["saveID"]))
{

$curID = intVal($_REQUEST["saveID"]);
$el = new CIBlockElement;

$PROP = array();
$PROP[255] = $usid;  
$PROP[256] = $_REQUEST["ORDER_PROPS_12"];        
$PROP[257] = $_REQUEST["ORDER_PROPS_13"];        
$PROP[258] = $_REQUEST["ORDER_PROPS_14"];        
$PROP[259] = $_REQUEST["ORDER_PROPS_15"];        
$PROP[260] = $_REQUEST["ORDER_PROPS_17"];        
$PROP[261] = $_REQUEST["ORDER_PROPS_18"];        
$PROP[262] = $_REQUEST["ORDER_PROPS_4"];        

$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
  "IBLOCK_ID"      => 17,
  "PROPERTY_VALUES"=> $PROP,
	"NAME"           => $_REQUEST["NAME"],
  "ACTIVE"         => "Y",            // активен

  );

if(!($PRODUCT_ID = $el->Update($curID, $arLoadProductArray)))
  echo "Error: ".$el->LAST_ERROR;

}

if($_REQUEST["action"] == "add"){

global $USER;
$usid = $USER->GetID();
$el = new CIBlockElement;

$PROP = array();
$PROP[255] = $usid;  
$PROP[256] = $_REQUEST["ORDER_PROPS_12"];        
$PROP[257] = $_REQUEST["ORDER_PROPS_13"];        
$PROP[258] = $_REQUEST["ORDER_PROPS_14"];        
$PROP[259] = $_REQUEST["ORDER_PROPS_15"];        
$PROP[260] = $_REQUEST["ORDER_PROPS_17"];        
$PROP[261] = $_REQUEST["ORDER_PROPS_18"];        
$PROP[262] = $_REQUEST["ORDER_PROPS_4"];        

$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
  "IBLOCK_ID"      => 17,
  "PROPERTY_VALUES"=> $PROP,
	"NAME"           => $_REQUEST["NAME"],
  "ACTIVE"         => "Y",            // активен

  );

if(!($PRODUCT_ID = $el->Add($arLoadProductArray)))
  echo "Error: ".$el->LAST_ERROR;

}
?>

<section id="content">
<div class="lk-wrap container">
<?if(isset($_REQUEST["edit_id"]))
	{?><h1 class="lk-title">Редактировать адрес</h1>
	<?}else{?>
	<h1 class="lk-title">Личный кабинет</h1>
	<?}?>

<?
CModule::IncludeModule('sale'); 

?>

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
                              Личные данные
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
                              Адреса доставки
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
                              История заказов
                        </span>
                            <span class="lk-arrow"></span></a></li>
        </ul>
    </aside>	
	<h2 class="mobile-visibleLK lk-title">
                    <?=GetMessage('PROFILE_PROFILE')?>
                </h2>
<?
if(isset($_REQUEST["edit_id"]))
{
?><?
	$curID = intVal($_REQUEST["edit_id"]);
	
	$arSelect = Array();
	$arFilter = Array("IBLOCK_ID"=>17, "ID"=>$curID);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
	while($ob = $res->GetNextElement()){ 
		 $arFields = $ob->GetFields();  
		 $arProps = $ob->GetProperties();
	}
?>
 <div role="main" id="main" class="profile-container"   >         

        <?=ShowError($arResult["strProfileError"]);?>
        <?
        if ($arResult['DATA_SAVED'] == 'Y')
           echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
       ?>

       <form method="post" name="form1" action="/personal/delivery/" enctype="multipart/form-data" class="profile-form">
		   <input type="hidden" name="saveID" value="<?=$curID?>" />
          <div class="control-group-with-help mt20">
            <div class="control-with-help">
				 <div class="control">
					<input type="text" name="NAME" required="required" placeholder="Название адреса" class="input-text input-middle" value="<?=$arFields["NAME"]?>">
                </div>
                <div class="control">
					<input type="text" name="ORDER_PROPS_12" placeholder="Область" class="input-text input-middle" value="<?=$arProps["STATE"]["VALUE"];?>">
                </div>
                <div class="control">
					<input type="text" name="ORDER_PROPS_13" required="required" placeholder="Город*" class="input-text input-middle" value="<?=$arProps["CITY"]["VALUE"];?>">
                </div>
                <div class="control">
					<input type="text" name="ORDER_PROPS_14" required="required" placeholder="Улица*" class="input-text input-middle" value="<?=$arProps["STREET"]["VALUE"];?>">
                </div>
                <div class="control">
					<input type="text" name="ORDER_PROPS_15" required="required" placeholder="Дом*" class="input-text input-small3" value="<?=$arProps["HOUSE"]["VALUE"];?>">
					<input type="text" name="ORDER_PROPS_17" placeholder="Строение" class="input-text input-small3" value="<?=$arProps["BLOCK"]["VALUE"];?>">
					<input type="text" name="ORDER_PROPS_18" placeholder="Квартира" class="input-text input-small3" value="<?=$arProps["FLAT"]["VALUE"];?>">
                </div>
                <div class="control">
					<input type="text" name="ORDER_PROPS_4" placeholder="Индекс" class="input-text input-middle" value="<?=$arProps["INDEX"]["VALUE"]?>">
                </div>
            </div>
            <div class="help-inline help-large">
                <?=GetMessage('PROFILE_CHECK')?>
            </div>
        

        
			  <input name="save" value="Сохранить" class="btn btn-blue input-middle btn-large" type="submit" />
    </form>
</div>



<?







}
else if($_REQUEST["addAdress"] == "Y")
{

?>
<div role="main" id="main" class="profile-container"   >         

        <?=ShowError($arResult["strProfileError"]);?>
        <?
        if ($arResult['DATA_SAVED'] == 'Y')
           echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
       ?>

       <form method="post" name="form1" action="/personal/delivery/" enctype="multipart/form-data" class="profile-form">
		  <input type="hidden" name="action" value="add" />
          <div class="control-group-with-help mt20">
            <div class="control-with-help">
                <div class="control">
					<input type="text" name="NAME" required="required" placeholder="Название адреса" class="input-text input-middle" value="">
                </div>
                <div class="control">
					<input type="text" required="required" name="ORDER_PROPS_12" placeholder="Область" class="input-text input-middle" value="">
                </div>
                <div class="control">
					<input type="text" required="required" name="ORDER_PROPS_13" required="required" placeholder="Город*" class="input-text input-middle" value="">
                </div>
                <div class="control">
					<input type="text" required="required" name="ORDER_PROPS_14" required="required" placeholder="Улица*" class="input-text input-middle" value="">
                </div>
                <div class="control">
					<input type="text" required="required" name="ORDER_PROPS_15" required="required" placeholder="Дом*" class="input-text input-small3" value="">
					<input type="text" name="ORDER_PROPS_17" placeholder="Строение" class="input-text input-small3" value="">
					<input type="text" name="ORDER_PROPS_18" placeholder="Квартира" class="input-text input-small3" value="">
                </div>
                <div class="control">
					<input type="text" name="ORDER_PROPS_4" placeholder="Индекс" class="input-text input-middle" value="">
                </div>
            </div>
            <div class="help-inline help-large">
                <?=GetMessage('PROFILE_CHECK')?>
            </div>
        

        
			  <input name="save" value="Сохранить" class="btn btn-blue input-middle btn-large" type="submit" />
    </form>


</div>


<?

}
else
{

?>


	<a href="/personal/delivery/?addAdress=Y" class="lk-addAddress">
                    <span class="addAddress-svg"></span>
                    <span class="addAddress-text">
                        Добавить адрес
                    </span>
                </a>



<div class="lk-addresses-wrap">
<?
global $USER;
$usid = $USER->GetID();

$arSelect = Array();
	$arFilter = Array("IBLOCK_ID"=>17, "USER_ID"=>$usid);
	$res = CIBlockElement::GetList(Array("ID" => "DESC"), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()){ 
		 $arFields = $ob->GetFields();  
		 $arProps = $ob->GetProperties();



		?>
                    <div class="lk-address-block">
                        <div class="lk-address-title-wrap">
                            <div class="lk-address-title">
                                <?=$arFields["NAME"]?>
                            </div>
                            <div class="lk-address-edit">
							<a href="/personal/delivery/?edit_id=<?=$arFields["ID"]?>">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
									<g id="XMLID_520_">
										<path fill="#989898" id="XMLID_521_" d="M7.105,221.52l30,51.961c3.576,6.192,11.025,9,17.797,6.709l44.144-14.934
											c3.901,2.572,7.946,4.912,12.109,7.006l9.136,45.68C121.693,324.953,127.85,330,135,330h60c7.15,0,13.307-5.047,14.709-12.058
											l9.136-45.68c4.163-2.094,8.207-4.435,12.108-7.006l44.145,14.934c6.772,2.289,14.222-0.516,17.797-6.709l30-51.962
											c3.575-6.192,2.283-14.047-3.088-18.767l-35.01-30.767c0.135-2.331,0.203-4.664,0.203-6.985c0-2.322-0.068-4.655-0.203-6.986
											l35.008-30.766c5.371-4.72,6.663-12.575,3.088-18.767l-30-51.962c-3.575-6.192-11.025-9.001-17.797-6.709l-44.143,14.934
											c-3.9-2.572-7.945-4.912-12.108-7.006l-9.136-45.68C208.307,5.047,202.15,0,195,0h-60c-7.15,0-13.307,5.047-14.709,12.058
											l-9.136,45.68c-4.163,2.094-8.207,4.435-12.108,7.006L54.902,49.81c-6.77-2.29-14.221,0.517-17.797,6.709l-30,51.962
											c-3.575,6.192-2.283,14.047,3.088,18.767l35.008,30.766C45.067,160.342,45,162.675,45,165s0.067,4.659,0.201,6.986l-35.008,30.766
											C4.822,207.472,3.53,215.327,7.105,221.52z M165,105c33.084,0,60,26.916,60,60s-26.916,60-60,60s-60-26.916-60-60
											S131.916,105,165,105z"></path>
									</g>
									</svg>
							</a>
                            </div>
                        </div>
                        <div class="lk-address-content">
                            <div class="lk-address-line">
                                <div class="lk-address-line-title">Город:</div>
                                <div class="lk-address-line-name"><?=$arProps["CITY"]["VALUE"]?></div>
                            </div>
                            <div class="lk-address-line">
                                <div class="lk-address-line-title">Улица:</div>
                                <div class="lk-address-line-name"><?=$arProps["STREET"]["VALUE"]?></div>
                            </div>
                            <div class="lk-address-line">
                                <div class="lk-address-line-title">Дом:</div>
                                <div class="lk-address-line-name"><?=$arProps["HOUSE"]["VALUE"]?></div>
                            </div>
                            <div class="lk-address-line">
                                <div class="lk-address-line-title">Корпус:</div>
                                <div class="lk-address-line-name"><?=$arProps["BLOCK"]["VALUE"]?></div>
                            </div>
                            <div class="lk-address-line">
                                <div class="lk-address-line-title">Квартира:</div>
                                <div class="lk-address-line-name"><?=$arProps["FLAT"]["VALUE"]?></div>
                            </div>
                        </div>
                    </div>



<?

}
}
?>















</div>



</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>