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


$arParams["DETAIL_URL"]=trim($arParams["DETAIL_URL"]);
if(strlen($arParams["DETAIL_URL"])<=0)
	$arParams["DETAIL_URL"] = "news/news_detail.php?ID=#ELEMENT_ID#";


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
                "IBLOCK_TYPE",
		"DETAIL_PAGE_URL",
		"NAME",
                "DATE_CREATE",
                "IBLOCK_SECTION_ID",
                "PROPERTY_VIDEO_CODE",
                "PROPERTY_PRODUCT_REVIEW",
                "PROPERTY_SECTION_VIDEO",
	);

	$arFilter = array (
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],//watches
		"IBLOCK_ID"=> 26,// 26
                "ID" => $_GET["VID_ID"],// 384
                //"PROPERTY_PRODUCT_REVIEW" => $arParams["ITEM_ID"],
                //"PROPERTY_SECTION_VIDEO" => $_GET["M_ID"],//158
//		"ACTIVE" => "Y",
//		"CHECK_PERMISSIONS" => "Y",
//                ">DATE_CREATE" => $to,
	);
	$arOrder = array(
	);

	$rsItems = CIBlockElement::GetList($arOrder, $arFilter, false,array(), $arSelect);
	while($arItem = $rsItems->GetNext())
	{

                $arResult["VIDEO_CODE"] = htmlspecialchars_decode($arItem["PROPERTY_VIDEO_CODE_VALUE"]);
                // get other videos of this manufacturer
                $aditionalFilter = array (
                    "IBLOCK_TYPE" => $arItem["IBLOCK_TYPE_ID"],
                    "IBLOCK_ID" => $arItem["IBLOCK_ID"],
                    "!%ID" => $arItem["ID"],
                    "ACTIVE" => "Y",
                    "PROPERTY_SECTION_VIDEO" => $arItem["PROPERTY_SECTION_VIDEO_VALUE"],
                );
                $aditionalOrder = array(
                    "ID" => "DESC",
                );
                $additionalSelect = array(
                    "ID",
                    "IBLOCK_ID",
                    "ACTIVE_FROM",
                    "IBLOCK_TYPE",
                    "DETAIL_PAGE_URL",
                    "PREVIEW_PICTURE",
                    "NAME",
                    "DATE_CREATE",
                    "IBLOCK_SECTION_ID",
                    "PROPERTY_VIDEO_CODE",
                    "PROPERTY_PRODUCT_REVIEW",
                    "PROPERTY_SECTION_VIDEO",
                );
                $aditionalsItems = CIBlockElement::GetList($aditionalOrder, $aditionalFilter, false,array("nTopCount"=>5), $additionalSelect);
                $n = 0;
                while($additionalItem = $aditionalsItems->GetNext()){
                    $arResult["ADDITIONAL_VIDEOS"][$n] = $additionalItem;
                    $arResult["ADDITIONAL_VIDEOS"][$n]['PREVIEW_PICTURE'] = CFile::GetFileArray($additionalItem['PREVIEW_PICTURE']);
                    $n++;
                }
	}
	$this->IncludeComponentTemplate();
}
?>
