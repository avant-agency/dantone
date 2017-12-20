<?
if($_REQUEST['save_props']=='Y'){
	session_start();
	$APPLICATION->RestartBuffer();
	unset($_POST['sessid']);
	unset($_POST['ORDER_PROP_22']);
	$_SESSION['ORDER_FORM'][SITE_ID]=$_POST;
	print_r($_SESSION['ORDER_FORM'][SITE_ID]);
	die();
}
if($_REQUEST['get_props']=='Y'){
	$APPLICATION->RestartBuffer();
	echo CUtil::PHPToJsObject($_SESSION['ORDER_FORM'][SITE_ID]);
	die();
}
?>