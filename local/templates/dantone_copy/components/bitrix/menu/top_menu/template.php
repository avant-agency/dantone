<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="main-menu" id="ddmenu"><ul>

	<?
	foreach($arResult as $arItem):
		if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
			continue;
		?>
		<?//if($arItem["SELECTED"]):?>
		<li class="<?if($arItem["SELECTED"]):?>active <?endif?><?if($arItem["PARAMS"]['POPUP']) {?> haspopup full-width  <?}?><?if($arItem['PARAMS']['RED']=='Y'):?>red-item<?endif?>"  >
			<a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
			<?if($arItem["PARAMS"]['POPUP']):?>
			<div class="dropdown">
				<?switch($arItem["PARAMS"]['POPUP']):
				case 'catalog':?>
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
					false,
					array('HIDE_ICONS'=>'Y')
					);?>
				</ul>
				<?
				break;
				case 'news':
				?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list", 
					"flat", 
					array(
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "Y",
						"IBLOCK_TYPE" => $arParams['LANGUAGE_ID']=='en'?'en_info':"news",
						"IBLOCK_ID" => $arParams['LANGUAGE_ID']=='en'?9:"1",
						"NEWS_COUNT" => "3",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "",
						'LANGUAGE_ID'=>$arParams['LANGUAGE_ID'],
						
						"FIELD_CODE" => array(
							0 => "ID",
							1 => "",
							),
						"PROPERTY_CODE" => array(
							0 => "",
							1 => "DESCRIPTION",
							2 => "",
							),
						'NO_HEAD'=>'Y',
						
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_BROWSER_TITLE" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_LAST_MODIFIED" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"CACHE_FILTER" => "Y",
						"CACHE_GROUPS" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "Новости",
						"PAGER_SHOW_ALWAYS" => "Y",
						"PAGER_TEMPLATE" => "",
						"PAGER_DESC_NUMBERING" => "Y",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "Y",
						"PAGER_BASE_LINK_ENABLE" => "Y",
						"SET_STATUS_404" => "Y",
						"SHOW_404" => "Y",
						"MESSAGE_404" => "",
						"PAGER_BASE_LINK" => "",
						"PAGER_PARAMS_NAME" => "arrPager",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"COMPONENT_TEMPLATE" => "main_news",
						"TEMPLATE_THEME" => "blue",
						"MEDIA_PROPERTY" => "",
						"SLIDER_PROPERTY" => "",
						"SEARCH_PAGE" => "/search/",
						"USE_RATING" => "N",
						"USE_SHARE" => "N",
						"FILE_404" => ""
						),
					false,
					array('HIDE_ICONS'=>'Y')
					);?>
				<?
				break;
				case 'projects':
				?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list", 
					"flat", 
					array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "Y",
						"IBLOCK_TYPE" => "news",
						"IBLOCK_ID" => "6",
						"NEWS_COUNT" => "3",
						'LANGUAGE_ID'=>$arParams['LANGUAGE_ID'],
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "",
						'NO_HEAD'=>'Y',
						"FIELD_CODE" => array(
							0 => "ID",
							1 => "",
							),
						"PROPERTY_CODE" => array(
							0 => "",
							1 => "DESCRIPTION",
							2 => "",
							),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_BROWSER_TITLE" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_LAST_MODIFIED" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"CACHE_FILTER" => "Y",
						"CACHE_GROUPS" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "Новости",
						"PAGER_SHOW_ALWAYS" => "Y",
						"PAGER_TEMPLATE" => "",
						"PAGER_DESC_NUMBERING" => "Y",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "Y",
						"PAGER_BASE_LINK_ENABLE" => "Y",
						"SET_STATUS_404" => "Y",
						"SHOW_404" => "Y",
						"MESSAGE_404" => "",
						"PAGER_BASE_LINK" => "",
						"PAGER_PARAMS_NAME" => "arrPager",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"COMPONENT_TEMPLATE" => "main_news",
						"TEMPLATE_THEME" => "blue",
						"MEDIA_PROPERTY" => "",
						"SLIDER_PROPERTY" => "",
						"SEARCH_PAGE" => "/search/",
						"USE_RATING" => "N",
						"USE_SHARE" => "N",
						"FILE_404" => ""
						),
					false,
					array('HIDE_ICONS'=>'Y')
					);?>
				<?
				break;
				case 'contacts':
				$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_DIR."include/menu_contacts.php",
						"EDIT_TEMPLATE" => ""
						)
					);
				break;
				?>
				<?endswitch?>
			</div>


			<?endif;?>
		</li>
		<?/*else:?>
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
		<?endif*/?>

		<?endforeach?>

	</ul></nav>
	<?endif?>