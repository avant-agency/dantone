<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("My profile");
?>

<section id="content">
<div class="container">
	<div>
		<h2>Personal information</h2>
		<a href="profile/">Edit Personal information</a>
	</div>
	<div>
		<h2>Orders</h2>
		<a href="order/">List of orders</a><br/>
		<a href="cart/">View cart</a><br/>
	</div>
</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
