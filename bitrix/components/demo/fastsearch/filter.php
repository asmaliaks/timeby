<? 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST)){
    if($_POST['iblockId'] != 0){
        if(CModule::IncludeModule("catalog") && CModule::IncludeModule("iblock")){
            
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
                "PROPERTY_ARTICLE",
                "IBLOCK_SECTION_ID",
                "DETAIL_PAGE_URL",
                "LIST_PAGE_URL",
                "DETAIL_PICTURE",
                "PREVIEW_PICTURE",
                "CATALOG_QUANTITY",
                "CATALOG_GROUP_1",
            );    
            $arFilter = array ("ACTIVE"=>"Y", "IBLOCK_ID" => $_POST['iblockId']);
            foreach($_POST["filter"] as $k=>$filter){
                if($filter != ''){
                    $arFilter["PROPERTY_".$k."_VALUE"] = $filter;
                }
            }
            $arOrder = array(
                    "created_date"=>"DESC",
            );
            $rsItems = CIBlockElement::GetList($arOrder, $arFilter, false,false, $arSelect);
            while($arItem = $rsItems->GetNext())
            {
                $arItem["DETAIL_PAGE_URL"] = '/e-store'.$arItem['DETAIL_PAGE_URL']."/";
                $arItem["PICTURE"] = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
                $arResult["ITEMS"][]=$arItem;
            }
            $string = '';
            $n = 0;
            foreach($arResult["ITEMS"] as $item){
                if($n < 5){
                $string = $string.'<div class="products-list-item">'
                        . '<div class="name">'
                        . '<a href="'.$item["DETAIL_URL"].'">'
                        . ''.$item["PROPERTY_BRAND_NAME"].''
                        . '</a>'
                        . '</div>'
                        . '<div class="model">'.$item["NAME"].'</div>'
                        . '<div class="article">'.$item['PROPERTY_ARTICLE'].'</div>'
                        . '<div class="image">'
                        . '<a href="'.$item["DETAIL_URL"].'">'
                        . '<img src="'.$item["PICTURE"].'" alt="'.$item["NAME"].'">'
                        . '</a>'
                        . '</div>'
                        . '<div class="price">'
                        . ''.$item["CATALOG_PRICE_1"].' '.$item["CATALOG_GROUP_NAME"].''
                        . '</div>'
                        . '</div>';
                }
               $n++;
             }
             $res['ITEMS'] = $string;
             $res['COUNT'] = count($arResult["ITEMS"]);
             $result = json_encode($res);
            print_r($result);exit;
        }
    }
}