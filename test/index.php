<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<style>
.wardrobe-wrap {
   font-weight: 300;
   text-align: left;
}
</style>
<section id="content">
	<div class="container">

		<div class="clearfix">
			<h1 class="h2 text-left h2-profile mb10">Система гардеробных шкафов</h1>

			<div class="clearfix mb20">
				<ul class="breadcrumbs text-left fleft">
					<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">

						<a href="/catalog/" title="Каталог" itemprop="url">Каталог
						</a>
					</li>
					<li>
						Система гардеробных шкафов
					</li>
					<div style="clear:both"></div>
				</ul>
			</div>

			<div class="wardrobe-wrap ">
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "wards_top_slider", Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
						"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
						"AJAX_MODE" => "N",	// Включить режим AJAX
						"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
						"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
						"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
						"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
						"CACHE_TYPE" => "A",	// Тип кеширования
						"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
						"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
						"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
						"DISPLAY_DATE" => "Y",	// Выводить дату элемента
						"DISPLAY_NAME" => "Y",	// Выводить название элемента
						"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
						"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
						"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
						"FIELD_CODE" => array(	// Поля
							0 => "",
							1 => "",
						),
						"FILTER_NAME" => "",	// Фильтр
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
						"IBLOCK_ID" => "14",	// Код информационного блока
						"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
						"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
						"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
						"NEWS_COUNT" => "20",	// Количество новостей на странице
						"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
						"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
						"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
						"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
						"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
						"PAGER_TITLE" => "Новости",	// Название категорий
						"PARENT_SECTION" => "",	// ID раздела
						"PARENT_SECTION_CODE" => "",	// Код раздела
						"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
						"PROPERTY_CODE" => array(	// Свойства
							0 => "",
							1 => "",
						),
						"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
						"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
						"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
						"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
						"SET_STATUS_404" => "N",	// Устанавливать статус 404
						"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
						"SHOW_404" => "N",	// Показ специальной страницы
						"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
						"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
						"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
						"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					),
					false
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/ward_text1.php"
					)
				);?>
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "ward_slider_2", Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
						"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
						"AJAX_MODE" => "N",	// Включить режим AJAX
						"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
						"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
						"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
						"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
						"CACHE_TYPE" => "A",	// Тип кеширования
						"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
						"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
						"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
						"DISPLAY_DATE" => "Y",	// Выводить дату элемента
						"DISPLAY_NAME" => "Y",	// Выводить название элемента
						"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
						"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
						"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
						"FIELD_CODE" => array(	// Поля
							0 => "",
							1 => "",
						),
						"FILTER_NAME" => "",	// Фильтр
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
						"IBLOCK_ID" => "15",	// Код информационного блока
						"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
						"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
						"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
						"NEWS_COUNT" => "20",	// Количество новостей на странице
						"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
						"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
						"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
						"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
						"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
						"PAGER_TITLE" => "Новости",	// Название категорий
						"PARENT_SECTION" => "",	// ID раздела
						"PARENT_SECTION_CODE" => "",	// Код раздела
						"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
						"PROPERTY_CODE" => array(	// Свойства
							0 => "",
							1 => "",
						),
						"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
						"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
						"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
						"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
						"SET_STATUS_404" => "N",	// Устанавливать статус 404
						"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
						"SHOW_404" => "N",	// Показ специальной страницы
						"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
						"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
						"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
						"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					),
					false
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/ward_text2.php"
					)
				);?>

				<img src="/upload/iblock/492/492a7681a36e124ad33465c4a07bfcad.jpg" alt="" class="wardrobe-img" style="margin-top:0px;">

				<div class="wardrobe-calculate">
					<div class="wardrode-calculate-title">
						Чтобы получить расчет стоимости гардероба — напишите нам
					</div>
					<form  class="wardrobe-form" method="POST" id="calculate_my_project">
						<div class="wardrobe-form-left">
							<div class="control">
								<input type="text" class="input-text full-size" required="required"
									   placeholder="Имя*" title="Имя*" name="form_text_3" value="" size="0"/>
							</div>


							<div class="control">
								<input type="text" class="input-text full-size" required="required"
									   placeholder="E-mail*" title="E-mail*" name="form_email_4" value="" size="0"/>
							</div>


							<div class="control">
								<input type="text" class="input-text full-size"
									   placeholder="Телефон*" title="Телефон" name="form_text_5" value="" size="0"/>
							</div>
							<div class="checkboxes-rit control">
								<label class="privacy-checkbox">
									<input name="form_checkbox_AGREE[]" value="14" type="checkbox"
										   style="position: absolute; left: -9999px;">

									<span class="checkbox-title">Я соглашаюсь на использование  <a
											onclick="window.open('/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf','_blank')"
											href="/bitrix/templates/dantone/dantonehome.ru_O_personalnih_dannih.pdf"
											target="_blank">
	персональных данных</a></span>
								</label>
							</div>
						</div>
						<div class="wardrobe-form-right">
							<div class="control">
								<textarea name="form_textarea_6" cols="40" rows="5" class="input-text full-size"
										  placeholder="Пожелания" cols="30" rows="7"></textarea>
							</div>

							<label class="file_upload">
								<span class="button"><span class="lcc-download"></span>Загрузить планировку</span>
								<mark>Файл не выбран</mark>
								<input type="file" id="file">
							</label>
							<div class="download-descr">
								<div class="dowl-descr-img">
									<img src="img/warning.png" alt="">
								</div><div class="dowl-descr-text">
								Форматы - jpg, png, pdf, dwg, skp, rar/zip. <br> Размер до 50 мб
							</div>
							</div>
							<div class="control-btn">
								<input class="btn btn-blue full-size btn-large" id="contact_form_submitter2"
									   type="submit" name="web_form_submit" value="Отправить"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<section class="product-list-container">
    <h2 class="h1">Наши дизайнеры рекомендуют</h2>
    <div class="product-list a-product-list">
        <?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section", 
			"bx-top", 
			array(
				"ACTION_VARIABLE" => "action",
				"ADD_PICT_PROP" => "-",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_TO_BASKET_ACTION" => "ADD",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => "/personal/basket.php",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"CONVERT_CURRENCY" => "N",
				"DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_SORT_FIELD" => "rand",
				"ELEMENT_SORT_FIELD2" => "id",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_ORDER2" => "desc",
				"FILTER_NAME" => $params["FILTER"],
				"HIDE_NOT_AVAILABLE" => "N",
				"IBLOCK_ID" => "4",
				"IBLOCK_TYPE" => "catalog",
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => "-",
				"LINE_ELEMENT_COUNT" => "",
				"MESSAGE_404" => "",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_NOT_AVAILABLE" => "Нет в наличии",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"OFFERS_CART_PROPERTIES" => array(
				),
				"OFFERS_FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"OFFERS_LIMIT" => "5",
				"OFFERS_PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"OFFERS_SORT_FIELD" => "sort",
				"OFFERS_SORT_FIELD2" => "id",
				"OFFERS_SORT_ORDER" => "asc",
				"OFFERS_SORT_ORDER2" => "desc",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Товары",
				"PAGE_ELEMENT_COUNT" => "999999999999",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => array(
					0 => "BASE",
				),
				"PRICE_VAT_INCLUDE" => "Y",
				"PRODUCT_DISPLAY_MODE" => "N",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_PROPERTIES" => array(
				),
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "",
				"PRODUCT_SUBSCRIPTION" => "N",
				"PROPERTY_CODE" => array(
					0 => "BESTSELLER",
					1 => "",
				),
				"SECTION_CODE" => "",
				"SECTION_ID" => "",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"SEF_MODE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "Y",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "Y",
				"SHOW_CLOSE_POPUP" => "N",
				"SHOW_DISCOUNT_PERCENT" => "N",
				"SHOW_OLD_PRICE" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"TEMPLATE_THEME" => "blue",
				"USE_MAIN_ELEMENT_SECTION" => "N",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "N",
				"COMPONENT_TEMPLATE" => "bx-top"
			),
			false
		);?>
		</section>
		<section class="product-list-container">

		</section>
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
	</div>
