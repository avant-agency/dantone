<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;
global $APPLICATION;
if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}
if (isset($templateData['TEMPLATE_LIBRARY']) && !empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;
	if (!empty($templateData['CURRENCIES']))
		$loadCurrency = Loader::includeModule('currency');
	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency)
	{
		?>
		<script type="text/javascript">
			BX.Currency.setCurrencies(<? echo $templateData['CURRENCIES']; ?>);
		</script>
		<?
	}
}
if($arResult['RECOMMENDS']){
	$recommendFilter=array('SECTION_ID'=>$arResult['RECOMMENDS'], 'INCLUDE_SUBSECTIONS'=>'Y');
	define('RECOMMEND_FILTER', 1);

}
if($arResult['RECOMMENDS_IDS']){
	$recommendFilter2=array('ID'=>$arResult['RECOMMENDS_IDS']);
	define('RECOMMEND_FILTER', 1);
}
if($recommendFilter || $recommendFilter2)$GLOBALS['recommendFilter']=array(array('LOGIC'=>'OR', $recommendFilter, $recommendFilter2));

?>
