<?
    require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

    $USER_EMAIL = htmlspecialcharsbx($_POST['email']);
    $LINK_ORDER = htmlspecialcharsbx($_POST['link_order']);

    $arEventFields;

    $by = "id";
    $order = "asc";
    $arFilter = array("EMAIL" => $USER_EMAIL);

    $rsUsers = CUser::GetList($by, $order, $arFilter);

    if ($arRes = $rsUsers->Fetch())
    {
			/*
		if (CUser::Delete($arRes['ID']))
		{ 
			echo "Пользователь удален."; exit(0);
		}
		else
		{
			echo "не найден";
		}
		print_r($arRes);die();
			*/

        $arEventFields = array(
            "USER_EMAIL" => $USER_EMAIL,
            "LINK_ORDER" => $LINK_ORDER
        );
        CEvent::Send("DEFERRED_ORDER", "s1", $arEventFields, "N", "", "");
    }else{
        $new_pass = \Bitrix\Main\Security\Random::getString(8); //генерация пароля

        $user = new CUser;
        $arFields = Array(
          "EMAIL"             => $USER_EMAIL,
          "LOGIN"             => $USER_EMAIL,
          "PASSWORD"          => $new_pass,
          "CONFIRM_PASSWORD"  => $new_pass
        );

        $ID = $user->Add($arFields);
        if (intval($ID) > 0){
            $arEventFields = array(
                "USER_EMAIL" => $USER_EMAIL,
                "USER_LOGIN" => $USER_EMAIL,
                "USER_PASSWORD" => $new_pass,
                "LINK_ORDER" => $LINK_ORDER
            );
            //echo "Пользователь успешно добавлен. Login:".$USER_EMAIL."Passwodr:".$new_pass;
            CEvent::Send("DEFERRED_ORDER_NEW_USER", "s1", $arEventFields, "N", "", "");
        }
        else
            echo $user->LAST_ERROR;
    }
?>