</section>

<script>
$(function () {
    var wardrobeSliderOne = $('.wardrobe-sliderOne');
    wardrobeSliderOne.owlCarousel({
        items: 1,
        nav: true,
        dots: true,
        loop: true,
        navText: ''
    });

    var wardrobeSliderTwo = $('.wardrobe-sliderTwo');
    wardrobeSliderTwo.owlCarousel({
        items: 1,
        nav: true,
        dots: false,
        loop: true,
        navText: ''
    });

    var wrapper = $( ".file_upload" ),
        inp = wrapper.find( "input" ),
        btn = wrapper.find( ".button" ),
        lbl = wrapper.find( "mark" );

    // Crutches for the :focus style:
    inp.focus(function(){
        wrapper.addClass( "focus" );
    }).blur(function(){
        wrapper.removeClass( "focus" );
    });

    var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

    inp.change(function(){
        var file_name;
        if( file_api && inp[ 0 ].files[ 0 ] )
            file_name = inp[ 0 ].files[ 0 ].name;
        else
            file_name = inp.val().replace( "C:\\fakepath\\", '' );

        if( ! file_name.length )
            return;

        if( lbl.is( ":visible" ) ){
            lbl.text( file_name );
            btn.text( "Выбрать" );
        }else
            btn.text( file_name );
    }).change();

});

