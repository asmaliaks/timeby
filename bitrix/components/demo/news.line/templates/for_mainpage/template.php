<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="b-news">
    <div class="b-news-list">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <div class="b-news-list-item">
                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="preview" style="background-image: url('<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>');"></a>
                <div class="date">
                        <?echo $arItem["ACTIVE_FROM"]?>
                </div>
                <div class="title">
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
                </div>
                <div class="anounce">
                        <?= $arItem["PREVIEW_TEXT"] ?>
                </div>
                <div class="more">
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"] ?>">Подробнее</a>
                </div>
        </div>
        <?endforeach;?>
    </div>
        <!-- / .b-news-list -->

        <div class="read-all-news">
                <a href="/news/">Читать все новости</a>
        </div>
</div>
<!-- / .b-news -->