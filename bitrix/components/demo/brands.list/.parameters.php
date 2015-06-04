<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;
$arSort = CIBlockParameters::GetElementSortFields(
	array( 'SORT', 'TIMESTAMP_X', 'NAME', 'ID'),
	array('KEY_LOWERCASE' => 'Y')
);

$arAscDesc = array(
	"asc" => GetMessage("SORT_ASC"),
	"desc" => GetMessage("SORT_DESC"),
);

$arTypes = Array();
$db_iblock_type = CIBlockType::GetList(Array("SORT"=>"ASC"));
while($arRes = $db_iblock_type->Fetch()){
	if($arIBType = CIBlockType::GetByIDLang($arRes["ID"], LANG)){
		$arTypes[$arRes["ID"]] = $arIBType["NAME"];
        }
}

$arIBlocks=Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch()){
    $arIBlocks[] = $arRes;
    $arFilter = array('IBLOCK_ID' => $arRes['ID']); // выберет потомков без учета активности
    $rsSect = CIBlockSection::GetList(array('sort' => 'asc'),$arFilter);
    while ($arSect = $rsSect->GetNext())
    {
        $arSections[] = $arSect;

    }

}   

//$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
//$arFilter = Array("IBLOCK_ID"=>IntVal($yvalue));
//$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
//while($ob = $res->GetNextElement())
//{
// $arFields = $ob->GetFields();
//}

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => Array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arTypes,
			"DEFAULT" => "news",
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => Array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlocks,
			"DEFAULT" => '',
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
		),
		"OFFERS_SORT_FIELD" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("SORT_FIELD"),
			"TYPE" => "LIST",
			"VALUES" => $arSort,
			"ADDITIONAL_VALUES" => "Y",
			"DEFAULT" => "name",
		),
		"OFFERS_SORT_ORDER" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("SORT_ORDER"),
			"TYPE" => "LIST",
			"VALUES" => $arAscDesc,
			"DEFAULT" => "asc",
			"ADDITIONAL_VALUES" => "Y",
		),
		"ELEMENT_ID" => Array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_ELEMENT"),
			"TYPE" => "LIST",
                        "VALUES" => $blockElements,
			"DEFAULT" => '',
		),
//
//		"IBLOCK_URL" => Array(
//			"PARENT" => "URL_TEMPLATES",
//			"NAME" => GetMessage("T_IBLOCK_DESC_LIST_PAGE_URL"),
//			"TYPE" => "STRING",
//			"DEFAULT" => "promotion.php?ID=#IBLOCK_ID#",
//		),

//		"DISPLAY_PANEL" => Array(
//			"PARENT" => "ADDITIONAL_SETTINGS",
//			"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PANEL"),
//			"TYPE" => "CHECKBOX",
//			"DEFAULT" => "N",
//		),
//
//		"SET_TITLE" => Array(),
//
//		"ADD_SECTIONS_CHAIN" => Array(
//			"PARENT" => "ADDITIONAL_SETTINGS",
//			"NAME" => GetMessage("T_IBLOCK_DESC_ADD_SECTIONS_CHAIN"),
//			"TYPE" => "CHECKBOX",
//			"DEFAULT" => "Y",
//		),


	),
);
?>
