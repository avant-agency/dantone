<form id="selectform" method="POST">
	<div class="fright sort-container">
		<select name="sortField" onchange="$('#selectform').submit()" id="sort">
			<option value="">Сортировать по</option>

			<option <?if($_SESSION['sortField'] == "PROPERTY_NEWPRODUCT"):?>selected <?endif;?> value="PROPERTY_NEWPRODUCT">Новинки</option>
			<option <?if($_SESSION['sortField'] == "PROPERTY_BESTSELLER"):?>selected <?endif;?> value="PROPERTY_BESTSELLER">По популярности</option>
			<option <?if($_SESSION['sortField'] == "PROPERTY_MINIMUM_PRICE"):?>selected <?endif;?> value="PROPERTY_MINIMUM_PRICE">По цене</option>
			<option <?if($_SESSION['sortField'] == "PROPERTY_DISCOUNT"):?>selected <?endif;?> value="PROPERTY_DISCOUNT">Со скидкой</option>
		</select>
	</div>
</form>
