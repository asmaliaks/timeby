<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1>Видео-обзор</h1>
<div class="news-line">

           <?= $arResult['VIDEO_CODE'] ?>
   <?php foreach($arResult['ADDITIONAL_VIDEOS'] as $video){?>
    <a href="/video-review/view.php?M_ID=<?= $video["PROPERTY_SECTION_VIDEO_VALUE"] ?>&VID_ID=<?= $video["ID"] ?>" style="cursor: pointer">
        <img src="<?= $video["PREVIEW_PICTURE"]["SRC"] ?>" width="100">
    </a>
   <?php } ?>

</div>
