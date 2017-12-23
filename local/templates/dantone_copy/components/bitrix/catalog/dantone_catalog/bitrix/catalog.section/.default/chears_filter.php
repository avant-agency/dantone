<form class="catalog-filters-form" id="dantone_filter_box">
    <div class="catalog-filters-new">
        <div class="cfn-block">
            <div class="cfn-title">
                Ширина
            </div>
            <div class="checkboxes-dantone size_40_60">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_40_60"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">40 - 60</span>
                </label>
            </div>
            <div class="checkboxes-dantone size_60_80">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_60_80"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">60 - 80</span>
                </label>
            </div>
            <div class="checkboxes-dantone size_80_110">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_80_110"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">80 - 110</span>
                </label>
            </div>
        </div>
        <div class="cfn-block">
            <div class="cfn-title">
                Цена
            </div>
            <div class="checkboxes-dantone price_under_30">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_under_30"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">до 30 000 ₽ </span>
                </label>
            </div>
            <div class="checkboxes-dantone price_30_50">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_30_50"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">30 000 - 50 000 ₽</span>
                </label>
            </div>
            <div class="checkboxes-dantone price_over_50">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_over_50"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">от 50 000 ₽</span>
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
    <input type="hidden" name="filter[size_40_60]" />
    <input type="hidden" name="filter[size_60_80]" />
    <input type="hidden" name="filter[size_80_110]" />
    <input type="hidden" name="filter[price_under_30]" />
    <input type="hidden" name="filter[price_30_50]" />
    <input type="hidden" name="filter[price_over_50]" />
    <input type="hidden" name="filter[available]" />
    <input type="hidden" name="filter[available_30_days]" />
	<input type="hidden" name="filter[sortField]" value="<?=$_REQUEST["filter"]["sortField"]?>"/>
</form>
<script>
function submit_handler()
{
	<?//читаем значения фильтра для дальнейшего сабмита?>
	var size_40_60 = false;
	var size_60_80 = false;
	var size_80_110 = false;

	var price_under_30 = false;
	var price_30_50 = false;
	var price_over_50 = false;

	var available = false;
	var available_30_days = false;

	if($(".size_40_60 .jq-checkbox").hasClass("checked")) {
		size_40_60 = "Y";
		$("#dantone_filter_box input[name='filter[size_40_60]']").val("Y");
	}
	if($(".size_60_80 .jq-checkbox").hasClass("checked")) {
		size_60_80 = "Y";
		$("#dantone_filter_box input[name='filter[size_60_80]']").val("Y");
	}
	if($(".size_80_110 .jq-checkbox").hasClass("checked")) {
		size_80_110 = "Y";
		$("#dantone_filter_box input[name='filter[size_80_110]']").val("Y");
	}
	if($(".price_under_30 .jq-checkbox").hasClass("checked")) {
		price_under_30 = "Y";
		$("#dantone_filter_box input[name='filter[price_under_30]']").val("Y");
	}
	if($(".price_30_50 .jq-checkbox").hasClass("checked")) {
		price_30_50 = "Y";
		$("#dantone_filter_box input[name='filter[price_30_50]']").val("Y");
	}
	if($(".price_over_50 .jq-checkbox").hasClass("checked")) {
		price_over_50 = "Y";
		$("#dantone_filter_box input[name='filter[price_over_50]']").val("Y");
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