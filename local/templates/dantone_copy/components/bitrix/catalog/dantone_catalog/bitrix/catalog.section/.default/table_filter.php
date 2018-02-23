<?
global $variables;

	$SECTION_CODE_PATH = $variables["SECTION_CODE_PATH"];
?>

<div class="catalog-filters-form" id="dantone_filter_box">
    <div class="catalog-filters-new">
        <div class="cfn-block">
            <div class="cfn-title">
                Ширина
            </div>
            <div class="checkboxes-dantone width_40_100">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["width_40_100"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">40 - 100 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone width_100_200">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["width_100_200"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">100 - 200 см</span>
                </label>
            </div>
            <div class="checkboxes-dantone width_200_300">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["width_200_300"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">200 - 300 см</span>
                </label>
            </div>
        </div>
        <div class="cfn-block">
            <div class="cfn-title">
                Назначение
            </div>
            <div class="checkboxes-dantone app_console">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["app_console"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">Консоль</span>
                </label>
            </div>
            <div class="checkboxes-dantone app_dinner">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["app_dinner"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">Обеденный</span>
                </label>
            </div>
            <div class="checkboxes-dantone app_writing">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["app_writing"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">Письменный</span>
                </label>
            </div>
            <div class="checkboxes-dantone app_magazine">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["app_magazine"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">Журнальный/приставной</span>
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
                <div class="cfn-last-block">
                    <div class="cfn-title">
                        Наличие
                    </div>

                    <div class="cfn-last-bottom">
                        <div class="checkboxes-dantone available">
                            <label>
                                <input type="checkbox" <?if($_REQUEST["filter"]["available"] == "Y"):?>checked<?endif?>>
                                <span class="checkbox-title">Да</span>
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
                    <button class="sfn-btn">Сбросить</button>

                </div>

            </div>
            <div class="cfn-last-block">
                <div class="cfn-title">
                    Раскладной
                </div>

                <div class="cfn-last-bottom">
                    <div class="checkboxes-dantone table_folding_mechanism">
                        <label>
                            <input type="checkbox" <?if($_REQUEST["filter"]["table_folding_mechanism"] == "Y"):?>checked<?endif?>>
                            <span class="checkbox-title">Да</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?    
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($_SERVER['HTTP_USER_AGENT'],0,4)))
	{?>
		<div class="cfn-sort-container mobile"><?include "sort.php";?>
			<button class="sfn-btn" onclick="javascript:clear_handler()">Сбросить</button>
		</div>
  <?}?>

</div>
<script>
function submit_handler()
{
	var url = ''; 
    <?//читаем значения фильтра для дальнейшего сабмита?>
    var width_40_100 = false;
    var width_100_200 = false;
    var width_200_300 = false;

    var app_console = false;
    var app_dinner = false;
    var app_writing = false;
    var app_magazine = false;

    var price_under_80 = false;
    var price_80_100 = false;
    var price_over_100 = false;

    var available = false;
    var table_folding_mechanism = false;

    if($(".width_40_100 .jq-checkbox").hasClass("checked")) {
        width_40_100 = "Y";
		url = url + '-width_40_100';
        $("#dantone_filter_box input[name='filter[width_40_100]']").val("Y");
    }
    if($(".width_100_200 .jq-checkbox").hasClass("checked")) {
        width_100_200 = "Y";
		url = url + '-width_100_200';
        $("#dantone_filter_box input[name='filter[width_100_200]']").val("Y");
    }
    if($(".width_200_300 .jq-checkbox").hasClass("checked")) {
        width_200_300 = "Y";
		url = url + '-width_200_300';
        $("#dantone_filter_box input[name='filter[width_200_300]']").val("Y");
    }

    if($(".app_console .jq-checkbox").hasClass("checked")) {
        app_console = "Y";
		url = url + '-app_console';
        $("#dantone_filter_box input[name='filter[app_console]']").val("Y");
    }
    if($(".app_dinner .jq-checkbox").hasClass("checked")) {
        app_dinner = "Y";
		url = url + '-app_dinner';
        $("#dantone_filter_box input[name='filter[app_dinner]']").val("Y");
    }
    if($(".app_writing .jq-checkbox").hasClass("checked")) {
        app_writing = "Y";
		url = url + '-app_writing';
        $("#dantone_filter_box input[name='filter[app_writing]']").val("Y");
    }
    if($(".app_magazine .jq-checkbox").hasClass("checked")) {
        app_magazine = "Y";
		url = url + '-app_magazine';
        $("#dantone_filter_box input[name='filter[app_magazine]']").val("Y");
    }

    if($(".price_under_80 .jq-checkbox").hasClass("checked")) {
        price_under_80 = "Y";
		url = url + '-price_under_80';
        $("#dantone_filter_box input[name='filter[price_under_80]']").val("Y");
    }
    if($(".price_80_100 .jq-checkbox").hasClass("checked")) {
        price_80_100 = "Y";
		url = url + '-price_80_100';
        $("#dantone_filter_box input[name='filter[price_80_100]']").val("Y");
    }
    if($(".price_over_100 .jq-checkbox").hasClass("checked")) {
        price_over_100 = "Y";
		url = url + '-price_over_100';
        $("#dantone_filter_box input[name='filter[price_over_100]']").val("Y");
    }
    if($(".available .jq-checkbox").hasClass("checked")) {
        available = "Y";
		url = url + '-available';
        $("#dantone_filter_box input[name='filter[available]']").val("Y");
    }
    if($(".table_folding_mechanism .jq-checkbox").hasClass("checked")) {
        table_folding_mechanism = "Y";
		url = url + '-table_folding_mechanism';
        $("#dantone_filter_box input[name='filter[table_folding_mechanism]']").val("Y");
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