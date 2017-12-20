<? 
 require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
     	

     	
	if( !CModule::includeModule('sale') || !CModule::includeModule('catalog') ) {
		echo "0";
	}

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
	    
	    if( isset($_REQUEST['coupon'])  ) {
		     

		     $coupon = trim($_REQUEST['coupon']);

		     
	         if(!CCatalogDiscountCoupon::IsExistCoupon($coupon)) {
		        echo "4";
		     } else {
			     
			     if(CCatalogDiscountCoupon::SetCoupon($coupon)) {
                    echo "2";
                 }   
		     }
		     
		   		    
	    } else {
		    echo "3";
	    }   
    } else {
	    echo "not post";
    }
    
?>    