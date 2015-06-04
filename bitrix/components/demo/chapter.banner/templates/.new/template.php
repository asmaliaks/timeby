<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!--<div class="news-line">
	
		<img border="0" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"  alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"  title="<?=$arItem["NAME"]?>" width="100"/>
	
</div>-->
<div class="slideshow">
        <div class="slides">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <div class="slide">
                        <a href="#">
                                <img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="" >
                        </a>
                </div>
            <?endforeach;?>
        </div>
</div>