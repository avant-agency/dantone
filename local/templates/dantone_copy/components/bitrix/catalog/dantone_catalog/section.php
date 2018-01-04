<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);

if($arResult["VARIABLES"]["SECTION_ID"] == 22)
{
	include_once "wards.php";
	$APPLICATION->SetPageProperty("title", "Модульные гардеробы в американском стиле");
	$APPLICATION->SetPageProperty("description", "Модульная система гардеробных шкафов, выполненная в классическом белом или стильном серо-зелёном цвете, гармонично впишется в любой интерьер, позволит рационально использовать каждый квадратный метр жилья и подчеркнёт прекрасный вкус своего владельца.");
	die();
}

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}
?>


<?
if ($isVerticalFilter)
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_vertical.php");
else
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_horizontal.php");
?>
<?if(!defined('RECOMMEND_FILTER'))include 'hit.php';?>
<?// функционал избранного?>
<script>
	$(function(){
		$("body").on("click", ".add-favorite", function(){
			var btn = $(this);
			$.ajax({
				method: "POST",
				url: "/ajax/favorites.php",
				data: { elid: $(this).data('elid'), action: "fav-add" }
			})
			.done(function( msg ) {
				$(".header-dark-line-favorite span.count").each(function(i,e){
					var count = $(e).text();
					if(count == 0) {
						$(e).css("display", "block");
					}
					count++;
					$(e).text(count);
				});
				$(btn).addClass("favorite-icon-active");
				$(btn).addClass("del-favorite");
				$(btn).removeClass("add-favorite");
				var res = JSON.parse(msg);
				if(!res.res) alert(res.data)
			});

			return false;
		});
		$("body").on("click", ".del-favorite", function(){
			var btn = $(this);
			$.ajax({
				method: "POST",
				url: "/ajax/favorites.php",
				data: { elid: $(this).data('elid'), action: "fav-del" }
			})
			.done(function( msg ) {
				$(".header-dark-line-favorite span.count").each(function(i,e){
					var count = $(e).text();
					if(count == 0) {
						$(e).css("display", "block");
					}
					count--;
					$(e).text(count);
					if(count == 0) {
						$(e).css("display", "none");
					}
				});
				$(btn).removeClass("favorite-icon-active");
				$(btn).removeClass("del-favorite");
				$(btn).addClass("add-favorite");
				var res = JSON.parse(msg);
				if(!res.res) alert(res.data)
			});

			return false;
		});
	});
</script>