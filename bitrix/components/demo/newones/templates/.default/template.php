<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1>Новинки</h1>
<div class="news-line">
	<?foreach($arResult["ITEMS"] as $arItem):?>
    <img src="<?= $arItem['PICTURE'] ?>" width="100">
            <span class="news-date-time">
                <?echo $arItem["ACTIVE_FROM"]?>
                &nbsp;&nbsp;
            </span>
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                <?echo $arItem["NAME"]?>
            </a>
            <br />
	<?endforeach;?>
</div>