$( window ).resize(function(){
    $( ".file_upload input" ).triggerHandler( "change" );
});
</script>

<style type="text/css">
.wardrobe-wrap {
  text-align: left; }

.wardrobe-sliderOne {
  margin-bottom: 45px; }
  .wardrobe-sliderOne .owl-dots {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    position: absolute;
    bottom: 20px;
    width: 100%; }
  .wardrobe-sliderOne .owl-dot {
    width: 13px;
    height: 13px;
    background-color: rgba(255, 255, 255, 0.57);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    margin-right: 18px; }
    .wardrobe-sliderOne .owl-dot:last-of-type {
      margin-right: 0; }
    .wardrobe-sliderOne .owl-dot.active {
      background-color: #fff; }
  .wardrobe-sliderOne .owl-nav {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 97%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%); }
  .wardrobe-sliderOne .owl-prev {
    background-image: url(/test/img/left-arrow.svg);
    width: 35px;
    height: 68px;
    -moz-background-size: contain;
    -o-background-size: contain;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    -webkit-transition: .5s ease-in-out;
    -moz-transition: .5s ease-in-out;
    -o-transition: .5s ease-in-out;
    transition: .5s ease-in-out; }
    .wardrobe-sliderOne .owl-prev:hover {
      opacity: .8;
      -webkit-transform: translateX(5px);
      -moz-transform: translateX(5px);
      -ms-transform: translateX(5px);
      -o-transform: translateX(5px);
      transform: translateX(5px); }
  .wardrobe-sliderOne .owl-next {
    background-image: url(/test/img/right-arrow.svg);
    width: 35px;
    height: 68px;
    -moz-background-size: contain;
    -o-background-size: contain;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    -webkit-transition: .5s ease-in-out;
    -moz-transition: .5s ease-in-out;
    -o-transition: .5s ease-in-out;
    transition: .5s ease-in-out; }
    .wardrobe-sliderOne .owl-next:hover {
      opacity: .8;
      -webkit-transform: translateX(-5px);
      -moz-transform: translateX(-5px);
      -ms-transform: translateX(-5px);
      -o-transform: translateX(-5px);
      transform: translateX(-5px); }

