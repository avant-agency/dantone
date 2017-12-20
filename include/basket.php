<?  
    define('SITE_ID', 's1');
    define('SITE_DIR', '/');
    define('LANGUAGE_ID', 'ru');
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
     	
	CModule::includeModule('sale');
    CModule::IncludeModule("catalog");	
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
	    if(isset($_POST['pID']) && isset($_POST['action'])) {
		     
		     $pID = trim($_POST['pID']);
		     $action = $_POST['action'];
		     
		     
		     if($action == 'add') {
		     	Add2BasketByProductID($pID, 1);
		     }	
		   		    
	    }    
    } 
    
    $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line","header_basket",Array(
		        "HIDE_ON_BASKET_PAGES" => "Y",
		        "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		        "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		        "PATH_TO_PERSONAL" => SITE_DIR."personal/",
		        "PATH_TO_PROFILE" => SITE_DIR."personal/",
		        "PATH_TO_REGISTER" => SITE_DIR."login/",
		        "SHOW_AUTHOR" => "Y",
		        "SHOW_DELAY" => "N",
		        "SHOW_EMPTY_VALUES" => "Y",
		        "SHOW_IMAGE" => "Y",
		        "SHOW_NOTAVAIL" => "N",
		        "SHOW_NUM_PRODUCTS" => "Y",
		        "SHOW_PERSONAL_LINK" => "N",
		        "SHOW_PRICE" => "Y",
		        "SHOW_PRODUCTS" => "Y",
		        "SHOW_SUBSCRIBE" => "Y",
		        "SHOW_SUMMARY" => "Y",
		        "SHOW_TOTAL_PRICE" => "Y"
		    )
		);?>




	





	
	