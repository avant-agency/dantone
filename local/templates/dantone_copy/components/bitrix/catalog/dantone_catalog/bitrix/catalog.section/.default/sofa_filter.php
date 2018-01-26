<?
global $USER;
//if($USER->isAdmin())
//{

function smartFilterPath(){

	$array1 = explode('/',$_SERVER['REQUEST_URI']);
	$array = explode('-',$array1[(count($array1)-1)]);

   $filterKey = array_search('filter', $array);
   $applyKey = array_search('apply', $array);

   if($filterKey){
      $str = '';
      for($i=$filterKey+1; $i<$applyKey; $i++){
         $str .= $array[$i].'-';
      }
      
      $str = rtrim($str,'-');
      
      return $str;
   }
   else{   
      return false;
   }
}


global $variables;

$SECTION_CODE_PATH = $variables["SECTION_CODE_PATH"];
?>

<script>
function admin_submit_handler()
{
	var url = ''; 
	<?//читаем значения фильтра для дальнейшего сабмита?>
	var size_160_220 = false;
	var size_220_280 = false;
	var size_280_320 = false;

	var price_under_75 = false;
	var price_75_125 = false;
	var price_over_125 = false;

	var sofa_folding_mechanism_yes = false;
	var sofa_folding_mechanism_no = false;
	var available = false;
	var available_30_days = false;

	if($(".size_160_220 .jq-checkbox").hasClass("checked")) {
		size_160_220 = "Y";
		url = url + '-size_160_220';
		$("#dantone_filter_box input[name='filter[size_160_220]']").val("Y");
	}
	if($(".size_220_280 .jq-checkbox").hasClass("checked")) {
		size_220_280 = "Y";
		url = url + '-size_220_280';
		$("#dantone_filter_box input[name='filter[size_220_280]']").val("Y");
	}
	if($(".size_280_320 .jq-checkbox").hasClass("checked")) {
		size_280_320 = "Y";
		url = url + '-size_280_320';
		$("#dantone_filter_box input[name='filter[size_280_320]']").val("Y");
	}
	if($(".price_under_75 .jq-checkbox").hasClass("checked")) {
		price_under_75 = "Y";
		url = url + '-price_under_75';
		$("#dantone_filter_box input[name='filter[price_under_75]']").val("Y");
	}
	if($(".price_75_125 .jq-checkbox").hasClass("checked")) {
		price_75_125 = "Y";
		url = url + '-price_75_125';
		$("#dantone_filter_box input[name='filter[price_75_125]']").val("Y");
	}
	if($(".price_under_75 .jq-checkbox").hasClass("checked")) {
		price_under_75 = "Y";
		url = url + '-price_under_75';
		$("#dantone_filter_box input[name='filter[price_under_75]']").val("Y");
	}
	if($(".price_over_125 .jq-checkbox").hasClass("checked")) {
		price_over_125 = "Y";
		url = url + '-price_over_125';
		$("#dantone_filter_box input[name='filter[price_over_125]']").val("Y");
	}
	if($(".sofa_folding_mechanism_yes .jq-checkbox").hasClass("checked")) {
		sofa_folding_mechanism_yes = "Y";
		url = url + '-sofa_folding_mechanism_yes';
		$("#dantone_filter_box input[name='filter[sofa_folding_mechanism_yes]']").val("Y");
	}
	if($(".sofa_folding_mechanism_no .jq-checkbox").hasClass("checked")) {
		sofa_folding_mechanism_no = "Y";
		url = url + '-sofa_folding_mechanism_no';
		$("#dantone_filter_box input[name='filter[sofa_folding_mechanism_no]']").val("Y");
	}
	if($(".available .jq-checkbox").hasClass("checked")) {
		available = "Y";
		url = url + '-available';
		$("#dantone_filter_box input[name='filter[available]']").val("Y");
	}
	if($(".available_30_days .jq-checkbox").hasClass("checked")) {
		available_30_days = "Y";
		url = url + '-available_30_days';
		$("#dantone_filter_box input[name='filter[available_30_days]']").val("Y");
	}
  if(url != '')
			url = '<?=$SECTION_CODE_PATH;?>filter' + url + '/';
		else url = '<?=$SECTION_CODE_PATH;?>';
	
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
	//}
?>
<div class="catalog-filters-form" id="dantone_filter_box">
    <div class="catalog-filters-new">
        <div class="cfn-block">
            <div class="cfn-title">
                Размер
            </div>
            <div class="checkboxes-dantone size_160_220">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_160_220"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">160 - 220 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone size_220_280">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_220_280"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">220 - 280 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone size_280_320">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["size_280_320"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">280 - 320 см</span>
                </label>
            </div>
        </div>
        <div class="cfn-block">
            <div class="cfn-title">
                Цена
            </div>
            <div class="checkboxes-dantone price_under_75">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_under_75"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">до 75 000 ₽ </span>
                </label>
            </div>
            <div class="checkboxes-dantone price_75_125">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_75_125"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">75 000 - 125 000 ₽</span>
                </label>
            </div>
            <div class="checkboxes-dantone price_over_125">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["price_over_125"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">от 125 000 ₽</span>
                </label>
            </div>
        </div>
        <div class="cfn-last">
            <div class="cfn-last-container">
                <div class="cfn-last-block">
                    <div class="cfn-title">
                        Раскладной механизм
                    </div>

                    <div class="cfn-last-bottom">
                        <div class="checkboxes-dantone sofa_folding_mechanism_yes">
                            <label>
                                <input type="checkbox" <?if($_REQUEST["filter"]["sofa_folding_mechanism_yes"] == "Y"):?>checked<?endif?>>
                                <span class="checkbox-title">Да</span>
                            </label>
                        </div>
                        <div class="checkboxes-dantone sofa_folding_mechanism_no">
                            <label>
                                <input type="checkbox" <?if($_REQUEST["filter"]["sofa_folding_mechanism_no"] == "Y"):?>checked<?endif?>>
                                <span class="checkbox-title">Нет</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cfn-sort-container sofas">
					<?include "sort.php";?>
                    <!--div class="fright sort-container">
                        <select id="sort" style="position: absolute; left: -9999px;">
                            <option value="">Сортировать по</option>
                            <option value="hit">По популярности</option>
                            <option value="price">По цене</option>
                            <option value="discount">Со скидкой</option>
                        </select>
                    </div-->
                    <button onclick="javascript:clear_handler()" class="sfn-btn">Сбросить</button>

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
		<?include "sort.php";?>
        <!--div class="fright sort-container">
            <select id="sort" style="position: absolute; left: -9999px;">
                <option value="">Сортировать по</option>
				<option selected <?if($_REQUEST['filter']['sortField'] == "hit"):?>selected<?endif;?> value="hit">По популярности</option>
                <option <?if($_REQUEST['filter']['sortField'] == "price"):?>selected<?endif;?> value="price">По цене</option>
                <option <?if($_REQUEST['filter']['sortField'] == "discount"):?>selected<?endif;?> value="discount">Со скидкой</option>
            </select>
        </div-->
		<button onclick="javascript:clear_handler()" class="sfn-btn">Сбросить</button>
    </div>

</div>

<script>
function submit_handler()
{
	var url = ''; 

	<?//читаем значения фильтра для дальнейшего сабмита?>
	var size_160_220 = false;
	var size_220_280 = false;
	var size_280_320 = false;

	var price_under_75 = false;
	var price_75_125 = false;
	var price_over_125 = false;

	var sofa_folding_mechanism_yes = false;
	var sofa_folding_mechanism_no = false;
	var available = false;
	var available_30_days = false;

	if($(".size_160_220 .jq-checkbox").hasClass("checked")) {
		size_160_220 = "Y";
		url = url + '-size_160_220';
		$("#dantone_filter_box input[name='filter[size_160_220]']").val("Y");
	}
	if($(".size_220_280 .jq-checkbox").hasClass("checked")) {
		size_220_280 = "Y";
		url = url + '-size_220_280';
		$("#dantone_filter_box input[name='filter[size_220_280]']").val("Y");
	}
	if($(".size_280_320 .jq-checkbox").hasClass("checked")) {
		size_280_320 = "Y";
		url = url + '-size_280_320';
		$("#dantone_filter_box input[name='filter[size_280_320]']").val("Y");
	}
	if($(".price_under_75 .jq-checkbox").hasClass("checked")) {
		price_under_75 = "Y";
		url = url + '-price_under_75';
		$("#dantone_filter_box input[name='filter[price_under_75]']").val("Y");
	}
	if($(".price_75_125 .jq-checkbox").hasClass("checked")) {
		price_75_125 = "Y";
		url = url + '-price_75_125';
		$("#dantone_filter_box input[name='filter[price_75_125]']").val("Y");
	}

	if($(".price_over_125 .jq-checkbox").hasClass("checked")) {
		price_over_125 = "Y";
		url = url + '-price_over_125';
		$("#dantone_filter_box input[name='filter[price_over_125]']").val("Y");
	}
	if($(".sofa_folding_mechanism_yes .jq-checkbox").hasClass("checked")) {
		sofa_folding_mechanism_yes = "Y";
		url = url + '-sofa_folding_mechanism_yes';
		$("#dantone_filter_box input[name='filter[sofa_folding_mechanism_yes]']").val("Y");
	}
	if($(".sofa_folding_mechanism_no .jq-checkbox").hasClass("checked")) {
		sofa_folding_mechanism_no = "Y";
		url = url + '-sofa_folding_mechanism_no';
		$("#dantone_filter_box input[name='filter[sofa_folding_mechanism_no]']").val("Y");
	}
	if($(".available .jq-checkbox").hasClass("checked")) {

		available = "Y";
		url = url + '-available';
		$("#dantone_filter_box input[name='filter[available]']").val("Y");
	}
	if($(".available_30_days .jq-checkbox").hasClass("checked")) {
		available_30_days = "Y";
		url = url + '-available_30_days';
		$("#dantone_filter_box input[name='filter[available_30_days]']").val("Y");
	}
	  if(url != '')
		  url = '<?=$SECTION_CODE_PATH;?>filter' + url + '/';
		else url = '<?=$SECTION_CODE_PATH;?>';



	$(location).attr('href',url);
	//$("#dantone_filter_box").submit();
}

function clear_handler()
{
		var url = '<?=$SECTION_CODE_PATH;?>'; 
		window.location.href = url;
	//$(location).attr('href',url);
	return false;
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