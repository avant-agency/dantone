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
?>

<ul class="catalog-nav">
	
	<?foreach ($arResult['SECTIONS'] as &$arSection):?> 
	    <li class="<?=($arSection["ACTIVE_SECTION"] == "Y") ? "active" : ""?><?=trim($arSection["NAME"])=='Sale'?' red-item':''?>">
	     
            <a href="<?=$arSection["SECTION_PAGE_URL"]?>/"><?=$arSection["NAME"]?></a>
            <ul>
	           
	               <?foreach($arSection["SUBSECTIONS"] as $subsection):?>
	                   <li <?=($subsection["ACTIVE_SECTION"] == "Y") ? "class='active'" : ""?>><a href="<?=$subsection["SECTION_PAGE_URL"]?>/"><?=$subsection["NAME"]?></a></li>
	               <?endforeach;?>
	      
            </ul>
        </li>
	
	<?endforeach?>
	
</ul>	
	
                      


