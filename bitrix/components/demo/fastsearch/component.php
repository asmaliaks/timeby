<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// анру4 21
// интер 27


$IBLOCK_ID = 21;
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBLOCK_ID,"PROPERTY_TYPE" => "L", "FILTRABLE" => "Y"));
while ($prop_fields = $properties->GetNext())
{
    if($prop_fields["FILTRABLE"] == "Y"){
        $propertyes[$prop_fields["CODE"]] = $prop_fields;
        $property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$IBLOCK_ID, "CODE"=>$prop_fields["CODE"]));
        while($enum_fields = $property_enums->GetNext())
        { 
            $propertyes[$prop_fields["CODE"]]["VALUE"][] = $enum_fields;
        }
        
    }
}
$IBLOCK_ID = 27;
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y","PROPERTY_TYPE" => "L","IBLOCK_ID"=>$IBLOCK_ID, "FILTRABLE" => "Y"));
while ($propFields = $properties->GetNext())
{
    if($propFields["FILTRABLE"] == "Y"){
        $props[$propFields["CODE"]] = $propFields;
        $propertyEnums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$IBLOCK_ID, "CODE"=>$propFields["CODE"], "FILTRABLE" => "Y","PROPERTY_TYPE" => "L"));
        while($enumFields = $propertyEnums->GetNext())
        {
            $props[$propFields["CODE"]]["VALUE"][] = $enumFields;
        }
    }
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
                "PROPERTY_BRAND.NAME",
                "IBLOCK_SECTION_ID",
                "DETAIL_PAGE_URL",
                "LIST_PAGE_URL",
                "DETAIL_PICTURE",
                "PREVIEW_PICTURE",
                "CATALOG_QUANTITY",
                "CATALOG_GROUP_1",
                "PROPERTY_ARTICLE_VALUE",
                "PROPERTY_NEW",
            );    
            $arFilter = array (
                "ACTIVE"=>"Y",
                "IBLOCK_ID" => 21,);

            $arOrder = array(
                    "created_date"=>"DESC",
            );
            $rsItems = CIBlockElement::GetList($arOrder, $arFilter, false,false, $arSelect);
            
            while($arItem = $rsItems->GetNext())
            {
                $arItem["DETAIL_PAGE_URL"] = '/e-store'.$arItem['DETAIL_PAGE_URL']."/";
                $arItem["PICTURE"] = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
                $arResult["ITEMS"][]=$arItem;
                $string = $string.'<div class="products-list-item">'
                        . '<div class="name">'
                        . '<a href="'.$arItem["DETAIL_URL"].'">'
                        . ''.$arItem["PROPERTY_BRAND_NAME"].''
                        . '</a>'
                        . '</div>'
                        . '<div class="model">'.$arItem["NAME"].'</div>'
                        . '<div class="article">'.$arItem['PROPERTY_ARTICLE'].'</div>'
                        . '<div class="image">'
                        . '<a href="'.$arItem["DETAIL_URL"].'">'
                        . '<img src="'.$arItem["PICTURE"].'" alt="'.$arItem["NAME"].'">'
                        . '</a>'
                        . '</div>'
                        . '<div class="price">'
                        . ''.$arItem["CATALOG_PRICE_1"].' '.$arItem["CATALOG_GROUP_NAME"].''
                        . '</div>'
                        . '</div>';
                
            }
  
            
            
            
            
$arResult["COUNT"] = count($arResult["ITEMS"]);         
$arResult["DEFAULT_STRING"] = $string;         
$arResult["WATCHES"] = $propertyes;
$arResult["CLOCKS"] = $props;
$this->IncludeComponentTemplate();
