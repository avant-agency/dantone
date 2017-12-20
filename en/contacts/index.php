<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contacts | Dantone");
?><section id="content">
<div class="container">
	<article class="about full-size" style="margin-bottom: 0;">
		<h1 class="h2">Contacts</h1>
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
							<h5>Moscow</h5>
							<div class="big" style="font-size: 14px;">
								<span class="kupislova">8 (495) 727-02-17</span>
							</div>
							<div class="big" style="font-size: 14px;">
								Mon-Sat from 11:00 to 20:00<br>
								Sun from 11:00 to 18:00
							</div>
						</div>
						<div class="contact-item">
							<h5>Dantone Home showroom</h5>
							Moscow, Trehgorny Val st., 5.<br>
							<a href="mailto:info@dantonehome.ru">info@dantonehome.ru</a><br>
							<a target="_blank" href="https://www.google.com/maps/place/Dantone+Home/@55.758587,37.5596686,3a,75y,289.22h,83.83t/data=!3m6!1e1!3m4!1sqbao1hZnw4cAAAQ8sT4S_g!2e0!7i8000!8i4000!4m5!3m4!1s0x0:0x617c785c874d1a8f!8m2!3d55.7586405!4d37.5594895!6m1!1e1">Виртуальный тур</a>
						</div>
					</div>

					<div class="contacts-map" id="map">
						<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=5bQ2sKRP7BRIY4L57MbZEu_HAx4KR0Qw&width=600&height=330"></script>
					</div>
					<h4 style="margin-top: 30px;">Buy in your city</h4>
					<div class="clearfix">
						<div class="contact-item">
							<h5>Tula</h5>
						</div>
						<div class="contact-item">
							<h5>KS Home Interior</h5>
							Tula,  Lenina blvd. 85, Lykeorka Loft trade and business center, 2nd floor.
							<div class="big" style="font-size: 14px;">
								+7 (961) 148-81-73
							</div>
							<div class="big" style="font-size: 14px;">
								Mon-Sat from 11:00 to 19:00
							</div>
							<a href="mailto:tula@dantonehome.ru">tula@dantonehome.ru</a>
						</div>
					</div>
					<div class="clearfix">
						<div class="contact-item">
							<h5>Khabarovsk</h5>
						</div>
						<div class="contact-item">
							<h5>Grad Interior showroom </h5>
							Khabarovsk, Ussuriisky blvd., 16
							<div class="big" style="font-size: 14px;">
								8 (4212) 22-31-82
							</div>
							<div class="big" style="font-size: 14px;">
								Mon-Sat from 10:00 to 19:00
							</div>
							<a href="mailto:khabarovsk@dantonehome.ru">khabarovsk@dantonehome.ru</a>
						</div>
					</div>
					<div class="clearfix">
						<div class="contact-item">
							<h5>Penza</h5>
						</div>
						<div class="contact-item">
							<h5>DiAr group interior showroom </h5>
							Penza, Mira st., 65.
							<div class="big" style="font-size: 14px;">
								8 (8412) 45-37-19, <br>
								8 (8412) 45-37-18
							</div>
							<div class="big" style="font-size: 14px;">
								Mon-Sat from 10:00 to 19:00
							</div>
							<a href="mailto:penza@dantonehome.ru">penza@dantonehome.ru</a>
						</div>
					</div>
					<div class="clearfix">
						<div class="contact-item">
							<h5>Nizhny Novgorod</h5>
						</div>
						<div class="contact-item">
							<h5>Calypso furniture showroom</h5>
							Nizhny Novgorod, Rodionova st., 23a.
							<div class="big" style="font-size: 14px;">
								+ 7 831 278-91-17, <br>
								+7 831 432-87-07
							</div>
							<div class="big" style="font-size: 14px;">
								Mon-Fri from 10:00 to 19:00<br>
								Sat from 10:00 to 17:00
							</div>
							<a href="mailto:nnovgorod@dantonehome.ru">nnovgorod@dantonehome.ru</a>
						</div>
					</div>
					<div class="clearfix">
						<div class="contact-item">
							<h5>Tyumen</h5>
						</div>
						<div class="contact-item">
							<h5>Mobili Interior Studio</h5>
							Tyumen, Maxim Gorky st., 68, bld. 3
							<div class="big" style="font-size: 14px;">
								+7 (3452) 97 07 93
							</div>
							<div class="big" style="font-size: 14px;">
								Mon-Sat 11.00-19.00<br>
								Sun 11.00-16.00
							</div>
							<a href="mailto:tyumen@dantonehome.ru">tyumen@dantonehome.ru</a>
						</div>
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
							"WEB_FORM_ID" => "4"
							)
							);?> <!--Форма-->
						</div>
					</div>
				</article>
			</div>
		</section> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>