<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include $_SERVER["DOCUMENT_ROOT"]."/amo-crm/amo_kitchen.php";

header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

CModule::IncludeModule('iblock');

switch(true)
{
	case $_REQUEST["method"] == "get_kitchen_catalog" && $_REQUEST["email"] != "" && $_REQUEST["phone"] != "": 
		// выслать клиенту письмо с каталогом и выслать менеджерам сообщение "Получить запрос на каталог"
		$arEventFields = array("EMAIL" => $_REQUEST["email"], "PHONE" => $_REQUEST["phone"]);
		$r = CEvent::Send("KITCHEN_LANDING_GET_CATALOG", 's1', $arEventFields);

		// add to mailchimp 
		$email=$_REQUEST["email"];
		$apikey='e5a6e1b43fd90b5bf7f029ead92e18f7-us12';
		$listId='562073bb6b';

		$data = array('email_address'=>$email, 'apikey'=>$apikey, 'id' => $listId, 
			'double_optin' => false, 'update_existing' => true, 'replace_interests' => false, 'send_welcome' => false, 'email_type' => 'html');
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
			// сообщение AMO-CRM
			Amo_DoOrderCatalogKitchen($_REQUEST["phone"], $_REQUEST["email"])
			echo json_encode(array("res" => true, "data" => $data->error));
		} else {
			echo json_encode(array("res" => true, "data" => "Действие выполненно успешно"));
		}

	break;
	case $_REQUEST["method"] == "calculate_my_project" && $_REQUEST["name"] != "" && $_REQUEST["email"] != "" && 
		$_REQUEST["phone"] != "" && $_REQUEST["wishes"] != "":

		$el = new CIBlockElement;

		$fid = CFile::SaveFile($_FILES['file'], "projects");
		$file_getPath = CFile::GetPath($fid);
		$PROP = array();
		$PROP[245] = $fid;
		$PROP[246] = $_REQUEST["name"];
		$PROP[247] = $_REQUEST["phone"];
		$PROP[248] = $_REQUEST["email"];

		$arLoadProductArray = Array(
			"IBLOCK_ID"      => 13,
			"PROPERTY_VALUES"=> $PROP,
			"NAME"           => time(),
			"PREVIEW_TEXT"   => $_REQUEST["wishes"],
		);

		if($PRODUCT_ID = $el->Add($arLoadProductArray))
		{
			$arEventFields = array(
				"NAME" => $_REQUEST["name"],
				"PHONE" => $_REQUEST["phone"],
				"EMAIL" => $_REQUEST["email"],
				"WISHES" => $_REQUEST["wishes"],
				"FILE_LINK" => "https://www.dantonehome.ru".$file_getPath,
			);

			$r = CEvent::Send("KITCHEN_LANDING", 's1', $arEventFields);

			Amo_DoGetCalculationKitchen($_REQUEST["name"], $_REQUEST["phone"], $_REQUEST["email"], $_REQUEST["wishes"], $file_getPath)

			echo 1;
		}
		else
		{
			echo 0;
		}
	break;
}

die();
?>