.wardrobe-sliderTwo {
  margin-top: 50px;
  margin-bottom: 75px; }
  .wardrobe-sliderTwo .owl-nav {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 97%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%); }
  .wardrobe-sliderTwo .owl-prev {
    background-image: url(/test/img/leftArrowGray.svg);
    width: 50px;
    height: 68px;
    -moz-background-size: contain;
    -o-background-size: contain;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    -webkit-transition: .5s ease-in-out;
    -moz-transition: .5s ease-in-out;
    -o-transition: .5s ease-in-out;
    transition: .5s ease-in-out; }
    .wardrobe-sliderTwo .owl-prev:hover {
      opacity: .8;
      -webkit-transform: translateX(5px);
      -moz-transform: translateX(5px);
      -ms-transform: translateX(5px);
      -o-transform: translateX(5px);
      transform: translateX(5px); }
  .wardrobe-sliderTwo .owl-next {
    background-image: url(/test/img/rightArrowGray.svg);
    width: 50px;
    height: 68px;
    -moz-background-size: contain;
    -o-background-size: contain;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    -webkit-transition: .5s ease-in-out;
    -moz-transition: .5s ease-in-out;
    -o-transition: .5s ease-in-out;
    transition: .5s ease-in-out; }
    .wardrobe-sliderTwo .owl-next:hover {
      opacity: .8;
      -webkit-transform: translateX(-5px);
      -moz-transform: translateX(-5px);
      -ms-transform: translateX(-5px);
      -o-transform: translateX(-5px);
      transform: translateX(-5px); }

.wardrobe-slideTwo img {
  width: 80%;
  display: block;
  margin-left: auto;
  margin-right: auto; }

.wardrobe-slideTwo-price {
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  margin-top: 25px;
  font-size: 24px; }

.wardrobe-img {
  margin-top: 50px;
  margin-bottom: 70px; }

.wardrobe-calculate {
  padding-bottom: 100px;
  padding-top: 50px;
  background-color: #f5f5f5;
  margin-bottom: 90px;
  position: relative; }
  .wardrobe-calculate:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: -100%;
    height: 100%;
    width: 100%;
    background-color: #f5f5f5;
    -webkit-transform: scaleX(10);
    -moz-transform: scaleX(10);
    -ms-transform: scaleX(10);
    -o-transform: scaleX(10);
    transform: scaleX(10);
    z-index: -1; }

