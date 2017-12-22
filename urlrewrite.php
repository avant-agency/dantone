<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/acrit.exportpro/(.*)#",
		"RULE" => "path=\$1",
		"ID" => "",
		"PATH" => "/acrit.exportpro/index.php",
	),
	array(
		"CONDITION" => "#^={SITE_DIR.\"press/\"}#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/en/press/index.php",
	),
	array(
		"CONDITION" => "#^/en/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/en/personal/order/index.php",
	),
	array(
		"CONDITION" => "#^/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/test/orderlist.php",
	),
	array(
		"CONDITION" => "#^/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/personal/order/index.php",
	),
	array(
		"CONDITION" => "#^/en/projects/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/en/projects/index.php",
	),
	array(
		"CONDITION" => "#^/en/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/en/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/en/\\??(.*)#",
		"RULE" => "&\$1",
		"ID" => "bitrix:catalog.top",
		"PATH" => "/en/catalog/sale/index.php",
	),
	array(
		"CONDITION" => "#^/projects/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/projects/index.php",
	),
	array(
		"CONDITION" => "#^/en/store/#",
		"RULE" => "",
		"ID" => "bitrix:catalog.store",
		"PATH" => "/en/store/index.php",
	),
	array(
		"CONDITION" => "#^/en/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/en/news/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^\\??(.*)#",
		"RULE" => "&\$1",
		"ID" => "bitrix:catalog.top",
		"PATH" => "/catalog/sale/index.php",
	),
	array(
		"CONDITION" => "#^/store/#",
		"RULE" => "",
		"ID" => "bitrix:catalog.store",
		"PATH" => "/store/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
array(
        "CONDITION" => "#^/catalog/([A-Za-z0-9_-]+)/filter/[A-Za-z0-9_-]+/\\??.*\$#",
        "RULE" =>  "SECTION_CODE=\$1",
        "ID" => "",
        "PATH" => "/catalog/section.php",
    ),
);

?>