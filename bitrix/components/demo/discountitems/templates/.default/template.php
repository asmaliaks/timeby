<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="news-line">

	<?foreach($arResult["ITEMS"] as $arItem):?>
    
    <img width="100" src="<?= $arItem['DETAIL_PICTURE_SRC'] ?>">
    

        <div class="current_price" id="current_price_21">
            <h3>
                <?= $arItem['CURRENT_PRICE']." ".$arItem["CATALOG_GROUP_NAME_1"] ?>  
            </h3>
        </div>
        <div class="old_price" id="old_price_21" style="text-decoration: line-through">
            <?= $arItem['CATALOG_PRICE_1']." ".$arItem["CATALOG_GROUP_NAME_1"] ?>
        </div>

    <a onclick="addToBasket('1', '<?= $arItem["ID"] ?>', '<?= $arItem["NAME"] ?>', '<?= $arItem["CURRENT_PRICE"] ?>', '<?= $arItem["CATALOG_PRICE_ID_1"] ?>', '<?= $arItem["DETAIL_PAGE_URL"] ?>', '<?= $arItem["PRICE"] ?>', '<?= $arItem["DISCOUNT"]["VALUE"] ?>')" class="bx_big bx_bt_button bx_cart" style="cursor: pointer" id="<? echo $arItem['ADD_BASKET_LINK']; ?>">
        <span></span>
        В корзину<? //echo $addToBasketBtnMessage; ?>
    </a></br>
    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
        
        <h1><?= $arItem["NAME"] ?></h1>
    </a>
    
    
   
    
 
    
	<?endforeach;?>
</div>
<script>
function addToBasket(amount, itemId, name, price, priceId, page, discountValue){

    $.ajax({
    type: "POST",
    url:  "/bitrix/components/demo/discountitems/templates/.default/ajax.php",
    data: {
        amount: amount,
        itemId: itemId,
        name: name,
        price: price,
        priceId: priceId,
        page: page,
        discountValue: discountValue
    },
    success: function(msg){
    alert("Товар добавлен в корзину");
  }
});
}
</script>