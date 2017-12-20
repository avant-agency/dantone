<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 

// проверка поступаемого ID
$rsUser = CUser::GetByID($_REQUEST["id"]);
$arUser = $rsUser->Fetch();
if($arUser["UF_UNACTIVE_USER_COD"] == $_REQUEST["code"])
{
	// генерируем пароль и отправляем письмо на почту
	$new_pass = \Bitrix\Main\Security\Random::getString(8);

	$user = new CUser;
	$fields = Array("PASSWORD" => $new_pass, "CONFIRM_PASSWORD"  => $new_pass, "UF_UNACTIVE_USER_COD" => "ACTIVE");
	$user->Update($_REQUEST["id"], $fields);

	$arEventFields = array(
		"EMAIL" => $arUser["EMAIL"],
		"LOGIN" => $arUser["LOGIN"],
		"PASSWORD" => $new_pass
	);
	CEvent::Send("USER_WANT_TO_BE_IN_CLUB", "s1", $arEventFields);
}
?>
<script>window.close();</script>