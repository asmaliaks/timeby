function addToCart(itemId, price, oldPrice, name){
    var url = "bitrix/components/demo/itemoftheday/ajax_cart.php";
    $.ajax({
        url: url,
        type: 'post',
        data: {
            itemId: itemId,
            price: price,
            oldPrice: oldPrice,
            name: name
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText + '|\n' + status + '|\n' +error);

        },
        success: function(data) {
            if(data == 'true'){
                alert(name+"  успешно добавлены в корзину.");
            }

        }
    });   
}