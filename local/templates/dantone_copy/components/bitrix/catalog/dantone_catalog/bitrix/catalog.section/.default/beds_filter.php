<form class="catalog-filters-form" id="dantone_filter_box">
    <div class="catalog-filters-new">
        <div class="cfn-block">
            <div class="cfn-title">
                Размер спального места
            </div>
            <div class="checkboxes-dantone size_90_120">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_90_120"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">90 - 120см</span>
                </label>
            </div>
            <div class="checkboxes-dantone size_160_200">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_160_200"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">160 - 200см</span>
                </label>
            </div>
        </div>
        <div class="cfn-block">
            <div class="cfn-title">
                Цена
            </div>
            <div class="checkboxes-dantone price_under_80">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_under_80"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">до 80 000 ₽ </span>
                </label>
            </div>
            <div class="checkboxes-dantone price_80_100">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_80_100"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">80 000 - 100 000 ₽</span>
                </label>
            </div>
            <div class="checkboxes-dantone price_over_100">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_over_100"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">от 100 000 ₽</span>
                </label>
            </div>
        </div>
        <div class="cfn-last">
            <div class="cfn-last-container">
                <div class="cfn-sort-container sofas">
                    <div class="fright sort-container">
                        <select id="sort" style="position: absolute; left: -9999px;">
                            <option value="">Сортировать по</option>
                            <option value="hit">По популярности</option>
                            <option value="price">По цене</option>
                            <option value="discount">Со скидкой</option>
                        </select>
                    </div>
                    <button class="sfn-btn">Сбросить</button>
                </div>
            </div>

            <div class="cfn-last-block">
                <div class="cfn-title">
                    Наличие
                </div>
                <div class="cfn-last-bottom">
                    <div class="checkboxes-dantone available">
                        <label>
                            <input type="checkbox" <?if($_REQUEST["filter"]["available"] == "Y"):?>checked<?endif?>>
                            <span class="checkbox-title">В наличии</span>
                        </label>
                    </div>
                    <div class="checkboxes-dantone available_30_days">
                        <label>
                            <input type="checkbox" <?if($_REQUEST["filter"]["available_30_days"] == "Y"):?>checked<?endif?>>
                            <span class="checkbox-title">В любой ткани за 30 дней</span>
                        </label>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="cfn-sort-container mobile">
        <div class="fright sort-container">
            <select id="sort" style="position: absolute; left: -9999px;">
                <option value="">Сортировать по</option>
				<option selected <?if($_REQUEST['filter']['sortField'] == "hit"):?>selected<?endif;?> value="hit">По популярности</option>
                <option <?if($_REQUEST['filter']['sortField'] == "price"):?>selected<?endif;?> value="price">По цене</option>
                <option <?if($_REQUEST['filter']['sortField'] == "discount"):?>selected<?endif;?> value="discount">Со скидкой</option>
            </select>
        </div>
        <button class="sfn-btn">Сбросить</button>
    </div>
    <input type="hidden" name="filter[size_90_120]" />
    <input type="hidden" name="filter[size_160_200]" />
    <input type="hidden" name="filter[price_under_80]" />
    <input type="hidden" name="filter[price_80_100]" />
    <input type="hidden" name="filter[price_over_100]" />
    <input type="hidden" name="filter[available]" />
    <input type="hidden" name="filter[available_30_days]" />
	<input type="hidden" name="filter[sortField]" value="<?=$_REQUEST["filter"]["sortField"]?>"/>
</form>
<script>
function submit_handler()
{
	<?//читаем значения фильтра для дальнейшего сабмита?>
	var size_90_120 = false;
	var size_160_200 = false;

	var price_under_80 = false;
	var price_80_100 = false;
	var price_over_100 = false;

	var available = false;
	var available_30_days = false;

	if($(".size_90_120 .jq-checkbox").hasClass("checked")) {
		size_90_120 = "Y";
		$("#dantone_filter_box input[name='filter[size_90_120]']").val("Y");
	}
	if($(".size_160_200 .jq-checkbox").hasClass("checked")) {
		size_160_200 = "Y";
		$("#dantone_filter_box input[name='filter[size_160_200]']").val("Y");
	}
	if($(".price_under_80 .jq-checkbox").hasClass("checked")) {
		price_under_80 = "Y";
		$("#dantone_filter_box input[name='filter[price_under_80]']").val("Y");
	}
	if($(".price_80_100 .jq-checkbox").hasClass("checked")) {
		price_80_100 = "Y";
		$("#dantone_filter_box input[name='filter[price_80_100]']").val("Y");
	}
	if($(".price_over_100 .jq-checkbox").hasClass("checked")) {
		price_over_100 = "Y";
		$("#dantone_filter_box input[name='filter[price_over_100]']").val("Y");
	}
	if($(".available .jq-checkbox").hasClass("checked")) {
		available = "Y";
		$("#dantone_filter_box input[name='filter[available]']").val("Y");
	}
	if($(".available_30_days .jq-checkbox").hasClass("checked")) {
		available_30_days = "Y";
		$("#dantone_filter_box input[name='filter[available_30_days]']").val("Y");
	}

	$("#dantone_filter_box").submit();
}
$(function(){
	$("#sort").on("change", function(){
		$("#dantone_filter_box input[name='filter[sortField]']").val($(this).val());
		submit_handler();
	});
    $("#dantone_filter_box .jq-checkbox").on("click", function(){
		submit_handler();
    });
});
</script>
<?
unset($_SESSION["filter"]);
?>