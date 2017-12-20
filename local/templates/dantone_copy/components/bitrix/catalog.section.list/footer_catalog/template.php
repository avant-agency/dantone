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
          <ul>
	          
        <?   
	        $counter = 0;
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				
				if($counter == 6) {
					$counter = 0;
				?>
				  
          			</ul><ul>
				  	
				<?}

				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"><a href="<?=$arSection['SECTION_PAGE_URL']?>/">
										<?=$arParams['LANGUAGE_ID']=='en' && $arSection['UF_ENG_NAME']?$arSection['UF_ENG_NAME']:$arSection['NAME']?>
					
					</a>
				</li><?
				$counter++;	
			}
			?>
          </ul>	
			