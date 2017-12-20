<?php
   
   require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
   require('phpQuery-onefile.php');

   if( !CModule::includeModule('iblock') || !CModule::includeModule('catalog') || !CModule::includeModule('sale') ) {
	   die('Не удалось подключить необходимые модули');
   }
   
   class DantoneParser {
	   
	   public $html;
	   
	   function __construct($html) {
		   $this->html = $html;
	   }
	   
	   function getClosingTagContent($tagName) {
		   
		   $openTag = "<".$tagName.">";
		   $closeTag = "</".$tagName.">";
		  
		   $startPos = strpos($this->html, $openTag) + strlen($openTag);
		   $endPos = strpos($this->html, $closeTag) + strlen($closeTag);
		   
		   return substr($this->html, $startPos, $endPos - $startPos - strlen($closeTag)); 
	   }
	   
	   function getPrice() {
		  $openTag = "<span class=\"value\">";

		  $closeTag = "</span>";  
		  		  		  
		  $startPos = strpos($this->html, $openTag) + strlen($openTag);
		  $endPos = strpos($this->html, $closeTag, $startPos) + strlen($closeTag);
		   
		  return substr($this->html, $startPos, $endPos - $startPos - strlen($closeTag));
		  
	   }
	   
	   function getDesc() {
		  $openTag = "<div class=\"product-descr\">";

		  $closeTag = "</div>";  
		  		  		  
		  $startPos = strpos($this->html, $openTag) + strlen($openTag);
		  $endPos = strpos($this->html, $closeTag, $startPos) + strlen($closeTag);
		   
		  return substr($this->html, $startPos, $endPos - $startPos - strlen($closeTag));
		  
	   }
	   
	   function getFeatures() {
		   
		   
		   
		   $p_open = "<div class=\"param\">";
		   $p_close = "</div>";
		   
		   $v_open = "<div class=\"value\">";
		   $v_close = "</div>";
		   
		   $count = substr_count($this->html, '<div class="item">');
		   $result = Array();
		   
		   $offset = strpos($this->html, $p_open);
		   
		   for($i = 0; $i < $count; ++$i) {
			   $startPos = strpos($this->html, $p_open, $offset) + strlen($p_open);
			   $endPos = strpos($this->html, $p_close, $startPos) + strlen($p_close);
			   
			   $result[$i]["KEY"] = substr($this->html, $startPos, $endPos - $startPos - strlen($p_close));
			   
			   //$offset += strlen(substr($this->html, $startPos, $endPos - $startPos));
			   
			   $startPos1 = strpos($this->html, $v_open, $offset) + strlen($v_open);
			   $endPos1 = strpos($this->html, $v_close, $startPos1) + strlen($v_close);
			   
			   $result[$i]["VALUE"] = substr($this->html, $startPos1, $endPos1 - $startPos1 - strlen($v_close));
			   
			   $offset = strpos($this->html, $p_open, $endPos);

		   }
		   
		   return $result;
		   
		   
		   
	   }
	   
	   
	   function getPics() {
		   
		   $s_open = "<ul class=\"slides\"";
		   $s_close = "</ul>";
		   
		   $startPos = strpos($this->html, $s_open) + strlen($s_open);		   
		   $endPos = strpos($this->html, $s_close, $startPos) + strlen($s_close);
		   
		   $slides = substr($this->html, $startPos, $endPos - $startPos - strlen($s_close));		   
		   
		   $b = strpos($slides, "<li");
		   $slides = substr($slides, $b);
		   
		   $count = substr_count($slides, "<li");
		   
		   
		   
		   $result = Array(); 
		   $offset = 0;
		   
		   for($i = 0; $i < $count; ++$i) {
			   

			   
			   
			   $src_s =  strpos($slides, "src=\"", $offset) + strlen("src=\"");	
			   $src_e =  stripos($slides, "jpg\"", $src_s) + strlen("jpg\"");
			   

			   
			   $result[$i] = substr($slides, $src_s, $src_e - $src_s - strlen("\"" ));
			   
			   
			   $offset =  $src_e;
			   

			   
			   
			   
			   
			   
			   
			   
		   }
		   
		   return $result;
		   
	   }
	   
	  
	   
	   
	   
   }
   
   
   $URLS = Array(
     "https://www.dantonehome.ru/catalog/alfombras/kover-stables/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-octavia/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-santini/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-sacramento/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-monk/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-blokker/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-elan/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-mercer/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-mercer/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-maloney/",
     "https://www.dantonehome.ru/catalog/alfombras/kover-quantos/"
     

  
   );
   
      

   

   
   
   
   foreach($URLS as $url) {
	   parseURL($url, 52);
   }
   


 
   

   function parseURL($url, $sid) {
   
   $doc = file_get_contents($url);
   
   $SECTIONS = explode("/", $url);
   $code = $SECTIONS[count($SECTIONS) - 2];
   
   $parser = new DantoneParser($doc);
   
   $noSpaces = htmlentities($parser->getPrice());
   $noSpaces = str_replace(Array(" ", "&nbsp;"), "", $noSpaces);

      
   if( strpos($noSpaces, "От") ) {
	   $from = "Y";
	   $priceF = substr($noSpaces, strlen("От") + 1);
	  
   } else {
	   $priceF = $noSpaces;
	   $from = "N";
   }
      
      
   
   
   $FIELDS["NAME"] = $parser->getClosingTagContent("h1");
   $FIELDS["PRICE"] = floatval($priceF);
   $FIELDS["FROM"] = $from;
   $FIELDS["DETAIL_TEXT"] = $parser->getDesc();
   $FIELDS["CODE"] = $code;
   $FIELDS["SECTION_CODE"] = "light";
   $FIELDS["FEATURES"] = $parser->getFeatures();
   $FIELDS["ARTIKUL"] = ($FIELDS["FEATURES"][count($FIELDS["FEATURES"]) - 1]["KEY"] == "Артикул") ? $FIELDS["FEATURES"][count($FIELDS["FEATURES"]) - 1]["VALUE"] : ""; 
   $FIELDS["PHOTOS"] = $parser->getPics();
   
   if( $FIELDS["FEATURES"][count($FIELDS["FEATURES"]) - 1]["KEY"] == "Артикул") {
     unset($FIELDS["FEATURES"][count($FIELDS["FEATURES"]) - 1]);
     }
   
   
   print_r($FIELDS);
   
   $features = Array();
   
   foreach($FIELDS["FEATURES"] as $feature) {
	   $features[] = array(
		  "VALUE" => $feature["VALUE"],
		  "DESCRIPTION" => $feature["KEY"]  
	   );
   }
   
   
   $photos = Array();
   
   foreach($FIELDS["PHOTOS"] as $photo) {
	  
	 $photos[] =  array("VALUE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$photo));
   }
   
   

   
   
 

   
   $el = new CIBlockElement;
   
   echo "<pre>";
   print_r($photos);
   echo "</pre>";
   
   
   $arFields = array(
	   "ACTIVE" => "Y", 
	   "IBLOCK_ID" => 4,
	   "IBLOCK_SECTION_ID" => $sid,
	   "NAME" => $FIELDS["NAME"],
	   "CODE" => $FIELDS["CODE"],
	   "PREVIEW_PICTURE" => $photos[0]["VALUE"],
	   "DETAIL_TEXT" =>  $FIELDS["DETAIL_TEXT"],
	   "PROPERTY_VALUES" => array(
		   "PRICE_FROM" => ($FIELDS["FROM"] == "Y") ? 21 : null , 	
		   "ARTIKUL" => $FIELDS["ARTIKUL"],
		   "FEATURES" => $features,
		   "MORE_PHOTO" => $photos
		   
		)
	);	
   
   
   
    if($PRODUCT_ID = $el->Add($arFields))
	  echo "New ID: ".$PRODUCT_ID;
	else
	  echo "Error: ".$el->LAST_ERROR;
   
     
     
    $elc = new CIBlockElement; 
     
    $arCFields = array(
	   "ACTIVE" => "Y", 
	   "IBLOCK_ID" => 5,
	   "NAME" => $FIELDS["NAME"],
	   "CODE" => $FIELDS["CODE"],
	   "PROPERTY_VALUES" => array(	
		   "ARTIKUL" => $FIELDS["ARTIKUL"],
		   "CML2_LINK" => 	$PRODUCT_ID	   
		) 
    );
    
    if($PRODUCT2_ID = $elc->Add($arCFields)) {
	  echo "New ID: ".$PRODUCT2_ID;
	  
	  if(CCatalogProduct::Add(Array("ID" => $PRODUCT2_ID))) {
		  if(CPrice::SetBasePrice($PRODUCT2_ID, $FIELDS["PRICE"], "RUB")) {
			  echo "PRICE UPDATED";
		  }		  
	  }
	  
	  
	
	}  else {
	  echo "Error: ".$elc->LAST_ERROR;
	  
	}

    }
   
   
   	
	
?>	