<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news-line">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<img border="0" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"  alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"  title="<?=$arItem["NAME"]?>" width="100"/>
	<?endforeach;?>
</div>
