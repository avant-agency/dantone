<form id="selectform" method="POST">
	<div class="fright sort-container">
            <select name="sortField" onchange="$('#selectform').submit()" id="sort">
                <option value="sort">Сортировать по</option>
				<option value="PROPERTY_NEWPRODUCT">По новинкам</option>
				<option value="PROPERTY_BESTSELLER">По популярности</option>
				<option value="PROPERTY_MINIMUM_PRICE">По цене</option>
				<option value="PROPERTY_DISCOUNT">Со скидкой</option>
            </select>
	</div>
</form>
