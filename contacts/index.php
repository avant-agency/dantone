<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты | Dantone");
?><section id="content">
<div class="container">
 <article class="about full-size" style="margin-bottom: 0;">
	<h1 class="h2">Контакты</h1>
	<div class="divider-horisontal">
	</div>
	<div class="contact-container clearfix" style="margin-bottom: 0;">
		<div class="contacts">
			 <!--	                
	                
						<h4 style="margin-top: 30px;">График работы в праздничные дни:</h4>
						<p>
<span style="color:#FF0000;"><strong>1, 9 МАЯ</strong></span> – выходной<br>
<strong>2, 3, 7, 8 МАЯ</strong> – с 11:00 до 18:00<br>
<strong>4, 5, 6 МАЯ</strong> – с 11:00 до 20:00<br>
						</p>
	                
	-->
			<div class="clearfix">
				<div class="contact-item">
					<h5>г.Москва</h5>
					<div class="big" style="font-size: 14px;">
 <span class="kupislova">8 (495) 727-02-17</span>
					</div>
					<div class="big" style="font-size: 14px;">
						 Пн-Сб с 11:00 до 20:00<br>
						 Вс с 11:00 до 18:00
					</div>
				</div>
				<div class="contact-item">
					<h5>Шоурум Dantone Home</h5>
					 г. Москва, Трехгорный вал, дом 5.<br>
 <a href="mailto:info@dantonehome.ru">info@dantonehome.ru</a><br>
 <strong><a target="_blank" href="https://www.google.com/maps/place/Dantone+Home/@55.758587,37.5596686,3a,75y,289.22h,83.83t/data=!3m6!1e1!3m4!1sqbao1hZnw4cAAAQ8sT4S_g!2e0!7i8000!8i4000!4m5!3m4!1s0x0:0x617c785c874d1a8f!8m2!3d55.7586405!4d37.5594895!6m1!1e1">Виртуальный тур</a></strong>
				</div>
			</div>
			<div class="contacts-map" id="map">
			<?$APPLICATION->IncludeComponent(
				"bitrix:map.yandex.view",
				"",
				Array(
					"CONTROLS" => array("ZOOM"),
					"INIT_MAP_TYPE" => "MAP",
					"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.75753144965357;s:10:\"yandex_lon\";d:37.55949706300572;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.559543746033;s:3:\"LAT\";d:55.758468921687;s:4:\"TEXT\";s:69:\"улица Трехгорный Вал, 5, Москва, Россия\";}}}",
					"MAP_HEIGHT" => "330",
					"MAP_ID" => "",
					"MAP_WIDTH" => "600",
					"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
				)
			);?>
			</div>
			<div class="clearfix">
			</div>
		</div>
		<div class="feedback">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"dantone_cf",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "result_edit.php",
		"IGNORE_CUSTOM_TEMPLATE" => "Y",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"VARIABLE_ALIASES" => Array(),
		"WEB_FORM_ID" => "2"
	)
);?> <!--Форма-->
		</div>
	</div>
 </article>
</div>
 </section> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>