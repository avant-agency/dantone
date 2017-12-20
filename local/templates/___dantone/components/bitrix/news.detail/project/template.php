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

CUtil::InitJSCore(array('fx'));
?>

<div class="product-photo project-photo">
        <div id="slider" class="main-photo">
            
        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 6800%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
	        
	    <?if($arResult["PROPERTIES"]["PHOTOS"]):?>
	       <?foreach($arResult["PROPERTIES"]["PHOTOS"]["VALUE"] as $photo):?>
	             <li class="flex-active-slide" style="width: 718px; float: left; display: block;"><img src="<?=CFile::GetPath($photo)?>" alt="title" draggable="false"></li>
	       <?endforeach;?>
	    <?endif;?>    
	        
                                
                            </ul></div><ul class="flex-direction-nav"><li><a class="flex-prev flex-disabled" href="#" tabindex="-1" style="display: none;">Previous</a></li><li><a class="flex-next" href="#" style="display: none;">Next</a></li></ul></div>
                            
                            
                            <div id="carousel" class="thumbnails">
            
        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 6800%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);"><?if($arResult["PROPERTIES"]["PHOTOS"]):?>
	       <?foreach($arResult["PROPERTIES"]["PHOTOS"]["VALUE"] as $photo):?>
	             <li class="flex-active-slide" style="width: 70px; float: left; display: block;"><img src="<?=CFile::GetPath($photo)?>" alt="title" draggable="false"></li>
	       <?endforeach;?>
	    <?endif;?>    
                               
                            </ul></div><ul class="flex-direction-nav"><li><a class="flex-prev flex-disabled" href="#" tabindex="-1" style="display: none;">Previous</a></li><li><a class="flex-next" href="#" style="display: none;">Next</a></li></ul></div>

        <script>
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

            var slider = $('#slider');
            slider.flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });

            function ifHideArrows() {
                var imageCount = 4;
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

            $(window).resize(resize);

            resize();

        </script>

    </div>
    
    <div class="container">
        <ul class="breadcrumbs mb20">
            <li><a href="<?=SITE_DIR?>"><?=GetMessage('PROJECSTS_MAIN')?></a></li>
            <li><a href="<?=SITE_DIR?>projects/"><?=GetMessage('PROJECSTS_NAME')?></a></li>
        </ul>

        <article class="about mb90">
            <h1 class="h2"><?=$arResult["NAME"]?></h1>
            <div class="divider-horisontal"></div>
                    </article>
        <?=$arResult['DETAIL_TEXT']?>
        <br> 
        <div class="divider-horisontal"></div>
    </div>