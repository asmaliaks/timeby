<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("LIST_FOR_MENU"),
	"DESCRIPTION" => GetMessage("MY_PROMOTIONS_DETAIL_DESC"),
	"ICON" => "/images/news_detail.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "my_components",
		"SORT" => 2000,
		"NAME" => GetMessage("MY_COMPONENTS"),
		"CHILD" => array(
			"ID" => "my_promotions",
			"NAME" => GetMessage("MY_PROMOTIONS"),
			"SORT" => 10,
//                        "CHILD" => array(
//                            "ID" => 'promo_list_for_menu',
//                            "NAME" => GetMessage('LIST_FOR_MENU'),
//                            "SORT" => 10,
//                            
//                        ),
		)
	),
);

?>