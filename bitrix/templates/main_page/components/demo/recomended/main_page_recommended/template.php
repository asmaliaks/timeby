<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-block b-recommended">
    <div class="b-block-title">
            <h2>Рекомендуемые</h2>
    </div>

    <div class="body">
            <div class="carousel">

            <div class="ms-viewport" style="overflow: hidden; position: relative;">
                <div class="slides" style="width: 1000%; -webkit-transition: 1s; transition: 1s; -webkit-transform: translate3d(-1080px, 0px, 0px); transform: translate3d(-1080px, 0px, 0px);">
                    <?foreach($arResult["ITEMS"] as $item):?>
                    <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="slide clone" aria-hidden="true" style="width: 360px; float: left; display: block;">
                            <div class="name">
                                    <?= $item['PROPERTY_RECOMENDED_ITEM_NAME'] ?>
                            </div>
                            <div class="model">
                                    <?= $item['PROPERTY_MODEL_VALUE'] ?>
                            </div>
                            <div class="article">
                                    <?= $item['PROPERTY_ARTICLE_VALUE'] ?>
                            </div>
                            <div class="image">
                                    <img src="<?= $item["PREVIEW_PICTURE"]?>" alt="" draggable="false">
                            </div>
                            <div class="price">
                                    <?= $item['CATALOG_PRICE_1'].' '.$item['CATALOG_GROUP_NAME_1'] ?>
                            </div>
                    </a>
                    <?endforeach;?>
                </div>
            </div>
                <ul class="ms-direction-nav">
                    <li class="ms-nav-prev">
                        <a class="ms-prev" href="#"></a>
                    </li>
                    <li class="ms-nav-next">
                        <a class="ms-next" href="#"></a>
                    </li>
                </ul>
            </div>
            <!-- / .carousel -->

            <div class="products-list">
                <?foreach($arResult["ITEMS"] as $item):?>
                    <div class="products-list-item">
                            <div class="name">
                                <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                    <?= $item['PROPERTY_RECOMENDED_ITEM_NAME'] ?>
                                </a>
                            </div>
                            <div class="model">
                                    <?= $item['PROPERTY_MODEL_VALUE'] ?>
                            </div>
                            <div class="article">
                                    <?= $item['PROPERTY_ARTICLE_VALUE'] ?>
                            </div>
                            <div class="image">
                                    <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                            <img src="<?= $item["PREVIEW_PICTURE"]?>" alt="<?= $item['PROPERTY_RECOMENDED_ITEM_NAME'] ?>">
                                    </a>
                            </div>
                            <div class="price">
                                    <?= $item['CATALOG_PRICE_1'].' '.$item['CATALOG_GROUP_NAME_1'] ?>
                            </div>
                    </div>
                <?endforeach;?>
            </div>
            <!-- / .products-list -->
    </div>
			<!-- / .body -->
</div>