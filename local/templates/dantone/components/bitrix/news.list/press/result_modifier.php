<?
if($arResult['ITEMS'] && $arParams['LANGUAGE_ID']=='en'){
	foreach($arResult['ITEMS'] as $key=>$arItem){
		if($arItem['PROPERTIES']['ENG_NAME']['VALUE'])$arItem['NAME']=$arItem['PROPERTIES']['ENG_NAME']['VALUE'];
		if($arItem['PROPERTIES']['ENG_PREVIEW_TEXT']['VALUE'])$arItem['PREVIEW_TEXT']=$arItem['PROPERTIES']['ENG_PREVIEW_TEXT']['~VALUE']['TEXT'];
		$arResult['ITEMS'][$key] =$arItem;
	}
}
?>