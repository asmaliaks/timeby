<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("FAST_FILTER"),
	"DESCRIPTION" => GetMessage("FAST_FILTER_DESCRIPTION"),
	"ICON" => "/images/cat_list.gif",
	"CACHE_PATH" => "Y",
	"SORT" => 30,
	"PATH" => array(
		"ID" => "my_components",
		"SORT" => 2000,
		"NAME" => GetMessage("MY_COMPONENTS"),
		"CHILD" => array(
			"ID" => "fast_filter",
			"NAME" => GetMessage("FAST_FILTER"),
			"SORT" => 10,
			),
		),
	
);

?>