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
                "PROPERTY_RECOMENDED_ITEM",
                "PROPERTY_RECOMENDED_ITEM.PREVIEW_PICTURE",
                "PROPERTY_RECOMENDED_ITEM.XML_ID",
                "PROPERTY_RECOMENDED_ITEM.CODE",
                "PROPERTY_RECOMENDED_ITEM.IBLOCK_ID",
                "PROPERTY_RECOMENDED_ITEM.ID",
                "PROPERTY_RECOMENDED_ITEM.NAME",
                "PROPERTY_RECOMENDED_ITEM.IBLOCK_SECTION_ID",
                "SECTION_ID",
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
	while($arItem = $rsItems->GetNext())
	{
            
            $arItem["PREVIEW_PICTURE_SRC"] = CFile::GetPath($arItem["PROPERTY_RECOMENDED_ITEM_PREVIEW_PICTURE"]);
            $pricesAr = CIBlockPriceTools::GetCatalogPrices($arItem['PROPERTY_RECOMENDED_ITEM_IBLOCK_ID'], array('BASE'));
            $sel = array(
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
                "PROPERTY_ARTICLE",
                "PROPERTY_MODEL",
                "PROPERTY_BRAND",
                "PROPERTY_NEW_ONE",
                "PROPERTY_SALE",
                "PROPERTY_DAY_ITEM",
            );
            $filt = array(
                "ID" => $arItem['PROPERTY_RECOMENDED_ITEM_VALUE'],
                "IBLOCK_ID" => $arItem["PROPERTY_RECOMENDED_ITEM_IBLOCK_ID"],
                "ACTIVE" => "Y"
            );
            
            $itemAr = CIBlockElement::GetList(array("CREATED_BY" => "DESC"), $filt, false, array("nTopCount"=>1), $sel);
            while($item = $itemAr->GetNext()){
                $itemRes = $item;
            }
            
            $arItem["DETAIL_PAGE_URL"] = '/e-store'.$itemRes['DETAIL_PAGE_URL'].'/';
            
            $arPrice = CIBlockPriceTools::GetItemPrices($itemRes['IBLOCK_ID'], $pricesAr, $itemRes, false,array(),0, 1);
            $arItem = array_merge($arItem, $arPrice, $itemRes);
            $arResult["ITEMS"][]=$arItem;
	}
	$this->IncludeComponentTemplate();
}
?>
