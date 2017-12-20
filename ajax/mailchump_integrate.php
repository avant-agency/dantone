<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 

if($_REQUEST["email"] != "" && $_REQUEST["fname"] != "")
{
	$email=$_REQUEST["email"];
	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	$apikey='e5a6e1b43fd90b5bf7f029ead92e18f7';
	$listId='d32caae848';

	$data = array(
		'email_address'=>$email, 'apikey'=>$apikey,
		'merge_vars' => array('FNAME' => $fname, 'LNAME' => $lname),
		'id' => $listId, 'double_optin' => false, 'update_existing' => true, 
		'replace_interests' => false, 'send_welcome' => false, 'email_type' => 'html');
	$submit_url = "http://us12.api.mailchimp.com/1.3/?method=listSubscribe";

	$payload = json_encode($data); 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $submit_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
	
	$result = curl_exec($ch);
	curl_close ($ch);
	$data = json_decode($result);
	if (isset($data->error) and $data->error){
		echo json_encode(array("res" => true, "data" => $data->error));
	} else {
		echo json_encode(array("res" => true, "data" => "Действие выполненно успешно"));
	}
}
?>