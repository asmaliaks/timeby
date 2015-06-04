<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php foreach($arResult as $item){?>
    <?php if($item['PROMOTION_VIEW']['VALUE'] == 7){?>
        <a href="<?= $item['DETAIL_URL'].$item['ID'] ?>">
                <?=  $item['NAME'] ?>
        </a>
    <?php }else if($item['PROMOTION_VIEW']['VALUE'] == 8){ ?>
        <a href="<?= $item['CATALOG_LINK']['VALUE'] ?>">
                <?=  $item['NAME'] ?>
        </a>
    <?php } ?>
<?php } ?>

