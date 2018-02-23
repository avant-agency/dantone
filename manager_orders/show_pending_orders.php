<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

	CModule::IncludeModule("iblock");
	CModule::includeModule('sale');

	$IBLOCK_ID = 17;
	$ELEMENT_ID = $_POST['ELEMENT_ID'];
	$arFilter = Array('IBLOCK_ID' => $IBLOCK_ID, 'ID' => $ELEMENT_ID);

	$dbEl = CIBlockElement::GetList(Array(), $arFilter, false, false, Array());
	if($obEl = $dbEl->GetNextElement())
	{   
		$arProps = Array();
		$props = $obEl->GetProperties();
		foreach($props as $key => $el){
			$arProps[$key] = $el['VALUE'];
		}
		print_r(json_encode($arProps));
	}
	else
	{
		return false;
	}
?>