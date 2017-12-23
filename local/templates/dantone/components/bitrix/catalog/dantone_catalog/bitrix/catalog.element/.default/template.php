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
           $('#cartInHeaderWrapper').html(response)
           $('.price-btn-container a').attr('href', "<?=SITE_DIR?>personal/cart").attr('onclick', '').text('<?=GetMessage('DETAIL_ORDER')?>')
           location.href = "#cart";

       })
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
            if(!$firstImageId) {
              $firstImageId = $PHOTO;
          }
          ?>
          <?$SRC = CFile::GetPath($PHOTO);?>
          <li><img id="ph_<?= $PHOTO ?>" src="<?= $SRC ?>" alt="<?= $arResult["NAME"] ?>" data-zoom-image="<?= $SRC ?>"/></li>
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

       })


        $('body').on('click touchstart', '.close-elem', function(){

           setTimeout(function(){
             document.body.removeChild(mainDiv);
             mainDiv = null;
         },100)


       })
    }
}
$(window).resize(resize);
resize();
<?php if ($firstImageId) { ?>
    $('#ph_<?= $firstImageId ?>').elevateZoom(elevateZoomParams);
    <?php } ?>

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
      transform:  translateY(-50%);
  }

  .close-elem {
      width: 32px;
      height: 32px; 
      background: url('<?=$templateFolder?>/close-button.svg');
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
            </span>
        </div>
        <?if ($arParams['SHOW_OLD_PRICE'] == 'Y'):?>

        <?if($minPrice['VALUE'] > $minPrice['DISCOUNT_VALUE'] ):?>
        <div class="price-old">
            <span class="value">
                <?=$minPrice['PRINT_VALUE']?>
            </span>
        </div>
        <?endif;?>
        <?endif;?>

        <div class="price-btn-container">

            <?if($arResult["IN_BASKET"] != "Y") {?> 
            <a href="#" onclick="basket('add', <?=$arResult["OFFERS"][0]["ID"]?>); return false;" class="btn btn-blue"><?=GetMessage('DETAIL_ADDTOCART')?></a>           
            <?} else {?>
            <a href="<?=SITE_DIR?>personal/cart/"  class="btn btn-blue"><?=GetMessage('DETAIL_ORDER')?></a>           
            <?}?> 
        </div>
    </div>
    <div class="product-descr">
        <?= $arResult["DETAIL_TEXT"] ?>
    </div>


</div>


</div> 
<div class="product-page clearfix">

 <?if($arResult["PROPERTIES"]["FEATURES"]["VALUE"]):?>
 <div class="product-detail text-left">
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
</div> 