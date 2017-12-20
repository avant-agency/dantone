<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 

CModule::IncludeModule('iblock');

$el = new CIBlockElement;

$fid = CFile::SaveFile($_FILES['file'], "projects");
$file_getPath = CFile::GetPath($fid);
$PROP = array();
$PROP[249] = $fid;
$PROP[250] = $_REQUEST["name"];
$PROP[251] = $_REQUEST["phone"];
$PROP[252] = $_REQUEST["email"];

$arLoadProductArray = Array(
	"IBLOCK_ID"      => 16,
	"PROPERTY_VALUES"=> $PROP,
	"NAME"           => time(),
	"PREVIEW_TEXT"   => $_REQUEST["wishes"],
);

if($PRODUCT_ID = $el->Add($arLoadProductArray))
{
	$arEventFields = array(
		"NAME" => $_REQUEST["name"],
		"PHONE" => $_REQUEST["phone"],
		"EMAIL" => $_REQUEST["email"],
		"WISHES" => $_REQUEST["wishes"],
		"FILE_LINK" => "https://www.dantonehome.ru".$file_getPath,
	);
	
	$r = CEvent::Send("WARDS_BLOCK", 's1', $arEventFields);
	if($r) echo 1;
	else echo 0;
}
else
  echo 0;

die();
?>