<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


CModule::IncludeModule("iblock");
    $arSelect = Array("ID", "NAME", "IBLOCK_ID" );
    $arFilter = Array("IBLOCK_ID"=>20, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    $n=0;
    while($ob = $res->GetNextElement())
    {
        $arFields[$n] = $ob->GetFields();
        $db_props = CIBlockElement::GetProperty($arFields[$n]['IBLOCK_ID'], $arFields[$n]['ID'], "sort", "asc", array());
        $arFields[$n]['DETAIL_URL'] = "http://".$_SERVER['SERVER_NAME']."/promotions/view.php?ID=";
        while($ar_props = $db_props->Fetch()){
           
                $arFields[$n][$ar_props['CODE']]['VALUE'] =  $ar_props['VALUE'];
           
           
           
        }
        $n++;

    }
$arResult = $arFields;
$this->IncludeComponentTemplate();
?>
