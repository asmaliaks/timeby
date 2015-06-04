<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news-line">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<img border="0" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arItem["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arItem["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"  title="<?=$arItem["NAME"]?>" />
	<?endforeach;?>
</div>
