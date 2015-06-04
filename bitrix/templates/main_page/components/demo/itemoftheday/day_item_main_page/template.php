<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-block b-product-day">
    <div class="b-block-title">
            <h2>Продукт дня</h2>
    </div>

    <div class="body">
        <?foreach($arResult["ITEMS"] as $item):?>
        <div class="product">
            <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="image">
                    <img src="<?= $item["PREVIEW_PICTURE_SRC"]?>" alt="<?= $item['PROPERTY_ITEM_OF_THE_DAY_NAME'] ?>">
            </a>
            <div class="info">
                <div class="name">
                        <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <?= $item["PROPERTY_BRAND_VALUE"] ?>
                        </a>
                </div>
                <div class="model">
                    <?= $item['PROPERTY_MODEL_VALUE'] ?>
                </div>
                <div class="article">
                    <?= $item['PROPERTY_ARTICLE_VALUE'] ?>
                </div>
                <div class="descr">
                    <?= $item['PREVIW_TEXT  '] ?>
                </div>

                <div class="bottom">
                        <div class="price">
                            <?= $item['CATALOG_PRICE_1'].' '.$item['CATALOG_GROUP_NAME_1'] ?>
                        </div>
                        <div class="cart">
                                в корзину
                                <div class="icon">
                                </div>
                        </div>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
    <!-- / .body -->
</div>