<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 

$wd = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/local/mail_upgrade/mails_weekdays.txt");
$we = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/local/mail_upgrade/mails_weekends.txt");

$wd = explode("\n", $wd);
$we = explode("\n", $we);

 if(date('w', strtotime("08.01.2018")) % 6 == 0)
 {
 	print_r($we);
 	echo date("d.m.Y") . " weekend";
 }
 else
 {
 	print_r($wd);
 	echo date("d.m.Y") . " weekday";
 }

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php"); 
?>