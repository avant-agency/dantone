<?
$_SERVER["DOCUMENT_ROOT"] = __DIR__;
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
		"SEARCH_PAGE" => "/search/",
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
		"MESSAGE_404" => ""
	),
	false
);?>
    
    
    <div class="container" style="margin-top: 20px">
        <div class="categories a-categories">
            
        <ul class="slides">
                                   <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"slides_catalog", 
	array(
		"VIEW_MODE" => "TEXT",
		"SHOW_PARENT_NAME" => "Y",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "slides_catalog",
		"SECTION_ID" => $_REQUEST["SECTION_ID"]
	),
	false
);?>                            </ul></div> <!-- /end .categories -->

        <article class="about">
            <h1 class="h2">Dantone Home. У тебя есть вкус.</h1>
            <div class="divider-horisontal"></div>
            
            
            
            
            <p>
                Компания Dantone Home предлагает Вам мебель и аксессуары в американском и бельгийском стилях. Их гармоничная смесь сделает
                любой дом гостеприимным, уютным и спокойным. Мы производим мебель в России, используя только высококачественный текстиль и
                экологически чистое сырье. Наши стильные аксессуары, подушки и пледы дополнят Ваш интерьер и добавят ему роскоши.
            </p>
            <p>
                Посмотреть полную коллекцию мебели и аксессуаров, а также подобрать себе подходящую ткань, Вы
                можете в нашем шоу-руме по адресу: Трехгорный вал, дом 5.
            </p>
        </article>
        
        

                    <section class="product-list-container">
                <h2>Хиты продаж</h2>
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
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "3",
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
		"SEARCH_PAGE" => "/search/",
		"USE_RATING" => "N",
		"USE_SHARE" => "N",
		"FILE_404" => ""
	),
	false
);?></section>

<style>
#header{
	background: url(/bitrix/templates/dantone/images/bg-header.png) 0 40px repeat-x;
	position: absolute !important;
}
#ddmenu li.haspopup:hover > a{
	color: white;
}
<?
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{?>

#header{
	background-color: #17243d !important;
	position: fixed !important;
}
#ddmenu li.haspopup:hover > a{
	color: black !important;
}
<?}
else
{?>
#logo {
	background: url(/bitrix/templates/dantone/images/sprites.png?2) -330px -205px no-repeat;
}
<?}?>

.header-main-contant .icon-phone{
	background-image: url(/bitrix/templates/dantone/img/phone.png) !important;
}

.header-main-contant .phone{
	color: white;
}

.header-main-contant p{
	color: white;
}

.header-main-contant .phone a{
	color: white;
}

.show-search{
	background: url(/bitrix/templates/dantone/img/search.png) !important;
}

.nav-container{
    border-top: rgba(255, 255, 255, 0.1) 1px solid;
}

.main-menu>ul>li>a{
	color: white;
}

li.red-item>a{
    font-weight: bold !important;
}

</style>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
