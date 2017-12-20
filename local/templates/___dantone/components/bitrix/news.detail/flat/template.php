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
$this->setFrameMode(true);

CUtil::InitJSCore(array('fx'));
?>

<article class="base-article">
	
 <h1><?=$arResult["NAME"]?></h1>	
	
 <ul class="breadcrumbs">
                <li><a href="/news/"><i class="icon-back"></i><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></li>
               
            </ul>
	
	

<?=$arResult["DETAIL_TEXT"]?>


<article>