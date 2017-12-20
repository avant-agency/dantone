<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("pressa");
?>
<section id="content">
	<div class="container">


		<h1 class="h2 mb10">Пресса</h1>
		<div class="clearfix mb20">
			<ul class="breadcrumbs">
				<li>
					<a href="/">Главная</a>
				</li>
				<li>
					Пресса
				</li>
			</ul>
		</div>


		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"press_01_12_17", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "ID",
			2 => "CODE",
			3 => "XML_ID",
			4 => "NAME",
			5 => "TAGS",
			6 => "SORT",
			7 => "PREVIEW_TEXT",
			8 => "PREVIEW_PICTURE",
			9 => "DETAIL_TEXT",
			10 => "DETAIL_PICTURE",
			11 => "DATE_ACTIVE_FROM",
			12 => "ACTIVE_FROM",
			13 => "DATE_ACTIVE_TO",
			14 => "ACTIVE_TO",
			15 => "SHOW_COUNTER",
			16 => "SHOW_COUNTER_START",
			17 => "IBLOCK_TYPE_ID",
			18 => "IBLOCK_ID",
			19 => "IBLOCK_CODE",
			20 => "IBLOCK_NAME",
			21 => "IBLOCK_EXTERNAL_ID",
			22 => "DATE_CREATE",
			23 => "CREATED_BY",
			24 => "CREATED_USER_NAME",
			25 => "TIMESTAMP_X",
			26 => "MODIFIED_BY",
			27 => "USER_NAME",
			28 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "ENG_NAME",
			2 => "ENG_PREVIEW_TEXT",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "press_01_12_17"
	),
	false
);?>

		<script>
			$(document).ready(function () {
				$('.pressa-wrapper').click(function () {
					var href = $(this).find('a').attr('href');
					window.open(href);
				})
			})
		</script>

	</div>
</section>
<style>
.pressa-wrap {
    width: 850px;
    background: #e8e9eb;
    border: 1px solid #bbbdc3;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    font-family: 'Roboto', sans-serif;
    padding-top: 36px;
    height: 230px;
    position: relative;
    margin-bottom: 190px;
    padding-elft: 10px;
    padding-right: 10px;
    cursor: pointer;
}
.journal-title {
    font-size: 16px;
    color: #66738b;

}
.publ-title {
    font-size: 30px;
    line-height: 35px;
    color: #1c2337;
    font-weight: 300;
    width: 350px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    margin-bottom: 20px;
    display: block;
    text-decoration: none;
}
.pressa-about {
    font-size: 14px;
    text-transform: uppercase;
    color: #1c2337;
    width: 290px;
    margin-left: auto;
    margin-right: auto;
}
.line {
    display: block;
    width: 87px;
    height: 1px;
    background: #1d2437;
    float: left;
    margin-top: 10px;
    transition: .5s ease-in-out;

}
.line:first-of-type{
     transform-origin: right center;
 }
.line:last-of-type{
    transform-origin: left center;
}

.about-text {
    display: block;
    float: left;
    margin: 0 14px;
}
.pressa-img {
    position: absolute;
    top: auto;
    left: 46px;
    transition: all .5s;
    bottom: -149px;
}

.pressa-wrapper:hover .line {
    transform: scaleX(0);
}
.pressa-wrapper:hover .pressa-img {
    bottom: -130px;
}

.journal-title, .publ-title, .pressa-about {
    position: relative;
    left: 120px; }

.pressa-wrapper {
    position: relative;
    width: 850px;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;}

.photo-pressa-wrap {
    position: absolute;
    left: auto;
    right: 0;
    top: 250px; }
.photo-pressa-wrap img {
    margin-right: 10px; }
.photo-pressa-wrap img:last-of-type {
    margin-right: 0; }

@media screen and (max-width:1050px) {
    .pressa-wrap {
        height: auto;
        width: 90%;
        padding-bottom: 150px;
    }




    .pressa-wrap:hover .pressa-img {
        top: auto;
    }

    .journal-title, .publ-title, .pressa-about {
        position: relative;
        left: 100px; }
    .pressa-img {
        bottom: -45%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 15px; }
    .pressa-about {
        margin-bottom: 20px; }
    .pressa-wrap {
        margin-bottom: 80px; }
    .photo-pressa-wrap {
        max-width: 50%; }
    .photo-pressa-wrap {
        top: auto;
        bottom: 20px;
        left: auto;
        right: 0; }
    .photo-pressa-wrap img {
        max-width: 40%;
        margin-right: 5%; }

}
@media all and (max-width: 800px) {
    .photo-pressa-wrap {
        display: none; }
    .pressa-img {
        left: 50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        top: 240px; }
    .journal-title, .publ-title, .pressa-about {
        position: relative;
        left: 0; }
    .pressa-wrap {
        margin-bottom: 200px; } }

@media screen and (max-width: 400px) {

    .publ-title {
        font-size:24px;
        line-height: 30px;
        width: 90%;
        max-width: 90%;
    }

    .line {
        width: 70px;
    }

    .pressa-about {
        width: 255px;
    }
}
</style>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>