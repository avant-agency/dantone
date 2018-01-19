<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/owl.css">
<script src="<?=SITE_TEMPLATE_PATH?>/js/owljs.js"></script>

<script>
    var plusOneClick = false;

    $(function() {
        if(!$.cookie('showCounter')) {
            $.cookie('showCounter', 1, { expires: 360, path: '/' });
        } else {
            if($.cookie('showCounter') != 3) {
                var newc = $.cookie('showCounter') 
                newc++;
                $.cookie('showCounter', newc , { expires: 360, path: '/' });
            }
        }
    });

    function basket(action, productID) {
        if(productID) {
            var url = "<?=SITE_DIR?>include/basket.php";
            var data = {
                pID: productID,
                action: action
            }
            $.post(url, data, function(response) {
                if(!plusOneClick)
                {
                    $('#cartInHeaderWrapper').html(response);
                    $('.price-btn-container a').attr('href', "<?=SITE_DIR?>personal/cart").attr('onclick', '').text('<?=GetMessage('DETAIL_ORDER')?>');
                    location.href = "#cart";
                }
            });
            BX.onCustomEvent('OnBasketChange');
        }            
    }
</script>
<div class="product-nav clearfix">
    <?if($arResult["TOLEFT"]):?>
        <a class="fleft " href="<?=$arResult["TOLEFT"]["URL"]?>">
            <i class="icon-arr-left-medium"></i> <?=GetMessage('DETAIL_PREVIOUS')?>
        </a>
    <?else:?>    
        <a class="fleft " href="<?=$arResult["LAST_ITEM"]["URL"]?>">
            <i class="icon-arr-left-medium"></i> <?=GetMessage('DETAIL_PREVIOUS')?>
        </a>                    
    <?endif;?>  
    <?if($arResult["TORIGHT"]):?>  
        <a class="fright " href="<?=$arResult["TORIGHT"]["URL"]?>">
            <?=GetMessage('DETAIL_NEXT')?> <i class="icon-arr-right-medium"></i>
        </a>
    <?else:?>
        <a class="fright " href="<?=$arResult["FIRST_ITEM"]["URL"]?>">
            <?=GetMessage('DETAIL_NEXT')?> <i class="icon-arr-right-medium"></i>
        </a>
    <?endif;?> 
</div>

<div class="product-page clearfix">
    <div class="product-photo-container">
        <div class="product-photo">
        <?if($arResult["PROPERTIES"]["DISCOUNT"]["VALUE"] == "Y"):?> 
            <div class="product-label-container">
                <div class="product-label-red">sale</div>
            </div>
        <?endif;?>  
        <?if($arResult["PROPERTIES"]["NEWPRODUCT"]["VALUE"] == "Y"):?>
            <div class="product-label-container">
                <div class="product-label-green">new</div>
            </div>
        <?endif;?> 
        <?if($arResult["PROPERTIES"]["WOW"]["VALUE"] == "Y"):?>
            <div class="product-label-container">
                <div class="product-label-yellow">wow</div>
            </div>
        <?endif;?> 
        <?if($arResult["PROPERTIES"]["INSTOCK"]["VALUE"] == "Y"):?>
            <div class="product-label-container">
                <div class="product-label-blue">in stock</div>
            </div>
        <?endif;?> 
            <div id="slider" class="main-photo">
                <ul class="slides main-slides">
                    <?if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]):?>
                        <?foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $PHOTO):?>
                        <?
                            if(!$firstImageId) 
                                $firstImageId = $PHOTO;
                        ?>
                            <?$SRC = CFile::GetPath($PHOTO);?>
                            <li>
                                <img id="ph_<?= $PHOTO ?>" src="<?= $SRC ?>" alt="<?= $arResult["NAME"] ?>" data-zoom-image="<?= $SRC ?>"/>
                            </li>
                        <?endforeach;?>
                    <?endif;?>
                </ul>
            </div>  
            <div id="carousel" class="thumbnails">
                <ul class="slides thumbnails-slides">
                <?if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]):?>
                    <?foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $PHOTO):?>
                        <?$SRC = CFile::GetPath($PHOTO);?>
                        <li><img  src="<?= $SRC ?>" alt="<?= $arResult["NAME"] ?>"/></li>
                    <?endforeach;?>
                <?endif;?>
                </ul>
            </div>

