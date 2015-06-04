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

<div class="b-main-news-list body">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="b-main-news-list-item">
        <div class="date">
                <?= $arItem["ACTIVE_FROM"] ?>
        </div>
        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="preview" style="background-image: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>);"></a>
        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="title"><?= $arItem["NAME"] ?></a>
        <div class="descr">
                <?= $arItem["PREVIEW_TEXT"] ?>
        </div>
        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="more">Подробнее</a>
    </div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
