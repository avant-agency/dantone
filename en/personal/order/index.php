<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("My profile");
?>
<section id="content">
	<div class="container">
		
		<h1 class="h2 h2-profile text-left">My profile</h1>

		<div class="clearfix">	

			<aside role="complementary">
				<ul class="catalog-nav">
				<li><a href="/en/personal/profile/">Personal information</a></li>
					<li><a href="/en/personal/delivery/">Delivery address</a></li>
					<li class="active"><a href="/en/personal/order/?show_all=Y">My orders</a></li>
				</ul>
			</aside>	


			<div role='main' id='main' class='order-history'>


				<?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order", 
	".default", 
	array(
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/en/personal/order/",
		"ORDERS_PER_PAGE" => "10",
		"PATH_TO_PAYMENT" => "/en/personal/order/payment/",
		"PATH_TO_BASKET" => "/en/personal/cart/",
		"SET_TITLE" => "Y",
		"SAVE_IN_SESSION" => "N",
		"NAV_TEMPLATE" => "arrows",
		"SHOW_ACCOUNT_NUMBER" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"PROP_1" => array(
		),
		"ACTIVE_DATE_FORMAT" => "m/d/Y",
		"LANGUAGE_ID" => LANGUAGE_ID,
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"CUSTOM_SELECT_PROPS" => array(
		),
		"HISTORIC_STATUSES" => array(
			0 => "F",
		),
		"SEF_URL_TEMPLATES" => array(
			"list" => "index.php",
			"detail" => "detail/#ID#/",
			"cancel" => "cancel/#ID#/",
		)
	),
	false
);?>

			</div>

		</div>

	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>