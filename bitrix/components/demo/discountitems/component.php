<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 300;


$arParams["SORT_BY1"] = trim($arParams["SORT_BY1"]);
if(strlen($arParams["SORT_BY1"])<=0)
	$arParams["SORT_BY1"] = "ACTIVE_FROM";
if($arParams["SORT_ORDER1"]!="ASC")
	 $arParams["SORT_ORDER1"]="DESC";


$arParams["NEWS_COUNT"] = intval($arParams["NEWS_COUNT"]);
if($arParams["NEWS_COUNT"]<=0)
	$arParams["NEWS_COUNT"] = 20;

//$arParams["DETAIL_URL"]=trim($arParams["DETAIL_URL"]);
//if(strlen($arParams["DETAIL_URL"])<=0)
//	$arParams["DETAIL_URL"] = "e-store/watches/#SECTION_ID#/#ELEMENT_ID#/";



	if(!CModule::IncludeModule("iblock"))
	{
		$this->AbortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}
	$arSelect = array(
            "ID",
            "IBLOCK_ID",
            "IBLOCK_TYPE",
            "CODE",
            "XML_ID",
            "NAME",
            "ACTIVE",
            "DATE_ACTIVE_FROM",
            "DATE_ACTIVE_TO",
            "SORT",
            "PREVIEW_TEXT",
            "PREVIEW_TEXT_TYPE",
            "DETAIL_TEXT",
            "DETAIL_TEXT_TYPE",
            "DATE_CREATE",
            "CREATED_BY",
            "TIMESTAMP_X",
            "MODIFIED_BY",
            "TAGS",
            "IBLOCK_SECTION_ID",
            "DETAIL_PAGE_URL",
            "LIST_PAGE_URL",
            "DETAIL_PICTURE",
            "PREVIEW_PICTURE",
            "CATALOG_QUANTITY",
            "CATALOG_GROUP_1",
	);
	$arFilter = array (
		"IBLOCK_TYPE" => array("clocks", "watches"),
		"IBLOCK_ID"=> array("21", "27"),

                "!=PROPERTY_DISCOUNT" => false,
		"ACTIVE" => "Y",
		"ACTIVE_DATE" => "Y",
		"CHECK_PERMISSIONS" => "Y",
	);
	$arOrder = array(
//		$arParams["SORT_BY1"]=>$arParams["SORT_ORDER1"],
//		$arParams["SORT_BY2"]=>$arParams["SORT_ORDER2"],
		"ID" => "DESC",
	);
	$arResult=array(
		"ITEMS"=>array(),
	);
	$rsItems = CIBlockElement::GetList($arOrder, $arFilter, false, array("nTopCount"=>$arParams["NEWS_COUNT"]), $arSelect);
	$n = 0;
        while($arItem = $rsItems->GetNextElement())
	{
            $arItem = $arItem->GetFields();
            $strMainID = $this->GetEditAreaId($arItem['ID']); 
            $siteId = SITE_ID;
            // get item's discount
            $arDiscounts = CCatalogDiscount::GetDiscountByProduct($arItem['ID'], $USER->GetUserGroupArray(),"N",2,SITE_ID);
            
            $arResult["ITEMS"][$n] = $arItem;
            $arResult["ITEMS"][$n]["DISCOUNT"] = $arDiscounts[0];
            $arResult["ITEMS"][$n]["STR_MAIN_ID"] = $strMainID;
            $arResult["ITEMS"][$n]["PRICE"] = $arItem["CATALOG_PRICE_1"]*$arDiscounts[0]["VALUE"]/100;
            $arResult["ITEMS"][$n]["OLD_PRICE"] = $arItem["CATALOG_PRICE_1"];
            $arResult["ITEMS"][$n]["CURRENT_PRICE"] = $arItem["CATALOG_PRICE_1"] - $arResult["ITEMS"][$n]["PRICE"];
            $arResult["ITEMS"][$n]["STR_OB_NAME"] = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
            $arResult["ITEMS"][$n]["ADD_BASKET_LINK"] = $strMainID.'_add_basket_link';
            $arResult["ITEMS"][$n]["DETAIL_PAGE_URL"] = '/e-store'.$arItem['DETAIL_PAGE_URL']."/";
            $arResult["ITEMS"][$n]["PREVIEW_PICTURE_SRC"] = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
            $arResult["ITEMS"][$n]["DETAIL_PICTURE_SRC"] = CFile::GetPath($arItem["DETAIL_PICTURE"]);
            $n++;
	}
	$this->IncludeComponentTemplate();

?>
