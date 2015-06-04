<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	<div class="slideshow home-slideshow">
            <div class="slides" style="height: 400px" >
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <div class="slide" style="background-image:  url(<?=$arItem["DETAIL_PICTURE"]["SRC"]?>); height: 430px">
                        <a href="<?= $arItem['PROPERTY_MAIN_PAGE_BANNER_LINK_VALUE'] ?>"></a>
                    </div>
                <?endforeach;?>
            </div>
	</div>