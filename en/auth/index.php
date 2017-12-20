<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>

  <section id="content">
   <div class="container">

<?

$userName = CUser::GetFullName();
if (!$userName)
	$userName = CUser::GetLogin();
?>
<script>
	<?if ($userName):?>
	BX.localStorage.set("eshop_user_name", "<?=CUtil::JSEscape($userName)?>", 604800);
	<?else:?>
	BX.localStorage.remove("eshop_user_name");
	<?endif?>

	<?if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0 && preg_match('#^/\w#', $_REQUEST["backurl"])):?>
	document.location.href = "<?=CUtil::JSEscape($_REQUEST["backurl"])?>";
	<?endif?>
</script>

<?
$APPLICATION->SetTitle("Authorization");
?>
<p>You have registered and signed in successfully!</p>
 
<p><a href="<?=SITE_DIR?>">Back to Main page</a></p>


   </div>
  </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>