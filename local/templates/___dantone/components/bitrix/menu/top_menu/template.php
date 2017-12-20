<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="main-menu" id="ddmenu"><ul>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="active <?if($arItem["LINK"] == SITE_DIR."catalog/") {?> haspopup full-width  <?}?>"  ><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
		    <?if($arItem["LINK"] == SITE_DIR."catalog/"):?>
		         <div class="dropdown">
                            <ul class="sub-menu-catalog">
                                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "menu_catalog", Array(
									"VIEW_MODE" => "TEXT",	// Вид списка подразделов
									"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
									"IBLOCK_TYPE" => "",	// Тип инфоблока
									"IBLOCK_ID" => "4",	// Инфоблок
									"SECTION_CODE" => "",	// Код раздела
									"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
									"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
									"TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
									"SECTION_FIELDS" => "",	// Поля разделов
										"SECTION_USER_FIELDS" => array('UF_ENG_NAME'),	// Свойства разделов
								"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
									"CACHE_TYPE" => "A",	
									'LANGUAGE_ID'=>LANGUAGE_ID,
									"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
									"CACHE_NOTES" => "",
									"CACHE_GROUPS" => "Y",	// Учитывать права доступа
									),
									false
								);?>
                            </ul>
                        </div>

		    
		    <?endif;?>
		</li>
	<?else:?>
		<li class="<?if($arItem["LINK"] == SITE_DIR."catalog/") {?> haspopup full-width  <?}?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
		    <?if($arItem["LINK"] == SITE_DIR."catalog/"):?>
		         <div class="dropdown">
                            <ul class="sub-menu-catalog">
                                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "menu_catalog", Array(
									"VIEW_MODE" => "TEXT",	// Вид списка подразделов
									"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
									"IBLOCK_TYPE" => "",	// Тип инфоблока
									"IBLOCK_ID" => "4",	// Инфоблок
									"SECTION_CODE" => "",	// Код раздела
									"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
									"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
									"TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
									"SECTION_FIELDS" => "",	// Поля разделов
									"SECTION_USER_FIELDS" => array('UF_ENG_NAME'),	// Свойства разделов
										'LANGUAGE_ID'=>LANGUAGE_ID,
								"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
									"CACHE_TYPE" => "A",	// Тип кеширования
									"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
									"CACHE_NOTES" => "",
									"CACHE_GROUPS" => "Y",	// Учитывать права доступа
									),
									false
								);?>
                            </ul>
                        </div>

		    
		    <?endif;?>
		
		</li>
	<?endif?>
	
<?endforeach?>

</ul></nav>
<?endif?>