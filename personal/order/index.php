<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?>
<section id="content">
	<div class="container">
		
	<h1 class="h2 h2-profile text-left">Личный кабинет</h1>
	
	<div class="clearfix">	
		
	<aside role="complementary">
                <ul class="catalog-nav">
                    <li><a href="/personal/profile/">Личные данные</a></li>
                    <li><a href="/personal/delivery/">Адрес доставки</a></li>
                    <li class="active"><a href="/personal/order/?show_all=Y">История заказов</a></li>
                </ul>
            </aside>	
		
    
    <div role='main' id='main' class='order-history'>
    

<?$APPLICATION->IncludeComponent("bitrix:sale.personal.order", "", array(
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/personal/order/",
	"ORDERS_PER_PAGE" => "10",
	"PATH_TO_PAYMENT" => "/personal/order/payment/",
	"PATH_TO_BASKET" => "/personal/cart/",
	"SET_TITLE" => "Y",
	"SAVE_IN_SESSION" => "N",
	"NAV_TEMPLATE" => "arrows",
	"SEF_URL_TEMPLATES" => array(
		"list" => "index.php",
		"detail" => "detail/#ID#/",
		"cancel" => "cancel/#ID#/",
	),
	"SHOW_ACCOUNT_NUMBER" => "Y"
	),
	false
);?>

    </div>
     
	</div>
     
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>