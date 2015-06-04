<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-block b-video-review">
        <div class="b-block-title">
                <h2>Видеообзор</h2>
        </div>

        <div class="body videos">
                <div class="video large">
                        <?= $arResult['VIDEO_CODE'] ?>
                    <div class="play"></div>
                </div>
                <?php foreach($arResult['ADDITIONAL_VIDEOS'] as $video){?>
                    <div class="video">
                            <div class="preview" style="background-image: url('<?= $video["PREVIEW_PICTURE"]["SRC"] ?>');">
                                <a href="/video-review/view.php?M_ID=<?= $video["PROPERTY_SECTION_VIDEO_VALUE"] ?>&VID_ID=<?= $video["ID"] ?>" style="cursor: pointer">    
                                    <div class="play"></div>
                                </a>    
                            </div>
                            <div class="title">
                                    <?= $video['NAME'] ?>
                            </div>
                    </div>
                <?php } ?>


        </div>

        <div class="view-all-video">
                <a href="/video-review/">Всё видео в галерее</a>
        </div>
</div>