<script type="text/javascript">
    $(window).load(function() {
        if ($(window).width() > 730) {

            var carousel = $('#carousel');
            carousel.flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 70,
                itemMargin: 10,
                asNavFor: '#slider'
            });

            var elevateZoomParams = {
                zoomWindowHeight: 353,
                zoomWindowWidth: 350,
                borderSize: 1,
                zoomWindowPosition: 3,
                zoomWindowOffetx: 40,
                zoomWindowOffety: -1
            };

            var slider = $('#slider');
            slider.flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel",
                after: function (slider) {
                    $('.zoomContainer').remove();
                    slider.find('li.flex-active-slide img').elevateZoom(elevateZoomParams);
                }
            });
        }

        function ifHideArrows() {
            var imageCount = 7;
            var maxCount = window.innerWidth < 768 ? 6 : 7;

            return imageCount <= maxCount;
        }

        var resize = function() {
            if (ifHideArrows()) {
                carousel.find('a.flex-next').hide();
                carousel.find('a.flex-prev').hide();
            } else {
                carousel.find('a.flex-next').show();
                carousel.find('a.flex-prev').show();
            }
        };

    if ($(window).width() < 730) {
        if ($('.slides').length) {
            var $sync1 = $(".main-slides"),
                $sync2 = $(".thumbnails-slides"),
                flag = false,
                duration = 300;   

            $sync1.addClass('owl-carousel');
            $sync2.addClass('owl-carousel');
            $sync1.owlCarousel({
                items: 1,
                margin: 0,
                nav: false,
                dots: false,
                rewind: true
            })
            .on('changed.owl.carousel', function (e) {
                if (!flag) {
                    flag = true;
                    $sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                    $sync2.find('.owl-item').removeClass('active-item');
                    $sync2.find('.owl-item').eq(e.item.index).addClass('active-item');
                    flag = false;
                }
            });

            $sync2.owlCarousel({
                items: 3,
                nav: false,
                center: false,
                dots: false,
                rewind: true
            })
            .on('click', '.owl-item', function () {
                $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
            })
            .on('changed.owl.carousel', function (e) {
                if (!flag) {
                    flag = true;
                    $sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                    $sync2.find('.owl-item').removeClass('active-item');
                    $sync2.find('.owl-item').eq(e.item.index).addClass('active-item');
                    flag = false;
                }
            });
            $sync2.find('.owl-item').eq(0).addClass('active-item');
            var mainDiv;
            $('.main-slides .owl-item').click(function(){
                mainDiv = document.createElement('div');
                mainDiv.className = 'main-wrapper';
                var visibleWrap = document.createElement('div');
                visibleWrap.className = 'visible-wrap';
                var innerImg = document.createElement('img');
                innerImg.className = 'inner-img';
                var src = this.querySelector('img').getAttribute('data-zoom-image');                                                
                innerImg.src = src;
                var close = document.createElement('div');
                close.className = 'close-elem';
                mainDiv.appendChild(visibleWrap);
                mainDiv.appendChild(close);
                visibleWrap.appendChild(innerImg);
                document.body.appendChild(mainDiv);
            });

            $('body').on('click touchstart', '.close-elem', function(){
                setTimeout(function(){
                    document.body.removeChild(mainDiv);
                    mainDiv = null;
                },100);
            });
        }
    }

    $(window).resize(resize);
    resize();

