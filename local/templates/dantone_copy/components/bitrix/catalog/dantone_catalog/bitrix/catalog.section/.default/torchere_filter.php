<?
global $variables;


	$SECTION_CODE_PATH = $variables["SECTION_CODE_PATH"];
?>
<div class="catalog-filters-form" id="dantone_filter_box">
    <div class="catalog-filters-new">
		<div class="cfn-block">
            <div class="cfn-title">
                Высота
            </div>
            <div class="checkboxes-dantone height_70_100">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["height_70_100"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">70 - 100 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone height_100_150">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["height_100_150"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">100 - 150 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone height_150_170">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["height_150_170"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">150 - 170 см</span>
                </label>
            </div>
        </div>
        <div class="cfn-block">
            <div class="cfn-title">
                Цена
            </div>
            <div class="checkboxes-dantone price_under_20">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_under_20"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">до 20 000 ₽ </span>
                </label>
            </div>
            <div class="checkboxes-dantone price_20_40">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_20_40"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">20 000 - 40 000 ₽</span>
                </label>
            </div>
            <div class="checkboxes-dantone price_over_40">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_over_40"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">от 40 000 ₽</span>
                </label>
            </div>
        </div>
        <div class="cfn-last">
            <div class="cfn-last-container">
                <div class="cfn-sort-container sofas"><?include "sort.php";?>
                    <!--div class="fright sort-container">
                        <select id="sort" style="position: absolute; left: -9999px;">
                            <option value="">Сортировать по</option>
                            <option value="hit">По популярности</option>
                            <option value="price">По цене</option>
                            <option value="discount">Со скидкой</option>
                        </select>
                    </div-->
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
                </div>
            </div>

        </div>
    </div>
    <div class="cfn-sort-container mobile"><?include "sort.php";?>
        <!--div class="fright sort-container">
            <select id="sort" style="position: absolute; left: -9999px;">
                <option value="">Сортировать по</option>
				<option selected <?if($_REQUEST['filter']['sortField'] == "hit"):?>selected<?endif;?> value="hit">По популярности</option>
                <option <?if($_REQUEST['filter']['sortField'] == "price"):?>selected<?endif;?> value="price">По цене</option>
                <option <?if($_REQUEST['filter']['sortField'] == "discount"):?>selected<?endif;?> value="discount">Со скидкой</option>
            </select>
        </div-->
        <button class="sfn-btn">Сбросить</button>
    </div>

</div>
<script>
function submit_handler()
{
	<?//читаем значения фильтра для дальнейшего сабмита?>
	var height_70_100 = false;
    var height_100_150 = false;
    var height_150_170 = false;

	var price_under_20 = false;
	var price_20_40 = false;
	var price_over_40 = false;

	var available = false;
	var url = ''; 
	if($(".height_70_100 .jq-checkbox").hasClass("checked")) {
		height_70_100 = "Y"; url = url + '-height_70_100';
		$("#dantone_filter_box input[name='filter[height_70_100]']").val("Y");
	}
	if($(".height_100_150 .jq-checkbox").hasClass("checked")) {
		height_100_150 = "Y"; url = url + '-height_100_150';
		$("#dantone_filter_box input[name='filter[height_100_150]']").val("Y");
	}
	if($(".height_150_170 .jq-checkbox").hasClass("checked")) {
		height_150_170 = "Y";  url = url + '-height_150_170';
		$("#dantone_filter_box input[name='filter[height_150_170]']").val("Y");
	}
	if($(".price_under_20 .jq-checkbox").hasClass("checked")) {
		price_under_20 = "Y"; url = url + '-price_under_20';
		$("#dantone_filter_box input[name='filter[price_under_20]']").val("Y");
	}
	if($(".price_20_40 .jq-checkbox").hasClass("checked")) {
		price_20_40 = "Y"; url = url + '-price_20_40';
		$("#dantone_filter_box input[name='filter[price_20_40]']").val("Y");
	}
	if($(".price_over_40 .jq-checkbox").hasClass("checked")) {
		price_over_40 = "Y"; url = url + '-price_over_40';
		$("#dantone_filter_box input[name='filter[price_over_40]']").val("Y");
	}
	if($(".available .jq-checkbox").hasClass("checked")) {
		available = "Y"; url = url + '-available';
		$("#dantone_filter_box input[name='filter[available]']").val("Y");
	}
 	if(url != '')
			url = '<?=$SECTION_CODE_PATH;?>filter' + url + '/';
		else url = '<?=$SECTION_CODE_PATH;?>';
	
	url = url + "?sortField=" + $("#sort").children(":selected").val();

	$(location).attr('href',url);
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