<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "N");
$APPLICATION->SetTitle("Catalogue | Dantone");
?>

<section id="content">
<div class="container">
        
  


<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"dantone_catalog", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"TEMPLATE_THEME" => "site",
		"HIDE_NOT_AVAILABLE" => "N",
		"BASKET_URL" => "/en/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_CODE",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/en/catalog/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTION_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"SET_STATUS_404" => "Y",
		"DETAIL_DISPLAY_NAME" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "BASE",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"USE_REVIEW" => "N",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "1",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "N",
		"QUANTITY_FLOAT" => "N",
		"OFFERS_CART_PROPERTIES" => array(
		),
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "1",
		"SECTIONS_VIEW_MODE" => "TILE",
		"SECTIONS_SHOW_PARENT_NAME" => "N",
		"PAGE_ELEMENT_COUNT" => "200",
		"LINE_ELEMENT_COUNT" => "3",
		"ELEMENT_SORT_FIELD" => "PROPERTY_NEWPRODUCT",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "sort",
		"ELEMENT_SORT_ORDER2" => "ASC",
		"LIST_PROPERTY_CODE" => array(
			0 => "NEWPRODUCT",
			1 => "SALELEADER",
			2 => "SPECIALOFFER",
			3 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "MORE_PHOTO",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
			3 => "COLOR_REF",
			4 => "ARTNUMBER",
			5 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "NEWPRODUCT",
			1 => "MANUFACTURER",
			2 => "MATERIAL",
			3 => "",
		),
		"DETAIL_META_KEYWORDS" => "KEYWORDS",
		"DETAIL_META_DESCRIPTION" => "META_DESCRIPTION",
		"DETAIL_BROWSER_TITLE" => "NAME",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "MORE_PHOTO",
			1 => "ARTNUMBER",
			2 => "SIZES_SHOES",
			3 => "SIZES_CLOTHES",
			4 => "COLOR_REF",
			5 => "",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "N",
		"ALSO_BUY_ELEMENT_COUNT" => "4",
		"ALSO_BUY_MIN_BUYES" => "1",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "asc",
		"PAGER_TEMPLATE" => "round",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => "NEWPRODUCT",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
		),
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"MESS_BTN_BUY" => "Buy",
		"MESS_BTN_ADD_TO_BASKET" => "Add to cart",
		"MESS_BTN_COMPARE" => "Compare",
		"MESS_BTN_DETAIL" => "More",
		"MESS_NOT_AVAILABLE" => "Not available",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_STORE" => "N",
		"FIELDS" => array(
			0 => "SCHEDULE",
			1 => "STORE",
			2 => "",
		),
		"USE_MIN_AMOUNT" => "N",
		"STORE_PATH" => "/en/store/#store_id#",
		"MAIN_TITLE" => "Available on store",
		"MIN_AMOUNT" => "10",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BRAND_PROP_CODE" => array(
			0 => "",
			1 => "BRAND_REF",
			2 => "",
		),
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "/en/catalog/sidebar.php",
		"COMPONENT_TEMPLATE" => "dantone_catalog",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_FB_APP_ID" => "",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"SET_LAST_MODIFIED" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_SALE_BESTSELLERS" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "Y",
		"COMMON_ADD_TO_BASKET_ACTION" => "BUY",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"DETAIL_SHOW_BASIS_PRICE" => "Y",
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"SHOW_DEACTIVATED" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Choose gift",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Gift",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Gift",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Choose",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"STORES" => "",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"USE_BIG_DATA" => "N",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "Y",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare/",
			"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
		)
	),
	false
);?>
<?
$params=array('NAME'=>'Best sellers', 'FILTER'=>'arrFilter');
if(defined('RECOMMEND_FILTER'))$params=array('NAME'=>'Our designers recommend', 'FILTER'=>'recommendFilter');
?>
<section class="product-list-container">
    <h2 class="h1"><?=$params['NAME']?></h2>
    <div class="product-list a-product-list">
        <?$APPLICATION->IncludeComponent("bitrix:catalog.section", "bx-top", Array(
                "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
                "ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
                "ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
                "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                "ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
                "AJAX_MODE" => "N",	// Включить режим AJAX
                "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                "BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
                "BASKET_URL" => "/en/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
                "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
                "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                "CACHE_GROUPS" => "N",	// Учитывать права доступа
                "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                "CACHE_TYPE" => "A",	// Тип кеширования
                "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
                "DETAIL_URL" => "/en/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",	// URL, ведущий на страницу с содержимым элемента раздела
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
                "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
                "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
                "ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
                "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
                "ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
                "HIDE_NOT_AVAILABLE" => "N",	// Товары, которых нет на складах
                "IBLOCK_ID" => "4",	// Инфоблок
                "IBLOCK_TYPE" => "catalog",	// Тип инфоблока
                "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                "LABEL_PROP" => "-",	// Свойство меток товара
                "LINE_ELEMENT_COUNT" => "",	// Количество элементов выводимых в одной строке таблицы
                "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                "MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
                "MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
                "MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
                "MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
                "MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
                "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
                "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
                "OFFERS_CART_PROPERTIES" => "",	// Свойства предложений, добавляемые в корзину
                "OFFERS_FIELD_CODE" => array(	// Поля предложений
                    0 => "",
                    1 => "",
                ),
                "OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
                "OFFERS_PROPERTY_CODE" => array(	// Свойства предложений
                    0 => "",
                    1 => "",
                ),
                "OFFERS_SORT_FIELD" => "sort",	// По какому полю сортируем предложения товара
                "OFFERS_SORT_FIELD2" => "id",	// Поле для второй сортировки предложений товара
                "OFFERS_SORT_ORDER" => "asc",	// Порядок сортировки предложений товара
                "OFFERS_SORT_ORDER2" => "desc",	// Порядок второй сортировки предложений товара
                "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
                "PAGER_TITLE" => "Товары",	// Название категорий
                "PAGE_ELEMENT_COUNT" => "999999999999",	// Количество элементов на странице
                "PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
                "FILTER_NAME" => "recommendFilter",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
                "PRICE_CODE" => array(	// Тип цены
                    0 => "BASE",
                ),
                "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
                "PRODUCT_DISPLAY_MODE" => "N",	// Схема отображения
                "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
                "PRODUCT_PROPERTIES" => "",	// Характеристики товара
                "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
                "PRODUCT_QUANTITY_VARIABLE" => "",	// Название переменной, в которой передается количество товара
                "PRODUCT_SUBSCRIPTION" => "N",	// Разрешить оповещения для отсутствующих товаров
                "PROPERTY_CODE" => array(	// Свойства
                    0 => "BESTSELLER",
                    1 => "",
                ),
                "SECTION_CODE" => "",	// Код раздела
                "SECTION_ID" => "",	// ID раздела
                "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
                "SECTION_URL" => "/en/catalog/#SECTION_CODE_PATH#/",	// URL, ведущий на страницу с содержимым раздела
                "SECTION_USER_FIELDS" => array(	// Свойства раздела
                    0 => "",
                    1 => "",
                ),
                	"LANGUAGE_ID" => LANGUAGE_ID,	// Учитывать права доступа
								
                "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
                "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
                "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
                "SET_STATUS_404" => "N",	// Устанавливать статус 404
                "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                "SHOW_404" => "N",	// Показ специальной страницы
                "SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
                "SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
                "SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
                "SHOW_OLD_PRICE" => "N",	// Показывать старую цену
                "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
                "TEMPLATE_THEME" => "blue",	// Цветовая тема
                "USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
                "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
                "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
                "COMPONENT_TEMPLATE" => ".default"
            ),
            false
        );?>
</section>






</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>