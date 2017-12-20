<?php
	
	
	
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	
	
	CModule::IncludeModule("sale");
	
	
	if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
		
		if( isset($_POST["email"]) && !empty($_POST["email"]) ) {
			
		     $email = strip_tags(trim($_POST["email"]));
		     $response = Array();
		     
		     if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			     $response["STATUS"] = 0;
			     $response["MESSAGE"] = "Вы ввели некорректный E-mail";
		     } else {
			     
			    if(!$COUPON = generateCoupon(29)) {
				    $response["STATUS"] = 10;
					$response["MESSAGE"] = "Ошибка";
				}
	
				CEvent::Send("EMAIL_DISCOUNT","s1", Array(
					    "COUPON"              => $COUPON["COUPON"],
					    "EMAIL_TO"            => $email,
					    "ACTIVE"              => "Y",
					    "NAME"                => "Вы получаете купон на скидку 5% на все заказы на сайте dantonehome.ru",
				));
				
				$response["STATUS"] = 1;
			    $response["MESSAGE"] = "На почту, которую Вы указали, выслан купон";
			    $response["COUPON"] = $COUPON;
			     
			     
		     }
		     
		   		     
		     
		     echo json_encode($response);	
			
		}
		
	}
	
	
	
	
	
	
	
?>	