<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 

ShowMessage($arParams["~AUTH_RESULT"]); 


$APPLICATION->IncludeComponent( 
   "bitrix:main.register", 
   "", 
   Array( 
      "USER_PROPERTY_NAME" => "", 
      "SEF_MODE" => "N", 
      "SHOW_FIELDS" => Array("NAME", "LAST_NAME", "PERSONAL_PHONE", "PERSONAL_CITY"), 
      "REQUIRED_FIELDS" => Array("PERSONAL_PHONE", "PERSONAL_CITY", "NAME", "LAST_NAME"), 
      "AUTH" => "Y", 
      "USE_BACKURL" => "Y", 
      "SUCCESS_PAGE" => $APPLICATION->GetCurPageParam('',array('backurl')), 
      "SET_TITLE" => "N", 
      "USER_PROPERTY" => Array("UF_USER_SUBSCRIBE"),
      "USE_CAPTCHA" => "N"
   ) 
); 

?>