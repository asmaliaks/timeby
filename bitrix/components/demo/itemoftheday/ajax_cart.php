<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(isset($_POST)){
    // discount %
    $per = $_POST['price']*100;
    $discountPer = $per/$_POST['oldPrice'];
    $discPrice = $_POST['oldPrice'] - $_POST['price'];
    $arFields = array(
        "PRODUCT_ID" => $_POST['itemId'],
        "PRODUCT_PRICE_ID" => 0,
        "PRICE" => $_POST['price'],
        "CURRENCY" => "BYR",
        "WEIGHT" => 0,
        "QUANTITY" => 1,
        "LID" => LANG,
        "DELAY" => "N",
        "CAN_BUY" => "Y",
        "NAME" => $_POST['name'],
        "NOTES" => "",
        "DISCOUNT_PRICE" => $discPrice,
        "DISCOUNT_NAME " => "just",
        "DISCOUNT_VALUE" => $discountPer,
    );
    CModule::IncludeModule("sale");
    $result = CSaleBasket::Add($arFields);
    if($result){
        print_r('true');exit;
    }
    

}

