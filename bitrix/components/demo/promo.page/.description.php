<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("MY_PROMOTIONS_DETAIL_NAME"),
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
		)
	),
);

?>