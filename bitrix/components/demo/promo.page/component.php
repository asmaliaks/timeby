<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if($_GET["ID"]){
    $promoId = $_GET["ID"];
}else{
    LocalRedirect("/404.php");
}

CModule::IncludeModule("iblock");
// get iblock element by ID

$IBLOCK_ID = CIBlockElement::GetIBlockByID($promoId);

$res = CIBlockElement::GetByID($promoId);
if($ar_res = $res->GetNext()){
  $pictureId =  $ar_res['DETAIL_PICTURE'];
}

$db_props = CIBlockElement::GetProperty($IBLOCK_ID, $promoId, "sort", "asc", array());
while($ar_props = $db_props->Fetch()){ 
     $arFields[$ar_props['CODE']] =  $ar_props['VALUE'];
}
	$arSelect = Array(
		"ID",
		"NAME",
		"IBLOCK_ID",
		"IBLOCK_SECTION_ID",
		"DETAIL_TEXT",
		"DETAIL_TEXT_TYPE",
		"PREVIEW_TEXT",
		"PREVIEW_TEXT_TYPE",
		"DETAIL_PICTURE",
		"ACTIVE_FROM",
		"LIST_PAGE_URL",
	);

	$arFilter = array(
		"ID" => $promoId,
		"IBLOCK_ID" => $IBLOCK_ID,
		
	);

	$rsElement = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	if($obElement = $rsElement->GetNextElement())
	{
		$arFields = $obElement->GetFields();
        }

        if(isset($arFields["DETAIL_PICTURE"])){
            $arFields["DETAIL_PICTURE"] = CFile::GetFileArray($arFields["DETAIL_PICTURE"]);
        }
        $db_props = CIBlockElement::GetProperty($IBLOCK_ID, $promoId, "sort", "asc", array());
        while($ar_props = $db_props->Fetch()){ 
             $arFields[$ar_props['CODE']] =  $ar_props['VALUE'];
        }
        $arResult = $arFields;
    $this->IncludeComponentTemplate();
?>