.file_upload {
  display: block;
  position: relative;
  overflow: hidden;
  height: 40px; }
  .file_upload .button {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    cursor: pointer;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    cursor: pointer;
    float: right;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;
    height: 100%;
    -webkit-transition: .3s linear;
    -moz-transition: .3s linear;
    -o-transition: .3s linear;
    transition: .3s linear;
    font-size: 18px;
    font-weight: 300;
    background-color: #fff; }
  .file_upload > mark {
    display: none;
    cursor: pointer; }
  .file_upload input[type=file] {
    position: absolute;
    top: 0;
    opacity: 0; }
  .file_upload .button {
    border: 1px solid #1c2438;
    color: #1c2438;
    overflow: hidden;
    white-space: nowrap; }
  .file_upload:hover .button {
    color: #ffffff;
    background-color: #1c2438; }

.file_upload > mark {
  display: none; }

.file_upload .button {
  width: 100%; }

.lcc-download {
  display: block;
  background-image: url(/test/img/download.png);
  width: 25px;
  height: 31px;
  -moz-background-size: contain;
  -o-background-size: contain;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  margin-right: 15px; }

.download-descr {
  font-size: 13px;
  color: #999999;
  margin-top: 10px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center; }

.lci-right .control-btn {
  margin-bottom: 10px; }

.wardrobe-form {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  z-index: 10;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -moz-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  width: 615px;
  max-width: 100%;
  margin-left: auto;
  margin-right: auto; }
  .wardrobe-form textarea.input-text {
    height: 90px; }

.wardrobe-form-left {
  width: 48%; }

.wardrobe-form-right {
  width: 48%; }

.wardrode-calculate-title {
  font-size: 48px;
  font-weight: 400;
  line-height: 56px;
  text-align: center;
  margin-bottom: 70px; }

.dowl-descr-img {
  margin-right: 15px;
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%); }

.checkboxes-rit label .jq-checkbox {
  -webkit-transform: translateY(-2px);
  -moz-transform: translateY(-2px);
  -ms-transform: translateY(-2px);
  -o-transform: translateY(-2px);
  transform: translateY(-2px); }

@media all and (max-width: 1100px) {
  .wardrode-calculate-title {
    font-size: 30px;
    line-height: 38px;
    width: 70%;
    margin-left: auto;
    margin-right: auto; } }

@media all and (max-width: 767px) {
  .wardrode-calculate-title {
    font-size: 20px;
    width: 100%;
    line-height: 28px;
    margin-bottom: 40px; }
  .wardrobe-form {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -moz-box-orient: vertical;
    -moz-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column; }
  .wardrobe-form-left {
    width: 100%; }
  .wardrobe-form-right {
    width: 100%; }
  .dowl-descr-text br {
    display: none; }
  .wardrobe-form .checkboxes-rit.control {
    position: absolute;
    bottom: -50px; }
  .wardrobe-sliderOne .owl-dot {
    width: 7px;
    height: 7px;
    margin-right: 5px; }
  .wardrobe-sliderOne .owl-next, .wardrobe-sliderOne .owl-prev, .wardrobe-sliderTwo .owl-next, .wardrobe-sliderTwo .owl-prev {
    width: 20px;
    height: 50px; }
  .wardrobe-sliderTwo {
    margin-bottom: 40px; }
  .wardrobe-img {
    margin-top: 20px;
    margin-bottom: 40px; } }
</style>
<script>
$(function(){
	$("#contact_form_submitter2").on("click", function(){
		var name = $(this).parents("form").find("input[name='form_text_3']").val();
		var email = $(this).parents("form").find("input[name='form_email_4']").val();
		var phone = $(this).parents("form").find("input[name='form_text_5']").val();
		var wishes = $(this).parents("form").find("textarea").val();
	
		var pr = true;
	
		if(name.length == 0)
		{
			$(this).parents("form").find("input[name='form_text_3']").css("border", "1px solid red");
			pr = false;
		}
		else
			$(this).parents("form").find("input[name='form_text_3']").css("border-color", "#999999");
	
		if(email.length == 0)
		{
			$(this).parents("form").find("input[name='form_email_4']").css("border", "1px solid red");
			pr = false;
		}
		else
			$(this).parents("form").find("input[name='form_email_4']").css("border-color", "#999999");
	
		if(phone.length == 0)
		{
			$(this).parents("form").find("input[name='form_text_5']").css("border", "1px solid red");
			pr = false;
		}
		else
			$(this).parents("form").find("input[name='form_text_5']").css("border-color", "#999999");
	
		if($("#calculate_my_project input[type='checkbox']").prop('checked') == false)
		{
			$("#calculate_my_project .checkbox-title").css('color', 'red');
			pr = false;
		}
		else
		{
			$("#calculate_my_project .checkbox-title").css('color', '#929292');
		}
	
		if(pr == false) return false;
	
		var formData = new FormData();
		formData.append('file', $('#file')[0].files[0]);
		formData.append('name', name);
		formData.append('email', email);
		formData.append('phone', phone);
		formData.append('wishes', wishes);

		$.ajax({
			url : '/ajax/calculate_my_ward.php',
			type : 'POST',
			data : formData,
			processData: false,
			contentType: false,
			success: function(data){
				// show success label
				if(data == 1)
				{
					$("#calculate_my_project").html("Спасибо за вашу заявку. Менеджер с вами свяжется в ближайшее время");
				}
				else
				{
					$("#calculate_my_project").html("Произошла ошибка при отправке данных. Пожалуйста, перезагрузите страницу и повторите.");
				}
			}
		});

		return false;
	});
});
</script>
<?
$APPLICATION->SetTitle("DantoneHome");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>