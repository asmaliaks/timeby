<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


CModule::IncludeModule("iblock");

//$db_props = CIBlockElement::GetProperty(28, 390, array("sort" => "asc"), Array());
//if($ar_props = $db_props->Fetch()){
//
//    $ar_props;
//}

//fetching manufacturers
    $arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID" );
    $arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID']);
//    $arFilter = Array("IBLOCK_ID"=>$arParam['IBLOCK_ID']);
    $res = CIBlockElement::GetList(Array('name'=>'asc'), $arFilter, false, false, $arSelect);
    $n=0;
    while($ob = $res->GetNextElement())
    {
        $arFields[$n] = $ob->GetFields();
        $db_props = CIBlockElement::GetProperty($arFields[$n]['IBLOCK_ID'], $arFields[$n]['ID'], "sort", "asc", array());
        $arFields[$n]['DETAIL_URL'] = "http://".$_SERVER['SERVER_NAME']."/e-store/watches/";
        while($ar_props = $db_props->Fetch()){
           if($ar_props["CODE"] != 'class_name'){
                $arFields[$n][$ar_props['CODE']]['VALUE'] =  $ar_props['VALUE'];
           }else{
                $class_name_props = CIBlockElement::GetProperty($ar_props["LINK_IBLOCK_ID"], $ar_props['VALUE'], "sort", "asc", array());
                while($cl_props = $class_name_props->Fetch()){
                    $arFields[$n][$cl_props['CODE']] =  $cl_props['VALUE'];
                }
           } 
//                 echo $ar_res['NAME']; 
                //$additProps = CIBlockElement::GetProperty($arFields[$n]['IBLOCK_ID'], $arFields[$n]['ID'], "sort", "asc", array());
                
        }
        $n++;

    }
    
    //fetching additional parameters
    $arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID" );
    $arFilter = Array("IBLOCK_ID"=>28);
    $res = CIBlockElement::GetList(Array('name'=>'asc'), $arFilter, false, false, $arSelect);
    $n=0;
    while($ob = $res->GetNextElement())
    {
        $arParameters[$n] = $ob->GetFields();
        $db_props = CIBlockElement::GetProperty($arParameters[$n]["IBLOCK_ID"], $arParameters[$n]['ID'], "sort", "asc", array());

        while($ar_props = $db_props->Fetch()){
                $arParameters[$n][$ar_props['CODE']] =  $ar_props['VALUE'];  
                
        }
        $n++;

    }
    
$arResult['BRANDS'] = $arFields;
$arResult['PARAMETERS'] = $arParameters;
$this->IncludeComponentTemplate();
?>
