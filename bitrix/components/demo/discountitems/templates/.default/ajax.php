<?php 
include $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (CModule::IncludeModule("sale") ) { 
    $per = LANG;
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
        "DISCOUNT_PRICE" => $_POST['discountValue'],
       // "DISCOUNT_VALUE" => $_POST['discountValue'],
        "NAME" => $_POST['name'],
    //    "CALLBACK_FUNC" => "MyBasketCallback",
        "MODULE" => "sale",
        "NOTES" => "",
//        "ORDER_CALLBACK_FUNC" => "MyBasketOrderCallback",
        "DETAIL_PAGE_URL" => $_POST['page'],
  );

  $arProps = array();

  $arFields["PROPS"] = $arProps;

  $res = CSaleBasket::Add($arFields);
  return $res;
}