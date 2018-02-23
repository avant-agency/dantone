<form id="selectform" method="POST">
	<input type="hidden" name="sortField" id="sortFieldValueField"/>
	<div class="fright sort-container">
		<select id="sort">
			<option value="">Сортировать по</option>

			<option <?if($_SESSION['sortField'] == "PROPERTY_NEWPRODUCT"):?>selected <?endif;?> value="PROPERTY_NEWPRODUCT">Новинки</option>
			<option <?if($_SESSION['sortField'] == "PROPERTY_BESTSELLER"):?>selected <?endif;?> value="PROPERTY_BESTSELLER">По популярности</option>
			<option <?if($_SESSION['sortField'] == "PROPERTY_MINIMUM_PRICE_UP"):?>selected <?endif;?> value="PROPERTY_MINIMUM_PRICE_UP">Цена по возрастанию</option>
			<option <?if($_SESSION['sortField'] == "PROPERTY_MINIMUM_PRICE_DOWN"):?>selected <?endif;?> value="PROPERTY_MINIMUM_PRICE_DOWN">Цена по убыванию</option>
			<option <?if($_SESSION['sortField'] == "PROPERTY_DISCOUNT"):?>selected <?endif;?> value="PROPERTY_DISCOUNT">Со скидкой</option>
		</select>
	</div>
</form>
<script>
$(function(){
	if (typeof submit_handler === 'undefined') {
		$("#sort").on("change", function(){
			alert($("#sort").children(":selected").val());
			$("#sortFieldValueField").val($("#sort").children(":selected").val());
			$("#selectform").submit();
		});
	}
});
</script>