<?if ($firstImageId) { ?>
    $('#ph_<?= $firstImageId ?>').elevateZoom(elevateZoomParams);
<? } ?>
});
</script>
</div>
<style>
    .main-wrapper {
        width: 100vw;
        height: 100vh;
        position: fixed;
        overflow: scroll;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        z-index: 10000;
    }

    .inner-img {
        max-width: 3000px !important;
    }

    .visible-wrap {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .close-elem {
        width: 32px;
        height: 32px;
        background: url('https://dantonehome.ru/bitrix/templates/dantone_copy/componentshttps://dantonehome.ru/bitrix/catalog/dantone_cataloghttps://dantonehome.ru/bitrix/catalog.element/.default/close-button.svg');
        background-size: cover;
        top: 20px;
        left: 40px;
        position: fixed;
        z-index: 100000;
    }

    @media screen and (max-width: 730px) {
        .product-page .product-photo .thumbnails {
            max-width: 100%;
            box-sizing: border-box;
        }
    }
</style>
</div>

    <div class="product-detail text-left">
        <h1><?= $arResult["NAME"] ?></h1>
        <div class="price-container text-left">
            <div class="price">
                <? $minPrice = (isset($arResult['RATIO_PRICE']) ? $arResult['RATIO_PRICE'] : $arResult['MIN_PRICE']);
                $boolDiscountShow = (0 < $minPrice['DISCOUNT_DIFF']);?>
                <span class="value">
                    <?if($arResult["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y"):?>
                    <?=GetMessage('DETAIL_FROM')?>   
                    <?endif;?><?=$minPrice['PRINT_DISCOUNT_VALUE']?>
<?if ('Y' == $arParams['SHOW_OLD_PRICE'] && $minPrice['DISCOUNT_VALUE'] < $minPrice['VALUE'])
                        {
                            ?>
                            <span class="price-old"> 
                                <span class='value'><?=$minPrice['PRINT_VALUE']?></span>
                            </span> 
                            <?
                        }?>
                </span>
                <?/*global $USER; if($USER->IsAdmin()):?>
                <span class="count-wrap">В наличии:
                    <span class="count-quantity"><?=$arResult["CATALOG_QUANTITY"]?></span>
                </span>
                <?endif;*/?>
            </div>

            <div class="price-block-container">
                <?if($arResult["IN_BASKET"] != "Y"):?> 
				<a href="#" onclick="if($(this).data('go-to-cart') == 'go') { document.location.href = '/personal/cart/'; return false;} basket('add', <?=$arResult["OFFERS"][0]["ID"]?>); $(this).css('padding-top','3px'); return false;" data-count_in_cart="<?=($arResult['COUNT_IN_CART'] > 0) ? $arResult['COUNT_IN_CART'] : 0;?>" class="btn btn-blue basket-btn" id="addToBasket"><?=GetMessage('DETAIL_ADDTOCART')?></a>
                <?else:?>
				<a style="padding-top: <?if($arResult["CART_TEXT"] == ""):?>12px;<?else:?>3px;<?endif;?>" href="<?=SITE_DIR?>personal/cart/" data-count_in_cart="<?=($arResult['COUNT_IN_CART'] > 0) ? $arResult['COUNT_IN_CART'] : 0;?>" class="btn btn-blue basket-btn" id="addToBasket"><?=$arResult["CART_TEXT"]?></a>
                <?endif?> 
                
                <a class="favorite-icon tooltips <?if($arResult["IN_FAVORITES"]):?>favorite-icon-active del-favorite<?else:?>add-favorite<?endif;?>" href="#" data-elid="<?=$arResult['ID']?>" style="max-height:39px;">
                    <?/*<span class="tooltips-text">Удалить из избранного</span>*/?>
                </a>
                <a href="#" class="grey-square plus" data-elid="<?=$arResult["OFFERS"][0]["ID"]?>" style="<?if($arResult['CART_TEXT'] != ''):?>display: flex;<?endif;?>margin-left:10px;">+1</a>

                <?/*<a href="#" class="grey-square">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 471.701 471.701;" xml:space="preserve" width="512px" height="512px">
                        <g>
                            <path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1   c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3   l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4   C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3   s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4   c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3   C444.801,187.101,434.001,213.101,414.401,232.701z" fill="#666666"/>
                        </g>
                    </svg>
                </a>*/?>
            </div>
            <?/*if($arResult["CATALOG_QUANTITY"] == 0):?>
                <div class="no-quantity quantity-flag" style="display:none;"> В наличии больше нет</div>
            <?endif;*/?>

        </div>
    </div>
</div> 

<div class="kharacterictic-good-descr">
    <div class="tab-kharacterictic tab active">Характеристики</div>
    <div class="tab-good-descr tab">Описание</div>
</div>
<div class="product-page clearfix bottom-descriptionGoodCart">
    <?if($arResult["PROPERTIES"]["FEATURES"]["VALUE"]):?>
    <div class="product-descr kharacterictic active">
        <h4><?=GetMessage('DETAIL_PROPS')?></h4>
        <div class="param-table">
            <? foreach ($arResult["PROPERTIES"]["FEATURES"]["VALUE"] as $id => $feature) { ?>
            <div class="item">
                <div class="param"><?= $arResult["PROPERTIES"]["FEATURES"]["DESCRIPTION"][$id] ?></div>
                <div class="value"><?= $feature ?></div>
            </div>
            <? } ?>
            <?php if ($arResult["PROPERTIES"]["ARTIKUL"]["VALUE"]) { ?>
            <div class="item">
                <div class="param"><?=GetMessage('DETAIL_ARTNUMBER')?></div>
                <div class="value"><?= $arResult["PROPERTIES"]["ARTIKUL"]["VALUE"] ?></div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?endif;?>

    <div class="product-descr good-descr" style="padding-bottom:20px;">
        <h4>Описание</h4>
        <?= $arResult["DETAIL_TEXT"] ?>
        <a href="https://dantonehome.ru/delivery/" target="_blank" class="delivery-link">Условия доставки товаров</a>
    </div>
</div>
<?// функционал избранного?>
<script>
$(function(){
    $("body").on("click", ".add-favorite", function(){
        var btn = $(this);
        $.ajax({
            method: "POST",
            url: "/ajax/favorites.php",
            data: { elid: $(this).data('elid'), action: "fav-add" }
        })
        .done(function( msg ) {
            $(".header-dark-line-favorite span.count").each(function(i,e){
                var count = $(e).text();
                if(count == 0) {
                    $(e).css("display", "block");
                }
                count++;
                $(e).text(count);
            });
            $(btn).addClass("favorite-icon-active");
            $(btn).addClass("del-favorite");
            $(btn).removeClass("add-favorite");
            var res = JSON.parse(msg);
            if(!res.res) alert(res.data)
        });

        return false;
    });
    $("body").on("click", ".del-favorite", function(){
        var btn = $(this);
        $.ajax({
            method: "POST",
            url: "/ajax/favorites.php",
            data: { elid: $(this).data('elid'), action: "fav-del" }
        })
        .done(function( msg ) {
            $(".header-dark-line-favorite span.count").each(function(i,e){
                var count = $(e).text();
                if(count == 0) {
                    $(e).css("display", "block");
                }
                count--;
                $(e).text(count);
                if(count == 0) {
                    $(e).css("display", "none");
                }
            });
            $(btn).removeClass("favorite-icon-active");
            $(btn).removeClass("del-favorite");
            $(btn).addClass("add-favorite");
            var res = JSON.parse(msg);
            if(!res.res) alert(res.data)
        });

        return false;
    });
});
$(function () {

    var total_product_quantity = 50;/*"<?=$arResult['CATALOG_QUANTITY']?>";*/
    $('.btn.basket-btn').click(function (e) {
        $('.grey-square.plus').addClass('active');
        var count = $(this).data('count_in_cart');
        if(total_product_quantity <= count) {
            $(".no-quantity.quantity-flag").show(200);
        }
        else {
            count++;
            $(this).data('count_in_cart', count);
        }
        $(this).html('В корзине ' + count + ' шт.' + '<br>'+ 'перейти')
        $(this).data("go-to-cart", "go");

		dataLayer.push({
			'event': 'addToCart',
			'google_tag_params': {
				'ecomm_prodid': ["<? echo $arResult['ID']; ?>"],
				'ecomm_pagetype': 'cart',
				'ecomm_totalvalue': '<?=$arResult["MIN_PRICE"]["VALUE"]?>'
			}
		});

    });
    $('.kharacterictic-good-descr .tab').click(function () {
        $('.kharacterictic-good-descr .tab').removeClass('active');
        $(this).addClass('active');
    });
    $('.tab-kharacterictic.tab').click(function () {
        $('.product-descr').removeClass('active');
        $('.product-descr.kharacterictic').addClass('active');
    });
    $('.tab-good-descr.tab').click(function () {
        $('.product-descr').removeClass('active');
        $('.product-descr.good-descr').addClass('active');
    });

    $(".grey-square.plus").on("click", function(){
        var count = $('.btn.basket-btn').data('count_in_cart');
        if(total_product_quantity < count) return false;
        if(total_product_quantity <= count+1) {
            $(".no-quantity.quantity-flag").show(200);
            $(this).hide(500);
            count++;
        }
        else {
            count++;
        }
        $('.btn.basket-btn').data('count_in_cart', count);
        $('.btn.basket-btn').html('В корзине ' + count + ' шт.' + '<br>'+ 'перейти')

        plusOneClick = true;

        basket('add', $(this).data("elid"));
        return false;
    });
});
</script>

<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">
var deviceType = /iPad/.test(navigator.userAgent)?"t":/webOS|Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Silk/.test(navigator.userAgent)?"m":"d";
window.criteo_q = window.criteo_q || [];
window.criteo_q.push(
    { event: "setAccount", account: 45351 },
    { event: "setEmail", email: "<?=$USER->GetEmail();?>" },
    { event: "setSiteType", type: deviceType },
    { event: "viewItem", ecpplugin: "1cbitrix", item: "<? echo $arResult['ID']; ?>" }
);

dataLayer.push({
    'event': 'productDetail',
    'google_tag_params': {
        'ecomm_prodid': "<? echo $arResult['ID']; ?>",
        'ecomm_pagetype': 'product',
        'ecomm_totalvalue': '<?=$arResult["MIN_PRICE"]["VALUE"]?>'
    }
});

</script>