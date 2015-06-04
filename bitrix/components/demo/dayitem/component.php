<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 300;

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
if(strlen($arParams["IBLOCK_TYPE"])<=0)
 	$arParams["IBLOCK_TYPE"] = "news";
if($arParams["IBLOCK_TYPE"]=="-")
	$arParams["IBLOCK_TYPE"] = "";
if(!is_array($arParams["IBLOCKS"]))
	$arParams["IBLOCKS"] = array($arParams["IBLOCKS"]);
foreach($arParams["IBLOCKS"] as $k=>$v)
	if(!$v)
		unset($arParams["IBLOCKS"][$k]);

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


if($this->StartResultCache(false, $USER->GetGroups()))
{
	if(!CModule::IncludeModule("iblock"))
	{
		$this->AbortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"ACTIVE_FROM",
		"NAME",
//                "PROPERTY_ITEM_OF_THE_DAY",
                "PROPERTY_ITEM_OF_THE_DAY.ID",
                "PROPERTY_ITEM_OF_THE_DAY.IBLOCK_ID",
                "PROPERTY_ITEM_OF_THE_DAY.SECTION_ID",
                "PROPERTY_ITEM_OF_THE_DAY.NAME",
//                "CATALOG_GROUP_BYR",
                "PROPERTY_ITEM_OF_THE_DAY.PREVIEW_PICTURE",
                "PROPERTY_ITEM_OF_THE_DAY.DETAIL_PICTURE",
                "PROPERTY_ITEM_OF_THE_DAY.*",
                "SECTION_ID"
	);
	$arFilter = array (
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"=> $arParams["IBLOCKS"],
		"ACTIVE" => "Y",
		"ACTIVE_DATE" => "Y",
		"CHECK_PERMISSIONS" => "Y",
	);
	$arOrder = array(
		$arParams["SORT_BY1"]=>$arParams["SORT_ORDER1"],
		$arParams["SORT_BY2"]=>$arParams["SORT_ORDER2"],
		"ID" => "DESC",
	);
	$arResult=array(
		"ITEMS"=>array(),
	);
	$rsItems = CIBlockElement::GetList($arOrder, $arFilter, false, array("nTopCount"=>$arParams["NEWS_COUNT"]), $arSelect);
	$n = 0;
        while($arItem = $rsItems->GetNext())
	{
            // getting options of item
            $itemOrder = array("active_to"=>"DESC");
            $itemFilter = array(
                "ID"=>$arItem["PROPERTY_ITEM_OF_THE_DAY_ID"],
                "IBLOCK_ID"=>$arItem["PROPERTY_ITEM_OF_THE_DAY_IBLOCK_ID"],
                );
            $itemSelect = array(
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
            $itemsOb = CIBlockElement::GetList($itemOrder, $itemFilter, false, false, $itemSelect);
            if($obElement = $itemsOb->GetNextElement()){
                $itemResult[$n] = $obElement->GetFields();
                $itemResult[$n]["DETAIL_PAGE_URL"] = '/e-store'.$itemResult[$n]['DETAIL_PAGE_URL']."/";
                $itemResult[$n]["PREVIEW_PICTURE_SRC"] = CFile::GetPath($itemResult[$n]["PREVIEW_PICTURE"]);
            }

		$arResult["ITEMS"][]=$itemResult[$n];
                $n++;
	}
	$this->IncludeComponentTemplate();
}
?>
