<form class="catalog-filters-form" id="dantone_filter_box">
    <div class="catalog-filters-new">
        <div class="cfn-block">
            <div class="cfn-title">
                Ширина
            </div>
            <div class="checkboxes-dantone width_40_100">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["width_40_100"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">40 - 100</span>
                </label>
            </div>
            <div class="checkboxes-dantone width_100_200">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["width_100_200"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">100 - 200</span>
                </label>
            </div>
            <div class="checkboxes-dantone width_200_300">
                <label>
                    <input type="checkbox" <?if($_REQUEST["filter"]["width_200_300"] == "Y"):?>checked<?endif?>>
                    <span class="checkbox-title">200 - 300</span>
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
    <input type="hidden" name="filter[width_40_100]" />
    <input type="hidden" name="filter[width_100_200]" />
    <input type="hidden" name="filter[width_200_300]" />
    <input type="hidden" name="filter[app_console]" />
    <input type="hidden" name="filter[app_dinner]" />
    <input type="hidden" name="filter[app_writing]" />
    <input type="hidden" name="filter[app_magazine]" />
    <input type="hidden" name="filter[price_under_80]" />
    <input type="hidden" name="filter[price_80_100]" />
    <input type="hidden" name="filter[price_over_100]" />
    <input type="hidden" name="filter[available]" />
    <input type="hidden" name="filter[table_folding_mechanism]" />
    <input type="hidden" name="filter[sortField]" value="<?=$_REQUEST["filter"]["sortField"]?>"/>
</form>
<script>
function submit_handler()
{
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
        $("#dantone_filter_box input[name='filter[width_40_100]']").val("Y");
    }
    if($(".width_100_200 .jq-checkbox").hasClass("checked")) {
        width_100_200 = "Y";
        $("#dantone_filter_box input[name='filter[width_100_200]']").val("Y");
    }
    if($(".width_200_300 .jq-checkbox").hasClass("checked")) {
        width_200_300 = "Y";
        $("#dantone_filter_box input[name='filter[width_200_300]']").val("Y");
    }

    if($(".app_console .jq-checkbox").hasClass("checked")) {
        app_console = "Y";
        $("#dantone_filter_box input[name='filter[app_console]']").val("Y");
    }
    if($(".app_dinner .jq-checkbox").hasClass("checked")) {
        app_dinner = "Y";
        $("#dantone_filter_box input[name='filter[app_dinner]']").val("Y");
    }
    if($(".app_writing .jq-checkbox").hasClass("checked")) {
        app_writing = "Y";
        $("#dantone_filter_box input[name='filter[app_writing]']").val("Y");
    }
    if($(".app_magazine .jq-checkbox").hasClass("checked")) {
        app_magazine = "Y";
        $("#dantone_filter_box input[name='filter[app_magazine]']").val("Y");
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
    if($(".table_folding_mechanism .jq-checkbox").hasClass("checked")) {
        table_folding_mechanism = "Y";
        $("#dantone_filter_box input[name='filter[table_folding_mechanism]']").val("Y");
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