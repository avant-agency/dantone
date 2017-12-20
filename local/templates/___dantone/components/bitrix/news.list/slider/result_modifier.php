<?
if($arResult['ITEMS'] && $arParams['LANGUAGE_ID']=='en'){
	foreach($arResult['ITEMS'] as $key=>$arItem){
		if($arItem['PROPERTIES']['ENG_NAME']['VALUE'])$arItem['NAME']=$arItem['PROPERTIES']['ENG_NAME']['VALUE'];
		if($arItem['PROPERTIES']['ENG_LINKS']['VALUE'])$arItem['PROPERTIES']['LINKS']=$arItem['PROPERTIES']['ENG_LINKS'];
		$arResult['ITEMS'][$key] =$arItem;
	}
}
?>