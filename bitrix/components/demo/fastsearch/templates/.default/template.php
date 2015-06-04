<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<script>
var kind = 0;
var filterWatches = new Array();
var filterClocks = new Array();
var currentFilter;
var defaultJsonStr = '<?= $arResult["DEFAULT_STRING"] ?>';console.log(defaultJsonStr);
</script>
<?php 
foreach($arResult["WATCHES"] as $watches){?>
   <script>

       var jsonStr = new Array();
       <?php foreach($watches["VALUE"] as $val){ ?>
           jsonStr.push({
               xmlId: '<?= $val["XML_ID"] ?>',
               name: '<?= $val["PROPERTY_NAME"] ?>',
               value: '<?= $val["VALUE"] ?>',
               externalId: '<?= $val["EXTERNAL_ID"] ?>',
               def: '<?= $val["DEF"] ?>',
               id: '<?= $val["ID"] ?>',
               propertyCode: '<?= $val["PROPERTY_CODE"] ?>'
           });
          
       <?php } ?>    
        filterWatches.push({
            def: '',
            value: jsonStr,
            name: '<?= $watches["NAME"] ?>',
            id: '<?= $watches["CODE"] ?>'
        });
    
    </script>  
<?php } ?>
<?php 
foreach($arResult["CLOCKS"] as $clocks){?>
   <script>
       var jsonStrr = new Array();
       <?php foreach($clocks["VALUE"] as $val){ ?>
           jsonStrr.push({
               xmlId: '<?= $val["XML_ID"] ?>',
               name: '<?= $val["PROPERTY_NAME"] ?>',
               value: '<?= $val["VALUE"] ?>',
               externalId: '<?= $val["EXTERNAL_ID"] ?>',
               def: '<?= $val["DEF"] ?>',
               id: '<?= $val["ID"] ?>',
               propertyCode: '<?= $val["PROPERTY_CODE"] ?>'
           });
          
       <?php } ?>    
        filterClocks.push({
            def: '',
            value: jsonStrr,
            name: '<?= $clocks["NAME"] ?>',
            id: '<?= $clocks["CODE"] ?>'
        });

    </script>  
<?php } ?>
    <script>

    
    </script>
<div class="b-quick-selection">
            <div class="b-quick-selection-title">
                    <h2>Быстрый подбор</h2>
            </div>

            <div class="body">
                    <div class="search" id="serchDiv">
                            <div class="search-options">
                                    <div class="option" id="watchesKind">
                                        <select id="watchesSelect"  onchange="changeFilter()" style="display: none;">
                                                <option value="0" selected>Часы</option>
                                                <option value="21">Наручные</option>
                                                <option value="27">Интерьерные</option>
                                        </select>
                                    </div> 
                                    
                                    <div class="option clear">
                                            Очистить
                                    </div>
                            </div>

                            <a id="seeAll" href="/e-store/watches/157/" class="view-all">Посмотреть все</a>

                            <div class="search-results">
                                    найдено 
                                    <span id="items_amount">
                                        <?= $arResult['COUNT'] ?>
                                    </span> шт.
                            </div>
                    </div>
                    <!-- / .search -->

                    <div class="products-list">
                        <?php $n= 0;foreach($arResult["ITEMS"] as $item){ ?>
                        <?php if($n < 5){?>
                            <div class="products-list-item">
                                    <div class="name">
                                        <a href="<?= $item["DETAIL_PAGE_URL"] ?>">
                                                    <?= $item["PROPERTY_BRAND_NAME"] ?>
                                            </a>
                                    </div>
                                    <div class="model">
                                            <?= $item["NAME"] ?>
                                    </div>
                                    <div class="article">
                                            <?= $item["PROPERTY_ARTICLE_VALUE"] ?>
                                    </div>
                                    <div class="image">
                                            <a href="<?= $item["DETAIL_PAGE_URL"] ?>">
                                                <img src="<?= $item["PICTURE"] ?>" alt="<?= $item["NAME"] ?>">
                                            </a>
                                    </div>
                                    <div class="price">
                                            <?= $item["CATALOG_PRICE_1"].' '.$catalog["CATALOG_GROUP_NAME"] ?>
                                    </div>
                            </div>
                        <?php } ?>
                        <?php $n++;}?>

                    </div>
                    <!-- / .products-list -->
            </div>
            <!-- / .body -->
    </div>
<script src="/bitrix/components/demo/fastsearch/script.js"></script>