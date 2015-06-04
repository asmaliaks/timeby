<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news-line">
    <h1>Рокомендованные товары</h1>
	<?foreach($arResult["ITEMS"] as $arItem):?>
            <span class="news-date-time">
                <?echo $arItem["ACTIVE_FROM"]?>
                &nbsp;&nbsp;
            </span>
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                <?echo $arItem["NAME"]?>
            </a>
            <br />
            <img src="<?= $arItem['PREVIEW_PICTURE'] ?>" width="100">
	<?endforeach;?>
</div>
