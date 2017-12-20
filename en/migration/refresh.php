<?php

   require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


   if( !CModule::includeModule('iblock') ) {
	   die('Не удалось подключить необходимые модули');
   }
   
   
  

   		CIBlock::setFields(4, Array("DETAIL_TEXT_TYPE" => Array("DEFAULT_VALUE" => "HTML")));		
		
	
?>
   
   
   
