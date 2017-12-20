<? 
 require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
     	
    global $USER; 	
     	
	if(!CModule::includeModule('sale')) {
		echo "0";
	}

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
	    
	    if( isset($_POST['pID']) && isset($_POST['qty']) ) {
		     

		     $pID = trim($_POST['pID']);
		     $qty = intval(trim($_POST['qty']));
		     
	   
		     
		     if( CSaleBasket::Update($pID, Array("QUANTITY" => $qty) ) ) {
			     
                 $arBasketItems = array();

				$dbBasketItems = CSaleBasket::GetList(
				     array(),
				     array(
				                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
				                "LID" => SITE_ID,
				                "ORDER_ID" => "NULL",
				                "MODULE" => "catalog"
				             ),
				     false,
				     false,
				     array("ID", "NAME", "MODULE", "ORDER_ID", "PRODUCT_ID", "QUANTITY", "PRICE", "USER_ID")
				);
				
				$total = 0;
				while ($arItems = $dbBasketItems->Fetch()) {
					$total += $arItems["PRICE"]*$arItems["QUANTITY"];
					
				}
			     
			     echo json_encode(Array("TOTAL_SUM" => $total, "ITEM" => CSaleBasket::GetByID($pID)));
			     


			     
			     
			     
		     } else {
			     echo "2";
		     }
		     
		   		    
	    } else {
		    echo "3";
	    }   
    } 
    
?>    