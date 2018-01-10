<?
global $variables;
$SECTION_CODE_PATH = $variables["SECTION_CODE_PATH"];
?>
<div class="catalog-filters-form" id="dantone_filter_box">
   <div class="catalog-filters-new">

        <div class="cfn-block">
            <div class="cfn-title">
                Диаметр
            </div>
            <div class="checkboxes-dantone diameter_10_40">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["diameter_10_40"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">10 - 40 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone diameter_40_80">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["diameter_40_80"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">40 - 80 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone diameter_80_90">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["diameter_80_90"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">80 - 90 см</span>
                </label>
            </div>
        </div>
		<div class="cfn-block">
            <div class="cfn-title">
                Высота
            </div>
            <div class="checkboxes-dantone height_20_80">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["height_20_80"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">20 - 80 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone height_80_120">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["height_80_120"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">80 - 120 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone height_120_150">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["height_120_150"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">120 - 150 см</span>
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
                    <?include "sort.php";?>
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
    <div class="cfn-sort-container mobile">
		<?include "sort.php";?>
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
	var url = ''; 
	<?//читаем значения фильтра для дальнейшего сабмита?>
	var diameter_10_40 = false;
	var diameter_40_80 = false;
	var diameter_80_90 = false;

	var height_20_80 = false;
    var height_80_120 = false;
    var height_120_150 = false;

	var price_under_100 = false;
	var price_100_150 = false;
	var price_over_150 = false;

	var available = false;

	if($(".height_20_80 .jq-checkbox").hasClass("checked")) {
		height_20_80 = "Y";
		url = url + 'height_20_80/';
		$("#dantone_filter_box input[name='filter[height_20_80]']").val("Y");
	}
	if($(".height_80_120 .jq-checkbox").hasClass("checked")) {
		height_80_120 = "Y";
		url = url + 'height_80_120/';
		$("#dantone_filter_box input[name='filter[height_80_120]']").val("Y");
	}
	if($(".height_120_150 .jq-checkbox").hasClass("checked")) {
		diameter_120_150 = "Y";
		url = url + 'diameter_120_150/';
		$("#dantone_filter_box input[name='filter[height_120_150]']").val("Y");
	}
	if($(".diameter_10_40 .jq-checkbox").hasClass("checked")) {
		diameter_10_40 = "Y";
		url = url + 'diameter_10_40/';
		$("#dantone_filter_box input[name='filter[diameter_10_40]']").val("Y");
	}
	if($(".diameter_40_80 .jq-checkbox").hasClass("checked")) {
		diameter_40_80 = "Y";
		url = url + 'diameter_40_80/';
		$("#dantone_filter_box input[name='filter[diameter_40_80]']").val("Y");
	}
	if($(".diameter_80_90 .jq-checkbox").hasClass("checked")) {
		diameter_80_90 = "Y";
		url = url + 'diameter_80_90/';
		$("#dantone_filter_box input[name='filter[diameter_80_90]']").val("Y");
	}
	if($(".price_under_30 .jq-checkbox").hasClass("checked")) {
		price_under_30 = "Y";
		url = url + 'price_under_30/';
		$("#dantone_filter_box input[name='filter[price_under_30]']").val("Y");
	}
	if($(".price_30_50 .jq-checkbox").hasClass("checked")) {
		price_30_50 = "Y";
		url = url + 'price_30_50/';
		$("#dantone_filter_box input[name='filter[price_30_50]']").val("Y");
	}
	if($(".price_over_50 .jq-checkbox").hasClass("checked")) {
		price_over_50 = "Y";
		url = url + 'price_over_50/';
		$("#dantone_filter_box input[name='filter[price_over_50]']").val("Y");
	}
	if($(".available .jq-checkbox").hasClass("checked")) {
		available = "Y";
		url = url + 'available/';
		$("#dantone_filter_box input[name='filter[available]']").val("Y");
	}
	  if(url != '')
			url = '<?=$SECTION_CODE_PATH;?>filter/' + url + 'apply/';
		else url = '<?=$SECTION_CODE_PATH;?>';

	$(location).attr('href',url);

	//$("#dantone_filter_box").submit();
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
//unset($_SESSION["filter"]);

?>