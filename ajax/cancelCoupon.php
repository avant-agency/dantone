<? 
 require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
     	

     	
	if( !CModule::includeModule('sale') || !CModule::includeModule('catalog') ) {
		echo "0";
	}

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
	        
		CCatalogDiscountCoupon::ClearCoupon();

   		    

    } else {
	    echo "not post";
    }
    
?>    