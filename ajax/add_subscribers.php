<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 

CModule::IncludeModule('subscribe');

// НЕ ПОДПИСАН ЛИ УЖЕ
$subscr = CSubscription::GetList(array(), array());

while($subscr_arr = $subscr->Fetch())
	$aEmail[] = $subscr_arr["EMAIL"];

if(!in_array($_REQUEST["email"], $aEmail)) 
{
	// запрос всех рубрик
	$rub = CRubric::GetList(array("LID"=>"ASC","SORT"=>"ASC","NAME"=>"ASC"), array("ACTIVE"=>"Y", "LID"=>LANG));
	$arRubIDS = array();
	while ($arRub = $rub->Fetch())
		$arRubIDS[] = $arRub['ID'];

	// формируем массив с полями для создания подписки
	$arFields = Array(
		"FORMAT" => "html",
		"EMAIL" => $_REQUEST["email"],
		"ACTIVE" => "Y",
		"RUB_ID" => $arRubIDS,
		"SEND_CONFIRM" => 'N'
	);

	$subscr = new CSubscription;

	// создаем подписку
	$ID = $subscr->Add($arFields);
	if ($ID > 0){
		$arResult['status'] = 'ok';
	} else {
		$arResult['status'] = 'error';
		$arResult['msg'] = str_replace("<br>","",$subscr->LAST_ERROR);
	}

	$subscr->Update($ID, array("ACTIVE"=>"Y", "CONFIRM"=>"Y"));
}

echo json_encode(array("res" => true, "data" => "Действие выполнено успешно"));
?>