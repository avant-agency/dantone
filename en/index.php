<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Dantone Home");
?>

<section id="content">

    <?$APPLICATION->IncludeComponent(
       "bitrix:news.list", 
       "slider", 
       array(
          "DISPLAY_DATE" => "Y",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "AJAX_MODE" => "Y",
          "IBLOCK_ID" => "7",
          "NEWS_COUNT" => "20",
          "SORT_BY1" => "ACTIVE_FROM",
          "SORT_ORDER1" => "DESC",
          "SORT_BY2" => "SORT",
          "SORT_ORDER2" => "ASC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => array(
             0 => "ID",
             1 => "CODE",
             2 => "NAME",
             3 => "DETAIL_PICTURE",
             4 => "",
             ),
          "PROPERTY_CODE" => array(
             0 => "",
             1 => "DESCRIPTION, DETAIL_PICTURE",
             2 => "",
             ),
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "d.m.Y",
          "COMPONENT_TEMPLATE" => "slider",
          "IBLOCK_TYPE" => "news",
          "TEMPLATE_THEME" => "blue",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_ADDITIONAL" => "undefined",
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "36000000",
          "CACHE_FILTER" => "N",
          "CACHE_GROUPS" => "Y",
          "SET_TITLE" => "N",
          "SET_BROWSER_TITLE" => "N",
          "SET_META_KEYWORDS" => "N",
          "SET_META_DESCRIPTION" => "N",
          "SET_LAST_MODIFIED" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "HIDE_LINK_WHEN_NO_DETAIL" => "N",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "INCLUDE_SUBSECTIONS" => "Y",
          "MEDIA_PROPERTY" => "",
          "SLIDER_PROPERTY" => "",
          "SEARCH_PAGE" => "/en/search/",
          "USE_RATING" => "N",
          "USE_SHARE" => "N",
          "PAGER_TEMPLATE" => ".default",
          "DISPLAY_TOP_PAGER" => "N",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "PAGER_TITLE" => "Новости",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "PAGER_SHOW_ALL" => "N",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SET_STATUS_404" => "N",
          "SHOW_404" => "N",
            "LANGUAGE_ID" => LANGUAGE_ID,   // Учитывать права доступа


            "MESSAGE_404" => ""
            ),
       false
       );?>


       <div class="container" style="margin-top: 20px">
        <div class="categories a-categories">

            <ul class="slides">
             <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "slides_catalog", Array(
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
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_NOTES" => "",
                    "CACHE_GROUPS" => "Y",  // Учитывать права доступа
					"LANGUAGE_ID" => LANGUAGE_ID,	// Учитывать права доступа
					),
                    false
             );?>
             </ul></div> <!-- /end .categories -->

             <article class="about">
                <h1 class="h2">Dantone Home. You have great taste.</h1>
                <div class="divider-horisontal"></div>




                <p>Dantone Home offers a wide range of furniture and accessories in American and Belgian styles. Their harmonious synergy will make any home a welcoming, cozy, and quiet place. We produce furniture in Russia using only high-quality textile and environmentally friendly materials. Our stylish accessories, pillows, and blankets will complement your interior and add a note of luxury to it.</p>

                <p>You can see the full collection of furniture and accessories, as well as choose the fabric, in our showroom at 5 Trehgorny Val st.</p>
            </article>



            <section class="product-list-container">
                <h2>Best sellers</h2>
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
                            "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
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
                            "FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
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
                            "SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",	// URL, ведущий на страницу с содержимым раздела
                            "SECTION_USER_FIELDS" => array(	// Свойства раздела
                                0 => "",
                                1 => "",
                                ),
                                "LANGUAGE_ID" => LANGUAGE_ID,   // Учитывать права доступа

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

                <!--<ul class="slides">
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/armchairs_and_chairs/armchairs/kreslo-paradizo-nizkoe-bej/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/570/4cc85246a0/par1_r180x180.jpg" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Кресло Парадизо</div>
                                    <div class="price">
                                        От 45&nbsp;300 руб.
                                    </div>
                                </a>
                            </li>
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/sofas/divan-lankaster/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/560/15ca8209b8/ART-2592z_r180x180.jpg" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Диван Ланкастер Дантон</div>
                                    <div class="price">
                                        От 94&nbsp;300 руб.
                                    </div>
                                </a>
                            </li>
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/bedroom/beds/krovat-grantem/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/560/2a404dc192/ART-4250z_r180x180.jpg" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Кровать Грантем</div>
                                    <div class="price">
                                        От 117&nbsp;900 руб.
                                    </div>
                                </a>
                            </li>
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/bedside_tables_and_chests_of_drawers/bedside_tables/prikrovatnaya-tumba-nojki/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/560/412b16508b/ART-6628z_r180x180.jpg" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Прикроватная тумба (ножки)</div>
                                    <div class="price">
                                        30&nbsp;900 руб.
                                    </div>
                                </a>
                            </li>
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/bedroom/beds/krovat-dyusbery/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/560/2a5f6430f2/ART-4228z_r180x180.jpg" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Кровать Дьюсбери</div>
                                    <div class="price">
                                        От 92&nbsp;900 руб.
                                    </div>
                                </a>
                            </li>
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/armchairs_and_chairs/chairs/stul-preston/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/570/68bfe981f4/stul-preston_r180x180.png" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Стул Престон Дантон</div>
                                    <div class="price">
                                        18&nbsp;700 руб.
                                    </div>
                                </a>
                            </li>
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/sofas/divan-nottingem/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/560/15dc9bc2a2/ART-2638-1z_r180x180.jpg" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Диван Ноттингем</div>
                                    <div class="price">
                                        От 97&nbsp;100 руб.
                                    </div>
                                </a>
                            </li>
                                                    <li style="width: 204px; float: left; display: block;">
                                <a href="/catalog/cabinets_and_cupboards/cabinets/vitrina-SM294/">
                                    <div class="photo">
                                                                                    <img src="/_/manager/files/565/2ceb12d9cc/ART-7398_r180x180.JPG" alt="" draggable="false">
                                                                            </div>
                                    <div class="title">Витрина SM294</div>
                                    <div class="price">
                                        122&nbsp;700 руб.
                                    </div>
                                </a>
                            </li>
                        </ul>--></div>
                    </section>
                </div>

                <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_news", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "en_info",
		"IBLOCK_ID" => "9",
		"NEWS_COUNT" => "2",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
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
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
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
		"SEARCH_PAGE" => "/en/search/",
		"USE_RATING" => "N",
		"USE_SHARE" => "N",
		"LANGUAGE_ID" => LANGUAGE_ID,
		"FILE_404" => ""
	),
	false
);?></section>



                   <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>