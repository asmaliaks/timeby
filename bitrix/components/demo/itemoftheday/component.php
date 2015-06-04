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
                "PROPERTY_ITEM_OF_THE_DAY",
                "PROPERTY_ITEM_OF_THE_DAY.PREVIEW_PICTURE",
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
	while($arItem = $rsItems->GetNext())
	{
		$arItem["DETAIL_PAGE_URL"] = '/e-store/watches/157/'.$arItem['PROPERTY_ITEM_OF_THE_DAY_VALUE'].'/';
                
                $arItem["PREVIEW_PICTURE"] = CFile::GetPath($arItem["PROPERTY_ITEM_OF_THE_DAY_PREVIEW_PICTURE"]);

		$arResult["ITEMS"][]=$arItem;
	}
	$this->IncludeComponentTemplate();
}
?>
