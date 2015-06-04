<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news-line">

	<?foreach($arResult["ITEMS"] as $arItem):?>
    <img width="100" src="<?= $arItem['PREVIEW_PICTURE_SRC'] ?>">
    <h3><?= $arItem['CATALOG_PRICE_1']." ".$arItem["CATALOG_GROUP_NAME_1"] ?></h3>
    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
        <h1><?= $arItem["NAME"] ?></h1>
    </a></br>
    
	<?endforeach;?>
</div>
